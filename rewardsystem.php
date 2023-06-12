<?php
include 'configure.php';
session_start();

$userId = $_SESSION["logid"];
$sql = "SELECT * FROM user_form WHERE id = '{$userId}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Button Counter</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="button-counter.js"></script>
	<link rel="stylesheet" type="text/css" href="button-counter.css">
    <style>
        .button-container {
	display: inline-block;
	margin: 10px;
}

#button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
  height: 40px;
  width: 60px;
}

#button1:hover {
  background-color: #4CAF50;
  color: white;
}

#button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
  height: 40px;
}

#button2:hover {
    background-color: #4CAF50;
  color: white;
}

#button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
  height: 40px;
}

#button3:hover {
    background-color: #4CAF50;
  color: white;
}

#button4 {
  background-color: white;
  color: black;
  border: 2px solid #4CAF50;
  height: 40px;
}

#button4:hover {background-color: #4CAF50;
    color: white;;}

#totalCount{
    color: red;
    text-size: 2px;
}
    </style>
</head>
<body>
	<div class=" btn btn-primary button-container " >
		<button id="button1" class="btn btn-primary" style="width: 100px">Share</button>
		<p>count: <span id="count1">0</span></p>
	</div>
	<div class="btn btn-primary button-container">
		<button id="button2" class="btn btn-primary" style="width: 100px">Prod Reg</button>
		<p>count: <span id="count2">0</span></p>
	</div>
	<div class=" btn btn-primary button-container ">
		<button id="button3" class="btn btn-primary" style="width: 100px">Review</button>
		<p>count: <span id="count3">0</span></p>
	</div>
	<div class="btn btn-primary button-container">
		<button id="button4" class="btn btn-primary" style="width: 100px">Invite</button>
		<p>count: <span id="count4">0</span></p>
	</div><br>
    <i>100 coins = ₹1.0</i><br><br>
    <form id="main">
	<p>Reward points: <span id="totalCount"><h3 color = "red"><?php echo $row['reward_coins'];?></h3></span></p>
    <input type="hidden" id="totalPointsInput" name="totalPointsInput" value="<?php echo $row['reward_coins'];?>">
    <p>Total Rupees: <span id="totalRupees"><h3><?php echo $row['coins'];?></span></h3></p> 
    <input type="hidden" id="totalRupeesInput" name="totalRupeesInput" value="<?php echo $row['coins'];?>">
</form>
    <div id="show-data"></div><br>
    <input type="submit" id="converter" disabled value="Converter" >
	</div>
	<script>
		$(document).ready(function() {
			//alert("kjbgg");
			var count1 = 0;
			var count2 = 0;
			var count3 = 0;
			var count4 = 0;
			var totalCount = 0;
			var totalRupees = 0;

			$("#button1").click(function() {
				count1 += 1;
				totalCount += 10;
				$("#count1").text(count1);
				$("#totalCount").text(totalCount);
				updateRupees();
			});
			$("#button2").click(function() {
				count2 += 1;
				totalCount += 10;
				$("#count2").text(count2);
				$("#totalCount").text(totalCount);
				updateRupees();
			});
			$("#button3").click(function() {
				count3 += 1;
				totalCount += 10;
				$("#count3").text(count3);
				$("#totalCount").text(totalCount);
				updateRupees();
			});
			$("#button4").click(function() {
				count4 += 1;
				totalCount += 10;
				$("#count4").text(count4);
				$("#totalCount").text(totalCount);
				updateRupees();
			});


	function updateRupees() {
    totalRupees = Math.floor(totalCount / 100);
    $("#totalRupees").text(totalRupees);
    $("#totalRupeesInput").val(totalRupees);
    $("#totalPointsInput").val(totalCount);
    if (totalRupees >= 1) {
        $("#converter").prop("disabled", false);
    } else {
        $("#converter").prop("disabled", true);
    }
}

   $("#converter").on("click",function(e){
    e.preventDefault();
    var point = $("#totalPointsInput").val();
    var rupeess = $("#totalRupeesInput").val();

    if (rupeess >= 1) {
					var convertedRupees = Math.floor(totalCount / 100);
					totalCount -= convertedRupees * 100;
					//console.log(totalCount);
					$("#totalCount").text(totalCount);
				}
    $.ajax({
        url : "reward.php",
        type : "POST",
        data : {reward_coins:totalCount,coins:rupeess},
        success : function(data){
            //$("#show-data").html(data);
            $("#show-data").html("Total Reward Coins: " + totalCount + "<br>Total Rupeess: " + rupeess);
            //$("#show-data").html("Reward coin: " + point + "<br>Coins: " + rupeess + "<br>" + data); 
            alert("Data inserted successfully");

            $("#main").hide();
        }
    });
});
		});
	</script>
    <script type="text/javascript" src="js/jquery.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
