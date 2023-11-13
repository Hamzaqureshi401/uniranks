<div class="row-h">
   <div class="col-12">
      <div class="card">
         <div class="card-body">
            <div class="row">
               <div class="col-md-3">
                  <div class="form-floating">
                     <select class="form-select input-field" aria-label="">
                        <option>Select Country</option>
                     </select>
                     <label for="floatingSelectGrid">Select Country</label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-floating">
                     <select class="form-select input-field" aria-label="">
                        <option>Select City</option>
                     </select>
                     <label for="floatingSelectGrid">Select City</label>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-floating">
                     <input class="form-control input-field" id="floatingInput" placeholder="branch a name or just University Name">
                     <label for="floatingInput">branch a name or just University Name</label>
                  </div>
               </div>
            </div>
            <div class="row  mt-3">
               <div class="col-md-12">
                  <div class="form-floating">
                     <input class="form-control input-field" id="floatingInput" placeholder="University Address as Text">
                     <label for="floatingInput">University Address as Text</label>
                  </div>
               </div>
            </div>
            <div class="row  mt-3">
               <div class="col-md-12">
                  <div class="form-floating">
                     <input class="form-control input-field" id="floatingInput" placeholder="University Address as Google Map Link">
                     <label for="floatingInput">University Address as Google Map Link</label>
                  </div>
               </div>
            </div>
            <div class="row mt-3 mb-3">
               <div class="col-md-5 d-flex align-items-center">
                  <input type="checkbox" class=" mt-0 form-check-input"> <span class="blue ms-2">This is the Main Branch</span>
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
                  <select class="form-select input-field" aria-label="">
                     <option>Language(English)</option>
                  </select>
                  <label for="floatingSelectGrid">Select Language</label>
               </div>
            </div>
            <div class="mt-3">
               <div class="form-floating w-100">
                  <input class="form-control input-field" placeholder="branch name or just University Name in Arabic Language">
                  <label for="floatingInput">branch name or just University Name in Arabic Language</label>
               </div>
            </div>
            <div class="mt-3">
               <div class="form-floating w-100">
                  <input class="form-control input-field" placeholder="University Addresses as text in Arabic Language">
                  <label for="floatingInput">University Addresses as text in Arabic Language</label>
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