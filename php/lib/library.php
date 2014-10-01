<?php
    /**
     *  @file   library.php
     *  @author Jose F. Flores <jose_flores@student.uml.edu>
     *
     *  Copyright (c) 2014 by Jose F. Flores. All rights reserved. May be
     *      freely copied or excerpted for educational purposes with credit
     *      to the author.
     *
     *  A UMass Lowell Computer Science Student 91.461 Assignment: Creating
     *      Your First Web Page
     *
     *  This file holds the PHP user generated function library. This
     *  file may expand or shrink depending if other functions are added,
     *  or whether they are consolidated into classes.
     *
     *  9/10/14 Added function extInArray and getPageDir
     */

    /**
     *  @name extInArray
     *
     *  This function checks to see if the files extension is in the
     *  array of extensions.
     *
     *  @param  $file   The filename
     *  @param  $arr    The array of file extensions no periods
     *
     *  @return true    extension matched
     *  @return false   extension not found
     */
    function extInArray( $file , $arr ) {

        // Break filename by periods
        $ext = explode( '.' , $file ) ;

        // Compare each array entry
        foreach( $arr as $item ) {

            //  Look at last period delimited section of filename
            if ( $ext[ count( $ext ) - 1 ] == $item ) {
                // Match found
                return true;
            }
        }
        //  No match found
        return false ;
    }

    /**
     *  @name getPageDir
     *
     *  This function gets the directory holding the accessed index file
     *
     *  @param  $A      The global variable
     *  @return $page   The directory uppercase if not a given directory then return HOME
     */
    function getPageDir( $A ) {
        /**
         *  This explodes the url to extract the last directory name so that the
         *  menu can then be highlighted as selected.
         */
        $tmp = explode( $A[ 'W_SLASH' ] ,
                        $_SERVER[ 'HTTP_HOST' ] .
                        $_SERVER[ 'REQUEST_URI' ] ) ;

        /**
         *  setting the directory to lowercase for comparison in case someone typed
         *  it in a different case
         */
        $tmp = strtoupper( $tmp[ count( $tmp ) - 2 ] ) ;

        /**
         *  This switch case then checks upon the available menu items and then
         *  marks the page that the user is visiting
         */
        switch ( $tmp  ) {
            case 'ABOUT' :
            case 'ASSIGNMENTS' :
            case 'PHP-SOURCE' :
            case 'VALIDATION' ;
                $page = $tmp ;
                break ;
            default :
                $page = 'HOME' ;
                break ;
        }

        return $page ;
    }

?>
