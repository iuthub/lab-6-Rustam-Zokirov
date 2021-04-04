<?php

	$pattern="";
	$text="";
	$replaceText=""; # replace the pattern
	$replacedText=""; # replaced with pattern


	$match="Not checked yet.";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$pattern=$_POST["pattern"];
	$text=$_POST["text"];
	$replaceText=$_POST["replaceText"];

	$replacedText=preg_replace($pattern, $replaceText, $text);

	if(preg_match($pattern, $text)) {
            $match="Match!";
	} else {
	    $match="Does not match!";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Validate Form</title>
</head>
<body>
	<form action="regex_valid_form.php" method="post">
		<dl>
            <dt>Choose a pattern:</dt>
            <dd>
                <select name="pattern" id="pattern">
                    <option value="/quick/">Check for word 'quick'</option>
                    <option value="/[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{1,3}/">Validate email address</option>
                    <option value="/\+998-\d{2}-\d{3}-\d{2}-\d{2}/">Validate phone number</option>
                    <option value="/\s/">Write without spaces</option>
                    <option value="/[^0-9\.,]/">Remove non-numeric</option>
                    <option value="/\n/">Remove new lines</option>
                    <option value="/\[(.*?)\]/">Extract text from parenthesis</option>
                </select>
            </dd>

            <dt>Text</dt>
			<dd><input type="text" name="text" value="<?= $text ?>"></dd>

			<dt>Replace Text</dt>
			<dd><input type="text" name="replaceText" value="<?= $replaceText ?>"></dd>

			<dt>Output Text</dt>
			<dd><?=	$match ?></dd>

			<dt>Replaced Text</dt>
			<dd> <code><?= $replacedText ?></code></dd>


			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Check"></dd>
		</dl>

	</form>
</body>
</html>
