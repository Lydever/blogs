package jihe;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;
public class Ex6_3 {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		
       //1.线性表中存储5个整型数字  遍历每个元素并打印输出
		List<Integer>list  = new ArrayList<Integer>();
		list.add(1);
		list.add(2);
		list.add(3);
		list.add(4);
		list.add(5);
		Iterator<Integer> it = list.iterator();
		
		//迭代遍历
		while(it.hasNext()){
			System.out.println(it.next());
		}
		
		//for循环遍历
		for(int i=0;i<list.size();i++){
			System.out.println(list.get(i));
		}
		
		//增强for循环
		for(Integer i:list){
			System.out.println(i);
		}
	}
	
	
	

}
