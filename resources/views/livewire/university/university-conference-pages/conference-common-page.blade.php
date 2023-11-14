<div class="card mt-3">
   <div class="card-body">
      <form>
         <div class="blue h5">Conference Information</div>
         <div class="mt-3 row">
            <div class="col-12">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Conference Name">
                  <label for="floatingInput">Conference Name</label>
               </div>
            </div>
         </div>
         <div class="mt-3 row">
            <div class="col-12">
               <div class="blue">Intorduction about the Conference</div>
               <textarea name="content" id="editor" rows="5" style="display: none;"></textarea>
            </div>
         </div>
         <div class="mt-3 row">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input type="text" class="input-field basicDate form-control flatpickr-input" id="floatingInput" placeholder="Conference Start Date" data-input="" readonly="readonly">
                  <label for="floatingInput">Conference Start Date</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input type="text" class="input-field basicDate form-control flatpickr-input" id="floatingInput" placeholder="Conference End Date" data-input="" readonly="readonly">
                  <label for="floatingInput">Conference End Date</label>
               </div>
            </div>
         </div>
         <div class="mt-3 row">
            <div class="col-12">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Conference URL">
                  <label for="floatingInput">Conference URL</label>
               </div>
            </div>
         </div>
         <div class="w-100 px-4 mt-4">
            <hr>
         </div>
         <div class="blue h5">Conference Subjects</div>
         <div class="mt-3 row">
            <div class="col-12">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Name of the Subjects">
                  <label for="floatingInput">Name of the Subjects</label>
               </div>
            </div>
         </div>
         <div class="d-md-flex justify-content-end align-items-end mt-1">
            <div class="col-md-4 col-12 text-place-end mt-3 mb-4">
               <button class="m-0 button-no-bg" wire:click="addDetailsInOtherLanguage" type="button">
               @lang('+ Add New Subjects')
               </button>
            </div>
         </div>
         <div class="language-div-4">
            @for($i = 0; $i<$details_in_langs; $i++)
            @if($i > 0)
            <br>
            <div class="card">
               <div class="card-body">
                  <div class="row mb-4">
                     <div class="col-md-8 col-12">
                        <div class="form-floating w-100">
                           <input class="form-control input-field"  placeholder="Name of the Subjects">
                           <label for="floatingInput">Name of the Subjects</label>
                        </div>
                     </div>
                     <div class="col-md-4 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                           <select class="form-select input-field" aria-label="">
                              <option>English(Italiano)</option>
                           </select>
                           <label for="floatingSelectGrid">Select Language</label>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endif
            @endfor
         </div>
         <div class="w-100 px-4">
            <hr>
         </div>
         <div class="h5 blue">Conference Logos</div>
         <div class="d-md-flex mt-3 justify-content-between align-items-center">
            <div class="col-md-6"><img src="https://d73ojsnoesnuw.cloudfront.net/images/site-logos/Logo-stars-v1.png" class="card p-2 rounded-0" width="250px"></div>
            <div class="col-md-6  mobile-marg text-place-end"><button class="m-0 button-no-bg">+ Upload Rectangle Logo</button></div>
         </div>
         <div class="d-md-flex mt-4 justify-content-between align-items-center">
            <div class="col-md-6 "><img src="https://d73ojsnoesnuw.cloudfront.net/images/site-logos/Logo-stars-v1.png" class="card p-2 rounded-0" width="130px"></div>
            <div class="col-md-6 text-place-end mobile-marg"><button class="m-0 button-no-bg">+ Upload Square Logo</button></div>
         </div>
         <div class="w-100 px-4 mt-4">
            <hr>
         </div>
         <div class="d-md-flex justify-content-end align-items-center mt-1">
            <button class="m-0 button-no-bg" wire:click="addCenferenceDetailsInOtherLanguage" type="button">
            @lang('+ Add Conference detail in another Language')
            </button>
         </div>
         <div class="language-div-3">
            <div class="row mt-3">
               <div class="blue h5 col-md-12 col-12">Conference Information in Different Language</div>
            </div>
            @for($i = 0; $i<$addCenferenceDetailsInOtherLanguage; $i++)
            @if($i > 0)
            <br>
            @endif
            <div class="card">
               <div class="card-body">
                  <div class="mt-3 row">
                     <div class="col-md-5 col-12">
                        <div class="form-floating w-100">
                           <select class="form-select input-field"  aria-label="">
                              <option>Language(English)</option>
                           </select>
                           <label for="floatingSelectGrid">Select Language</label>
                        </div>
                     </div>
                     <div class="col-md-7 col-12 mobile-marg-2">
                        <div class="form-floating w-100">
                           <input class="form-control input-field" placeholder="Conference Name">
                           <label for="floatingInput">Conference Name</label>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endfor
            <div class="row mt-3">
               <div class="col-12">
                  <div class="blue">Introduction about the Conference</div>
                  <textarea name="content" id="editor2" style="display: none;"></textarea>
               </div>
            </div>
            <div class="w-100 px-4 mt-4">
               <hr>
            </div>
         </div>
         <div class="h5 blue mt-3">Conference Subjects</div>
         <div class="row mt-4">
            <div class="col-12">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Name of the Subjects 1">
                  <label for="floatingInput">Name of the Subjects 1</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-12">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Name of the Subjects 2">
                  <label for="floatingInput">Name of the Subjects 2</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-12">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Name of the Subjects 3">
                  <label for="floatingInput">Name of the Subjects 3</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-12">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Name of the Subjects 4">
                  <label for="floatingInput">Name of the Subjects 4</label>
               </div>
            </div>
         </div>
         <div class="w-100 px-4 mt-4">
            <hr>
         </div>
         <div class="card mt-4">
            <div class="card-body">
               <div class="w-100">
                  <div class="row">
                     <div class="h6 blue">upload or drag and drop 1 or more images , Image Format must be .JPG, .PNG, .SVG, or .WEBP</div>
                  </div>
                  <div class="upload-container file-upload d-flex justify-content-center">
                     <i class="fa-solid fa-cloud-arrow-up light-blue"></i>
                     <input type="file" id="file_upload" multiple="">
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>