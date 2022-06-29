React 把组件看成是一个状态机（State Machines）。通过与用户的交互，实现不同状态，然后渲染 UI，让用户界面和数据保持一致。

React 里，只需更新组件的 state，然后根据新的 state 重新渲染用户界面（不要操作 DOM）。

以下实例创建一个名称扩展为 React.Component 的 ES6 类，在 render() 方法中使用 this.state 来修改当前的时间。

添加一个类构造函数来初始化状态 this.
```js
class Clock extends React.Component {
  constructor(props) {//不管有没有定义constructor方法，任何一个子类都会自动添加该方法
    super(props);//它在这里表示父类的构造函数，用来新建父类的this对象。如果不调用super方法，子类就得不到this对象。
    this.state = { date: new Date() };//有constructor钩子函数时候，可以定义state，如果用户不定义state的话，有无constructor钩子函数时候没有区别。
  }
 
  render() {
    return (
      <div>
        <h1>Hello, world!</h1>
        <h2>现在是 {this.state.date.toLocaleTimeString()}.</h2>
      </div>
    );
  }
}
 
ReactDOM.render(
  <Clock />,
  document.getElementById('example')
);
```

结论： 如果组件要定义自己的state初始状态的话，需要写在constructor钩子函数中，

如果用户不使用state的话，纯用props接受参数，有没有constructor钩子函数都可以，可以不用constructor钩子函数。

----super中的props是否必要？ 作用是什么？？
首先要明确很重要的一点就是：

可以不写constructor，一旦写了constructor，就必须在此函数中写super(),

此时组件才有自己的this，在组件的全局中都可以使用this关键字，

否则如果只是constructor 而不执行 super() 那么以后的this都是错的！！！

来源：http://es6.ruanyifeng.com/#docs/class-extends



可以得出结论：当想在constructor中使用this.props的时候，super需要加入(props)，

此时用props也行，用this.props也行，他俩都是一个东西。（不过props可以是任意参数，this.props是固定写法）。

如果在custructor生命周期不使用 this.props或者props时候，可以不传入props。

将生命周期添加到类中：
```js
class Clock extends React.Component {
  constructor(props) {
    super(props);
    this.state = {date: new Date()};
    //(第一步)当 <Clock /> 被传递给 ReactDOM.render() 时，React 调用 Clock 组件的构造函数。 由于 Clock 需要显示当前时间，所以使用包含当前时间的对象来初始化 this.state 。 我们稍后会更新此状态。
  }
 
  componentDidMount() {//（第三步）当 Clock 的输出插入到 DOM 中时，React 调用 componentDidMount() 生命周期钩子
    this.timerID = setInterval(//Clock 组件要求浏览器设置一个定时器，每秒钟调用一次 tick()。
      () => this.tick(),
      1000
    );
  }
 
  componentWillUnmount() {
    clearInterval(this.timerID);
  }//一旦 Clock 组件被从 DOM 中移除，React 会调用 componentWillUnmount() 这个钩子函数，定时器也就会被清除。
 
  tick() {
    //浏览器每秒钟调用 tick() 方法。 在其中，Clock 组件通过使用包含当前时间的对象调用 setState() 来调度UI更新
    this.setState({
      date: new Date()
    });
  }
//React 知道状态已经改变，并再次调用 render() 方法来确定屏幕上应当显示什么。 这一次，render() 方法中的 this.state.date 将不同，所以渲染输出将包含更新的时间，并相应地更新 DOM。 
 
  render() {
    return (
      <div>
        <h1>Hello, world!</h1>
        <h2>现在是 {this.state.date.toLocaleTimeString()}.</h2>
      </div>
    );
  }
}
 
ReactDOM.render(
    //(第二步)React 然后调用 Clock 组件的 render() 方法。这是 React 了解屏幕上应该显示什么内容，然后 React 更新 DOM 以匹配 Clock 的渲染输出。
  <Clock />,
  document.getElementById('example')
);
```
结果（输出的时间会实时更新）：



设置状态:setState
setState(object nextState[, function callback])
参数说明
nextState，将要设置的新状态，该状态会和当前的state合并
callback，可选参数，回调函数。该函数会在setState设置成功，且组件重新渲染后调用。
合并nextState和当前state，并重新渲染组件。setState是React事件处理函数中和请求回调函数中触发UI更新的主要方法。

关于setState
不能在组件内部通过this.state修改状态，因为该状态会在调用setState()后被替换。

setState()并不会立即改变this.state，而是创建一个即将处理的state。setState()并不一定是同步的，为了提升性能React会批量执行state和DOM渲染。

setState()总是会触发一次组件重绘，除非在shouldComponentUpdate()中实现了一些条件渲染逻辑。

```js
class Counter extends React.Component{
  constructor(props) {
      super(props);
      this.state = {clickCount: 0};
      this.handleClick = this.handleClick.bind(this);//我们需要通过bind改变this指向，使得this指向当前的组件，否则会报错
  }
  
  handleClick() {
    this.setState(function(state) {
      return {clickCount: state.clickCount + 1};
    });
  }
  render () {
    return (<h2 onClick={this.handleClick}>点我！点击次数为: {this.state.clickCount}</h2>);
  }//在this指向未改变之前，我们会认为this指向的就是当前组件，其实并不是,它指向的是当前的方法，
}
ReactDOM.render(
  <Counter />,
  document.getElementById('example')
);
 


```