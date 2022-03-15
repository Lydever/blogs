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
* */



/*
* ============ 3、bind函数的实现步骤 ==============
* */
