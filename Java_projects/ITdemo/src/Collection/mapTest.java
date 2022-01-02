package Collection;
import java.util.Comparator;
import java.util.Iterator;
import java.util.Set;
import java.util.TreeMap;

public class mapTest {
/*选择适合的Map集合保存6位学生的学号和姓名,然后按学号的自然顺序的倒叙将这些致打印出来*/
	public static void main(String[] args) {
		TreeMap map = new TreeMap(new MyComparator());
		map.put("1", "Licy");
		map.put("2","Rocy");
		map.put("3", "LicyS");
		map.put("4","TRocy");		
		map.put("5", "gLicy");
		map.put("6","WRocy");
		Set keySet=map.keySet();
		Iterator it=keySet.iterator();
		while(it.hasNext()){
			Object key=it.next();
			Object value=map.get(key);
			System.out.println(key=","+value);
		}
	}

}

class MyComparator implements Comparator{

	@Override
	public int compare(Object o1, Object o2) {
		// TODO Auto-generated method stub
		String e1=(String)o1;
		String e2=(String)o2;
		return e2.compareTo(e1);
	}
	
}