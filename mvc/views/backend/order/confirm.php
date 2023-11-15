<div class="title_left">
    <h3>Danh sách sinh viên xác nhận</h3>
</div>
<div class="row">
    <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Học bổng
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="index.php?url=Order/hoc_bong">Có học bổng</a>
            <a class="dropdown-item" href="index.php?url=Order/hoc_bong_khong">Không có học bổng</a>
        </div>
    </div>
    <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Chứng chỉ tiếng anh
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="index.php?url=Order/av_b1">B1</a>
            <a class="dropdown-item" href="index.php?url=Order/av_toeic">Toeic >= 450</a>
            <a class="dropdown-item" href="index.php?url=Order/av_ielts">Ielts >= 4.5</a>
        </div>
    </div>
    <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Nghiên cứu khoa học
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="index.php?url=Order/nckh_0">Không tham gia NCKH và cũng không có bài báo</a>
            <a class="dropdown-item" href="index.php?url=Order/nckh_1">Đã tham gia NCKH và đã nghiệm thu</a>
            <a class="dropdown-item" href="index.php?url=Order/nckh_2">Đang tham gia NCKH, chưa nghiệm thu</a>
            <a class="dropdown-item" href="index.php?url=Order/nckh_3">Có bài báo đăng trên các tạp chí</a>
        </div>
    </div>
    <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hình thức đi
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="index.php?url=Order/hinh_thuc_0">Học bổng</a>
            <a class="dropdown-item" href="index.php?url=Order/hinh_thuc_1">Tự túc</a>
        </div>
    </div>
    <a href="index.php?url=Order/index" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Quay lại
    </a>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">

            <div class="x_content">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Họ tên</th>
                                <th class="text-center">Lớp</th>
                                <th class="text-center">Ngành học</th>
                                <th class="text-center">Ngày sinh </th>
                                <th class="text-center">Số passport</th>
                                <th class="text-center">Thông tin chương trình</th>
                                <!-- <th class="text-center">Thông tin liên lạc</th> -->
                                <th class="text-center">Thông tin đăng ký</th>
                                <th class="text-center">Nghiên cứu khoa học</th>
                                <th class="text-center">Đi trao đổi</th>
                                <th class="text-center">Hình thức đăng ký đi</th>
                                <th class="text-center">Ngày đăng ký</th>
                                <th class="text-center">Tình trạng đơn hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($data['list_order'])) {
                                foreach ($data['list_order'] as $key => $order) { ?>
                                    <tr>
                                        <th scope="row"><?php echo ($key + 1); ?></th>
                                        <td><?php echo $order['full_name'] ?><br><a href="index.php?url=Order/print_order/<?php echo $order['id']; ?>"><i class="fa fa-print" aria-hidden="true"></i> In đơn hàng<a></td>
                                        <td><?php echo $order['ma_lop'] ?></td>
                                        <td>
                                            <?php
                                                if ($order['nganh'] == '0') {
                                                    echo "Công nghệ thông tin";
                                                } elseif ($order['nganh'] == '1') {
                                                    echo 'Kỹ thuật phần mềm';
                                                } elseif ($order['nganh'] == '2') {
                                                    echo 'Hệ thống thông tin';
                                                } elseif ($order['nganh'] == '3') {
                                                    echo 'Khoa học máy tính';
                                                } elseif ($order['nganh'] == '4') {
                                                    echo 'Mạng máy tính và truyền thông';
                                                } elseif ($order['nganh'] == '5') {
                                                    echo 'Truyền thông đa phương tiện';
                                                } elseif ($order['nganh'] == '6') {
                                                    echo 'An toàn thông tin';
                                                } elseif ($order['nganh'] == '7') {
                                                    echo 'Công nghệ thông tin - CT Chất lượng cao';
                                                } elseif ($order['nganh'] == '8') {
                                                    echo 'Kỹ thuật phần mềm - CT Chất lượng cao';
                                                } else {
                                                    echo 'Chuyên ngành Tin học ứng dụng';
                                                }
                                            ?>
                                    </td>
                                        <td><?php echo $order['ngay_sinh'] ?></td>
                                        <td><?php echo $order['passport'] ?></td>
                                        <td>
                                            <img height="100" width="130" src="./public/uploads/<?php echo $order['image'] ?>" alt="">
                                            <!-- <?php echo $order['image'] ?></td> -->
                                            <br><br>
                                            <?php echo $order['name'] ?>
                                        </td>
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
                                                    ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">Học bổng khuyến khích</div>
                                                <div class="col-md-6" style="font-weight: bold;"><?php echo isset($order['hoc_bong']) && $order['hoc_bong'] == "0" ? "Có" : "Không"  ?></div>

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
                                        <!-- <td><?php echo $order['nckh']  ?></td> -->
                                        <td>
                                            <?php
                                            if ($order['nckh'] == '0') {
                                                echo "Không tham gia NCKH và cũng không có bài báo";
                                            } elseif ($order['nckh'] == '1') {
                                                echo 'Đã tham gia NCKH và đã nghiệm thu';
                                            } elseif ($order['nckh'] == '2') {
                                                echo 'Đang tham gia NCKH, chưa nghiệm thu';
                                            } else {
                                                echo 'Có bài báo đăng trên các tạp chí';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $order['trao_doi'] ?></td>
                                        <td><?php echo $order['hinh_thuc'] == '0' ? "Học bổng" : "Tự túc"  ?></td>
                                        <td><?php echo $order['created_at']; ?></td>
                                        <td class="text-center">
                                            <?php
                                            $string_status = "";
                                            if ($order['status'] == 0)  $string_status = "Duyệt";
                                            elseif ($order['status'] == 1) $string_status = "Đã thêm vào danh sách";
                                            else  $string_status = "SV đã xác nhận";
                                            ?>
                                            <span id="<?php echo $order['id']; ?>" style="cursor:pointer" class="order_status_confirm<?php echo $order['id']; ?> <?php if ($order['status'] == 0) echo 'btn btn-sm btn-primary'; ?> btn_confirm_order"><?php echo $string_status; ?></span>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="dataTables_paginate paging_simple_numbers float-right" id="datatable-checkbox_paginate">
                    <ul class="pagination">
                        <?php
                        for ($i = 1; $i <= $data['total_page_number']; $i++) { ?>
                            <li class="paginate_button active"><a <?php if (isset($data['page_index']) && $data['page_index'] == $i) { ?> style="color: #fff;" <?php } ?> href="index.php?url=Order/index/page=<?php echo $i ?>" aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0"><?php echo ($i) ?></a></li>
                        <?php  }  ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
