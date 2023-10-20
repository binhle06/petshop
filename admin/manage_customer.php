<?php
include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logonew.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../asset/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>P-shop | ADMIN</title>
</head>

<body>
    <section class="header">
    <?php 
        include './header.php';
    ?>
        <!-- <nav>
            <div class="nav-links">
                <ul>
                    <li><a class="text-danger" href="manage_pet.php">Quản lý thú cưng</a></li>
                    <li><a class="text-danger" href="adminProductMange.php">Quản lý sản phẩm</a></li>
                    <li><a class="text-danger" href="#">Quản lý người dùng</a></li>
                    <li><a class="text-danger" href="logout.php">Đăng xuất</a></li>
                </ul>
            </div>
        </nav> -->
    </section>

    <div class="container">
        <div class="row">
            <h1 class="text-center">QUẢN LÝ NGƯỜI DÙNG</h1>
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Danh sách người dùng</h3>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <fliedshet>
                                <tr>
                                    <th>Mã</th>
                                    <th>Tên người dùng</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Email</th>
                                    <th>Chi Tiết</th>
                                    <th>Thú cưng</th>
                                    <th>Xoá</th>
                                </tr>
                            </fliedshet>
                            <tbody>
                                <?php
                                $user = "SELECT * from users";
                                //$rs = mysqli_query($con, $user_ord);
                                $rs = $con->query($user);
                                    if ($rs -> num_rows > 0) {
                                        while($row = $rs->fetch_assoc()) {
                                            echo '
                                <tr>
                                    <td>'.$row['user_id'].'</td>
                                    <td>'.$row['user_name'].'</td>
                                    <td>'.$row['user_phone'].'</td>
                                    <td>'.$row['user_address'].'</td>
                                    <td>'.$row['user_email'].'</td>
                                    <td><a href="detail_order.php?id='.$row['user_id'].'">Xem</a></td>
                                    <td><a href="detail_book.php?id=' .$row['user_id'].'">Xem</a></td>
                                    <td><a href="delete_user.php?id='.$row['user_id'].'">Xoá</td>                        
                                </tr>';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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