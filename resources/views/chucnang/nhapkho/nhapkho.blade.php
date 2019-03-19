@extends('chucnang.chucnang')
@section('header')
    <section class="nav nav-page">
        <div class="container">
            <div class="row">
                <div class="span7">
                    <header class="page-header">
                        <h3>Quản lý Nhập kho<br/>
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
        <div class="span3">
            <div class="box">
                <div class="box-header">
                    <p><b>Chức năng</b></p>
                </div>
                <div class="box-content">
                    <form class="form-inline">
                        <p><b>Nhập kho</b></p>
                        <a href="{!! URL::route('chucnang.nhapkho.getList') !!}"><i class="icon-plus"></i>&nbspNhập kho</a><br><br>
                        <p><b>Bảng kê nhập</b></p>
                        <a href="{!! URL::route('chucnang.nhapkho.getVattu') !!}"><i class="icon-plus"></i>&nbspChi tiết</a><br>
                        <a href="{!! URL::route('chucnang.nhapkho.danhsach') !!}"><i class="icon-plus"></i>&nbspDanh sách phiếu nhập</a><br>
                    </form>
                </div>
            </div>
        </div>
        <div style="margin-left:-1px" class="span13">
            <div class="box">
                <div class="box-header">
                    <p><b>Nhập kho thông thường</b></p>
                </div>
                <div class="box-content">
                    <div class="form-inline">
                        <div class="container">
                            <form action="{!! URL::route('chucnang.nhapkho.import') !!}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="text" name="excelfile">
                                <button type="submit"><i class="icon-plus"></i>&nbspImport Excel</button>
                            </form>
                            <div class="row">
                                <div id="acct-password-row" class="span13">
                                    <form action="" method="POST" accept-charset="utf-8">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div id="acct-password-row" class="span8">
                                            <fieldset>

                                                <div class="control-group">
                                                    <label>Lý do:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                                    <input type="text" name="txtLyDo" value="{{ old('txtLyDo') }}" class="span7">
                                                </div>
                                                <div class="control-group">
                                                    <label>Nhân viên:</label>
                                                    <?php
                                                    $nv = DB::table('nhanvien')->where('user_id',Auth::user()->id)->first();
                                                    ?>
                                                    <input type="text" value="{{ $nv->nv_ten}}" class="span7">
                                                    <input type="hidden" name="txtNV" value="{{ $nv->id }}">
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div id="acct-password-row" class="span4">
                                            <fieldset>
                                                <div class="control-group ">
                                                    <label>Mã phiếu:</label>
                                                    <input type="text" name="txtID" value="PNK{!! date('dmYhms') !!}" class="span3">
                                                </div>
                                                <div class="control-group">
                                                    <label>Ngày lập:&nbsp</label>
                                                    <input type="text" name="txtDate" value="{!! date('d-m-Y') !!}" class="span3">
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary"><i class="icon-save"></i>&nbsp&nbsp&nbspLưu</button>
                                                </div>


                                            </fieldset>
                                        </div>

                                        <div id="acct-password-row" class="span12">
                                            <fieldset>
                                                <div>
                                                    <u><p><b>Danh sách vật tư</b></p></u>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </form>
                                    <form action="" method="POST" accept-charset="utf-8">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div id="acct-password-row" class="span13">
                                            <fieldset>
                                                <div class="control-group">
                                                    <label>Mã:</label>
                                                    <select  class="selVT1 span2" name="vattu_id" id="vattu_id">
                                                        <option>--Chọn--</option>
                                                        @foreach($data1 as $item)
                                                            <option value="{{ $item->id}}">{{ $item->vt_ma}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label>Tên:</label>
                                                    <select name="ten" id="country" class=" span4">
                                                        <option value=""></option>
                                                    </select>
                                                    <label>ĐVT:</label>
                                                    <select class="span2" name="dvt" id="country1">
                                                        <option value="" ></option>
                                                    </select>
                                                    <label>Kho:</label>
                                                    <select class="selKho span3" name="selKho" id="selKho">
                                                        <option>--Chọn--</option>
                                                        @foreach($dataKho as $item)
                                                            <option value="{{ $item->id}}">{{ $item->kho_ten}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="control-group ">
                                                    <label>Tên NCC:&nbsp&nbsp</label>
                                                    <select  class="npp_id span7" name="npp_id" id="npp_id">
                                                        <option>--Chọn--</option>
                                                        @foreach($data as $item)
                                                            <option value="{{ $item->id }}" >{{ $item->npp_ten }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="control-group">
                                                    <label>Số lượng:</label>
                                                    <input type="number" name="sluong" id="sluong" class="sluong span2">&nbsp&nbsp
                                                    <a href="#" class="add1 btn btn-default" type="submit"><i class="icon-plus"></i>&nbsp&nbspThêm</a>
                                                </div>
                                            </fieldset>

                                        </div>

                                    </form>
                                    <div id="acct-password-row" class="span12">
                                        <div>
                                            <form action="" method="POST" accept-charset="utf-8">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <table class="tb table table-bordered table-hover" id="myTable" name="myTable">
                                                    <thead style="background:#EFEFEF;">
                                                    <tr>
                                                        <th>Mã VT</th>
                                                        <th>Tên VT</th>
                                                        <th>Kho</th>
                                                        <th>ĐVT</th>
                                                        <th>Số lượng</th>
                                                        <th>Nhà cung cấp</th>
                                                        <th>Thành tiền</th>
                                                        <th class="span1"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($content as $item)
                                                        <tr>
                                                            <?php $dt = DB::table('vattu')->where('id',$item['id'])->first();?>
                                                            <td>{{ $dt->vt_ma }}</td>
                                                            <td>{{ $item['name'] }}</td>
                                                            <td>{{ $item->options->kho }}</td>
                                                            <td>{{ $item->options->size }}</td>
                                                            <td>{{ $item['qty'] }}</td>
                                                            <?php
                                                            $ncc = DB::table('nhaphanphoi')->where('id',$item['price'])->first();
                                                            ?>
                                                            <td>{{$ncc->npp_ten}}</td>
                                                            <td class="td-actions">
                                                                <a  class="del btn btn-small btn-danger" name="id" id="{{$item['rowid']}}"><i class="btn-icon-only icon-remove"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $(".add1").click(function() {
                    // var id = $(this).attr('.selVT1');
                    // alert(id);
                    var idKho = $(this).parent().parent().find(".selKho").val();
                    var id = $(this).parent().parent().find(".selVT1").val();
                    var qty = $(this).parent().parent().find(".sluong").val();
                    var npp_id = $(this).parent().parent().find(".npp_id").val();
                    var token = $("input[name='_token']").val();
                    // alert(idKho);
                    // alert(token);
                    $.ajax({
                        url:'nhaphang/'+id+'/'+qty,
                        type:'GET',
                        cache:false,
                        data:{"_token":token,"id":id,"qty":qty,"idKho":idKho,"npp_id":npp_id},
                        success: function(data) {
                            if(data == "oke") {
                                window.location = "nhapkho";
                            }
                            else {
                                alert("Error!");
                            }
                        }
                    });
                });
            });

            $(document).ready(function() {
                $(".del").click(function(){

                    $(this).parents("tr").remove();
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

                        $('#country').append('<option value="'+countryObj.id+'  selected="{{ old("ten") === "'+countryObj.id+'" ? true : false }} ">'+countryObj.vt_ten+'</option>');
                    });

                    $('#country1').empty();
                    $.each(data, function(index, countryObj){

                        $('#country1').append('<option value="'+countryObj.id+'  selected="{{ old("dvt") === "'+countryObj.id+'" ? true : false }} ">'+countryObj.dvt_ten+'</option>');
                    });
                });
            });
        </script>
@stop
