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
                                                    <th></th>
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
                                                        <td>
                                                        <input type="number" value="{!! $val-> ctxk_soluong !!}" class="ctxk_soluong" name = "ctxk_soluong" id = "ctxk_soluong">
                                                        <input type="hidden" name="" value="{{ $val->vt_id }}" class="vt_id">

                                                        </td>
                                                        {{--<td>{!! number_format("$vt->vt_gia",0,".",",")  !!} vnd</td>--}}
                                                        {{--<td>{!! number_format("$val->ctxk_thanhtien",0,".",",")  !!} vnd</td>--}}
                                                        <td>
                                                            <a href="{!! URL::route('chucnang.xuatkho.getDeletePro',[$val->vt_id,$val->xk_id]) !!}">xóa</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                {{--<tr>--}}
                                                    {{--<td colspan="5"><b><i>Tổng tiền</i></b></td>--}}
                                                    {{--<td>{!! number_format("$xuatkho->xk_tongtien",0,".",",")  !!} vnđ</td>--}}
                                                {{--</tr>--}}
                                            </tbody>
                                        </table>
                                            <button type="submit" class="btn btn-primary"><i class="icon-save"></i>&nbsp&nbsp&nbspLưu</button>
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
                var xkID = $(this).parent().parent().find(".xkID").val();
                var vtID = $(this).parent().parent().find(".vtID").val();
                var qty = $(this).parent().parent().find(".qty").val();
                var token = $("input[name='_token']").val();
                // alert(xkID);
                $.ajax({
                    url:'http://localhost/quanlykho/chucnang/xuatkho/suavattu/'+vtID+'/'+qty,
                    type:'GET',
                    cache:false,
                    data:{"_token":token,"xkID":xkID,"qty":qty,"vtID":vtID},
                    success: function(data) {
                        if(data == "oke") {
                          window.location = "http://localhost/quanlykho/chucnang/xuatkho/sua-theo-vat-tu/"+xkID;
                        }
                        else {
                         alert("Error!");
                        }
                    }
                });
            });
        });
    </script>


   
@stop
