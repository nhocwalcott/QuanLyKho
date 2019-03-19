@extends('danhmuc.danhmuc')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Nhân viên<br/>
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
                                <label class="control-label">Mã Nhân viên</label>
                                <div class="controls">
                                    <input id="current-pass-control" name="txtMa" class="span4" type="text" disabled="true" value="{!! $nhanvien->nv_ma !!}">
                                    <div>
                                        {!! $errors->first('txtMa') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Tên Nhân viên</label>
                                <div class="controls">
                                    <input id="current-pass-control" name="txtTen" class="span4" type="text" value="{!! $nhanvien->nv_ten !!}">
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
                                <label class="control-label">Ngày sinh</label>
                                <div class="controls">
                                    <input id="" name="dateNgaysinh" class="span4" type="date" value="">
                                    <div>
                                        {!! $errors->first('dateNgaysinh') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Địa chỉ</label>
                                <div class="controls">
                                    <textarea id="" name="txtDiachi" class="span4" rows="3" type="text">{!! $nhanvien->nv_diachi !!}</textarea>
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
                                <label class="control-label">CMND</label>
                                <div class="controls">
                                    <input id="current-pass-control" name="txtCMND" class="span4" type="text" value="{!! $nhanvien->nv_cmnd !!}">
                                    <div>
                                        {!! $errors->first('txtCMND') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">SĐT</label>
                                <div class="controls">
                                    <input id="current-pass-control" name="txtSDT" class="span4" type="text" value="{!! $nhanvien->nv_sdt !!}">
                                    <div>
                                        {!! $errors->first('txtSDT') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input id="current-pass-control" name="txtEmail" class="span4" type="text" value="{!! $nhanvien->nv_email !!}">
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
                </div>
                <footer id="submit-actions" class="form-actions">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="icon-save"></i>&nbsp&nbspLưu&nbsp&nbsp</button>
                    <a href="{!! URL::route('danhmuc.nhanvien.getList') !!}" class="btn"><i class="icon-remove"></i>&nbsp&nbspHủy&nbsp&nbsp</a>
                </footer>
            </form>
        </div>
    </section>
@stop
