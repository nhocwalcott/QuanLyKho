@extends('chucnang.chucnang')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Xuất kho<br/>
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
                    <p><b>Xuất kho</b></p>
                        <a href="{!! URL::route('chucnang.xuatkho.getList') !!}"><i class="icon-plus"></i>&nbspXuất kho</a><br><br>
                    <p><b>Bảng kê xuất</b></p>
                        <a href="{!! URL::route('chucnang.xuatkho.getVattu') !!}"><i class="icon-plus"></i>&nbspChi tiết</a><br>
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
                                                        <th class="span2">XK_ID</th>
                                                        <th class="span2">Ngày</th>
                                                        <th class="span3">Người nhận</th>
                                                        <th class="span3">Bộ phận</th>
                                                        <th class="span3">Người xuất</th>
                                                        <th class="span3">Lý do</th>
                                                        {{--<th class="span2">Tổng tiền</th>--}}
                                                        <th class="span2"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($data as $item)
                                                <tr>
                                                        <td>{!! $item->id !!}</td>
                                                        <td>{!! $item->xk_ngaylap !!}</td>

                                                        <td>{!! $item->xk_diachi !!}</td>
                                                        <?php $ct = DB::table('congtrinh')->where('id',$item->ct_id)->first();?>
                                                        <td>{!! $ct->ct_ten !!}</td>
                                                        <?php $nv = DB::table('nhanvien')->where('id',$item->nv_id)->first();?>
                                                        <td>{!! $nv->nv_ten !!}</td>
                                                        <td>{!! $item->xk_lydo !!}</td>
                                                        {{--<td>{!! number_format("$item->xk_tongtien",0,".",",")  !!} vnd</td>--}}
                                                        <td class="td-actions">
                                                            <a href="{!! URL::route('chucnang.xuatkho.getEdit' ,$item->id) !!}" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"></i></a>
                                                            </a>
                                                            <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')"  href="{!! URL::route('chucnang.xuatkho.getDelete',$item->id) !!}" class="btn btn-small btn-danger">
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