package itheima;

class NoteWindow implements Runnable{
private int notes = 80;
public void run(){
	while(true){
		if(notes>0){
			System.out.println(Thread.currentThread().getName()+"正在发送第"+notes--+"份笔记");
		}
	 }
  }
}




public class noteThread {

	public static void main(String[] args) {
		//创建TicketWindow实例对象nw
		NoteWindow nw = new NoteWindow();
		new Thread(nw,"传智播客李老师").start();
		new Thread(nw,"传智播客张老师").start();
		new Thread(nw,"传智播客王老师").start();

	}

}