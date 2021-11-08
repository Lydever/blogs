package com.example.sqlite3.Model;

public class User {
    private String userName;
    private String sex;
    private String Password;
    private int year_birth;
    private int month_birth;
    private int day_birth;
    private String school;
    private String city;
    private String subject;
    private String[] hobbys;
    private String otherHobbys;
    public User(){}

    public User(String userName, String sex, String password, int year_birth, int month_birth, int day_birth, String city) {
        this.userName = userName;
        this.sex = sex;
        Password = password;
        this.year_birth = year_birth;
        this.month_birth = month_birth;
        this.day_birth = day_birth;
        this.city = city;
    }

    public User(String userName, String sex, String password, int year_birth, int month_birth, int day_birth, String school, String city, String subject, String[] hobbys, String otherHobbys) {
        this.userName = userName;
        this.sex = sex;
        Password = password;
        this.year_birth = year_birth;
        this.month_birth = month_birth;
        this.day_birth = day_birth;
        this.school = school;
        this.city = city;
        this.subject = subject;
        this.hobbys = hobbys;
        this.otherHobbys = otherHobbys;
    }

    public String getUserName() {
        return userName;
    }

    public void setUserName(String userName) {
        this.userName = userName;
    }

    public String getSex() {
        return sex;
    }

    public void setSex(String sex) {
        this.sex = sex;
    }

    public String getPassword() {
        return Password;
    }

    public void setPassword(String password) {
        Password = password;
    }

    public int getYear_birth() {
        return year_birth;
    }

    public void setYear_birth(int year_birth) {
        this.year_birth = year_birth;
    }

    public int getMonth_birth() {
        return month_birth;
    }

    public void setMonth_birth(int month_birth) {
        this.month_birth = month_birth;
    }

    public int getDay_birth() {
        return day_birth;
    }

    public void setDay_birth(int day_birth) {
        this.day_birth = day_birth;
    }

    public String getSchool() {
        return school;
    }

    public void setSchool(String school) {
        this.school = school;
    }

    public String getCity() {
        return city;
    }

    public void setCity(String city) {
        this.city = city;
    }

    public String getSubject() {
        return subject;
    }

    public void setSubject(String subject) {
        this.subject = subject;
    }

    public String[] getHobbys() {
        return hobbys;
    }

    public void setHobbys(String[] hobbys) {
        this.hobbys = hobbys;
    }

    public String getOtherHobbys() {
        return otherHobbys;
    }

    public void setOtherHobbys(String otherHobbys) {
        this.otherHobbys = otherHobbys;
    }
}
