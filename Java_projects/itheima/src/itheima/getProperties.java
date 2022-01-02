package itheima;
import java.util.*;
public class getProperties {

	public static void main(String[] args) {
		Properties properties = System.getProperties();
		System.out.println(properties);
		Set<String>propertyName = properties.stringPropertyNames();
		for(String key:propertyName){
			String value = System.getProperty(key);
			System.out.println(key+"--->"+value);
		}
	}

}
