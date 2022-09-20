
// 判断两个对象是否相等
const isObjectEqual = (obj1, obj2) => {
    // 获取obj1和obj2的属性名
    let obj1Props = Object.getOwnPropertyNames(obj1);
    let obj2Props = Object.getOwnPropertyNames(obj2);
    // 判断属性名的length是否一致
    if(obj1Props.length != obj2Props.length) {
        return false;
    }

    // 循环取出变量名，再判断属性值是否相等
    for(let i=0; i<obj1Props.length; i++) {
        let propName = obj1Props[i];
        if(obj1[propName] !== obj2[propName]) {
            return false;
        }    
    }
    return true;
} 