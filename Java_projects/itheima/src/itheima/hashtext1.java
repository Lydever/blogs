package itheima;
import java.util.*;

class Student{
	String id;
	String name;
	public Student(String id,String name){
		this.id = id;
		this.name = name;
	}
	public String toString(){
		return id+":"+name;
	}
}



public class hashtext1 {

public static void main(String[] args) {
		
        HashSet hs = new HashSet();
        Student p1 = new Student("19","张三");
        Student p2 = new Student("17","李四");
        Student p3 = new Student("16","李四");
        hs.add(p1);
        hs.add(p2);
        hs.add(p3);
        System.out.println(hs);
	}

	
	
	
}
