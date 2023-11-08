<?php

namespace App\Http\Livewire\Pages\Components\Sidebar;

use Livewire\Component;

class RightSidebar extends Component
{
    public $routes;
    public function mount()
    {
        $this->routes = [
            'Student Leads' => [
                'sub-title'=>'Manage your leads',
                'links'=>[
                    'My Leads'=>'admin.leads.owned',
                    'Leads Repository'=>'admin.leads.repository',
                ]
            ],
            'Join' => [
                'sub-title'=>'Join School Events',
                'links'=>[
                    'School Fairs'=>'admin.schoolFairs.fair.list',
                    'Career Talks'=>'admin.schoolFairs.careerTalks.list',
                    'Sponsored Events'=>'admin.sponsored.list',
                    'Schools List'=>'admin.school.list',
                ]
            ],
            'Create' => [
                'sub-title'=>'Create events for schools',
                'links'=>[
                    'Workshops'=>'admin.events.workshops.list',
                    'Open Days'=>'admin.events.openDays.list',
                    'Competitions'=>'admin.events.competitions.list',
                    'Student for a Days'=>'admin.events.studentForADays.list',
                ]
            ],
        ];
    }

    public function render()
    {
        return view('livewire.pages.components.sidebar.right-sidebar');
    }
}
