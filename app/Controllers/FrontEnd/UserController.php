<?php


namespace App\Controllers\FrontEnd;
use App\Models\FrontEnd\User;


class UserController
{
    /*public function showLogin(){
        frontendView('login');
    }
    public function processLogin(){
        if(isset($_POST['login'])){
            $email=trim(strtolower($_POST['email']));
            $password=trim($_POST['password']);
            $user=User::where('email',$email)->first();
            if($user){
                if(password_verify($password,$user['password'])===true){
                    $_SESSION['id']=$user['id'];
                    $_SESSION['email']=$user['email'];
                    header('Location: /');
                }else{
                    $_SESSION['type']='danger';
                    $_SESSION['message']='Invalid password';
                    header('Location: /login');
                    exit();
                }
            }else{
                $_SESSION['type']='danger';
                $_SESSION['message']='User not found';
                header('Location: /login');
                exit();
            }

        }
    }
    public function showRegister(){
        frontendView('register');
    }
    public function processRegister(){
        if(isset($_POST['register'])){
            $fullName=trim($_POST['full_name']);
            $email=trim(strtolower($_POST['email']));
            $password=$_POST['password'];
            $password=password_hash($password,PASSWORD_BCRYPT);
            $address=trim($_POST['address']);
            $mobileNumber=trim($_POST['mobileNumber']);
            if(!empty($_FILES['files']['tmp_name'])){
                $name=$_FILES['files']['name'];
                $file_parts=explode('.',$name);
                $extention=end($file_parts);
                if($extention=='jpg'&& 'jpeg' && 'png'){
                    $new_file_name = uniqid('PPI_',true).time().'.'.$extention;
                    move_uploaded_file($_FILES['files']['tmp_name'],'media/photo/uploads_photos/'.$new_file_name);
                }else{
                    $new_file_name = uniqid('PPI_',true).time().'.'.$extention;
                    move_uploaded_file($_FILES['files']['tmp_name'],'media/files/uploads_files/'.$new_file_name);
                }

            }
            $user=User::create([
                'full_name'=>$fullName,
                'email'=>$email,
                'password'=>$password,
                'address'=>$address,
                'mobile_number'=>$mobileNumber,
                'active'=>1
            ]);
            if($user){
                $_SESSION['type']='success';
                $_SESSION['message']='Registration Successfully';
            }else{
                $_SESSION['type']='Danger';
                $_SESSION['message']='Registration Unsuccessful';
            }
            header('Location: /register');
            exit();

        }
    }*/


}