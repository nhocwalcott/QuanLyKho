@extends('chucnang.chucnang')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Nhập kho<br/>
                        <small>Danh sách phiếu đăng ký mua</small>
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
                                                        <th class="span2">ĐKM_ID</th>
                                                        <th class="span2">Ngày tạo</th>
                                                        <th class="span2">Người tạo</th>
                                                        <th class="span3">Lý do</th>
                                                        <th class="span3"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($data as $item)
                                                <tr>
                                                        <td>{!! $item->id !!}</td>
                                                        <td>{!! $item->dkm_ngaylap !!}</td>
                                                        <?php $nv = DB::table('nhanvien')->where('id',$item->nv_id)->first(); ?>
                                                        <td>{!! $nv->nv_ten !!}</td>
                                                        <td>{!! $item->dkm_lydo !!}</td>
                                                        <td class="td-actions">
                                                            <a href="{!! URL::route('chucnang.dangkymua.getEdit' ,$item->id) !!}" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"></i></a>
                                                            </a>
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
