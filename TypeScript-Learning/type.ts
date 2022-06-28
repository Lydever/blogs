/*
 * @Author: Lydever 18027118545@163.com
 * @Date: 2022-06-27 15:47:27
 * @LastEditors: Lydever 18027118545@163.com
 * @LastEditTime: 2022-06-28 17:43:48
 * @FilePath: \LyDevProjects\LyBlogs\TypeScript-Learning\type.ts
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */
let str:string  = "lizi";
let num:number = 10;
let bool:boolean = false;
let un:undefined = undefined;
let nu:null = null;
let obj:object = {name: 'lizi'};
let big:bigint = 100n;
let sym:symbol = Symbol('li');

let arr:Array<String> = ["1","2"]
let arr2:string[] = ["3", "4"];

// 元组
let x: [string, number]
let x2 = ['zili', 11]
// 元组可选
type Point = [number, number?, number?]
const n: Point = [10]
const n2:Point = [10,10]
const n3: Point = [10,191,19]
// 元组只读
const point: readonly [number, number] = [10,10]

// 定义联合类型数组
let arr3: (number | string)[];
let arr4 = [1,'as',2, 'ds']

// 定义指定对象成员的数组：
interface ArrObj{
    name: string,
    level: number
}

let arr5: ArrObj[] = [{name:'lizi',level:99},{name:'chenzi',level:99}]

// 函数声明
const any = (x: number, y:number): number => {
    return x + y
}

let myNumber:(x: number, y:number) => number

// 用接口定义   

// 联合类型
type Combinable = string | number;
function add(a:Combinable, b:Combinable) {
    if(typeof a === 'string' || typeof b === 'string') {
        return a.toString() + b.toString();
    }
    return a + b;
}

// 类型断言
function getDogName() {
    let x: unknown;
    return x;
}
const dogName = getDogName();
// 直接使用
const upName = dogName.toLowerCase(); // Error
// typeof
if(typeof dogName === 'string') {
    const upName = dogName.toLocaleLowerCase(); //ok
} 
// 类型断言
const dogName = (dogName as string).toLocaleLowerCase();
