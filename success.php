<?php
ob_start();
// session_start();
include "./examples/local.php";
if (isset($_GET['id_cart'])) {
    $id_cart = $_GET['id_cart'];
    $sqll = "select * from cart join tour on cart.id_tour=tour.id_tour join voucher on voucher.id_voucher=cart.id_voucher where id_cart like '$id_cart'";
    $totall = $local->query($sqll)->fetch();
}
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
    <link rel="stylesheet" href="./content/css/product.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .background4 {
            background-image: url('./content/image/background/background4.jpg');
        }

        .nunito {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="nunito relative">
    <div class="<?php
                if (!empty($_SESSION['user'])) {
                    $user = $_SESSION['user'];
                    function checknamess($user)
                    {
                        include "./examples/local.php";
                        $sql = "select count(id_cart) from cart where username like '$user'";
                        $data = $local->prepare($sql);
                        $data->execute();
                        return $data->fetchColumn();
                    }
                    $countUsers = checknamess($user);
                    if ($countUsers != 0) {
                        echo 'block';
                    } else {
                        echo 'hidden';
                    }
                }
                ?>">
        <div class="<?php if (!empty($id_cart)) {
                        echo 'block';
                    } else {
                        echo 'hidden';
                    } ?> ">
            <div id="show" class="relative h-screen overflow-hidden text-center">
                <img class="opacity-50" src="./assets/img/z2442570690349_c0c3989dee82c622453e8636ffd3924b.jpg" alt="">
                <div class="grid grid-cols-2 mx-auto container bg-white absolute top-0 bottom-0 left-0 right-0 my-auto" style="height: 550px;">
                    <div class="ml-28 my-auto">
                        <span class="block text-4xl font-bold uppercase">đặt tour thành công</span>
                        <span class="block capitalize text-sm text-center my-3">cảm ơn quý khách đã quan tâm đến
                            Hanoitourist</span>
                        <span class="block bg-gray-300 py-2 px-10 text-center font-bold my-3">Tour du lịch của Quý Khách
                            đang
                            được xử lý</span>
                        <div class="bg-pink-400 py-2 my-3">
                            <span class="block font-bold text-white text-center text-2xl">Mã số đặt tour của Quý Khách
                                là: </span>
                            <span class="block font-bold text-white text-center text-4xl pt-2"><?php echo $totall['id_cart'] ?></span>
                        </div>
                        <div>
                            <span>Tổng số tiền của quý khách là: <?php
                                                                    $sum = $totall['sumPrice'];
                                                                    echo number_format($sum, 0, '.', ',') . 'vnd';
                                                                    ?></span>
                        </div>
                        <p>Quý khách vui lòng đặt cọc trước tối thiểu 40% là: <span class="text-red-600 text-xl">
                                <?php
                                $sum = $totall['sumPrice'];
                                $allS = ($sum * 0.4);
                                echo number_format($allS, 0, '.', ',') . 'vnd';



                                ?></span></p>
                        <p>Hình thức thanh toán: </p>
                        <span class="text-red-600 text-xl">Chuyển khoản qua STK: 0168 837 232 233
                            (Vietcombank)</span><br>
                        <span>Cú pháp: </span>
                        <span class="text-red-600 text-xl">Mã tour - Họ Tên - Số điện thoại</span>
                        <p class="block text-center">Nhân viên của chúng tôi sẽ liên hệ với Quý Khách trong thòi gian
                            sớm
                            nhất.
                            Nếu có thắc mắc, Quý Khách vui lòng liên hệ qua số hotline <span class="text-red-500">1908
                                3883</span>.</p>
                        <span class="block text-center"> Xin chân thành cảm ơn Quý khách hàng!</span>
                    </div>
                    <div class="my-auto relative">
                        <button id="btn_show" class="absolute top-0 right-0 px-5 focus:outline-none"><i class="far fa-times-circle text-3xl hover:text-red-500 text-gray-400"></i></button>
                        <img class="object-fill mx-auto rounded-full" style="height: 415px;width: 415px;" src="./assets/img/z2442573052526_0944d5cc483994f6b879511bc32e366a.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div id="main" class="<?php if (!empty($id_cart)) {
                                    echo 'hidden';
                                } else {
                                    echo 'block';
                                } ?>">
            <header class="relative">
                <img src="./assets/img/z2442575024821_3a4b4fc54004bb1687d54eeda5693da1.jpg" alt="">
                <div id="navbar" class="absolute top-0 left-0 right-0 flex mt-8 px-32 bg-blue-300">
                    <?php require "menu.php"; ?>
                </div>
                <div class="bg-blue-400 bg-opacity-50 absolute top-0 left-0 right-0">
                    <?php require "headerTop.php"; ?>
                </div>
                <div class="absolute bottom-0 left-0 right-0 mx-64 pt-5 bg-white bg-opacity-80 rounded-t-md">
                    <h3 class="font-bold text-2xl uppercase text-center "><a href="">Tour của bạn</a></h3>
                    <img class="w-20 mx-auto" src="./assets/img/gachvang.png" alt="">
                </div>
            </header>
            <?php
            // echo $user;
            $sqluser = "select * from user join cart on cart.username=user.username where cart.username like '$user'";
            $showuser = $local->query($sqluser)->fetch();
            
            ?>
            <main class="container mx-auto">
                <section class="flex container mx-auto my-10">
                    <h3><a class="uppercase text-sm text-blue-400 hover:underline" href="index.php">Trang chủ</a></h3>
                    <i class="fas fa-angle-right px-3 items-center flex text-sm text-gray-400"></i>
                    <h3>Đơn tour</h3>
                </section>
                <section class="grid grid-cols-12 gap-5">
                    <aside class="col-span-2">
                        <form method="POST" class="border p-5 overflow-hidden bg-fixed">
                            <h2 class="text-2xl font-bold my-5 text-center">Thông tin khách hàng</h2>
                            <div class="mt-5">
                                <span class="">Họ tên</span>
                                <input disabled class=" my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full" type="text" placeholder="Tên đăng nhập" value="<?php echo $showuser['fullname'] ?>" id="lastname" name="lastName">
                            </div>
                            <!-- end lastname -->
                            <div class="mt-5">
                                <span class="">Email</span>
                                <input disabled class="my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full" type="text" placeholder="Email" value="<?php echo $showuser['email'] ?>" id="email" name="email">
                            </div>
                            <!-- end mail -->
                            <div class="mt-5">
                                <span class="">Số điện thoại</span>
                                <input disabled class="my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full" type="text" placeholder="Số điện thoại" value="<?php echo $showuser['phone_number'] ?>" id="phone" name="phone">
                            </div>
                            <div class="mt-5">
                                <span class="">Địa chỉ</span>
                                <input disabled class="my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full" type="text" placeholder="Địa chỉ" value="<?php echo $showuser['address'] ?>" id="address" name="phone">
                            </div>
                            <!-- <div class="flex justify-center items-center">
                        <button class="mt-5 border hover:border-yellow-300 hover:bg-white rounded-lg px-10 py-2 text-lg focus:outline-none bg-blue-300 hover:text-black" name="btn_regis"><a href="success.php">Đặt ngay</a></button>
                    </div> -->
                            <!-- end submit -->
                        </form>
                    </aside>
                    <table class="w-full col-span-10">
                        <thead>
                            <tr>
                                <th class="border px-2 py-2">STT</th>
                                <th class="border px-2 py-2" style="width:50px">Mã đặt tour</th>
                                <th class="border px-2 py-2 w-32">Tên người đặt</th>
                                <th class="border px-2 py-2 w-32">Số điện thoại</th>
                                <th class="border px-2 py-2 w-96">Tên tour</th>
                                <th class="border px-2 py-2" style="width:110px">Số người lớn</th>
                                <th class="border px-2 py-2" style="width:90px">Số trẻ em</th>
                                <th class="border px-2 py-2" style="width:120px">Tổng tiền</th>
                                <th class="border px-2 py-2" style="width:120px">Ngày khởi hành</th>
                                <th class="border px-2 py-2" style="width:100px">Trạng thái</th>
                                <th class="border px-2 py-2" style="width:100px">Hủy tour</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $sqlcart = "select * from cart join tour on cart.id_tour=tour.id_tour
                            join user on user.username=cart.username 
                            join voucher on cart.id_voucher=voucher.id_voucher
                            join images on images.id_image=tour.id_image
                        
                        where cart.username like '$user'";
                            $showcart = $local->query($sqlcart);
                            foreach ($showcart as $key => $row) {
                            ?>
                                <tr class="border">
                                    <td class="border px-2"><?php echo ($key + 1) ?></td>
                                    <td class="border px-2"><?php echo $row['id_cart'] ?></td>
                                    <td class="border px-2"><?php echo $row['name_person'] ?></td>
                                    <td class="border px-2"><?php echo $row['phone_cart'] ?></td>
                                    <td class=" flex justify-between py-2">
                                        <img width="100" src="./assets/img/<?php echo $row['image_main'] ?>" alt="">
                                        <span class="flex items-center"><?php echo $row['name_tour'] ?></span>
                                    </td>
                                    <td class="border"><?php
                                                        echo $row['adult_amount'] ?>
                                    </td>
                                    <td class="border"><?php echo $row['child_amount'] ?></td>
                                    <td class="border"><?php
                                                        $sumcart = $row['sumPrice'];
                                                        echo number_format($sumcart, 0, '.', ',') . 'vnd';
                                                        ?></td>
                                    <td class="border"><?php echo $row['departure_day'] ?></td>
                                    <td class="border"><?php if ($row['cart_status'] == 0) {
                                                            echo "Chưa duyệt";
                                                        } else if ($row['cart_status'] == 1) {
                                                            echo "Đã duyệt";
                                                        } else if ($row['cart_status'] == 2) {
                                                            echo "Đã hủy";
                                                        } else if ($row['cart_status'] == 3) {
                                                            echo "Đã hoàn thành";
                                                        }  ?></td>
                                    <td class="border"><button onclick="return confirm('Bạn chắc chắn muốn hủy tour này? Lưu ý bạn sẽ mất số tiền đã cọc trước!!!')" class="flex mx-auto items-center focus:outline-none text-xl"><a href="./examples/delete/delete.php?id_cartfont=<?php echo $row['id_cart']  ?>"><i class="far fa-trash-alt hover:text-red-500 text-gray-400"></i></a></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>
            </main>
        </div>
        <footer class="background4 bg-opacity-10 mt-10">
            <?php require "footer.php"; ?>
        </footer>
    </div>
    <?php
    if (!empty($_SESSION['user'])) {
        function checknames($user)
        {
            include "./examples/local.php";
            $sql = "select count(*) from cart where username like '$user'";
            $data = $local->prepare($sql);
            $data->execute();
            return $data->fetchColumn();
        }
        $countUser = checknames($user);
        if ($countUser == 0) {
            echo '<div class=" inset-0 mt-32 ">
                <div class="container mx-auto text-center my-20">
                    <i class="far fa-sad-tear text-6xl block text"></i>
                    <span class="block py-5">Bạn chưa có lịch sử đặt tour
                    </span>
                    <button class="border border-blue-500 py-2 px-5 rounded-md hover:border-yellow-500"><a
                            href="./tourNoithanh.php?id_category=25">ĐẶT NGAY</a></button>
    
                </div>
            </div>';
        }
    }
    ?>
    <script>
        var show = document.getElementById("show");
        var main = document.getElementById("main");
        var btn_show = document.getElementById("btn_show");

        btn_show.addEventListener("click", function() {
            show.style.display = "none";
            main.style.display = "block";
        })
    </script>
</body>

</html>