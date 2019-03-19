@extends('danhmuc.danhmuc')
@section('header')
<section class="nav nav-page">
<div class="container">
<div class="row">
    <div class="span7">
        <header class="page-header">
            <h3>Quản lý Nhân viên<br/>
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
        <form action="{!! route('danhmuc.nhanvien.getAdd') !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="row">
                <div id="acct-password-row" class="span5">
                    <fieldset>
                        <div class="control-group ">
                            <label class="control-label">Mã Nhân viên</label>
                            <div class="controls">
                                <input id="current-pass-control" name="txtMa" class="span4" type="text" value="{!! old('txtMa') !!}" autocomplete="false">
                                <div>
                                    {!! $errors->first('txtMa') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Tên Nhân viên</label>
                            <div class="controls">
                                <input id="new-pass-control" name="txtTen" class="span4" type="text" value="{!! old('txtTen') !!}" autocomplete="false">
                                <div>
                                    {!! $errors->first('txtTen') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label>Giới tính</label>
                                <div class="input-group">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="rdGioitinh" id="inputRdGioitinh" value="Nam" checked="checked">
                                                Nam
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="rdGioitinh" id="inputRdGioitinh" value="Nữ" >
                                                Nữ
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Địa chỉ</label>
                            <div class="controls">
                                <textarea id="" name="txtDiachi" class="span4" rows="3" type="text">{!! old('txtDiachi') !!}</textarea>
                                <div>
                                    {!! $errors->first('txtDiachi') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Ngày sinh</label>
                            <div class="controls">
                                <input id="" name="dateNgaysinh" class="span4" type="date" value="">
                                <div>
                                    {!! $errors->first('dateNgaysinh') !!}
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div id="acct-verify-row" class="span5">
                    <fieldset>
                        <div class="control-group ">
                            <label class="control-label">CMND</label>
                            <div class="controls">
                                <input id="current-pass-control" name="txtCMND" class="span4" type="text" value="{!! old('txtCMND') !!}">
                                <div>
                                    {!! $errors->first('txtCMND') !!}
                                </div>
                            </div>
                        </div>
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
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input id="current-pass-control" name="txtEmail" class="span4" type="text" value="{!! old('txtEmail') !!}">
                                <div>
                                    {!! $errors->first('txtEmail') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Ngày vào làm</label>
                            <div class="controls">
                                <input id="" name="dateNVL" class="span4" type="date" value="">
                                <div>
                                    {!! $errors->first('dateNVL') !!}
                                </div>
                            </div>
                        </div>
                        
                    </fieldset>
                    </div>
                    <div id="acct-verify-row" class="span4">
                        <fieldset>
                            <div class="form-group">
                            <label class="col-md-4 control-label">Tài khoản</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                            <div class="form-group">
                            <label class="col-md-4 control-label">Mật khẩu</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Xác nhận lại mật khẩu</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                            <div class="control-group ">
                                    <label class="control-label">Quyền</label>
                                    <div class="controls">
                                        <select class="span4" name="selQuyen"  id="input" class="form-control" >
                                            <option>--Chọn--</option>
                                            <?php Select_Function($nguoidung );?>
                                        </select>
                                    </div>
                                </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <footer id="submit-actions" class="form-actions">
                <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="icon-save"></i>&nbsp&nbspLưu&nbsp&nbsp</button>
                <a href="{!! URL::route('danhmuc.nhanvien.getList') !!}" class="btn"><i class="icon-remove"></i>&nbsp&nbspHủy&nbsp&nbsp</a>
            </footer>
        </form>
    </div>
</section>
@stop
