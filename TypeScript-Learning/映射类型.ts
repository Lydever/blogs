// 映射类型
// 根据旧的类型创建出新的类型
interface OptionalTinterface<T> = {
    [p in keyof T]+?: T[p]  // 可以通过·+/- 来指定是添加还是删除
}