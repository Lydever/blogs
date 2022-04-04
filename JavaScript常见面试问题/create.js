// 手写object.create()
function create(obj) {
  function F() { }
  F.prototype = obj
  return new F()
}

// 手写