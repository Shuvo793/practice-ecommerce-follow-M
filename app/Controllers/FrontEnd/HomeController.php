<?php


namespace App\Controllers\FrontEnd;

use Respect\Validation\Validator;
use App\Models\FrontEnd\User;

class HomeController
{
    public function getIndex(){
        frontendView('home');
    }
    public  function getRegister(){

        frontendView('register');
    }
    public  function postRegister(){
        $validator=new Validator();
        $errors=[];
        $fullName=$_POST['full_name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $address=$_POST['address'];
        $mobileNumber=$_POST['mobileNumber'];
        $photo=$_FILES['files'];
        //validation
        if ($validator::alnum()->noWhitespace()->validate($fullName) === false) {
            $errors['full_name'] = '<li class="alert-warning">Full name can only contain alphabets or numeric</li>';
        }
        if ($validator::email()->validate($email) === false) {
            $errors['email'] = '<li class="alert-warning">Email must be a valid email address</li>';
        }
        if (\strlen($password) < 6) {
            $errors['password'] = '<li class="alert-warning">Password must have at least 6 chars</li>';
        }
        if (\strlen($mobileNumber) < 11) {
            $errors['mobileNumber'] = '<li class="alert-warning">Phone number must have at least 11 chars</li>';
        }
        if ($validator::file()->validate($photo['files'])) {
            $errors['files'] = 'Please must be upload a file';
        }
        if(empty($errors)){
            if (!empty($_FILES['files']['tmp_name'])) {
                $name = $_FILES['files']['name'];
                $file_parts = explode('.', $name);
                $extention = end($file_parts);
                $new_file_name = uniqid('PPI_', true) . time() . '.' . $extention;
                move_uploaded_file($_FILES['files']['tmp_name'], 'media/uploads_files/' . $new_file_name);
                //require_once __DIR__.'/../../../media/uploads_files/'

                $user = User::create([
                    'full_name' => $fullName,
                    'email' => $email,
                    'password' => $password,
                    'address' => $address,
                    'mobile_number' => $mobileNumber,
                    'files'=>$new_file_name,
                    'active' => 1
                ]);

                if ($user) {
                    $_SESSION['type'] = 'success';
                    $_SESSION['message'] = 'Registration Successfully';
                } else {
                    $_SESSION['type'] = 'Danger';
                    $_SESSION['message'] = 'Registration Unsuccessful';
                }
                header('Location: /register');
                exit();


            }
        }else{
            $_SESSION['errors']=$errors;
            header('Location: /register');
            exit();
        }
    }
}