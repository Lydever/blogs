// 枚举类型
var Days;
(function (Days) {
    Days[Days["sun"] = 0] = "sun";
    Days[Days["mon"] = 1] = "mon";
    Days[Days["tue"] = 2] = "tue";
    Days[Days["wed"] = 3] = "wed";
    Days[Days["thu"] = 4] = "thu";
    Days[Days["fri"] = 5] = "fri";
    Days[Days["sat"] = 6] = "sat";
})(Days || (Days = {}));
;
console.log(Days['sun']);
console.log(Days[0]);
