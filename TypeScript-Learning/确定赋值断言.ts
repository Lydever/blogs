/*
 * @Author: Lydever 18027118545@163.com
 * @Date: 2022-06-29 11:05:52
 * @LastEditors: Lydever 18027118545@163.com
 * @LastEditTime: 2022-06-29 11:07:13
 * @FilePath: \LyDevProjects\LyBlogs\TypeScript-Learning\确定赋值断言.ts
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */
// 允许在实例属性和变量声明后面放置一个 ! 号，从而告诉 TypeScript 该属性会被明确地赋值。为了更好地理解它的作用，我们来看个具体的例子：
let x: number;
initialize();

// Variable 'x' is used before being assigned.(2454)
console.log(2 * x); // Error
function initialize() {
  x = 10;
}

let x!: number;
initialize();
console.log(2 * x); //ok
function initialize() {
    x=10;
}