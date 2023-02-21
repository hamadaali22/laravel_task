<!-- 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>


	   
                            <br><br>
                    <form class="form-horizontal form-simple"  novalidate method="POST" action="{{route('login-user')}}">
                         @csrf
                        <div class="form-group d-flex">
                            <i class="fas fa-envelope icon"></i>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            @error('email')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group d-flex">
                            <i class="fas fa-lock icon"></i>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            @error('password')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <a href="{{url('forgot/password')}}" class=" ">Forget your password ?</a>
                        </div>    
                        <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">login</button>
                                </div>
                       
                    </form>
</body>
</html>
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
            	 	<p style="padding: 20px;
    background-color: #9fe79f;">
                                {{Session::get('message')}}</p>
                            @endif

                            @if(Session::has('errorss'))                                
                               <span class="text-danger">{{Session::get('errorss')}}</span>
                            @endif 
            	 
                <form class="bg-white rounded shadow-5-strong p-5"  novalidate method="POST" action="{{route('login-user')}}">
                         @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
<!--                   <input type="email" id="form1Example1" class="form-control" /> -->
                  <input type="email" name="email" id="form1Example1" class="form-control" placeholder="Email">
                  <label class="form-label" for="form1Example1">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="password"  id="form1Example2" class="form-control" />

                  <label class="form-label" for="form1Example2">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                      <label class="form-check-label" for="form1Example3">
                        Remember me
                      </label>
                    </div>
                  </div>

                  <div class="col text-center">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                  </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
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