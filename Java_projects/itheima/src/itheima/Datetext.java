package itheima;
import java.util.Scanner;
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.*;
public class Datetext {

	public static void main(String[] args) throws ParseException{
		Scanner sc = new Scanner(System.in);
		String s1 = sc.next();
		String s2 = sc.next();
		SimpleDateFormat format = new SimpleDateFormat("yyyy-MM-dd");
		Date date1 = format.parse(s1);
		Date date2 = format.parse(s2);
		int date3 = (int)((date2.getTime()-date1.getTime())/(1000*60*60*24));
		System.out.println("这两个日期相差:"+date3+"天");
		
	}

}
