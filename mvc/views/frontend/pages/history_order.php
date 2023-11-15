<div class="" style="margin-top: 120px;"></div>
<!-- <div class="container-fluid mb-5" style="background: #fef5ef!important;">
    <div class="jumbotron jumbotron-fluid" style="background: #fef5ef!important;" >
        <div class="container">
            <h1 class="text-center">THERANKME SHOP</h1>
            <p class="text-center"><a class="text-link1" href="index.php?url=Home/index">Home</a> > <a class="text-link1" href="index.php?url=Home/product">Shop</a> > Lịch sử đơn hàng</p>
        </div>
    </div>
</div> -->
<div class="container-fluid my-5">
    <div class="container-cover">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center">Người đăng ký</th>
                        <th class="text-center">Thông tin chương trình</th>
                        <th class="text-center">Thông tin đăng ký</th>
                        <th  class="text-center">Nghiên cứu khoa học</th>
                        <th  class="text-center">Đi trao đổi</th>
                        <th  class="text-center">Hình thức đi</th>
                        <th class="text-center">Ngày đăng ký</th>
                        <!-- <th class="text-center">Tình trạng đăng ký</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(isset($data['list_order'])){ 
                            foreach($data['list_order'] as $key => $order){ ?>
                    <tr>
                        <th scope="row"><?php echo ($key+1); ?></th>
                        <td><?php echo $order['full_name'] ?></td>
                        <td>
                        <!-- <img height="100" width="130" src="./public/uploads/<?php echo $order['image'] ?>" alt="">
                        <br> -->
                        <?php echo $order['name'] ?>
                        </td>
                        <td>
                                    <div class="row">
                                        <div class="col-md-6">Chứng chỉ tiếng anh</div>
                                        <div class="col-md-6" style="font-weight: bold;">
                                        <?php
                                                if ($order['av'] == '0') {
                                                    echo "B1";
                                                } elseif ($order['av'] == '1') {
                                                    echo 'Toeic >= 450';
                                                } else {
                                                    echo 'Ielts >= 4.5';
                                                }
                                                ?></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">Học bổng khuyến khích</div>
                                        <div class="col-md-6" style="font-weight: bold;"><?php echo $order['hoc_bong'] == '0' ? "Có" : "Không"  ?></div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">Điểm trung bình</div>
                                        <div class="col-md-6" style="font-weight: bold;"><?php echo $order['diemtb'] ?></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">Điểm tích lũy</div>
                                        <div class="col-md-6" style="font-weight: bold;"><?php echo $order['diemtl'] ?></div>
                                    </div>
                                </td>
                               
                                <td>
                                <?php 
                                if($order['nckh'] == '0'){
                                    echo "Không tham gia NCKH và cũng không có bài báo";}
                                elseif ($order['nckh'] == '1'){
                                    echo 'Đã tham gia NCKH và đã nghiệm thu';
                                }
                                elseif($order['nckh'] == '2'){
                                    echo 'Đang tham gia NCKH, chưa nghiệm thu';
                                }
                                else{
                                    echo 'Có bài báo đăng trên các tạp chí';
                                }
                                 ?>
                                </td>
                        <td><?php echo $order['trao_doi']; ?></td>
                        <td><?php echo $order['hinh_thuc'] == '0' ? "Học bổng" : "Tự túc"  ?></td>
                        <td><?php echo $order['created_at']; ?></td>
                        <!-- Tình trạng đơn hàng -->
                        <!-- <td class="text-center">
                                    <?php 
                                        $string_status = "";
                                        if($order['status']==0)  $string_status = "Chờ xác nhận";
                                        elseif($order['status']==1) $string_status = "Nhận hàng";
                                        else  $string_status = "Đã nhận hàng";       
                                    ?>
                                    <span id="<?php echo $order['id']; ?>" style="cursor:pointer; font-size: 16px;padding: 5px;" class="order_status_nhan_hang_confirm<?php echo $order['id']; ?> <?php if($order['status']==1) echo 'btn2 btn_nhan_hang'; ?> btn_confirm_order"><?php echo $string_status; ?></span>
                                    <br> 
                                    <?php 
                                        if($order['status']==0){ ?>
                                            <a href="index.php?url=Checkout/destroy/<?php echo $order['id'] ?>" style="cursor:pointer" class="badge badge-danger">Hủy đơn hàng <i class="fa fa-trash"></i></a>
                                    <?php } ?> 
                                    
                                
                                </td> -->
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>