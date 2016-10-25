/**
 * Created by QUOC on 10/25/2016.
 */

$.ajax({
    type: 'GET',
    url: '../back_end/ve-may-bay/san-bay',
    data: '',
    dataType: 'json',
    success: function (data) {
        var Huyen = '<datalist id="html">';
        for (var i = 0; i < data.Sb.length; i++) {
            for (var j = 0; j < data.Sb[i].sanbay.length; j++) {
                Huyen = Huyen + '<option  value="' + data.Sb[i].sanbay[j].ten + '">' + '</option>';
            }
        }
        Huyen = Huyen + '</datalist>';
        $('#inputTu').html(Huyen);
    } // Success Function
});



$(document).ready(function () {
    var x = $('#inputNguoiLon').val();
    var y = $('#inputTreem').val();
    var soluongnguoi = parseInt(x) + parseInt(y);

    /*Ẩn hiện ngày về đối với 1 chiều và khứ hồi*/
    $('#inputkhuhoi').click(function () {
        $('#inputNgayve').removeClass('hidden');
        $('#lbnv').removeClass('hidden');
    });
    $('#input1chieu').click(function () {
        $('#inputNgayve').addClass('hidden');
        $('#lbnv').addClass('hidden');

    });

    /*Xử lý sự kiện thay click input nơi đi*/
    $("#inputTu").click(function(){
        $.ajax({
            type: 'GET',
            url: '../back_end/ve-may-bay/san-bay',
            data: '',
            dataType: 'json',
            success: function (data) {
                if(data != null)
                {
                    var Huyen = '<datalist id="html">';
                    for (var i = 0; i < data.Sb.length; i++) {
                        for (var j = 0; j < data.Sb[i].sanbay.length; j++) {
                            Huyen = Huyen + '<option  value="' + data.Sb[i].sanbay[j].ten 
                                
                                + '">' + '</option>';
                        }
                    }
                    Huyen = Huyen + '</datalist>';
                    $('#inputTu').html(Huyen);
                }
                else {
                    var Huyen = ''
                }
            } // Success Function
        });
    });

    /*Xử lý sự kiện thay đổi input nơi đi thì nơi đến cũng thay đổi*/
    $("#inputDen").click(function(){
        var x = $('#inputTu').val();
        
        $.ajax({
            type: 'GET',
            url: '../back_end/ve-may-bay/san-bay?san-bay-di='+x,/* ?san-bay-di=TP Ho Chi Minh*/
            data: '',
            dataType: 'json',
            success: function (data) {
                var Huyen = '<datalist id="html1">';
                for (var i = 0; i < data.Sb.length; i++) {
                    for (var j = 0; j < data.Sb[i].sanbay.length; j++) {
                        Huyen = Huyen + '<option  value="' + data.Sb[i].sanbay[j].ten +
                            '">' + '</option>';
                    }
                }
                Huyen = Huyen + '</datalist>';
                $('#inputDen').html(Huyen);
            } // Success Function
        });
    });

    /*Xử lý button Tìm chuyến bay*/
    $('#BtTimCB').click(function () {

        if(Validate() === false){
            return;
        }
        else {
            /*Xử lý khứ hồi*/
            if($('#inputkhuhoi').is(':checked')){
                var x = $('#inputNguoiLon').val();
                var y = $('#inputTreem').val();
                var soluongnguoi = parseInt(x) + parseInt(y);
                $('#slhk').html(soluongnguoi);

                ValidateNV();
                var Huyen ='';
                $.ajax({
                    type: 'GET',
                    url: '2chieu.json',
                    data: '',
                    dataType: 'json',
                    success: function (data) {
                        Huyen = '<tdbody id="cc">';
                        var Huyen1 = '<table class="table table-striped table-hover" id="cc1">  <thead>'+
                            '<tr class="info">'+
                            '<th>Mã</th>'+
                            '<th>Nơi đi</th>'+
                            '<th>Nơi đến</th>'+
                            '<th>Ngày</th>'+
                            '<th>Giờ</th>'+
                            '<th>Thương Gia A</th>'+
                            '<th>Thương Gia B</th>'+
                            '<th>Thương Gia c</th>'+
                            '<th>Phổ Thông A</th>'+
                            '<th>Phổ Thông B</th>'+
                            '<th>Phổ Thông C</th>'+
                            '</tr>'+
                            '</thead> <tdbody id="ccc1">';
                        for (var i = 0; i < data.trave[0].chieudi.length; i++) {
                            Huyen = Huyen +'<tr><td>';
                            Huyen = Huyen + data.trave[0].chieudi[i].ma + '</td><td>';
                            Huyen = Huyen + data.trave[0].chieudi[i].noidi + '</td><td>';
                            Huyen = Huyen + data.trave[0].chieudi[i].noiden + '</td><td>';
                            Huyen = Huyen + data.trave[0].chieudi[i].ngaydi + '</td><td>';
                            Huyen = Huyen + data.trave[0].chieudi[i].gio + '</td>';
                            var vitriYA = -1;
                            var vitriYB = -1;
                            var vitriYC = -1;
                            var vitriCA = -1;
                            var vitriCB = -1;
                            var vitriCC = -1;
                            for(var j = 0 ; j < data.trave[0].chieudi[i].ve.length; j++){
                                if(data.trave[0].chieudi[i].ve[j].hang === "C" && data.trave[0].chieudi[i].ve[j].muc === "A")
                                {
                                    vitriYA = j;
                                }
                                if(data.trave[0].chieudi[i].ve[j].hang === "C" && data.trave[0].chieudi[i].ve[j].muc === "B")
                                {
                                    vitriYB = j;
                                }
                                if(data.trave[0].chieudi[i].ve[j].hang === "C" && data.trave[0].chieudi[i].ve[j].muc === "C")
                                {
                                    vitriYC = j;
                                }
                                if(data.trave[0].chieudi[i].ve[j].hang === "Y" && data.trave[0].chieudi[i].ve[j].muc === "A")
                                {
                                    vitriCA = j;
                                }
                                if(data.trave[0].chieudi[i].ve[j].hang === "Y" && data.trave[0].chieudi[i].ve[j].muc === "B")
                                {
                                    vitriCB = j;
                                }
                                if(data.trave[0].chieudi[i].ve[j].hang === "Y" && data.trave[0].chieudi[i].ve[j].muc === "C")
                                {
                                    vitriCC = j;
                                }
                            }
                            /*Tạo ô cho vé hạng Y mức A*/
                            if( vitriYA != -1){
                                Huyen = Huyen + '<td>';
                                Huyen = Huyen + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 0 + '" value=" ' + data.trave[0].chieudi[i].ve[vitriYA].gia + '">' +
                                    data.trave[0].chieudi[i].ve[vitriYA].gia + '</td>';
                            }else {
                                Huyen = Huyen + '<td> </td>';
                            }
                            /*Tạo ô cho vé hạng Y mức B*/
                            if( vitriYB != -1){
                                Huyen = Huyen + '<td>';
                                Huyen = Huyen + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 1 + '" value=" ' + data.trave[0].chieudi[i].ve[vitriYB].gia + '">' +
                                    data.trave[0].chieudi[i].ve[vitriYB].gia + '</td>';
                            }else {
                                Huyen = Huyen + '<td> </td>';
                            }
                            /*Tạo ô cho vé hạng Y mức C*/
                            if( vitriYC != -1){
                                Huyen = Huyen + '<td>';
                                Huyen = Huyen + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 2 + '" value=" ' + data.trave[0].chieudi[i].ve[vitriYC].gia + '">' +
                                    data.trave[0].chieudi[i].ve[vitriYC].gia + '</td>';
                            }else {
                                Huyen = Huyen + '<td> </td>';
                            }
                            /*Tạo ô cho vé hạng C mức A*/
                            if(vitriCA != -1){
                                Huyen = Huyen + '<td>';
                                Huyen = Huyen + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 3 + '" value=" ' + data.trave[0].chieudi[i].ve[vitriCA].gia + '">' +
                                    data.trave[0].chieudi[i].ve[vitriCA].gia + '</td>';
                            }else {
                                Huyen = Huyen + '<td> </td>';
                            }
                            /*Tạo ô cho vé hạng C mức B*/
                            if(vitriCB != -1){
                                Huyen = Huyen + '<td>';
                                Huyen = Huyen + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 4 + '" value=" ' + data.trave[0].chieudi[i].ve[vitriCB].gia + '">' +
                                    data.trave[0].chieudi[i].ve[vitriCB].gia + '</td>';
                            }else {
                                Huyen = Huyen + '<td> </td>';
                            }
                            /*Tạo ô cho vé hạng C mức C*/
                            if(vitriCC != -1){
                                Huyen = Huyen + '<td>';
                                Huyen = Huyen + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 5 + '" value=" ' + data.trave[0].chieudi[i].ve[vitriCC].gia + '">' +
                                    data.trave[0].chieudi[i].ve[vitriCC].gia + '</td>';
                            }else {
                                Huyen = Huyen + '<td> </td>';
                            }
                        }
                        Huyen = Huyen + '</tdbody>';
                        $('#cc').html(Huyen)

                        for (var i = 0; i < data.trave[1].chieuve.length; i++) {
                            Huyen1 = Huyen1 + '<tr><td>';
                            Huyen1 = Huyen1 + data.trave[1].chieuve[i].ma + '</td><td>';
                            Huyen1 = Huyen1 + data.trave[1].chieuve[i].noidi + '</td><td>';
                            Huyen1 = Huyen1 + data.trave[1].chieuve[i].noiden + '</td><td>';
                            Huyen1 = Huyen1 + data.trave[1].chieuve[i].ngaydi + '</td><td>';
                            Huyen1 = Huyen1 + data.trave[1].chieuve[i].gio + '</td>';
                            var vitriYA = -1;
                            var vitriYB = -1;
                            var vitriYC = -1;
                            var vitriCA = -1;
                            var vitriCB = -1;
                            var vitriCC = -1;
                            for (var j = 0; j < data.trave[1].chieuve[i].ve.length; j++) {
                                if (data.trave[1].chieuve[i].ve[j].hang === "C" && data.trave[1].chieuve[i].ve[j].muc === "A") {
                                    vitriYA = j;
                                }
                                if (data.trave[1].chieuve[i].ve[j].hang === "C" && data.trave[1].chieuve[i].ve[j].muc === "B") {
                                    vitriYB = j;
                                }
                                if (data.trave[1].chieuve[i].ve[j].hang === "C" && data.trave[1].chieuve[i].ve[j].muc === "C") {
                                    vitriYC = j;
                                }
                                if (data.trave[1].chieuve[i].ve[j].hang === "Y" && data.trave[1].chieuve[i].ve[j].muc === "A") {
                                    vitriCA = j;
                                }
                                if (data.trave[1].chieuve[i].ve[j].hang === "Y" && data.trave[1].chieuve[i].ve[j].muc === "B") {
                                    vitriCB = j;
                                }
                                if (data.trave[1].chieuve[i].ve[j].hang === "Y" && data.trave[1].chieuve[i].ve[j].muc === "C") {
                                    vitriCC = j;
                                }
                            }
                            /*Tạo ô cho vé hạng Y mức A*/
                            if (vitriYA != -1) {
                                Huyen1 = Huyen1 + '<td>';
                                Huyen1 = Huyen1 + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 6 + '" value=" ' + data.trave[1].chieuve[i].ve[vitriYA].gia + '">' +
                                    data.trave[1].chieuve[i].ve[vitriYA].gia + '</td>';
                            } else {
                                Huyen1 = Huyen1 + '<td> </td>';
                            }
                            /*Tạo ô cho vé hạng Y mức B*/
                            if (vitriYB != -1) {
                                Huyen1 = Huyen1 + '<td>';
                                Huyen1 = Huyen1 + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 7 + '" value=" ' + data.trave[1].chieuve[i].ve[vitriYB].gia + '">' +
                                    data.trave[1].chieuve[i].ve[vitriYB].gia + '</td>';
                            } else {
                                Huyen1 = Huyen1 + '<td> </td>';
                            }
                            /*Tạo ô cho vé hạng Y mức C*/
                            if (vitriYC != -1) {
                                Huyen1 = Huyen1 + '<td>';
                                Huyen1 = Huyen1 + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 8 + '" value=" ' + data.trave[1].chieuve[i].ve[vitriYC].gia + '">' +
                                    data.trave[1].chieuve[i].ve[vitriYC].gia + '</td>';
                            } else {
                                Huyen1 = Huyen1 + '<td> </td>';
                            }
                            /*Tạo ô cho vé hạng C mức A*/
                            if (vitriCA != -1) {
                                Huyen1 = Huyen1 + '<td>';
                                Huyen1 = Huyen1 + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 9 + '" value=" ' + data.trave[1].chieuve[i].ve[vitriCA].gia + '">' +
                                    data.trave[1].chieuve[i].ve[vitriCA].gia + '</td>';
                            } else {
                                Huyen1 = Huyen1 + '<td> </td>';
                            }
                            /*Tạo ô cho vé hạng C mức B*/
                            if (vitriCB != -1) {
                                Huyen1 = Huyen1 + '<td>';
                                Huyen1 = Huyen1 + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 10 + '" value=" ' + data.trave[1].chieuve[i].ve[vitriCB].gia + '">' +
                                    data.trave[1].chieuve[i].ve[vitriCB].gia + '</td>';
                            } else {
                                Huyen1 = Huyen1 + '<td> </td>';
                            }
                            /*Tạo ô cho vé hạng C mức C*/
                            if (vitriCC != -1) {
                                Huyen1 = Huyen1 + '<td>';
                                Huyen1 = Huyen1 + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 11 + '" value=" ' + data.trave[1].chieuve[i].ve[vitriCC].gia + '">' +
                                    data.trave[1].chieuve[i].ve[vitriCC].gia + '</td>';
                            } else {
                                Huyen1 = Huyen1 + '<td> </td>';
                            }
                        }
                        Huyen1 = Huyen1 + '</tdbody></table>';
                        $('#cc1').html(Huyen1)
                    } // Success Function

                });

                Huyen = '';
                for(var i =0; i < soluongnguoi; i++){
                    Huyen = Huyen + '<div class="form-group" id="tthk'+ i +'"> <div class="col-sm-2"> <div>Danh xưng:</div>' +
                        ' <div class="row">  <select name="DanhXung" class="form-control input-sm dropdown" id="danhxung'+i +'">  <option>Ông</option>'+
                        '<option>Bà</option> </select> </div> </div> <div class="col-sm-1"></div> <div class="col-sm-4">' +
                        '<div class="row">Đệm và tên:</div>  <div class="row"> <input type="text" class="form-control input-sm" id="demten'+ i +'">' +
                        '</div> </div> <div class="col-sm-1"></div> <div class="col-sm-4"> <div class="row">Họ:</div>'+
                        '<div class="row"> <input type="text" class="form-control input-sm" id="ho'+ i +'"> </div> </div> </div>';
                }
                $('#tthk').html(Huyen);
                $("#FormChonCB").removeClass('hidden');
                $("#FormChonCB2").removeClass('hidden');
                $("#BtTieptuc1").removeClass('hidden');
                $("#FormDatVe").addClass('hidden');
                Huyen ='';
            }
            /*Xử lý 1 chiều*/
            if($('#input1chieu').is(':checked')){

                var x = $('#inputNguoiLon').val();
                var y = $('#inputTreem').val();
                var soluongnguoi = parseInt(x) + parseInt(y);
                var c = $('#inputNgaydi').val();
                var Huyen ='';
                $.ajax({
                    type: 'GET',
                    url: '../back_end/ve-may-bay/danh-sach-chuyen-bay?san-bay-di='+ $('#inputTu').val() 
                    +'&san-bay-den=' 
                    + $('#inputDen').val() + '&ngay-di=' + c + '&so-ghe=' + soluongnguoi,
                    data: '',
                    dataType: 'json',
                    success: function (data) {
                        var Huyen = '<tdbody id="cc">';
                        var Huyen1 = '<table class="table table-striped table-hover" id="cc1">  <thead>'+
                            '<tr class="info">'+
                            '<th>Mã</th>'+
                            '<th>Nơi đi</th>'+
                            '<th>Nơi đến</th>'+
                            '<th>Ngày</th>'+
                            '<th>Giờ</th>'+
                            '<th>Thương Gia A</th>'+
                            '<th>Thương Gia B</th>'+
                            '<th>Thương Gia c</th>'+
                            '<th>Phổ Thông A</th>'+
                            '<th>Phổ Thông B</th>'+
                            '<th>Phổ Thông C</th>'+
                            '</tr>'+
                            '</thead> <tdbody id="ccc1">';
                        for (var i = 0; i < data.trave.length; i++) {
                            Huyen = Huyen +'<tr><td>';
                            Huyen = Huyen + data.trave[i].ma + '</td><td>';
                            Huyen = Huyen + data.trave[i].noidi + '</td><td>';
                            Huyen = Huyen + data.trave[i].noiden + '</td><td>';
                            Huyen = Huyen + data.trave[i].ngaydi + '</td><td>';
                            Huyen = Huyen + data.trave[i].gio + '</td>';
                            var vitriYA = -1;
                            var vitriYB = -1;
                            var vitriYC = -1;
                            var vitriCA = -1;
                            var vitriCB = -1;
                            var vitriCC = -1;
                            for(var j = 0 ; j < data.trave[i].ve.length; j++){
                                if(data.trave[i].ve[j].hang === "C" && data.trave[i].ve[j].muc === "A")
                                {
                                    vitriYA = j;
                                }

                                if(data.trave[i].ve[j].hang === "C" && data.trave[i].ve[j].muc === "B")
                                {
                                    vitriYB = j;
                                }

                                if(data.trave[i].ve[j].hang === "C" && data.trave[i].ve[j].muc === "C")
                                {
                                    vitriYC = j;
                                }
                                if(data.trave[i].ve[j].hang === "Y" && data.trave[i].ve[j].muc === "A")
                                {
                                    vitriCA = j;
                                }
                                if(data.trave[i].ve[j].hang === "Y" && data.trave[i].ve[j].muc === "B")
                                {
                                    vitriCB = j;
                                }
                                if(data.trave[i].ve[j].hang === "Y" && data.trave[i].ve[j].muc === "C")
                                {
                                    vitriCC = j;
                                }
                            }

                            if( vitriYA != -1){
                                Huyen = Huyen + '<td>';
                                Huyen = Huyen + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 0 + '" value=" ' + data.trave[i].ve[vitriYA].gia + '">' +
                                    data.trave[i].ve[vitriYA].gia + '</td>';
                            }else {
                                Huyen = Huyen + '<td> </td>';
                            }


                            if( vitriYB != -1){
                                Huyen = Huyen + '<td>';
                                Huyen = Huyen + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 1 + '" value=" ' + data.trave[i].ve[vitriYB].gia + '">' +
                                    data.trave[i].ve[vitriYB].gia + '</td>';
                            }else {
                                Huyen = Huyen + '<td> </td>';
                            }


                            if( vitriYC != -1){
                                Huyen = Huyen + '<td>';
                                Huyen = Huyen + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 2 + '" value=" ' + data.trave[i].ve[vitriYC].gia + '">' +
                                    data.trave[i].ve[vitriYC].gia + '</td>';
                            }else {
                                Huyen = Huyen + '<td> </td>';
                            }


                            if(vitriCA != -1){
                                Huyen = Huyen + '<td>';
                                Huyen = Huyen + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 3 + '" value=" ' + data.trave[i].ve[vitriCA].gia + '">' +
                                    data.trave[i].ve[vitriCA].gia + '</td>';
                            }else {
                                Huyen = Huyen + '<td> </td>';
                            }


                            if(vitriCB != -1){
                                Huyen = Huyen + '<td>';
                                Huyen = Huyen + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 4 + '" value=" ' + data.trave[i].ve[vitriCB].gia + '">' +
                                    data.trave[i].ve[vitriCB].gia + '</td>';
                            }else {
                                Huyen = Huyen + '<td> </td>';
                            }


                            if(vitriCC != -1){
                                Huyen = Huyen + '<td>';
                                Huyen = Huyen + '<input type="radio" name="optionsRadios" ' +
                                    'id="optionsRadios' + 5 + '" value=" ' + data.trave[i].ve[vitriCC].gia + '">' +
                                    data.trave[i].ve[vitriCC].gia + '</td>';
                            }else {
                                Huyen = Huyen + '<td> </td>';
                            }


                            $('#cc').html(Huyen);
                        }
                    }
                });
                Huyen = '';
                for(var i =0; i < soluongnguoi; i++){

                        Huyen = Huyen + '<div class="form-group" id="tthk'+ i +'"> <div class="col-sm-2"> <div>Danh xưng:</div>' +
                            ' <div class="row">  <select name="DanhXung" class="form-control input-sm dropdown" id="danhxung'+i +'">  <option>Ông</option>'+
                            '<option>Bà</option> </select> </div> </div> <div class="col-sm-1"></div> <div class="col-sm-4">' +
                            '<div class="row">Đệm và tên:</div>  <div class="row"> <input type="text" class="form-control input-sm" id="demten'+ i +'">' +
                            '</div> </div> <div class="col-sm-1"></div> <div class="col-sm-4"> <div class="row">Họ:</div>'+
                            '<div class="row"> <input type="text" class="form-control input-sm" id="ho'+ i +'"> </div> </div> </div>';
                    }
                $('#tthk').html(Huyen);
                Huyen ='';
                $("#FormChonCB").removeClass('hidden');
                $("#FormChonCB2").removeClass('hidden');
                $("#BtTieptuc1").removeClass('hidden');
                $("#FormDatVe").addClass('hidden');
            }

        }
    });
    /* Kết thúc xử lý button Tìm chuyến bay*/

    $("#BtTieptuc1").click(function(){
        $("#FormTTKH").removeClass('hidden');
        $("#FormChonCB").addClass('hidden');
        $("#FormChonCB2").addClass('hidden');
        $("#BtTieptuc1").addClass('hidden');
        var token = $('#token').val();
        console.log(token);
        var x = $('#inputNguoiLon').val();
        var y = $('#inputTreem').val();
        var soluongnguoi = parseInt(x) + parseInt(y);
        var c = $('#inputNgaydi').val();
        var ma = '';
        var khoihanh = '';
        var di = '';
        var den = '';
        var gio = '';
        var gia = '';
        var hangve = '';
        var mucve = '';
        if($('#optionsRadios0').is(':checked'))
        {
            ma = $(this).parents('tr').find('td:eq(0)').html();
            khoihanh = $(this).parents('tr').find('td:eq(1)').html();
            den = $(this).parents('tr').find('td:eq(2)').html();
            di = $(this).parents('tr').find('td:eq(3)').html();
            gio = $(this).parents('tr').find('td:eq(4)').html();
            gia = $('#optionsRadios0').val();
            hangve = "C";
            mucve = "A";
        }
        if($('#optionsRadios1').is(':checked'))
        {
            ma = $(this).parents('tr').find('td:eq(0)').html();
            khoihanh = $(this).parents('tr').find('td:eq(1)').html();
            den = $(this).parents('tr').find('td:eq(2)').html();
            di = $(this).parents('tr').find('td:eq(3)').html();
            gio = $(this).parents('tr').find('td:eq(4)').html();
            gia = $('#optionsRadios0').val();
            hangve = "C";
            mucve = "B";
        }
        if($('#optionsRadios2').is(':checked'))
        {
            ma = $(this).parents('tr').find('td:eq(0)').html();
            khoihanh = $(this).parents('tr').find('td:eq(1)').html();
            den = $(this).parents('tr').find('td:eq(2)').html();
            di = $(this).parents('tr').find('td:eq(3)').html();
            gio = $(this).parents('tr').find('td:eq(4)').html();
            gia = $('#optionsRadios0').val();
            hangve = "C";
            mucve = "C";
        }
        if($('#optionsRadios3').is(':checked'))
        {
            ma = $(this).parents('tr').find('td:eq(0)').html();
            khoihanh = $(this).parents('tr').find('td:eq(1)').html();
            den = $(this).parents('tr').find('td:eq(2)').html();
            di = $(this).parents('tr').find('td:eq(3)').html();
            gio = $(this).parents('tr').find('td:eq(4)').html();
            gia = $('#optionsRadios0').val();
            hangve = "Y";
            mucve = "A";
        }
        if($('#optionsRadios4').is(':checked'))
        {
            ma = $(this).parents('tr').find('td:eq(0)').html();
            khoihanh = $(this).parents('tr').find('td:eq(1)').html();
            den = $(this).parents('tr').find('td:eq(2)').html();
            di = $(this).parents('tr').find('td:eq(3)').html();
            gio = $(this).parents('tr').find('td:eq(4)').html();
            gia = $('#optionsRadios0').val();
            hangve = "Y";
            mucve = "B";
        }
        if($('#optionsRadios5').is(':checked'))
        {
            ma = $(this).parents('tr').find('td:eq(0)').html();
            khoihanh = $(this).parents('tr').find('td:eq(1)').html();
            den = $(this).parents('tr').find('td:eq(2)').html();
            di = $(this).parents('tr').find('td:eq(3)').html();
            gio = $(this).parents('tr').find('td:eq(4)').html();
            gia = $('#optionsRadios0').val();
            hangve = "Y";
            mucve = "C";
        }
        var tong = parseInt(gia)*parseInt(soluongnguoi);
        console.log(tong);
        $.ajax({
            url:"../back_end/ve-may-bay/ma-dat-cho1",
            type:"POST",
            data: {
                   /****Dat cho 1 chieu****/
                    thoigiandatcho: new Date(),
                    tongtien: tong,
                    machuyenbay: ma,
                    ngaydi: di,
                    giobay: gio,
                    hang: hangve,
                    muc:mucve,
                    loai:'di',
                    soghe: soluongnguoi,
                    noidi: khoihanh,
                    noiden:den,
            },
        });
    });
});




