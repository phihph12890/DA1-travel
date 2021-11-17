<?php
ob_start();
// session_start();
include "./examples/local.php";
if (isset($_GET['is_tour']));
$id = $_GET['id_tour'];
$sqlShow = "select * from tour join category on tour.id_category=category.id_category 
join images on images.id_image=tour.id_image
where id_tour = $id";
$showtour = $local->query($sqlShow)->fetch();
$parent = $showtour['id_parent'];
$category = $showtour['id_category'];
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <div id="main">
        <header class="relative">
            <img src="./assets/img/bg-cart.jpg" alt="">
            <div id="navbar" class="absolute top-0 left-0 right-0 flex mt-8 px-32 bg-blue-300 bg-opacity-50">
                <?php require "menu.php"; ?>
            </div>
            <div class="bg-blue-400 bg-opacity-50 absolute top-0 left-0 right-0">
                <?php require "headerTop.php"; ?>
            </div>
            <div class="absolute bottom-0 left-0 right-0 mx-64 pt-5 bg-white bg-opacity-80 rounded-t-md">
                <h3 class="font-bold text-2xl uppercase text-center "><a href="">
                        <?php echo $showtour['name_tour'] ?></a></h3>
                <img class="w-20 mx-auto" src="./assets/img/gachvang.png" alt="">
            </div>
        </header>
        <main class="container mx-auto">
            <section class="flex container mx-auto my-10">
                <h3><a class="uppercase text-sm text-blue-400 hover:underline" href="index.php">Trang chủ</a></h3>
                <i class="fas fa-angle-right px-3 items-center flex text-sm text-gray-400"></i>
                <h3><a class="uppercase text-sm text-blue-400 hover:underline"
                        href="./tourNoithanh.php?id_category=<?php echo $parent ?>">tour
                        <?php if ($parent == '25' || $category == '25') {
                            echo "nội thành";
                        }
                        if ($parent == '26' || $category == '26') {
                            echo "ngoại thành";
                        } ?></a>
                </h3>
                <i class="fas fa-angle-right px-3 items-center flex text-sm text-gray-400"></i>
                <h3><a class="uppercase text-sm text-blue-400 hover:underline"
                        href="product.php?id_tour=<?php echo $id ?>"><?php echo $showtour['name_tour'] ?></a></h3>
                <i class="fas fa-angle-right px-3 items-center flex text-sm text-gray-400"></i>
                <h3><a class="uppercase text-sm" href="./tourNoithanh.php?id_category=<?php echo $parent ?>">đặt
                        tour</a>
                </h3>
            </section>
            <section class="grid grid-cols-7 gap-5">
                <div class="col-span-4">
                    <div class="grid grid-cols-7 gap-5">
                        <img class="col-span-3" src="./assets/img/<?php echo $showtour['image_main'] ?>" alt="">
                        <table class="shadow-md col-span-4">
                            <thead>
                                <tr class="py-5">
                                    <th colspan="2" class="text-xl py-3 border"><?php echo $showtour['name_tour'] ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="">
                                <tr class="">
                                    <td class="py-1 border pl-10">Mã tour:</td>
                                    <td class="font-bold border pl-10"><?php echo $showtour['id_tour'] ?></td>
                                </tr>
                                <tr class="">
                                    <td class="py-1 border pl-10">Thời gian:</td>
                                    <td class="font-bold border pl-10">1 ngày</td>
                                </tr>
                                <tr class="">
                                    <td class="py-1 border pl-10">Giá:</td>
                                    <td class="font-bold border pl-10"><?php if ($showtour['promotional'] > 0) {
                                                                            echo number_format(($showtour['price'] - $showtour['promotional']), 0, '.', ',');
                                                                        } else {
                                                                            echo number_format($showtour['price'], 0, '.', ',');
                                                                        } ?>
                                        ₫/khách</td>
                                </tr>
                                <tr class="">
                                    <td class="py-1 border pl-10">Ngày</td>
                                    <td class="font-bold border pl-10">1 ngày</td>
                                </tr>
                                <tr class="">
                                    <td class="py-1 border pl-10">Nơi khởi hành:</td>
                                    <td class="font-bold border pl-10"><?php echo $showtour['place_start'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="my-5">
                        <span class="text-red-400 text-justify inline-block py-1">Các khoản phí phát sinh (nếu có) như:
                            phụ thu dành cho khách nước ngoài, việt kiều; phụ thu phòng đơn; phụ thu chênh lệch giá
                            tour… Nhân viên Du Lịch Hanoitourist sẽ gọi điện thoại tư vấn cho quý khách ngay sau khi có
                            phiếu xác nhận booking. (Trong giờ hành chính)</span>
                        <span class="text-red-400 text-justify inline-block py-1">Trường hợp quý khách không đồng ý các
                            khoản phát sinh, phiếu xác nhận booking của quý khách sẽ không có hiệu lực.</span>
                    </div>
                    <div class="p-5 shadow-md my-5">
                        <h2 class="text-center text-2xl font-bold my-5">BẢNG GIÁ TOUR CHI TIẾT</h2>
                        <table class="w-full">
                            <tr class="text-center">
                                <th class="border py-2">Loại giá\Độ tuổi</th>
                                <th class="border py-2">Người lớn</th>
                                <th class="border py-2">Trẻ em(Dưới 11 tuổi giảm 30%)</th>
                            </tr>
                            <tr class="text-center">
                                <td class="border py-2">Giá </td>
                                <td class="border py-2">
                                    <p><span id="priceOld"><?php if ($showtour['promotional'] > 0) {
                                                                echo (($showtour['price'] - $showtour['promotional']));
                                                            } else {
                                                                echo ($showtour['price']);
                                                            } ?> </span> ₫</p>
                                </td>
                                <td class="border py-2">
                                    <p><span id="priceChid"><?php if ($showtour['promotional'] > 0) {
                                                                echo (($showtour['price'] - ($showtour['promotional'])) - ((($showtour['price'] - $showtour['promotional']) * 0.3)));
                                                            } else {
                                                                echo $showtour['price'] - ($showtour['price'] * 0.3); // tre em giam gia 30%
                                                            } ?> </span> ₫</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="p-5 shadow-md mt-5">
                        <h2 class="text-center text-2xl font-bold my-5">GIÁ TOUR TRỌN GÓI CHO 01 KHÁCH</h2>
                        <table class="shadow-lg">
                            <thead>
                                <tr>
                                    <th class="border py-1 font-bold">GIÁ TOUR BAO GỒM</th>
                                    <th class="border py-1 font-bold">GIÁ TOUR CHƯA BAO GỒM</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border px-5">
                                        <ul>
                                            <li class="list-disc list-inside py-1">Phương tiện: Ôtô máy lạnh</li>
                                            <li class="list-disc list-inside py-1">Ăn trưa 1 bữa</li>
                                            <li class="list-disc list-inside py-1">Hướng dẫn viên: Chuyên nghiệp, phục
                                                vụ nhiệt tình, thành thạo, chu đáo suốt tuyến.</li>
                                            <li class="list-disc list-inside py-1">Vé tham quan vào cửa một lần tại các
                                                điểm tham quan</li>
                                            <li class="list-disc list-inside py-1">Bảo hiểm du lịch suốt tuyến</li>
                                            <li class="list-disc list-inside py-1">Quà tặng: Nước uống, khăn lạnh trên
                                                phương tiện vận chuyển: 01 chai + 01 khăn lạnh/ ngày.</li>
                                        </ul>
                                    </td>
                                    <td class="border px-5">
                                        <ul>
                                            <li class="list-disc list-inside py-1">Chi tiêu cá nhân ngoài chương trình
                                            </li>
                                            <li class="list-disc list-inside py-1">Thuế VAT 10%</li>
                                            <li class="list-disc list-inside py-1">Thăm quan ngoài chương trình tour
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                if (!empty($_SESSION['user'])) {
                    $user = $_SESSION['user'];
                    $sqluer = "select * from user where username = '$user'";
                    $showuser = $local->query($sqluer)->fetch();
                }
                ?>
                <form method="POST" class="border p-5 col-span-3">
                    <h2 class="text-center text-2xl font-bold my-2">THÔNG TIN LIÊN HỆ</h2>
                    <div>
                        <span>Tên tour</span>
                        <input disabled
                            class="my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full "
                            type="text" value="<?php echo $showtour['name_tour'] ?>" id="lastname">
                    </div>
                    <div class="mt-3">
                        <span>Họ và tên</span>
                        <input class="my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full"
                            type="text" placeholder="Tên đăng nhập" value="<?php echo $showuser['fullname'] ?>"
                            id="lastname" name="fullname" required>
                    </div>
                    <!-- end lastname -->
                    <div class="mt-3 ">
                        <span>Email</span>
                        <input class="my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full"
                            type="text" placeholder="Email" id="email" name="email"
                            value="<?php echo $showuser['email'] ?>" required>
                    </div>
                    <!-- end mail -->
                    <div class="mt-3 ">
                        <span>Số điện thoại</span>
                        <input class="my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full"
                            type="text" placeholder="Số điện thoại" id="phone" name="phone_number"
                            value="<?php echo $showuser['phone_number'] ?>" required>
                    </div>
                    <div class=" mt-3">
                        <span>Địa chỉ</span>
                        <input class="my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full"
                            type="text" placeholder="Địa chỉ" id="address" name="adress"
                            value="<?php echo $showuser['address'] ?>" required>
                    </div>
                    <div class=" mt-3">
                        <span>Người lớn</span>
                        <input class="my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full"
                            type="number" placeholder="1" id="elderly" name="elderly" min="0" minlength="1" required>
                    </div>
                    <div class="mt-3 ">
                        <span>Trẻ em (Dưới 11 tuổi giảm 30%) </span>
                        <input class="my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full"
                            min="0" minlength="1" type="number" placeholder="" id="young" name="young">
                    </div>
                    <div class="mt-3 ">
                        <span>Ngày đi</span>
                        <input class="my-1 bg-gray-100 bg-opacity-50 px-2 py-1 border focus:outline-none block w-full"
                            type="date" placeholder="" id="address" name="departure_day" required>
                    </div>
                    <div class="mt-3 ">
                        <span class="block">Ghi chú</span>
                        <textarea class="border bg-gray-100 px-2 py-1 bg-opacity-50 ocus:outline-none" name="note" id=""
                            cols="73" rows="3"></textarea>
                    </div>
                    <div class=" text-center">
                        <span id="errorslv" class="text-lg bg-white text-red-500"></span>
                    </div>
                    <div class="text-center bg-white">
                        <input type="text" class="text-lg bg-white text-red-500" id="error" value=""
                            style="width: 550px;" disabled>
                    </div>
                    <div class="my-5 flex justify-between">
                        <input type="text" name="chose_voucher" id="showVoucher"
                            class="border border-white bg-white bg-opacity-50 pl-2 "
                            style="width: 430px; height: 35psx; line-height: 35px;">
                        <button id="voucher" type='button'
                            class="voucher text-blue-500 hover:text-red-600 cursor-pointer flex items-center justify-end pl-1"
                            name="choseV">Chọn
                            VOUCHER</button>
                    </div>
                    <div class="text-center bg-white hidden">
                        <input type="text" name="sumP" class="" id="sumP" value="" style="width: 550px;">
                        <input type="text" name="sumPP" id="sumprice">
                        <input type="text" name="sumV" id="sumV" value="00">
                    </div>
                    <div class="flex justify-end">
                        <input type="text" name="allPrice" class="hidden" id="allPrice">
                        <p class="mt-5">Tổng tiền: <span class="text-red-500 text-2xl font-bold italic"
                                id="allPrices">000</span>
                            ₫</p>
                    </div>
                    <div class="flex justify-center items-center">
                        <button
                            class="mt-5 border hover:border-yellow-300 hover:bg-white rounded-lg px-10 py-2 text-lg focus:outline-none bg-blue-300 hover:text-black"
                            name="btn_regis">Đặt ngay</button>
                    </div>
                    <!-- end submit -->
                </form>
            </section>
        </main>
        <footer class="background4 bg-opacity-10 mt-10">
            <?php require "footer.php"; ?>
        </footer>
    </div>
    <div id="selectVoucher" class="absolute bottom-0 mx-170 my-180 items-center hidden border bg-white">
        <div class="relative">
            <h2 class="text-2xl py-2 px-5 bg-yellow-500 bg-opacity-50 font-bold">Chọn Hanoitourist Voucher</h2>
            <form method="POST">
                <div class="flex py-3 justify-items-center bg-gray-100 px-5 my-2">
                    <span class="py-2">Mã giảm giá</span>
                    <input id="codeVoucher" value="" class="border px-3 focus:outline-none mx-5 py-2 w-80" type="text"
                        placeholder="Mã giảm giá" name="code_voucher">
                </div>
            </form>
            <button id="apply" name="check_code" class="py-2 px-8 absolute border bg-yellow-500  "
                style="right:20px; top:69px;">Áp
                dụng</button>
            <form method="POST">
                <?php
                $sqlvour = "select * from voucher where id_voucher >28 or id_voucher <=27";
                $showvour = $local->query($sqlvour);
                foreach ($showvour as $voucher) {
                ?>
                <div class="voucherLL">
                    <div class="grid grid-cols-4 gap-5 cursor-pointer mx-5 my-5 shadow-md">
                        <span class="people hidden"><?php echo $voucher['voucher_people'] ?></span>
                        <img class="col-span-1 my-auto"
                            src="../../DA1/assets/img/<?php echo $voucher['voucher_image'] ?>" alt="">
                        <div class=" col-span-2">
                            <label class="font-bold nameVoucher" for=""><?php echo $voucher['vourcher_name'] ?></label>
                            <span class="voucher_sale hidden"><?php echo $voucher['voucher_sale']  ?></span>
                            <ul>
                                <li class="list-inside list-disc py-1">Giảm <span
                                        class="font-bold"><?php echo $voucher['voucher_sale']  ?>%</span> tổng giá
                                    tiền
                                    cho các tour</li>
                            </ul>
                        </div>
                        <input class="checkRadio mx-auto my-auto col-span-1 focus:outline-none" type="radio"
                            name="check" id="" disabled>
                    </div>
                </div>
                <?php }
                ?>
                <span class="text-gray-500 mx-5">* Đã hiển thị tất cả Hanoitourist voucher thuộc mục Voucher của hãng
                    cung cấp.</span>
            </form>
        </div>
        <div class="flex justify-end mx-5 my-10">
            <button id="back"
                class="border hover:bg-yellow-500 border-yellow-500 px-14 py-1 mx-3 focus:outline-none">Trở
                lại</button>
            <button id="clickOk" class="border bg-yellow-500 border-yellow-500 px-14 py-1">OK</button>
        </div>
    </div>
    <div>
        <span id="tt"></span>
    </div>

    <?php

    if (isset($_POST['btn_regis'])) {
        $name_tour = $showtour['name_tour'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $adress = $_POST['adress'];
        $adult_amount = $_POST['elderly'];
        $child_amount = $_POST['young'];
        $note = $_POST['note'];
        $code_voucher = $_POST['code_voucher'];
        $chose_voucher = $_POST['chose_voucher'];
        $departure_day = $_POST['departure_day'];
        $today = date('Y-m-d');
        $todays = mktime(0, 0, 0, date('m'), date('d') + 30, date('Y'));
        $todayl = date('Y-m-d', $todays);
        $sqlcheckvou = "select * from voucher where vourcher_name = '$chose_voucher'";
        $showcheckvou = $local->query($sqlcheckvou)->fetch();
        $id_voucher = $showcheckvou['id_voucher'];
        $username = $_SESSION['user'];
        $allPrice = $_POST['allPrice'];
        if (!empty($id_voucher)) {
            $sqlcheckslV = "select * from voucher where id_voucher = '$id_voucher'";
            $totalvher = $local->query($sqlcheckslV)->fetch();
            $slV = $totalvher['voucher_number'];
        } else {
            $id_voucher = 28;
            $slV =  $id_voucher;
        }
        if (empty($child_amount)) {
            $child_amount = 0;
        }

        if ($slV <= 0) {
            echo "<script>
            document.querySelector('#errorslv').innerHTML = 'Voucher này đã hết hạn sử dụng hoặc số lượng đã hết vui lòng chọn voucher khác!';
            </script>";
        } else if ($departure_day > $today && $departure_day <= $todayl) {
            $sqlcheckslV = "select * from voucher where id_voucher = '$id_voucher'";
            $sqlcheckV = "update voucher set voucher_number=voucher_number-1 where id_voucher like '$id_voucher'";
            $setV = $local->prepare($sqlcheckV);
            $setV->execute();
            $sqladd = "insert into cart values(null,'$id','$id_voucher','$username','$phone_number','$fullname','$email','$note','$adult_amount','$child_amount','$allPrice','$departure_day','0',null)";
            $addvour = $local->exec($sqladd);
            $sqlshowCart = "select * from cart order by id_cart desc";
            $showCart = $local->query($sqlshowCart)->fetch();
            $id_Cart = $showCart['id_cart'];
            header("location:./success.php?id_cart=$id_Cart");
        } else {
            echo "  <script>
            document.querySelector('#error').value = 'Ngày đi phải lớn hơn ngày hiện tại và đặt lịch trước tối đa 30 ngày!';
        </script> ";
        }
    }
    ?>

    <script>
    // var apply = document.querySelector('#apply');
    $(document).ready(function() {
        $('#apply').click(function() {
            var dataId = document.getElementById('codeVoucher').value;
            var elderly = document.querySelector('#elderly').value;
            var young = document.querySelector('#young').value;
            $.ajax({
                type: 'POST',
                url: './ajaxvoucher.php',
                data: {
                    "id": dataId,
                    "young": young,
                    "elderly": elderly,
                },
                success: function(data) {
                    $('#tt').html(data);
                }
            });
        });
    });
    </script>


    <script>
    var voucher = document.getElementById("voucher");
    var selectVoucher = document.getElementById("selectVoucher");
    var main = document.getElementById("main");
    var showVoucher = document.getElementById("showVoucher");
    var nameVoucher = document.querySelectorAll(".nameVoucher");
    var back = document.getElementById("back");
    selectVoucher.style.display = "none";
    var check = document.getElementsByName("check");
    var codeVoucher = document.querySelector("#codeVoucher");
    var apply = document.querySelector("#apply");
    var clickok = document.querySelector("#clickOk");
    var elderly = document.querySelector('#elderly');
    var young = document.querySelector('#young');
    var sll = 0;
    var sumprice = document.querySelector('#sumprice');
    var voucherLL = document.querySelectorAll('.voucherLL');
    var people = document.querySelectorAll('.people');
    var code = document.querySelector('#code');
    var priceOld = document.getElementById('priceOld');
    var priceChid = document.getElementById('priceChid');
    var voucher_sale = document.querySelectorAll('.voucher_sale');
    var sumP = document.querySelector('#sumP');
    var allPrice = document.getElementById('allPrice');
    var codeV = document.querySelector('#codeV');
    var checkRadio = document.querySelectorAll('.checkRadio');
    var priceChild = Math.ceil(priceChid.innerText);
    var priceOldd = Math.ceil(priceOld.innerText);
    var allPrices = document.querySelector('#allPrices');
    setInterval(function() {
        allPrices.innerHTML = allPrice.value;
    }, 1);

    function gotos() {
        if (showVoucher.value != '') {
            allPrice.value = (Number(sumprice.value)) - (Number(sumprice.value) * Number(sumP.value) / 100);
            allPrice.value = (Number(sumprice.value)) - (Number(sumprice.value) * Number(codeV.innerHTML) /
                100);
            allPrices.innerHTML = allPrice.value;
        } else {
            allPrice.value = (Number(sumprice.value));
            allPrices.innerHTML = allPrice.value;
        }
    }
    main.addEventListener('mouseover', () => {
        if (showVoucher.value != '') {
            allPrice.value = (Number(sumprice.value)) - (Number(sumprice.value) * Number(sumP.value) / 100);
            allPrice.value = (Number(sumprice.value)) - (Number(sumprice.value) * Number(codeV.innerHTML) /
                100);
            allPrices.innerHTML = allPrice.value;
        } else {
            allPrice.value = (Number(sumprice.value));
            allPrices.innerHTML = allPrice.value;
        }
    });

    apply.addEventListener('click', function() {
        selectVoucher.style.display = "none";
        main.style.background = "white";
        main.style.opacity = "1";
        // console.log(codeV.innerHTML);
        // showVoucher.value = code.innerHTML;
    });
    // main.addEventListener('mousewheel', () => {
    //     if (code.innerHTML != 0) {
    //         selectVoucher.style.display = "none";
    //         main.style.background = "white";
    //         main.style.opacity = "1";
    //         showVoucher.value = code.innerHTML;
    //         showVoucher.style.display = "block";
    //         showVoucher.style.borderColor = "#e5e7eb";
    //         showVoucher.style.backgroundColor = "#f9f9fa";
    //         allPrices.innerHTML = allPrice.value;
    //         if (Number(elderly) + Number(young) > 5) {
    //             console.log('ok');
    //         }
    //     }
    // });
    // apply.addEventListener('click', () => {
    //     if (code.innerHTML != 0) {
    //         console.log(Number(young.innerHTML));

    //         selectVoucher.style.display = "none";
    //         main.style.background = "white";
    //         main.style.opacity = "1";
    //         showVoucher.value = code.innerHTML;
    //         showVoucher.style.display = "block";
    //         showVoucher.style.borderColor = "#e5e7eb";
    //         showVoucher.style.backgroundColor = "#f9f9fa";
    //         allPrices.innerHTML = allPrice.value;
    //     }
    // });

    elderly.addEventListener('keyup', () => {
        sll = Number(elderly.value) + Number(young.value);
        // console.log(elderly.value);
        if (Number(people[0].innerHTML) > sll) {
            voucherLL[0].style.filter = "grayscale(100%)";
            checkRadio[0].disabled = true;
            checkRadio[0].checked = false;
            showVoucher.value = code.innerHTML;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[0].style.filter = "grayscale(0%)";
            checkRadio[0].disabled = false;

        }
        if (Number(people[1].innerHTML) > sll) {
            voucherLL[1].style.filter = "grayscale(100%)";
            checkRadio[1].disabled = true;
            checkRadio[1].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[1].style.filter = "grayscale(0%)";
            checkRadio[1].disabled = false;
        }
        if (Number(people[2].innerHTML) > sll) {
            voucherLL[2].style.filter = "grayscale(100%)";
            checkRadio[2].disabled = true;
            checkRadio[2].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[2].style.filter = "grayscale(0%)";
            checkRadio[2].disabled = false;
        }
        if (Number(people[3].innerHTML) > sll) {
            voucherLL[3].style.filter = "grayscale(100%)";
            checkRadio[3].disabled = true;
            checkRadio[3].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[3].style.filter = "grayscale(0%)";
            checkRadio[3].disabled = false;
        }
        if (Number(people[4].innerHTML) > sll) {
            voucherLL[4].style.filter = "grayscale(100%)";
            checkRadio[4].disabled = true;
            checkRadio[4].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[4].style.filter = "grayscale(0%)";
            checkRadio[4].disabled = false;
        }
        if (Number(people[5].innerHTML) > sll) {
            voucherLL[5].style.filter = "grayscale(100%)";
            checkRadio[5].disabled = true;
            checkRadio[5].checked = false;
            showVoucher.value = '';
        } else {
            voucherLL[5].style.filter = "grayscale(0%)";
            checkRadio[5].disabled = false;
        }
        sumprice.value = ((Number(priceOldd) * Number(elderly.value)) + (Number(priceChild) *
            Number(young
                .value)));
        // console.log(sumprice.value);
        // for (var p = 0; p < people.length; p++) {
        //     for (var t = 0; t < voucherLL.length; t++) {
        //         // console.log(people[t].innerHTML);
        //         if (people[t].innerHTML >= 5) {
        //             voucherLL[p].style.filter = "grayscale(100%)";
        //             console.log('1');
        //         } else {
        //             voucherLL[t].style.filter = "grayscale(0%)";
        //             console.log('2');
        //         }
        //     }
        //     break;
        // }
    });
    for (var u = 0; u < voucherLL.length; u++) {
        voucherLL[u].style.filter = "grayscale(100%)";
    }
    young.addEventListener('keyup', () => {
        sll = Number(elderly.value) + Number(young.value);
        if (Number(people[0].innerHTML) > sll) {
            voucherLL[0].style.filter = "grayscale(100%)";
            checkRadio[0].disabled = true;
            checkRadio[0].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[0].style.filter = "grayscale(0%)";
            checkRadio[0].disabled = false;

        }
        if (Number(people[1].innerHTML) > sll) {
            voucherLL[1].style.filter = "grayscale(100%)";
            checkRadio[1].disabled = true;
            checkRadio[1].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[1].style.filter = "grayscale(0%)";
            checkRadio[1].disabled = false;
        }
        if (Number(people[2].innerHTML) > sll) {
            voucherLL[2].style.filter = "grayscale(100%)";
            checkRadio[2].disabled = true;
            checkRadio[2].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[2].style.filter = "grayscale(0%)";
            checkRadio[2].disabled = false;
        }
        if (Number(people[3].innerHTML) > sll) {
            voucherLL[3].style.filter = "grayscale(100%)";
            checkRadio[3].disabled = true;
            checkRadio[3].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[3].style.filter = "grayscale(0%)";
            checkRadio[3].disabled = false;
        }
        if (Number(people[4].innerHTML) > sll) {
            voucherLL[4].style.filter = "grayscale(100%)";
            checkRadio[4].disabled = true;
            checkRadio[4].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[4].style.filter = "grayscale(0%)";
            checkRadio[4].disabled = false;
        }
        if (Number(people[5].innerHTML) > sll) {
            voucherLL[5].style.filter = "grayscale(100%)";
            checkRadio[5].disabled = true;
            checkRadio[5].checked = false;
            showVoucher.value = '';
        } else {
            voucherLL[5].style.filter = "grayscale(0%)";
            checkRadio[5].disabled = false;
        }
        sumprice.value = ((Number(priceOldd) * Number(elderly.value)) + (Number(priceChild) *
            Number(young
                .value)));
    });
    elderly.addEventListener('change', () => {
        sll = Number(elderly.value) + Number(young.value);
        if (Number(people[0].innerHTML) > sll) {
            voucherLL[0].style.filter = "grayscale(100%)";
            checkRadio[0].disabled = true;
            checkRadio[0].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[0].style.filter = "grayscale(0%)";
            checkRadio[0].disabled = false;

        }
        if (Number(people[1].innerHTML) > sll) {
            voucherLL[1].style.filter = "grayscale(100%)";
            checkRadio[1].disabled = true;
            checkRadio[1].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[1].style.filter = "grayscale(0%)";
            checkRadio[1].disabled = false;
        }
        if (Number(people[2].innerHTML) > sll) {
            voucherLL[2].style.filter = "grayscale(100%)";
            checkRadio[2].disabled = true;
            checkRadio[2].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[2].style.filter = "grayscale(0%)";
            checkRadio[2].disabled = false;
        }
        if (Number(people[3].innerHTML) > sll) {
            voucherLL[3].style.filter = "grayscale(100%)";
            checkRadio[3].disabled = true;
            checkRadio[3].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[3].style.filter = "grayscale(0%)";
            checkRadio[3].disabled = false;
        }
        if (Number(people[4].innerHTML) > sll) {
            voucherLL[4].style.filter = "grayscale(100%)";
            checkRadio[4].disabled = true;
            checkRadio[4].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[4].style.filter = "grayscale(0%)";
            checkRadio[4].disabled = false;
        }
        if (Number(people[5].innerHTML) > sll) {
            voucherLL[5].style.filter = "grayscale(100%)";
            checkRadio[5].disabled = true;
            checkRadio[5].checked = false;
            showVoucher.value = '';
        } else {
            voucherLL[5].style.filter = "grayscale(0%)";
            checkRadio[5].disabled = false;
        }
        sumprice.value = ((Number(priceOldd) * Number(elderly.value)) + (Number(priceChild) *
            Number(young
                .value)));
    });
    young.addEventListener('change', () => {
        sll = Number(elderly.value) + Number(young.value);
        if (Number(people[0].innerHTML) > sll) {
            voucherLL[0].style.filter = "grayscale(100%)";
            checkRadio[0].disabled = true;
            checkRadio[0].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[0].style.filter = "grayscale(0%)";
            checkRadio[0].disabled = false;

        }
        if (Number(people[1].innerHTML) > sll) {
            voucherLL[1].style.filter = "grayscale(100%)";
            checkRadio[1].disabled = true;
            checkRadio[1].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[1].style.filter = "grayscale(0%)";
            checkRadio[1].disabled = false;
        }
        if (Number(people[2].innerHTML) > sll) {
            voucherLL[2].style.filter = "grayscale(100%)";
            checkRadio[2].disabled = true;
            checkRadio[2].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[2].style.filter = "grayscale(0%)";
            checkRadio[2].disabled = false;
        }
        if (Number(people[3].innerHTML) > sll) {
            voucherLL[3].style.filter = "grayscale(100%)";
            checkRadio[3].disabled = true;
            checkRadio[3].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[3].style.filter = "grayscale(0%)";
            checkRadio[3].disabled = false;
        }
        if (Number(people[4].innerHTML) > sll) {
            voucherLL[4].style.filter = "grayscale(100%)";
            checkRadio[4].disabled = true;
            checkRadio[4].checked = false;
            if (sll <= 5) {
                showVoucher.value = '';
            }
        } else {
            voucherLL[4].style.filter = "grayscale(0%)";
            checkRadio[4].disabled = false;
        }
        if (Number(people[5].innerHTML) > sll) {
            voucherLL[5].style.filter = "grayscale(100%)";
            checkRadio[5].disabled = true;
            checkRadio[5].checked = false;
            showVoucher.value = '';
        } else {
            voucherLL[5].style.filter = "grayscale(0%)";
            checkRadio[5].disabled = false;
        }
        sumprice.value = ((Number(priceOldd) * Number(elderly.value)) + (Number(priceChild) *
            Number(young
                .value)));
    });

    clickok.addEventListener("click", function() {

        // console.log(code.innerHTML);
        // console.log(voucher_sale.innerHTML);
        if (checkRadio[0].checked) {
            sumP.value = voucher_sale[0].innerHTML;
        } else if (checkRadio[1].checked) {
            sumP.value = voucher_sale[1].innerHTML;
        } else if (checkRadio[2].checked) {
            sumP.value = voucher_sale[2].innerHTML;
        } else if (checkRadio[3].checked) {
            sumP.value = voucher_sale[3].innerHTML;
        } else if (checkRadio[4].checked) {
            sumP.value = voucher_sale[4].innerHTML;
        } else if (checkRadio[5].checked) {
            sumP.value = voucher_sale[5].innerHTML;
        }
        // console.log(allPrice.innerHTML);
        selectVoucher.style.display = "none";
        main.style.background = "white";
        main.style.opacity = "1";
        for (var i = 0; i < check.length; i++) {
            if (check[i].checked == true) {
                showVoucher.value = nameVoucher[i].innerHTML;
                showVoucher.style.display = "block";
                showVoucher.style.borderColor = "#e5e7eb";
                showVoucher.style.backgroundColor = "#f9f9fa";
            }
        }
        gotos();
    });
    voucher.addEventListener("click", function() {
        selectVoucher.style.display = 'block';
        main.style.background = "#999999";
        main.style.opacity = "0.5";
    });

    back.addEventListener("click", function() {
        selectVoucher.style.display = "none";
        main.style.background = "white";
        main.style.opacity = "1";
    });


    // apply.addEventListener("click", function() {
    //     selectVoucher.style.display = "none";
    //     main.style.background = "white";
    //     main.style.opacity = "1";

    //     showVoucher.value = codeVoucher.value;
    //     showVoucher.style.display = "block";
    //     showVoucher.style.borderColor = "#e5e7eb";
    //     showVoucher.style.backgroundColor = "#f9f9fa";
    // });
    </script>

</body>

</html>