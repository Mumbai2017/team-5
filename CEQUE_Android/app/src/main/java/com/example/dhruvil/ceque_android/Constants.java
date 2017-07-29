package com.example.dhruvil.ceque_android;

import android.content.Context;
import android.content.SharedPreferences;

/**
 * Created by dhruvil on 30/07/17.
 */

public class Constants {
    final static String KEY_USERNAME = "username";

    static String getUsername(Context context) {
        SharedPreferences preferences = context.getSharedPreferences("credentials", Context.MODE_PRIVATE);
        return preferences.getString("username", null);
    }

}
