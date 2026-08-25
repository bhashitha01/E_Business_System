<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/login.css') }}">
    <script src="{{ asset('/login.js') }}" defer></script>
</head>
<body>
    <div class="context" id="context">
        <div class="loginbox log">
            <form action="logindetails.php" method="post" id="form-login">

                <h1>LogIn</h1>
                
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
             <div class="links">
              <a href="#"> <i class="fa-brands fa-google"></i></a>
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
               <a href="#"> <i class="fa-brands fa-linkedin"></i></a>
                <a href="#"><i class="fa-brands fa-github"></i></a>
                
                </div>
                
                
                
                
            </form>
        </div>

        <div class="loginbox re">
            <form action="insertformdata.php" method="post" id="form-register" >

                <h1>Register</h1>

                <div class="input-box">
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Fullname" id="user" name="username" required><br>
                </div>
     
         
               

            <div class="input-box">
                <input type="email" placeholder="Email" id="email" name="email" required><br>
                <i class="fa-solid fa-envelope"></i>
                </div>
             <div class="input-box">
                    <input type="date" placeholder="Birthday" id="birth" name="birth" required><br>
                <i class="fa-solid fa-calendar"></i>
            </div>

                 <div class="input-box">
                    <input type="text" placeholder="MobileNumber" id="mobile" name="mobile" required minlength="10"><br>
                <i class="fa-solid fa-phone"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" id="password" name="password" required minlength="8"><br>
                <i class="fa-solid fa-lock"></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Confirmpassword" id="cpass" required minlength="8"><br>
                <i class="fa-solid fa-check"></i>
            </div>   
               
               <button type="submit" name="register" class="btn">Register</button>

            </form>
        </div>
        <div class="boxfull">
    
            <div class=" pannel box-left">
                <img src="{{asset('images/we.png')}}" alt="Loging png"  class="login-image">
                
                <button class="reg-btn">Register</button>

            </div>
            <div class="pannel box-right">
                <img
                src="{{ asset('images/we.png') }}"alt="Welcome"class="login-image">
                
                <button class="log-btn">Login</button>
            </div>
        </div>
        
    </div>

    </div>
</body>
</html>