<?php

$res = @file_get_contents("https://github.com/tomn94");

preg_match("/([0-9]+) contributions/i", $res, $match);

if (count($match) > 1)
    echo strip_tags(htmlspecialchars($match[1]));
else
    echo "Many";