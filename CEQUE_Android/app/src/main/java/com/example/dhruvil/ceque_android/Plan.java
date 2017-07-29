package com.example.dhruvil.ceque_android;

/**
 * Created by dhruvil on 29/07/17.
 */

public class Plan {

    private String planID;
    private String planURL;
    private String planDate;

    public String getPlanDate() {
        return planDate;
    }

    public String getPlanID() {
        return planID;
    }

    public String getPlanURL() {
        return planURL;
    }

    public void setPlanDate(String planDate) {
        this.planDate = planDate;
    }

    public void setPlanID(String planID) {
        this.planID = planID;
    }

    public void setPlanURL(String planURL) {
        this.planURL = planURL;
    }
}
