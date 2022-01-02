package jihe;

import java.util.HashSet;
import java.util.Scanner;

import javax.swing.plaf.synth.SynthSpinnerUI;
//从键盘获取一串字符串,除去重复字符串
public class Ex6_7 {

	public static void main(String[] args) {
		// TODO Auto-generated method stub

		//创建键盘输入对象
		Scanner sc = new Scanner(System.in);
		System.out.println("请输入一行字符串");
		String line = sc.nextLine();
		
		//字符串转换为字符数组
		char[] c = line.toCharArray();
		
		//字符数组转换为集合对象 ,创建HashSet
		HashSet<Character> hs = new HashSet<>();
		
		//遍历数组 ,元素依次添加入数组
		for(Character character:hs){
			System.out.println(character);
		}
		
	}

}
