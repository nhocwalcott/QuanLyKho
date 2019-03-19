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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('hethong.doimatkhau.getEdit') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div id="acct-password-row" class="span7">
                            <div class="control-group ">
                                <label class="control-label">Mật khẩu cũ</label>
                                <div class="controls">
                                    <input id="" name="mkcu" class="span5" type="password" value="" autocomplete="false">
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Mật khẩu mới</label>
                                <div class="controls">
                                    <input id="" name="mkmoi" class="span5" type="password" value="" autocomplete="false">
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Xác nhận mật khẩu mới</label>
                                <div class="controls">
                                    <input id="" name="xacnhan" class="span5" type="password" value="" autocomplete="false">
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer id="submit-actions" class="form-actions">
                        <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM">Lưu</button>
                        <button type="reset" class="btn" name="action" value="CANCEL">Hủy</button>
                    </footer>
                    </form>
                </div>
    </section>
@stop
