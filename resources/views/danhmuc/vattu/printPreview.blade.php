@extends('danhmuc.danhmuc')
@section('header')
    <section class="nav nav-page">
        <div class="container">
            <div class="row">
                <div class="span7">
                    <header class="page-header">
                        <h3>Quản lý SERIAL<br/>
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
                        <a href="{!! URL::route('danhmuc.congtrinh.getAdd') !!}" class="btn btn-info"><i class="icon-plus"></i>&nbspThêm</a>
                        <form action="{!! URL::route('danhmuc.congtrinh.import') !!}" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                <th class="span2">Serial</th>
                <th class="span2">Tên Bộ phận</th>
                <th class="span2">Nguoi nhan</th>
                <th class="span2">IP</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($serial as $sr)
                <tr>
                    <td>{!! $sr->serial !!}</td>
                    <td>{!! $sr->bophan!!}</td>
                    <td>{!! $sr->received !!}</td>
                    <td>{!! $sr->ip !!}</td>
                    {{--<td class="td-actions">--}}
                        {{--<a href="{!! URL::route('danhmuc.congtrinh.getEdit' , $sr->id) !!}" class="btn btn-small btn-info"><i class="btn-icon-only icon-edit"></i></a>--}}

                        {{--<a href="{!! URL::route('danhmuc.congtrinh.getDelete',$sr->id) !!}" class="btn btn-small btn-danger">--}}
                            {{--<i class="btn-icon-only icon-remove"></i>--}}
                        {{--</a>--}}
                    {{--</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
