<?php
    /**
     *  @file   content.php
     *  @author Jose F. Flores <jose.flores.152@gmail.com>
     *
     *  Copyright (c) 2014 by Jose F. Flores. All rights reserved. May be
     *      freely copied or excerpted for educational purposes with credit
     *      to the author.
     *
     *
     *  9/10/14 Modified HTML to work as PHP
     */

    //  Define guard preventsaccess unless from the index.php file at
    //  this level
    if ( !defined( 'CONTENT_GUARD' ) )
        header( 'Location: ./' ) ;

    // Content begin
?>


<!DOCTYPE html>
<!-- Document type declaration for HTML5-->

<!-- Start of html -->
<html lang="en">

    <head>

        <meta charset="utf-8">

        <!-- Setting meta information -->
        <meta name="keywords" content="health, care, lobbying,  Massachusetts, MA,  Lowell, legislative, research, regulatory, consulting, nancy, mcgovern, prescott, merrimack">
        <meta name="description" content="This is the Prescott &amp; Merrimack website.">
        <meta name="author" content="Jose F. Flores">
        <meta name="generator" content="Geany IDE">

        <!-- Setting Document title -->
        <title>Prescott &amp; Merrimack</title>

        <!-- Giving document tab bar icons -->
        <link rel="icon" href="<?php echo $A[ 'W_IMG' ] ; ?>icon_32.png" type="image/png">
        <link rel="shortcut icon" href="<?php echo $A[ 'W_IMG' ] ; ?>icon_32.png" type="image/png">

        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cinzel:900,400,700">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu">

        <!-- Adding css files -->
        <link rel="stylesheet" type="text/css" href="<?php echo $A[ 'W_CSS' ] ; ?>main.css">

        <!-- Adding Google jquery APIs -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

        <!-- Validation Plugin -->
        <script src="<?php echo $A[ 'W_JS' ] ; ?>lib/validate/jquery.validate.js"></script>

        <!-- Loading script -->
        <script type="text/javascript" src="<?php echo $A[ 'W_JS' ] ; ?>lib/main.js"></script>

    </head>

    <!--
        The body is given the overflow class so that a scrollbar is
        always present, this prevents background jumps when different
        sized pages are loaded.
    -->
    <body class="overflow-y">

        <input type="hidden" id="W_ROOT" name="W_ROOT" value="<?php echo $A[ 'W_ROOT' ] ;?>" />

        <!-- holds a background image -->
        <div class="image-bg"></div>

        <div class="wrapper">

            <!-- The page header including menu -->
            <div class="header">

                <div class="title-wrapper">

                    <!-- The company Name -->
                    <img class="logo" src="<?php echo $A[ 'W_IMG' ] ; ?>header.png" alt="Prescott &amp; Merrimack">

                    <!-- navigation menu uses hashes and Java script to load the pages -->
                    <nav class="horizontal">

                        <ul>

                            <li><a href="#about"> About </a></li>

                            <li><a href="#blog"> Blog </a></li>

                            <li><a href="#staff"> Staff </a></li>

                            <li><a href="#contact"> Contact </a></li>

                        </ul>

                    </nav>

                </div>

            </div>

            <!-- Begin content -->
            <div class="content">

                <!-- holds the content div that is filled dynamically -->
                <div class="content-wrapper">

                    <div id="content">
                    </div>

                </div>

            <!-- End content -->
            </div>

            <!-- Begin footer with page information -->
            <div class="footer">

                <!-- Wrapper to allow for centering -->
                <div class="footer-wrapper">

                    Copyright &copy; 2014 Prescott &amp; Merrimack

                <!-- End wrapper -->
                </div>

            <!-- End footer -->
            </div>

        <!-- End page wrapper -->
        </div>

    <!-- End of body -->
    </body>

<!-- End of HTML document -->
</html>
