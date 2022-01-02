package itheima;
import javax.swing.*;

import java.awt.*;
 
public class LookHelp extends JFrame{
	
	public LookHelp(){
		super("查看帮助");
		this.setSize(500, 300);
		this.setLocation(200,300);
		this.setResizable(false);
		this.setDefaultCloseOperation(DISPOSE_ON_CLOSE);
		this.setVisible(true);
		
		Container c = this.getContentPane();
		c.setLayout(new GridLayout(5,0));
		
		JLabel label1 = new JLabel("1、菜单栏的菜单项可点击来选择功能。");
		JLabel label2 = new JLabel("2、“编辑”里的剪切、复制、粘贴可用快捷键Ctrl + x、Ctrl + c、Ctrl + v实现。");
		JLabel label3 = new JLabel("3、“格式”里的“自动换行”需要点中才可进行自动换行，否则会一直往后写。");
		JLabel label4 = new JLabel("4、菜单栏下面的格式是用来调节文本的字体。");
		JLabel label5 = new JLabel("5、本记事本的缺点是无法改变字体的样式，大小和形态。");
		c.add(label1);c.add(label2);c.add(label3);c.add(label4);c.add(label5);
	}
}

