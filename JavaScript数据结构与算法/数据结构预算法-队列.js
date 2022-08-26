
// 队列
// 队列的两种主要操作：
// 向队列中插入新元素（入队，在队尾插入新元素）和删除队列中的元素（出队，删除对头的元素）
// 队列的另外一项重要操作是读取队头的元素。这个操作叫做 peek( )。该操作返回队头元
// 素，但不把它从队列中删除。

// 用数组实现队列
// 数组的 push( ) 方法可以在数组末尾加入元素， shift( ) 方法则可删除数组的第一个元素。

names = [];
names.push('lizi');
names.push('dsfsf');


names.shift(); // 删除数组的第一个元素


// 实现queue类
const Queue = () => {
    this.dataStore = [];
    this.endqueue = endqueue;
    this.dequeue = dequeue;
    this.front = front;
    this.back = back;
    this.toString = toString;
    this.empty = empty;
}

// enqueue()向队列尾添加一个元素
endqueue = (Element) => {
    this.dataStore.push(Element)
}

// dequeue()删除队首的元素
dequeue= () => {
    this.dataStore.shift();
}