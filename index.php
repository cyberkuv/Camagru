<!DOCTYPE html>
<html>
    <head>
        <title>Capture the World!</title>
        <link rel="stylesheet" href="./css/index.css">
        <link rel="navigation_bar icon" href="image/camagru.png"/>
        <script>
            function home(x) {
                x.style.color = "orangered";
            }

            function nhome(x) {
                x.style.color = "white";
            }
        </script>
    </head>
<body>
<div id="name">
            <div><img onmouseover="home(this)" onmouseout="nhome(this)" class="name" src="./image/camagru.png" alt="name of dev"></div>
            <div><img onmouseover="home(this)" onmouseout="nhome(this)" class="camera" src="./image/camera.png" alt="camera"></div>
            <div class="choose">
                <a href="public-gal.php"><button>Public Gallery!</button></a>
                <button onclick="document.getElementById('id01').style.display='block'">Sign Up</button>
                <button onclick="document.getElementById('id02').style.display='block'">Sign In</button>
                <button onclick="document.getElementById('id03').style.display='block'">Forgot Password?</button>
            </div>
        </div>

        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" method="POST" action="sign_up.php">
            <div class="container">
        <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
        <hr>
            <label for="firstname"><b>Firstname</b></label>
            <input type="text" placeholder="Enter Firstname" name="firstname" required>

            <label for="lastname"><b>Lastname</b></label>
            <input type="text" placeholder="Enter Lastname" name="lastname" required>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Please Repeat priviously entered password!" name="cmp_password" required>
            
            <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>

            <p>By creating an account you agree to our <a href="cond.php" style="color:dodgerblue">Terms & Privacy</a>.</p>

            <div class="clearfix">
                <button type="submit" name="register" class="signupbtn">Sign Up</button>
            </div>
            </div>
        </form>
        </div>

        <div id="id02" class="modal">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" method="POST" action="sign_in.php">
            <div class="container">
        <h1>Sign In</h1>
            <p>Welcome Back Member!</p>
        <hr>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            
            <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>

            <div class="clearfix">
                <button type="submit" name="signin" class="signupbtn">Sign In</button>
            </div>
            </div>
        </form>
        </div>

         <div id="id03" class="modal">
            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" method="POST" action="pass-fgt.php">
            <div class="container">
        <h1>Change Password!</h1>
            <p>Having issues signing in?? not to worry!</p>
        <hr>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>

            <div class="clearfix">
                <button type="submit" name="passfgt" class="signupbtn">Submit!</button>
            </div>
            </div>
        </form>
        </div>

<script>
var modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal = document.getElementById('id02');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal = document.getElementById('id03');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
