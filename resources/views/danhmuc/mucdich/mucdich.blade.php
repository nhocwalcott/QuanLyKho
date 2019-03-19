@extends('danhmuc.danhmuc')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Mục đích<br/>
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
                        <a href="{!! URL::route('danhmuc.mucdich.getAdd') !!}" class="btn btn-info"><i class="icon-plus"></i>&nbspThêm</a>
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
                    <th class="span3">Mã Mục đích</th>
                    <th>Tên Mục đích</th>
                    <th class="span2"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>data</td>
                    <td>data</td>
                    <td class="td-actions">
                        <a href="{!! URL::route('danhmuc.mucdich.getEdit') !!}" class="btn btn-small btn-info">
                            <i class="btn-icon-only icon-edit"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-small btn-danger">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>data</td>
                    <td>data</td>
                    <td class="td-actions">
                        <a href="{!! URL::route('danhmuc.mucdich.getEdit') !!}" class="btn btn-small btn-info">
                            <i class="btn-icon-only icon-edit"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-small btn-danger">
                            <i class="btn-icon-only icon-remove"></i>
                        </a>
                    </td>
                </tr>  
            </tbody>
        </table>
    </div>
@stop
