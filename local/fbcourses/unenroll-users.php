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
	$contacts = $onecourse->get_course_contacts();
	$tcnt = 0;
	$plugin_instance = $DB->get_record("enrol", array("courseid" => $courseid, 
		"enrol" => "manual", "status" => 0), "*", MUST_EXIST);
	$instance_id = $plugin_instance->id;
	echo "Course ID - $courseid - Enroll Instance ID $instance_id \n";
		
	foreach($contacts as $contact){
		if($contact["rolename"]=="Teacher")
		{
			if($tcnt > 0)
			{
			    $cuser = $contact["user"];
				//enrol_user_delete($cuser->id);
				$DB->delete_records('user_enrolments', array('enrolid'=>$instance_id, 'userid' => $cuser->id));
				echo "User ID >>> {$cuser->id} \n";
			}
			$tcnt++;
		}
	}
	
}
