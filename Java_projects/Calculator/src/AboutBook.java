
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;

public class AboutBook extends JFrame{
	public AboutBook(){
		super("关于计算器");
		this.setSize(220, 100);
		this.setLocation(200,300);
		this.setResizable(false);
		this.setDefaultCloseOperation(DISPOSE_ON_CLOSE);
		this.setVisible(true);
		
		JPanel panel = new JPanel();
		JLabel label = new JLabel("日期:2019-12-31");
		
		panel.add(label);
		this.add(panel);
	}
}
