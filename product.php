<?php
ob_start();
// session_start();
include "./examples/local.php";
// $sqlupdate = "update tour"
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $userquery = "select * from user where username =  '$user'";
    $showuser = $local->query($userquery)->fetch();
}
if (isset($_GET['id_tour'])) {
    $id = $_GET['id_tour'];
    $sqlupdate = "update tour set view = 1 + view where id_tour = $id";
    $totalupdate = $local->exec($sqlupdate);
    $sqll = " SELECT tour.id_tour, tour.id_category, name_category,id_parent, images.id_image, comment.id_comment,name_tour, time_start,time_end, place_start, place_end, price, promotional, introduction, content, plan1, plan2, plan3
        ,image_main, image_detail, image_plan1,image_plan2, image_plan3,comment.username,  COUNT(DISTINCT username), SUM(evaluate), tour.create_at tour FROM tour
        join comment on comment.id_tour=tour.id_tour 
        join images on images.id_image=tour.id_image
        join category on tour.id_category=category.id_category
        where tour.id_tour = $id";
    $totall1 = $local->query($sqll)->fetch();
    $parent = $totall1['id_parent'];
    $category = $totall1['id_category'];
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

<body class="nunito">

    <header class="relative">
        <img src="./content/image/background/bg-product.jpg" alt="">
        <div class="bg-blue-400 bg-opacity-50 absolute top-0 left-0 right-0">
            <?php require "headerTop.php"; ?>
        </div>
        <div class="absolute top-0 left-0 right-0 flex mt-8 px-32 bg-blue-300 bg-opacity-50">
            <?php require "menu.php"; ?>
        </div>
        <?php
        ob_start();
        // session_start();
        include "./examples/local.php";
        // $sqlupdate = "update tour"
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $userquery = "select * from user where username =  '$user'";
            $showuser = $local->query($userquery)->fetch();
        }
        if (isset($_GET['id_tour'])) {
            $id = $_GET['id_tour'];
            $sqlupdate = "update tour set view = 1 + view where id_tour = $id";
            $totalupdate = $local->exec($sqlupdate);
            $sqll = " SELECT tour.id_tour, tour.id_category, name_category,id_parent, images.id_image, comment.id_comment,name_tour, time_start,time_end, place_start, place_end, price, promotional, introduction, content, plan1, plan2, plan3
        ,image_main, image_detail, image_plan1,image_plan2, image_plan3,comment.username,  COUNT(DISTINCT username), SUM(evaluate), tour.create_at tour FROM tour
        join comment on comment.id_tour=tour.id_tour 
        join images on images.id_image=tour.id_image
        join category on tour.id_category=category.id_category
        where tour.id_tour = $id";
            $totall1 = $local->query($sqll)->fetch();
            $parent = $totall1['id_parent'];
            $category = $totall1['id_category'];
        }
        ?>
        <div class="absolute bottom-0 left-0 right-0 mx-64 pt-5 bg-white bg-opacity-80 rounded-t-md">
            <h3 class="font-bold text-2xl uppercase text-center ">
                <?php echo $totall1['name_category'] . '-' . $totall1['name_tour'] ?>

            </h3>
            <img class="w-20 mx-170" src="./assets/img/gachvang.png" alt="">
        </div>
    </header>

    <main class="">
        <section class="flex container mx-auto my-5">
            <h3><a class="uppercase text-sm text-blue-400 hover:underline" href="index.php">Trang chủ</a></h3>
            <i class="fas fa-angle-right px-3 items-center flex text-sm text-gray-400"></i>
            <h3><a class="uppercase text-sm text-blue-400 hover:underline" href="./tourNoithanh.php?id_category=<?php echo $parent ?>">tour
                    <?php if ($parent == '25' || $category == '25') {
                        echo "nội thành";
                    }
                    if ($parent == '26' || $category == '26') {
                        echo "ngoại thành";
                    } ?></a>
            </h3>
            <i class="fas fa-angle-right px-3 items-center flex text-sm text-gray-400"></i>
            <h3 class="uppercase text-sm  font-bold" style="margin-top: 2px;"><?php echo $totall1['name_tour'] ?></h3>
        </section>
        <section class="bg-white my-5">
            <div class="container mx-auto grid grid-cols-12 gap-10 justify-center">
                <div class="col-span-6 my-5 bg-white m-2">
                    <div class="slider-for object-cover bg-gray-100">
                        <div class="focus:outline-none"><img style="width: 732px;height: 488px;" class="w-full object-cover" src="./assets/img/<?php echo $totall1['image_main'] ?>" alt=""></div>
                        <div class="focus:outline-none"><img style="width: 732px;height: 488px;" class="w-full object-cover" src="./assets/img/<?php echo $totall1['image_detail'] ?>" alt=""></div>
                        <div class="focus:outline-none"><img style="width: 732px;height: 488px;" class="w-full object-cover" src="./assets/img/<?php echo $totall1['image_plan1'] ?>" alt=""></div>
                        <div class="focus:outline-none"><img style="width: 732px;height: 488px;" class="w-full object-cover" src="./assets/img/<?php echo $totall1['image_plan2'] ?>" alt=""></div>
                        <div class="focus:outline-none"><img style="width: 732px;height: 488px;" class="w-full object-cover" src="./assets/img/<?php echo $totall1['image_plan3'] ?>" alt=""></div>
                    </div>
                    <div class="slider-nav bg-gray-100 mt-5">
                        <div class="px-1 focus:outline-none"><img style="width: 203px;height: 128px;" src="./assets/img/<?php echo $totall1['image_detail'] ?>" alt="">
                        </div>
                        <div class="px-1 focus:outline-none"><img style="width: 203px;height: 128px;" src="./content/image/1.jpg" alt="">
                        </div>
                        <div class="px-1 focus:outline-none"><img style="width: 203px;height: 128px;" src="./assets/img/<?php echo $totall1['image_plan1'] ?>" alt="">
                        </div>
                        <div class="px-1 focus:outline-none"><img style="width: 203px;height: 128px;" src="./assets/img/<?php echo $totall1['image_plan2'] ?>" alt="">
                        </div>
                        <div class="px-1 focus:outline-none"><img style="width: 203px;height: 128px;" src="./assets/img/<?php echo $totall1['image_plan3'] ?>" alt="">
                        </div>
                    </div>

                </div>
                <div class="col-span-6 my-5 bg-gray-100 bg-opacity-50">

                    <h2 class="font-bold text-3xl bg-yellow-300 py-2 px-5"><?php echo $totall1['name_tour'] ?></h2>
                    <div class="border-b-2 rounded-full bg-gray-200 w-24 mt-3"></div>
                    <!-- ten sp -->
                    <div class="px-5">
                        <div class="my-7 flex items-center">
                            <p class="my-px text-yellow-400">
                                <?php
                                if (!empty($totall1['COUNT(DISTINCT username)'])) {
                                    $users = $totall1['COUNT(DISTINCT username)'];
                                    $star = $totall1['SUM(evaluate)'];
                                    $result = $star / $users;
                                    $result;
                                    for ($i = 0; $i < $result; $i++) {
                                        echo '<i class="fas fa-star"></i>';
                                    }
                                }
                                ?>
                            </p>
                            <span class="px-2">|</span>
                            <span><?php
                                    if (!empty($users)) {
                                        echo $users . ' Đánh giá';
                                    } else {
                                        echo  '0 Đánh giá';
                                    }
                                    ?></span>
                        </div>
                        <span class="mr-3 line-through text-gray-400 px-5  text-xl">
                            <?php if ($totall1['promotional'] > 0) {
                                echo number_format($totall1['price'], 0, '.', ',');
                            } ?>
                        </span>
                        <div class="bg-gray-50 px-10 py-2">
                            <!-- <span class="mr-3 line-through text-gray-500 text-lg">7,599,000 ₫</span> -->
                            <span class="text-3xl px-5 text-red-600 font-bold"> <?php if ($totall1['promotional'] > 0) {
                                                                                    echo number_format(($totall1['price'] - $totall1['promotional']), 0, '.', ',');
                                                                                } else {
                                                                                    echo number_format($totall1['price'], 0, '.', ',');
                                                                                } ?>
                                ₫/khách</span>
                        </div>
                        <div class="border-b pt-5 border-gray-200 h-px"></div>
                        <p class="my-7 text-justify"><?php echo $totall1['introduction'] ?></p>
                        <div class="border-t pb-5 border-gray-200 h-px"></div>
                        <div class="flex items-center ">
                            <span>Điểm khởi hành:</span>
                            <p class="ml-10"><i class="fas fa-map-marker-alt py-2 pr-2"></i><?php echo $totall1['place_start'] ?>
                            </p>
                        </div>
                        <div class="my-10">
                            <form method="POST">
                                <button name="submitAdd" class="text-black border hover:border-yellow-400 px-12 py-3 w-full text-base rounded bg-red-400 hover:bg-white text-center">
                                    Đặt ngay
                                </button>
                            </form>
                            <?php
                            if (isset($_POST['submitAdd'])) {
                                $id_T = $totall1['id_tour'];
                                if ($_SESSION['user']) {
                                    header("location:./cart.php?id_tour=$id_T");
                                } else {
                                    $message = 'Bạn cần đăng nhập để đặt tour!';
                                    echo "<script>alert('$message');</script>";
                                }
                            }
                            ?>
                        </div>
                        <div class="flex items-center mt-7">
                            <span>Chia sẻ</span>
                            <div class="ml-20">
                                <i class="fab fa-facebook-messenger px-1 text-2xl text-blue-700"></i>
                                <i class="fab fa-facebook px-1 text-2xl text-blue-800"></i>
                                <i class="fab fa-google-plus px-1 text-2xl text-red-400"></i>
                                <i class="fab fa-pinterest px-1 text-2xl text-red-600"></i>
                                <i class="fab fa-twitter px-1 text-2xl text-blue-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section class="bg-gray-100 bg-opacity-50 py-10"></section> -->
        <section class="bg-white">
            <div class=" container mx-auto">
                <div class="bg-white grid grid-cols-12 my-10">
                    <div class="col-span-9 bg-gray-100 p-5 bg-opacity-50">
                        <div>
                            <div class="">
                                <h2 class="text-3xl container mx-auto">Mô tả </h2>
                                <div class="border-b-2 rounded-full bg-gray-200 w-24 mt-2"></div>
                            </div>
                            <div class="mt-5">
                                <p class="text-justify"><?php echo $totall1['content'] ?></p>
                                <img style="width: 750px;height: 300px;" class="object-cover mx-auto my-5" src="./assets/img/<?php echo $totall1['image_detail'] ?>" alt="">
                            </div>
                        </div>
                        <div>
                            <div class="my-5">
                                <h2 class="text-3xl container mx-auto">Lịch trình</h2>
                                <div class="border-b-2 rounded-full bg-gray-200 w-24 mt-2"></div>
                            </div>
                            <div>
                                <p>
                                    <?php echo $totall1['plan1'] ?>
                                </p>

                                <img style="width: 750px;height: 300px;" class="object-cover mx-auto my-5" src="./assets/img/<?php echo $totall1['image_plan1'] ?>" alt="">
                            </div>
                            <div>
                                <p>
                                    <?php echo $totall1['plan2'] ?>
                                </p>

                                <img style="width: 750px;height: 300px;" class="object-cover mx-auto my-5" src="./assets/img/<?php echo $totall1['image_plan2'] ?>" alt="">
                            </div>
                            <div>
                                <p>
                                    <?php echo $totall1['plan3'] ?>
                                </p>

                                <img style="width: 750px;height: 300px;" class="object-cover mx-auto my-5" src="./assets/img/<?php echo $totall1['image_plan3'] ?>" alt="">
                            </div>
                        </div>
                        <div class="mt-10">
                            <div class="">
                                <span class="text-2xl container mx-auto text-red-500">GIÁ TOUR TRỌN GÓI CHO 01
                                    KHÁCH</span>
                                <div class="border-b-2 rounded-full bg-gray-200 w-24 mt-2"></div>
                            </div>
                            <table class="mx-auto my-10 ">
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
                                                <li class="list-disc list-inside py-1">Hướng dẫn viên: Chuyên nghiệp,
                                                    phục vụ nhiệt tình, thành thạo, chu đáo suốt tuyến.</li>
                                                <li class="list-disc list-inside py-1">Vé tham quan vào cửa một lần tại
                                                    các điểm tham quan</li>
                                                <li class="list-disc list-inside py-1">Bảo hiểm du lịch suốt tuyến</li>
                                                <li class="list-disc list-inside py-1">Quà tặng: Nước uống, khăn lạnh
                                                    trên phương tiện vận chuyển: 01 chai + 01 khăn lạnh/ ngày.</li>
                                            </ul>
                                        </td>
                                        <td class="border px-5">
                                            <ul>
                                                <li class="list-disc list-inside py-1">Chi tiêu cá nhân ngoài chương
                                                    trình</li>
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
                    <div class=" col-span-3 ml-10 p-5 bg-gray-100 bg-opacity-50">
                        <div class="">
                            <h2 class="text-3xl mx-2">Tour liên quan</h2>
                            <div class="border-b-2 rounded-full bg-gray-200 w-24 mt-2 mx-2"></div>
                        </div>
                        <div class="mt-5">
                            <?php
                            $parent = $totall1['id_parent'];
                            $show = "select tour.id_tour, name_tour,place_start, price, promotional , category.id_category, id_parent, images.image_main, tour.id_image
                            from tour 
                            join category on category.id_category=tour.id_category 
                            join images on tour.id_image=images.id_image
                            where id_parent = '$parent' limit 5";
                            $shows = $local->query($show);
                            foreach ($shows as $row) {
                                $rowstar = $row['id_tour'];
                                $query = "select sum(comment.evaluate) as sumStar, COUNT(DISTINCT comment.username) as sumName, comment.id_tour from tour join comment on tour.id_tour=comment.id_tour where tour.id_tour = $rowstar";
                                $resultquery = $local->query($query)->fetch();
                            ?>
                                <article>
                                    <a class="group shadow-lg rounded-md" href="product.php?id_tour=<?php echo $row['id_tour'] ?>">
                                        <div class="overflow-hidden rounded-md border border-white">
                                            <img class="transition duration-300 transform group-hover:opacity-80" src="./assets/img/<?php echo $row['image_main'] ?>" alt="" width="3011" style="height: 183px;">
                                        </div>
                                        <div class="text-left px-5 py-3">
                                            <h3 class="text-base font-bold uppercase"><?php echo $row['name_tour'] ?></h3>
                                            <div class="flex mt-2  items-center">
                                                <i class="fas fa-map-marker-alt py-2 pr-5"></i>
                                                <p class="text-sm"><?php echo $row['place_start'] ?></p>
                                            </div>
                                            <p class="my-px text-yellow-400">
                                                <?php
                                                if (!empty($resultquery['sumName'])) {
                                                    $user = $resultquery['sumName'];
                                                    $star = $resultquery['sumStar'];
                                                    $result = $star / $user;
                                                    $result;
                                                    for ($i = 0; $i < $result; $i++) {
                                                        echo '<i class="fas fa-star"></i>';
                                                    }
                                                }
                                                ?>
                                            </p>
                                            <p class="py-1">Giá: <span class="font-bold text-red-400"><?php echo number_format($row['price'], 0, '.', ',')  ?>
                                                    ₫/khách</span>
                                                ₫/khách
                                            </p>
                                            <button class="border w-full py-2 group-hover:border-yellow-500 uppercase">Đặt
                                                ngay<i class="fas fa-angle-double-right text-sm pl-2 transform group-hover:translate-x-3 transition duration-150"></i></button>
                                        </div>
                                    </a>
                                </article>
                                <div class="border-b w-72 bg-gray-400 mx-auto my-5"></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section class="bg-gray-100 bg-opacity-50 py-10"></section> -->
        <section class="bg-gray-100 container mx-auto p-5">
            <div class="my-5">
                <h2 class="text-3xl ">Nhận xét của khách hàng</h2>
                <div class="border-b-2 rounded-full bg-gray-200 w-24 mt-2"></div>
            </div>
            <div class="grid grid-cols-7 mb-10">
                <div class="col-span-3 border-r px-32">
                    <div>
                        <h3 class="my-4 text-xl font-bold">Đánh giá tổng thể</h3>
                        <div class="flex items-center">
                            <div class="pr-8 text-yellow-400">
                                <?php
                                if (!empty($totall1['COUNT(DISTINCT username)'])) {
                                    $user = $totall1['COUNT(DISTINCT username)'];
                                    $star = $totall1['SUM(evaluate)'];
                                    $result = $star / $user;
                                    $result;
                                    for ($i = 0; $i < $result; $i++) {
                                        echo '<i class="fas fa-star"></i>';
                                    }
                                }
                                ?>
                            </div>
                            <span class="px-2"><?php if (!empty($totall1['COUNT(DISTINCT username)'])) {
                                                    echo $totall1['COUNT(DISTINCT username)'];
                                                } ?></span>
                            <span>(lượt đánh giá)</span>
                        </div>
                    </div>
                    <!-- total star -->
                    <div class="my-5">
                        <h4>Xếp hạng</h4>
                        <button class="flex items-center py-3">
                            <span>5 sao</span>
                            <div class="px-14">
                                <i class="fas fa-star text-yellow-300"></i>
                                <i class="fas fa-star text-yellow-300"></i>
                                <i class="fas fa-star text-yellow-300"></i>
                                <i class="fas fa-star text-yellow-300"></i>
                                <i class="fas fa-star text-yellow-300"></i>
                            </div>
                            <p><span class="px-2"><?php
                                                    if (!empty($totall1['COUNT(DISTINCT username)'])) {
                                                        $showcmt = "select evaluate,id_tour, count(evaluate) from comment where evaluate = '5' and id_tour=$id";
                                                        $showcmtt = $local->query($showcmt)->fetch();
                                                        echo $showcmtt['count(evaluate)'];
                                                        if ($showcmtt['count(evaluate)'] == '') {
                                                            echo '0';
                                                        }
                                                    } else {
                                                        echo '0';
                                                    }
                                                    ?></span>đánh giá</p>
                        </button>
                        <!-- 5 sao -->
                        <button class="flex items-center py-3">
                            <span>4 sao</span>
                            <div class="px-14">
                                <i class="fas fa-star text-yellow-300"></i>
                                <i class="fas fa-star text-yellow-300"></i>
                                <i class="fas fa-star text-yellow-300"></i>
                                <i class="fas fa-star text-yellow-300"></i>
                                <i class="fas fa-star text-gray-300"></i>
                            </div>
                            <p><span class="px-2"><?php
                                                    if (!empty($totall1['COUNT(DISTINCT username)'])) {
                                                        $showcmt = "select evaluate,id_tour, count(evaluate) from comment where evaluate = '4' and id_tour=$id";
                                                        $showcmtt = $local->query($showcmt)->fetch();
                                                        echo $showcmtt['count(evaluate)'];
                                                        if ($showcmtt['count(evaluate)'] == '') {
                                                            echo '0';
                                                        }
                                                    } else {
                                                        echo '0';
                                                    }
                                                    ?></span>đánh giá</p>
                        </button>
                        <!-- 4 sao -->
                        <button class="flex items-center py-3">
                            <span>3 sao</span>
                            <div class="px-14">
                                <i class="fas fa-star text-yellow-300"></i>
                                <i class="fas fa-star text-yellow-300"></i>
                                <i class="fas fa-star text-yellow-300"></i>
                                <i class="fas fa-star text-gray-300"></i>
                                <i class="fas fa-star text-gray-300"></i>
                            </div>
                            <p><span class="px-2"><?php
                                                    if (!empty($totall1['COUNT(DISTINCT username)'])) {
                                                        $showcmt = "select evaluate,id_tour, count(evaluate) from comment where evaluate = '3' and id_tour=$id";
                                                        $showcmtt = $local->query($showcmt)->fetch();
                                                        echo $showcmtt['count(evaluate)'];
                                                        if ($showcmtt['count(evaluate)'] == '') {
                                                            echo '0';
                                                        }
                                                    } else {
                                                        echo '0';
                                                    }
                                                    ?></span>đánh giá</p>
                        </button>
                        <!-- 3 sao -->
                        <button class="flex items-center py-3">
                            <span>2 sao</span>
                            <div class="px-14">
                                <i class="fas fa-star text-yellow-300"></i>
                                <i class="fas fa-star text-yellow-300"></i>
                                <i class="fas fa-star text-gray-300"></i>
                                <i class="fas fa-star text-gray-300"></i>
                                <i class="fas fa-star text-gray-300"></i>
                            </div>
                            <p><span class="px-2"><?php
                                                    if (!empty($totall1['COUNT(DISTINCT username)'])) {
                                                        $showcmt = "select evaluate,id_tour, count(evaluate) from comment where evaluate = '2' and id_tour=$id";
                                                        $showcmtt = $local->query($showcmt)->fetch();
                                                        echo $showcmtt['count(evaluate)'];
                                                        if ($showcmtt['count(evaluate)'] == '') {
                                                            echo '0';
                                                        }
                                                    } else {
                                                        echo '0';
                                                    }
                                                    ?></span>đánh giá</p>
                        </button>
                        <!-- 2 sao -->
                        <button class="flex items-center py-3">
                            <span>1 sao</span>
                            <div class="px-14">
                                <i class="fas fa-star text-yellow-300"></i>
                                <i class="fas fa-star text-gray-300"></i>
                                <i class="fas fa-star text-gray-300"></i>
                                <i class="fas fa-star text-gray-300"></i>
                                <i class="fas fa-star text-gray-300"></i>
                            </div>
                            <p><span class="px-2"><?php
                                                    if (!empty($totall1['COUNT(DISTINCT username)'])) {
                                                        $showcmt = "select evaluate,id_tour, count(evaluate) from comment where evaluate = '1' and id_tour=$id";
                                                        $showcmtt = $local->query($showcmt)->fetch();
                                                        echo $showcmtt['count(evaluate)'];
                                                        if ($showcmtt['count(evaluate)'] == '') {
                                                            echo '0';
                                                        }
                                                    } else {
                                                        echo '0';
                                                    }
                                                    ?></span>đánh giá</p>
                        </button>
                        <!-- 1 sao -->
                    </div>
                </div>
                <span class="hidden check_btn" id="check_btn"></span>
                <?php require "binhluan.php" ?>
            </div>
            </div>
            </div>
            <div class="text-center font-bold text-red-500 text-xl <?php
                                                                    if (empty($_SESSION['user'])) {
                                                                        echo "block";
                                                                    } else {
                                                                        echo 'hidden';
                                                                    }
                                                                    ?>">
                <main class="container mx-auto text-center">
                    <i class="far fa-sad-tear text-4xl block text"></i>
                    <span class="block text-lg ">Đăng nhập để có thể bình luận
                    </span>
                    <button class="border border-blue-500 py-2 px-4 rounded-md hover:border-yellow-500"><a href="./login.php">Đăng nhập ngay</a></button>

                </main>
            </div>
            <div class="<?php
                        if (empty($_SESSION['user'])) {
                            echo "hidden";
                        } else {
                            echo 'block';
                        }
                        ?>">

                <form action="#" class="mx-10 mb-5 bg-white py-2" method="POST" enctype="multipart/form-data">
                    <div class="  w-40 ">
                        <img class="rounded-full mx-4 my-2" style="width: 80px;height: 80px;" src="./assets/img/<?php if ($showuser['user_image'] == "") {
                                                                                                            echo 'user-vector-png.png';
                                                                                                        } else {
                                                                                                            echo $showuser['user_image'];
                                                                                                        } ?>" alt="">
                        <span class="px-3 font-bold  block mt-4"><?php echo $showuser['fullname'] ?></span>
                    </div>
                    <div class="mr-180 mx-10" id="rating">
                        <input class="mx-5 rating" type="radio" id="star5" name="rating" value="5" checked />
                        <label class="full px-1 py-5 text-2xl" for="star5" title="Awesome - 5 stars"></label>

                        <input class="mx-5 rating" type="radio" id="star4" name="rating" value="4" />
                        <label class="full px-1 py-5 text-2xl" for="star4" title="Pretty good - 4 stars"></label>

                        <input class="mx-5 rating" type="radio" id="star3" name="rating" value="3" />
                        <label class="full px-1 py-5 text-2xl" for="star3" title="Meh - 3 stars"></label>

                        <input class="mx-5 rating" type="radio" id="star2" name="rating" value="2" />
                        <label class="full px-1 py-5 text-2xl" for="star2" title="Kinda bad - 2 stars"></label>

                        <input class="mx-5 rating" type="radio" id="star1" name="rating" value="1" />
                        <label class="full px-1 py-5 text-2xl" for="star1" title="Sucks big time - 1 star"></label>

                    </div>
                    <div class="my-5 flex px-10 w-full ">
                        <div class="hidden">
                            <input type="text" id="countstar" value="">
                        </div>
                        <textarea class="border px-5 py-2 focus:outline-none  w-full" name="comment" id="ax_cmt" cols="145" rows="2"></textarea>
                        <button name="btn_sent" id="btn_sent" class="mx-3 border px-10 bg-white focus:outline-none">Gửi</button>
                    </div>

                </form>

            </div>
            <?php
            if (isset($_POST['btn_sent'])) {
                $id_toursen = $totall1['id_tour'];
                $usernamesen = $showuser['username'];
                $star = $_POST['rating'];
                $comment = $_POST['comment'];
                function checkstar($user, $id)
                {
                    include "./examples/local.php";
                    $sql = "select count(evaluate) from comment where username like '$user' and id_tour like '$id'";
                    $data = $local->prepare($sql);
                    $data->execute();
                    return $data->fetchColumn();
                }
                $rowstar = checkstar($usernamesen, $id);
                if ($rowstar == 0) {
                    $sqlstar = "insert into comment values(null,'$usernamesen','$id_toursen','$star','$comment',null)";
                    $totalcmt = $local->exec($sqlstar);
                    header("location:product.php?id_tour=$id");
                } else {
                    $sqlstar = "insert into comment values(null,'$usernamesen','$id_toursen','0','$comment',null)";
                    $totalcmt = $local->exec($sqlstar);
                    $sqlupdate = "update comment set evaluate = $star where username like '$usernamesen' and id_tour like '$id_toursen' limit 1";
                    $totalll = $local->prepare($sqlupdate);
                    $totalll->execute();
                    header("location:product.php?id_tour=$id");
                }
            }
            ?>
        </section>
    </main>
    <footer class="background4 bg-opacity-10 mt-10">
        <?php require "footer.php"; ?>
    </footer>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="./content/slick-1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="./content/js/sliderProduct.js"></script>
    <script type="text/javascript" src="./content/js/product.js"></script>
    <!-- <script>
    var btn_sent = document.querySelector('#btn_sent');
    var check_btn = document.querySelector('#check_btn');
    console.log(check_btn);
    btn_sent.addEventListener('click', () => {
        console.log('asdada');
        check_btn.innerHTML = 1;
    });
    console.log(check_btn.innerHTML);


    $(document).ready(function() {
        $('#bt_ajax').click(function() {
            var ax_user = document.querySelector('#ax_user').innerHTML;

            var star = document.getElementsByClassName('rating');
            var stars = 0;
            for (var i = 0; i < star.length; i++) {
                if (star[i].checked) {
                    stars = star[i].value;
                    break;
                }
            }
            var id = document.querySelector('#id_ax').innerHTML;
            var ax_cmt = document.querySelector('#ax_cmt').value;
            console.log(stars);
            console.log(id);
            console.log(ax_cmt);
            console.log(ax_user);
            $.ajax({
                type: 'POST',
                url: './ajaxCMT.php',
                data: {
                    "id": id,
                    "user": ax_user,
                    "stars": stars,
                    "content": ax_cmt,
                },
                success: function(data) {
                    alert(data);
                    // location.reload();
                }
            });
        });
    });
    </script> -->
    <script>
        var star1 = document.getElementById("star1");
        var star2 = document.getElementById("star2");
        var star3 = document.getElementById("star3");
        var star4 = document.getElementById("star4");
        var star5 = document.getElementById("star5");
        var countstar = document.getElementById("countstar");

        star1.addEventListener("click", function() {
            countstar.value = 1;
        })
        star2.addEventListener("click", function() {
            countstar.value = 2;
        })
        star3.addEventListener("click", function() {
            countstar.value = 3;
        })
        star4.addEventListener("click", function() {
            countstar.value = 4;
        })
        star5.addEventListener("click", function() {
            countstar.value = 5;
        })
    </script>
</body>

</html>