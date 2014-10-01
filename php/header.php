<?php
    /**
     *  @file   header.php
     *  @author Jose F. Flores <jose_flores@student.uml.edu>
     *
     *  Copyright (c) 2014 by Jose F. Flores. All rights reserved. May be
     *      freely copied or excerpted for educational purposes with credit
     *      to the author.
     *
     *  A UMass Lowell Computer Science Student 91.461 Assignment: Creating
     *      Your First Web Page
     *
     *  This file holds the header for the template
     *
     *  9/11/14 Added menu on page highlight
     *  9/9/14  Generated header template
     */

    echo'
            <!-- Start header -->
            <div class="header">

                <!--
                    Begin wrapper, this wrapper allows for the whole
                    header to be positioned as an item while maintaining
                    a full header bar.
                -->
                <div class="title-wrapper">

                    <!-- logo -->

                    <-- img class="icon" src="' , $A[ 'W_IMG' ] , 'menu.png" alt="Menu button" -->
                    <img class="logo" src="' , $A[ 'LOGO' ] , '" alt="Prescott Merrimack">

                    <!-- Navigation menu -->
                    <nav class="horizontal">
                        <ul>
                            <li><a ' ;

                            // Checking to see if the user is on a the page
                            if ( $A[ 'TAB_NAME' ] == 'HOME' ) echo 'class="selected" ' ;

                            echo  'href="' , $A[ 'W_ROOT' ] , '"> Home </a></li>

                            <li><a ' ;

                            // Checking to see if the user is on a the page
                            if ( $A[ 'TAB_NAME' ] == 'STAFF' ) echo 'class="selected" ' ;

                            echo  'href="' , $A[ 'W_ROOT' ] , 'staff/"> Staff </a></li>

                            <li><a ' ;

                            // Checking to see if the user is on a the page
                            if ( $A[ 'TAB_NAME' ] == 'CONTACT' ) echo 'class="selected" ' ;

                            echo  'href="' , $A[ 'W_ROOT' ] , 'contact/"> Contact </a></li>

                            <li><a ' ;

                            // Checking to see if the user is on a the page
                            if ( $A[ 'TAB_NAME' ] == 'IN-ACTION' ) echo 'class="selected" ' ;

                            echo  'href="' , $A[ 'W_ROOT' ] , 'in-action/"> In action </a></li>

                            <li><a ' ;

                            // Checking to see if the user is on a the page
                            if ( $A[ 'TAB_NAME' ] == 'BLOG' ) echo 'class="selected" ' ;

                            echo  'href="' , $A[ 'W_ROOT' ] , 'blog/"> Blog </a></li>

                        </ul>
                    </nav>

                <!-- End header wrapper-->
                </div>

            <!-- End header -->
            </div>
    ' ;

?>
