<?php
define('CLI_SCRIPT', true);
require("../../config.php");
global $DB, $CFG;

require_once($CFG->libdir.'/enrollib.php');
require_once($CFG->libdir . '/filelib.php');
require_once($CFG->dirroot.'/user/lib.php');
require_once($CFG->dirroot . '/user/externallib.php');

function alternator()
{
	static $i;

	if (func_num_args() === 0)
	{
		$i = 0;
		return '';
	}

	$args = func_get_args();
	return $args[($i++ % count($args))];
}

function enrol_user($userid, $courseid, $roleidorshortname = null, $enrol = 'manual',
            $timestart = 0, $timeend = 0, $status = null) {
	global $DB;

	// If role is specified by shortname, convert it into an id.
	if (!is_numeric($roleidorshortname) && is_string($roleidorshortname)) {
		$roleid = $DB->get_field('role', 'id', array('shortname' => $roleidorshortname), MUST_EXIST);
	} else {
		$roleid = $roleidorshortname;
	}

	if (!$plugin = enrol_get_plugin($enrol)) {
		return false;
	}

	$instances = $DB->get_records('enrol', array('courseid'=>$courseid, 'enrol'=>$enrol));
	if (count($instances) != 1) {
		return false;
	}
	$instance = reset($instances);

	if (is_null($roleid) and $instance->roleid) {
		$roleid = $instance->roleid;
	}

	$plugin->enrol_user($instance, $userid, $roleid, $timestart, $timeend, $status);
	return true;
}

/* $userid = 32;
$courseid = 32;

enrol_user($userid, $courseid, "editingteacher");

exit; */

$allcourses = core_course_category::get(0)->get_courses(
            array('recursive' => true, 'coursecontacts' => true, 'sort' => array('id' => 1)));
			
$users = core_user_external::get_users();
$ausers = $users["users"];
	
foreach($allcourses as $onecourse){
	//print_r($onecourse);
	$courseid = $onecourse->id;
	$rk = array_rand($ausers,10);
	foreach($rk as $cridx)
	{
		//$role_sname = alternator('student', 'editingteacher');
		$role_sname = 'student';
		$uid = $ausers[$cridx]["id"];
		enrol_user($uid, $courseid, $role_sname);
		echo "Course - $courseid, User - $uid, Role - $role_sname \n\n";
	}
	
	$rk1 = array_rand($ausers,2);
	foreach($rk1 as $cridx1)
	{
		//$role_sname = alternator('student', 'editingteacher');
		$role_sname1 = 'editingteacher';
		$uid = $ausers[$cridx1]["id"];
		enrol_user($uid, $courseid, $role_sname1);
		echo "Course - $courseid, User - $uid, Role - $role_sname1 \n\n";
	}
	
	
}
