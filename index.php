<?php

ini_set('display_errors', 1);

// Folder with application
$folderApplication = 'app';

// Folder with system file
$folderSystem = 'system';

// ensure there's a trailing slash
$folderSystem = rtrim($folderSystem, '/').'/';

// The name of THIS file
define('INDEX', pathinfo(__FILE__, PATHINFO_BASENAME));

// Path to the system folder
define('BASE', $folderSystem);

// The path to the "application" folder
if (is_dir($folderApplication)){
    define('APPLICATION', $folderApplication.'/');
}
else{
    exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".INDEX);
}

// Is the system path correct?
if ( ! is_dir($folderSystem)){
    exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".INDEX);
}

require_once BASE . 'core/Framework.php';
