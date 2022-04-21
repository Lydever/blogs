// 手写object.create()
function create(obj) {
  function F() { }
  F.prototype = obj
  return new F()
}

// 手写instanceof
function myInstanceof(left, right) {
  let proto = Object.getPrototypeOf(left) // 获取对象的原型
  let prototype = right.prototype;  // 获取构造函数的prototype
  // 判断构造函数的prototype 对象是否在对象的原型链上
  while (true) {
    if (!proto) return false;
    if (proto === prototype) return true;
    proto = Object.getPrototypeOf(proto)
      
  }
}

// 手写new操作符
/* 1.首先创建一个洗的空对象
2.设置原型，将对象的原型设置为函数的prototype对象
3. 让函数的this指向这个对象，执行构造函数的代码，为这个新对象添加属性和方法
4. 判断函数的返回值，如果是值类型，返回创见的对象，如果是引用类型，返回这个引用类型的对象 */
function objectFactory() {
  let newObject = null;
  let constructor = Array.prototype.shift.call(arguments)
  let result = null;
  // 判断参数是否是一个函数
  if (typeof constructor !== 'function') {
    conso.error("type error")
    return;
  }
// 新建一个空对象，对象的原型为构造函数的prototype对象
  newObject = Object.create(constructor.prototype);
  // 将this指向新建对象，并执行函数
  result = constructor.apply(newObject, arugments);
  // 判断返回对象
  let flag = result && (typeof result === 'object' || typeof result === 'function')
  // 判断返回结果
  return flag ? result : newObject;
}

/* 手写Promise
 */
const PENDING = "pending"
const RESOLVED = "resolved"
const REJECTED = "rejected"

function MyPromise(fn) {
  // 保存初识状态
  let self = this;
  // 初始化状态
  this.state = "pending";
  // 用于保存resolve或者rejected传入的值
  this.value = null;
  // 用于保存resolve的回调函数
  this.resolvedCallbacks = [];
  // 用于保存reject的回调函数
  this.rejectedCallbacks = [];
  // 状态转变为resolved的方法
  function resolve(value) {
    // 判断传入元素是否为Promise值，如果是，则状态改变必须等待前一个状态改变后再进行改变
    if (value instanceof MyPromise) {
      return value.then(resolve, reject);
    }

    // 保证代码的执行顺序为本轮事件循环的末尾
    setTimeout(() => {
      // 只有状态为epnding时才能转变
      if (self.state === "pending") {
        // 修改状态
        self.state = "resolved";
        // 设置传入的值
        self.value = value;
        // 执行回调函数
        self.resolvedCallbacks.forEach(callback => {
          callback(value);
        })
      }
    },0)

  }
    // 状态转变为rejected的方法
  function reject(value) {
    // 保证代码的执行顺序为本轮事件循环的末尾
    setTimeout(() => {
      // 只有状态为pendiing时才能转变
      if (self.state === "pending") {
        // 修改状态
        self.state = 'rejected'
        // 设置传入的值
        self.value = value
        // 执行回调函数
        self.rejectedCallbacks.forEach(callback => {
          callback(value)
        })
      }
    },0)
  }

  // 将两个方法传入函数执行
  try {
    fn(resolve, reject);
  } catch (e) {
    reject(e)
  }
}

MyPromise.prototype.then = function (onResolved, onRejected) {
  // 首先判断两个参数是否为函数类型，因为这两个参数是可选参数
  onResolved =
    typeof onResolved === "function"
      ? onResolved
      : function (value) {
        return value;
      };
  onRejected =
    typeof onRejected === "function"
      ? onRejected
      : function (error) {
        throw error
      };
  //如果是等待状态，则函数加入对应列表中
  if (this.state === "pending") {
    this.resolvedCallbacks.push(onResolved);
    this.rejectedCallbacks.push(onRejected);
  }
  // 如果状态已经凝固，则直接执行对应状态的函数
  if (this.state === 'resolved') {
    onResolved(this.value)
  }
  if (this.state === 'rejected') {
    onRejected(this.value)
  }
  
};

// 防抖函数的实现
function debounce(fn, wait) {
  let timer = null;
  return function () {
    let context = this;
    let args = arguments;
    // 如果此时存定时器，则取消之前的定时器重新计时
    if (timer) {
      clearTimeout(timer);
      timer = null;
    }
    // 设置定时器，使事件间隔指定事件后执行
    timer = setTimeout(() => {
      fn, apply(context, args)
    }, wait);
  }
}

function throttle(fn, delay) {
  let curTime = Date.now();
  return function () {
    let context = this;
    let nowTime = Date.now();
    // 如果两次时间间隔超过了指定时间，则执行函数
    if (nowTime - curTime >= delay) {
      curTime = Date.now();
      return fn.apply(context, arguments)
    }
  };
}

// 实现每隔一秒打印1,2,3,4
// 使用闭包实现
for (var i = 0; i < 5; i++) {
  (function (i) {
    setTimeout(function () {
      console.log(i)
    }, 1*1000)
  })(i)
}
 
for (let i = 0; i < 5; i++){
  setTimeout(function () {
    console.log(i)
  }, i*1000)
}

// 手写类型判断函数
function getType(params) {
  // 判断数据是null的情况
  if (params === null) {
    return params + "";
  }

  // 判断诗句是引用类型的情况
  if (typeof params === "object") {
    let valClass = Object.prototype.toString.call(params),
      type = valClass.split(" ")[1].split("");
    type.pop();
    return type.join("").toLowerCase();
  } else {
    // 判断数据是基本数据类型的情况和函数的情况
    return typeof params
  }
}

let xml = new XMLHttpRequest();
xml.open("GET", './', true);
xml.onreadystatechange = function () {
  if(this.readyState)
}