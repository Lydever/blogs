package itheima;
import java.util.*;
public class Canlendartext {

	public static void main(String[] args) {

		  Calendar calendar = Calendar.getInstance();
		int year = calendar.get(Calendar.YEAR);
		int month = calendar.get(Calendar.MONTH)+1;
		int date = calendar.get(Calendar.DATE);
		System.out.println("当前日期为："+year+"年"+month+"月"+date+"日");
		calendar.add(Calendar.DATE,100);
		System.out.println("100天后的日期为："+year+"年"+month+"月"+date+"日");

		}

	}


