package itheima;
import java.util.*;

class Person{
	
	private String age;
	private String name;
	public Person(String age,String name){
		this.age = age;
		this.name = name;
	}
	
	public String toString(){
		return age+":"+name;
	}
	
	public int hashCode(){
		return name.hashCode();
	}
	
	public boolean equls(Object obj){
		if(this  == obj){
			return true;
		}
		if(!(obj instanceof Person)){
			return false;
		}
		
		Person p1 = (Person) obj;
		boolean b = this.name.equals(p1.name);
		return b;
	}
	
}


