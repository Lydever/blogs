/*  类型断言
 * @Author: Lydever 18027118545@163.com
 * @Date: 2022-06-29 09:53:45
 * @LastEditors: Lydever 18027118545@163.com
 * @LastEditTime: 2022-06-29 09:53:54
 * @FilePath: \LyDevProjects\LyBlogs\TypeScript-Learning\类型断言.ts
 * @Description: 有时候你会遇到这样的情况，你会比 TypeScript 更了解某个值的详细信息。
 *               通常这会发生在你清楚地知道一个实体具有比它现有类型更确切的类型
 */
const arrayNumber: number[] = [1,2,3,4];
const arrayNumber2: number = arrayNumber.find(num => num > 2)
// 其中，greaterThan2 一定是一个数字（确切地讲是 3），因为 arrayNumber 中明显有大于 2 的成员，但静态类型对运行时的逻辑无能为力。
/* 
在 TypeScript 看来，greaterThan2 的类型既可能是数字，也可能是 undefined，所以上面的示例中提示了一个 ts(2322) 错误，此时我们不能把类型 undefined 分配给类型 number。
不过，我们可以使用一种笃定的方式——类型断言（类似仅作用在类型层面的强制类型转换）告诉 TypeScript 按照我们的方式做类型检查。
*/
const arrayNumber: number[] = [1,2,3,4];
const  arrayNumber2: number = arrayNumber.find(num => num > 2) as number;

// =========语法=========

// 尖括号语法
let someVal: any = 'lizi';
let strLength: number = (<string>someVal).length;

// as语法
let someVal: any = 'lizi';
let strLength: number = (someVal as string).length;

