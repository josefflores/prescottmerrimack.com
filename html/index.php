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

    /**
     *  INIT
     */


    /**
     *  PAGE CALLING
     */

    //  Set content for index
    $A[ 'CONTENT' ] = $_GET[ 'file' ] ;

    //  Begin page processing
    include( $A[ 'CONTENT' ] ) ;

?>
