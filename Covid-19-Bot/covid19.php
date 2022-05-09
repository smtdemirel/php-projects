<?php
require_once('simple_html_dom.php');
?>
<!doctype html>
<html>
    <head>
        <style>
            .tablo{
                font-weight:bold;
                border:4px solid #0af3ff;
                border-collapse: collapse;
                height:100px;
                width:350px;
                padding:20;
                background-color:black;
                color:white;
                font-size:20px;
                font-family:helvetica;
            }
        </style>
</head>
    <body>

<?php

function baglan($input)
{
    $ch = curl_init($input);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
$url = "https://covid19.tubitak.gov.tr/";
//echo baglan($url);
 $html = new simple_html_dom();
$html->load(baglan($url));
$veri = $html->find(".number-wrapper");
$covid = [];
 foreach($veri as $ver)
{
        $covid = explode(" ",$ver->plaintext);
} 
$dead = substr($covid[1],8,-8);
$recovering = substr($covid[2],8,-12);
$sick = substr($covid[0],0,-5);
//echo "Toplam Vaka Sayısı: $sick"."<br />"."İyileşen Sayısı: $recovering"."<br />"."Ölüm Sayısı: $dead"; 
?>
<table class="tablo">
    <tr>
        <td>Tarih:</td>
        <td><?php echo date("d/m/Y"); ?></td>
    </tr>
    <tr>
        <td>Toplam Vaka Sayısı:</td>
        <td><?php echo $sick; ?></td>
    </tr>
    <tr>
        <td>İyileşen Sayısı: </td>
        <td><?php echo $recovering; ?></td>
    </tr>
    <tr>
        <td>Ölüm Sayısı: </td>
        <td><?php echo $dead; ?></td>
    </tr>
</table>


</body>
</html>