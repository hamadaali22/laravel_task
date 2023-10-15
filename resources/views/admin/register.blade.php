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
            <span>تسجيل حساب جديد</span>
          </h6>
        </div>
        <div class="card-content">
          <div class="card-body">
            @if (session('message'))
            <div class="alert alert-success">
              {{ session('message') }}
            </div>
            @endif
            <form class="form-horizontal form-simple" method="POST" action="{{route('register-admin')}}" novalidate>
                @csrf
                <fieldset class="form-group position-relative has-icon-left mb-0">
                  <input type="text" name="name" class="form-control form-control-lg input-lg @error('name') is-invalid @enderror" placeholder="الاسم"
                  required>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </fieldset>
                <fieldset class="form-group position-relative has-icon-left mb-0">
                    <input type="text" name="email" class="form-control form-control-lg input-lg @error('email') is-invalid @enderror"  placeholder="البريد الإلكتروني"
                    required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </fieldset>
                <fieldset class="form-group position-relative has-icon-left mb-0">
                  <input type="password" name="password" class="form-control form-control-lg input-lg @error('password') is-invalid @enderror" id="user-password"
                  placeholder="كلمة المرور" required>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </fieldset>
                <fieldset class="form-group position-relative has-icon-left">
                  <input type="password" name="password_confirmation" class="form-control form-control-lg input-lg @error('password_confirmation') is-invalid @enderror"
                  placeholder="إعادة كلمة المرور" required>
                  @error('password_confirmation')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </fieldset>
                <div class="form-group row">
                <div class="col-md-6 col-12 text-center text-md-left">
                  <fieldset>
                  </fieldset>
                </div>
            </div>
                <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> تسجيل</button>
          </form>
      </div>
      </div>
  <div class="card-footer">
    <div class="">
      <!-- <p class="float-sm-left text-center m-0"><a href="recover-password.html" class="card-link">Recover password</a></p> -->
      <p class="float-sm-right text-center m-0">لديك حساب ؟ <a href="admin-login" class="card-link">تسجيل الدخول</a></p>
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
