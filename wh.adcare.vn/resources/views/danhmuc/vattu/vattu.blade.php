@extends('danhmuc.danhmuc')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Vật tư<br/>
                        <small></small>
                    </h3>
                </header>
            </div>                      
        </div>
    </div>
</section>
@stop
@section('content')
<div class="span16" >
        <div class="box-header">
            <div class="row">
                <div class="span11">
                    <fieldset>
                        <a href="{!! URL::route('danhmuc.vattu.getAdd') !!}" class="btn btn-info"><i class="icon-plus"></i>&nbspThêm</a>
                        <form action="{!! URL::route('danhmuc.vattu.import') !!}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="text" name="excelfile">
                            <button type="submit"><i class="icon-plus"></i>&nbspImport Excel</button>
                        </form>
                    </fieldset>
                </div>
                <div class="" >
                    <fieldset>
                        <form action="{!! URL::route('danhmuc.vattu.search') !!}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input id="current-pass-control" name="search" class="span4" type="text" value="" autocomplete="false">

                            <button type="submit"><i class="icon-plus"></i>Tìm kiếm</button>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-hover tablesorter" id="sample-table">
            <thead style="background:#EFEFEF;">
                <tr>
                    <th class="header headerSortDown" class="span3">Mã VT</th>
                    <th class="td-actions header" class="span4">Tên VT</th>
                    <th class="td-actions header">Đơn vị tính</th>
                    <th class="td-actions header" class="span3">Nhóm vật tư</th>
                    <th class="td-actions header" class="span3">Xuất xứ</th>
                    <th class="td-actions header" class="span3">Nhà phân phối</th>
                    <th class="td-actions header">Chất lượng</th>
                    <th class="td-actions header">Model</th>
                    <th class="span2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vattu as $item)
                    <tr>
                        <td>{!! $item->vt_ma !!}</td>
                        <td>{!! $item->vt_ten !!}</td>
                        <td>
                            <?php $donvitinh = DB::table('donvitinh')->where('id',$item->dvt_id)->first(); ?>
                            @if (!empty($donvitinh->dvt_ten))
                            {!! $donvitinh->dvt_ten !!}
                            @else
                            {!! NULL !!}
                            @endif
                        </td>
                        <td>
                            <?php $nhomvattu = DB::table('nhomvattu')->where('id',$item->nvt_id)->first(); ?>
                            @if (!empty($nhomvattu->nvt_ten))
                            {!! $nhomvattu->nvt_ten !!}
                            @else
                            {!! NULL !!}
                            @endif
                        </td>
                        <td>
                            <?php $nhasanxuat = DB::table('nhasanxuat')->where('id',$item->nsx_id)->first(); ?>
                            @if (!empty($nhasanxuat->nsx_ten))
                            {!! $nhasanxuat->nsx_ten !!}
                            @else
                            {!! NULL !!}
                            @endif
                        </td>
                        <td>
                            <?php $nhaphanphoi = DB::table('nhaphanphoi')->where('id',$item->npp_id)->first(); ?>
                            @if (!empty($nhaphanphoi->npp_ten))
                            {!! $nhaphanphoi->npp_ten !!}
                            @else
                            {!! NULL !!}
                            @endif
                        </td>
                        
                        <td>
                            <?php $chatluong = DB::table('chatluong')->where('id',$item->cl_id)->first(); ?>
                            @if (!empty($chatluong->cl_ten))
                            {!! $chatluong->cl_ten !!}
                            @else
                            {!! NULL !!}
                            @endif
                        </td>
                        <td>{!! $item->vt_gia !!}</td>
                        <td class="td-actions">
                            <a href="{!! URL::route('danhmuc.vattu.getEdit' , $item->id) !!}" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"></i></a>
                            <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')"  href="{!! URL::route('danhmuc.vattu.getDelete',$item->id) !!}" class="btn btn-small btn-danger"><i class="btn-icon-only icon-remove"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    </div>
@stop
