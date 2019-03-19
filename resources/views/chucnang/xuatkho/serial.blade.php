@extends('chucnang.chucnang')
@section('header')
    <section class="nav nav-page">
        <div class="container">
            <div class="row">
                <div class="span7">
                    <header class="page-header">
                        <h3>SERIAL MANAGER<br/>
                            <small>SERIAL-IP</small>
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
                        <a href="{!! URL::route('chucnang.xuatkho.getVattu') !!}"><i class="icon-plus"></i>&nbspChi tiết phiếu</a><br>
                        <a href="{!! URL::route('chucnang.xuatkho.getChungtu') !!}"><i class="icon-plus"></i>&nbspDanh sách phiếu xuất</a><br>
                    </form>
                </div>
            </div>
        </div>
        <div style="margin-left:-1px" class="span13">
            <div class="box">
                <div class="box-header">
                    <p><b>SERIAL DETAIL</b></p>
                </div>
                <div class="box-content">
                    <div class="form-inline">
                        <div class="container">
                            <div class="row">
                                <div id="acct-password-row" class="span13">
                                    <div id="acct-password-row" class="span12">

                                        <br>
                                        <form action="{!! route('chucnang.xuatkho.postSerial',$ttxuat->id) !!}" method="POST" accept-charset="utf-8">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <div>
                                            <table class="table table-bordered table-hover tablesorter" id="sample-table">
                                                <thead style="background:#EFEFEF;">
                                                <tr>
                                                    <th class="span2">SERIAL</th>
                                                    <th class="span2">DEPT CODE</th>
                                                    <th class="span3">CHECK</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($seriallist as $seri)
                                                    <tr>
                                                    <th class="span3">{!! $seri->serial !!}</th>
                                                        <th class="span3">{!! $seri->bophan !!}</th>
                                                    <th class="span1"><input type="checkbox" name="status[]" id="status" class="status" value = "{!! $seri->serial !!}"></th>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div>
                                                <button type="submit" class="btn btn-primary"><i class="icon-save"></i>&nbsp&nbsp&nbspLưu</button>
                                            </div>
                                            </div>
                                        </form>
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
