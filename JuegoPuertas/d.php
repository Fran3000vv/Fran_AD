<html>
    <head>

    </head>
    <body>
        <?php 
            $rdom=rand(2,4);
            $rdom2=rand(1,$rdom);
            do{$rdom3 = rand(1,$rdom);}
            while($rdom3==$rdom2);
            for ($i = 0; $i <$rdom; $i++)if($rdom2-1==$i)echo "<a href='./t.php'><img src='./".rand(1,12).".jpg'/></a>";
            else if($rdom3-1==$i)echo "<a href='./i.php'><img src='./".rand(1,12).".jpg'/></a>";
            else echo "<a href='./m.php'><img src='./".rand(1,12).".jpg'/></a>";
        ?>
    </body>
</html>