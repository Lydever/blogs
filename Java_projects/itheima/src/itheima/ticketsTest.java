package itheima;

//����һ��ʵ��Runnable�ӿڵ�ʵ����
class TicketWindow1 implements Runnable{
private int tickets = 100;
public void run(){
	while(true){
		if(tickets>0){
			System.out.println(Thread.currentThread().getName()+"���ڷ��۵�"+tickets--+"��Ʊ");
		}
	 }
  }
}




public class ticketsTest {

	public static void main(String[] args) {
		//����TicketWindowʵ������tw
		TicketWindow1 tw = new TicketWindow1();
		new Thread(tw,"����1").start();
		new Thread(tw,"����2").start();
		new Thread(tw,"����3").start();
		new Thread(tw,"����4").start();

	}

}