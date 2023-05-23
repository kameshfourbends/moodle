<?php
define('CLI_SCRIPT', true);
require_once(dirname(__FILE__) . '/../../config.php');

global $CFG,$DB;
require_once($CFG->dirroot . '/lib/csvlib.class.php');
require_once($CFG->libdir.'/clilib.php');



$data = new stdClass();
$data->name = 'aaa';
$data->description = 'aaa';
$data->idnumber = '';

//$category1 = core_course_category::create($data);
$filename = $CFG->dirroot . '/local/fbcourses/csv/categories.csv';
$fp = fopen($filename, 'r');
$tabdata = fread($fp, filesize($filename));
fclose($fp);
//echo $tabdata;
$iid = csv_import_reader::get_new_iid('tab');
$csvimport = new csv_import_reader($iid, 'tab');
$contentcount = $csvimport->load_csv_content($tabdata, 'utf-8', 'tab');
$csvimport->init();
$dataset = array();
$columns = $csvimport->get_columns();
$acolumns = explode(",", $columns[0]);

while ($record = $csvimport->next()) {
	//$dataset[] = $record;
	if(is_array($record))
	{
		$arecord = str_getcsv($record[0], ",");
		$crec = array_combine($acolumns, $arecord);
		$crec["descriptionformat"] = "1";
		$name = $crec["name"];
		
		if($crec["parent"]!="root")
		{
			$pcat = $DB->get_record('course_categories', array('name' => $crec["parent"]));
			if(empty($pcat))
			$crec["parent"] = "0";
			else
			$crec["parent"] = $pcat->id;
		}else{
			$crec["parent"] = "0";
		}
		
		$existing = $DB->get_record('course_categories', array('name' => $name));
		if(empty($existing))
		{
			$coursecat = core_course_category::create($crec);
			cache_helper::purge_by_event('changesincoursecat');
			print_r($coursecat->id);
		}else{
			$coursecat = core_course_category::get($existing->id, MUST_EXIST, true);
			$coursecat->update($crec);
			cache_helper::purge_by_event('changesincoursecat');
		}
		print_r($crec);
	}
}
$csvimport->cleanup();
$csvimport->close();
exit;