/*Hàm validate các đầu vào đơn giản*/
function Validate() {
    if(document.getElementById('inputDen').value == "" || document.getElementById('inputNgaydi').value == ""
        || document.getElementById('inputTu').value == "" || document.getElementById("inputNguoiLon").value == ""
        || document.getElementById("inputTreem").value == "" || document.getElementById("inputEmbe").value == "") {
        alert( "Vui lòng điền đầy đủ thông tin!" );
        return false;
    }
    if (document.getElementById("inputNguoiLon").value < 1){
        alert("Số lượng người phải lớn hơn 0!");
        document.myForm.Nguoilon.focus() ;
        return false;
    }
    if (document.getElementById("inputTreem").value < 0){
        alert("Số lượng trẻ em không âm!");
        document.myForm.Treem.focus() ;
        return false;
    }
    if (document.getElementById("inputEmbe").value < 0 ){
        alert("Số lượng em bé không âm!");
        document.myForm.Embe.focus() ;
        return false;
    }
    return true;

}
function ValidateNV() {
    if(document.getElementById('inputNgayve').value == "") {
        alert( "Vui lòng nhập ngày về!" );
        document.myForm.Ngayve.focus() ;
        return false;
    }
}
/*Kết thúc hàm validate các đầu vào đơn giản*/



