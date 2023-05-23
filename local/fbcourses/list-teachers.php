<?php
define('CLI_SCRIPT', true);
require("../../config.php");
global $DB, $CFG;

$page1 = new moodle_page();
$page1->set_url('/user/profile.php');
$page1->set_context(context_system::instance());
$renderer1 = $page1->get_renderer('core');


$allcourses = core_course_category::get(0)->get_courses(
            array('recursive' => true, 'coursecontacts' => true, 'sort' => array('id' => 1)));

$ausers = array();
$arr = array();

foreach($allcourses as $onecourse){
	$courseid = $onecourse->id;
	$contacts = $onecourse->get_course_contacts();
	foreach($contacts as $contact){
		if($contact["rolename"]=="Teacher")
		{
			$ouser = $contact["user"];
			$user_id = $ouser->id;
			if(!isset($arr[$user_id])){
				$fname = $ouser->firstname;
				$lname = $ouser->lastname;
				$up1 = new user_picture($ouser);
				$up1->size = 500;
				$pic_url = $up1->get_url($page1, $renderer1)->out(false);
				$arr[$user_id] = array("user_id" => $user_id);
				$ausers[] = array("name" => $fname.' '.$lname,
					'user_id' => $user_id,
					'pic_url' => $pic_url
				);
			}
		}
	}
}

	print_r($ausers);