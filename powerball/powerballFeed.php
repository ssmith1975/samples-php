<?php

// http://www.ajaxray.com/blog/2008/05/02/php-universal-feed-parser-lightweight-php-class-for-parsing-rss-and-atom-feeds/
// lotto feed-  http://feeds.feedburner.com/COPowerballNumbers?format=xml

//require_once 'lib\magpierss\magpierss-0.72\rss_fetch.inc';

//$url = 'http://feeds.feedburner.com/COPowerballNumbers?format=xml';
$feed_url = 'http://www.onlinecasinosinenglish.com/rss-articles.xml';

//$rss = fetch_rss($url);

$xml_source = file_get_contents($feed_url);
$x = simplexml_load_string($xml_source);

if (empty($x) ) {
    echo "Nothing to show.";
} else {
    echo "<br />";

    
    echo '<div id="feed-container" class="box_shadow">';
    echo '<h2><a href="'.$x->channel->link[2].'" title="'.$x->channel->title.'">'. $x->channel->title.'</a></h2>';
    echo "<p>{$x->channel->description}</p>";   
  
    foreach ($x->channel->item as $item) {
        if (strpos(strtolower($item->category), 'powerball') !== false){
        	$title = $item->title;
        	$url   = $item->link;
        	
        	echo '<div class="feed-item">';
        		echo "<h3><a href='$url' title='{$title}'>{$title}</a></h3>";
                echo '<p class="published">Published: '. $item->pubDate.'</p>';
                echo "<p>{$item->description}</p>";
        	echo "</div>";
            echo'<p class="return-top"><a href="#top">Return to top</a></p>';
        	
        } 
        
    }
    echo "</div>";

}

?>