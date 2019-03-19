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
                <p><b>Tồn kho theo nhóm vật tư</b></p>
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
                                            <th class="span3"  align="right">Tổng giá trị</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach ($data as $item)
                                        <?php 
                                                $vattu = DB::table('vattu')
                                                    ->where('vattu.nvt_id',$item->id)
                                                    ->join('vattukho','vattu.id','=','vattukho.vt_id')
                                                    ->join('donvitinh','donvitinh.id','=','vattu.dvt_id')
                                                    ->select(
                                                        DB::raw('sum(vattukho.sl_nhap) as nhap'),
                                                        DB::raw('sum(vattukho.sl_xuat) as xuat'),
                                                        DB::raw('sum(vattukho.sl_ton) as ton'),
                                                        'donvitinh.dvt_ten',
                                                        'vattu.id','vattu.vt_ma','vattu.vt_ten',
                                                        'vattu.vt_gia','vattu.created_at'
                                                        )
                                                    ->get();
                                                $count = DB::table('vattu')
                                                    ->where('vattu.nvt_id',$item->id)
                                                    ->count();
                                                $tong = DB::table('vattu')
                                                    ->where('vattu.nvt_id',$item->id)
                                                    ->join('vattukho','vattu.id','=','vattukho.vt_id')
                                                    ->select(
                                                        DB::raw('(vattukho.sl_ton*vattu.vt_gia) as thanhtien')
                                                        )
                                                    ->sum(DB::raw('(vattukho.sl_ton*vattu.vt_gia)'));
                                            ?>
                                        <tr>
                                            <td colspan="9" style="color:red;"><b>Nhóm vật tư: {!! $item->nvt_ten !!} | SL vật tư: {{$count}} | Tổng giá trị: {!! number_format($tong,0,".",",")  !!} vnđ</b></td>
                                        </tr>
                                        @foreach ($vattu as $val)
                                        <tr  align="right">
                                            <td>{!! $val->vt_ma !!}</td>
                                            <td>{!! $val->vt_ten !!}</td>
                                            <td>{!! $val->dvt_ten !!}</td>
                                            <td>{!! $val->nhap !!}</td>
                                            <td>{!! $val->xuat !!}</td>
                                            <td>{!! $val->ton !!}</td>
                                            <td  align="right">{!! number_format($val->vt_gia,0,".",",")  !!}</td>
                                            <td  align="right">{!! number_format($val->vt_gia*$val->ton,0,".",",")  !!}</td>
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
