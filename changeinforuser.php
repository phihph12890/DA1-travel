<?php
ob_start();
// session_start();
include "./examples/local.php";
if (isset($_GET['user']));
$id = $_GET['user'];
?>
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
            <h1 class="text-center text-3xl uppercase">Cập nhật thông tin user</h1>
            <?php
            $sql = "select * from user where username = '$id'";
            $total = $local->query($sql)->fetch();

            ?>
            <form method="POST" enctype="multipart/form-data" class="px-40">
                <div class="my-4 hidden">
                    <label>Tên đăng nhập</label>
                    <input type="text" name="username2" value="<?php echo $total['username'] ?>">
                </div>
                <!-- end user name -->
                <div class="my-4">
                    <label>Mật khẩu cũ</label>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full" type="password" placeholder=""
                        id="pass" name="password">
                </div>
                <!-- end password -->
                <div class="my-4">
                    <label>Mật khẩu mới</label>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full" type="password" placeholder=""
                        id="pass" name="passnew">
                </div>
                <div class="my-4">
                    <label>Xác nhận mật mới</label>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full" type="password" placeholder=""
                        id="pass_confirm" name="pass_confirm">

                </div>
                <!-- end confirm password -->
                <div class="my-4">
                    <label>Họ và tên</label>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full"
                        value="<?php echo $total['fullname'] ?>" type="text" placeholder="" id="lastname"
                        name="fullname" required>
                </div>
                <!-- end lastname -->
                <div class="my-4">
                    <label>Email</label>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full"
                        value="<?php echo $total['email'] ?>" type="email" placeholder="" id="email" name="email"
                        required>
                </div>
                <!-- end mail -->
                <div class="my-4">
                    <label>Số điện thoại</label>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full"
                        value="<?php echo $total['phone_number'] ?>" pattern="0[0-9\s.-]{9,13}" type="tel"
                        placeholder="" id="phone" name="phone" required>
                </div>
                <div class="my-4">
                    <label>Địa chỉ</label>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full"
                        value="<?php echo $total['address'] ?>" type="text" placeholder="" id="phone" name="address"
                        required>
                </div>
                <!-- end phone -->
                <div class="my-4">
                    <label>Ảnh đại diện</label>
                    <img class="w-20 object-cover" src="../assets//img//<?php echo $total['user_image'] ?>" alt="">
                    <input class="my-1 px-2 py-1  focus:outline-none block w-full" type="file" placeholder="" id="img"
                        name="image">
                </div>
                <!-- end image -->
                <div class="mt-10 border-none relative flex justify-center">

                    <div class="mx-52 border bg-gray-500 w-28 rounded-lg py-2 absolute opacity-25 inset-0 shadow-2xl ">
                        <p class="text-white"></p>
                    </div>
                    <div>
                        <button
                            class="mx-48 bg-red-400 border rounded-lg px-10 py-2 text-lg focus:outline-none hover:bg-blue-300 hover:text-black transform hover:translate-x-10 transition duration-150"
                            name="btn_regis">Cập nhật </button>
                    </div>
                </div>
                <!-- end submit -->
            </form>
            <!-- end form-->
            <?php


            include "./examples/local.php";
            if (isset($_POST['btn_regis'])) {
                $username = $_POST['username2'];
                $password = $_POST['password'];
                $passnew = $_POST['passnew'];
                $pass_confirm = $_POST['pass_confirm'];
                $fullname = $_POST['fullname'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $image = $_FILES['image']['name'];
                $tmp_image = $_FILES['image']['tmp_name'];
                $type_image = $_FILES['image']['type'];

                function checkname($user, $password)
                {
                    include "./examples/local.php";
                    $sql = "select count(*) from user where username like '$user' and password like '$password'";
                    $data = $local->prepare($sql);
                    $data->execute();
                    return $data->fetchColumn();
                }
                if (empty($password)) {
                    if (empty($image)) {
                        $image =  $total['user_image'];
                        $sql = "update user set user_image = '$image',email= '$email', fullname = '$fullname', address = '$address', phone_number = '$phone' where username = '$id'";
                        $total = $local->prepare($sql);
                        if ($total->execute()) {
                            echo '<div class="text-green-600 text-center">Cập nhật tài khoản thành công</div>';
                        } else {
                            echo '<div class="text-green-600 text-center">Cập nhật tài khoản thất bại</div>';
                        }
                    } else {
                        if ($type_image == "image/png" || $type_image == "image/jpeg") {
                            move_uploaded_file($tmp_image, "./assets/img/" . $image);
                            $sql = "update user set user_image = '$image', email = '$email', fullname = '$fullname', address = '$address', phone_number ='$phone' where username like '$id'";
                            $total = $local->prepare($sql);
                            if ($total->execute()) {
                                echo '<div class="text-green-600 text-center">Cập nhật tài khoản thành công</div>';
                            } else {
                                echo '<div class="text-red-600 text-center">Cập nhật tài khoản thất bại</div>';
                            }
                        } else {
                            echo '<div class="text-red-600 text-center">Ảnh sai định dạng!</div>';
                        }
                    }
                } else {
                    $user =  checkname($username, $password);
                    if ($user == 0) {
                        echo "<div class='text-red-600 mt-2 text-center text-sm'>Nhập sai mật khẩu cũ!</div>";
                    } else {
                        if ($passnew != $pass_confirm) {
                            echo "<div class='text-red-600 text-center text-sm'>Mật khẩu không trùng khớp nhau!</div>";
                        } else {
                            if (empty($image)) {
                                $image =  $total['user_image'];
                                $sql = "update user set password = '$passnew', user_image = '$image',email= '$email', fullname = '$fullname', address = '$address', phone_number = '$phone' where username = '$id'";
                                $total = $local->prepare($sql);
                                if ($total->execute()) {
                                    echo '<div class="text-green-600 text-center">Cập nhật tài khoản thành công</div>';
                                } else {
                                    echo '<div class="text-green-600 text-center">Cập nhật tài khoản thất bại</div>';
                                }
                            } else {
                                if ($type_image == "image/png" || $type_image == "image/jpeg") {
                                    move_uploaded_file($tmp_image, "../../DA1/assets/img/" . $image);
                                    $sql = "update user set password = '$pass_confirm', user_image = '$image', email = '$email', fullname = '$fullname', address = '$address', phone_number ='$phone' where username like '$id'";
                                    $total = $local->prepare($sql);
                                    if ($total->execute()) {
                                        echo '<div class="text-green-600 text-center">Cập nhật tài khoản thành công</div>';
                                    } else {
                                        echo '<div class="text-red-600 text-center">Cập nhật tài khoản thất bại</div>';
                                    }
                                } else {
                                    echo '<div class="text-red-600 text-center">Ảnh sai định dạng!</div>';
                                }
                            }
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