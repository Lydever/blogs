package itheima;

public class thread_13 {

	public static void main(String[] args) throws Exception{
		// TODO Auto-generated method stub
		thread_Thread t1 = new thread_Thread(1,10);
		t1.start();
		
		thread_Thread t2 = new thread_Thread(11,20);
		t2.start();
		
		t1.join();
		t2.join();
		
		thread_Thread t3 = new thread_Thread(21,30);
		t3.start();
		
		thread_Thread t4 = new thread_Thread(31,40);
		t4.start();
		
		t3.join();
		t4.join();
		
		thread_Thread t5 = new thread_Thread(41,50);
		t5.start();
		
		thread_Thread t6 = new thread_Thread(51,60);
		t6.start();
		
		t5.join();
		t6.join();
		thread_Thread t7 = new thread_Thread(61,70);
		t7.start();
		
		thread_Thread t8 = new thread_Thread(71,80);
		t8.start();
		
		t7.join();
		t8.join();
		
		thread_Thread t9 = new thread_Thread(81,90);
		t9.start();
		
		thread_Thread t10 = new thread_Thread(91,100);
		t10.start();
		
		t9.join();
		t10.join();
		
		int s = t1.sum+t2.sum+t3.sum+t4.sum+t5.sum+t6.sum+t7.sum+t8.sum+t9.sum+t10.sum;
		
		System.out.println(s);
	}

}


class thread_Thread extends Thread{
	
	int sum=0;
	int start,end;
	
	public thread_Thread(int start,int end){
		this.start = start;
		this.end = end;
	}
	
	public void run(){
		for(int i=start;i<end;i++)
			sum+=i;
		
	}
}


