<div class="d-md-flex justify-content-between  align-items-center"> 
            <div class="h4 mb-0 blue">@lang('Journel Information')</div>
         </div>
         <br>

         <div class="paragraph-style-2 blue">

             <div class="form-floating w-100">
                  <textarea wire:model.defer="research.intro" class="form-control input-field" id="floatingInput" placeholder="Journal Information"></textarea>
                  <label for="floatingInput">@lang('Intorduction about the Journel')</label>
               </div>
            
         </div>
         <br>
          <div class="paragraph-style-2 blue">
             <div class="form-floating w-100">
                  <textarea wire:model.defer="research.intro" class="form-control input-field" id="floatingInput" placeholder="Aims and Scope"></textarea>
                  <label for="floatingInput">@lang('Aims and Scope of the Journel')</label>
               </div>
            
         </div>
         <div class="blue h5 mt-3">@lang('Journel Detail')</div>
         
                  <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <select wire:model.defer="research.jol_type" class="form-select input-field" aria-label="">
                     <option>Select Entry Journal Type</option>
                     <option>Online and Print</option>
                     <option>Only Online</option>
                     <option>PDF Copy</option>
                  </select>
                  <label for="floatingSelectGrid">@lang('Select Entry Journal Type')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="research.jol_title" class="form-control input-field" id="floatingInput" placeholder="Journal Title Name">
                  <label for="floatingInput">@lang('Journal Title Name')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <select wire:model.defer="research.en_fl_category" class="form-select input-field" aria-label="">
                     <option>Select Entry Field Category</option>
                     <option>Medical Engineering</option>
                  </select>
                  <label for="floatingSelectGrid">@lang('Select Entry Field Category')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="research.jol_url" class="form-control input-field" id="floatingInput" placeholder="Journal URL">
                  <label for="floatingInput">@lang('Journal URL')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="row">
                  <div class="col-6">
                     <div class="form-floating w-100">
                        <input wire:model.defer="research.online_issn" class="form-control input-field" id="floatingInput" placeholder="ONLINE ISSN if applicable">
                        <label for="floatingInput">@lang('ONLINE ISSN')</label>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-floating w-100">
                        <input wire:model.defer="research.print_issn" class="form-control input-field" id="floatingInput" placeholder="Print ISSN if applicable">
                        <label for="floatingInput">@lang('Print ISSN')</label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="research.electronic_submission_url" class="form-control input-field" id="floatingInput" placeholder="Electronic Submission URL">
                  <label for="floatingInput">@lang('Electronic Submission URL')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <select wire:model.defer="research.jol_main_lang" class="form-select input-field" aria-label="">
                     <option>Journal Main Language</option>
                  </select>
                  <label for="floatingSelectGrid">@lang('Journal Main Language')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="research.first_published_year" class="form-control input-field" id="floatingInput" placeholder="First Published Year">
                  <label for="floatingInput">@lang('First Published Year')</label>
               </div>
            </div>
         </div>
         <div class="blue mt-3">@lang('Is the Journal Open Access for Reader?')</div>
         <div class="d-flex mt-2">
            <div class="d-flex align-items-center"><input wire:model.defer="research.access_open_reader" type="radio" name="percentage" value="2"></div>
            <div class="blue ms-2 ">No</div>
         </div>
         <div class="d-flex mt-2">
            <div class="d-flex d-flex align-items-center"><input wire:model.defer="research.access_open_reader" type="radio" name="percentage" value="3"></div>
            <div class="blue ms-2">Yes</div>
         </div>
         <div id="Percentage2" class="percen mt-3" style="display: none;">
            <div class="form-floating w-100">
               <input wire:model.defer="research.fee_reader" class="form-control input-field" id="floatingInput" placeholder="Fee">
               <label for="floatingInput">@lang('Fee')</label>
            </div>
         </div>
         <div id="Percentage3" class="percen"></div>
         <div class="blue mt-3">@lang('Is the Journal Open Access for Authors ?')</div>
         <div class="d-flex mt-2">
            <div class="d-flex align-items-center"><input wire:model.defer="research.access_open_auther" type="radio" name="cars" value="2"></div>
            <div class="blue ms-2 ">No</div>
         </div>
         <div class="d-flex mt-2">
            <div class="d-flex d-flex align-items-center"><input wire:model.defer="research.access_open_auther" type="radio" name="cars" value="3"></div>
            <div class="blue ms-2">Yes</div>
         </div>
         <div id="Cars3" class="desc">
         </div>
         <div id="Cars2" class="desc mt-3" style="display: none;">
            <div class="form-floating w-100">
               <input wire:model.defer="research.fee_auther" class="form-control input-field" id="floatingInput" placeholder="Fee">
               <label for="floatingInput">@lang('Fee')</label>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="research.jol_fee_reader" class="form-control input-field" id="floatingInput" placeholder="Journal Reader Fee">
                  <label for="floatingInput">@lang('Journal Reader Fee')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="research.jol_fee_auther" class="form-control input-field" id="floatingInput" placeholder="Journal Authors Fee">
                  <label for="floatingInput">@lang('Journal Authors Fee')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="research.call_for_prepare_start_date" type="text" class="input-field basicDate form-control flatpickr-input" id="floatingInput" placeholder="Call for Papers Start Date" data-input="" readonly="readonly">
                  <label for="floatingInput">@lang('Call for Papers Start Date')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="research.call_for_prepare_end_date" type="text" class="input-field basicDate form-control flatpickr-input" id="floatingInput" placeholder="Call for Papers End Date" data-input="" readonly="readonly">
                  <label for="floatingInput">@lang('Call for Papers End Date')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-12">
               <select wire:model.defer="research.business_jol_list" class="js-example-basic-multiple form-control input-field select2-hidden-accessible" width="100%" height="100%" name="states[]" multiple="" tabindex="-1" aria-hidden="true" data-select2-id="select2-data-4-r6vg">
                  <option>Business journcel listed on</option>
               </select>
               <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-5-zixz" style="width: 591.523px;">
                  <span class="selection">
                     <span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                        <ul class="select2-selection__rendered" id="select2-states-og-container"></ul>
                        <span class="select2-search select2-search--inline"><textarea class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-label="Search" aria-describedby="select2-states-og-container" placeholder="The Business Journals is Listed on" style="width: 100%;"></textarea></span>
                     </span>
                  </span>
                  <span class="dropdown-wrapper" aria-hidden="true"></span>
               </span>
            </div>
         </div>
         <div class="w-100 px-4 mt-3">
            <hr>
         </div>
