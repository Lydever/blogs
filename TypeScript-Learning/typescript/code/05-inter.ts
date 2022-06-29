interface Dog {
    name:string;
    color:string;
    isRegister:boolean;
}

// 接口定义的属性是不能添加和减少的
let dog:Dog = {
    name:"小花",
    color:"斑点",
    isRegister:true,
    // sound:function(){
    //     console.log('123')
    // }
};


interface Cat {
    name:string;
    color:string;
    // 接口定义可选属性
    isRegister?:boolean;
}

// let cat:Cat = {
//     name:"小猫",
//     color:"蓝色",
// }


// 任意属性
interface Person {
    name:string;
    color:string;
    [propName:string]:any
}


let person:Person = {
    name:"隔壁老王",
    color:"白色",
    hello:"nihao"
}