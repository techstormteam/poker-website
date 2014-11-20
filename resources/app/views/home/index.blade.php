@extends('layout.bootstrap')

@section('script')

@if(Session::has('register_message'))
<script>
    $.UIkit.notify('{{ Session::get("register_message") }}', {status:'success'});
</script>
@endif

@if(Session::has('login_message'))
<script>
    $.UIkit.notify('{{ Session::get("login_message") }}', {status:'success'});
</script>
@endif

@if(Session::has('logout_message'))
<script>
    $.UIkit.notify('{{ Session::get("logout_message") }}', {status:'success'});
</script>
@endif

@stop

@section('content')
<div id="contain">
    <div id="box">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="left" valign="top"><a href="#"><img src="{{ $assets }}/images/ad_1.jpg" width="317" height="194" alt="" /></a></td>
                <td align="center" valign="top"><a href="#"><img src="{{ $assets }}/images/ad_2.jpg" width="358" height="194" alt="" /></a></td>
                <td align="right" valign="top"><a href="#"><img src="{{ $assets }}/images/ad_3.jpg" width="318" height="195" alt="" /></a></td>
            </tr>
        </table>
    </div>
    <div id="box">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="left" valign="top"><div id="black_box">
                        <div><img src="{{ $assets }}/images/black_up.gif" width="679" height="32" alt="" /></div>
                        <div id="black_box_in">
                            <p class="bold_text"><span>Welcome -</span> Play Poker Online</p>
                            <table width="98%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="180" align="left" valign="top"><img src="{{ $assets }}/images/wel_pic.gif" width="141" height="130" alt="" /></td>
                                    <td align="left" valign="top"><p>Vestibulum at urna id nunc imperdiet lacinia tristique sit amet tellus. Sed non elit enim. Suspendisse tempor facilisis dolor, ac imperdiet felis dignissim sed. Donec est enim, tempus a imperdiet ut, porttitor consequat neque.</p>
                                        <p>Praesent quam sem, euismod quis condimentum et, condimentum dignissim leo. Maecenas dictum blandit turpis, eget adipiscing nisl semper eu. Cras faucibus enim sit amet risus dictum ultricies.</p></td>
                                </tr>
                            </table>
                        </div>
                        <img src="{{ $assets }}/images/black_bot.gif" width="679" height="32" alt="" /> </div></td>
                <td align="left" valign="top"><div id="yellow_box">
                        <ul>
                            <li>Maecenas venenatis arcu in nibh aliquet.</li>
                            <li>In nec risus nibh, non aliquam lectus.</li>
                            <li>Aliquam hendrerit commodo quam placerat.</li>
                            <li>Duis mollis malesuada quam faucibus libero.</li>
                        </ul>
                        <br />
                        <a href="#"><img src="{{ $assets }}/images/play_poker.gif" width="197" height="39" alt="" style="padding-left:30px;" /></a></div></td>
            </tr>
        </table>
    </div>
</div>
@stop