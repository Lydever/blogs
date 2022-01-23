# Reflect

**Reflect** 是一个内置的对象，它提供拦截 JavaScript 操作的方法。这些方法与[proxy handlers ](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Proxy/Proxy)的方法相同。`Reflect`不是一个函数对象，因此它是不可构造的。

## [描述](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Reflect#描述)

与大多数全局对象不同`Reflect`并非一个构造函数，所以不能通过[new运算符](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Operators/new)对其进行调用，或者将`Reflect`对象作为一个函数来调用。`Reflect`的所有属性和方法都是静态的（就像[`Math`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Math)对象）。

`Reflect` 对象提供了以下静态方法，这些方法与[proxy handler methods (en-US)](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Proxy/Proxy)的命名相同.

其中的一些方法与 [`Object`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Object)相同, 尽管二者之间存在 [某些细微上的差别](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Reflect/Comparing_Reflect_and_Object_methods)

## [静态方法](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Reflect#静态方法)

- [`Reflect.apply(target, thisArgument, argumentsList)`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Reflect/apply)

  对一个函数进行调用操作，同时可以传入一个数组作为调用参数。和 [`Function.prototype.apply()`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Function/apply) 功能类似。

- [`Reflect.construct(target, argumentsList[, newTarget\])`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Reflect/construct)

  对构造函数进行 [`new` ](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Operators/new)操作，相当于执行 `new target(...args)`。

- [`Reflect.defineProperty(target, propertyKey, attributes)`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Reflect/defineProperty)

  和 [`Object.defineProperty()`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Object/defineProperty) 类似。如果设置成功就会返回 `true`

- [`Reflect.deleteProperty(target, propertyKey)`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Reflect/deleteProperty)

  作为函数的[`delete`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Operators/delete)操作符，相当于执行 `delete target[name]`。

- [`Reflect.get(target, propertyKey[, receiver\])`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Reflect/get)

  获取对象身上某个属性的值，类似于 `target[name]。`

- [`Reflect.getOwnPropertyDescriptor(target, propertyKey)`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Reflect/getOwnPropertyDescriptor)

  类似于 [`Object.getOwnPropertyDescriptor()`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Object/getOwnPropertyDescriptor)。如果对象中存在该属性，则返回对应的属性描述符, 否则返回 [`undefined`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/undefined).

- [`Reflect.getPrototypeOf(target)`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Reflect/getPrototypeOf)

  类似于 [`Object.getPrototypeOf()`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Object/GetPrototypeOf)。

- [`Reflect.has(target, propertyKey)`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Reflect/has)

  判断一个对象是否存在某个属性，和 [`in` 运算符](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Operators/in) 的功能完全相同。

- [`Reflect.isExtensible(target)`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Reflect/isExtensible)

  类似于 [`Object.isExtensible()`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Object/isExtensible).

- [`Reflect.ownKeys(target)`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Reflect/ownKeys)

  返回一个包含所有自身属性（不包含继承属性）的数组。(类似于 [`Object.keys()`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Object/keys), 但不会受`enumerable影响`).

- [`Reflect.preventExtensions(target)`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Reflect/preventExtensions)

  类似于 [`Object.preventExtensions()`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Object/preventExtensions)。返回一个[`Boolean`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Boolean)。

- [`Reflect.set(target, propertyKey, value[ receiver])`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Reflect/set)

  将值分配给属性的函数。返回一个[`Boolean`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Boolean)，如果更新成功，则返回`true`。

- [`Reflect.setPrototypeOf(target, prototype)`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Reflect/setPrototypeOf)

  设置对象原型的函数. 返回一个 [`Boolean`](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Boolean)， 如果更新成功，则返回`true。`

# 实例

检测一个对象是否存在特定属性

```js
const apiJson = {
  name: 'static data',
  type: 'static',
  getData: function() {
    console.log(`获取的数据类型为：${this.name}`);
  }
}

Reflect.has(apiJson, 'type');  // true
Reflect.has(apiJson, 'age');   // false
```

![image-20220123233643360](C:\Users\Ly\AppData\Roaming\Typora\typora-user-images\image-20220123233643360.png)

为这个对象添加一个新属性：

```js
Reflect.set(apiJson, 'data', '静态数据1');
```

![image-20220123233702129](C:\Users\Ly\AppData\Roaming\Typora\typora-user-images\image-20220123233702129.png)

返回这个对象自身的属性：

```js
Reflect.ownKeys(apiJson)
```



![image-20220123233820733](C:\Users\Ly\AppData\Roaming\Typora\typora-user-images\image-20220123233820733.png)

```js
// 检测一个对象是否存在特定属性
  const apiJson = {
    name: 'static data',
    type: 'static',
    getData: function() {
      console.log(`获取的数据类型为：${this.name}`);
    }
  }

  console.log(Reflect.has(apiJson, 'type'));  // true
  console.log(Reflect.has(apiJson, 'age'));   // false

  // Reflect.set(apiJson, 'data', '静态数据1');
  console.log(Reflect.set(apiJson, 'data', '静态数据1')); // true

  // 返回这个对象自身的属性
  console.log(Reflect.ownKeys(apiJson));
```

