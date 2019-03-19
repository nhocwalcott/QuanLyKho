@extends('hethong.hethong')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Tạo tài khoản người dùng<br/>
                        <small></small>
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
                    <div class="row">
                        <div id="acct-password-row" class="span7">
                            <div class="control-group ">
                                <label class="control-label">Nhân viên</label>
                                <div class="controls">
                                    <select class="span4">
                                        <option>--Chọn--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Mật khẩu</label>
                                <div class="controls">
                                    <input id="" name="" class="span4" type="password" value="" autocomplete="false">
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Xác nhận mật khẩu</label>
                                <div class="controls">
                                    <input id="" name="" class="span4" type="password" value="" autocomplete="false">
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer id="submit-actions" class="form-actions">
                        <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM">Lưu</button>
                        <button type="submit" class="btn" name="action" value="CANCEL">Hủy</button>
                    </footer>
                </div>
    </section>
@stop
