/**
 * Created by zeonwang on 2016/7/8.
 */

!function init() {
    
    var getY = function() {
        if (window.scrollY === undefined) {
            function getY(){
                return document.documentElement.scrollTop;
            }
        } else {
            function getY(){
                return window.scrollY;
            }
        }
        return getY
    }();
    
    !function scrollChangeHeaderBarHeight(){
        var headerElem = document.getElementById('navWrapper');
        var headBanner = document.getElementById('mainBanner');
        var backTopElem = document.getElementById('backTop');
        var timeID;
        window.addEventListener("scroll",function setTimer(){
            if (timeID) clearTimeout(timeID);
            timeID = setTimeout(function changeHeight(){
    
                var yShift = getY();
    
                if (yShift > 400) {
                    headerElem.classList.add('compress');
                    headBanner.classList.add('compress');
                    backTopElem.classList.add('show');
                } else {
                    headerElem.classList.remove('compress');
                    headBanner.classList.remove('compress');
                    backTopElem.classList.remove('show');
                }
    
            },500);
    
        },false);
    
    }();
    
    !function clickHrefDashElementJump(){
    
        var animID;
        var lastPos;
    
        window.addEventListener("click",function clickAElementJump(event){
            var targElem = event.target;
            var destIdArr;
            var destPos;
            var fixedBarOffset = 56 || 0;
            var scrollMaxHeight = document.body.offsetHeight - window.innerHeight;
            var stopSignal = false;
            var disableIdArr = ['myCarousel','xj_news','xj_article','xj_partners','xj_agent'];
    
    
            if (animID) cancelAnimationFrame(animID);
    
            if (targElem.nodeName === "A") {
    
                disableIdArr.forEach(function(v){
                    if (~targElem.href.indexOf(v)) stopSignal = true;
                });
    
                if(!~targElem.href.indexOf(targElem.pathname) || stopSignal) {
                    return "not a jump label"
                } else {
                    destIdArr = targElem.href.split("#");
                    if (destIdArr[1]) {
                        event.preventDefault();
                        event.stopPropagation();
                        destPos = document.getElementById(destIdArr[1]).offsetTop;
                        if (destPos > scrollMaxHeight) {
                            destPos = scrollMaxHeight;
                        } else if (destPos <= fixedBarOffset) {
                            destPos = fixedBarOffset;
                        }
                        jumpToPos();
                    }
                }
            }
    
            function jumpToPos(){
    
                if (!lastPos) {
                    lastPos = getY();
                }
    
                var dest = destPos - fixedBarOffset - getY();
    
                if (Math.abs(dest) > 1 && lastPos == getY()) {
                    // 这个地方的算法要改
                    var step = dest * 0.2;
                    if (Math.abs(step)< 1) {
                        step = step > 0 ? 1 : -1;
                    }
                    window.scrollBy(0,step);
                    lastPos = getY();
                    animID = requestAnimationFrame(jumpToPos);
                    // console.log(step);
                } else {
                    lastPos = null;
                    cancelAnimationFrame(animID);
                }
            }
    
        },false);
    }();
    
    !function checkUA() {
        if(
          /iphone|android|ipad|micromessenger/.test(navigator.userAgent.toLowerCase()) ||
          !/windows|mac|linux/.test(navigator.userAgent.toLowerCase())
        ){
            var bg_wraper_elements = document.querySelectorAll('.main-head');
            for (var _k=0;_k < bg_wraper_elements.length;_k++){
                bg_wraper_elements[_k].classList.add('mobile-bg');
            }
        }

        // alert(window.navigator.userAgent.toLowerCase());
    }();

}();
