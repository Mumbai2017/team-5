package com.example.dhruvil.ceque_android;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
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
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        textViewDate = (TextView) findViewById(R.id.text_view_date);
        textViewFeedback = (TextView) findViewById(R.id.text_view_feedback);

        Intent intent = getIntent();
        url = intent.getStringExtra("plan_image_url");
        date = intent.getStringExtra("plan_date");
        textViewDate.setText(date);
    }

}
