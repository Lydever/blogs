1. 获取字符串长度
JavaScript中的字符串有一个length属性，该属性可以用来获取字符串的长度：
```js
const str = 'hello';
str.length   // 输出结果：5
```
2. 获取字符串指定位置的值
charAt()和charCodeAt()方法都可以通过索引来获取指定位置的值：

charAt() 方法获取到的是指定位置的字符；
charCodeAt()方法获取的是指定位置字符的Unicode值。

（1）charAt()
charAt() 方法可以返回指定位置的字符。其语法如下：
```js
string.charAt(index)
```
index表示字符在字符串中的索引值：
```js
const str = 'hello';
str.charAt(1)  // 输出结果：e 
```
我们知道，字符串也可以通过索引值来直接获取对应字符，那它和charAt()有什么区别呢？来看例子：
```js
const str = 'hello';
str.charAt(1)  // 输出结果：e 
str[1]         // 输出结果：e 
str.charAt(5)  // 输出结果：'' 
str[5]         // 输出结果：undefined
```

可以看到，当index的取值不在str的长度范围内时，str[index]会返回undefined，而charAt(index)会返回空字符串；除此之外，str[index]不兼容ie6-ie8，charAt(index)可以兼容。

（2）charCodeAt()
charCodeAt()：该方法会返回指定索引位置字符的 Unicode 值，返回值是 0 - 65535 之间的整数，表示给定索引处的 UTF-16 代码单元，如果指定位置没有字符，将返回 NaN：
```js
let str = "abcdefg";
console.log(str.charCodeAt(1)); // "b" --> 98
```
通过这个方法，可以获取字符串中指定Unicode编码值范围的字符。比如，数字0～9的Unicode编码范围是: 48～57，可以通过这个方法来筛选字符串中的数字，当然如果你更熟悉正则表达式，会更方便。

3. 检索字符串是否包含特定序列
这5个方法都可以用来检索一个字符串中是否包含特定的序列。其中前两个方法得到的指定元素的索引值，并且只会返回第一次匹配到的值的位置。后三个方法返回的是布尔值，表示是否匹配到指定的值。
注意：这5个方法都对大小写敏感！
（1）indexOf()
indexOf()：查找某个字符，有则返回第一次匹配到的位置，否则返回-1，其语法如下：
```js
string.indexOf(searchvalue,fromindex)
```

该方法有两个参数：
- searchvalue：必需，规定需检索的字符串值；
- fromindex：可选的整数参数，规定在字符串中开始检索的位置。它的合法取值是 0 到 string.length - 1。如省略该，则从字符串的首字符开始检索。
```js
let str = "abcdefgabc";
console.log(str.indexOf("a"));   // 输出结果：0
console.log(str.indexOf("z"));   // 输出结果：-1
console.log(str.indexOf("c", 4)) // 输出结果：9
```

（2）lastIndexOf()
lastIndexOf()：查找某个字符，有则返回最后一次匹配到的位置，否则返回-1
```js
let str = "abcabc";
console.log(str.lastIndexOf("a"));  // 输出结果：3
console.log(str.lastIndexOf("z"));  // 输出结果：-1
```
该方法和indexOf()类似，只是查找的顺序不一样，indexOf()是正序查找，lastIndexOf()是逆序查找。

（3）includes()
includes()：该方法用于判断字符串是否包含指定的子字符串。如果找到匹配的字符串则返回 true，否则返回 false。该方法的语法如下：
```js
string.includes(searchvalue, start)
```
该方法有两个参数：
- searchvalue：必需，要查找的字符串；
- start：可选，设置从那个位置开始查找，默认为 0。
```js
let str = 'Hello world!';
str.includes('o')  // 输出结果：true
str.includes('z')  // 输出结果：false
str.includes('e', 2)  // 输出结果：false
```

