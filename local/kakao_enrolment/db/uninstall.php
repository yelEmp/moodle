<?php

function xmldb_local_kakao_enrolment_uninstall()
{
    global $DB;

    if ($DB->record_exists("user_info_field", ['shortname' => get_string("kakao_role_shortname", "local_kakao_enrolment")])) {
        $DB->delete_records("user_info_field", ['shortname' => get_string("kakao_role_shortname", "local_kakao_enrolment")]);
    }
    if  ($DB->record_exists("user_info_category", ['name' => 'Kakao'])) {
        $DB->delete_records("user_info_category", ['name' => 'Kakao']);
    }
}