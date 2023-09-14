<?php
session_start();
if(isset($_SESSION['unique_id'])){
    header("location: users.php");
}
?>
<?php
include_once "header.php";
?>
    <body>
<div class="wrapper">
    <section class="form login">
        <header>Empire chat App</header>
        <form action="#">
            <div class="error-txt"></div>
          
                <div class="field input">
                    <lebel>Email address</lebel>
                    <input type="text" name="email" placeholder="Enter your email">
                </div>

                <div class="field input">
                    <lebel>Password</lebel>
                    <input type="password" name="password" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>
                </div>


                <div class="field button">
                    <input type="submit" value="Start chat">
                </div>
        </form>
        <div class="link">Not yet signed up? <a href="index.php">Signup</a></div>
    </section>
</div>
<script src="pass-show-hide.js"></script>
<script src="login.js"></script>
    </body>
</html>