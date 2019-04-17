<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        #img-upload{
            width: 100%;
        }
    </style>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="JavaScript" src="http://wh.adcare.vn/test/public/lib/js/ckeditor/ckeditor.js"> </script>
    <script type="text/javascript" language="JavaScript" src=" "> </script>
</head>
<body>

<div class="jumbotron text-center">
    <h1>TẠO YÊU CẦU HỖ TRỢ</h1>
    <p>Người dùng yêu cầu hỗ t  rợ</p>
</div>

<form action="" method="post" >
    <textarea id="noidung" class="form-control ckeditor" rows="5" name="noidung"></textarea>
</form>
<script type="text/javascript">
    var editor = CKEDITOR.replace('noidung',{
        language:'vi',
        filebrowserBrowseUrl :'http://wh.adcare.vn/test/public/lib/js/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : 'http://wh.adcare.vn/test/public/lib/js/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl : 'http://wh.adcare.vn/test/public/lib/js/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl : 'http://wh.adcare.vn/test/public/lib/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : 'http://wh.adcare.vn/test/public/lib/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : 'http://wh.adcare.vn/test/public/lib/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    });
</script>﻿
<script>
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });
    });
</script>
</body>
</html>
