<?php
ob_start();
// session_start();
include "./examples/local.php";
$sql = "select * from information";
$total = $local->query($sql)->fetch();
?>
<section class="py-3">
    <div class="container mx-auto grid grid-cols-5 py-3">
        <div class="col-span-2 text-white">
            <h3 class="uppercase">Đăng ký nhận email của HANOITOURIST</h3>
            <p class="pt-4">Hãy luôn là những người có thông tin sớm nhất</p>
        </div>
        <div class="col-span-2 flex items-center">
            <input class="bg-white py-3 px-4 w-96 focus:outline-none" type="text"
                placeholder="Địa chỉ email của bạn ...">
            <button
                class="bg-yellow-400 border-yellow-400 text-black py-2.5 px-4 border-2 hover:bg-white focus:outline-none rounded-r-lg"><a
                    href="#">Tiếp tục</a></button>
        </div>
        <div class="col-span-1 border-white text-white pl-6">
            <h3 class="uppercase">Đồng hành cùng chúng tôi</h3>
            <div class=" text-white my-2">
                <a class="rounded-full mx-2 px-4 py-2 bg-white text-blue-600 hover:bg-blue-200"
                    href="https://www.facebook.com/LEGO/"><i class="fab fa-facebook-f"></i></a>
                <a class="rounded-full mx-2 px-3 py-2 bg-white hover:bg-blue-200 text-blue-600"
                    href="https://twitter.com/lego_group"><i class="fab fa-twitter"></i></a>
                <a class="rounded-full mx-2 px-3 py-1.5 bg-white hover:bg-blue-200 text-pink-400 text-lg"
                    href="https://www.instagram.com/lego/"><i class="fab fa-instagram"></i></a>
                <a class="rounded-full mx-2 px-3 py-2 bg-white hover:bg-blue-200 text-red-600"
                    href="https://www.youtube.com/user/LEGO"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</section>
<section class="border border-white"></section>
<section class="container mx-auto text-white py-6">
    <div class="grid grid-cols-5 gap-20">
        <div>
            <img src="./assets/img/<?php echo $total['logo'] ?>" alt="">
            <div class="flex mt-2">
                <i class="fas fa-map-marker-alt py-2 pr-5"></i>
                <p class=""><?php echo $total['information_address'] ?>
                </p>
            </div>
            <div class="flex">
                <i class="fas fa-phone-volume py-6 pr-5"></i>
                <a class="block hover:underline py-5" href="#"><?php echo $total['information_phone'] ?></a>
            </div>
            <div class="flex">
                <i class="fas fa-mail-bulk py-2 pr-5"></i>
                <a class="block hover:underline py-1" href="#"><?php echo $total['information_email'] ?></a>
            </div>
        </div>
        <div class="pl-10">
            <h3 class="font-bold text-base my-1 uppercase">Tin Tức</h3>
            <ul>
                <li class="py-2"><a class="text-sm hover:underline capitalize" href="./news.php">cẩn nang du lịch</a>
                </li>
                <li class="py-2"><a class="text-sm hover:underline capitalize" href="./news.php">khám phá du lịch</a>
                </li>
                <li class="py-2"><a class="text-sm hover:underline capitalize" href="./news.php">kinh nghiệm du lịch</a>
                </li>
                <li class="py-2"> <a class="text-sm hover:underline capitalize" href="./news.php">sự kiện du lịch</a>
                </li>
                <li class="py-2"> <a class="text-sm hover:underline capitalize" href="./news.php">tuyển dụng du lịch</a>
                </li>
            </ul>
        </div>
        <div class="">
            <h3 class="font-bold text-base my-1 uppercase">CHĂM SÓC KHÁCH HÀNG</h3>
            <ul>
                <li class="py-2"><a class="text-sm hover:underline capitalize" href="#">Ưu đãi khách hàng</a>
                </li>
                <li class="py-2"><a class="text-sm hover:underline capitalize" href="#">Tải App</a>
                </li>
                <li class="py-2"><a class="text-sm hover:underline capitalize" href="#">Travel
                        Voucher </a></li>
                <li class="py-2"> <a class="text-sm hover:underline capitalize" href="#">Bảo hiểm
                        Du lịch</a></li>
                <li class="py-2"><a class="text-sm hover:underline capitalize" href="#">Phiếu góp
                        ý</a>
                </li>
            </ul>
        </div>
        <div class="">
            <h3 class="font-bold text-base my-1 uppercase">liên hệ</h3>
            <ul>
                <li class="py-2"><a class="text-sm hover:underline capitalize" href="#">Điều khoản
                        chung </a>
                </li>
                <li class="py-2"><a class="text-sm hover:underline capitalize" href="#">Hướng dẫn
                        mua tour online</a></li>
                <li class="py-2"> <a class="text-sm hover:underline capitalize" href="#">Quy định
                        thanh toán</a></li>
                <li class="py-2"> <a class="text-sm hover:underline capitalize" href="#">Chính sách
                        giao nhận</a></li>
                <li class="py-2"><a class="text-sm hover:underline capitalize" href="#">Chính sách
                        hủy phạt</a>
                </li>
            </ul>
        </div>
        <div class="">
            <h3 class="font-bold text-base my-1 uppercase">chấp nhận thanh toán</h3>
            <div class="flex mt-5">
                <a class="w-full px-1 " href="#"><img src="./content/image/pay/visa.jpg" alt=""></a>
                <a class="w-full px-1 " href="#"><img src="./content/image/pay/mastercard.jpg" alt=""></a>
                <a class="w-full px-1 " href="#"><img class="w-full" src="./content/image/pay/momo.jpg" alt=""></a>
                <a class="w-full px-1 inline-block" href="#"><img src="./content/image/pay/vnpay.jpg" alt=""></a>
                <a class="w-full px-1 " href="#"><img class="w-full" src="./content/image/pay/jcb.jpg" alt=""></a>

            </div>
        </div>
    </div>
</section>
<section class="border border-white"></section>
<section class="my-2 text-white container mx-auto py-3">
    <ul class="text-center">
        <li class="inline-block px-10 font-bold text-sm hover:underline"><a href="#">Chính sách bảo
                mật</a></li>
        <li class="inline-block px-10 font-bold text-sm hover:underline"><a href="#">Cookies</a></li>
        <li class="inline-block px-10 font-bold text-sm hover:underline"><a href="#">Cài
                đặt cookie</a>
        </li>
        <li class="inline-block px-10 font-bold text-sm hover:underline"><a href="#">Thông báo pháp
                lý</a>
        </li>
        <li class="inline-block px-10 font-bold text-sm hover:underline"><a href="#">Điều khoản sử
                dụng</a></li>
        <li class="inline-block px-10 font-bold text-sm hover:underline"><a href="#">Kỹ
                thuật số</a>
        </li>
        <li class="inline-block px-10 font-bold text-sm hover:underline"><a href="#">Tiếp cận</a></li>
    </ul>
</section>
<div class="bg-blue-400 top-0 left-0 right-0 bg-opacity-50">
    <p class="py-2 text-white text-center">Dự án: Xây dựng website Hà Nội city tour (đặt tour 1 ngày
        quanh
        HÀ NỘI)</p>
</div>