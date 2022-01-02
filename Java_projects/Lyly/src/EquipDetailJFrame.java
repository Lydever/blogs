import java.awt.Font;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.UIManager;

/**
 * 物品详情界面
 */
public class EquipDetailJFrame implements GameConfig {
	/**
	 * 物品详情界面，ID为物品ID
	 * 
	 * @param ID
	 */
	public EquipDetailJFrame(int ID) {

		JFrame equipdetailjframe = new JFrame("详情");
		JPanel equipdetailJPanel = new JPanel();
		equipdetailJPanel.setLayout(null);
		// 设置字体
		Font font = new Font("楷体", 0, 20);
		// 设置文本字体
		UIManager.put("Label.font", font);

		// attribute属性
		String[] attribute = { "ID", "品质", "位置", "名称", "说明", "等级", "善恶", "门派", "生命", "攻击", "防御", "速度", "暴击", "命中", "闪避",
				"生命加成", "攻击加成", "防御加成", "速度加成", "吸血" };
		// JLabel 品质,位置,名称,说明,等级,善恶,帮派,幸运,生命,攻击,防御,速度,暴击,命中,闪避,生命加成,攻击加成,防御加成,速度加成,吸血;
		// 品质=new JLabel(GameUtil.取指定文本(UnitXLS.取内容(ID),"品质",","));
		// 武器=new JLabel(GameUtil.取指定文本(UnitXLS.取内容(ID),"武器",","));
		// 上面那种太麻烦，改为下面的
		JLabel[] JLabel_attribute = new JLabel[20];
		for (int i = 0, k = JLabel_attribute.length; i < k; i++) {
			// for循环直接初始化
			if (i == k - 1) {
				JLabel_attribute[i] = new JLabel(
						GameUtil.取指定文本(UnitXLS.取内容(zhuangbeilist, ID), attribute[i] + "=", "}"), JLabel.CENTER);
			} else {
				JLabel_attribute[i] = new JLabel(
						GameUtil.取指定文本(UnitXLS.取内容(zhuangbeilist, ID), attribute[i] + "=", ","), JLabel.CENTER);
			}

			// 添加字体
			JLabel_attribute[i].setFont(font);
		}
		// 设置位置,ID
		JLabel_attribute[0].setText(attribute[0] + ":" + GameUtil.取点前(JLabel_attribute[0].getText()));
		JLabel_attribute[0].setBounds(0, 0, 250, 20);
		// 名称
		JLabel_attribute[3].setText(JLabel_attribute[3].getText());
		JLabel_attribute[3].setBounds(0, 20, 250, 20);
		// 品质
		JLabel_attribute[1].setText(attribute[1] + ":" + JLabel_attribute[1].getText());
		JLabel_attribute[1].setBounds(0, 40, 130, 20);
		// 位置
		JLabel_attribute[2].setText(attribute[2] + ":" + JLabel_attribute[2].getText());
		JLabel_attribute[2].setBounds(130, 40, 130, 20);
		// 攻击
		JLabel_attribute[9].setText(attribute[9] + ":" + GameUtil.取点前(JLabel_attribute[9].getText()));
		JLabel_attribute[9].setBounds(0, 60, 130, 20);
		// 防御
		JLabel_attribute[10].setText(attribute[10] + ":" + GameUtil.取点前(JLabel_attribute[10].getText()));
		JLabel_attribute[10].setBounds(130, 60, 130, 20);
		// 速度
		JLabel_attribute[11].setText(attribute[11] + ":" + GameUtil.取点前(JLabel_attribute[11].getText()));
		JLabel_attribute[11].setBounds(0, 80, 130, 20);
		// 暴击
		JLabel_attribute[12].setText(attribute[12] + ":" + GameUtil.取点前(JLabel_attribute[12].getText()));
		JLabel_attribute[12].setBounds(130, 80, 130, 20);
		// 命中
		JLabel_attribute[13].setText(attribute[13] + ":" + GameUtil.取点前(JLabel_attribute[13].getText()));
		JLabel_attribute[13].setBounds(0, 100, 130, 20);
		// 闪避
		JLabel_attribute[14].setText(attribute[14] + ":" + GameUtil.取点前(JLabel_attribute[14].getText()));
		JLabel_attribute[14].setBounds(130, 100, 130, 20);
		// 吸血
		JLabel_attribute[19].setText(attribute[19] + ":" + GameUtil.取点前(JLabel_attribute[19].getText()));
		JLabel_attribute[19].setBounds(0, 120, 130, 20);
		// 生命加成
		JLabel_attribute[15].setText(attribute[15] + ":" + GameUtil.取点前(JLabel_attribute[15].getText()));
		JLabel_attribute[15].setBounds(0, 140, 130, 20);
		// 攻击加成
		JLabel_attribute[16].setText(attribute[16] + ":" + GameUtil.取点前(JLabel_attribute[16].getText()));
		JLabel_attribute[16].setBounds(130, 140, 130, 20);
		// 防御加成
		JLabel_attribute[17].setText(attribute[17] + ":" + GameUtil.取点前(JLabel_attribute[17].getText()));
		JLabel_attribute[17].setBounds(0, 160, 130, 20);
		// 速度加成
		JLabel_attribute[18].setText(attribute[18] + ":" + GameUtil.取点前(JLabel_attribute[18].getText()));
		JLabel_attribute[18].setBounds(130, 160, 130, 20);
		// 等级
		JLabel_attribute[5]
				.setText(attribute[5] + "需求:" + GameUtil.ZeroToWu(GameUtil.取点前(JLabel_attribute[5].getText())));
		JLabel_attribute[5].setBounds(0, 180, 260, 20);
		// 善恶
		JLabel_attribute[6]
				.setText(attribute[6] + "需求:" + GameUtil.ZeroToWu(GameUtil.取点前(JLabel_attribute[6].getText())));
		JLabel_attribute[6].setBounds(0, 200, 260, 20);
		// 帮派
		JLabel_attribute[7]
				.setText(attribute[7] + "需求:" + GameUtil.Faction(GameUtil.取点前(JLabel_attribute[7].getText())));
		JLabel_attribute[7].setBounds(0, 220, 260, 20);
		// 说明
		JLabel_attribute[4].setText(
				GameUtil.StringToHtml(attribute[4] + "：" + GameUtil.Faction(JLabel_attribute[4].getText()), 12));
		JLabel_attribute[4].setBounds(0, 240, 260, 100);
		/**
		 * { "ID", "品质", "位置", "名称", "说明", "等级", "善恶", "帮派", , "生命", "攻击", "防御", "速度",
		 * "暴击", "命中", "闪避", "生命加成", "攻击加成", "防御加成", "速度加成", "吸血" };
		 */
		// JLabel_attribute[14].setText(attribute[14] + ":"
		// +GameUtil.取点前(JLabel_attribute[14].getText()));
		// JLabel_attribute[14].setBounds(0, 120, 130, 20);
		for (int i = 0, k = JLabel_attribute.length; i < k; i++) {
			equipdetailJPanel.add(JLabel_attribute[i]);
		}

		JButton 装备 = new JButton("装备");
		JButton 卸下 = new JButton("卸下");
		装备.setFont(font);
		卸下.setFont(font);
		装备.setBounds(0, 350, 130, 40);
		卸下.setBounds(130, 350, 130, 40);
		equipdetailJPanel.add(装备);
		equipdetailJPanel.add(卸下);

		// JFame添加面板
		equipdetailjframe.add(equipdetailJPanel);
		// 设置大小
		equipdetailjframe.setSize(260, 420);
		// 关闭方式，DISPOSE_ON_CLOSE,隐藏并释放窗体，dispose()，当最后一个窗口被释放后，则程序也随之运行结束。
		equipdetailjframe.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
		// 设置在最前显示
		equipdetailjframe.setAlwaysOnTop(true);
		// 设置窗体居中
		equipdetailjframe.setLocationRelativeTo(null);
		// 大小不可变
		equipdetailjframe.setResizable(false);
		// 显示界面
		equipdetailjframe.setVisible(true);

	}

}
