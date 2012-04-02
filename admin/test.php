<?php
require_once('../library/odf.php');

$odf = new odf("test1.odt");


$article = $odf->setSegment('articles');
for($i=0; $i<=3; $i++) {
    $article->name($i);
    $article->ecode($i);
    $article->merge();
}
$odf->mergeSegment($article);
$odf->exportAsAttachedFile();

?>