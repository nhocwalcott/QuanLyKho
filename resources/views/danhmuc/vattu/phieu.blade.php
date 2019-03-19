<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <title>Danh sách vật tư</title>
    <style>
      body{
        font-family: DejaVu Sans, sans-serif, font-size: 10px;
      }
    </style>
  </head>
  
  <body >
    
    <hr>
    <center><h2>DANH SÁCH VẬT TƯ</h2></center>
    <br>
       <table cellpadding="3px" style="border:thin solid;" >
      <thead>
        <tr>
          <td style="border:thin solid;" width="20px"><strong>STT</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Vật tư</strong></td>
          <td style="border:thin solid;" width="100px"><strong>Đơn vị tính</strong></td>
          <td style="border:thin solid;" width="100px"><strong>Nhóm vật tư</strong></td>
          <td style="border:thin solid;" width="100px"><strong>Đơn giá</strong></td>
          <td style="border:thin solid;" width="100px"><strong>NSX</strong></td>
        </tr>
      </thead>
      <tbody>
        <?php $count = 0; ?>
            @foreach ($vt as $val)
            <tr >
              <td style="border:thin blue solid;border-style:dashed;">{!! $count = $count + 1 !!}</td>
              <td style="border:thin blue solid;border-style:dashed;">
              {!! $val->vt_ten !!}
              </td>
              <td style="border:thin blue solid;border-style:dashed;">{!! $val->dvt_ten !!}</td>
              <td style="border:thin blue solid;border-style:dashed;">{!! $val->nvt_ten !!}</td>
              <td style="border:thin blue solid;border-style:dashed;">
              {!! number_format($val->vt_gia,0,",",".") !!} vnđ 
              </td>
              
              <td style="border:thin blue solid;border-style:dashed;" >{!! $val->nsx_ten !!} </td>
          </tr>
            @endforeach
            
      </tbody>
    </table>
    
    <table style="margin-bottom:-300px;">
      <tr>
        <td width="400px"></td>
        <td>Cần thơ,Ngày lập: <?php echo date("d-m-Y") ?></td>
      </tr>
      <tr>
        <td width="400px" class="writer-title"><strong>Người phụ trách vật tư</strong></td>
        <td width="250px" class="writer-title"><strong>Thủ kho</strong></td>
      </tr>
      <tr>
        <td>(Ký và ghi rõ họ tên)</td>
        <td class="writer-name"><span>(Ký và ghi rõ họ tên)</span></td>
      </tr>
    </table>
  </body>
</html>
    
