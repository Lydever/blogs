/*
* 栈：
* 1. 方法
* push():入栈
* pop(): 出栈,栈内的元素也一起被删除
* peek():返回栈顶元素，但不删除其所在栈内的元素
* clear(): 删除栈内所有元素
* 2. 属性
* length: 记录栈内元素的个数
* empty：表示栈内元素是否有元素
* */

function Stack() {
  this.dataStore = [];
  this.top = 0; // 记录栈顶位置
  this.push = push;
  this.pop = pop;
  this.peek = peek;
}

/**
 * 入栈
 * @param element
 */
function push(element) {
  this.dataStore[this.top++] = element;
}

/**
 * 出栈
 * @returns {*}
 */
function pop() {
  return this.dataStore[--this.top];
}


/** 获取栈顶元素
 * peek()方法返回数组的第top-1个位置的元素，及栈顶元素、
 * 如果有个空栈调用peek()方法，结果为nufedined
 * @returns {*}
 */
function peek() {
  return this.dataStore[this.top - 1];
}

/**
 * 通过返回top值来获取栈内的元素个数
 * @returns {*}
 */
function length() {
  return this.top;
}

function Stack() {
  this.dataStore = [];
  this.top = 0;
  this.push = push;
  this.pop = pop;
  this.peek = peek;
  this.clear = clear;
  this.length = length;
}

function push(element) {
  this.dataStore[this.top++] = element;
}

function peek() {
  return this.dataStore[this.top - 1];
}

function pop() {
  return this.dataStore[--this.top];
}

function clear() {
  this.top = 0;
}

function length() {
  return this.top;
}