<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<title>Word Frequency</title>
</head>

<body>
<div class="container">
<h1>Word frequency analysis</h1><br>

<form role = "form" action="analyze.php" method="post" enctype="multipart/form-data">
	<div class = "form-group">
		<label for="file">Upload a .txt file to see its top 25 most frequently used words!</label>
		<input type="file" name="file" id="file">
	</div>
	<button type="submit" class="btn btn-default">Analyze</button>
</form>
</div>
</body>
</html>