// 比较两个对象是否相等

Object.prototype.equal = function(obj) {
    let props1 = Object.getOwnPropertyNames(this);
    let props2 = Object.getOwnPropertyNames(obj);
    if(props1.length != props2.length) {
        return false;
    }

    for(let i=0;i < props1.length; i++ ) {
        let prosName = props1[i];
        if(this[propName] !== obj[propName]) {
            return false;
        }
    }
    return true;
}