package itheima;
import java.util.*;
import java.util.Scanner;
public class pigL {

	public static void main(String[] args) {
		   Set set = new HashSet();
		        set.add('A');
				set.add('E');
				set.add('I');
				set.add('O');
				set.add('U');
				set.add('a');
				set.add('e');
				set.add('i');
				set.add('o');
				set.add('u');
				Scanner scan = new Scanner(System.in);
				String s = scan.nextLine();
				for(int i=0;i<s.length();i++){
					if(!set.contains(s.charAt(i))){
						char c = s.charAt(i);
						s = s.substring(0,i)+s.substring(i+1,s.length());
						s+="-";
						s+=c;
						s+="ay";
						break;
					}
					System.out.println(s);
				}

			}


	}


