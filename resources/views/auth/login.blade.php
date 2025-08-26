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
        border-top: 5px solid  rgb(176,106,252);
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
        border-top: 1.5px solid #57557A;;
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
{!!htmlScriptTagJsApi()!!}

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
				<form method="POST" action="{{ route('login') }}" class="myform">
                    @csrf
					<div class="form-group">
    					<input type="email" class="form-control" placeholder="Email" name="email" for="email" :value="__('Email')" required autofocus autocomplete="email">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
  					</div>
                    
 					<div class="form-group">
    					<input type="password" class="form-control" placeholder="Mot de passe" name="password" for="password" :value="__('Password')" required autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
  					</div>

                    <div class="captcha">
                        <img src="{{ route('captcha.image') }}" id="captchaImage" alt="Captcha" class="rounded shadow" height="40" style="margin-bottom: 1px !important"/>
                        <button type="button" id="refreshCaptcha" class="btn btn-light p-2">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
                    <input id="captcha" class="form-control" type="text" name="captcha">
                    <x-input-error :messages="$errors->get('captcha')" class="mt-2" />
                    
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <div class="recaptcha">
                            {!!htmlFormSnippet()!!}
                        </div>
                    </div>
                    
  					<div class="row">
  						<div class="col-md-6 col-12">
  							<div class="form-group form-check">
    							
    							<label class="form-check-label" for="remember_me">
                                    <input type="checkbox" class="form-check-input" id="remember_me">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
  							</div>
  						</div>
                        @if (Route::has('password.request'))
  						<a href="{{ route('password.request') }}" class="col-md-6 col-12 bn">{{ __('Forgot your password?') }}</a>
                        @endif
  					</div>
  					<div class="form-group mt-3">
  						<button type="submit" class="btn btn-block btn-primary btn-lg"><small><i class="far fa-user pr-2"></i>{{ __('Log in') }}</small></button>
  					</div>
				</form>
                <div class="division">
                    <div class="row">
                        <div class="col-3"><div class="line l"></div></div>
                        <div class="col-6"><span>or login with</span></div>
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