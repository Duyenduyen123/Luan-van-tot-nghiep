<div class="title_left">

    <h3><?php echo isset($data['product_edit']) ? "Cập nhật chương trình" : "Thêm mới chương trình" ?></h3>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_content">
                <?php
                if (isset($data['message_error'])) { ?>
                    <h5 class="alert alert-danger text-white"><?php echo $data['message_error']; ?></h5>
                <?php }  ?>
                <br>
                <form method="POST" action=<?php echo isset($data['product_edit']) ? 'index.php?url=Product/update/' . $data['product_edit']->id : 'index.php?url=Product/store';  ?> enctype="multipart/form-data" class="form-label-left input_mask">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 mb-2">
                                <h4>Tên chương trình</h4>
                                <input type="text" name="name" class="form-control" value="<?php
                                                                                            if (isset($data['product_edit'])) echo $data['product_edit']->name;
                                                                                            else {
                                                                                                if (isset($data['result_old']) && isset($data['result_old']['name'])) {
                                                                                                    echo $data['result_old']['name'];
                                                                                                }
                                                                                            } ?>" placeholder="Nhập tên">
                                <?php
                                if (isset($data['error']['name']) && isset($data['error']['name'][0])) { ?>
                                    <span class="text-danger"><?php echo $data['error']['name'][0]; ?></span>
                                <?php } ?>
                            </div>
                            <div class="col-md-6 col-sm-6 mb-2">
                                <h4>Số lượng người tham gia</h4>
                                <input type="text" name="quantity" class="form-control" value="<?php if (isset($data['product_edit'])) echo $data['product_edit']->quantity;
                                                                                                else {
                                                                                                    if (isset($data['result_old']) && isset($data['result_old']['quantity'])) {
                                                                                                        echo $data['result_old']['quantity'];
                                                                                                    }
                                                                                                }    ?>" placeholder="Nhập số lượng">
                                <?php
                                if (isset($data['error']['quantity']) && isset($data['error']['quantity'][0])) { ?>
                                    <span class="text-danger"><?php echo $data['error']['quantity'][0]; ?></span>
                                <?php    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 mb-2">
                                <h4>Chi phí hỗ trợ cho chuyến đi (/người)</h4>
                                <input type="text" name="price_unit" class="form-control" value="<?php if (isset($data['product_edit'])) echo $data['product_edit']->price_unit;
                                                                                                    else {
                                                                                                        if (isset($data['result_old']) && isset($data['result_old']['price_unit'])) {
                                                                                                            echo $data['result_old']['price_unit'];
                                                                                                        }
                                                                                                    } ?>" placeholder="Nhập vào">
                                <?php if (isset($data['error']['price_unit']) && isset($data['error']['price_unit'][0])) { ?>
                                    <span class="text-danger"><?php echo $data['error']['price_unit'][0]; ?></span>
                                <?php } ?>
                            </div>
                            <div class="col-md-6 col-sm-6 mb-2">
                            <h4>Thời gian</h4>
                                <input type="text" name="thoi_gian" class="form-control" value="<?php if (isset($data['product_edit'])) echo $data['product_edit']->thoi_gian;
                                                                                                else {
                                                                                                    if (isset($data['result_old']) && isset($data['result_old']['thoi_gian'])) {
                                                                                                        echo $data['result_old']['thoi_gian'];
                                                                                                    }
                                                                                                }    ?>" placeholder="Nhập thời gian chương trình đi">
                                <?php
                                if (isset($data['error']['thoi_gian']) && isset($data['error']['thoi_gian'][0])) { ?>
                                    <span class="text-danger"><?php echo $data['error']['thoi_gian'][0]; ?></span>
                                <?php    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 mb-2">
                                <h4>Hình ảnh</h4><?php if (isset($data['product_edit'])) { ?> <span class="badge badge-danger">Tồn tại ảnh</span> <?php } ?>
                                <input type="file" name="image[]" class="form-control" value="" multiple>
                                <?php
                                if (isset($data['error']['image']) && isset($data['error']['image'][0])) { ?>
                                    <span class="text-danger"><?php echo $data['error']['image'][0]; ?></span>
                                <?php } ?>


                            </div>
                            <div class="col-md-6 col-sm-6 mb-2">
                                <h4>Tên danh mục</h4>
                                <select name="cat_id" class="form-control">
                                    <?php
                                    if (isset($data['categories'])) {
                                        foreach ($data['categories'] as $category) { ?>
                                            <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                                    <?php  }
                                    } ?>
                                </select>
                                <br>
                                <?php
                                if (isset($data['error']['cat_id']) && isset($error['error']['cat_id'][0])) { ?>
                                    <span class="text-danger"><?php echo $data['error']['cat_id'][0]; ?></span>
                                <?php } ?>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 mb-2">
                            <h4>Mô tả tóm tắt chương trình</h4>
                            <textarea class="form-control" name="description" id="" rows="5"><?php if (isset($data['product_edit'])) echo $data['product_edit']->description; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 mb-4">
                            <?php
                            if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0 || $_SESSION['admin_login']['role'] == 1 ) { ?>
                                <h4>
                                    <input name="status" <?php if (isset($data['product_edit']))  echo ($data['product_edit']->status == 1) ? "checked" : ""; ?> type="checkbox"><label class="ml-3">Trạng thái</label>
                                </h4>
                            <?php }
                            ?>

                        </div>
                    </div>

                    <!-- đường dẫn file -->
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 mb-2">
                            <h4>Chi tiết kết hoạch</h4><?php if (isset($data['product_edit'])) { ?> <span class="badge badge-danger">Tồn tại file</span> <?php } ?>
                            <input type="file" name="pdf" class="form-control" value="" multiple>
                            <?php
                            if (isset($data['error']['image']) && isset($data['error']['image'][0])) { ?>
                                <span class="text-danger"><?php echo $data['error']['image'][0]; ?></span>
                            <?php } ?>


                        </div>
                    </div>

                    <!-- <div class="ln_solid"></div> -->
                    <div class="form-group row">
                        <div class="col-md-8 col-sm-8  offset-md-4">
                            <a href="index.php?url=Product/index"><button type="button" class="btn btn-primary">Cancel</button></a>
                            <?php
                            if (isset($data['product_edit'])) { ?>
                                <button type="submit" name="btnStoreProduct" class="btn btn-danger">Update</button>
                            <?php } else { ?>
                                <button type="submit" name="btnStoreProduct" class="btn btn-success">Submit</button>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>