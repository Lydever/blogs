import java.awt.Dimension;
import java.awt.Font;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.UIManager;

public class BackpackJFrame extends JFrame implements GameConfig {

	public BackpackJFrame() {

		JFrame backpackjframe = new JFrame("背包详情");
		JPanel backpackJPanel = new JPanel();

		// 设置字体
		Font font = new Font("楷体", 0, 20);
		// 设置文本字体
		UIManager.put("Label.font", font);
		// 设置布局格式
		backpackJPanel.setLayout(null);
		// 面板添加组件
		JButton[] JButton_zhuangbei = new JButton[99];
		for (int i = 0; i < 33; i++) {
			for (int j = 0; j < 3; j++) {
				JButton_zhuangbei[i * 3 + j] = new JButton();
				JButton_zhuangbei[i * 3 + j].setText(GameUtil.StringToHtml(
						GameUtil.取指定文本(UnitXLS.取内容(player.juesezhuangbeilist, i * 3 + j), "名称=", "}"), 3));
				JButton_zhuangbei[i * 3 + j].setFont(font);
				backpackJPanel.add(JButton_zhuangbei[i * 3 + j]);
				// 设置位置
				JButton_zhuangbei[i * 3 + j].setBounds(j * 100, i * 100, 100, 100);// i=纵 j=横
			}
		}
		ActionListener jbutton = new ActionListener() {
			@Override
			public void actionPerformed(ActionEvent e) {
				int k = -1;
				// html标准格式头
				String strhtmltou = "<html>";
				// html标准格式尾
				String strhtmlwei = "</html>";
				// 循环判断点击的按钮的
				for (int i = 0; i < 99; i++) {
					if (!GameUtil.取指定文本(e.getSource().toString(), "text=", ",").equals("空")) {
						if (GameUtil.HtmlToString(GameUtil.取指定文本(e.getSource().toString(), strhtmltou, strhtmlwei))
								.equals(GameUtil.取指定文本(UnitXLS.取内容(zhuangbeilist, i), "名称=", ","))) {
							k = i;
						}
					}
				}
				// 打开该ID的装备信息
				if (k != -1) {
					new EquipDetailJFrame(k);
				}

			}
		};

		for (int i = 0; i < JButton_zhuangbei.length; i++) {
			JButton_zhuangbei[i].addActionListener(jbutton);
		}
		// JFame添加面板
		// backpackJPanel.setSize(300, 3300);采用下面的方法设置大小
		backpackJPanel.setPreferredSize(new Dimension(300, 3300));
		// 向jscrollpane中添加背包面板
		JScrollPane jsp = new JScrollPane(backpackJPanel);
		// Jfame添加JScerollPane
		backpackjframe.add(jsp);
		// 设置大小
		backpackjframe.setSize(324, 335);
		// 关闭方式，DISPOSE_ON_CLOSE,隐藏并释放窗体，dispose()，当最后一个窗口被释放后，则程序也随之运行结束。
		backpackjframe.setDefaultCloseOperation(DISPOSE_ON_CLOSE);
		// 设置在最前显示
		backpackjframe.setAlwaysOnTop(true);
		// 设置窗体居中
		backpackjframe.setLocationRelativeTo(null);
		// 大小不可变
		backpackjframe.setResizable(false);
		// 显示界面
		backpackjframe.setVisible(true);
	}
}
