<?php
$gelen = file_get_contents("veri.txt");
$random = $_POST["veri"];
$count = file_get_contents("count.txt",true);
    if($random==$gelen)
    {
        //Bu alana yayınlamak istediğiniz yeri yazacaksınız.
        header("Location: http://localhost/sayi_tahmin_oyunu/sonuc.php");
    }
    else
    {
        $count++;
        file_put_contents("count.txt",$count);
        //Bu alana yayınlamak istediğiniz yeri yazacaksınız.
        header("Location: http://localhost/sayi_tahmin_oyunu/index2.html");
    }

?>