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