(function(){
    var $confirmDialog = $(`<div id="szjDialog">
        <div>
            <div class="szj-dialog-header"></div>
            <div class="szj-dialog-body"></div>
            <div class="szj-dialog-footer">
                <button id="btnSZJConfirm">确定</button>
                <button ID="btnSZJCancel">取消</button>
            </div>
        </div>
    </div>`);

    var $alertDialog = $(`
        <div id="szjDialog">
        <div>
            <div class="szj-dialog-body"></div>
        </div>
    </div>
    `);


    window.SZJDialog = {
        confirm:function(option){



            // 设置标题与提示信息
            $confirmDialog.find('.szj-dialog-header').text(option.title);
            $confirmDialog.find('.szj-dialog-body').text(option.message);

            // 监听事件
            $confirmDialog.find('#btnSZJConfirm').bind('click' , function(e){
                $confirmDialog.remove();
                if(typeof(option.afterConfirm) === 'function'){
                    option.afterConfirm();
                }
            });



            $confirmDialog.find('#btnSZJCancel').bind('click' , function(e){
                $confirmDialog.remove();
                if(typeof(option.afterCancel) === 'function'){
                    option.afterCancel();
                }
            });

            $confirmDialog.appendTo('body');


        },
        alert:function(option){
            // 设置提示信息
            $alertDialog.find('.szj-dialog-body').text(option.message);
            //

            $alertDialog.appendTo('body');
            var timer = setTimeout(function(){
                $alertDialog.remove();
                clearTimeout(timer);
                if(option !== null && typeof(option) === 'object' && typeof(option.callback) === 'function'){
                    option.callback();
                }
            } , 1000);
        }

    };
})();

