<?php
/*

function send_sms($user, $pass, $telephone, $sender, $content)
{
    dd($user);
    $phone = preg_replace('/000+/', '', $telephone);
    // User From Sending Site
    $smsUserName = $user;
    $smsUserPass = $pass;
    $Sender = $sender;
    $smsSenderName = str_replace(' ', '%20', $sender);
    $msg = str_replace(' ', '%20', $content);
    $telephone = $str = '966' . substr($telephone, 1);
    $sms = "http://www.waselsms.com/api.php?comm=sendsms&user=" . $smsUserName . "&pass=" . $smsUserPass . "&to=" . $telephone . "&sender=" . $smsSenderName . "&message=" . $msg;
    $url = (string) $sms;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    // This is what solved the issue (Accepting gzip encoding)
    curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
    $response = curl_exec($ch);
    curl_close($ch);
    $dh = $response;
    // dd($dh);
    $msg = "";
    $result = explode(':', $dh);
    if ($result[0] == 'u') {
        $msg = "تم الارسال";
    } elseif ($result[0] == '-2') {
        $msg = "الرسائل غير متوفره في هذه البلد";
    } elseif ($result[0] == '-999') {
        $msg = "فشل في ارسال الرسالة";
    } elseif ($result[0] == '-100') {
        $msg = "خطأ في حساب المرسل";
    } elseif ($result[0] == '-110') {
        $msg = "خطأ في اسم المستخدم و كلمة المرور الخاصة بحساب المرسل";
    } elseif ($result[0] == '-111') {
        $msg = "حساب المرسل غير مفعل";
    } elseif ($result[0] == '-112') {
        $msg = "الحساب محظور";
    } elseif ($result[0] == '-113') {
        $msg = "رصيد الرسائل غير كافي";
    } elseif ($result[0] == '-114') {
        $msg = "الخدمة غير متاحه";
    } elseif ($result[0] == '-115') {
        $msg = "المرسل غير متاح";
    } elseif ($result[0] == '-116') {
        $msg = "خطأ في اسم المرسل";
    }
    $arr = ['code' => $result[0], 'message' => $msg];
    return $arr;
}
*/
