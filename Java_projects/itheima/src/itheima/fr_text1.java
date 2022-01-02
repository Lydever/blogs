package itheima;

import java.awt.*;
import java.awt.event.ItemEvent;
import java.awt.event.ItemListener;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;
import javax.swing.*;

public class fr_text1 {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		new myJFrame();
	}

}
class myJFrame extends JFrame{
	public void Days() {
		
	}

	JTextField JT1, JT2;
	JLabel useName, useNum, birthday, month, year, day, Cul;
	JRadioButton yes, no, nan, woman;
	JComboBox<Object> years, months, days;
	Button login;
	JTextArea Jta;
	JPanel JP4;
	JScrollPane JS;
	myJFrame () {
		
		this.setBounds(400, 250, 400, 400);
		this.setDefaultCloseOperation(EXIT_ON_CLOSE);
		
		
		useName=new JLabel("姓名");
		useNum=new JLabel("学号");
		birthday=new JLabel("出生日期 :");
		month=new JLabel("月 ");
		year=new JLabel("年 ");
		day=new JLabel("日 ");
		Cul=new JLabel("联合培养:");
		
		JT1=new JTextField(10);
		JT2=new JTextField(10);
		
		nan=new JRadioButton("男");
		woman=new JRadioButton("女");
		
		yes=new JRadioButton("是");
		no=new JRadioButton("否");
		
		login=new Button("录入");
		
		
		Jta=new JTextArea(8,16);
		JS=new JScrollPane(Jta);
		JS.setHorizontalScrollBarPolicy(ScrollPaneConstants.HORIZONTAL_SCROLLBAR_ALWAYS); 
		JS.setVerticalScrollBarPolicy(ScrollPaneConstants.VERTICAL_SCROLLBAR_ALWAYS);
		Jta.setEditable(false); 
		ButtonGroup group2=new ButtonGroup();
		group2.add(yes);
		group2.add(no);
		ButtonGroup group1=new ButtonGroup();
		group1.add(nan);
		group1.add(woman);
		
		
		JPanel JP1=new JPanel();
		JP1.add(useNum);
		JP1.add(JT1);
		
		JPanel JP2=new JPanel();
		JP2.add(useName);
		JP2.add(JT2);
		
		JPanel JP3=new JPanel();
		JP3.add(nan);
		JP3.add(woman);
		JPanel JPappend=new JPanel(new BorderLayout());
		
		JPappend.add(JP1,BorderLayout.PAGE_START);
		JPappend.add(JP2,BorderLayout.CENTER);
		JPappend.add(JP3,BorderLayout.PAGE_END);
		this.add(JPappend,BorderLayout.PAGE_START);
		Object[] arrYear=new Object [50];
		int j=1980;
		for (int i = 0; i < 50; i++)
		{

			arrYear[i] = j;
			j++;

		}

		years = new JComboBox(arrYear);

		Object[] arrMonth= {1,2,3,4,5,6,7,8,9,10,11,12};
		months=new JComboBox(arrMonth);
		//各个月份可能有的天数
		
		Object[] arrdays31=new Object [31];
		for(int i=0;i<31;i++)
				arrdays31[i]=i+1;
		
		
		days=new JComboBox(arrdays31);
		
		JP4=new JPanel();
		JP4.add(birthday);
		JP4.add(years);
		JP4.add(year);
		JP4.add(months);
		JP4.add(month);
		JP4.add(days);
		JP4.add(day);
		
		
		JPanel JP5 =new JPanel();
		JP5.add(Cul);
		
		
		JP5.add(yes);
		JP5.add(no);
		
		JPanel JP6 =new JPanel();
		JP6.add(login);
		
		JPanel JPgroup2 =new JPanel(new BorderLayout());
		JPgroup2.add(JP4,BorderLayout.PAGE_START);
		JPgroup2.add(JP5,BorderLayout.CENTER);
		JPgroup2.add(JP6,BorderLayout.PAGE_END);
		
		this.add(JPgroup2,BorderLayout.CENTER);
		
		this.add(JS,BorderLayout.PAGE_END);
	
		
		months.addItemListener(new myItemListener());
		years.addItemListener(new myItemListener());
		login.addMouseListener(new myClickButton() );
		this.setResizable(false);
		this.setVisible(true);
	}
	class myClickButton extends MouseAdapter{

		@Override
		public void mouseClicked(MouseEvent e) {
			String str1="";
			if(JT1.getText().equals(""))
				JOptionPane.showMessageDialog(null, "学号不能为空",JT1.getText(),JOptionPane.PLAIN_MESSAGE);
			else if(JT2.getText().equals(""))
				JOptionPane.showMessageDialog(null, "姓名不能为空");
			else {
				str1+="学号："+JT1.getText()+" ";
				str1+="姓名："+JT2.getText()+"\n";
				
				if(nan.isSelected())
				{
					str1+="性别："+nan.getText()+"\n";
				}
				if(woman.isSelected())
				{
					str1+="性别："+woman.getText()+"\n";
				}
				str1+="出生日期："+years.getSelectedItem()+" ";
				str1+=months.getSelectedItem()+" ";
				str1+=days.getSelectedItem()+"\n";
				if(yes.isSelected())
				{
					str1+="是否联合培养："+yes.getText()+" ";
				}
				if(no.isSelected())
				{
					str1+="是否联合培养："+no.getText()+" ";
				}
				Jta.setText(str1);
			}
		}
		
		
	}
	class myItemListener implements ItemListener{
		public void itemStateChanged(ItemEvent e) {
			
			String strMonth=months.getSelectedItem().toString();
			String strYear=years.getSelectedItem().toString();
			int Leapyear=Integer.parseInt(strYear);
			System.out.println(strMonth);
			System.out.println(Leapyear);
			  if(strMonth.equals("3") ||strMonth.equals("1") ||strMonth.equals("5") ||strMonth.equals("7") 
					  ||strMonth.equals("8") ||strMonth.equals("10") ||strMonth.equals("12")) {
				  days.removeAllItems();
				  for(int i=0;i<31;i++)	
						days.addItem(i+1);
			  }
			  else if ((strMonth.equals("2") && Leapyear%4==0 && Leapyear%100!=0) || (strMonth.equals("2") && Leapyear%400==0) )
			  {
				  days.removeAllItems();
				  for(int i=0;i<29;i++)
						days.addItem(i+1);
			  }
			  else if (strMonth.equals("2")  )
			  { 
				  days.removeAllItems();
				  for(int i=0;i<28;i++)
						days.addItem(i+1);
			  }else {
				  days.removeAllItems();
				  for(int i=0;i<30;i++)
						days.addItem(i+1);
			  }
		}
	}
}