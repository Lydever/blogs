package Thread;

public class SellTicket {

	public static void main(String[] args) {
		// TODO Auto-generated method stub

		TicketWindow tw = new TicketWindow();
		Thread t1 = new Thread(tw,"一号窗口");
		Thread t2 = new Thread(tw,"二号窗口");
		Thread t3 = new Thread(tw,"三号窗口");
		t1.start();
		t2.start();
		t3.start();
	}

}

class TicketWindow implements Runnable{
	private int tickets=10;
	
	public synchronized void run(){
		while(true){
			if(tickets>0){
				System.out.println(Thread.currentThread().getName()+"准备出票,还剩余:"+tickets+"张");
				tickets--;
				System.out.println(Thread.currentThread().getName()+"卖出一张,还剩余:"+tickets+"张");
			}
			else{
				System.out.println("余票不足,暂停出售!");
				try{Thread.sleep(1000*60*5);
				}catch(InterruptedException e){
					e.printStackTrace();
				}
			}
		}
	}
}
