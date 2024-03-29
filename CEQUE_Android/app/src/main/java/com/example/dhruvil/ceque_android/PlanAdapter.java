package com.example.dhruvil.ceque_android;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import java.util.List;

/**
 * Created by dhruvil on 29/07/17.
 */

class PlanAdapter extends RecyclerView.Adapter<PlanAdapter.PlanViewHolder> {

    private List<Plan> planList;
    private Context context;
    private LayoutInflater inflater;
    private Activity activity;
    private String[] urls;
    String TAG = "adapter";

    PlanAdapter(Context c, List<Plan> pl, Activity a, String[] u) {
        context = c;
        planList = pl;
        Log.e("adapter", "" + planList.get(0).getPlanDate());
        activity = a;
        inflater = LayoutInflater.from(c);
        urls = u;
    }

    @Override
    public int getItemCount() {
        return planList.size();
    }

    @Override
    public void onBindViewHolder(PlanViewHolder holder, int position) {
        Plan current = planList.get(position);
        final int finalPosition = position;
        final String date = current.getPlanDate();
        holder.planDate.setText(current.getPlanDate());
        holder.baseLayout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context, PlanDetailActivity.class);
                intent.putExtra("plan_image_url", urls[finalPosition]);
                intent.putExtra("plan_date", date);
                context.startActivity(intent);
            }
        });
    }

    @Override
    public PlanViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = inflater.inflate(R.layout.cardview_for_plan, parent, false);
        return new PlanViewHolder(view);
    }

    class PlanViewHolder extends RecyclerView.ViewHolder {
        TextView planDate;
        CardView baseLayout;

        PlanViewHolder(View view) {
            super(view);
//            Setup views
            planDate = (TextView) view.findViewById(R.id.text_view_date);
            baseLayout = (CardView) view.findViewById(R.id.card_view_plan_base);
        }
    }

}
