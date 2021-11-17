<?php
ob_start();
// session_start();
include "./examples/local.php";
$sqll = "select * from information";
$totallss = $local->query($sqll)->fetch();
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400&display=swap" rel="stylesheet">
    <style>
    /* .bg-noithanh1 {
            background-image: url('./content/image/background/bg-noithanh1.jpg');
        } */

    .background4 {
        background-image: url('./content/image/background/background4.jpg');
    }

    .nunito {
        font-family: 'Nunito', sans-serif;
    }
    </style>
</head>

<body class="nunito">
    <header class="relative">
        <img src="./content/image/background/banner-lien-he.jpg" alt="">
        <div class="bg-blue-400 bg-opacity-50 absolute top-0 left-0 right-0">
            <?php require "headerTop.php"; ?>
        </div>
        <div class="absolute top-0 left-0 right-0 flex mt-8 px-32 bg-blue-300 bg-opacity-50">
            <?php require "menu.php"; ?>
        </div>
        <div class="absolute bottom-0 left-0 right-0 mx-64 pt-5 bg-white bg-opacity-80 rounded-t-md">
            <h3 class="font-bold text-2xl uppercase text-center "><a href="">Liên hệ với chúng tôi</a></h3>
            <img class="w-20 mx-170" src="./assets/img/gachvang.png" alt="">
        </div>
    </header>
    <main class="mx-auto" style="max-width: 1280px;">
        <section class="flex container mx-auto my-5">
            <h3><a class="uppercase text-sm text-blue-400 hover:underline" href="index.php">Trang chủ</a></h3>
            <i class="fas fa-angle-right px-3 items-center flex text-sm text-gray-400"></i>
            <h3><a class="uppercase text-sm" href="./tourNoithanh.php">liên hệ</a></h3>
        </section>
        <section class="container mx-auto gap-10">
            <h2 class="text-2xl text-yellow-400 font-bold text-center mb-10">CÔNG TY TNHH MỘT THÀNH VIÊN DỊCH VỤ LỮ HÀNH
                HANOITOURIST</h2>
            <div class="grid grid-cols-2">
                <div>
                    <div class="flex mt-2">
                        <i class="fas fa-map-marker-alt py-2 pr-5"></i>
                        <p class=""><?php echo $totallss['information_address'] ?>
                        </p>
                    </div>
                    <div class="flex mt-2">
                        <i class="fas fa-phone-volume py-6 pr-5"></i>
                        <a class="block hover:underline py-5" href="#"><?php echo $totallss['information_phone'] ?></a>
                    </div>
                    <div class="flex mt-6">
                        <i class="fas fa-mail-bulk py-2 pr-5"></i>
                        <a class="block hover:underline py-1" href="#"><?php echo $totallss['information_email'] ?></a>
                    </div>
                    <div class="mt-10">
                        <?php echo $totallss['link_map'] ?>
                    </div>

                </div>

                <form method="POST">
                    <!-- end confirm password -->
                    <div class="">
                        <span>Họ và tên</span>
                        <input class="my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full"
                            type="text" id="lastname" name="lastName" required>
                    </div>
                    <!-- end lastname -->
                    <div class="my-5">
                        <span>Email</span>
                        <input class="my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full"
                            type="email" id="email" name="email" required>
                    </div>
                    <!-- end mail -->
                    <div class="my-5">
                        <span>Số điện thoại</span>
                        <input class="my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full"
                            type="tel" id="phone" name="phone" pattern="0[0-9\s.-]{9,13}" required>
                    </div>
                    <div class="my-5">
                        <span>Địa chỉ</span>
                        <input class="my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full"
                            type="text" id="address" name="address" required>
                    </div>
                    <span>Ý kiến khách hàng</span>
                    <textarea class="border bg-gray-100 bg-opacity-50 px-5 py-2 focus:outline-none  w-full"
                        name="comment" id="" cols="145" rows="11" required></textarea>
                    <div class="flex justify-center items-center">
                        <input
                            class="mt-5 border hover:border-yellow-300 hover:bg-white rounded-lg px-10 py-2 text-lg focus:outline-none bg-blue-300 hover:text-black"
                            type="submit" name="submit" value="Gửi">
                    </div>
                    <!-- end submit -->
                </form>

            </div>
        </section>
        <?php
        if (isset($_POST['submit'])) {
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $comment = $_POST['comment'];
            $sql = "insert  into contact values(null, '$lastName', '$email','$phone', '$address', '$comment', '0',null)";
            $total = $local->exec($sql);
            if ($total == 1) {
                echo "<div class=' text-center font-bold text-green-600'>Gửi thông tin thành công</div>";
            } else {
                echo "<div class=' text-center font-bold text-red-600'>Gửi thông tin thất bại!</div>";
            }
        }

        ?>
    </main>
    <footer class="background4 bg-opacity-10 mt-5">
        <?php require "footer.php"; ?>
    </footer>
</body>

</html>