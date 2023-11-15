<div class="" style="margin-top: 64px;"></div>
<!-- <div class="container-fluid mb-5" style="background: #fef5ef!important;">
    <div class="jumbotron jumbotron-fluid" style="background: #fef5ef!important;" >
        <div class="container">
            <h1 class="text-center">THERANKME SHOP</h1>
            <p class="text-center"><a class="text-link1" href="index.php?url=Home/index">Home</a> > <a class="text-link1" href="index.php?url=Home/product">Shop</a> > Shopping Cart</p>
        </div>
    </div>
</div> -->
<div class="container-fluid" style="margin-bottom: 200px;margin-top: 100px;">
    <div class="container-cover container-cover-cart">
        <div class="update_message_success"></div>
        <?php
        if (isset($data['message_success'])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $data['message_success'] ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }  ?>
        <div class="row">
            <div class="col-sm-6">
                <form action="index.php?url=Checkout/store" method="POST" enctype="application/x-www-form-urlencoded" class="border_form">
                    <h2 class="text-center mb-4">Thông tin</h2>
                    <div class="row">
                        <!-- User name -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã số sinh viên <span class="text-danger">*</span></label>
                                <input type="text" name="user_name" value="<?php echo isset($data['user_login']->user_name) ? $data['user_login']->user_name : ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger" style="font-size: 14px;"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ tên <span class="text-danger">*</span></label>
                                <input type="text" name="full_name" value="<?php echo isset($data['user_login']->full_name) ? $data['user_login']->full_name : ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger" style="font-size: 14px;"></span>
                            </div>
                        </div>
                    </div>

                    <!-- ***************************** -->
                    <!-- <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã lớp <span class="text-danger">*</span></label>
                                <input type="text" name="ma_lop">
                                <span class="text-danger" style="font-size: 14px;"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">   
                        <div class="form-group">
                        <label for="exampleInputEmail1">Ngành học<span class="text-danger">*</label>
                        <select name="method_payment" class="form-control">
                            <option value="0">Công nghệ thông tin</option>
                            <option value="1">Hệ thống thông tin</option>
                            <option value="3">Mạng máy tính và truyền thông dữ liệu</option>
                            <option value="4">Kỹ thuật phần mềm</option>
                            <option value="5">Công nghệ thông tin (CLC)</option>
                            <option value="6">Khoa học máy tính</option>
                            <option value="7">Kỹ thuật phần mềm (CLC)</option>
                            <option value="7">Truyền thông đa phương tiện</option>
                            <option value="7">An toàn thông tin</option>
                            <option value="7">Tin học ứng dụng</option>
                        </select>
                    </div>
                        </div>
                    </div> -->
                    <!-- ////***************************** -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="<?php echo isset($data['user_login']->email) ? $data['user_login']->email : ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger" style="font-size: 14px;"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại <span class="text-danger">*</span></label>
                                <input type="text" name="phone" value="<?php echo isset($data['user_login']->phone) ? $data['user_login']->phone : ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger" style="font-size: 14px;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã lớp <span class="text-danger">*</span></label>
                                <input type="text" name="ma_lop" value="<?php echo isset($data['user_login']->ma_lop) ? $data['user_login']->ma_lop : ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger" style="font-size: 14px;"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngành học <span class="text-danger">*</span></label>
                                <input type="text" name="nganh" value="<?php echo isset($data['user_login']->nganh) ? $data['user_login']->nganh : ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger" style="font-size: 14px;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày sinh <span class="text-danger">*</span></label>
                                <input type="date" name="ngay_sinh" value="<?php echo isset($data['user_login']->ngay_sinh) ? $data['user_login']->ngay_sinh : ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger" style="font-size: 14px;"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số Passport<span class="text-danger">*</span></label>
                                <input type="text" name="passport" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo isset($data['user_login']->passport) ? $data['passport']->passport : ""; ?>">
                                <span class="text-danger" style="font-size: 14px;"></span>
                            </div>
                        </div>
                        <input type="hidden" name="product_id" value="<?php echo $data['product_detail']->id ?>">
                        <input type="hidden" name="product_id" value="<?php echo $data['product_detail']->id ?>">
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chứng chỉ ngoại ngữ <span class="text-danger">*</span></label>
                                <select name="av" class="form-control">
                                    <option selected value="0">B1</option>
                                    <option value="1">Toeic >= 450</option>
                                    <option value="2">Ielts >= 4.5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Học bổng khuyến khích<span class="text-danger">*</span></label>
                                <select name="hoc_bong" class="form-control">
                                    <option selected value="0">Có</option>
                                    <option value="1">Không</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Điểm trung bình học kỳ <span class="text-danger">*</span></label>
                                <input type="text" name="diemtb">
                                <span class="text-danger" style="font-size: 14px;"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Điểm trung bình tích lũy<span class="text-danger">*</span></label>
                                <input type="text" name="diemtl">
                                <span class="text-danger" style="font-size: 14px;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Đã từng đi trao đổi học tập nước ngoài hay chưa?(ghi cụ thể đi đâu, năm nào)<span class="text-danger">*</span></label>
                        <input type="text" name="trao_doi" class="form-control">
                        <span class="text-danger" style="font-size: 14px;"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Có tham gia NCKH/có tham gia viết báo đăng trên các tạp chí không<span class="text-danger">*</span></label>
                        <select name="nckh" class="form-control">
                            <option selected value="0">Không tham gia NCKH và cũng không có bài báo</option>
                            <option value="1">Đã tham gia NCKH và đã nghiệm thu</option>
                            <option value="2">Đang tham gia NCKH, chưa nghiệm thu</option>
                            <option value="3">Có bài báo đăng trên các tạp chí</option>
                        </select>
                    </div>
                    <!-- <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quốc gia <span class="text-danger">*</span></label>
                                <input type="text" name="country" value="<?php echo isset($data['user_login']->country) ? $data['user_login']->country : ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger" style="font-size: 14px;"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tỉnh/Thành phố <span class="text-danger">*</span></label>
                                <input type="text" name="conscious" value="<?php echo isset($data['user_login']->conscious) ? $data['user_login']->conscious : ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger" style="font-size: 14px;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Huyện/Quận <span class="text-danger">*</span></label>
                                <input type="text" name="district" value="<?php echo isset($data['user_login']->district) ? $data['user_login']->district : ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger" style="font-size: 14px;"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Xã/Thị xã <span class="text-danger">*</span></label>
                                <input type="text" name="commune" value="<?php echo isset($data['user_login']->commune) ? $data['user_login']->commune : ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger" style="font-size: 14px;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ chi tiết</label>
                        <input type="text" name="address_detail" value="<?php echo isset($data['user_login']->address_detail) ? $data['user_login']->address_detail : ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <span class="text-danger" style="font-size: 14px;"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ghi chú</label>
                        <input type="text" name="order_note" value="<?php echo isset($data['order_note']->address_detail) ? $data['order_note']->address_detail : ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <span class="text-danger" style="font-size: 14px;"></span>
                    </div> -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình thức đi theo diện<span class="text-danger">*</span></label>
                        <select name="hinh_thuc" class="form-control">
                            <option selected value="0">Học bổng</option>
                            <option value="1">Tự túc</option>
                            <!-- <option value="2">Thanh toán online - VNPAY</option> -->
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="redirect" class="btn2 btn_login btn-primary mr-4" style="background-color: blue;">Submit</button>
                        <a href="index.php?url=product_detail">
                            <button type="button" class="btn2 btn-danger mr-4" style="background-color: red; color:white;">Cancel</button> </a>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">

                <table class="table text-center table-bordered table_cart">
                    <thead>
                        <tr>
                            <th scope="col" style="background-color:white;"> Chương trình đăng ký </th>
                        </tr>
                    </thead>
                    <tbody>

                        <td class="text-center">
                            <img style="height: 250px;" src="./public/uploads/<?php echo $data['product_detail']->image[0] ?>" alt="">
                        </td>
                    </tbody>

                </table>
                <!-- <table class="table text-center table-bordered table_cart">
                    <thead >
                        <tr >
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data['list_cart'])) {
                            $i = 0;
                            foreach ($data['list_cart'] as $key =>  $cart) {
                        ?>
                        <tr>
                            <th><?php echo ($i + 1) ?></th>
                            <td class="text-center">
                                <div class="cart_img">
                                    <img src="./public/uploads/<?php echo $cart['image'] ?>" alt="">
                                </div>
                            </td>
                            <td><a href=""><?php echo $cart['pro_name']; ?></a></td>
                            <td><?php echo number_format($cart['pro_price']) ?>đ</td>
                            <td>
                                <span><?php echo $cart['quatity'] ?></span>
                            </td>
                            <td class="total_price<?php echo $key; ?>"><?php echo number_format($cart['pro_price'] * $cart['quatity']); ?>đ</td>
                        </tr>
                        <?php }
                        } ?>
                        <tr>
                            <th colspan="5">Tổng tiền</th>
                            <td class="total_price"><?php echo isset($data['total_price']) ? number_format($data['total_price']) : 0; ?>đ</td>
                        </tr>
                    </tbody>
                </table>
                <a href="index.php?url=Checkout/momo" class="btn btn-primary">MOMO</a> -->
                <!-- <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="index.php?url=Payment/proccess_momo">
                    <input type="submit" class="btn2 text-center btn_review btn-primary" value="Thanh toán bằng trực tuyến MOMO">
                </form>
                <form class="" method="POST" enctype="application/x-www-form-urlencoded"
                          action="index.php?url=Payment/proccess_vnpay">
                    <input type="submit" name="redirect" class="btn2 text-center btn_review btn-primary" value="Thanh toán bằng trực tuyến VNPay">
                </form> -->
            </div>
        </div>
    </div>
</div>