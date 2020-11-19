<?php // เรียกใช้ไฟล์ เชื่อมต่อ  database
    include("connect_db.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
    <title>basic php CRUD</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Message</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // แสดงข้อมูลในตาราง
                            $sql = "SELECT * FROM tb_contact";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<th>".$row['contact_name']."</th>";
                                    echo "<th>".$row['contact_email']."</th>";
                                    echo "<th>".$row['contact_phone']."</th>";
                                    echo "<th>".$row['contact_message']."</th>";
                                    echo "<th><a href='".$_SERVER['PHP_SELF']."?id=".$row['contact_id']."'>แก้ไขข้อมูล</th>";
                                    echo "<th><a href='del_contact.php?id=".$row['contact_id']."'>ลบข้อมูล</th>";
                                    
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                echo "<th colspan='4'>No data available</th>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <?php
                // isset ใช้สำหรับเช็คค่าว่างหรือไม่
                if(isset($_GET['id'])){
                    $sql    = "SELECT * FROM tb_contact WHERE contact_id = '".$_GET['id']."'";
                    $result = $conn->query($sql);
                    $row    = $result->fetch_assoc();

            ?>
                <!-- สำหรับแก้ไขข้อมูล -->
                <form action="edit_contact.php" method="POST" >
                    <input type="hidden" name="contact_id" value="<?php echo $row['contact_id']; ?>" >
                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" name="Name" value="<?php echo $row['contact_name']; ?>" class="form-control"  placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input type="email" name="Email" value="<?php echo $row['contact_email']; ?>" class="form-control"  placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label >Phone</label>
                        <input type="text" name="Phone" value="<?php echo $row['contact_phone']; ?>" class="form-control"  placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label >Message</label>
                        <textarea class="form-control" name="Message" rows="3">
                            <?php echo $row['contact_message']; ?> 
                        </textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php 
                } else { 
            ?>
                <!-- สำหรับเพิ่มข้อมูล -->
                <form action="add_contact.php" method="POST" >
                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" name="Name" value="" class="form-control"  placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input type="email" name="Email" value="" class="form-control"  placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label >Phone</label>
                        <input type="text" name="Phone" value="" class="form-control"  placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label >Message</label>
                        <textarea class="form-control" name="Message" value="" rows="3"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php 
                }  
            ?>
        </div>
    </section>
</body>

</html>