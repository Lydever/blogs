
public class GameUtil {
	// 求减少生命值的方法 方法用static 修饰 ，调用时 类名.方法名
	public static int getLoseLife(int attack, int defend) {
		return attack - defend;
	}

	// 求a-b之间随机数方法
	public static int getNumber(int a, int b) {
		// 求任意两个数之间的随机数（int）
		return (int) (Math.random() * (b - a) + a);
	}

	/**
	 * 将文本中左边文本与右边文本中间的String取出来
	 * 
	 * @param 文本
	 * @param 左边文本
	 * @param 右边文本
	 * @return String
	 */
	public static String 取指定文本(String 文本, String 左边文本, String 右边文本) {
		// int indexOf(String str)
		// 返回指定子字符串在此字符串中第一次出现处的索引。
		// int indexOf(int ch, int fromIndex)
		// 返回在此字符串中第一次出现指定字符处的索引，从指定的索引开始搜索。
		// String substring(int beginIndex, int endIndex)
		// 返回一个新字符串，它是此字符串的一个子字符串

		int 左边 = 文本.indexOf(左边文本);
		int 右边 = 文本.indexOf(右边文本, 左边);
		return 文本.substring(左边 + 左边文本.length(), 右边);
	}

	/**
	 * 因为JButton是不自动换行的，但是支持html中的换行，所以写这个为了方便换行
	 * 
	 * @param str
	 *            文本
	 * @param length
	 *            每隔length长度换行
	 * @return
	 */
	public static String StringToHtml(String str, int length) {
		// html换行符
		String strhtmlbr = "<br>";
		// html标准格式头
		String strhtmltou = "<html>";
		// html标准格式尾
		String strhtmlwei = "</html>";
		// 字符串总长度
		int strlength = str.length();
		// 循环次数
		int k = strlength / length;
		// 一开始的思路：
		// 存放string每一小段
		// String[] strings = new String[99];
		// 初次循环取出str赋值到数组
		// for (int i = 0; i < k; i++) {
		// strings[i] = str.substring(i * length, i * length + length);
		// }
		// //连接头和第一个文本
		// String strreturn = strhtmltou.concat(strings[0]);
		// //for循环从1开始，依次连接
		// for (int i = 1; i < k; i++) {
		// strreturn = strreturn.concat(strhtmlbr + strings[i]);
		// }
		// //连接html尾
		// strreturn = strreturn.concat(strhtmlwei);

		// 此方法可以改进，改进方式如下：取消数组，两个for循环合并
		// 如果小于则直接输出
		if (strlength < length) {
			return str;
		}
		String strreturn = strhtmltou.concat(str.substring(0 * length, 0 * length + length));
		for (int i = 1; i < k; i++) {
			strreturn = strreturn.concat(strhtmlbr + str.substring(i * length, i * length + length));
		}
		if (strlength - k * length != 0) {
			strreturn = strreturn.concat(strhtmlbr + str.substring(k * length, strlength));
		}
		strreturn = strreturn.concat(strhtmlwei);
		// 返回转化好的html
		return strreturn;
	}

	/**
	 * 将html转化成string，<br>
	 * =null
	 * 
	 * @param str
	 *            html文本
	 * @return string
	 */
	public static String HtmlToString(String str) {
		// html换行符
		String strhtmlbr = "<br>";
		// html标准格式头
		String strhtmltou = "<html>";
		// html标准格式尾
		String strhtmlwei = "</html>";

		String strreturn = str.replace(strhtmltou, "");
		strreturn = strreturn.replace(strhtmlwei, "");
		strreturn = strreturn.replaceAll(strhtmlbr, "");
		// 返回转化好的html
		return strreturn;
	}

	public static String 取点前(String str) {
		String strreturn = str.substring(0, str.indexOf("."));
		return strreturn;
	}

	/**
	 * 检测是否为文本型的0，如果是将文本转化成无
	 * 
	 * @return "无"
	 */
	public static String ZeroToWu(String str) {
		if (str.equals("0")) {
			str = "无";
		}
		return str;
	}

	/**
	 * 
	 * @param str
	 *            门派数字
	 * @return 门派名称
	 */
	public static String Faction(String str) {

		switch (str) {
		case "0":
			str = "无";
			break;
		case "1":
			str = "逆天者联盟";
			break;
		case "2":
			str = "佣兵工会";
			break;
		case "3":
			str = "刺客公会";
			break;
		case "4":
			str = "战士公会";
			break;
		case "5":
			str = "极寒宫";
			break;
		case "6":
			str = "九霄宫";
			break;
		case "7":
			str = "无极宫";
			break;
		case "8":
			str = "火炎宫";
			break;
		case "9":
			str = "金鼎宫";
			break;
		case "10":
			str = "灵木宫";
			break;
		case "11":
			str = "赤土宫";
			break;
		case "12":
			str = "稳定宫";
			break;
		case "13":
			str = "时空宫";
			break;
		default:
			break;
		}
		return str;
	}

}
