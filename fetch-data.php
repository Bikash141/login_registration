<?php
include("configure.php");
$db=$conn;

// fetch query
function fetch_data(){
    global $db;
    $query="SELECT id, reward_coins, coins from user_form";
    $exec=mysqli_query($db, $query);
    if(mysqli_num_rows($exec)>0){
        $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
        return $row;  
    }else{
        return $row=[];
    }
}

$fetchData = fetch_data();
show_data($fetchData);

function show_data($fetchData){
    //echo 'Reward coin: <br>';
    if(count($fetchData)>0){
        foreach($fetchData as $data){ 
            echo "id: ".$data['id']." Reward coin: ".$data['reward_coins']." coins: ".$data['coins']."<br>";
        }
    }else{
        echo "record not found!!"; 
    }
}
?>
