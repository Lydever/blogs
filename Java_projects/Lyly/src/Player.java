import java.util.ArrayList;
import java.util.List;
import java.util.Map;

public class Player {
	String name = "情难忘";// 姓名
	int age = 15;// 年龄（默认年龄在70岁死亡，冒险在15岁）
	String sex = "男";// 性别（加入帮派限制）（转职？）
	String designation = "无";// 称号
	int leave = 0;// 等级，每级增加
	int jingyan = 0;// 当前经验
	int[] shengjijingyan = { 100, 200, 400, 800, 1600, 3200, 6400, 12800, 25600, 51200, 102400, 204800, 409600,
			999999 };// 升级所需的经验
	int life = 100;// 生命值
	int attack = 20;// 攻击（攻击算法）
	int defend = 10;// 防御（防御算法）
	int speed = 5;// 速度（速度大的先手）

	int violent = 2; // 暴击率（2倍）（百分比，最大100，最小0）
	int goodevil = 0;// 善恶值 可触发一些事件任务
	int prestige = 0;// 声望值 到达某些指定声望值时，购买东西可打折
	int faction = 0;// 门派 在门派可以学习很多东西，当然要用门派的积分来换，有些门派任务是有时限的
	int lucky = 5;// 幸运值，掉宝几率大，暴击加成（掉宝加成具体宝贝具体算法，暴击=原有暴击+幸运值*0.5）

	boolean burns1;// 1级烧伤，每回合2%
	boolean burns2;// 2级烧伤，每回合5%
	boolean burns3;// 3级烧伤，每回合10%

	boolean frostbite1;// 1级冻伤，每回合2%
	boolean frostbite2;// 2级冻伤，每回合5%
	boolean frostbite3;// 3级冻伤，每回合10%

	boolean poisoning1;// 1级中毒，每回合2%
	boolean poisoning2;// 2级中毒，每回合5%
	boolean poisoning3;// 3级中毒，每回合10%

	boolean deceleration;// 减速

	List<Map<String, String>> juesezhuangbeilist = new ArrayList<Map<String, String>>();// 角色装备列表
	String[] backpackcontent = new String[99];// 背包内容

	String equipment1;// 装备1，武器
	String equipment2;// 装备2，头盔
	String equipment3;// 装备3，上衣甲
	String equipment4;// 装备4，下裤甲
	String equipment5;// 装备5，鞋子
	String equipment6;// 装备6，首饰

	boolean pojie1 = true;

	/**
	 * 破解方法 增加10倍于0级的生命值 攻击 防御 速度 增加 幸运点数20
	 */
	public void PoJie1() {
		if (pojie1) {
			life = life + 1000;
			attack = attack + 200;
			defend = defend + 100;
			speed = speed + 50;
			lucky = lucky + 20;
			pojie1 = false;
		}
	}

	boolean pojie2 = true;

	/**
	 * 破解方法 增加20倍于0级的生命值 攻击 防御 速度 增加 幸运点数50
	 */
	public void PoJie2() {
		if (pojie2) {
			life = life + 2000;
			attack = attack + 400;
			defend = defend + 200;
			speed = speed + 100;
			lucky = lucky + 50;
			pojie2 = false;
		}
	}

}
