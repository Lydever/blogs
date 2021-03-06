package IOdemo;
import java.io.FileInputStream;
import java.io.FileOutputStream;
/*读写文件,统计时间*/
public class Ex7_4 {

	public static void main(String[] args) throws Exception{
		// TODO Auto-generated method stub

		FileInputStream in = new FileInputStream("form.txt");
		
		//准备缓冲字节数组
		byte[] buf = new byte[1024];
		
		//开始时间
		long start = System.currentTimeMillis();
		
		//定义一个len,将读取的字节保存到buf中
		int len = in.read(buf);
		
		//读取完释放资源
		in.close();
		
		//通过buf打印结果
		System.out.println(new String(buf,0,len));
		
		FileOutputStream out = new FileOutputStream("to.txt");
		
		//将buf中的字节数组写入到to.txt中
		out.write(buf,0,len);
		
		out.close();
		
		long end = System.currentTimeMillis();
		
		System.out.println("运行时间为:"+(end-start));
		
	}

}
