var enableExternalSources = true;		// enable GitHub, Twitter, …
var mobileWidth = 735;

/* Stop header from animating */
function toggleHeaderAnimation(on) {
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
        toggleHeaderAnimation(false);
    } else if (top < height && document.body.className == 'paused') {
        toggleHeaderAnimation(true);
    }
    
    /* Check if skills are visible */
    var heightSkills = height + document.getElementById("skills").clientHeight;
    if (top > heightSkills) {
        pauseSkillsAnimation();
    } else if (top < heightSkills && animation == null) {
        animateSkills();
    }
};

/* Evaluate on scroll */
window.addEventListener("scroll", onScroll);


/* EMBEDDED YouTube VIDEOS */
function playVideo() {
    /* Get associated still */
    var img = document.getElementById('wwdc');
    img.style.filter = "";

    var playButton = document.getElementById('play-wwdc');
    playButton.style.display = "none";

    var embedded = document.createElement("iframe");
    embedded.id = "embedded-wwdc";
    embedded.src = "https://www.youtube-nocookie.com/embed/w5SfOVPmK_U?rel=0&amp;showinfo=0&amp;autoplay=1";
    embedded.frameborder = "0";
    embedded.setAttribute("allowfullscreen", "");
    embedded.style.float = (window.innerWidth > mobileWidth) ? "left" : "";
    embedded.width = img.clientWidth;
    embedded.height = img.clientHeight;
    embedded.style.marginTop = (-img.clientHeight) + "px";
    embedded.style.position = "relative";
    embedded.style.top = ((window.innerWidth > mobileWidth) ? 0 : -25) + "px";

    img.parentNode.insertBefore(embedded, img.nextSibling);
}

var videoDisplayed = false;
function displayVideos() {

    if (videoDisplayed) {
        /* This is called when resizing the window */
        var img = document.getElementById('wwdc');

        var playButton = document.getElementById('play-wwdc')
        playButton.style.top = ((((window.innerWidth > mobileWidth) ? 1 : -1) * img.clientHeight) - 100) / 2 + "px";
        playButton.style.left = (img.clientWidth - 100) / 2 + "px";

        var embedded = document.getElementById('embedded-wwdc')
        if (embedded) {
            embedded.style.float = (window.innerWidth > mobileWidth ? "left" : "");
            embedded.width = img.clientWidth;
            embedded.height = img.clientHeight;
            embedded.style.marginTop = (-img.clientHeight) + "px";
            embedded.style.top = ((window.innerWidth > mobileWidth) ? 0 : -25) + "px";
        }

        return;
    }
    /* The following is called when after page load */

    /* Get associated still */
    var img = document.getElementById('wwdc');
    img.style.filter = "brightness(80%) blur(1px)";
    img.onclick = playVideo;
    img.style.cursor = "pointer";

    /* Add button */
    var playButton = document.createElement("div");
    playButton.id = "play-wwdc";
    playButton.title = "Play Video";
    playButton.className = "playButton";
    playButton.onclick = playVideo;
    playButton.style.top = ((((window.innerWidth > mobileWidth) ? 1 : -1) * img.clientHeight) - 100) / 2 + "px";
    playButton.style.left = (img.clientWidth - 100) / 2 + "px";
    img.parentNode.insertBefore(playButton, img.nextSibling);

    videoDisplayed = true;
}


/* CANVAS */
var canvas;
var ctx;
var skills = [];
var animation = null;
var animationFrame;
var timer;
var screenSize = [window.outerWidth, window.outerHeight];

/* Resize canvas to container width */
function sizeToFit() {
    var parent = document.getElementById("skills");
    canvas.width = parent.offsetWidth;
    canvas.height = parent.offsetHeight;
}
/* When loaded, list skills and animate */
window.onload = function() {
    /* VIDEOS */
    displayVideos();

    /* SKILLS */
	// Resize
    canvas = document.getElementById("skillsCanvas");
    ctx = canvas.getContext('2d');
    canvas.style.opacity = '0';
    pauseSkillsAnimation();
    sizeToFit();

    // Construct skills objects
    loadSkills();

    // Animate
    if (timer) {
        clearTimeout(timer);
    }
    timer = setTimeout(function() {
        canvas.style.opacity = '1';
        animateSkills();
    }, 1000);
};
window.onresize = function() {
	// Safari iPhone bars fix
    if (window.outerWidth != screenSize[0] || window.outerHeight != screenSize[1]) {
        screenSize[0] = window.outerWidth;
        screenSize[1] = window.outerHeight;
        
        window.onload();
    }
}
/* Mobile support */
window.addEventListener("orientationchange", function() {
    window.onload();
}, false);

