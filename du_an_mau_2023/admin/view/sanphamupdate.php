<?php 

// foreach ($bienthe as $bt){
//     echo "<pre>";
//     print_r($bt);

// }
$old_image_arr= array_column($img, 'ten_hinh');
$old_image_string = implode(', ', $old_image_arr);

// echo '<pre>';
// print_r($old_image_string);
if(is_array($sp)&&(count($sp)> 0)){
extract($sp);
$idupdate=$id;
}
$html_danhmuclist = showdm_admin_update($danhmuclist,$iddm);
?>
<div class="main-content">
    <h3 class="title-page">
        Cập Nhật sản phẩm
    </h3>

    <form class="addPro" action="admin.php?pg=updateproduct" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputFile">Ảnh sản phẩm</label>
            <div class="custom-file">
                <input type="file" name="image[]" class="custom-file-input" id="exampleInputFile" multiple>
                <input type="hidden" value="<?=$old_image_string?>" name="imageold" class="custom-file-input" id="exampleInputFile" >
                <?php 
foreach($img as $anh){
    $imgpath = IMG_PATH_ADMIN.$anh['ten_hinh'];
    $img = '<img src="'.$imgpath.'" width="80px" style="margin-right:10px;">';
    echo $img;
}
?>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name" value="<?= ($name!="")?$name:"" ?>" id="name"
                placeholder="Nhập tên sả phẩm">
        </div>
        <div class="form-group">
            <label for="categories">Danh mục:</label>
            <select class="form-select" name="iddm" aria-label="Default select example">
                <option selected>Chọn danh mục</option>
                <?=$html_danhmuclist?>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Mô tả:</label>
            <input type="text" class="form-control" name="mota" value="<?= ($mota!="")?$mota:"" ?>" id="mota"
                placeholder="Nhập mô tả">
        </div>
        <div class="form-group">
            <label for="price">Giá gốc:</label>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">đ</span>
                </div>
                <input type="text" name="price" id="price" value="<?= ($price>0)?$price:0 ?>" id="name"
                    class="form-control" placeholder="Nhập giá gốc">
                <input type="text" hidden name="id" value="<?=$idupdate?>">
            </div>
        </div>

        <div class="form-row">
            <div style="display:grid;grid-template-columns: 50% 50%; align-items: center;">
                <div class="form-group col-md-10">
                    <div id="size-container">
                        <label for="price">Size:</label>
                        <?php 
                            foreach($bienthe as $bt){
                                extract($bt);
                                $aa= '<input type="text" id="size" name="size[]" class="form-control" placeholder="Nhập size" value="'.$kichthuoc.'">';
                                echo $aa;
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group col-md-10">
                    <div id="soluong-container">
                        <label for="price">Số lượng:</label>
                        <?php 
                            foreach($bienthe as $bt){
                                extract($bt);
                                $aa= '<input style="margin-bottom:10px;" type="text" id="soluong" name="soluong[]" class="form-control" placeholder="Nhập số lượng" value="'.$soluong.'">';
                                echo $aa;
                            }
                        ?>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-success" id="addSizeButton" style="margin-bottom:20px;">Thêm
                size</button>
        </div>
        <div class="form-group">
            <button type="submit" name="updateproduct" class="btn btn-primary">Cập nhật sản phẩm</button>
        </div>
    </form>
</div>

<script>
new DataTable('#example');
</script>