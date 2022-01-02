package itheima;
import java.util.*;
import java.util.stream.Stream;
public class stream_text2 {

	public static void main(String[] args) {
		Integer[] array ={2,1,8,0,6,3};
		List<Integer>list = Arrays.asList(array);
		
		Stream<Integer>stream = list.stream();
		stream.forEach(i->System.out.print(i+" "));
		System.out.println();
		
		Stream<Integer>stream2 = Stream.of(array);
		stream2.forEach(i->System.out.print(i+" "));
		System.out.println();
		
		Stream<Integer>stream3 = Arrays.stream(array);
		stream.forEach(i->System.out.println(i+" "));
		

	}

}
