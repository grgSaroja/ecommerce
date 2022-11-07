<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content custom">
            <div class="modal-header">
                <h1 class="heading" id="registerModal">Create Account</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="false">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="registerForm" action="{{ route('register') }}">
                    @csrf

                    <div class="form-row">
                       
                        <div class="form-group col-12">
                            <label for="fnameInput">{{ __('First Name') }}</label>
                            <input id="fnameInput" type="text" class="form-control form-control-lg mb-2  @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"   autofocus>

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="lnameInput">{{ __('Last Name') }}</label>

                            <input id="lnameInput" type="text" class="form-control form-control-lg mb-2  @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"   autofocus>

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                    </div>

                    

                    <div class="form-group row">
                        <label for="emailInput" >{{ __('E-Mail Address') }}</label>

                        <div class="col-md-12">
                            <input id="emailInput" type="email" class="form-control form-control-lg mb-2  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="addressInput" >{{ __('Address') }}</label>

                        <div class="col-md-12">
                            <input id="addressInput" type="text" class="form-control form-control-lg mb-2  @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  autofocus>

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="numberInput" >{{ __('Number') }}</label>

                        <div class="col-md-12">
                            <input id="numberInput" type="text" class="form-control form-control-lg mb-2  @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}"  autocomplete="number" autofocus>

                            @error('number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-6">
                            <label for="passwordInput" >{{ __('Password') }}</label>

                            <input id="passwordInput" type="password" class="form-control form-control-lg mb-2  @error('password') is-invalid @enderror" name="password"   required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="password-confirm" >{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="form-control form-control-lg mb-2 " name="password_confirmation" required >
                        </div>

                    </div>

             
                    <div class="form-group row mb-0">
                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn-secondary btn-lg reg-btn">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>