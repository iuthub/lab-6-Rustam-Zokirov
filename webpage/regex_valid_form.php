<?php

    $pattern="";
    $text="";
    $replaceText="";
    $replacedText="";

    $withoutWhiteSpace="";
    $numerics="";
    $string=
            "Twinkle, twinkle, little star,
            How I wonder what you are.
            Up above the world so high,
            Like a diamond in the sky.";

    $withoutNewLines="";
    $match="Not checked yet.";

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $pattern=$_POST["pattern"];
        $text=$_POST["text"];
        $replaceText=$_POST["replaceText"];

        $replacedText=preg_replace($pattern, $replaceText, $text);

        $validateEmail = preg_replace('/[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{1,3}/', '', $text);
        $withoutWhiteSpace=preg_replace('/\s+/', '', $text);
        $numerics=preg_replace('/[^0-9,.]/', '', $text);
        $withoutNewLines=preg_replace('/\n/', '', $string);
        preg_match('#\[(.*?)\]#', $text, $withoutParenthesis);

        if(preg_match($pattern, $text)) {
            $match="Match!";
        } else {
            $match="Does not match!";
        }
    }

?>

<!--<select name="pattern" id="pattern">-->
<!--    <option value="/quick/">Check for word 'quick'</option>-->
<!--    <option value="/[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{1,3}/">Validate email address</option>-->
<!--    <option value="/\+998-\d{2}-\d{3}-\d{2}-\d{2}/">Validate phone number</option>-->
<!--    <option value="/\s/">Write without spaces</option>-->
<!--    <option value="/[^0-9\.,]/">Remove non-numeric</option>-->
<!--    <option value="/\n/">Remove new lines</option>-->
<!--    <option value="/\[(.*?)\]/">Extract text from parenthesis</option>-->
<!--</select>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validate Form</title>
</head>
<body>
<form action="regex_valid_form.php" method="post">
    <dl>
        <dt>Pattern</dt>
        <dd><input type="text" name="pattern" value="<?= $pattern ?>"></dd>

        <dt>Text</dt>
        <dd><input type="text" name="text" value="<?= $text ?>"></dd>

        <dt>Replace Text</dt>
        <dd><input type="text" name="replaceText" value="<?= $replaceText ?>"></dd>

        <dt>Output Text</dt>
        <dd><?=	$match ?></dd>

        <dt>Replaced Text</dt>
        <dd> <code><?= $replacedText ?></code></dd>

        <dt>Text without whitespaces</dt>
        <dd> <code><?= $withoutWhiteSpace ?></code></dd>

        <dt>Text without nonnumericals</dt>
        <dd> <code><?= $numerics ?></code></dd>

        <dt>Text without new lines</dt>
        <dd> <code><?= $withoutNewLines ?></code></dd>

        <dt>Text without parenthesis</dt>
        <dd> <code><?= $withoutParenthesis[1]."\n" ?></code></dd>

        <dt>&nbsp;</dt>
        <dd><input type="submit" value="Check"></dd>
    </dl>

</form>
</body>
</html>