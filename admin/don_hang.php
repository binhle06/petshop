<?php
    include '../connect.php';

    $sql_show_prd = "SELECT * FROM orders AS o, users AS u, pet_product AS p WHERE o.user_id = u.user_id AND p.pet_prod_id = o.pet_prod_id";
    // echo $sql_show_prd; exit;
    $query_show_prd = mysqli_query($con,$sql_show_prd);
    // $query_show_prd = $con ->query($sql_show_prd);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Petshop | ADMIN</title>
</head>
<body>
    <div id="myHeader">
    <section class="header" >
        <?php 
            include './header.php';
        ?>
            <!-- <nav>
                <div class="nav-links">
                    <ul>
                        <li><a class="text-danger" href="manage_pet.php">Quản lý thú cưng</a></li>
                        <li><a class="text-danger" href="adminProductMange.php">Quản lý sản phẩm</a></li>
                        <li><a class="text-danger" href="manage_customer.php">Quản lý người dùng</a></li>
                        <li><a class="text-danger" href="logout.php">Đăng xuất</a></li>
                    </ul>
                </div>
            </nav> -->
        </section>
</div>
        <h1 class="h1">QUẢN LÝ ĐƠN HÀNG</h1>
            <div class="">
                <h3 class="menu"><center> Danh sách đơn hàng</center></h3>
            </div>
        <fieldset>
        <div class="container">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="table-success" scope="col">STT</th>
                            <th class="table-success" scope="col">Tên người dùng</th>
                            <th class="table-success" scope="col">Tên sản phẩm</th>
                            <th class="table-success" scope="col">Giá </th>
                            <th class="table-success" scope="col">Ngày đặt hàng</th>
                            <th class="table-success" scope="col">Hình ảnh sản phẩm</th>
                            <th class="table-success" scope="col">Số lượng</th>
                            <th class="table-success" scope="col">Trạng Thái</th>
                            <th class="table-success" scope="col">Tổng cộng</th>
                        </tr>
                    <?php
                        $i = 1;
                            while($row = mysqli_fetch_assoc($query_show_prd)){ ?>
                                    <tr>
                                        <td scope="row"><?php echo $i++; ?></td>
                                        <td><?php echo $row['user_name'] ?></td>
                                        <td><?php echo $row['pet_prod_name'] ?></td>
                                        <td><?php echo $row['pet_prod_price']?></td>
                                        <td><?php echo $row['order_date']?></td>
                                        <td><img src="../asset/img/<?php echo $row['pet_prod_image']?>"> </td>
                                        <td><?php echo $row['order_numberOfItem'] ?></td>
                                        <td>
                                            <?php 
                                                if($row['order_status'] == 1){
                                                    echo "Đã thanh toán";
                                                }
                                                else{
                                                    echo "Chưa thanh toán";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $row['order_total'] ?></td>
                                    
                                    </tr>
                                    <?php
                        }
                    ?>
                    </thead>
                </table>
                <div class="">
                Total:
                        <?php
                            function total_price($que){
                                $total = 0;
                                foreach($que as $key => $value){
                                    $total += $value['order_total'];
                                }
                                $format =  number_format($total, 0, ',', '.');
                                return $format;
                            };
                            echo total_price($query_show_prd);
                        ?>
                    </div>
        </div>   
        </fieldset>  
        <script>
    window.onscroll = function() {myFunction()};
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}
    </script>     
</body> 
</html>