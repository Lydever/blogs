
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
public class calendartext {
	public static void main(String[] args){
	SimpleDateFormat  sdf = new SimpleDateFormat("yyyyÄêMMÔÂddÈÕ");
	Date date = new Date();
	Calendar c = Calendar.getInstance();
	c.setTime(date);
	c.add(Calendar.DATE,100);
	System.out.println(sdf.format(c.getTime()));
	}	
}



