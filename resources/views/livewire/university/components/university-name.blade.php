<div>
    <div class="h4 blue mt-5">
        @lang('University Name')
    </div>
    <div class="paragraph-style2 blue">
        @lang('add the university name, it is important to add the legal English university name as the primary name, and will be a good idea to add the different variations of the name as secondary name, for example
        , university of Harvard University, and name of other languages')
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <form>
                <div class="row justify-content-between">
                    <div class="col-md-8">
                        <div class="form-floating w-100">
                            <input class="form-control input-field" id="floatingInput" placeholder="Primary University Name in English">
                            <label for="floatingInput">@lang('Primary University Name in English')</label>
                        </div>
                    </div>
                    <div class="col-md-4 mobile-marg-2">
                        <div class="form-floating w-100">
                            <select class="form-select input-field" id="floatingSelectGrid" aria-label="">
                                <option>Language(English)</option>

                            </select>
                            <label for="floatingSelectGrid">Select Language</label>
                        </div>
                    </div>
                </div>
                <div class="d-md-flex mt-3 mb-3 text-place-end justify-content-end">
                    <button class="m-0 button-no-bg" type="button" id="my-show">+ Add university name possible variation or in a different language</button>
                </div>
            </form>
            <div class="w-100 mt-4 px-4">
                <hr>
            </div>
            <div class="d-md-flex h6 blue justify-content-between">
                <div class="fw-bold">University of UNIRANKS</div>
                <div class="font-light">English</div>
                <div class="font-light">Created on 15 Jan 2022</div>
                <div class="font-light">By David Scott</div>
                <div class=""><a href="" class="red">Delete</a></div>
            </div>
        </div>
    </div>
</div>
