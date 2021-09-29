<?php

/**
 * Welcome to CyberMaker! v0.1
 */

/**
 * @param $path string
 * @param $folderName string
 */
function addDir ($path, $folderName) {
    mkdir($path . '/' . $folderName, 0777, true);

}

/**
 * @param $siteName string
 */
function createHTML ($siteName) {
    addDir(     $siteName, 'css');
    addDir(     $siteName, 'img');
    addDir(     $siteName, 'js');
    mainPage(   $siteName);
    createCSS(  $siteName);
    copyImg(    $siteName);
    createJS(   $siteName);

}

/**
 * @param $siteName string
 */
function mainPage ($siteName) {
    $indexHTML = fopen($siteName . '/index.html', "w");
    $mainPageContents = <<<EOT
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>$siteName</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>
    <div class="welcome">
        <h1>Welcome to $siteName!</h1>
        <img src="img/under-construction.gif">
    </div>
</body>
</html>
EOT;
    fwrite($indexHTML, $mainPageContents);
    fclose($indexHTML);

}

/**
 * @param $siteName string
 */
function createCSS ($siteName) {
    $styleCSS = fopen($siteName . '/css/style.css', "w");
    $mainStyles = <<<EOT
.welcome {
	text-align: center;
}
EOT;
    fwrite($styleCSS, $mainStyles);
    fclose($styleCSS);
}

/**
 * @param $siteName string
 */
function copyImg ($siteName) {
    $underConstructionFrom = 'http://clipartmag.com/images/website-under-construction-image-6.gif';
    $underConstructionTo = $siteName . '/img/under-construction.gif';
    copy($underConstructionFrom, $underConstructionTo);
}

function createJS ($siteName) {
    $scriptJS = fopen($siteName . '/js/script.js', "w");
    $mainScript = <<<EOT
https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js;
console.log('JavaScript is connected!');
EOT;
    fwrite($scriptJS, $mainScript);
    fclose($scriptJS);
}

createHTML('CyberMaker');