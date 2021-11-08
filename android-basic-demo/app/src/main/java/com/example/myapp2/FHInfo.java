package com.example.myapp2;
import java.io.Serializable;
public class FHInfo implements  Serializable {
    private String birthday;
    private boolean isMan;
    private boolean ischeckBox41;
    private boolean ischeckBox42;
    private boolean ischeckBox43;
    private int fh;
    private int mh;

    public String getBirthday() {
        return birthday;
    }

    public void setBirthday(String birthday) {
        this.birthday = birthday;
    }

    public boolean isMan() {
        return isMan;
    }

    public void setMan(boolean man) {
        isMan = man;
    }


    public boolean isIscheckBox41() {
        return ischeckBox41;
    }

    public void setIscheckBox41(boolean ischeckBox41) {
        this.ischeckBox41 = ischeckBox41;
    }

    public boolean isIscheckBox42() {
        return ischeckBox42;
    }

    public void setIscheckBox42(boolean ischeckBox42) {
        this.ischeckBox42 = ischeckBox42;
    }

    public boolean isIscheckBox43() {
        return ischeckBox43;
    }

    public void setIscheckBox43(boolean ischeckBox43) {
        this.ischeckBox43 = ischeckBox43;
    }

    public int getFh() {
        return fh;
    }

    public void setFh(int fh) {
        this.fh = fh;
    }

    public int getMh() {
        return mh;
    }

    public void setMh(int mh) {
        this.mh = mh;
    }
}
