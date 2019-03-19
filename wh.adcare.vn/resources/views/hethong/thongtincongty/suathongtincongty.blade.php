@extends('hethong.hethong')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Thông tin công ty<br/>
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
                            <div class="control-group ">
                                <label class="control-label">Tên công ty</label>
                                <div class="controls">
                                    <input id="" name="txtTen" class="span8" type="text" value="{!! $thongtincongty->cty_ten !!}" autocomplete="false">
                                    <div>
                                        {!! $errors->first('txtTen') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Địa chỉ</label>
                                <div class="controls">
                                    <input id="" name="txtDiachi" class="span8" type="text" value="{!! $thongtincongty->cty_diachi !!}" autocomplete="false">
                                    <div>
                                        {!! $errors->first('txtDiachi') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="acct-password-row" class="span4">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Số điện thoại</label>
                                    <div class="controls">
                                        <input id="" name="txtSDT" class="span4" type="text" value="{!! $thongtincongty->cty_sdt !!}" autocomplete="false">
                                        <div>
                                            {!! $errors->first('txtSDT') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Số Fax</label>
                                    <div class="controls">
                                        <input id="" name="txtFAX" class="span4" type="text" value="{!! $thongtincongty->cty_fax !!}" autocomplete="false">
                                        <div>
                                            {!! $errors->first('txtFAX') !!}
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span4  ">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Website</label>
                                    <div class="controls">
                                        <input id="" name="txtWEB" class="span4" type="text" value="{!! $thongtincongty->cty_web !!}" autocomplete="false">
                                        <div>
                                            {!! $errors->first('txtWEB') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input id="" name="txtEmail" class="span4" type="text" value="{!! $thongtincongty->cty_email !!}" autocomplete="false">
                                        <div>
                                            {!! $errors->first('txtEmail') !!}
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <footer id="submit-actions" class="form-actions">
                        <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM">Lưu</button>
                        <button type="submit" class="btn" name="action" value="CANCEL">Hủy</button>
                    </footer>
            </form>
        </div>
    </section>
@stop
