<div class="row-h">
   <div class="col-12">
      <div class="card">
         <div class="card-body">
            <div class="row">
               <div class="col-md-3">
                  <div class="form-floating">
                     <select wire:model.defer="lc_b.country" class="form-select input-field" aria-label="">
                        <option>Select Country</option>
                     </select>
                     <label for="floatingSelectGrid">@lan('Select Country')</label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-floating">
                     <select wire:model.defer="lc_b.city" class="form-select input-field" aria-label="">
                        <option>Select City</option>
                     </select>
                     <label for="floatingSelectGrid">@lan('Select City')</label>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-floating">
                     <input wire:model.defer="lc_b.br_un_name" class="form-control input-field" placeholder="branch a name or just University Name">
                     <label for="floatingInput">@lang('branch a name or just University Name')</label>
                  </div>
               </div>
            </div>
            <div class="row  mt-3">
               <div class="col-md-12">
                  <div class="form-floating">
                     <input wire:model.defer="lc_b.un_address" class="form-control input-field" placeholder="University Address as Text">
                     <label for="floatingInput">@lang('University Address as Text')</label>
                  </div>
               </div>
            </div>
            <div class="row  mt-3">
               <div class="col-md-12">
                  <div class="form-floating">
                     <input wire:model.defer="lc_b.un_google_link" class="form-control input-field" placeholder="University Address as Google Map Link">
                     <label for="floatingInput">@lang('University Address as Google Map Link')</label>
                  </div>
               </div>
            </div>
            <div class="row mt-3 mb-3">
               <div class="col-md-5 d-flex align-items-center">
                  <input wire:model.defer="lc_b.main_branch" type="checkbox" class=" mt-0 form-check-input"> <span class="blue ms-2">This is the Main Branch</span>
               </div>
            </div>
            <div class="row mb-3">
               <div class="col-12 text-place-end mt-4 mb-4">
                  <button class="m-0 button-no-bg" wire:click="addDetailsInOtherLanguage" type="button">
                  @lang('+ Add University Location in another language')
                  </button>
               </div>
            </div>
               @for($i = 0; $i<$details_in_langs; $i++)
                @if($i > 0)
            <br>
            @endif
               <div class="card">
                  <div class="card-body">
                     
                  
             <div class="language-div-1">
            <div class="col-md-5">
               <div class="form-floating w-100">
                  <select wire:model.defer="lc_b.language" class="form-select input-field" aria-label="">
                     <option>Language(English)</option>
                  </select>
                  <label for="floatingSelectGrid">@lan('Select Language')</label>
               </div>
            </div>
            <div class="mt-3">
               <div class="form-floating w-100">
                  <input wire:model.defer="lc_b.br_un_other_lang" class="form-control input-field" placeholder="branch name or just University Name in Arabic Language">
                  <label for="floatingInput">@lang('branch name or just University Name in Arabic Language')</label>
               </div>
            </div>
            <div class="mt-3">
               <div class="form-floating w-100">
                  <input wire:model.defer="lc_b.un_address_other_lang" class="form-control input-field" placeholder="University Addresses as text in Arabic Language">
                  <label for="floatingInput">@lang('University Addresses as text in Arabic Language')</label>
               </div>
            </div>
         </div>
         </div>
               </div>
         @endfor


         </div>
      </div>
   </div>
</div>