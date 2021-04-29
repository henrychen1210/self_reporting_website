<!DOCTYPE HTML> 
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="../images/icon.png">
	<title>實名制登記</title>
	<link rel="stylesheet" href="../styles/styles1.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body style="text-align: center"> 

	<div id="top">
		<div id="main">
			<img src="../images/logo-2.png" alt="logo" id="logo">

			<h6><b>電子郵件驗證</b><br><br></h6>

			<form method="post" action="yanzhen.php"> 
    			<h4>您的電子郵件：<?php $Email=$_POST['email']; echo $Email;?><br></h4>
    			<h4><span><?php include 'email.php';?></span></h4>
                <h4>（驗證碼共6碼,有分大小寫）<br></h4>
                <!--暫存問卷資料-->
    			<input type="text" name="YanEmail" placeholder="請輸入驗證碼">
    			<input type="hidden" name="yanzhen" value="<?php echo $yanzhen;?>" >  
    			<input type="submit" name="submit" value="驗證" class="btn">

    			<input type="hidden" name="name" value="<?php echo $_POST['name'];?>" >  
    			<input type="hidden" name="phone" value="<?php echo $_POST['phone'];?>" >  
    			<input type="hidden" name="email" value="<?php echo $_POST['email'];?>" >  
    			<input type="hidden" name="department" value="<?php echo $_POST['department'];?>" >  
    			<input type="hidden" name="reception" value="<?php echo $_POST['reception'];?>" >  
    			<input type="hidden" name="contact_person" value="<?php echo $_POST['contact_person'];?>" >  

				<input type="hidden" name="abroad" value="<?php echo $_POST['abroad'];?>" >  
    			<input type="hidden" name="entry_date" value="<?php echo $_POST['entry_date'];?>" >  
    			<input type="hidden" name="source" value="<?php echo $_POST['source'];?>" >  
    			<input type="hidden" name="flight" value="<?php echo $_POST['flight'];?>" >  

    			<input type="hidden" name="symptom" value="<?php $symptomarr = $_POST['symptom']; echo implode(',', $symptomarr);?>" >  
    			<input type="hidden" name="other" value="<?php echo $_POST['other'];?>" >  

                <input type="hidden" name="contact_q1" value="<?php echo $_POST['contact_q1'];?>" >  
				<input type="hidden" name="relation" value="<?php echo $_POST['relation'];?>" >  
    			<input type="hidden" name="abroad_person" value="<?php echo $_POST['abroad_person'];?>" >  
    			<input type="hidden" name="c_entry_date" value="<?php echo $_POST['c_entry_date'];?>" >  
    			<input type="hidden" name="manage" value="<?php echo $_POST['manage'];?>" >  
    			<input type="hidden" name="manage_start" value="<?php echo $_POST['manage_start'];?>" >  
    			<input type="hidden" name="manage_end" value="<?php echo $_POST['manage_end'];?>" >  
    			<input type="hidden" name="abroad_ill" value="<?php echo $_POST['abroad_ill'];?>" >  

    			<input type="hidden" name="contact_q2" value="<?php echo $_POST['contact_q2'];?>" >  
    			<input type="hidden" name="contact_q3" value="<?php echo $_POST['contact_q3'];?>" >  
    			<input type="hidden" name="contact_q4" value="<?php echo $_POST['contact_q4'];?>" >  
			</form>
		</div>
	</div>
</body>
</html>