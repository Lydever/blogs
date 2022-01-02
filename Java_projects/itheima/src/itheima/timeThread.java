package itheima;
import javax.swing.*;
import java.awt.*;
public class timeThread {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		timeThreadFrame f = new timeThreadFrame();
		
		MyThread mt = new MyThread(f.lbl);
		mt.start();
	}

}
class timeThreadFrame extends JFrame{

  JLabel lbl;

public timeThreadFrame(){
	
	lbl = new JLabel("1");
	this.add(lbl);
	
	this.setBounds(20,20,200,200);
	this.setVisible(true);
	this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	
  }
}

class MyThread extends Thread{
	
	JLabel lbl;
	
	MyThread(JLabel lbl){
		this.lbl = lbl;		
	}
	
	public void run(){
		
		for(int i=1;i<100;i++){
			
			lbl.setText(i+"");
			
			try{
				Thread.sleep(1000);	
			}
			catch(Exception e){
				System.out.println(e.getMessage());
				
			}
		}
	}
}















