/**
 * Created by NAT_PC on 25/10/2016.
 */
$(document).ready(function(){
    $("#bt1").click(function(){
        $("#FormThemCB").hide();
    });
    $("#bt2").click(function(){
        $("#FormThemCB").show();
    });
    $("#bt3").click(function(){
        $("#FormHoanTatDC").hide();
    });
    $("#bt4").click(function(){
        $("#FormHoanTatDC").show();
    });

    $("#bt5").click(function(){
        $("#FormDSKH").hide();
    });
    $("#bt6").click(function(){
        $("#FormDSKH").show();
    });

    $("#bt7").click(function(){
        $("#FormTTCB").hide();
    });
    $("#bt8").click(function(){
        $("#FormTTCB").show();
    });

    $("#bt9").click(function(){
        $("#FormThanhToan").hide();
    });
    $("#bt10").click(function(){
        $("#FormThanhToan").show();
    });

    $("#bt11").click(function(){
        $("#FormTTKH").hide();
    });
    $("#bt12").click(function(){
        $("#FormTTKH").show();
    });

    $("#bt13").click(function(){
        $("#FormDatVe").hide();
    });
    $("#bt14").click(function(){
        $("#FormDatVe").show();
    });

    $("#bt15").click(function(){
        $("#FormChonCB").hide();
    });
    $("#bt16").click(function(){
        $("#FormChonCB").show();
    });

    <!--Ẩn tìm chuyến bay, hiện chọn CB -->
    $("#BtTimCB").click(function(){
        $("#FormDatVe").hide();
        $("#FormChonCB").show();
    });

    $("#btTimKiemCB1").click(function(){
        $("#FormDatVe").show();
    });

    $("#btThemCB").click(function(){
        $("#FormThemCB").show();
    });

    $("#btTTHK").click(function(){
        $("#FormTTKH").show();
    });

    $("#btTTCB").click(function(){
        $("#FormTTCB").show();
    });


    $("#btTTCB").click(function(){
        $("#FormTTKH").show();
    });
    $("#btDCTC").click(function(){
        $("#FormHoanTatDC").show();
    });


});
