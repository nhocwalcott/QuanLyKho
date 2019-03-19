@extends('chucnang.chucnang')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Thẻ kho<br/>
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
                    <p><b>Bảng kê Thẻ kho</b></p>
                </div>
                <div class="box-content">
                    <form class="form-inline">
                        <div class="container">
                            <div class="row">
                                <div id="acct-password-row" class="span15">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    @foreach ($data as $item)
                                    <?php
                                        $kho = DB::table('vattukho')
                                            ->where('vt_id',$item->id)
                                            ->join('kho','kho.id','=','vattukho.kho_id')
                                            ->select('kho.kho_ten','vattukho.*')
                                            ->get();
                                        $ton = DB::table('vattukho')
                                            ->where('vt_id',$item->id)
                                            ->sum('sl_ton');
                                        $nhap = DB::table('vattukho')
                                            ->where('vt_id',$item->id)
                                            ->sum('sl_nhap');
                                        $xuat = DB::table('vattukho')
                                            ->where('vt_id',$item->id)
                                            ->sum('sl_xuat');
                                    ?>
                                     
                                      <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading{{$item->id}}">
                                          <h5 class="panel-title">
                                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}" style="color:red; background-color:#f0f5f5;">
                                              Vật tư: {{$item->vt_ten}} | Tồn: {{$ton}} | Nhập: {{$nhap}} | Xuất: {{$xuat}}
                                            </a>
                                          </h5>
                                        </div>
                                        <div id="collapse{{$item->id}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{$item->id}}">
                                          <div class="panel-body">
                                            <table class="table table-bordered table-hover tablesorter" id="sample-table">
                                                <thead style="background:#EFEFEF;">
                                                    <tr>
                                                        <th class="span2">STT</th>
                                                        <th class="span6">Kho</th>
                                                        <th class="span2">SL nhập</th>
                                                        <th class="span2">SL xuất</th>
                                                        <th class="span2">SL tồn</th>
                                                        <th class="span3">Tổng tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $count = 0;
                                                ?>
                                                   @foreach ($kho as $val)
                                                        <tr>
                                                            <td>{{ $count = $count+1 }}</td>
                                                            <td>{!! $val->kho_ten !!}</td>
                                                            <td>{!! $val->sl_nhap !!}</td>
                                                            <td>{!! $val->sl_xuat !!}</td>
                                                            <td>{!! $val->sl_ton !!}</td>
                                                            <td>{!! number_format($item->vt_gia*$val->sl_ton,0,".",",")  !!} vnđ</td>
                                                        </tr>
                                                          @endforeach   

                                                </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                      @endforeach
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
