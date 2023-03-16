/* 1. 通过instanceof判断 */
/* instanceof 运算符用于检测构造函数的prototype属性是否出现在对象的原型链中的任何位置，返回一个布尔值 */
let arr = [];
arr instanceof Array; // true
let obj = {};
obj instanceof Array; // false

/* 2. 通过constructor判断 */
/* 实例的构造函数属性constructor指向构造函数，通过constructor属性可以判断是否为一个数组 */
let arr2 = [1, 2, 3];
arr.constructor === Array; // true

/* 3. 通过Object.prototype.toString.call()判断 */
/* Object.prototype.toString.call()可以获取到对象的不同类型 */
let arr3 = [4, 5, 6];
Object.prototype.toString.call(arr3) === '[Object Array]'; // true


/* 4. 通过Array.isArray判断 */
/* Array.isArray()用于确定传递的值是否是一个数组，返回一个布尔值 */
let arr4 = [7, 8, 9];
Array.isArray(arr4); // true