<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <style>
        .input{
  padding: 16px 32px;
  border: solid 1px black;
  margin: 4px 2px;
  width:200px;
        }
        .button{
            background-color: #55f169;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  font-size:40px;
        }
        .text{
            text-align: center;
            font-size: 35px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        .main{
            margin-top: 200px;
        }
    </style>

</head>
<body>
     <div class="main">
         <!---//Bu alana yayınlamak istediğiniz yeri yazacaksınız.--->
    <form action="http://localhost/sayi_tahmin_oyunu/" method="post">
    <p class="text">Tebrikler <?php $count = file_get_contents("count.txt",true); echo $count; ?>. Denemede buldunuz...</p><br>
    <div style="text-align:center;">
    <button type="submit" class="button">Tekrar Oyna</button>
    </div>
    </form>
    </div>
</body>
</html>