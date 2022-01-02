/**
 * Created by Administrator on 2016/11/18.
 */
$.fn.changeBackgroundColor=function (color) {
    //此时的this就是当前调用该方法的对象
    $(this).css("backgroundColor",color);
};