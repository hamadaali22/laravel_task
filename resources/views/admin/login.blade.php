@extends('layout.admin_main')
@section('content')

<section class="flexbox-container">
  <div class="col-12 d-flex align-items-center justify-content-center">
    <div class="col-md-4 col-10 box-shadow-2 p-0">
      <div class="card border-grey border-lighten-3 m-0">
        <div class="card-header border-0">
          <div class="card-title text-center">
            <div class="p-1">
              <!-- <img src="../../../app-assets/images/logo/logo-dark.png" alt="branding logo"> -->
            </div>
          </div>
          <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
            <span>تسجيل الدخول</span>
          </h6>
        </div>
        <div class="card-content">
          <div class="card-body">
            @if(session()->has('message'))
            <p style="padding: 20px;
            background-color: #9fe79f;">
            {{Session::get('message')}}</p>
            @endif
            <form class="form-horizontal form-simple"  novalidate method="POST" action="{{route('login')}}">
                @csrf
                <fieldset class="form-group position-relative has-icon-left mb-0">
                  <input type="text" name="email" class="form-control form-control-lg input-lg @error('email') is-invalid @enderror" id="user-name" placeholder="Your Username"
                  required>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  <div class="form-control-position">
                    <i class="ft-user"></i>
                  </div>
                </fieldset>
                <fieldset class="form-group position-relative has-icon-left">

                  <input type="password" name="password" class="form-control form-control-lg input-lg @error('password') is-invalid @enderror" id="user-password"
                  placeholder="Enter Password" required>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  <div class="form-control-position">
                    <i class="la la-lock" onclick="myFunction()"></i>
                  </div>
                </fieldset>
                <div class="form-group row">
                  <div class="col-md-6 col-12 text-center text-md-left">
                    <fieldset>
                    </fieldset>
                  </div>
                  <div class="col-md-6 col-12 text-center text-md-right"><a href="forgot_password" class="card-link">نسيت كلمة المرور</a></div>
                </div>
                <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> تسجيل الدخول</button>
              </form>
          </div>
      </div>
      <div class="card-footer">
        <div class="">
          <!-- <p class="float-sm-left text-center m-0"><a href="recover-password.html" class="card-link">Recover password</a></p> -->
          <p class="float-sm-right text-center m-0">لا تمتلك حساب ؟ <a href="admin-register" class="card-link">حساب جديد الدخول</a></p>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<!-- <i class="fas fa-lock icon" onclick="myFunction()"></i> -->
<script>
function myFunction() {
  var x = document.getElementById("user-password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  console.log(x.type);
}
</script>
@endsection
