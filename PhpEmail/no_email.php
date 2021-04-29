<?php

  header("Content-Type:text/html; charset=utf-8");

  $link = mysql_pconnect("", "", ""); //

  if(!$link)
    die("無法建立連線");

  mysql_query("SET NAMES 'UTF8'");
  mysql_select_db("EstiNet_test") or die("無法選擇資料庫"); 
  
  $name = mysql_real_escape_string($_POST['name']);
  $phone = mysql_real_escape_string($_POST['phone']);
  $email = mysql_real_escape_string($_POST['email']);
  $department = mysql_real_escape_string($_POST['department']);

  $query = "INSERT INTO personal_info (name,phone,email,department) VALUES ('$name','$phone','$email','$department')";
  mysql_query($query) or die("無法送出" . mysql_error( ));

  $id = mysql_insert_id();
  $name =  trim($name);
  $update_link='http://chart.apis.google.com/chart?cht=qr&choe=UTF-8&chs=300x300&chl=http://'.$_SERVER['HTTP_HOST'].'/update_page.php?id='.$id;
  $today = date('Y/m/d H:i:s');


  $query = "INSERT INTO important_info (qr_code,update_time) VALUES ('$update_link','$today')";
  mysql_query($query) or die("無法送出" . mysql_error( ));

  $reception = mysql_real_escape_string($_POST['reception']);
  $contact_person = mysql_real_escape_string($_POST['contact_person']);

  $query = "INSERT INTO interviewed_unit (reception, contact_person) VALUES ('$reception','$contact_person')";
  mysql_query($query) or die("無法送出" . mysql_error( ));

  $abroad = mysql_real_escape_string($_POST['abroad']);
  $entry_date = mysql_real_escape_string($_POST['entry_date']);
  $source = mysql_real_escape_string($_POST['source']);
  $flight = mysql_real_escape_string($_POST['flight']);

  $query = "INSERT INTO travel_history (abroad,entry_date,source,flight) VALUES ('$abroad','$entry_date','$source','$flight')";
  mysql_query($query) or die("無法送出" . mysql_error( ));

  $symptomarr = $_POST['symptom']; 
  $symptom = implode(',', $symptomarr);
  $other = mysql_real_escape_string($_POST['other']);
  
  $query = "INSERT INTO symptom (code, other) VALUES ('$symptom','$other')";

  mysql_query($query) or die("無法送出" . mysql_error( ));

  $contact_q1 = mysql_real_escape_string($_POST['contact_q1']);
  $relation = mysql_real_escape_string($_POST['relation']);
  $abroad_person = mysql_real_escape_string($_POST['abroad_person']);
  $c_entry_date = mysql_real_escape_string($_POST['c_entry_date']);
  $manage = mysql_real_escape_string($_POST['manage']);
  $manage_start = mysql_real_escape_string($_POST['manage_start']);
  $manage_end = mysql_real_escape_string($_POST['manage_end']);
  $abroad_ill = mysql_real_escape_string($_POST['abroad_ill']);

  $contact_q2 = mysql_real_escape_string($_POST['contact_q2']);
  $contact_q3 = mysql_real_escape_string($_POST['contact_q3']);
  $contact_q4 = mysql_real_escape_string($_POST['contact_q4']);

  $query = "INSERT INTO contact_history (contact_q1,relation,abroad_person,c_entry_date,manage,manage_start,manage_end,abroad_ill,contact_q2,contact_q3,contact_q4) VALUES ('$contact_q1','$relation','$abroad_person','$c_entry_date','$manage','$manage_start','$manage_end','$abroad_ill','$contact_q2','$contact_q3','$contact_q4')";
  mysql_query($query) or die("無法送出" . mysql_error( ));

  mysqli_close($link);

  $url = "../success.html";  //轉跳至成功畫面
  echo "<script>";
  echo "window.location.href='$url'";
  echo "</script>"; 

?>