package com.example.massam.aplikasiku;

import android.content.BroadcastReceiver;
import android.content.pm.PackageManager;
import android.support.annotation.NonNull;
import android.support.v4.app.ActivityCompat;
import android.support.v4.app.FragmentActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.KeyEvent;
import android.view.View;
import android.view.inputmethod.EditorInfo;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.example.massam.aplikasiku.api.ApiClient;
import com.example.massam.aplikasiku.api.ServiceData;
import com.example.massam.aplikasiku.model.ModelData;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;
import com.google.gson.Gson;

import java.util.ArrayList;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends FragmentActivity implements OnMapReadyCallback{
    GoogleMap mMap;
    private ArrayList<ModelData> listData;
    private String code;
    private Double latitude;
    private Double longitude;
    private String fullname;
    private String address;
    private String phone;
    private EditText editText;
    private String codeData;
    private Button buttonSearch;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);

        editText = (EditText) findViewById(R.id.et_code);
        editText.setOnEditorActionListener(new TextView.OnEditorActionListener() {
            @Override
            public boolean onEditorAction(TextView textView, int actionId, KeyEvent event) {
                if ((event != null && (event.getKeyCode() == KeyEvent.KEYCODE_ENTER)) || (actionId == EditorInfo.IME_ACTION_DONE)) {
                    codeData = editText.getText().toString();

                    if (codeData.matches("")){
                        Toast.makeText(MainActivity.this, "Masukkan kode Pelanggan terlebih dahulu", Toast.LENGTH_SHORT).show();
                    }else{
                        loadJSON();
                        mMap.clear();
                    }

                }
                return false;
            }
        });

        buttonSearch = (Button) findViewById(R.id.bt_search);
        buttonSearch.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                codeData = editText.getText().toString();

                if (codeData.matches("")){
                    Toast.makeText(MainActivity.this, "Masukkan kode Pelanggan terlebih dahulu", Toast.LENGTH_SHORT).show();
                }else{
                    loadJSON();
                    mMap.clear();
                }
            }
        });

    }


    public void loadJSON() {
        //instance interface class with class apiclient
        ServiceData serviceData = ApiClient.getClient().create(ServiceData.class);

        // interface retrofit Call to send request webserver and returns response
        Call<ModelData> call = serviceData.getData(codeData);

        // Callback / Communicates responses from a server or offline requests
        call.enqueue(new Callback<ModelData>() {
            @Override
            public void onResponse(Call<ModelData> call, Response<ModelData> response) {
                ModelData result = response.body();
                listData = new ArrayList<>();
                Log.d("yeah", "onResponse: "+new Gson().toJson(result));
                Log.d("yeah", "onResponse: "+codeData);
                if (response.code() != 404){
                    latitude = Double.parseDouble(response.body().getLat());
                    longitude = Double.parseDouble(response.body().getLng());
                    fullname = response.body().getNamaLengkap();
                    address = response.body().getAlamat();
                    phone = response.body().getNoTelp();
                    code = response.body().getCode();
                    Toast.makeText(MainActivity.this, codeData+" "+fullname, Toast.LENGTH_SHORT).show();
                    loadMap();
                }else{
                    Toast.makeText(MainActivity.this, "Kode pelanggan tidak ada", Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<ModelData> call, Throwable t) {
                Toast.makeText(MainActivity.this, t.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });

    }
    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;
        setUpMap();

    }

    @Override
    public void onStart(){
        super.onStart();

        if(mMap != null){ //prevent crashing if the map doesn't exist yet (eg. on starting activity)
            mMap.clear();

            setUpMap();
        }
    }

    public void setUpMap(){

        LatLng location = new LatLng(-6.5239622, 111.8447699);
        mMap.moveCamera(CameraUpdateFactory.newLatLngZoom(location, 5));

        mMap.moveCamera(CameraUpdateFactory.newLatLng(location));
        if (ActivityCompat.checkSelfPermission(MainActivity.this, android.Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(MainActivity.this, android.Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            // TODO: Consider calling
            //    ActivityCompat#requestPermissions
            // here to request the missing permissions, and then overriding
            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
            //                                          int[] grantResults)
            // to handle the case where the user grants the permission. See the documentation
            // for ActivityCompat#requestPermissions for more details.
            return;
        }

        mMap.setMapType(GoogleMap.MAP_TYPE_NORMAL);
        mMap.getUiSettings().setZoomControlsEnabled(true);
        mMap.getUiSettings().setCompassEnabled(true);
        mMap.getUiSettings().setAllGesturesEnabled(true);
        mMap.getUiSettings().setMyLocationButtonEnabled(true);
        if (ActivityCompat.checkSelfPermission(this, android.Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, android.Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {

            return;
        }

        mMap.setMyLocationEnabled(true);
    }


    public void loadMap(){
        if(mMap != null){

                // Add a marker in Sydney and move the camera
                LatLng location = new LatLng(latitude, longitude);
                mMap.addMarker(new MarkerOptions().position(location).title(codeData).snippet(fullname +" - "+address ));


                mMap.moveCamera(CameraUpdateFactory.newLatLng(location));
                mMap.moveCamera(CameraUpdateFactory.newLatLngZoom(location, 14));
                mMap.setMapType(GoogleMap.MAP_TYPE_NORMAL);
                mMap.getUiSettings().setZoomControlsEnabled(true);
                mMap.getUiSettings().setCompassEnabled(true);
                mMap.getUiSettings().setAllGesturesEnabled(true);
                mMap.getUiSettings().setMyLocationButtonEnabled(true);

                if (ActivityCompat.checkSelfPermission(MainActivity.this, android.Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(MainActivity.this, android.Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
                    // TODO: Consider calling
                    //    ActivityCompat#requestPermissions
                    // here to request the missing permissions, and then overriding
                    //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
                    //                                          int[] grantResults)
                    // to handle the case where the user grants the permission. See the documentation
                    // for ActivityCompat#requestPermissions for more details.
                    return;
                }
        }
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
    }
}
