@extends('chucnang.chucnang')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Xuất kho<br/>
                        <small>Xem Chi tiết phiếu</small>
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
                    <p><b>Bảng kê tổng hợp</b></p>
                </div>
                <div class="box-content">
                    <form class="form-inline">
                        <div class="container">
                            <div class="row">
                                <div id="acct-password-row" class="span13">
                                    <div id="acct-password-row" class="span12">
                                        <!-- <div style="margin-top:5px">
                                            Từ&nbsp<input type="date" name="" class="span3">
                                            Đến&nbsp<input type="date" name="" class="span3">&nbsp&nbsp
                                            <a href="#" class="btn btn-info"><i class="icon-search"></i>Tìm kiếm</a>
                                        </div> -->
                                        <br>
                                        <div>
                                            <table class="table table-bordered table-hover tablesorter" id="sample-table">
                                                <thead style="background:#EFEFEF;">
                                                    <tr>
                                                        <th class="span2">Mã XK</th>
                                                        <th class="span2">Mã VT</th>
                                                        <th class="span4">Vật tư</th>
                                                        <th class="span3">Số lượng</th>
                                                        <th class="span3">ĐVT</th>
                                                        <th class="span2"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($data as $item)
                                                <?php
                                                    $count = DB::table('chitietxuatkho')->where('xk_id',$item->id)->count();
                                                    $chitiet = DB::table('chitietxuatkho')->where('xk_id',$item->id)->first();
                                                ?>
                                                <?php
                                                $vt = DB::table('vattu')->where('id',$chitiet->vt_id)->first();
                                                $dvt = DB::table('donvitinh')->where('id',$vt->dvt_id)->first();
                                                ?>

                                                <tr>
                                                    <td>{!! $item->id !!}</td>
                                                    <td >{!! $chitiet->vt_id !!}</td>
                                                    <td>{!! $vt->vt_ten !!}</td>
                                                    <td>{!! $chitiet-> ctxk_soluong !!}</td>
                                                    <td>{!! $dvt->dvt_ten !!}</td>

                                                    <td class="td-actions">
                                                        <a href="{!! URL::route('chucnang.xuatkho.getEdit1' ,$chitiet->id) !!}" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"></i></a>
                                                        <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')"  href="{!! URL::route('chucnang.xuatkho.getDeletePro',[$vt->id,$item->id]) !!}" class="btn btn-small btn-danger"><i class="btn-icon-only icon-remove"></i></a>
                                                    </td>
                                                </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop