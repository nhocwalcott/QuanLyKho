@extends('master')
@section('trogiup')
<div class="body-nav body-nav-horizontal body-nav-fixed">
                        <div class="container">
                            <ul>
                                <li>
                                    <a href="{!! URL::route('trogiup.getHuongdan') !!}">
                                        <img src="{{ url('public/lib/images/huongdansudung.png')}}" width="40px" height="30px" style="margin-top:-10px;" ><br> Hướng dẫn
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('trogiup.getLienhe') !!}">
                                        <img src="{{ url('public/lib/images/lienhe.png')}}" width="40px" height="30px" style="margin-top:-10px;"><br> Liên hệ
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('trogiup.thongtinphanmem.getList') !!}">
                                        <img src="{{ url('public/lib/images/thongtinphanmem.png')}}" width="40px" height="30px" style="margin-top:-10px;"><br> Thông tin
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="{!! URL::route('trogiup.getPhanhoi') !!}">
                                        <img src="{{ url('public/lib/images/phanhoi.png')}}" width="40px" height="30px" style="margin-top:-10px;"><br> Phản hồi
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
@stop
@section('header')

@stop
@section('content')

@stop