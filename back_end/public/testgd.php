<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Test Post</title>
    <script src="http://localhost/CNHD_DAGK/back_end/public/js/jquery-1.10.2.min.js"></script>
</head>
<body>
    
    	 <input  id= "token" type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        
</body>

</html>
<script>
	 $(document).ready(function() {
            var token = $('#token').val();
            console.log(token);
            $.ajax({
                type:"POST",
                url:"../back_end/ve-may-bay/danh-sach-hanh-khach",
                data:{

                    /****Dat cho 1 chieu****/
                    // thoigiandatcho: '<?php //echo date("Y-m-d H:i:s")?>',
                    // tongtien: '5000000',
                    // machuyenbay:'MH370',
                    // ngaydi:'2016-10-23',
                    // giobay:'09:00:00',
                    // hang:'Y',
                    // muc:'C',
                    // loai:'di',
                    // soghe:'5',
                    // noidi: 'Ha Noi',
                    // noiden:'Tp Ho Chi Minh',
                    // _token:token

                    /****Dat cho 2 chieu****/
                    // thoigiandatcho: '<?php //echo date("Y-m-d H:i:s")?>',
                    // tongtien: '5000000',
                    // machuyenbay:'MH370',
                    // ngaydi:'2016-10-23',
                    // giobay:'09:00:00',
                    // hang:'Y',
                    // muc:'C',
                    // loai:'di',
                    // soghe:'2',
                    // noidi: 'Ha Noi',
                    // noiden:'Tp Ho Chi Minh',
                    // machuyenbay2:'MH371',
                    // ngaydi2:'2016-10-23',
                    // giobay2:'09:00:00',
                    // hang2:'Y',
                    // muc2:'C',
                    // loai2:'ve',
                    // soghe2:'2',
                    // noidi2: 'Tp Ho Chi Minh',
                    // noiden2:'Ha Noi',
                    // _token:token

                    /****Them hanh khach****/
                    // songuoi: '2',
                    // madatcho:'G6OU2V',
                    // danhxung0:'mr',
                    // ho0:'tran',
                    // ten0:'a',
                    // danhxung1:'ms',
                    // ho1:'nguyen',
                    // ten1:'b',
                    // _token:token


                    /*** Cap nhat ma dat cho***/
                    // madatcho:'',
                    //  _token:token
                    // _token:token
                },
                success:function(response){
                    console.log(response);
                }
            });
        });

</script>