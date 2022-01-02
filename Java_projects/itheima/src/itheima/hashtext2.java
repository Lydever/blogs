package itheima;
import java.util.*;
class Student{
	
	private String id;
	private String name;
	public Student(String id,String name){
		this.id = id;
		this.name = name;	
	}
	
	public String toString(){
		return id+";"+name;
	}
	
	
	public int hashCode(){
		return id.hashCode();
	}

	public boolean equals(Object obj){
		if(this ==obj){
			return true;
		}
		if(!(obj instanceof Student)){
			return false;
		}
		Student stu = (Student) obj;
		boolean b = this.id.equals(stu.id);
		return b;
	}
}


