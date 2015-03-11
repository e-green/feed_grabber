<?php 


// $html = <<<HTML;

// $dom = new DOMDocument();
// $dom->loadHTML($html);

// $xpath = new DOMXPath($dom);

// $tags = $xpath->query('//div[@class="container"]/div[@class="row"]/div[@class="col-lg-7 col-sm-8 col-xs-12"]/div[@class="newsContent"]');
// foreach ($tags as $tag) {
//     var_dump(trim($tag->nodeValue));
// }

// $dom = new DOMDocument();
// $dom->loadHTML(file_get_contents('http://sinhala.adaderana.lk/news.php?nid=49246'))

// $divs = $dom->getElementsByTagName('div');
// foreach ($divs as $div) {
//     foreach ($div->attributes as $attr) {
//       $name = $attr->nodeName;
//       $value = $attr->nodeValue;
//       echo "Attribute '$name' :: '$value'<br />";
//     }
// }

// $filePath = "http://sinhala.adaderana.lk/news.php?nid=49246";
// $dom = new DomDocument();
// $dom->load("http://sinhala.adaderana.lk/news.php?nid=49246");
// $finder = new DomXPath($dom);
// $classname="newsContent";
// $nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");



?>

<?php

// $html = '
//     <div class="page-wrapper">
//         <section class="page single-review" itemtype="http://schema.org/Review" itemscope="" itemprop="review">
//             <article class="review clearfix">
//                 <div class="review-content">
//                     <div class="review-text" itemprop="reviewBody">
//                     Outstanding ... 
//                     </div>
//                 </div>
//             </article>
//         </section>
//     </div>
// ';

$classname = 'newsContent';
$dom = new DOMDocument;
$dom->loadHTML(file_get_contents('http://www.adaderana.lk/news.php?nid=29747'));
$xpath = new DOMXPath($dom);
$results = $xpath->query("//*[@class='" . $classname . "']");

if ($results->length > 0) {
    echo $review = $results->item(0)->nodeValue;
}

?>