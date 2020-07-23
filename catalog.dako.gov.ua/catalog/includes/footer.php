<footer>© 2017 - <?php echo date("Y"); ?>  State archive.<br> Developers: <b>Konstantinov, Petrov, Sologub </b>
<br>
<b>Розмір бази даних:</b> <span id="bdsize"></span> килобайт

<div id="qoo-counter" style = "margin: 3px auto;">
<!--bigmir)net TOP 100-->
<script type="text/javascript" language="javascript">
function BM_Draw(oBM_STAT){
document.write('<table cellpadding="0" cellspacing="0" border="0" style="display:inline;margin-right:4px;"><tr><td><div style="margin:0;padding:0;font-size:1px;width:88px;"><div style="background:url(\'//i.bigmir.net/cnt/samples/diagonal/b59_top.gif\') no-repeat top;height:1px;line-height:1px;"> </div><div style="font:10px Tahoma;text-align:center;background-color:#EFEFEF;height:15px;"><a href="http://www.bigmir.net/" target="_blank" style="color:#0000ab;text-decoration:none;">bigmir<span style="color:#ff0000;">)</span>net</a></div><div style="height:1px;background:url(\'//i.bigmir.net/cnt/samples/diagonal/b59_top.gif\') no-repeat bottom;"></div><div style="font:10px Tahoma;padding-left:7px;background:url(\'//i.bigmir.net/cnt/samples/diagonal/b59_center.gif\');"><div style="padding:4px 6px 0 0;"><div style="float:left;color:#969696;">хиты</div><div style="float:right;color:#003596;font:10px Tahoma;">'+oBM_STAT.hits+'</div></div><br clear="all" /><div style="padding-right:6px;"><div style="float:left;color:#969696;">хосты</div><div style="float:right;color:#003596;font:10px Tahoma;">'+oBM_STAT.hosts+'</div></div><br clear="all" /><div style="padding-right:6px;"><div style="float:left;color:#969696;">всего</div><div style="float:right;color:#003596;font:10px Tahoma;">'+oBM_STAT.total+'</div></div><br clear="all" /><div style="height:3px;"></div></div><div style="background:url(\'//i.bigmir.net/cnt/samples/diagonal/b59_bottom.gif\') no-repeat top;height:2px;line-height:1px;"> </div></div></td></tr></table>');
}
</script>
<script type="text/javascript" language="javascript">
bmN=navigator,bmD=document,bmD.cookie='b=b',i=0,bs=[],bm={o:1,v:16953106,s:16953106,t:0,c:bmD.cookie?1:0,n:Math.round((Math.random()* 1000000)),w:0};
for(var f=self;f!=f.parent;f=f.parent)bm.w++;
try{if(bmN.plugins&&bmN.mimeTypes.length&&(x=bmN.plugins['Shockwave Flash']))bm.m=parseInt(x.description.replace(/([a-zA-Z]|\s)+/,''));
else for(var f=3;f<20;f++)if(eval('new ActiveXObject("ShockwaveFlash.ShockwaveFlash.'+f+'")'))bm.m=f}catch(e){;}
try{bm.y=bmN.javaEnabled()?1:0}catch(e){;}
try{bmS=screen;bm.v^=bm.d=bmS.colorDepth||bmS.pixelDepth;bm.v^=bm.r=bmS.width}catch(e){;}
r=bmD.referrer.replace(/^w+:\/\//,'');if(r&&r.split('/')[0]!=window.location.host){bm.f=escape(r).slice(0,400);bm.v^=r.length}
bm.v^=window.location.href.length;for(var x in bm) if(/^[ovstcnwmydrf]$/.test(x)) bs[i++]=x+bm[x];
bmD.write('<sc'+'ript type="text/javascript" language="javascript" src="//c.bigmir.net/?'+bs.join('&')+'"></sc'+'ript>');
</script>
<noscript>
<a href="http://www.bigmir.net/" target="_blank"><img src="//c.bigmir.net/?v16953106&s16953106&t2" width="88" height="31" alt="bigmir)net TOP 100" title="bigmir)net TOP 100" border="0" /></a>
</noscript>
<!--bigmir)net TOP 100-->
</div>


</footer>	


 <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"> -->
 <!-- <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.0/css/responsive.bootstrap.min.css">  -->
 
 <script>
 
 $(function() {
    $.ajax({url: "scripts/dbsize.php", success: function(result){
    $("#bdsize").html(result);
	 }});
});
 
 </script>
 
</body>
</html>
