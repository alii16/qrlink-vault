<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<title>QRLinkVault</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

<style>
    body{
        background-color: #19123B;
    }
    .back{
        text-decoration: none !important;
        color: #57557A;
    }
    .sitename {
        text-align: center;
        font-family: "Poppins",  sans-serif;
        line-height: 1;
        font-size: 30px;
        font-weight: bold;
        margin: 10 0 20;
        font-weight: 700;
        color: var(--heading-color);
    }
    .card{
        border: none;
        border-top: 5px solid rgb(176,106,252);
        background: #212042;
        color: #57557A;
    }
    p{
        font-weight: 600;
        font-size: 15px;
    }
    .fab{
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
        background: #2A284D;
        height: 40px;
        width: 90px;
    }
    .fab:hover{
        cursor: pointer;
    }
    .fa-twitter{
        color: #56ABEC;
    }
    .fa-facebook{
        color: #1775F1;
    }
    .fa-google{
        color: #CB5048;
    }
    .division{
        float: none;
        position: relative;
        margin-bottom: 6px;
        text-align: center;
        width: 100%;
        box-sizing: border-box;
    }
    .division .line{
        border-top: 1.5px solid #57557A;
        position: absolute;
        top: 13px;
        width: 100%;
    }
    .line.l{
        left: 60px;
    }
    .line.r{
        right: 60px;
    }
    .division span{
        font-weight: 600;
        font-size: 14px;
    }
    .myform{
        padding: 0 25px 0 33px;
        margin-bottom: 2px;
    }
    .form-control{
        border: 1px solid #57557A;
        border-radius: 3px;
        background: #212042;
        margin-bottom: 20px;
        letter-spacing: 1px;
    }
    .form-control:focus{
        border: 1px solid #57557A;
        border-radius: 3px;
        box-shadow: none;
        background: #212042;
        color: #fff;
        letter-spacing: 1px;
    }
    .captcha{
        gap: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }
    .bn{
        text-decoration: underline;
    }
    .bn:hover{
        cursor: pointer;
    }
    .form-check-input {
        margin-top: 8px!important;
    }
    .btn-primary{
        background: linear-gradient(135deg, rgba(176,106,252,1) 39%,rgba(116,17,255,1) 101%);
        border: none;
        border-radius: 50px;
    }
    .btn-primary:focus{
        box-shadow: none;
        border: none;
    }
    small{
        color: #F2CEFF;
    }
    .far.fa-user{
        font-size: 13px;
    }

    @media(min-width: 767px){
        .bn{
            text-align: right;
        }
    }
    @media(max-width: 767px){
        .form-check{
            text-align: center;
        }
        .bn{
            text-align: center;
            align-items: center;
        }
    }
    @media(max-width: 450px){
        .fab{
            width: 100%;
            height: 100%;
        }
        .division .line{
            width: 50%;
        }
    }
</style>
{!! htmlScriptTagJsApi() !!}

<div class="container">
    <div class="row d-flex justify-content-center mt-4">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card py-1 px-2">
                <a href="/" class="back">
                    <h1 class="sitename">
                        <span style="color: red;">Ali</span>
                        <span style="color: #fad02c;" class="d-none d-sm-inline"> polanunu</span>
                    </h1>
                </a>

                <form method="POST" action="{{ route('register') }}" class="myform">
                    @csrf
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6">
                            <x-input-label for="name" :value="__('Name')" />
                            <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="col-md-6">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="col-md-6">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-md-6">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <!-- reCAPTCHA -->
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <div class="recaptcha">
                            {!! htmlFormSnippet() !!}
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-between mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg"><small><i class="far fa-user pr-2"></i>{{ __('Register') }}</small></button>
                        </div>
                    </div>
                </form>
                <div class="division">
                    <div class="row">
                        <div class="col-3"><div class="line l"></div></div>
                        <div class="col-6"><span>or register with</span></div>
                        <div class="col-3"><div class="line r"></div></div>
                    </div>
                </div>
				<div class="row mx-auto mb-3">
					<div class="col-4">
						<i class="fab fa-twitter"></i>
					</div>
					<div class="col-4">
						<i class="fab fa-facebook"></i>
					</div>
					<div class="col-4">
						<i class="fab fa-google"></i>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('refreshCaptcha').addEventListener('click', function () {
        document.getElementById('captchaImage').src = "{{ route('captcha.image') }}?t=" + Date.now();
    });
</script>

