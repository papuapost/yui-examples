(function(){YAHOO.widget.LayoutUnit.prototype._collapse=YAHOO.widget.LayoutUnit.prototype.collapse;YAHOO.widget.LayoutUnit.prototype.collapse=function(){this._lastScrollTop=this.body.scrollTop;this._collapse.apply(this,arguments)};YAHOO.widget.LayoutUnit.prototype._init=YAHOO.widget.LayoutUnit.prototype.init;YAHOO.widget.LayoutUnit.prototype.init=function(){this._init.apply(this,arguments);this._lastScrollTop=0;this.on("expand",function(A){if(this._lastScrollTop>0){this.body.scrollTop=this._lastScrollTop}});this.on("beforeScrollChange",function(A){if((A.newValue===false)&&!this._collapsed){if(this.body.scrollTop>0){this._lastScrollTop=this.body.scrollTop}}});this.on("scrollChange",function(A){if(A.newValue===true){if(this._lastScrollTop>0){this.body.scrollTop=this._lastScrollTop}}})}})()