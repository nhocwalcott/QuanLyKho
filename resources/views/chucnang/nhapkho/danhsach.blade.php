@extends('chucnang.chucnang')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Nhập kho<br/>
                        <small>Danh sách phiếu nhập kho</small>
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
                            <a href="{!! URL::route('chucnang.nhapkho.getVattu') !!}"><i class="icon-plus"></i>&nbspChi tiết</a><br>
                            <a href="{!! URL::route('chucnang.nhapkho.danhsach') !!}"><i class="icon-plus"></i>&nbsp Danh sách phiếu</a><br>

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
                                                        <th class="span2">NK_ID</th>
                                                        <th class="span2">Ngày nhập</th>
                                                        <th class="span2">Người tạo</th>
                                                        <th class="span3">Lý do</th>
                                                        <th class="span3"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($data as $item)
                                                <tr>
                                                        <td>{!! $item->id !!}</td>
                                                        <td>{!! $item->nk_ngaylap !!}</td>
                                                        <?php $nv = DB::table('nhanvien')->where('id',$item->nv_id)->first(); ?>
                                                        <td>{!! $nv->nv_ten !!}</td>
                                                        <td>{!! $item->nk_lydo !!}</td>
                                                        {{--<td>{!! number_format("$item->nk_tongtien",0,".",",")  !!} vnd</td>--}}
                                                        <td class="td-actions">
                                                            <a href="{!! URL::route('chucnang.nhapkho.getEdit' ,$item->id) !!}" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"></i></a>
                                                            </a>
                                                            <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')"  href="{!! URL::route('chucnang.nhapkho.getDelete',$item->id) !!}" class="btn btn-small btn-danger">
                                                                <i class="btn-icon-only icon-remove"></i>
                                                            </a>
                                                            <a href="{!! URL::route('chucnang.nhapkho.getPDF',$item->id) !!}" class="btn btn-small btn-info" target="_blank"><i class="icon-print" ></i></a>
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
