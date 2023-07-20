/**
 * @Description:  js 对象转数组
 * @Author:         liyingxia
 * @CreateDate:     2022/1/5 22:53
 *
 * let userObj = {
    role: 1,
    org:  2
}

 转换为:
 let userArr = [
 {roleName: 'role', value: 1},
 {orgName: 'org', value: 2}
 ]
 */

// 使用Object.entries + Array.prototype.map 对象转数组
const objToArray = (objData, keyName, valName) => {
  return Object.entries(objData)   //Object.entries(objData) 先把数据转成 [[key, value], ...]
    .map(([keyName,valName]) => ({keyName, valName})) // .map(([keyName, valName]) => ({keyName, valName})) 对 [key, value] 解构
}

// Object.keys + Array.prototype.map 对象转数组
const objToArr = (obj, keyName, valName) => {
  // Object.keys(data) 先把数据转成 [key, key, key, ...]
  // .map(key => ({keyName: key, valName: obj[key]}))
  // 遍历 keys 取出 key 和 value obj[key]，
  // 然后返回 {keyName: keyName, valName: valName} 格式
  return Object.keys(obj).map(key => ({keyName: key, valName: obj[key]}))
}

// 使用 Object.fromEntries + Array.prototype.map 数组转对象
const arrToObj = (data, keyName, valName) => {
  // data.map(item => ([item.typeName, item.valueName])) 先把数据转成 [[key, value], ...]
  // Object.fromEntries() 相当于 Object.entries() 逆方法
  // 然后返回 {typeName: valueName} 格式
  return Object.fromEntries(data.map(item => ({item[keyName], item[valName]})))
}

//JS 一维数组转、树形结构数组相互转换
/*
* let dataArr = [
  { id: 1, pid: 0 },
  { id: 2, pid: 1 }
]
let dataTree = [
  {
    id: 1,
    pid: 0,
    children: [
      {
        id: 2,
        pid: 1
        children: []
      }
    ]
  }
]
* */

// 递归方法转树形结构数据
// 计算量大
// 不会改变原有数据
/*
* 一般 pid 就是 parentId，指的是父级 id，这里默认是 pid
  一般 pidVal 的值为 0 时，默认是根节点
  childName 在大多数表格，多级嵌套等组件里通常都是用 children 命名，这里默认是 children
* */
const arrToTreeData = (data, pid=0, pidName='父节点', childrenName='children') => {
  let result = [];
    data.forEach(item => {
      if (item[pidName] === pid) {
        result.push({
          ...item,
          [childrenName]: arrToTreeData(data, item.id)
        })
      }
  })

  return result
}

// 广度法树形结构数据扁平化
// 不使用深拷贝则会改变原始数据

const cutTree = (data, chilName='children') => {
  let result = [];
  while(data.length != 0) {
    let shift = data.shift();
    let children = shift[chilName]
    delete shift[chilName]
    result.push(shift)

    if (chilName) {
      children.forEach(item => {
        data.push(item)
      })
    }
  }
  return result
}
