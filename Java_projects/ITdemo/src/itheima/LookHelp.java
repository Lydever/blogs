package itheima;
import javax.swing.*;

import java.awt.*;
 
public class LookHelp extends JFrame{
	
	public LookHelp(){
		super("�鿴����");
		this.setSize(500, 300);
		this.setLocation(200,300);
		this.setResizable(false);
		this.setDefaultCloseOperation(DISPOSE_ON_CLOSE);
		this.setVisible(true);
		
		Container c = this.getContentPane();
		c.setLayout(new GridLayout(5,0));
		
		JLabel label1 = new JLabel("1���˵����Ĳ˵���ɵ����ѡ���ܡ�");
		JLabel label2 = new JLabel("2�����༭����ļ��С����ơ�ճ�����ÿ�ݼ�Ctrl + x��Ctrl + c��Ctrl + vʵ�֡�");
		JLabel label3 = new JLabel("3������ʽ����ġ��Զ����С���Ҫ���вſɽ����Զ����У������һֱ����д��");
		JLabel label4 = new JLabel("4���˵�������ĸ�ʽ�����������ı������塣");
		JLabel label5 = new JLabel("5�������±���ȱ�����޷��ı��������ʽ����С����̬��");
		c.add(label1);c.add(label2);c.add(label3);c.add(label4);c.add(label5);
	}
}
