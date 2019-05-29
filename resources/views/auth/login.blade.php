<!DOCTYPE html>
<html lang="en-US" dir="ltr">
@include('auth.partials.head')

<body>
    <main class="main" id="top">
        <div class="container">
            <div class="row flex-center minh-100vh py-6">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <a class="d-block text-center mb-4" href="#">
                        <div class="d-inline-flex flex-center">
                            <img class="mr-2" src="{{asset('backend/pages/assets/img/illustrations/falcon.png')}}" alt="" width="58" />
                            <span class="text-sans-serif font-weight-extra-bold fs-5 d-inline-block">falcon</span>
                        </div>
                    </a>
                <div class="card">
                    <div class="card-body p-5">
                        <div class="row text-left justify-content-between">
                            <div class="col-auto">
                                <h5> Log in</h5>
                            </div>
                            <div class="col-auto">
                                <p class="fs--1 text-600">or <a href="../authentication/register.html">Create an account</a></p>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter password" autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                             
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRemember" type="checkbox" />
                                        <label class="custom-control-label" for="customCheckRemember">Remember me</label>
                                    </div>
                                </div>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Quên mật khẩu?') }}
                                </a>
                                @endif
                                <!-- <div class="col-auto"><a class="fs--1" href="../authentication/forget-password.html">Forget Password?</a></div> -->
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block mt-3" type="submit" name="submit">Log in</button>
                            </div>
                            <div class="w-100 position-relative text-center mt-4">
                                <hr class="text-300" />
                                <div class="position-absolute absolute-centered t-0 px-3 bg-white text-sans-serif fs--1 text-500 text-nowrap">or sign-in with</div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="row no-gutters">
                                  <div class="col-sm-6 pr-sm-1"><a class="btn btn-outline-google-plus btn-sm btn-block mt-2" href="#"><span class="fab fa-google-plus-g mr-2" data-fa-transform="grow-8"></span> google</a></div>
                                  <div class="col-sm-6 pl-sm-1"><a class="btn btn-outline-facebook btn-sm btn-block mt-2" href="#"><span class="fab fa-facebook mr-2" data-fa-transform="grow-8"></span> facebook</a></div>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('auth.partials.scripts')
</body>

</html>