<!doctype html>
<html>
<head><title>view</title>
    <link href="styleview.css" type="text/css" rel="stylesheet">
    <?php
    include("config.php");

    $rowperpage = 7;
    $row = 0;

    // Previous Button
    if(isset($_POST['but_prev'])){
        $row = $_POST['row'];
        $row -= $rowperpage;
        if( $row < 0 ){
            $row = 0;
        }
    }

    // Next Button
    if(isset($_POST['but_next'])){
        $row = $_POST['row'];
        $allcount = $_POST['allcount'];

        $val = $row + $rowperpage;
        if( $val < $allcount ){
            $row = $val;
        }
    }

    // generating orderby and sort url for table header
    function sortorder($fieldname){
        $sorturl = "?order_by=".$fieldname."&sort=";
        $sorttype = "asc";
        if(isset($_GET['order_by']) && $_GET['order_by'] == $fieldname){
            if(isset($_GET['sort']) && $_GET['sort'] == "asc"){
                $sorttype = "desc";
            }
        }
        $sorturl .= $sorttype;
        return $sorturl;
    }
    ?>
</head>
<body>
<div id="content">
    <table width="100%" id="stu_table" border="0">
        <tr class="tr_header">
            <th>S.no</th>
            <th ><a href="<?php echo sortorder('name'); ?>" class="sort">Name</a></th>
            <th ><a href="<?php echo sortorder('regno'); ?>" class="sort">Register Number</a></th>
            <th ><a href="<?php echo sortorder('dob'); ?>" class="sort">DOB</a></th>
            <th ><a href="<?php echo sortorder('address'); ?>" class="sort">Address</a></th>
<th ><a href="<?php echo sortorder('department'); ?>" class="sort">Department</a></th>
<th ><a href="<?php echo sortorder('yoa'); ?>" class="sort">Admission Year</a></th>
            <th ><a href="<?php echo sortorder('phone'); ?>" class="sort">Phone No:</a></th>
<th ><a href="<?php echo sortorder('email'); ?>" class="sort">Email ID:</a></th>

        </tr>
        <?php
        // count total number of rows
        $sql = "SELECT COUNT(*) AS cntrows FROM student";
        $result = mysqli_query($con,$sql);
        $fetchresult = mysqli_fetch_array($result);
        $allcount = $fetchresult['cntrows'];

        // selecting rows


        $orderby = " ORDER BY regno asc ";
        if(isset($_GET['order_by']) && isset($_GET['sort'])){
            $orderby = ' order by '.$_GET['order_by'].' '.$_GET['sort'];
        }

        // fetch rows
        $sql = "SELECT * FROM student ".$orderby." limit $row,".$rowperpage;
        $result = mysqli_query($con,$sql);
        $sno = $row + 1;
        while($fetch = mysqli_fetch_array($result)){
            $name = $fetch['name'];
            $regno = $fetch['regno'];
            $dob = $fetch['dob'];
            $address = $fetch['address'];
            $department = $fetch['department'];
$yoa = $fetch['yoa'];
$phone = $fetch['phone'];
$email = $fetch['email'];
            ?>
            <tr>
                <td align='center'><?php echo $sno; ?></td>
                <td align='center'><?php echo $name; ?></td>
                <td align='center'><?php echo $regno; ?></td>
                <td align='center'><?php echo $dob; ?></td>
                <td align='center'><?php echo $address; ?></td>
                <td align='center'><?php echo $department; ?></td>
                <td align='center'><?php echo $yoa; ?></td>
                <td align='center'><?php echo $phone; ?></td>
                <td align='center'><?php echo $email; ?></td>
            </tr>
            <?php
            $sno ++;
        }
        ?>

    </table>
    <form method="post" action="">
        <div id="div_pagination">
            <input type="hidden" name="row" value="<?php echo $row; ?>">
            <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
            <input type="submit" class="button" name="but_prev" value="Previous">
            <input type="submit" class="button" name="but_next" value="Next">
        </div>
    </form>
</div>

</body>
</html>
