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
			// echo "File name $fname \n";
			//echo "base name {$bname['filename']} \n";
			//print_r($cid);
			//echo "\n";
			$context = context_course::instance($cid);
			$course = $ucourse = get_course($cid);
			$course = course_get_format($course)->get_course();
			$editoroptions = array('maxfiles' => 1, 'maxbytes'=>$CFG->maxbytes, 'trusttext'=>false, 'noclean'=>true);
			$overviewfilesoptions = course_overviewfiles_options($course);
			//print_r($overviewfilesoptions);
			
			
			
			
			if ($course instanceof stdClass) {
				$course = new core_course_list_element($course);
			}
			$files = $course->get_course_overviewfiles();
			if(empty($files))
			{
				
				$context = context_user::instance($USER->id);
				$contextid = $context->id;
				$component = "user";
				$filearea = "draft";
				$itemid = 0;
				$filepath = "/";
				$filename = $fileinfo->getFilename();
				$fcnts = file_get_contents($pfname);
				$filecontent = base64_encode($fcnts);
				$contextlevel = null;
				$instanceid = null;

				echo "File name $fname \n";
				// Call the api to create a file.
				$fileinfo = core_files_external::upload($contextid, $component, $filearea, $itemid, $filepath,
						$filename, $filecontent, $contextlevel, $instanceid);
				$fileinfo = external_api::clean_returnvalue(core_files_external::upload_returns(), $fileinfo);
				// Get the created draft item id.
				$itemid = $fileinfo['itemid'];
				$ucourse->summaryformat = 1;
				$ucourse->overviewfiles_filemanager = $itemid;
				update_course($ucourse);
			}
			$course = null;
			$files = null;
			$ucourse = null;
		}
    }
}