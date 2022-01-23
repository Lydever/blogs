# 20+个超级实用的JavaScript 开发技巧

### 1. 初始化数组

如果想要初始化一个指定长度的一维数组，并指定默认值，可以这样：

```js
const array = Array(6).fill(''); 
// ['', '', '', '', '', '']
```

如果想要初始化一个指定长度的二维数组，并指定默认值，可以这样：

```js
const matrix = Array(6).fill(0).map(() => Array(5).fill(0)); 
// [[0, 0, 0, 0, 0],
//  [0, 0, 0, 0, 0],
//  [0, 0, 0, 0, 0],
//  [0, 0, 0, 0, 0],
//  [0, 0, 0, 0, 0],
//  [0, 0, 0, 0, 0]]
```

### 2. 数组求和、求最大值、最小值

```js
const array = [1,2,3,4,5,6];
```

数组求和：

```js
array.reduce((a,b) => a+b);
```

求最大值：

```js
array.reduce((a,b) => a > b ? a : b);
Math.max(...array)
```

数组最小值：

```js
array.reduce((a,b) => a < b ? a : b);
Math.min(...array)
```

### 3. 过滤错误值

如果想过滤数组中的false、0、null、undefined等值，可以这样：

```js
const array = [1,0,undefined,6,7,'',false];
array.filter(Boolean);
// [1,6,7]
```

### 4. 实用逻辑运算符

如果有这样一段代码:

```js
if(a > 10) {
    doSomething(a)
}
```

可以使用逻辑运算符来改写：

```js
a > 10 && doSomething(a)
```

### 5. 简化判断

如果有下面的这样的一个判断：

```js
if(a === undefined || a === 10 || a=== 15 || a === null) {
    //...
}
```

就可以使用数组来简化这个判断逻辑：

```js
if([undefined, 10, 15, null].includes(a)) {
    
}
```

### 6. 清空数组

如果想要清空一个数组，可以将数组的length置于0:

```js
let array = ["A", "B", "C", "D", "E", "F"]
array.length = 0 
console.log(array)  // []
```

### 7. 计算代码性能

可以使用以下操作来计算代码的性能：

```js
const startTime = performance.now(); 
// 某些程序
for(let i = 0; i < 1000; i++) {
    console.log(i)
}
const endTime = performance.now();
const totaltime = endTime - startTime;
console.log(totaltime); // 30.299999952316284
```

### 8. 拼接数组

如果我们想要拼接几个数组，可以使用扩展运算符：

```js
const start = [1, 2] 
const end = [5, 6, 7] 
const numbers = [9, ...start, ...end, 8] // [9, 1, 2, 5, 6, 7 , 8]
```

或者使用数组的concat()方法：

```js
const start = [1, 2, 3, 4] 
const end = [5, 6, 7] 
start.concat(end); // [1, 2, 3, 4, 5, 6, 7]
```

但是使用concat()方法时，如果需要合并的数组很大，那么concat() 函数会在创建单独的新数组时消耗大量内存。这时可以使用以下方法来实现数组的合并：

```js
Array.prototype.push.apply(start, end)
```

### 9. 对象验证方式

如果我们有一个这样的对象：

```js
const parent = {
    child: {
      child1: {
        child2: {
          key: 10
      }
    }
  }
}
```

很多时候我们会这样去写，避免某一层级不存在导致报错：

```js
parent && parent.child && parent.child.child1 && parent.child.child1.child2
```

这样代码看起来就会很臃肿，可以使用JavaScript的可选链运算符：

```js
parent?.child?.child1?.child2
```

选链运算符同样适用于数组：

```js
const array = [1, 2, 3];
array?.[5]
```

可选链运算符允许我们读取位于连接对象链深处的属性的值，而不必明确验证链中的每个引用是否有效。在引用为空(null 或者 undefined) 的情况下不会引起错误，该表达式短路返回值是 undefined。与函数调用一起使用时，如果给定的函数不存在，则返回 undefined。

### 10. 验证undefined和null

如果有这样一段代码

