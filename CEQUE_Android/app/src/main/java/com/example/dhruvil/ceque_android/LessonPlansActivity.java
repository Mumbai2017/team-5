package com.example.dhruvil.ceque_android;

import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.support.design.widget.FloatingActionButton;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.util.Base64;
import android.util.Log;
import android.view.View;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Hashtable;
import java.util.List;
import java.util.Map;

import static com.example.dhruvil.ceque_android.Upload.UPLOAD_URL;

public class LessonPlansActivity extends AppCompatActivity {

    private List<Plan> gameList;
    private Bitmap bitmap;
    private RecyclerView recyclerView;
    private PlanAdapter adapter;
    private RequestQueue requestQueue;
    private FloatingActionButton fab ;
    private String KEY_IMAGE = "image";
    private String KEY_NAME = "name";

    private String[] planIDs = {
            "1",
            "2"
    };

    private String[] planDates = {
            "Math Plan - 10/02/2016",
            "Math Plan - 7/02/2016"
    };

    private String[] planURLs = {
            "www.google.com",
            "www.yahoo.com"
    };
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lesson_plans);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showImageSelector();
            }
        });
        recyclerView = (RecyclerView) findViewById(R.id.recycler_view_plans);
        List<Plan> planList = getPlanData();
        adapter = new PlanAdapter(this, planList, this, planURLs);
        recyclerView.setAdapter(adapter);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
    }

    private void makePlanArrayRequest() {
        final ProgressDialog dialog = new ProgressDialog(this);
        dialog.setMessage("Please wait");
        dialog.show();

        String urlSuffix = "sgash";
        if (urlSuffix != null) {
            JsonArrayRequest request = new JsonArrayRequest(Request.Method.GET, "", null, new Response.Listener<JSONArray>() {
                @Override
                public void onResponse(JSONArray response) {
                    try {
//                    Initialize the String arrays to store the received  data in them
                        planIDs = new String[response.length()];
                        planDates = new String[response.length()];
                        planURLs = new String[response.length()];

//                        JSONArray object response contains a JSON Array containing all the games
                        for (int i = 0; i < response.length(); i++) {
//                            Create a JSONObject object achievement to access each JSONObject in the JSONArray
                            JSONObject game = (JSONObject) response.get(i);
                            planIDs[i] = game.getString("id");
                            planDates[i] = game.getString("plan_date");
                            planURLs[i] = game.getString("plan_url");
                            Log.e("Plan " + i, "" + planDates[i]);
                        }
                        gameList = getPlanData();
                        adapter = new PlanAdapter(LessonPlansActivity.this, gameList, LessonPlansActivity.this, planURLs);
                        recyclerView.setAdapter(adapter);
                        recyclerView.setLayoutManager(new LinearLayoutManager(LessonPlansActivity.this));
                    } catch (Exception e) {
                        Log.e("onResponse: ", "Error in getting games " + e.getMessage());
                    }
                    dialog.dismiss();
                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
//                    If the server returns an error, this code is executed
                    Log.e("Error", "Response: " + error.getMessage());

                }
            });
//            Add the JsonArrayRequest to the RequestQueue object for parsing
            requestQueue = Volley.newRequestQueue(LessonPlansActivity.this);
            requestQueue.add(request);
        } else {
            Toast.makeText(LessonPlansActivity.this, "Invalid user", Toast.LENGTH_SHORT).show();
        }
    }

    public List<Plan> getPlanData() {
        List<Plan> planData = new ArrayList<>();
        for (int i = 0; i < planIDs.length; i++) {
            Plan current = new Plan();
            current.setPlanDate(planDates[i]);
            current.setPlanID(planIDs[i]);
            current.setPlanURL(planURLs[i]);
            planData.add(current);
        }
        return planData;
    }

    public void showImageSelector() {
        Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(Intent.createChooser(intent, "Select Picture"), 1);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (requestCode == 1 && resultCode == RESULT_OK && data != null && data.getData() != null) {
            Uri filePath = data.getData();
            Log.e("onActivityResult: ", "" + filePath);
            try {
                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(), filePath);
                uploadImage();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }

    private void uploadImage(){
        //Showing the progress dialog
        final ProgressDialog loading = ProgressDialog.show(this,"Uploading...","Please wait...",false,false);
        StringRequest stringRequest = new StringRequest(Request.Method.POST, UPLOAD_URL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String s) {
                        loading.dismiss();
                        Toast.makeText(LessonPlansActivity.this, "success" , Toast.LENGTH_LONG).show();
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError volleyError) {
                        loading.dismiss();
                        Toast.makeText(LessonPlansActivity.this, volleyError.getMessage(), Toast.LENGTH_LONG).show();
                    }
                }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                String image = getStringImage(bitmap);

                String name = "plan_ite_" + planIDs.length;

                Map<String,String> params = new Hashtable<String, String>();
                params.put(KEY_IMAGE, image);
                params.put(KEY_NAME, name);
                return params;
            }
        };

        //Creating a Request Queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);

        //Adding request to the queue
        requestQueue.add(stringRequest);
    }

    public String getStringImage(Bitmap bmp){
        ByteArrayOutputStream baos = new ByteArrayOutputStream();
        bmp.compress(Bitmap.CompressFormat.JPEG, 100, baos);
        byte[] imageBytes = baos.toByteArray();
        Log.e("getStringImage: HE", Base64.encodeToString(imageBytes, Base64.DEFAULT));
        return Base64.encodeToString(imageBytes, Base64.DEFAULT);
    }

}
