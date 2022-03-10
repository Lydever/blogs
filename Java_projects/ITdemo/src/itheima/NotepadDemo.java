package itheima;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event .ItemEvent;
import java.awt.event.ItemListener;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import javax.swing.*;

	public class NotepadDemo extends JFrame{
		public NotepadDemo(){
			super("�����ı��༭��");
			
			//�����˵���
			JMenuBar mBar = new JMenuBar();
			//��JFrame�����������ò˵�������,�����˵������ӵ����������
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
			//add(workArea)
			add(imgScrollPane,BorderLayout.CENTER);
			
			//����򿪺ͱ���Ի���
			FileDialog openDia;
			FileDialog saveDia;
			openDia = new FileDialog(this,"��(O)",FileDialog.LOAD);
			saveDia = new FileDialog(this,"����Ϊ(A)",FileDialog.SAVE);
			
			JMenuItem item1_1 = new JMenuItem("�½�(N)");
			item1_1.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					
					workArea.setText("");//����ı�
				}
			});
			
			JMenuItem item1_2 = new JMenuItem("��(O)");
			item1_2.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					openDia.setVisible(true);
					
					//��ȡ�ļ�·��
					String dirPath = openDia.getDirectory();
					//��ȡ�ļ�����
					String fileName = openDia.getFile();
					//�����·��Ϊ�ջ���·��Ϊ���򷵻�
					if(dirPath == null || fileName == null){
						return ;
						
					}
					workArea.setText("");//����ı�
					
					File fileO = new File(dirPath,fileName);
					
					try{
						BufferedReader buff = new BufferedReader(new FileReader(fileO));
						String line = null;
						while((line=buff.readLine())!=null){
							workArea.append(line+"\r\n");
						}
					      buff.close();
					}
					catch(IOException er1){
						throw new RuntimeException("�ļ���ȡʧ��!");
					}
				}
			});
			
			JMenuItem item1_3 = new JMenuItem("����(S)");
			item1_3.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					File fileS = null;
					if(fileS == null){
						saveDia.setVisible(true);
						String dirPath = saveDia.getDirectory();
						String fileName = saveDia.getFile();
						
						if(dirPath == null || fileName ==null){
							return ;
						}
						fileS = new File(dirPath,fileName);
					}
					try{
						BufferedWriter bufw = new BufferedWriter(new FileWriter(fileS));
						String text = workArea.getText();
						bufw.write(text);
						bufw.close();
					}
					catch(IOException er){
						throw new RuntimeException("�ļ�����ʧ��!");
						
					}
				}
			});
			
			JMenuItem item1_4 = new JMenuItem("����Ϊ(A)");
			item1_4.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					File fileS = null;
					if(fileS == null){
						saveDia.setVisible(true);
						String dirPath = saveDia.getDirectory();
						String fileName = saveDia.getFile();
						
						if(dirPath==null || fileName == null){
							return;
						}
						fileS = new File(dirPath,fileName);
					}
					try{
						BufferedWriter bufw = new BufferedWriter(new FileWriter(fileS));
						String text = workArea.getText();
						bufw.write(text);
						bufw.close();
					}
					catch(IOException er){
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
					
					if(source == item3_1){
						workArea.setLineWrap(true);
					}
					else if(source!=item3_1){
						workArea.setLineWrap(false);
					}
				}
			});
			
			JMenuItem item4_1 = new JMenuItem("�鿴����(H)");
			item4_1.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					new LookHelp();
				}
			});
			
			
			JMenuItem item4_2 = new JMenuItem("���ڼ��±�(A)");
			item4_2.addActionListener(new ActionListener(){
				public void actionPerformed(ActionEvent e){
					new AboutBook();
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

	
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		NotepadDemo app = new NotepadDemo();
		
		app.setSize(600,400);
		app.setLocation(200,200);
		app.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		app.setVisible(true);

	}

}