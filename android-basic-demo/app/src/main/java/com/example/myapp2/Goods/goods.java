package com.example.myapp2.Goods;

public class goods {
    private String name;
    private String category;
    private int price;
    private String comment;
    private int imageId;
    public goods( int imageId,String name, String category, int price, String comment) {
        this.imageId = imageId;
        this.name = name;
        this.category = category;
        this.price = price;
        this.comment = comment;
    }

    public goods()
    {}

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public double getPrice() {
        return price;
    }

    public void setPrice(int price) {
        this.price = price;
    }

    public String getComment() {
        return comment;
    }

    public void setComment(String imageId) {
        this.comment = comment;
    }

    public int getImageId(){
        return imageId;
    }

    public void setImageId(int imageId) {
        this.imageId = imageId;
    }

}
