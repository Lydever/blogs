package itheima;
import java.time.*;
public class Clock {

	public static void main(String[] args) {

		
		Duration d = Duration.ofDays(1);
		System.out.println("一天等于"+d.toHours()+"小时");
		System.out.println("一天等于"+d.toMinutes()+"分钟");
		System.out.println("一天等于"+d.toMillis()+"秒");
		
		Instant instant = Instant.now();
		System.out.println("获取UTC时区的当前时间为:"+instant);
		System.out.println("当前时间一小时后的时间为:"+instant.plusSeconds(3600));
		System.out.println("当前时间的一小时前的时间为:"+instant.minusSeconds(3600));
		
		LocalDate localdate = LocalDate.now();
		System.out.println("从默认时区的系统时钟获取当前的日期为:"+localdate);
		
		LocalTime localtime = LocalTime.now();
		System.out.println("从默认时区的系统时钟获取当前的时间:"+localtime);
		
		
		LocalDateTime localdateTime = LocalDateTime.now();
		System.out.println("从默认时区的系统时钟获取当前的日期,时间:"+localdateTime);
		LocalDateTime times = localdateTime.plusDays(1).plusHours(3).plusMinutes(30);
		System.out.println("当前的日期,时间加上1天3小时30分钟之后:"+times);
		
		
		Year year = Year.now();
		System.out.println("当前的年份为:"+year);
		YearMonth yearMonth = YearMonth.now();
		System.out.println("当前月份为:"+yearMonth);
		MonthDay monthDay = MonthDay.now();
		System.out.println("当前月日为:"+monthDay);
		
		
		ZoneId zoneId = ZoneId.systemDefault();
		System.out.println("当前系统默认时区为:"+zoneId);
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

	}

}
