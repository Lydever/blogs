package itheima;

//定义一个实现Runnable接口的实现类
class TicketWindow1 implements Runnable{
private int tickets = 100;
public void run(){
	while(true){
		if(tickets>0){
			System.out.println(Thread.currentThread().getName()+"正在发售第"+tickets--+"张票");
		}
	 }
  }
}




public class ticketsTest {

	public static void main(String[] args) {
		//创建TicketWindow实例对象tw
		TicketWindow1 tw = new TicketWindow1();
		new Thread(tw,"窗口1").start();
		new Thread(tw,"窗口2").start();
		new Thread(tw,"窗口3").start();
		new Thread(tw,"窗口4").start();

	}

}