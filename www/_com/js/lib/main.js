 /**
     *  @file   assignment5.js
     *  @author Jose F. Flores <jose_flores@student.uml.edu>
     *
     *  Copyright (c) 2014 by Jose F. Flores. All rights reserved. May be
     *      freely copied or excerpted for educational purposes with credit
     *      to the author.
     *
     *  A UMass Lowell Computer Science Student 91.461 Assignment: Creating
     *      Styling Your First Web Page With CSS
     *
     *  This file is the Javascript file for the assignment 5 page.
     *
     *  10/7/14 Generated js file
     */

    //  GLOBALS
    var scripts = document.getElementsByTagName( "script" ) ; //  An array of loaded scripts
    var filepath = scripts[ scripts.length - 1 ] ;            //  The current script being called is the last script called
    var webRoot ;

    // Functions

        /**
         *  @name   loadpage
         *
         *  This function loads the json file from the api and displays the content
         *
         *  @return 0   Success
         *  @return 1   Unknown error
         *  @return 2   File could not be loaded
         */
        var loadPage = function() {

            //VARIABLES
            var url ,   //  Holds the url to navigate to for the file
                data ,  //  The returned json data
                hash ,  //  The page that is being searched for
                load ,  //  The get json api location
                ret ;   //  The return value

            //  Setting for unknown response
            ret = 1 ;

            // Generating url to fetch
            load = webRoot + "_api/get/html/?file=" ;
            hash = window.location.hash ;
            hash = hash.substring( 1, hash.length ) ;

            // Checking if hash is empty and generating default page
            if ( hash === "" )
                hash = "about" ;

            //  Generating link to file
            url = load + hash + ".html" ;

            console.log( hash ) ;
            console.log( url ) ;

            // Fetching file
            $.ajax({ url : url  ,
                    success : function( retrieved ){
                        data = retrieved ;
                        //console.log( data ) ;
                    }
                })

                // Fail response
                .fail( function(){

                    //  Add error case to template
                    $( "#content" ).html( "<div class='warning'>Could not load the content for " + hash + "</div>" ) ;

                    ret = 0 ;
                })
                // Success response
                .done( function(){
                    //  Add httml to template
                    $( "#content" ).html( data ) ;

                    //  checking to see if the form is being loaded,
                    //  if so then the submit hadler has to be bound here
                    //  This was a headache to figure out

                    if ( hash == "contact" ){
                        $( '#contact' ).submit( function(event) {
                            event.preventDefault();
                            submit() ;
                        });
                    }

                    //  Readjust the overflow property to allow for the
                    //  scrollbar to normalize in size
                    $( "body" ).removeClass( "overflow-y" ) ;

                    // adding timeout to allow dom to recognize change
                    setTimeout( function(){
                        // adding overflow property
                        $( "body" ).addClass( "overflow-y" ) ;
                        // scrolling the scrollbar to the top
                        console.log( "scroll" ) ;
                        window.scrollTo( 0 , 0 ) ;
                     } , 1 ) ;

                } ) ;

            //  return statement
            return ret ;
        } ;

        /**
         *  @name   validation
         *
         *  This function validates the inputs and marks them respectively
         *
         *  @return state   The state of the input true, or false
         */
        var validate = function( id , type ){

            //  VARIABLES
            var state ;     //The state of the input

            //  retrieve the state
            state = regex( id , type ) ;

            console.log( state );

            // mark the state as successful or warning
            mark( id , state ) ;

            //  return whether the input passed validation
            return state ;
        }

        /**
         *  @name   regex
         *
         *  This function applies a regexp to a string to see if the string
         *  validates against it, if the string is empty the regexp step is
         *  skipped.
         *
         *  @param  id      the element id to test
         *  @param  type    The type of regexp to use
         *
         *  @return true    the regexp matched
         *  @return false   The regexp did not match
         */
        var regex = function( id , type ){

            //  VARIABLES
            var reg ,   //  The regexp holder
                str ;   //  The string to be tested

            //  Remove excess trailing and leading white space from the
            //  input
            str = $( id ).val() ;
            str = $.trim( str ) ;

            //  Check if blank
            if ( str == "" )
                return false ;

            //  Preform regexp selection
            switch( type ){

                //  something@something.something
                case "email" :
                    reg =  '/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i' ;
                    break ;

                //  Any characters are accepted
                case "text" :
                    return true ;

                //  Not a valid type
                default :
                    return false ;

            }

            //  Perform regexp check
            reg = new RegExp( reg ) ;

            if ( reg.test( str  ) ){
                //  Failed test
                return false ;
            }

            //  Passed test
            return true ;
        }

        /**
         *  @name mark
         *
         *  This function marks an input valid or invalid
         *
         *  @param id       The id of the element to mark
         *  @param state    how to mark
         *                      true means correct,
         *                      false means invalid
         */
        var mark = function( id , state ){

            // How should the element be marked
            if ( state ) {
                //  Warning issued
                $( id ).removeClass( "warning" ) ;
            } else {
                // Warning removed
                $( id ).addClass( "warning" ) ;
            }
        }

        /**
         *  @name   submit
         *
         *  This function submits the email form
         *
         *  @return false   Failed Submission
         *  @return true    Succesful Submission
         */
        var submit = function() {

                console.log('submit') ;

                //  VARIABLES

                var state ;   //  holds validation state

                //  setting failure to false
                state = false ;

                //  Validation stage started
                if ( !validate( "#contact-form-name" , "text" ) )
                    state = true ;

                if ( !validate( "#contact-form-email" , "email" ) )
                    state = true ;

                if ( !validate( "#contact-form-subject" , "text" ) )
                    state = true ;

                if ( !validate( "#contact-form-content" , "text" ) )
                    state = true ;

                //  Validation phase completed
                console.log( "validated" );

                if ( state == true ) {
                    // Failed Submission
                    console.log( "error" );
                    $( "#notice" ).addClass( "notice" ) ;
                    $( "#notice" ).html( "Due to errors the form could not be submitted."  ) ;
                    return false ;
                }

                //  Successful submission
                console.log( "success" );
                $( "#notice" ).removeClass( "notice" ) ;
                $( "#notice" ).html( "The Email was submitted. (It is not submitted as this is a test of the interface)"  ) ;

                return true ;
        }


        //  Document ready function
        $( document ).ready( function(){

            webRoot = $('#W_ROOT').val() ;            //  Calculating the path of the web root
            console.log( webRoot ) ;

            // load for first page content
            loadPage() ;

            // Adding hash change event handler to load pages
            $( window ).on( "hashchange" , function( event ) {
                loadPage() ;
            });

        });
