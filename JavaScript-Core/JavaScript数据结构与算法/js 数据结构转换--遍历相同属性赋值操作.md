例如:
```javascript
list: [
    {id: 1, title: "党委组织部", desc: ""},
    {id: 2, title: "财务部", desc: ""},
    {id: 3, title: "党委组织部", desc: ""},
    {id: 4, title: "党委组织部", desc: ""},
    {id: 5, title: "人事部", desc: ""},
    {id: 6, title: "人事部", desc: ""},
    {id: 7, title: "人事部", desc: ""}
]
```

遍历数组里所有的对象元素, 根据某个对象属性,例如:title, 如果title的属性值都相同的话,则给数组里属性值相同的第一个对象元素添加isShow:true属性,其他添加为isShow:false
转换结果如下:
```javascript
list: [
    {id: 1, title: "党委组织部", desc: "", isShow: true},
    {id: 2, title: "财务部", desc: "", isShow: true},
    {id: 3, title: "党委组织部", desc: "", isShow: false},
    {id: 4, title: "党委组织部", desc: "", isShow: false},
    {id: 5, title: "人事部", desc: "", isShow: true},
    {id: 6, title: "人事部", desc: "", isShow: false},
    {id: 7, title: "人事部", desc: "", isShow: false},
    {id: 8, title: "财务部", desc: "", isShow: false}
]
```
### 思路一: reduce + find
```javascript

const formatData = (arr) => {
  let result = arr.reduce((acc,item) => {
    let find = acc.find((v) => v.title === item.title)
    item.isType = find ? false : true;
    return[...acc,item]
  },[])

  return result
}

```

### 思路二: 双层for循环
```javascript
const formatData = (arr) => {
  for (let i = 0; i < list.length; i++) {
    let title = list[i].title
    if (list[i].isShow == undefined) {
      // 防止重复赋值, 第一次时该字段是undefined
      list[i].isShow = true
    }

    // 判断当前i后面的对象
    for (let j = i + 1; j < list.length; j++) {
      if (list[j].title === title) {
        list[j].isShow = false
      }
    }
  }

  return arr
}
```
### 思路三: map + includes
```javascript
const formatData = (arr) => {
  let arr = []
	let result = list.map(v => ({
    ...v, isShow: arr.includes(v.title) ? false : arr.push(v.title) && true
  }))

  return result
}
```
### 思路四: reduce + some
```javascript
const formatData = (arr) => {
  let result = list.reduce((s, v) => {
    s.push({
      ...v, 
      isShow: !s.some(it => it.title === v.title)
    }) && s
  }, [])

  return result
}
```
### 思路五: forEach + findIndex
```javascript
    const formatData = (arr) => {
        arr.forEach((item, index) => item.isShow = index === arr.findIndex((subItem) => subItem => subItem.title === item.title))

        return arr
    }

```
