package itheima;
import java.util.*;
import java.util.Collections;
import java.util.ArrayList;
public class stream_text {
	public static void main(String[] args){
    ArrayList<String>list = new ArrayList<String>();
    list.add("String");
    list.add("Collection");
    for(String str:list){
    	System.out.println(str);
    }
	
    
    
    
    Collections.addAll(list,"c","b","r","t");
    System.out.println(list);
    Collections.reverse(list);
    System.out.println(list);
    Collections.sort(list);
    System.out.println(list);
    Collections.shuffle(list);
    System.out.println(list);
    Collections.swap(list,0,list.size()-1);
    System.out.println(list);

    
    }
	
	
}
