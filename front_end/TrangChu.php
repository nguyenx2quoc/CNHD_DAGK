

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title >3D Airlines</title>
    <script src="css/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/HandleButton.js"></script>
   
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Styleindex.css">

</head>
<body>
<div id="main">

    <!-- Header trang web -->
    <div id="head">

        <div class="container">
                <div >
                    <div class="col-lg-3" >
                        <img  src="logo.png" class="headerlogo">
                    </div>
                    <div class="col-lg-8" >
                        <strong class="headertext"> <br/>TỔNG CÔNG TY HÀNG KHÔNG 3D VIỆT NAM </strong><br/>
                        <strong class="hedernote">Nhanh - An toàn -Tiết kiệm</strong>
                    </div>
                    <div class="col-lg-1">
                    </div>
                </div>
    </div>

    </div>
    <!--hết  Header trang web -->

    <!-- Header menu -->
    <div id="head-link">
        <div class="col-lg-3">
            <strong ><a id="btTimKiemCB1"><p  class="fontmenu" >Tìm kiếm chuyến bay</p></a></strong>
        </div>
      <div class="col-lg-3">
          <strong ><a id="btThemCB"><p  class="fontmenu" >Thêm chuyến bay mới</p></a></strong>
      </div>
        <div class="col-lg-3">
            <strong ><a id="btTTCB"><p  class="fontmenu" >Danh sách chuyến bay</p></a></strong>
        </div>
        <div class="col-lg-3">
            <strong ><a id="btDSHK"><p  class="fontmenu1" >Danh sách hành khách</p></a></strong>
        </div>

    </div>
    <!-- Hết Header trang web -->

    <!-- Nội dung hiển thị -->

    <div id="content">


