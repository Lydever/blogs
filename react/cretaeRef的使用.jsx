
class App extends React.Component {
  constructor(props) {
    super(props);
    this.node = React.createRef()
  }

  componentMount() {
    console.log(this.node)
  }


  render() {
    return <div ref={ this.node }>my name is lizi</div>
  }


}