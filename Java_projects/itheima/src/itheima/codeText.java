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
			
			//�����˵�������
			JMenuBar mBar = new JMenuBar();
			this.setJMenuBar(mBar);
			
			//�����˵�����
			JMenu file = new JMenu("�ļ�");
			JMenu edit = new JMenu("�༭");
			JMenu form = new JMenu("��ʽ");
			JMenu help = new JMenu("����");
			
			//���˵����ӵ��˵�����
			mBar.add(file);
			mBar.add(edit);
			mBar.add(form);
			mBar.add(help);
			
			JTextArea workArea = new JTextArea();
			JScrollPane imgScrollPane = new JScrollPane(workArea);
			add(imgScrollPane,BorderLayout.CENTER);
			
			//����򿪺ͱ���Ի���
			FileDialog openDia;
			FileDialog savaDia;
			openDia = new FileDialog(this,"��(O)",FileDialog.LOAD);
			savaDia = new FileDialog(this,"����Ϊ(A)",FileDialog.SAVE);
			
			
			JMenuItem item1_1 = new JMenuItem("�½�(N)");
			item1_1.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					workArea.setText("");
					
				}
			});
			
			JMenuItem item1_2 = new JMenuItem("��(O)");
			item1_2.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					openDia.setVisible(true);
					
					String dirPath = openDia.getDirectory();//��ȡ�ļ�·��
					String fileName = openDia.getFile();    //��ȡ�ļ�����
					
					//�����·������Ŀ¼Ϊ���򷵻�
					if(dirPath == null || fileName == null){
						return;
						
					}
					
					workArea.setText("");//����ı�
					
					File fileO = new File(dirPath,fileName);
					try{
						BufferedReader bufr = new BufferedReader(new FileReader(fileO));
						String line  = null;
						while((line = bufr.readLine())!=null){
							workArea.append(line+"\r\n");
							
						}
						bufr.close();
					}catch(IOException er1){
						throw new RuntimeException("�ļ���ȡʧ��!");						
					}
	
				}
			});
			
			JMenuItem item1_3 = new JMenuItem("����(S)");
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
						throw new RuntimeException("�ļ�����ʧ��!");
						
					}
						
				}
			});
			
			
			JMenuItem item1_4 = new JMenuItem("������Ϊ(A)");
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
						throw new RuntimeException("�ļ�����ʧ��!");
						
					}
						
				}
			});
			
			JMenuItem item1_5 = new JMenuItem("�˳�(Q)");
			item1_5.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					System.exit(0);
				}
			});
			
			JMenuItem item2_1 = new JMenuItem("����(X)");
			JMenuItem item2_2 = new JMenuItem("����(C)");
			JMenuItem item2_3 = new JMenuItem("ճ��(V)");
			
			JRadioButtonMenuItem item3_1 = new JRadioButtonMenuItem("�Զ�����(W)",false);
			item3_1.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					Object source = e.getSource();
					
					if(source == item3_1)
						workArea.setLineWrap(true);
					else if(source == item3_1)
						workArea.setLineWrap(false);
				}
			});
			
			
			JMenuItem item4_1 = new JMenuItem("�鿴����(H)");
			item4_1.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent event){
					
					
				}
			});
			
			
			JMenuItem item4_2 = new JMenuItem("���ڼ��±�(A)");
			item4_2.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent event){
					
					
				}
			});
			
			
			//�ڲ˵������Ӳ˵���
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