/**
 * @Description: 字符串处理工具
 * @Author:   liyingxia
 * @CreateDate:  2022/1/21 21:36
 */

// 字符串首字母大写
const  capitalize = str => str.chartAt(0).toUpperCase() + str.slice(1)

// 翻转字符串
const reverse = str => str.split('').reverse().join('')
reverse('hello world'); // dlrow olleh

// 随机字符串
const randomStr = () => Math.random().toString(36).slice(2);

// 去除字符串中的HTML 元素
const strHtml = html => (new DOMParser().parseFromString(html, 'text/html')).body.textContent || ''
