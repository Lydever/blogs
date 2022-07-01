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

//========泛型工具类型=======
// 1. typeof
// typeof 的作用用途是在类型上下文中获取变量或者属性的类型
interface Person {
    name: string;
    age: number
}

const sum: Person = {
    name: '李猫er',
    age: 1
}

type sumw1 = typeof sum // type sunw1 = Person

function toAarray(x: number): Array<number> {
    return [x]
}

type Func = typeof toAarray; // => (x:number) => number[]

// keyof
// 该操作符可以用于获取某种类型的所有键，其返回类型是联合类型。
interface Person {
    name: string;
    age: number;
}
type k1 = keyof Person; // "name", "age"
type k2 = keyof Person[]; // "length" | "toString" | "pop" | "push" | "concat" | |join
type k3 = keyof { [x: string]: Person }; // string | number

interface StringArray {
    // 字符串索引 =》 keyof StringArray => string | number
    [index: string]: string
}

interface StringArray1 {
    // 数字索引 =》 keyof StringArray1 =》 number
    [index: number]: string
}

function prop(obj: object, key: string) {
    return (obj as any)[key];
}
// infer
// 在条件类型语句中，可以用inter声明一个类型变量并且对他进行使用
type ReturnType<T>  = T extends (...args: any[]) => infer R ? R : any;

interface Lengthwise {
    length: number
}
function loggingIdentity<T extends Lengthwise>(arg: T):T {
    console.log(arg.length);
    return arg;
}