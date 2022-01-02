package itheima;
import java.util.*;
import java.util.stream.Stream;
public class stream_text1 {

	public static void main(String[] args) {
		List<String>list = new ArrayList<>();
		list.add("lisi");
		list.add("zhansan");
		list.add("wangwu");
		//创建一个stream流
		Stream<String>stream = list.stream();
		
		//对其进行截取
		Stream<String>stream1 = stream.filter(i ->i.startsWith("li"));
		Stream<String>stream2 = stream1.limit(2);
		
		//遍历输出
		stream2.forEach(j->System.out.println(j));
		System.out.println("--------");
		
		//通过链式完成聚合操作
		list.stream().filter(i->i.startsWith("li")).limit(2)
		.forEach(j->System.out.println(j));
      
		
		
		
		
		
		
		
		
	}

}
