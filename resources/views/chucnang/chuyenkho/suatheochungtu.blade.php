@extends('chucnang.chucnang')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Chuyển kho<br/>
                        <small></small>
                    </h3>
                </header>
            </div>                      
        </div>s
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
                    <p><b>Chuyển kho</b></p>
                        <a href="{!! URL::route('chucnang.chuyenkho.getList') !!}"><i class="icon-plus"></i>&nbspChuyển kho</a><br><br>
                    <p><b>Bảng kê chuyển</b></p>
                        <a href="{!! URL::route('chucnang.chuyenkho.getVattu') !!}"><i class="icon-plus"></i>&nbspTheo vật tư</a><br>
                        <a href="{!! URL::route('chucnang.chuyenkho.getChungtu') !!}"><i class="icon-plus"></i>&nbspTheo chứng từ</a><br>
                </form>
            </div>
        </div>
    </div>
    <div style="margin-left:-1px"  class="span13">
        <div class="box">
            <div class="box-header">
                <p><b>Thông tin Nhân viên</b></p>
            </div>
            <div class="box-content">
                <form class="form-inline" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="container">
                        <div class="row">
                            <div id="acct-password-row" class="span13">
                                <div id="acct-password-row" class="span8">
                                    <fieldset>
                                        <div class="control-group">
                                            <label>Nhân viên:</label>
                                            <?php $user = DB::table('users')->where('id',$chuyenkho->nv_id)->first(); ?>
                                            <input type="text" value="{{ $user->name }}" class="span7" disabled="true">
                                            <!-- <input type="hidden" name="txtNV" value="{{ Auth::user()->id }}"> -->
                                        </div>
                                        <div class="control-group">
                                            <label>Lý do:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                            <textarea name="txtLyDo" id="input" class="span7" rows="3" required="required">{{ $chuyenkho->ck_lydo }}</textarea>
                                        </div>
                                    </fieldset>
                                </div>
                                <div id="acct-password-row" class="span4">
                                    <fieldset>
                                        <div class="control-group ">
                                            <label>Mã phiếu:</label>
                                            <input type="text" name="txtID" value="CK{!! $chuyenkho->ck_ma !!}" class="span3" disabled="true">
                                        </div>
                                        <div class="control-group">
                                            <label>Ngày:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                            <input type="date" name="txtDate" value="{!! $chuyenkho->ck_ngay !!}" class="span3">
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary"><i class="icon-save"></i>&nbsp&nbsp&nbspLưu</button>
                                        </div>
                                    </fieldset>
                                </div>
                                
                                <div id="acct-password-row" class="span12">
                                    <div>
                                        <table class="tb table table-bordered table-hover" id="myTable" name="myTable">
                                            <thead style="background:#EFEFEF;">
                                                <tr>
                                                    <th class="span2">Mã VT</th>
                                                    <th class="span2">Tên VT</th>
                                                    <th class="span2">Từ Kho</th>
                                                    <th class="span2">Đến Kho</th>
                                                    <th class="span2">ĐVT</th>
                                                    <th class="span2">Số lượng</th>
                                                    <th class="span2">Đơn giá</th>
                                                    <th class="span2">Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                <tr>
                                                    <?php 
                                                        $vt = DB::table('vattu')->where('id',$item->vt_id)->first(); 
                                                        $dvt = DB::table('donvitinh')->where('id',$vt->dvt_id)->first();
                                                        $kho1 = DB::table('kho')->where('id', $item->khocu_id)->first();
                                                        $kho2 = DB::table('kho')->where('id', $item->khomoi_id)->first();
                                                    ?>
                                                        <td>{!! $item->vt_id !!}</td>
                                                        <td>{!! $vt->vt_ten !!}</td>
                                                        <td>{!! $kho1->kho_ten !!}</td>
                                                        <td>{!! $kho2->kho_ten !!}</td>
                                                        <td>{!! $dvt->dvt_ten !!}</td>
                                                        <td>{!! $item->ctck_soluong !!}</td>
                                                        <td>{!! number_format("$vt->vt_gia",0,".",",")  !!} vnđ</td>
                                                        <td>{!! number_format("$item->ctck_thanhtien",0,".",",")  !!} vnđ</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="7"><b><i>Tổng tiền</i></b></td>
                                                    <td>{!! number_format("$chuyenkho->ck_tongtien",0,".",",")  !!} vnđ</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                var idKho2 = $(this).parent().parent().find(".selKho").val();
                // alert(idKho2);
                $.ajax({
                    url:'chuyenvt/'+id+'/'+qty,
                    type:'GET',
                    cache:false,
                    data:{"_token":token,"id":id,"qty":qty,"idKho":idKho,"idKho2":idKho2},
                    success: function(data) {
                        if(data == "oke") {
                          window.location = "chuyenkho";
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
                
                alert(111);
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
