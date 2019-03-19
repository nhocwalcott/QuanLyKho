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
                    <p><b>FUNCTION</b></p>
                </div>
                <div class="box-content">
                    <form class="form-inline">
                        <p><b>EXPORT</b></p>
                        <a href="{!! URL::route('chucnang.xuatkho.getList') !!}"><i class="icon-plus"></i>&nbspXuất kho</a><br><br>
                        <p><b>DETAIL EXPORT</b></p>
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
                                    <div id="acct-password-row" class="span13">

                                        <br>


                                        <div>
                                            <table class="table table-bordered table-hover tablesorter" id="sample-table">
                                                <thead style="background:#EFEFEF;">
                                                <tr>
                                                    <th class="span1">SERIAL</th>
                                                    <th class="span1">RECEIVED</th>
                                                    <th class="span2">REALSERIAL</th>
                                                    <th class="span1">QUALITY</th>
                                                    <th class="span1">LOCATION</th>
                                                    <th class="span2">IP</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($serial as $seri)
                                                    <form action="{!! route('chucnang.xuatkho.postSerial1',$seri->serial )!!}" method="POST" accept-charset="utf-8">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <tr>
                                                        <th class="span3">{!! $seri->serial !!}</th>
                                                        <th class="span3"><input type="text" name="received" id = "received" value="{!! $seri->received !!}"></th>
                                                        <th class="span3"><input type="text" name="realserial" id = "realserial" value="{!! $seri->realserial !!}"></th>

                                                        <th>   <select name="quality" id="quality" class="quality span2">
                                                                    <option>{!! $seri->quality !!}</option>
                                                                    <option value="OK">OK</option>
                                                                    <option value="TL">TL</option>
                                                                    <option value="NG">NG</option>
                                                            </select></th>
                                                        <th class="span3"><input type="text" name="bophan" id = "bophan" value="{!! $seri->bophan !!}"></th>
                                                        <th class="span3"><input type="text" name="ip" id = "ip" value="{!! $seri->ip !!}"></th>
                                                        <th><button type="submit" class="btn btn-primary"><i class="icon-save"></i>&nbsp&nbsp&nbspLưu</button></th>
                                                    </tr>
                                                    </form>
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
