package itheima;
import java.util.Random;
public class RandomNum {
public static void main(String[] args) {
			Random rand = new Random();
			int[] num = new int[5];
			for(int i=0; i<num.length;i++){
				num[i] = 20 + rand.nextInt(11);
				System.out.println(num[i]);
			}
		}

	}



