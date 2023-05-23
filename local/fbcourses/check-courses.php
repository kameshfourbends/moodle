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

$imagesdir = $CFG->dirroot . '/local/fbcourses/course-images/';
$dir = new DirectoryIterator($imagesdir);
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot()) {
        //var_dump($fileinfo->getFilename());
		// echo $fileinfo->getPathname() . "\n";
		$fname = $fileinfo->getFilename();
		$bname = pathinfo($fname);
		$course_sname = $bname['filename'];
		$cid = $DB->get_field_select('course', 'id', 'shortname = :s', array('s' => $course_sname));
		if(!empty($cid))
		{
			$pfname = $fileinfo->getPathname();
			
			//echo "base name {$bname['filename']} \n";
			//print_r($cid);
			//echo "\n";
			$context = context_course::instance($cid);
			$course = get_course($cid);
			$course = course_get_format($course)->get_course();
			$editoroptions = array('maxfiles' => 1, 'maxbytes'=>$CFG->maxbytes, 'trusttext'=>false, 'noclean'=>true);
			$overviewfilesoptions = course_overviewfiles_options($course);
			if ($course instanceof stdClass) {
				$course = new core_course_list_element($course);
			}
			//print_r($overviewfilesoptions);
			$files = $course->get_course_overviewfiles();
			
			if(empty($files))
			{
				echo "File name $fname \n";
			}
			
		}
    }
}