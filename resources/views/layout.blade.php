<!DOCTYPE html>
<html>
<head>
<title>Annelie Smits - {{ucfirst($name)}}</title>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="Description" CONTENT="Annelie Smits, Zangeres, De Goorn, Coverband Jamm">

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

<link rel="stylesheet" href="/css/annelie2.css" type="text/css">
<link rel="stylesheet" href="/css/media_queries.css" type="text/css">
<link rel="stylesheet" href="/css/flexcroll/flexcrollstyles.css" type="text/css">

<script type="text/javascript" src="/js/flexcroll/script/flexcroll.js"></script>

</head>
<body>
    
<!-- header -->
    <div id="topdiv" class="header-wrapper">
        <span class="header-name">
            Annelie Smits
        </span>
        
        <div class="header-link-box">
            <div class="header-link">
                <div>
                    <a href="/">Home</a>
                </div>
                @if( $name === "home" )
                <div><hr></div>
                @else
                <div></div>
                @endif
            </div>
            
            <span class="header-seperator">|</span>

            <div class="header-link">
                <div>
                    <a href="/biografie">Biografie</a>
                </div>
                @if( $name === "biografie" )
                <div><hr></div>
                @else
                <div></div>
                @endif
            </div>
            
            <span class="header-seperator">|</span>

            <div class="header-link">
                <div>
                    <a href="/galerij">Galerij</a>
                </div>
                @if( $name === "galerij" )
                <div><hr></div>
                @else
                <div></div>
                @endif
            </div>
            
            <span class="header-seperator">|</span>

            <div class="header-link">
                <div>
                    <a href="/contact">Contact</a>
                </div>
                @if( $name === "contact" )
                <div><hr></div>
                @else
                <div></div>
                @endif
            </div>
        </div>
        
    </div>
<!-- /header -->
    
<!-- content -->
    <div class="site-wrapper">
        
        <div class="wrapper-left" style="">
            
            <div id="mycustomscroll" class="left-content flexcroll">
                
                <p style="width: 100%; overflow-wrap: normal;">
                     @yield('left-content-1')
                </p>
                
                <p style="width: 100%; overflow-wrap: normal;">
                    @yield('left-content-2')
                </p>
                
                <p style="width: 100%; overflow-wrap: normal;">
                    @yield('left-content-3')
                </p>
                
                <p style="height: 116px;">
                    &nbsp;
                </p>

            </div>
            
        </div>
        
        <div class="wrapper-right" style="">
            <p>
                <!--Rechts-->
                &nbsp;
            </p>
        </div>
        
    </div>
<!-- /content -->
    
    <br class="clearBoth">

<!-- footer -->
    <div class="footer-wrapper-holder">&nbsp;</div>


    <div id="bottomdiv" class="footer-wrapper">
        <div class="footer-image-box">
            <a href="https://www.facebook.com/Annelie-Smits-213618998776749/" class="footer-image-link">
                <img src="/images/icon_facebook_round.png" alt="Facebook van Annelie" title="Facebook van Annelie">
            </a>
        </div>
        <div class="footer-image-box">
            <a href="https://www.youtube.com/user/vincedop" class="footer-image-link">
                <img src="/images/icon_youtube2_round.png" alt="Youtube van Annelie" title="Youtube van Annelie">
            </a>
        </div>
        <div class="footer-image-box">
            <a href="https://www.instagram.com/anneliesmits/" class="footer-image-link">
                <img src="/images/icon_instagram_round.png" alt="Instagram van Annelie" title="Instagram van Annelie">
            </a>
        </div>
        <div class="footer-image-box">
            <a href="https://twitter.com/anneliee1" class="footer-image-link">
                <img src="/images/icon_twitter_round.png" alt="Twitter van Annelie" title="Twitter van Annelie">
            </a>
        </div>
        <div class="footer-image-box">
            <a href="https://soundcloud.com/anneliesmits" class="footer-image-link">
                <img src="/images/icon_soundcloud_round.png" alt="Soundcloud van Annelie" title="Soundcloud van Annelie">
            </a>
        </div>
    </div>
<!-- /footer -->

</body>
</html>