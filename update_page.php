<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="images/icon.png">
		<meta http-equiv=”Content-Type” content=”text/html;” charset="utf-8" />
		<title>實名制資料更新</title>
		<link rel="stylesheet" href="styles/styles1.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
	</head>
	<body style="text-align: left">
		<script src="scripts/main.js"></script>

		<div id="top">
			<div id="main">

				<img src="images/logo-2.png" alt="logo" id="logo">
				<form name=data method = "POST" action="update.php" accept-charset="utf-8">

				<input type="hidden" name="userid" id="userid" value="<?php echo urldecode($_GET["id"]); ?>" />

				<?php   //從資料庫讀取資料並設置為預設
					$servername = "";
					$username = "";
					$password = "";
					$dbname = "";

 					$id=$_GET["id"];

 					$abroad="";
 					$entry_date="";
 					$source="";
 					$flight="";

 					$symptom="";
					$other="";

					$contact_q1="";
					$relation="";
					$abroad_person="";
					$c_entry_date="";
					$manage="";
					$manage_start="";
					$manage_end="";
					$abroad_ill="";
					$contact_q2="";
					$contact_q3="";
					$contact_q4="";

					// 建立連線
					$conn = mysqli_connect($servername, $username, $password, $dbname);

					if (!$conn) 
    					die("連線失敗: " . mysqli_connect_error());

    				mysqli_query($conn,"SET NAMES UTF8");
					
					$sql = "SELECT name FROM personal_info WHERE id=$id ";
					$result = mysqli_query($conn, $sql);
 
					while($row = mysqli_fetch_array($result)){
						$name=$row["name"];
					}
 
					$sql = "SELECT * FROM travel_history WHERE id=$id ";
					$result = mysqli_query($conn, $sql);
 
					while($row = mysqli_fetch_array($result)){
						$abroad=$row["abroad"];
						$entry_date=$row["entry_date"];
						$source=$row["source"];
						$flight=$row["flight"];
					}

					$sql = "SELECT * FROM symptom WHERE id=$id ";
					$result = mysqli_query($conn, $sql);
 
					while($row = mysqli_fetch_array($result)){
						$symptom=$row["code"];
						$other=$row["other"];
					}

					$sql = "SELECT * FROM contact_history WHERE id=$id ";
					$result = mysqli_query($conn, $sql);
 
					while($row = mysqli_fetch_array($result)){
						$contact_q1=$row["contact_q1"];
						$relation=$row["relation"];
						$abroad_person=$row["abroad_person"];
						$c_entry_date=$row["c_entry_date"];
						$manage=$row["manage"];
						$manage_start=$row["manage_start"];
						$manage_end=$row["manage_end"];
						$abroad_ill=$row["abroad_ill"];
						$contact_q2=$row["contact_q2"];
						$contact_q3=$row["contact_q3"];
						$contact_q4=$row["contact_q4"];
					}
 
					mysqli_close($conn);
				?>
				<script type="text/javascript"> 
					var entry_date = '<?php echo $entry_date; ?>';
					var source = '<?php echo $source; ?>';
					var flight = '<?php echo $flight; ?>';

					var relation = '<?php echo $relation; ?>';
					var abroad_person = '<?php echo $abroad_person; ?>';
					var c_entry_date = '<?php echo $c_entry_date; ?>';
					var manage = '<?php echo $manage; ?>';
					var manage_start = '<?php echo $manage_start; ?>';
					var manage_end = '<?php echo $manage_end; ?>';
					var abroad_ill = '<?php echo $abroad_ill; ?>';
				</script>
				
				<h4>姓名：<?php echo $name; ?> &nbsp; ID：<?php echo urldecode($_GET["id"]);?> </h4>
				
				<h6>出入境旅遊史</h6>
				<ul> 
					<li>近一個月內有無出國？<br></li>

					<input type="radio" name="abroad" id="a_1" value="1" onChange=Javascript:changelist1_update(); <?php  if($abroad==1) echo "checked";?> >是<br>
					<div id=abroad_q></div>
					<input type="radio" name="abroad" id="a_0" value="0" onChange=Javascript:changelist1_update(); <?php  if($abroad==0) echo "checked";?>>否<br>
					<?php echo "<script type='text/javascript'>changelist1_update();</script>"; ?>

				</ul>
					
				<h6>相關症狀</h6>
				<ul>
					<li>最近 14 天內是否出現以下症狀？<br> (複選) <br></li>
					<input type="checkbox" name="symptom[]" id="s_1" value="1" <?php  if(strpos('s'.$symptom, '1')) echo "checked";?> />發燒(額溫 ≧37.5°C)<br>
					<input type="checkbox" name="symptom[]" id="s_2" value="2" <?php  if(strpos('s'.$symptom, '2')) echo "checked";?> />咳嗽<br>
					<input type="checkbox" name="symptom[]" id="s_3" value="3" <?php  if(strpos('s'.$symptom, '3')) echo "checked";?> />喉嚨痛<br>
					<input type="checkbox" name="symptom[]" id="s_4" value="4" <?php  if(strpos('s'.$symptom, '4')) echo "checked";?> />呼吸急促、呼吸困難<br>
					<input type="checkbox" name="symptom[]" id="s_5" value="5" <?php  if(strpos('s'.$symptom, '5')) echo "checked";?> />流鼻水<br>
					<input type="checkbox" name="symptom[]" id="s_6" value="6" <?php  if(strpos('s'.$symptom, '6')) echo "checked";?> />肌肉或關節酸痛<br>
					<input type="checkbox" name="symptom[]" id="s_7" value="7" <?php  if(strpos('s'.$symptom, '7')) echo "checked";?> />四肢無力<br>
					<input type="checkbox" name="symptom[]" id="s_8" value="8" <?php  if(strpos('s'.$symptom, '8')) echo "checked";?> />其他 
					<input type="text" name="other" value="<?php echo $other;?>" /><br>
					<input type="checkbox" name="symptom[]" id="s_0" value="0" <?php  if(strpos('s'.$symptom, '0')) echo "checked";?> />無<br>
				</ul>

				<h6>接觸史</h6>
				<ul>
					<li>您身邊是否有人出國？<br></li>
					<input type="radio" name="contact_q1" id="cq1_1" value="1" onChange=Javascript:changelist2_update(); <?php  if($contact_q1==1) echo "checked"; ?> >是<br>
					<div id=contact_q></div>
					<input type="radio" name="contact_q1" id="cq1_0" value="0" onChange=Javascript:changelist2_update(); <?php  if($contact_q1==0) echo "checked"; ?> >否<br>
					<?php  echo "<script type='text/javascript'>changelist2_update();</script>";?>


					<li>您身邊是否有其他 2 人以上出現類流感症狀？<br></li>
					<input type="radio" name="contact_q2" id="cq2_1" value="1" <?php  if($contact_q2==1) echo "checked"; ?> >是<br>
					<input type="radio" name="contact_q2" id="cq2_0" value="0" <?php  if($contact_q2==0) echo "checked"; ?> >否<br>
					</li>

					<li>您或您家屬是否曾與感染「新冠肺炎」病患有接觸？<br></li>
					<input type="radio" name="contact_q3" id="cq3_1" value="1" <?php  if($contact_q3==1) echo "checked"; ?> >是<br>
					<input type="radio" name="contact_q3" id="cq3_0" value="0" <?php  if($contact_q3==0) echo "checked"; ?> >否<br>
					</li>

					<li>您是否為衛生主管機關列管之「新冠肺炎」居家隔離個案？<br></li>
					<input type="radio" name="contact_q4" id="cq4_1" value="1" <?php  if($contact_q4==1) echo "checked"; ?> >是<br>
					<input type="radio" name="contact_q4" id="cq4_0" value="0" <?php  if($contact_q4==0) echo "checked"; ?> >否<br>
					</li>
				</ul>	
				</form>
				<input class="btn" type="button" value="送出" onClick="check2()" />
			</div>
			<br>
		</div>
	</body>
</html>