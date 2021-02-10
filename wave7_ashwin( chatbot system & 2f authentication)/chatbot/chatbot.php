<?php
$conn=mysqli_connect('localhost', 'db1' , 'unyjahypa', 'wave_db1');
?>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>chatbot</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href=" 
https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css 
"> 
    <script src=" 
https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js 
"></script> 
    <script src=" 
https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js 
"></script> 
    <script src=" 
https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js 
"></script> 
    <link rel="stylesheet" href=" 
https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css 
"> 

<!-- <link rel="stylesheet" href="../../cores/css/bootstrap.min.css">

<link rel="stylesheet" href="../../cores/css/font-awesome.min.css">

<link rel="stylesheet" href="../../cores/css/adminpro-custon-icon.css">

<link rel="stylesheet" href="../../cores/css/form/all-type-forms.css">

<link rel="stylesheet" href="../../cores/css/responsive.css"> -->
</head>
<style>
body{
margin:0 auto;
max-width:800px;
padding:0 20px;
}

*{
box-sizing: border-box;
}
/* Button used to open the chat form - fixed at the bottom of the page */
.clickchatbot {
background-color: red;
color: white;
padding: 10px 10px;
cursor: pointer;
opacity: 0.8;
position: fixed;
bottom: 23px;
right: 28px;
width: 150px;

}
/* The popup chat - hidden by default */
.chat-popup {
display: block;
position: fixed;
bottom: 0;
right: 15px;
border: 3px solid #f1f1f1;
z-index: 9;

}
/* Add styles to the form container */
.form-container {
width: 300px;
padding: 1px;
background-color: white;

}
/* Set a style for the submit/send button */
.form-container .btn {
background-color: #4CAF50;
color: white;
cursor: pointer;
width: 100%;
margin-bottom:1px;
opacity: 0.9;
}
/* Add a red background color to the cancel button */
.form-container .cancel {
background-color: red;
}
/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
opacity: 1;
}
.container1 {

background-color: #ADD8E6;
border:2px solid #dedede;
border-radius: 16px;
padding:5px;
margin-left: 135px;
width: 130px;
}

.container2 {

background-color: #ADD8E6;
border:2px solid #dedede;
border-radius: 16px;
padding:5px;
margin-right: 135px;
width: 130px;
}


.container1::after {
content:"";
clear:both;
display:table;
}

.container2::after {
content:"";
clear:both;
display:table;
}

#message{
	margin-top: 0px;
    margin-bottom: 0rem;
    font-size: 10px;
}

#chatmsg{
	font-weight: bold;
}


.time{
float: right;
color:#aaa;
margin-right: 10px;
font-size: 7px;
}

.mb-3, .my-3 {
    margin-bottom: 0.5rem!importa 22px;
}


div .sticky{
position: -webkit-sticky;
position: sticky;
background-color: #ddd;
padding:10px 0 0 10px;
font-size: 10px;
}

.square{
height:180;
width: 292px;
padding:1px;
background-color:#fff;
border:2px solid #dedede;
max-height: 28rem;
overflow: auto;
}

</style>
</head>
<body>
<button class="clickchatbot" onclick="clickchatbot()">Click to chat</button>

	<div class="chat-popup form-container" id="myForm">

			<center><p id="chatmsg">Chat Messages</p></center>
			<div class="square" id="square">
				
				

				<span id="ref">

				<?php
				$query="select * from chats ORDER by date ASC";
				$res=mysqli_query($conn,$query);
				while($data=mysqli_fetch_array($res))
				{
				$user=$data['user'];
				$chatbot=$data['chatbot'];
				$date=$data['date'];
				?>
				
				<div class="container1">
					<div class="d-flex">
						<p id="message" class="txt-primary"><?php echo $user; ?></p>
					</div>
					<center><span class="time"><?php echo $date; ?></span></center>	
				</div>
				<br>
				<div class="container2">
					<div class="d-flex">
						<p id="message" class="txt-primary"><?php echo $chatbot; ?></p>
					</div>
					<center>
						<span class="time" ><?php echo $date; ?></span>
					</center>
				</div>
				<br>
				<?php } ?>
				</span>
				</div>
				
				
				<div class="sticky">
					<div class="row">
						<div class="col-md-12">
							<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="type your message" id="msg" >
									<div class="input-group-append">
										<button type="button" class="btn btn-outline-secondary" onclick="send()" style="margin-right: 10;" id="send">Send</button>
									</div>
							</div>
						</div>
					</div>
				</div>
				<button type="button" class="btn cancel" onclick="closebot()">Close</button>
			</div>
		
	</div>
</body>
</html>

<script>

function send()
{
var text=$('#msg').val().toLowerCase();
$.ajax({
type:"post",
url:"mysearch.php",
data:{"text":text},
success:function(data){
$("#ref").load("#ref");

}
});
}

function clickchatbot() 
{
document.getElementById("myForm").style.display = "block";
}

function closebot() 
{
document.getElementById("myForm").style.display = "none";
}
$('.square').scrollTop($('.square')[0].scrollHeight);
</script>
</body>
</html>