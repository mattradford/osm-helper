
    <?php
/**
 * Notes from Ed Jellard re API access. Will be deleted prior to plugin release.
 */



    /*
     * I am a lazy sod, so I'm not going to document how to do everything.  Instead, please install 'Firebug'
     * on firefox (or use Chrome's javacsript console) and use the console to see what you should be requesting
     * (with associated POST/GET parameters) and what you'll get back.
     *
     * There is one exception to make your life easier!  When getting badge records, the JSON for OSM is split into two chunks,
     * one bit for the name (which is always shown) and another for the records.  The API version gives this to you in one bigger chunk,
     * much easier!
     *
     * Another confusion - challenges.php should really be called badges.php - it's not just for challenges, sorry!
     *
     * There are a few secret functions to give you access to bits that you won't see called via AJAX on OSM:
     * https://www.onlinescoutmanager.co.uk/api.php?action=getUserRoles
     * https://www.onlinescoutmanager.co.uk/api.php?action=getSectionConfig
     * https://www.onlinescoutmanager.co.uk/api.php?action=getTerms
     *
     * There's a chance there are other things missing, if you find them, just let me know.
     *
     * Please show me what you produce before making it live just so I can see what you're doing.  Ideally if you are
     * happy to share it, we can make your code available to others.
     *
     * Any questions, please shout!
     */

    $apiid = X; // Get this from Ed
    $token = 'XXX'; // Get this from Ed

    $parts['apiid'] = 175;
    $parts['token'] = 'd8b23abdba6fcf0f9f9ff2a987fbd62c';


    $myEmail = 'XXX'; // Only needed for authorising the first time
    $myPassword = 'XXX'; // Only needed for authorising the first time

    $userid = 0; // You'll get this programmatically from authorising
    $secret = '';// You'll get this programmatically from authorising

    $base = 'https://www.onlinescoutmanager.co.uk/';

    /*
     * You need to authorise once to get the secret and userid that you should store for future use. 
     *
     * After authorising, open OSM in your browser, go to the External Access page
     * (in the Account dropdown menu) to give this API access to bits of your account. 
     *
     * If your API is being used by others, please tell them to do this!
     */
     
    $json = authorise(); // Only call the first time to get userid and secret
    $secret = $json->secret; // Store somewhere
    $userid = $json->userid; // Store somewhere

    /*
     * Now that you have the secret and userid, you can do pretty much anything that OSM can do on the web.
     */