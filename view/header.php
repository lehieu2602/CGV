<div class="login container">
    <?php
    if (isset($_SESSION['user']) && $_SESSION['user'] != '') {
        echo "<ul>
              <a style ='text-transform: none' class='dropdown-toggle noselect' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' >Xin chào <span class='userEmail'>" . $_SESSION['name'] . "</span></a>
                <div class='dropdown-menu noselect'aria-labelledby='dropdownMenuButton'style ='text-transform: none'>
                  <a class='dropdown-item'href='?controller=userInfo'style ='margin: 0'>Thông Tin Tài Khoản</a>
                  <a class='dropdown-item'href='?signout=true'style ='margin: 0'>Đăng Xuất</a>
                </div>
                  </ul>";
    } else {
        echo '<ul>
          <a href="?controller=login">đăng nhập/đăng ký</a>
      </ul>';
    }
    if (isset($_GET['signout'])) {
        $signout = $_GET['signout'];
    } else {
        $signout = '';
    }
    if ($signout == 'true') {
        session_destroy();
        header('location: index.php');
    }
    ?>
</div>

<div class="header">
    <div class="main container">
        <a class="header-logo" href="index.php">
            <img src="../img/cgvlogo.png" alt="" />
        </a>
        <ul class="header-menu">
            <li>
                PHIM
                <div class="menu-ul">
                    <ul>
                        <li><a href="?controller=listmovies">Phim Đang Chiếu</a></li>
                        <li><a href="?controller=commingsoon">Phim Sắp Chiếu</a></li>
                    </ul>
                </div>
            </li>
            <li>
                GIỚI THIỆU RẠP PHIM
                <div class="menu-ul">
                    <ul>
                        <li><a href="?controller=allTheater">Tất Cả Các Rạp</a></li>
                        <li><a href="?controller=specialTheater">Rạp Đặc Biệt</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="?controller=membership">THÀNH VIÊN</a></li>
        </ul>
        <a class="header-buy" href="?controller=listmovies">
            <img src="../img/mua-ve_ngay.png" alt="" />
        </a>
    </div>
    <table>
        <tr>
            <td onclick="toggleList('menuList', this)">
                <img src="../img/menu-icon.png" alt="" />
            </td>
            <td><a href="?controller=listnews"><img src="../img/icon_ticket25.png" alt="" /></a></td>
            <td onclick="toggleList('userList', this)">
                <img src="../img/user-icon.png" alt="" />
            </td>
        </tr>
    </table>
    <ul class="ul-res" id="menuList">
        <li class="has-submenu">PHIM
            <ul class="ul-level-1">
                <li><a href="?controller=listmovies">Phim Đang Chiếu</a></li>
                <li><a href="?controller=commingsoon">Phim Sắp Chiếu</a></li>
            </ul>
        </li>
        <li class="has-submenu">RẠP CGV
            <ul class="ul-level-1">
                <li><a href="?controller=allTheater">Tất Cả Các Rạp</a></li>
                <li><a href="?controller=specialTheater">Rạp Đặc Biệt</a></li>
            </ul>
        </li>
        <li id="menuList"><a href="?controller=membership">THÀNH VIÊN</a></li>
    </ul>

    <ul class="ul-res" id="userList">
        <?php
        if (isset($_SESSION['user']) && $_SESSION['user'] != '') {
            echo '<li id="menuList"><a href="?controller=userInfo">Tài Khoản</a></li>';
            echo '<li id="menuList"><a href="?signout=true">Đăng Xuất</a></li>';
        } else {
            echo '<li id="menuList"><a href="?controller=login">ĐĂNG NHẬP/ĐĂNG KÝ</a></li>';
        }
        ?>
    </ul>
</div>