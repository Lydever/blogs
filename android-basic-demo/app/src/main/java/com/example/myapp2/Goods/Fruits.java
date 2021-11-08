package com.example.myapp2.Goods;

public class Fruits {
    private String name;
    private String message;
    private int imageId;
    private int color;

    public Fruits()
    {}
    public Fruits(int imageId, String name, String message, int color) {
        this.imageId = imageId;
        this.name = name;
        this.message = message;
        this.color = color;
    }


    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public int getImageId() {
        return imageId;
    }

    public void setImageId(int imageId) {
        this.imageId = imageId;
    }

    public int getColor() {
        return color;
    }

    public void setColor(int color) {
        this.color = color;
    }



}
