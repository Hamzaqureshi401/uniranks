<div class="col-lg-12 col-sm-12">
    <div class="card">
        <div id="event_lead">
            <div class="card-body">
                <div class="w-100">
                    <div class="row">
                        <div class="col-lg-6 col-md-12" x-data="{isUploading: false, progress: 0}">
                            <div class="h5 blue">@lang('Import Students from Excel Sheet')</div>
                            <p><span class="gray">@lang('To check the file format') </span>
                                <a href="{{asset('assets/bulk_upload_students_template.xlsx')}}" class="light-blue"
                                   download="">@lang('click here')</a>
                            </p>
                            <form wire:submit.prevent="" x-on:livewire-upload-start="isUploading = true"

                                  x-on:livewire-upload-finish="isUploading = false"

                                  x-on:livewire-upload-error="isUploading = false"

                                  x-on:livewire-upload-progress="progress = $event.detail.progress">

                                <div class="d-flex mt-3">
                                    <div class="col-8">
                                        <fieldset disabled="">

                                            <label x-show="!isUploading" class="input-field form-control"
                                                   style="cursor: pointer"
                                                   for="file" id="disabledTextInput" disabled="">
                                                @lang($fileName ?: "Click here to select file")
                                            </label>
                                            <div x-show="isUploading">
                                                <div class="progress" style="height: 2.5rem">
                                                    <div class="progress-bar progress-bar-striped bg-success"
                                                         role="progressbar"
                                                         :style="`width: ${progress}%;`" :aria-valuenow="progress"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <x-jet-input-error for="file" class="mt-2"/>
                                        </fieldset>
                                    </div>
                                    <div class="col-4">
                                        <input id="file" type="file" wire:model="file" hidden/>
                                        <label class="button-blue button-sm m-0 ms-2"
                                               style="cursor: pointer" for="file">@lang('Upload & Import')</label>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <x-general.loading wire:target="importData" message="Importing data"/>

                        <div class="w-100 d-block d-md-none my-1"></div>
                        <div class="col-lg-6 col-md-12">
                            <div class="h5 blue">@lang('Import Result')</div>
                            <div>
                                <p class="paragraph-style2 blue">{{ $newStudent_count }} @lang('students were imported successfully')</p>
                            </div>
                            <div>
                                <p class="paragraph-style2 blue"><input type="hidden" id="test"
                                                                        value="{{ $existStudent_count }}">{{ $existStudent_count }} @lang('students already exist in the system')
                                    @if($existStudent_count)

                                        <span>
                                        <a href="javascript:void(0)" class="light-blue" data-bs-toggle="modal"
                                           data-bs-target="#existStudent">@lang('Click here to found out')</a>
                                    </span>
                                    @endif
                                </p>
                            </div>
                            <div>
                                <p class="paragraph-style2 blue">{{ $invalidStudent_count }} @lang('students email or phone number is invalid or missing some important record')
                                    @if($invalidStudent_count)
                                        <span>
                                        <a href="javascript:void(0)" class="light-blue" data-bs-toggle="modal"
                                           data-bs-target="#invalidStudent">@lang('Click here to found out')</a>
                                    </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <x-general.status-alert/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div id="event_lead">
            <div class="card-body">
                <div class="w-100">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="h5 blue">
                                @lang('Save uploaded records')
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="primary-text">
                            <th class="align-top primary-text text-center" style="/*font-size:13px*/">#</th>
                            <th class="align-top primary-text text-center" style="/*font-size:13px*/">@lang('Name')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Student Email Address')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Parent Email Address')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Phone Number')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Parent Phone Number')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Curriculum')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Grade')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Nationality')</th>
                            </thead>
                            <tbody class="text-muted align-center">
                            @php
                                /**
                                * @var \App\Models\User $student;
                                **/
                            @endphp
                            @forelse($students as $student)
                                <tr>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 5%">{{ $loop->iteration + ($students->currentPage() - 1) * 10 }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $student->name }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 20%">{{ $student->email }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 20%">{{ $student->guardian?->email ?? 'N/A' }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $student->userBio?->mobile_number ?? 'N/A' }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $student->guardian?->mobile_number ?? 'N/A' }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $student->userBio?->curriculum?->translated_name ?? 'N/A' }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 5%">{{ $student->userBio?->studyLevel?->title ?? 'N/A' }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $student->userBio?->country?->country_name ?? 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">
                                        <h6 class="text-center mt-4 no-records">
                                            @lang('No Record Found!')
                                        </h6>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    @unless(empty($students))
                        <div class="row justify-content-between" style="margin-top: 20px">
                            <div class="col-3 h6 mt-2 align-items-center" style="padding-left: 30px">
                                <p class="paragraph-style2 blue">{{$students->total()}} @lang('results found')</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-12">
                                <div class="mobile-pagination">
                                    <p class="paragraph-style2 blue">{{ $students->links() }}</p>
                                </div>
                            </div>
                        </div>
                    @endunless
                </div>
            </div>
        </div>
    </div>
    {{--Exist Student Modal--}}
    <div class="modal fade" id="existStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Exist Students')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="primary-text">
                            <th class="align-top primary-text text-center" style="/*font-size:13px*/">#</th>
                            <th class="align-top primary-text text-center" style="/*font-size:13px*/">@lang('Name')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Student Email Address')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Parent Email Address')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Phone Number')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Parent Phone Number')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Curriculum')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Grade')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Nationality')</th>
                            </thead>
                            <tbody class="text-muted align-center">
                            @forelse($exist_students as $exist_student)
                                <tr>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 5%">{{ $loop->iteration }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $exist_student['name'] ?? "---" }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 20%">{{ $exist_student['student_email_address']??"---" }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 20%">{{ $exist_student['parent_email_address']??"---" }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $exist_student['phone_number'] ??"---"}}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $exist_student['parent_phone_number']??"---" }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $exist_student['curriculum'] ??"---"}}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 5%">{{ $exist_student['grade'] ??"---"}}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $exist_student['nationality'] ??"---"}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">
                                        <h6 class="text-center mt-4 no-records">
                                            @lang('No Record Found!')
                                        </h6>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
    {{--Invalid Student Modal--}}
    <div class="modal fade" id="invalidStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Invalid Students')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="primary-text">
                            <th class="align-top primary-text text-center" style="/*font-size:13px*/">#</th>
                            <th class="align-top primary-text text-center" style="/*font-size:13px*/">@lang('First Name')</th>
                            <th class="align-top primary-text text-center" style="/*font-size:13px*/">@lang('Last Name')</th>
                            <th class="align-top primary-text text-center" style="/*font-size:13px*/">@lang('National Number')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Student Email Address')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Parent Email Address')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Phone Number')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Parent Phone Number')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Curriculum')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Grade')</th>
                            <th class="align-top primary-text text-center"
                                style="/*font-size:13px*/">@lang('Nationality')</th>
                            </thead>
                            <tbody class="text-muted align-center">
                            @forelse($invalid_students as $invalid_student)
                                <tr>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 5%">{{ $loop->iteration }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $invalid_student['first_name'] ?? '---' }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $invalid_student['last_name'] ?? '---' }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $invalid_student['national_number'] ?? '---' }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 20%">{{ $invalid_student['student_email_address'] ?? "---" }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 20%">{{ $invalid_student['parent_email_address'] ?? "---"}}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $invalid_student['phone_number'] ?? "---"}}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $invalid_student['parent_phone_number']??"---" }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $invalid_student['curriculum'] ??"---"}}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 5%">{{ $invalid_student['grade']??"---" }}</td>
                                    <td class="align-center text-center"
                                        style="/*font-size:13px*/; width: 10%">{{ $invalid_student['nationality']??"---" }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">
                                        <h6 class="text-center mt-4 no-records">
                                            @lang('No Record Found!')
                                        </h6>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
</div>