（4）startsWith()
startsWith()：该方法用于检测字符串是否以指定的子字符串开始。如果是以指定的子字符串开头返回 true，否则 false。其语法和上面的includes()方法一样。
```js
let str = 'Hello world!';

str.startsWith('Hello') // 输出结果：true
str.startsWith('Helle') // 输出结果：false
str.startsWith('wo', 6) // 输出结果：true
```

（5）endsWith()
endsWith()：该方法用来判断当前字符串是否是以指定的子字符串结尾。如果传入的子字符串在搜索字符串的末尾则返回 true，否则将返回 false。其语法如下：
```js
string.endsWith(searchvalue, length)
```

该方法有两个参数：
- searchvalue：必需，要搜索的子字符串；
- length： 设置字符串的长度，默认值为原始字符串长度 string.length。

```js
let str = 'Hello world!';

str.endsWith('!')       // 输出结果：true
str.endsWith('llo')     // 输出结果：false
str.endsWith('llo', 5)  // 输出结果：true
```

可以看到，当第二个参数设置为5时，就会从字符串的前5个字符中进行检索，所以会返回true。

4. 连接多个字符串
concat() 方法用于连接两个或多个字符串。该方法不会改变原有字符串，会返回连接两个或多个字符串的新字符串。其语法如下：
string.concat(string1, string2, ..., stringX)
复制代码
其中参数 string1, string2, ..., stringX 是必须的，他们将被连接为一个字符串的一个或多个字符串对象。
let str = "abc";
console.log(str.concat("efg"));          //输出结果："abcefg"
console.log(str.concat("efg","hijk")); //输出结果："abcefghijk"
复制代码
虽然concat()方法是专门用来拼接字符串的，但是在开发中使用最多的还是加操作符+，因为其更加简单。

5. 字符串分割成数组
split() 方法用于把一个字符串分割成字符串数组。该方法不会改变原始字符串。其语法如下：
```js
string.split(separator,limit)
```

该方法有两个参数：
- separator：必需。字符串或正则表达式，从该参数指定的地方分割 string。
- limit：可选。该参数可指定返回的数组的最大长度。如果设置了该参数，返回的子串不会多于这个参数指定的数组。如果没有设置该参数，整个字符串都会被分割，不考虑它的长度。

```js
let str = "abcdef";
str.split("c");    // 输出结果：["ab", "def"]
str.split("", 4)   // 输出结果：['a', 'b', 'c', 'd'] 
```

如果把空字符串用作 separator，那么字符串中的每个字符之间都会被分割。
```js
str.split("");     // 输出结果：["a", "b", "c", "d", "e", "f"]
```

其实在将字符串分割成数组时，可以同时拆分多个分割符，使用正则表达式即可实现：
```js
const list = "apples,bananas;cherries"
const fruits = list.split(/[,;]/)
console.log(fruits);  // 输出结果：["apples", "bananas", "cherries"]
```

6. 截取字符串
substr()、substring()和 slice() 方法都可以用来截取字符串。

（1） slice()
slice() 方法用于提取字符串的某个部分，并以新的字符串返回被提取的部分。其语法如下：
```js
string.slice(start,end)
```

该方法有两个参数：
- start：必须。 要截取的片断的起始下标，第一个字符位置为 0。如果为负数，则从尾部开始截取。
- end：可选。 要截取的片段结尾的下标。若未指定此参数，则要提取的子串包括 start 到原字符串结尾的字符串。如果该参数是负数，那么它规定的是从字符串的尾部开始算起的位置。

上面说了，如果start是负数，则该参数规定的是从字符串的尾部开始算起的位置。也就是说，-1 指字符串的最后一个字符，-2 指倒数第二个字符，以此类推：
```js
let str = "abcdefg";
str.slice(1,6);   // 输出结果："bcdef" 
str.slice(1);     // 输出结果："bcdefg" 
str.slice();      // 输出结果："abcdefg" 
str.slice(-2);    // 输出结果："fg"
str.slice(6, 1);  // 输出结果：""
```
注意，该方法返回的子串包括开始处的字符，但不包括结束处的字符。
（2） substr()
substr() 方法用于在字符串中抽取从开始下标开始的指定数目的字符。其语法如下：
```js
string.substr(start,length)
```

