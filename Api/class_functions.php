<?php
include_once('class_connection.php');
// include_once("PHPMailer/class.phpmailer.php");
class commonFunctions {

    //get ServerPath
    function getServerUrl(){

        return "http://techzdubai.com";

    }

    // get Current DateTime
    function getCurrentDate(){
        date_default_timezone_set("Asia/Kolkata");
        $date=date('Y-m-d H:i:s');
        return $date;
    }



    function getDateTimeInSeconds($eventTime){
        return strtotime($eventTime);
    }

    function getElapsedTimeInSeconds($eventTime){
        $current_date =   $this->getCurrentDate();
        $totaldelay   = strtotime($current_date) - strtotime($eventTime);
        return $totaldelay;
    }

    function getElapsedTimeInHours($eventTime){
        $totaldelay   = $this->getElapsedTimeInSeconds($eventTime);
        return $hours = floor($totaldelay / 3600);
    }

    // Sort array by ascending
    function sort_2d_asc($array, $key) {
        usort($array, function($a, $b) use ($key) {
            return strnatcasecmp($a[$key], $b[$key]);
        });

        return $array;
    }

    // Sort array by descending
    function sort_2d_desc($array, $key) {
        usort($array, function($a, $b) use ($key) {
            return strnatcasecmp($b[$key], $a[$key]);
        });

        return $array;
    }
     function mail($to, $from, $name, $subject, $message)
    {
        echo "hiii";
        $content    ='<div style="background-color: #E1E1E1">
                        <div style="background-color: #e1e1e1; height: 23px;"></div>
                        <div style="background-color: white;margin: 6%;height: auto;margin-bottom: 22px;">
                         <div style="height: 22px;background-color: #E1E1E1""></div>
                            <div style="text-align: center">
                                <img src="http://52.64.245.60/TaxiLinupApp/Customer_Api/emailicon/logo.png" style="width: 36%; padding: 22px;">
                            </div>'.$message.'
                        <div style="height: 53px;background: #FF3C38">
                        <h3 align="center" style="    padding-top: 16px;color: white;">BOOK NOW!</h3>
                        </div>
                       </div>
                        <div style="    text-align: center;">
                            <div><img src="http://52.64.245.60/TaxiLinupApp/Customer_Api/emailicon/gool.png"><img src="http://52.64.245.60/TaxiLinupApp/Customer_Api/emailicon/app.png"></div>
                            <div style="    margin-top: 17px;">
                                <img src="http://52.64.245.60/TaxiLinupApp/Customer_Api/emailicon/fb.png">
                                <img src="http://52.64.245.60/TaxiLinupApp/Customer_Api/emailicon/t.png">
                                <img src="http://52.64.245.60/TaxiLinupApp/Customer_Api/emailicon/li.png">
                                <img src="http://52.64.245.60/TaxiLinupApp/Customer_Api/emailicon/g+.png">
                            </div>
                        </div>
                    </body>';
        $mail = new PHPMailer();
        $mail->From = $from;
        $mail->FromName = $name;
        $mail->addAddress($to, $name);     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body = $content;

        $mail->send(); // send the mail
    }

    function forgotmailFunction($to,$subject,$password,$content1,$content2,$bottomtext1,$bottomtext2,$name,$id){
        $i = 0;
        $random_hash = md5(date('r', time()));
        $from='support@ubicfitness.com';
        $headers  = "From:support@ubicfitness.com\nReply-To:support@ubicfitness.com";
        $content    ='<body style="background-color: white;padding-top: 30px;    font-family: serif;">
                        <div style=" margin: 6%;height: auto;background-color: #F4F9FC;    padding-bottom: 37px;">
                            <div style="height: 22px;"></div>
                            <div style="text-align: center">
                                <img src="http://ubicfitness.com/mobileApp/Assets/logo.png">
                            </div>
                            <div>
                                <h3 style="text-align: center"> <b>'.$name.'</b></h3>
                                <p align="center">'.$content1.'<br>'.$content2.'</p>
                            </div>
                            <div style="height: 53px;background: #006EF2;width: 27%;margin-left: 37%;border-radius: 11px;margin-top: 55px!important;margin-bottom: 55px!important;">
                                <a style="text-decoration: none;" href="http://ubicfitness.com/mobileApp/forgotPage/?token='.$password.'&primary='.$id.'"><h3 align="center" style=" padding-top: 11px;color: white;">Reset Password </h3></a>
                            </div>

                            <div>
                                <p align="center" style="color: #9B9B9E;">'.$bottomtext1.'<br>
                                    '.$bottomtext2.'</p>
                            </div>
                        </div>
                    </body>';


        $headers .= "\nContent-Type: text/html; boundary=\"PHP-alt-".$random_hash."\"";
        $mail = mail($to,$subject,$content,$headers,"-f $from");
        if($mail){
            $i=1;
        }
        return $i;
    }

