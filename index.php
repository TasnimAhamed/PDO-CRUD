
<?php 
    include('header.php');   
?>




        <div class="row p-4">
            <h1>All Student Data</h1>
            <div class="s8 offset-s2 ">
                <table>
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Student Username</th>
                            <th>Student Email</th>
                            <th>Student Profile</th>
                            <th>Edit/Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 

                            $sql="SELECT * FROM students";
                            $statement=$connection->prepare($sql);

                            $statement->execute();

                            $students_data=$statement->fetchAll(PDO::FETCH_OBJ);

                            foreach($students_data as $student){
                        ?>
                            <tr>
                                <td>
                                    <?php echo $student->std_name; ?>
                                </td>
                                
                                <td>
                                    <?php echo $student->std_username; ?>
                                </td>
                                
                                <td>
                                    <?php echo $student->std_email; ?>
                                </td>
                                
                                <td>
                                    <img style="width:60px;" src="assets/img/<?php echo $student->std_avatar; ?>" alt="<?php echo $student->std_username; ?>">
                                </td>
                                <td>
                                    <a href="update-student.php?update=<?php echo base64_encode($student->std_id) ?>" class="btn waves-effect waves-light blue">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a href="?delete=<?php echo base64_encode($student->std_id) ?>" class="btn waves-effect waves-light red">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            }
                            
                            if(isset($_GET['delete'])){
                                $delete_encode_id=$_GET['delete'];
                                $delete_id=base64_decode($delete_encode_id);
                                $sql="DELETE FROM students WHERE std_id=:std_id";
                                $statement=$connection->prepare($sql);
                                
                                if($statement->execute([':std_id' => $delete_id])){
                                    echo '<div class="waves-effect waves-light btn mt-1">Student deleted Successfully</div> ';
                                    header('refresh:1;url=index.php');
                                }
                            }
                        ?>                        
                    </tbody>
                </table>
                <a href="add_student.php" class="btn waves-effect waves-light blue mt-1">
                            Add New Student
                    </a>
            </div>
        </div>




<?php 

    include('footer.php');

?>
