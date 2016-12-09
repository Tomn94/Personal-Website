<?php

$DATE_LAST_CHANGE = "December 2016";

$PAGE_TITLE = "Thomas Naudet — Student Engineer+Manager";
$PAGE_TITLE_SHORT = "Thomas Naudet";
$DESCRIPTION = "French Student Engineer+Manager\nPolyglot Developer, Designer…";

$BASE_URL = "http://tomn.tramigoapp.com";

$HEADER_TABLE_HEADERS = ["last song I've listened to", "GitHub activity", "countries I've lived in/visited"];

$HEADER_BUTTONS = ['<a class="button" href="https://twitter.com/tomn94">Twitter</a>', '<a class="button" href="https://github.com/Tomn94">GitHub</a>'];

$COUNTRIES = "🇫🇷🇭🇰🇬🇧🇮🇪🇩🇪🇨🇳\n🇨🇿🇧🇪🇱🇺🇮🇹🇬🇷\n🇻🇳🇲🇲🇹🇭🇰🇭🇲🇴🇲🇦";

$NBR_PAINTINGS = iterator_count(new FilesystemIterator('img/paintings/', FilesystemIterator::SKIP_DOTS));

$SKILLS = [["iOS", 1, 30, true],
           ["Android", 1, 25, true],
           ["Swift", 1, 30, true],
           ["Java", 1, 34, true],
           ["Objective-C", 1, 15, true],
           ["C", 1, 40, true],
           ["C++", 1, 40, true],
           ["Qt", 1, 40, true],
           ["Basic", 3, 15, true],
           ["JavaScript", 1, 18, true],
           ["PHP", 1, 30, true],
           ["SQL", 1, 30, true],
           ["HTML", 1, 33, true],
           ["CSS", 1, 35, true],
           ["jQuery", 3, 12, true],
           ["JSON", 2, 26, true],
           ["REST", 3, 16, true],
           ["XML", 3, 22, true],
           ["UI/UX", 2, 22, true],
           ["2D/3D Graphic Design", 2, 30, false],
           ["Photoshop", 3, 9, true],
           ["3DS Max", 3, 11, true],
           ["Print", 3, 15, true],
           ["UML", 2, 30, true],
           ["LaTeX", 2, 23, true],
           ["Altium", 3, 12, true],
           ["VHDL", 3, 17, true],
           ["Film Editing", 3, 30, false],
           ["Resolume", 3, 10, true],
           ["macOS", 2, 20, true],
           ["Linux/UNIX", 3, 8, true],
           ["Raspberry", 3, 9, true],
           ["Windows", 3, 11, true],
           ["C#", 3, 30, true],
           ["AppleScript", 3, 8, true],
           ["Assembly", 3, 11, true],
           ["OpenGL", 3, 30, false],
           ["Maple", 3, 30, false],
           ["Matlab", 3, 30, false],
           ["OpenData", 3, 11, true],
           ["Networks", 3, 30, false],
           ["Management", 3, 30, false],
           ["Hardware", 3, 30, false],
           ["Maintenance", 3, 30, false],
           ["Automatics", 3, 30, false],
           ["Mechanics", 3, 30, false],
           ["Sensors", 3, 30, false],
           ["Microprocessors", 3, 30, false],
           ["Power/commutation electronics", 2, 30, false],
           ["Signal processing", 2, 30, false]];

