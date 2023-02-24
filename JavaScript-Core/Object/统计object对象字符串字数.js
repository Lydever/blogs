/**
 * @Description:  字符串字符统计
 * @Author:   liyingxia
 * @CreateDate:  2023/2/24 15:48
 */

// 字符串字符出现字数统计 返回 { a:2, b:2, c:1 }
const getChartCount = (str) => {
    const obj = {}
    for (let k of str) {
        if (k === '') continue
        if (k in obj) {
            obj[k]++
        } else {
            obj[k] = 1
        }
    }

    return obj
}