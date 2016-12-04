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
    /* Check if header is visible */
    var doc = document.documentElement;
    var top = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
    var height = document.getElementsByTagName("header")[0].clientHeight + 60;
    if (top > height && document.body.className != 'paused') {
        toggleAnimation(false);
    } else if (top < height && document.body.className == 'paused') {
        toggleAnimation(true);
    }
};

window.addEventListener("scroll", onScroll);

/* GITHUB */

/* Repositories & Commits */
var http = new XMLHttpRequest();
http.open('GET', 'https://api.github.com/users/tomn94/repos', true);
http.onreadystatechange = function() {
    if (http.readyState == 4 && http.status == 200) {
        /* Get repositories */
        var json = JSON.parse(http.responseText);
        var nbrRepos = json.length;
        
        /* Get last commit date for each */
        var pushes = [];
        for (var i = 0 ; i < nbrRepos ; i++) {
            pushes.push(json[i]['pushed_at']);
        }
        
        /* Get the more recent one and compute relative date */
        pushes.sort();
        var lastPush = pushes[pushes.length - 1];
        var date = new Date(lastPush);
        var diff = (new Date().getTime() - date.getTime()) / 1000;
        
        if (isNaN(diff) || diff < 0) return;
        
        var output = "some time ago";
        if (diff < 60) output = "few seconds ago";
        else if (diff < 120) output = "a minute ago";
        else if (diff < 3600) output = Math.floor(diff / 60) + " minutes ago";
        else if (diff < 7200) output = "an hour ago";
        else if (diff < 86400) output = Math.floor(diff / 3600) + " hours ago";
        else {
            var dayDiff = Math.floor(diff / 86400);
            if (dayDiff < 2) output = "yesterday";
            else if (dayDiff < 7) output = dayDiff + " days ago";
            else output = Math.round(dayDiff / 7) + " weeks ago";
        }
        
        /* Show data */
        document.getElementById("gh-repos").textContent = nbrRepos;
        document.getElementById("gh-commit-time").textContent = output;
    }
}
http.send();

/* Contributions */
var http2 = new XMLHttpRequest();
http2.open('GET', 'gh-contributions.php', true);
http2.onreadystatechange = function() {
    if (http2.readyState == 4 && http2.status == 200) {
        document.getElementById("gh-contributions").textContent = http2.responseText;
    }
}
http2.send();
