<?php

require_once "core/init.php";

//valifasi register
if( isset($_POST['submit']) ){
    $nama = $_POST['username'];
    $pass = $_POST['password'];

    if(!empty( trim($nama) ) && !empty( trim($pass) )){
        //empty untuk cek sudah di isi atau belum
        //trim menghilangkan spasi 
        
        // cek username didatabase
        if( login_cek_nama($nama) ){

            // cek data ssesuai atau tidak
            if( cek_data($nama, $pass) ){
                $_SESSION['user'] = $nama;
                header('Location: index.php');
            }else{
                echo 'data ada yang salah';
            }

        }else{
            echo 'nama tidak terdaftar';
        }

    }else{
        echo 'tidak boleh kosong';
    }
}

require_once "view/header.php";

?>

<form action="login.php" method="post">

    <label for="">Nama</label><br>
    <input type="text" name="username"><br><br>

    <label for="">Password</label><br>
    <input type="password" name="password"><br><br>

    <input type="submit" name="submit" value="login">
</form>

<?php require_once "view/footer.php"; ?>