<?php
	session_start() ;
	$user = "test" ;
	$pass = "test123" ;
	if(isset($_POST['submit']))
	{		
		if($_POST['user'] == $user && $_POST['pass'] == $pass)
		{
			$_SESSION['status']=1 ;
		}
		else
		{
			$_SESSION['status']=0 ;
		}
	}
	if(isset($_SESSION['status']))
	{
		if($_SESSION['status']==1)
		{
			show() ;
			exit() ;
		}
		else
		{
			signin() ;
			exit() ;
		}
	}
	else{
		signin() ;
		exit() ;
	}
?>
<?php
function signin()
{
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Login</title>
</head>
<body>
	<h1>You need to login to continue.</h1>
	<fieldset>
		<legend>Login</legend>
		<form method="POST" action="index.php">
			Username: <input type="text" name="user" />
			Password: <input type="password" name="pass" />
			<input type="submit" value="Login" name="submit" />
		</form>
	</fieldset>
</body>
</html>
<?php
}
function show()
{
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css" >
		<title>
			About me
		</title>
	</head>
	<body>
			<nav id="left-bar">
				<ul>
					<li><a href="#aboutme">About me</a></li>
					<li><a href="#work">Work and Education</a></li>
					<li><a href="#achieve">Achievements</a></li>
					<li><a href="#contact">Contact me</a></li>
				</ul>
			</nav>
			<div class = "data" >
				<div class="data1" id="aboutme" >
				<h1>About me</h1>
				<img id="pic" src="files/Arpit.jpg" alt="Arpit" title="Arpit" />
				<table class="formdata">
					<tr>
						<th>
							Name
						</th>
						<td>:</td>
						<td>
							Arpit Singla
						</td>
					</tr>
					<tr>
						<th>
							Branch
						</th>
						<td>:</td>
						<td>
							Electrical Engineering	
						</td>
					</tr>
					<tr>
						<th>
							Year
						</th>
						<td>:</td>
						<td>
							I<sup>st</sup> year B.Tech
						</td>
					</tr>
					<tr>
						<th>
							College
						</th>
						<td>:</td>
						<td>
							Indian Institute of Technology, Roorkee
						</td>
					</tr>
					<tr>
						<th>
							Enrollment no.
						</th>
						<td>:</td>
						<td>
							14115024
						</td>
					</tr>
					<tr>
						<th>
							Date of Birth
						</th>
						<td>:</td>
						<td>
							August 27, 1996
						</td>
					</tr>
					<tr>
						<th>
							Hometown
						</th>
						<td>:</td>
						<td>
							Sri Ganganagar, Rajasthan
						</td>
					</tr>
					<tr>
						<th>
							Time for next Birthday
						</th>
						<td>:</td>
						<td id="timeForBday">
							
						</td>
					</tr>
				</table>
				</div>
				<div class="data1" id="work">
					<div class="para">
						<h1>Work and Education</h1>
						<p>Started my education in Brightlands Convent School, Sri Ganganagar.</p>
						<p>Studied in Sacred Heart Convent School, Sri Ganganagar from Standard 7<sup>th</sup> to Standard 10<sup>th</sup>.</p>
						<p>Got CGPA 10 in Standard 10<sup>th</sup>.</p>
						<p>Joined Perfect Education, Sri Ganganagar in 2012 for the preparation of JEE(Advanced)-2014 with a fake admission in school. </p>
						<p>12<sup>th</sup> Board CBSE Percentage  :  93.2% <//p>
						<p>Will hopefully be qualified as an Electrical Engineer in 2018. </p>
					</div>
				</div>
				<div class = "data1" id="achieve" >
					<h1>Achievements</h1>
					<h2>My Greatest Achievement</h2>
					<div style="text-align:center">
					<img class="imgs" src="files/iitr.jpg" alt="Indian Institute of Technology, Roorkee" title="Indian Institute of Technology, Roorkee" />
					</div>
					<div class="para">
						<p>
							Cracked IIT-JEE(Advanced)-2014 with an All India Rank of 1422.
						</p>
						<p>
							Based upon my All India JEE(Advanced) Rank, I got admission in 4 year B.Tech. in Electrical Engineering at Indian Institute of Technology, Roorkee
						</p>
					</div>
					<h2>Salamis Abacus</h2>
					<img class="imgs" src="files/salamis.JPG" alt="Salamis Abacus" title="Salamis Abacus" />
					<div class="para">
						<p>
							Got Rank 1 in Salamis National Level Competition.
						</p>
					</div>
					<h2>SDSLabs</h2>
					<img src="files/sds.jpg" class="imgs" alt="SDSLabs" title="SDSLabs" width="150px" height="150px" />
					<div class="para">
						<p>
							Selected as a member of SDSLabs in 2015.
						</p>
					</div>
				</div>
				<div class="data1" id="contact" >
					<h1>Contact Me</h1>
					<table class="formdata">
					<tr>
						<th rowspan="2">Mobile no.</th>
						<td>Uttrakhand</td>
						<td>+917060334198</td>
					</tr>
					<tr>
						<td>Rajasthan</td>
						<td>+918740897848</td>
					</tr>
					<tr><th></th></tr><tr><th></th></tr>
					<tr>
						<th>Email</th><td></td><td>arpit270896@gmail.com</td>
					</tr>
				</table>
				</div>
			</div>
			<script>
			function time()
			{
				var d = new Date() ;
				var months =  7 - d.getMonth()+1 ;
				var days =  27 - d.getDate() -1 ;
				var hours = 24 - d.getHours() -1 ;
				var mins = 60 - d.getMinutes() -1 ;
				var seconds = 60 - d.getSeconds() -1 ;
				var millisec = 1000 - d.getMilliseconds() ;
				if(months%10 == months)
					months = "0" + months ;
				if(days%10 == days)
					days = "0" + days ;
				if(mins%10 == mins)
					mins = "0" + mins ;
				if(hours%10 == hours)
					hours = "0" + hours ;
				if(seconds%10 == seconds)
					seconds = "0" + seconds ;
				if(millisec%100 == millisec)
					millisec = "0" + millisec ;
				document.getElementById("timeForBday").innerHTML = months + " Months " + days + " Days<br/>" + hours + ":" + mins + ":" + seconds + ":" + millisec ;
			}
			setInterval(time, 1) ;
		</script>
	</body>
</html>

<input style="position:fixed; top:0; right:0; z-index:1;" type="submit" value="Logout" onclick="window.location='./logout.php'" />
<?php
}
?>
