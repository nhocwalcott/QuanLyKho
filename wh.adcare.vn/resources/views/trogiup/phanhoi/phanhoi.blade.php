@extends('trogiup.trogiup')
@section('header')
<section class="nav nav-page">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>Phản hồi<br/>
                    </h3>
                </header>
            </div>
        </div>
    </div>
</section>
@stop
@section('content')
    <section>
        <div class="container">
            <form action="{!! route('trogiup.getPhanhoi') !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="row">
                <div id="acct-password-row" class="span14">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Câu hỏi</th>
                                <th>Có</th>
                                <th>Không</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Giao diện phần mềm có thân thiện với người dùng ?</td>
                                <td>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="rdGiaodien" id="rdGiaodien" value="Không" >
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="rdGiaodien" id="rdGiaodien" value="Có" checked="checked">
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Chức năng phần mềm có đầy đủ ?</td>
                                <td>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="rdChucnang" id="rdChucnang" value="Không" >
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="rdChucnang" id="rdChucnang" value="Có" checked="checked">
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Giao diện phần mềm có thân thiện với người dùng ?</td>
                                <td>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="rdGiaodien" id="rdGiaodien" value="Không" >
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="rdGiaodien" id="rdGiaodien" value="Có" checked="checked">
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Giao diện phần mềm có thân thiện với người dùng ?</td>
                                <td>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="rdGiaodien" id="rdGiaodien" value="Không" >
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="rdGiaodien" id="rdGiaodien" value="Có" checked="checked">
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
            <footer id="submit-actions" class="form-actions">
                <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="icon-save"></i>&nbsp&nbspGửi&nbsp&nbsp</button>
                <!-- <a href="{!! URL::route('danhmuc.nhaphanphoi.getList') !!}" class="btn"><i class="icon-remove"></i>&nbsp&nbspHủy&nbsp&nbsp</a> -->
            </footer>
            </div>
        </form>
    </section>
@stop
