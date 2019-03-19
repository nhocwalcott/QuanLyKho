@extends('trogiup.trogiup')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Thông tin phần mềm<br/>
                    </h3>
                </header>
            </div>
        </div>
    </div>
</section>
@stop
@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Thông tin</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    
                    <tbody>
                        <tr>
                            <td>Tên</td>
                            <td>Phần mềm Quản lý kho vật tư điện lực XXXX</td>
                        </tr>
                        <tr>
                            <td>Phiên bản</td>
                            <td>V.1.0.0</td>
                        </tr>
                        <tr>
                            <td>Sản phẩm được thực hiện bởi</td>
                            <td>scodeweb</td>
                        </tr>
                        <tr>
                            <td colspan="2">Phần mềm này được thiết kế nhằm đáp ứng các yêu cầu: Quản lý Danh mục, quản lý Nhập hàng, xuất hàng, thống kê số lượng hàng tồn, lập báo cáo,.v.vv</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
