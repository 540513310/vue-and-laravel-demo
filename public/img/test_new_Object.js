/**
 * Created by zjx on 2016/7/7.
 */
function CustomArray(setting){
    this.value = [];
    this.size = setting.size
}

CustomArray.prototype.pushIn = function (varible) {
    for(var k=0; k < this.size; k++) {
        this.value.push(varible);
    }
}

function test(type, size) {
    var type = type || "new",
        quene = new CustomArray({size:10000}),

    console.time(type);
    if (type === "new") {
            quene.pushIn(new Object());
    } else  {
            quene.push({});
    }
    console.timeEnd(type);
}

