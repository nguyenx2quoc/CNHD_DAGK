<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Laravel Ajax CRUD Example</title>
</head>
<body>
    <form action = "http://localhost/CNHD_DAGK/back_end/ban-ve-may-bay/phat-sinh-ma-dat-cho" method = "post">
    	 <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <input type = "submit" value = "test" />  
        <input type = "text" name = "ma_chuyen_bay_ve"/>  
     </form>
</body>
</html>