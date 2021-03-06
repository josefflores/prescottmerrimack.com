<?php
    /**
     *  @file   index.php
     *  @author Jose F. Flores <jose.flores.152@gmail.com>
     *
     *  Copyright (c) 2014 by Jose F. Flores. All rights reserved. May be
     *      freely copied or excerpted for educational purposes with credit
     *      to the author.
     *
     *
     *  9/10/14 Generated index file
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

    /**
     *  PAGE CALLING
     */

    //  Set content for index
    $A[ 'CONTENT' ] = 'content.php' ;

    //  Begin page processing
    include( $A[ 'CONTENT' ] ) ;

?>
