<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
 
class PageNavigation extends Component
{
    public function render()
    {
        $routes  = [
            'University'=>[
                'Main Information' => [
                    'sub-title'=>'Manage university detail',
                    'links'=>[
                        'Main Information'=>'admin.university.mainInfo',
                        'Set Logos'=>'admin.university.setLogo',
                        'Domains'=>'admin.university.domains',
                        'Quick View'=>'admin.university.quickView',
                        'About'=>'admin.university.about',
                        'Front Banners'=>'admin.university.frontBanners',
                        'Front Videos'=>'admin.university.frontVideos',
                        'Social Media Links'=>'admin.university.socialMedia',
                        'Galleries'=>'admin.media.show',
                        'Academics'=>'admin.university.academics',
                        'University Conference' => 'admin.university.university-conferences',
                        'Research Output Data' => 'admin.university.research-output-data',
                        'Confirm 1 to 1 Meeting' => 'admin.university.confirm-one-to-one-meeting',
                        'Location and Branches' => 'admin.university.location-and-branches',
                    
                    
                    ]
                ],
                'University Facilities' => [
                    'sub-title'=>'Manage University Facilities',
                    'links'=>[
                        'Buildings'=>'admin.university.mainBuilding',
                        'Labs'=>'admin.university.labs',
                        'housing'=>'admin.university.housing',
                        'Athletics'=>'admin.university.sports',
                        'Transportation'=>'admin.university.transport',
                        'Student Life'=>'admin.university.studentLife',
                        'Student Support'=>'admin.university.studentSupport',
                    ]
                ],
                'University Admissions' => [
                    'sub-title'=>'Manage University Admissions',
                    'links'=>[
                        'Admission Requirements'=>'admin.university.admissionRequirements.show',
                        'Semesters'=>'admin.university.semesters',
                        'Admission Semesters & Admission Sessions'=>'admin.university.admissionsSemestersAdmissionSessions',
                        'Sessions'=>'admin.university.sessions',
                        'Programs'=>'admin.university.programs',
                        'Fee Structure'=>'admin.university.feeStructure',
                        'Accreditation Agencies'=>'admin.university.accreditationAgencies',

//                        'Degrees'=>'admin.university.degrees',
//                        'Faculties'=>'admin.university.faculties',
//                        'Financial Aid'=>'admin.university.financialAid',
                        'Scholarships'=>'admin.university.scholarships',
                    ]
                ],
            ],
            'Create'=>[
                'University Events' => [
                    'sub-title'=>'Create events for schools',
                    'links'=>[
                        'Workshops'=>'admin.events.workshops.list',
                        'Open Days'=>'admin.events.openDays.list',
                        'Competitions'=>'admin.events.competitions.list',
                        'Student for a Days'=>'admin.events.studentForADays.list',
                    ]
                ]
            ],
            'Leads'=>[
                'Student Leads' => [
                    'sub-title'=>'Manage your leads',
                    'links'=>[
                        'My Leads'=>'admin.leads.owned',
                        'Leads Repository'=>'admin.leads.repository',
                    ]
                ]
            ],
            'Schools' => [
                'Schools'=>[
                    'sub-title'=>'Join School Events',
                    'links'=>[
                        'School Fairs'=>'admin.schoolFairs.fair.list',
                        'Career Talks'=>'admin.schoolFairs.careerTalks.list',
                        'Sponsored Events'=>'admin.sponsored.list',
                        'Schools List'=>'admin.school.list',
                        'School Request Presentation'=>'admin.schools.presentation',
                        // 'One to One Meeting'=>'admin.schools.one-to-one-meeting-request',
                        // 'View One to One Meeting'=>'admin.schools.view-one-to-one-meeting-request',
                    ]
                ]
            ],
            'Account TopUp' => [
                'Top Up'=>[
                    'sub-title'=>'Top Up Your Account',
                    'links'=>[
                        'Account Top Up'=>'admin.account.topUp',
                        'Event Packages'=>'admin.account.eventPackages',
                    ]
                ],
                'Transactions'=>[
                    'sub-title'=>'Transaction and Invoices',
                    'links'=>[
                        'Invoices'=>'admin.account.invoicesList',
                        'Event Credits'=>'admin.account.eventCredits',
                        'Repository Credits'=>'admin.account.repositoryTransactions',
                    ]
                ]
            ],
        ];
        return view('livewire.pages.page-navigation',compact('routes'));
    }
}
