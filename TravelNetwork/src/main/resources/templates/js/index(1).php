$(function(){$('.js_banner1').Banner({imgBox:'.banner_list_box',tabName:'.banner_tab',btnL:'.btn_l',btnR:'.btn_r',isHaoye:true});$('.js_banner2').Banner({imgBox:'.banner_list_box',tabName:'.banner_tab',btnL:'.btn_l',btnR:'.btn_r'});$('.js_banner3').Banner({imgBox:'.banner_list_box',tabName:'.banner_tab',btnL:'.btn_l',btnR:'.btn_r'});$('.js_banner4').Banner({imgBox:'.banner_list_box',tabName:'.banner_tab',btnL:'.btn_l',btnR:'.btn_r',tabThis:'active',tage:'span',speed:3000,direction:'top',isHaoye:true});var hover=false;var Timer1=null,Timer2=null,Timer3=null;var attrX=[];$('.quick_list').hover(function(){Timer1=setTimeout(function(){hover=true;},300);},function(){hover=false;clearTimeout(Timer1);});$('.quick_nav').hover(function(e){var This=this;var X=e.pageX;var l=attrX.length;var oldX=attrX[l-5];if(hover==true&&X<=oldX+5){hoverNav(This);clearTimeout(Timer3);attrX=[];}else{clearTimeout(Timer3);Timer2=setTimeout(function(){hoverNav(This);},500)};},function(){var This=this;Timer3=setTimeout(function(){$(This).removeClass('active');},300);clearTimeout(Timer2);});$('.quick_list').mousemove(function(e){var X=e.pageX;attrX.push(X);});function hoverNav(This){var mainH=$(This).find('.quick_main').height()+1;var tHeight=$(This).offset().top+mainH;var wHeight=$(window).scrollTop()+$(window).height();var num=$(This).index(),thisH=$(This).height();if($(This).offset().top+thisH>$(This).parent().offset().top+mainH){$(This).find('.quick_main').css('top',-(mainH-thisH));}else{$(This).find('.quick_main').css('top',-num*thisH-1);}
$(This).addClass('active').siblings().removeClass('active');}
$('.JS_announ_tab li').click(function(){var num=$(this).index();$(this).addClass('active').siblings().removeClass('active');$('.announ_list_box dd').eq(num).show().siblings().hide();});$("span.tuan_time").ui('countdown',{format:"dd:hh:mm"});$('.rx_tab li').click(function(){$(this).addClass('active').siblings().removeClass('active');$(this).parent().siblings('.rx_list').eq($(this).index()).show().siblings('.rx_list').hide();});$('a').click(function(){if($(this).attr('href')!=''&&$(this).attr('href')!='javascript:;'){_gaq.push(['_trackEvent','index_abtest','new','clicks']);}});});(function($){$.Banner={init:function(data){if(data.This.find(data.tabName).find('li').length>1){this.fangfa(data)}else{data.This.find(data.tabName).hide();data.This.find(data.btnR),data.This.find(data.btnL).hide();}},fangfa:function(data){var img_box=data.This.find(data.imgBox),tab_name=data.This.find(data.tabName),btn_l=data.This.find(data.btnL),btn_r=data.This.find(data.btnR),runName=img_box.find('ul'),liW=tab_name.find('li:first').width(),timer=null,dir=data.direction,data_ad=runName.find('li:last').attr('data-adsrc');if(data.isHaoye==false){runName.prepend('<li>'+runName.find('li:last').html()+'</li>');}else{runName.prepend('<li data-type="ad" data-adsrc="'+data_ad+'">'+runName.find('li:last').html()+'</li>');}
if(dir=='top'){var imgW=runName.find('li:first').height()
runName.css({'top':-imgW,'width':runName.find('li').length*imgW});}else{var imgW=runName.find('li:first').width()
runName.css({'left':-imgW,'width':runName.find('li').length*imgW});}
tab_name.find('li').hover(function(){var index=$(this).index()+1;$(this).addClass(data.tabThis).siblings().removeClass(data.tabThis).find(data.tage).css('width',0);data.This.find('.'+data.tabThis).find(data.tage).css('width',liW);if(dir=='top'){runName.stop().animate({'top':-imgW*index},500);}else{runName.stop().animate({'left':-imgW*index},500);}});btn_l.click(function(){var tabIndex=data.This.find('.'+data.tabThis).index()-1;var fx=false;imgRun(tabIndex,runName,fx);});btn_r.click(function(){var tabIndex=data.This.find('.'+data.tabThis).index()+1;var fx=true;imgRun(tabIndex,runName,fx);});function imgRun(index,obj,fx){if(dir=='top'){var nowLeft=obj.position().top;}else{var nowLeft=obj.position().left;}
if(nowLeft%2!=0){nowLeft=nowLeft-1;}
tab_name.find(data.tage).css('width',liW);if(nowLeft%imgW==0){tab_name.find('li').eq(index).find(data.tage).css('width',liW);if(nowLeft==-imgW&&fx==false){tab_name.find('li:last').addClass(data.tabThis).siblings().removeClass(data.tabThis);if(dir=='top'){obj.animate({'top':0},500,function(){obj.css('top',-obj.parent().height()*(obj.find('li').length-1));});}else{obj.animate({'left':0},500,function(){obj.css('left',-obj.parent().width()*(obj.find('li').length-1));});}}else if(nowLeft==-imgW*tab_name.find('li').length&&fx==true){tab_name.find('li:first').addClass(data.tabThis).siblings().removeClass(data.tabThis);if(dir=='top'){obj.css('top',0).animate({'top':-imgW},500);}else{obj.css('left',0).animate({'left':-imgW},500,function(){obj.css('left',-imgW)});}}else{if(dir=='top'){obj.animate({'top':-imgW*(index+1)},500);}else{obj.animate({'left':-imgW*(index+1)},500,function(){obj.css('left',-imgW*(index+1))});}
tab_name.find('li').eq(index).addClass(data.tabThis).siblings().removeClass(data.tabThis);};};}
function tabRun(){clearTimeout(timer);var tab_this=tab_name.find('.'+data.tabThis);var W=parseInt(tab_this.find(data.tage).width());if(parseInt(tab_this.find(data.tage).width())==liW){W=0;}
timer=setInterval(function(){W+=1;if(W>liW){W=liW};tab_this.find(data.tage).css('width',W);if(W==liW){tab_this.find(data.tage).css('width',W);var tabIndex=tab_this.index()+1;var fx=true;imgRun(tabIndex,runName,fx);tabRun();}},data.speed/liW);};tabRun();data.This.hover(function(){data.This.find(btn_l).show();data.This.find(btn_r).show();clearTimeout(timer);},function(){data.This.find(btn_l).hide();data.This.find(btn_r).hide();tabRun();});}};$.fn.Banner=function(options){var data={This:this,direction:'left',tabThis:'active',tage:'span',speed:5000,isHaoye:false};$.extend(true,data,options||{});$.Banner.init(data);};})(jQuery);
;$(function(){$(".y_input").focus(function(){$(this).parent().siblings(".y_error_msg").hide();}).blur(function(){if(this.value==""){$(".y_txt_info").show();}});$(".yjdy_btn").click(function(){var This=$(this);var input=This.siblings(".y_input");var error_msg=This.parent().siblings(".y_error_msg");var reg=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;var parentL=input.parent().parent().offset().left;var parentT=input.parent().parent().offset().top;var _input_left=input.offset().left-parentL;var _input_top=input.offset().top-parentT+input.height()+8;if(!reg.test(input.val())){input.blur();error_msg.css({left:_input_left,top:_input_top,display:"inline-block"}).fadeIn(300).find("label").html("请输入正确的Email地址").css("display","inline-block");}else{var two=This.parent().siblings(".y_s_two").removeClass("hide");two.html(two.html());var subscribe="({";subscribe+='\"isUpdate\":\"true\",';subscribe+='\"email\":\"'+input.val()+'\",';subscribe+='\"subscribe.email\":\"'+input.val()+'\",';subscribe+='\"subscribe.channel\":\"FAST\",';var type=new Array();type.push("MARKETING_EMAIL");type.push("PRODUCT_EMAIL");subscribe+="\"regEdmType\":\""+type+'\"';subscribe+="})";subscribe=eval(subscribe);$.ajax({type:"POST",async:true,url:"/edm/checkEmailIsSubscribe.do",data:{"subscribe.email":input.val(),"isUpdate":"true"},dataType:"json",success:function(data){if(data.success!=true&&data.success!="true"){var error=data.message;if(error=="A"){error="请填写邮箱后订阅";}else if(error=="B"){error="请填写正确的邮箱";}else if(error=="C"){error="您已经订阅过该邮件了";}else if(error=="D"){error="请选择订阅邮件类型";}else if(error=="F"){error="订阅失败，请稍后重试";}
input.blur();error_msg.css({left:_input_left,top:_input_top,display:"inline-block"}).fadeIn(300).find("label").html(error).css("display","inline-block");This.parent().siblings(".y_s_one").removeClass("hide");This.parent().siblings(".y_s_two,.y_s_three").addClass("hide");}else{$.ajax({type:"POST",async:true,url:"/edm/subscribeEmail.do",data:subscribe,dataType:"json",success:function(data){if(data.success!=true&&data.success!="true"){var error=data.message;if(error=="A"){error="请填写邮箱后订阅";}else if(error=="B"){error="请填写正确的邮箱";}else if(error=="C"){error="您已经订阅过该邮件了";}else if(error=="D"){error="请选择订阅邮件类型";}else if(error=="F"){error="订阅失败，请稍后重试";}
input.blur();error_msg.css({left:_input_left,top:_input_top,display:"inline-block"}).fadeIn(300).find("label").html(error).css("display","inline-block");This.parent().siblings(".y_s_one").removeClass("hide");This.parent().siblings(".y_s_two,.y_s_three").addClass("hide");}else{setTimeout(function(){This.parent().siblings(".y_s_two").addClass("hide");This.parent().addClass("hide");This.parent().siblings(".y_s_three").removeClass("hide");},1000);}},error:function(){error="订阅失败，请稍后重试";input.blur();error_msg.css({left:_input_left,top:_input_top,display:"inline-block"}).fadeIn(300).find("label").html(error).css("display","inline-block");This.parent().siblings(".y_s_one").removeClass("hide");This.parent().siblings(".y_s_two,.y_s_three").addClass("hide");}});}}});}});$(".y_link_return").click(function(){$(this).parent().addClass("hide").siblings(".y_s_one").removeClass("hide");$(this).parent().siblings(".y_s_two").addClass("hide");});});