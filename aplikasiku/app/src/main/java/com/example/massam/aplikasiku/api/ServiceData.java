package com.example.massam.aplikasiku.api;

import com.example.massam.aplikasiku.model.ModelData;

import java.util.ArrayList;

import retrofit2.Call;
import retrofit2.http.GET;
import retrofit2.http.Path;
import retrofit2.http.Query;

/**
 * Created by massam on 10/01/18.
 */

public interface ServiceData {

    @GET("DataPelanggan")
    Call<ModelData> getData(@Query("id") String code);

}
