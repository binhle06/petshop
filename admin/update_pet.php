<?php
    //ket noi csdl
    include '../connect.php';

    //lay ma pet 
    $code = $_GET['id'];
    //lay thong tin lien quan den pet
    $sql_show_prd = "SELECT * FROM pet AS p, service AS s WHERE p.pet_id = '$code' AND s.pet_id = '$code'";
    
    // echo $sql_show_prd; exit;
    // thuc thi cau lenh sql
    $result = mysqli_query($con,$sql_show_prd);
    //in ra form
    $r = mysqli_fetch_assoc($result);

    if (isset($_POST["submit"])){
        $pet_id = $_POST["pet_id"];
        $pet_service_detail = $_POST["service_detail"];
        // echo $pet_service_detail; exit;
        $pet_service_fee = $_POST["service_fee"];
    
        //viet cau lenh edit
        $sql_edit = "UPDATE service SET 
        service_date = CURRENT_TIMESTAMP(), 
        service_detail = '$pet_service_detail', 
        service_fee = '$pet_service_fee'
        WHERE pet_id = '$pet_id'";
        // echo $sql_edit;exit;

        $sql_e = "UPDATE pet SET 
        pet_status = '1'
        WHERE pet_id = '$pet_id'";

        // echo $sql_e;exit;

        //thuc thi cau lenh
        mysqli_query($con, $sql_e);
        mysqli_query($con, $sql_edit);
        header('location:manage_pet.php');
    }
?>

<html>
<head>
    <link rel="stylesheet " href="../asset/css/user_login.css">
</head>
<body> 
<div class="main">
    <form method="POST" action="update_pet.php" enctype="multipart/form-data" class="form" id="form-1" style="margin: 30px auto 30px auto;">
        <h3 class="heading">Chi tiết chăm sóc</h3>
        <div class="spacer"></div>


        <div class="form-group">
            <label for="pet_id" class="form-label">Mã thú cưng</label>
            <input id="pet_id" type="text" name="pet_id" class="form-control" value="<?php echo $r['pet_id']; ?>" readonly="true">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="pet_name" class="form-label">Chi tiết chăm sóc</label>
            <textarea id="pet_name" type="text" placeholder="Nhập chi tiết" name="service_detail" class="form-control"><?php echo $r['service_detail']; ?></textarea>
            <span class="form-message"></span>
        </div>
        
        <div class="form-group">
            <label for="pet_fee" class="form-label">Thành tiền</label>
            <input id="pet fee" type="number" placeholder="Nhập giá tiền" name="service_fee" class="form-control" value="<?php echo $r['service_fee']; ?>">
            <span class="form-message"></span>
        </div>
        <button class="form-submit" name="submit">Hoàn thành chăm sóc</button>


        <!-- <tr>
            <td>Pet id</td>
            <td><input type="text" name="pet_id" value="<?php echo $r['pet_id']; ?>" readonly="true"></td>
        </tr>

        <tr>
            <td>Pet service detail</td>
            <td><input type="text" name="pet_service_detail" value="<?php echo $r['pet_service_detail']; ?>"></td>
        </tr>
        <tr>
            <td>Thành Tiền</td>
            <td><input type="text" name="pet_service_fee" value="<?php echo $r['pet_service_fee']; ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="UPDATE"></td>
        </tr> -->
    </form>
    
</div>
</body>
</html>