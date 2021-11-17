<?php
ob_start();
session_start();
include "./examples/local.php";
$sql = "select * from information";
$total = $local->query($sql)->fetch();
?>
<div class="container mx-auto flex justify-between relative">
    <div class="flex justify-items-center">
        <ul>
            <li class="inline-block  pr-5 ml-5">
                <a href="#">
                    <span class="text-base text-white hover:text-yellow-400"><i
                            class="fas fa-mail-bulk py-2 pr-3"></i><?php echo $total['information_email'] ?></span>
                </a>
            </li>
            <li class="inline-block  pr-5 ml-5">
                <a href="#">
                    <span class="text-base text-white hover:text-yellow-400"><i
                            class="fas fa-phone py-2 pr-3"></i>Hotline:
                        <?php echo $total['information_phone'] ?></span>
                </a>
            </li>
        </ul>
    </div>
    <div class="z-50">
        <ul>
            <li class="inline-block pr-5 hover:text-black  group">
                <span href="./login.php" class="group">

                    <?php
                    if (isset($_SESSION['user'])) {
                        $user = $_SESSION['user'];
                        $sqls = "select * from user where username = '$user'";
                        $totals = $local->query($sqls)->fetch();
                    }
                    ?>
                    <div class=" <?php
                                    if (isset($_SESSION['user'])) {
                                        echo 'inline';
                                    } else {
                                        echo 'hidden';
                                    } ?>">
                        <img class="inline-block pr-1 h-6 w-7" src="./assets/img/<?php
                                                                                    if (!empty($totals['user_image'])) {
                                                                                        echo $totals['user_image'];
                                                                                    } else {
                                                                                        echo 'user-vector-png.png';
                                                                                    }
                                                                                    ?>" alt="">
                        <span class="text-yellow-400 font-black text-sm uppercase cursor-pointer" id="login">Hi
                            <?php echo $totals['fullname'] ?>
                        </span>
                    </div>


                    <a href="./login.php"><span
                            class="inline-block text-base text-white group-hover:text-yellow-500 <?php
                                                                                                                        if (isset($_SESSION['user'])) {
                                                                                                                            echo 'hidden';
                                                                                                                        } else {
                                                                                                                            echo 'block';
                                                                                                                        } ?>"><i
                                class="fas fa-sign-in-alt py-2 pr-3"></i>Đăng
                            nhập</span></a>

                </span>
                <div class="absolute top-0  mt-7 -ml-5  group-hover:block hidden  <?php
                                                                                    if (isset($_SESSION['user'])) {
                                                                                        echo 'inline';
                                                                                    } else {
                                                                                        echo 'group-hover:hidden';
                                                                                    } ?>">
                    <div class=""
                        style="border-bottom: 15px solid white; border-left: 80px solid transparent; border-right: 80px solid transparent; bottom: 10px;">
                    </div>
                    <ul>
                        <li class="bg-white pl-5 w-40 py-1 font-bold text-black hover:text-blue-500 "><a class=""
                                href="./changeinforuser.php?user=<?php echo $totals['username'] ?>">Quản lý
                                tài khoản</a></li>
                        <li class="bg-white pl-5 w-40 py-1 font-bold text-black hover:text-blue-500 ">
                            <?php
                            if ($totals['permission'] == 'admin') {
                                echo "<a href='./examples/information.php' id='admin'> Admin</a>";
                            }
                            ?>
                        </li>
                        <form method="POST">
                            <li class="bg-white pl-5 w-40 py-1 font-bold text-black hover:text-blue-500 "><input
                                    type="submit" name="Logout" value="Đăng xuất" id=""
                                    class="bg-white font-bold cursor-pointer"></li>
                        </form>

                    </ul>
                </div>
                <?php
                if (isset($_POST['Logout'])) {
                    unset($_SESSION['user']);
                    header("location:./index.php");
                }
                ?>
            </li>
            <li class="inline-block pr-5 <?php
                                            if (isset($_SESSION['user'])) {
                                                echo 'inline';
                                            } else {
                                                echo 'hidden';
                                            } ?>">
                <a href="success.php">
                    <span class="text-base text-white hover:text-yellow-500"><i
                            class="fas fa-cart-plus py-2 pr-3"></i>Tour
                        của bạn</span>
                </a>
            </li>
        </ul>
    </div>
</div>