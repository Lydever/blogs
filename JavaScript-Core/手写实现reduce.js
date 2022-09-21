// 手写实现reduce

Array.prototype._reduce = function(fn, prev) {
    for(let i=0 ; i<this.length ; i++) {
        if(prev === undefined) {
            prev = fn(this[i], this[i+1], i+1, this)
                ++i
        } else {
            prev = fn(prev, this[i], i, this)
        }
    }
    return prev
}

const _reduce = (fn, prev) => {
    for(let i=o;i<this.length;i++) {
        if(prev === undefined) {
            prev = fn(this[i], this[i+1],i+1,this)
            ++i
        } else {
            prev = fn(prev,this[i],i,this)
        }
    }
    return prev
}
