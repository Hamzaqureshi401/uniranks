      <form>
         <div class="blue h5">Add Academics</div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Full Academic Name in English">
                  <label for="floatingInput">Full Academic Name in English</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Academic Email">
                  <label for="floatingInput">Academic Email</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="row">
                  <div class="col-6">
                     <div class="form-floating w-100">
                        <select class="form-select input-field" id="floatingSelectGrid" aria-label="">
                           <option>Title</option>
                           <option>Prof</option>
                           <option>Mr</option>
                           <option>Mrs</option>
                        </select>
                        <label for="floatingSelectGrid">Title</label>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-floating w-100">
                        <select class="form-select input-field" id="floatingSelectGrid" aria-label="">
                           <option>Position</option>
                        </select>
                        <label for="floatingSelectGrid">Position</label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <select class="form-select input-field" id="floatingSelectGrid" aria-label="">
                     <option>Select School</option>
                  </select>
                  <label for="floatingSelectGrid">Select School</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <select class="form-select input-field" id="floatingSelectGrid" aria-label="">
                     <option>Select College</option>
                  </select>
                  <label for="floatingSelectGrid">Select College</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <select class="form-select input-field" id="floatingSelectGrid" aria-label="">
                     <option>Select Department</option>
                  </select>
                  <label for="floatingSelectGrid">Select Department</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Academic Profile Page, Website, or URL">
                  <label for="floatingInput">Academic Profile Page, Website, or URL</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="ORCID ID">
                  <label for="floatingInput">ORCID ID</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Web of Science ResearchID">
                  <label for="floatingInput">Web of Science ResearchID</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Scopus Author ID">
                  <label for="floatingInput">Scopus Author ID</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Researchgate Link">
                  <label for="floatingInput">Researchgate Link</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Google Scholar Link">
                  <label for="floatingInput">Google Scholar Link</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Linkedin URL">
                  <label for="floatingInput">Linkedin URL</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input class="form-control input-field" id="floatingInput" placeholder="Academic Email">
                  <label for="floatingInput">Academic Email</label>
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
                     <select class="form-select input-field" aria-label="">
                        <option>Language(English)</option>
                     </select>
                     <label for="floatingSelectGrid">Select Language</label>
                  </div>
               </div>
               <div class="col-md-7 col-12 mobile-marg-2">
                  <div class="form-floating w-100">
                     <input class="form-control input-field" placeholder="Academic Name">
                     <label for="floatingInput">Academic Name</label>
                  </div>
               </div>
            </div>
         </div>
         </div>
         </div>
         @endfor

      </form>
   