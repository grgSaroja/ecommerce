

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content custom">
            <div class="modal-header">
                <h1 class="heading" id="loginModal">Login</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="false">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="loginForm" action="{{ route('login') }}">
                    @csrf
    
                    <div class="form-group row">
                        <label for="email">Email</label>
    
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control form-control-lg mb-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="password" >Password</label>
    
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control form-control-lg mb-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <div class="col-md-6 ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group row mb-0">
                        <div class="col-md-8 ">
                            <button type="submit" class="btn btn-secondary btn-lg log-btn">
                                {{ __('Login') }}
                            </button>
    
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
