@extends('danhmuc.danhmuc')
@section('header')
<section class="nav nav-page">
                        <div class="container">
<div class="row">
                                <div class="span7">
                                    <header class="page-header">
                                        <h3>Quản lý Khu vực<br/>
                                            <small>Thêm</small>
                                        </h3>
                                    </header>
                                </div>
                                
                            </div>
                            </div>
                            </section>

@stop
@section('content')
    <section>
        <div class="container">
            <form action="{!! route('danhmuc.khuvuc.getAdd') !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div id="acct-password-row" class="span7">
                <fieldset>
                    <div class="control-group ">
                        <label class="control-label">Mã Khu vực</label>
                        <div class="controls">
                            <input id="current-pass-control" name="txtMa" class="span4" type="text" value="{!! old('txtMa') !!}" autocomplete="false">
                            <div>
                                {!! $errors->first('txtMa') !!}
                            </div>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">Tên Khu vực</label>
                        <div class="controls">
                            <input id="new-pass-control" name="txtTen" class="span4" type="text" value="{!! old('txtTen') !!}" autocomplete="false">
                            <div>
                                {!! $errors->first('txtTen') !!}
                            </div>
                        </div>
                    </div>
                </fieldset>
                <footer id="submit-actions" class="form-actions">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="icon-save"></i>&nbsp&nbspLưu&nbsp&nbsp</button>
                        <a href="{!! URL::route('danhmuc.khuvuc.getList') !!}" class="btn"><i class="icon-remove"></i>&nbsp&nbspHủy&nbsp&nbsp</a>
                </footer>
            </div>
            </form>
        </div>
    </section>
@stop
