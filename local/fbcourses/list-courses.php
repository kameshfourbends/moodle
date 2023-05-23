<?php
define('CLI_SCRIPT', true);
require_once(dirname(__FILE__) . '/../../config.php');

global $CFG,$DB,$USER;

require_once($CFG->dirroot.'/course/lib.php');

class Example 
{
	
	public function recently_added_courses()
	{
		global $CFG,$DB,$OUTPUT;
        $categories = array();
        $results = $DB->get_records('course_categories', array('parent'  => '0', 'visible' => '1', 'depth' => '1'));
        $clist = array();
		$crslist = array();
		$all_courses = array();
		
		if (!empty($results)) {
            foreach ($results as $value) {
                $categories[$value->id] = $value->name;
				$catcourses = $this->get_fb_radcbox($value->id);
				if(!empty($catcourses))
				{
					$clist[] = array("id" => $value->id, 
					"name" => $value->name,
					"catcourses" => $catcourses
					);
					$all_courses = array_merge($all_courses, $catcourses);
				}
            }
        }
		
		$rad_ctxt = array(
			'output' => $OUTPUT,
			'clist' => $clist,
			'all_courses' => $all_courses
		);
		
		print_r($rad_ctxt);
		
	}
	
	private function get_fb_radcbox($cat_id)
	{
		global $CFG;
		$allcourses = core_course_category::get($cat_id)->get_courses(
            array('recursive' => true, 'coursecontacts' => true, 'sort' => array('id' => 1)));

		$acourses = array();

		foreach($allcourses as $onecourse){
			$courseid = $onecourse->id;
			$uparams = array("id" => $courseid);
			$course_url = new moodle_url($CFG->wwwroot.'/course/viw.php', $uparams);
			$surl = $course_url->out();
			$overviewfiles = $onecourse->get_course_overviewfiles();
			$img_url = $this->course_img_url($overviewfiles);
			$rcourse = array(
				"name" => $onecourse->fullname,
				"course_url" => $surl,
				"img_url" => $img_url
			);
			$acourses[] = $rcourse;
		}
		return $acourses;

	}
	
	private function course_img_url($overviewfiles)
	{
		global $CFG, $OUTPUT;
		$noimgurl = $OUTPUT->image_url('no-image', 'theme');
		$imgurl = '';
		foreach ($overviewfiles as $file) {
			$isimage = $file->is_valid_image();
			$imgurl = file_encode_url("$CFG->wwwroot/pluginfile.php",
			'/'. $file->get_contextid(). '/'. $file->get_component(). '/'.
			$file->get_filearea(). $file->get_filepath(). $file->get_filename(), !$isimage);
			if (!$isimage) {
				$imgurl = $noimgurl;
			}
		}
		if (empty($imgurl)) {
			$imgurl = $noimgurl;
		}
		
		return $imgurl;
		
	}
	
}


$ex = new Example();
$ex->recently_added_courses();


/* $allcourses = core_course_category::get(4)->get_courses(
            array('recursive' => true, 'coursecontacts' => true, 'sort' => array('id' => 1)));

foreach ($allcourses as $onecourse) {
	print_r($onecourse);
	print_r($onecourse->get_course_contacts());
	print_r($onecourse->get_course_overviewfiles());
} */
			
//print_r($allcourses);			