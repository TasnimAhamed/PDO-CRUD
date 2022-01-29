<?php
    include('header.php');
?>

<!--Main Content Start-->

    <div class="row p-4">
        <h1 class="mb-5">Update Student</h1>

        <form class="col s6 offset-s3" action="" method="POST" enctype="multipart/form-data">
            
            <?php 

                if(isset($_GET['update'])){
                    $update_encoded_id = $_GET['update'];
                    $update_id=base64_decode($update_encoded_id);

                    $sql="SELECT * FROM students WHERE std_id=:std_id";
                    $statement=$connection->prepare($sql);
                    $statement->execute([':std_id'=>$update_id]);

                    $student=$statement->fetch(PDO::FETCH_OBJ);
            ?>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="full_name" value="<?php echo $student->std_name ?>" name='full_name' type="text" class="validate" required>
                        <label for="full_name">Full Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="user_name" name='user_name' value="<?php echo $student->std_username ?>" type="text" class="validate" required>
                        <label for="user_name">Username</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" name='email' value="<?php echo $student->std_email ?>" type="email" class="validate" required>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name='password' value="<?php echo $student->std_pass ?>" type="password" class="validate" required readonly>
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="avatar" type="file" name='avatar' class="validate">
                    </div>
                    <div class="input-field col s12">
                        <img width="80" src="assets/img/<?php echo $student->std_avatar?>" alt="<?php echo $student->std_username?>">
                    </div>
                </div>
                <div class="row">
                    <button class="waves-effect waves-light btn custom_btn" type='btn' name='update_student'>Update Student</button>
                </div>

        
            <?php
                }

                if(isset($_POST['update_student'])){
                    $full_name=$_POST['full_name'];
                    $username=$_POST['user_name'];
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $update_avatar=$_FILES['avatar']['name'];
                    $temp_avatar=$_FILES['avatar']['tmp_name'];
                    $final_avatar=$update_avatar;
        
                    if(!$update_avatar){
                        $final_avatar=$student->std_avatar;
                    }
                    else{
                        $ext=pathinfo($update_avatar,PATHINFO_EXTENSION);
                        $extension=array('jpg','png','gif','jpeg');

                        if(in_array($ext,$extension)){
                            
                            if(!file_exists('assets/img/'.$final_avatar)){
                                move_uploaded_file($temp_avatar,'assets/img/'.$final_avatar);
                            }
                            else{
                                $new_name=str_replace('.','_',basename($final_avatar,$ext));
                                $final_avatar=$new_name.time().rand(1,100).'.'.$ext;
                                move_uploaded_file($temp_avatar,'assets/img/'.$final_avatar);
                            }
                        }
                    }

                    $sql="UPDATE students SET std_name=?,std_username=?,std_email=?,std_avatar=? WHERE std_id=?";

                    $statement=$connection->prepare($sql);
                    if($statement->execute([$full_name,$username,$email,$final_avatar,$update_id])){
                        echo '<div class="waves-effect waves-light btn mt-1">Data Updated Successfully</div> ';

                        header('refresh:1;url=index.php');
                        
                    }
                    
                }
            ?>

        </form>

        
    </div>

<!--Main Content End-->




<?php
    include('footer.php');
?>