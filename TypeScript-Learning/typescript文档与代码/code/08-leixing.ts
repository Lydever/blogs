interface Cat {
    name: string;
    run(): void;
}
interface Fish {
    name: string;
    swim(): void;
}


// let animal:Cat|Fish;

function isFish(animal:Cat|Fish){
    // 联合类型可以断言为其中类型
    // 父类可以断言为子类
    // 任何类型可以断言为any类型
    // any类型可以断言为任意类型
    if((animal as Fish).swim){
        return true;
    }else{
        return false;
    }
}