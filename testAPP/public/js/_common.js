function isstring(o) { return jQuery.type(o).indexOf('string')>=0; }
function isnumber(o) { return jQuery.type(o).indexOf('numb')>=0; }
function isobject(o) { return jQuery.type(o).indexOf('object')>=0; }
function isbool(o) { return jQuery.type(o).indexOf('bool')>=0; }
function isfunction(o) { return jQuery.type(o).indexOf('function')>=0; }
function isarray(o) { return jQuery.type(o).indexOf('array')>=0; }
function isundefine(o) { return jQuery.type(o).indexOf('undefine')>=0; }
function isstrvalid(s) { return isstring(s) && s.length>0;} 
function strlen(s) 	{	return s.replace(/[^\x00-\xff]/g, 'xx').length;}
function isIE6()	{	return ($.browser.msie) && ($.browser.version == "6.0");}
function isIE()
{
	if(!+[1,]) return true;
 　 else return false;
}
function stripslashes(s)
{
	s = replace(s,"\\\"","\"");
	s = replace(s,"\\\'","\'");
	s = replace(s,"\\\\","\\");
	return s;
}
function trim(str) { 
  whitespace = ' \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000';
  for (var i = 0,len = str.length; i < len; i++) {
    if (whitespace.indexOf(str.charAt(i)) === -1) {
      str = str.substring(i);
      break;
    }
  }
  for (i = str.length - 1; i >= 0; i--) {
    if (whitespace.indexOf(str.charAt(i)) === -1) {
      str = str.substring(0, i + 1);
      break;
    }
  }
  return whitespace.indexOf(str.charAt(0)) === -1 ? str : '';
}
function replace(str,s,d)
{
	if(!isstring(str)) return str;
	if(s == d) return str;
	var orig = 0;
	for(;;)
	{
		var inx = str.indexOf(s,orig);
		if(inx<0) break;
		str = str.substring(0,inx) + d + str.substring(inx + s.length,str.length);
		orig = inx + s.length;
	}
	return str;
}
function isNum(s)
{
	var r,re;
	re = /\d*/i; //\d表示数字,*表示匹配多个数字
	r = s.match(re);
	return (r==s)?true:false;
} 
function StrToDec(str)
{
	return parseInt(str,10);
}
function isEmail(email)
{ 
	r = (email.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1);
	return r;
}
function isIDCardValid(card)
{ 
	if(card.length<18) { alert('siuzerror'); return false; }
	var y = StrToDec(card.substr(6,4)),
		m = StrToDec(card.substr(10,2)),
		d = StrToDec(card.substr(12,2));

	if(y < 1880 || y >= 2030) {  return false;}
	if(m<1 || m > 12) {  return false; }
	if(d<1 || d > 31) {  return false; }
	return true;
}
function IDCardToDateStr(card)
{
	if(!isIDCardValid(card)) return false; 
	return card.substr(6,4)+'-'+card.substr(10,2)+'-'+card.substr(12,2);
}

function makearraymap(arr,mapkeycol)
{
	var arrret=Array();
	for(var a=0;a<arr.length;a++)
		arrret[arr[a][mapkeycol]] = arr[a];
	return arrret;
}

function findArrItem(arr,col,v)
{ 
	if(!isarray(arr))
	{
		alert("无效的数组！");
		return false;
	} 	 
	for(var a=0;a<arr.length;a++)	
	{
		if(arr[a][col]==v) 
			return arr[a]; 
	} 
	return false;
}

 function makeMask(jObj,color,bshow)
 {
	var win_h  = $(window).height();
	var win_w  = $(window).width();
	var doc_h  = $(document).height();
	var doc_w  = $(document).width();    
	var scr_t  = $(document).scrollTop();
	var scr_w  = $(document).scrollLeft(); 

	if(jQuery.type(color).indexOf('undefine')>=0) color='#ddd';
	if(jQuery.type(bshow).indexOf('undefine')>=0) bshow=true;
	 
	jObj.css('background-color',color);
	jObj.css('position','absolute');
		 
	jObj.css('left',0+'px');
	jObj.css('top',0+'px');
	 
	jObj.css('width',doc_w+'px');
	jObj.css('height',doc_h+'px');  
	
	if(bshow) jObj.css('display','block');	
 }
 function makeCenter(jObj,bshow)
 {
	var win_h  = $(window).height();
	var win_w  = $(window).width();
	var ow = jObj.width();
	var oh = jObj.height();
	var scr_t  = $(document).scrollTop();
	var scr_w  = $(document).scrollLeft(); 

	if(jQuery.type(bshow).indexOf('undefine')>=0) bshow=true;

	var le = scr_w + (win_w/2 - ow/2);
	var tp = scr_t + (win_h/2-oh/2);
	
 	jObj.css('left',le+'px');	 
	jObj.css('top',(tp-30)+'px');	 
	if(bshow) jObj.css('display','block');	
 }
