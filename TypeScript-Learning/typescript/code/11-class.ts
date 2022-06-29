class Animal {
    private name;
    public constructor(name) {
      this.name = name;
    }
    public sayname(){
        return this.name;
    }
  }
  
  let a = new Animal('Jack');
//   console.log(a.name); // Jack
//   a.name = 'Tom';
console.log(a.sayname())


class Animal1 {
    public name: string;
    public readonly color:string
    public constructor(name:string,color:string) {
        this.color = color;
      this.name = name;
    }
}

let a1 = new Animal1('小狗','黄色')
// a1.color = '蓝色';

class Animal2 {
    
    public constructor(public name,public readonly color) {
    }
}
let a2 = new Animal2('小狗','紫色')