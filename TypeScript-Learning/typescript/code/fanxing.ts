
// function creatArray(length:number,value:any):Array<any>{
//     let result = [];
//     for(let i=0;i<length;i++){
//         result[i] = value;
//     }
//     return result;
// }

// 泛型写法T
function creatArray<T,U>(length:number,value:T,value2:U):Array<T|U>{
    let result:T[] = [];
    for(let i=0;i<length;i++){
        result[i] = value;
    }
    return result;
}


interface CreateArrayFn{
    <T>(length:number,value:T):Array<T>;
}

let createArray2:CreateArrayFn = function<T,U>(length:number,value:T):Array<T>{
    let result:T[] = [];
    for(let i=0;i<length;i++){
        result[i] = value;
    }
    return result;
}


class GenericNumber<T>{
    zeroValue:T;
    add(x:T,y:T):number{
        console.log(x)
        return 0;
    }
}


let numberObj = new GenericNumber<number>()
numberObj.add(10,20)