<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'report_coursestats', language 'en'
 *
 * @package   	report
 * @subpackage 	fbnotifier_stats
 * @copyright 	2018 Paulo Jr.
 * @license   	http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(dirname(__FILE__).'/../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require(__DIR__. '/constants.php');

admin_externalpage_setup('reportfbnotifier_stats', '', null, '', array('pagelayout'=>'report'));

echo $OUTPUT->header();

$info_field = $DB->get_record(USER_INFO_FIELD_TABLE_NAME, array ('shortname'=>'usageconditions'));
$amount_of_users = $DB->count_records(USER_INFO_DATA_TABLE_NAME, array ('fieldid'=>$info_field->id));
$amount_of_chatbot_users = $DB->count_records(USER_INFO_DATA_TABLE_NAME, array ('fieldid'=>$info_field->id, 'data'=>'1'));

echo '<p>' . get_string('lb_amount_of_users', 'report_fbnotifier_stats') . ': '. $amount_of_users . '</p>';
echo '<p>' . get_string('lb_amount_of_chatbotusers', 'report_fbnotifier_stats') . ': '. $amount_of_chatbot_users . '</p>';

echo $OUTPUT->footer();
