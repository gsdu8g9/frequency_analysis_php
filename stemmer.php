<?php

function stemmer($textArr) {
	$stemArr = array();
	foreach ($textArr as $word) {
		$suffixLess = rmSuffix($word);
		if ($suffixLess and in_array($suffixLess, $textArr)) {
			array_push($stemArr, rmSuffix($word));
		}
		else {
			array_push($stemArr, $word);
		}
	}
	return $stemArr;
}

function rmSuffix($word) {
	if (endsWith($word, "s")) {
		return (substr($word, 0, -1));
	}
	else if (endsWith($word, "ing")) {
		return (substr($word, 0, -3));
	}
	else if (endsWith($word, "ed")) {
		return (substr($word, 0, -2));
	}
	else {
		return 0;
	}
}

function endsWith($word, $suffix) {
	$sufLen = strlen($suffix);
	return (substr($word, -$sufLen) === $suffix);
}


//have array collecting words...if a word without the s or the ing is in the text array, stem it!


?>