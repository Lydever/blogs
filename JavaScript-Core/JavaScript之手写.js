// 1、手写Object.create
// 思路： 将传入的对象作为原型
function create(obj) {
  function F() { }
  F.prototype = obj
  return new F()
}

// 2、手写instanceof
// instanceof运算符用于判断构造函数的prototype属性是否出现在对象的原型链中的任何位置
// 实现步骤：
// 1.首先获取类型的原型
// 2. 然后获取对象的原型
// 3. 然后一直循环判断对象的原型是否等于类型的原型，指导对象原型为null，
// 因为，原型链最终为null

function mInstanceof(left, right) {
  let proto = Object.getPrototypeOf(left) // 获取对象的原型
  let prototype = right.prototype // 获取构造函数的prototype对象
  // 判断构造函数的prototype对象是否在对象的原型链上
  while (true) {
    if (!proto) return false;
    if (proto === prototype) return true;

    proto = Object.getPrototypeOf(proto)
  }
}