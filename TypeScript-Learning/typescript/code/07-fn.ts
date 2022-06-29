function sum(x,y){
    return x+y;
}

// let sum1 = function(x,y){
//     return x+y;
// }


// let sum2 = (x,y)=>{
//     return x+y;
// }


function sum3(x:number,y:number) :number{
    return x+y
}

// 不仅显示数量类型，还限制参数的数量
sum3(1,3)
// sum3('1',3)


let sum1 = function(x:number,y:number) :number{
    return x+y;
}


let sum2 = (x:number,y:number):number=>{
    return x+y;
}