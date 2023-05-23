<?php
define('CLI_SCRIPT', true);
require_once(dirname(__FILE__) . '/../../config.php');

global $CFG,$DB,$USER;

require_once($CFG->dirroot . '/lib/csvlib.class.php');
require_once($CFG->libdir.'/clilib.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once($CFG->dirroot . '/files/externallib.php');

$user = $DB->get_record('user', array('id'=> 2));
\core\session\manager::init_empty_session();
\core\session\manager::set_user($user);
 
$context = context_user::instance($USER->id);
$contextid = $context->id;
$component = "user";
$filearea = "draft";
$itemid = 0;
$filepath = "/";
$filename = "Simple.txt";
$filecontent = base64_encode("Let us create a nice simple file");
$contextlevel = null;
$instanceid = null;

// Call the api to create a file.
$fileinfo = core_files_external::upload($contextid, $component, $filearea, $itemid, $filepath,
		$filename, $filecontent, $contextlevel, $instanceid);
$fileinfo = external_api::clean_returnvalue(core_files_external::upload_returns(), $fileinfo);
// Get the created draft item id.
$itemid = $fileinfo['itemid'];

echo "Item ID >>>>>>>>> $itemid <br/>";