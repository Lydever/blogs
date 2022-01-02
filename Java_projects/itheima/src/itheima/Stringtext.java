package itheima;

public class Stringtext {

	public static void main(String[] args) {
			int[] srcArray = {12,23,34,45,67,78,90};
			int[] destArray = {21,32,43,54,65,87,98};
			System.arraycopy(srcArray,2,destArray,0,4);
			for(int i=0;i<destArray.length;i++){
				System.out.println(i+":"+destArray[i]);
			}
	  	}

}
