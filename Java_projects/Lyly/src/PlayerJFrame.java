
import java.awt.Font;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.UIManager;

/**
 * 人物界面
 */
public class PlayerJFrame extends JFrame implements GameConfig {

	public PlayerJFrame() {

		JFrame playerjframe = new JFrame("人物详情");
		JPanel playerJPanel = new JPanel();

		// 设置字体
		Font font = new Font("楷体", 0, 20);
		// 设置文本字体
		UIManager.put("Label.font", font);

		// 称号
		JLabel jLabel_designation = new JLabel("称号:" + player.designation, JLabel.CENTER);
		jLabel_designation.setFont(font);
		jLabel_designation.setBounds(0, 0, 200, 20);
		// 名字
		JLabel jLabel_name = new JLabel(player.name, JLabel.CENTER);
		jLabel_name.setFont(font);
		jLabel_name.setBounds(0, 20, 200, 20);
		// 年龄
		JLabel jLabel_age = new JLabel(String.valueOf(player.age) + "岁", JLabel.CENTER);
		jLabel_age.setFont(font);
		jLabel_age.setBounds(0, 40, 100, 20);
		// 性别
		JLabel jLabel_sex = new JLabel(player.sex, JLabel.CENTER);
		jLabel_sex.setFont(font);
		jLabel_sex.setBounds(100, 40, 100, 20);
		// 等级
		JLabel jLabel_leave = new JLabel("等级:" + String.valueOf(player.leave), JLabel.CENTER);
		jLabel_leave.setFont(font);
		jLabel_leave.setBounds(0, 60, 200, 20);
		// 经验
		JLabel jLabel_jingyan = new JLabel("经验:" + String.valueOf(player.jingyan), JLabel.CENTER);
		jLabel_jingyan.setFont(font);
		jLabel_jingyan.setBounds(0, 80, 200, 20);
		// 生命值
		JLabel jLabel_life = new JLabel("生命" + String.valueOf(player.life), JLabel.CENTER);
		jLabel_life.setFont(font);
		jLabel_life.setBounds(0, 100, 200, 20);
		// 攻击
		JLabel jLabel_attack = new JLabel("攻击" + String.valueOf(player.attack), JLabel.CENTER);
		jLabel_attack.setFont(font);
		jLabel_attack.setBounds(0, 120, 100, 20);
		// 防御
		JLabel jLabel_defend = new JLabel("防御" + String.valueOf(player.defend), JLabel.CENTER);
		jLabel_defend.setFont(font);
		jLabel_defend.setBounds(100, 120, 100, 20);
		// 速度
		JLabel jLabel_speed = new JLabel("速度" + String.valueOf(player.speed), JLabel.CENTER);
		jLabel_speed.setFont(font);
		jLabel_speed.setBounds(0, 140, 100, 20);
		// 暴击
		JLabel jLabel_violent = new JLabel("暴击" + String.valueOf(player.violent), JLabel.CENTER);
		jLabel_violent.setFont(font);
		jLabel_violent.setBounds(100, 140, 100, 20);
		// 善恶
		JLabel jLabel_goodevil = new JLabel("善恶" + String.valueOf(player.goodevil), JLabel.CENTER);
		jLabel_goodevil.setFont(font);
		jLabel_goodevil.setBounds(0, 180, 200, 20);
		// 声望
		JLabel jLabel_prestige = new JLabel("声望" + String.valueOf(player.prestige), JLabel.CENTER);
		jLabel_prestige.setFont(font);
		jLabel_prestige.setBounds(0, 200, 200, 20);
		// 门派
		JLabel jLabel_faction = new JLabel("门派" + String.valueOf(player.faction), JLabel.CENTER);// 门派
		jLabel_faction.setFont(font);
		jLabel_faction.setBounds(0, 220, 200, 20);
		// 幸运
		JLabel jLabel_lucky = new JLabel("幸运" + String.valueOf(player.lucky), JLabel.CENTER);
		jLabel_lucky.setFont(font);
		jLabel_lucky.setBounds(0, 240, 200, 20);
		// 装备列表
		JLabel[] jLable_zhuangbei = new JLabel[6];
		for (int i = 0; i < 6; i++) {
			jLable_zhuangbei[i] = new JLabel();
		}
		jLable_zhuangbei[0].setText("装备1:" + "空");
		jLable_zhuangbei[0].setFont(font);
		jLable_zhuangbei[0].setHorizontalAlignment(JLabel.CENTER);
		jLable_zhuangbei[1].setText("装备2:" + "空");
		jLable_zhuangbei[1].setFont(font);
		jLable_zhuangbei[1].setHorizontalAlignment(JLabel.CENTER);
		jLable_zhuangbei[2].setText("装备3:" + "空");
		jLable_zhuangbei[2].setFont(font);
		jLable_zhuangbei[2].setHorizontalAlignment(JLabel.CENTER);
		jLable_zhuangbei[3].setText("装备4:" + "空");
		jLable_zhuangbei[3].setFont(font);
		jLable_zhuangbei[3].setHorizontalAlignment(JLabel.CENTER);
		jLable_zhuangbei[4].setText("装备5:" + "空");
		jLable_zhuangbei[4].setFont(font);
		jLable_zhuangbei[4].setHorizontalAlignment(JLabel.CENTER);
		jLable_zhuangbei[5].setText("装备6:" + "空");
		jLable_zhuangbei[5].setFont(font);
		jLable_zhuangbei[5].setHorizontalAlignment(JLabel.CENTER);
		jLable_zhuangbei[0].setBounds(0, 260, 200, 20);
		jLable_zhuangbei[1].setBounds(0, 280, 200, 20);
		jLable_zhuangbei[2].setBounds(0, 300, 200, 20);
		jLable_zhuangbei[3].setBounds(0, 320, 200, 20);
		jLable_zhuangbei[4].setBounds(0, 340, 200, 20);
		jLable_zhuangbei[5].setBounds(0, 360, 200, 20);
		// 关闭人物详情界面
		JButton close = new JButton("关闭界面");
		close.setFont(font);
		close.setBounds(20, 380, 160, 35);
		// 关闭人物详情界面的按钮触发
		close.addActionListener(new ActionListener() {
			@Override
			public void actionPerformed(ActionEvent e) {
				playerjframe.dispose();
			}
		});
		// 面板添加组件
		playerJPanel.add(jLabel_designation);
		playerJPanel.add(jLabel_name);
		playerJPanel.add(jLabel_age);
		playerJPanel.add(jLabel_sex);
		playerJPanel.add(jLabel_leave);
		playerJPanel.add(jLabel_jingyan);
		playerJPanel.add(jLabel_life);
		playerJPanel.add(jLabel_attack);
		playerJPanel.add(jLabel_defend);
		playerJPanel.add(jLabel_speed);
		playerJPanel.add(jLabel_violent);
		playerJPanel.add(jLabel_goodevil);
		playerJPanel.add(jLabel_prestige);
		playerJPanel.add(jLabel_faction);
		playerJPanel.add(jLabel_lucky);
		playerJPanel.add(jLable_zhuangbei[0]);
		playerJPanel.add(jLable_zhuangbei[1]);
		playerJPanel.add(jLable_zhuangbei[2]);
		playerJPanel.add(jLable_zhuangbei[3]);
		playerJPanel.add(jLable_zhuangbei[4]);
		playerJPanel.add(jLable_zhuangbei[5]);
		playerJPanel.add(close);
		// 设置布局格式
		playerJPanel.setLayout(null);
		// JFame添加面板
		playerjframe.add(playerJPanel);
		playerjframe.setSize(200, 450);
		// 设置在最前显示
		playerjframe.setAlwaysOnTop(true);
		// 关闭方式，DISPOSE_ON_CLOSE,隐藏并释放窗体，dispose()，当最后一个窗口被释放后，则程序也随之运行结束。
		playerjframe.setDefaultCloseOperation(DISPOSE_ON_CLOSE);
		// 设置窗体居中
		playerjframe.setLocationRelativeTo(null);
		// 大小不可变
		playerjframe.setResizable(false);
		// 显示界面
		playerjframe.setVisible(true);
	}
}
