package itheima;

import java.util.Scanner;

public class dateTest {
int year;
int month;
int day;
//无参构造
public dateTest() {
	year = 1949;
	month = 10;
	day = 1;
}
//有参构造
public dateTest(int year,int month,int day) {
	this.year = year;
	this.month = month;
	this.day = day;
	System.out.println("请输入年份日期 :");
    Scanner sc = new Scanner(System.in);
    int dateTest = sc.nextInt();
}
//返回年份方法
public int getYear(int year) {
	return year;
}
//返回月份
public int getMonth(int month) {
	return month;
}
//返回月份
public int getDay(int day) {
	return day;
}
//设置日期
public void setDate(int year,int month,int day) {
	this.year = year;
	this.month = month;
	this.day = day;
	 System.out.println(year+" "+month+" "+day);
}
//返回是否为闰年
public boolean isLeapYear(int year) {
	if(year%400==0||year%4==0&&year%100!=0) {
		return true;
	}
	return false;
}
//返回这个月有几天
public int daysOfMonth(int year,int month) {
	int a=0;
	switch(month) {
		case 1:a = 31;break;
		case 2:if(year%400==0||year%4==0&&year%100!=0) {
			a = 29;
		}
		else
			a = 28;break;
		case 3:a = 31;break;
		case 4:a = 30;break;
		case 5:a = 31;break;
		case 6:a = 30;break;
		case 7:a = 31;break;
		case 8:a = 31;break;
		case 9:a = 30;break;
		case 10:a = 31;break;
		case 11:a = 30;break;
		case 12:a = 31;break;
	
}
	return a;
}
//测试方法
public static void main(String[] args) {
	dateTest date = new dateTest();
	System.out.println("测试初始化时间"+date.year+"年"+date.month+"月"+date.day+"日");
    System.out.println("测试返回年份"+date.getYear(1999));
    System.out.println("测试返回月份"+date.getMonth(12));
    System.out.println("测试返回天数"+date.getDay(28));
    date.setDate(2019,10,23);
    System.out.println(date.isLeapYear(2019));
    System.out.println("测试返回这个月天数"+date.daysOfMonth(2019, 10));
}
}
