<?php

include("connection1.php");

    $category_name = $_GET['cat'];
    $hostel_id = $_GET['id'];

    $status = "L";

    $query = "select * from notices where category_name='$category_name' and status='$status' and hostel_id='$hostel_id'";
    $result = mysqli_query($con2, $query);

    ?>
    <table>
        

            <?php
            while ($row = mysqli_fetch_assoc($result)){

                $name = $row['name'];
                $description = $row['description'];
                $file_name = $row['file_name'];
                $file_path = "images/notices/".$file_name;

                ?>
                <tr>
                <td>
                    <?php echo $description; ?>
                </td>
                <td>
                    <a href=<?php echo $file_path; ?>><?php echo $name; ?></a>
                </td>
                </tr>
                <?php
            }
            ?>

    </table>

    <?php

?>