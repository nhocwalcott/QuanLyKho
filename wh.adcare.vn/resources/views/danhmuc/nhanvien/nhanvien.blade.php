@extends('danhmuc.danhmuc')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Nhân viên<br/>
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
                        <a href="{!! URL::route('danhmuc.nhanvien.getAdd') !!}" class="btn btn-info"><i class="icon-plus"></i>&nbspThêm</a>
                        <a href="#" class="btn btn-info"><i class="icon-print"></i>&nbsp&nbspIn&nbsp&nbsp&nbsp&nbsp&nbsp</a>
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
                    <th class="span">Mã NV</th>
                    <th class="span">Tên NV</th>
                    <th class="span">Giới tính</th>
                    <th class="span">Ngày sinh</th>
                    <th class="span">Địa chỉ</th>
                    <th class="span">CMND</th>
                    <th class="span">SĐT</th>
                    <th class="span">Email</th>
                    <th class="span">Ngày vào làm</th>
                    <th class="span"></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($nhanvien as $item)
            <tr>
                    <td>{!! $item->nv_ma !!}</td>
                    <td>{!! $item->nv_ten !!}</td>
                    <td>{!! $item->nv_gioitinh !!}</td>
                    <td>{!! $item->nv_ngaysinh !!}</td>
                    <td>{!! $item->nv_diachi !!}</td>
                    <td>{!! $item->nv_cmnd !!}</td>
                    <td>{!! $item->nv_sdt !!}</td>
                    <td>{!! $item->nv_email !!}</td>
                    <td>{!! $item->nv_ngayvaolam !!}</td>
                    
                    <td class="td-actions">
                        <a href="{!! URL::route('danhmuc.nhanvien.getEdit' , $item->id) !!}" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"></i></a>
                        <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')"  href="{!! URL::route('danhmuc.nhanvien.getDelete',$item->id) !!}" class="btn btn-small btn-danger">
                            <i class="btn-icon-only icon-remove"></i>

                        </a>
                    </td>
                </tr>
            @endforeach    
            </tbody>
        </table>
    </div>
@stop
