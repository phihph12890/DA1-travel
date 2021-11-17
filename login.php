<?php
// session_start();
ob_start();
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
            <form method="POST" class="px-40">
                <h1 class="text-center text-3xl">ĐĂNG NHẬP</h1>
                <div class="mt-4">
                    <span>Tên đăng nhập</span>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full" type="text" placeholder=""
                        id="users_name" name="users_name" required>
                </div>
                <!-- end user name -->
                <div class="mt-4">
                    <span>Mật khẩu</span>
                    <input class="my-1 px-2 py-1 border focus:outline-none block w-full" type="password" placeholder=""
                        id="pass" name="pass" required>
                </div>
                <div class="flex items-center pt-2">
                    <input type="checkbox" name="setuser">
                    <span class="px-2">Ghi nhớ mật khẩu</span>
                </div>
                <!-- end password -->
                <button
                    class="block w-full bg-blue-300 border rounded-lg mt-4 py-2 text-lg focus:outline-none hover:bg-white hover:border-blue-300"
                    name="btn_login">Đăng
                    nhập</button>
            </form>
            <?php
            include "./examples/local.php";
            if (isset($_POST['btn_login'])) {
                $username = $_POST['users_name'];
                $password = md5($_POST['pass']);
                // $setuer = $_POST['setuser'];
                // if (!empty($setuer)) {
                //     setcookie('users_name', $username, time() + 900);
                //     setcookie('pass', $password, time() + 900);
                // }

                function checkname($user, $password)
                {
                    include "./examples/local.php";
                    $sql = "select count(*) from user where username like '$user' and password like '$password'";
                    $data = $local->prepare($sql);
                    $data->execute();
                    return $data->fetchColumn();
                }
                $userr =  checkname($username, $password);
                if ($userr == 0) {
                    echo "<div class='text-red-600 text-center text-sm'>Tài khoản hoặc mật khẩu không chính xác</div>";
                } else {
                    $username = $_POST['users_name'];
                    $_SESSION['user'] = $username;
                    $sql = "select * from user where username = '$username'";
                    $total = $local->query($sql)->fetch();

                    if ($total['permission'] == "admin") {
                        header("location:./examples/information.php");
                    } else {
                        header("location:./index.php");
                    }
                }
            }

            ?>
            <div class="mt-4 flex justify-end px-40">
                <!-- <a class="hover:underline hover:text-blue-500 block" href="">Quên mật khẩu</a> -->
                <div class="">
                    <span class="inline-block ">Bạn chưa có tài khoản?</span>
                    <a class="hover:underline inline-block text-blue-500" href="registration.php">Đăng
                        ký</a>
                </div>
            </div>
        </section>
    </main>
    <footer class="background4 bg-opacity-10 mt-10">
        <?php require "footer.php"; ?>
    </footer>
</body>

</html>