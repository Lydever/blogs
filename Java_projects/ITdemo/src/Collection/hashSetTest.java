package Collection;
import java.util.*;


public class hashSetTest {
/*在hashSet集合中添加三个对象,把名字相同当做同一个人,禁止禁止重复添加*/
	public static void main(String[] args) {
		HashSet hashSet=new HashSet();
        Person p1=new Person("libaobao",13);
        Person p2=new Person("libaobao1",13);
        Person p3=new Person("libaobao2",13);
        Person p4=new Person("libaobao3",13);
        Person p5=new Person("libaobao4",13);
        hashSet.add(p1);
        hashSet.add(p2);
        hashSet.add(p3);
        hashSet.add(p4);
        hashSet.add(p5);
		for(Object obj:hashSet){
			Person p=(Person)obj;
			System.out.println(p.name+":"+p.age);
			
		}

	}

}

class Person{
	String name;
	int age;
	public Person(String name,int age){
		super();
		this.name=name;
		this.age=age;
	}
	public int hashCode(){
		return name.hashCode();
	}
	
	public boolean equals(Object obj){
		if(this==obj)
			return true;
		if(obj==null)
			return false;
		Person other=(Person) obj;
		return other.name.equals(this.name);
	}
}