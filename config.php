<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

/*$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'moodle';
$CFG->dbuser    = 'moodleuser';
$CFG->dbpass    = '?a83yy0X';
$CFG->prefix    = 'mdl_';*/
$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'moodle';
$CFG->dbuser    = 'root';
$CFG->dbpass    = 'r00t.';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbsocket' => 0,
);

/*$CFG->wwwroot   = 'http://onfunction.com/moodle-2';
$CFG->dataroot  = '/var/www/vhosts/amorfhia.com/moodledata';
*/
$CFG->wwwroot   = 'http://seminario.apoyoalajuventud.org';
$CFG->dataroot  = '/var/www/vhosts/apoyoalajuventud.org/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(dirname(__FILE__) . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
