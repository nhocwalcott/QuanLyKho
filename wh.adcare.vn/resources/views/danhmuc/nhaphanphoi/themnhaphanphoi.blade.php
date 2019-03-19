@extends('danhmuc.danhmuc')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Nhà phân phối<br/>
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
            <form action="{!! route('danhmuc.nhaphanphoi.getAdd') !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="row">
                <div id="acct-password-row" class="span7">
                <fieldset>
                    <div class="control-group ">
                        <label class="control-label">Mã Nhà phân phối</label>
                        <div class="controls">
                            <input id="current-pass-control" name="txtMa" class="span4" type="text" value="{!! old('txtMa') !!}" autocomplete="false">
                            <div>
                                {!! $errors->first('txtMa') !!}
                            </div>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">Tên Nhà sản xuất</label>
                        <div class="controls">
                            <input id="new-pass-control" name="txtTen" class="span4" type="text" value="{!! old('txtTen') !!}" autocomplete="false">
                            <div>
                                {!! $errors->first('txtTen') !!}
                            </div>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">Khu vực</label>
                        <div class="controls">
                            <select name="selKV" id="input" class="form-control">
                                <option value="">-- Chọn --</option>
                                <?php Select_Function($khuvuc); ?>
                            </select>
                            <div>
                                {!! $errors->first('selKV') !!}
                            </div>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">Địa chỉ</label>
                        <div class="controls">
                            <textarea id="" name="txtDiachi" class="span4" rows="4" type="text">{!! old('txtDiachi') !!}</textarea>
                            <div>
                                {!! $errors->first('txtDiachi') !!}
                            </div>
                        </div>
                    </div>
                </fieldset>
                </div>
                <div id="acct-verify-row" class="span9">
                    <fieldset>
                        <div class="control-group ">
                            <label class="control-label">SĐT</label>
                            <div class="controls">
                                <input id="current-pass-control" name="txtSDT" class="span4" type="text" value="{!! old('txtSDT') !!}">
                                <div>
                                    {!! $errors->first('txtSDT') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">FAX</label>
                            <div class="controls">
                                <input id="current-pass-control" name="txtFAX" class="span4" type="text" value="{!! old('txFAX') !!}">
                                <div>
                                    {!! $errors->first('txtFAX') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input id="current-pass-control" name="txtEmail" class="span4" type="text" value="{!! old('txtEmail') !!}">
                                <div>
                                    {!! $errors->first('txtEmail') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Tài khoản</label>
                            <div class="controls">
                                <input id="current-pass-control" name="txtTaikhoan" class="span4" type="text" value="{!! old('txtTaikhoan') !!}">
                                <div>
                                    {!! $errors->first('txtTaikhoan') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">NV Đại diện</label>
                            <div class="controls">
                                <input id="current-pass-control" name="txtNhanviendaidien" class="span4" type="text" value="{!! old('txtNhanviendaidien') !!}">
                                <div>
                                    {!! $errors->first('txtNhanviendaidien') !!}
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <footer id="submit-actions" class="form-actions">
                <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="icon-save"></i>&nbsp&nbspLưu&nbsp&nbsp</button>
                <a href="{!! URL::route('danhmuc.nhaphanphoi.getList') !!}" class="btn"><i class="icon-remove"></i>&nbsp&nbspHủy&nbsp&nbsp</a>
            </footer>
            </div>
        </form>
    </section>
@stop
