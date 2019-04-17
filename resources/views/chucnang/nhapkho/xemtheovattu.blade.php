@extends('chucnang.chucnang')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Nhập kho<br/>
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
                    <p><b>Bảng kê tổng hợp</b></p>
                </div>
                <div class="box-content">
                    <div class="form-inline">
                        <div class="container">
                            <div class="row">
                                <div id="acct-password-row" class="span13">
                                    <div id="acct-password-row" class="span12">

                                        <br>
                                        <fieldset>
                                            <form action="{!! URL::route('chucnang.nhapkho.search') !!}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input id="current-pass-control" name="search" class="span4" type="text" value="" autocomplete="false">

                                                <button type="submit"><i class="icon-plus"></i>Tìm kiếm</button>
                                            </form>
                                        </fieldset>
                                        <div>
                                            <table class="table table-bordered table-hover tablesorter" id="sample-table">
                                                <thead style="background:#EFEFEF;">
                                                    <tr>
                                                        <th class="span2">Mã NK</th>
														<th class="span2">CTNK_ID</th>
                                                        <th class="span2">CREATER PERSON</th>
                                                        <th class="span2">Mã VT</th>
                                                        <th class="span3">Vật tư</th>
                                                        <th class="span3">Số lượng</th>
                                                        <th class="span3">ĐVT</th>
                                                        {{--<th class="span3">Thành tiền</th>--}}
                                                        <th class="span3"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($datas as $item)
                                                <?php 
                                                    $count = DB::table('chitietnhapkho')->where('nk_id',$item->id)->count();
                                                    $chitiet = DB::table('chitietnhapkho')->where('nk_id',$item->id)->get();
                                                ?>

                                                @foreach ($chitiet as $val)
                                                    <?php
                                                  $vt = DB::table('vattu')->where('id',$val->vt_id)->first();
                                                  $dvt = DB::table('donvitinh')->where('id',$vt->dvt_id)->first();
                                                  $nv = DB::table('nhanvien')->where('id',$item->nv_id)->first();
                                                  ?>
                                                    <tr>
                                                        <td>{!! $item->id !!}</td>
														<td>{!! $val->id !!}</td>
                                                        <td>{!! $nv->nv_ten!!}</td>
                                                        <td >{!! $vt->vt_ma !!}</td>
                                                        <td>{!! $vt->vt_ten !!}</td>
                                                        <td>{!! $val->ctnk_soluong !!}</td>
                                                        <td>{!! $dvt->dvt_ten !!}</td>
                                                        <td class="td-actions">
                                                            <a href="{!! URL::route('chucnang.nhapkho.getEdit1' ,$val->id) !!}" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"></i></a>
                                                            <a href="{!! URL::route('chucnang.nhapkho.getSerial' ,$val->id) !!}" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit">Serial</i></a>
                                                            <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')"  href="{!! URL::route('chucnang.nhapkho.getDeletePro',[$vt->id,$item->id]) !!}" class="btn btn-small btn-danger">
                                                                <i class="btn-icon-only icon-remove"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <tr>
                                                <ul class="pagination pagination-sm">
                                                    <li class="page-item"><a class="page-link" href="#">{!! $datas->render(); !!}</a></li>
                                                </ul>
                                            </tr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
