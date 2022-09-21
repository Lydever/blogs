
// 根据题目要求，实现一个仿Array.map功能的"Array._map"函数，该函数创建一个新数组，该新数组的结果是数组中的每个元素都调用一次函数参数后的返回值，核心步骤有：

// 1. 判断参数是否为函数，如果不是则直接返回
// 2. 创建一个空数组用于承载新的内容
// 3. 循环遍历数组中的每个值，分别调用函数参数，将返回值添加进空数组中
// 4. 返回新的数组
Array.prototype._map = function(Fn) {
    if (typeof Fn !== 'Function') return
    const array = this;
    const newArr = new Array(array.length)
    for(let i=0; i<array.length;i++){
        let result  = Fn.call(arguments[i],i,array)
        newArr[i] = result
    }
    return newArr;

}
