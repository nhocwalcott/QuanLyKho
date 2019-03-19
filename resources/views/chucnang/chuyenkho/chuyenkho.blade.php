@extends('chucnang.chucnang')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Quản lý Chuyển kho<br/>
                        <small></small>
                    </h3>
                </header>
            </div>                      
        </div>s
    </div>
</section>

@stop
@section('content')
<div class="row">
    <div class="span3">
        <div class="box">
            <div class="box-header">
                <p><b>Chức năng</b></p>
            </div>
            <div class="box-content">
                <form class="form-inline">
                    <p><b>Chuyển kho</b></p>
                        <a href="{!! URL::route('chucnang.chuyenkho.getList') !!}"><i class="icon-plus"></i>&nbspChuyển kho</a><br><br>
                    <p><b>Bảng kê chuyển</b></p>
                        <a href="{!! URL::route('chucnang.chuyenkho.getVattu') !!}"><i class="icon-plus"></i>&nbspTheo vật tư</a><br>
                        <a href="{!! URL::route('chucnang.chuyenkho.getChungtu') !!}"><i class="icon-plus"></i>&nbspTheo chứng từ</a><br>
                </form>
            </div>
        </div>
    </div>
    <div style="margin-left:-1px"  class="span13">
        <div class="box">
            <div class="box-header">
                <p><b>Thông tin phiếu chuyển kho</b></p>
            </div>
            <div class="box-content">
                <form class="form-inline" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="container">
                        <div class="row">
                            <div id="acct-password-row" class="span13">
                                <div id="acct-password-row" class="span8">
                                    <fieldset>
                                        <div class="control-group">
                                            <label>Nhân viên:</label>
                                            <?php 
                                                $nv = DB::table('nhanvien')->where('user_id',Auth::user()->id)->first();

                                            ?>
                                            <input type="text" value="{{ $nv->nv_ten}}" class="span7">
                                            <input type="hidden" name="txtNV" value="{{ $nv->id }}">
                                        </div>
                                        <div class="control-group">
                                            <label>Lý do:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                            <textarea name="txtLyDo" id="input" class="span7" rows="3" required="required"></textarea>
                                        </div>
                                    </fieldset>
                                </div>
                                <div id="acct-password-row" class="span4">
                                    <fieldset>
                                        <div class="control-group ">
                                            <label>Mã phiếu:</label>
                                            <input type="text" name="txtID" value="CK{!! date('dmYhms') !!}" class="span3">
                                        </div>
                                        <div class="control-group">
                                            <label>Ngày:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                            <input type="text" name="txtDate" value="{!! date('d-m-Y') !!}" class="span3">
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary"><i class="icon-save"></i>&nbsp&nbsp&nbspLưu</button>
                                        </div>
                                    </fieldset>
                                </div>
                                <form action="" method="POST" accept-charset="utf-8">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div id="acct-password-row" class="span12">
                                    <div>
                                        <u><p><b>Danh sách vật tư</b></p></u>
                                    </div>
                                    <div class="control-group">
                                        <label>Mã:</label>
                                        <select name="vattu_id" id="vattu_id" class="selVT span2">
                                            <option>--Chọn--</option>
                                            @foreach($data1 as $item)
                                            <option value="{{ $item->id}}">{{ $item->vt_ma}}</option>
                                            @endforeach
                                        </select>
                                        <label>Tên:</label>
                                        <select name="ten" id="country" class="span4">
                                            <option value=""></option>
                                        </select>
                                        <label>Từ Kho:</label>
                                            <select class="ware span2" name="kho" id="country2">
                                                <option value="" ></option>
                                            </select>
                                        <label>Đến Kho:</label>
                                            <select class="selKho span2" name="selKho" id="selKho">
                                                <option>--Chọn--</option>
                                                @foreach($dataKho as $item)
                                                <option value="{{ $item->id}}">{{ $item->kho_ten}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="control-group">
                                        <label>ĐVT:</label>
                                            <select class="span2" name="dvt" id="country1">
                                                <option value="" ></option>
                                            </select>
                                        <label>Số lượng:</label>
                                        <input type="number" name="sluong" id="sluong" class="sluong span2">&nbsp&nbsp
                                        <a href="#" class="add btn btn-default " type="submit"><i class="icon-plus"></i>&nbsp&nbspThêm</a>
                                    </div>
                                </div>
                                </form>
                                <div id="acct-password-row" class="span12">
                                    <div>
                                        <table class="tb table table-bordered table-hover" id="myTable" name="myTable">
                                            <thead style="background:#EFEFEF;">
                                                <tr>
                                                    <th class="span2">Mã VT</th>
                                                    <th class="span2">Tên VT</th>
                                                    <th class="span2">Từ Kho</th>
                                                    <th class="span2">Đến Kho</th>
                                                    <th class="span2">ĐVT</th>
                                                    <th class="span2">Số lượng</th>
                                                    <th class="span2">Đơn giá</th>
                                                    <th class="span2">Thành tiền</th>
                                                    <th class="span1"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($content as $item)
                                                <tr>
                                                    <td>{{ $item['id'] }}</td>
                                                    <td>{{ $item['name'] }}</td>
                                                    <td>{{ $item->options->kho1 }}</td>
                                                    <td>{{ $item->options->kho2 }}</td>
                                                    <td>{{ $item->options->size }}</td>
                                                    <td>{{ $item['qty'] }}</td>
                                                    <td>{{ number_format($item['price'],0,",",".") }} vnđ</td>
                                                    <td>{{ number_format($item['qty']*$item['price'],0,",",".") }}vnđ</td>
                                                    <td class="td-actions">
                                                        <a  class="del btn btn-small btn-danger" name="id" id="{{$item['rowid']}}"><i class="btn-icon-only icon-remove"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function() {
            $(".add").click(function() {
              // var id = $(this).attr('sluong');
              // alert(id);
                var id = $(this).parent().parent().find(".selVT").val();
                var qty = $(this).parent().parent().find(".sluong").val();
                var idKho = $(this).parent().parent().find(".ware").val();
                var token = $("input[name='_token']").val();
                var idKho2 = $(this).parent().parent().find(".selKho").val();
                // alert(idKho2);
                $.ajax({
                    url:'chuyenvt/'+id+'/'+qty,
                    type:'GET',
                    cache:false,
                    data:{"_token":token,"id":id,"qty":qty,"idKho":idKho,"idKho2":idKho2},
                    success: function(data) {
                        if(data == "oke") {
                          window.location = "chuyenkho";
                        }
                        else {
                         alert("Số lượng chuyển kho lớn hơn số lượng tồn kho!");
                        }
                    }
                });
            });
        });

        $(document).ready(function() {
            $(".del").click(function(){
                
                alert(111);
            });
        });
    </script>


    <!-- Ajax Vật tư -->
    <script>
        $('#vattu_id').on('change', function(e) {
            console.log(e);
            var vattu_id = e.target.value;

            //ajax

            $.getJSON("vattu/ajax-call?vattu_id="+vattu_id, function (data) {

                console.log(data);

                $('#country').empty();
                $.each(data, function(index, countryObj){

                     $('#country').append('<option value="'+countryObj.id+'  selected="{{ old("ten") === "'+countryObj.vt_id+'" ? true : false }} ">'+countryObj.vt_ten+'</option>');
                });

                $('#country1').empty();
                $.each(data, function(index, countryObj){

                    $('#country1').append('<option value="'+countryObj.id+'  selected="{{ old("dvt") === "'+countryObj.vt_id+'" ? true : false }} ">'+countryObj.dvt_ten+'</option>');
                });

                $('#country2').empty();
                $.each(data, function(index, countryObj){

                    $('#country2').append('<option value="'+countryObj.id+'">'+countryObj.kho_ten+'</option>');
                });
            });

        });

    </script>
@stop
