package itheima;
import java.util.Scanner;
public class text_2 {

	public static void main(String[] args) {
		System.out.println("请输入一个英文句子");
		Scanner scanner = new Scanner(System.in);
		String word = scanner.nextLine();
		word = word.toLowerCase();
		StringBuffer stringBuffer = new StringBuffer(word);
		String consonant = "eioua";
		int result = 0;
		String temp = "";
		for(int i=0;i<word.length();i++){
			result = consonant.indexOf(String.valueOf(word.charAt(i)));
			if(result ==-1){
				temp = String.valueOf(word.charAt(i));
				stringBuffer.deleteCharAt(i);
				break;
				
			}
			System.out.println(stringBuffer+temp+"ay");
		}

	}

}
