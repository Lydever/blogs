package IOdemo;
import java.io.FileInputStream;
import java.io.FileOutputStream;
/*��д�ļ�,ͳ��ʱ��*/
public class Ex7_4 {

	public static void main(String[] args) throws Exception{
		// TODO Auto-generated method stub

		FileInputStream in = new FileInputStream("form.txt");
		
		//׼�������ֽ�����
		byte[] buf = new byte[1024];
		
		//��ʼʱ��
		long start = System.currentTimeMillis();
		
		//����һ��len,����ȡ���ֽڱ��浽buf��
		int len = in.read(buf);
		
		//��ȡ���ͷ���Դ
		in.close();
		
		//ͨ��buf��ӡ���
		System.out.println(new String(buf,0,len));
		
		FileOutputStream out = new FileOutputStream("to.txt");
		
		//��buf�е��ֽ�����д�뵽to.txt��
		out.write(buf,0,len);
		
		out.close();
		
		long end = System.currentTimeMillis();
		
		System.out.println("����ʱ��Ϊ:"+(end-start));
		
	}

}