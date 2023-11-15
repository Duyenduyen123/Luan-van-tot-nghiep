<?php
    require_once('./mvc/controllers/Mail.php');
    require_once('./mvc/controllers/Payment.php');

    class Checkout extends Controller{
        public $slider;
        public $product;
        public $category;
        public $blog;
        public $categoryofblog;
        public $tags;
        public $blog_categoryofblog;
        public $blog_tags;
        public $order;
        public $order_detail;
        public $tbl_statistical;
        public $user;
        
        public function __construct()
        {
            $this->slider = $this->model('SliderModel');
            $this->product = $this->model('ProductModel');
            $this->category = $this->model('CategoryModel');
            $this->blog = $this->model('BlogModel');
            $this->categoryofblog = $this->model('CategoryBlogModel');
            $this->tags = $this->model('TagsModel');
            $this->blog_categoryofblog = $this->model('Blog_CategoryOfBlogModel');
            $this->blog_tags = $this->model('Blog_TagsModel');
            $this->order = $this->model('OrderModel');
            $this->order_detail = $this->model('Order_DetailModel');
            $this->tbl_statistical = $this->model('Tbl_StatisticalModel');
            $this->user= $this->model('UserModel');
        }

        public function destroy($order_id){
            $result = json_decode($this->order->delete_order_id($order_id));
            if($result){
                $this->order_detail->delete_order_id($order_id);
            }
            header('location: index.php?url=History_Order');

        }

       public function store(){

        $product_id = $_POST['product_id'];
        $product = $this->product->getById($product_id);
        $product = json_decode($product);
        $image = $product->image[0];
        $name =  $product->name;
       
        $error = array();
        $test_validate = false;
        $result_old = array();
        //1. user_name
        $error['user_name'] = array();
        if($_POST['user_name']==""){
            $test_validate = true;
            array_push($error['user_name'],'Vui lòng nhập username');
        }else{
            $result_old['user_name'] = $_POST['user_name'];
        }

        //2. full_name
        $error['full_name'] = array();
        if($_POST['full_name']==""){
            $test_validate = true;
            array_push($error['full_name'],'Vui lòng nhập họ và tên');
        }else{
            $result_old['full_name'] = $_POST['full_name'];
        }

        //3. email
        $error['email'] = array();
        if($_POST['email']=="") {
            $test_validate = true;
            array_push($error['email'],'Vui lòng nhập email');
        }else{
            $result_old['email'] = $_POST['email'];
        }

        //4. phone
        $error['phone'] = array();
        if($_POST['phone']==""){
            $test_validate = true;
            array_push($error['phone'],'Nhập số điện thoại');
        }else{
            $result_old['phone'] = $_POST['phone'];
        }

        // 5. Lop
        $error['ma_lop'] = array();
        if($_POST['ma_lop']==""){
            $test_validate = true;
            array_push($error['ma_lop'],'Vui lòng nhập mã lớp');
        }else{
            $result_old['ma_lop'] = $_POST['ma_lop'];
        }

        // 6. Nganh
        $error['nganh'] = array();
        if($_POST['nganh']==""){
            $test_validate = true;
            array_push($error['nganh'],'Vui lòng nhập ngành học');
        }else{
            $result_old['nganh'] = $_POST['nganh'];
        }

        // 7. Ngay sinh
        $error['ngay_sinh'] = array();
        if($_POST['ngay_sinh']==""){
            $test_validate = true;
            array_push($error['ngay_sinh'],'Vui lòng nhập ngày sinh');
        }else{
            $result_old['ngay_sinh'] = $_POST['ngay_sinh'];
        }

        // 8. Passport
        $error['passport'] = array();
        if($_POST['passport']==""){
            $test_validate = true;
            array_push($error['passport'],'Vui lòng nhập số passport');
        }else{
            $result_old['passport'] = $_POST['passport'];
        }

        // 9. Av
        $error['av'] = array();
        if($_POST['av']==""){
            $test_validate = true;
            array_push($error['av'],'Vui lòng nhập chứng chỉ av nếu có');
        }else{
            $result_old['av'] = $_POST['av'];
        }
       
        // 10. HBKK
        $error['hoc_bong'] = array();
      
        if($_POST ['hoc_bong']==""){
            $test_validate = true;
            array_push($error['hoc_bong'],'Bạn có HBKK không?');
        }else{
            $result_old['hoc_bong'] = $_POST['hoc_bong'];
        }
        // $error['hoc_bong'] ='';
        // if (empty($_POST ['hoc_bong'])){
        //     $error['hoc_bong'] = "Bạn có HBKK không?";
        // } else {
        //     $result_old['hoc_bong'] = $_POST['hoc_bong'];
        // }

     
        //11. Điểm TB
        $error['diemtb'] = array();
        if($_POST['diemtb']==""){
            $test_validate = true;
            array_push($error['diemtb'],'Vui lòng nhập điểm trung bình học kỳ');
        }else{
            $result_old['diemtb'] = $_POST['diemtb'];
        }

        //12. Điểm TL
        $error['diemtl'] = array();
        if($_POST['diemtl']==""){
            $test_validate = true;
            array_push($error['diemtl'],'Vui lòng nhập điểm tích lũy');
        }else{
            $result_old['diemtl'] = $_POST['diemtl'];
        }

        //13. Trao đổi
        // $error['trao_doi'] = array();
        // if($_POST['trao_doi']==""){
        //     $test_validate = true;
        //     array_push($error['trao_doi'],'Vui lòng nhập vào thông tin');
        // }else{
        //     $result_old['trao_doi'] = $_POST['trao_doi'];
        // }

        //14. NCKH
        // $error['nckh'] = array();
        // if($_POST['nckh']==""){
        //     $test_validate = true;
        //     array_push($error['nckh'],'Bạn có làm NCKH chưa?');
        // }else{
        //     $result_old['nckh'] = $_POST['nckh'];
        // }

        //15. Hình thức

       
        $error['hinh_thuc'] = array();
        if($_POST['hinh_thuc']==""){
            $test_validate = true;
            array_push($error['hinh_thuc'],'Hãy chọn hình thức đi trao đổi');
        }else{
            $result_old['hinh_thuc'] = $_POST['hinh_thuc'];
        }

        //5. country
        // $error['country'] = array();
        // if($_POST['country']==""){
        //     $test_validate = true;
        //     array_push($error['country'],'Vui lòng nhập tên quốc gia');
        // }else{
        //     $result_old['country'] = $_POST['country'];
        // }

        //6. conscious
        // $error['conscious'] =array();
        // if($_POST['conscious']==""){
        //     $test_validate = true;
        //     array_push($error['conscious'],'Vui lòng nhập tên tỉnh/thành phố');
        // }else{
        //     $result_old['conscious'] = $_POST['conscious'];
        // }

        //7. district
        // $error['district']=array();
        // if($_POST['district']==""){
        //     $test_validate = true;
        //     array_push($error['district'],'Vui lòng nhập tên quận/huyện');
        // }else{
        //     $result_old['district'] = $_POST['district'];
        // }

        //8. commune
        // $error['commune'] = array();
        // if($_POST['commune']==""){
        //     $test_validate = true;
        //     array_push($error['commune'],'Vui lòng nhập tên xã/thị xã');
        // }else{
        //     $result_old['commune'] = $_POST['commune'];
        // }
            
        // if($test_validate){
        //     $this->view('frontend/login/register',[
        //         'error'         => $error,
        //         'result_old'    => $result_old
        //     ]);
        // }else{
            
            $user_id = $_SESSION['user_login']['id'];
            // $user_name = $_POST['$user_name'];
            $full_name = $_POST['full_name'];
            // $country = $_POST['country'];
            // $conscious = $_POST['conscious'];
            // $district = $_POST['district'];
            // $commune = $_POST['commune'];
            // $address_detail = isset($_POST['address_detail'])?$_POST['address_detail']:"";
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            // $order_note = isset($_POST['order_note'])?$_POST['order_note']:"";
            $status = 0;
            $created_at = Date('Y-m-d H:i:s');
            $updated_at = Date('Y-m-d H:i:s');
            $ma_lop = $_POST['ma_lop'];
            $nganh = $_POST['nganh'];
            $passport = $_POST['passport'];
            $av = $_POST['av'];
            $hoc_bong = $_POST['hoc_bong'];
            $diemtb = $_POST['diemtb'];
            $diemtl = $_POST['diemtl'];
            $trao_doi = $_POST['trao_doi'];
            $nckh = $_POST['nckh'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $hinh_thuc = $_POST['hinh_thuc'];
            $data['ma_lop'] = $ma_lop;
            $data['nganh'] = $nganh;
            $data['passport'] = $passport;
            $data['av'] = $av;
            $data['hoc_bong'] = $hoc_bong;
            $data['diemtb'] = $diemtb;
            $data['diemtl'] = $diemtl;

            $data['nckh'] = $nckh;
            $data['hinh_thuc'] = $hinh_thuc;
            // echo json_encode($data);
            // die();
            $order_id = json_decode($this->order->insert($user_id,$full_name,$phone,$email,$status,$created_at,$updated_at,$passport,$av, $hoc_bong,$diemtb,$diemtl,$trao_doi, $nckh,$ma_lop,$nganh,$ngay_sinh,$hinh_thuc,$image,$name));
            
            
            $total = 0;
            $total_quantity = 0;
            if(isset($order_id)){
                $list_cart = $_SESSION['cart'];
                $total = 0;
                $total_quantity = 0;
                foreach($list_cart as $key => $cart){
                    
                    $order_id = $order_id;
                    $user_id = $user_id;
                    $pro_id = $key;
                    $pro_name = $cart['pro_name'];
                    $pro_image = $cart['image'];
                    $pro_price = $cart['pro_price'];
                    $pro_quantity = $cart['quatity'];
                    $created_at = $created_at;
                    $updated_at = $updated_at;
                    $total += (int)$pro_price*$pro_quantity;
                    $total_quantity += (int)$pro_quantity;
                    $result = json_decode($this->order_detail->insert($order_id,$user_id,$pro_id,$pro_name,$pro_image,$pro_price,$pro_quantity,$created_at,$updated_at));
                }

                
                
            }

            //Xu li them record vao tbl_staticle
            // $order_date = $created_at;
            $order_date = Date('Y-m-d');
            $statistical_item = json_decode($this->tbl_statistical->get_order_date($order_date));
           
            if(isset($statistical_item)){ //da co order date
                $order_date = Date('Y-m-d');
                $sales = $total+$statistical_item->sales;
                $profit = ceil(0.1*$total)+$statistical_item->profit;
                $quantity = $total_quantity+$statistical_item->quantity;
                $total_order =1 + $statistical_item->total_order;
                $id_statistical  = $statistical_item->id_statistical;
                $kq = $this->tbl_statistical->update_order_date($sales,$profit,$quantity,$total_order,$id_statistical);
            }else{ // chua co order data
               
                $order_date = Date('Y-m-d');
                $sales = $total;
                $profit = ceil(0.05*$total);
                $quantity = $total_quantity;
                $total_order =1;
                $kq = $this->tbl_statistical->insert($order_date,$sales,$profit,$quantity,$total_order);
            }
            //Gui email

            $order_info = json_decode($this->order->getId($order_id),true);
            $order_info['order_detail'] = json_decode($this->order_detail->getList_by_orderid($order_id),true);
          
            $mail = new Mail();
            $mail->sendMail_Order($order_info);
            $mail = new Mail();
            $user_name = "username";
            $password = "password";
            $email = "email";
            $mail->sendLoginInfo($email, $user_name, $password);
            if($_POST['method_payment']==1){
                $payment =  new Payment();
                unset($_SESSION['cart']);
                $payment->proccess_momo($total);
            }elseif($_POST['method_payment']==2){
                $payment =  new Payment();
                unset($_SESSION['cart']);
                $payment->proccess_vnpay($total);
            }

            if($_POST['method_payment']!=1){
                unset($_SESSION['cart']);
                header('location: index.php?url=History_Order');
            }
        // }
      

    }

    public function momo(){
        header('Content-type: text/html; charset=utf-8');
        function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            return $result;
        }
        
        
       
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        
        
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() ."";
        $redirectUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $extraData = "";
       
        
            $requestId = time() . "";
            $requestType = "captureWallet";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
               
            $result = execPostRequest($endpoint, json_encode($data));
            
            $jsonResult = json_decode($result, true);  // decode json
           
            //Just a example, please check more in there
           
            header('Location: ' . $jsonResult['payUrl']);
            // echo "thanh toan mômp";
            // return redirect()->back();
        
    }
    }
