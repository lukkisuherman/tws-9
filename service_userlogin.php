<?php   
// Dokumentasi Pengerjaan Tugas Pertemuan 9
// Kelas : 12.5C.13
// Nama : Lukki Suherman
// NIM : 12182243
    $conn = new mysqli('localhost', 'root', '');  
    mysqli_select_db($conn, 'pertemuan9');  
    if (isset($_GET['username']) && $_GET['username'] != '' &&isset($_GET['password']) && $_GET['password'] != '')   
    {  
        $email = $_GET['username'];  
        $password = $_GET['password'];   
  
        $getData = "SELECT `id`,`username`,`password` FROM `tbl_user` WHERE `username`='" .$email."'  
        and `password`='".$password."'";  
  
        $result = mysqli_query($conn,$getData);  
  
        $userId="";  
        while( $r = mysqli_fetch_row($result))  
        {  
            $userId=$r[0];  
        }  
  
        if ($result->num_rows > 0 ){  
  
            $resp["status"] = "1";  
            $resp["userid"] = $userId;  
            $resp["message"] = "Login successfully";  
        }  
        else{  
            $resp["status"] = "-2";  
            $resp["message"] = "Enter correct username or password";  
        }  
  
    }  
    else  
    {  
  
        $resp["status"] = "-2";  
        $resp["message"] = "Enter Correct username.";  
  
  
    }  
  
    header('content-type: application/json');  
  
    $response["response"]=$resp;  
    echo json_encode($response);  
  
    @mysqli_close($conn);  
  
?>