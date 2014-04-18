<?php

// problem: counts on root being in original $textArr to stem
// so "landing" and "landed" would not be stemmed if "land" wasn't in $textArr
// but to fix this, would have to check if stem in dictionary?
// could use pspell_check function to check if stem spelled correctly
// but this requires libraries to be installed on the server

// implemented like this so can confirm that stem is real, and doesn't just pluck off a suffix
// i.e. "les" is not a stem of "less"
function stemmer($textArr) {
	$stemArr = array();
	foreach ($textArr as $word) {
		$suffixLess = rmSuffix($word);
		if ($suffixLess and in_array($suffixLess, $textArr)) {
			array_push($stemArr, $suffixLess);
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

?>