<?php
    
function cleanTxtData($str) {
    $decode = htmlspecialchars_decode($str);
    $noTags = strip_tags($decode);
    $noNP = str_replace("#NowPlaying", "", str_replace("#NP", "", str_replace("#NP ▶️", "", $noTags)));
    $noLinks = preg_replace("|https?://([\d\w\.-]+\.[\w\.]{2,6})[^\s\]\[\<\>]*/?|i", "", $noNP);
    $noRT = preg_replace("|RT @[A-Z]+[A-Z0-9]+:|i", "", $noLinks);
    return trim($noRT);
}

/* Auth params */
$api_config = json_decode(file_get_contents('config.json'), true);
$api_key    = urlencode($api_config['twitterApiKey']); // Consumer Key (API Key)
$api_secret = urlencode($api_config['twitterApiSecret']); // Consumer Secret (API Secret)
$auth_url   = 'https://api.twitter.com/oauth2/token'; 

$data_username = 'Tomn_music';
$data_nbr_tweets = 4;
$data_url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';

/* Get API access token */
$api_credentials = base64_encode($api_key.':'.$api_secret);

$auth_headers = 'Authorization: Basic '.$api_credentials."\r\n".
                'Content-Type: application/x-www-form-urlencoded;charset=UTF-8'."\r\n";

$auth_context = stream_context_create(
    array(
        'http' => array(
            'header' => $auth_headers,
            'method' => 'POST',
            'content'=> http_build_query(array('grant_type' => 'client_credentials', )),
        )
    )
);

$auth_response = json_decode(file_get_contents($auth_url, 0, $auth_context), true);
$auth_token = $auth_response['access_token'];

/* Get tweets */
$data_context = stream_context_create( array( 'http' => array( 'header' => 'Authorization: Bearer '.$auth_token."\r\n", ) ) );

$data = json_decode(file_get_contents($data_url.'?count='.$data_nbr_tweets.'&screen_name='.urlencode($data_username).
                                                '&exclude_replies=true&include_rts=true', 0, $data_context), true);

if (count($data) < 1) return;

/* Process */
// Get music data: a line of text containing #NP or #NowPlaying
$lastTweet = $data[0]['text'];
if (isset($data[0]["retweeted_status"]) && isset($data[0]["retweeted_status"]["text"])) {
    $lastTweet = $data[0]["retweeted_status"]["text"];
}
$lines = explode("\n", $lastTweet);
$lineWithInfos = "";
foreach ($lines as $line) {
    if (strpos($line, "#NP") !== false || strpos($line, "#NowPlaying") !== false) {
        $lineWithInfos = $line;
        break;
    }
}
if (empty($lineWithInfos)) return;

// Identify music data
$delimiter = "—";   // long
if (strpos($lineWithInfos, $delimiter) === false) $delimiter = '–'; // semi
if (strpos($lineWithInfos, $delimiter) === false) $delimiter = '-'; // common
$infos = explode($delimiter, $lineWithInfos);
$name = $lineWithInfos;
$artist = "";
if (count($infos) > 1) {
    $name = $infos[0];
    $artist = $infos[1];
}

/* Return */
$data = array("name" => cleanTxtData($name),
              "artist" => cleanTxtData($artist));

header('Content-Type: application/json');
echo json_encode($data);