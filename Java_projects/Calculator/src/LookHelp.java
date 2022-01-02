
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
		
		JLabel label0 = new JLabel("常见的计算器又有四类");
		JLabel label1 = new JLabel("1、算术型计算器——可进行加、减、乘、除等简单的四则运算，又称简单计算器。一般都是实物计算器。");
		JLabel label2 = new JLabel("2、科学型计算器——可进行乘方、开方、指数、对数、三角函数、统计等方面的运算，又称函数计算器。 可以是软件,也可以是实物。");
		JLabel label3 = new JLabel("3、程序员计算器——专门为程序员设计的计算器, 主要特点是支持And, Or, Not, Xor： 最基本的与或非和异或操作, 移位操作 Lsh,"
				                  + "Rsh：全称是Left Shift和Right Shift，也就是左移和右移操作，你需要输入你要移动的位数（不能大于最大位数） RoL, RoR：全称是"
				                   + "Rotate Left和Rotate Right，对于RoL来讲，就是向左移动一位，并将移出的那位补到最右边那位上，RoR类似");
		JLabel label4 = new JLabel("4、 统计计算器-- 为有统计要求的人员设计的设计的计算器, 可以是软件,也可以是实物");
		JLabel label5 = new JLabel("5、科学计算：可进行函数、对数运算，以及阶乘、幂运算等。物");
		
		c.add(label0);
		c.add(label1);
		c.add(label2);
		c.add(label3);
		c.add(label4);
		c.add(label5);
	}
}

