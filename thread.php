<!DOCTYPE html>
<html lang="en">

<?php
        // error_reporting(E_ERROR | E_PARSE);

        include __DIR__ . "/simple_html_dom.php";

        $url = $_GET['url'];


        $unroller = 'https://unrollthread.com/t/';
        $titleselector = 'h5.heading-font a';
        $articleselector = 'article';

        // Create DOM from URL or file
        $html = file_get_html($unroller . $url);

        foreach ($html->find('.social-sticky') as $element) {
            $element->innertext="";
        }

        // Find all images
        foreach ($html->find('img') as $element) {
            $element->src = "/publish/imgproxy.php?url=" . $element->src;
        }

        foreach ($html->find($titleselector) as $element) {
            $author = $element->title;
            break;
        }
        ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thread by <?php echo $author ?> | Thread Unroller for Free Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
    <h1>Tweets viewer</h1>
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