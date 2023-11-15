<div class="title_left">
    <h3>Thêm tài khoản mới</h3>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <?php
                if (isset($data['message'])) { ?>
                    <h5 class="alert alert-success text-white"><?php echo $data['message']; ?></h5>
                <?php }  ?>
                <?php
                if (isset($data['message_error'])) { ?>
                    <h5 class="alert alert-danger text-white"><?php echo $data['message']; ?></h5>
                <?php } ?>

                <a href="index.php?url=User_Login/register">
                    <button class="btn btn-primary">Thêm mới bằng cách nhập <i class="fa fa-plus"></i></button>
                </a>
                <br>
                <hr>
                <!-- <a href="index.php?url=CategoryBlog/create">
                    <button class="btn btn-primary">Thêm mới bằng cách upload file excel <i class="fa fa-plus"></i></button>
                </a> -->
                <a href="index.php?url=Adduser_excel/index">
                <button class="btn btn-primary">Thêm mới bằng cách upload file excel <i class="fa fa-plus"></i></button>
                </a>
                <!-- <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="excel_file" accept=".xls, .xlsx">
                    <button type="submit">Upload</button>
                </form> -->
                <!-- <form method="post" action="process.php" enctype="multipart/form-data">
                    <input type="file" name="userFile" accept=".xlsx, .xls">
                    <input type="submit" name="submit" value="Tạo tài khoản">
                </form> -->
                
            </div>
        </div>
    </div>
</div>