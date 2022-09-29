<html>
    <head>

    </head>
    <body>
        <?php
            if(rand(0,1)==0){
                $a="m";
                $b="d";
            }else{
                $a="d";
                $b="m";
            }
            echo "<a href='./$a.php'><img src='./".rand(1,12).".jpg'/></a>"."<a href='./$b.php'><img src='./".rand(1,12).".jpg'/></a>";
        ?>
    </body>
</html>