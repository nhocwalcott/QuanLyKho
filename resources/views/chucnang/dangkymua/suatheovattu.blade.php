@extends('chucnang.chucnang')
@section('header')
    <section class="nav nav-page">
        <div class="container">
            <div class="row">
                <div class="span7">
                    <header class="page-header">
                        <h3>Quản lý Đăng ký mua<br/>
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
                        <p><b>Đăng ký mua</b></p>
                        <a href="{!! URL::route('chucnang.dangkymua.dangkymua') !!}"><i class="icon-plus"></i>&nbspĐăng ký mua</a><br><br>
                        <p><b>Bảng kê nhập</b></p>
                        <a href="{!! URL::route('chucnang.dangkymua.getVattu') !!}"><i class="icon-plus"></i>&nbspChi tiết phiếu</a><br>
                        <a href="{!! URL::route('chucnang.dangkymua.danhsach') !!}"><i class="icon-plus"></i>&nbspDanh sách phiếu đăng ký mua</a><br>
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
                                                        <th class="span2">Mã VT</th>
                                                        <th class="span2">Vật tư</th>
                                                        <th class="span2">SLĐK mua</th>
                                                        <th class="span2">Ngày về dự kiến</th>
                                                        <th class="span1">SL đã mua</th>
                                                        <th class="span1">SL còn lại</th>
                                                        <th class="span1"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($chitiet as $val)
                                                        <tr>
                                                            <?php
                                                            $vt = DB::table('vattu')->where('id',$val->vt_id)->first();
                                                            $vt1 = DB::table('vattu')->get();
                                                            $dvt = DB::table('donvitinh')->where('id',$vt->dvt_id)->first();
                                                            $dkm = DB::table('dangkymua')->where('id',$val->dkm_id)->first();
                                                            $nv = DB::table('nhanvien')->where('id',$dkm->nv_id)->first();
                                                            ?>
                                                            <td>{!! $vt->vt_ma !!}</td>
                                                            <td><select  class="vt_id span4" name="vt_id" id="vt_id">
                                                                    <option value="{{ $vt->id }}">{{$vt->vt_ten}}</option>
                                                                    @foreach($vt1 as $item)
                                                                        <option value="{{ $item->id }}" >{{ $item->vt_ten }}</option>
                                                                    @endforeach
                                                                </select></td>
                                                            <td>
                                                                <input name = "ctdkm_soluong" id = "ctdkm_soluong" class="ctdkm_soluong" type="number" value="{!! $val->ctdkm_soluong !!}">
                                                            </td>
                                                                <td>
                                                                    <input name = "ctdkm_ngayvedk" id = "ctdkm_ngayvedk" class="ctdkm_ngayvedk" type="date" value="{!! $val->ctdkm_ngayvedk !!}">
                                                                </td>
                                                                <td>
                                                                    <input name = "ctdkm_slve" id = "ctdkm_slve" class="ctdkm_slve" type="number" value="{!! $val->ctdkm_slve !!}">
                                                                </td>
                                                                <td>
                                                                    <input name = "ctdkm_slconlai" id = "ctdkm_slconlai" class="ctdkm_slconlai" type="number" value="{!! $val->ctdkm_soluong-$val->ctdkm_slve !!}">
                                                                </td>
                                                                <td>
                                                                <a href="{!! URL::route('chucnang.nhapkho.getDeletePro',[$val->vt_id,$val->dkm_id]) !!}">xóa</a>

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
