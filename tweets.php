<!DOCTYPE html>
<html lang="en">

<?php
        // error_reporting(E_ERROR | E_PARSE);

        include __DIR__ . "/simple_html_dom.php";

        $url = $_GET['url'];


        /* $unroller = 'https://unrollthread.com/t/';
        $titleselector = 'h5.heading-font a';
        $articleselector = 'article'; */

        $unroller = 'https://twstalker.com/DuquePawlovsky/status/';
        $titleselector = '.user-text3 h4 span';
        $articleselector = '.main-posts';

        // Create DOM from URL or file
        $html = file_get_html($unroller . $url);

        foreach ($html->find('.social-sticky') as $element) {
            $element->innertext="";
        }

        foreach ($html->find('.like-comment-view') as $element) {
            $element->innertext="";
        }

        foreach ($html->find('a') as $element) {
            if (substr($element->href, 0, 1) == "/")
                $element->href='https://twstalker.com' . $element->href;
        }
        
        // Find all images
        foreach ($html->find('img') as $element) {
            $element->src = "/publish/imgproxy.php?url=" . $element->src;
        }

        foreach ($html->find($titleselector) as $element) {
            $author = $element->innertext;
            break;
        }

        // Replace links

        foreach ($html->find('a') as $element) {
            $element->href = str_replace("twstalker.com", "twitter.com", $element->href);
            // https://twstalker.com/Deportdaniel1/status/1500581191090589696
            // https://twitter.com/SneakBug8/status/1500577825212018702
        }

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
        ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweet by <?php echo $author ?> | Tweets Viewer for Free Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
    <style>.activity-group1 img {width: 50px; border-radius: 50%;}
.activity-group1 h4 { font-size: 12pt; } img { max-width: 100%; }
.activity-reply { font-size: 90%; }
.user-text3>span {float: right;}
.user-text3 h4, .main-user-dts1 img { float: left;}
.main-user-dts1::after {
  content: "";
  clear: both;
  display: table;
}
.activity-reply {margin: 1em 0;}
.main-user-dts1 img {margin-right: 5px;}
</style>
    <div class="container">
    <h1>Tweets Viewer</h1>
        <?

        // Find all links
        foreach ($html->find($articleselector) as $element)
            echo $element;

        /*
$url='http://149.202.225.165:3000/proxy/thread/' . $_GET['url'];
//file_get_contents() reads remote webpage content
$lines_string=file_get_contents($url);
//output, you can also save it locally on the server
echo $lines_string;
*/
        ?>


<div class="m-2"><a href="/">Made by @SneakBug8</a></div>
    </div>
</body>

</html>