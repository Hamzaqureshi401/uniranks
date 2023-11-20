@for($i = 0; $i<$addNewSubject; $i++)
@if($i > 0)
<br>
@endif
<div class="card">
   <div class="card-body">
      <div class="h5 blue">@lang('Journal Subjects Area')</div>
      <div class="row mt-3">
         <div class="col-md-6">
            <div class="form-floating w-100">
               <select wire:model.defer="research.main_subject_area-{{$i}}" class="form-select input-field" aria-label="">
                  <option>Main Subjects Area</option>
               </select>
               <label for="floatingSelectGrid">@lang('Main Subjects Area')</label>
            </div>
         </div>
         <div class="col-md-6 mobile-marg-2">
            <div class="form-floating w-100">
               <select wire:model.defer="research.sub_subject_area-{{$i}}" class="form-select input-field" aria-label="">
                  <option>Sub Subjects Area</option>
               </select>
               <label for="floatingSelectGrid">@lang('Sub Subjects Area')</label>
            </div>
         </div>
      </div>
   </div>
</div>
@endfor
<div class="d-md-flex justify-content-end align-items-end mt-1">
   <div class="col-md-4 col-12 text-place-end mt-3 mb-4">
      <button class="m-0 button-no-bg w-90" wire:click="addNewSubject" type="button">
      @lang('+ Add New Subject')
      </button>
   </div>
</div>
<div class="w-100 px-4">
   <hr>
</div>