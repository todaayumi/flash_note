<?php
require_once('config.php');

$url = $_SERVER["REQUEST_URI"];
	$equal = strpos($url, '=');
	$id = substr($url, $equal + 1);

$dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
$sql = 'select * from posts where id =' . $id;
$stmt = $dbh->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);


	$body = $result['body'];

	$replace = [
	'[' => "<p class='black active d-inline-block mb-0'>",
	']' => "</p>",
];

$str = str_replace(array_keys($replace), array_values($replace), $body); 


?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>box</title>
	<meta name="viewport" content="width=device-width" initial-scale=1.0>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container mt-3">
		<div class="float-right">
		<form action="edit.php" method="get" class="d-inline-block">
			<input type="hidden" value="<?= $id ?>" name="id">
			<input type="submit" class="btn btn-primary" value="編集">
		</form> 
		<form action="delete.php" method="get" class="d-inline-block">
			<input type="hidden" value="<?= $id ?>" name="delete">
			<input type="submit" class="btn btn-danger" value="削除">
		</form>
	</div>
	<div class="mt-4">
				<h3><?= $result['title'] ?></h3>
			<p class="d-inline-block mb-0"><?= nl2br($str); ?></p>
		</div>
</div>

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
<style>
	.active{
		color: #fff;
		border: solid 1px #000;
}
</style>
</html>
<script>
jQuery(document).ready(function(){
	$('.black').click(function(){
		$(this).toggleClass('active');
	});
 });
</script>

