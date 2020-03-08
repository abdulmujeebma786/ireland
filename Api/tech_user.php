<?php
/**
 * Created by PhpStorm.
 * User: mujeeb
 * Date: 02/04/18
 * Time: 7:57 AM
 */
date_default_timezone_set("Asia/Kolkata");

include_once 'class_functions.php';

class user_class{

    public function sendmail($data){
        $common_obj=new commonFunctions();
        $dbh        =   $common_obj->dbh;

        $a = "mujeeb";
        // $email= $data['email'];
        // $qry = $dbh->prepare("select * from tb_user where user_email = '$email'");
        // $qry->execute();
        // if($qry->rowCount()>0)
        // {
        //     $row    =   $qry->fetch();
        //     $password = $row['user_password'];
        //     $name = $row['user_name'];
        //     $id = $row['user_id'];

        //     $subject1 = "You recently requested a new password for your account with Ubic Fitness with the e-mail id ".$email;
        //     $subject2 = "To continue with your healthy lifestyle ,please click on the button below and reset your password.";
        //     $bottomtext1 = "If you have not requested a new password ,please ignore this e-mail ";
        //     $bottomtext2 = "Your password will not be changed.";


        //     $common_obj ->forgotmailFunction($email,'Forgot Password',$password,$subject1,$subject2,$bottomtext1,$bottomtext2,$name,$id);
        //     $a = true;
        // }else {
        //     $a = false;
        // }
        return $a;

    }
}