@extends('danhmuc.danhmuc')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Nhà phân phối<br/>
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
                            <label class="control-label">Mã Nhà phân phối</label>
                            <div class="controls">
                                <input id="current-pass-control" name="txtMa" class="span4" type="text" disabled="true" value="{!! $nhaphanphoi->npp_ma !!}">
                                <div>
                                    {!! $errors->first('txtMa') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Tên Nhà phân phối</label>
                            <div class="controls">
                                <input id="current-pass-control" name="txtTen" class="span4" type="text" value="{!! $nhaphanphoi->npp_ten !!}">
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
                                    <?php Select_Function($khuvuc,$nhaphanphoi->kv_id); ?>
                                </select>
                                <div>
                                    {!! $errors->first('selKV') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Địa chỉ</label>
                            <div class="controls">
                                <textarea id="" name="txtDiachi" class="span4" rows="4" type="text">{!! $nhaphanphoi->npp_diachi !!}</textarea>
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
                                <input id="current-pass-control" name="txtSDT" class="span4" type="text" value="{!! $nhaphanphoi->npp_sdt !!}">
                                <div>
                                    {!! $errors->first('txtSDT') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">FAX</label>
                            <div class="controls">
                                <input id="current-pass-control" name="txtFAX" class="span4" type="text" value="{!! $nhaphanphoi->npp_fax !!}">
                                <div>
                                    {!! $errors->first('txtFAX') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input id="current-pass-control" name="txtEmail" class="span4" type="text" value="{!! $nhaphanphoi->npp_email !!}">
                                <div>
                                    {!! $errors->first('txtEmail') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Tài khoản</label>
                            <div class="controls">
                                <input id="current-pass-control" name="txtTaikhoan" class="span4" type="text" value="{!! $nhaphanphoi->npp_taikhoan !!}">
                                <div>
                                    {!! $errors->first('txtTaikhoan') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">NV Đại diện</label>
                            <div class="controls">
                                <input id="current-pass-control" name="txtNhanviendaidien" class="span4" type="text" value="{!! $nhaphanphoi->npp_nhanviendaidien !!}">
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
            </form>
        </div>
    </section>
@stop
