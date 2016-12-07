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
    var height = 60 + document.getElementsByTagName("header")[0].clientHeight;
    
    if (top > height && document.body.className != 'paused') {
        toggleAnimation(false);
    } else if (top < height && document.body.className == 'paused') {
        toggleAnimation(true);
    }
    
    var heightSkills = height + document.getElementById("skills").clientHeight;
    if (top > heightSkills) {
        pauseAnimation();
    } else if (top < heightSkills && animation == null) {
        animate();
    }
};

window.addEventListener("scroll", onScroll);


/* CANVAS */
var canvas;
var ctx;
var skills = [];
var animation = null;
var animationFrame;
var timer;

function sizeToFit() {
    canvas = document.getElementById("skillsCanvas");
    var parent = document.getElementById("skills");
    canvas.width = parent.offsetWidth;
    canvas.height = parent.offsetHeight;
}
window.onload = function() {
    canvas = document.getElementById("skillsCanvas");
    canvas.style.opacity = '0';
    pauseAnimation();
    sizeToFit();
    loadSkills();
    if (timer) {
        clearTimeout(timer);
    }
    timer = setTimeout(function() {
        canvas.style.opacity = '1';
        animate();
    }, 1000);
};
window.onresize = window.onload;

function loadSkills() {
    skills.length = 0;
    skillList.forEach(function(skill) {
        addSkill(skill);
    });
}

var SkillType = Object.freeze({ BIG: 1, MEDIUM: 2, SMALL: 3});

function addSkill(skill) {
    canvas = document.getElementById("skillsCanvas");
    ctx = canvas.getContext('2d');
    
    var name = skill[0],
        type = skill[1],
        velocity = (type == SkillType.BIG) ? 0.1 : ((type == SkillType.MEDIUM) ? 0.3 : 0.5);
        radius = (type == SkillType.BIG) ? 60 : ((type == SkillType.MEDIUM) ? 40 : 25);
    
    var x = radius,
        y = radius;
    
    var newSkill = {
        x: x,
        y: y,
        vx: velocity,
        vy: velocity * Math.random(),
        radius: radius,
        color: 'white',
        draw: function() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius, 0, 2*Math.PI);
            ctx.closePath();
            ctx.fillStyle = this.color;
            ctx.fill();
        }
    };
    
    var alone = true;
    var watchdog = 0;
    do {
        alone = true;
        for (var i = 0 ; i < skills.length && alone ; i++) {
            var otherSkill = skills[i];
            if (isColliding(newSkill, otherSkill)) {
                alone = false;
                newSkill.x = Math.floor((Math.random() * canvas.width) + 1);
                newSkill.y = Math.floor((Math.random() * canvas.height) + 1);
                if (isOutsideX(newSkill)) {
                    newSkill.x = newSkill.radius;
                }
                if (isOutsideY(newSkill)) {
                    newSkill.y = newSkill.radius;
                }
            }
        }
        watchdog++;
    } while (!alone && watchdog < 100);
    
    skills.push(newSkill);
}

function isColliding(skill1, skill2) {
    var radiiSum = skill1.radius + skill2.radius;
    var xDiff = skill1.x - skill2.x;
    var yDiff = skill1.y - skill2.y;
    var centerDist = Math.floor(Math.sqrt((xDiff * xDiff) + (yDiff * yDiff)));
    
    return (centerDist <= radiiSum);
}

function isOutsideX(skill) {
    canvas = document.getElementById("skillsCanvas");
    return (skill.x <= 0 || skill.x >= canvas.width);
}

function isOutsideY(skill) {
    canvas = document.getElementById("skillsCanvas");
    return (skill.y <= 0 || skill.y >= canvas.height);
}

function draw() {
    canvas = document.getElementById("skillsCanvas");
    ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    
    skills.forEach(function(skill, index) {
        skill.draw();
        skill.x += skill.vx;
        skill.y += skill.vy;
        
        /* Combine every skill without repetition to find out if collision */
        for (var i = index + 1 ; i < skills.length ; i++) {
            var otherSkill = skills[i];
            if (isColliding(skill, otherSkill)) {
                skill.vy = -skill.vy;
                skill.vx = -skill.vx;
                otherSkill.vy = -otherSkill.vy;
                otherSkill.vx = -otherSkill.vx;
            }
        }
        
        /* Border collision */
        if (isOutsideX(skill)) {
            skill.vx = -skill.vx;
        }
        if (isOutsideY(skill)) {
            skill.vy = -skill.vy;
        }
    });
}

function pauseAnimation() {
    if (animation) {
        clearInterval(animation);
    }
    animation = null;
    if (animationFrame) {
        window.cancelAnimationFrame(animationFrame);
    }
}

function animate() {
    animation = setInterval(function() {
        animationFrame = window.requestAnimationFrame(draw);
    }, 20);
}


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


/* TWITTER */
var http3 = new XMLHttpRequest();
http3.open('GET', 'twitter.php', true);
http3.onreadystatechange = function() {
    if (http3.readyState == 4 && http3.status == 200) {
        var data = http3.responseText;
        if (data != "") {
            var json = JSON.parse(data);
            document.getElementById("tw-name").textContent = json['name'];
            document.getElementById("tw-artist").textContent = json['artist'];
        }
    }
}
http3.send();


/* PAINTINGS */
/* Init */
var currentPaintIndex = 0;
var lastPaintChange = 0;    // time last pic change occured

/* Define behavior of the carousel */
function changePainting() {
    var paintings = document.getElementsByName("painting");
    var currentTime = (new Date()).getTime();
    
    /* HTML loaded and not clicked just before */
    if (paintings.length > 0 && (currentTime - lastPaintChange) / 1000 > 1) {
        /* Change pic */
        paintings[currentPaintIndex].style.opacity = "0";
        currentPaintIndex = (currentPaintIndex + 1) % paintings.length;
        paintings[currentPaintIndex].style.opacity = "1";
        
        /* Reset time */
        lastPaintChange = currentTime;
        clearInterval(paintingRepeat);
        paintingRepeat = setInterval(changePainting, 3500);
    }
}

/* Start timer */
var paintingRepeat = setInterval(changePainting, 3000);
