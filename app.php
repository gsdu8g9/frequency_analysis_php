<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<title>Word Frequency</title>
</head>

<body>
<div class="container">
<br>
<div class="jumbotron">
<h1>Word frequency analysis</h1><br>
<p class="lead">Upload a text document to see its top 25 most frequently used words!</p>
<form role="form" action="analyze.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="file">File input</label>
		<input type="file" name="file" id="file">
	</div>
	<button type="submit" class="btn btn-default btn-lg">Analyze</button>
</form>
</div>
</div>
</body>
</html>