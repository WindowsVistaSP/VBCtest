<?php
require 'vendor/autoload.php';
$time1 = date('Y-m-d');
$email_fa = '2544851115@qq.com';
$email_fa_mm = 'dqdawrlfxuyeebce';

$email_shou = '1754078634@qq.com';

$email_bt = $_GET['email_bt'];

$email_nr = $_GET['email_nr'];
$email_nr1 = $_GET['email_nr1'];

if (!$email_fa)
exit('{"code":-1,"msg":"发送方邮箱不能为空"}');

if (!$email_fa_mm)

exit('{"code":-1,"msg":"发送方授权码不能为空"}');

if (!$email_shou)
exit('{"code":-1,"msg":"接收方邮箱不能为空"}');

if (!$email_bt)

exit('{"code":-1,"msg":"发送标题不能为空"}');

if (!$email_nr)
exit('{"code":-1,"msg":"发送内容不能为空"}');

if (!$email_nr1)

exit('{"code":-1,"msg":"联系邮箱不能为空"}');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '.
/PHPMailer/src/Exception.php';
require '.
/PHPMailer/src/PHPMailer.php';
require '.
/PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);


try {


$mail->isSMTP(); 

 $mail->Host = 'smtp.qq.com';
$mail->SMTPAuth = true; 

$mail->Username = $email_fa;
$mail->Password = $email_fa_mm;
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom($email_fa); 

$mail->addAddress($email_shou);

$mail->Subject = $email_bt;



$htmlContent = '

<body>
<p>'.$email_nr.'</p>
<p>发送用户：'.$email_nr1.'</p>
<p>发送时间：'.$time1.'</p>
';
$mail->isHTML(true);
$mail->Body = $htmlContent;


$mail->send();

echo '留言成功！';
}
catch (Exception $e) {
 
echo '留言失败：' .
 $mail->ErrorInfo;
}

?>