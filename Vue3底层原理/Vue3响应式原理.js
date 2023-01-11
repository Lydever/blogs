
/*1. Vue3.0中的响应式原理：
  解决了Vue2中存在的问题：新增属性，删除属性，界面不会更新；
  直接通过下标修改数组，界面不会更新


2. 实现原理：
  通过Proxy（代理）： 拦截对象中任意属性的变化，包括：属性值的读取，属性的添加，属性的删除等
  通过Reflect（反射）：对被代理对象的属性进行操作。  */


  let data = {
    name:'小米',
    age:15,
    address:'杭州'
    }
    // Reflect 映射
    let p = new Proxy(data,{

    // 有人读取了data中某个属性
    get(target,propName){
    console.log(`有人读取了${propName}的属性`)
    return Reflect.get(target,propName)
    },

    // 有人修改和添加了data中某个属性
    set(target,propName,value){
    console.log(`有人修改了${propName}属性,我要去更新界面`)
    Reflect.set(target,propName,value)
    },

    // 有人删除了data中某个属性
    deleteProperty(target,propName){
    console.log(`有人删除了${propName}属性,我要去更新界面`)
    return Reflect.deleteProperty(target,propName)
    }
    })
