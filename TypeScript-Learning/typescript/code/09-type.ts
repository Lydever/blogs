// 类型别名
type lcString = string;

let usernmae:lcString = '老陈'
// usernmae = 123

type lcStringNumber = string|number;
let user1:lcStringNumber = 123;
user1='123';

// 约束字符串的取值
type Eventname = 'click'|'scroll'|'mousemove';

let eventStr:Eventname = 'scroll';