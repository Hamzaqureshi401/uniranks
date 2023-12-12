<div>
    <div class="col">
        <input  name="password"  id="password" wire:model.blur="password" type="password"  @class(['form-control mt-3 input-field required', 'is-invalid has-error'=>$errors->has('password')])
            required autocomplete
            placeholder="@lang('Password')"/>
        <div class="invalid-feedback">
            @error('password')
            {{ $message }}
            @enderror
            @if(!$errors->has('password'))
                @lang('Please enter password')
            @endif
        </div>
    </div>
    <div class="col">
        <input  name="password_confirmation" wire:model.blur="password_confirmation" wire:blur="validateInputs('password')"  type="password" required
                @class(['form-control my-3  input-field required', 'is-invalid'=>$errors->has('password_confirmation')]) id="password_confirmation"
                placeholder="@lang('Confirm Password')"  />
    </div>
</div>
