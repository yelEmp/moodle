<?php

function xmldb_local_kakao_enrolment_install()
{

    global $DB;

    if ($DB->record_exists("user_info_field", ['shortname' => get_string("kakao_role_shortname", "local_kakao_enrolment")])) {
        $DB->delete_records("user_info_field", ['shortname' => get_string("kakao_role_shortname", "local_kakao_enrolment")]);
    }

    if(!$DB->record_exists("user_info_category", ['name' => 'Kakao'])) {
        $category = new stdClass();
        $category->name = 'Kakao';
        $category->sortorder = 1;
        $DB->insert_record("user_info_category", $category);
    }

    $user_info_field = new stdClass();
    $user_info_field->name = get_string("kakao_role_name", "local_kakao_enrolment");
    $user_info_field->shortname = get_string("kakao_role_shortname", "local_kakao_enrolment");
    $student_role = get_string("student_role", "local_kakao_enrolment");
    $teacher_role = get_string("teacher_role", "local_kakao_enrolment");
    $user_info_field->datatype = 'menu';
    $user_info_field->descriptionformat = 1;
    $user_info_field->categoryid = $DB->get_record("user_info_category", ['name' => 'Kakao'])->id;
    $user_info_field->sortorder = 1;
    $user_info_field->required = 1;
    $user_info_field->locked = 0;
    $user_info_field->visible = 2;
    $user_info_field->forceunique = 0;
    $user_info_field->signup = 1;
    $user_info_field->defaultdata = $student_role;
    $user_info_field->defaultdataformat = 0;

    $user_info_field->param1 = "$student_role\n$teacher_role";
    $DB->insert_record("user_info_field", $user_info_field);

}






