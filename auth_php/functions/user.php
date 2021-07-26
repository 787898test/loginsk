<?php 

// menambah data user baru
function register_user($nama, $pass){
    global $link;

    // mencegah sql injection
    $nama = mysqli_real_escape_string($link, $nama);
    $pass = mysqli_real_escape_string($link, $pass);

    $pass = password_hash($pass, PASSWORD_DEFAULT); // mengengkripsi password
    $query = "INSERT INTO users (username, password) VALUES ('$nama', '$pass')";

    if( mysqli_query($link, $query) ){
        return true;
    }else{
        return false;
    }
}

// mengecek username kembar
function register_cek_nama($nama){
    global $link;

    // mencegah sql injection
    $nama = mysqli_real_escape_string($link, $nama);

    $query = "SELECT * FROM users WHERE username = '$nama'"; 

    if( $result = mysqli_query($link, $query) ){
        if(mysqli_num_rows($result) == 0 ) return true;
        else return false;
    }
}

// menguji username di database untuk login
function login_cek_nama($nama){
    global $link;

    // mencegah sql injection
    $nama = mysqli_real_escape_string($link, $nama);

    $query = "SELECT * FROM users WHERE username = '$nama'"; 

    if( $result = mysqli_query($link, $query) ){
        if(mysqli_num_rows($result) != 0 ) return true;
        else return false;
    }
}

// untuk login
function cek_data($nama, $pass){
    global $link;

     // mencegah sql injection
     $nama = mysqli_real_escape_string($link, $nama);
     $pass = mysqli_real_escape_string($link, $pass);

     // mencari username & password
     $query  = "SELECT password FROM users WHERE username ='$nama'";
     $result = mysqli_query($link, $query);
     $hash   = mysqli_fetch_assoc($result)['password']; // menampilkan password

     if( password_verify($pass, $hash) ){
        return true;
     }else{
        return false;
     }
}

?>