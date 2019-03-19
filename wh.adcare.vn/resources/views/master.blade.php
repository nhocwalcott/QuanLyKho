<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <title>BEST PACIFIC</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="layout" content="main"/>

    <script src="http://wh.adcare.vn/public/lib/js/myjs.js"></script>

    <script src="http://wh.adcare.vn/public/bootstrapnew/js/bootstrap.min.js"></script>

    <script src="http://wh.adcare.vn/public/bootstrapnew/css/bootstrap.min.css"></script>
    
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

    <script src="http://wh.adcare.vn/public/lib/js/jquery/jquery-1.12.3.min.js" type="text/javascript" ></script>

    <link href="http://wh.adcare.vn/public/lib/css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />

</head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button class="btn btn-navbar" data-toggle="collapse" data-target="#app-nav-top-bar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{!! URL('home') !!}" class="brand">
                        <img src="http://wh.adcare.vn/public/lib/images/logoevn.png" width="30px" height="50px" style="margin-top:-4px">BEST PACIFIC
                    </a>
                    <div id="app-nav-top-bar" class="nav-collapse">
                        @if(Auth::user()->nguoidung_id == 1) 
                        <ul class="nav">
                            <li class="dropdown">
                                <a href="{!! URL::route('hethong.hethong') !!}">SYSTEM</a>
                            </li>
							<li class="dropdown">
                                <a href="{!! URL::route('danhmuc.danhmuc') !!}">ADMIN</a>
                            </li>
							<li class="dropdown">
                                <a href="{!! URL::route('chucnang.chucnang') !!}">WAREHOUSE</a>
                            </li>
						
                        </ul>
                        @elseif (Auth::user()->nguoidung_id == 2)
                        <ul class="nav">
                            <li class="dropdown">
                                <a href="{!! URL::route('hethong.hethong') !!}">SYSTEM</a>
                            </li>
                            <li class="dropdown">
                                <a href="{!! URL::route('chucnang.chucnang') !!}">ADMIN</a>
                            </li>
                            <li class="dropdown">
                                <a href="{!! URL::route('trogiup.trogiup') !!}">WAREHOUSE</a>
                            </li>
                        </ul>
                        @elseif (Auth::user()->nguoidung_id == 3)
                        <ul class="nav">
                            <li class="dropdown">
                                <a href="{!! URL::route('hethong.hethong') !!}">SYSTEM</a>
                            </li>
                            <li class="dropdown">
                                <a href="{!! URL::route('danhmuc.danhmuc') !!}">ADMIN</a>
                            </li>
                            <li class="dropdown">
                                <a href="{!! URL::route('trogiup.trogiup') !!}">WAREHOUSE</a>
                            </li>
                        </ul>
                        @else
                        <ul class="nav">
                            <li class="dropdown">
                                <a href="{!! URL::route('hethong.hethong') !!}">SYSTEM</a>
                            </li>
                            <li class="dropdown">
                                <a href="{!! URL::route('chucnang.chucnang') !!}">ADMIN</a>
                            </li>
                            <li class="dropdown">
                                <a href="{!! URL::route('trogiup.trogiup') !!}">WAREHOUSE</a>
                            </li>
                        </ul>
                        @endif
                        <ul class="nav pull-right">
                            <li>
                                <a href="{!! url('logout') !!}">{{ Auth::user()->name }}</a>
                                <input type="hidden" name="idNV" value="{{ Auth::user()->id }}">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="body-container">
            <div id="body-content">
                @yield('danhmuc')
                @yield('hethong')
                @yield('chucnang')
                @yield('trogiup')
                @yield('header')

            <section class="page container" >
                    <div class="row">
                        <div class="span16">
                        @if (Session::has('flash_message'))
                            <div class="alert alert-{!! Session::get('flash_level') !!}">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {!! Session::get('flash_message') !!}
                            </div>
                        @endif
                        @yield('content')
                        </div>
                    </div>
            </section>
        </div>
        </div>


        <div id="spinner" class="spinner" style="display:none;">
            Loading&hellip;
        </div>


        <script src="http://wh.adcare.vn/public/lib/js/jquery/jquery-tablesorter.js" type="text/javascript" ></script>

        <script src="http://wh.adcare.vn/public/lib/js/bootstrap/bootstrap-collapse.js" type="text/javascript" ></script>

        <script src="http://wh.adcare.vn/public/lib/js/bootstrap/bootstrap-modal.js" type="text/javascript" ></script>

        <script src="http://wh.adcare.vn/public/lib/js/bootstrap/bootstrap-transition.js" type="text/javascript" ></script>
        <script src="http://wh.adcare.vn/public/lib/js/bootstrap/bootstrap-alert.js" type="text/javascript" ></script>
        
        <script src="http://wh.adcare.vn/public/lib/js/bootstrap/bootstrap-dropdown.js" type="text/javascript" ></script>
        <script src="http://wh.adcare.vn/public/lib/js/bootstrap/bootstrap-scrollspy.js" type="text/javascript" ></script>
        <script src="http://wh.adcare.vn/public/lib/js/bootstrap/bootstrap-tab.js" type="text/javascript" ></script>
        <script src="http://wh.adcare.vn/public/lib/js/bootstrap/bootstrap-tooltip.js" type="text/javascript" ></script>
        <script src="http://wh.adcare.vn/public/lib/js/bootstrap/bootstrap-popover.js" type="text/javascript" ></script>
        <script src="http://wh.adcare.vn/public/lib/js/bootstrap/bootstrap-button.js" type="text/javascript" ></script>
        
        <script src="http://wh.adcare.vn/public/lib/js/bootstrap/bootstrap-carousel.js" type="text/javascript" ></script>
        <script src="http://wh.adcare.vn/public/lib/js/bootstrap/bootstrap-typeahead.js" type="text/javascript" ></script>
        <script src="http://wh.adcare.vn/public/lib/js/bootstrap/bootstrap-affix.js" type="text/javascript" ></script>
        <script src="http://wh.adcare.vn/public/lib/js/bootstrap/bootstrap-datepicker.js" type="text/javascript" ></script>

        <script src="http://wh.adcare.vn/public/lib/js/jquery/jquery-chosen.js" type="text/javascript" ></script>
        <script src="http://wh.adcare.vn/public/lib/js/jquery/virtual-tour.js" type="text/javascript" ></script>

        <script type="text/javascript">
            $(function() {
                $('#sample-table').tablesorter();
                //$('#datepicker').datepicker();
                //$(".chosen").chosen();
            });
        </script>
        <!--<script type="text/javascript">-->
           
        <!--    document.write('<style>body{padding-bottom:20px}#e_itexpress_left{display:none;position:fixed;z-index:9999;top:0;left:0}#e_itexpress_right{display:none;position:fixed;z-index:9999;top:0;right:0}#e_itexpress_footer{display:none;position:fixed;z-index:9999;bottom:-50px;left:0;width:100%;height:104px;background:url(https://localhost/Kho2/public/image/background.jpg) repeat-x bottom left}#e_itexpress_bottom_left{display:none;position:fixed;z-index:9999;bottom:20px;left:20px}@media (min-width: 992px){#e_itexpress_left,#e_itexpress_right,#e_itexpress_footer,#e_itexpress_bottom_left{display:block}}</style><img id="e_itexpress_left" src="https://localhost/Kho2/public/image/topleft.png"/><img id="e_itexpress_right" src="https://localhost/Kho2/public/image/topright.png"/><div id="e_itexpress_footer"></div><img id="e_itexpress_bottom_left" src="https://localhost/Kho2/public/image/bottomleft.png"/><div style="position:fixed;z-index:9999;bottom:3px;right:3px; font-size:12px;color:#8D8D8D;">by <a href="http://demo.iwebs.vn/api/vi/tin-tuc/chia-se-code-javascript-tao-tuyet-roi--khung-canh-giang-sinh-cho-website-183.html">ITExpress.vn</a></div>');-->
        <!--    var no=100;var hidesnowtime=0;var snowdistance='pageheight';var ie4up=(document.all)?1:0;var ns6up=(document.getElementById&&!document.all)?1:0;function iecompattest(){return(document.compatMode&&document.compatMode!='BackCompat')?document.documentElement:document.body}var dx,xp,yp;var am,stx,sty;var i,doc_width=800,doc_height=600;if(ns6up){doc_width=self.innerWidth;doc_height=self.innerHeight}else if(ie4up){doc_width=iecompattest().clientWidth;doc_height=iecompattest().clientHeight}dx=new Array();xp=new Array();yp=new Array();am=new Array();stx=new Array();sty=new Array();for(i=0;i<no;++i){dx[i]=0;xp[i]=Math.random()*(doc_width-50);yp[i]=Math.random()*doc_height;am[i]=Math.random()*20;stx[i]=0.02+Math.random()/10; sty[i]=0.7+Math.random();if(ie4up||ns6up){document.write('<div id="dot'+i+'" style="POSITION:absolute;Z-INDEX:'+i+';VISIBILITY:visible;TOP:15px;LEFT:15px;"><span style="font-size:18px;color:#cc0000">*</span></div>')}}function snowIE_NS6(){doc_width=ns6up?window.innerWidth-10:iecompattest().clientWidth-10;doc_height=(window.innerHeight&&snowdistance=='windowheight')?window.innerHeight:(ie4up&&snowdistance=='windowheight')?iecompattest().clientHeight:(ie4up&&!window.opera&&snowdistance=='pageheight')?iecompattest().scrollHeight:iecompattest().offsetHeight;for(i=0;i<no;++i){yp[i]+=sty[i];if(yp[i]>doc_height-50){xp[i]=Math.random()*(doc_width-am[i]-30);yp[i]=0;stx[i]=0.02+Math.random()/10;sty[i]=0.7+Math.random()}dx[i]+=stx[i];document.getElementById('dot'+i).style.top=yp[i]+'px';document.getElementById('dot'+i).style.left=xp[i]+am[i]*Math.sin(dx[i])+'px'}snowtimer=setTimeout('snowIE_NS6()',10)}function hidesnow(){if(window.snowtimer){clearTimeout(snowtimer)}for(i=0;i<no;i++)document.getElementById('dot'+i).style.visibility='hidden'}if(ie4up||ns6up){snowIE_NS6();if(hidesnowtime>0)setTimeout('hidesnow()',hidesnowtime*1000)}-->
        <!--    var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//itexpress.vn/js/popup_newtab_time.js";-->
        <!--</script>-->

        <footer class="application-footer">
            <div class="container">
                        <b> <p> BEST PACIFIC COMPANY</p></b>
                        <div class="disclaimer">
                            <p>Address : Khu công nghiệp VSIP</p>
                            <p>Telephone:</p>
                        </div>
            </div>
        </footer>
	</body>
</html>