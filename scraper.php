<?php

/*
 
 Assemblywales.org Wransfinder
 v0.1

 John Handelaar  


 */


require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
date_default_timezone_set('Europe/London');

print "Fetching list of wrans pages...\n";

foreach(range(1,3) as $month) {
	$html = file_get_html('http://assemblywales.org/bus-home/bus-business-fourth-assembly-written-questions.htm?ds=' . $month . '%2F2014');
	
	$output=array();
	
	foreach($html->find('dl[class=results] dd ul li a') as $target) {
		
		if(trim($target->plaintext) === "Written Assembly Questions and Answers") {
			$url = "http://assemblywales.org/" . str_replace("&amp;","&",$target->href);
			#$existingRecords = scraperwiki::select("* from data where `url`='" . $url . "'");
			
			#if (sizeof($existingRecords) == 0) {
				scraperwiki::save(array('url'), array($url));
			#}
			unset($url);
		}
		
		unset($target);        
	}
	
	unset($html);

}


