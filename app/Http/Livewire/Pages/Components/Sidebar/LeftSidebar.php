<?php

namespace App\Http\Livewire\Pages\Components\Sidebar;

use Livewire\Component;
 
class LeftSidebar extends Component
{
    public $routes;
    public function mount()
    {
        $this->routes = [
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
                'sub-title'=>'Manage University admissions',
                'links'=>[
                    'Semesters'=>'admin.university.semesters',
                    'Admissions Semesters & Admission Sessions'=>'admin.university.admissionsSemestersAdmissionSessions',
                    'Sessions'=>'admin.university.sessions',
                    'Programs'=>'admin.university.programs',
                    'Fee Structure'=>'admin.university.feeStructure',
                    'Admission Requirements'=>'admin.university.admissionRequirements.show',
                    'Accreditation Agencies'=>'admin.university.accreditationAgencies',
//                    'Financial Aid'=>'admin.university.financialAid',
                    'Scholarships'=>'admin.university.scholarships',
//                    'Accreditation Requirements'=>'admin.university.accreditationAgencies',

                    // 'Degrees'=>'admin.university.degrees',
                    // 'Faculties'=>'admin.university.faculties',
                ]
            ],
            'User Profile' => [
                'sub-title'=>'Manage Account detail',
                'links'=>[
                    'Profile'=>'admin.user.profile',
                    'Emails'=>'admin.user.emails',
                    'Phone Number'=>'admin.user.phoneNumber',
                    'Password'=>'admin.user.password',
                    'Active Sessions'=>'admin.user.sessions',
                ]
            ],
        ];
    }

    public function render()
    {
        return view('livewire.pages.components.sidebar.left-sidebar');
    }
}
