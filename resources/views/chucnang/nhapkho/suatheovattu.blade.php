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
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($chitiet as $val)
                                                        <tr>
                                                            <?php
                                                            $vt = DB::table('vattu')->where('id',$val->vt_id)->first();
                                                            $vtl = DB::table('vattu')->get();
                                                            $dvt = DB::table('donvitinh')->where('id',$vt->dvt_id)->first();
                                                            $ncc= DB::table('nhaphanphoi')->where('id',$val->npp_id)->first();
                                                            $data = DB::table('nhaphanphoi')->get();
                                                            ?>
                                                            <td>{!! $val->vt_id !!}</td>
                                                            <td><select  class="vt_id span4" name="vt_id" id="vt_id">
                                                                    <option value="{{ $vt->id }}">{{$vt->vt_ten}}</option>
                                                                    @foreach($vtl as $item)
                                                                        <option value="{{ $item->id }}" >{{ $item->vt_ten }}</option>
                                                                    @endforeach
                                                                </select></td>
                                                            <td>{!! $dvt->dvt_ten !!}</td>
                                                            <td>
                                                                <input name = "ctnk_soluong" id = "ctnk_soluong" class="ctnk_soluong" type="number" value="{!! $val->ctnk_soluong !!}" class="qty">
                                                                <input type="hidden" name="" value="{{ $val->vt_id }}" class="vtID">
                                                                <input type="hidden" name="" value="{{ $val->nk_id }}" class="nkID">
                                                            </td>
                                                                <td>
                                                                    <div class="control-group ">
                                                                        <select  class="npp_id span4" name="npp_id" id="npp_id">
                                                                            <option value="{{$ncc->id}}">{{$ncc->npp_ten}}</option>
                                                                            @foreach($data as $item)
                                                                                <option value="{{$item->id }}" >{{ $item->npp_ten }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                <a href="{!! URL::route('chucnang.nhapkho.getDeletePro',[$val->vt_id,$val->nk_id]) !!}">xóa</a>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <button type="submit" class="btn btn-primary"><i class="icon-save"></i>&nbsp&nbsp&nbspLưu</button>
                                                @endforeach
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
                $(".del").click(function(){
                    var nkID = $(this).parent().parent().find(".nkID").val();
                    var vtID = $(this).parent().parent().find(".vtID").val();
                    var qty = $(this).parent().parent().find(".qty").val();
                    var token = $("input[name='_token']").val();
                    // alert(xkID);
                    $.ajax({
                        url:'http://localhost/quanlykho/chucnang/nhapkho/suavattu/'+vtID+'/'+qty,
                        type:'GET',
                        cache:false,
                        data:{"_token":token,"nkID":nkID,"qty":qty,"vtID":vtID},
                        success: function(data) {
                            if(data == "oke") {
                                window.location = "http://localhost/quanlykho/chucnang/nhapkho/sua-theo-vat-tu/"+nkID;
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