该方法有两个参数：
- start	必需。要抽取的子串的起始下标。必须是数值。如果是负数，那么该参数声明从字符串的尾部开始算起的位置。也就是说，-1 指字符串中最后一个字符，-2 指倒数第二个字符，以此类推。
- length：可选。子串中的字符数。必须是数值。如果省略了该参数，那么返回从 stringObject 的开始位置到结尾的字串。

```js
let str = "abcdefg";
str.substr(1,6); // 输出结果："bcdefg" 
str.substr(1);   // 输出结果："bcdefg" 相当于截取[1,str.length-1]
str.substr();    // 输出结果："abcdefg" 相当于截取[0,str.length-1]
str.substr(-1);  // 输出结果："g"
```

（3） substring()
substring() 方法用于提取字符串中介于两个指定下标之间的字符。其语法如下：
```js
string.substring(from, to)
```

该方法有两个参数：
- from：必需。一个非负的整数，规定要提取的子串的第一个字符在 string 中的位置。
- to：可选。一个非负的整数，比要提取的子串的最后一个字符在 string 中的位置多 1。如果省略该参数，那么返回的子串会一直到字符串的结尾。

注意： 如果参数 from 和 to 相等，那么该方法返回的就是一个空串（即长度为 0 的字符串）。如果 from 比 to 大，那么该方法在提取子串之前会先交换这两个参数。并且该方法不接受负的参数，如果参数是个负数，就会返回这个字符串。
```js
let str = "abcdefg";
str.substring(1,6); // 输出结果："bcdef" [1,6)
str.substring(1);   // 输出结果："bcdefg" [1,str.length-1]
str.substring();    // 输出结果："abcdefg" [0,str.length-1]
str.substring(6,1); // 输出结果 "bcdef" [1,6)
str.substring(-1);  // 输出结果："abcdefg"
```
注意，该方法返回的子串包括开始处的字符，但不包括结束处的字符。

7. 字符串大小写转换
toLowerCase() 和 toUpperCase()方法可以用于字符串的大小写转换。
（1）toLowerCase()
toLowerCase()：该方法用于把字符串转换为小写。
```js
let str = "adABDndj";
str.toLowerCase(); // 输出结果："adabdndj"
```

（2）toUpperCase()
toUpperCase()：该方法用于把字符串转换为大写。
```js
let str = "adABDndj";
str.toUpperCase(); // 输出结果："ADABDNDJ"
```

我们可以用这个方法来将字符串中第一个字母变成大写：
```js
let word = 'apple'
word = word[0].toUpperCase() + word.substr(1)
console.log(word) // 输出结果："Apple"
```

8. 字符串模式匹配
replace()、match()和search()方法可以用来匹配或者替换字符。
（1）replace()
replace()：该方法用于在字符串中用一些字符替换另一些字符，或替换一个与正则表达式匹配的子串。其语法如下：
```js
string.replace(searchvalue, newvalue)
```

该方法有两个参数：
- searchvalue：必需。规定子字符串或要替换的模式的 RegExp 对象。如果该值是一个字符串，则将它作为要检索的直接量文本模式，而不是首先被转换为 RegExp 对象。
- newvalue：必需。一个字符串值。规定了替换文本或生成替换文本的函数。

```js
let str = "abcdef";
str.replace("c", "z") // 输出结果：abzdef
```

执行一个全局替换, 忽略大小写:
```js
let str="Mr Blue has a blue house and a blue car";
str.replace(/blue/gi, "red");    // 输出结果：'Mr red has a red house and a red car'
```
注意： 如果 regexp 具有全局标志 g，那么 replace() 方法将替换所有匹配的子串。否则，它只替换第一个匹配子串。
（2）match()
match()：该方法用于在字符串内检索指定的值，或找到一个或多个正则表达式的匹配。该方法类似 indexOf() 和 lastIndexOf()，但是它返回指定的值，而不是字符串的位置。其语法如下：
```js
string.match(regexp)
```

