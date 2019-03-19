@extends('chucnang.chucnang')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Chuyển kho<br/>
                        <small>Xem Theo vật tư</small>
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
                    <div class="form-inline">
                        <p><b>Chuyển kho</b></p>
                            <a href="{!! URL::route('chucnang.chuyenkho.getList') !!}"><i class="icon-plus"></i>&nbspChuyển kho</a><br><br>
                        <p><b>Bảng kê chuyển</b></p>
                            <a href="{!! URL::route('chucnang.chuyenkho.getVattu') !!}"><i class="icon-plus"></i>&nbspTheo vật tư</a><br>
                            <a href="{!! URL::route('chucnang.chuyenkho.getChungtu') !!}"><i class="icon-plus"></i>&nbspTheo chứng từ</a><br>
                    </div>
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
                                                        <th class="span2">Mã CK</th>
                                                        <th class="span2">Mã VT</th>
                                                        <th class="span4">Tên VT</th>
                                                        <th class="span2">Số lượng</th>
                                                        <th class="span2">ĐVT</th>
                                                        <th class="span2">Từ kho</th>
                                                        <th class="span2">Đến kho</th>
                                                        <th class="span3">Thành tiền</th>
                                                        <th class="span2"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($chuyenkho as $item)
                                                    <tr>
                                                        <?php 
                                                            $count = DB::table('chitietchuyenkho')->where('ck_id',$item->id)->count();
                                                            $chitiet = DB::table('chitietchuyenkho')->where('ck_id',$item->id)->get();
                                                        ?>
                                                        <td>{!! $item->id !!}</td>
                                                        @foreach ($chitiet as $val)
                                                        <?php 
                                                            $vt = DB::table('vattu')->where('id',$val->vt_id)->first(); 
                                                            $dvt = DB::table('donvitinh')->where('id',$vt->dvt_id)->first();
                                                            $kho1 = DB::table('kho')->where('id', $val->khocu_id)->first();
                                                            $kho2 = DB::table('kho')->where('id', $val->khomoi_id)->first(); 
                                                        ?>
                                                        <td>{!! $val->vt_id !!}</td>
                                                        <td>{!! $vt->vt_ten !!}</td>
                                                        <td>{!! $val-> ctck_soluong !!}</td>
                                                        <td>{!! $dvt->dvt_ten !!}</td>
                                                        <td>{!! $kho1->kho_ten !!}</td>
                                                        <td>{!! $kho2->kho_ten !!}</td>
                                                        <td>{!! number_format("$val->ctck_thanhtien",0,".",",")  !!} vnđ</td>
                                                        @endforeach
                                                        <td class="td-actions">
                                                            <a href="{!! URL::route('chucnang.chuyenkho.getEdit1' ,$item->id) !!}" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"></i>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