/*Xử lý radio trên bảng chọn vé*/
$( "body" ).on( "click","#optionsRadios0", function() {

    var Huyen = '<div class="list-group-item" id="chieudi"> <div>Chiều đi</div> <div>';
    var Thongtin = '<div class="list-group-item" id="chieudi"> <div>Thông tin</div> <div>';
    Huyen = Huyen + 'Chuyến bay:  ' + $(this).parents('tr').find('td:eq(0)').html() + '</div> <div>' ;
    Huyen = Huyen + 'Khởi hành:  ' + $(this).parents('tr').find('td:eq(1)').html() + '</div> <div>';
    Huyen = Huyen + 'Nơi đến:  ' + $(this).parents('tr').find('td:eq(2)').html() + '</div> <div>';
    Huyen = Huyen + 'Ngày đi:  ' + $(this).parents('tr').find('td:eq(3)').html() + '</div> <div>';
    Huyen = Huyen + 'Giờ:  ' + $(this).parents('tr').find('td:eq(4)').html() + '</div> <div>';
    var a = document.getElementById("optionsRadios0").value;
    Huyen = Huyen + 'Giá vé:  ' + a + '</div> </div>';
    $('#chieudi').html(Huyen);


});

$( "body" ).on( "click","#optionsRadios1", function() {
    var Huyen = '<div class="list-group-item" id="chieudi"> <div>Chiều đi</div> <div>';
    Huyen = Huyen + 'Chuyến bay:  ' + $(this).parents('tr').find('td:eq(0)').html() + '</div> <div>' ;
    Huyen = Huyen + 'Khởi hành:  ' + $(this).parents('tr').find('td:eq(1)').html() + '</div> <div>';
    Huyen = Huyen + 'Nơi đến:  ' + $(this).parents('tr').find('td:eq(2)').html() + '</div> <div>';
    Huyen = Huyen + 'Ngày đi:  ' + $(this).parents('tr').find('td:eq(3)').html() + '</div> <div>';
    Huyen = Huyen + 'Giờ:  ' + $(this).parents('tr').find('td:eq(4)').html() + '</div> <div>';
    var a = document.getElementById("optionsRadios1").value;
    Huyen = Huyen + 'Giá vé:  ' + a + '</div> </div>';
    $('#chieudi').html(Huyen);
});

