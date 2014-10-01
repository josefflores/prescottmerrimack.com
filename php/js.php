<?php
    /**
     *  @file   js.php
     *  @author Jose F. Flores <jose_flores@student.uml.edu>
     *
     *  Copyright (c) 2014 by Jose F. Flores. All rights reserved. May be
     *      freely copied or excerpted for educational purposes with credit
     *      to the author.
     *
     *  A UMass Lowell Computer Science Student 91.461 Assignment: Creating
     *      Your First Web Page
     *
     *  This file holds all the JS and jQuery script links.
     *
     *  9/9/14          Added Google jQuery Api files
     */

    //  Google code library sources
    echo '
        <!-- Adding google jquery APIs -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

        <!-- Validation Plugin -->
        <script src="' , $A[ 'W_JS' ] ,  'lib/validate/jquery.validate.js"></script>
    ' ;


?>
