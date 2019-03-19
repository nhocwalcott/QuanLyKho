@extends('chucnang.chucnang')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Xuất kho<br/>
                        <small></small>
                    </h3>
                </header>
            </div>                      
        </div>
    </div>
</section>

@stop
@section('content')
<div class="row">
    <div class="span3">
        <div class="box">
            <div class="box-header">
                <p><b>Chức năng</b></p>
            </div>
            <div class="box-content">
                <form class="form-inline">
                    <p><b>Xuất kho</b></p>
                        <a href="{!! URL::route('chucnang.xuatkho.getList') !!}"><i class="icon-plus"></i>&nbspXuất kho</a><br><br>
                    <p><b>Bảng kê xuất</b></p>
                        <a href="{!! URL::route('chucnang.xuatkho.getVattu') !!}"><i class="icon-plus"></i>&nbspChi tiết phiếu</a><br>
                        <a href="{!! URL::route('chucnang.xuatkho.getChungtu') !!}"><i class="icon-plus"></i>&nbspDanh sách phiếu xuất</a><br>
                </form>
            </div>
        </div>
    </div>
    <div style="margin-left:-1px" class="span13">
        <div class="box">
            <div class="box-header">
                <p><b>Thông tin phiếu xuất</b></p>
            </div>
            <div class="box-content">
                <div class="form-inline">
                    <div class="container">
                        <div class="row">
                            <div id="acct-password-row" class="span13">
                            <form action="" method="POST" accept-charset="utf-8">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div id="acct-password-row" class="span8">
                                    <fieldset>
                                        <div class="control-group ">
                                            <label>Tên CT:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                            <select  class="span7" name="selCT" id="selCT">
                                                <option>--Chọn--</option>
                                                <?php Select_Function($congtrinh,$xuatkho->ct_id); ?>
                                            </select>
                                        </div>
                                        <div class="control-group">
                                            <label>Địa chỉ:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                            <input type="text" name="txtDC" value="{!! $xuatkho->xk_diachi !!}" class="span7">
                                        </div>
                                        <div class="control-group">
                                            <label>Lý do:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                            <input type="text" name="txtLyDo" class="span7" value="{!! $xuatkho->xk_lydo !!}">
                                        </div>
                                        <div class="control-group">
                                            <label>Nhân viên:&nbsp</label>
                                            <?php $user = DB::table('nhanvien')->where('id',$xuatkho->nv_id)->first(); ?>
                                            <input type="text" value="{{ $user->nv_ten }}" class="span7" disabled="true">
                                        </div>
                                    </fieldset>
                                </div>
                                <div id="acct-password-row" class="span4">
                                    <fieldset>
                                        <div class="control-group ">
                                            <label>Mã phiếu:</label>
                                            <input type="text" name="txtID" value="CK{!! $xuatkho->xk_ma !!}" class="span3" disabled="true">
                                        </div>
                                        <div class="control-group">
                                            <label>Ngày lập:&nbsp</label>
                                            <input type="date" name="txtDate" value="{!! $xuatkho->xk_ngaylap !!}" class="span3">
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary"><i class="icon-save"></i>&nbsp&nbsp&nbspLưu</button>
                                        </div>
                                    </fieldset>
                                </div>
                                </form>
                                <div id="acct-password-row" class="span12">
                                    <div>
                                        <form action="" method="POST" accept-charset="utf-8">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <table class="tb table table-bordered table-hover" id="myTable" name="myTable">
                                            <thead style="background:#EFEFEF;">
                                                <tr>
                                                    <th>Mã VT</th>
                                                    <th>Tên VT</th>
                                                    <th>ĐVT</th>
                                                    <th>Số lượng</th>
                                                    {{--<th>Đơn giá</th>--}}
                                                    {{--<th>Thành tiền</th>--}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                @foreach ($chitiet as $val)
                                                <tr>
                                                <?php 
                                                    $vt = DB::table('vattu')->where('id',$val->vt_id)->first(); 
                                                    $dvt = DB::table('donvitinh')->where('id',$vt->dvt_id)->first();
                                                ?>
                                                        <td>{!! $val->vt_id !!}</td>
                                                        <td>{!! $vt->vt_ten !!}</td>
                                                        <td>{!! $dvt->dvt_ten !!}</td>
                                                        <td>{!! $val-> ctxk_soluong !!}</td>
                                                        {{--<td>{!! number_format("$vt->vt_gia",0,".",",")  !!} vnd</td>--}}
                                                        {{--<td>{!! number_format("$val->ctxk_thanhtien",0,".",",")  !!} vnd</td>--}}
                                                    </tr>
                                                @endforeach
                                                {{--<tr>--}}
                                                    {{--<td colspan="5"><b><i>Tổng tiền</i></b></td>--}}
                                                    {{--<td>{!! number_format("$xuatkho->xk_tongtien",0,".",",")  !!} vnđ</td>--}}
                                                {{--</tr>--}}
                                            </tbody>
                                        </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script>
        $(document).ready(function() {
            $(".add").click(function() {
              // var id = $(this).attr('sluong');
              // alert(id);
                var id = $(this).parent().parent().find(".selVT").val();
                var qty = $(this).parent().parent().find(".sluong").val();
                var idKho = $(this).parent().parent().find(".ware").val();
                var token = $("input[name='_token']").val();
                // alert(idKho);
                $.ajax({
                    url:'xuathang/'+id+'/'+qty,
                    type:'GET',
                    cache:false,
                    data:{"_token":token,"id":id,"qty":qty,"idKho":idKho},
                    success: function(data) {
                        if(data == "oke") {
                          window.location = "xuatkho";
                        }
                        else {
                         alert("Error!");
                        }
                    }
                });
            });
        });

        $(document).ready(function() {
            $(".del").click(function(){

                $(this).parents("tr").remove();
            });
        });
    </script>


    <!-- Ajax Vật tư -->
    <script>
        $('#vattu_id').on('change', function(e) {
            console.log(e);
            var vattu_id = e.target.value;

            //ajax

            $.getJSON("vattu/ajax-call?vattu_id="+vattu_id, function (data) {

                console.log(data);

                $('#country').empty();
                $.each(data, function(index, countryObj){

                     $('#country').append('<option value="'+countryObj.id+'  selected="{{ old("ten") === "'+countryObj.vt_id+'" ? true : false }} ">'+countryObj.vt_ten+'</option>');
                });

                $('#country1').empty();
                $.each(data, function(index, countryObj){

                    $('#country1').append('<option value="'+countryObj.id+'  selected="{{ old("dvt") === "'+countryObj.vt_id+'" ? true : false }} ">'+countryObj.dvt_ten+'</option>');
                });

                $('#country2').empty();
                $.each(data, function(index, countryObj){

                    $('#country2').append('<option value="'+countryObj.id+'">'+countryObj.kho_ten+'</option>');
                });
            });

        });
    </script>
@stop
