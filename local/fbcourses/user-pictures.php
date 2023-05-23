<?php
define('CLI_SCRIPT', true);
require_once(dirname(__FILE__) . '/../../config.php');
require_once($CFG->dirroot . '/files/externallib.php');
global $CFG,$DB;

$page1 = new moodle_page();
$page1->set_url('/user/profile.php');
$page1->set_context(context_system::instance());
$renderer1 = $page1->get_renderer('core');

$user1 = $DB->get_record('user', array('id'=> 164));
//$options = array('popup' => true, 'size' => 100);
$up1 = new user_picture($user1);
//$up1->size = 500;
$up1->popup = true;
echo $up1->get_url($page1, $renderer1)->out(false);

/* $user = $DB->get_record('user', array('id'=> 2));
\core\session\manager::init_empty_session();
\core\session\manager::set_user($user);


//$dbuser = $DB->get_record('user', array('id' => 164));
$picture = $DB->get_field('user', 'picture', array('id' => 164));
$gfiles = $DB->get_record('files', array('id' => $picture));

$filearea = $gfiles->filearea;
$component = $gfiles->component;
$filename = $gfiles->filename;
$context_id = $gfiles->contextid;
$itemid = $gfiles->itemid;
print_r($context_id);

$afiles = core_files_external::get_files($context_id, $component, $filearea, $itemid, '/', $filename);

print_r($afiles); */