$( "body" ).on( "click","#optionsRadios2", function() {
    var Huyen = '<div class="list-group-item" id="chieudi"> <div>Chiều đi</div> <div>';
    Huyen = Huyen + 'Chuyến bay:  ' + $(this).parents('tr').find('td:eq(0)').html() + '</div> <div>' ;
    Huyen = Huyen + 'Khởi hành:  ' + $(this).parents('tr').find('td:eq(1)').html() + '</div> <div>';
    Huyen = Huyen + 'Nơi đến:  ' + $(this).parents('tr').find('td:eq(2)').html() + '</div> <div>';
    Huyen = Huyen + 'Ngày đi:  ' + $(this).parents('tr').find('td:eq(3)').html() + '</div> <div>';
    Huyen = Huyen + 'Giờ:  ' + $(this).parents('tr').find('td:eq(4)').html() + '</div> <div>';
    var a = document.getElementById("optionsRadios2").value;
    Huyen = Huyen + 'Giá vé:  ' + a + '</div> </div>';
    $('#chieudi').html(Huyen);
});

$( "body" ).on( "click","#optionsRadios3", function() {
    var Huyen = '<div class="list-group-item" id="chieudi"> <div>Chiều đi</div> <div>';
    Huyen = Huyen + 'Chuyến bay:  ' + $(this).parents('tr').find('td:eq(0)').html() + '</div> <div>' ;
    Huyen = Huyen + 'Khởi hành:  ' + $(this).parents('tr').find('td:eq(1)').html() + '</div> <div>';
    Huyen = Huyen + 'Nơi đến:  ' + $(this).parents('tr').find('td:eq(2)').html() + '</div> <div>';
    Huyen = Huyen + 'Ngày đi:  ' + $(this).parents('tr').find('td:eq(3)').html() + '</div> <div>';
    Huyen = Huyen + 'Giờ:  ' + $(this).parents('tr').find('td:eq(4)').html() + '</div> <div>';
    var a = document.getElementById("optionsRadios3").value;
    Huyen = Huyen + 'Giá vé:  ' + a + '</div> </div>';
    $('#chieudi').html(Huyen);
});

