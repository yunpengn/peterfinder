    <title>Peter Finder</title>

    <!-- Character setting, icon setting and mobile compatibility -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico" >

    <!-- Information for search engine -->
    <meta name="description" content="Peter Finder"/>
    <meta name="keywords" content="Peter Finder">
    <meta name="author" content="CS2102 Project">

    <!-- Compatibility for browsers older than IE9, which do not support HTML5 new features. -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- jQuery file, must be put before Bootstrap javascript file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Scripts for Google Analytics -->
    <!-- Put the script provided by Google here. -->

    <?php
    // Redirect to HTTPS automatically (if not on localhost).
	if ((!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') && $_SERVER['HTTP_HOST'] != "localhost") {
        $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('HTTP/1.1 301 Moved Permanently');
        header("Location: $redirect_url");
        exit();
    }
	?>