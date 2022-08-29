// 递归实现
const flatten = (arr) => {
    let result = [];
    arr.forEach((item,i,arr) => {
        if(Array.isArray(item)) {
            result = result.concat(flatten(item))
        } else {
            result.push(item[i])
        }
    });
    return result;
}

// 通过toString
const flatten2 = (arr) => {
    arr.toString.split(',').map((item) => {
        +item
    })
}