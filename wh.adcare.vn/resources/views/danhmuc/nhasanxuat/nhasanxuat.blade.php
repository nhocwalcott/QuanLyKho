@extends('danhmuc.danhmuc')
@section('header')
    <section class="nav nav-page">
        <div class="container">
            <div class="row">
                <div class="span7">
                    <header class="page-header">
                        <h3>Quản lý Nhà sản xuất<br/>
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
                        <a href="{!! URL::route('danhmuc.nhasanxuat.getAdd') !!}" class="btn btn-info"><i class="icon-plus"></i>&nbspThêm</a>
                        <form action="{!! URL::route('danhmuc.nhasanxuat.import') !!}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="text" name="excelfile">
                            <button type="submit"><i class="icon-plus"></i>&nbspImport Excel</button>
                        </form>
                    </fieldset>
                </div>
                <div class="" >
                    <fieldset>
                        <input id="current-pass-control" name="" class="span4" type="text" value="" autocomplete="false">
                        <a href="#" class="btn btn-info" style="margin-top: -8px"><i class="icon-search"></i>Tìm kiếm</a>
                    </fieldset>
                </div>
            </div>
            
        </div>
        <table class="table table-bordered table-hover tablesorter" id="sample-table">
            <thead style="background:#EFEFEF;">
                <tr>
                    <th class="span3">Mã Nhà sản xuất</th>
                    <th class="span4">Tên Nhà sản xuất</th>
                    <th class="span4">Khu vực</th>
                    <th class="span2"></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($nhasanxuat as $item)
            <tr>
                    <td>{!! $item->nsx_ma !!}</td>
                    <td>{!! $item->nsx_ten !!}</td>
                    <td>
                        <?php $khuvuc = DB::table('khuvuc')->where('id',$item->kv_id)->first(); ?>
                    @if (!empty($khuvuc->kv_ten))
                        {!! $khuvuc->kv_ten !!}
                    @else
                        {!! NULL !!}
                    @endif
                    </td>
                    <td class="td-actions">
                        <a href="{!! URL::route('danhmuc.nhasanxuat.getEdit' , $item->id) !!}" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"></i></a>

                        <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')"  href="{!! URL::route('danhmuc.nhasanxuat.getDelete',$item->id) !!}" class="btn btn-small btn-danger">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>
            @endforeach    
            </tbody>
        </table>
    </div>
@stop
