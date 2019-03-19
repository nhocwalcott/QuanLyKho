@extends('danhmuc.danhmuc')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Kho<br/>
                        <small>Sửa</small>
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
            <form action="" method="POST">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                <div class="row">
                    <div id="acct-password-row" class="span7">
                        <fieldset>
                            <div class="control-group ">
                                <label class="control-label">Mã Kho</label>
                                <div class="controls">
                                    <input id="current-pass-control" name="txtMa" class="span4" type="text" value="{!! $data->kho_ma !!}" disabled="true">
                                    <div>
                                        {!! $errors->first('txtMa') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Tên Kho</label>
                                <div class="controls">
                                    <input id="new-pass-control" name="txtTen" class="span4" type="text" value="{!! $data->kho_ten !!}">
                                    <div>
                                        {!! $errors->first('txtTen') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Địa chỉ</label>
                                <div class="controls">
                                    <textarea id="" name="txtDiachi" class="span4" type="text">{!! $data->kho_diachi !!}</textarea>
                                    <div>
                                        {!! $errors->first('txtDiachi') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Số điện thoại</label>
                                <div class="controls">
                                    <input id="new-pass-control" name="txtSDT" class="span4" type="text" value="{!! $data->kho_sdt !!}">
                                    <div>
                                        {!! $errors->first('txtSDT') !!}
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div id="acct-password-row" class="span7">
                        <fieldset>
                            <div class="control-group ">
                                <label class="control-label">Liên hệ</label>
                                <div class="controls">
                                    <input id="new-pass-control" name="txtLienhe" class="span4" type="text" value="{!! $data->kho_lienhe !!}">
                                    <div>
                                        {!! $errors->first('txtLienhe') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Quản lý</label>
                                <div class="controls">
                                    <input id="new-pass-control" name="txtQuanly" class="span4" type="text" value="{!! $data->kho_quanly !!}">
                                    <div>
                                        {!! $errors->first('txtQuanly') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Ghi chú</label>
                                <div class="controls">
                                    <textarea id="" name="txtGhichu" class="span4" type="text">{!! $data->kho_ghichu !!}</textarea>
                                    <div>
                                        {!! $errors->first('txtGhichu') !!}
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <footer id="submit-actions" class="form-actions">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="icon-save"></i>&nbsp&nbspLưu&nbsp&nbsp</button>
                    <a href="{!! URL::route('danhmuc.kho.getList') !!}" class="btn"><i class="icon-remove"></i>&nbsp&nbspHủy&nbsp&nbsp</a>
                </footer>
            </form>
        </div>
    </section>
@stop
