<!DOCTYPE html >
<html>
<head>
    <title>PHP-MySQL forum</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h1>My forum</h1>
    <div id="wrapper">
    <div id="menu">
        <a class="item" href="/amitforum/index.php">Home</a> -
        <a class="item" href="/amitforum/create_topic.php">Create a topic</a> -
        <a class="item" href="/amitforum/create_cat.php">Create a category</a>
        <div id="userbar">
	<?php
            session_start();
	    if($_SESSION['signed_in'])
	    {
	        echo 'Hello' . $_SESSION['user_name'] . '. Not you? <a href="signout.php">Sign out</a>';
	    }
	    else
	    {
	        echo '<a href="signin.php">Sign in</a> or <a href="signup.php">create an account</a>.';
	    }
	?>
</div>
    </div>
        <div id="content">
