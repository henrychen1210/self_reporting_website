<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

function codestr(){
    $arr=array_merge(range('a','b'),range('A','B'),range('0','9'));
    shuffle($arr);
    $arr=array_flip($arr);
    $arr=array_rand($arr,6);
    $res='';
    foreach ($arr as $v){
        $res.=$v;
}
    return $res;
}

$mail = new PHPMailer(true);       
try {
    //服務器配置
    $mail->CharSet ="UTF-8";                     // 設定郵件編碼
    $mail->SMTPDebug = 0;                        // 調試模式輸出
    $mail->isSMTP();                             // 使用SMTP
    $mail->Host = 'smtp.gmail.com';              // SMTP服務器
    $mail->SMTPAuth = true;                      // 允許 SMTP 認證
    $mail->Username = '';                        // SMTP 用戶名  即信箱的用戶名
    $mail->Password = '';                        // SMTP 密碼  
    $mail->SMTPSecure = 'ssl';                   // 允許 TLS 或者ssl協議
    $mail->Port = 465;                           // 服務器端口 25 或者465 具體要看郵箱服務器支持
    $mail->setFrom('', '');                      // 件人
    $mail->addAddress($Email);                   // 收件人
    $mail->addReplyTo('', '');                   // 回復
    
    $yanzhen = codestr();                        //調用隨機驗證碼函數

    //Content
    $mail->isHTML(true);                         // 是否以HTML文檔格式發送  
    $mail->Subject = 'AiGOAL電子郵件驗證';
    $mail->Body    = '<h1>歡迎使用AiGOAL電子郵件驗證系統</h1><h3>您的驗證碼是：<span>'.$yanzhen.'</span></h3>'.'<br>'.date('Y-m-d H:i:s');
    $mail->AltBody = '歡迎使用AiGOAL電子郵件登錄驗證系統,您的驗證碼是：'.$yanzhen;

    $mail->send();
    echo '驗證郵件發送成功，請注意查收！';
} catch (Exception $e) {
    echo '郵件發送失敗: ', $mail->ErrorInfo;
}
?>