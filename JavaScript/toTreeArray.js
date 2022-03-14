~ qwde890/**
 * @Description:    数据格式转换，转换为a-tree组件所需的数据格式
 * @Author:         liyingxia
 * @CreateDate:     2022/1/4 23:16
 * @result: 返回转换后的树形数组
 */

const arrayToTree = (items) => {
  const result = []  // 存放转换后的数组
  const itemMap = {}  // 每个item map
  for(const item of items) {
    const subId = item.subId
    const parentId = item.parentId

    if(!itemMap[subId]) {
      itemMap[subId] = {
        children: []
      }
    }

    itemMap[subId] = {
      ...item,
      children: itemMap[subId]['children']
    }

    const treeItem = itemMap[subId]
    if (parentId === 0) {
      result.push(treeItem)
    } else {
      if (!itemMap[parentId]) {
        itemMap[parentId] = {
          children: [],
        }
      }
      itemMap[parentId].children.push(treeItem)
    }
  }
  return result

}