$PROJECTS =
[
    [
        ["title"   => "Tramigo",
         "details" => "Know instantly when is your next tram/subway/bus: you can't be late.<br>&nbsp;<br>Tramigo shows you the schedule at the closest stop, in the city you are currently located. Also features lines, maps and timetables.<br>&nbsp;<br>Top app in Angers, France.",
         "imgs"    => ["img/projects/tramigo.png"],
         "links"   => [["Visit website", "http://tramigoapp.com"],
                       ["Download on the App Store", "https://itunes.apple.com/app/apple-store/id913767394?pt=104224803&ct=Site%20perso&mt=8"],
                       ["Download on Google Play", "http://tramigoapp.com"],
                       ["Download on the Windows Store", "http://tramigoapp.com"]]]
    ],
    
    [
        ["title"   => "AqC TelCo",
         "details" => "Team work to build a complete Embedded System for aquatic ecosystems automation.<br>Developed an Android app communicating with a Raspberry Pi.",
         "imgs"    => ["img/projects/telco.jpg"],
         "links"   => []],
         
        ["title"   => "CLAAS Tractor",
         "details" => "Internship, worked with Qt embedded on Linux.",
         "imgs"    => ["img/projects/claas.jpg"],
         "links"   => []]
    ],
    
    [
        ["title"   => "Subtle Subtitles",
         "details" => "Subtitle player for movies and TV series:<br>Find, Play, Collect and Share!<br>&nbsp;<br>Thousands of downloads all around the world.",
         "imgs"    => ["img/projects/subtlesubs.png"],
         "links"   => [["Download on the App Store", "https://itunes.apple.com/app/apple-store/id1099663304?pt=104224803&ct=Site%20perso&mt=8"],
                       ["View on GitHub", "https://github.com/Tomn94/Subtle-Subtitles"]]]
    ],
    
    [
        ["title"   => "Students’ Union app",
         "details" => "Complete iOS app dedicated to students at my Engineering School<br>&nbsp;<br>Gathers news, events, notifications, associations information &amp; contacts, deals, floor plans, file access, games…<br>Includes also a meal-ordering service and a store to buy tickets for events.<br>The app even accepts credit cards.",
         "imgs"    => ["img/projects/bdeeseo.png"],
         "links"   => [["Download on the App Store", "https://itunes.apple.com/app/apple-store/id966385182?pt=104224803&ct=Site%20perso&mt=8"],
                       ["View on GitHub", "https://github.com/Tomn94/BDE-ESEO"]]]
    ],
    
    [
        ["title"   => "ESEOmega.fr",
         "details" => "Dynamic website for my Students’ Union.<br>&nbsp;<br>Fetches data from the Students’ Union API.",
         "imgs"    => ["img/projects/eseomega.png"],
         "links"   => [["Visit website", "http://eseomega.fr"],
                       ["With Alexis Louis", "https://github.com/wimacod"]]],
         
        ["title"   => "Blue Moon 2016",
         "details" => "Website to promote and sell tickets for our event welcoming 2,700 students.<br>Featured Kavinsky, Jay Style, Natty Rico, and Dustycloud.",
         "imgs"    => ["img/projects/bluemoon.mp4"],
         "links"   => [["Visit website", "http://bluemoon.eseomega.fr"],
                       ["With Sonasi Katoa", "https://github.com/Snooze986"]]]
    ],
    
    [
        ["title"   => "Associations’ Portal",
         "details" => "Provides an API for all the services in Students’ Union iOS and Android apps.<br>&nbsp;<br>Moreover, the Portal allows associations with their IDs to deliver news, notifications, to send to mailing lists, to edit API data based on level access, and to manage the meal/tickets-ordering systems.<br>&nbsp;<br>A TV with a Raspberry Pi is connected to the Portail to show orders in the kitchen.",
         "imgs"    => ["img/projects/portail.png"],
         "links"   => [["Visit website", "http://portail.eseomega.fr"],
                       ["View on GitHub", "https://github.com/Tomn94/Portail-Vie-Asso-ESEO"],
                       ["With Sonasi Katoa", "https://github.com/Snooze986"],
                       ["With François Leparoux", "https://github.com/rascafr"]]],
         
        ["title"   => "DigiSheep",
         "details" => "System to sell/buy tickets (including online), and then scan to grant access on-site.<br>&nbsp;<br>Includes a website to manage data and check stats.<br>&nbsp;<br>Used to manage one event with 2,700 participants.<br>&nbsp;<br>Tied to BDE ESEO API and the Portal.",
         "imgs"    => ["img/projects/digisheep.png", "img/projects/digisheep2.png"],
         "links"   => [["Visit website", "http://portail.eseomega.fr"],
                       ["Download on the App Store", "https://itunes.apple.com/app/apple-store/id1084746837?pt=104224803&ct=Site%20perso&mt=8"],
                       ["View on GitHub", "https://github.com/Tomn94/DigiSheep"]]]
    ],
    
    [
        ["title"   => "Campaign app",
         "details" => "App that made us, ESEOmega, win the 2015 Students’ Union Election.<br>Includes members, events, information, videos, maps, a QR code-scanning game…",
         "imgs"    => ["img/projects/campaignapp.jpg"],
         "links"   => [["View on GitHub", "https://github.com/Tomn94/Campagne-ESEOmega"],
                       ["Android &amp; Photo ©&nbsp;François&nbsp;Leparoux", "https://github.com/rascafr"]]],
         
        ["title"   => "Campaign website",
         "details" => "Website and API accompanying the app.<br>You should have seen the parallax effect and the opening animation!",
         "imgs"    => ["img/projects/campaignweb.png"],
         "links"   => [["View on GitHub", "https://github.com/Tomn94/Campagne-ESEOmega.fr"]]],
         
        ["title"   => "MATLABit",
         "details" => "First app in Swift including a Fruit Ninja, a Tinder-like game and many funny useless features.<br>Enjoyed by students at the 2016 campaign.",
         "imgs"    => ["img/projects/matlabit.png"],
         "links"   => [["Download on the App Store", "https://itunes.apple.com/app/apple-store/id1102827778?pt=104224803&ct=Site%20perso&mt=8"],
                       ["View on GitHub", "https://github.com/Tomn94/MATLABit"]]]
    ],
    
    [
        ["title"   => "@tomn_ebooks<br>@tomn_music",
         "details" => "Me, as a Twitter bot, mixing my tweets.<br>&nbsp;<br>The other account gathers some of my songs playing.",
         "imgs"    => ["img/projects/ebooks.png"],
         "links"   => [["View @tomn_ebooks on&nbsp;Twitter", "https://twitter.com/tomn_ebooks"],
                       ["View @tomn_ebooks on&nbsp;GitHub", "https://github.com/Tomn94/ebooks_example"],
                       ["View @tomn_music on&nbsp;Twitter", "https://twitter.com/tomn_music"],],
         "inline"  => true],
         
        ["title"   => "Music Tweet",
         "details" => "Simple app for iOS to share on Twitter the music from any app being currently played, including the artist and the album artwork.",
         "imgs"    => ["img/projects/musictweet.png"],
         "links"   => [["View on GitHub", "https://github.com/Tomn94/Music-Tweet"]],
         "inline"  => true],
         
        ["title"   => "Misc-Tools",
         "details" => "LaTeX base for documents, Apple Scripts…",
         "imgs"    => ["img/projects/latex.png"],
         "links"   => [["View on GitHub", "https://github.com/Tomn94/Misc-Tools"]],
         "inline"  => true]
    ],
    
    "// Deprecated projects",
    
    [
        ["title"   => "uSurf",
         "details" => "Ultra customizable and cross-platform browser with a modern user interface (CoverFlow history, animations…).<br>Based on Webkit, respects Internet standards and, consistent with each OS.",
         "imgs"    => ["img/projects/usurf.jpg"],
         "links"   => []],
         
        ["title"   => "∞Crypt",
         "details" => "Encrypt &amp; decrypt your files and texts with secure algorithms, in an innovative way thanks to plug-ins.<br>∞Crypt Files &amp; ∞Crypt Text are cross-platform desktop apps.",
         "imgs"    => ["img/projects/infinicryptfiles.png", "img/projects/infinicrypttext.png"],
         "links"   => []],
         
        ["title"   => "Tunnel Runners",
         "details" => "Multiplayer high-speed races and fights between vehicles in a tunnel.<br>Create your own tracks &amp; play with your friends.",
         "imgs"    => ["img/projects/tunnelrunners.png"],
         "links"   => [],
         "inline"  => true],
         
        ["title"   => "Mario",
         "details" => "<em>Mario &amp; Luigi: Yoshis' Cookies Story</em> is a 2D Mario adventure gathering most of the characters from Mario games.",
         "imgs"    => ["img/projects/mario.png"],
         "links"   => [],
         "inline"  => true]
    ],
    
    [
        ["title"   => "Network Chat",
         "details" => "Client &amp; server multi-platform chat on a local network.<br>Inconspicuous user interface, file transferts, chat commands…",
         "imgs"    => ["img/projects/netchat.png"],
         "links"   => [],
         "inline"  => true],
         
        ["title"   => "DevCrew",
         "details" => "Website for a team of developers I was a member.",
         "imgs"    => ["img/projects/devcrew.jpg"],
         "links"   => [],
         "inline"  => true],
         
        ["title"   => "DelDots",
         "details" => "Deletes every macOS hidden file (used by Spotlight) in a given folder.",
         "imgs"    => ["img/projects/deldots.png"],
         "links"   => [],
         "inline"  => true],
         
        ["title"   => "InstaTP",
         "details" => "Specific program: assembles C files into a single smart C file.",
         "imgs"    => ["img/projects/tp.jpg"],
         "links"   => [],
         "inline"  => true]
    ],
    
    [
        ["title"   => "BaggIt",
         "details" => "Gather every profile you have on the Internet on a single customizable page.",
         "imgs"    => ["img/projects/baggit.jpg"],
         "links"   => [],
         "inline"  => true],
         
        ["title"   => "Cortexis",
         "details" => "Rich platform for schools (mail, forums, sharing tools…).",
         "imgs"    => ["img/projects/cortexis.jpg"],
         "links"   => [],
         "inline"  => true],
         
        ["title"   => "Charity Dance",
         "details" => "List of user-submitted songs in order to contribute to a ball.",
         "imgs"    => ["img/projects/ball.jpg"],
         "links"   => [],
         "inline"  => true]
    ]
];