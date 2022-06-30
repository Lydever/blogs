function identity<T>(arg:T): T {
    return arg
}

function identity<T,U>(value: T, msg: U): T {
    return value
}

console.log(identity<Number,string>(34,'ggkgkgg'));