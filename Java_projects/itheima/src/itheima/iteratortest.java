package itheima;

import java.util.ArrayList;
public class iteratortest {
	static String[] strs = {"qqq","www","eee","rrr","yyy"};
	public static void main(String[] args) {
	
		for(String str:strs){
			str ="uuu";
		}
            for(int i=0;i<strs.length;i++){
            	strs[i]="uuu";
            }
            System.out.println(strs[0]+","+strs[1]+","+strs[2]+","+strs[3]+","+strs[4]);
	}
	
}
