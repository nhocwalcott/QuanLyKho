@extends('danhmuc.danhmuc')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Vật tư<br/>
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
            <form action="{!! route('danhmuc.vattu.getAdd') !!}" method="POST" accept-charset="utf-8">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="row">
            <div class="span11">
                    <div class="page-header">
                      <h3>Thông tin vật tư</h3>
                    </div>
                <div id="acct-password-row" class="span5">
                    <fieldset>
                        <div class="control-group ">
                            <label class="control-label">Mã Vật tư</label>
                            <div class="controls">
                                <input id="current-pass-control" name="txtMa" class="span4" type="text" value="{!! old('txtMa') !!}" autocomplete="false">
                                <div>
                                    {!! $errors->first('txtMa') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Tên Vật tư</label>
                            <div class="controls">
                                <input id="new-pass-control" name="txtTen" class="span4" type="text" value="{!! old('txtTen') !!}" autocomplete="false">
                                <div>
                                    {!! $errors->first('txtTen') !!}
                                </div>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Đơn vị tính</label>
                            <div class="controls">
                                <select name="selDVT" id="input" class="form-control" >
                                    <option value="">-- Chọn --</option>
                                    <?php Select_Function($donvitinh); ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Nhóm vật tư</label>
                            <div class="controls">
                                <select name="selNVT" id="input" class="form-control">
                                    <option value="">-- Chọn --</option>
                                    <?php Select_Function($nhomvattu); ?>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div id="acct-verify-row" class="span5">
                    <fieldset>
                        <div class="control-group ">
                            <label class="control-label">Xuất xứ</label>
                            <div class="controls">
                                <select name="selNSX" id="input" class="form-control">
                                    <option value="">-- Chọn --</option>
                                    <?php Select_Function($nhasanxuat); ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Nhà phân phối</label>
                            <div class="controls">
                                <select name="selNPP" id="input" class="form-control">
                                    <option value="">-- Chọn --</option>
                                    <?php Select_Function($nhaphanphoi); ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="control-group ">
                            <label class="control-label">Chất lượng</label>
                            <div class="controls">
                                <select name="selCLuong" id="input" class="form-control">
                                    <option value="">-- Chọn --</option>
                                    <?php Select_Function($chatluong); ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label">Model</label>
                            <div class="controls">
                                <input id="l" name="txtGia" class="span4" type="text" value="{!! old('txtGia') !!}" autocomplete="false">
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div> 
            <div id="acct-verify-row" class="span5">
                <div class="page-header">
                  <h3>Thông tin  kho</h3>
                </div>
                <fieldset>
                    <div class="control-group ">
                        <label class="control-label">Kho</label>
                        <div class="controls">
                            <select name="selKho" id="input" class="form-control">
                                <option value="">-- Chọn --</option>
                                <?php Select_Function($kho); ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label">Số lượng</label>
                        <div class="controls">
                            <input id="l" name="txtSLuong" class="span4" type="number" value="{!! old('txtSLuong') !!}" autocomplete="false">
                            <div>
                                {!! $errors->first('txtSLuong') !!}
                            </div>
                        </div>
                    </div>
                </fieldset>
                </div>
            </div>

            <footer id="submit-actions" class="form-actions">
                <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="icon-save"></i>&nbsp&nbspLưu&nbsp&nbsp</button>
                <button type="submit" class="btn btn-default" class="btn" name="action" value="CANCEL"><i class="icon-remove"></i>&nbsp&nbspHủy&nbsp&nbsp</button>
            </footer>
            </form>
               
        </div>
    </section>
@stop