$( "body" ).on( "click","#optionsRadios4", function() {
    var Huyen = '<div class="list-group-item" id="chieudi"> <div>Chiều đi</div> <div>';
    Huyen = Huyen + 'Chuyến bay:  ' + $(this).parents('tr').find('td:eq(0)').html() + '</div> <div>' ;
    Huyen = Huyen + 'Khởi hành:  ' + $(this).parents('tr').find('td:eq(1)').html() + '</div> <div>';
    Huyen = Huyen + 'Nơi đến:  ' + $(this).parents('tr').find('td:eq(2)').html() + '</div> <div>';
    Huyen = Huyen + 'Ngày đi:  ' + $(this).parents('tr').find('td:eq(3)').html() + '</div> <div>';
    Huyen = Huyen + 'Giờ:  ' + $(this).parents('tr').find('td:eq(4)').html() + '</div> <div>';
    var a = document.getElementById("optionsRadios4").value;
    Huyen = Huyen + 'Giá vé:  ' + a + '</div> </div>';
    $('#chieudi').html(Huyen);
});

$( "body" ).on( "click","#optionsRadios5", function() {
    var Huyen = '<div class="list-group-item" id="chieudi"> <div>Chiều đi</div> <div>';
    Huyen = Huyen + 'Chuyến bay:  ' + $(this).parents('tr').find('td:eq(0)').html() + '</div> <div>' ;
    Huyen = Huyen + 'Khởi hành:  ' + $(this).parents('tr').find('td:eq(1)').html() + '</div> <div>';
    Huyen = Huyen + 'Nơi đến:  ' + $(this).parents('tr').find('td:eq(2)').html() + '</div> <div>';
    Huyen = Huyen + 'Ngày đi:  ' + $(this).parents('tr').find('td:eq(3)').html() + '</div> <div>';
    Huyen = Huyen + 'Giờ:  ' + $(this).parents('tr').find('td:eq(4)').html() + '</div> <div>';
    var a = document.getElementById("optionsRadios5").value;
    Huyen = Huyen + 'Giá vé:  ' + a + '</div> </div>';
    $('#chieudi').html(Huyen);
});

