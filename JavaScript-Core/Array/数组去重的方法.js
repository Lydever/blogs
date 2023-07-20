/* 双重循环，外层循环元素，内层循环时比较值
如果有相同的值则跳过，不相同则push进数组*/
Array.prototype.distinct = function () {
    let arr = this;
    let result = [];
    for (let i = 0; i < arr.length; i++) {
        for (let j = i + 1; j < arr.length; j++) {
            if (arr[i] === arr[j]) {
                j = ++i;
            }
        }
        result.push(arr[i]);
    }
    return result;
}


/* 利用splice直接在原数组进行操作
双层循环，外层循环，内层循环时比较值，值相同时，则删除这个值，
注意点：闪出原宿之后，需要将数组长度也减1
*/

// 用for嵌套循环, splice去重(es5常用)
function unique(arr) {
  for (let i = 0; i < arr.length; i++) {
    for (let j = i + 1; j < arr.length; j++) {
      if (arr[i] == arr[j]) { //第一个等同于第二个，splice方法删除第二个
        arr.splice(j, 1);
        j--;
      }
    }
  }
  return arr
}


/* 利用indexOf
就判断空数组中是否有相同元素,没有则添加
*/
function distinct1() {
    let res = []
    for (let i = 0; i < arr.length; i++) {
        if (res.indexOf(arr[i]) === -1) {
            res.push(arr[i]);
        }
    }
    return res;
}

/* es6数组去重 */
console.log(new Set(array))


/* 4. 利用filter */
function unique4(arr) {
    //当前元素，在原始数组中的第一个索引==当前索引值，否则返回当前元素
    return arr.filter(function (item, index, arr) {
        return arr.indexOf(item, 0) === index;
    })
}


/* 5. 利用includes */
function unique5(arr) {
    let res = [];
    for (let i = 0; i < arr.length; i++) { //includes 检测数组是否有某个值
        if (!arr.includes(arr[i])) {
            res.push(arr[i])
        }
    }
    return res;
}


/* 数组递归去重
先排序，然后从最后开始比较，遇到相同，则删除
*/
