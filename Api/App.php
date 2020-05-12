<?php
/**
 * Created by PhpStorm.
 * User: mujeeb
 * Date: 02/04/18
 * Time: 12:56 PM
 */
// include_once 'class_functions.php';
// include_once 'tech_user.php';

// $common_class= new commonFunctions();
// $ubic_class =   new ubic_class();
extract($_REQUEST);
$status= $_REQUEST['status'];
switch($status)
{
    case 'mail':

        $i = 0;
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $subject = $_REQUEST['subject'];
        $phone = $_REQUEST['phone'];
        $message = $_REQUEST['message'];
        $random_hash = md5(date('r', time()));
        $from = $email;
        $headers  = "From:info@studiemaven.com\nReply-To:info@studiemavens.com";
        // $content = "testing";
        $to = "admissions@studiemaven.com";
        $content    ='<body style="background-color: white;padding-top: 30px;    font-family: serif;">
                        <div style=" margin: 1%;height: auto;background-color: #c3c3c3;    padding-bottom: 37px;">
                            <div style="height: 22px;"></div>
                            <div style="text-align: center">
                                <img src="http://studiemaven.com/img/main-logo.png" style="width: 22%;">
                            </div>
                            <div>
                                <h1 style="text-align: center"> <b>Contact for enquiry : '.$name.'</b></h1>
                                <h3 align="center">Email :'.$email.'<br> Phone : '.$phone.'<br>Subject : '.$subject.'<br>Message : '.$message.'</h3>
                            </div>
                        </div>
                    </body>';


        $headers .= "\nContent-Type: text/html; boundary=\"PHP-alt-".$random_hash."\"";
        $mail = mail($to,$subject,$content,$headers,"-f $from");
        if($mail){
            $i=1;
        }
        $output = $i;
        break;

    default:
        $output ='Error 404 occured';

}
echo json_encode($output);
