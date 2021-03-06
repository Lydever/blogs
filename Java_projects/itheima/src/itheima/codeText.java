package itheima;
import java.awt.*;

import javax.swing.*;


import java.awt.event.*;
import java.awt.event.ActionEvent;
import java.awt.event.ItemEvent;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;

public class codeText {
	
	public class Myframe extends JFrame{
		public Myframe(){
			JFrame f = new JFrame();
			f.setSize(600,400);
			f.setLocation(200,300);
			f.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
			f.setVisible(true);
			
			//创建菜单栏对象
			JMenuBar mBar = new JMenuBar();
			this.setJMenuBar(mBar);
			
			//创建菜单对象
			JMenu file = new JMenu("文件");
			JMenu edit = new JMenu("编辑");
			JMenu form = new JMenu("格式");
			JMenu help = new JMenu("帮助");
			
			//将菜单添加到菜单栏中
			mBar.add(file);
			mBar.add(edit);
			mBar.add(form);
			mBar.add(help);
			
			JTextArea workArea = new JTextArea();
			JScrollPane imgScrollPane = new JScrollPane(workArea);
			add(imgScrollPane,BorderLayout.CENTER);
			
			//定义打开和保存对话框
			FileDialog openDia;
			FileDialog savaDia;
			openDia = new FileDialog(this,"打开(O)",FileDialog.LOAD);
			savaDia = new FileDialog(this,"另存为(A)",FileDialog.SAVE);
			
			
			JMenuItem item1_1 = new JMenuItem("新建(N)");
			item1_1.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					workArea.setText("");
					
				}
			});
			
			JMenuItem item1_2 = new JMenuItem("打开(O)");
			item1_2.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					openDia.setVisible(true);
					
					String dirPath = openDia.getDirectory();//获取文件路径
					String fileName = openDia.getFile();    //获取文件名称
					
					//如果打开路径或者目录为空则返回
					if(dirPath == null || fileName == null){
						return;
						
					}
					
					workArea.setText("");//清空文本
					
					File fileO = new File(dirPath,fileName);
					try{
						BufferedReader bufr = new BufferedReader(new FileReader(fileO));
						String line  = null;
						while((line = bufr.readLine())!=null){
							workArea.append(line+"\r\n");
							
						}
						bufr.close();
					}catch(IOException er1){
						throw new RuntimeException("文件读取失败!");						
					}
	
				}
			});
			
			JMenuItem item1_3 = new JMenuItem("保存(S)");
			item1_3.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					File fileS = null;
					if(fileS == null){
						savaDia.setVisible(true);
						String dirPath = savaDia.getDirectory();
						String fileName = savaDia.getFile();
						
						if(dirPath == null || fileName == null)
							return;
						
						fileS = new File(dirPath,fileName);	
					}
					try{
						BufferedWriter bufw = new BufferedWriter(new FileWriter(fileS));
						String text = workArea.getText();
						bufw.write(text);
						bufw.close();
					}catch(IOException er){
						throw new RuntimeException("文件保存失败!");
						
					}
						
				}
			});
			
			
			JMenuItem item1_4 = new JMenuItem("另保存为(A)");
			item1_4.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					File fileS = null;
					if(fileS == null){
						savaDia.setVisible(true);
						String dirPath = savaDia.getDirectory();
						String fileName = savaDia.getFile();
						
						if(dirPath == null || fileName == null)
							return;
						
						fileS = new File(dirPath,fileName);	
					}
					try{
						BufferedWriter bufw = new BufferedWriter(new FileWriter(fileS));
						String text = workArea.getText();
						bufw.write(text);
						bufw.close();
					}catch(IOException er){
						throw new RuntimeException("文件保存失败!");
						
					}
						
				}
			});
			
			JMenuItem item1_5 = new JMenuItem("退出(Q)");
			item1_5.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					System.exit(0);
				}
			});
			
			JMenuItem item2_1 = new JMenuItem("剪切(X)");
			JMenuItem item2_2 = new JMenuItem("复制(C)");
			JMenuItem item2_3 = new JMenuItem("粘贴(V)");
			
			JRadioButtonMenuItem item3_1 = new JRadioButtonMenuItem("自动换行(W)",false);
			item3_1.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					Object source = e.getSource();
					
					if(source == item3_1)
						workArea.setLineWrap(true);
					else if(source == item3_1)
						workArea.setLineWrap(false);
				}
			});
			
			
			JMenuItem item4_1 = new JMenuItem("查看帮助(H)");
			item4_1.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent event){
					
					
				}
			});
			
			
			JMenuItem item4_2 = new JMenuItem("关于记事本(A)");
			item4_2.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent event){
					
					
				}
			});
			
			
			//在菜单中添加菜单项
			file.add(item1_1);
			file.add(item1_2);
			file.add(item1_3);
			file.add(item1_4);
			file.add(item1_5);
			edit.add(item2_1);
			edit.add(item2_2);
			edit.add(item2_3);
			form.add(item3_1);
			help.add(item4_1);
			help.add(item4_2);
			
		}
		
	}

	public static void main(String[] args) {
		// TODO Auto-generated method stub
      new codeText();
	}

}
