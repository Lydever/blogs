package itheima;
import java.util.Scanner;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
public class DateTimeformat {


public static void main(String[] args){
		Scanner scanner = new Scanner(System.in);
		String date = scanner.nextLine();
		System.out.println("请输入第一个日期的年月日,并用-隔开");
		SimpleDateFormat  simpleFormat = new SimpleDateFormat("yyyy-MM-dd");
		String formDate = simpleFormat("2019-08-04");
		String toDate = simpleFormat("2019-08-22");
		long form = simpleFormat.parse(formDate).getTime();
		long to = simpleFormat.parse(toDate).getTime();
		int days = (int)((to-form)/(1000*60*60*24));
		System.out.println(days);
		
		


}
}
