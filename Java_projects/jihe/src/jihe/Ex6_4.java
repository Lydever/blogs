package jihe;

import java.util.ArrayList;
import java.util.List;

public class Ex6_4 {

	public static void main(String[] args) {
		// TODO Auto-generated method stub

//		2.在一个列表中存储以下元素:
//	    apple,grape,banana,pear
//		返回集合中最大的和最小的元素
//		将集合进行排序,并将排序的结果打印在控制台上
		
		List<String> list = new ArrayList<String>();
		list.add("apple");
		list.add("grape");
		list.add("banana");
		list.add("pear");
		
		for(int j=0;j<list.size()-1;j++){
			for(int i=0;i<list.size()-1-j;i++){
				if(list.get(i).compareTo(list.get(i))>0){
					String temp = list.get(i);
					list.set(i,list.get(i+1));
					list.set(i+1,temp);
				}
			}
		}

		
		System.out.println("排序后的顺序是:");
		for(int i=0;i<list.size();i++){
			System.out.print(list.get(i)+" ");	
		}
		
		System.out.println();
		System.out.println("集合中最大的元素是:"+list.get(0));
		System.out.println("集合中最小的元素是:"+list.get(3));
	}

}
