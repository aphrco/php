!function(a,b,c,d){
function e(b,c){
b.owlCarousel={
name:"Owl Carousel",author:"Bartosz Wojciechowski",version:"2.0.0-beta.2.1"}
,this.settings=null,this.options=a.extend({
}
,e.Defaults,c),this.itemData=a.extend({
}
,l),this.dom=a.extend({
}
,m),this.width=a.extend({
}
,n),this.num=a.extend({
}
,o),this.drag=a.extend({
}
,q),this.state=a.extend({
}
,r),this.e=a.extend({
}
,s),this.plugins={
}
,this._supress={
}
,this._current=null,this._speed=null,this._coordinates=null,this.dom.el=b,this.dom.$el=a(b);
for(var d in e.Plugins)this.plugins[d[0].toLowerCase()+d.slice(1)]=new e.Plugins[d](this);
this.init()}
function f(a){
var b,d,e=c.createElement("div"),f=a;
for(b in f)if(d=f[b],"undefined"!=typeof e.style[d])return e=null,[d,b];
return[!1]}
function g(){
return f(["transition","WebkitTransition","MozTransition","OTransition"])[1]}
function h(){
return f(["transform","WebkitTransform","MozTransform","OTransform","msTransform"])[0]}
function i(){
return f(["perspective","webkitPerspective","MozPerspective","OPerspective","MsPerspective"])[0]}
function j(){
return"ontouchstart"in b||!!navigator.msMaxTouchPoints}
function k(){
return b.navigator.msPointerEnabled}
var l,m,n,o,p,q,r,s;
l={
index:!1,indexAbs:!1,posLeft:!1,clone:!1,active:!1,loaded:!1,lazyLoad:!1,current:!1,width:!1,center:!1,page:!1,hasVideo:!1,playVideo:!1}
,m={
el:null,$el:null,stage:null,$stage:null,oStage:null,$oStage:null,$items:null,$oItems:null,$cItems:null,$content:null}
,n={
el:0,stage:0,item:0,prevWindow:0,cloneLast:0}
,o={
items:0,oItems:0,cItems:0,active:0,merged:[]}
,q={
start:0,startX:0,startY:0,current:0,currentX:0,currentY:0,offsetX:0,offsetY:0,distance:null,startTime:0,endTime:0,updatedX:0,targetEl:null}
,r={
isTouch:!1,isScrolling:!1,isSwiping:!1,direction:!1,inMotion:!1}
,s={
_onDragStart:null,_onDragMove:null,_onDragEnd:null,_transitionEnd:null,_resizer:null,_responsiveCall:null,_goToLoop:null,_checkVisibile:null}
,e.Defaults={
items:3,loop:!1,center:!1,mouseDrag:!0,touchDrag:!0,pullDrag:!0,freeDrag:!1,margin:0,stagePadding:0,merge:!1,mergeFit:!0,autoWidth:!1,startPosition:0,smartSpeed:250,fluidSpeed:!1,dragEndSpeed:!1,responsive:{
}
,responsiveRefreshRate:200,responsiveBaseElement:b,responsiveClass:!1,fallbackEasing:"swing",info:!1,nestedItemSelector:!1,itemElement:"div",stageElement:"div",themeClass:"owl-theme",baseClass:"owl-carousel",itemClass:"owl-item",centerClass:"center",activeClass:"active"}
,e.Plugins={
}
,e.prototype.init=function(){
if(this.setResponsiveOptions(),this.trigger("initialize"),this.dom.$el.hasClass(this.settings.baseClass)||this.dom.$el.addClass(this.settings.baseClass),this.dom.$el.hasClass(this.settings.themeClass)||this.dom.$el.addClass(this.settings.themeClass),this.settings.rtl&&this.dom.$el.addClass("owl-rtl"),this.browserSupport(),this.settings.autoWidth&&this.state.imagesLoaded!==!0){
var a,b,c;
if(a=this.dom.$el.find("img"),b=this.settings.nestedItemSelector?"."+this.settings.nestedItemSelector:d,c=this.dom.$el.children(b).width(),a.length&&0>=c)return this.preloadAutoWidthImages(a),!1}
this.width.prevWindow=this.viewport(),this.createStage(),this.fetchContent(),this.eventsCall(),this.internalEvents(),this.dom.$el.addClass("owl-loading"),this.refresh(!0),this.dom.$el.removeClass("owl-loading").addClass("owl-loaded"),this.trigger("initialized"),this.addTriggerableEvents()}
,e.prototype.setResponsiveOptions=function(){
if(this.options.responsive){
var b=this.viewport(),c=this.options.responsive,d=-1;
a.each(c,function(a){
b>=a&&a>d&&(d=Number(a))}
),this.settings=a.extend({
}
,this.options,c[d]),delete this.settings.responsive,this.settings.responsiveClass&&this.dom.$el.attr("class",function(a,b){
return b.replace(/\b owl-responsive-\S+/g,"")}
).addClass("owl-responsive-"+d)}
else this.settings=a.extend({
}
,this.options)}
,e.prototype.optionsLogic=function(){
this.dom.$el.toggleClass("owl-center",this.settings.center),this.settings.loop&&this.num.oItems<this.settings.items&&(this.settings.loop=!1),this.settings.autoWidth&&(this.settings.stagePadding=!1,this.settings.merge=!1)}
,e.prototype.createStage=function(){
var b=c.createElement("div"),d=c.createElement(this.settings.stageElement);
b.className="owl-stage-outer",d.className="owl-stage",b.appendChild(d),this.dom.el.appendChild(b),this.dom.oStage=b,this.dom.$oStage=a(b),this.dom.stage=d,this.dom.$stage=a(d),b=null,d=null}
,e.prototype.createItemContainer=function(){
var b=c.createElement(this.settings.itemElement);
return b.className=this.settings.itemClass,a(b)}
,e.prototype.fetchContent=function(b){
this.dom.$content=b?b instanceof jQuery?b:a(b):this.settings.nestedItemSelector?this.dom.$el.find("."+this.settings.nestedItemSelector).not(".owl-stage-outer"):this.dom.$el.children().not(".owl-stage-outer"),this.num.oItems=this.dom.$content.length,0!==this.num.oItems&&this.initStructure()}
,e.prototype.initStructure=function(){
this.createNormalStructure()}
,e.prototype.createNormalStructure=function(){
var a,b;
for(a=0;
a<this.num.oItems;
a++)b=this.createItemContainer(),this.initializeItemContainer(b,this.dom.$content[a]),this.dom.$stage.append(b);
this.dom.$content=null}
,e.prototype.createCustomStructure=function(a){
var b,c;
for(b=0;
a>b;
b++)c=this.createItemContainer(),this.createItemContainerData(c),this.dom.$stage.append(c)}
,e.prototype.initializeItemContainer=function(a,b){
this.trigger("change",{
property:{
name:"item",value:a}
}
),this.createItemContainerData(a),a.append(b),this.trigger("changed",{
property:{
name:"item",value:a}
}
)}
,e.prototype.createItemContainerData=function(b,c){
var d=a.extend({
}
,this.itemData);
c&&a.extend(d,c.data("owl-item")),b.data("owl-item",d)}
,e.prototype.cloneItemContainer=function(a){
var b=a.clone(!0,!0).addClass("cloned");
return this.createItemContainerData(b,b),b.data("owl-item").clone=!0,b}
,e.prototype.updateLocalContent=function(){
var b,c;
for(this.dom.$oItems=this.dom.$stage.find("."+this.settings.itemClass).filter(function(){
return a(this).data("owl-item").clone===!1}
),this.num.oItems=this.dom.$oItems.length,b=0;
b<this.num.oItems;
b++)c=this.dom.$oItems.eq(b),c.data("owl-item").index=b}
,e.prototype.loopClone=function(){
if(!this.settings.loop||this.num.oItems<this.settings.items)return!1;
var b,c,d,e=this.settings.items,f=this.num.oItems-1;
for(this.settings.stagePadding&&1===this.settings.items&&(e+=1),this.num.cItems=2*e,d=0;
e>d;
d++)b=this.cloneItemContainer(this.dom.$oItems.eq(d)),c=this.cloneItemContainer(this.dom.$oItems.eq(f-d)),this.dom.$stage.append(b),this.dom.$stage.prepend(c);
this.dom.$cItems=this.dom.$stage.find("."+this.settings.itemClass).filter(function(){
return a(this).data("owl-item").clone===!0}
)}
,e.prototype.reClone=function(){
null!==this.dom.$cItems&&(this.dom.$cItems.remove(),this.dom.$cItems=null,this.num.cItems=0),this.settings.loop&&this.loopClone()}
,e.prototype.calculate=function(){
var a,b,c,d,e,f,g,h=0,i=0;
for(this.width.el=this.dom.$el.width()-2*this.settings.stagePadding,this.width.view=this.dom.$el.width(),c=this.width.el-this.settings.margin*(1===this.settings.items?0:this.settings.items-1),this.width.el=this.width.el+this.settings.margin,this.width.item=(c/this.settings.items+this.settings.margin).toFixed(3),this.dom.$items=this.dom.$stage.find(".owl-item"),this.num.items=this.dom.$items.length,this.settings.autoWidth&&this.dom.$items.css("width",""),this._coordinates=[],this.num.merged=[],d=this.settings.rtl?this.settings.center?-(this.width.el/2):0:this.settings.center?this.width.el/2:0,this.width.mergeStage=0,a=0;
a<this.num.items;
a++)this.settings.merge?(g=this.dom.$items.eq(a).find("[data-merge]").attr("data-merge")||1,this.settings.mergeFit&&g>this.settings.items&&(g=this.settings.items),this.num.merged.push(parseInt(g)),this.width.mergeStage+=this.width.item*this.num.merged[a]):this.num.merged.push(1),f=this.width.item*this.num.merged[a],this.settings.autoWidth&&(f=this.dom.$items.eq(a).width()+this.settings.margin,this.settings.rtl?this.dom.$items[a].style.marginLeft=this.settings.margin+"px":this.dom.$items[a].style.marginRight=this.settings.margin+"px"),this._coordinates.push(d),this.dom.$items.eq(a).data("owl-item").posLeft=h,this.dom.$items.eq(a).data("owl-item").width=f,this.settings.rtl?(d+=f,h+=f):(d-=f,h-=f),i-=Math.abs(f),this.settings.center&&(this._coordinates[a]=this.settings.rtl?this._coordinates[a]+f/2:this._coordinates[a]-f/2);
for(this.width.stage=Math.abs(this.settings.autoWidth?this.settings.center?i:d:i),e=this.num.oItems+this.num.cItems,b=0;
e>b;
b++)this.dom.$items.eq(b).data("owl-item").indexAbs=b;
this.setSizes()}
,e.prototype.setSizes=function(){
this.settings.stagePadding!==!1&&(this.dom.oStage.style.paddingLeft=this.settings.stagePadding+"px",this.dom.oStage.style.paddingRight=this.settings.stagePadding+"px"),this.settings.rtl?b.setTimeout(a.proxy(function(){
this.dom.stage.style.width=this.width.stage+"px"}
,this),0):this.dom.stage.style.width=this.width.stage+"px";
for(var c=0;
c<this.num.items;
c++)this.settings.autoWidth||(this.dom.$items[c].style.width=this.width.item-this.settings.margin+"px"),this.settings.rtl?this.dom.$items[c].style.marginLeft=this.settings.margin+"px":this.dom.$items[c].style.marginRight=this.settings.margin+"px",1===this.num.merged[c]||this.settings.autoWidth||(this.dom.$items[c].style.width=this.width.item*this.num.merged[c]-this.settings.margin+"px");
this.width.stagePrev=this.width.stage}
,e.prototype.responsive=function(){
if(!this.num.oItems)return!1;
var a=this.isElWidthChanged();
return a?this.trigger("resize").isDefaultPrevented()?!1:(this.state.responsive=!0,this.refresh(),this.state.responsive=!1,void this.trigger("resized")):!1}
,e.prototype.refresh=function(){
var a=this.dom.$oItems&&this.dom.$oItems.eq(this.normalize(this.current(),!0));
return this.trigger("refresh"),this.setResponsiveOptions(),this.updateLocalContent(),this.optionsLogic(),0===this.num.oItems?!1:(this.dom.$stage.addClass("owl-refresh"),this.reClone(),this.calculate(),this.dom.$stage.removeClass("owl-refresh"),a?this.reset(a.data("owl-item").indexAbs):(this.dom.oStage.scrollLeft=0,this.reset(this.dom.$oItems.eq(0).data("owl-item").indexAbs)),this.state.orientation=b.orientation,this.watchVisibility(),void this.trigger("refreshed"))}
,e.prototype.updateActiveItems=function(){
this.trigger("change",{
property:{
name:"items",value:this.dom.$items}
}
);
var a,b,c,d,e,f;
for(a=0;
a<this.num.items;
a++)this.dom.$items.eq(a).data("owl-item").active=!1,this.dom.$items.eq(a).data("owl-item").current=!1,this.dom.$items.eq(a).removeClass(this.settings.activeClass).removeClass(this.settings.centerClass);
for(this.num.active=0,padding=2*this.settings.stagePadding,stageX=this.coordinates(this.current())+padding,view=this.settings.rtl?this.width.view:-this.width.view,b=0;
b<this.num.items;
b++)c=this.dom.$items.eq(b),d=c.data("owl-item").posLeft,e=c.data("owl-item").width,f=this.settings.rtl?d-e-padding:d-e+padding,(this.op(d,"<=",stageX)&&this.op(d,">",stageX+view)||this.op(f,"<",stageX)&&this.op(f,">",stageX+view))&&(this.num.active++,c.data("owl-item").active=!0,c.data("owl-item").current=!0,c.addClass(this.settings.activeClass),this.settings.lazyLoad||(c.data("owl-item").loaded=!0),this.settings.loop&&this.updateClonedItemsState(c.data("owl-item").index));
this.settings.center&&(this.dom.$items.eq(this.current()).addClass(this.settings.centerClass).data("owl-item").center=!0),this.trigger("changed",{
property:{
name:"items",value:this.dom.$items}
}
)}
,e.prototype.updateClonedItemsState=function(a){
var b,c,d;
for(this.settings.center&&(b=this.dom.$items.eq(this.current()).data("owl-item").index),d=0;
d<this.num.items;
d++)c=this.dom.$items.eq(d),c.data("owl-item").index===a&&(c.data("owl-item").current=!0,c.data("owl-item").index===b&&c.addClass(this.settings.centerClass))}
,e.prototype.eventsCall=function(){
this.e._onDragStart=a.proxy(function(a){
this.onDragStart(a)}
,this),this.e._onDragMove=a.proxy(function(a){
this.onDragMove(a)}
,this),this.e._onDragEnd=a.proxy(function(a){
this.onDragEnd(a)}
,this),this.e._transitionEnd=a.proxy(function(a){
this.transitionEnd(a)}
,this),this.e._resizer=a.proxy(function(){
this.responsiveTimer()}
,this),this.e._responsiveCall=a.proxy(function(){
this.responsive()}
,this),this.e._preventClick=a.proxy(function(a){
this.preventClick(a)}
,this)}
,e.prototype.responsiveTimer=function(){
return this.viewport()===this.width.prevWindow?!1:(b.clearTimeout(this.resizeTimer),this.resizeTimer=b.setTimeout(this.e._responsiveCall,this.settings.responsiveRefreshRate),void(this.width.prevWindow=this.viewport()))}
,e.prototype.internalEvents=function(){
var a=j(),d=k();
this.dragType=a&&!d?["touchstart","touchmove","touchend","touchcancel"]:a&&d?["MSPointerDown","MSPointerMove","MSPointerUp","MSPointerCancel"]:["mousedown","mousemove","mouseup"],(a||d)&&this.settings.touchDrag?this.on(c,this.dragType[3],this.e._onDragEnd):(this.dom.$stage.on("dragstart",function(){
return!1}
),this.settings.mouseDrag?this.dom.stage.onselectstart=function(){
return!1}
:this.dom.$el.addClass("owl-text-select-on")),this.transitionEndVendor&&this.on(this.dom.stage,this.transitionEndVendor,this.e._transitionEnd,!1),this.settings.responsive!==!1&&this.on(b,"resize",this.e._resizer,!1),this.dragEvents()}
,e.prototype.dragEvents=function(){
!this.settings.touchDrag||"touchstart"!==this.dragType[0]&&"MSPointerDown"!==this.dragType[0]?this.settings.mouseDrag&&"mousedown"===this.dragType[0]?this.on(this.dom.stage,this.dragType[0],this.e._onDragStart,!1):this.off(this.dom.stage,this.dragType[0],this.e._onDragStart):this.on(this.dom.stage,this.dragType[0],this.e._onDragStart,!1)}
,e.prototype.onDragStart=function(a){
var d,e,f,g,h;
if(d=a.originalEvent||a||b.event,3===d.which)return!1;
if("mousedown"===this.dragType[0]&&this.dom.$stage.addClass("owl-grab"),this.trigger("drag"),this.drag.startTime=(new Date).getTime(),this.speed(0),this.state.isTouch=!0,this.state.isScrolling=!1,this.state.isSwiping=!1,this.drag.distance=0,e="touchstart"===d.type,f=e?a.targetTouches[0].pageX:d.pageX||d.clientX,g=e?a.targetTouches[0].pageY:d.pageY||d.clientY,this.drag.offsetX=this.dom.$stage.position().left-this.settings.stagePadding,this.drag.offsetY=this.dom.$stage.position().top,this.settings.rtl&&(this.drag.offsetX=this.dom.$stage.position().left+this.width.stage-this.width.el+this.settings.margin),this.state.inMotion&&this.support3d)h=this.getTransformProperty(),this.drag.offsetX=h,this.animate(h),this.state.inMotion=!0;
else if(this.state.inMotion&&!this.support3d)return this.state.inMotion=!1,!1;
this.drag.startX=f-this.drag.offsetX,this.drag.startY=g-this.drag.offsetY,this.drag.start=f-this.drag.startX,this.drag.targetEl=d.target||d.srcElement,this.drag.updatedX=this.drag.start,("IMG"===this.drag.targetEl.tagName||"A"===this.drag.targetEl.tagName)&&(this.drag.targetEl.draggable=!1),this.on(c,this.dragType[1],this.e._onDragMove,!1),this.on(c,this.dragType[2],this.e._onDragEnd,!1)}
,e.prototype.onDragMove=function(a){
var c,e,f,g,h,i,j;
this.state.isTouch&&(this.state.isScrolling||(c=a.originalEvent||a||b.event,e="touchmove"==c.type,f=e?c.targetTouches[0].pageX:c.pageX||c.clientX,g=e?c.targetTouches[0].pageY:c.pageY||c.clientY,this.drag.currentX=f-this.drag.startX,this.drag.currentY=g-this.drag.startY,this.drag.distance=this.drag.currentX-this.drag.offsetX,this.drag.distance<0?this.state.direction=this.settings.rtl?"right":"left":this.drag.distance>0&&(this.state.direction=this.settings.rtl?"left":"right"),this.settings.loop?this.op(this.drag.currentX,">",this.coordinates(this.minimum()))&&"right"===this.state.direction?this.drag.currentX-=(this.settings.center&&this.coordinates(0))-this.coordinates(this.num.oItems):this.op(this.drag.currentX,"<",this.coordinates(this.maximum()))&&"left"===this.state.direction&&(this.drag.currentX+=(this.settings.center&&this.coordinates(0))-this.coordinates(this.num.oItems)):(h=this.coordinates(this.settings.rtl?this.maximum():this.minimum()),i=this.coordinates(this.settings.rtl?this.minimum():this.maximum()),j=this.settings.pullDrag?this.drag.distance/5:0,this.drag.currentX=Math.max(Math.min(this.drag.currentX,h+j),i+j)),(this.drag.distance>8||this.drag.distance<-8)&&(c.preventDefault!==d?c.preventDefault():c.returnValue=!1,this.state.isSwiping=!0),this.drag.updatedX=this.drag.currentX,(this.drag.currentY>16||this.drag.currentY<-16)&&this.state.isSwiping===!1&&(this.state.isScrolling=!0,this.drag.updatedX=this.drag.start),this.animate(this.drag.updatedX)))}
,e.prototype.onDragEnd=function(){
var a,b,d;
if(this.state.isTouch){
if("mousedown"===this.dragType[0]&&this.dom.$stage.removeClass("owl-grab"),this.trigger("dragged"),this.drag.targetEl.removeAttribute("draggable"),this.state.isTouch=!1,this.state.isScrolling=!1,this.state.isSwiping=!1,0===this.drag.distance&&this.state.inMotion!==!0)return this.state.inMotion=!1,!1;
this.drag.endTime=(new Date).getTime(),a=this.drag.endTime-this.drag.startTime,b=Math.abs(this.drag.distance),(b>3||a>300)&&this.removeClick(this.drag.targetEl),d=this.closest(this.drag.updatedX),this.speed(this.settings.dragEndSpeed||this.settings.smartSpeed),this.current(d),this.settings.pullDrag||this.drag.updatedX!==this.coordinates(d)||this.transitionEnd(),this.drag.distance=0,this.off(c,this.dragType[1],this.e._onDragMove),this.off(c,this.dragType[2],this.e._onDragEnd)}
}
,e.prototype.removeClick=function(c){
this.drag.targetEl=c,a(c).on("click.preventClick",this.e._preventClick),b.setTimeout(function(){
a(c).off("click.preventClick")}
,300)}
,e.prototype.preventClick=function(b){
b.preventDefault?b.preventDefault():b.returnValue=!1,b.stopPropagation&&b.stopPropagation(),a(b.target).off("click.preventClick")}
,e.prototype.getTransformProperty=function(){
var a,c;
return a=b.getComputedStyle(this.dom.stage,null).getPropertyValue(this.vendorName+"transform"),a=a.replace(/matrix(3d)?\(|\)/g,"").split(","),c=16===a.length,c!==!0?a[4]:a[12]}
,e.prototype.closest=function(b){
var c=0,d=30;
return this.settings.freeDrag||a.each(this.coordinates(),a.proxy(function(a,e){
b>e-d&&e+d>b?c=a:this.op(b,"<",e)&&this.op(b,">",this.coordinates(a+1)||e-this.width.el)&&(c="left"===this.state.direction?a+1:a)}
,this)),this.settings.loop||(this.op(b,">",this.coordinates(this.minimum()))?c=b=this.minimum():this.op(b,"<",this.coordinates(this.maximum()))&&(c=b=this.maximum())),c}
,e.prototype.animate=function(b){
this.trigger("translate"),this.state.inMotion=this.speed()>0,this.support3d?this.dom.$stage.css({
transform:"translate3d("+b+"px,0px, 0px)",transition:this.speed()/1e3+"s"}
):this.state.isTouch?this.dom.$stage.css({
left:b+"px"}
):this.dom.$stage.animate({
left:b}
,this.speed()/1e3,this.settings.fallbackEasing,a.proxy(function(){
this.state.inMotion&&this.transitionEnd()}
,this))}
,e.prototype.current=function(a){
if(a===d)return this._current;
if(0===this.num.oItems)return d;
if(a=this.normalize(a),this._current===a)this.animate(this.coordinates(this._current));
else{
var b=this.trigger("change",{
property:{
name:"position",value:a}
}
);
b.data!==d&&(a=this.normalize(b.data)),this._current=a,this.animate(this.coordinates(this._current)),this.updateActiveItems(),this.trigger("changed",{
property:{
name:"position",value:this._current}
}
)}
return this._current}
,e.prototype.reset=function(a){
this.suppress(["change","changed"]),this.speed(0),this.current(a),this.release(["change","changed"])}
,e.prototype.normalize=function(a,b){
if(a===d||!this.dom.$items)return d;
if(this.settings.loop){
var c=this.dom.$items.length;
a=(a%c+c)%c}
else a=Math.max(this.minimum(),Math.min(this.maximum(),a));
return b?this.dom.$items.eq(a).data("owl-item").index:a}
,e.prototype.maximum=function(){
var b,c,d=this.settings;
if(!d.loop&&d.center)b=this.num.oItems-1;
else if(d.loop||d.center)if(d.loop||d.center)b=this.num.oItems+d.items;
else{
if(!d.autoWidth&&!d.merge)throw"Can not detect maximum absolute position.";
revert=d.rtl?1:-1,c=this.dom.$stage.width()-this.$el.width(),a.each(this.coordinates(),function(a,d){
return d*revert>=c?!1:void(b=a+1)}
)}
else b=this.num.oItems-d.items;
return b}
,e.prototype.minimum=function(){
return this.dom.$oItems.eq(0).data("owl-item").indexAbs}
,e.prototype.speed=function(a){
return a!==d&&(this._speed=a),this._speed}
,e.prototype.coordinates=function(a){
return a!==d?this._coordinates[a]:this._coordinates}
,e.prototype.duration=function(a,b,c){
return Math.min(Math.max(Math.abs(b-a),1),6)*Math.abs(c||this.settings.smartSpeed)}
,e.prototype.to=function(c,d){
if(this.settings.loop){
var e=c-this.normalize(this.current(),!0),f=this.current(),g=this.current(),h=this.current()+e,i=0>g-h?!0:!1;
h<this.settings.items&&i===!1?(f=this.num.items-(this.settings.items-g)-this.settings.items,this.reset(f)):h>=this.num.items-this.settings.items&&i===!0&&(f=g-this.num.oItems,this.reset(f)),b.clearTimeout(this.e._goToLoop),this.e._goToLoop=b.setTimeout(a.proxy(function(){
this.speed(this.duration(this.current(),f+e,d)),this.current(f+e)}
,this),30)}
else this.speed(this.duration(this.current(),c,d)),this.current(c)}
,e.prototype.next=function(a){
a=a||!1,this.to(this.normalize(this.current(),!0)+1,a)}
,e.prototype.prev=function(a){
a=a||!1,this.to(this.normalize(this.current(),!0)-1,a)}
,e.prototype.transitionEnd=function(a){
if(a!==d){
a.stopPropagation();
var b=a.target||a.srcElement||a.originalTarget;
if(b!==this.dom.stage)return!1}
this.state.inMotion=!1,this.trigger("translated")}
,e.prototype.isElWidthChanged=function(){
var a=this.dom.$el.width()-this.settings.stagePadding,b=this.width.el+this.settings.margin;
return a!==b}
,e.prototype.viewport=function(){
var d;
if(this.options.responsiveBaseElement!==b)d=a(this.options.responsiveBaseElement).width();
else if(b.innerWidth)d=b.innerWidth;
else{
if(!c.documentElement||!c.documentElement.clientWidth)throw"Can not detect viewport width.";
d=c.documentElement.clientWidth}
return d}
,e.prototype.insertContent=function(a){
this.dom.$stage.empty(),this.fetchContent(a),this.refresh()}
,e.prototype.addItem=function(a,b){
var c=this.createItemContainer();
b=b||0,this.initializeItemContainer(c,a),0===this.dom.$oItems.length?this.dom.$stage.append(c):-1!==p?this.dom.$oItems.eq(b).before(c):this.dom.$oItems.eq(b).after(c),this.refresh()}
,e.prototype.removeItem=function(a){
this.dom.$oItems.eq(a).remove(),this.refresh()}
,e.prototype.addTriggerableEvents=function(){
var b=a.proxy(function(b,c){
return a.proxy(function(a){
a.relatedTarget!==this&&(this.suppress([c]),b.apply(this,[].slice.call(arguments,1)),this.release([c]))}
,this)}
,this);
a.each({
next:this.next,prev:this.prev,to:this.to,destroy:this.destroy,refresh:this.refresh,replace:this.insertContent,add:this.addItem,remove:this.removeItem}
,a.proxy(function(a,c){
this.dom.$el.on(a+".owl.carousel",b(c,a+".owl.carousel"))}
,this))}
,e.prototype.watchVisibility=function(){
function c(a){
return a.offsetWidth>0&&a.offsetHeight>0}
function d(){
c(this.dom.el)&&(this.dom.$el.removeClass("owl-hidden"),this.refresh(),b.clearInterval(this.e._checkVisibile))}
c(this.dom.el)||(this.dom.$el.addClass("owl-hidden"),b.clearInterval(this.e._checkVisibile),this.e._checkVisibile=b.setInterval(a.proxy(d,this),500))}
,e.prototype.preloadAutoWidthImages=function(b){
var c,d,e,f;
c=0,d=this,b.each(function(g,h){
e=a(h),f=new Image,f.onload=function(){
c++,e.attr("src",f.src),e.css("opacity",1),c>=b.length&&(d.state.imagesLoaded=!0,d.init())}
,f.src=e.attr("src")||e.attr("data-src")||e.attr("data-src-retina")}
)}
,e.prototype.destroy=function(){
this.dom.$el.hasClass(this.settings.themeClass)&&this.dom.$el.removeClass(this.settings.themeClass),this.settings.responsive!==!1&&this.off(b,"resize",this.e._resizer),this.transitionEndVendor&&this.off(this.dom.stage,this.transitionEndVendor,this.e._transitionEnd);
for(var a in this.plugins)this.plugins[a].destroy();
(this.settings.mouseDrag||this.settings.touchDrag)&&(this.off(this.dom.stage,this.dragType[0],this.e._onDragStart),this.settings.mouseDrag&&this.off(c,this.dragType[3],this.e._onDragStart),this.settings.mouseDrag&&(this.dom.$stage.off("dragstart",function(){
return!1}
),this.dom.stage.onselectstart=function(){
}
)),this.dom.$el.off(".owl"),null!==this.dom.$cItems&&this.dom.$cItems.remove(),this.e=null,this.dom.$el.data("owlCarousel",null),delete this.dom.el.owlCarousel,this.dom.$stage.unwrap(),this.dom.$items.unwrap(),this.dom.$items.contents().unwrap(),this.dom=null}
,e.prototype.op=function(a,b,c){
var d=this.settings.rtl;
switch(b){
case"<":return d?a>c:c>a;
case">":return d?c>a:a>c;
case">=":return d?c>=a:a>=c;
case"<=":return d?a>=c:c>=a}
}
,e.prototype.on=function(a,b,c,d){
a.addEventListener?a.addEventListener(b,c,d):a.attachEvent&&a.attachEvent("on"+b,c)}
,e.prototype.off=function(a,b,c,d){
a.removeEventListener?a.removeEventListener(b,c,d):a.detachEvent&&a.detachEvent("on"+b,c)}
,e.prototype.trigger=function(b,c,d){
var e={
item:{
count:this.num.oItems,index:this.current()}
}
,f=a.camelCase(a.grep(["on",b,d],function(a){
return a}
).join("-").toLowerCase()),g=a.Event([b,"owl",d||"carousel"].join(".").toLowerCase(),a.extend({
relatedTarget:this}
,e,c));
return this._supress[g.type]||(a.each(this.plugins,function(a,b){
b.onTrigger&&b.onTrigger(g)}
),this.dom.$el.trigger(g),"function"==typeof this.settings[f]&&this.settings[f].apply(this,g)),g}
,e.prototype.suppress=function(b){
a.each(b,a.proxy(function(a,b){
this._supress[b]=!0}
,this))}
,e.prototype.release=function(b){
a.each(b,a.proxy(function(a,b){
delete this._supress[b]}
,this))}
,e.prototype.browserSupport=function(){
if(this.support3d=i(),this.support3d){
this.transformVendor=h();
var a=["transitionend","webkitTransitionEnd","transitionend","oTransitionEnd"];
this.transitionEndVendor=a[g()],this.vendorName=this.transformVendor.replace(/Transform/i,""),this.vendorName=""!==this.vendorName?"-"+this.vendorName.toLowerCase()+"-":""}
this.state.orientation=b.orientation}
,a.fn.owlCarousel=function(b){
return this.each(function(){
a(this).data("owlCarousel")||a(this).data("owlCarousel",new e(this,b))}
)}
,a.fn.owlCarousel.Constructor=e}
(window.Zepto||window.jQuery,window,document),function(a,b){
LazyLoad=function(b){
this.owl=b,this.owl.options=a.extend({
}
,LazyLoad.Defaults,this.owl.options),this.handlers={
"changed.owl.carousel":a.proxy(function(a){
"items"==a.property.name&&a.property.value&&!a.property.value.is(":empty")&&this.check()}
,this)}
,this.owl.dom.$el.on(this.handlers)}
,LazyLoad.Defaults={
lazyLoad:!1}
,LazyLoad.prototype.check=function(){
var a,c,d,e,f=b.devicePixelRatio>1?"data-src-retina":"data-src";
for(d=0;
d<this.owl.num.items;
d++)e=this.owl.dom.$items.eq(d),e.data("owl-item").current===!0&&e.data("owl-item").loaded===!1&&(c=e.find(".owl-lazy"),a=c.attr(f),a=a||c.attr("data-src"),a&&(c.css("opacity","0"),this.preload(c,e)))}
,LazyLoad.prototype.preload=function(c,d){
var e,f,g;
c.each(a.proxy(function(c,h){
this.owl.trigger("load",null,"lazy"),e=a(h),f=new Image,g=e.attr(b.devicePixelRatio>1?"data-src-retina":"data-src"),g=g||e.attr("data-src"),f.onload=a.proxy(function(){
d.data("owl-item").loaded=!0,e.is("img")?e.attr("src",f.src):e.css("background-image","url("+f.src+")"),e.css("opacity",1),this.owl.trigger("loaded",null,"lazy")}
,this),f.src=g}
,this))}
,LazyLoad.prototype.destroy=function(){
var a,b;
for(a in this.handlers)this.owl.dom.$el.off(a,this.handlers[a]);
for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)}
,a.fn.owlCarousel.Constructor.Plugins.lazyLoad=LazyLoad}
(window.Zepto||window.jQuery,window,document),function(a,b){
AutoHeight=function(b){
this.owl=b,this.owl.options=a.extend({
}
,AutoHeight.Defaults,this.owl.options),this.handlers={
"changed.owl.carousel":a.proxy(function(a){
"position"==a.property.name&&this.owl.settings.autoHeight&&this.setHeight()}
,this)}
,this.owl.dom.$el.on(this.handlers)}
,AutoHeight.Defaults={
autoHeight:!1,autoHeightClass:"owl-height"}
,AutoHeight.prototype.setHeight=function(){
var a,c=this.owl.dom.$items.eq(this.owl.current()),d=this.owl.dom.$oStage,e=0;
this.owl.dom.$oStage.hasClass(this.owl.settings.autoHeightClass)||this.owl.dom.$oStage.addClass(this.owl.settings.autoHeightClass),a=b.setInterval(function(){
e+=1,c.data("owl-item").loaded?(d.height(c.height()+"px"),clearInterval(a)):500===e&&clearInterval(a)}
,100)}
,AutoHeight.prototype.destroy=function(){
var a,b;
for(a in this.handlers)this.owl.dom.$el.off(a,this.handlers[a]);
for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)}
,a.fn.owlCarousel.Constructor.Plugins.autoHeight=AutoHeight}
(window.Zepto||window.jQuery,window,document),function(a,b,c){
Video=function(b){
this.owl=b,this.owl.options=a.extend({
}
,Video.Defaults,this.owl.options),this.handlers={
"resize.owl.carousel":a.proxy(function(a){
this.owl.settings.video&&!this.isInFullScreen()&&a.preventDefault()}
,this),"refresh.owl.carousel changed.owl.carousel":a.proxy(function(){
this.owl.state.videoPlay&&this.stopVideo()}
,this),"refresh.owl.carousel refreshed.owl.carousel":a.proxy(function(a){
return this.owl.settings.video?void(this.refreshing="refresh"==a.type):!1}
,this),"changed.owl.carousel":a.proxy(function(a){
this.refreshing&&"items"==a.property.name&&a.property.value&&!a.property.value.is(":empty")&&this.checkVideoLinks()}
,this)}
,this.owl.dom.$el.on(this.handlers),this.owl.dom.$el.on("click.owl.video",".owl-video-play-icon",a.proxy(function(a){
this.playVideo(a)}
,this))}
,Video.Defaults={
video:!1,videoHeight:!1,videoWidth:!1}
,Video.prototype.checkVideoLinks=function(){
var a,b,c;
for(c=0;
c<this.owl.num.items;
c++)b=this.owl.dom.$items.eq(c),b.data("owl-item").hasVideo||(a=b.find(".owl-video"),a.length&&(this.owl.state.hasVideos=!0,this.owl.dom.$items.eq(c).data("owl-item").hasVideo=!0,a.css("display","none"),this.getVideoInfo(a,b)))}
,Video.prototype.getVideoInfo=function(a,b){
var c,d,e,f,g=a.data("vimeo-id"),h=a.data("youtube-id"),i=a.data("width")||this.owl.settings.videoWidth,j=a.data("height")||this.owl.settings.videoHeight,k=a.attr("href");
if(g)d="vimeo",e=g;
else if(h)d="youtube",e=h;
else{
if(!k)throw new Error("Missing video link.");
e=k.match(/(http:|https:|)\/\/(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/),e[3].indexOf("youtu")>-1?d="youtube":e[3].indexOf("vimeo")>-1&&(d="vimeo"),e=e[6]}
b.data("owl-item").videoType=d,b.data("owl-item").videoId=e,b.data("owl-item").videoWidth=i,b.data("owl-item").videoHeight=j,c={
type:d,id:e}
,f=i&&j?'style="width:'+i+"px;
height:"+j+'px;
"':"",a.wrap('<div class="owl-video-wrapper"'+f+"></div>"),this.createVideoTn(a,c)}
,Video.prototype.createVideoTn=function(b,c){
function d(a){
f='<div class="owl-video-play-icon"></div>',e=k.settings.lazyLoad?'<div class="owl-video-tn '+j+'" '+i+'="'+a+'"></div>':'<div class="owl-video-tn" style="opacity:1;
	background-image:url('+a+')"></div>',b.after(e),b.after(f)}
var e,f,g,h=b.find("img"),i="src",j="",k=this.owl;
return this.owl.settings.lazyLoad&&(i="data-src",j="owl-lazy"),h.length?(d(h.attr(i)),h.remove(),!1):void("youtube"===c.type?(g="http://img.youtube.com/vi/"+c.id+"/hqdefault.jpg",d(g)):"vimeo"===c.type&&a.ajax({
type:"GET",url:"http://vimeo.com/api/v2/video/"+c.id+".json",jsonp:"callback",dataType:"jsonp",success:function(a){
g=a[0].thumbnail_large,d(g),k.settings.loop&&k.updateActiveItems()}
}
))}
,Video.prototype.stopVideo=function(){
this.owl.trigger("stop",null,"video");
var a=this.owl.dom.$items.eq(this.owl.state.videoPlayIndex);
a.find(".owl-video-frame").remove(),a.removeClass("owl-video-playing"),this.owl.state.videoPlay=!1}
,Video.prototype.playVideo=function(b){
this.owl.trigger("play",null,"video"),this.owl.state.videoPlay&&this.stopVideo();
var c,d,e,f=a(b.target||b.srcElement),g=f.closest("."+this.owl.settings.itemClass);
e=g.data("owl-item").videoType,id=g.data("owl-item").videoId,width=g.data("owl-item").videoWidth||Math.floor(g.data("owl-item").width-this.owl.settings.margin),height=g.data("owl-item").videoHeight||this.owl.dom.$stage.height(),"youtube"===e?c='<iframe width="'+width+'" height="'+height+'" src="http://www.youtube.com/embed/'+id+"?autoplay=1&v="+id+'" frameborder="0" allowfullscreen></iframe>':"vimeo"===e&&(c='<iframe src="http://player.vimeo.com/video/'+id+'?autoplay=1" width="'+width+'" height="'+height+'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'),g.addClass("owl-video-playing"),this.owl.state.videoPlay=!0,this.owl.state.videoPlayIndex=g.data("owl-item").indexAbs,d=a('<div style="height:'+height+"px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      width:"+width+'px" class="owl-video-frame">'+c+"</div>"),f.after(d)}
,Video.prototype.isInFullScreen=function(){
var d=c.fullscreenElement||c.mozFullScreenElement||c.webkitFullscreenElement;
return d&&a(d.parentNode).hasClass("owl-video-frame")&&(this.owl.speed(0),this.owl.state.isFullScreen=!0),d&&this.owl.state.isFullScreen&&this.owl.state.videoPlay?!1:this.owl.state.isFullScreen?(this.owl.state.isFullScreen=!1,!1):this.owl.state.videoPlay&&this.owl.state.orientation!==b.orientation?(this.owl.state.orientation=b.orientation,!1):!0}
,Video.prototype.destroy=function(){
var a,b;
this.owl.dom.$el.off("click.owl.video");
for(a in this.handlers)this.owl.dom.$el.off(a,this.handlers[a]);
for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)}
,a.fn.owlCarousel.Constructor.Plugins.video=Video}
(window.Zepto||window.jQuery,window,document),function(a,b,c,d){
Animate=function(b){
this.core=b,this.core.options=a.extend({
}
,Animate.Defaults,this.core.options),this.swapping=!0,this.previous=d,this.next=d,this.handlers={
"change.owl.carousel":a.proxy(function(a){
"position"==a.property.name&&(this.previous=this.core.current(),this.next=a.property.value)}
,this),"drag.owl.carousel dragged.owl.carousel translated.owl.carousel":a.proxy(function(a){
this.swapping="translated"==a.type}
,this),"translate.owl.carousel":a.proxy(function(){
this.swapping&&(this.core.options.animateOut||this.core.options.animateIn)&&this.swap()}
,this)}
,this.core.dom.$el.on(this.handlers)}
,Animate.Defaults={
animateOut:!1,animateIn:!1}
,Animate.prototype.swap=function(){
if(1===this.core.settings.items&&this.core.support3d){
this.core.speed(0);
var b,c=a.proxy(this.clear,this),d=this.core.dom.$items.eq(this.previous),e=this.core.dom.$items.eq(this.next),f=this.core.settings.animateIn,g=this.core.settings.animateOut;
this.core.current()!==this.previous&&(g&&(b=this.core.coordinates(this.previous)-this.core.coordinates(this.next),d.css({
left:b+"px"}
).addClass("animated owl-animated-out").addClass(g).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",c)),f&&e.addClass("animated owl-animated-in").addClass(f).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",c))}
}
,Animate.prototype.clear=function(b){
a(b.target).css({
left:""}
).removeClass("animated owl-animated-out owl-animated-in").removeClass(this.core.settings.animateIn).removeClass(this.core.settings.animateOut),this.core.transitionEnd()}
,Animate.prototype.destroy=function(){
var a,b;
for(a in this.handlers)this.core.dom.$el.off(a,this.handlers[a]);
for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)}
,a.fn.owlCarousel.Constructor.Plugins.Animate=Animate}
(window.Zepto||window.jQuery,window,document),function(a,b,c){
Autoplay=function(b){
this.core=b,this.core.options=a.extend({
}
,Autoplay.Defaults,this.core.options),this.handlers={
"translated.owl.carousel refreshed.owl.carousel":a.proxy(function(){
this.autoplay()}
,this),"play.owl.autoplay":a.proxy(function(a,b,c){
this.play(b,c)}
,this),"stop.owl.autoplay":a.proxy(function(){
this.stop()}
,this),"mouseover.owl.autoplay":a.proxy(function(){
this.core.settings.autoplayHoverPause&&this.pause()}
,this),"mouseleave.owl.autoplay":a.proxy(function(){
this.core.settings.autoplayHoverPause&&this.autoplay()}
,this)}
,this.core.dom.$el.on(this.handlers)}
,Autoplay.Defaults={
autoplay:!1,autoplayTimeout:5e3,autoplayHoverPause:!1,autoplaySpeed:!1}
,Autoplay.prototype.autoplay=function(){
this.core.settings.autoplay&&!this.core.state.videoPlay?(b.clearInterval(this.interval),this.interval=b.setInterval(a.proxy(function(){
this.play()}
,this),this.core.settings.autoplayTimeout)):b.clearInterval(this.interval)}
,Autoplay.prototype.play=function(){
return c.hidden===!0||this.core.state.isTouch||this.core.state.isScrolling||this.core.state.isSwiping||this.core.state.inMotion?void 0:this.core.settings.autoplay===!1?void b.clearInterval(this.interval):void this.core.next(this.core.settings.autoplaySpeed)}
,Autoplay.prototype.stop=function(){
b.clearInterval(this.interval)}
,Autoplay.prototype.pause=function(){
b.clearInterval(this.interval)}
,Autoplay.prototype.destroy=function(){
var a,c;
b.clearInterval(this.interval);
for(a in this.handlers)this.core.dom.$el.off(a,this.handlers[a]);
for(c in Object.getOwnPropertyNames(this))"function"!=typeof this[c]&&(this[c]=null)}
,a.fn.owlCarousel.Constructor.Plugins.autoplay=Autoplay}
(window.Zepto||window.jQuery,window,document),function(a){
"use strict";
var b=function(c){
this.core=c,this.initialized=!1,this.pages=[],this.controls={
}
,this.template=null,this.$element=this.core.dom.$el,this.overrides={
next:this.core.next,prev:this.core.prev,to:this.core.to}
,this.handlers={
"changed.owl.carousel":a.proxy(function(b){
"items"==b.property.name&&(this.initialized||(this.initialize(),this.initialized=!0),this.update(),this.draw()),this.filling&&(b.property.value.data("owl-item").dot=a(":first-child",b.property.value).find("[data-dot]").andSelf().data("dot"))}
,this),"change.owl.carousel":a.proxy(function(a){
if("position"==a.property.name&&!this.core.state.revert&&!this.core.settings.loop&&this.core.settings.navRewind){
var b=this.core.current(),c=this.core.maximum(),d=this.core.minimum();
a.data=a.property.value>c?b>=c?d:c:a.property.value<d?c:a.property.value}
this.filling=this.core.settings.dotsData&&"item"==a.property.name&&a.property.value&&a.property.value.is(":empty")}
,this),"refreshed.owl.carousel":a.proxy(function(){
this.initialized&&(this.update(),this.draw())}
,this)}
,this.core.options=a.extend({
}
,b.Defaults,this.core.options),this.$element.on(this.handlers)}
;
b.Defaults={
nav:!1,navRewind:!0,navText:["prev","next"],navSpeed:!1,navElement:"div",navContainer:!1,navContainerClass:"owl-nav",navClass:["owl-prev","owl-next"],slideBy:1,dotClass:"owl-dot",dotsClass:"owl-dots",dots:!0,dotsEach:!1,dotData:!1,dotsSpeed:!1,dotsContainer:!1,controlsClass:"owl-controls"}
,b.prototype.initialize=function(){
var b,c,d=this.core.settings;
d.dotsData||(this.template=a("<div>").addClass(d.dotClass).append(a("<span>")).prop("outerHTML")),d.navContainer&&d.dotsContainer||(this.controls.$container=a("<div>").addClass(d.controlsClass).appendTo(this.$element)),this.controls.$indicators=d.dotsContainer?a(d.dotsContainer):a("<div>").hide().addClass(d.dotsClass).appendTo(this.controls.$container),this.controls.$indicators.on(this.core.dragType[2],"div",a.proxy(function(b){
	var c=a(b.target).parent().is(this.controls.$indicators)?a(b.target).index():a(b.target).parent().index();
	b.preventDefault(),this.to(c,d.dotsSpeed)}
,this)),b=d.navContainer?a(d.navContainer):a("<div>").addClass(d.navContainerClass).prependTo(this.controls.$container),this.controls.$next=a("<"+d.navElement+">"),this.controls.$previous=this.controls.$next.clone(),this.controls.$previous.addClass(d.navClass[0]).html(d.navText[0]).hide().prependTo(b).on(this.core.dragType[2],a.proxy(function(){
	this.prev()}
,this)),this.controls.$next.addClass(d.navClass[1]).html(d.navText[1]).hide().appendTo(b).on(this.core.dragType[2],a.proxy(function(){
	this.next()}
,this));
	for(c in this.overrides)this.core[c]=a.proxy(this[c],this)}
,b.prototype.destroy=function(){
	var a,b,c,d;
	for(a in this.handlers)this.$element.off(a,this.handlers[a]);
	for(b in this.controls)this.controls[b].remove();
	for(d in this.overides)this.core[d]=this.overrides[d];
	for(c in Object.getOwnPropertyNames(this))"function"!=typeof this[c]&&(this[c]=null)}
,b.prototype.update=function(){
	var a,b,c,d=this.core.settings,e=this.core.num.cItems/2,f=this.core.num.items-e,g=d.center||d.autoWidth||d.dotData?1:d.dotsEach||d.items;
	if("page"!==d.slideBy&&(d.slideBy=Math.min(d.slideBy,d.items)),d.dots)for(this.pages=[],a=e,b=0,c=0;
	f>a;
	a++)(b>=g||0===b)&&(this.pages.push({
	start:a-e,end:a-e+g-1}
),b=0,++c),b+=this.core.num.merged[a]}
,b.prototype.draw=function(){
	var b,c,d="",e=this.core.settings,f=this.core.dom.$oItems,g=this.core.normalize(this.core.current(),!0);
	if(!e.nav||e.loop||e.navRewind||(this.controls.$previous.toggleClass("disabled",0>=g),this.controls.$next.toggleClass("disabled",g>=this.core.maximum())),this.controls.$previous.toggle(e.nav),this.controls.$next.toggle(e.nav),e.dots){
	if(b=this.pages.length-this.controls.$indicators.children().length,b>0){
	for(c=0;
	c<Math.abs(b);
	c++)d+=e.dotData?f.eq(c).data("owl-item").dot:this.template;
	this.controls.$indicators.append(d)}
else 0>b&&this.controls.$indicators.children().slice(b).remove();
	this.controls.$indicators.find(".active").removeClass("active"),this.controls.$indicators.children().eq(a.inArray(this.current(),this.pages)).addClass("active")}
this.controls.$indicators.toggle(e.dots)}
,b.prototype.onTrigger=function(b){
	var c=this.core.settings;
	b.page={
	index:a.inArray(this.current(),this.pages),count:this.pages.length,size:c.center||c.autoWidth||c.dotData?1:c.dotsEach||c.items}
}
,b.prototype.current=function(){
	var b=this.core.normalize(this.core.current(),!0);
	return a.grep(this.pages,function(a){
	return a.start<=b&&a.end>=b}
).pop()}
,b.prototype.getPosition=function(b){
	var c,d,e=this.core.settings;
	return"page"==e.slideBy?(c=a.inArray(this.current(),this.pages),d=this.pages.length,b?++c:--c,c=this.pages[(c%d+d)%d].start):(c=this.core.normalize(this.core.current(),!0),d=this.core.num.oItems,b?c+=e.slideBy:c-=e.slideBy),c}
,b.prototype.next=function(b){
	a.proxy(this.overrides.to,this.core)(this.getPosition(!0),b)}
,b.prototype.prev=function(b){
	a.proxy(this.overrides.to,this.core)(this.getPosition(!1),b)}
,b.prototype.to=function(b,c,d){
	var e;
	d?a.proxy(this.overrides.to,this.core)(b,c):(e=this.pages.length,a.proxy(this.overrides.to,this.core)(this.pages[(b%e+e)%e].start,c))}
,a.fn.owlCarousel.Constructor.Plugins.Navigation=b}
(window.Zepto||window.jQuery,window,document),function(a,b,c,d){
	"use strict";
	var e=function(c){
	this.core=c,this.hashes={
}
,this.$element=this.core.dom.$el,this.handlers={
	"initialized.owl.carousel":a.proxy(function(){
	b.location.hash.substring(1)&&a(b).trigger("hashchange.owl.navigation")}
,this),"changed.owl.carousel":a.proxy(function(b){
	this.filling&&(b.property.value.data("owl-item").hash=a(":first-child",b.property.value).find("[data-hash]").andSelf().data("hash"),this.hashes[b.property.value.data("owl-item").hash]=b.property.value)}
,this),"change.owl.carousel":a.proxy(function(a){
	"position"==a.property.name&&this.core.current()===d&&"URLHash"==this.core.settings.startPosition&&(a.data=this.hashes[b.location.hash.substring(1)]),this.filling="item"==a.property.name&&a.property.value&&a.property.value.is(":empty")}
,this)}
,this.core.options=a.extend({
}
,e.Defaults,this.core.options),this.$element.on(this.handlers),a(b).on("hashchange.owl.navigation",a.proxy(function(){
	var a=b.location.hash.substring(1),c=this.core.dom.$oItems,d=this.hashes[a]&&c.index(this.hashes[a])||0;
	return a?(this.core.dom.oStage.scrollLeft=0,void this.core.to(d,!1,!0)):!1}
,this))}
;
	e.Defaults={
	URLhashListener:!1}
,e.prototype.destroy=function(){
	var c,d;
	a(b).off("hashchange.owl.navigation");
	for(c in this.handlers)this.owl.dom.$el.off(c,this.handlers[c]);
	for(d in Object.getOwnPropertyNames(this))"function"!=typeof this[d]&&(this[d]=null)}
,a.fn.owlCarousel.Constructor.Plugins.Hash=e}
(window.Zepto||window.jQuery,window,document);
	