
import javax.swing.*;

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;


public class Calculator15 extends JFrame implements ActionListener{
	
	       //设置主要按钮
    private  String keys[]={"%","√","x^2","1/x",
    		"CE","C","<-","/",
    		"7","8","9","*","4",
    		"5","6","-","1","2",
    		"3","+","+/-","0",".","="};    
    private  String Storage[]={"MC","MR","M+","M-","MS","M"};
    private JButton Keys[]=new JButton[keys.length];    //创建按钮组
    private JButton storage[]=new JButton[Storage.length];
    static JMenuBar menuBar=new JMenuBar();
    JPanel CenterPanel=new JPanel();
    JPanel NorthPanel=new JPanel();
    JPanel SouthPanel=new JPanel();
    JTextField textField=new JTextField(20);       //下文本域
    JTextField textFieldUp=new JTextField(20);     //上文本域
    private double firstNum;                           //计算中存左值
    private double secondNum;                          //计算中存右值
    private double result;
    private String Result;
    private String num="";
    private static int option;
    private static String num1="";
  
    public Calculator15(){
    	//初始化计算器
       JMenu fileItem=new JMenu("      功能菜单");       
       JMenu colorItem=new JMenu("      主题");  
       JMenu aboutItem=new JMenu("      帮助");
       JMenuItem seicece=new JMenuItem("       科学计算器");
       JMenuItem standre=new JMenuItem("       标准");
       JMenuItem color1=new JMenuItem("       颜色");
       JMenuItem font2=new JMenuItem("       字体");
       JMenuItem about1=new JMenuItem("       关于");
       JMenuItem about2=new JMenuItem("       查看");
       menuBar.add(fileItem);
       menuBar.add(colorItem);
       menuBar.add(aboutItem);
       fileItem.add(seicece);                
       fileItem.add(standre);
       colorItem.add(color1);                
       colorItem.add(font2);
       aboutItem.add(about1);                
       aboutItem.add(about2);
 
       about1.addActionListener(new ActionListener(){
			public void actionPerformed(ActionEvent e){
				new LookHelp();
			}
		});
		
       about2.addActionListener(new ActionListener(){
			public void actionPerformed(ActionEvent e){
				new AboutBook();
			}
		});
       SouthPanel.setLayout(new GridLayout(2,1));              
       CenterPanel.setLayout(new GridLayout(6,4));
       NorthPanel.setLayout(new GridLayout(1,6));
       CenterPanel.setPreferredSize(new Dimension(400,300));   
       NorthPanel.setPreferredSize(new Dimension(50,50));
       addRom(Storage);
       
       //循环将按钮添加上监听器，放在面板上
       for(int i=0;i<keys.length;i++){                      
           addKeys(keys[i],i);
       }
       SouthPanel.add(textFieldUp);            
       SouthPanel.add(textField);                
       add(SouthPanel,BorderLayout.NORTH);
       add(CenterPanel,BorderLayout.SOUTH);
       add(NorthPanel,BorderLayout.CENTER);
       
        //锁定成不可修改
       textField.setHorizontalAlignment(JTextField.RIGHT); 
       textField.setEditable(false);
       textFieldUp.setHorizontalAlignment(JTextField.RIGHT);
       textFieldUp.setEditable(false);
   }
     public void addKeys(String keys,int i){
         Keys[i]= new  JButton(keys);
         CenterPanel.add(Keys[i]);
         Keys[i].addActionListener(this);
  }
    public void addRom(String Storage[]){
      for(int i=0;i<Storage.length;i++){
    	  storage[i]= new  JButton(Storage[i]);
          NorthPanel.add(storage[i]);
      }
  }

	
    
