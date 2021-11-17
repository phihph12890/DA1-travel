<?php
ob_start();
// session_start();
include "./examples/local.php";
if (isset($_GET['id_category'])) {
    $id = $_GET['id_category'];
    $sql = "select * from category where id_category = $id";
    $total = $local->query($sql)->fetch();
    $parent = $total['id_parent'];
    $category = $total['id_category'];
}
if ($_GET['id_category'] == 0) {
    $parent = 25;
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
        <img src="./content/image/background/bg-noithanh1.jpg" alt="">
        <div id="navbar" class="absolute top-0 left-0 right-0 flex mt-8 px-32 bg-blue-300">
            <?php require "menu.php"; ?>
        </div>
        <div class="bg-blue-400 bg-opacity-50 absolute top-0 left-0 right-0">
            <?php require "headerTop.php"; ?>
        </div>
        <div class="absolute bottom-0 left-0 right-0 mx-64 pt-5 bg-white bg-opacity-80 rounded-t-md">
            <h3 class="font-bold text-2xl uppercase text-center "><a href="">điểm đến <?php if ($parent == '25' || $category == '25') {
                                                                                            echo "nội thành";
                                                                                        }
                                                                                        if ($parent == '26' || $category == '26') {
                                                                                            echo "ngoại thành";
                                                                                        } ?></a></h3>
            <img class="w-20 mx-170" src="./assets/img/gachvang.png" alt="">
        </div>
    </header>
    <section class="flex container mx-auto my-5">
        <h3><a class="uppercase text-sm text-blue-400 hover:underline" href="./index.php">Trang chủ</a></h3>
        <i class="fas fa-angle-right px-3 items-center flex text-sm text-gray-400"></i>
        <h3><a class="uppercase text-sm" href="tourNoithanh.php?id_category=<?php echo $parent ?>">tour <?php if ($parent == '25' || $category == '25') {
                                                                                                            echo "nội thành";
                                                                                                        }
                                                                                                        if ($parent == '26' || $category == '26') {
                                                                                                            echo "ngoại thành";
                                                                                                        } ?></a>
        </h3>
    </section>
    <section class="container mx-auto grid grid-cols-12">
        <div class="col-span-2">
            <div>
                <h2 class="text-xl font-bold uppercase my-3"><a href="#">hà nội của tôi</a></h2>
                <iframe width="256" height="180"
                    src="https://www.youtube.com/embed/FClS4ni4zfo?start=16?rel=0&autoplay=1&mute=1"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="mt-10">
                <h2 class="text-xl font-bold uppercase"><a href="#">Ưu đãi Voucher</a></h2>
                <?php
                $sqlvour = "select * from voucher where id_voucher<='27' or id_voucher>'28' order by id_voucher desc limit 3";
                $showtvour = $local->query($sqlvour);
                foreach ($showtvour as $voucher) {

                ?>
                <article>
                    <div class="border-b-2 rounded-full bg-gray-200 w-24 my-5"></div>
                    <a class="" href="./customer.php">
                        <img class="rounded-md" src="./assets/img/<?php echo $voucher['voucher_image'] ?>" alt="">
                        <div class="">
                            <h3 class="text-center font-bold my-2"><?php echo $voucher['vourcher_name'] ?></h3>
                            <ul class="list-disc list-inside">
                                <li class="py-px">Ưu đãi đến <?php echo $voucher['voucher_sale'] ?>%</li>
                            </ul>
                        </div>
                        <p
                            class="py-2 text-right uppercase text-yellow-500 underline group-hover:text-blue-600 text-sm">
                            xem ngay</p>
                    </a>
                    <div class="border-gray-300 border-b mb-3"></div>
                </article>
                <?php } ?>
            </div>

        </div>
        <div class="relative col-span-10 mx-10">
            <div>
                <h2 class="text-xl font-bold my-3 mx-2 uppercase"><a href="#">Danh sách Tour </a></h2>
                <div class="flex justify-between">
                    <div class="">
                        <form method="post">
                            <button name="tour_new"
                                class="px-3 py-2 text-sm bg-white mx-2 border border-black hover:border-yellow-400">Tour
                                mới</button>
                            <button name="tour_love"
                                class="px-3 py-2 text-sm  mx-2 border border-black hover:border-yellow-400">Tour
                                Yêu Thích</button>

                            <button name="tour_sale"
                                class="px-3 py-2 text-sm bg-white mx-2 border border-black hover:border-yellow-400">Tour
                                khuyến mãi</button>
                        </form>
                    </div>
                    <form method="POST">
                        <select
                            class="px-3 py-2 text-sm bg-white mx-2 focus:outline-none border border-black hover:border-yellow-400"
                            name="check_price" id="">
                            <option value="price">Giá</option>
                            <option value="0">Giá: Thấp đến cao</option>
                            <option value="1">Giá: Cao đến thấp</option>
                        </select>
                        <select
                            class="px-3 w-40 py-2 text-sm bg-white mx-2 focus:outline-none border border-black hover:border-yellow-400"
                            name="check_place" id="">
                            <option value="0">Điểm khởi hành</option>
                            <?php
                            $sqlcate = "select * from category where id_parent>0";
                            $showcate = $local->query($sqlcate);
                            foreach ($showcate as $showcategory) {
                            ?>
                            <option value="<?php echo $showcategory['name_category'] ?>">
                                <?php echo $showcategory['name_category'] ?></option>
                            <?php } ?>
                        </select>
                        <input
                            class="px-10 py-2 text-sm bg-blue-300 mx-2 focus:outline-none border border-black hover:border-yellow-400"
                            type="submit" name="search_filter" id="" value="Tìm kiếm">
                    </form>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-5 mt-5">
                <?php
                if (isset($_GET['text_search'])) {
                    $parent;
                    $category;
                    $text_search = $_GET['text_search'];
                    $sqll = "select tour.id_tour, name_tour, place_start, price, promotional , category.id_category, category.id_parent, images.image_main,name_category, tour.id_image, (price - promotional) as TB
                    from tour 
                    join category on category.id_category=tour.id_category 
                    join images on tour.id_image=images.id_image
                    where name_tour like '%$text_search%' or name_category like '%$text_search%' limit 12";
                } else if (isset($_POST['tour_love'])) {
                    $sqll = "select tour.id_tour, name_tour, place_start, price, promotional , category.id_category, category.id_parent, images.image_main, tour.id_image,
                     (sum(comment.evaluate))/(COUNT(DISTINCT comment.username))
                from tour 
                join category on category.id_category=tour.id_category 
                join images on tour.id_image=images.id_image
                join comment on tour.id_tour=comment.id_tour
                where category.id_parent like $parent or category.id_parent like $category 
                group by tour.id_tour, name_tour, place_start, price, promotional , category.id_category, category.id_parent, images.image_main, tour.id_image
                having  (sum(comment.evaluate))/(COUNT(DISTINCT comment.username))>=4 ";
                } else if (isset($_POST['tour_new'])) {
                    $sqll = "select tour.id_tour, name_tour, place_start, price, promotional , category.id_category, category.id_parent, images.image_main, tour.id_image
                    from tour 
                    join category on category.id_category=tour.id_category 
                    join images on tour.id_image=images.id_image
                    where id_parent like $parent or id_parent like $category order by id_tour desc limit 12";
                } else if (isset($_POST['tour_sale'])) {
                    $sqll = "select tour.id_tour, name_tour, place_start, price, promotional , category.id_category, category.id_parent, images.image_main, tour.id_image
                    from tour 
                    join category on category.id_category=tour.id_category 
                    join images on tour.id_image=images.id_image
                    where (id_parent like $parent or id_parent like $category) and promotional > 0 limit 12";
                } else if (isset($_POST['search_filter'])) {
                    $check_price = $_POST['check_price'];
                    $check_place = $_POST['check_place'];
                    $resultP;
                    $resultPl;
                    if ($check_price == 1) {
                        $resultP = 'DESC';
                    } else {
                        $resultP = 'ASC';
                    }
                    if ($check_place == 0) {
                        $resultPl = '';
                    } else {
                        $resultPl = "and place_start like '%$check_place%'";
                    }
                    $sqll = "select tour.id_tour, name_tour, place_start, price, promotional , category.id_category, category.id_parent, images.image_main, tour.id_image, (price - promotional) as TB
                    from tour 
                    join category on category.id_category=tour.id_category 
                    join images on tour.id_image=images.id_image
                    where (id_parent like $parent or id_parent like $category) $resultPl  order by TB $resultP limit 12";
                } else if ($category <= 26) {
                    $sqll = "select tour.id_tour, name_tour, place_start, price, promotional , category.id_category, category.id_parent, images.image_main, tour.id_image
                from tour 
                join category on category.id_category=tour.id_category 
                join images on tour.id_image=images.id_image
                where id_parent = $category  limit 12";
                } else if ($category > 26) {
                    $sqll = "select tour.id_tour, name_tour,place_start, price, promotional , category.id_category, category.id_parent, images.image_main, tour.id_image
                from tour 
                join category on category.id_category=tour.id_category 
                join images on tour.id_image=images.id_image
                where id_parent = $parent and tour.id_category = $category limit 12";
                }
                $totall = $local->query($sqll);
                $cols = $local->query($sqll)->fetchColumn();
                foreach ($totall as $values) {
                    $rowstar = $values['id_tour'];
                    $query = "select sum(comment.evaluate) as sumStar, COUNT(DISTINCT comment.username) as sumName, comment.id_tour from tour join comment on tour.id_tour=comment.id_tour where tour.id_tour = $rowstar";
                    $resultquery = $local->query($query)->fetch();
                ?>
                <article class="group shadow-lg rounded-md">
                    <a href="./product.php?id_tour=<?php echo $values['id_tour'] ?>">
                        <div class="overflow-hidden rounded-md border border-white">
                            <img style="height: 172px;width: 282px;"
                                class="transition duration-300 transform group-hover:opacity-80 object-cover"
                                src="./assets/img/<?php echo $values['image_main'] ?>" alt="">
                        </div>

                        <div class="text-left px-5 py-3 relative" style="height: 260px;">
                            <h3 class="text-base font-bold uppercase"><?php echo $values['name_tour'] ?></h3>
                            <div class="flex mt-2  items-center">
                                <i class="fas fa-map-marker-alt py-2 pr-5"></i>
                                <p class="text-sm"><?php echo $values['place_start'] ?></p>
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
                            <span class="mr-3 line-through text-red-400 text-lg ">
                                <?php if ($values['promotional'] > 0) {
                                        echo number_format($values['price'], 0, '.', ',');
                                    } ?>
                            </span>
                            <span class="py-3">Giá: <span class="font-bold text-red-400"><?php if ($values['promotional'] > 0) {
                                                                                                    echo number_format(($values['price'] - $values['promotional']), 0, '.', ',');
                                                                                                } else {
                                                                                                    echo number_format($values['price'], 0, '.', ',');
                                                                                                } ?>
                                    ₫/khách</span>
                                <button
                                    class="border w-full absolute inset-x-0 bottom-0  py-2 mb-1 group-hover:border-yellow-500 uppercase">Đặt
                                    ngay<i
                                        class="fas fa-angle-double-right text-sm pl-2 transform group-hover:translate-x-3 transition duration-150"></i></button>
                        </div>
                    </a>
                </article>
                <?php } ?>
                <div class="absolute inset-0 mt-32 <?php
                                                    if ($cols != null) {
                                                        echo "hidden";
                                                    } else {
                                                        echo "block";
                                                    }
                                                    ?>">
                    <main class="container mx-auto text-center my-20">
                        <i class="far fa-sad-tear text-6xl block text"></i>
                        <span class="block text-2xl py-5">Không tìm thấy tour yêu cầu, vui lòng tìm lại
                        </span>
                        <button class="border border-blue-500 py-2 px-5 rounded-md hover:border-yellow-500"><a
                                href="./index.php">Quay về trang chủ</a></button>

                    </main>
                </div>
            </div>
        </div>
    </section>
    <footer class="background4 bg-opacity-10 mt-10">
        <?php require "footer.php"; ?>
    </footer>
</body>

</html>