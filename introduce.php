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
        <img src="./content/image/background/bg-gioithieu1.jpg" alt="">
        <div class="bg-blue-400 bg-opacity-50 absolute top-0 left-0 right-0">
            <?php require "headerTop.php"; ?>
        </div>
        <div class="absolute top-0 left-0 right-0 flex mt-8 px-32 bg-blue-300 bg-opacity-50">
            <?php require "menu.php"; ?>
        </div>
        <div class="absolute bottom-0 left-0 right-0 mx-64 pt-5 bg-white bg-opacity-80 rounded-t-md">
            <h3 class="font-bold text-2xl uppercase text-center "><a href="">Về chúng tôi - Hanoitourist</a></h3>
            <img class="w-20 mx-170" src="./assets/img/gachvang.png" alt="">
        </div>
    </header>
    <main class="container mx-auto">
        <section class="flex container mx-auto my-5">
            <h3><a class="uppercase text-sm text-blue-400 hover:underline" href="index.php">Trang chủ</a></h3>
            <i class="fas fa-angle-right px-3 items-center flex text-sm text-gray-400"></i>
            <h3><a class="uppercase text-sm" href="./introduce.php">giới thiệu</a></h3>
        </section>
        <section class="mx-28">
            <div>
                <h2 class="text-4xl text-blue-800 my-10 italic font-bold">Tầm nhìn</h2>
                <h3 class="my-2 mx-20 font-bold text-2xl text-opacity-50 text-black border-l-4 px-5 border-yellow-300">
                    Thương hiệu du lịch hàng đầu tại Việt Nam</h3>
                <p class="text-justify">Trong ngành du lịch Việt Nam, Công ty Dịch vụ Lữ hành Hanoitourist là doanh
                    nghiệp lữ hành luôn tiên phong với những sáng tạo đột phá, tăng trưởng bền vững, khẳng định vững
                    chắc vị trí hàng đầu về chất lượng sản phẩm, dịch vụ, cung cách phục vụ và hiệu quả kinh doanh. Đó
                    là cơ sở để Lữ hành Hanoitourist liên tục vinh dự đón nhận hàng loạt giải thưởng, danh hiệu uy tín
                    công nhận và khẳng định vị thế Thương hiệu Quốc gia, Thương hiệu Lữ hành hàng đầu Việt Nam và khu
                    vực.</p>
                <img class="mx-auto my-2" src="./content/image/Giới thiệu/ha-noi.jpg" alt="">
            </div>
            <div>
                <h2 class="text-4xl text-blue-800 my-10 italic font-bold">Sứ mệnh</h2>
                <h3 class="my-2 mx-20 font-bold text-2xl text-opacity-50 text-black border-l-4 px-5 border-yellow-300">
                    Mang lại trải nghiệm, hạnh phúc đến cho khách hàng, đối tác, người lao động, chủ sở hữu và cộng đồng
                    thông qua các sản phẩm và dịch vụ du lịch.</h3>
                <p class="text-justify">Với biểu tượng Chùa Một Cột biểu tượng của trí tuệ, của sự trường thọ, và sự cứu
                    rỗi qua sự nhận thức đầy đủ trí tuệ Hanoitourist được tượng trưng cho sứ mệnh nâng tầm vị thế du
                    lịch Việt Nam, mang hình ảnh đặc trưng của Việt Nam đến đến với mọi người thông qua việc cung cấp
                    các trải nghiệm, sản phẩm, dịch vụ độc đáo, chứa đựng giá trị văn hóa tinh thần với chất lượng quốc
                    tế.</p>
                <img class="mx-auto my-2" src="./content/image/Giới thiệu/chua-1-cot.jpg" alt="">
            </div>
            <div>
                <h2 class="text-4xl text-blue-800 my-10 italic font-bold">Giá trị cốt lõi</h2>
                <div class="grid grid-cols-4 gap-10 mx-28 text-center">
                    <span
                        class="bg-yellow-300 py-2 px-5 text-xl bg-opacity-50 font-bold text-black text-opacity-50">Chính
                        trực</span>
                    <span class="bg-yellow-300 py-2 px-5 text-xl bg-opacity-50 font-bold text-black text-opacity-50">Hợp
                        lực</span>
                    <span
                        class="bg-yellow-300 py-2 px-5 text-xl bg-opacity-50 font-bold text-black text-opacity-50">Sáng
                        tạo</span>
                    <span
                        class="bg-yellow-300 py-2 px-5 text-xl bg-opacity-50 font-bold text-black text-opacity-50">Hiếu
                        khách</span>
                </div>
                <img class="mx-auto my-10" src="./content/image/Giới thiệu/dia-diem-du-lich-ha-noi-ho-hoan-kiem.jpg"
                    alt="">
                <h3 class="font-bold text-xl">Thương hiệu Quốc gia</h3>
                <p class="py-2 text-justify">Với thế mạnh cung ứng dịch vụ đa dạng có chất lượng cao gắn với các giá trị
                    “Chất lượng - Đổi mới - Sáng tạo - Năng lực lãnh đạo” và năng lực cạnh tranh trên thị trường trong
                    nước và quốc tế trong quá trình hội nhập, Công ty Dịch vụ Lữ hành Hanoitourist vinh dự là doanh
                    nghiệp lữ hành duy nhất được bình chọn là Thương hiệu Quốc gia của Chính phủ Việt Nam liên tục từ
                    năm 2008 đến nay.</p>
                <h3 class="font-bold text-xl">Thương hiệu Lữ hành hàng đầu Việt Nam</h3>
                <p class="py-2 text-justify">Công ty Dịch vụ Lữ hành Hanoitourist luôn được bình chọn vị trí Đứng đầu
                    danh hiệu Lữ hành Quốc tế hàng đầu Việt Nam và Đứng đầu Lữ hành Nội địa hàng đầu Việt Nam. Đây là 2
                    danh hiệu cao quý nhất, chính thức của ngành du lịch Việt Nam do Tổng cục Du lịch, Hiệp hội Du lịch
                    xét duyệt, công bố.</p>
                <p class="py-2 text-justify">Các danh hiệu được xét duyệt, xếp hạng dựa trên tiêu chí về lượng khách
                    phục vụ, doanh thu, đặc biệt chú trọng tiêu chí hiệu quả lợi nhuận kinh doanh, nộp ngân sách, thu
                    nhập bình quân của người lao động, chất lượng dịch vụ cung cấp, đào tạo và phát triển nguồn nhân lực
                    du lịch - lữ hành, trách nhiệm đối với xã hội - cộng đồng...</p>
            </div>
            <h2 class="text-2xl text-justify text-blue-800 my-10 italic font-bold">“Chúng tôi cam kết luôn nỗ lực đem
                đến những giá trị dịch vụ tốt nhất cho khách hàng và đối tác để tiếp tục khẳng định vị trí hàng đầu của
                thương hiệu Lữ hành Hanoitourist.”</h2>
        </section>
    </main>
    <footer class="background4 bg-opacity-10 mt-10">
        <?php require "footer.php"; ?>
    </footer>
</body>

</html>