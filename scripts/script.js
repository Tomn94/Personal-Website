/* Stop header from animating */
function toggleAnimation(on) {
    var style = document.getElementsByTagName("header")[0].style;
    if (on) {
        style.webkitAnimationPlayState = 'running';
        document.body.className = '';
    } else {
        style.webkitAnimationPlayState = 'paused';
        document.body.className = 'paused';
    }      
}

var onScroll = function(evt) {
    var doc = document.documentElement;
    var top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);
    var height = document.getElementsByTagName("header")[0].clientHeight + 60;
    if (top > height && document.body.className != 'paused') {
        toggleAnimation(false);
    } else if (top < height && document.body.className == 'paused') {
        toggleAnimation(true);
    }
};

window.addEventListener("scroll", onScroll);