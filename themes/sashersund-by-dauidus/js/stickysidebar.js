(function($){var w=window,doc=$(document),maxTopPos,minTopPos,pastStartOffset,objFartherThanTopPos,objBiggerThanWindow,newpos,checkTimer
defaults={duration:200,lockBottom:true,delay:0,easing:'linear',stickToBottom:false,cssTransition:false},supportsTransitions=(function(){var s=document.body.style,v=['ms','Khtml','O','Moz','Webkit',''];while(v.length)
if(s[v.pop()+'Transition']=='')return true;return false;})(),Sticky=function(settings,obj){this.settings=settings;this.obj=$(obj);};Sticky.prototype={init:function(){var that=this;this.onScroll=function(){that.rePosition()};$(w).ready(function(){that.rePosition(true);$(w).on('scroll.sticky',that.onScroll);});this.obj.data('_stickyfloat',that);},rePosition:function(quick,force){var $obj=this.obj,settings=this.settings,duration=quick?0:settings.duration,wScroll=window.pageYOffset||document.documentElement.scrollTop,wHeight=window.innerHeight||document.documentElement.offsetHeight,objHeight=$obj[0].clientHeight;$obj.stop();if(settings.lockBottom)
maxTopPos=$obj[0].parentNode.clientHeight- objHeight- settings.offsetBottom;if(maxTopPos<0)
maxTopPos=0;pastStartOffset=wScroll>settings.startOffset;objFartherThanTopPos=$obj.offset().top>settings.startOffset;objBiggerThanWindow=objHeight<wHeight;if((pastStartOffset||objFartherThanTopPos&&objBiggerThanWindow)||force){newpos=settings.stickToBottom?wScroll+ wHeight- objHeight- settings.startOffset- settings.offsetY:wScroll- settings.startOffset+ settings.offsetY;if(newpos>maxTopPos&&settings.lockBottom)
newpos=maxTopPos;if(newpos<settings.offsetY)
newpos=settings.offsetY;else if(wScroll<settings.startOffset&&!settings.stickToBottom)
newpos=settings.offsetY;if(duration<5||(settings.cssTransition&&supportsTransitions))
$obj[0].style.top=newpos+'px';else
$obj.stop().delay(settings.delay).animate({top:newpos},duration,settings.easing);}},update:function(opts){if(typeof opts==='object'){if(!opts.offsetY||opts.offsetY=='auto')
opts.offsetY=getComputed(this.obj).offsetY;if(!opts.startOffset||opts.startOffset=='auto')
opts.startOffset=getComputed(this.obj).startOffset;this.settings=$.extend({},this.settings,opts);this.rePosition(false,true);}
return this.obj;},destroy:function(){$(window).off('scroll.sticky',this.onScroll);this.obj.removeData();return this.obj;}};function getComputed($obj){return{startOffset:$obj.parent().offset().top,offsetY:parseInt($obj.parent().css('padding-top')),offsetBottom:parseInt($obj.parent().css('padding-bottom'))};}
$.fn.stickyfloat=function(option,settings){if(typeof option==='object')
settings=option;else if(typeof option==='string'){if(this.data('_stickyfloat')&&typeof this.data('_stickyfloat')[option]=='function'){var sticky=this.data('_stickyfloat');return sticky[option](settings);}
else
return this;}
return this.each(function(){var $obj=$(this),$settings=$.extend({},defaults,getComputed($obj),settings||{});var sticky=new Sticky($settings,$obj);sticky.init();});};})(jQuery);