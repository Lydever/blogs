/**
 * Created by Administrator on 2016/8/6.
 */
$.fn.changeBackgroundColor=function (color) {
    this.css("backgroundColor",color);
    //支持链式编程
    return this;
};