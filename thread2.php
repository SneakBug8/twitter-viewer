<!DOCTYPE html>
<html lang="en">

<?php
// error_reporting(E_ERROR | E_PARSE);

include __DIR__ . "/simple_html_dom.php";
require_once('TwitterAPIExchange.php');

$url = $_GET['url'];
$author = "";

$settings = array(
    'oauth_access_token' => "2751577358-1q2CghpgaESWuBXaO0zTguVytnG0CtTqY36mtdN",
    'oauth_access_token_secret' => "4z6ygiqt38f96kNX1QPLWvVPEajScNb1GvGsGhv8S5fpD",
    'consumer_key' => "5tvMDxxoIjKtoWFnACQK0Pktl",
    'consumer_secret' => "Kuk2KRO0n1jtsi5h21mWVyOqOBEHNNnipqDxZSIF3zoSS0dvy2"
);

function load($id)
{
    global $settings;
$url = 'https://api.twitter.com/1.1/statuses/show.json';
$getfield = '?id=' . $id . '&tweet_mode=extended';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$data =  $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();

    // echo $data;

    $res = json_decode($data, true);
echo $res['full_text'];
    /*foreach ($html->find('.main-user-dts1>a') as $element) {
            $element->outertext = $element->innertext;
        }

        foreach ($html->find('.user-text3>a') as $element) {
            $element->outertext = $element->innertext;
        }

        foreach ($html->find('.user-text3 span a') as $element) {
            $element->href = str_replace("twstalker.com", "twitter.com", $element->href);
            // https://twstalker.com/Deportdaniel1/status/1500581191090589696
            // https://twitter.com/SneakBug8/status/1500577825212018702
        }

        foreach ($html->find('.activity-descp a') as $element) {
            $element->outertext = $element->innertext;
        }*/
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweet by <?php echo $author ?> | Tweets Viewer for Free Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
    <style>
        .activity-group1 img {
            width: 50px;
            border-radius: 50%;
        }

        .activity-group1 h4 {
            font-size: 12pt;
        }

        img {
            max-width: 100%;
            max-height: 50vh;
        }

        .activity-reply {
            font-size: 90%;
        }

        .user-text3>span {
            float: right;
        }

        .user-text3 h4,
        .main-user-dts1 img {
            float: left;
        }

        .main-user-dts1::after {
            content: "";
            clear: both;
            display: table;
        }

        .activity-reply {
            margin: 1em 0;
        }

        .main-user-dts1 img {
            margin-right: 5px;
        }
    </style>
    <div class="container">
        <h1>Tweets Viewer</h1>
        <?

        $nextid = load($url);
        /*$i = 0;

        while (!is_null($nextid) && $i < 10) {
            $i ++;
            echo $nextid;
            $nextid = load($nextid);
        }*/
        ?>


        <div class="m-2"><a href="/">Made by @SneakBug8</a></div>
    </div>
</body>

</html>