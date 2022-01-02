package jihe;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

/* 从控制台输入若干个单词放入集合,将这些排序后打印出来*/
public class Ex6_6 {

	public static void main(String[] args) {
		// TODO Auto-generated method stub

		List<String> list = new ArrayList<String>();
		Scanner in = new Scanner(System.in);
		System.out.println("请输入需要排序的单词量:");
		
		int num = in.nextInt();
		System.out.println("请一次输入单词");
		
		for(int i=0;i<num;i++){
			list.add(in.next());
		}
		
		for(int j=0;j<list.size()-1;j++){
			for(int i=0;i<list.size()-1-j;i++){
				if(list.get(i).compareTo(list.get(i+1))>0){
					String temp = list.get(i);
					list.set(i,list.get(i+1));
					list.set(i+1,temp);
				}
			}
		}
		
		for(int i=0;i<list.size();i++){
			System.out.println(list.get(i));
		}
	}

}
