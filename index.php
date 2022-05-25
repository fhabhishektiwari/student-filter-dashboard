<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student-data-filter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="item-1">
            <form action="" method="get">
                <label for="range">Enter range in between (1 -5):</label>
                <input type="text" name="startRange" placeholder="Start Range" value="<?php if(!empty($_GET['startRange'])){echo $_GET['startRange'];} ?>">
                <input type="text" name="endRange" placeholder="End Range" value="<?php if(!empty($_GET['endRange'])){echo $_GET['endRange'];} ?>">
                <button type="submit" name="submit">Go</button>
            </form>
        </div>
        <div class="item-2">
            <table>
                <thead>
                    <tr>
                        <th>Roll No</th>
                        <th>Student Name</th>
                        <th>Marks</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include ("dbconfig.php");

                        if(isset($_GET['submit'])){
                            $cond1=$_GET['startRange'];
                            $cond2=$_GET['endRange'];
                            $sql1="Select * from student_data where roll_num Between '$cond1' AND '$cond2'";
                            $result=mysqli_query($conn,$sql1);
                            $num=mysqli_num_rows($result);
                            if(!empty($_GET['startRange']) && !empty($_GET['endRange'])){
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<tr><td>".$row['roll_num']."</td><td>".$row['student_name']."</td><td>".$row['marks']."</td><td>".$row['email_address']."</td><td>".$row['phone_number']."</td></tr>";
                                    }
                                }


                            }else{
                                echo "<script>alert('Please filled both range');</script>";
                            }

                        }

                    ?>

                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
        <!-- <div class="item-3">footer</div> -->

    </div>
</body>
</html>