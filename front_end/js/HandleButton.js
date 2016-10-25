/**
 * Created by NAT_PC on 25/10/2016.
 */
$(document).ready(function(){

    <!--1 Đăt ve roi đến chọn CB -->

    <!-- 2 chọn CB rồi đến điền thông tin -->
    $("#BtTieptuc1").click(function(){
        $("#FormTTKH").removeClass('hidden');
        $("#FormChonCB").addClass('hidden');
        $("#FormChonCB2").addClass('hidden');
        $("#BtTieptuc1").addClass('hidden');
    });

    <!-- 3 Điền thông tin rồi thanh toán -->
    $("#btChuyenTT").click(function(){
        $("#FormThanhToan").removeClass('hidden');
        $("#FormTTKH").addClass('hidden');
    });

    $("#bthuyTT").click(function(){
        $("#FormThanhToan").addClass('hidden');
        $("#FormDatVe").removeClass('hidden');
    });
    <!--5 Bao đặt chỗ thành công-->
    $("#btDCTC").click(function(){
        alert('Xác nhận: Thanh toán và đặt chỗ thành công!');
    });


    <!--6 Thoat đặt chỗ thành công-->
    $("#btHoantat").click(function(){
        $("#FormDatVe").removeClass('hidden');
        $("#FormHoanTatDC").addClass('hidden');
    });

    <!--Menu tim kiem chuyen bay -->
    $("#btTimKiemCB1").click(function(){
        if($("#FormDatVe").hasClass('hidden')){
            $("#FormDatVe").removeClass('hidden');
        }
         $("#FormChonCB").addClass('hidden');
        $("#FormChonCB2").addClass('hidden');
        $("#BtTieptuc1").addClass('hidden');
         $("#FormTTKH").addClass('hidden');
         $("#FormThanhToan").addClass('hidden');
         $("#FormHoanTatDC").addClass('hidden');
         $("#FormTTCB").addClass('hidden');
         $("#FormDSKH").addClass('hidden');
        $("#FormThemCB").addClass('hidden');
    });

//Menu thêm chuyến bay mới
    $("#btThemCB").click(function(){
        $("#FormChonCB").addClass('hidden');
        $("#FormTTKH").addClass('hidden');
        $("#FormThanhToan").addClass('hidden');
        $("#FormHoanTatDC").addClass('hidden');
        $("#FormTTCB").addClass('hidden');
        $("#FormDSKH").addClass('hidden');
        $("#FormDatVe").addClass('hidden');
        $("#FormThemCB").removeClass('hidden');

    });

    //Menu thông tin chuyến bay
    $("#btTTCB").click(function(){
        $("#FormChonCB").addClass('hidden');
        $("#FormTTKH").addClass('hidden');
        $("#FormThanhToan").addClass('hidden');
        $("#FormHoanTatDC").addClass('hidden');
        $("#FormTTCB").removeClass('hidden');
        $("#FormDSKH").addClass('hidden');
        $("#FormDatVe").addClass('hidden');
        $("#FormThemCB").addClass('hidden');

    });

    //Menu danh sách hành khách
    $("#btDSHK").click(function(){
        $("#FormChonCB").addClass('hidden');
        $("#FormTTKH").addClass('hidden');
        $("#FormThanhToan").addClass('hidden');
        $("#FormHoanTatDC").addClass('hidden');
        $("#FormTTCB").addClass('hidden');
        $("#FormDSKH").removeClass('hidden');
        $("#FormDatVe").addClass('hidden');
        $("#FormThemCB").addClass('hidden');

    });

    <!--Dong man hinh DS chuyen bay -->
    $("#btdong2").click(function(){
        if($("#FormDatVe").hasClass('hidden')){
            $("#FormDatVe").removeClass('hidden');
        }
        $("#FormChonCB").addClass('hidden');
        $("#FormTTKH").addClass('hidden');
        $("#FormThanhToan").addClass('hidden');
        $("#FormHoanTatDC").addClass('hidden');
        $("#FormTTCB").addClass('hidden');
        $("#FormDSKH").addClass('hidden');
        $("#FormThemCB").addClass('hidden');
    });

    <!--Dong man hinh DS hanh khach -->
    $("#btdong1").click(function(){
        if($("#FormDatVe").hasClass('hidden')){
            $("#FormDatVe").removeClass('hidden');
        }
        $("#FormChonCB").addClass('hidden');
        $("#FormTTKH").addClass('hidden');
        $("#FormThanhToan").addClass('hidden');
        $("#FormHoanTatDC").addClass('hidden');
        $("#FormTTCB").addClass('hidden');
        $("#FormDSKH").addClass('hidden');
        $("#FormThemCB").addClass('hidden');
    });

    <!--Dong man hinh DS hanh khach -->
    $("#bthuytaomoi").click(function(){
        if($("#FormDatVe").hasClass('hidden')){
            $("#FormDatVe").removeClass('hidden');
        }
        $("#FormChonCB").addClass('hidden');
        $("#FormTTKH").addClass('hidden');
        $("#FormThanhToan").addClass('hidden');
        $("#FormHoanTatDC").addClass('hidden');
        $("#FormTTCB").addClass('hidden');
        $("#FormDSKH").addClass('hidden');
        $("#FormThemCB").addClass('hidden');
    });

    $("#bttaomoi").click(function(){
       alert("Thêm chuyến bay thành công!")
    });
});
