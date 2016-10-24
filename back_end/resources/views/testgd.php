<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Laravel Ajax CRUD Example</title>
</head>
<body>
    <form action = "http://localhost/CNHD_DAGK/back_end/ban-ve-may-bay/hoan-tat-dat-cho" method = "post">
    	 <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <input type = "submit" value = "test" />  
        <input type = "text" name = "data"/>  
     </form>
</body>
</html>