function collectColsAsList(rows,colname,spchar)
{
	var str ='';
	for(var a=0;a<rows.length;a++)
	{
		if(a==0) str = rows[a][colname];
		else str = str + spchar + rows[a][colname];
	}
	return str;
}
//显示一对象的所有属性和方法,
function showProp(obj,batt,bfun) //for debug only
 { 
 	   if(!batt && !bfun)
 	   {
 	   	  alert("showPropos的后两个参数必须其中之一为TRUE才有意义!");
 	   	  return ;
 	   }
 	       
     // 用来保存所有的属性名称和值
     var props = "";
     // 开始遍历
     for(var p in obj)
     {  
         // 方法
         if(typeof(obj[p])=="function")
         {
         		if(bfun) props = props +  "function=" + obj[p] + "\n";
         }
         else
         {
         	  if(batt) props = props +  p + "=" + obj[p] + "\n"; // p 为属性名称，obj[p]为对应属性的值
         }
     } 
     // 最后显示所有的属性
     alert(props);
 }
 
function inherit(strClass,strParent)
{ 
	eval(strClass+'.prototype = new '+strParent);
	eval(strClass+'.prototype.constructor = '+strClass); 
};
 //===============字符串与数组转换操作======================
//DBSerial为   '|1|2|3|44|43|'  样式字符串
function DBSerialToArray(str)
{
	return serialToArray(str,"|");
}
//str   '1,2,3,44,43'  样式字符串
function CommaSerialToArray(str)
{
	return serialToArray(str,",");
}
function DBSerialToCommaSerial(dbstr)
{
	var arr = DBSerialToArray(dbstr);
	return ArrayToCommaSerial(arr);
} 
function CommaSerialToDBSerial(str)
{
	var arr = CommaSerialToArray(str);
	return ArrayToDBSerial(arr);
} 
function convertSerialToArray(str)
{
	if(!isstring(str)) return Array();
	if(str.indexOf(',')) return CommaSerialToArray(str);
	else return DBSerialToArray(str);
} 
function ArrayToDBSerial(arr)
{
	var  str = ArrayToSerial(arr,'|');
	if(str.length) str = '|'+str+'|';
	return str;
}
function ArrayToCommaSerial(arr)
{
	return ArrayToSerial(arr,',');
} 
function ArrayToSerial(arr,spchar)
{
	if(!isarray(arr) || !arr.length) return '';
	var s='';
	for(var a=0;a<arr.length;a++)
	{
		if(s.length) s += spchar;
		s += arr[a];
	}
	return s;
}
function serialToArray(str,spchar)
{
	if(!isstring(str) || !str.length) return Array();
	var arr = str.split(spchar);
	var ret = Array();
	for(var a=0;a<arr.length;a++)
	{
		var item = arr[a];
		if(!item.length) continue;
		ret[ret.length] = item;
	}
	return ret;	
}
 
 
function treatNullAsEmpty(arr)
{
	var ret = Array();
	for(var key in arr)
	{
		var val = arr[key];
		if(val==null) {val='';}
		ret[key]=val;		
	}
	return ret;
}
function findByTagName(o,tag,name)
{
 	return o.find(tag+"[name='"+name+"']");
}
function findByName(o,name)
{
 	return o.find("*[name='"+name+"']");
}
function removeArrDuplicateValue(arr)
{
	var ret = Array(),test=Array();
	for(var a in arr)
	{
		var v = arr[a];
		if(isstring(v) && v.length==0) continue;
		if(!isundefine(test[v])) continue;
		test[v] = 1;
		ret[a]=v;		
	}
	return ret;
}
function ageFromBirth(tmstamp)
{  
	if(tmstamp <= 0) return 0;
	tmstamp=StrToDec(tmstamp);
	var now = new Date;
	var d = now.toLocateArray();
	var ny = StrToDec(d[0]),nm=StrToDec(d[1]),nd=StrToDec(d[2]);
	var ab = timestampToDate(tmstamp).toLocateArray();
	var by = StrToDec(ab[0]),bm=StrToDec(ab[1]),bd=StrToDec(ab[2]);
	var age = ny-by-((nm<bm || nm==bm && nd<bd)?1:0);
	return age;
} 
function getmicrosecond()
{
	var dt = new Date;
	return dt.getTime(); 
}
function time()
{
	var dt = new Date;
	return StrToDec(dt.getTime()/1000); 
}
function strDateToTimestamp(str)//"xxxx/mm/dd"
{
	var dt = new Date(str);
	return StrToDec(dt.getTime()/1000); 
}
function timestampToDate(t)
{
	return new Date(StrToDec(t) * 1000);
}
function timestampToStrDate(t,sp)
{
	if(isundefine(sp)) sp = '-';
	var d = timestampToDate(t);
	var p = d.toLocateArray();	
	if(StrToDec(p[1])<10) p[1] = '0'+p[1];
	if(StrToDec(p[2])<10) p[2] = '0'+p[2];
	return p[0] + sp + p[1] + sp + p[2];
}


