package com.example.dhruvil.ceque_android;

import android.Manifest;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.support.design.widget.TextInputLayout;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {

    public static int PASSWORD_MIN_LENGTH = 0;
    private EditText usernameEditText;
    private EditText passwordEditText;
    private TextInputLayout usernameTextInputLayout;
    private TextInputLayout passwordTextInputLayout;
    private ProgressDialog dialog;
//    private String email;
//    private String name_number;
//    private String firstName;
//    private String lastName_number;
//    private String lastName;
//    private String phoneNumber;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        if (Boolean.valueOf(Constants.getLoginStatus(this))) {
            Intent intent = new Intent(this, WelcomeActivity.class);
            startActivity(intent);
        }

        usernameEditText = (EditText) findViewById(R.id.edit_text_username);
        passwordEditText = (EditText) findViewById(R.id.edit_text_password);
        usernameTextInputLayout = (TextInputLayout) findViewById(R.id.text_ip_layout_username);
        passwordTextInputLayout = (TextInputLayout) findViewById(R.id.text_ip_layout_password);
        dialog = new ProgressDialog(this);

        Button loginButton = (Button) findViewById(R.id.button_login);
        loginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (isFormValid()) {
                    dialog.setMessage("Logging in...");
                    dialog.show();
                    setSharedPreferences();
                    makeLoginRequest();
                } else {
                    Toast.makeText(MainActivity.this, "Invalid Entry", Toast.LENGTH_SHORT).show();
                }
//                Intent intent = new Intent(MainActivity.this, WelcomeActivity.class);
//                startActivity(intent);
            }
        });

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        toolbar.setTitle(getResources().getString(R.string.main_activity_toolbar_title));
        setSupportActionBar(toolbar);
        if (ContextCompat.checkSelfPermission(this, Manifest.permission.READ_EXTERNAL_STORAGE) != PackageManager.PERMISSION_GRANTED) {
            Log.e("OnCreate: ", "granted already");
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.READ_EXTERNAL_STORAGE}, 1);
        } else {
            Log.e("onCreate: ", "not granted");
        }
    }

    private boolean isFormValid() {
        if (!isUsernameValid() || !isPasswordValid()) {
            if (!isUsernameValid()) {
                usernameTextInputLayout.setErrorEnabled(true);
                usernameTextInputLayout.setError("Invalid Username");
            } else {
                usernameTextInputLayout.setError(null);
                usernameTextInputLayout.setErrorEnabled(false);
            }
            if (!isPasswordValid()) {
                passwordTextInputLayout.setErrorEnabled(true);
                passwordTextInputLayout.setError("Invalid Password");
            } else {
                passwordTextInputLayout.setError(null);
                passwordTextInputLayout.setErrorEnabled(false);
            }
            return false;
        } else {
            usernameTextInputLayout.setErrorEnabled(false);
            passwordTextInputLayout.setErrorEnabled(false);
            return true;
        }
    }

    public boolean isUsernameValid() {
        return !usernameEditText.getText().toString().trim().isEmpty();
    }

    public boolean isPasswordValid() {
        if (passwordEditText.getText().toString().trim().isEmpty())
            return false;
        else if (passwordEditText.getText().toString().trim().length() < PASSWORD_MIN_LENGTH)
            return false;
        return true;
    }

    private void makeLoginRequest() {
        String url = "http://10.0.2.2/teacherlogin.php";

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
                Intent intent = new Intent(MainActivity.this, MainActivity.class);
                startActivity(intent);
                setSharedPreferences();
                dialog.dismiss();
                finish();
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
//                If server returns an error, this code is executed
                try {
                    if (error.networkResponse.statusCode == 401)
                        Toast.makeText(MainActivity.this, "Wrong username/password", Toast.LENGTH_SHORT).show();
                    else if (error.networkResponse.statusCode == 400)
                        Toast.makeText(MainActivity.this, "Error logging in", Toast.LENGTH_SHORT).show();
                } catch (Exception e) {
                    Log.e("Error", " " + e.getMessage());
                }
                dialog.dismiss();
            }
        }) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();
//                Put parameters in the Post Request
                params.put("username", usernameEditText.getText().toString());
                params.put("password", passwordEditText.getText().toString());
                return params;
            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    public void setSharedPreferences() {
        SharedPreferences preferences = getApplicationContext().getSharedPreferences("credentials", Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = preferences.edit();
        editor.putString(Constants.KEY_USERNAME, usernameEditText.getText().toString().trim());
        editor.putString(Constants.KEY_STATUS, "true");
        editor.putString(Constants.KEY_UPLOAD_NUMBER, "0");
        editor.apply();
    }
}
