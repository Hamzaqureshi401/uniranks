<?php

namespace App\Helpers;

use App\Helpers\Interfaces\CacheKeys;
use App\Helpers\Interfaces\CounselorEventTypes;
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
use App\Helpers\Interfaces\UniversityEventTypes;
use App\Helpers\Interfaces\UniversityStatus;
use App\Helpers\Interfaces\UserAccountStatus;
use App\Helpers\Interfaces\PointTypes;

class AppConstants implements Paths, Time, EmployerTypes, CacheKeys, Roles, Status, RequestTypes,
    UserAccountStatus, UniversityStatus, PushSections,EventTypes, PointTypes,StudyLevels, InviteeTypes,
    CounselorEventTypes, UniversityEventTypes
{

    const COUNTRY_JORDAN = 117;
    const COUNTRY_UAE = 122;

    const COUNTRY_REQUIRED_EXTRA_DATA = [self::COUNTRY_JORDAN];
    const CURRENCY_USD  = 1;
    const CURRICULUM_BRITISH = 2;

    const CURRICULUMS = ["American", "British", "Canadian", "CBSE", 'National', "Russian", "SABIS", "UK/BTEC", "UK/IB", "US/IB"];

    const FEE_RANGES = [
        'ae' => ["Free", "> 20,000 AED", "21,000 - 30,000 AED", "31,000 - 45,000 AED", "46,000 - 60,000 AED",
            "61,000 - 75,000 AED", "> 75,000 AED"],
        'jo' => ["Free","> 1,000 JD","1,000 - 3,000 JD","3,000 - 5,000 JD",
            "5,000 - 10,000 JD","> 10,000 JD"],
        'tr' => ["Free","20.000 TL <","20,000 - 40,000 TL","40,000-60,000 TL",
            "60,000-80,000 TL","80,000-100,000 TL","> 100,000 TL >"],
    ];
}
