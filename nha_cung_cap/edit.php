<?php
include_once './../db.php';

$id = $_GET['id'];
// Debug gia tri lay xuong
// var_dump($id);
$sql = "SELECT * FROM `nha_cung_cap` WHERE id = $id ";
// Debug cau SQL
// var_dump($sql);

//truyen cau truy van vao
$stmt = $conn->query($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_OBJ);//array => object
//fetch se tra ve duy nhất 1 ket qua
$row = $stmt->fetch();
// Debug dữ liệu trả về

// Kiem tra nguoi dung da gui du lieu di
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    // Debug du lieu dc gui len
    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();

    // Lấy dữ liệu gửi lên
    $name   = $_REQUEST['name'];
    $address    = $_REQUEST['address'];
    $phone    = $_REQUEST['phone'];

    $sql = "UPDATE `nha_cung_cap` SET `name`='$name',`address`='$address',`phone`='$phone' WHERE id = '$id'";
   
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
                    <h4 class="text-blue h4">Cập Nhật Nhà Cung Cấp</h4>
                </div>
              
            </div>
            <form action="" method="post">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Tên Nhà Cung Cấp</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="name" value="<?= $row->name?>"  type="text" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Địa Chỉ</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="address" value="<?= $row->address?>" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Số Điện Thoại</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="phone" value="<?= $row->phone?>" type="text">
                    </div>
                </div>
                <a href="list.php" class="btn btn-primary">Quay Lại</a>
                <button type="submit" class="btn btn-warning">Lưu</button>
            </form>
        </div>
        <?php include '../Layout/footer.php' ?>

