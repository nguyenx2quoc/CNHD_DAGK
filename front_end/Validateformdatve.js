/**
 * Created by QUOC on 10/24/2016.
 */

$('#qq').click(function () {
    if($('#optionsRadios1').is(':checked')){
        Validate();
        ValidateNV();
    }
    if($('#optionsRadios2').is(':checked')){
        Validate();

    }
});

function Validate() {

    if(document.getElementById('inputDen').value == "" || document.getElementById('inputNgaydi').value == ""
        || document.getElementById('inputTu').value == "") {
        alert( "Vui lòng điền đầy đủ thông tin!" );

        return false;
    }
    if (document.getElementById("inputNguoiLon").value < 1){
        alert("Số lượng người phải lớn hơn 0!");
        document.myForm.Nguoilon.focus() ;
    }
    if (document.getElementById("inputTreem").value < 0){
        alert("Số lượng trẻ em không âm!");
        document.myForm.Treem.focus() ;
    }
    if (document.getElementById("inputEmbe").value < 0){
        alert("Số lượng em bé không âm!");
        document.myForm.Embe.focus() ;
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