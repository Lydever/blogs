// 交叉类型真正的用武之地就是将多个接口类型合并成一个类型，从而实现等同接口继承的效果，也就是所谓的合并接口类型
type IntersectionType = {
    id: number;
    name: string
} & {
    age: number
}

const mixed: IntersectionType = {
    id: 1,
    name: 'lizi',
    age: 2
}

interface A {
    x: {id: number}
}
interface B {
    x: {name: string}
}
interface C {
    x:{age: null}
}
type ABC = A & B & C
let abc: ABC = {
    x: {
        id: 1,
        name: 'liz',
        age: null
    }
}