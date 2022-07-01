// 映射类型
// 根据旧的类型创建出新的类型
interface OptionalTinterface<T> = {
    [p in keyof T]+?: T[p]  // 可以通过·+/- 来指定是添加还是删除
}

// type OptionalInterface = OptionnalInterface<Interface>

// Partial
// Partial<T> 将类型的属性变成可选
type Partial<T> = {
    [P in keyof T]?: T[P];                                                
}

// Deepartial
type DeepPartial<T> =  {
    // 如果是object类型，则递归类型
    [U in keyof T]?: T[U] extends object ? DeepPartial<T[U]> : [U]
}