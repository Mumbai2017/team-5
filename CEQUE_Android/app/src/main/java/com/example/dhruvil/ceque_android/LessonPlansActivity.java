package com.example.dhruvil.ceque_android;

import android.app.ProgressDialog;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class LessonPlansActivity extends AppCompatActivity {

    private List<Plan> gameList;
    private RecyclerView recyclerView;
    private PlanAdapter adapter;
    private RequestQueue requestQueue;
    private FloatingActionButton fab ;

    private String[] planIDs = {
            "1",
            "2"
    };

    private String[] planDates = {
            "Hello",
            "Ni Hao"
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
        
    }

}
