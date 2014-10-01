<?php
    /**
     *  @file   template.php
     *  @author Jose F. Flores <jose_flores@student.uml.edu>
     *
     *  Copyright (c) 2014 by Jose F. Flores. All rights reserved. May be
     *      freely copied or excerpted for educational purposes with credit
     *      to the author.
     *
     *  A UMass Lowell Computer Science Student 91.461 Assignment: Creating
     *      Your First Web Page
     *
     *  This file is the page template for all web pages
     *
     *  9/9/14  Generated Page Template
     */

    //  Page title
    $A[ 'TAB_NAME' ] = getPageDir( $A ) ;
    $A[ 'PAGE_TITLE' ] = $A[ 'TAB_APP' ] . ' - ' . $A[ 'TAB_NAME' ] ;

    // Generating document type declaration
    echo '<!DOCTYPE html>
<!-- Document type declaration for HTML5-->
    ' ;

    // Starting HTML
    echo '
<!-- Start of html -->
<html lang="en">' ;

    // Creating the head of the document
    echo '
    <head>
        <meta charset="' , $A[ 'CHARSET' ] , '">
    ' ;
    /**
     *  Including the file HTML comment information for the page, includes
     *  license and update information.
     */
    include( $A[ 'D_PHP' ] . 'info.php' ) ;

    /**
     *  Including the Meta information for the page such as encoding,
     *  title, page icons, etc .
     */
    include( $A[ 'D_PHP' ] . 'meta.php' ) ;

    /**
     *  Including any relevant css files, such as the main css file and
     *  any plugin/ library css files.
     */
    include( $A[ 'D_PHP' ] . 'css.php' ) ;
    /**
     *  Including any relevant Javascript files. This also includes jQuery
     *  files and any onload functions that need to be run.
     */
    include( $A[ 'D_PHP' ] . 'js.php' ) ;

    echo '
    </head>
    ' ;


    /**
     *  Generating the body of the document. In this first section the header
     *  and the menu will be generated.
     */
    echo '
    <body>
        <img class="image-bg" src="' , $A[ 'W_IMG' ] , 'bg.png">
        <div class="wrapper">

            <div class="header">

                <div class="title-wrapper">

                    <img class="logo" src="' , $A[ 'LOGO' ] , '" alt="Prescott Merrimack">

                    <nav class="horizontal">
                        <ul>
                            <li><a ' ;

                            // Checking to see if the user is on a the page
                            if ( $A[ 'TAB_NAME' ] == 'BLOG' ) echo 'class="selected" ' ;

                            echo  'href="' , $A[ 'W_ROOT' ] , 'blog/"> Blog </a></li>

                            <li><a ' ;

                            if ( $A[ 'TAB_NAME' ] == 'IN-ACTION' ) echo 'class="selected" ' ;

                            echo  'href="' , $A[ 'W_ROOT' ] , 'in-action/"> In action </a></li>

                            <li><a ' ;

                            // Checking to see if the user is on a the page
                            if ( $A[ 'TAB_NAME' ] == 'STAFF' ) echo 'class="selected" ' ;

                            echo  'href="' , $A[ 'W_ROOT' ] , 'staff/"> Staff </a></li>

                            <li><a ' ;

                            // Checking to see if the user is on a the page
                            if ( $A[ 'TAB_NAME' ] == 'CONTACT' ) echo 'class="selected" ' ;

                            echo  'href="' , $A[ 'W_ROOT' ] , 'contact/"> Contact </a></li>

                        </ul>

                    </nav>

                </div>

            </div>
    ' ;

    // The content section is generated here, it will be unique for each page
    echo '
            <!-- Begin content -->
            <div class="content">

                <div class="content-wrapper">
    ' ;

    // Page specific content is being included
    include( $A[ 'CONTENT' ] )  ;

    echo '
                </div>
            <!-- End content -->
            </div>
    ' ;

    /**
     *  Generating the footer of the document. The footer contains links to
     *  the Github repository, copyright information as well as a link to view
     *  the PHP source.
     */
    echo '
            <!-- Begin footer with page information-->
            <div class="footer">

                <!-- Wrapper to allow for centering -->
                <div class="footer-wrapper">


                <!-- End wrapper -->
                </div>

            <!-- End footer -->
            </div>

        <!-- End page wrapper -->
        </div>

    <!-- End of body -->
    </body>

<!-- End of HTML document -->
</html>' ;

?>
