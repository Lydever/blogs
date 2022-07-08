// useState
// 和class的state一样，产生的state表示随着2时间（用户交互）发生改变，值也会发生改变
const RenderFunctionComponent = () => {
  const [state,setState] = useState('hello useState')

  return (
    <button type="" onClick={() => setState('hello')}>{state}</button>
  );
}

// useReducer
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

