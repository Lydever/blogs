import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
public class Calculator12 extends JFrame implements ActionListener{
    JPanel card=new JPanel();
    CardLayout ClayoutNext=new CardLayout();
    JPanel CenterPanelk1=new JPanel();
    JPanel CenterPanelK2=new JPanel();
    JPanel SouthPanel=new JPanel();
    JPanel center1=new JPanel();
    private double left;
    private  double right;
    private  String temp="";
    private  String temp1="";
    private  String Result;
    private  double result;
    private  int option1=0;
    private  int option;
    private  final String keys1[]={"x^2","x^y","sin","cos","tan","¡Ì","10^x","log","Exp","Mod"};
    private  final String keys2[]={"x^3","y¡Ìx","arcsin","arccos","arctan","1/x","e^x","In","dms","deg"};
    private  final String keys3[]={"¡ü","CE","C","<-","/","¦°","7","8","9","*","n!","4","5","6","-","+/-","1","2","3","+","(",")","0",".","="};
    private  JButton Keys1[]=new JButton[keys1.length];
    private  JButton Keys2[]=new JButton[keys2.length];
    private  JButton Keyscenter[]=new JButton[keys3.length];
    private  static double right1;
    JPanel NorthPanel=new JPanel();
    JTextField textField=new JTextField(17);
    JTextField textFieldUp=new JTextField(17);


