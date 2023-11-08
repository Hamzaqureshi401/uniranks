<?php

namespace App\Http\Livewire\UniversityFacilities\Components;

use App\Models\General\Language;
use App\Models\University\Facility\UniversityFacilityTransportation;
use App\Models\University\Facility\UniversityTransportStop;
use App\Models\University\Facility\UniversityTransportStopTime;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class AddTransportStops extends Component
{
    public UniversityFacilityTransportation $transport;
    public $names = [];
    public $translations;
    public ?UniversityTransportStop $stop;
    /**
    * @var  \Illuminate\Database\Eloquent\Collection<\App\Models\General\Language> $languages
     */
    public $languages;
    public $times = [];
    public $laguage_names;
    public $update_details;

    protected $listeners = ["transport-updated"=>'loadTranslations','editStop'=>'edit'];

    public function mount()
    {
        $this->initForm();
    }

    public function initForm()
    {
        $this->loadTranslations();
        $this->names = [];
        $this->times = [];
        $this->add_stop();
    }

    public function loadTranslations(){
        $translations = $this->transport->getTranslations();
        $this->translations = array_keys($translations['translated_name']);
        $this->loadLanguagesNames();

    }
    public function loadLanguagesNames(){
        $this->language_names = $this->languages->whereIn('code',$this->translations)->pluck('name','code')->toArray();
    }

    public function add_stop()
    {
        $this->times[] = ['time' => ''];
        $this->loadTimePicker();
    }

    public function loadTimePicker(){
        $this->dispatchBrowserEvent('add-picker');
    }

    protected function rules()
    {
        return [
            'names' => ['array', 'required', 'min:1'],
            'times' => ['array', 'required', 'min:1'],
            'times.*.time' => ['required'],
        ];
    }

    public function save()
    {
        $this->validate();
        $data = ['university_transport_id'=>$this->transport?->id,'title' => $this->names[0], 'translated_name' => [],'created_by' => \Auth::id()];
        foreach ($this->translations as $key => $lang) {
            if (empty($this->names[$key])) continue;
            $data['translated_name'][$lang] = $this->names[$key];
        }
        if (empty($this->stop)){
            $stop = UniversityTransportStop::create($data);
        }
        else{
            $this->stop->update($data);
            $stop = $this->stop;
            $update_times =  array_filter($this->times,fn($item)=>!empty($item['id']));
            foreach ($update_times ?? [] as $item){
                UniversityTransportStopTime::whereId($item['id'])->update(['time'=>$item['time']]);
            }
        }
        $times  = array_filter($this->times,fn($item)=>empty($item['id']));
        $stop->times()->createMany($times);

        $this->stop = null;
        $this->initForm();
        session()->flash('status', 'Operation Successful!');
        $this->emit('stopUpdated');
    }

    public function edit(UniversityTransportStop $stop)
    {
        $this->stop = $stop;
        $this->stop->load('times');
        $this->names = array_values($this->stop->getTranslations('translated_name'));
        $this->times = $this->stop->times()->get(['id','time'])->toArray();
        $this->loadTimePicker();
    }

    public function render()
    {
        return view('livewire.university-facilities.components.add-transport-stops');
    }
}
