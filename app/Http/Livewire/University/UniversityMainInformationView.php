<?php

namespace App\Http\Livewire\University;

use Livewire\Component;

class UniversityMainInformationView extends Component
{
    public $routes;

    public function render()
    {
        return view('livewire.university.university-main-information-view');
    }

    public function mount(){

        $this->routes  = [
            // 'University'=>[
                'Information' => [
                    'sub-title'=>'Manage university detail',
                    'links'=>[
                        // 'Dashboard'=>'admin.dashboard',
                        'Main Information'=>'admin.university.mainInfo',
                        'Set Logos'=>'admin.university.setLogo',
                        'Domains'=>'admin.university.domains',
                        'Quick View'=>'admin.university.quickView',
                        'About'=>'admin.university.about',
                        'Front Banners'=>'admin.university.frontBanners',
                        'Front Videos'=>'admin.university.frontVideos',
                        'Social Media Links'=>'admin.university.socialMedia',
                        'Galleries'=>'admin.media.show',
                        
                        'Location and Branches' => 'admin.university.location-and-branches',
                    
                    
                    ],
                    'icon'=>'building-columns-solid.svg'
                ],
                
            // ],
        ];

        //dd($this->routes['Information']['links']);
    }
}
