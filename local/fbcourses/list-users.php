<?php
define('CLI_SCRIPT', true);
require_once(dirname(__FILE__) . '/../../config.php');

global $CFG,$DB,$USER;

require_once($CFG->dirroot.'/user/lib.php');

$users = get_users();

print_r($users);