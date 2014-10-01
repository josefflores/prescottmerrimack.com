<?php
    /**
     *  @file   _includes.php
     *  @author Jose F. Flores <jose_flores@student.uml.edu>
     *
     *  Copyright (c) 2014 by Jose F. Flores. All rights reserved. May be
     *      freely copied or excerpted for educational purposes with credit
     *      to the author.
     *
     *  A UMass Lowell Computer Science Student 91.461 Assignment: Creating
     *      Your First Web Page
     *
     *  This file holds all the configuration and library includes for
     *  the application except for the relative paths, those were included
     *  by the index file.
     *
     *  9/10/14 added application library
     *  9/10/14 added application configuration
     */

    //  CONFIGURATIONS

        //  Application path information configuration
        include( $A[ 'D_ROOT' ] . $A[ 'D_SLASH' ] . 'ini' . $A[ 'D_SLASH' ] . 'paths.php' ) ;

        //  Application information configuration
        include( $A[ 'D_INI' ] . 'application.php' ) ;

    //  LIBRARIES

        //  Application library
        include( $A[ 'D_PHP' ] . 'lib' . $A[ 'D_SLASH' ] . 'library.php' ) ;

    //  CLASSES

        //  w3c_validator.php
        include( $A[ 'D_PHP' ] . 'class' . $A[ 'D_SLASH' ] . 'w3c_validator.php' ) ;

?>
