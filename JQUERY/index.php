<?php // header.php
echo <<<_END
<!DOCTYPE html><head>
<title>JQuery</title>
<meta charset="utf-8"> <!-- кодировка utf-8 -->
<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script> <!-- подключение библиотеки JQuery -->
</head>

<script>
    $(document).keydown(function(e){
    if (e.keyCode > 36 && e.keyCode < 41) 
      switch (e.keyCode)
        {
            case 37:
                alert("Arrow left");
                break;
            case 38:
                alert("Arrow up");
                break;
            case 39:
                alert("Arrow right");
                break;
            case 40:
                alert("Arrow down");
                break;
        }         
    });
</script>
_END;
?>