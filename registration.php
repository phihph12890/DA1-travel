<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" type="text/css" href="./content/slick-1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="./content/slick-1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="./content/build/styles.css">
    <style>
    .background4 {
        background-image: url('./content/image/background/background4.jpg');
    }
    </style>
</head>

<body>
    <header>
        <div class="bg-blue-400 bg-opacity-50">
            <?php require "headerTop.php"; ?>
        </div>
        <div class="flex px-32 bg-blue-500 bg-opacity-70">
            <?php require "menu.php"; ?>
        </div>
    </header>
    <main>
        <section class="mx-96 border my-10 px-32 py-10 shadow-md">
            <h1 class="text-center text-3xl">ĐĂNG KÝ THÀNH VIÊN</h1>
            <form method="POST" enctype="multipart/form-data" class="px-40">
                <div class="my-4">
                    <span>Tên đăng nhập</span>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full" type="text" placeholder=""
                        id="users_name" name="username" required>
                </div>
                <!-- end user name -->
                <div class="my-4">
                    <span>Mật khẩu</span>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full" type="password" placeholder=""
                        id="pass" name="password" required>
                </div>
                <!-- end password -->
                <div class="my-4">
                    <span>Xác nhận mật khẩu</span>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full" type="password" placeholder=""
                        id="pass_confirm" name="pass_confirm" required>
                    <span></span>
                </div>
                <!-- end confirm password -->
                <div class="my-4">
                    <span>Họ và tên</span>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full" type="text" placeholder=""
                        id="lastname" name="fullname" required>
                </div>
                <!-- end lastname -->
                <div class="my-4">
                    <span>Email</span>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full" type="email" placeholder=""
                        id="email" name="email" required>
                </div>
                <!-- end mail -->
                <div class="my-4">
                    <span>Số điện thoại</span>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full" pattern="0[0-9\s.-]{9,13}"
                        type="tel" placeholder="" id="phone" name="phone" required>
                </div>
                <div class="my-4">
                    <span>Địa chỉ</span>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full" type="text" placeholder=""
                        id="phone" name="address" required>
                </div>
                <!-- end phone -->
                <div class="my-4">
                    <span>Ảnh đại diện</span>
                    <input class="my-1 px-2 py-1  focus:outline-none block w-full" type="file" placeholder="" id="img"
                        name="image">
                </div>
                <!-- end image -->
                <div class="mt-4 flex justify-end">
                    <!-- <a class="hover:underline hover:text-blue-500 block" href="">Quên mật khẩu</a> -->
                    <p class="inline-block ">Bạn đã có tài khoản <a href="./login.php" class="text-blue-400">Đăng
                            nhập</a>
                        ngay!</p>
                </div>
                <div class="mt-10 border-none relative flex justify-center">

                    <div class="mx-52 border bg-gray-500 w-28 rounded-lg py-2 absolute opacity-25 inset-0 shadow-2xl ">
                        <p class="text-white"></p>
                    </div>
                    <div>
                        <button
                            class="mx-48 bg-red-400 border rounded-lg px-10 py-2 text-lg focus:outline-none hover:bg-blue-300 hover:text-black transform hover:translate-x-10 transition duration-150"
                            name="btn_regis">Đăng
                            ký</button>
                    </div>
                </div>
                <!-- end submit -->
            </form>
            <!-- end form-->
            <?php
            include "./examples/local.php";
            if (isset($_POST['btn_regis'])) {
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $pass_confirm = md5($_POST['pass_confirm']);
                $fullname = $_POST['fullname'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $image = $_FILES['image']['name'];
                $tmp_image = $_FILES['image']['tmp_name'];
                $type_image = $_FILES['image']['type'];
                if ($password != $pass_confirm) {
                    echo "<div class='text-red-600 text-center text-sm'>Mật khẩu không trùng khớp nhau!</div>";
                } else {

                    function checkuser($user)
                    {
                        include "./examples/local.php";
                        $sql = "select count(*) from user where username like '$user'";
                        $data = $local->prepare($sql);
                        $data->execute();
                        return $data->fetchColumn();
                    }
                    $test_user = checkuser($username);
                    if ($test_user != 0) {
                        echo "<div class='text-red-600 text-center'>User đã tồn tại</div>";
                    } else {
                        move_uploaded_file($tmp_image, "./assets/img/" . $image);
                        $sql = "insert into user values('$username','$password','$image','$email','$fullname','$address','$phone','customer',null )";
                        $total = $local->exec($sql);
                        if ($total == 1) {
                            echo '<div class="text-green-600 text-center">Đăng ký tài khoản thành công</div>';
                        } else {
                            echo '<div class="text-red-600 text-center">Đăng ký user thất bại</div>';
                        }
                    }
                }
            }

            ?>
        </section>
    </main>
    <footer class="background4 bg-opacity-10 mt-10">
        <?php require "footer.php"; ?>
    </footer>
</body>

</html>