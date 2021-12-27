package com.ardianhilmip.tunascahaya.ModelResponse;

public class Katalog {
    int id_katalog;
    String nama_bangunan,gambar,alamat;

    public Katalog(int id_katalog, String nama_bangunan, String gambar, String alamat) {
        this.id_katalog = id_katalog;
        this.nama_bangunan = nama_bangunan;
        this.gambar = gambar;
        this.alamat = alamat;
    }

    public int getId_katalog() {
        return id_katalog;
    }

    public void setId_katalog(int id_katalog) {
        this.id_katalog= id_katalog;
    }

    public String getNama_bangunan() {
        return nama_bangunan;
    }

    public void setNama_bangunan(String nama_bangunan) {
        this.nama_bangunan = nama_bangunan;
    }

    public String getGambar() {
        return gambar;
    }

    public void setGambar(String gambar) {
        this.gambar = gambar;
    }

    public String getAlamat() {
        return alamat;
    }

    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }


}
