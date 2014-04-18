<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<title>Word Frequency</title>
</head>
<body>

<?php
if ($_FILES["file"]["error"] > 0) {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
}

$text = file_get_contents($_FILES["file"]["tmp_name"]);

/*
function textFilter($word) {
	if ($word == "" or $word == "-") {
		return 0;
	}
	return 1;
}

$textArr = array_filter(explode(" ", $text), 'textFilter');
*/

$textArr = explode(" ", $text);
$numWords = count($textArr);

// remove empty strings and hyphens, and remove punctuation from before and after words
$punctuation = array('"', "'", ".", ",", ";");
for ($i=0; $i < $numWords; $i++) {
	if ($textArr[$i] == "" or $textArr[$i] == "-") {
		unset($textArr[$i]);
	}
	// removes punctuation at end of word
	else if (in_array(substr($textArr[$i], -1), $punctuation)) {
		$textArr[$i] = substr($textArr[$i], 0, -1);
	}
	//removes punctuation at beginning of word
	else if (in_array(substr($textArr[$i], 0, 1), $punctuation)) {
		$textArr[$i] = substr($textArr[$i], 1);
	}
}

include "stemmer.php";
$textArr = stemmer($textArr);

$wordFreq = array_count_values($textArr);
asort($wordFreq);
$wordFreq = array_reverse($wordFreq);

$keys = array_keys($wordFreq);

echo "<div class='container'> <br> <div class='jumbotron'>";
// put story word frequency analysis here
echo "<p class=:lead>" . $_FILES["file"]["name"] . " word frequency analysis</p>";
echo "<table class='table table-hover table-bordered' style='background-color:white;'>";
echo "<tr>" . "<th>" . "Rank" . "</th>" . "<th>" . "Word Stem" . "</th>" . "<th>" . "Frequency" . "</th>" . "</tr>";
for ($i = 0; $i < 25; $i++) {
	echo "<tr>";
	echo "<td>" . (string)($i+1) . "</td>" . "<td>" . $keys[$i] . "</td>" . "<td>" . $wordFreq[$keys[$i]] . "</td>";
	echo "</tr>";
}
echo "</table>";

?>

<br><br><br>
<a href="app.php">Start over</a>
</div>
</div>
<br>

</body>
</html>