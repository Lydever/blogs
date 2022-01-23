# JavaScript 防抖和节流

## 一、防抖

#### 1. 认识防抖

防抖：在第一次触发事件时，不立即执行函数，而是给出一个限定值，比如200ms，然后：

- 如果在200ms内没有再次触发事件，那么执行函数
- 如果在200ms内再次触发函数，那么当前的计时取消，重新开始计时

应用场景：

- 输入框中频繁的输入内容，搜索或者提交信息
- 频繁的点击按钮，触发某个事件
- 监听浏览器滚定事件，完成某些特定操作
- 用户缩放浏览器的resize 事件

效果：如果短时间内大量触发同一件事，只会执行一次函数。

####  2.防抖函数的实现

防抖函数的核心思路如下：

- 当触发一个函数时，并不会立即执行这个函数，而是会延迟（通过定时器来延迟函数的执行）

- - 如果在延迟时间内，有重新触发函数，那么取消上一次的函数执行（取消定时器）；
  - 如果在延迟时间内，没有重新触发函数，那么这个函数就正常执行（执行传入的函数）；

接下来，就是将思路转成代码即可：

- 定义debounce函数要求传入两个参数

- - 需要处理的函数fn；
  - 延迟时间；

- 通过定时器来延迟传入函数fn的执行

- - 如果在此期间有再次触发这个函数，那么clearTimeout取消这个定时器；
  - 如果没有触发，那么在定时器的回调函数中执行即可；

自定义防抖函数：

```js
function debounce(fn, delay) {
    var timer = null;
    return function () {
        if (timer) clearTimeout(timer);
        timer = setTimeout(function () {
            fn();
        },delay)
    }
}
```



#### 3. 优化参数和this

假如我们需要获取input框中输入的值，如何获取？我们知道在oninput事件触发时会有参数传递，并且触发的函数中this是指向当前的元素节点的

- 目前我们fn的执行是一个独立函数调用，它里面的this是window

- - 我们需要将其修改为对应的节点对象，而返回的function中的this指向的是节点对象；

- 目前我们的fn在执行时是没有传递任何的参数的，它需要将触发事件时传递的参数传递给fn

- - 而我们返回的function中的arguments正是我们需要的参数；

所以我们的代码可以进行如下的优化：

```js
function debounce(fn, delay) {
  var timer = null;
  return function() {
    if (timer) clearTimeout(timer);
    // 获取this和argument
    var _this = this;
    var _arguments = arguments;
    timer = setTimeout(function() {
      // 在执行时，通过apply来使用_this和_arguments
      fn.apply(_this, _arguments);
    }, delay);
  }
}
```

# 二、节流

#### 1. 认识节流

节流：

- 如果短时间内大量触发同一事件，那么在函数执行一次之后，该函数在指定的时间期限内不在工作，直至过了这段时间才重新生效

效果：

- 在某个时间内(比如500ms)，某个函数只能被触发一次

应用场景：

- 监听页面的滚定事件

- 鼠标移动事件
- 搜索框input事件，要支持实时搜索可以使用节流方案

- 用户频繁点击按钮操作

- 游戏中的一些设计

总结：同样是密集的事件触发，但是这次密集事件触发的过程，不会等待最后一次才进行函数调用，而是会按照一定的频率进行调用。
 

#### 2. 节流的实现

节流函数的默认实现思路我们采用时间戳的方式来完成：

- 我们使用一个last来记录上一次执行的时间

- - 每次准备执行前，获取一下当前的时间now：`now - last > interval`
  - 那么函数执行，并且将now赋值给last即可

基础版：

```js
    function throttle(fn, interval) {
        var last = 0;
        return function () {
            // this和arugments
            var _this = this;
            var _arguments = arguments;
            var now = new Date().getTime();
            if (now - last > interval) {
                fn.apply(_this, _arguments);
                last = now;
            }
        }
    }
```

优化最后执行：

默认情况下，我们的防抖函数最后一次是不会执行的

- 因为没有达到最终的时间，也就是条件`now - last > interval`满足不了的
- 但是，如果我们希望它最后一次是可以执行的，那么我们可以让其传入对应的参数来控制

代码实现：

```js
    function throttle(fn, interval) {
        var last = 0;
        var timer = null; // 记录定时器是否已经开启
        return function () {
            // this和arguments;
            var _this = this;
            var _arguments = _arguments;
            var now = new Date().getTime();
            if (now - last > interval) {
                if (timer) { //若已经开启，则不需要开启另外一个定时器了
                    clearTimeout(timer);
                    timer = null;
                }
                fn.apply(_this, _arguments);
                last = now;
            } else if (timer === null) { // 没有立即执行的情况下，就会开启定时器
                //只是最后一次开启
                timer = setTimeout(function () {
                    timer = null; // 如果定时器最后执行了，那么timer需要赋值为null
                    fn.apply(_this, _arguments);
                },interval)
            }
        }
    }
```

