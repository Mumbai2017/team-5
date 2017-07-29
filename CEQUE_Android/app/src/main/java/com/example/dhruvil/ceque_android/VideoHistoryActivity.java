package com.example.dhruvil.ceque_android;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.webkit.WebView;
import android.webkit.WebViewClient;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

public class VideoHistoryActivity extends AppCompatActivity {

    public static final String TAG = "VideoHistoryActivity";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_video_history);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        WebView webView = (WebView) findViewById(R.id.webview_video_history);
        webView.setWebViewClient(new MyBrowser());
        webView.getSettings().setLoadsImagesAutomatically(true);
        webView.getSettings().setJavaScriptEnabled(true);
        webView.setScrollBarStyle(View.SCROLLBARS_INSIDE_OVERLAY);
        webView.loadUrl("http://10.0.2.2/webUIOne.php");
    }

    private class MyBrowser extends WebViewClient {
        @Override
        public boolean shouldOverrideUrlLoading(WebView view, String url) {
            view.loadUrl(url);
            return true;
        }
    }

    public void makeWebViewRequest() {
        String url = "";

        StringRequest stringRequest = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
//                email = response.substring(1, response.indexOf('-'));
//                name_number = response.substring(response.indexOf('-') + 1, response.length() - 1);
//                firstName = name_number.substring(0, name_number.indexOf('-'));
//                lastName_number = name_number.substring(name_number.indexOf('-') + 1, name_number.length());
//                lastName = lastName_number.substring(0, lastName_number.indexOf('-'));
//                phoneNumber = lastName_number.substring(lastName_number.indexOf('-') + 1, lastName_number.length());
//                setSharedPreferences();
//                Start the MainActivity
                Log.e(TAG, "onResponse: " + response);
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e(TAG, "onErrorResponse: " + error);
            }
        }) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();
//                Put parameters in the Post Request
                params.put("username", Constants.getUsername(VideoHistoryActivity.this));
                return params;
            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(VideoHistoryActivity.this);
        requestQueue.add(stringRequest);
    }

}
