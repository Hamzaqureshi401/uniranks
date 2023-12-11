
         <div class="h5 blue">Journal Logos</div>
         <div class="d-md-flex mt-3 justify-content-between align-items-center">
            <div class="col-md-6"><img src="https://1.daeux.com/UR/assets/img/UNIRANKS-full-logo.svg" class="card p-2 rounded-0" width="250px"></div>
            <div class="col-md-6  mobile-marg text-place-end"><button class="m-0 button-no-bg">@lang('+ Upload Rectangle Logo')</button></div>
         </div>
         <div class="d-md-flex mt-4 justify-content-between align-items-center">
            <div class="col-md-6 "><img src="https://1.daeux.com/UR/assets/img/UNIRANKS-full-logo.svg" class="card p-2 rounded-0" width="130px"></div>
            <div class="col-md-6 text-place-end mobile-marg"><button class="m-0 button-no-bg">@lang('+ Upload Square Logo')</button></div>
         </div>
         <div class="w-100 px-4 mt-4">
            <hr>
         </div>
        
         @for($i = 0; $i<$journalDetailInNewLang; $i++)
       @if($i > 0)
            <br>
           
      
<div class="card">
   <div class="card-body">

         <div class="language-div-3">
            <div class="mt-3 row">
               <div class="col-md-6 col-12">
                  <div class="form-floating w-100">
                     <select wire:model.defer="research.language-{{$i}}" class="form-select input-field" aria-label="">
                        <option>Language(English)</option>
                     </select>
                     <label for="floatingSelectGrid">@lang('Select Language')</label>
                  </div>
               </div>
               <div class="col-md-6 col-12 mobile-marg-2">
                  <div class="form-floating w-100">
                     <input wire:model.defer="research.Jol_title-{{$i}}" class="form-control input-field" placeholder="Journal Title Name">
                     <label for="floatingInput">@lang('Journal Title Name')</label>
                  </div>
               </div>
            </div>
            <div class="mt-3 row">
               <div class="col-12">
                  <div class="blue">@lang('Introduction about the Journal')</div>
                  <textarea wire:model.defer="research.Jol_intro-{{$i}}" name="content" class="form-control" ></textarea>
               </div>
            </div>
            <div class="mt-3 row">
               <div class="col-12">
                  <div class="blue">@lang('Aims and Scope of the Journal')</div>
                  <textarea wire:model.defer="research.Jol_aim_scope-{{$i}}" name="content" class="form-control" ></textarea>
               </div>
            </div>
         </div>
         </div>
</div>
 @endif
@endfor
 <div class="d-md-flex justify-content-end align-items-center mt-1">
            <div class="blue h5 col-md-4 col-12"></div>
            <div class="col-md-8 col-12 text-place-end mt-3 mb-3">
               <button class="m-0 button-no-bg w-90" wire:click="journalDetailInNewLang" type="button">
                  @lang('+ Add This Journal detail in another Language')
                  </button>
            </div>

         </div>
         <div class="w-100 px-4 mt-4">
            <hr>
         </div>
         <div class="h5 blue">@lang('Editorial Board')</div>
         <div class="row mt-4">
            <div class="col-md-6">
               <div class="form-floating w-100">
                  <input wire:model.defer="research.editor_first_name" class="form-control input-field" placeholder="Editor in Chief First &amp; Last Name">
                  <label for="floatingInput">@lang('Editor in Chief First &amp; Last Name')</label>
               </div>
            </div>
            <div class="col-md-6 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="research.editor_last_name" class="form-control input-field" placeholder="Editor in Chief First &amp; Last Name">
                  <label for="floatingInput">@lang('Editor in Chief First &amp; Last Name')</label>
               </div>
            </div>
         </div>
