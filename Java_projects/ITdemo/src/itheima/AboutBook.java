package itheima;

import javax.swing.*;

public class AboutBook extends JFrame{
	public AboutBook(){
		super("关于记事本");
		this.setSize(220, 100);
		this.setLocation(200,300);
		this.setResizable(false);
		this.setDefaultCloseOperation(DISPOSE_ON_CLOSE);
		this.setVisible(true);
		
		JPanel panel = new JPanel();
		JLabel label = new JLabel("日期:2019-12-14");
		
		panel.add(label);
		this.add(panel);
	}
}

