package com.ardianhilmip.tunascahaya.ModelResponse;

import com.google.gson.annotations.SerializedName;

import java.util.List;

public class KatalogResponse {
    @SerializedName("users")
    List<Katalog> userList;
    String error;

    public KatalogResponse (List<Katalog> userList, String error) {
        this.userList = userList;
        this.error = error;
    }

    public List<Katalog> getUserList() {
        return userList;
    }

    public void setUserList(List<Katalog> userList) {
        this.userList = userList;
    }

    public String getError() {
        return error;
    }

    public void setError(String error) {
        this.error = error;
    }

}
