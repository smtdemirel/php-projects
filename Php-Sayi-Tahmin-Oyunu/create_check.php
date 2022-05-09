<?php
$random = rand(1,15);
$count = 1;
file_put_contents("veri.txt",$random);
$gelen = $_POST['veri'];
    if($random==$gelen)
    {
        //Bu alana yayınlamak istediğiniz yeri yazacaksınız.
        header("Location: http://localhost/sayi_tahmin_oyunu/sonuc.php");
    }
    else
    {
        //Bu alana yayınlamak istediğiniz yeri yazacaksınız.
        header("Location: http://localhost/sayi_tahmin_oyunu/index2.html");
        $count++;
        file_put_contents("count.txt",$count);
    }




?>