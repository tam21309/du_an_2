<?php
include_once './../db.php';

// Kiem tra nguoi dung da gui du lieu di
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Debug du lieu dc gui len
    // echo '<pre>';
    // print_r( $_REQUEST );
    // die();

    // Lấy dữ liệu gửi lên

    $ten  = $_REQUEST['ten'];
    $gia  = $_REQUEST['gia'];
    $so_luong  = $_REQUEST['so_luong'];
    $mo_ta  = $_REQUEST['mo_ta'];
    $color  = $_REQUEST['color'];
    $chat_lieu  = $_REQUEST['chat_lieu'];
    $size  = $_REQUEST['size'];
    $image = $_REQUEST['image'];

    $sql = "INSERT INTO `product`
    ( `ten`, `gia`, `so_luong`,`mo_ta`, `color`, `chat_lieu`,`size`,`image`) 
    VALUES 
    ('$ten', '$gia','$so_luong','$mo_ta','$color','$chat_lieu','$size','$image')";
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
                    <h4 class="text-blue h4">Thêm Sản Phẩm</h4>
                </div>
              
            </div>
            <form action="" method="post">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Tên Sản Phẩm</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="ten" type="text" placeholder="Nhập Tên Sản Phẩm">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Giá</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="gia" placeholder="Nhập Giá Sản Phẩm" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Số Lượng</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="so_luong" placeholder="Nhập Số Lượng Sản Phẩm"  type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Mô Tả</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="mo_ta" placeholder="Nhập Mô Tả Sản Phẩm" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Màu Sắc</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="color" placeholder="Nhập Màu Sắc Sản Phẩm" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Chất Liệu</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="chat_lieu" placeholder="Nhập Chất Liệu Sản Phẩm" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Size</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" placeholder="Nhập Size Sản Phẩm" name="size" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Ảnh</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="image" type="file">
                    </div>
                </div>
                <a href="list.php" class="btn btn-primary">Quay Lại</a>
                <button type="submit" class="btn btn-warning">Thêm</button>
            </form>
        </div>
        <?php include '../Layout/footer.php' ?>
