package com.example.dhruvil.ceque_android;

import android.app.ProgressDialog;
import android.content.Intent;
import android.database.Cursor;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.provider.MediaStore;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.text.Html;
import android.text.method.LinkMovementMethod;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import com.github.hiteshsondhi88.libffmpeg.ExecuteBinaryResponseHandler;
import com.github.hiteshsondhi88.libffmpeg.FFmpeg;
import com.github.hiteshsondhi88.libffmpeg.LoadBinaryResponseHandler;
import com.github.hiteshsondhi88.libffmpeg.exceptions.FFmpegCommandAlreadyRunningException;
import com.github.hiteshsondhi88.libffmpeg.exceptions.FFmpegNotSupportedException;

public class AddVideoActivity extends AppCompatActivity {

    public static final String TAG = "AddVideoActivity";
    public static Uri fileUri;
    private String selectedPath;
    private TextView textView, textViewResponse;
    private FFmpeg ffmpeg;
    private String[] command;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_video);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        textView = (TextView) findViewById(R.id.textView);
        textViewResponse = (TextView) findViewById(R.id.textViewResponse);

        Button chooseButton = (Button) findViewById(R.id.buttonChoose);
        chooseButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                chooseVideo();
            }
        });

        Button uploadButton = (Button) findViewById(R.id.buttonUpload);
        uploadButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                uploadVideo();
            }
        });
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        loadFFMpegBinary();
    }

    private void chooseVideo() {
        Intent intent = new Intent();
        intent.setType("video/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(Intent.createChooser(intent, "Select a Video "), 3);
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (resultCode == RESULT_OK) {
            if (requestCode == 3) {
                System.out.println("SELECT_VIDEO");
                Uri selectedImageUri = data.getData();
                fileUri = selectedImageUri;
                selectedPath = getPath(selectedImageUri);
                Log.e(TAG, "onActivityResult: " + selectedPath);
                String[] command = {"-y", "-i", selectedPath, "-s", "160x120", "-r", "25",
                        "-vcodec", "mpeg4", "-b:v", "150k", "-b:a", "48000", "-ac", "2", "-ar",
                        "22050", "storage/emulated/0/VID_SEND.mp4"};
                Log.e(TAG, "onActivityResult: SELECTED PATH" + selectedPath);
                try {
                    execFFmpegBinary(command);
//                    String filePath = SiliCompressor.with(this).compressVideo(selectedImageUri.toString(), Uri.fromFile(new File("/storage/emulated/0/Sample")).toString());
//                    Log.e(TAG, "onActivityResult: " + filePath);
                } catch (Exception e) {
                    Log.e(TAG, "Hello world! " + e.toString());
                }

                textView.setText(selectedPath);
            }
        }
    }

    public String getPath(Uri uri) {
        Cursor cursor = getContentResolver().query(uri, null, null, null, null);
        cursor.moveToFirst();
        String document_id = cursor.getString(0);
        document_id = document_id.substring(document_id.lastIndexOf(":") + 1);
        cursor.close();

        cursor = getContentResolver().query(
                android.provider.MediaStore.Video.Media.EXTERNAL_CONTENT_URI,
                null, MediaStore.Images.Media._ID + " = ? ", new String[]{document_id}, null);
        cursor.moveToFirst();
        String path = cursor.getString(cursor.getColumnIndex(MediaStore.Video.Media.DATA));
        cursor.close();

        return path;
    }

    private void uploadVideo() {
        class UploadVideo extends AsyncTask<Void, Void, String> {

            ProgressDialog uploading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                uploading = ProgressDialog.show(AddVideoActivity.this, "Uploading File", "Please wait...", false, false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                uploading.dismiss();
                textViewResponse.setText(Html.fromHtml("<b>Uploaded at <a href='" + s + "'>" + s + "</a></b>"));
                textViewResponse.setMovementMethod(LinkMovementMethod.getInstance());
            }

            @Override
            protected String doInBackground(Void... params) {
                Upload u = new Upload();
                String msg = u.uploadVideo(selectedPath);
                return msg;
            }
        }
        UploadVideo uv = new UploadVideo();
        uv.execute();
    }

    private void loadFFMpegBinary() {
        try {
            if (ffmpeg == null) {
                Log.d(TAG, "ffmpeg : null");
                ffmpeg = FFmpeg.getInstance(this);
            }
            ffmpeg.loadBinary(new LoadBinaryResponseHandler() {
                @Override
                public void onFailure() {
                    Log.e(TAG, "onFailure: ");
                }

                @Override
                public void onSuccess() {
                    Log.d(TAG, "ffmpeg : correct Loaded");
                }
            });
        } catch (FFmpegNotSupportedException e) {
            Log.e(TAG, "loadFFMpegBinary: Not supported");
        } catch (Exception e) {
            Log.d(TAG, "Exception not supported : " + e);
        }
    }

    private void execFFmpegBinary(final String[] command) {
        final ProgressDialog dialog = new ProgressDialog(this);
        dialog.setMessage("Loading...");
        try {
            ffmpeg.execute(command, new ExecuteBinaryResponseHandler() {
                @Override
                public void onFailure(String s) {
                    if (dialog.isShowing())
                        dialog.hide();
                    Log.d(TAG, "FAILED with output : "+s);
                }

                @Override
                public void onSuccess(String s) {
                    if (dialog.isShowing())
                        dialog.hide();
                    Log.d(TAG, "SUCCESS with output : "+s);
                }

                @Override
                public void onProgress(String s) {
                    if (!dialog.isShowing())
                        dialog.show();
                    Log.d(TAG, "progress : "+s);
                }

                @Override
                public void onStart() {
                    Log.d(TAG, "Started command :ffmpeg "+command);
                }

                @Override
                public void onFinish() {
                    Log.d(TAG, "Finished command :ffmpeg "+command);

                }
            });
        } catch (FFmpegCommandAlreadyRunningException e) {

        }
    }
}
