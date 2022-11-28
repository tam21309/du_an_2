<?php
include_once './../db.php';

// Kiem tra nguoi dung da gui du lieu di
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Debug du lieu dc gui len
    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();

    // Lấy dữ liệu gửi lên

    $name  = $_REQUEST['name'];
    $address = $_REQUEST['address'];
    $phone  = $_REQUEST['phone'];
    $email  = $_REQUEST['email'];

    $sql = "INSERT INTO `khach_hang`
    ( `name`, `address`,`phone`, `email`) 
    VALUES 
    ('$name', '$address','$phone','$email')";
    // print_r($sql);
    // die();
    // Debug sql
    // var_dump($sql);
    // die();

    // THuc hien truy van
    try {
        $conn->exec($sql);
        // CHuyển hướng về danh sách
        header("Location: list.php?msg=OK");
    } catch (Exception $e) {
        // CHuyển hướng về danh sách
        header("Location: list.php?msg=FAIL");
    }
}

?>
<?php include '../Layout/header.php';
include '../Layout/sidebar.php';
?>
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Thêm Khách Hàng</h4>
                </div>
              
            </div>
            <form action="" method="post">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Tên Khách Hàng</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="name" type="text" placeholder="Nhập Tên Khách Hàng">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Địa Chỉ</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="address" placeholder="Nhập Địa Chỉ Khách Hàng" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Số Điện Thoại</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="phone" placeholder="Nhập Số Điện Thoại Khách Hàng"  type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="email" placeholder="Nhập Email Khách Hàng" type="text">
                    </div>
                </div>
                <a href="list.php" class="btn btn-primary">Quay Lại</a>
                <button type="submit" class="btn btn-warning">Thêm</button>
            </form>
        </div>
        <?php include '../Layout/footer.php' ?>