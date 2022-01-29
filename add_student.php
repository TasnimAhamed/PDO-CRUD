<?php
    include('header.php');
?>

<!--Main Content Start-->

    <div class="row p-4">
        <h1 class="mb-5">Add New Student</h1>

        <form class="col s6 offset-s3" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s12">
                    <input id="full_name" name='full_name' type="text" class="validate" required>
                    <label for="full_name">Full Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="user_name" name='user_name' type="text" class="validate" required>
                    <label for="user_name">Username</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name='email' type="email" class="validate" required>
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" name='password' type="password" class="validate" required>
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="avatar" type="file" name='avatar' class="validate" required>
                </div>
            </div>
            <div class="row">
                <button class="waves-effect waves-light btn custom_btn" type='btn' name='add_student'>Add Student</button>
            </div>

            <?php

                if(isset($_POST['add_student'])){
                    $full_name=$_POST['full_name'];
                    $username=$_POST['user_name'];
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $hashed_password=sha1($password);
                    $avatar=$_FILES['avatar']['name'];
                    $temp_avatar=$_FILES['avatar']['tmp_name'];

                    $final_avatar=$avatar;
                    $ext=pathinfo($avatar,PATHINFO_EXTENSION);

                    $extension=array('jpg','png','gif','jpeg');

                    if(in_array($ext,$extension)){
                        if(!file_exists('assets/img/'.$final_avatar)){
                            move_uploaded_file($temp_avatar,'assets/img/'.$final_avatar);
                        }
                        else{
                            $base_name=str_replace('.','_',basename($final_avatar,$ext));
                            $file_name=$base_name.time().rand(1,100).'.'.$ext;
                            $final_avatar=$file_name;
                            move_uploaded_file($temp_avatar,'assets/img/'.$final_avatar);
                        }
                        
                        $sql='INSERT INTO students (std_name,std_username,std_email,std_pass,std_avatar) VALUES (:std_name,:std_username,:std_email,:std_pass,:std_avatar)';

                        $statement=$connection->prepare($sql);

                        if(
                            $statement->execute(
                                   [ 
                                    ':std_name'=>$full_name,
                                    ':std_username'=>$username,
                                    ':std_email'=>$email,
                                    ':std_pass'=>$hashed_password,
                                    ':std_avatar'=>$final_avatar
                                   ]
                            )){
                                echo '<div class="waves-effect waves-light btn mt-1">Data Added Successfully</div> ';

                                header('refresh:1;url=index.php');
                            }

                    }
                    else{
                        echo '<div class="waves-effect waves-light btn btn_custom" >File Name Extension Error!</div> ';
                    }
                
            }

            ?>

        </form>

        
    </div>

<!--Main Content End-->




<?php
    include('footer.php');
?>