function parseNumberArray(s)
{
	var n='0123456789',cb=''; 
	for(var a=0;a<s.length;a++)
	{
		var c = s.charAt(a);
		if(n.indexOf(c)==-1) c = ' ';
		cb += c;
	}  
	var _t = Array(),arr = cb.split(' ');
	for(var a=0;a<arr.length;a++)
	{
		if(arr[a].length>0) _t[_t.length] = arr[a];
	} 
	return _t;
}
Date.prototype.toLocateArray=function()
{
	var _t =  parseNumberArray(this.toLocaleString());
	if(_t[2] > 100 && _t[0]<100)
	{
		var year = _t[2];
		_t[2] = _t[1]; _t[1] = _t[0];
		_t[0] = year;
	}
	return _t;
}

function isMobileValid(s)
{
	s = trim(s);
	if(s.length<11) return false;
	if(s.substr(0,1)=='+') s = s.substr(1,s.length-1);
	if(s.substr(0,2)=='86') s = s.substr(2,s.length-2);
	if(s.substr(0,1)=='0') s = s.substr(1,s.length-1);
	return s.length==11 && s.substr(0,1)=='1' && isNum(s);
}

 function fillSelect(sel,arr,id,name)
 { 
	for(var a=0;a<arr.length;a++)
		sel.append("<option value='"+arr[a][id]+"'>"+arr[a][name]);
 }
 function fillSelectTree(sel,arr,parentid,id,name,parent,level)
 {
	var _tp = Array();
	for(var a=0;a<arr.length;a++)
	{
		if(arr[a][parent]!=parentid) continue; 		
		var _id = arr[a][id];
		var n = '|--',p='';
		for(var i=0;i<level;i++)
		{
			n = n + '--';
			p = p + '&nbsp;&nbsp;&nbsp;&nbsp;';
		}
		n = p + n + arr[a][name];
		sel.append("<option value='"+_id+"'>"+n);
		
		fillSelectTree(sel,arr,_id,id,name,parent,level+1)
	}
 }
function convertResponseObj(result)
{
	var obj = null; 
	try	{	obj = eval('('+result+')');	}
	catch(e)
	{ 
		return false;
		//alert("转换回复数据出现异常，可能格式不正确：\r\n"+ result );
		if  (!isIE())
		{
	        alert(" name:  "   +  e.name  + 
             " \nmessage:  "   +  e.message  + 
             " \nlineNumber:  "   +  e.lineNumber  + 
             " \nfileName:  "   +  e.fileName  + 
             " \nstack:  "   +  e.stack +
			 " \nresult: \n"+result);        
    	} 
      	else
		{
        	alert(" name:  "   +  e.name  +     
             " \nerrorNumber:  "   +  (e.number  &   0xFFFF )  + 
             " \nmessage:  "   +  e.message +
			 " \nresult: \n"+result);
		 } 
		return false;
	}
	return obj;
}
function imgdone(img,mx,my)
{ 
	var image = $(img);
	var  imgwidth = image.width();  //宽
	var  imgheight = image.height(); //高
	var maxw=mx,maxh=my;	
	if(imgwidth <= maxw && imgheight<=maxh)
		return ;		
	var sc = maxw/maxh,sc1 = imgwidth/imgheight; 
	
	if(imgwidth > maxw)
	{
		imgwidth = maxw;
		imgheight = StrToDec(imgwidth / sc1);
	}
	if(imgheight>maxh)
	{
		imgheight = maxh;
		imgwidth = StrToDec(imgheight * sc1);
	}
	
	{
		image.css('width',imgwidth+'px');
		image.css('height',imgheight+'px');
	}
	image.css('display','block');
}


var UI = {}; //全局公共使用
UI.getViewportWidth = function()
{
	var width=0;
	if(document.documentElement && document.documentElement.clientWidth)
		width=document.documentElement.clientWidth;
	else if(document.body && document.body.clientWidth)
		width=document.body.clientWidth;
	else if(window.innerWidth)
		width=window.innerWidth;
	return width;
}
UI.getViewportHeight = function() 
{
	var height=0;
	if(window.innerHeight)
		height=window.innerHeight;
	else if(document.documentElement&&document.documentElement.clientHeight)
		height=document.documentElement.clientHeight;
	else if(document.body&&document.body.clientHeight)
		height=document.body.clientHeight;
	return height;
}
UI.getViewportScrollX = function()
{
	var scrollX=0;
	if(document.documentElement&&document.documentElement.scrollLeft)
		scrollX=document.documentElement.scrollLeft;
	else if(document.body&&document.body.scrollLeft)
		scrollX=document.body.scrollLeft;
	else if(window.pageXOffset)
		scrollX=window.pageXOffset;
	else if(window.scrollX)
		scrollX=window.scrollX;
	return scrollX;
}
UI.getViewportScrollY=function()
{
	var scrollY=0;
	if(document.documentElement&&document.documentElement.scrollTop)
		scrollY=document.documentElement.scrollTop;
	else if(document.body&&document.body.scrollTop)
		scrollY=document.body.scrollTop;
	else if(window.pageYOffset)
		scrollY=window.pageYOffset;
	else if(window.scrollY)
		scrollY=window.scrollY;
	return scrollY;
}
function show_alert(a)
{
	alert(a);
}



 
 
 
 
 
 
