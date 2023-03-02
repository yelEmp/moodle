<?php

defined('MOODLE_INTERNAL') || die();

class local_kakao_enrolment_observer
{
    function user_created(\core\event\user_created $user){
        global $DB;
        if($role = $DB->get_record("role", ['shortname' => 'coursecreator'])
            and !strcmp($DB->get_record("user_info_data", ['userid' => $user->objectid, 'fieldid' =>
                $DB->get_record("user_info_field", ['shortname' => get_string('kakao_role_shortname', 'local_kakao_enrolment')])->id])->data,get_string('teacher_role', 'local_kakao_enrolment'))) {

            $role_assignment = new stdClass();
            $role_assignment->roleid = $role->id;
            $role_assignment->contextid = 1;
            $role_assignment->userid = $user->objectid;
            $role_assignment->itemid = 0;
            $role_assignment->sortorder = 0;

            $DB->insert_record("role_assignments", $role_assignment);
        }
        return true;
    }

}