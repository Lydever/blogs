package itheima;
import java.awt.*;
import javax.swing.*;
import java.awt.event.*;

public class jisuanqi {

	public static void main(String[] args) {
		new jisuanqi_Frame();		

	}

}

class jisuanqi_Frame extends JFrame{
	JTextField txtNumber1,txtNumber2,txtResult;
	JLabel lbl1,lbl2;
	JButton btnPlus,btnMinus,btnMnlti,btnDevision;
	
	jisuanqi_Frame(){
		this.setLayout(new GridLayout(2,1));
		
		JPanel panel=new JPanel();
		txtNumber1=new JTextField(5);
		lbl1=new JLabel("+");
		txtNumber2=new JTextField(5);
		lbl2=new JLabel("=");
		txtResult=new JTextField(5);
		panel.add(txtNumber1);
		panel.add(lbl1);
		panel.add(txtNumber2);
		panel.add(lbl2);
		panel.add(txtResult);
		
		this.add(panel);
		
		JPanel panel2=new JPanel();
		btnPlus=new JButton("+");
		panel2.add(btnPlus);
		btnPlus.addActionListener(new MyActionHeader());
		
		btnPlus=new JButton("-");
		panel2.add(btnMinus);
		btnMinus.addActionListener(new MyActionHeader());
		
		btnPlus=new JButton("*");
		panel2.add(btnMnlti);
		btnMnlti.addActionListener(new MyActionHeader());
		
		btnPlus=new JButton("/");
		panel2.add(btnDevision);
		btnDevision.addActionListener(new MyActionHeader());
		
		this.add(panel2);
		this.setSize(400,250);
		this.setTitle("¼òµ¥¼ÆËãÆ÷");
		this.setVisible(true);
	
	}
	
	class MyActionHeader implements ActionListener{
		public void actionPerformed(ActionEvent e){
			String str=e.getActionCommand();
			Object source=e.getSource();
			String strNumber1=txtNumber1.getText();
			String strNumber2=txtNumber2.getText();
			double number1=Double.parseDouble(strNumber1);
			double number2=Double.parseDouble(strNumber2);
			double result=0;
			if(source==btnMinus){
				lbl1.setText("-");
				result=number1-number2;	
			}
			else if(source==btnPlus){
				lbl1.setText("+");
				result=number1+number2;	
			}
			txtResult.setText(result+"");
		}
	}
	
	
	
}