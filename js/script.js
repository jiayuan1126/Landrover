window.onload=function(){
	$(".loading").hide().remove();
}
$(function(){
	$("body").css('height',$(window).height());
	$("body").css('width',$(window).width());
	var mySwiper = new Swiper('#pages',{
		direction : 'vertical',
		speed:400
	});
	var page4Swiper = new Swiper('#page4Box',{
		direction : 'horizontal',
		pagination : '#fenye1',
		autoplay : 5000,
		speed:700,
		autoplayDisableOnInteraction : false
	});
	var page5Swiper = new Swiper('#page5Box',{
		direction : 'horizontal',
		pagination : '#fenye2',
		autoplay : 5000,
		speed:700,
		autoplayDisableOnInteraction : false
	});
	var $lj=$('.lj');
	$lj.on('click',function(){
		window.location.href="http://www.landrover.com.cn/vehicles/new-discovery-sport/local-l550-extension.html"
	})
   	var $iBox = $('.i-box-wrap');
    $iBox.on('click', function() {
        var $this = $(this);
        if (!$this.hasClass('i-click')) {
            $iBox.removeClass('i-click');
            $this.addClass('i-click');
        }
    });
      var $flag = $('.gou img');
    $flag.on('click', function() {
        var $this = $(this);
        if ($this.attr('data-flag') == 'true') {
            $this.attr('data-flag', 'false');
            $this.attr('src', 'img/page2/gou2.png');
        } else {
            $this.attr('data-flag', 'true');
            $this.attr('src', 'img/page2/gou1.png');
        }
    });
    	$('.btn').on('click',function(){
        var postJson = {
            name:'',
            sex:'',
            phone:'',
            btime:'',
            content:'',
            project:50
        }
        postJson.name = $('#name').val();
        postJson.sex = $('.cb .i-click').attr('data-value');
        postJson.phone = $("#phone").val();
        postJson.btime = $("#time").val();
        postJson.content = $("#content").val();
        console.log(postJson);
        for(var i in postJson){
            if(postJson[i]===null||postJson[i]===""||postJson[i]===undefined){
                alert("输入数据有误") ;
                return ;
            }
        }
        if(!(checkPhoneRule(postJson.phone))){
            alert("手机号码格式错误") ;
            return ;
        }
        else if(localStorage.getItem("JACYiDianPhone")==postJson.phone){
            alert("您已经提交过啦！");
            return ;
        }
        else{
        	    $.post('http://t1.toptest.yidianzixun.com:8888/tool/yysjInfo',postJson,function(result){
            if(result.status==1){
                alert("提交成功");
                localStorage.setItem("JACYiDianName",postJson.name) ;
                localStorage.setItem("JACYiDianPhone",postJson.phone) ;
            }
            else{
                alert("提交失败，请检查信息");
            }
        });
    }
});
})
function checkPhoneRule(string){
    var pattern = /^1[34578]\d{9}$/;
    if (pattern.test(string)) {
        return true;
    }
    return false;
}