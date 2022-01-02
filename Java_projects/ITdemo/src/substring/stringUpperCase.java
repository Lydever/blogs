package substring;
/* 字符串处理,实现首字母大写输出*/
public class stringUpperCase {

	public static void upperCase(String s){
		String split[]=s.split(" ");
		for(int i=0;i<split.length;i++){
			String s1=split[i].substring(0,1).toUpperCase()+split[i].substring(1);
			System.out.print(s1+" ");
		}
	}
	
	
	public static void main(String[] args) {
		// TODO Auto-generated method stub
    String s="I am very glad to see you";
    System.out.println(s);
    upperCase(s);
	}

}


