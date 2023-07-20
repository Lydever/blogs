// ============数组扁平化得几种方法=============
/**
 * 使用reduce实现
 * @param arr
 * @returns {*}
 */
const flatten = (arr) => arr.reduce((result,item) => {
  return result.concat(Array.isArray(item) ? flatten(item) : item)
},[]);


/**
 * 通过join & split
 * @param arr
 * @returns {number[]} 使用Number转化为数值
 */
const flattenJoinSplit = (arr) => arr.join(',').split(',').map(item => parseInt(item));


/**
 * 通过toSting & split
 * @param arr
 * @returns {number[]} 使用Number转化为数值
 */


const flattenToStringSplit = (arr) => arr.toString().split(',').map(item => Number(item));


/**
 * 使用拓展运算符
 * @param arr
 * @returns {*}
 */
const flatten = (arr) => {
  while(arr.some(item => Array.isArray(item))){
    arr = [].concat(...arr)
  }
  return arr;
}


/**
 * 随机化数组元素的顺序
 * @param arr
 * @returns {void }
 */
const shuffleArr = (arr) => arr.sort(() => Math.random() - 0.5);


/**
 * 删除数组元素中的重复元素
 * @param arr
 * @returns {unknown[]}
 */
const arrWithoutDupli = (arr) => [...new Set(arr)];


/**
 * 删除对象数组中的重复元素
 * @type {{}}
 */
const obj = {};
const arrObjectWithoutDupli = (arr, key) =>
  arr.reduce((prev, cur) => {
    if (!obj[cur[key]]) {
      obj[cur[key]] = prev.push(cur);
    }
    return prev;
  }, []);


/**
 * 获取两个数组之间不同的元素
 * @param arr1
 * @param arr2
 * @returns {T[]}
 */
const arrDifference = (arr1,arr2) => arr1.concat(arr2).filter((v,i,arr) => arr.indexOf(v) === arr.lastIndexOf(v));


/**
 * 获取两个数组之间相同的元素
 * @param arr1
 * @param arr2
 * @returns {Int32Array | * | Uint32Array | any[] | Int8Array | Float64Array | BigUint64Array | Uint8Array | Int16Array | BigInt64Array | Float32Array | Uint8ClampedArray | Uint16Array}
 */
const arrSimilarity = (arr1,arr2) => arr1.filter((v) => arr2.includes(v));


/**
 * 获取数组二 相对于数组一 不同的元素
 * @param arr1
 * @param arr2
 * @returns {Int32Array | * | Uint32Array | any[] | Int8Array | Float64Array | BigUint64Array | Uint8Array | Int16Array | BigInt64Array | Float32Array | Uint8ClampedArray | Uint16Array}
 */
const getDifferenceFrom = (arr1,arr2) => {
  const values = new Set(arr2);
  return arr1.filter((element) => !values.has(element));
};


/**
 * 获取数组中指定个数的最大元素
 * @param arr
 * @param n
 * @returns {any[]}
 */
const maxArray = (arr,n = 1) => [...arr].sort((a,b) => b-a).slice(0,n);


/**
 * 获取数组中指定个数的最小元素
 * @param arr
 * @param n
 * @returns {any[]}
 */
const minArray = (arr,n = 1) => [...arr].sort((a,b) => a-b).splice(0,n);


/**
 * 根据对象的键值在数组中查找对象
 * @param arr
 * @param key
 * @param value
 * @returns {*|number|bigint}
 */
const findObjectInArray = (arr,key,value) => arr.find((obj) => obj[key] === value);


/**
 * 根据元素值移除数组的元素
 * @param arr
 * @param el
 * @returns {Int32Array | * | Uint32Array | any[] | Int8Array | Float64Array | BigUint64Array | Uint8Array | Int16Array | BigInt64Array | Float32Array | Uint8ClampedArray | Uint16Array}
 */
const arrRemoveEle = (arr,el) => arr.filter((i) => i !== el);


/**
 * 根据函数名称移除函数数组的元素
 * @param arr
 * @param name
 * @returns {Int32Array | * | Uint32Array | any[] | Int8Array | Float64Array | BigUint64Array | Uint8Array | Int16Array | BigInt64Array | Float32Array | Uint8ClampedArray | Uint16Array}
 */
const arrRemoveFunEle = (arr,name) => arr.filter((i) => i.name !== name);


/**
 * 根据对象数组的属性值移除元素
 * @param arr
 * @param key
 * @param value
 * @returns {Int32Array | * | Uint32Array | any[] | Int8Array | Float64Array | BigUint64Array | Uint8Array | Int16Array | BigInt64Array | Float32Array | Uint8ClampedArray | Uint16Array}
 */
const arrRemoveObjEle = (arr,key,value) => arr.filter((i) => i[key] !==value);


/**
 * 计算对象数组指定的平均值
 * @param arr
 * @param key
 * @returns {number}
 */
const averageBy = (arr,key) => arr.reduce((pre,cur) => pre + cur[key],0) / arr.length;


/**
 * 计算数组中元素的出现次数
 * @param arr
 * @param value
 * @returns {*}
 */
const countFrequency = (arr,value) => arr.reduce((pre,cur) => (cur === value ? pre + 1 : pre + 0),0);


/**
 * 计算对象数组中某个属性值的出现次数
 * @param arr
 * @param key
 * @param value
 * @returns {*}
 */
const countObjFrequency = (arr,key,value) => arr.reduce((pre,cur) => (cur[key] === value ? pre + 1 : pre + 0),0);


/**
 * 计算数组元素的总和
 * @param arr
 * @returns {*}
 */
const getTotal = (arr) => arr.reduce((pre,cur) => pre + cur,0);


/**
 * 计算对象数组某个属性值的总和
 * @param arr
 * @param key
 * @returns {*}
 */
const getTotalBy = (arr,key) => arr.reduce((pre,cur) => pre + cur[key],0);


/**
 * 过滤数组中的非唯一值
 * @param arr
 * @returns {Int32Array | * | Uint32Array | any[] | Int8Array | Float64Array | BigUint64Array | Uint8Array | Int16Array | BigInt64Array | Float32Array | Uint8ClampedArray | Uint16Array}
 */
const filterNoUnique = (arr) => arr.filter((i) => arr.indexOf(i) === arr.lastIndexOf(i));


/**
 * 过滤数组中的唯一值
 * @param arr
 * @returns {Int32Array | * | Uint32Array | any[] | Int8Array | Float64Array | BigUint64Array | Uint8Array | Int16Array | BigInt64Array | Float32Array | Uint8ClampedArray | Uint16Array}
 */
const filterUnique = (arr) => arr.filter((i) => arr.indexOf(i) !== arr.lastIndexOf(i));


/**
 * 检测数组中所有元素是否符合要求
 * @param arr
 * @param fn
 * @returns {boolean}
 */
const isAllPass = (arr,fn) => arr.every(fn);






