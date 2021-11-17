<?php
include "./examples/local.php";
$code_voucher = $_POST['id'];
$young = $_POST['young'];
echo $elderly = $_POST['elderly'];
function checkCode($code)
{
    include "./examples/local.php";
    $sql = "select count(voucher_code) from voucher where voucher_code like '$code'";
    $data = $local->prepare($sql);
    $data->execute();
    return $data->fetchColumn();
}
$sqlsale = "select * from voucher where voucher_code like '$code_voucher'";
$showsale = $local->query($sqlsale)->fetch();
// $sumPP = $young + $elderly;
$saleV = $showsale['voucher_sale'];
$showsale['voucher_people'];
$code =  checkCode($code_voucher);
if (empty($young)) {
    $young = 0;
}
if (!empty($elderly)) {
    if (($young + $elderly) >= $showsale['voucher_people']) {
        if ($code != 0) {
            echo "<script>
            document.querySelector('#showVoucher').value='$code_voucher';
            document.querySelector('#sumP').value=$saleV;
            </script>";
        } else {
            echo '<span id="code" class="">0</span>';
        }
    } else {
        echo '<script> alert("Bạn không đủ điều kiện để sử dụng voucher này ")</script>';
    }
} else {
    echo '<script> alert("Nhập đủ thông tin trước khi chọn voucher! ")</script>';
}