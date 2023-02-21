

<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>



@if(session()->has('message'))
                      {{Session::get('message')}}
                    @endif
                    @if (count($errors) > 0)
                       <div class="alert alert-danger">
                           <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>خطا</strong>
                          <ul>
                             @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                             @endforeach
                          </ul>
                      </div>
                    @endif
                    @if(Session::has('errorss'))
                     <div class="row mr-2 ml-2" style="background-color: #ff909f" >
                      <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2" id="type-error" style="color: #9f0c21;font-size: 13px">
                         {{Session::get('errorss')}}
                      </button>
                     </div>
                     @endif




     <form method="POST" action="{{route('user-signup')}}" enctype="multipart/form-data">
                                @csrf
                            
                        <div class="form-group">
                            
                            <i class="fas fa-user icon"></i>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-envelope icon"></i>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="{{__('front.email')}}" >
                        </div>

                        <div class="form-group">
                            
                            <i class="fas fa-lock icon" ></i>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="password" id="user-password">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-lock icon" ></i>

                            <input type="password" name="confirm_password" id="user-password-confirm" class="form-control" placeholder="confirm password">
                        </div>

                        
                       
                        <button type="submit" class="w-100 btn header-btn text-large font-weight-bold mb-4" id="agreem_submit"  >تسجيل عضو جديد</button>
                   
                    </form>





                    <div class=" bg-light text-center mt-2 pt-2 pb-2">
                                <a class="dropdown-item main-color font-weight-600 text-medium" href="{{ route('signoutinstructors') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                    {{__('front.logout')}}
                                </a>
                                <form id="logout-form" action="{{ route('signoutinstructors') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </div>
                   
</body>
</html>

 -->

<!-- 
   <div class=" bg-light text-center mt-2 pt-2 pb-2">
                                <a class="dropdown-item main-color font-weight-600 text-medium" href="{{ route('signoutinstructors') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                    {{__('front.logout')}}
                                </a>
                                <form id="logout-form" action="{{ route('signoutinstructors') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </div>
                    -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
      <!--Main Navigation-->
  <header>
    <style>
      #intro {
        background-image: url(https://mdbootstrap.com/img/new/fluid/city/008.jpg);
        height: 100vh;
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }
    </style>

  

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
                 @if(session()->has('message'))
                      {{Session::get('message')}}
                    @endif
                    @if (count($errors) > 0)
                       <div class="alert alert-danger">
                           <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          <!-- <strong>خطا</strong> -->
                          <ul>
                             @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                             @endforeach
                          </ul>
                      </div>
                    @endif
                    @if(Session::has('errorss'))
                     <div class="row mr-2 ml-2"  >
                      <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2" id="type-error" style="color: #9f0c21;font-size: 13px">
                         {{Session::get('errorss')}}
                      </button>
                     </div>
                     @endif
                <form class="bg-white rounded shadow-5-strong p-5" method="POST" action="{{route('user-change-password')}}" enctype="multipart/form-data">
                         @csrf
                <!-- Email input -->
                <div class="form-group"> 
                    <input type="password" name="current-password" value="{{ old('current-password') }}"  class="form-control" placeholder="current password" >
                </div><br>
                <div class="form-group"> 
                    <input type="password" name="new-password" value="{{ old('current-password') }}" class="form-control" placeholder="new password" >
                </div><br>

                

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">save</button>
              </form>



            </div>
          </div>
        </div>
      </div>


    </div>
    <!-- Background image -->
  </header>
  <!--Main Navigation-->

 
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>