<?php

function questions($name){

	$xml = simplexml_load_file("../../questions/".$name);
	return $xml;
}

function formatQuestion($xml){
	$tab=array();
	foreach ($xml->question as $q) {
		$tabquestion=array();
		$tabquestion[]=$q["q"];
		foreach ($q->rep as $rep) {
			if($rep["ans"]=="vrai"){
			$tabquestion["vrai"]=$rep;
		} 
		else{
			$tabquestion[]=$rep;
		}
	}
		$tab[]=$tabquestion;
	}

	return $tab;

}

$tableau = formatQuestion(questions("cultge.xml"));
foreach ($tableau as $key) {
	foreach ($key as $ligne) {
		echo $ligne;
		echo "</br>";
	}
	echo $key["vrai"];
}


?>