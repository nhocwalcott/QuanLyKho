@extends('chucnang.chucnang')
@section('header')
    <section class="nav nav-page">
        <div class="container">
            <div class="row">
                <div class="span7">
                    <header class="page-header">
                        <h3>Quản lý Nhập kho<br/>
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
                        <p><b>Nhập kho</b></p>
                        <a href="{!! URL::route('chucnang.nhapkho.getList') !!}"><i class="icon-plus"></i>&nbspNhập kho</a><br><br>
                        <p><b>Bảng kê nhập</b></p>
                        <a href="{!! URL::route('chucnang.nhapkho.getVattu') !!}"><i class="icon-plus"></i>&nbspChi tiết phiếu</a><br>
                        <a href="{!! URL::route('chucnang.nhapkho.danhsach') !!}"><i class="icon-plus"></i>&nbspDanh sách phiếu nhập</a><br>
                    </form>
                </div>
            </div>
        </div>
        <div style="margin-left:-1px" class="span13">
            <div class="box">
                <div class="box-header">
                    <p><b>Nhập kho thông thường</b></p>
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
                                                <div class="control-group">
                                                    <label>Lý do:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                                    <input type="text" name="txtLyDo" value="{{ $nhapkho->nk_lydo }}" class="span7">
                                                </div>
                                                <div class="control-group">
                                                    <label>Nhân viên:</label>
                                                    <?php $user = DB::table('nhanvien')->where('id',$nhapkho->nv_id)->first(); ?>
                                                    <input type="text" value="{{ $user->nv_ten }}" class="span7" disabled="true">
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div id="acct-password-row" class="span4">
                                            <fieldset>
                                                <div class="control-group ">
                                                    <label>Mã phiếu:</label>
                                                    <input type="text" name="txtID" value="CK{!! $nhapkho->nk_ma !!}" class="span3" disabled="true">
                                                </div>
                                                <div class="control-group">
                                                    <label>Ngày lập:&nbsp</label>
                                                    <input type="date" name="txtDate" value="{!! $nhapkho->nk_ngaylap !!}" class="span3">
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
                                                        <th>Nhà cung cấp</th>
                                                        {{--<th>Thành tiền</th>--}}
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($chitiet as $val)
                                                        <tr>
                                                            <?php
                                                            $vt = DB::table('vattu')->where('id',$val->vt_id)->first();
                                                            $dvt = DB::table('donvitinh')->where('id',$vt->dvt_id)->first();
                                                            $ncc = DB::table('nhaphanphoi')->where('id',$val->npp_id)->first();
                                                            ?>
                                                            <td>{!! $val->vt_id !!}</td>
                                                            <td>{!! $vt->vt_ten !!}</td>
                                                            <td>{!! $dvt->dvt_ten !!}</td>
                                                            <td>{!! $val->ctnk_soluong !!}</td>
                                                                <td>{!! $ncc->npp_ten !!}</td>
                                                            {{--<td>{!!  number_format("$vt->vt_gia",0,".",",") !!}vnd</td>--}}
                                                            {{--<td>{!! number_format("$val->ctnk_thanhtien",0,".",",")  !!} vnd</td>--}}

                                                        </tr>
                                                    @endforeach
                                                    {{--<tr>--}}
                                                        {{--<td colspan="5"><b><i>Tổng tiền</i></b></td>--}}
                                                        {{--<td>{!! number_format("$nhapkho->nk_tongtien",0,".",",")  !!} vnđ</td>--}}
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
        </div>
        <script>
            $(document).ready(function() {
                $(".add1").click(function() {
                    // var id = $(this).attr('.selVT1');
                    // alert(id);
                    var idKho = $(this).parent().parent().find(".selKho").val();
                    var id = $(this).parent().parent().find(".selVT1").val();
                    var qty = $(this).parent().parent().find(".sluong").val();
                    var token = $("input[name='_token']").val();
                    // alert(idKho);
                    // alert(token);
                    $.ajax({
                        url:'nhaphang/'+id+'/'+qty,
                        type:'GET',
                        cache:false,
                        data:{"_token":token,"id":id,"qty":qty,"idKho":idKho},
                        success: function(data) {
                            if(data == "oke") {
                                window.location = "nhapkho";
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

                        $('#country').append('<option value="'+countryObj.id+'  selected="{{ old("ten") === "'+countryObj.id+'" ? true : false }} ">'+countryObj.vt_ten+'</option>');
                    });

                    $('#country1').empty();
                    $.each(data, function(index, countryObj){

                        $('#country1').append('<option value="'+countryObj.id+'  selected="{{ old("dvt") === "'+countryObj.id+'" ? true : false }} ">'+countryObj.dvt_ten+'</option>');
                    });

                    // $('#country2').empty();
                    // $.each(data, function(index, countryObj){

                    //     $('#country2').append('<option value="'+countryObj.id+'  selected="{{ old("kho") === "'+countryObj.id+'" ? true : false }} ">'+countryObj.kho_ten+'</option>');
                    // });
                });
            });
        </script>
@stop
