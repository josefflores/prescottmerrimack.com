<?php
    /**
     *  @file   content.php
     *  @author Jose F. Flores <jose_flores@student.uml.edu>
     */

    //  Define guard prevents access unless from the index.php file at
    //  this level
    if ( !defined( 'CONTENT_GUARD' ) )
        header( 'Location: ./' ) ;

    // Content begin

        echo'
        <div class="article">
            <form class="cmxform" id="commentForm" method="get" action="">
                  <fieldset>
                        <legend>Please provide your name, email address, and a comment</legend>
                        <p>
                          <label for="cname">Name (required, at least 2 characters)</label>
                          <input id="cname" name="name" minlength="2" type="text" required/>
                        </p>
                        <p>
                          <label for="cemail">E-Mail (required)</label>
                          <input id="cemail" type="email" name="email" required/>
                        </p>
                        <p>
                          <label for="ccomment">Your comment (required)</label>
                          <textarea id="ccomment" name="comment" required></textarea>
                        </p>
                        <p>
                          <input class="submit" type="submit" value="Submit"/>
                        </p>
                  </fieldset>
            </form>

        </div>
    ';

?>
