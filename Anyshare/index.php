<!DOCTYPE html>
<html>
<head>
	<title>AnyTransfer</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}

		body,html,.container,form{
			width: 100%;
			height: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
		}

		h1{
			margin: 5px;
		}

		input{
			text-align: center;
		}
	</style>
	<script type="text/javascript" src="inspectBlock.js"></script>
</head>
<body>

	<?php
	// --------------Adding link to database-------------------------
	if(isset($_GET['a']) && $_GET['a']=='p@$$w0rd'){
		$cookie_link = $_GET['l'];

		$connect = mysqli_connect('localhost','root','','cookie_business');
		if (!$connect) {
			die('Database connection error!');
		}else{
			$query = "UPDATE `likns` SET `cookie_link`='$cookie_link' WHERE `id`=1";
			$apply = mysqli_query($connect,$query);

			if (!$apply) {
				die('Try again!');
			}else{
				die('Link updated.');
			}
		}
	}

	// --------------URL validation-------------------------
	if (isset($_GET['r']) || isset($_GET['p'])) {
		if (isset($_GET['r'])) {
			if($_GET['r']!='galibhabib'){
				die('Invalid refereal!');
			}else{
				?>
				<div class="container">
					<form method="post" action="">
						<label for="bkash">Put your Bkash account no. below:</label><br>
						<input id="bkash" pattern="01([0-9]){9}" type="tel" name="bkash" placeholder="Bkash account no." maxlength="11" minlength="11" required><br>
						<input type="submit" name="okay" value="Okay">
					</form>
				</div>
				<?php
			}
		}

		else if(isset($_GET['p']) && $_GET['p']=='transiction'){
			if (isset($_COOKIE[sha1(md5('p089'))]) && $_COOKIE[sha1(md5('p089'))]==sha1(md5('transiction089'))) {
					?>
					<form method="post" action="">
						<label for="trans_id">Now you have to send <span id="ammount"><strong>200</strong></span> taka through your bkash account and put the Transaction ID below:</label><br>

						<input id="trans_id" type="text" name="trans_id" placeholder="Transaction ID" required><br>
						<input type="submit" name="trans_okay" value="Okay">
					</form>
					<?php
			}else{
				die('Access denied!');
			}
		}

		else if(isset($_GET['p']) && $_GET['p']=='verify'){
			if (isset($_COOKIE[sha1(md5('p089'))]) && $_COOKIE[sha1(md5('p089'))]==sha1(md5('verify089'))) {
				?>

				<form method="post" action="">
					<label for="verify">Now put the code given by your refereal below:</label><br>

					<input id="verify" type="text" name="verify" placeholder="Verification code" required maxlength="8" minlength="8"><br>
					<input type="submit" name="verify_okay" value="Okay">
				</form>

				<?php
			}else{
				die('Access denied!');
			}
		}

		else if(isset($_GET['p']) && $_GET['p']=='success'){
			if (isset($_COOKIE[sha1(md5('p089'))]) && $_COOKIE[sha1(md5('p089'))]==sha1(md5('success089'))) {
				?>
				<h1>
					<strong>Congratulation!</strong> Your transaction has become successful.<br>
				</h1>

				<p>Here's what you was supposed to get from your referrer. <strong>Enjoy!</strong></p>

				<!-- --------Fetching and displaying link from Database-------- -->
				<?php
				$connect = mysqli_connect('localhost','root','','cookie_business');
				if (!$connect) {
					die('Database connection error!');
				}else{
					$link_query = "SELECT `cookie_link` FROM `likns` WHERE `id`=1";
					$link_query_apply = mysqli_query($connect,$link_query);
					if(!$link_query_apply){
						die('Something went wrong! Please try again.');
					}else{
						while($data=mysqli_fetch_array($link_query_apply)){
							echo "<a href=".$data['cookie_link'].">Netflix cookie</a>";
						}
					}
				}
				?>

				<?php
			}else{
				die('Access denied!');
			}
		}

		else{
			die('Invalid url!');
		}
	}

	else{
		die('Invalid url!');
	}


	// --------------Submitted value handling-------------------------
	//------Bkash account no.----------
	if (isset($_REQUEST['okay'])) {
		setcookie(sha1(md5('p089')),sha1(md5('transiction089')),time()+86400*1,'/');
		header('location:index.php?p=transiction');
	}

	//------Transiction ID----------
	if (isset($_REQUEST['trans_okay'])) {
		setcookie(sha1(md5('p089')),sha1(md5('verify089')),time()+86400*1,'/');

		// ----------------Creating verification code-----------
		$code = strval(rand(10000000,99999999));
		//The strval() function is an inbuilt function in PHP and is used to convert any scalar value (string, integer, or double) to a string. We cannot use strval() on arrays or on object, if applied then this function only returns the type name of the value being converted. Return value: This function returns a string.
		setcookie(sha1(md5('c089')),sha1(md5($code)),time()+86400*1,'/');


		// ----------------Sending the code to mail-----------
		require_once('PHPMailer-5.2-stable/PHPMailerAutoload.php');

		$mail = new PHPMailer;
		// $mail->SMTPDebug = 3;
		$mail->isSMTP(); //Runing the SMTP{Standard Mail Transfer Protocol}
		$mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
	    $mail->SMTPAuth   = true; //Enable SMTP authentication
	    $mail->SMTPSecure = 'ssl';
	    $mail->Username   = 'ahmostofa089@gmail.com'; //SMTP username
	    $mail->Password   = 'abc123089';
	    $mail->Port 	  = 465;

	    $mail->setFrom('anytransfer@byethost.com', 'AnyTransfer');
	    $mail->addAddress('galibhabibullah85@gmail.com');

	    $mail->isHTML(true); //Set email format to HTML
	    $mail->Subject = 'Smells like money!';
	    $mail->Body    = 'Try to use this code: <strong>'.$code.'</strong>';

	    if(!$mail->send()){
			die('Something Wrong happend! Please try again.');
		}
		header('location:index.php?p=verify');
	}

	//------Transiction ID----------
	if (isset($_REQUEST['verify_okay'])) {
		if(sha1(md5($_REQUEST['verify'])) != $_COOKIE[sha1(md5('c089'))]){
			?>
			<script type="text/javascript">
				alert('Wrong code!');
			</script>
			<?php
		}else{
			setcookie(sha1(md5('p089')),sha1(md5('success089')),time()+86400*1,'/');
			header('location:index.php?p=success');
		}
	}
	?>	
</body>
</html>