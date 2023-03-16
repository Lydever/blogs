/* 统计出字符串中每个字符出现的次数 */

let str = "dfhsjkfdsdssd";
let arr = str.split('');
console.log(arr);

let arr2 = [];
for (let j = 0; j < arr.length; j++) {
  for (let i = j + 1; count = 1; i < arr.length - 1; i++) {
    if (arr[j] === arr[i]) {
      arr.splice(i, 1);
      count++;
    }
  }
  console.log(count)
}


/* ======== JS 统计字符串中每一个字符出现的次数 ======== */

var str = 'ABCABC你好你好ssss';
//用来存储不重复的字符串
var newStr = '';
//字符串去重  将不重复的字符串存储到一个新的字符串内

//将每一个字符单独提出来
for (var i = 0; i < str.length; i++) {
    //判断有没有在newStr中出现过 没有出现过 放到newStr内
    if (newStr.lastIndexOf(str[i]) == -1) {
        newStr += str[i];
    }
}
//  console.log(newStr);//ABC你好の
for (var i = 0; i < newStr.length; i++) {
    var count = 0;
    for (var j = 0; j < str.length; j++) {
        //判断元素是否相等 如果相等 则次数加1
        if(newStr[i]==str[j]){
            count++;
        }
    }
    console.log(newStr[i],count);
}
