package IOdemo;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.Scanner;
public class FileCopy1 {
    
    public static boolean succed = true;
    public static void main(String[] args) {
        /*****从控制台获取文件的复制和粘贴路径****/
        Scanner sca = new Scanner(System.in);
        System.out.println("请输入你要复制的文件夹路径");
        String sourceStr = sca.next();
        System.out.println("请输入你要将文件粘贴到的位置");
        String goalStr = sca.next();
        /********创建File对象和异常处理******/
        File goalFile = null;
        File sourceFile = null;
        try {
            goalFile = new File(goalStr);                                //目标文件路径
            if(!goalFile.exists()){
            goalFile.mkdir();                                            //当目标文件夹不存在时创建目标文件夹                            
            }        
        }catch (Exception e) {                                            //目标路径文件出现异常时抛出
            System.out.println("目标文件夹出现问题,请稍后重试!");
            succed = false;
        }
        try{
            sourceFile = new File(sourceStr);                            //被复制的文件夹路径
        }catch(Exception  e){
            System.out.println("需要被复制的文件夹无法访问,请稍后重试!");            //当被复制的文件夹出现异常时抛出
            succed = false;
        }
        
        
        
        /************调用方法************/
        openFile(sourceFile,goalFile.getAbsolutePath());
        /*********判断复制是否成功*********/
        if(succed){
            System.out.println("复制成功!");                                //当程序没有异常的执行完毕后输出复制成功
        }
        
    }
    
    
    
    
    /**
     * openFile方法:
     * 打开参数一指向的文件夹,复制文件.
     * 参数二为要复制到的目标路径
     */
    public static void openFile(File sourceFile,String goalFile){
        try {
            File[] f = sourceFile.listFiles();
            for (int i = 0; i < f.length; i++) {
                if(!f[i].isFile()){                                        //如果不是文件,则在目标文件下创建一个文件夹,并递归调用此方法
                    File mf = new File(goalFile+"\\"+f[i].getName());    //对将要进行复制的目标文件夹创建对象
                    mf.mkdir();                                            //在目标文件下创建一个文件夹
                    openFile(f[i],goalFile+"\\"+f[i].getName());        //递归调用openFile方法,把对f[i]指向的文件夹再做处理
                }else{
                    String url = f[i].getAbsolutePath();                //获取文件的绝对路径
                    copy(url, goalFile + "\\" + f[i].getName());        //进行复制
                }
            }
        } catch (Exception e) {
            System.out.println("复制时出现错误,请检查路径输入是否正确或被占用");           //复制出现错误时抛出
            succed = false;
        }
        
    }
    
    
    /**
     * copy方法:
     * 传入两个参数,第一个是源文件全路径,第二个是目标文件全路径
     */
    public static void copy(String url,String goal){        
        FileInputStream fis = null;
        FileOutputStream fos = null; 
        try {
            fis = new FileInputStream(url);
            fos = new FileOutputStream(goal);
            byte[] arr = new byte[1024];
            int length;
            while((length = fis.read(arr))!=-1){
                fos.write(arr, 0, length);
            }
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}

