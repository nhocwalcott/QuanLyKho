@extends('trogiup.trogiup')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Liên hệ<br/>
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
            <form action="{!! route('trogiup.getLienhe') !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="row">
                <div id="acct-password-row" class="span14">
                <fieldset>
                    <div class="control-group ">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input id="current-pass-control" name="txtEmail" class="span4" type="text" value="{{ Auth::user()->email }}" autocomplete="false">
                            
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">Nhân viên: </label>
                        <div class="controls">
                            <input id="new-pass-control" name="txtTen" class="span4" type="text" value="{{ Auth::user()->name }}" autocomplete="false">
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">Nội dung</label>
                        <div class="controls">
                            <textarea id="" name="txtNoidung" class="span4" rows="4" type="text"></textarea>
                            
                        </div>
                    </div>
                </fieldset>
                </div>
            </div>
            <footer id="submit-actions" class="form-actions">
                <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="icon-save"></i>&nbsp&nbspGửi&nbsp&nbsp</button>
                <!-- <a href="{!! URL::route('danhmuc.nhaphanphoi.getList') !!}" class="btn"><i class="icon-remove"></i>&nbsp&nbspHủy&nbsp&nbsp</a> -->
            </footer>
            </div>
        </form>
    </section>
@stop
