<div>
    @php
        $links = [
            ['title'=>'Undergraduate','route'=>'admin.university.admissionRequirements.englishTest.undergraduate'],
            ['title'=>'Postgraduate','route'=>'admin.university.admissionRequirements.englishTest.postgraduate'],
            ['title'=>'PHD','route'=>'admin.university.admissionRequirements.englishTest.phd'],
            ]
    @endphp
    <x-general.university-admission-requirements-sub-tab :links="$links"/>
    <x-general.status-alert/>
    <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
    @php
        /**
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\Degree[] $degrees
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\Faculty[] $faculities
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\Major[] $majors
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\University\UniversityProgramFeeTerm[] $feeTerms
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\GradeScale[] $gradeScales
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\Test[] $tests
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\ApplicationRequirement[] $other_requirments_types
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\ApplicationRequirement[] $eudcation_requirments_types
          * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\ApplicationRequirement[] $travel_requirments_types
          */
    @endphp
    <div>
        @for($k=0; $k < count($testing_requirements); $k++)
            <div class="row mt-3">
                <div class="col-12 col-md-5">
                    <div class="form-floating w-100">
                        <select wire:model="testing_requirements.{{$k}}.test_id"
                                id="test_type_{{$k}}"
                                class="form-select input-field" wire:change="testTypeSelected({{$k}})">
                            <option value="">@lang('Acceptable Test Type')</option>
                            
                            @foreach($tests->reject(function ($scale) use ($unselected_id, $k) {
                                return in_array($scale->id, $unselected_id) && array_key_exists($k, $unselected_id) && $scale->id != $unselected_id[$k];
                            }) as $scale)
                                <option value="{{$scale->id}}">{{$scale->title}}</option>
                            @endforeach
                        </select>
                        <label for="test_type_{{$k}}">@lang('Acceptable Test Type')</label>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="form-floating w-100">
                        @php
                            $required_score = "";
                            if (!empty($testing_requirements[$k]['required_score'])){
                               $required_score =  '('.$testing_requirements[$k]['required_score'].')';
                            }
                        @endphp
                        <input
                            wire:model.defer="testing_requirements.{{$k}}.required_grades"
                            class="form-control input-field"
                            placeholder="@lang('Required Grades') {{$required_score}}">
                        <label for="floatingInput">@lang('Required Grades') {{$required_score}}</label>
                    </div>
                </div>
                <div class="col-md-2 mobile-marg-2 text-place-end">
                    @if($k == count($testing_requirements)-1)
                        @if($k + 1 == count($testing_requirements) && $showAdd == 'false')
                         <a href="javascript:void(0)" class="red"
                           wire:click="rfJi5GN23kBTCA6KLrWVND2B7BRERd9uE({{$k}})">- @lang('remove')</a>
                        @else
                         <a href="javascript:void(0)" class="light-blue"
                           wire:click="addTestingRequirement">+ @lang('add new')</a>
                        @endif
                    @else
                        <a href="javascript:void(0)" class="red"
                           wire:click="removeTestingRequirement({{$k}})">- @lang('remove')</a>
                    @endif
                </div>
            </div>
            @php
                $score_types = $testing_requirements[$k]['sub_scores'] ?? [];
            @endphp
            @if(!empty($score_types))
                <div class="row mt-3">
{{--                    <div class="col-md">--}}
{{--                        @lang('Required grades in:')--}}
{{--                    </div>--}}
                    @foreach($score_types as $sub_key => $type)
                        <div class="col-md ">
                            <div class="form-floating w-100">
                                @php
                                    $required_score = $type['title'].'('.$type['required_score'].')';
                                @endphp
                                <input
                                    wire:model.defer="testing_requirements.{{$k}}.sub_scores.{{$sub_key}}.required_grades"
                                    class="form-control input-field"
                                    placeholder="{{$required_score}}">
                                <label
                                    for="floatingInput">{{$required_score}}</label>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-2">&nbsp;</div>
                </div>
            @endif
            <div class="w-100 px-5 mt-4">
                <hr>
            </div>
        @endfor
        <div class="row mt-4">
            <div class="col-md-6 offset-6 d-flex justify-content-md-end">
                <button wire:click="save" class="button-blue button-sm mobile-button w-35">@lang('Save')</button>
                <button wire:click="initForm" class="button-red button-sm mobile-button w-35">@lang('Reset')</button>
            </div>
        </div>
        <x-general.loading
            wire:target="testTypeSelected,addDetailsInOtherLanguage ,loadPrograms, save, initForm, delete, edit"
            message="Processing..."/>
             <script type="text/javascript">
         document.addEventListener('livewire:load', function () {
      Livewire.on('setOption', (data) =>{
           var total = data.count - 1;
           var val = @json($unselected_id);
           
           $.each(val, function(index, value) {
                $('#test_type_' + total + ' option[value="' + value + '"]').remove();
            });
       });
    });
    </script>
    </div>

</div>

</div>
    </div>
    <div class="card bg-transparent mt-4">
   <div class="card-body">
      <div class="h4 blue"> @lang('English Test ')</div>
      <div class="w-100 px-4 mt-3">
         <hr>
      </div>
      <div>
         <table class="table table-responsive">
         <thead>
         </thead>
         <tbody>
        
            
         </tbody>
     </table>
      <div class="d-md-flex col-md-6 h6 blue justify-content-between">
    <div class="box-bottom-note">
            @lang('Updated on') {{ \Carbon\Carbon::parse($record['updated_at'])->format('D, M j, Y g:i A') }}
        
    </div>
    <div class="mobile-marg-2">@lang('By') {{ optional(Auth::user()->selected_university->createdBy)->name ?? 'By Dev Team Rep' }}</div>
</div>

      </div>
   </div>
</div>




