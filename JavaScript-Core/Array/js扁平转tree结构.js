function list_to_tree(list) {
  var map = {}, node, roots = [], i;

  for (i = 0; i < list.length; i += 1) {
    map[list[i].id] = i;      // initialize the map
    list[i].children = [];    // initialize the children
  }

  for (i = 0; i < list.length; i += 1) {
         node = list[i];
    if (node.parentId !== "0") {
      list[map[node.parentId]].children.push(node);
    } else {
      roots.push(node);
    }
  }
  return roots;
}
