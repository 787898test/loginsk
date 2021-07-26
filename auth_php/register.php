<?php

require_once "core/init.php";

//valifasi register
if( isset($_POST['submit']) ){
    $nama = $_POST['username'];
    $pass = $_POST['password'];

    if(!empty( trim($nama) ) && !empty( trim($pass) )){
        //empty untuk cek sudah di isi atau belum
        //trim menghilangkan spasi 
        
        // mengecek nama tidak boleh sama 
        if( register_cek_nama($nama) ){

            //memasukan data ke database
            if(register_user($nama, $pass) ){
                echo 'berhasil';
            }else{
                echo 'gagal daftar';
            }

        }else{
            echo 'nama sudah terdaftar';
        }

    }else{
        echo 'tidak boleh kosong';
    }
}

require_once "view/header.php";

?>

<form action="register.php" method="post">

    <label for="">Nama</label><br>
    <input type="text" name="username"><br><br>

    <label for="">Password</label><br>
    <input type="password" name="password"><br><br>

    <input type="submit" name="submit" value="daftar">
</form>

<?php require_once "view/footer.php"; ?>