
package IOdemo;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.Reader;
import java.io.Writer;

public class Ex7_3 {

	public static void main(String[] args) throws IOException{
		// TODO Auto-generated method stub

		File sourceFile = new File("a.txt");
		sourceFile.createNewFile();
		File targetFile = new File("b.txt");
		targetFile.createNewFile();
		char [] c=new char[19];
		try{
			Writer out = new FileWriter("targetFile,true");
			Reader in = new FileReader("sourceFile");
			
			int n=-1;
			while((n=in.read(c))!=-1){
				out.write(c,0,n);
				
			}
			out.flush();
			out.close();
		}
		catch(IOException e){
			System.out.println("Error"+e);
		}
	}

}
