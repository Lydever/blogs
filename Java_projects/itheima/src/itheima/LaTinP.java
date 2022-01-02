package itheima;
import java.util.*;
import java.util.Scanner;
public class LaTinP {
	
public static void main(String[] args) {
		Set set = new HashSet();
	
		Scanner scan = new Scanner(System.in);
		String s = scan.nextLine();
		for(int i=0;i<s.length();i++){
			if(!set.contains(s.charAt(i))){
				char c = s.charAt(i);
				s = s.substring(0,i)+s.substring(i+1,s.length());
				s+=" ";
				s+=c;
				s+="ay";
				break;
			}
			System.out.println(s);
		}

	}

}
