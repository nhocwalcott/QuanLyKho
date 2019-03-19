@extends('danhmuc.danhmuc')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Kho<br/>
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
                        <a href="{!! URL::route('danhmuc.kho.getAdd') !!}" class="btn btn-info"><i class="icon-plus"></i>&nbspThêm</a>
                        <form action="{!! URL::route('danhmuc.kho.import') !!}" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                    <th class="span2">Mã Kho</th>
                    <th class="span3">Tên Kho</th>
                    <th class="span3">Liên hệ</th>
                    <th class="span4">Địa chỉ</th>
                    <th class="span2">SĐT</th>
                    <th class="span3">Quản lý</th>
                    <th class="span4">Ghi chú</th>
                    <th class="span2"></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($kho as $item)
            <tr>
                    <td>{!! $item->kho_ma !!}</td>
                    <td>{!! $item->kho_ten !!}</td>
                    <td>{!! $item->kho_lienhe !!}</td>
                    <td>{!! $item->kho_diachi !!}</td>
                    <td>{!! $item->kho_sdt !!}</td>
                    <td>{!! $item->kho_quanly !!}</td>
                    <td>{!! $item->kho_ghichu !!}</td>
                    <td class="td-actions">
                        <a href="{!! URL::route('danhmuc.kho.getEdit' , $item->id) !!}" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"></i></a>

                        <a href="{!! URL::route('danhmuc.kho.getDelete',$item->id) !!}" class="btn btn-small btn-danger">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>
            @endforeach    
            </tbody>
        </table>
    </div>
@stop
