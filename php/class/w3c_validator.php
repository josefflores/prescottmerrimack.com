<?php
    /**
     *  @file   w3c_validator.php
     *  @author Jose F. Flores <jose_flores@student.uml.edu>
     *
     *  Copyright (c) 2014 by Jose F. Flores. All rights reserved. May be
     *      freely copied or excerpted for educational purposes with credit
     *      to the author.
     *
     *  A UMass Lowell Computer Science Student 91.461
     *      Checking all files against w3c validators
     *
     *  This file holds the w3c_validator class, I created it in an effort
     *  automate my page checks for w3c compliance
     *
     *  9/18/2014   wrote class
     */

    /**
     *  @name   w3c_validator
     *
     *  This class is given a series of root points in given domains,
     *  and then it collects all unique link instances to other index files HTML
     *  or css files for interlinked pages. It then validates links against
     *  a CSS3 and HTML5 validator.
     *
     *  Note This file tricks the services into thinking that the requests
     *  are coming from a browser and repeated use could temporarily cause
     *  a failure as the services might impose an IP ban as encountered
     *  during extreme testing.
     *
     *  This file is intended to validate a domain upon request, and during
     *  deployment.
     *
     *  accepted url paths
     *
     *  http://someDirPath/
     *  http://someDirPath/path/
     *  http://someDirPath/somefile.html
     *  http://someDirPath/somefile.css
     *  http://someDirPath/?Getparameters
     */
    class w3c_validator {

    //  VARIABLES

        //Tags to search for and their link property
        private $tags   = array( 'a' => 'href' ,
                                 'link' => 'href' ,
                                 'iframe' => 'src' ,
                                 'img' => 'src' ,
                                 'script' => 'drc' ) ;

        private $parse  = array( 'html' ) ;
        private $links  = array() ;
        private $result = array() ;

        //  CSS VALIDATOR
        private $CSS = array( 'SERVICE' => 'http://jigsaw.w3.org/css-validator' ,
                              'URL'     => 'http://jigsaw.w3.org/css-validator/validator?uri=' ,
                              'REGEX'   => '|div id="congrats"|' ) ;

        //  HTML VALIDATOR
        private $HTML = array('SERVICE' => 'http://validator.nu' ,
                              'URL'     => 'http://validator.nu/?doc=' ,
                              'REGEX'   => '|p class="success"|' ) ;


    //  FUNCTIONS

        /**
         *  @name   __construct
         *
         *  This is the constructor, it stores the starting points and
         *  dom parser path.
         *
         *  @param  $root       The root links array
         *  @param  $pathToDom  The path to simple_html_dom.php
         */
        public function __construct( $root , $pathToDom ){

            // Including simple_html_dom.php
            require_once $pathToDom ;

            // Storing starting points
            $this->links = $root ;
        }

        /**
         *  @name   crawl
         *
         *  This functions crawls a domain that allows file_get_html
         *  access. It searches for unique links in the pages and
         *  repeats until all link pages have been searched. Essentially
         *  it iteratively performs a recursive search for new links
         *
         *  @return $this->links    The unique found links, the links
         *                          reported are all the unique links
         *                          involved in the recursive search to
         *                          endpoints outside of the children from
         *                          link 0.
         */
        public function crawl( ) {

            //for each link
            for( $i = 0 ; $i < count( $this->links ) ; ++$i ) {

                // Check if link is in domain and a valid search into file
                //  and not the calling page to prevent infinite recursion
                if ( preg_match( '|' . $this->links[ 0 ] . '|' , $this->links[ $i ] ) &&
                     $this->validatingFile( $this->links[ $i ] , $this->parse ) ) {

                    //  get link's links
                    $tmp = $this->getUrls( $this->links[ $i ] ) ;

                    // for each link
                    foreach( $tmp as $t ) {

                        //if the link is a get parameter fix
                        if ( $t[ 0 ] == '?' ) {
                            $val = explode( '?' , $this->links[ $i ] ) ;
                            $t = $val[ 0 ] . $t ;
                        } else
                            $t = $t ;

                        //  Store link
                        if ( !in_array( $t , $this->links ) ) {
                            array_push( $this->links , $t ) ;
                        }
                    }
                }
            }
            //  Sort the links alphabetically
            sort( $this->links ) ;

            // Return found links
            return $this->links ;
        }

        /**
         *  @name   get_data
         *
         *  This function was found at
         *  http://davidwalsh.name/curl-download
         *
         *  There was one modification made to allow for access to the
         *  validators, and that was the USERAGENT option
         *
         *  @param  $url    The url to be fetched
         *  @return $data   The HTML of the fetched page or response
         *                  given by website.
         */
        private function get_data( $url ) {

            $ch = curl_init() ;

            curl_setopt( $ch , CURLOPT_URL ,  $url  ) ;
            curl_setopt( $ch , CURLOPT_RETURNTRANSFER , 1 ) ;
            curl_setopt( $ch , CURLOPT_CONNECTTIMEOUT , 5 ) ;

            // Modification HERE
            curl_setopt( $ch , CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13' ) ;
            curl_setopt( $ch , CURLOPT_VERBOSE , FALSE ) ;

            $data = curl_exec( $ch ) ;
            curl_close( $ch ) ;

            return $data ;
        }

        /**
         *  @name   getUrls
         *
         *  This function is the implementation of the simple_dom_parser
         *  It searches for all tags in the HTML retrieved.
         *
         *  $param  $url    The url to search
         *  $return $arr    The array of found urls
         */
        private function getUrls( $url ) {

            $opts[ 'http' ][ 'method' ] = "GET" ;

            $opts[ 'http' ][ 'header' ] = "Content-Type: text/html;" ;
            $opts[ 'http' ][ 'header' ] .= "charset=utf-8;" ;
            $opts[ 'http' ][ 'header' ] .= "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13;" ;

            $context = stream_context_create( $opts ) ;

            try {
                $html = file_get_html( $url , FALSE , $context ) ;

                foreach ( $this->tags as $key => $val )
                    foreach( $html->find( $key ) as $element )
                        if ( $element->$val != '' )
                            $arr[] = trim( $element->$val );
            }
            catch ( Exception $e ) {

                $arr[] = 'ERROR[ ' . $e .' ] - ' . $url ;
            }

            return $arr ;
        }

        /**
         *  @name   validatingFile
         *
         *  This function checks to see if the url should be searched
         *
         *  @param  $url    The url that is being examined
         *  @return true    The url should be searched
         *  @return false   The url should not be searched
         */
        private function validatingFile( $url ) {

            //  Break apart the $url into components
            $path_parts = pathinfo( $url ) ;

            // for each parsable file option
            foreach( $this->parse as $ext ) {

                //  check if in parsable file list and also if no filename
                //  blank filenames are index files and therefore landing
                //  points and can be parsed
                if ( !isset( $path_parts[ 'extension' ] ) ||
                     $path_parts[ 'extension' ] == $ext ) {
                        //  searchable url
                        return true ;
                }
            }
            //  not a searchable url
            return false ;
        }

        /**
         *  @name   process
         *
         *  This function processes the crawled links, it determines the
         *  validator based on file type.
         */
        public function process( ) {

            //  Start on the first link, this counter is needed so that
            //  functions know which link to work on
            $i = 0 ;

            //  Process each link
            foreach ( $this->links as $link ) {

                //  Remove any get parameters
                $file = explode( '?' , $link ) ;

                // Start matching file types

                // CSS
                if ( preg_match( '|.css|' , $file[ 0 ] ) ) {
                    $this->validate( $this->CSS , $link , $i ) ;
                }

                // HTML and index files
                else if ( preg_match( '|.html|' , $file[ 0 ] ) ||
                         $file[ 0 ][ strlen( $file[ 0 ] ) - 1 ] == '/' ) {
                    $this->validate( $this->HTML , $link , $i ) ;
                }

                // INVALID
                else {
                    $this->validate( NULL , $link , $i ) ;
                }

                // Move on to next link
                ++$i ;
            }
        }

        /**
         *  @name validate
         *
         *  This function calls the respective validators and then stores
         *  results.
         *
         *  @param  $VAL    The validator to use and respective information
         *  @param  $link   The link to check
         *  @param  $i      The increment to store to
         */
        private function validate( $VAL , $link , $i ) {

            //  Retrieve validation
            $test = $VAL[ 'URL' ] . urlencode( $link ) ;
            $data = $this->get_data( $test ) ;

            //  Store common value of the link
            $this->result[ $i ][ 'LINK' ] = $link ;
            $this->result[ $i ][ 'TEST' ] = $test ;
            // Initialize values, error case will overwrite
            $this->result[ $i ][ 'ERROR' ] = NULL ;
            $this->result[ $i ][ 'DATA' ] = NULL ;

            //  SKIP CASE
            if ( $VAL == NULL ) {

                $this->result[ $i ][ 'STATE' ] = 'SKIP' ;

            }
            //  PASS CASE
            else if ( preg_match( $VAL[ 'REGEX' ] , $data ) ) {

                $this->result[ $i ][ 'STATE' ] = 'TRUE' ;

            }
            //  FAIL CASE
            else {

                $this->result[ $i ][ 'STATE' ] = 'FALSE' ;
                //  store link to test
                $this->result[ $i ][ 'ERROR' ] = $VAL[ 'URL' ] . urlencode( $link ) ;
                // store returned data for parsing
                $this->result[ $i ][ 'DATA' ] = $data ;
            }

        }

        /**
         *  @name   report
         *
         *  This function generates a report or returns the gathered
         *  results
         *
         *  @param  $print          True    print out a result list
         *                          False   Retrieve results array
         *
         *  @return $this->result   an array of collected results
         */
        public function report( $print = FALSE ) {

            //  Print results
            if ( $print ) {
                $i = 0 ;
                foreach ( $this->result as $item ) {
                    //var_dump( $item ) ;
                    echo ++$i , ' ' , $item[ 'STATE' ] , ' ' , $item[ 'LINK' ] , "\n" ;
                }
            }
            //  Retrieve results
            else {

                return $this->result ;

            }
        }

    }

?>
