
import java.util.Iterator;
import java.util.Map;
import java.util.*;
package itheima;
class Student{
 String name;
 String id;
 public  Student(String name,String id){
    
     this.name=name;
     this.id=id;
     
}
   public String toString(){
   return name+":"+id;
}

public class maptext{
public static void  main(String args[]){

Map map=new TreeMap();
map.put("Lucy","1");
map.put("John","2");
map.put("Smith","3");
map.put("Aimee","4");
map.put("Amanda","5");
System.out.println(map);


Map map=new HashMap();
map.put("Lucy","1");
map.put("John","2");
map.put("Smith","3");
map.put("Aimee","4");
map.put("Amanda","5");
System.out.println(map);
Set keySet=map.keySet();
Iterator it=keySet.iterator();
while (it.hashNext()){
Object key=it.next();
Object value=map.get(key);
System.out.println(key+":"+value);
}
}
}
}


