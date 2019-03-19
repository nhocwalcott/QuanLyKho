@extends('chucnang.chucnang')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Báo cáo<br/>
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
    @include('chucnang.blocks.dsthongke')
    <div style="margin-left:-1px" class="span13">
        <div class="box">
            <div class="box-header">
                <p><b>Tồn kho tổng hợp</b></p>
            </div>
            <div class="box-content">
                <div class="form-inline">
                    <div class="container">
                        <div class="row">
                            <div id="acct-password-row" class="span12">
                            <div style="margin-left:20px;">
                                <table class="table table-bordered table-hover tablesorter" id="sample-table">
                                    <thead style="background:#EFEFEF;">
                                        <tr>
                                            <th class="span2">Mã VT</th>
                                            <th class="span4">Tên VT</th>
                                            <th class="span2">ĐVT</th>
                                            <th class="span2">SL nhập</th>
                                            <th class="span2">SL xuất</th>
                                            <th class="span2">SL tồn</th>
                                            <th class="span2"  align="right">Đơn giá</th>
                                            <th class="span3"  align="right">Thành tiền</th>
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
                                                        )
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
                                            <td colspan="9" style="color:red;"><b>Kho hàng: {!! $item->kho_ten !!} | Tồn: {!! $tongsl !!} | Tổng giá trị: {!! number_format($tongtien[0]->thanhtien,0,".",",")  !!} vnđ </b></td>
                                        </tr>
                                        @foreach ($vattu as $val)
                                        <tr align="right">
                                            <td>{!! $val->vt_ma !!}</td>
                                            <td>{!! $val->vt_ten !!}</td>
                                            <td>{!! $val->dvt_ten !!}</td>
                                            <td>{!! $val->sl_nhap !!}</td>
                                            <td>{!! $val->sl_xuat !!}</td>
                                            <td>{!! $val->sl_ton !!}</td>
                                            <td align="right">{!! number_format($val->vt_gia,0,".",",")  !!}</td>
                                            <td align="right">{!! number_format($val->vt_gia*$val->sl_ton,0,".",",")  !!}</td>
                                        </tr>
                                          @endforeach  
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@stop
