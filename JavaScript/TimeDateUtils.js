/**
 * @Description:  js 日期时间处理
 * @Author:   liyingxia
 * @CreateDate:  2022/1/21 20:31
 */

// 检查日期是否有效
const isDateValid = (...val) => !Number.isNaN(new Date(...val).valueOf());
isDateValid("December 17 1999 03:24:00"); // true

// 计算两个日期之间的间隔
const dayDif = (data1, data2) => Math.ceil(Math.abs(data1.getTime() - data2.getTime()) / 86400000);
dayDif(new Date("2022-1-21"), new Date("2022-2-1"))

// 查找日期位于一年当中的第几天
const dayOfYear = (date) => Math.floor((date - new Date(date.getFullYear(), 0, 0)) / 1000 / 60 / 60 / 24);
dayOfYear(new Date());   // 307

// 时间格式化
// 格式： hour：minutes：seconds
const timeFormatDate = date => date.toTimeString().slice(0, 8);
timeFormatDate(new Date(2022,1,21,12,30,0)) // 12:30:00
timeFormatDate(new Date()); // 返回当前时间: 09：00:00
