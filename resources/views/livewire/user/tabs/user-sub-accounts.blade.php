<div>
   <div class="row mt-3">
      <div class="col-12 d-flex align-items-center justify-content-between">
         <div class="h4 text-blue">@lang('Secondary Email Addresses')</div>
         <button class="button-dark-blue button-sm" wire:click="showAddUserModal">@lang('Add new email') </button>
      </div>
   </div>
   <div class="row">
      <div class="col-12">
         <div class="gray paragraph-style2">
            {{ __("Secondary emails for account assistance") }}
         </div>
      </div>
   </div>
   <div class="card mt-3">
      <div class="card-body">
         <div class="w-100">
            <x-general.status-alert/>
            @php
            /**
            * @var \Illuminate\Database\Eloquent\Collection<\App\Models\User> $accounts
            */
            @endphp
            <div class="row">
               <div class="col-12">
                  <div class="table-responsive">
                     <table class="table">
                        <thead class="primary-text">
                           <tr>
                              <th class="align-top primary-text" style="/*font-size:13px*/">@lang('Email')</th>
                              <th class="align-top primary-text" style="/*font-size:13px*/">@lang('Full Name')</th>
                              <th class="align-top primary-text" style="/*font-size:13px*/">@lang('Status')</th>
                              <th class="align-top primary-text" style="/*font-size:13px*/">@lang('Password')</th>
                              <th class="align-top primary-text" style="/*font-size:13px*/">@lang('Change Type')</th>
                              <th class="align-top primary-text" style="/*font-size:13px*/">@lang('Action')</th>
                           </tr>
                        </thead>
                        <tbody class="text-muted align-middle">
                           @foreach($accounts as $account)
                           <tr>
                              <td class="align-top" style="/*font-size:13px*/">
                                 {{$account->email}}
                              </td>
                              <td class="align-top" style="/*font-size:13px*/">
                                 {{$account->name}}
                              </td>
                              <td class="align-top" style="/*font-size:13px*/">
                                 @if(empty($account->email_verified_at))
                                 <a href="javascript:void(0)"
                                    wire:click="sendVerification('{{$account->id}}')"
                                    class="primary-text text-decoration-none">{{__('Send Verification Link')}}</a>
                                 @else
                                 {{__('Verified')}}
                                 @endif
                              </td>
                              <td>
                                 <a href="javascript:void(0)"
                                    class="primary-text text-decoration-none"
                                    wire:click="sendResetPassword('{{$account->email}}')">
                                 {{__('Reset Password')}}</a>
                              </td>
                              <td >
                                 <a href="javascript:void(0)" wire:click="makeEmailPrimary('{{$account->id}}')"
                                    class="primary-text text-decoration-none">{{__('Make it primary')}}</a>
                              </td>
                              <td>
                                 <!-- <a href="javascript:void(0)" wire:click="deleteSubAccount('{{$account->id}}')"
                                    class="primary-text text-decoration-none"> {{__('Remove')}}</a> -->
                                 <div class="row">
                                    <div class="col-2">
                                       <a wire:click="edit({{ $account->id }})" href="javascript:void(0)" class="light-blue ms-2">
                                       <i class="material-icons-outlined">
                                       <img class="header-logo d-none d-lg-inline-block pointer" style="max-width: 15px; max-height: 15px;"
                                          src="{{ asset('assets/icons/' . 'edit-blue.svg') }}" alt="Edit"/>
                                       </i>
                                       </a>
                                    </div>
                                    <div class="col-4">
                                       <a wire:click="deleteSubAccount({{ $account->id }})" href="javascript:void(0)" class="red ms-2">
                                       <i class="material-icons-outlined">
                                       <img class="header-logo d-none d-lg-inline-block pointer" style="max-width: 15px; max-height: 15px;"
                                          src="{{ asset('assets/icons/' . 'delete-red.svg') }}" alt="Delete"/>
                                       </i>
                                       </a>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  {{--                        
                  <div wire:loading.block class="row mt-3">
                     --}}
                     {{--                            
                     <div class="col-12 d-flex justify-content-center">
                        --}}
                        {{--                                
                        <div ><i class="fas fa-spinner fa-pulse"--}}
                           {{--                                         aria-hidden="true"></i> @lang('Processing Your Request')...--}}
                           {{--                                
                        </div>
                        --}}
                        {{--                            
                     </div>
                     --}}
                     {{--                        
                  </div>
                  --}}
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="card bg-transparent mt-4">
   <div class="card-body">
      <div class="h4 blue">@lang('Emails Update')</div>
      <div class="w-100 px-4 mt-3">
         <hr>
      </div>
      <div>
         <table class="table">
            <thead>
               <tr class="blue">
                  <th>Email</th>
                  <th>Type</th>
                  <th>Update In</th>
                  <th>Update By</th>
                  <th>Action</th>
                  <!-- Add other table headers as needed -->
               </tr>
            </thead>
            <tbody>
               @foreach($accounts as $account)
               <tr>
                  <td class="blue">{{$account->email}}</td>
                  <td class="blue">{{ 'Secondry' }}</td>
                  <td class="blue">{{ \Carbon\Carbon::parse($account['updated_at'])->format('D, M j, Y g:i A') }}
        </td>
                  <td class="blue">{{ $account['updated_by'] ?? 'By Dev Team Rep' }}</td>
                  <td>
                                 <!-- <a href="javascript:void(0)" wire:click="deleteSubAccount('{{$account->id}}')"
                                    class="primary-text text-decoration-none"> {{__('Remove')}}</a> -->
                                 <div class="row">
                                    <div class="col-2">
                                       <a wire:click="edit({{ $account->id }})" href="javascript:void(0)" class="light-blue ms-2">
                                       <i class="material-icons-outlined">
                                       <img class="header-logo d-none d-lg-inline-block pointer" style="max-width: 15px; max-height: 15px;"
                                          src="{{ asset('assets/icons/' . 'edit-blue.svg') }}" alt="Edit"/>
                                       </i>
                                       </a>
                                    </div>
                                    <div class="col-4">
                                       <a wire:click="deleteSubAccount({{ $account->id }})" href="javascript:void(0)" class="red ms-2">
                                       <i class="material-icons-outlined">
                                       <img class="header-logo d-none d-lg-inline-block pointer" style="max-width: 15px; max-height: 15px;"
                                          src="{{ asset('assets/icons/' . 'delete-red.svg') }}" alt="Delete"/>
                                       </i>
                                       </a>
                                    </div>
                                 </div>
                              </td>
                  
                  <!-- Add other specific attributes as needed -->
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
   <x-jet-modal wire:model="openAddUserModal">
      <x-slot name="title">
        @if($edit == 'true')
         {{ __("Update Secondary Email/Sub account") }}   
        @else
         {{ __("Add Secondary Email/Sub account") }}
         @endif
      </x-slot>
      <div class="row ">
         <div class="col-lg-12">
            <div class="h-100">
               <input type="email" wire:model.defer="user_account_state.email"
                  class="form-control input-field"
                  placeholder="Email">
               <x-jet-input-error for="user_account_state.email" class="mt-2" />
            </div>
         </div>
      </div>
      <div class="row mt-3">
         <div class="col-lg-6">
            <div class="h-100">
               <input type="text" wire:model.defer="user_account_state.first_name"
                  class="form-control input-field" placeholder="@lang('First Name')">
               <x-jet-input-error for="user_account_state.first_name" class="mt-2" />
            </div>
         </div>
         <div class="col-lg-6 mobile-marg-2">
            <div class="h-100">
               <div class="input-group">
                  <input type="text" wire:model.defer="user_account_state.last_name"
                     class="form-control input-field" placeholder="@lang('Last Name')">
                  <x-jet-input-error for="user_account_state.last_name" class="mt-2" />
               </div>
            </div>
         </div>
      </div>
      <div class="row mt-3">
         <div class="col-lg-6">
            <div class="h-100">
               <input type="password" wire:model.defer="user_account_state.password"
                  class="form-control input-field"
                  placeholder="Password">
               <x-jet-input-error for="user_account_state.password" class="mt-2" />
            </div>
         </div>
         <div class="col-lg-6 mobile-marg-2">
            <div class="h-100">
               <input type="password"
                  wire:model.defer="user_account_state.password_confirmation"
                  class="form-control input-field"
                  placeholder="Confirm Password">
               <x-jet-input-error for="user_account_state.password_confirmation" class="mt-2" />
            </div>
         </div>
      </div>
      <div class="row mt-3">
         <div class="col text-end">

            @if($edit == 'true')
            <button type="button" wire:click="update"
               class="button-dark-blue width-25 button-sm mobile-btn"
               wire:loading.attr="disabled">@lang('Save')
            </button>
            @else
            <button type="button" wire:click="saveNewUser"
               class="button-dark-blue width-25 button-sm mobile-btn"
               wire:loading.attr="disabled">@lang('Save')
            </button>
            @endif
         </div>
      </div>
      <p class="primary-text small">@lang('An email wil be sent to user')</p>
      <x-general.loading wire:target="saveNewUser" message="Saving Data" />
   </x-jet-modal>
       <x-general.loading message="Processing..." wire:target="save,initForm" />

</div>