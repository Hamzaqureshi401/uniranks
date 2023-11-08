<?php

namespace App\Helpers;

use App\Helpers\Interfaces\CacheKeys;
use App\Helpers\Interfaces\EmployerTypes;
use App\Helpers\Interfaces\EventTypes;
use App\Helpers\Interfaces\InviteeTypes;
use App\Helpers\Interfaces\Paths;
use App\Helpers\Interfaces\PushSections;
use App\Helpers\Interfaces\RequestTypes;
use App\Helpers\Interfaces\StudyLevels;
use App\Helpers\Interfaces\Time;
use App\Helpers\Interfaces\Roles;
use App\Helpers\Interfaces\Status;
use App\Helpers\Interfaces\UniversityStatus;
use App\Helpers\Interfaces\UserAccountStatus;
use App\Helpers\Interfaces\PointTypes;
use App\Helpers\Interfaces\UniversityEventTypes;

class AppConstants implements Paths, Time, EmployerTypes, CacheKeys, Roles, Status, RequestTypes,
    UserAccountStatus, UniversityStatus, PushSections,EventTypes, PointTypes,StudyLevels,InviteeTypes,UniversityEventTypes
{
    const CURRENCY_USD  = 1;
    const CURRICULUM_BRITISH = 2;

    const PM_BANK = 1;
    const PM_STRIPE = 2;
    const UNDER_REVIEW = 3;

    const APPLICATION_TYPE_EDUCATION = 1;
    const APPLICATION_TYPE_TRAVEL = 2;
    const APPLICATION_TYPE_HEALTH = 3;
    const APPLICATION_TYPE_FINANCE = 4;
    const APPLICATION_TYPE_EXTRACURRICULAR = 5;
    const APPLICATION_TYPE_RECOMMENDATION = 6;


    const PHD_DEGREE = 1;
    const POSTGRADUATE_DEGREE = 2;
    const UNDERGRADUATE_DEGREE = 3;
    const DIPLOMA_DEGREE = 4;
    const SHORT_COURSE_DEGREE = 5;
    const ONLINE_COURSE_DEGREE = 6;
    const HIGHER_SECONDARY_DEGREE = 7;

    const ENGLISH_TEST = 1;
    const ENTRY_TEST = 2;

}
