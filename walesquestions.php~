<?php

/*
 
 Assemblywales.org Wransfinder
 v0.1

 John Handelaar  


 */


include('simple_html_dom.php');


foreach(range(1,3) as $month) {
	$html = file_get_html('http://assemblywales.org/bus-home/bus-business-fourth-assembly-written-questions.htm?ds=' . $month . '%2F2014');
	
	$output=array();
	
	foreach($html->find('dl[class=results] dd ul li a') as $target) {
		
		if(trim($target->plaintext) === "Written Assembly Questions and Answers") {
			$link = $target->find('a');
			echo "http://assemblywales.org/" . str_replace("&amp;","&",$target->href) . "\n";
		}
		
		unset($target);        
	}
	
	unset($html);

}
