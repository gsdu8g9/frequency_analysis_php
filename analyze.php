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

function textFilter($word) {
	if (!(strlen($word))) {
		return 0;
	}
	elseif ($word == "-") {
		return 0;
	}
	else {
		return 1;
	}
}

$textArr = array_filter(explode(" ", $text), 'textFilter');

include "stemmer.php";

$textArr = stemmer($textArr);

$count = array_count_values($textArr);
asort($count);
$count = array_reverse($count);

$keys = array_keys($count);

echo "<div class = 'container'><table class='table table-striped'>";
echo "<tr>" . "<th>" . "Rank" . "</th>" . "<th>" . "Word Stem" . "</th>" . "<th>" . "Frequency" . "</th>" . "</tr>";
for ($i = 0; $i < 25; $i++) {
	echo "<tr>";
	echo "<td>" . (string)($i+1) . "</td>" . "<td>" . $keys[$i] . "</td>" . "<td>" . $count[$keys[$i]] . "</td>";
	echo "</tr>";
}
echo "</table>";

?>

<br><br><br>
<a href="app.php">Start over</a>
</div>
<br>

</body>
</html>