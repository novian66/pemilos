
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Siballu - Sistem Informasi Banyumas Belajar Pemilu</title>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('landing/img/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('landing/img/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('landing/img/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('landing/img/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('landing/img/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('landing/img/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('landing/img/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('landing/img/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('landing/img/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png') }}" sizes="192x192"  href="{{ asset('landing/img/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png') }}" sizes="32x32" href="{{ asset('landing/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png') }}" sizes="96x96" href="{{ asset('landing/img/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png') }}" sizes="16x16" href="{{ asset('landing/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('landing/img/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- revolution slider css -->
    <link href="{{ asset('landing/plugins/revolution/css/settings.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/plugins/revolution/css/layers.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/plugins/revolution/css/navigation.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/responsive.css') }}">
</head>
<body>

<div class="preloader"><div class="spinner"></div></div> <!-- /.preloader -->



<header class="header header-home-one">
    <nav class="navbar navbar-default header-navigation stricky">
        <div class="thm-container clearfix">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navigation" aria-expanded="false"> 
                    <i class="fas fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('landing/img/logo-1-1.png') }}" alt="Awesome Image"/>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse main-navigation mainmenu " id="main-nav-bar">
                
                <ul class="nav navbar-nav navigation-box">
                    {{-- <li class="current"> 
                        <a href="index.html">Home</a> 
                        <ul class="sub-menu">
                            <li><a href="index.html">Home One</a></li>
                            <li><a href="index2.html">Home Two</a></li>
                            <li><a href="index3.html">Home Three</a></li>
                        </ul><!-- /.sub-menu -->
                    </li>
                    <li> <a href="about.html">About Us</a> </li>
                    <li> 
                        <a href="#">Pages</a> 
                        <ul class="sub-menu">
                            <li> <a href="404.html">404</a> </li>
                            <li> <a href="pricing.html">Pricing</a> </li>
                            <li><a href="faq.html">FAQ Page</a></li>
                            <li><a href="team.html">Team</a></li>
                            <li><a href="testimonials.html">Testimonials</a></li>   
                        </ul><!-- /.sub-menu -->
                    </li>
                    <li> 
                        <a href="blog.html">Blog</a> 
                        <ul class="sub-menu right-align">
                            <li><a href="blog.html">Blog Classic</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul><!-- /.sub-menu -->
                    </li>
                    <li> <a href="contact.html">Contact</a> </li> --}}
                </ul>                
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>   
</header><!-- /.header -->



<!--Main Slider-->
<section class="main-slider">
    <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
        <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
            <ul>
                <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1687" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-transition="fade">
                
                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="bottom center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset('landing/img/slider/slider-one/slider-1-bg.jpg') }}"> 
                    
                    <div class="tp-caption  " 
                     id="slide-45-layer-1" 
                     data-x="['left','left','left','left']" data-hoffset="['80','20','0','0']" 
                     data-y="['bottom','bottom','bottom','bottom']" data-voffset="['230','160','100','80']" 
                                data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="on" 
                    data-responsive="on"
                    data-frames='[{"delay":980,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-one/tree.png') }}" alt="a" data-ww="['457px','350px','300px','100px']" data-hh="['286px','186px','150px','70px']" data-no-retina> </div>

                    <div class="tp-caption  " 
                     id="slide-45-layer-2" 
                     data-x="['left','left','left','left']" data-hoffset="['285','110','70','0']" 
                     data-y="['top','top','top','top']" data-voffset="['200','150','100','0']" 
                                data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="on" 
                    data-responsive="on"
                    data-frames='[{"delay":1030,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-one/cloud-1.png') }}" alt="a" data-ww="['191px','191px','191px','90px']" data-hh="['51px','51px','51px','30px']" data-no-retina> </div>

                    <div class="tp-caption  " 
                     id="slide-45-layer-3" 
                     data-x="['right','right','right','right']" data-hoffset="['225','10','40','0']" 
                     data-y="['top','top','top','top']" data-voffset="['120','120','50','0']" 
                                data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="on" 
                    data-responsive="on"
                    data-frames='[{"delay":1080,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-one/cloud-2.png') }}" alt="a" data-ww="['308px','308px','200px','80px']" data-hh="['80px','80px','60px','30px']" data-no-retina> </div>
                    
                    <div class="tp-caption  " 
                    id="slide-44-layer-4" 
                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                    data-y="['bottom','bottom','bottom','bottom']" data-voffset="['-20','-30','0','0']" 
                                data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="on" 
                    data-responsive="on"
                    data-frames='[{"delay":1130,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-one/computer.png') }}" alt="a" data-ww="['1180px','1000px','680px','400px']" data-hh="['727px','640px','480px','300px']" data-no-retina> </div>

                    <div class="tp-caption  " 
                     id="slide-45-layer-39" 
                     data-x="['left','left','left','left']" data-hoffset="['500','320','120','50']" 
                     data-y="['bottom','bottom','bottom','bottom']" data-voffset="[20','10','0','30']" 
                                data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1180,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-one/man-1-1.png') }}" alt="a" data-ww="['279px','240px','200px','150px']" data-hh="['531px','469px','380px','200px']" data-no-retina> </div>

                    

                    <div class="tp-caption  " 
                     id="slide-45-layer-4" 
                     data-x="['center','center','center','center']" data-hoffset="['350','245','150','90']" 
                     data-y="['center','center','center','center']" data-voffset="['-120','-100','-70','-50']" 
                                data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1230,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-one/card.png') }}" alt="a" data-ww="['242px','220px','170px','100px']" data-hh="['94px','80px','70px','40px']" data-no-retina> </div>

                    <div class="tp-caption  " 
                     id="slide-45-layer-5" 
                     data-x="['right','right','right','right']" data-hoffset="['500','330','165','100']" 
                     data-y="['bottom','bottom','bottom','bottom']" data-voffset="['20','20','25','20']" 
                                data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1380,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-one/man-1-2.png') }}" alt="a" data-ww="['234px','200px','170px','100px']" data-hh="['519px','440px','320px','220px']" data-no-retina> </div>

                    <div class="tp-caption  " 
                     id="slide-45-layer-6" 
                     data-x="['right','right','right','right']" data-hoffset="['115','30','0','0']" 
                     data-y="['center','center','center','center']" data-voffset="['35','55','0','0']" 
                                data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1430,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-one/stairs.png') }}" alt="a" data-ww="['282px','270px','170px','100px']" data-hh="['368px','320px','200px','120px']" data-no-retina> </div>

                    <div class="tp-caption  " 
                     id="slide-45-layer-7" 
                     data-x="['center','center','center','center']" data-hoffset="['500','400','0','0']" 
                     data-y="['bottom','bottom','bottom','bottom']" data-voffset="['165','70','0','0']" 
                     data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1480,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-one/icon-1.png') }}" alt="a" data-ww="['250px','230px','230px','100px']" data-hh="['156px','140px','140px','60px']" data-no-retina> </div>

                    <div class="tp-caption"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['750','750','700','420']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['-140','-150','-120','-120']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                    style="z-index: 35; white-space: nowrap;text-align: center;">
                        <h2>SIBALLU - Sistem Informasi<br /> Banyumas Belajar Pemilu</h2>
                    </div>                    
                    
                    <div class="tp-caption tp-resizeme" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['550','600','650','420']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['0','-20','20','20']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                    style="z-index: 35; white-space: nowrap; text-align: center;">
                        <a href="/login" class="banner-btn">LOGIN</a>
                    </div>
                
                </li>

                <!-- second slider -->
                <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1686" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-transition="fade">
                    
                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="bottom center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset('landing/img/slider/slider-two/slider-2-bg.jpg') }}">

                    <div class="tp-caption  " 
                    id="slide-45-layer-8" 
                    data-x="['right','right','right','right']" data-hoffset="['310','180','90','0']" 
                    data-y="['bottom','bottom','bottom','bottom']" data-voffset="['23','0','20','0']" 
                    data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"     
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":900,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-two/phone-moc.png') }}" alt="a" data-ww="['531px','450px','380px','300px']" data-hh="['834px','780px','600px','480px']" width="531" height="834" data-no-retina> </div>


                    <div class="tp-caption  " 
                    id="slide-45-layer-9" 
                    data-x="['right','right','right','right']" data-hoffset="['215','115','30','30']" 
                    data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" 
                    data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"     
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-two/woman-1.png') }}" alt="a" data-ww="['341px','300px','250px','150px']" data-hh="['714px','645px','500px','365px']" width="1180" height="727" data-no-retina> </div>

                    <div class="tp-caption  " 
                    id="slide-45-layer-10" 
                    data-x="['center','center','center','center']" data-hoffset="['300','200','100','50']" 
                    data-y="['bottom','bottom','bottom','bottom']" data-voffset="['100','50','50','50']" 
                                data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1100,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-two/icon-1.png') }}" alt="a" data-ww="['332px','300px','200px','150px']" data-hh="['178px','150px','100px','85px']" width="332" height="178" data-no-retina> </div>

                    <div class="tp-caption  " 
                    id="slide-45-layer-11" 
                    data-x="['center','center','center','center']" data-hoffset="['165','105','25','-10']" 
                    data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" 
                    data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-two/man-1.png') }}" alt="a" data-ww="['299px','250px','220px','150px']" data-hh="['561px','530px','450px','300px']" width="1180" height="727" data-no-retina> </div>

                    <div class="tp-caption"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['650','750','700','420']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['-50','-80','-100','-120']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                    style="z-index: 35; white-space: nowrap;">
                        <h2>SIBALLU - Sistem Informasi<br /> Banyumas Belajar Pemilu</h2>
                    </div>                    
                        
                    <div class="tp-caption tp-resizeme" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['550','600','650','420']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['140','90','55','15']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                    style="z-index: 35; white-space: nowrap;">
                        <a href="/login" class="banner-btn">LOGIN</a>
                    </div>
                
                </li>

                <!-- thrid slider                 -->
                <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1685" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-transition="fade">
                    
                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="bottom center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset('landing/img/slider/slider-three/slider-3-bg.jpg') }}"> 


                    <div class="tp-caption  hidden-xs" 
                    id="slide-46-layer-1" 
                    data-x="['right','right','right','right']" data-hoffset="['375','375','150','375']" 
                    data-y="['top','top','top','top']" data-voffset="['84','84','115','84']" 
                    data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-three/top-man-face.png') }}"  data-ww="['139px','139px','90px','139px']" data-hh="['162px','160px','100px','160px']" width="1180" height="727" alt="awesome image"> </div>

                    <div class="tp-caption  hidden-xs" 
                    id="slide-46-layer-2" 
                    data-x="['right','right','right','right']" data-hoffset="['365','365','141','365']" 
                    data-y="['top','top','top','top']" data-voffset="['179','179','174','179']" 
                    data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 34;"><img src="{{ asset('landing/img/slider/slider-three/top-man-hand.png') }}" alt="a"  data-ww="['140px','140px','90px','140px']" data-hh="['171px','171px','100px','171px']" width="1180" height="727" data-no-retina> </div>

                    <div class="tp-caption  " 
                    id="slide-46-layer-3" 
                    data-x="['right','right','right','right']" data-hoffset="['0','0','0','0']" 
                    data-y="['bottom','bottom','bottom','bottom']" data-voffset="['90','60','60','60']" 
                    data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":900,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-three/moc-1.jpg') }}" alt="a"  data-ww="['842px','750px','500px','300px']" data-hh="['600px','500px','350px','250px']" width="1180" height="727"> </div>

                    <div class="tp-caption  " 
                     id="slide-46-layer-4" 
                     data-x="['right','right','right','right']" data-hoffset="['0','0','0','0']" 
                     data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" 
                                data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1100,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-three/man-1.png') }}" alt="a" data-ww="['344px','320px','220px','190px']" data-hh="['504px','480px','300px','280px']" width="151" height="266" data-no-retina> </div>

                    <div class="tp-caption  " 
                    id="slide-46-layer-5" 
                    data-x="['center','center','center','center']" data-hoffset="['130','30','30','30']" 
                    data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" 
                    data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing/img/slider/slider-three/woman.png') }}" alt="a" data-ww="['247px','230px','190px','150px']" data-hh="['477px','430px','380px','250px']" width="151" height="266" data-no-retina> </div>

                    <div class="tp-caption  " 
                     id="slide-46-layer-6" 
                     data-x="['center','center','center','center']" data-hoffset="['-50','-100','-100','-100']" 
                     data-y="['bottom','bottom','bottom','bottom']" data-voffset="['90','65','50','50']" 
                                data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1300,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 30;"><img src="{{ asset('landing/img/slider/slider-three/tree.png') }}" alt="a" data-ww="['670px','600px','500px','180px']" data-hh="['285px','240px','220px','100px']" width="151" height="266" data-no-retina> </div>


                    <div class="tp-caption"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['650','750','700','420']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['-120','-100','-115','-115']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                    style="z-index: 35; white-space: nowrap;">
                        <h2>SIBALLU - Sistem Informasi<br /> Banyumas Belajar Pemilu</h2>
                    </div>
                    
                    <div class="tp-caption" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['550','500','450','420']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['40','50','25','15']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                    style="z-index: 35; white-space: nowrap;">
                        <div class="text">Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit lorem ipsum anim id est laborum perspiciatis unde.</div>
                    </div>
                    
                    <div class="tp-caption tp-resizeme" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['550','600','650','420']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['155','160','120','120']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                    style="z-index: 35; white-space: nowrap;">
                        <a href="/login" class="banner-btn">LOGIN</a>
                    </div>
                
                </li>
            </ul>
        </div>
    </div>
