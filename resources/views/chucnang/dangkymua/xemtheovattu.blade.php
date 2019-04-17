@extends('chucnang.chucnang')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Đăng ký mua<br/>
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
                                                        <th class="span2">Mã phiếu mua</th>
														<th class="span2">Ngày tạo</th>
                                                        <th class="span2">CREATED PERSON</th>
                                                        <th class="span2">Bộ phận</th>
                                                        <th class="span2">Mã VT</th>
                                                        <th class="span3">Vật tư</th>
                                                        <th class="span3">SLĐK mua</th>
                                                        <th class="span3">Ngày về dự kiến</th>
                                                        <th class="span3">SL đã mua</th>
                                                        <th class="span3">SL còn lại</th>
                                                        <th class="span3">Trạng thái</th>
                                                        <th class="span3"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($chitiets as $val)
                                                    <?php
                                                  $vt = DB::table('vattu')->where('id',$val->vt_id)->first();
                                                  $dvt = DB::table('donvitinh')->where('id',$vt->dvt_id)->first();
                                                  $dkm = DB::table('dangkymua')->where('id',$val->dkm_id)->first();
                                                  $bophan = DB::table('congtrinh')->where('id',$val->ct_id)->first();
                                                  $nv = DB::table('nhanvien')->where('id',$dkm->nv_id)->first();
                                                  if(date('Y-m-d') > $val->ctdkm_ngayvedk){
                                                      $status = "OUTDATE";
                                                  }  else {
                                                      $status = "INDATE";
                                                  }
                                                  ?>
                                                    <tr>
                                                        <td>{!! $dkm->dkm_ma !!}</td>
														<td>{!! $val->created_at !!}</td>
                                                        <td>{!! $nv->nv_ten!!}</td>
                                                        <td>{!! $bophan->ct_ma!!}</td>
                                                        <td >{!! $vt->vt_ma !!}</td>
                                                        <td>{!! $vt->vt_ten !!}</td>
                                                        <td>{!! $val->ctdkm_soluong !!}</td>
                                                        <td>{!! $val->ctdkm_ngayvedk!!}</td>
                                                        <td>{!! $val->ctdkm_slve !!}</td>
                                                        <td>{!! $val->ctdkm_soluong - $val->ctdkm_slve !!}</td>
                                                        <td>{!! $status !!}</td>
                                                        <td class="td-actions">
                                                            <a href="{!! URL::route('chucnang.dangkymua.getEdit1' ,$val->id) !!}" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <tr>
                                                <ul class="pagination pagination-sm">
                                                    <li class="page-item"><a class="page-link" href="#">{!! $chitiets->render(); !!}</a></li>
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
