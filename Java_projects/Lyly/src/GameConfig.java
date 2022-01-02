import java.util.ArrayList;
import java.util.List;
import java.util.Map;

/**
 * 游戏接口
 */
public interface GameConfig {

	String[][] MAP = new String[10][10];// 新手村地图
	String[][] MAPabout = new String[10][10];// 新手村地图注释
	int[][][] coordinate = new int[10][10][10];// 10个新手村这么大的地图
	Player player = new Player();
	List<Map<String, String>> zhuangbeilist = new ArrayList<Map<String, String>>();// 所有装备
}
