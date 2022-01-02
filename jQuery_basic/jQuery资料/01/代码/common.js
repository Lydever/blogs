//能力检测
function setInnerText(element,txt) {
    if(typeof (element.textContent)=="undefined"){
        //IE8
        element.innerText=txt;
    }else{
        //谷歌或者火狐
        element.textContent=txt;
    }
}
//获取任意元素的文本内容
function getInnerText(element) {
    if(typeof (element.textContent)=="undefined"){
        //IE8
        return element.innerText;
    }else{
        //谷歌或者获取
        return element.textContent;
    }
}