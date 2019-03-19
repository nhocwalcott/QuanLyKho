@extends('master')
@section('danhmuc')
<div class="body-nav body-nav-horizontal body-nav-fixed">
                        <div class="container">
                            <ul>
                                {{--<li>--}}
                                    {{--<a href="{!! URL::route('danhmuc.khuvuc.getList') !!}">--}}
                                        {{--<img src="{{ url('public/lib/images/khuvuc.png')}}" width="40px" height="30px" style="margin-top:-10px;" ><br> Khu vực--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                <li>
                                    <a href="{!! URL::route('danhmuc.nhasanxuat.getList') !!}">
                                        <img src="http://wh.adcare.vn/public/lib/images/nhasanxuat.png" width="40px" height="30px" style="margin-top:-10px;"><br> MAKER
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('danhmuc.nhaphanphoi.getList') !!}">
                                        <img src="http://wh.adcare.vn/public/lib/images/nhaphanphoi.png" width="40px" height="30px" style="margin-top:-10px;"><br> SUPPLIER
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('danhmuc.vattu.getList') !!}">
                                        <img src="http://wh.adcare.vn/public/lib/images/vattu.png" width="37px" height="30px" style="margin-top:-10px;"><br> MATERIAL
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('danhmuc.nhomvattu.getList') !!}">
                                        <img src="http://wh.adcare.vn/public/lib/images/nhomvattu.png" width="37px" height="30px" style="margin-top:-10px;"><br> M.CATEGORY
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('danhmuc.donvitinh.getList') !!}">
                                        <img src="http://wh.adcare.vn/public/lib/images/donvitinh.png" width="39px" height="30px" style="margin-top:-10px;"><br> UNIT
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('danhmuc.chatluong.getList') !!}">
                                        <img src="http://wh.adcare.vn/public/lib/images/chatluong.png" width="27.5px" height="30px" style="margin-top:-10px;"><br>QUALITY
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('danhmuc.kho.getList') !!}">
                                        <img src="http://wh.adcare.vn/public/lib/images/kho.png" width="43px" height="30px" style="margin-top:-15px;"><br> WAREHOUSE
                                    </a>
                                </li>
                                {{--<li>--}}
                                    {{--<a href="{!! URL::route('danhmuc.congtrinh.getList') !!}">--}}
                                        {{--<img src="{{ url('public/lib/images/congtrinh.png')}}" width="39px" height="30px" style="margin-top:-10px;"><br> Công trình--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                <!-- <li>
                                    <a href="{!! URL::route('danhmuc.mucdich.getList') !!}">
                                        <img src="{{ url('public/lib/images/mucdich.png')}}" width="37px" height="30px" style="margin-top:-10px;"><br> Mục đích
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <a href="{!! URL::route('danhmuc.phongban.getList') !!}">
                                        <img src="{{ url('public/lib/images/phongban.png')}}" width="40px" height="30px" style="margin-top:-10px;"><br> Phòng ban
                                    </a>
                                </li> -->
                                <li>
                                    <a href="{!! URL::route('danhmuc.nhanvien.getList') !!}">
                                        <img src="http://wh.adcare.vn/public/lib/images/nhanvien.png" width="37px" height="30px" style="margin-top:-10px;"><br> EMPLOYEE
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

@stop

