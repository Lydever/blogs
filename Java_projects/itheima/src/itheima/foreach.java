package itheima;
import java.util.ArrayList;
import java.util.Iterator;
public class foreach {

	public static void main(String[] args) {
		ArrayList list = new ArrayList();
          list.add("date_1");
          list.add("winer");
          list.add("lizi");
          list.add("thghj");
          list.add("4657");
          list.add("张三");
          list.add("password");
          list.add("reality");
          list.add("date_9");
          list.add("李四");
          System.out.println(list);
          list.forEach(obj->System.out.println("迭代集合元素:"+obj));
          
          
          Iterator iterator = list.iterator();
          while (iterator.hasNext()){
          Object obj = iterator.next();
          System.out.println(obj);

  	}
	}

}
