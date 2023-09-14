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
    <section class="form signup">
        <header>Empire chat App</header>
        <form action="#" enctype="multipart/form-data" autocomplete="off">
            <div class="error-txt">This is an error messege</div>
            <div class="name-details">

                <div class="field input">
                    <lebel>First Name</lebel>
                    <input type="text"  name="fname" placeholder="First Name" required>
                </div>

                <div class="field input">
                    <lebel>Last Name</lebel>
                    <input type="text" name="lname" placeholder="Last Name" required>
                </div>
                </div>

                <div class="field input">
                    <lebel>Email address</lebel>
                    <input type="text" name="email" placeholder="Enter email" required>
                </div>

                <div class="field input">
                    <lebel>Password</lebel>
                    <input type="password" name="password" placeholder="Enter password" required>
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field image">
                    <lebel>Select Display Picture</lebel>
                    <input type="file" name="image" required>
                </div>

                <div class="field button">
                    <input type="submit" value="Start chat">
                </div>
        </form>
        <div class="link">Already signed up? <a href="login.php">Login</a></div>
    </section>
</div>
<script src="pass-show-hide.js"></script>
<script src="signup.js"></script>
    </body>
</html>