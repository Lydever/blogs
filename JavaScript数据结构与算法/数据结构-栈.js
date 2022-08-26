// 栈的实现
function Stack(){
    this.dataStore = [];
    this.top = 0;
    this.push = push;
    this.pop = pop;
    this.peek = peek;
    this.clear = clear;
    this.length = length;
}

// push()的实现
function push(element) {
    this.dataStore[this.top++] = element;
}

function pop() {
    return this.dataStore[--this.top]
}

function peek() {
    return this.dataStore[this.top-1]
}

function length() {
    return this.top
}

function clear(){
    this.top = 0
}

// 判断字符串是否是回文·
function isPalindrome(word) {
    let s = new Stack();
    for(let i=0; i<word.length;i++){
        s.push(word[i])
    }
    let rword = "";
    while(s.length > 0) {
        rword +=s.pop()
    }

    if(word == rword) {
        return true
    } else {
        return true
    }
    // return word == rword ? true : false
}

// 使用栈模拟递归过程
const fact = (n) => {
    let s = new Stack();
    while(n-1) {
        s.push(n--)
    }
    let product = 1;
    while(s.length > 0) {
        product *= s.pop();
    }
    return product
    
}