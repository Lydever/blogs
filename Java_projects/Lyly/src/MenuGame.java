import java.awt.Container;
import java.awt.Desktop;
import java.awt.Font;
import java.awt.Image;
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.File;
import java.io.IOException;
import java.net.URI;
import java.net.URISyntaxException;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.UIManager;

/**
 * 游戏菜单
 */
public class MenuGame implements GameConfig{
	
	public static JFrame loginFrame;// 启动界面
	
	public MenuGame() {
		Initialization1();
		loginFrame = new JFrame("文字游戏");
		// 设置大小
		loginFrame.setSize(200, 235);
		// 设置窗体居中
		loginFrame.setLocationRelativeTo(null);
		// 设置不可最大化
		loginFrame.setResizable(false);
		// 设置没有标题栏
		// loginFrame.setUndecorated(true);
		// 设置图标
		Image icon = Toolkit.getDefaultToolkit().getImage("images/icon.png");
		loginFrame.setIconImage(icon);
		// 设置关闭
		loginFrame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		// 设置字体
		Font font = new Font("楷体", 0, 16);
		// 设置文本字体
		UIManager.put("Label.font", font);
		// 面板，用于添加按钮
		JPanel jPanel = new JPanel();
		Container container = loginFrame.getContentPane();
		// 按钮实例化
		JButton stargame = new JButton("开始游戏");
		JButton duqugame = new JButton("读取游戏");
		JButton guanyugame = new JButton("关于游戏");
		JButton helpgame = new JButton("游戏帮助");
		JButton tuichugame = new JButton("退出游戏");
		// 面板添加5个菜单按钮
		jPanel.add(stargame);
		jPanel.add(duqugame);
		jPanel.add(guanyugame);
		jPanel.add(helpgame);
		jPanel.add(tuichugame);
		// 为按钮设置字体
		stargame.setFont(font);
		duqugame.setFont(font);
		guanyugame.setFont(font);
		tuichugame.setFont(font);
		helpgame.setFont(font);
		// 添加面板
		container.add(jPanel);
		// 开始游戏按钮监听
		stargame.addActionListener(new ActionListener() {
			@Override
			public void actionPerformed(ActionEvent arg0) {

				// 开始游戏
				StartGame ks = new StartGame();
				loginFrame.dispose();
			}
		});
		// 读取游戏按钮监听
		duqugame.addActionListener(new ActionListener() {

			@Override
			public void actionPerformed(ActionEvent arg0) {
				// 警告信息框
				JOptionPane.showMessageDialog(jPanel, "后续开发", "读取存档", JOptionPane.WARNING_MESSAGE);
			}
		});
		// 关于按钮被单击
		guanyugame.addActionListener(new ActionListener() {
			@Override
			public void actionPerformed(ActionEvent arg0) {
				// 弹出文本内容
				String guanyu = "本软件为文字类游戏，ok";
				// 信息框
				JOptionPane.showMessageDialog(null, guanyu, "关于", JOptionPane.PLAIN_MESSAGE);
			}
		});
		// 帮助按钮被单击
		helpgame.addActionListener(new ActionListener() {
			@Override
			public void actionPerformed(ActionEvent arg0) {
				// 弹出文本内容
				String help = "这是帮助";
				// 信息框
				JOptionPane.showMessageDialog(null, help, "帮助", JOptionPane.PLAIN_MESSAGE);
			}
		});
		// 退出游戏监听
		tuichugame.addActionListener(new ActionListener() {
			@Override
			public void actionPerformed(ActionEvent arg0) {
				int res = JOptionPane.showConfirmDialog(null, "我们正在努力添加游戏各种功能\n" + "敬请期待", "退出?",
						JOptionPane.YES_NO_OPTION);
				if (res == JOptionPane.YES_OPTION) {
					Desktop desktop = Desktop.getDesktop();
					try {
						desktop.browse(new URI("http://www.520mylove.com"));
					} catch (IOException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					} catch (URISyntaxException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
					System.exit(0);// 退出
				}
			}
		});
		// 显示窗口
		loginFrame.setVisible(true);
	}
	

	/**
	 * 初始化1，判断是否存在游戏文档文件夹（游戏文档包括游戏存档等）
	 */
	void Initialization1() {
		File file = new File("D:\\文字游戏");//游戏目录
		File file1 = new File("D:\\文字游戏\\map");//游戏地图
		File file2 = new File("D:\\文字游戏\\cundang");//游戏存档
		if (!file.exists() && !file.isDirectory()) {
			// 不存在此文件夹，建立此文件夹
			file.mkdir();
		}
		if (!file1.exists() && !file1.isDirectory()) {
			// 不存在此文件夹，建立此文件夹
			file1.mkdir();
		}
		if (!file2.exists() && !file2.isDirectory()) {
			// 不存在此文件夹，建立此文件夹
			file2.mkdir();
		}
	}
	
	public static void main(String[] args) {
		//加载游戏装备列表
		String 所有装备 = "res/装备匹配表.xls";
		String 队列1[] = {"ID", "品质", "位置", "名称", "说明", "等级", "善恶", "门派", "生命", "攻击", "防御", "速度", "暴击",
				"命中", "闪避", "生命加成", "攻击加成", "防御加成", "速度加成", "吸血"};
		UnitXLS.AddXls(zhuangbeilist,所有装备,队列1);
		//加载当前装备列表
		String 角色装备 = "res/角色装备.xls";
		String 队列2[] = {"ID", "名称"};
		UnitXLS.AddXls(player.juesezhuangbeilist,角色装备,队列2);
		new MenuGame();
	}
	
}
