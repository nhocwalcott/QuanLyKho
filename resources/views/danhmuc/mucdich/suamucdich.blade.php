@extends('danhmuc.mucdich.mucdich')
@section('header')
<section class="nav nav-page">
                        <div class="container">
<div class="row">
                                <div class="span7">
                                    <header class="page-header">
                                        <h3>Quản lý Mục đích<br/>
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
            <div class="alert alert-block alert-info">
                <p>
                    Enter updated security information for your account as desired.  Fields marked with an asterisk
                    are required.
                </p>
            </div>
            <div id="acct-password-row" class="span7">
                <fieldset>
                    <div class="control-group ">
                        <label class="control-label">Mã Mục đích<span class="required"></span></label>
                        <div class="controls">
                            <input id="current-pass-control" name="" class="span4" type="text" value="" autocomplete="false" disabled="true">
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">Tên Mục đích</label>
                        <div class="controls">
                            <input id="new-pass-control" name="" class="span4" type="text" value="" autocomplete="false">
                        </div>
                    </div>
                </fieldset>
                <footer id="submit-actions" class="form-actions">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="icon-save"></i>&nbsp&nbspLưu&nbsp&nbsp</button>
                        <button type="submit" class="btn btn-default" class="btn" name="action" value="CANCEL"><i class="icon-remove"></i>&nbsp&nbspHủy&nbsp&nbsp</button>
                </footer>
            </div>
        </div>
    </section>
@stop