    public void actionPerformed(ActionEvent e) {
        if(e.getSource()==Keyscenter[0]){
            ClayoutNext.next(card);

        }else if(e.getSource()==Keyscenter[6]){
            temp+="7";
            temp1+="7";
            textField.setText(temp);
        }else if(e.getSource()==Keyscenter[7]){
            temp+="8";
            temp1+="8";
            textField.setText(temp);
        }else if(e.getSource()==Keyscenter[8]){
            temp+="9";
            temp1+="9";
            textField.setText(temp);
        }
        else if(e.getSource()==Keyscenter[11]){
            temp+="4";
            temp1+="4";
            textField.setText(temp);
        }
        else if(e.getSource()==Keyscenter[12]){
            temp+="5";
            temp1+="5";
            textField.setText(temp);
        }
        else if(e.getSource()==Keyscenter[13]){
            temp+="6";
            temp1+="6";
            textField.setText(temp);
        }
        else if(e.getSource()==Keyscenter[16]){
            temp+="1";
            temp1+="1";
            textField.setText(temp);
        }
        else if(e.getSource()==Keyscenter[17]){
            temp+="2";
            temp1+="2";
            textField.setText(temp);
        }
        else if(e.getSource()==Keyscenter[18]){
            temp+="3";
            temp1+="3";
            textField.setText(temp);
        }else if(e.getSource()==Keyscenter[24]){
            option1++;
            if(option==1){
                String Right=textField.getText();
                right=Double.parseDouble(Right);
                result=left+right;
                Result=""+result;
                if(option1>1){
                    result=left+right1;
                }
                Result=""+result;
                left=result;
            }else if (option==2){
                right=Double.parseDouble(textField.getText());
                result=left%right;
                Result=""+result;
            }else if(option==3){
                if(option1==1) {

                    right = Double.parseDouble(textField.getText());
                    result = left / right;
                    right1=right;
                }
                if(option1>1){
                    result=left/right1;
                }
                Result=""+result;
                left=result;
            }else if(option==4){
                right=Double.parseDouble(textField.getText());
                result=left*right;
                Result=""+result;
                if(option1>1){
                    result=left*right1;
                }
                Result=""+result;
                left=result;
            }else if(option==5){
                if(option1==1) {

                    right = Double.parseDouble(textField.getText());
                    result = left - right;
                    right1=right;
                }
                if(option1>1){
                    result=left-right1;
                }
                Result=""+result;
                left=result;
            }else if(option==6){
                right=Double.parseDouble(textField.getText());
                for(int i=0;i<right;i++){
                    result=left*left;
                }
                Result=""+result;
                left=result;
            }else if(option==7){
                right=Double.parseDouble(textField.getText());
                for (int i=1;i<=right;i++){
                    left*=10;
                }
                Result=""+left;
            }else if (option==8){
                right=Double.parseDouble(textField.getText());
                for(int i=0;i<right;i++){
                    result=Math.sqrt(left);
                }
                Result=""+result;
            }
            textField.setText(Result);
        }else if (e.getSource()==Keyscenter[4]){
            left=Double.parseDouble(textField.getText());
            temp1+="/";
            textFieldUp.setText(temp1);
            textField.setText("");
            temp="";
            option=3;
            option1=0;
        }else if (e.getSource()==Keyscenter[14]){
            left=Double.parseDouble(textField.getText());
            temp1+="-";
            textFieldUp.setText(temp1);
            textField.setText("");
            temp="";
            option=5;
            option1=0;
        }else if (e.getSource()==Keyscenter[19]){
            left=Double.parseDouble(textField.getText());
            temp1+="+";
            textFieldUp.setText(temp1);
            textField.setText("");
            temp="";
            option=1;
            option1=0;
        }else if (e.getSource()==Keyscenter[9]){
            left=Double.parseDouble(textField.getText());
            temp1+="*";
            textFieldUp.setText(temp1);
            textField.setText("");
            temp="";
            option=4;
            option1=0;

        }else if(e.getSource()==Keyscenter[1]){
            textField.setText("");
            temp="";
            temp1="";
            right=0;
        }else if(e.getSource()==Keyscenter[2]){
            textField.setText("");
            textFieldUp.setText("");
            temp="";
            temp1="";
        }else if(e.getSource()==Keyscenter[3]){
            temp1=textField.getText();
            temp1=temp1.substring(0,temp1.length()-1);
            temp=temp1;
            textField.setText(temp1);
        }else if(e.getSource()==Keyscenter[5]){
            temp+="3.1415926535897";
            temp1+="3.1415926535897";
            textField.setText(temp);

        }else if(e.getSource()==Keyscenter[10]){
            try {
                left = Double.parseDouble(textField.getText());
                result = 1;
                for (int i = 1; i <= left; i++) {
                    result *= i;
                }
                Result = "" + result;
                temp1 = "fact(" + temp1 + ")";
                textField.setText(Result);
                textFieldUp.setText(temp1);
            }catch (Exception p){
                textField.setText("Òç³ö");
            }
        }else if(e.getSource()==Keyscenter[15]){
            right=Double.parseDouble(textField.getText());
            right=-right;
            Result=""+right;
            textField.setText(Result);
            temp1=temp1.substring(0,temp1.length()-2);
            temp1+=textField.getText();
        }else if(e.getSource()==Keyscenter[23]){
            temp1+=".";
            temp+=".";
            textField.setText(temp);
        }
        else if (e.getSource()==Keys1[0]){
            left=Double.parseDouble(textField.getText());
            //textField.setText("");
            temp="";
            result=left*left;
            temp1="sqr("+temp1+"£©";
            Result=""+result;
            left=result;
            textField.setText(Result);
            textFieldUp.setText(temp1);

        }else if (e.getSource()==Keys1[5]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            result=Math.sqrt(left);
            Result=""+result;
            temp1="¡Ì("+temp1+"£©";
            textField.setText(Result);
            textFieldUp.setText(temp1);
        }else if (e.getSource()==Keys1[1]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            temp1+="^";
            textFieldUp.setText(temp1);
            option=6;
        }else if (e.getSource()==Keys1[2]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            result=Math.sin(left);
            Result=""+result;
            temp1="sin("+temp1+"£©";
            textField.setText(Result);
            textFieldUp.setText(temp1);
        }else if (e.getSource()==Keys1[3]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            result=Math.cos(left);
            Result=""+result;
            temp1="cos("+temp1+"£©";
            textField.setText(Result);
            textFieldUp.setText(temp1);
        }else if (e.getSource()==Keys1[4]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            result=Math.tan(left);
            Result=""+result;
            temp1="tan("+temp1+"£©";
            textField.setText(Result);
            textFieldUp.setText(temp1);
        }else if (e.getSource()==Keys1[6]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            result=1;
            temp1="10^"+temp1;
            for(int i=0;i<left;i++){
                result*=10;
            }
            Result=""+result;
            textField.setText(Result);
            textFieldUp.setText(temp1);
        }else if (e.getSource()==Keys1[7]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            result=Math.log(left);
            Result=""+result;
            temp1="log("+temp1+"£©";
            textField.setText(Result);
            textFieldUp.setText(temp1);
        }else if(e.getSource()==Keys1[8]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            temp1=temp1+"e";
            textFieldUp.setText(temp1);
            option=7;
        }else if(e.getSource()==Keys1[9]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            temp1+="%";
            textFieldUp.setText(temp1);
            option=2;
            option1=0;
        }else if (e.getSource()==Keys2[0]){
            left=Double.parseDouble(textField.getText());
            //textField.setText("");
            temp="";
            result=left*left*left;
            temp1="cube("+temp1+"£©";
            Result=""+result;
            left=result;
            textField.setText(Result);
            textFieldUp.setText(temp1);
        }else if (e.getSource()==Keys2[1]){
            left=Double.parseDouble(textField.getText());
            temp="";
            temp1=temp1+"yroot";
            textFieldUp.setText(temp1);
            textField.setText("");
            option=8;
        }else if (e.getSource()==Keys2[2]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            result=Math.asin(left);
            Result=""+result;
            temp1="arcsin("+temp1+"£©";
            textField.setText(Result);
            textFieldUp.setText(temp1);
        }else if (e.getSource()==Keys2[3]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            result=Math.acos(left);
            Result=""+result;
            temp1="arccos("+temp1+"£©";
            textField.setText(Result);
            textFieldUp.setText(temp1);
        }else if (e.getSource()==Keys2[4]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            result=Math.atan(left);
            Result=""+result;
            temp1="arctan("+temp1+"£©";
            textField.setText(Result);
            textFieldUp.setText(temp1);
        }else if (e.getSource()==Keys2[5]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            result=1/left;
            Result=""+result;
            textField.setText(Result);
        }else if (e.getSource()==Keys2[6]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            result=Math.exp(left);
            Result=""+result;
            temp1="e^"+temp1;
            textField.setText(Result);
            textFieldUp.setText(temp1);
        }else if (e.getSource()==Keys2[7]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            result=Math.log(left);
            Result=""+result;
            temp1="In("+temp1+")";
            textField.setText(Result);
            textFieldUp.setText(temp1);
        }else if (e.getSource()==Keys2[8]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            Result=""+left;
            temp1="dms("+temp1+")";
            textField.setText(Result);
            textFieldUp.setText(temp1);
        }else if (e.getSource()==Keys2[9]){
            left=Double.parseDouble(textField.getText());
            textField.setText("");
            temp="";
            Result=""+left;
            temp1="degrees("+temp1+")";
            textField.setText(Result);
            textFieldUp.setText(temp1);
        }
    }
    public Calculator12(){
        card=new JPanel();
        card.setLayout(ClayoutNext);
        NorthPanel.setLayout(new GridLayout(2,1));
        CenterPanelk1.setLayout(new GridLayout(2,5));
        CenterPanelK2.setLayout(new GridLayout(2,5));
        SouthPanel.setLayout(new GridLayout(5,5));
        NorthPanel.add(textFieldUp);
        NorthPanel.add(textField);
        for(int i=0;i<keys1.length;i++) {
            addKeys1(keys1[i],i);
        }
        for(int i=0;i<keys2.length;i++) {
            addKeys2(keys2[i],i);
        }
        for(int i=0;i<keys3.length;i++) {
            addKeys3(keys3[i],i);
        }


        card.add(CenterPanelk1);
        card.add(CenterPanelK2);
        SouthPanel.setPreferredSize(new Dimension(250,150));
        card.setPreferredSize(new Dimension(250,70));
        //CenterPanelk1.setBackground(Color.BLACK);
        center1.add(card,BorderLayout.CENTER);
        center1.add(SouthPanel,BorderLayout.SOUTH);

        center1.setLayout(new GridLayout(2,1));
        add(center1,BorderLayout.SOUTH);

        //add(card,BorderLayout.CENTER);

        textField.setHorizontalAlignment(JTextField.RIGHT);
        textField.setEditable(false);
        textFieldUp.setHorizontalAlignment(JTextField.RIGHT);
        textFieldUp.setEditable(false);
    }
    public void addKeys1(String keys1,int i){
        Keys1[i]= new  JButton(keys1);
        CenterPanelk1.add(Keys1[i]);
        Keys1[i].addActionListener(this);
    }
    public void addKeys2(String keys2,int i){
        Keys2[i]= new  JButton(keys2);
        CenterPanelK2.add(Keys2[i]);
        Keys2[i].addActionListener(this);
    }
    public void addKeys3(String keys3,int i){
        Keyscenter[i]= new  JButton(keys3);
        SouthPanel.add(Keyscenter[i]);
        Keyscenter[i].addActionListener(this);
    }
    
}

