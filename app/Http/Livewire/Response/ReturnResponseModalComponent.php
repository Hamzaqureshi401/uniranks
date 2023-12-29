<?php

namespace App\Http\Livewire\Response;

use Livewire\Component;

class ReturnResponseModalComponent extends Component
{
    public $returnResponseModal = false;
    public $title;
    public $message;
    public $btn;
    public $link;
    public $viewTitle;

    protected $listeners = ['returnResponseModal'];

    public function returnResponseModal($data)
    {
        $this->returnResponseModal = true;
        $this->title = $data['title'] ?? '';
        $this->message = $data['message'] ?? '';
        $this->btn = $data['btn'] ?? '';
        $this->link = $data['link'] ?? '';
        $this->viewTitle = $data['viewTitle'] ?? '';
    }

    public function closeModal()
    {
        $this->returnResponseModal = false;
    }

    public function render()
    {
        return view('livewire.response.return-response-modal-component');
    }
}
