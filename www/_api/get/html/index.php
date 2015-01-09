<?php
     /**
     *  @file   index.php
     *  @author Jose F. Flores <jose_flores@student.uml.edu>
     *
     *  Copyright (c) 2014 by Jose F. Flores. All rights reserved. May be
     *      freely copied or excerpted for educational purposes with credit
     *      to the author.
     *
     *  A UMass Lowell Computer Science Student 91.461
     *
     *  This file holds the PHP download script for html
     *
     *  10/02/14    Modified download script for html
     *  9/21/14     Created download script
     */

    // File Access Guard
    define( 'CONTENT_GUARD' , TRUE ) ;

    /**
     *  INIT
     */

    // Find Directory Root
    $A[ 'DIR' ] = __DIR__ ;
    $tmp = explode( 'www' , $A[ 'DIR' ] ) ;
    $A[ 'D_ROOT' ] = $tmp[ 0 ] ;

    // Load Framework
    include( $A[ 'D_ROOT' ] . 'php/class/framework.php' ) ;
    $F = new framework( $A ) ;
    $A = $F->init( ) ;

    /**
     *  INCLUDES
     */
    include( $A[ 'D_ROOT' ] . 'php/_includes.php' ) ; // Global Includes

    // Serve json

    if ( isset( $_GET[ 'file' ] ) ) {
        $name = basename( $_GET[ 'file' ] ) ;
        $file = $A[ 'D_HTML' ] . $name ;

        if ( is_file( $file ) ) {

            header( 'Content-Type: text/html');

            //  Make sure an action value for switch case exists
            $tmp = "" ;
            if( isset( $_GET[ 'action' ] ) ) {
                $tmp = $_GET[ 'action' ] ;
            }

            switch ( $tmp ) {
                // view in browser
                case 'view' :
                    header( 'Content-Disposition: inline;filename="' . $name . '"' ) ;
                    break ;

                // force download
                case 'download' :
                default :
                    header( 'Content-Disposition: attachment;filename="' . $name . '"' ) ;
                    break ;
            }

            //  generate content
            ob_start();
            include( $A[ 'D_HTML' ] . 'index.php' ) ;
            ob_get_contents();

        } else {
            // Error during request
            $F->respond( 404 , 'File was not found.' ) ;
        }

    } else {
        // Error during request
        $F->respond( 404 , 'File was not found.' ) ;
    }

?>
