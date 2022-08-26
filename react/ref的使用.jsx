const App = () => {
  const node = React.useRef()

  useEffect(() => {
    console.log(node.current)
  }, [])
  

  return <div ref={ node }>my name is lizi</div>
  
}