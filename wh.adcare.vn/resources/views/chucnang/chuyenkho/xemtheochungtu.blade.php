@extends('chucnang.chucnang')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Chuyển kho<br/>
                        <small>Xem Theo chứng từ</small>
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
                        <p><b>Chuyển kho</b></p>
                            <a href="{!! URL::route('chucnang.chuyenkho.getList') !!}"><i class="icon-plus"></i>&nbspChuyển kho</a><br><br>
                        <p><b>Bảng kê Chuyển</b></p>
                            <a href="{!! URL::route('chucnang.chuyenkho.getVattu') !!}"><i class="icon-plus"></i>&nbspTheo vật tư</a><br>
                            <a href="{!! URL::route('chucnang.chuyenkho.getChungtu') !!}"><i class="icon-plus"></i>&nbspTheo chứng từ</a><br>
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
                                                        <th class="span2">Mã</th>
                                                        <th class="span3">Ngày</th>
                                                        <th class="span5">Nhân viên</th>
                                                        <th class="span3">Tổng tiền</th>
                                                        <th class="span2"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>{!! $item->ck_ma !!}</td>
                                                        <td>{!! $item->ck_ngay !!}</td>
                                                        <?php $user = DB::table('nhanvien')->where('id',$item->nv_id)->first(); ?>
                                                        <td>{!! $user->nv_ten!!}</td>
                                                        <td>{!! number_format("$item->ck_tongtien",0,".",",")  !!} vnd</td>
                                                        <td class="td-actions">
                                                            <a href="{!! URL::route('chucnang.chuyenkho.getEdit' ,$item->id) !!}" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"></i></a>
                                                            </a>
                                                            <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')"  href="{!! URL::route('chucnang.chuyenkho.getDelete' ,$item->id) !!}" class="btn btn-small btn-danger">
                                                                <i class="btn-icon-only icon-remove"></i>
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
