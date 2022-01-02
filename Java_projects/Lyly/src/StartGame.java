import java.awt.Font;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.InputStreamReader;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.UIManager;

/**
 * 游戏初始界面
 * 
 * @author 莫言情难忘 1179307527
 *
 */
public class StartGame extends JFrame implements GameConfig {

	// 游戏面板
	JPanel panel;
	int PlayerX = 1;
	int PlayerY = 1;
	JButton shang, xia, zuo, you, zhong;

	/**
	 * 设置窗体
	 */
	public StartGame() {

		// 读取游戏map
		ReadMap();

		this.setTitle("文字类");
		this.setSize(450, 485);// 450*450 标题栏占35
		this.setLayout(null);
		// 设置关闭方式
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		// 设置窗体居中
		this.setLocationRelativeTo(null);
		// 设置字体
		Font font = new Font("楷体", 0, 20);
		// 设置文本字体
		UIManager.put("Label.font", font);
		// 上
		shang = new JButton("上城");
		shang.setBounds(150, 0, 150, 150);
		shang.setFont(font);
		this.add(shang);
		shang.addActionListener(new ActionListener() {
			@Override
			public void actionPerformed(ActionEvent e) {
				// TODO Auto-generated method stub
				ReMap(0);
			}
		});
		// 下
		xia = new JButton("下城");
		xia.setBounds(150, 300, 150, 150);
		xia.setFont(font);
		this.add(xia);
		xia.addActionListener(new ActionListener() {

			@Override
			public void actionPerformed(ActionEvent e) {
				// TODO Auto-generated method stub
				ReMap(1);
			}
		});
		// 左
		zuo = new JButton("左城");
		zuo.setBounds(0, 150, 150, 150);
		zuo.setFont(font);
		this.add(zuo);
		zuo.addActionListener(new ActionListener() {

			@Override
			public void actionPerformed(ActionEvent e) {
				// TODO Auto-generated method stub
				ReMap(2);
			}
		});
		// 右
		you = new JButton("右城");
		you.setBounds(300, 150, 150, 150);
		you.setFont(font);
		this.add(you);
		you.addActionListener(new ActionListener() {

			@Override
			public void actionPerformed(ActionEvent e) {
				// TODO Auto-generated method stub
				ReMap(3);
			}
		});
		// 中
		zhong = new JButton("该城");
		zhong.setBounds(150, 150, 150, 150);
		zhong.setFont(font);
		this.add(zhong);
		zhong.addActionListener(new ActionListener() {

			@Override
			public void actionPerformed(ActionEvent e) {
				// TODO Auto-generated method stub
				ReMap(4);
			}
		});
		// 人物
		JButton renwu = new JButton("人物");
		renwu.setBounds(0, 0, 150, 150);
		renwu.setFont(font);
		this.add(renwu);
		renwu.addActionListener(new ActionListener() {

			@Override
			public void actionPerformed(ActionEvent e) {
				new PlayerJFrame();
				// String[] a = {"da","da","da"};
				// int va =JOptionPane.showOptionDialog(StartGame.this, "人物详情", "标题",
				// JOptionPane.OK_CANCEL_OPTION, JOptionPane.QUESTION_MESSAGE, null, a, "da");

			}
		});
		// 背包
		JButton backpack = new JButton("背包");
		backpack.setBounds(300, 0, 150, 150);
		backpack.setFont(font);
		this.add(backpack);
		backpack.addActionListener(new ActionListener() {

			@Override
			public void actionPerformed(ActionEvent e) {
				// TODO Auto-generated method stub
				new BackpackJFrame();
			}
		});
		// 设置
		JButton shezhi = new JButton("设置");
		shezhi.setBounds(0, 300, 150, 150);
		shezhi.setFont(font);
		this.add(shezhi);
		shezhi.addActionListener(new ActionListener() {

			@Override
			public void actionPerformed(ActionEvent e) {
				// TODO Auto-generated method stub

			}
		});
		// 特殊
		JButton teshu = new JButton("特殊");
		teshu.setBounds(300, 300, 150, 150);
		teshu.setFont(font);
		this.add(teshu);
		teshu.addActionListener(new ActionListener() {
			@Override
			public void actionPerformed(ActionEvent e) {
				String pojie = JOptionPane.showInputDialog("请输入密码");

				if (pojie != null && pojie.equals("我爱文字游戏1179307527")) {
					player.PoJie1();
					JOptionPane.showMessageDialog(null, "输入key成功，开启贵族的待遇", "破解success", JOptionPane.PLAIN_MESSAGE);
				} else if (pojie != null && pojie.equals("我有故事你有酒吗")) {
					String aString = "输入KEY值成功，我有故事你有酒吗？\n" + "真的，谁没有藏在心底的故事呢？";
					JOptionPane.showMessageDialog(null, aString, "来，干杯", JOptionPane.PLAIN_MESSAGE);
				} else {
					JOptionPane.showMessageDialog(null, "输入key失败", "破解失败", JOptionPane.PLAIN_MESSAGE);
				}

			}
		});
		shang.setText(MAP[PlayerX - 1][PlayerY]);
		xia.setText(MAP[PlayerX + 1][PlayerY]);
		zuo.setText(MAP[PlayerX][PlayerY - 1]);
		you.setText(MAP[PlayerX][PlayerY + 1]);
		zhong.setText(MAP[PlayerX][PlayerY]);
		this.setResizable(false);
		this.setVisible(true);
	}

