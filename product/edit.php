<?php
include_once './../db.php';

$id = $_GET['id'];
// Debug gia tri lay xuong
// var_dump($id);
$sql = "SELECT * FROM `product` WHERE id = $id ";
// Debug cau SQL
// var_dump($sql);

//truyen cau truy van vao
$stmt = $conn->query($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_OBJ); //array => object
//fetch se tra ve duy nhất 1 ket qua
$row = $stmt->fetch();
// Debug dữ liệu trả về

// Kiem tra nguoi dung da gui du lieu di
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Debug du lieu dc gui len
    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();

    // Lấy dữ liệu gửi lên
    // $id    = $_REQUEST['id'];
    $ten   = $_REQUEST['ten'];
    $gia   = $_REQUEST['gia'];
    $so_luong   = $_REQUEST['so_luong'];
    $mo_ta   = $_REQUEST['mo_ta'];
    $color   = $_REQUEST['color'];
    $chat_lieu   = $_REQUEST['chat_lieu'];
    $size   = $_REQUEST['size'];
    $image   = $_REQUEST['image'];

    $sql = "UPDATE `product` 
        SET 
            `ten` = '$ten', 
            `gia` = '$gia',
            `so_luong` = '$so_luong',
            `mo_ta` = '$mo_ta',
            `color` = '$color',
            `chat_lieu` = '$chat_lieu',
            `size` = '$size',
            `image` = '$image'
        WHERE `product`.`id` = $id";
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
                    <h4 class="text-blue h4">Cập Nhật Sản Phẩm</h4>
                </div>
              
            </div>
            <form action="" method="post">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Tên Sản Phẩm</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="ten" value="<?= $row->ten ?>" type="text" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Giá</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="gia" value="<?= $row->gia ?>" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Số Lượng</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="so_luong" value="<?= $row->so_luong ?>"  type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Mô Tả</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="mo_ta" value="<?= $row->mo_ta ?>"  type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Màu Sắc</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="color" value="<?= $row->color ?>"  type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Chất Liệu</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="chat_lieu" value="<?= $row->chat_lieu ?>" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Size</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control"  name="size" value="<?= $row->size ?>" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Ảnh</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="image" type="file">
                    </div>
                </div>
                <a href="list.php" class="btn btn-primary">Quay Lại</a>
                <button type="submit" class="btn btn-warning">Lưu</button>
            </form>
        </div>
        <?php include '../Layout/footer.php' ?>