</section>
<!--End Main Slider-->

{{-- <section class="features-style-one">
    <div class="thm-container">
        <div class="title">
            <h3>Amazing features to convince you <br /> to use our application</h3>
        </div><!-- /.title -->
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-feature-style-one text-center">
                    <div class="icon-box hvr-radial-out">
                        <i class="binmp-icon-human-resources"></i>
                    </div><!-- /.icon-box -->
                    <div class="text-box">
                        <h3>Safe & Secure</h3>
                        <p>Lorem ipsum is simply free text available dolor sit amet con sectetur.</p>
                    </div><!-- /.text-box -->
                </div><!-- /.single-feature-style-one -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-feature-style-one text-center">
                    <div class="icon-box hvr-radial-out">
                        <i class="binmp-icon-setting"></i>
                    </div><!-- /.icon-box -->
                    <div class="text-box">
                        <h3>Quick Settings</h3>
                        <p>Lorem ipsum is simply free text available dolor sit amet con sectetur.</p>
                    </div><!-- /.text-box -->
                </div><!-- /.single-feature-style-one -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-feature-style-one text-center">
                    <div class="icon-box hvr-radial-out">
                        <i class="binmp-icon-options"></i>
                    </div><!-- /.icon-box -->
                    <div class="text-box">
                        <h3>Minimal Design</h3>
                        <p>Lorem ipsum is simply free text available dolor sit amet con sectetur.</p>
                    </div><!-- /.text-box -->
                </div><!-- /.single-feature-style-one -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.features-style-one -->

<section class="feature-style-two padding-one">
    <div class="thm-container">
        <div class="row">
            <div class="col-md-7 pull-left">
                <img src="{{ asset('landing/img/features-style-2-1.png') }}" alt="" />
            </div><!-- /.col-md-7 -->
            <div class="col-md-5 pull-right">
                <div class="feature-style-content">
                    <i class="binmp-icon-exploration"></i>
                    <h3>Discover powerful tool for your customers.</h3>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour lorem ipsum is simply free text in theor randomised words which don't look even slightly believable.</p>
                </div><!-- /.feature-style-content -->
            </div><!-- /.col-md-5 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.feature-style-two -->
<section class="feature-style-two bg-style-two padding-two">
    <div class="thm-container">
        <div class="row">
            <div class="col-md-7 pull-right">
                <img src="{{ asset('landing/img/features-style-2-2.png') }}" alt="" />
            </div><!-- /.col-md-7 -->
            <div class="col-md-5 pull-left">
                <div class="feature-style-content">
                    <i class="binmp-icon-chart"></i>
                    <h3>Advance features give you full control.</h3>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour lorem ipsum is simply free text in theor randomised words which don't look even slightly believable.</p>
                </div><!-- /.feature-style-content -->
            </div><!-- /.col-md-5 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.feature-style-two -->

<section class="faq-style-one ">
    <div class="thm-container">
        <div class="title">
            <h3>Do you have any questions? <br /> Findout answers:</h3>
        </div><!-- /.title -->
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-faq-style-one">
                    <i class="fa fa-question"></i>
                    <h3>How binmp works?</h3>
                    <p>There are many variations of passages of availab but mjority have suffer alteration in some form by inject humour.</p>
                </div><!-- /.single-faq-style-one -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-faq-style-one">
                    <i class="fa fa-question"></i>
                    <h3>Is binmp safe to use?</h3>
                    <p>There are many variations of passages of availab but mjority have suffer alteration in some form by inject humour.</p>
                </div><!-- /.single-faq-style-one -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-faq-style-one">
                    <i class="fa fa-question"></i>
                    <h3>Why this app charge us?</h3>
                    <p>There are many variations of passages of availab but mjority have suffer alteration in some form by inject humour.</p>
                </div><!-- /.single-faq-style-one -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.faq-style-one -->

<section class="testimonials-style-one bg-style-two">
    <div class="thm-container">
        <div class="testimonials-style-one-carousel owl-theme owl-carousel">
            <div class="item">
                <div class="single-testimonial-style-one">
                    <div class="row">
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <div class="landing/img-box">
                                <img src="{{ asset('landing/img/testi-1-1.png') }}" alt="Awesome Image"/>
                            </div><!-- /.img-box -->
                        </div><!-- /.col-md-5 -->
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="testi-content">
                                <img src="{{ asset('landing/img/testi-icon-1-1.png') }}" alt="Awesome Image"/>
                                <h3>Check what our users <br /> are saying.</h3>
                                <p>This is due to their excellent service, competitive pricing and customer support. It’s throughly refresing to get such a personal touch.</p>
                                <h4>Selina Lashway</h4>
                            </div><!-- /.testi-content -->
                        </div><!-- /.col-md-7 -->
                    </div><!-- /.row -->
                </div><!-- /.single-testimonial-style-one -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-testimonial-style-one">
                    <div class="row">
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <div class="landing/img-box">
                                <img src="{{ asset('landing/img/testi-1-2.png') }}" alt="Awesome Image"/>
                            </div><!-- /.img-box -->
                        </div><!-- /.col-md-5 -->
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="testi-content">
                                <img src="{{ asset('landing/img/testi-icon-1-1.png') }}" alt="Awesome Image"/>
                                <h3>Check what our users <br /> are saying.</h3>
                                <p>This is due to their excellent service, competitive pricing and customer support. It’s throughly refresing to get such a personal touch.</p>
                                <h4>Selina Lashway</h4>
                            </div><!-- /.testi-content -->
                        </div><!-- /.col-md-7 -->
                    </div><!-- /.row -->
                </div><!-- /.single-testimonial-style-one -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-testimonial-style-one">
                    <div class="row">
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <div class="landing/img-box">
                                <img src="{{ asset('landing/img/testi-1-3.png') }}" alt="Awesome Image"/>
                            </div><!-- /.img-box -->
                        </div><!-- /.col-md-5 -->
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="testi-content">
                                <img src="{{ asset('landing/img/testi-icon-1-1.png') }}" alt="Awesome Image"/>
                                <h3>Check what our users <br /> are saying.</h3>
                                <p>This is due to their excellent service, competitive pricing and customer support. It’s throughly refresing to get such a personal touch.</p>
                                <h4>Selina Lashway</h4>
                            </div><!-- /.testi-content -->
                        </div><!-- /.col-md-7 -->
                    </div><!-- /.row -->
                </div><!-- /.single-testimonial-style-one -->
            </div><!-- /.item -->
        </div><!-- /.testimonials-style-one-carousel -->
    </div><!-- /.thm-container -->
</section><!-- /.testimonials-style-one bg-style-two -->

<section class="team-style-one">
    <div class="thm-container">
        <div class="title">
            <h3>Let’s meet our expert <br /> team members</h3>
        </div><!-- /.title -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-team-style-one">
                    <h3>Earleen Carbonella</h3>
                    <p>App Designer</p>
                    <div class="social">
                        <a href="#" class="fab fa-twitter"></a><!--
                        --><a href="#" class="fab fa-facebook-f"></a><!--
                        --><a href="#" class="fab fa-youtube"></a>
                    </div><!-- /.social -->
                    <img src="{{ asset('landing/img/team-1-1.png') }}" alt="Awesome Image"/>
                </div><!-- /.single-team-style-one -->
            </div><!-- /.col-md-3 col-sm-6 col-xs-12 -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-team-style-one">
                    <h3>Shirely Hawe</h3>
                    <p>App Designer</p>
                    <div class="social">
                        <a href="#" class="fab fa-twitter"></a><!--
                        --><a href="#" class="fab fa-facebook-f"></a><!--
                        --><a href="#" class="fab fa-youtube"></a>
                    </div><!-- /.social -->
                    <img src="{{ asset('landing/img/team-1-2.png') }}" alt="Awesome Image"/>
                </div><!-- /.single-team-style-one -->
            </div><!-- /.col-md-3 col-sm-6 col-xs-12 -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-team-style-one">
                    <h3>Trang Mosquera</h3>
                    <p>App Designer</p>
                    <div class="social">
                        <a href="#" class="fab fa-twitter"></a><!--
                        --><a href="#" class="fab fa-facebook-f"></a><!--
                        --><a href="#" class="fab fa-youtube"></a>
                    </div><!-- /.social -->
                    <img src="{{ asset('landing/img/team-1-3.png') }}" alt="Awesome Image"/>
                </div><!-- /.single-team-style-one -->
            </div><!-- /.col-md-3 col-sm-6 col-xs-12 -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-team-style-one">
                    <h3>Thaddeus Buchinski</h3>
                    <p>App Designer</p>
                    <div class="social">
                        <a href="#" class="fab fa-twitter"></a><!--
                        --><a href="#" class="fab fa-facebook-f"></a><!--
                        --><a href="#" class="fab fa-youtube"></a>
                    </div><!-- /.social -->
                    <img src="{{ asset('landing/img/team-1-4.png') }}" alt="Awesome Image"/>
                </div><!-- /.single-team-style-one -->
            </div><!-- /.col-md-3 col-sm-6 col-xs-12 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.team-style-one -->

<div class="brand-section">
    <div class="thm-container">
        <div class="brand-carousel owl-carousel owl-theme">
            <div class="item">
                <i class="brands-icon-audiojungle"></i>
            </div><!-- /.item -->
            <div class="item">
                <i class="brands-icon-themeforest"></i>
            </div><!-- /.item -->
            <div class="item">
                <i class="brands-icon-envato"></i>
            </div><!-- /.item -->
            <div class="item">
                <i class="brands-icon-videohive"></i>
            </div><!-- /.item -->
            <div class="item">
                <i class="brands-icon-audiojungle"></i>
            </div><!-- /.item -->
            <div class="item">
                <i class="brands-icon-codecanyon"></i>
            </div><!-- /.item -->
            <div class="item">
                <i class="brands-icon-audiojungle"></i>
            </div><!-- /.item -->
            <div class="item">
                <i class="brands-icon-themeforest"></i>
            </div><!-- /.item -->
            <div class="item">
                <i class="brands-icon-envato"></i>
            </div><!-- /.item -->
            <div class="item">
                <i class="brands-icon-videohive"></i>
            </div><!-- /.item -->
            <div class="item">
                <i class="brands-icon-audiojungle"></i>
            </div><!-- /.item -->
            <div class="item">
                <i class="brands-icon-codecanyon"></i>
            </div><!-- /.item -->
        </div><!-- /.brand-carousel -->
    </div><!-- /.thm-container -->
</div><!-- /.brand-section -->


<section class="contact-style-one bg-style-two">
    <div class="thm-container">
        <div class="row">
            <div class="col-md-7 col-sm-6 col-xs-12">
                <form action="inc/sendemail.php" class="contact-form">
                    <input type="text" placeholder="Your full name" name="name" />
                    <input type="text" placeholder="Your email address" name="email" />
                    <textarea name="message"  placeholder="Write message here"></textarea>
                    <button type="submit">Send Message</button>
                </form>
            </div><!-- /.col-md-7 -->
            <div class="col-md-5 col-sm-6 col-xs-12">
                <div class="contact-infos">
                    <div class="title">
                        <h3>You’ve any question? feel free to contact with us.</h3>
                    </div><!-- /.title -->
                    <div class="single-contact-info">
                        <h4>Call us for imiditate support on this number</h4>
                        <p>+ 666 888 22 444</p>
                    </div><!-- /.single-contact-info -->
                    <div class="single-contact-info">
                        <h4>Send us email for any kind of inquiry</h4>
                        <p>info@binmp.com</p>
                    </div><!-- /.single-contact-info -->
                </div><!-- /.contact-infos -->
            </div><!-- /.col-md-5 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.contact-style-one -->

<div class="footer-top">
    <div class="thm-container clearfix">
        <div class="logo pull-left">
            <a href="index.html"><img src="{{ asset('landing/img/logo-1-1.png') }}" alt="Awesome Image"/></a>
        </div><!-- /.logo pull-left -->
        <div class="social pull-right">
            <a href="#" class="fab fa-twitter"></a><!--
            --><a href="#" class="fab fa-facebook-f"></a><!--
            --><a href="#" class="fab fa-instagram"></a><!--
            --><a href="#" class="fab fa-google-plus-g"></a>
        </div><!-- /.social pull-right -->
    </div><!-- /.thm-container clearfix -->
</div><!-- /.footer-top --> --}}
<div class="footer-bottom text-center">
    <div class="thm-container">
        <p>&copy; copyright 2023 IT Telkom Purwokerto</p>
    </div><!-- /.thm-container -->    
</div><!-- /.footer-bottom -->

<div class="search_area zoom-anim-dialog mfp-hide" id="test-search">
    <div class="search_box_inner">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fas fa-search"></i></button>
            </span>
        </div>
    </div>
</div>

<div class="scroll-to-top scroll-to-target" data-target="html"><i class="fa fa-angle-up"></i></div>                    

<script src="{{ asset('landing/js/jquery.js') }}"></script>

<script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('landing/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('landing/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('landing/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('landing/js/isotope.js') }}"></script>
<script src="{{ asset('landing/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('landing/js/waypoints.min.js') }}"></script>
<script src="{{ asset('landing/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('landing/js/wow.min.js') }}"></script>
<script src="{{ asset('landing/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('landing/js/custom.js') }}"></script>


<!--Revolution Slider-->
<script src="{{ asset('landing/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('landing/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('landing/plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('landing/plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('landing/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('landing/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('landing/plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('landing/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('landing/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('landing/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('landing/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script src="{{ asset('landing/js/main-slider-script.js') }}"></script>

</body>
</html>