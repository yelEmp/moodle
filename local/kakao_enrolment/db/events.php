<?php

$observers = array(

    array(
        'eventname'   => '\core\event\user_created',
        'callback'    => 'local_kakao_enrolment_observer::user_created',
    ),
);