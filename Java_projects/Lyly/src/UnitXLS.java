
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.InputStream;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;

import org.apache.poi.hssf.usermodel.HSSFWorkbook;
import org.apache.poi.ss.usermodel.Cell;
import org.apache.poi.ss.usermodel.Row;
import org.apache.poi.ss.usermodel.Sheet;
import org.apache.poi.ss.usermodel.Workbook;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;

/**
 * XLS操作
 */
public class UnitXLS implements GameConfig {

	public static void AddXls(List<Map<String, String>> list, String filePath, String[] queue) {
		// Excel文档
		Workbook wb = null;
		// Excel文档中的一个sheet
		Sheet sheet = null;
		// 对应一个sheet中的一行
		Row row = null;

		String cellData = null;

		// 将xls赋值到wb
		wb = readExcel(filePath);
		if (wb != null) {
			// 用来存放表中数据
			// list = new ArrayList<Map<String, String>>();
			// 获取第一个sheet
			sheet = wb.getSheetAt(0);
			// 获取最大行数
			int rownum = sheet.getPhysicalNumberOfRows();
			// 获取第一行
			row = sheet.getRow(0);
			// 获取最大列数
			int colnum = row.getPhysicalNumberOfCells();
			for (int i = 1; i < rownum; i++) {
				Map<String, String> map = new LinkedHashMap<String, String>();
				row = sheet.getRow(i);
				if (row != null) {
					for (int j = 0; j < colnum; j++) {
						cellData = (String) getCellFormatValue(row.getCell(j));
						map.put(queue[j], cellData);
					}
				} else {
					break;
				}
				list.add(map);
			}
		}
		// 遍历解析出来的list
		// for (Map<String,String> map : list) {
		// for (Entry<String,String> entry : map.entrySet()) {
		// System.out.print(entry.getKey()+":"+entry.getValue()+",");
		// }
		// System.out.println();
		// }
	}

	/**
	 * @param ID
	 * 
	 * @return string类型的全部信息
	 */
	// ID为第几行，仅仅使用这个方法，在使用这个方法前，要调用下AddXls初始化
	public static String 取内容(List<Map<String, String>> list, int ID) {
		return String.valueOf(list.get(ID));
	}

	// 读取excel
	public static Workbook readExcel(String filePath) {
		Workbook wb = null;
		// 如果没有该文档
		if (filePath == null) {
			return null;
		}
		// 取文件后缀名
		String extString = filePath.substring(filePath.lastIndexOf("."));
		InputStream is = null;
		try {
			is = new FileInputStream(filePath);
			if (".xls".equals(extString)) {
				return wb = new HSSFWorkbook(is);
			} else if (".xlsx".equals(extString)) {
				return wb = new XSSFWorkbook(is);
			} else {
				return wb = null;
			}
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
		return wb;
	}

	/**
	 * 获取单元格中的值并转化成string
	 * 
	 * @param cell
	 *            单元格
	 * @return
	 */
	public static Object getCellFormatValue(Cell cell) {
		Object cellValue = null;
		if (cell != null) {
			// 判断cell类型
			switch (cell.getCellType()) {
			case NUMERIC: {
				cellValue = String.valueOf(cell.getNumericCellValue());
				break;
			}
			case STRING: {
				cellValue = cell.getRichStringCellValue().getString();
				break;
			}
			default:
				cellValue = "";
			}
		} else {
			cellValue = "";
		}
		return cellValue;
	}

}
