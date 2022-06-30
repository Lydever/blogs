function identity<T>(arg:T): T {
    return arg
}

function identity<T,U>(value: T, msg: U): T {
    return value
}

console.log(identity<Number,string>(34,'ggkgkgg'));

// 泛型约束
function f(arg:T): T {
    console.log(arg.size); console.log(arg.size); // Error: Property 'size doesn't exist on type 'T'
    return arg
}
// 如何去表达这个类型约束的点呢？实现这个需求的关键在于使用类型约束。 
// 使用 extends 关键字可以做到这一点。简单来说就是你定义一个类型，然后让 T 实现这个接口即可。
interface Sizeable {
    size: number
}
function f2<T extends Sizeable>(arg: T): T {
    console.log(arg.size);
    return arg
}

