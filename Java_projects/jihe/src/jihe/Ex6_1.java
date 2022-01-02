package jihe;
import java.util.*;
import java.util.function.*;
public class Ex6_1 {
	
		
		public static void main(String[] args){
		ArrayList list1 = new ArrayList();
		
		list1.add(12);
		list1.add(16);
		list1.add(90);
		list1.add(-5);
		
		//±éÀú foreachÑ­»·
		for(Object obj:list1){
			System.out.println(obj);
		}
		
		//Iterator hasNext()
		Iterator it = list1.iterator();
		while(it.hasNext()){
			System.out.println(it.next());
		}
		
		list1.forEach(t->System.out.println(t));
		list1.sort(new MyComparator12());
		list1.sort((o1,o2)->{
			                  Integer i1=(Integer)o1;
			Integer i2=(Integer)o2;
			return i1.intValue()-i2.intValue();});
		    list1.forEach(t->System.out.println(t));
		
	}
}

class MyComparator12 implements Comparator{
	public int compare(Object o1,Object o2){
		Integer i1=(Integer)o1;
		Integer i2=(Integer)o2;
		
		if(i1.intValue()<i2.intValue()){
			return -1;
			
		}
		else if(i1.intValue()>i2.intValue()){
			return 1;
		}
		else{
			return 0;
		}
	}
}