    function registrationmailFunction($to,$name){
        $i = 0;
        $random_hash = md5(date('r', time()));
        $from='support@ubicfitness.com';
        $headers  = "From:support@ubicfitness.com\nReply-To:support@ubicfitness.com";
        $content    ='<body style="background-color: white;padding-top: 30px;    font-family:sans-serif;">
                        <div style=" margin: 6%;height: auto;background-color: #F4F9FC;    padding-bottom: 37px;">
                            <div style="height: 30px;"></div>
                            <div style="text-align: center;padding-top: 12px">
                                <img src="http://ubicfitness.com/mobileApp/Assets/logo.png">
                            </div>
                            <div>
                                <h2 style="text-align: center;color:black"> <b>Hi '.$name.',</b></h2>
                                <h4 align="center" style="color:black ;font-weight: lighter;   line-height: 2;">Congratulations ! You have decide to plan your nutrition and get into the shape of your life.<br>
                                Ubic fitnes has the best fitness professionals across the globe to assist u<br>on your journey.
                                </h4>
                            </div>
                     
                            <div>
                                <p align="center" style="color: #9B9B9E;">'.$bottomtext1.'<br>
                                    '.$bottomtext2.'</p>
                            </div>
                        </div>
                    </body>';


        $headers .= "\nContent-Type: text/html; boundary=\"PHP-alt-".$random_hash."\"";
        $mail = mail($to,'Welcome to Ubic Fitness',$content,$headers,"-f $from");
        if($mail){
            $i=1;
        }
        return $i;
    }


    function pushNotificationIphone($type,$message,$deviceToken){

        $passphrase = "sics";
        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', 'ck.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

        $fp = stream_socket_client(
            'ssl://gateway.sandbox.push.apple.com:2195', $err,
            $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

        if (!$fp)
            exit("Failed to connect: $err $errstr".PHP_EOL);

        $body['aps'] = array(
            'type' => $type,
            'title' => 'Taxi Lineup',
            'alert' => $message,
            'sound' => 'default'

        );

        $payload = json_encode($body);
        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
        $result = fwrite($fp, $msg, strlen($msg));

       /* if (!$result)
        echo 'Message not delivered'.PHP_EOL;
        else
        echo 'Message successfully delivered' . PHP_EOL;*/
        fclose($fp);

    }

    function pushNotificationAndroid($type,$shiftid,$message,$deviceToken)
    {
        // for more details visit - http://www.androidhive.info/2012/10/android-push-notifications-using-google-cloud-messaging-gcm-php-and-mysql/
        $url          = 'https://android.googleapis.com/gcm/send';
//        $serverApiKey = "AIzaSyBJHlaCmzu2M5ytyOq0Xd5-AMkWEfPPMEk";   // google API Key
//        $serverApiKey = "AIzaSyB0yEv7tRtQaxmmL69XsE8jGQVVIwlTsfQ";   // google API Key
        $serverApiKey = "AIzaSyAoESNPxneDyjnM4zzpswqNjZVZoJFhgbk";   // google API Key

        $headers = array(
            'Content-Type:application/json',
            'Authorization:key=' . $serverApiKey
        );

        $data = array(
            'registration_ids' => array($deviceToken),
            'data' => array(
                'type'         => $type,
                'title'        => 'TaxiLineup',
                'postid'      => $shiftid,
                'message'      => $message,
                'sound'        => 'default',
                'url' => 'http://androidmyway.wordpress.com'
            )
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        if ($headers)
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        curl_close($ch);
        //print ($response);
    }


    // user details
    function userDetails($userid){
        $dbh = $this->dbh;
        $row = array();
        $selectUser = $dbh->prepare( "SELECT u.* FROM users u where id='$userid'" );
        $selectUser->execute();
        if( $selectUser->rowCount() > 0 ){
            $row = $selectUser->fetch(PDO::FETCH_ASSOC);
        }
        return  $row;
    }


}

//$common_obj = new commonFunctions();
//$common_obj->pushNotificationAndroid('Type1',1,"Hello Message","APA91bEUtPS2SuPYbWrUL9kMvVGPsO8DO9nI5wKdMQPLn-zVoyFDJ8LGJ43O-PK74b_E-VvXb1gwJiWaCLv5p7D6qLoLUVtdnhTWwsoDS3tb7y4lzteHWOEE4BemueDft1AFVU7bGtlr8Dj75vpgI51WcitnsIqE-Q",0);
?>