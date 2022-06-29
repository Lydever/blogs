// 定义数组类型:类型[]
let arr:number[] =  [1,3,3,4,56]
// 不管是赋值还是插入都需要遵循定义的类型
// arr.push('1')

// 数组泛型的写法
let arr1:Array<number> = [1,3,4,5,6]


// 接口定义数组
interface NumberArray{
    [index:number]:number
}

let arr2:NumberArray = [1,2,3,4,5]

