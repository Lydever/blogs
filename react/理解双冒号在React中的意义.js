
我在看一些项目的时候遇到了::这种写法，查了之后才知道这种是ES7针对.bind的新语法。

例如：在React中我们常见的写法是<button onClick={this.handleClick,bind(this)}></button>,那么ES7中我们可以按照如下格式方法书写

：<button onClick={::this.handleClick}></button>