<?php
 while($row = mysqli_fetch_assoc($sql)){
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
    OR outgoing_msg_id = {$row['unique_id']}) ORDER BY msg_id DESC LIMIT 1";

   $query2 = mysqli_query($con,$sql2);
   $row2 = mysqli_fetch_assoc($query2);
   if(mysqli_num_rows($query2) > 0){
        $result = $row2['msg'];
    }else{
        $result = "No message Available";
    }

    //trimming msg if words of msg r more thn 28
(strlen($result) > 28) ? $msg = substr($result, 0, 28).'...' : $msg = $result;
//adding you before msg if userid and password same
($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
//online offline status
($row['status'] == "offline Now") ? $offline = "offline" : $offline = "";


    $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
    <div class="content">
    <img src="images/'. $row['img'] .'" alt="">
        <div class="details">
            <span>'. $row['fname'] . " " . $row['lname'] .'</span>
            <p style="text-decoration: none;">'. $you . $msg .'</p>
            <br>
    </div>
</div>
<div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
</a>'; 
 }
?>