/**
 * @Description:
 * @Author:   liyingxia
 * @CreateDate:  2022/3/16 17:26
 */
// 变量R的原型 存在于 变量L的原型链上
function instance_of (L, R) {
  // 验证如果为基本数据类型，就直接返回 false
  const baseType = ['string', 'number', 'boolean', 'undefined', 'symbol']
  if(baseType.includes(typeof(L))) { return false }

  let RP = R.prototype;  // 取 R 的显示原型
  L = L.__proto__; // 取 L 的隐式原型
  while (true) {
    if (L === null) { // 找到最顶层
      return false;
    }
    if (L === RP) { // 严格相等
      return true;
    }
    L = L.__proto__;  // 没找到继续向上一层原型链查找
  }
}

function create(obj) {
  function F() {}
  F.prototype = obj
  return new F()
}

function myInstanceof(left,right) {
  let proto = Object.getPrototypeOf(left),prototype = right.prototype;
  while(true) {
    if (!proto) return false;
    if (proto === prototype) return true;
    proto = Object.getPrototypeOf(proto)
  }
}
/*
* 创建一个空对象
* 设置原型，将对象的原型设置为函数的prototype对象
* 让函数的this指向这个这个对象，执行构造函数的代码
* */
function getType(value) {
  // 判断数据是null的情况
  if (value === null) {
    return value + ""
  }
  // 判断数据是引用类型的情况
  if (typeof value === "object") {
    let valueClass = Object.prototype.toString.call(value),type = valueClass.split(" ")[1].split("");
    type.pop();
    return type.join("").toLowerCase();
  } else {
    return typeof value;
  }
}

/*
* 手写call
* 判断调用函数对象是否为函数，即使我们是定义在函数的原型上的，但是可能出现使用call等方式调用的情况
* 判断传入的上下文对象是否存在，如果不存在则设置为window
* 处理传入的参数，截取第一个参数后的所有参数
* 将函数作为上下文对象的一个属性
* 使用上下文对象来调用这个方法，并保存返回结果
* 删除刚才增加的属性
* 返回结果
* */
Function.prototype.myCall = function (context) {
  // 判断调用对象
  if (typeof this !== "function") {
    console.error("type error")
  }
  // 获取参数
  let args = [...arguments].slice(1),result = null;
  // 判断context是否传入，如果未传入则设置为window
  context = context || window;
  // 将调用函数设置为对象的方法
  context.fn = this;
  // 调用函数
  result = context.fn(...args);
  delete context.fn;
  return result;
}

/*
* 手写apply
* 判断调用对象是否为函数，即使我们是定义在函数的原型上的，但是可能出现使call等方式的情况
* 判断传入上下文对象是否存在，如果不存在则设置为window、
* 将函数作为上下文对象地一个属性
* 判断参数值是否传入
* 使用上下文对象来调用这个方法，并保存返回结果
* 删除刚才新增加的属性
* */
// apply 函数的实现
Function.prototype.myApply = function (context) {
  // 判断调用对象是否为函数
  if (typeof this !== "function") {
    throw new TypeError("Error")
  }

  let result = null;
  // 判断context 是否存在，如果未设置则设置window
  context = context || window;
  // 将函数设置为对象的方法
  context.fn = this;
  // 调用方法
  if (arguments[1]) {
    result = context.fn(...arguments[1])
  } else {
    result = context.fn();
  }
  // 将属性删除
  delete context.fn;
  return result;
}










