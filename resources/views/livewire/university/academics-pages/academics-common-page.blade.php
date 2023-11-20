      <form>
         <div class="blue h5">Add Academics</div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="academics.academic_name_eng" class="form-control input-field" placeholder="Full Academic Name in English">
                  <label for="floatingInput">@lang('Full Academic Name in English')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="academics.email" class="form-control input-field" placeholder="Academic Email">
                  <label for="floatingInput">@lang('Academic Email')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="row">
                  <div class="col-6">
                     <div class="form-floating w-100">
                        <select wire:model.defer="academics.title" class="form-select input-field" id="floatingSelectGrid" aria-label="">
                             <!-- <option value="">@lang('Distance Learning Information')</option> -->
                                @foreach($researchFields as $key => $value)
                                    <option value="{{$value->id}}" >{{$value->title}}</option>
                                @endforeach
                          <!--  <option>Title</option>
                           <option>Prof</option>
                           <option>Mr</option>
                           <option>Mrs</option> -->
                        </select>
                        <label for="floatingSelectGrid">@lang('Title')</label>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-floating w-100">
                        <select wire:model.defer="academics.position" class="form-select input-field" id="floatingSelectGrid" aria-label="">
                           <option>Position</option>
                        </select>
                        <label for="floatingSelectGrid">@lang('Position')</label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <select wire:model.defer="academics.school" class="form-select input-field" id="floatingSelectGrid" aria-label="">
                     <option>Select School</option>
                     @foreach($schools as $key => $value)
                                    <option value="{{$value->id}}" >{{$value->school_name}}</option>
                                @endforeach
                  </select>
                  <label for="floatingSelectGrid">@lang('Select School')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <select wire:model.defer="academics.college" class="form-select input-field" id="floatingSelectGrid" aria-label="">
                     <option>Select College</option>
                  </select>
                  <label for="floatingSelectGrid">@lang('Select College')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <select wire:model.defer="academics.department" class="form-select input-field" id="floatingSelectGrid" aria-label="">
                     <option>Select Department</option>
                  </select>
                  <label for="floatingSelectGrid">@lang('Select Department')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="academics.p_p_web_url" class="form-control input-field" placeholder="Academic Profile Page, Website, or URL">
                  <label for="floatingInput">@lang('Academic Profile Page, Website, or URL')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="academics.orcid" class="form-control input-field" placeholder="ORCID ID">
                  <label for="floatingInput">@lang('ORCID ID')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="academics.web_of_sc_id" class="form-control input-field" id="floatingInput" placeholder="Web of Science ResearchID">
                  <label for="floatingInput">@lang('Web of Science Research ID')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="academics.scopus_author_id" class="form-control input-field" id="floatingInput" placeholder="Scopus Author ID">
                  <label for="floatingInput">@lang('Scopus Author ID')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="academics.research_gate_link" class="form-control input-field" id="floatingInput" placeholder="Researchgate Link">
                  <label for="floatingInput">@lang('Research gate Link')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="academics.google_scholar_link" class="form-control input-field" id="floatingInput" placeholder="Google Scholar Link">
                  <label for="floatingInput">@lang('Google Scholar Link')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="academics.linkedin_url" class="form-control input-field" id="floatingInput" placeholder="Linkedin URL">
                  <label for="floatingInput">@lang('Linkedin URL')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="academics.academic_email" class="form-control input-field" id="floatingInput" placeholder="Academic Email">
                  <label for="floatingInput">@lang('Academic Email')</label>
               </div>
            </div>
         </div>
         <div class="w-100 px-4 mt-3">
            <hr>
         </div>
         <div class="d-md-flex justify-content-end align-items-center mt-1">
            <div class="col-md-8 col-12 text-place-end mt-3 mb-3">
               
               <button class="m-0 button-no-bg" wire:click="addDetailsInOtherLanguage" type="button">
      @lang('+ Add Academic Name in Different Language')
      </button>

            </div>
         </div>
         @for($i = 0; $i<$details_in_langs; $i++)
            @if($i > 0)
            <br>
            @endif
         <div class="card">
            <div class="card-body">
               
            
         <div class="language-div-3">
            <div class="mt-3 row">
               <div class="col-md-5 col-12">
                  <div class="form-floating w-100">
                     <select wire:model.defer="academics.lang" class="form-select input-field" aria-label="">
                        <option>Language(English)</option>
                     </select>
                     <label for="floatingSelectGrid">@lang('Select Language')</label>
                  </div>
               </div>
               <div class="col-md-7 col-12 mobile-marg-2">
                  <div class="form-floating w-100">
                     <input wire:model.defer="academics.academic_name" class="form-control input-field" placeholder="Academic Name">
                     <label for="floatingInput">@lang('Academic Name')</label>
                  </div>
               </div>
            </div>
         </div>
         </div>
         </div>
         @endfor

      </form>
   