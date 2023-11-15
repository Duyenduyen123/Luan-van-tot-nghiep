<?php
class Partner_Login extends Controller
{
    public $partner;
    public $slider;
    public $product;
    public $category;
    public $blog;
    public $categoryofblog;
    public $tags;
    public $blog_categoryofblog;
    public $blog_tags;
    public function __construct()
    {
        $this->partner = $this->model('PartnerModel');
        $this->slider = $this->model('SliderModel');
        $this->product = $this->model('ProductModel');
        $this->category = $this->model('CategoryModel');
        $this->blog = $this->model('BlogModel');
        $this->categoryofblog = $this->model('CategoryBlogModel');
        $this->tags = $this->model('TagsModel');
        $this->blog_categoryofblog = $this->model('Blog_CategoryOfBlogModel');
        $this->blog_tags = $this->model('Blog_TagsModel');
    }



    public function login()
    {
        $this->view('frontend/login/login');
    }

    public function logout()
    {

        if (isset($_SESSION['user_login'])) {
            unset($_SESSION['user_login']);
            unset($_SESSION['cart']);
        }
        $this->view('frontend/login/login');
        header('location index.php?url=Partner_Login/login');
    }

    public function post_login()
    {

        $test_validate = false;
        $result_old =  array();
        $error = array();
        //1 email
        $error['email'] = array();
        if ($_POST['email'] == "") {
            $test_validate = true;
            array_push($error['email'], 'Vui lòng nhập email');
        } else {
            $result_old['email'] = $_POST['email'];
        }

        //2 password
        $error['password'] = array();
        if ($_POST['password'] == "") {
            $test_validate = true;
            array_push($error['password'], 'Vui lòng nhập password');
        } else {
            $result_old['password'] = $_POST['password'];
        }
        if ($test_validate) {
            $this->view('frontend/login/login', [
                'error'         => $error,
                'result_old'    => $result_old
            ]);
        } else {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $result = json_decode($this->partner->test_login($email, $password));
            // echo json_encode($result);
            // die();
            //                header('location: index.php?url=User_Login/login');
            if (!$result) {
                $this->view('frontend/login/login', [
                    'error'         => $error,
                    'result_old'    => $result_old,
                    'message_error' => 'Đăng nhập thất bại'
                ]);
            } else {
                $_SESSION['user_login']['id'] = $result->id;
                $_SESSION['user_login']['name'] = $result->user_name;
                if ($result->image != "" && $result->image != null) {
                    $_SESSION['user_login']['avatar'] = $result->image;
                }



                $list_slider = json_decode($this->slider->getList());
                $list_product = json_decode($this->product->getList_limit());
                $list_category = json_decode($this->category->getListLimit4());
                $categories = json_decode($this->category->getList());

                $list_blog = json_decode($this->blog->getList());
                foreach ($list_category as $category) {
                    $category->qty_product = json_decode($this->product->qty_product_by_cat($category->id));
                }


                $this->view('frontend/layout/master', [
                    'page'  => 'frontend/pages/home',
                    'list_slider' => $list_slider,
                    'list_product'  => $list_product,
                    'list_category' => $list_category,
                    'list_blog'     => $list_blog,
                    'categories'    => $categories,
                    'message_success' => 'Đăng nhập thành công'
                ]);
                header('location: index.php?url=Home');
            }
        }
    }

    public function register_partner()
    {
        $this->view('frontend/login/register_partner');
    }



    public function post_register()
    {

        //    echo json_encode($_POST);
        //    die();
        $error = array();
        $test_validate = false;
        $result_old = array();
        //1. user_name
        $error['user_name'] = array();
        if ($_POST['user_name'] == "") {
            $test_validate = true;
            array_push($error['user_name'], 'Vui lòng nhập username');
        } else {
            $result_old['user_name'] = $_POST['user_name'];
        }

        //2. full_name
        $error['name'] = array();
        if ($_POST['name'] == "") {
            $test_validate = true;
            array_push($error['name'], 'Vui lòng nhập tên trường');
        } else {
            $result_old['ame'] = $_POST['name'];
        }

        //3. email
        $error['email'] = array();
        if ($_POST['email'] == "") {
            $test_validate = true;
            array_push($error['email'], 'Vui lòng nhập email');
        } else {
            $result_old['email'] = $_POST['email'];
        }
        //5. country
        $error['country'] = array();
        if ($_POST['country'] == "") {
            $test_validate = true;
            array_push($error['country'], 'Vui lòng nhập tên quốc gia');
        } else {
            $result_old['country'] = $_POST['country'];
        }
        //9 password
        $error['password'] = array();
        if ($_POST['password'] == "") {
            $test_validate = true;
            array_push($error['password'], 'Vui lòng nhâp password');
        }
        //10 password_confirm
        $error['password_confirm'] = array();
        if ($_POST['password_confirm'] == "") {
            $test_validate = true;
            array_push($error['password_confirm'], 'Vui lòng nhập password confirm');
        }


        if ($test_validate) {

            $this->view('frontend/login/register_partner', [
                'error'         => $error,
                'result_old'    => $result_old
            ]);
        } else {
            if ($_POST['password'] != $_POST['password_confirm']) {
                $this->view('frontend/login/register_partner', [
                    'error'         => $error,
                    'result_old'    => $result_old,
                    'message_error' => "Mật khẩu không chính xác"
                ]);
            } else {
                $user_name = $_POST['user_name'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $country = $_POST['country'];
                $address_detail = isset($_POST['address_detail']) ? $_POST['address_detail'] : "";
                $password = md5($_POST['password']);
                $created_at = Date('Y-m-d H:i:s');
                $updated_at = Date('Y-m-d H:i:s');
                $result = json_decode($this->partner->insert($user_name, $name, $email, $password, $country, $created_at, $updated_at, $address_detail));
                if ($result) {
                    $this->view('frontend/login/login', [
                        'message_success' => 'Bạn đã tạo tài khoản thành công'
                    ]);
                    // header('location: User/index');
                    header('location: index.php?url=Partner');
                } else {
                }
            }
        }
    }
}
