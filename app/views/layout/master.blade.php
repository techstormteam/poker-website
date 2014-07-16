<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>{{ $title }}</title>

        <link href="{{ $assets }}/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="{{ $assets }}/js/jquery-1.5.2.min.js"></script>
        <script>
$(document).ready(function() {
    var defaultLan = "English";
    var r = $('#language h2 span').text();
    $('#language').hover(function() {
        $(this).find("ul").slideDown();
        return false;
    })
    $('#language ul a').hover(function() {
        var r = $(this).text();
        $('#language h2 span').text(r);
    }).click(function() {
        defaultLan = $(this).text();
    });
    $('#language').mouseleave(function() {
        $('#language h2 span').text(defaultLan);
        $(this).find("ul").slideUp();
        return false;
    });
});
        </script>
    </head>

    <body>
        <div id="header">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left" valign="top"><img src="{{ $assets }}/images/logo.gif" width="340" height="83" alt="" /></td>
                    <td align="right" valign="middle"><p class="ass_text">ONLINE NOW:  4807 Players   I  91 Tournaments</p>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><a href="http://168.144.171.228:8087/" target="_blank"><img src="{{ $assets }}/images/play_online.gif" width="153" height="33" alt="" /></a></td>
                                <td>&nbsp;</td>
                                <td><div id="language">
                                        <h2><span>English</span></h2>
                                        <ul>
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">Dansk</a></li>
                                            <li><a href="#">Español</a></li>
                                            <li><a href="#">Suomi</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div id="banner"> <img src="{{ $assets }}/images/caption.gif" width="296" height="141" alt="" style="padding:0px 0px 35px 0px;" /><br />
            <a href="#"><img src="{{ $assets }}/images/tournaments.gif" width="154" height="32" alt="" style="padding:0px 0px 5px 4px;" /></a><br />
            <a href="#"><img src="{{ $assets }}/images/faq.gif" width="154" height="32" alt="" style="padding:0px 0px 5px 4px;"  /></a> </div>
        <div id="menu_outer">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><img src="{{ $assets }}/images/menu_left.gif" width="29" height="55" alt="" /></td>
                    <td><div id="menu">
                            <ul>
                                <li class="nobg"><a href="{{ URL::to('home/index') }}" class="active"> Home </a></li>
                                @if(!Auth::check())
                                <li><a href="{{ URL::to('home/login') }}">Sign in</a></li>
                                @else
                                <li><a href="#">Sign out</a></li>
                                @endif
                                <!--                                <li><a href="#">About</a></li>
                                                                <li><a href="#">Strategies</a></li>
                                                                <li><a href="#">Tournaments</a></li>
                                                                <li><a href="#">Freerolls</a></li>
                                                                <li><a href="#">Promos &amp; Bonuses</a> </li>
                                                                <li><a href="#">Help</a> </li>
                                                                <li><a href="#">Contact</a></li>-->
                            </ul>
                        </div></td>
                    <td><img src="{{ $assets }}/images/menu_right.gif" width="29" height="55" alt="" /></td>
                </tr>
            </table>
            <img src="{{ $assets }}/images/shadow.gif" width="1000" height="21" alt="" /> </div>

        @yield('content')

        <div id="footer">
            <div id="foot_box">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="left" valign="top"><img src="{{ $assets }}/images/foot_left.gif" width="19" height="96" alt="" /></td>
                        <td align="left" valign="top"><div id="foot_box_in">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="center" valign="middle"><a href="#"><img src="{{ $assets }}/images/foot_1.gif" width="90" height="34" alt="" /></a></td>
                                        <td align="center" valign="middle"><a href="#"><img src="{{ $assets }}/images/foot_2.gif" width="50" height="32" alt="" /></a></td>
                                        <td align="center" valign="middle"><a href="#"><img src="{{ $assets }}/images/foot_3.gif" width="50" height="32" alt="" /></a></td>
                                        <td align="center" valign="middle"><a href="#"><img src="{{ $assets }}/images/foot_4.gif" width="57" height="32" alt="" /></a></td>
                                        <td align="center" valign="middle"><a href="#"><img src="{{ $assets }}/images/foot_5.gif" width="79" height="30" alt="" /></a></td>
                                        <td align="center" valign="middle"><a href="#"><img src="{{ $assets }}/images/foot_6.gif" width="86" height="28" alt="" /></a></td>
                                        <td align="center" valign="middle"><a href="#"><img src="{{ $assets }}/images/foot_7.gif" width="93" height="26" alt="" /></a></td>
                                        <td align="center" valign="middle"><img src="{{ $assets }}/images/foot_logo.gif" width="297" height="70" alt="" /></td>
                                    </tr>
                                </table>
                            </div></td>
                        <td align="left" valign="top"><img src="{{ $assets }}/images/foot_right.gif" width="19" height="96" alt="" /></td>
                    </tr>
                </table>
            </div>
            <p><a href="#" class="active"> Home </a> I <a href="#">About</a> I <a href="#">Strategies</a> I <a href="#"> Tournaments</a> I <a href="#">Freerolls</a> I <a href="#">Promos &amp; Bonuses</a> I <a href="#"> Help </a> I <a href="#">Contact</a></p>
            <span class="dt">Copyright 2011 - All Rights Reserved</span> </div>

        <!-- Begin http://www.pokertemplates.org | http://www.gamingguide.net Code | Do Not Remove -->
        <table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr> 
                <td align="left" valign="middle"> 
                    <div align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="FEFEFE">Template 
                            by</font><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                            <a href="http://www.gamingguide.net" target="_blank" rel="nofollow"><font color="24C6D7">Online 
                                    Casino Guide</font></a> <font color="FEFEFE">&amp;</font> <a href="http://www.pokertemplates.org" target="_blank" rel="nofollow"><font color="24C6D7">Free 
                                    Poker Templates</font></a></font></div>
                </td>
            </tr>
        </table>
        <!-- End http://www.pokertemplates.org | http://www.gamingguide.net Code | Do Not Remove -->

    </body>
</html>
