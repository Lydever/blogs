package itheima;
import java.awt.*;  
import java.awt.event.*;  
import javax.swing.*;  

	public class fr_text extends JFrame implements ActionListener {  
		  JLabel Label1 = new JLabel("��Ȥ��");       
		  JCheckBox yuCheck = new JCheckBox("��ë��");   
		  JCheckBox pingCheck = new JCheckBox("ƹ����");   
		  JCheckBox singCheck = new JCheckBox("����");  
		  
		  JLabel Label2 = new JLabel("�Ա�");  
		  JRadioButton maleRadioButton = new JRadioButton("��");  
		  JRadioButton femalRadioButton = new JRadioButton("Ů");  
		  
		  JTextArea textArea = new JTextArea(10,30);  
		  
		  fr_text()  
		  {  
		       super("JFrame����");  
		       Container contentPane = getContentPane();         
		  
		       JPanel northPanel = new JPanel();  
		       northPanel.setLayout(new GridLayout(2,1));    
		  
		       Box box1 = Box.createHorizontalBox();  
		       Box box2 = Box.createHorizontalBox();            
		  
		       box1.add(Box.createHorizontalStrut(3));  
		       box1.add(Label1 ); 
		       box1.add(yuCheck );  
		       box1.add(pingCheck );  
		       box1.add(singCheck);          
		       
		       ButtonGroup group = new ButtonGroup();  
		       group.add(maleRadioButton);  
		       group.add(femalRadioButton);   
		  
		       box2.add(Box.createHorizontalStrut(3));           
		       box2.add(Label2); 
		       box2.add(maleRadioButton);  
		       box2.add(femalRadioButton);           
		  
		       northPanel.add(box1);   
		       northPanel.add(box2);  
		       contentPane.add(northPanel, BorderLayout.NORTH);            
		       JScrollPane scrollPane = new JScrollPane(textArea);  
		       contentPane.add(scrollPane, BorderLayout.CENTER);  
		  
		       yuCheck.addActionListener(this);   
		       pingCheck.addActionListener(this);   
		       singCheck.addActionListener(this);  
		       maleRadioButton.addActionListener(this);  
		       femalRadioButton.addActionListener(this);    
		  
		       setVisible(true);  
		       setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);  
		       setSize(400, 300);  
		       }   
		  
	public void actionPerformed(ActionEvent e)  
	{
		if(e.getSource()==yuCheck){
			if(yuCheck.isSelected()==true){
				textArea.append("��ë��"+"\n");	
			}
			else if(e.getSource()==pingCheck){
				if(pingCheck.isSelected()==true){
				textArea.append("ƹ����"+"\n");	
				}
			}
			else if(e.getSource()==singCheck){
				if(singCheck.isSelected()==true){
				textArea.append("����"+"\n");	
				}
			}
			else if(e.getSource()==maleRadioButton){
				if(maleRadioButton.isSelected()==true){
				textArea.append("��"+"\n");	
				}
			}
			else if(e.getSource()==femalRadioButton){
				if(femalRadioButton.isSelected()==true){
				textArea.append("Ů"+"\n");	
				}
			}
			else{
				return;
				
			}
		}
	}
	 public static void main(String args[])  {  
          new fr_text();  
     }  

}