$( "body" ).on( "click","#optionsRadios6", function() {
    var Huyen = '<div class="list-group-item" id="chieudi"> <div>Chiều về</div> <div>';
    Huyen = Huyen + 'Chuyến bay:  ' + $(this).parents('tr').find('td:eq(0)').html() + '</div> <div>' ;
    Huyen = Huyen + 'Khởi hành:  ' + $(this).parents('tr').find('td:eq(1)').html() + '</div> <div>';
    Huyen = Huyen + 'Nơi đến:  ' + $(this).parents('tr').find('td:eq(2)').html() + '</div> <div>';
    Huyen = Huyen + 'Ngày đi:  ' + $(this).parents('tr').find('td:eq(3)').html() + '</div> <div>';
    Huyen = Huyen + 'Giờ:  ' + $(this).parents('tr').find('td:eq(4)').html() + '</div> <div>';
    var a = document.getElementById("optionsRadios6").value;
    Huyen = Huyen + 'Giá vé:  ' + a + '</div> </div>';
    $('#chieuve').html(Huyen);
});

$( "body" ).on( "click","#optionsRadios7", function() {
    var Huyen = '<div class="list-group-item" id="chieudi"> <div>Chiều về</div> <div>';
    Huyen = Huyen + 'Chuyến bay:  ' + $(this).parents('tr').find('td:eq(0)').html() + '</div> <div>' ;
    Huyen = Huyen + 'Khởi hành:  ' + $(this).parents('tr').find('td:eq(1)').html() + '</div> <div>';
    Huyen = Huyen + 'Nơi đến:  ' + $(this).parents('tr').find('td:eq(2)').html() + '</div> <div>';
    Huyen = Huyen + 'Ngày đi:  ' + $(this).parents('tr').find('td:eq(3)').html() + '</div> <div>';
    Huyen = Huyen + 'Giờ:  ' + $(this).parents('tr').find('td:eq(4)').html() + '</div> <div>';
    var a = document.getElementById("optionsRadios7").value;
    Huyen = Huyen + 'Giá vé:  ' + a + '</div> </div>';
    $('#chieuve').html(Huyen);
});

