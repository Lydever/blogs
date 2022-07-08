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
          <h2>You clicked ${count} times</h2>
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