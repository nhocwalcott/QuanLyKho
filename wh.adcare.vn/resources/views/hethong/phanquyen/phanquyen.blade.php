@extends('hethong.hethong')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Phân quyền người dùng<br/>
                        <small></small>
                    </h3>
                </header>
            </div>               
        </div>
    </div>
</section>

@stop
@section('content')
    <div class="span16" ><!-- 
        <div class="box-header">
            <div class="row">
                <div class="span11">
                    <fieldset>
                        <a href="#" class="btn btn-info"><i class="icon-plus"></i>&nbspThêm</a>
                        <a href="#" class="btn btn-info"><i class="icon-print"></i>&nbsp&nbspIn&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                    </fieldset>
                </div>
                <div class="" >
                    <fieldset>
                        <input id="current-pass-control" name="" class="span4" type="text" value="" autocomplete="false">
                        <a href="#" class="btn btn-info" style="margin-top: -8px"><i class="icon-search"></i>Tìm kiếm</a>
                    </fieldset>
                </div>
            </div>
            
        </div> -->
        <table class="table table-bordered table-hover">
            <thead style="background:#EFEFEF;">
                <tr>
                    <td rowspan="2">Nhóm người dùng</td>
                    <td colspan="2">Hệ thống</td>
                    <td colspan="11">Danh mục</td>
                    <td colspan="7">Chức năng</td>
                </tr>
                <tr>
                    <td>Tạo tài khoản</td>
                    <td>Phân quyền</td>
                    <td>Khu vực</td>
                    <td>Nhà sản xuất</td>
                    <td>Nhà phân phối</td>
                    <td>Vật tư</td>
                    <td>Nhóm vật tư</td>
                    <td>Đơn vị tính</td>
                    <td>Chất lượng</td>
                    <td>Kho</td>
                    <td>Công trình</td>
                    <td>Phòng ban</td>
                    <td>Nhân viên</td>
                    <td>Phiếu nhập kho</td>
                    <td>Phiếu xuất kho</td>
                    <td>Thẻ kho</td>
                    <td>Chuyển kho</td>
                    <td>Kho hàng</td>
                </tr>
            </thead>
                <tr>
                    <td>Admin</td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                </tr>
                <tr>
                    <td>Lãnh đạo</td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                </tr>
                <tr>
                    <td>Nhân viên</td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                </tr>
                <tr>
                    <td>Thủ kho</td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                    <td><input type="checkbox" name="" value=""></td>
                </tr>
            </tbody>
        </table>
    </div>
@stop
