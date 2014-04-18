<?php

// problem: counts on root being in original $textArr to stem
// so "landing" and "landed" would not be stemmed if "land" wasn't in $textArr
// not a huge problem though, because if the root doesn't appear in the text array,
// it's probably not going to be very frequent anyway

// implemented this way to confirm that stem is real, and doesn't just pluck off a suffix
// i.e. "les" is not a stem of "less"

// to fix this, could check if stem in dictionary
// could use pspell_check function to check if stem spelled correctly
// but this requires libraries to be installed on server


function stemmer($textArr) {
	$stemArr = array();
	foreach ($textArr as $word) {
		$suffixLess = rmSuffix($word);
		//if the word has a suffix and it's root is in $textArr, add it's root
		//that second condition is an imperfect mechanism to ensure the root is a real word
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