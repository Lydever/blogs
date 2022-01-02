package IOdemo;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
public class fileCopy_2 {

	public static void main(String[] args) {
		//将f盘下的file.txt文件拷贝到桌面上
		String desPathStr = "C:\\User\\Administrator\\Desktop";
		String srcPathStr = "F:\\file.txt";
		copyFile(srcPathStr,desPathStr);
	
	}

	private static void copyFile(String srcPathStr,String desPathStr){
			//获取源文件的名称
		String newFileName = srcPathStr.substring(srcPathStr.lastIndexOf("\\")+1);//目标文件地址
		System.out.println(newFileName);
		desPathStr = desPathStr + File.separator + newFileName;//源文件
		System.out.println(desPathStr);
		
		try{
			//创建输入输出对象
			FileInputStream fis = new FileInputStream(srcPathStr);
			FileOutputStream fos = new FileOutputStream(desPathStr);
			
			//创建搬运工具
			byte[] dates = new byte[1024];
			//创建长度
			int len=0;
			//循环读取数据
			while((len = fis.read(dates))!=-1){
				fos.write(dates,0,len);
			}
			
			//释放资源
			fis.close();
			fos.close();
		}catch(Exception e){
			e.printStackTrace();
		}
		
	}
	
	
	
}
