<?php
session_start();
include_once "config.php";

$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

if( !empty($fname) && !empty($lname) && !empty($email) && !empty($password))
{
//now chk email validation
if(filter_var($email, FILTER_VALIDATE_EMAIL))//if email is valid
{
//now chk if the entered email is already exists in database
  $sql = mysqli_query($con, "SELECT email FROM users WHERE email = '{$email}'");

  if(mysqli_num_rows($sql) > 0)
  echo "$email - This email already exists !!";
else
{
    //chk for image
    if(isset($_FILES['image']))//if img uploaded
    {

        $img_name = $_FILES['image']['name'];//to get user uploaded img name
        $tmp_name = $_FILES['image']['tmp_name'];//tmp name of image to move/save

        //lets chk for extensions

        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);

   $extensions =array("png", "jpg", "jpeg");//valid extensions so,we stored it in an array
        if(in_array($img_ext,$extensions) === true)//if user uploaded img extension matched with any one of valid extensions present in array
        {
                $time = time();//this will return crnt tym,we need it bcz we will save img name as current tym in database(only name),real image will not be saved in database,it will be saved in particular folder we specify
                $new_img_name = $time.$img_name;

              if(move_uploaded_file($tmp_name, "images/".$new_img_name))//if user uploaded img successfully stored in our specified folder
              {
                $status = "Online";//then user will be visilbe online
                $random_id = rand(time(),10000000);//create random id for user

                //now insert all user info into table(users) of database
                $sql2 = mysqli_query($con ,"INSERT INTO users (unique_id, fname, lname, email, password ,img , status)
                                    VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}','{$status}')");
                if($sql2)//if all data inserted
                {
                    $sql3 = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}'");
                    if(mysqli_num_rows($sql3) > 0)
                    $row = mysqli_fetch_assoc($sql3);
                   $_SESSION['unique_id'] = $row['unique_id'];
                   echo "ho";
                }
                else
                {
                    echo "Something Went Wrong !";
                }

              }

        }
        else{
            echo "Plese select an image file jpg ,png or jpeg";
        }



    }
    else{
        echo "Please Select an Image file ";
    }
}
}
else{

    echo " $email - email is invalid !!";
}
}
else
{
    echo "All input fields are required ,please fill carefully!!";
}
?>