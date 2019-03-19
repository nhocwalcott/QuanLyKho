@extends('danhmuc.danhmuc')
@section('header')
    <section class="nav nav-page">
        <div class="container">
            <div class="row">
                <div class="span7">
                    <header class="page-header">
                        <h3>MANAGE DETAIL<br/>
                            <small></small>
                        </h3>
                    </header>
                </div>
            </div>
        </div>
    </section>
@stop
@section('content')
    <div class="span16" >
        <div class="box-header">
            <div class="row">
                <div class="span11">
                    <fieldset>
                        <a href="{!! URL::route('danhmuc.serial.getExport') !!}" class="btn btn-info"><i class="icon-plus"></i>EXPORT EXCEL</a>
                        <form action="{!! URL::route('danhmuc.congtrinh.import') !!}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="text" name="excelfile">
                            <button type="submit"><i class="icon-plus"></i>&nbspImport Excel</button>
                        </form>
                    </fieldset>
                </div>
                <div class="" >
                    <fieldset>
                        <input id="current-pass-control" name="" class="span4" type="text" value="" autocomplete="false">
                        <a href="#" class="btn btn-info" style="margin-top: -8px"><i class="icon-search"></i>Tìm kiếm</a>
                    </fieldset>
                </div>
            </div>

        </div>
        <table class="table table-bordered table-hover tablesorter" id="sample-table">
            <thead style="background:#EFEFEF;">
            <tr>
                <th class="span2">Serial</th>
                <th class="span2">LOCATION</th>
                <th class="span2">QUALITY</th>
				<th class="span2">CTXK_ID</th>
				<th class="span2">CTNK_ID</th>
                <th class="span2">R-SERIAL</th>
                <th class="span2">RECEIVED DEPT</th>
                <th class="span2">RECEIVE NAME</th>
                <th class="span2">IP</th>
                <th class="span2">STATUS</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($serial as $sr)
                <tr>
                    <td>{!! $sr->serial !!}</td>
                    <td>{!! $sr->bophan!!}</td>
                    <td>{!! $sr->quality!!}</td>
					<td>{!! $sr->ctxk_id!!}</td>
					<td>{!! $sr->ctnk_id!!}</td>
                    <td>{!! $sr->realserial!!}</td>
                    <?php  if($sr->received <> ''){
                        $ctxk = DB::table('chitietxuatkho')->where('id',$sr->ctxk_id)->first() ;
                        $xk = DB::table('xuatkho')->where('id',$ctxk->xk_id)->first() ;
                        $dc = DB::table('congtrinh')->where('id',$xk->ct_id)->first() ;
                        echo " <td>$dc->ct_ten</td>";
                    }else{
                        echo " <td></td>";
                    }?>

                    <td>{!! $sr->received !!}</td>
                    <td>{!! $sr->ip !!}</td>
                    <td>
					<?php 
					if ($sr->status == 'NOTCONNECT'){
					echo '<img src="http://wh.adcare.vn/public/image/ng3.png" width="29px" height="30px" style="margin-top:-10px;">';
					} else if ($sr->status == 'CONNECT'){
						echo '<img src="http://wh.adcare.vn/public/image/okie.png" width="29px" height="30px" style="margin-top:-10px;">';
					}
					
					?>
					
					</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
