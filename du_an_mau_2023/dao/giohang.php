<?php

//insert vao table cart
function cart_insert($idpro, $price, $name, $img, $soluong, $thanhtien, $idbill)
{
    $sql = "INSERT INTO cart(idpro,price, name, img,soluong,thanhtien,idbill) VALUES (?, ?, ?,?, ?, ?,?)";
    pdo_execute($sql, $idpro, $price, $name, $img, $soluong, $thanhtien, $idbill);
}

function viewcart()
{
    $html_cart = '';
    $i = 1;
    
    foreach ($_SESSION['giohang'] as $sp) {
        extract($sp);
        $xoasp = "index.php?pg=viewcart&remove=" . $idpro;
        $tt = $price * $soluong;
        $html_cart .= '
        <tr>
        <td>' . $i . '</td>
        <td><img src="' . IMG_PATH_USER . $img . '" alt="" style="width: 100px;"></td>
        <td>' . $name . '</td>
        <td>' . number_format($price, 0, ',', '.') . ' VNĐ</td>
        <td>
            <div class="quantity">
                <button class="quantity-btn" data-action="decrease" data-id="' . $idpro . '">-</button>
                <span class="quantity-value">' . $soluong . '</span>
                <button class="quantity-btn" data-action="increase" data-id="' . $idpro . '">+</button>
            </div>
        </td>
        <td class="total-amount">' . number_format($tt, 0, ',', '.') . ' VNĐ</td>
        <td><a href="'.$xoasp.'">Xóa</a></td>
    </tr>
    ';
        $i++;
    }
    return $html_cart;
}


function get_tongdonhang()
{
    $tong = 0;

    foreach ($_SESSION['giohang'] as $sp) {
        extract($sp);
        $tt = $price * $soluong;
        $tong += $tt;
    }
    return $tong;
}
?>

