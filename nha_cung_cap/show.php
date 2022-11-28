<?php
include_once './../db.php';

// echo '<pre>';
// print_r( $_GET );
// die();

$id = $_GET['id'];

// Debug gia tri lay xuong
// var_dump($id);
$sql = "SELECT * FROM `nha_cung_cap` WHERE id = $id ";
// Debug cau SQL
// var_dump($sql);

//truyen cau truy van vao
$stmt = $conn->query($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_OBJ); //array => object
//fetch se tra ve duy nhất 1 ket qua
$row = $stmt->fetch();

?>
<?php include '../Layout/header.php';
include '../Layout/sidebar.php';
?>
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">Xem Chi Tiết</h4>
        </div>
    </div>
    <table class="table table-bordered">
            <tr>
                <th scope="col">#</th>
                <td scope="col"><?= $row->id ?></td>
            </tr>
            <tr>
                <th>Tên Nhà Cung Cấp</th>
                <td><?= $row->name ?></td>
            </tr>
            <tr>
                <th>Địa CHỉ Nhà Cung Cấp</th>
                <td><?= $row->address ?></td>
            </tr>
            <tr>
                <th>Số Điện Thoại Nhà Cung Cấp</th>
                <td><?= $row->phone ?></td>
            </tr>
    </table>
    <a href="list.php" class="btn btn-primary">Quay Lại</a>
        </div>
    </div>
</div>
<?php include '../Layout/footer.php' ?>



