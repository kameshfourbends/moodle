<?php
define('CLI_SCRIPT', true);
require_once(dirname(__FILE__) . '/../../config.php');

global $CFG,$DB,$USER;

require_once($CFG->dirroot.'/course/lib.php');

$course = get_course('55');
print_r($course);
$context = context_course::instance($course->id);
$component = 'core';
$itemtype = 'course';
$result = core_tag_tag::get_tags_by_area_in_contexts($component, $itemtype, [$context]);

print_r($result);

foreach($result as $row)
{
	//$tagv = $row->get();
	echo $row->name."\n";
}