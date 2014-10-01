<?php
    /**
     *  @file   meta.php
     *  @author Jose F. Flores <jose_flores@student.uml.edu>
     *
     *  Copyright (c) 2014 by Jose F. Flores. All rights reserved. May be
     *      freely copied or excerpted for educational purposes with credit
     *      to the author.
     *
     *  A UMass Lowell Computer Science Student 91.461 Assignment: Creating
     *      Your First Web Page
     *
     *  This file holds the meta information and other head components
     *
     *  9/10/14     Added title, meta information, and favicon links
     */

    // Set document encoding
    echo '
        <!-- Setting meta information -->
        <meta name="keywords" content="' , $A[ 'KEYWORDS' ] , '">
        <meta name="description" content="' , $A[ 'DESCRIPTION' ] , '">
        <meta name="author" content="' , $A[ 'AUTHOR' ] , '">
        <meta name="generator" content="Geany IDE">

        <!-- Setting Document title -->
        <title>' , $A[ 'PAGE_TITLE' ] ,  '</title>

        <!-- Giving document tab bar icons -->
        <link rel="icon" href="' , $A[ 'FAVICON' ] , '" type="image/png">
        <link rel="shortcut icon" href="' , $A[ 'FAVICON' ] , '" type="image/png">
    ';

?>