/* Converts data into visual objects */
function loadSkills() {
	// Empty list
    while (skills.length > 0) {
        skills.pop();
    }
    // Create each object from data
    skillList.forEach(function(skill) {
        addSkill(skill);
    });
}

/* Bubble type, size */
var SkillType = Object.freeze({ BIG: 1, MEDIUM: 2, SMALL: 3});

/* Skill Constructor */
function addSkill(skill) {
    var name     = skill[0],
        type     = skill[1],
        fontSize = skill[2],
        velocity = (type == SkillType.BIG) ? 0.15 : ((type == SkillType.MEDIUM) ? 0.3 : 0.5);
        radius   = (type == SkillType.BIG) ? 60 : ((type == SkillType.MEDIUM) ? 40 : 28);
    
    var x = radius,
        y = radius;

    var rand = Math.random();
    var sign = (rand > 0.5) ? 1 : -1;
    
    var newSkill = {
        x: x,
        y: y,
        vx: velocity,
        vy: velocity * rand * sign,
        radius: radius,
        name: name,
        draw: function() {
        	/* Draw circle */
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius, 0, 2*Math.PI);
            ctx.closePath();
            ctx.fillStyle = 'white';
            ctx.fill();

        	/* Draw text */
			ctx.font = fontSize + "px 'SFMono-Regular', 'SF Mono', 'Inconsolata', Monaco, 'Lucida Console', monospace";
            ctx.fillStyle = "#777";
			ctx.fillText(name, this.x, this.y);
        }
    };
    
    /* Set skill first position on canvas, where's nothing else */
    var alone;
    var watchdog = 0;
    do {
        alone = true;
        /* Check with skill to verifiy it's not covering any */
        for (var i = 0 ; i < skills.length && alone ; i++) {
            var otherSkill = skills[i];
            if (isColliding(newSkill, otherSkill)) {
            	/* Overlapping: choosing another position */
                newSkill.x = Math.floor(Math.random() * canvas.width);
                newSkill.y = Math.floor(Math.random() * canvas.height);

            	/* We'll check this new position */
                alone = false;
            }
        }
        watchdog++;
    } while (!alone && watchdog < 100);
    
    skills.push(newSkill);
}

/* Returns if 2 bubbles are too close to each other */
function isColliding(skill1, skill2) {
    var radiiSum = skill1.radius + skill2.radius;
    var xDiff = skill1.x - skill2.x;
    var yDiff = skill1.y - skill2.y;
    var centerDist = Math.floor(Math.sqrt((xDiff * xDiff) + (yDiff * yDiff)));
    
    return (centerDist <= radiiSum);
}

/* Returns if a bubble is outside canvas horizontally */
function isOutsideX(skill) {
    return (skill.x <= 0 || skill.x >= canvas.width);
}

/* Returns if a bubble is outside canvas vertically */
function isOutsideY(skill) {
    return (skill.y <= 0 || skill.y >= canvas.height);
}

/* Draw loop */
function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    
    skills.forEach(function(skill, index) {
    	/* Draw and move */
        skill.draw();
        skill.x += skill.vx;
        skill.y += skill.vy;
        
        /* Combine every skill (without repetition) to find out if there's a collision */
        for (var i = index + 1 ; i < skills.length ; i++) {
            var otherSkill = skills[i];
            if (isColliding(skill, otherSkill)) {
            	/* Bounce */
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

/* Pause Skills Canvas animation */
function pauseSkillsAnimation() {
    if (animation) {
        clearInterval(animation);
    }
    animation = null;
    if (animationFrame) {
        window.cancelAnimationFrame(animationFrame);
    }
}

/* Start Skills Canvas animation */
function animateSkills() {
	// Make sure there's only one loop
    pauseSkillsAnimation();
    if (!canvas || !ctx)
    	return;

    ctx.textAlign = "center";
	ctx.textBaseline = "middle";
    animation = setInterval(function() {
        animationFrame = window.requestAnimationFrame(draw);
    }, 100);
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
        
        /* Prepare user-friendly text */
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
if (enableExternalSources)
	http.send();

/* Contributions */
var http2 = new XMLHttpRequest();
http2.open('GET', 'gh-contributions.php', true);
http2.onreadystatechange = function() {
    if (http2.readyState == 4 && http2.status == 200) {
        document.getElementById("gh-contributions").textContent = http2.responseText;
    }
}
if (enableExternalSources)
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
            document.getElementById("tw-link").href = "https://www.youtube.com/results?search_query=" + encodeURIComponent(json['name']) + "%20" + encodeURIComponent(json['artist']);
        }
    }
}
if (enableExternalSources)
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
