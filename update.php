<?php
  //更新資料庫
  header("Content-Type:text/html; charset=utf-8");
  //建立連線：
  $link = mysql_pconnect("192.168.2.39", "root", "estinet"); //$link宣告連線，mysql_pconnet("主機名稱","資料庫帳號","資料庫密碼");
  //選擇資料庫：
  mysql_query("SET NAMES 'UTF8'");
  mysql_select_db("EstiNet_test") or die("無法選擇資料庫"); // 選擇資料庫：mysql_select_db("資料庫名稱") or die ("失敗顯示字");

  //二、執行SQL語法

  $id = $_POST['userid'];

  $abroad = mysql_real_escape_string($_POST['abroad']);
  $entry_date = mysql_real_escape_string($_POST['entry_date']);
  $source = mysql_real_escape_string($_POST['source']);
  $flight = mysql_real_escape_string($_POST['flight']);

  $query = "UPDATE travel_history SET abroad='$abroad',entry_date='$entry_date',source='$source',flight='$flight' WHERE id=$id LIMIT 1";
  mysql_query($query) or die("無法送出" . mysql_error( ));

  $symptomarr = $_POST['symptom'];
  $allsymptom = implode(',', $symptomarr);

  $other = mysql_real_escape_string($_POST['other']);
  
  $query = "UPDATE symptom SET code='$allsymptom', other='$other' WHERE id=$id LIMIT 1";

  mysql_query($query) or die("無法送出" . mysql_error( ));

  $today = date('Y/m/d H:i:s');

  $query = "UPDATE important_info SET update_time='$today' WHERE id=$id LIMIT 1";
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

  $query = "UPDATE contact_history SET contact_q1='$contact_q1',relation='$relation',abroad_person='$abroad_person',c_entry_date='$c_entry_date',manage='$manage',manage_start='$manage_start',manage_end='$manage_end',abroad_ill='$abroad_ill',contact_q2='$contact_q2',contact_q3='$contact_q3',contact_q4='$contact_q4' WHERE id=$id LIMIT 1";
  mysql_query($query) or die("無法送出" . mysql_error( ));

  mysqli_close($link);

  $url = "success.html";
  echo "<script>";
  echo "window.location.href='$url'";
  echo "</script>"; 
?>