    public void actionPerformed(ActionEvent e) { 
    	//数字键盘的监视器
         if(e.getSource()==Keys[8]){
             num+="7";
             num1+="7";
             textField.setText(num);

         }else if(e.getSource()==Keys[9]){
        	 num1+="8";
        	 num+="8";
             textField.setText(num);

         }else if(e.getSource()==Keys[10]){
        	 num1+="9";
        	 num+="9";
             textField.setText(num);

         }else if(e.getSource()==Keys[12]){
        	 num1+="4";
        	 num+="4";
             textField.setText(num);

         }else if(e.getSource()==Keys[13]){
        	 num1+="5";
        	 num+="5";
             textField.setText(num);

         }else if(e.getSource()==Keys[14]){
        	 num1+="6";
             num+="6";
             textField.setText(num);

         }else if(e.getSource()==Keys[16]){
        	 num1+="1";
        	 num+="1";
             textField.setText(num);
         }
         else if(e.getSource()==Keys[17]){
        	 num1+="2";
             num+="2";
             textField.setText(num);
         }
         else if(e.getSource()==Keys[18]){
        	 num1+="3";
        	 num+="3";
             textField.setText(num);
         }
        if(e.getSource()==Keys[0]){
        	firstNum=Double.parseDouble(textField.getText());
            textField.setText("");
            num="";
            num1+="%";
            textFieldUp.setText(num1);
            option=2;
        }
      //等于号方法
        else if(e.getSource()==Keys[23]){   
            if(option==1){
                String Right=textField.getText();
                secondNum=Double.parseDouble(Right);
                result=firstNum+secondNum;
                Result=""+result;
            }else if (option==2){
            	secondNum=Double.parseDouble(textField.getText());
                result=firstNum%secondNum;
                Result=""+result;
            }else if(option==3){
            	secondNum=Double.parseDouble(textField.getText());
                result=firstNum/secondNum;
                Result=""+result;
            }else if(option==4){
            	secondNum=Double.parseDouble(textField.getText());
                result=firstNum*secondNum;
                Result=""+result;
            }else if(option==5){
            	secondNum=Double.parseDouble(textField.getText());
                result=firstNum-secondNum;
                Result=""+result;
            }
            textField.setText(Result);
        }else if (e.getSource()==Keys[1]){           //加减乘除等功能键的监视器方法
        	firstNum=Double.parseDouble(textField.getText());
            textField.setText("");
            num="";
            result=Math.sqrt(firstNum);
            Result=""+result;
            textFieldUp.setText(Result);
        }else if(e.getSource()==Keys[2]){
        	firstNum=Double.parseDouble(textField.getText());
            textField.setText("");
            num="";
            result=firstNum*firstNum;
            Result=""+result;
            textFieldUp.setText(Result);
        }else if(e.getSource()==Keys[3]){
        	firstNum=Double.parseDouble(textField.getText());
            textField.setText("");
            num="";
            result=1/firstNum;
            Result=""+result;
            textFieldUp.setText(Result);
        }else if(e.getSource()==Keys[4]){
            textField.setText("");
            num="";
            num1="";
        }else if(e.getSource()==Keys[19]){
        	firstNum=Double.parseDouble(textField.getText());
            num1+="+";
            textFieldUp.setText(num1);
            textField.setText("");
            num="";
            option=1;
        }else if(e.getSource()==Keys[5]){
            textField.setText("");
            num="";
            num1="";
        }else if(e.getSource()==Keys[6]){
            textField.setText("");
            num="";
            num1="";
        }else if(e.getSource()==Keys[7]){
        	firstNum=Double.parseDouble(textField.getText());
            num1+="/";
            textFieldUp.setText(num1);
            textField.setText("");
            num="";
            option=3;
        }else if(e.getSource()==Keys[11]){
        	firstNum=Double.parseDouble(textField.getText());
            num1+="*";
            textFieldUp.setText(num1);
            textField.setText("");
            num="";
            option=4;
        }else if(e.getSource()==Keys[15]){
        	firstNum=Double.parseDouble(textField.getText());
            num1+="-";
            textFieldUp.setText(num1);
            textField.setText("");
            num="";
            option=5;
        }else if(e.getSource()==Keys[22]){
        	num1+=".";
        	num+=".";
            textField.setText(num);
        }
    }



    class ROM implements ActionListener{
    	//加减乘除的监视器
      
        public void actionPerformed(ActionEvent e) {
        	//未完成的计算器方法
            if(e.getSource()==Keys[0]){

            }
        }
    }
    
    
    public static void main(String[] args) {
    	Calculator15 Cal=new Calculator15();        //设置Jframe窗口
    	Cal.setTitle("简易计算器");
    	Cal.setSize(500,300);
    	Cal.setBackground(Color.blue);               //想设置颜色背景,但效果出不来....
    	Cal.getContentPane().setBackground(Color.orange);
    	Cal.getContentPane().setVisible(true);
    	Cal.setDefaultCloseOperation(WindowConstants.EXIT_ON_CLOSE);//添加最大化最小化组件
    	Cal.pack();    //自适应大小
    	Cal.setJMenuBar(menuBar); 
    	
    	 //显示窗口
    	Cal.setVisible(true);   
    }

}


