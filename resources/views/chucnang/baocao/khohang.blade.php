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

                                                @foreach ($data as $item)
                                                    <?php 
                                                            $vattu = DB::table('vattukho')
                                                                ->where('vattukho.kho_id',$item->id)
                                                                ->join('vattu','vattu.id','=','vattukho.vt_id')
                                                                ->join('donvitinh','donvitinh.id','=','vattu.dvt_id')
                                                                ->select(
                                                                    'vattukho.sl_nhap','vattukho.sl_xuat',
                                                                    'vattukho.sl_ton','donvitinh.dvt_ten',
                                                                    'vattu.id','vattu.vt_ma','vattu.vt_ten',
                                                                    'vattu.vt_gia','vattu.created_at'
                                                                    )->orderByRaw('vattukho.sl_ton DESC')
                                                                ->get();
                                                            $tongsl = DB::table('vattukho')
                                                                ->where('vattukho.kho_id',$item->id)
                                                                ->sum('sl_ton');
                                                            $tongtien = DB::table('vattukho')
                                                                ->where('vattukho.kho_id',$item->id)
                                                                ->join('vattu','vattu.id','=','vattukho.vt_id')
                                                                ->select(DB::raw('sum(vattukho.sl_ton*vattu.vt_gia) as thanhtien') )
                                                                ->get();

                                                        ?>
                                                    <tr>
                                                        <td colspan="9" style="color:red;"><b>Kho hàng: {!! $item->kho_ten !!} | Tồn: {!! $tongsl !!}   </b></td>
                                                    </tr>
                                                    @foreach ($vattu as $val)
                                                    <tr>
                                                        <td>{!! $val->vt_ma !!}</td>
                                                        <td>{!! $val->vt_ten !!}</td>
                                                        <td>{!! $val->dvt_ten !!}</td>
                                                        <td>{!! $val->sl_nhap !!}</td>
                                                        <td>{!! $val->sl_xuat !!}</td>
                                                        <td>{!! $val->sl_ton !!}</td>

                                                        <?php
                                                        $ng = DB::table('serial')->where('serial.vt_id',$val->id)->where('quality',"NG")->count();
                                                        $tl = DB::table('serial')->where('serial.vt_id',$val->id)->where('quality',"TL")->count();
                                                        ?>
                                                        <td>{!! $ng !!}</td>
                                                        <td>{!! $tl !!}</td>
                                                        <td>{!! $val->sl_ton- $ng!!}</td>
                                                    </tr>
                                                      @endforeach  
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
