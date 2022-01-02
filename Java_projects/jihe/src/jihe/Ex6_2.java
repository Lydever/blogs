package jihe;
import java.util.*;

public class Ex6_2 {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
  TreeSet ts = new TreeSet(new myComparator1());
  Student1 s1 = new Student1("1","zhangsan",20);
  
  
	}

}


//自然排序
class Student1 implements Comparable{
	String number;
	String name;
	int age;                                                         
	}
	
	//定义比较器
	class myComparator1 implements Comparator{
		public int compare(Object o1,Object o2){
			Student1 s1=(Student1)o1;
			Student1 s2=(Student1)o2;
			return s2.age-s1.age;
		}
	}
	
	
	
	
	
}