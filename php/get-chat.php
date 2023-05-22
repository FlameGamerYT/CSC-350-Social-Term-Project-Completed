<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        
        // Check if the current user has been blocked by the other user
        $block_check_sql = "SELECT * FROM blocked_users WHERE blocker_id = '$incoming_id' AND blocked_id = '$outgoing_id'";
        $block_check_result = mysqli_query($conn, $block_check_sql);

        if(mysqli_num_rows($block_check_result) > 0){
            $output .= "You have been blocked by this user.";
        } else {
            // Fetch chat messages
            $chat_sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                         WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                         OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
            $chat_query = mysqli_query($conn, $chat_sql);
            
            if(mysqli_num_rows($chat_query) > 0){
                while($row = mysqli_fetch_assoc($chat_query)){
                    if($row['outgoing_msg_id'] === $outgoing_id){
                        $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                    </div>';
                    }else{
                        $output .= '<div class="chat incoming">
                                    <img src="php/images/'.$row['img'].'" alt="">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                    </div>';
                    }
                }
            } else {
                $output .= '<div class="text">No messages are available. Once you send a message, it will appear here.</div>';
            }
        }
        
        echo $output;
    }
?>
