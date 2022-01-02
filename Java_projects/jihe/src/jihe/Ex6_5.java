package jihe;
import java.util.HashMap;
import java.util.Map.Entry;
/*编写一个程序,创建一个HashMap对象,用于存储学生信息*/
public class Ex6_5 {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
     Student stu1 = new Student(1001,"李子",16);
     Student stu2 = new Student(1002,"陈子",17);
     Student stu3 = new Student(1003,"张子",18);
     
     HashMap<Integer,Student> map = new HashMap<Integer,Student>();
     map.put(1,stu1);
     map.put(2,stu2);
     map.put(3,stu3);
     for(Entry<Integer,Student> entry:map.entrySet()){
    	 System.out.println(entry.getValue());
     }
	}
}

class Student{
	int id;
	String name;
	int age;
	
	public Student(int id,String name,int age){
		super();
		this.id=id;
		this.name=name;
		this.age=age;	
	}
	
	public String toString(){
		return "学生学号为:"+this.id+"学生姓名为:"+this.name+"学生年龄为:"+this.age;
	}
}