$( "body" ).on( "click","#optionsRadios8", function() {
    var Huyen = '<div class="list-group-item" id="chieudi"> <div>Chiều về</div> <div>';
    Huyen = Huyen + 'Chuyến bay:  ' + $(this).parents('tr').find('td:eq(0)').html() + '</div> <div>' ;
    Huyen = Huyen + 'Khởi hành:  ' + $(this).parents('tr').find('td:eq(1)').html() + '</div> <div>';
    Huyen = Huyen + 'Nơi đến:  ' + $(this).parents('tr').find('td:eq(2)').html() + '</div> <div>';
    Huyen = Huyen + 'Ngày đi:  ' + $(this).parents('tr').find('td:eq(3)').html() + '</div> <div>';
    Huyen = Huyen + 'Giờ:  ' + $(this).parents('tr').find('td:eq(4)').html() + '</div> <div>';
    var a = document.getElementById("optionsRadios8").value;
    Huyen = Huyen + 'Giá vé:  ' + a + '</div> </div>';
    $('#chieuve').html(Huyen);
});

$( "body" ).on( "click","#optionsRadios9", function() {
    var Huyen = '<div class="list-group-item" id="chieudi"> <div>Chiều về</div> <div>';
    Huyen = Huyen + 'Chuyến bay:  ' + $(this).parents('tr').find('td:eq(0)').html() + '</div> <div>' ;
    Huyen = Huyen + 'Khởi hành:  ' + $(this).parents('tr').find('td:eq(1)').html() + '</div> <div>';
    Huyen = Huyen + 'Nơi đến:  ' + $(this).parents('tr').find('td:eq(2)').html() + '</div> <div>';
    Huyen = Huyen + 'Ngày đi:  ' + $(this).parents('tr').find('td:eq(3)').html() + '</div> <div>';
    Huyen = Huyen + 'Giờ:  ' + $(this).parents('tr').find('td:eq(4)').html() + '</div> <div>';
    var a = document.getElementById("optionsRadios9").value;
    Huyen = Huyen + 'Giá vé:  ' + a + '</div> </div>';
    $('#chieuve').html(Huyen);
});

