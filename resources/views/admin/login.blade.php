<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('loadmin/alog.css') }}">
    <script src="{{ asset('/loadmin/alog.js') }}" defer></script>
</head>
<body>
    <div class="context" id="context">
        <div class="loginbox log">
            <form action="{{route('admin.login.submit')}}" method="post" id="form-login">
                @csrf
                <h1> Admin LogIn</h1>
                
              <div class="input-box">
                <i class="fa-solid fa-user"></i>
                <input type="email" placeholder="Username" name="email" required><br>
             </div>
                <div class="input-box">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Password" name="password" required minlength="8"><br>
               </div>

                <div class="Rember">
                <label> <input type="checkbox"> Remeber Me </label> <a href="#">Forgot Password?</a> <br>
                </div>
                <button type="submit" name="login" class="btn">LogIn</button>
<br>
             
                
                
                
                
            </form>
        </div>

        
        <div class="boxfull">
    
            <div class=" pannel box-left">
                <img src="{{asset('images/we.png')}}" alt="Loging png"  class="login-image">
                
                

            </div>
            
        </div>
        
    </div>

    </div>
</body>
</html>