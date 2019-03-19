@extends('master')
@section('hethong')
<div class="body-nav body-nav-horizontal body-nav-fixed">
                        <div class="container">
                            <ul>
                                <li>
                                    <a href="{{ url('logout') }}">
                                        <img src="http://wh.adcare.vn/public/lib/images/logout.png" width="40px" height="20px" style="margin-top:-9px;" ><br> Đăng xuất
                                    </a>
                                </li>
                                {{--<li>--}}
                                    {{--<a href="{!! URL::route('hethong.thongtincongty.getList') !!}">--}}
                                        {{--<img src="{{ url('public/lib/images/thongtincongty.png')}}" width="35px" height="20px" style="margin-top:-5px;" ><br> Thông tin Cty--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                <!-- <li>
                                    <a href="{!! URL::route('hethong.taotaikhoan.getList') !!}">
                                        <img src="http://localhost/Kho2/public/lib/images/test.png" width="35px" height="20px" style="margin-top:-5px;" ><br> Tạo tài khoản
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('hethong.phanquyen.getList') !!}">
                                        <img src="http://localhost/Kho2/public/lib/images/test.png" width="40px" height="20px" style="margin-top:-9px;" ><br> Phân quyền
                                    </a>
                                </li> -->
                                <li>
                                    <a href="{!! URL::route('hethong.doimatkhau.getEdit') !!}">
                                        <img src="http://wh.adcare.vn/public/lib/images/doimatkhau.png" width="40px" height="20px" style="margin-top:-9px;" ><br> Đổi mật khẩu
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

@stop
@section('header')

@stop
@section('content')




@stop