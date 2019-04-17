@extends('chucnang.chucnang')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Kho hàng<br/>
                        <small></small>
                    </h3>
                </header>
            </div>                      
        </div>
    </div>
</section>
@stop
@section('content')
    <div class="row">
        <div class="span16">
            <div class="box">
                <div class="box-header">
                    <p><b>Bảng kê Kho hàng</b></p>
                </div>
                <div class="box-content">
                    <form class="form-inline">
                        <div class="container">
                            <div class="row">
                                <div id="acct-password-row" class="span15">

                                    <div class="" >
                                        <fieldset>
                                            <input id="current-pass-control" name="" class="span4" type="text" value="" autocomplete="false">
                                            <a href="{!! URL::route('chucnang.khohang.getExport') !!}" class="btn btn-info" style="margin-top: -8px"><i class="icon-search"></i>Export Excel</a>
                                        </fieldset>
                                    </div>
                                        <br>
                                        <div>
                                            <a href="{{ route('export') }}" class="btnprn btn">Print Preview</a></center>
                                            <script type="text/javascript">
                                                $(document).ready(function(){
                                                    $('.btnprn').printPage();
                                                });
                                            </script>

                                            <table class="table table-bordered table-hover tablesorter" id="sample-table">
                                                <thead style="background:#EFEFEF;">
                                                    <tr>
                                                        <th class="span2">Mã VT</th>
                                                        <th class="span4">Tên VT</th>
                                                        <th class="span2">ĐVT</th>
                                                        <th class="span2">SL nhập</th>
                                                        <th class="span2">SL xuất</th>
                                                        <th class="span2">SL tồn</th>
                                                        <th class="span2">SL NG</th>
                                                        <th class="span2">SL TL</th>
                                                        <th class="span2">SL OK</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="9" style="color:red;"><b>Kho hàng:  | Tồn: {!! $tongsl !!}   </b></td>
                                                    </tr>
                                                    @foreach ($vattukho as $val)
                                                    <tr>
                                                        <td>{!! $val->vt_ma !!}</td>
                                                        <td>{!! $val->vt_ten !!}</td>
                                                        <td>{!! $val->dvt_ten !!}</td>
                                                        <td>{!! $val->sl_nhap !!}</td>
                                                        <td>{!! $val->sl_xuat !!}</td>
                                                        <td>{!! $val->sl_ton !!}</td>

                                                        <?php
														$ok = DB::table('serial')->where('serial.vt_id',$val->id)->where('quality',"OK")->where('ctxk_id','')->count();
                                                        $ng = DB::table('serial')->where('serial.vt_id',$val->id)->where('quality',"NG")->count();
                                                        $tl = DB::table('serial')->where('serial.vt_id',$val->id)->where('quality',"TL")->count();
                                                        ?>
                                                        <td>{!! $ng !!}</td>
                                                        <td>{!! $tl !!}</td>
                                                        <td>{!! $ok!!}</td>
                                                    </tr>
                                                      @endforeach
                                                    
                                                </tbody>
                                            </table>

                                        </div>
                                    <tr>
                                        <ul class="pagination pagination-sm">
                                            <li class="page-item"><a class="page-link" href="#">{!! $vattukho->render(); !!}</a></li>
                                        </ul>
                                    </tr>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
