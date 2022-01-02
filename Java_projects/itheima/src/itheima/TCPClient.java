package itheima;
import java.io.IOException;
import java.io.InputStream;
import java.net.InetAddress;
import java.net.Socket;

public class TCPClient {
    
	public static void main(String[] args)throws IOException{
		
	Socket client = new Socket(InetAddress.getLocalHost(),8002);
	InputStream is = client.getInputStream();
	
	byte[] buf = new byte[1024];
	int len = is.read(buf);
	System.out.println(new String(buf,0,len));
	
	client.close();
	
	}
}
   
      




















