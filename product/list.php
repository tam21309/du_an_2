<?php
include_once './../db.php';

// include 'db.php';

$sql = "SELECT * FROM `product` ";
// echo $sql; die();
//truyen cau truy van vao
$stmt = $conn->query($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_OBJ); //array => object

//fetchALL se tra ve du lieu nhieu hon 1 ket qua
$rows = $stmt->fetchAll();

// echo '<pre>';
// print_r($rows);
// die();
?>

<?php include '../Layout/header.php';
include '../Layout/sidebar.php';
?>
<style>
  img.image {
    max-width: 215px;
    max-height: 123px;
    border-radius: 14px;
}
th {
    text-align: center;
}
</style>
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">Danh Sách Sản Phẩm</h4>
        </div>
        <div class="pull-right">
            <a href="add.php" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm Sản Phẩm</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Giá</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Ảnh</th>
                <!-- <th scope="col">Mô Tả</th>
                <th scope="col">Màu Sắc</th>
                <th scope="col">Chất Liệu</th>
                <th scope="col">Size</th> -->
                <th scope="col">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $key => $row) : ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $row->ten; ?></td>
                    <td><?= number_format($row->gia); ?></td>
                    <td><?= $row->so_luong; ?></td>
                    <td><img class="image" src="/public/vendors/images/<?=$row->image?>" alt=""></td>
                    <!-- <td><?= $row->mo_ta; ?></td>
                    <td><?= $row->color; ?></td>
                    <td><?= $row->chat_lieu; ?></td>
                    <td><?= $row->size; ?></td> -->
                    <td>
                        <a class="btn btn-secondary" href="show.php?id=<?= $row->id; ?>"><i class="fa fa-eye"></i> Xem</a>
                        <a class="btn btn-warning" href="edit.php?id=<?= $row->id; ?>"><i class="fa fa-edit"></i> Sửa</a>
                        <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không?');" href="delete.php?id=<?= $row->id; ?>"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
            </div>
        </div>
</div>
<?php include '../Layout/footer.php' ?>