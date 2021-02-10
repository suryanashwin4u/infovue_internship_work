<?php
$conn=mysqli_connect('localhost', 'db1' , 'unyjahypa', 'wave_db1');
$server_time=date("Y-m-d H:i:s");
if(isset($_POST['text']))
{
$msg=mysqli_real_escape_string($conn,$_POST["text"]);
$query=mysqli_query($conn,"SELECT * FROM question Where question='$msg'");
$count=mysqli_num_rows($query);
if($count=="0")
{
	$data= "i am sorry but i am not exactly clear about how to help you";
	$sql4=mysqli_query($conn,"insert into chats(user,chatbot,date) values('$msg', '$data', '$server_time')");
}
else
{
	while($row=mysqli_fetch_array($query))
	{
		$data=$row['answer'];
		$sql4=mysqli_query($conn,"insert into chats(user,chatbot,date) values('$msg','$data','$server_time')");
	}
}
}
?>