@extends('hethong.hethong')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Thông tin công ty<br/>
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
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.731909998869!2d105.78519811426185!3d10.038967375117867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a062a7ec2bca09%3A0x9a8a478e313554e9!2zQ8O0bmcgVHkgxJBp4buHbiBs4buxYyBUUCBD4bqnbiBUaMah!5e0!3m2!1svi!2s!4v1467338005882"width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        <div class="container">
                    @foreach ($thongtincongty as $item)
                        <div class="row">
                        <div id="acct-password-row" class="span7">
                            <div class="control-group ">
                                <label class="control-label">Tên công ty</label>
                                <div class="controls">
                                    <input class="span8" type="text" name="" value="{!! $item->cty_ten !!}">
                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Địa chỉ</label>
                                <div class="controls">
                                    <input class="span8" type="text" name="" value="{!! $item->cty_diachi !!}">
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
                                       <input class="span4" type="text" name="" value="{!! $item->cty_sdt !!}">
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Số Fax</label>
                                    <div class="controls">
                                       <input class="span4" type="text" name="" value="{!! $item->cty_fax !!}">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span4  ">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Website</label>
                                    <div class="controls">
                                       <input class="span4" type="text" name="" value="{!! $item->cty_web !!}">
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input class="span4" type="text" name="" value="{!! $item->cty_email !!}">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    
                    @endforeach
                    <footer id="submit-actions" class="form-actions">
                        <a href="{!! URL::route('hethong.thongtincongty.getEdit' , $item->id) !!}" class="btn btn-info"><i class="btn-icon-only icon-edit"></i>&nbsp&nbspSửa</a>
                    </footer>
        </div>
    </section>
@stop