该方法的参数 regexp 是必需的，规定要匹配的模式的 RegExp 对象。如果该参数不是 RegExp 对象，则需要首先把它传递给 RegExp 构造函数，将其转换为 RegExp 对象。
注意： 该方法返回存放匹配结果的数组。该数组的内容依赖于 regexp 是否具有全局标志 g。
```js
let str = "abcdef";
console.log(str.match("c")) // ["c", index: 2, input: "abcdef", groups: undefined]
```
（3）search()
search()方法用于检索字符串中指定的子字符串，或检索与正则表达式相匹配的子字符串。其语法如下：
```js
string.search(searchvalue)
```
该方法的参数 regex 可以是需要在 string 中检索的子串，也可以是需要检索的 RegExp 对象。
注意： 要执行忽略大小写的检索，请追加标志 i。该方法不执行全局匹配，它将忽略标志 g，也就是只会返回第一次匹配成功的结果。如果没有找到任何匹配的子串，则返回 -1。
返回值： 返回 str 中第一个与 regexp 相匹配的子串的起始位置。
```js
let str = "abcdef";
str.search(/bcd/)   // 输出结果：1
```

9. 移除字符串收尾空白符
trim()、trimStart()和trimEnd()这三个方法可以用于移除字符串首尾的头尾空白符，空白符包括：空格、制表符 tab、换行符等其他空白符等。
（1）trim()
trim() 方法用于移除字符串首尾空白符，该方法不会改变原始字符串：
```js
let str = "  abcdef  "
str.trim()    // 输出结果："abcdef"
```

注意，该方法不适用于null、undefined、Number类型。
（2）trimStart()
trimStart() 方法的的行为与trim()一致，不过会返回一个从原始字符串的开头删除了空白的新字符串，不会修改原始字符串：
```js
const s = '  abc  ';

s.trimStart()   // "abc  "
```

（3）trimEnd()
trimEnd() 方法的的行为与trim()一致，不过会返回一个从原始字符串的结尾删除了空白的新字符串，不会修改原始字符串：
```js
const s = '  abc  ';

s.trimEnd()   // "  abc"
```

10. 获取字符串本身
valueOf()和toString()方法都会返回字符串本身的值，感觉用处不大。
（1）valueOf()
valueOf()：返回某个字符串对象的原始值，该方法通常由 JavaScript 自动进行调用，而不是显式地处于代码中。
```js
let str = "abcdef"
console.log(str.valueOf()) // "abcdef"
```

（2）toString()
toString()：返回字符串对象本身
```js
let str = "abcdef"
console.log(str.toString()) // "abcdef"
```

11. 重复一个字符串
repeat() 方法返回一个新字符串，表示将原字符串重复n次：
```js
'x'.repeat(3)     // 输出结果："xxx"
'hello'.repeat(2) // 输出结果："hellohello"
'na'.repeat(0)    // 输出结果：""
```

如果参数是小数，会向下取整：
```js
'na'.repeat(2.9) // 输出结果："nana"
```

如果参数是负数或者Infinity，会报错：
```js
'na'.repeat(Infinity)   // RangeError
'na'.repeat(-1)         // RangeError
```

如果参数是 0 到-1 之间的小数，则等同于 0，这是因为会先进行取整运算。0 到-1 之间的小数，取整以后等于-0，repeat视同为 0。
```js
'na'.repeat(-0.9)   // 输出结果：""
```

如果参数是NaN，就等同于 0：
```js
'na'.repeat(NaN)    // 输出结果：""
```

如果repeat的参数是字符串，则会先转换成数字。
```js
'na'.repeat('na')   // 输出结果：""
'na'.repeat('3')    // 输出结果："nanana"
```

