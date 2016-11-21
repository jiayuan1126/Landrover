<?php

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url = urlencode($url);
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://t1.toptest.yidianzixun.com/webservice/wxShare/get.php?clientUrl=" . $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "Key=ydinfo2016&RequestObjectList=%5B%5D",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: application/x-www-form-urlencoded"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $response = json_decode($response);
    $data = $response->data;

    $timestamp = $data->timestamp;

    $nonceStr = $data->nonceStr;

    $signature = $data->signature;
}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no" />
		<!--从桌面icon启动IOS Safari是否进入全屏状态（APP模式-->
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<!--	添加到主屏幕“后，全屏显示-->
		<meta name="apple-touch-fullscreen" content="yes" />
		<!--	指定状态栏的颜色-->
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<!--手机号码不被显示为拨号链接-->
		<meta name="format-detection" content="telephone=no">
		<!-- 浏览器全屏显示-->
		<meta name="screen-orientation" content="portrait">
		<meta name="full-screen" content="yes">
		<meta name="x5-orientation" content="portrait">
		<meta name="x5-fullscreen" content="true">
		<title>路虎</title>
		<link rel="stylesheet" href="css/swiper-3.3.1.min.css" />
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<!--一点资讯分享-->
		<div id="yidian_share_title" class="yidianShare" style="display:none;">发现基因 与生俱来，路虎之境从发现神行开始。</div>
		<div id="yidian_share_content" class="yidianShare" style="display:none;"></div>
		<div id="yidian_share_url" class="yidianShare" style="display:none;">http://t1.toptest.yidianzixun.com/2016/Landrover/app.php</div>
		<div id="yidian_share_imageurl" class="yidianShare" style="display:none;">http://tstatic.toptest.yidianzixun.com.ks3-cn-beijing.ksyun.com/public/files/share1479660532059.jpg</div>
		<!-- end -->
		<div style="display: none;" id="timestamp" class="wxShare"><?php echo $timestamp; ?></div>
		<div style="display: none;" id="nonceStr" class="wxShare"><?php echo $nonceStr; ?></div>
		<div style="display: none;" id="signature" class="wxShare"><?php echo $signature; ?></div>
		<div id="pages" class="swiper-container">
			<div class="swiper-wrapper pageCommon">
				<div class="swiper-slide page1">
		        		<div class="next nextPage text">
						<img src="img/jt.png"/>
					</div>
					<div class="lj"></div>
	        		</div>
	        		<div class="swiper-slide page2">
		        		<div class="fromInput">
		        			 <div class="page-2-item">
		                        <span class="sp1">姓&nbsp;&nbsp;名：</span>
		                        <div class="input">
		                        		<input type="text" name="name" id="name" placeholder="请填写姓名">
		                        </div>
		                    </div>
		                    <div class="page-2-item">
		                        <span class="sp2">性&nbsp;&nbsp;别：</span>
		                        <span class="cb">
		                            <span class="i-box-wrap i-click" data-value="先生">
		                                <span class="i-box"></span><span>&nbsp;先生</span>
		                            </span>
		                            <span class="i-box-wrap" data-value="女士">
		                                <span class="i-box"></span><span>&nbsp;女士</span>
		                            </span>
		                        </span>
		                    </div>
		                    <div class="page-2-item">
		                        <span class="sp3">手&nbsp;&nbsp;机：</span>
		                        <div class="input">
		                        		<input type="text" name="phone" id="phone" placeholder="请填写手机号码">
		                        </div>
		                    </div>
		                    <div class="page-2-item">
		                        <span class="sp4">购车时间：</span>
		                        <div class="input inp1">
		                            <select id="time">
		                                 <option value="">请选择购车时间</option>
				                        <option value="0-3个月">0-3个月</option>
				                        <option value="4-6个月">4-6个月</option>
				                        <option value="7-12个月">7-12个月</option>
				                        <option value="一年以后">一年以后</option>
				                        <option value="不需要">不需要</option>
		                            <select>
		                        </div>
		                    </div>
		                    <div class="page-2-item">
		                        <span class="sp5">购车预算：</span>
		                        <div class="input inp2">
		                            <select id="content">
		                                 <option value="">请选择购车预算</option>
				                        <option value="50万以下">50万以下</option>
				                        <option value="50-99万">50-99万</option>
				                        <option value="100-149万">100-149万</option>
				                        <option value="150-200万">150-200万</option>
				                        <option value="200万以上">200万以上</option>
		                            <select>
		                        </div>
		                    </div>
		        		</div>
		        		 <div class="textCheckbox">
		                        <div class="gou">
		                            <img data-flag='true' src="img/page2/gou1.png">
		                        </div>
		                    </div>
		        		<div class="btn"></div>
		        		<div class="next nextPage text">
						<img src="img/jt.png"/>
					</div>
	        		</div>
	        		<div class="swiper-slide page3">
	        			<div class="page3-bg"></div>
		        		<div class="next nextPage text">
						<img src="img/jt.png"/>
					</div>
	        		</div>
	        		<div class="swiper-slide page4">
	        			<div id="page4Box" class="swiper-wrapper">
		        			<div class="swiper-wrapper pageCommon">
		        				<div class="swiper-slide page4Child1"></div>
		        				<div class="swiper-slide page4Child2"></div>
		        				<div class="swiper-slide page4Child3"></div>
		        				<div class="swiper-slide page4Child4"></div>
		        			</div>
		        			<div id="fenye1" class="fenye1"></div>
		        		</div>
		        		<div class="next nextPage text">
						<img src="img/jt.png"/>
					</div>
	        		</div>
	        		<div class="swiper-slide page5">
	        			<div id="page5Box" class="swiper-wrapper">
		        			<div class="swiper-wrapper pageCommon">
		        				<div class="swiper-slide page5Child1"></div>
		        				<div class="swiper-slide page5Child2"></div>
		        				<div class="swiper-slide  page5Child3"></div>
		        				<div class="swiper-slide  page5Child4"></div>
		        			</div>
		        			<div id="fenye2" class="fenye2"></div>
		        		</div>
		        		<div class="next nextPage text">
						<img src="img/jt.png"/>
					</div>
	        		</div>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery-2.1.4.min.js" ></script>
		<script type="text/javascript" src="js/swiper-3.3.1.min.js" ></script>
		<script type="text/javascript" src="js/script.js" ></script>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<script type="text/javascript">
        		    var my_timestamp=document.getElementById('timestamp').innerText.trim();
        		    var my_nonceStr=document.getElementById('nonceStr').innerText.trim();
        		    var my_signature=document.getElementById('signature').innerText.trim();
        		    var myWXdata = {
        		       imgurl:$('#yidian_share_imageurl').text(),
        		       url:$('#yidian_share_url').text(),
        		       title:$('#yidian_share_title').text(),
        		       desc:$('#yidian_share_content').text()
        		   };
        		    wx.config({
        		        debug: false,//判断是否为debug模式
        		        appId:'wxdda4779e3944e490',
        		        timestamp:my_timestamp,
        		        nonceStr:""+my_nonceStr,
        		        signature:""+my_signature,
        		        jsApiList:[
        		            'checkJsApi',
        		            'onMenuShareTimeline',
        		            'onMenuShareAppMessage',
        		            'onMenuShareQQ',
        		            'onMenuShareWeibo'
        		        ]//开启的功能列表
        		    });
        		    var sharePerson = function(){
        		        wx.ready(function(){
        		            var mydata=myWXdata;
        		            wx.onMenuShareTimeline({
        		                title: mydata.title,
        		                link: mydata.url,
        		                imgUrl: mydata.imgurl,
        		                trigger: function (res) {
        		                    //alert('点击分享到朋友圈');
        		                },
        		                success:function(res){

        		                }
        		            });
        		            //alert('已注册获取“分享到朋友圈”状态事件');
        		            wx.onMenuShareAppMessage({
        		                title: mydata.title,
        		                desc: mydata.desc,
        		                link:  mydata.url,
        		                imgUrl: mydata.imgurl,
        		                trigger: function (res) {
        		                    //alert('用户点击发送给朋友');
        		                },
        		                success:function(res){

        		                }
        		            });
        		            wx.onMenuShareQQ({
        		                title: mydata.title,
        		                desc: mydata.desc,
        		                link: mydata.url,
        		                imgUrl: mydata.imgurl,
        		                trigger: function (res) {
        		                    //alert('用户点击分享到QQ');
        		                },
        		                success:function(res){

        		                }
        		            });
        		        });
        		    };
        		    sharePerson();
        		</script>
	</body>
</html>