	/**
	 * 读取地图及地图介绍 地图为res文件夹的MAP.txt 地图介绍为res文件夹的MAPabout.txt
	 */
	void ReadMap() {
		// 加载地图
		try {
			File file = new File("res\\MAP.txt");
			InputStreamReader reader = new InputStreamReader(new FileInputStream(file));
			BufferedReader br = new BufferedReader(reader);
			// 读取地图的主要操作
			for (int i = 0; i < 10; i++) {
				String[] iString = br.readLine().split(";");
				for (int j = 0; j < 10; j++) {
					MAP[i][j] = iString[j];
				}
			}
			// 关闭输出流
			reader.close();
		} catch (Exception e) {
			// 处理异常
		}

		// 加载地图介绍
		try {
			File file = new File("res\\MAPabout.txt");
			InputStreamReader reader = new InputStreamReader(new FileInputStream(file));
			BufferedReader br = new BufferedReader(reader);
			// 读取地图的主要操作
			for (int i = 0; i < 10; i++) {
				for (int j = 0; j < 10; j++) {
					String iString = br.readLine();
					MAPabout[i][j] = iString;
				}
			}
			// 关闭输出流
			reader.close();
		} catch (Exception e) {
			// 处理异常
		}

	}

	/**
	 * 刷新地图
	 * 
	 * @param j
	 *            0=上 1=下 2=左 3=右 4=中 获取移动方向
	 */
	void ReMap(int key) {
		switch (key) {
		// 上
		case 0:
			if (MAP[PlayerX - 1][PlayerY] != null && !MAP[PlayerX - 1][PlayerY].equals("空")) {
				PlayerX--;
				shang.setText(MAP[PlayerX - 1][PlayerY]);
				xia.setText(MAP[PlayerX + 1][PlayerY]);
				zuo.setText(MAP[PlayerX][PlayerY - 1]);
				you.setText(MAP[PlayerX][PlayerY + 1]);
				zhong.setText(MAP[PlayerX][PlayerY]);
			}
			break;
		// 下
		case 1:
			if (MAP[PlayerX + 1][PlayerY] != null && !MAP[PlayerX + 1][PlayerY].equals("空")) {
				PlayerX++;
				shang.setText(MAP[PlayerX - 1][PlayerY]);
				xia.setText(MAP[PlayerX + 1][PlayerY]);
				zuo.setText(MAP[PlayerX][PlayerY - 1]);
				you.setText(MAP[PlayerX][PlayerY + 1]);
				zhong.setText(MAP[PlayerX][PlayerY]);
			}
			break;
		// 左
		case 2:
			if (MAP[PlayerX][PlayerY - 1] != null && !MAP[PlayerX][PlayerY - 1].equals("空")) {
				PlayerY--;
				shang.setText(MAP[PlayerX - 1][PlayerY]);
				xia.setText(MAP[PlayerX + 1][PlayerY]);
				zuo.setText(MAP[PlayerX][PlayerY - 1]);
				you.setText(MAP[PlayerX][PlayerY + 1]);
				zhong.setText(MAP[PlayerX][PlayerY]);
			}
			break;
		// 右
		case 3:
			if (MAP[PlayerX][PlayerY + 1] != null && !MAP[PlayerX][PlayerY + 1].equals("空")) {
				PlayerY++;
				shang.setText(MAP[PlayerX - 1][PlayerY]);
				xia.setText(MAP[PlayerX + 1][PlayerY]);
				zuo.setText(MAP[PlayerX][PlayerY - 1]);
				you.setText(MAP[PlayerX][PlayerY + 1]);
				zhong.setText(MAP[PlayerX][PlayerY]);
			}
			break;
		// 中
		case 4:
			int res = JOptionPane.showConfirmDialog(null, GameUtil.StringToHtml(MAPabout[PlayerX][PlayerY], 10),
					"是否进入" + MAP[PlayerX][PlayerY] + "?", JOptionPane.YES_NO_OPTION);
			if (res == JOptionPane.YES_OPTION) {
				// 此处处理进入方法
				System.out.println("进入了" + MAP[PlayerX][PlayerY]);
			} else {
				// 此处可做不处理
				System.out.println("没进入" + MAP[PlayerX][PlayerY]);
			}
			break;
		default:
			JOptionPane.showMessageDialog(this, "219", "default错误", JOptionPane.WARNING_MESSAGE);
			break;
		}

	}
}
