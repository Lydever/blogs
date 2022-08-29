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

// [].concat.apply + some
const flatten3 = (arr) => {
    while(arr.some(arr.isArray(item))) {
        arr = [].concat.apply([],arr)
    }
}

// reduce
const flatten4 = (arr) => {
    return arr.reduce((prev,cur) => {
        return prev.concat(Array.isArray(cur) ? flatten4(cur) : cur) 
    }, [])
}