$( "body" ).on( "click","#optionsRadios10", function() {
    var Huyen = '<div class="list-group-item" id="chieudi"> <div>Chiều về</div> <div>';
    Huyen = Huyen + 'Chuyến bay:  ' + $(this).parents('tr').find('td:eq(0)').html() + '</div> <div>' ;
    Huyen = Huyen + 'Khởi hành:  ' + $(this).parents('tr').find('td:eq(1)').html() + '</div> <div>';
    Huyen = Huyen + 'Nơi đến:  ' + $(this).parents('tr').find('td:eq(2)').html() + '</div> <div>';
    Huyen = Huyen + 'Ngày đi:  ' + $(this).parents('tr').find('td:eq(3)').html() + '</div> <div>';
    Huyen = Huyen + 'Giờ:  ' + $(this).parents('tr').find('td:eq(4)').html() + '</div> <div>';
    var a = document.getElementById("optionsRadios10").value;
    Huyen = Huyen + 'Giá vé:  ' + a + '</div> </div>';
    $('#chieuve').html(Huyen);
});

$( "body" ).on( "click","#optionsRadios11", function() {
    var Huyen = '<div class="list-group-item" id="chieudi"> <div>Chiều về</div> <div>';
    Huyen = Huyen + 'Chuyến bay:  ' + $(this).parents('tr').find('td:eq(0)').html() + '</div> <div>' ;
    Huyen = Huyen + 'Khởi hành:  ' + $(this).parents('tr').find('td:eq(1)').html() + '</div> <div>';
    Huyen = Huyen + 'Nơi đến:  ' + $(this).parents('tr').find('td:eq(2)').html() + '</div> <div>';
    Huyen = Huyen + 'Ngày đi:  ' + $(this).parents('tr').find('td:eq(3)').html() + '</div> <div>';
    Huyen = Huyen + 'Giờ:  ' + $(this).parents('tr').find('td:eq(4)').html() + '</div> <div>';
    var a = document.getElementById("optionsRadios11").value;
    Huyen = Huyen + 'Giá vé:  ' + a + '</div> </div>';
    $('#chieuve').html(Huyen);
});
/*Kết thúc xử lý radio trên bảng chọn vé*/

/*Chưa xử lý*/
$(document).ready(function () {
    $('#').click(function () {
        GetValue();
        Validateformthongtin();

    })
})
/*Ajax post thông tin từ form thông tin hành khách*/
$('#')
/*Kết thúc ajax*/

function GetValue() {
    for(var i =0; i < soluongnguoi; i++){
        var x = '#danhxung' + i;
        var y = '#demten' + i;
        var z = '#ho' + i;
        console.log($(x).val());
        console.log($(y).val());
        console.log($(z).val());
    }
    console.log($('#nharieng').val());
    console.log($('#didong').val());
    console.log($('#ten').val());
    console.log($('#danhxung').val());
    console.log($('#email').val());
    console.log($('#email1').val());
    console.log($('#nlemail').val());
    console.log($('#nlemail1').val());
}
function Validateformthongtin() {
    var nr = $('#nharieng').val();
    var dd = $('#didong').val();
    var t = $('#ten').val();
    var dx = $('#anhxung').val();
    var em = $('#email').val();
    var em1 = $('#email1').val();
    var nlem = $('#nlemail').val();
    var nlem1 = $('#nlemail1').val();
    if (nr == "" || dd == "" || t == "" || dx == "" || em == "" || em1 == "" || nlem == "" || nlem1 == "") {
        alert("Vui lòng điền đầy đủ thông tin");
        return false;
    }
    else {
        for (var i = 0; i < 3; i++) {
            var x = '#danhxung' + i;
            var y = '#demten' + i;
            var z = '#ho' + i;
            if ($(x).val() == "" || $(y).val() == "" || $(z).val() == "") {
                alert("Vui lòng điền đầy đủ thông tin");
                return false;
            }
        }
    }
    atpos = em.indexOf("@");
    dotpos = em.lastIndexOf(".");
    if (atpos < 1 || ( dotpos - atpos < 2 )) {
        alert("Email định dạng không đúng");
        return false;
    }
    atpos = em1.indexOf("@");
    dotpos = em1.lastIndexOf(".");
    if (atpos < 1 || ( dotpos - atpos < 2 )) {
        alert("Email định dạng không đúng");
        return false;
    }
    atpos = nlem.indexOf("@");
    dotpos = nlem.lastIndexOf(".");
    if (atpos < 1 || ( dotpos - atpos < 2 )) {
        alert("Email định dạng không đúng");
        return false;
    }
    atpos = nlem1.indexOf("@");
    dotpos = nlem1.lastIndexOf(".");
    if (atpos < 1 || ( dotpos - atpos < 2 )) {
        alert("Email định dạng không đúng");
        return false;
    }
    return true;
}