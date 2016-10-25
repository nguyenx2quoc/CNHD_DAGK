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
                url:"../back_end/ve-may-bay/ma-dat-cho1",
                data:{

                    /****Dat cho 1 chieu****/
                    // thoigiandatcho: '<?php echo date("Y-m-d H:i:s")?>',
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
                    // machuyenbay:'AH100',
                    // ngaydi:'2016-10-23',
                    // giobay:'09:00:00',
                    // hang:'Y',
                    // muc:'B',
                    // loai:'di',
                    // soghe:'2',
                    // noidi: 'Tp Ho Chi Minh',
                    // noiden:'Ha Noi',
                    // machuyenbay2:'AH333',
                    // ngaydi2:'2016-10-23',
                    // giobay2:'09:45:00',
                    // hang2:'C',
                    // muc2:'C',
                    // loai2:'ve',
                    // soghe2:'2',
                    // noidi2: 'Ha Noi',
                    // noiden2:'Tp Ho Chi Minh',
                    // _token:token

                    /****Them hanh khach****/
                    // islienlac: 'false',
                    // madatcho:'ABCXYZ',
                    // danhxung:'mr',
                    // ho:'tran',
                    // ten:'a',
                    // dienthoai:'01666473304',
                    // email1:'sdasdas',
                    // email2:'asdasdasdas',
                    // _token:token


                    /*** Cap nhat ma dat cho***/
                    // madatcho:'0DLDSU',
                    //  _token:token
                    // _token:token
                },
                success:function(response){
                    console.log(response);
                }
            });
        });

</script>