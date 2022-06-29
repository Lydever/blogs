abstract class Animal10{
    public name;
    public constructor(){
        this.name = name;
    }
    public abstract sayhi()
}

// new Animal10()
class Cat10 extends Animal10{
    sayhi(){
        console.log('cat10')
    }
}

let cat10:Cat10 = new Cat10();
let cat20:Animal10 = new Cat10();