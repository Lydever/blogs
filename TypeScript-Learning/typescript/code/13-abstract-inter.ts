// 门 -》类 -》防盗门 -》防盗门会响铃

interface Alarm{
    alert():void;
}

abstract class Door{
    public abstract open();
}

class SecurityDoor extends Door implements Alarm{
    open(){
        console.log('打开门')
    }
    alert(){
        console.log('响铃')
    }
}

interface Chat{
    say():void;
}
class Mobile implements Alarm,Chat{
    alert(){
        console.log('手机响铃')
    }
    say(){
        console.log('聊天')
    }
}