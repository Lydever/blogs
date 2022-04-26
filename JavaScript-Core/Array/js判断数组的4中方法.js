/* 1. 通过instanceof判断 */
/* instanceof 运算符用于检测构造函数的prototype属性是否出现在对象的原型链中的任何位置，返回一个布尔值 */
let arr = [];
arr instanceof Array; // true
let obj = {};
obj instanceof Array; // false
