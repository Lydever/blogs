/**
 * @Description: 实现call、apply、bind函数
 * @Author:   liyingxia
 * @CreateDate:  2022/3/15 19:38
 */

/*
* ============ 1、call函数的实现步骤 ==============
* */
/**
 * @description： ：
 * - 判断调用对象是否为函数，即使是定义在函数的原型上的，但是也可能出现使用call等方式调用的情况
 * - 判断传入上下文对象是否存在，如果不存在，则设置为window
 * - 处理传入的参数，截取第一个参数后的所有参数
 * - 将函数作为上下文对象的一个属性
 * - 使用上下文对象来调用这个方法，并保存返回结果
 * - 删除刚才新增的属性
 * - 返回结果
 */
  Function.prototype.myCall = function (context) {
    // 1.判断调用对象
    if (typeof this !== 'function') {
      console.log("type error")
    }
    // 2.获取参数
    let args = [...arguments].slice(1);
    let result = null;
    // 3. 判断context是否传入，如果为传入则设置为window
    context = context || window;
    // 4.将调用函数设置为对象的属性/方法
    context.fn = this;
    // 5.调用函数
    result = context.fn(...args);
    // 6.将属性删除
    delete context.fn;
    return result;
  }




/*
* ============ 2、apply函数的实现步骤 ==============
* 1. 判断调用对象是否为函数，即使是定义在函数的原型上的，但是可能出现使用call等方式调通的情况
* 2. 判断传入上下文对象是否存在，如果不存在，则设置为window
* 3. 将函数作为上下文对象的一个属性
* 4. 判断参数值是否传入
* 5. 使用上下文对象来调用这个方法，并保存返回结果
* 6. 删除刚才添加的属性
* 7. 返回结果
* */
  Function.prototype.myApply = function (context) {
    // 判断调用对象是否为函数
    if (typeof this !== 'function') {
      throw new TypeError('Error')
    }
    let result = null;
    // 判断context是否存在，如果如果未传入则为window
    context = context || window;
    // 将函数设置为对象的方法
    context.fn = this;
    // 调用方法
    if (arguments[1]) {
      result = context.fn(...arguments[1]);
    } else {
      result = context.fn();
    }
    // 将属性删除
    delete context.fn;
    return result
  }



/*
* ============ 3、bind函数的实现步骤 ==============
*
* 1. 判断调用对象是否为函数，即使定义在函数的原型上的，但是可能出现使用call等方式调用的情况
* 2. 保存当前函数的引用，获取其余传入的参数值
* 3 创建一个函数返回
* 4. 函数内部使用apply来绑定函数调用，需要判断函数作为构造函数的情况
* 这个需要传入当前函数的this给apply调用，其余情况都传入指定的上下文对象。
* */
  Function.prototype.myBind = function (context) {
    // 判断调用对象是否为函数
    if (typeof this !== 'function') {
      throw new TypeError('Error')
    }
    // 获取参数
    var args = [...arguments].slice(1)
    var fn = this;
    return function Fn() {
      // 根据调用方式，传入不同绑定值
      return fn.apply(
        this instanceof Fn ? this : context,
        args.concat(...arguments)
      )
    }
  }