12. 补齐字符串长度
padStart()和padEnd()方法用于补齐字符串的长度。如果某个字符串不够指定长度，会在头部或尾部补全。
（1）padStart()
padStart()用于头部补全。该方法有两个参数，其中第一个参数是一个数字，表示字符串补齐之后的长度；第二个参数是用来补全的字符串。
​
如果原字符串的长度，等于或大于指定的最小长度，则返回原字符串：
```js
'x'.padStart(1, 'ab') // 'x'
```

如果用来补全的字符串与原字符串，两者的长度之和超过了指定的最小长度，则会截去超出位数的补全字符串：
```js
'x'.padStart(5, 'ab') // 'ababx'
'x'.padStart(4, 'ab') // 'abax'
```

如果省略第二个参数，默认使用空格补全长度：
```js
'x'.padStart(4) // '   x'
```

padStart()的常见用途是为数值补全指定位数，笔者最近做的一个需求就是将返回的页数补齐为三位，比如第1页就显示为001，就可以使用该方法来操作：
```js
"1".padStart(3, '0')   // 输出结果： '001'
"15".padStart(3, '0')  // 输出结果： '015'
```

（2）padEnd()
padEnd()用于尾部补全。该方法也是接收两个参数，第一个参数是字符串补全生效的最大长度，第二个参数是用来补全的字符串：
```js
'x'.padEnd(5, 'ab') // 'xabab'
'x'.padEnd(4, 'ab') // 'xaba'
```

13. 字符串转为数字
parseInt()和parseFloat()方法都用于将字符串转为数字。
（1）parseInt()
parseInt() 方法用于可解析一个字符串，并返回一个整数。其语法如下：
```js
parseInt(string, radix)
```
该方法有两个参数：

- string：必需。要被解析的字符串。
- radix：可选。表示要解析的数字的基数。该值介于 2 ~ 36 之间。

​
当参数 radix 的值为 0，或没有设置该参数时，parseInt() 会根据 string 来判断数字的基数。
```js
parseInt("10");			  // 输出结果：10
parseInt("17",8);		  // 输出结果：15 (8+7)
parseInt("010");		  // 输出结果：10 或 8
```

当参数 radix 的值以 “0x” 或 “0X” 开头，将以 16 为基数：
```js
parseInt("0x10")      // 输出结果：16
```

如果该参数小于 2 或者大于 36，则 parseInt() 将返回 NaN：
```js
parseInt("50", 1)      // 输出结果：NaN
parseInt("50", 40)     // 输出结果：NaN
```

只有字符串中的第一个数字会被返回，当遇到第一个不是数字的字符为止:
```js
parseInt("40 4years")   // 输出结果：40
```

如果字符串的第一个字符不能被转换为数字，就会返回 NaN：
```js
parseInt("new100")     // 输出结果：NaN
```

字符串开头和结尾的空格是允许的：
```js
parseInt("  60  ")    // 输出结果： 60
```

（2）parseFloat()
parseFloat() 方法可解析一个字符串，并返回一个浮点数。该方法指定字符串中的首个字符是否是数字。如果是，则对字符串进行解析，直到到达数字的末端为止，然后以数字返回该数字，而不是作为字符串。其语法如下：
```js
parseFloat(string)
```

parseFloat 将它的字符串参数解析成为浮点数并返回。如果在解析过程中遇到了正负号（+ 或 -）、数字 (0-9)、小数点，或者科学记数法中的指数（e 或 E）以外的字符，则它会忽略该字符以及之后的所有字符，返回当前已经解析到的浮点数。同时参数字符串首位的空白符会被忽略。
```js
parseFloat("10.00")      // 输出结果：10.00
parseFloat("10.01")      // 输出结果：10.01
parseFloat("-10.01")     // 输出结果：-10.01
parseFloat("40.5 years") // 输出结果：40.5
```


如果参数字符串的第一个字符不能被解析成为数字，则 parseFloat 返回 NaN。
```js
parseFloat("new40.5")    // 输出结果：NaN
```

