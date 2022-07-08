// useState
// 和class的state一样，产生的state表示随着2时间（用户交互）发生改变，值也会发生改变
const RenderFunctionComponent = () => {
  const [state,setState] = useState('hello useState')

  return (
    <button type="" onClick={() => setState('hello')}>{state}</button>
  );
}