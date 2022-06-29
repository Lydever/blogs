let star:string = '吴亦凡';
// 类型推断,当申明变量并且赋值的时候没有设置变量的类型，那么该变量就会被推断为一开始赋值的类型
// star = 123;


// 联合类型，可以是多种类型
let star1:string|number = '吴亦凡'
star1 = 123
// star1 = {};