package itheima;

public class Stringtext_1 {

	public static void main(String[] args) {

	StringBuffer  str = new StringBuffer("I am a student");
	str.replace(7,15,"teacher");
	System.out.println("修改的结果为:"+str);
	
	
	String str1="I am a student";
	str1=str1.replace("student", "teacher");  
	System.out.println(str1);
}
}

