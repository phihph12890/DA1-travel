<?php
ob_start();
// session_start();
include "./examples/local.php";
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
        <img src="./content/image/background/bg-uuDai1.jpg" alt="">
        <div id="navbar" class="absolute top-0 left-0 right-0 flex mt-8 px-32 bg-blue-300">
            <?php require "menu.php"; ?>
        </div>
        <div class="bg-blue-400 bg-opacity-50 absolute top-0 left-0 right-0">
            <?php require "headerTop.php"; ?>
        </div>
        <div class="absolute bottom-0 left-0 right-0 mx-64 pt-5 bg-white bg-opacity-80 rounded-t-md">
            <h3 class="font-bold text-2xl uppercase text-center "><a href="">Ưu đãi khách hàng</a></h3>
            <img class="w-20 mx-auto" src="./assets/img/gachvang.png" alt="">
        </div>
    </header>
    <main class="nunito">
        <section class="flex container mx-auto my-5">
            <h3><a class="uppercase text-sm text-blue-400 hover:underline" href="./index.php">Trang chủ</a></h3>
            <i class="fas fa-angle-right px-3 items-center flex text-sm text-gray-400"></i>
            <h3>Ưu đãi</h3>
        </section>
        <section class="text-center py-12 bg-gray-100">
            <h2 class="text-3xl font-bold">Ưu đãi đặt tour tại Hanoitourist</h2>
            <p class="text-xl mx-96 py-5">Chương trình cung cấp voucher dành cho khách hàng, mang lại cho khách
                hành những ưu đãi tốt nhất thuận tiện cho việc du lịch cùng Hanoitourist</p>
            <div class="grid grid-cols-3 gap-12 container mx-auto">
                <?php
                $sqlvoucher = "select * from voucher where id_voucher<='27' or id_voucher>'28'";
                $showvoucher = $local->query($sqlvoucher);
                foreach ($showvoucher as $voucher) {
                ?>
                <article class="one">
                    <div class="screen">
                        <img class="rounded-md" src="./assets/img/<?php echo $voucher['voucher_image'] ?>" alt="">
                        <div class="bg-white rounded-md py-6 my-10">
                            <h3 class="text-blue-500 font-bold text-2xl"><?php echo $voucher['vourcher_name'] ?></h3>
                            <p class="pt-3">Ưu đãi đến <?php echo $voucher['voucher_sale'] ?>%</p>
                        </div>
                        <div class="next">
                            <button
                                class=" bg-yellow-400 w-40 py-3 border hover:bg-white hover:border-yellow-400 focus:outline-none">Xem
                                chi tiết<i class="fas fa-plus-square px-1"></i></button>
                        </div>

                    </div>
                    <div class="show pt-5 hidden">
                        <h3 class="text-blue-500 font-bold text-2xl pb-5"><?php echo $voucher['vourcher_name'] ?></h3>
                        <div class="text-left">
                            <h3 class="text-xl ">Mã voucher: <span
                                    class="font-bold"><?php echo $voucher['voucher_code'] ?></span>
                            </h3>
                            <p>
                                <?php
                                    echo $voucher['voucher_information'] ?>
                            </p>
                        </div>
                        <div class="prev">
                            <button
                                class="mt-10 bg-yellow-400 w-40 py-3 border hover:bg-white hover:border-yellow-400">Xem
                                mã<i class="fas fa-qrcode px-1"></i></button>
                        </div>

                    </div>
                </article>
                <?php } ?>
            </div>
        </section>
        <section class="text-left py-12 bg-white">
            <h2 class="text-3xl font-bold text-center">Quyền lợi ưu đãi</h2>
            <p class="text-xl mx-96 py-5">Khách hàng sẽ được hưởng các quyền lợi ưu đãi, giảm giá trực tiếp và quà tặng
                từ Công ty và Đối tác của Lữ hành Hanoitourist</p>
            <div class="grid grid-cols-3 gap-10 container mx-auto px-20">
                <div class="col-span-1">
                    <img class="py-10" src="./assets/img/z2441349567188_31b9578ae6c5e49629cd4562a937e306.jpg" alt="">
                </div>
                <!-- col1 -->
                <div class="col-span-2 py-16 text-lg text-justify">
                    <p>Chương trình voucher được lấy cảm hứng từ những ấn tượng về cảnh sắc thiên
                        nhiên – vùng biển đẹp, bầu trời xanh thẳm và mặt trời chiếu sáng – những trải
                        nghiệm thú vị, tạo nên nét riêng biệt, ấn tượng độc đáo trong từng chuyến đi.</p>
                    <p class="py-5">Bên cạnh đó, Xanh và Vàng còn là sắc màu chủ đạo của Thương hiệu Lữ
                        hành Hanoitourist.</p>
                    <p>– Slogan “Beyond the adventure” – Hơn cả một chuyến đi – Mang ý nghĩa thông điệp: ngoài
                        sự trải nghiệm thú vị trên từng chuyến đi, đó là sự chăm sóc tận tình nhằm đem
                        đến dịch vụ tốt nhất dành cho khách hàng.</p>
                </div>
                <!-- col2 -->
            </div>
        </section>
    </main>
    <footer class="background4 bg-opacity-10">
        <?php require "footer.php"; ?>
    </footer>
    <script>
    var next = document.getElementsByClassName("next");
    var prev = document.getElementsByClassName('prev');
    var one = document.getElementsByClassName('one');
    var screen = document.getElementsByClassName('screen');
    var show = document.getElementsByClassName('show');
    console.log(show);
    next[0].addEventListener('click', () => {
        screen[0].style.display = "none";
        show[0].style.display = "block";
    });
    prev[0].addEventListener('click', () => {
        screen[0].style.display = "block";
        show[0].style.display = "none";
    });
    next[1].addEventListener('click', () => {
        console.log('p');
        screen[1].style.display = "none";
        show[1].style.display = "block";
    });
    prev[1].addEventListener('click', () => {
        screen[1].style.display = "block";
        show[1].style.display = "none";
    });
    next[2].addEventListener('click', () => {
        screen[2].style.display = "none";
        show[2].style.display = "block";
    });
    prev[2].addEventListener('click', () => {
        screen[2].style.display = "block";
        show[2].style.display = "none";
    });
    next[3].addEventListener('click', () => {
        screen[3].style.display = "none";
        show[3].style.display = "block";
    });
    prev[3].addEventListener('click', () => {
        screen[3].style.display = "block";
        show[3].style.display = "none";
    });
    next[4].addEventListener('click', () => {
        screen[4].style.display = "none";
        show[4].style.display = "block";
    });
    prev[4].addEventListener('click', () => {
        screen[4].style.display = "block";
        show[4].style.display = "none";
    });
    next[5].addEventListener('click', () => {
        screen[5].style.display = "none";
        show[5].style.display = "block";
    });
    prev[5].addEventListener('click', () => {
        screen[5].style.display = "block";
        show[5].style.display = "none";
    });
    // for (var i = 0; i < next.length; i++) {
    //     next[i].addEventListener('click', () => {
    //         console.log('p');
    //         screen[i].style.display = "none";
    //         show[i].style.display = "block";
    //     });
    // }

    // for (var j = 0; j < prev.length; j++) {
    //     prev[j].addEventListener('click', () => {
    //         screen[j].style.display = "block";
    //         show[j].style.display = "none";
    //     });
    // }
    </script>
</body>

</html>