<!-- Man hinh nguoi dung-->

        <!--1. Form đặt vé--->

        <div class="form-horizontal" id ="FormDatVe">
                <fieldset>
                    <legend class="Tbold">&nbsp &nbspTìm kiếm chuyến bay</legend>
                    <div class="row">
                        <div class="col-lg-1"> </div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label class="col-lg-2 control-label"></label>
                                <div class="col-lg-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="inputkhuhoi" value="Khứ Hồi" >
                                            Khứ hồi
                                        </label>
                                        <label>
                                            <input type="radio" name="optionsRadios" id="input1chieu" value="1 Chiều" checked="">
                                            1 Chiều
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTu" class="col-lg-2 col-xs-2 control-label">Từ</label>
                                <div class="col-lg-4 col-xs-9">
                                    <input type="text" class="form-control" id="inputTu" list="html"/>
                                </div>
                                <label for="inputDen" class="col-lg-2 col-xs-2 control-label">Đến</label>
                                <div class="col-lg-4 col-xs-9">
                                    <input type="text" class="form-control" id="inputDen" list="html1"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 col-xs-2 control-label">Ngày đi</label>
                                <div class="col-lg-4 col-xs-9">
                                    <input type="date" class="form-control date-picker" id="inputNgaydi" name="Ngaydi">
                                </div>
                                <label id="lbnv" class=" col-lg-2 col-xs-2 control-label hidden">Ngày về</label>
                                <div class="col-lg-4 col-xs-9">
                                    <input type="date" class="form-control date-picker hidden" id="inputNgayve" name="Ngayve">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNguoiLon" class="col-sm-2  control-label">Người lớn</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="inputNguoiLon" value="1" name="Nguoilon">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <label for="inputTreem" class="col-sm-2 control-label">Trẻ em</label>
                                <div class="col-sm-2">
                                    <select type="number" class="form-control" id="inputTreem" value="0" name="Treem">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                                <label for="inputEmbe" class="col-sm-2  control-label">Em bé</label>
                                <div class="col-sm-2">
                                    <select type="number" class="form-control" id="inputEmbe" value="0" name="Embe">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                                <br/>
                                <div class="btfloatright">
                                    <button class="btn btn-primary" id="BtTimCB" type="button">Tìm chuyến bay</button>
                                </div>
                            </div>

                        <div class="col-lg-1"> </div>
                    </div>

                </fieldset>
            </div>
            <!--Hết form đặt vé -->
            <!--2. Form chọn chuyến bay -->
        <div>
            <form class="form-horizontal hidden" id="FormChonCB">
                <fieldset>
                    <legend class="Tbold">Chọn chuyến bay</legend>
                </fieldset>
                <div> CHIỀU ĐI
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr class="info">
                            <th>Mã</th>
                            <th>Nơi đi</th>
                            <th>Nơi đến</th>
                            <th>Ngày</th>
                            <th>Giờ</th>
                            <th>Thương Gia A</th>
                            <th>Thương Gia B</th>
                            <th>Thương Gia c</th>
                            <th>Phổ Thông A</th>
                            <th>Phổ Thông B</th>
                            <th>Phổ Thông C</th>
                        </tr>
                        </thead>
                        <tbody id="cc">

                        </tbody>
                    </table>
                </div>
            </form>
            <form class="form-horizontal hidden" id="FormChonCB2">
                CHIỀU VỀ
                <table class="table table-striped table-hover" id="cc1">
                </table>
            </form>
            <div class="btfloatright">
                <button class="btn btn-primary hidden" id="BtTieptuc1" type="button">Tiếp tục</button>
            </div>
        </div>
        <!--Hết Form chọn chuyến bay -->

        <!-- 3. Form  thông tin khách hàng -->
        <div class="form-horizontal hidden" method="post" id="FormTTKH" >
            <!--Chạy vòng lặp để hiển thị form này-->
            <fieldset>
                <legend class="Tbold">&nbsp &nbsp Thông tin khách hàng</legend>

                <div class="row">
                    <div class="col-lg-1"> </div>
                    <div class="col-lg-10">
                        <div class="form-group">
                            <div id="tthk">

                            </div>
                        </div>
                        <fieldset>
                            <h4 class="Tbold">Thông tin liên hệ</h4>
                            <div class="form-group" style="margin-left:5px">

                                <div class="col-sm-6"><h5 style="color: blue">Điện thoại</h5>

                                    <div class="row">
                                        <div class="col-sm-4"> &nbsp &nbsp Di động</div>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control input-sm" id="didong">
                                        </div>
                                    </div>
                                    </br>
                                    <div class="row">
                                        <div class="col-sm-4">&nbsp &nbsp Nhà riêng</div>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control input-sm" id="nharieng">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6"><h5 style="color: blue">Thông tin</h5>
                                    <div class="row">
                                        <div class="col-sm-4">&nbsp &nbsp Tên</div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" id="ten">
                                        </div>
                                    </div></br>
                                    <div class="row">
                                        <div class="col-sm-2">Ho</div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-sm" id="ho">
                                        </div>
                                        <div class="col-sm-2">Danh xưng</div>
                                         <div class="col-sm-4">
                                             <select name="DanhXung" class="form-control input-sm dropdown" id="danhxunglh'">
                                                 <option>Ông</option>
                                                <option>Bà</option>
                                            </select>
                                         </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="margin-left:5px">
                                <h5 style="color: blue">&nbsp &nbsp Email</h5>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4" > &nbsp &nbspEmail</div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" id="email">
                                        </div>
                                    </div></br>
                                    <div class="row">
                                        <div class="col-sm-4"> &nbsp &nbspEmail 2</div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" id="email1">
                                        </div>
                                    </div></br>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">&nbsp &nbsp Nhập lại email</div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" id="nlemail">
                                        </div>
                                    </div></br>
                                    <div class="row">
                                        <div class="col-sm-4">&nbsp &nbsp Nhập lại email 2</div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" id="nlemail1">
                                        </div>
                                    </div></br>
                                </div>
                            </div>
                            <div class="row" style="float: right;margin-right: 25px " >
                                <button class="btn btn-primary btn-sm" id="btChuyenTT" type="button">Tiếp tục</button>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-lg-1"> </div>
                </div>
            </fieldset>



        </div>

        <!-- Hết Form thông tin khách hàng-->

        <!-- 4. Form thanh toán -->
        <div class="form-horizontal hidden" id="FormThanhToan">
            <fieldset>
                <legend class="Tbold ">&nbsp &nbspThanh toán</legend>
                <div class="row">
                    <div class="col-lg-1"> </div>
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label for="select" class="col-lg-2 control-label">Ngân hàng</label>
                            <div class="col-lg-10">
                                <select class="form-control" id="SelectNH">
                                    <option>BIDV</option>
                                    <option>Agribank</option>
                                    <option>Vietcom bank</option>
                                    <option>Viettin bank</option>
                                    <option>OCB</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSTK" class="col-lg-2 control-label">Số tài khoản</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputSTK" placeholder="Số tài khoản">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPin" class="col-lg-2 control-label">Mã pin</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" id="inputPin" placeholder="******">
                                <br/>
                                <div>
                                    <div class="col-lg-4 Tbold" style="margin-top: -10px">
                                        <br/>  Tổng số tiền thanh toán
                                    </div>

                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="inputSTTK" placeholder="VNĐ">
                                    </div>
                                </div>

                                <br/><br/><br/>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Tôi đồng ý với tất cả các qui định thanh toán của hãng.
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br/><br/>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2" >
                                <div style="float: right;margin-right: 25px">
                                    <button  type="button" class="btn btn-default" id="bthuyTT">Hủy bỏ</button>
                                    <button  type="button" class="btn btn-primary" id="btDCTC">Gửi thanh toán</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1"> </div>
                </div>

            </fieldset>
        </div>
        <!-- Hết form thanh toán -->

        <!--5 Màn hình Hoàn tất đặt chỗ -->
        <div class="form-horizontal hidden" id="FormHoanTatDC">
            <fieldset>
                <legend class="Tbold ">&nbsp &nbspĐặt chỗ thành công</legend>

                <div>
                    <div class="col-lg-1"> </div>
                    <div class="col-lg-10">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="inputMaDCTC" class="col-lg-4 control-label">Mã đặt chỗ</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="inputMaDCTC" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMaCB" class="col-lg-4 control-label">Mã chuyến bay</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="inputMaCB" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNoidi" class="col-lg-4 control-label">Nơi đi</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="inputNoidi" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNoiden" class="col-lg-4 control-label">Nơi đến</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="inputNoiden" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="inputTime" class="col-lg-4 control-label">Thời gian</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="inputTime" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputKHVe" class="col-lg-4 control-label">Tên khách hàng</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="inputKHVe" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSLVe" class="col-lg-4 control-label">Số lượng vé</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="inputSLVe" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputHangVe" class="col-lg-4 control-label">Hạng vé</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="inputHangVe" placeholder="">
                                </div>
                            </div>

                            <br/><br/>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2" >
                                    <div style="float: right; margin-right: 25px">
                                        <button  type="submit" class="btn btn-primary" id="btHoantat">Đóng</button>
                                    </div>

                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="col-lg-1"> </div>
                </div>

            </fieldset>
        </div>
        <!-- Hết đặt chỗ thành công -->

        <!-- Admin1 Màn hình thêm chuyến bay mới -->
        <div class="form-horizontal hidden" id="FormThemCB" >
            <fieldset>
                <legend class="Tbold">&nbsp &nbspThêm chuyến bay mới</legend>
                <div>
                    <div class=" col-lg-4">
                        <div class="form-group">
                            <label for="inputMaCB1" class="col-lg-5 control-label">Mã chuyến bay</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" id="inputMaCB1" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNoidi1" class="col-lg-5 control-label">Nơi đi</label>
                            <div class="col-lg-7">
                                <!--input type="text" class="form-control" id="inputNoidi1" placeholder=""-->
                                <input class="form-control" list="datanoidi" id="inputNoidi1" />
                                <datalist id="datanoidi">
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTG" class="col-lg-5 control-label">Thời gian</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" id="inputTG" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selectGia" class="col-lg-5 control-label">Mức giá</label>
                            <div class="col-lg-7">
                                <select class="form-control" id="selectGia">
                                    <option>900000</option>
                                    <option>1500000</option>
                                    <option>3000000</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class=" col-lg-7">
                        <div class="form-group">
                            <label for="inputNgaydi" class="col-lg-5 control-label">Ngày đi</label>
                            <div class="col-lg-7">
                                <input type="date" class="form-control date-picker"  id="" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputNoiden1" class="col-lg-5 control-label">Nơi đến</label>
                            <div class="col-lg-7">
                                <input class="form-control" list="datanoidi" id="inputNoiden1" />
                                <datalist id="datanoiden">
                                </datalist>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="select" class="col-lg-5 control-label">Hạng</label>
                            <div class="col-lg-7">
                                <select class="form-control" id="select">
                                    <option>Bình dân</option>
                                    <option>Thương gia</option>
                                    <option>VIP</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSL" class="col-lg-5 control-label">Số lượng</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" id="inputSL" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputGia1" class="col-lg-5 control-label">Giá</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" id="inputGia1" placeholder="">
                            </div>
                        </div>
                    </div>


                </div>

                <br/><br/>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2" >
                        <div style="float: right; margin-right: 25px">
                            <button  type="reset" class="btn btn-default" id="bthuytaomoi">Hủy bỏ</button>
                            <button  type="submit" class="btn btn-primary" id="bttaomoi">Tạo mới</button>
                        </div>

                    </div>
                </div>

            </fieldset>
        </div>

        <!--Hết Màn hình thêm chuyến bay mới -->

        <!--Man hinh admin -->

        <!--Admin 2 Danh sách chuyến bay -->
        <div class="form-horizontal hidden" id="FormTTCB">
            <fieldset>
                <legend class="Tbold ">&nbsp &nbspDanh sách chuyến bay</legend>
                <!-- Các combobox và textbox -->

                <!-- Bang du lieu-->

                <div>

                    <table class="table table-striped table-hover">
                        <thead>
                        <tr bgcolor="#4169e1" class="Twhite">
                            <th class="Tcenter">Mã chuyến bay</th>
                            <th class="Tcenter">Nơi đi</th>
                            <th class="Tcenter">Nơi đến</th>
                            <th class="Tcenter">Ngày đi</th>
                            <th class="Tcenter">Tổng số ghế</th>
                            <th class="Tcenter">Số ghế còn lại</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="Tcenter">1</td>
                            <td>Nguyễn Anh Tài</td>
                            <td class="Tcenter">60</td>
                            <td class="Tcenter">60</td>
                            <td class="Tcenter">60</td>
                            <td class="Tcenter">60</td>
                        </tr>
                        <tr>
                            <td class="Tcenter">2</td>
                            <td>Nguyễn Ngyên Quốc</td>
                            <td class="Tcenter">45</td>
                            <td class="Tcenter">60</td>
                            <td class="Tcenter">60</td>
                            <td class="Tcenter">60</td>
                        </tr>
                        <tr>
                            <td class="Tcenter">3</td>
                            <td>Trần Hữu Phước</td>
                            <td class="Tcenter">30</td>
                            <td class="Tcenter">60</td>
                            <td class="Tcenter">60</td>
                            <td class="Tcenter">60</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2" >
                        <div class="btright">
                            <button  type="submit" class="btn btn-primary" id="btdong2">Đóng</button>
                        </div>

                    </div>
                </div>

            </fieldset>
        </div>

        <!--Hết thông tin chuyến bay -->

        <!-- Admin 3 xem Danh sách hanh khach-->
        <div class="form-horizontal hidden" id="FormDSKH">
            <fieldset>
                <legend class="Tbold ">&nbsp &nbspDanh sách khách hàng</legend>

                <div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label for="inputMaDC" class="col-lg-3 control-label" >Mã đặt chỗ</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="inputMaDC" placeholder="">
                            </div>
                        </div>

                        <!-- Button đăt chỗ-->
                        <div>
                            <button  class="btn btn-default" style="float: right; margin-right: 25px"> Xem</button> <br/> <br/><br/>
                        </div>

                        <!-- Bảng dữ liệu -->
                        <div>
                            <table class="table table-striped table-hover ">
                                <thead>
                                <tr bgcolor="#4169e1" class="Twhite">
                                    <th class="Tcenter">STT</th>
                                    <th class="Tcenter">Họ tên</th>
                                    <th class="Tcenter">Hạng</th>
                                    <th class="Tcenter">Mức giá</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="Tcenter">1</td>
                                    <td>Nguyễn Anh Tài</td>
                                    <td class="Tcenter">60</td>
                                    <td class="Tcenter">60</td>
                                </tr>
                                <tr>
                                    <td class="Tcenter">2</td>
                                    <td>Nguyễn Ngyên Quốc</td>
                                    <td class="Tcenter">45</td>
                                    <td class="Tcenter">60</td>
                                </tr>
                                <tr>
                                    <td class="Tcenter">3</td>
                                    <td>Trần Hữu Phước</td>
                                    <td class="Tcenter">30</td>
                                    <td class="Tcenter">60</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end of table-->
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2" >
                                <div style="float: right;margin-right: 25px">
                                    <button  type="submit" class="btn btn-primary" id="btdong1">Đóng</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                </div>


            </fieldset>
        </div>
        <!-- Hết DSKH -->


        <!-- //// -->
    </div>
    <!-- ######Hết Nội dung hiển thị#### -->

    <!--Nội dung hiển thị bên phải màn hình -->
    <div id="right">
        <div class="list-group">
            <div class="list-group-item-heading">
                <h4>Tóm tắt chuyến đi</h4>
            </div>
            <div id="chieudi">

            </div>
            <div id="chieuve">
            </div>
        </div>
    </div>
    <!-- Hết Nội dung hiển thị bên phải màn hình -->
   
    <!-- Nội dung hiển thị footer màn hình -->
    <div id="footer" class="Tcenter">

            <p class="banquyen"> -- Bản quyền trang Web thuộc về PQT Team - Đại học Khoa học Tự nhiên Tp.HCM --</p>

    </div>

</div>
<script src="js/bay.js"></script>
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
</script>

<!--  Hết Nội dung hiển thị footer màn hình -->

</body>

</html>

