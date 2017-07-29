package com.example.dhruvil.ceque_android;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.widget.ImageView;
import android.widget.TextView;

public class PlanDetailActivity extends AppCompatActivity {

    private String url, date;
    private TextView textViewDate, textViewFeedback;
    private ImageView imageView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_plan_detail);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        toolbar.setTitle("Plan Details");
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        textViewDate = (TextView) findViewById(R.id.text_view_date);
        textViewFeedback = (TextView) findViewById(R.id.text_view_feedback);
        imageView = (ImageView) findViewById(R.id.image_view_plan_image);

        Intent intent = getIntent();
        url = intent.getStringExtra("plan_image_url");
        date = intent.getStringExtra("plan_date");
        textViewDate.setText(date);

        Log.e("onCreate: ", "PlanDetailActivity" + url);

//        ImageRequest iconRequest = new ImageRequest(url,
//                new Response.Listener<Bitmap>() {
//                    @Override
//                    public void onResponse(Bitmap response) {
//                        imageView.setImageBitmap(response);
//                    }
//                }, 0, 0, null, new Response.ErrorListener() {
//            @Override
//            public void onErrorResponse(VolleyError error) {
//                Log.e("IconDLError", error.getMessage());
//            }
//        });
//
//        RequestQueue requestQueue = Volley.newRequestQueue(this);
//        requestQueue.add(iconRequest);

    }

}
