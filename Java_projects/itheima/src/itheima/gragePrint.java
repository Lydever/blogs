package itheima;
import java.util.Scanner;
public class gragePrint {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
       System.out.println("请输入您的成绩:");
       Scanner sc = new Scanner(System.in);
       int score = sc.nextInt();
       if(score<=100 && score>=90){
    	   System.out.println("优");
       }
       else if(score<90 && score>=80){
    	   System.out.println("良");
       }
       else if(score<80 && score>=70){
    	   System.out.println("中");
       }
       else if(score<70 && score>=60){
    	   System.out.println("及格");
       }
       else if(score<60 && score>=0){
    	   System.out.println("不及格");
       }
       else{
    	   System.out.println("无效成绩");
       }
 
	}

}
