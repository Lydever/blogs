// 1、 useState
// 和class的state一样，产生的state表示随着2时间（用户交互）发生改变，值也会发生改变
const RenderFunctionComponent = () => {
  const [state,setState] = useState('hello useState')

  return (
    <button type="" onClick={() => setState('hello')}>{state}</button>
  );
}

// 2、 useReducer
// 一个useState的替代方案，就像一个简易的redux
const initialState = {
    count: 1
};
const reducer = (state, action) => {
    switch(action.type){
        case 'increment':
            return {
                count: state.count+1
            }
            break;
        case 'decrement':
            return {
                count: state.count-1
            }
            break;
        default:
            throw new Error();        
    }
}

const Counter = () => {
    const [state,dispatch0] = useReducer(reducer,initialState);
    return (
        <>
            Count: {state.count}
        <button onClick={() => dispatch({type: 'increment'})}>+1</button>
        <button onClick={() => dispatch({ type: 'decrement' })}>-1</button>
        </>
    )
}

// 3、 useEffect
// 使用useEffect可以用来执行副作用，何为副作用？意思是修改了自我作用域之外的状态，或者除return外，与作用域之外的函数有数据交互
// 在项目中应用广泛，用来初始化数据的请求，初始化事件的绑定与销毁。中间态的请求（只需要设置useEffect的依赖即可）
// 一个class与一个hook的对比
// 1.1 class
class Exeaple extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            count: 0
        };
    }

    componentDidMount(){
        document.title = `You clicked ${this.state.count} times`;
    }
    componentDidUpdate() {
        document.title = `You clicked ${this.state.count} times`;
    }

    render(){
        return (
            <>
              <h2>You clicked {this.state.count} times</h2>
              <button onClick={this.setState({ count: this.state.count+1 })}>Click Me</button>
            </>
        )
    }
}

// 2. hooks
import { useState,useEffect } from 'React'
const Exeaple2 = () => {
    const [count,setCount] = useState(0);

    useEffect(() => {
        document.title = `You clicked ${count} times`
    });

    return (
        <>
          <h2>`You clicked ${count} times`</h2>
          <button onClick={() => setCount(count + 1)}>Click me </button>
        </>
    )
}

// 一个有搜索功能组件的useEffcet
const SearchComponent = () => {
     const [searchVal,setSearchVal] = useState();

     useEffect(() => {
        const getList = async () => {

        }
        getList();
     }, [searchVal]);

     return (
        <>
          <Input value={ searchVal } onChange={ e => setSearchVal(e.target.value) } />
        </>
     )
}
// 需要注意的是:
//   1. useEffect第二个参数为空的话，则执行一次（时间绑定是一个场景），如果没有第二个参数，则每次渲染均会执行
//   2. 可根据业务的不同划分成多个useEffect，而不用像class一样只能在生命周期中书写,关注业务点分离
//   3. 可在react内置的hook api基础上实现自定义hook，实现逻辑复用。

// 4. useContext
const value = useContext(myContext)

// 5. useRef
// 可存储任意变量
const InputWithFocusButton = () => {
    const inputEl = useRef(null);
    const onButtonClick = () => {
        //`current`指定已挂载到DOM上的文本输入元素
        inputEl.current.focus();
    };
    return (
        <>
          <input ref={ inputEl } type="text" />
          <button onClick={ onButtonClick }>focus the input</button>
        </>
    );
}



// 5. useCallback
// 返回一个 memoized 的函数（注意不要滥用：记住函数，以及比较是否需要生成新的函数，未必性能就比串讲一个函数性能好。
// 向下传递回调时可以使用，也可使用useReducer的dispatch向下传递）
const memoizedCallback = useCallback(
    () => {
        doSomething(a,b);
    },
    [a,b],
)

// 6. useMemo
// 返回一个memoized值，（注意不要滥用：在计算开销比较大时，建议采用）
const memoizedVal = useMemo(
    (() => computeExpensiveVal(a,b),[a,b])
)