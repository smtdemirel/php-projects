<?php
//0 ile 1 arasında random sayı oluşturma
function control()
{
    return (float)mt_rand()/(float)mt_getrandmax();
}
//Toplam iterasyon sayısı(n*n-1)/2
function counter($input)
{
    return (($input*($input-1))/2);
}
//r>p ise link atıyoruz
function random($array,$p,$n)
{
    $veriable1 = (int)rand(1,$n);
    $veriable2 = (int)rand(1,$n);
    $control = control();
    if($control>$p && $veriable1 !== $veriable2)
    {
         $array[$veriable1][$veriable2] = 1;
         $array[$veriable2][$veriable1] = 1;
         return $array;
    }
    else{
        return $array;
    }
}

$p = 0.01;//Belirledğimiz olasılık değeri
$n = 100;//Node Sayımız
$node = [];//Nodeları içinde tuttuğumuz dizi
$komsuluk = [];//Komsuluk değerlerini tuttuğumuz dizi
$sayac = counter($n);//Maksimum toplam link sayısı
$komsulukSayici = 0;//Komşulukları sayan geçici bir değer
$beklenenDeger = 0;//Beklenen değer
$komsulukToplamDeger = 0;//Test sonucu komşulukların toplam değeri
$komsulukOrtalamaDeger = 0;//Test sonucu komşulukların ortalama değeri
$standartSapmaToplam = 0;
$standartSapma;
$kacTane = [];

for($i=1;$i<=$n;$i++)
{
    $kacTane[$i] = 0;
}

//Öncelikle dizimizin her elemanına 0 değeri verdik
 for($i=1;$i<=$n;$i++)
{
    for($j=1;$j<=$n;$j++)
    {
        $node[$i][$j] = 0;
    }
} 

//Maksimum link değeri kadar testimizi çalıştırdık
for($i=1;$i<=$sayac;$i++)
{
$node = random($node, $p, $n);
}

//Her nodun toplam link sayısını ayrı ayrı hesaplayıp atadık
for($i=1;$i<=$n;$i++)
{
    for($j=1;$j<=$n;$j++)
    {
        $komsulukSayici += $node[$i][$j];
    }
    $komsuluk[$i] = $komsulukSayici;
    $komsulukSayici = 0;
} 

//Komşuluk ortalama değer hesaplıyoruz
for($i=1;$i<=$n;$i++)
{
    $komsulukToplamDeger += $komsuluk[$i];
}

$komsulukOrtalamaDeger = (float)((float)$komsulukToplamDeger/(float)$n);



//Standart sapma hesaplıyoruz
for($i=1;$i<=$n;$i++)
{
     $standartSapmaToplam += (float)(pow(($komsuluk[$i] - $komsulukOrtalamaDeger),2)/($n-1));
}

$standartSapma = sqrt($standartSapmaToplam);



//Hangi Elemanın hangi elemanla komşuluğu var 
echo "<pre>";
//print_r($node);
echo "<pre>";

//Elemanların toplam komşuluk sayıları
echo "<pre>";
//print_r($komsuluk);
echo "<pre>";


//Komşuluk sayıları genelleştirme. Örneğin x tane komşuluğu olan kaç tane node var
for($i=1;$i<=$n;$i++)
{
    for($j=1;$j<=$n;$j++)
    {
        if($komsuluk[$j]===$i)
        {
            $kacTane[$i]++;
        }
    }
} 


for($i=1;$i<=$n;$i++)
{
    if($kacTane[$i]!==0)
    {
        echo "$i tane komşuluğu olan node sayısı: $kacTane[$i]"."<br />";
    }
    
}


echo "Standart Sapma: ".$standartSapma."<br />";
echo "Ortalama Deger: ".$komsulukOrtalamaDeger;



?>