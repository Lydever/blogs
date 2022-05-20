const express = require("express")
const expressWs = require("express-ws")
const app = express();
const port = 7000;
expressWs(app)

// 中间件
app.use(express.static('public'))  // 主动访问public下的文件
app.get("*", (req, res) => { })
app.listen(port, () => {
  console.log(`Server is running at wx://localhost:${port}`)
})