```js
if(a === null || a === undefined) {
    doSomething()
}
```

也就是如果需要验证一个值如果等于null或者undefined时，需要执行一个操作时，可以使用空值合并运算符来简化上面的代码：

```js
a ?? doSomething()
```

这样，只有a是undefined或者null时，才会执行控制合并运算符后面的代码。空值合并操作符（??）是一个逻辑操作符，当左侧的操作数为 null 或者 undefined 时，返回其右侧操作数，否则返回左侧操作数。

### 11. 数组元素转化为数字

如果有一个数组，想要把数组中的元素转化为数字，可以使用map方法来实现：

```js
const array = ['12', '1', '3.1415', '-10.01'];
array.map(Number);  // [12, 1, 3.1415, -10.01]
```

### 12. 类数组转为数组

可以使用以下方法将类数组arguments转化为数组：

```js
Array.prototype.slice.call(arguments);
```

除此之外，还可以使用拓展运算符来实现：

```js
[...arguments]
```

### 13. 对象动态声明属性

如果想要给对象动态声明属性，可以这样：

```js
const dynamic = 'color';
var item = {
    brand: 'Ford',
    [dynamic]: 'Blue'
}
console.log(item); 
// { brand: "Ford", color: "Blue" }
```

### 14. 缩短console.log()

每次进行调试时书写很多console.log()就会比较麻烦，可以使用以下形式来简化这个代码：

```js
const c = console.log.bind(document) 
c(996) 
c("hello world")
```

这样每次执行c方法就行了。

### 15. 获取查询参数

如果我们想要获取URL中的参数，可以使用window对象的属性：

```js
window.location.search
```

