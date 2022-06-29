// 非空断言
/* 
在上下文中当类型检查器无法断定类型时，一个新的后缀表达式操作符 ! 可以用于断言操作对象是非 null 和非 undefined 类型。具体而言，x! 将从 x 值域中排除 null 和 undefined 。
*/
let mayNullOrUndefineOrString: null | undefined | string;
mayNullOrUndefineOrString!.toString(); //ok
mayNullOrUndefineOrString?.toString(); // ts(2531)

type NumGenerator = () => number;
function myFunc(numGenerator: NumGenerator | undefined) {
    const num1 = numGenerator(); //Error
    const num2 = numGenerator!(); //ok
}
 