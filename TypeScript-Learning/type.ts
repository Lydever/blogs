/*
 * @Author: Lydever 18027118545@163.com
 * @Date: 2022-06-27 15:47:27
 * @LastEditors: Lydever 18027118545@163.com
 * @LastEditTime: 2022-06-27 17:07:31
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