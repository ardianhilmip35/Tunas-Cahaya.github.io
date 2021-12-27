package com.ardianhilmip.tunascahaya.Activites;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageButton;
import android.widget.Switch;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import com.ardianhilmip.tunascahaya.Fitur.AboutActivity;
import com.ardianhilmip.tunascahaya.Fitur.AkunActivity;
import com.ardianhilmip.tunascahaya.Fitur.KonsulActivity;
import com.ardianhilmip.tunascahaya.R;
import com.ardianhilmip.tunascahaya.SharedPrefManager;

public class HomeActivity extends AppCompatActivity implements View.OnClickListener {

    TextView tvnama;
    SharedPrefManager sharedPrefManager;
    ImageButton btnabout, btnkonsul, btnsettings;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        btnkonsul = findViewById(R.id.btnkonsul);
        btnkonsul.setOnClickListener(this);
        btnabout = findViewById(R.id.btnabout);
        btnabout.setOnClickListener(this);
        btnsettings = findViewById(R.id.btnsettings);
        btnsettings.setOnClickListener(this);
        tvnama = findViewById(R.id.tvnama);
        sharedPrefManager=new SharedPrefManager(getApplicationContext());

        String userName="Hey, "+ sharedPrefManager.getUser().getNama();
        tvnama.setText(userName);

    }

    @Override
    public void onClick(View view) {
        switch (view.getId()){

            case R.id.btnkonsul:
                switchOnKonsul();
                break;
            case R.id.btnabout:
                switchOnAbout();
                break;
            case R.id.btnsettings:
                switchOnAkun();
                break;

        }
    }

    private void switchOnAkun() {
        Intent i=new Intent(HomeActivity.this, AkunActivity.class);
        startActivity(i);
    }

    private void switchOnAbout() {
        Intent i=new Intent(HomeActivity.this, AboutActivity.class);
        startActivity(i);
    }

    private void switchOnKonsul() {
        Intent i=new Intent(HomeActivity.this, KonsulActivity.class);
        startActivity(i);
    }
}