如果一个URL为[www.baidu.com?project=js&type=1](https://link.juejin.cn/?target=https%3A%2F%2Fwww.baidu.com%3Fproject%3Djs%26type%3D1) 那么通过上面操作就会获取到?project=js&type=1。如果在想获取到其中某一个参数，可以这样：

```js
let type = new URLSearchParams(location.search).get('type');
```

### 16. 数字取整

如果有一个数字包含小数，我们想要去除小数，通过会使用math.floor、math.ceil或math.round方法来消除小数。其实可以使用~~运算符来消除数字的小数部分，它相对于数字的那些方法会快很多。

```js
~~3.1415926  // 3
```

其实这个运算符的作用有很多，通常是用来将变量转化为数字类型的，不同类型的转化结果不一样：

- 如果是数字类型的字符串，就会转化为纯数字；
- 如果字符串包含数字之外的值，就会转化为0；
- 如果是布尔类型，true会返回1，false会返回0；

除了这种方式之外，我们还可以使用按位与来实现数字的取整操作，只需要在数字后面加上`|0`即可：

```js
23.9 | 0   // 23
-23.9 | 0   // -23
```

### 17. 删除数组元素

如果我们想删除数组中的一个元素，我们可以使用delete来实现，但是删除完之后的元素会变为undefined，并不会消失，并且执行时会消耗大量的时间，这样多数情况下都不能满足我们的需求。所以可以使用数组的splice()方法来删除数组元素：

```js
const array = ["a", "b", "c", "d"] 
array.splice(0, 2) // ["a", "b"]
```

### 18. 检查对象是否为空

如果我们想要检查对象是否为空，可以使用以下方式：

```js
Object.keys({}).length  // 0
Object.keys({key: 1}).length  // 1

```

### 19. 使用 switch case 替换 if/else

switch case 相对于 if/else 执行性能更高，代码看起来会更加清晰。

```js
if (1 == month) {days = 31;}
else if (2 == month) {days = IsLeapYear(year) ? 29 : 28;}
else if (3 == month) {days = 31;}
else if (4 == month) {days = 30;} 
else if (5 == month) {days = 31;} 
else if (6 == month) {days = 30;} 
else if (7 == month) {days = 31;} 
else if (8 == month) {days = 31;} 
else if (9 == month) {days = 30;} 
else if (10 == month) {days = 31;} 
else if (11 == month) {days = 30;} 
else if (12 == month) {days = 31;} 
```

使用switch...case来改写：

```js
switch(month) {
        case 1: days = 31; break;
        case 2: days = IsLeapYear(year) ? 29 : 28; break;
        case 3: days = 31; break;
        case 4: days = 30; break;
        case 5: days = 31; break;
        case 6: days = 30; break;
        case 7: days = 31; break;
        case 8: days = 31; break;
        case 9: days = 30; break;
        case 10: days = 31; break;
        case 11: days = 30; break;
        case 12: days = 31; break;
        default: break;
}

```

### 20. 获取数组中的最后一项

如果想获取数组中的最后一项，很多时候会这样来写：

```js
const arr = [1, 2, 3, 4, 5];
arr[arr.length - 1]  // 5

```

其实我们还可以使用数组的slice方法来获取数组的最后一个元素：

```js
arr.slice(-1)
```

### 21. 值转为布尔值

在JavaScript中，以下值都会在布尔值转化时转化为false，其他值会转化为true：

- undefined
- null
- 0
- -0
- NaN

通常我们如果想显式的值转化为布尔值，会使用Boolean()方法进行转化。其实我们可以使用!!运算符来将一个值转化我布尔值。我们知道，一个！是将对象转为布尔型并取反，两个！是将取反后的布尔值再取反，相当于直接将非布尔类型值转为布尔类型值。这种操作相对于Boolean()方法性能会快很多，因为它是计算机的原生操作：

```js
!!undefined // false
!!"996"     // true
!!null      // false
!!NaN       // false
```

### 22. 格式化 JSON 代码

相信大家都使用过JSON.stringify方法，该方法可以将一个 JavaScript 对象或值转换为 JSON 字符串。他的语法如下：

```js
JSON.stringify(value, replacer, space)
```

它有三个参数:

- **value**：将要序列化成 一个 JSON 字符串的值。
- **replacer** 可选：如果该参数是一个函数，则在序列化过程中，被序列化的值的每个属性都会经过该函数的转换和处理；如果该参数是一个数组，则只有包含在这个数组中的属性名才会被序列化到最终的 JSON 字符串中；如果该参数为 null 或者未提供，则对象所有的属性都会被序列化。
- **space** 可选：指定缩进用的空白字符串，用于美化输出（pretty-print）；如果参数是个数字，它代表有多少的空格；上限为10。该值若小于1，则意味着没有空格；如果该参数为字符串（当字符串长度超过10个字母，取其前10个字母），该字符串将被作为空格；如果该参数没有提供（或者为 null），将没有空格。

通常情况下，我们都写一个参数来将一个 JavaScript 对象或值转换为 JSON 字符串。可以看到它还有两个可选的参数，所以我们可以用这俩参数来格式化JSON代码：

### 23. 避免使用eval()和with()

- with() 会在全局范围内插入一个变量。因此，如果另一个变量具有相同的名称，则可能会导致混淆并覆盖该值。
- eval() 是比较昂贵的操作，每次调用它时，脚本引擎都必须将源代码转换为可执行代码。

### 24. 函数参数使用对象而不是参数列表

当我们使用参数列表给函数传递参数时，如果参数较少还好，如果参数较多时，就会比较麻烦，因为我们必须按照参数列表的顺序来传递参数。如果使用TypeScript来写，那么写的时候还需要让可选参数排在必选参数的后面。 

如果我们的函数参数较多，就可以考虑使用对象的形式来传递参数，对象的形式传递参数时，传递可选参数并不需要放在最后，并且参数的顺序不在重要。与参数列表相比，通过对象传递的内容也更容易阅读和理解。 

下面来看一个例子：

```js
function getItem(price, quantity, name, description) {}

getItem(15, undefined, 'bananas', 'fruit')
```



下面来使用对象传参：

```js
function getItem(args) {
    const {price, quantity, name, description} = args
}

getItem({
    name: 'bananas',
    price: 10,
    quantity: 1, 
    description: 'fruit'
})
```























