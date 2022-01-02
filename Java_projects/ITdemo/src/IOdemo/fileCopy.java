package IOdemo;
import java.io.*;

public class fileCopy {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		
		long lengthOfDir=getLengthOfDir(new File("."));
		
		System.out.println(lengthOfDir);

	}
	
	
	//获取文件夹的大小
	public  static  long  getLengthOfDir(File dir)
	{
		//定义一个long的变量存储文件夹的大小
		long length=0;
		//获取到dir中的所有文件和子文件夹信息    listFiles()
		File[] files=dir.listFiles();
		//遍历File数组
		for(File file:files)
		{
			//循环结构中嵌套选择结构，区分文件和文件夹
			if(file.isFile())
			{
				length=length+file.length();
			}
			else
			{
				length=length+getLengthOfDir(file);
			}
		}
		
		return length;
		
	}
	
	
	//拷贝文件夹
	public static void copyDir(File srcDir,File destDir) throws IOException
	{
		//创建目标文件夹      mkdir()  mkdirs()
		if(!destDir.exists())
		{
			destDir.mkdirs();
		}
		//获取到srcDir中的所有文件和子文件夹信息    listFiles()
		File[] files=srcDir.listFiles();
	    //遍历File数组
		for(File file:files)
		{
			//循环结构中嵌套选择结构  
			if(file.isFile())
			{
				copyFile(file,new File(destDir,file.getName()));
			}
			else
			{
				copyDir(file,new File(destDir,file.getName()));
			}
		}
		
		
	}
	
	
	
	//拷贝文件
	public static void copyFile(File srcFile,File destFile) throws IOException
	{
		
	}
	
	

}
