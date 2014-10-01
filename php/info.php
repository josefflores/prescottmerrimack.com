<?php
    /**
     *  @file   info.php
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
     *  9/14/14     Added HTML file information for updates and license
     */

    // Set document encoding
    echo '
        <!--
          File:  ' , $A[ 'DIR' ] ,'
          91.461 Assignment:  Assignments Repository
          ' , $A[ 'AUTHOR' ] , ', UMass Lowell Computer Science, ' , $A[ 'EMAIL' ] , '
          Copyright (c) 2014 by ' , $A[ 'AUTHOR' ] , '.  All rights reserved.  May be freely
            copied or excerpted for educational purposes with credit to the author.
    ' ;

            foreach( $A[ 'UPDATE' ] as $item ) {
                echo '             updated by ' , $A[ 'AUTHOR' ] , ' on ' , $item , '
    ' ;

            }

    echo '        -->
    ';

?>
