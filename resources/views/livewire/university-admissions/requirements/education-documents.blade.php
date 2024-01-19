<div>
    <div>
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

        @for($l = 0 ; $l < count($other_application_requirements);$l++ )
            <div class="row justify-content-between mt-3">
                <div class="col-12 col-md-4">
                    <div class="form-floating w-100">
                        <select wire:model.defer="other_application_requirements.{{$l}}.application_requirement_id"
                                id="requirement_type_{{$l}}"
                                class="form-select input-field">
                            
                            <option value="">@lang('Required Documents Type')</option>
                           
                            @foreach($other_requirments_types->reject(function ($scale) use ($unselected_id, $l) {
                                return in_array($scale->id, $unselected_id) && array_key_exists($l, $unselected_id) && $scale->id != $unselected_id[$l];
                            }) as $scale)
                                <option value="{{$scale->id}}">{{$scale->title}}</option>
                            @endforeach
                        </select>
                        <label for="requirement_type_{{$l}}">@lang('Required Documents Type')</label>
                    </div>
                </div>
                <div class="col-md-2 mobile-marg-2 text-place-end">
                    @if($l == count($other_application_requirements)-1)
                        @if($l + 1 == count($other_application_requirements) && $showAdd == 'false')
                            <a href="javascript:void(0)" class="red"
                           wire:click="removeApplicationRequirement({{$l}})">- @lang('remove')</a>
                        @else
                        <a href="javascript:void(0)" class="light-blue"
                           wire:click="addApplicationRequirement">+ @lang('add new')</a>
                        @endif
                    @else
                        <a href="javascript:void(0)" class="red"
                           wire:click="removeApplicationRequirement({{$l}})">- @lang('remove')</a>
                    @endif
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="form-floating w-100">
                        <textarea wire:model.defer="other_application_requirements.{{$l}}.notes"
                                  class="form-control input-field"
                                  placeholder="@lang('Application Requirement Notes')"></textarea>
                        <label for="floatingInput">@lang('Application Requirement Notes')</label>
                    </div>
                </div>
            </div>
            <div class="w-100 px-5 mt-4">
                <hr>
            </div>
        @endfor

    </div>
    <div class="row mt-4">
        <div class="col-md-6 offset-6 d-flex justify-content-md-end">
            <button wire:click="save" class="button-blue button-sm mobile-button w-35">@lang('Save')</button>
            <button wire:click="initForm" class="button-red button-sm mobile-button w-35">@lang('Reset')</button>
        </div>
    </div>

    <x-general.loading
        wire:target="addApplicationRequirement,removeApplicationRequirement, save, initForm, delete, edit"
        message="Processing..."/>

         <script type="text/javascript">
         document.addEventListener('livewire:load', function () {
      Livewire.on('setOption', (data) =>{
           var total = data.count - 1;
           var val = @json($unselected_id);
           
           $.each(val, function(index, value) {
                $('#requirement_type_' + total + ' option[value="' + value + '"]').remove();
            });
       });
    });
    </script>
</div>

</div>
    </div>
    <div class="card bg-transparent mt-4">
   <div class="card-body">
      <div class="h4 blue"> @lang('Education Documents ')</div>
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
            @lang('Updated on') {{ \Carbon\Carbon::parse($other_application_requirements[0]['updated_at'])->format('D, M j, Y g:i A') }}
        
    </div>
    <div class="mobile-marg-2">@lang('By') {{ optional(Auth::user()->selected_university->createdBy)->name ?? 'By Dev Team Rep' }}</div>
</div>

      </div>
   </div>
</div>





