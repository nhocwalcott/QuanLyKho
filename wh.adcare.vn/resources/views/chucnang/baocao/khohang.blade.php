@extends('chucnang.chucnang')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>WAREHOUSE MANAGER<br/>
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
                    <p><b>WAREHOUSE</b></p>
                </div>
                <div class="box-content">
                    <form class="form-inline">
                        <div class="container">
                            <div class="row">
                                <div id="acct-password-row" class="span15">
                                    
                                       <!--  <div style="margin-top:5px">
                                            Từ&nbsp<input type="date" name="" class="span3">
                                            Đến&nbsp<input type="date" name="" class="span3">&nbsp&nbsp
                                            <a href="#" class="btn btn-info"><i class="icon-search"></i>Tìm kiếm</a>
                                        </div> -->
                                        <br>
                                        <div>
                                            <table class="table table-bordered table-hover tablesorter" id="sample-table">
                                                <thead style="background:#EFEFEF;">
                                                    <tr>
                                                        <th class="span2">MATERIAL CODE</th>
                                                        <th class="span4">MATERIAL NAME</th>
                                                        <th class="span2">UNIT</th>
                                                        <th class="span2">INPUT QTY</th>
                                                        <th class="span2">ISSUE QTY</th>
                                                        <th class="span2">REMAIN</th>
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
                                                        <td colspan="9" style="color:red;"><b>WAREHOUSE: {!! $item->kho_ten !!} | Tồn: {!! $tongsl !!}   </b></td>
                                                    </tr>
                                                    @foreach ($vattu as $val)
                                                    <tr>
                                                        <td>{!! $val->vt_ma !!}</td>
                                                        <td>{!! $val->vt_ten !!}</td>
                                                        <td>{!! $val->dvt_ten !!}</td>
                                                        <td>{!! $val->sl_nhap !!}</td>
                                                        <td>{!! $val->sl_xuat !!}</td>
                                                        <td>{!! $val->sl_ton !!}</td>
                                                        {{--<td align="right">{!! number_format($val->vt_gia,0,".",",")  !!}</td>--}}
                                                        {{--<td align="right">{!! number_format($val->vt_gia*$val->sl_ton,0,".",",")  !!}</td>--}}
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
