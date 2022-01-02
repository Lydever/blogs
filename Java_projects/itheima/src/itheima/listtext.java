package itheima;
import java.util.LinkedList;
public class listtext {

	public static void main(String[] args) {
	 LinkedList list = new LinkedList();
	 list.add("stu1");
	 list.add("stu2");
	 System.out.println(list);
	 list.offer("offer");
	 list.push("push");
	 System.out.println(list);
	 Object object = list.peek();
	 System.out.println(object);
	 list.removeFirst();
	 list.pollLast();
	 System.out.println(list);
	 
	}

}
