
为了避免这种情况，ES2020 引入了一个新的 Null 判断运算符??。它的行为类似||，但是只有运算符左侧的值为null或undefined时才会返回右侧的值。


a?.b  ====》   a == null ? undefiend : a.b

a?.[x]   ===> a == null ? undefiend : a[x]

a?.b()   ===> a == null ? undefiend : a.b()

a?.()    ===>  a == null ? undefiend : a()


// 短路机制
// 本质上， ?.相当于一种短路机制，只要不满足条件就不再往下执行
