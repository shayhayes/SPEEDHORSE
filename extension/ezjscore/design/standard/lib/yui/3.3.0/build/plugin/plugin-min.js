/*
Copyright (c) 2010, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.com/yui/license.html
version: 3.3.0
build: 3167
*/
YUI.add("plugin",function(b){function a(c){if(!(this.hasImpl&&this.hasImpl(b.Plugin.Base))){a.superclass.constructor.apply(this,arguments);}else{a.prototype.initializer.apply(this,arguments);}}a.ATTRS={host:{writeOnce:true}};a.NAME="plugin";a.NS="plugin";b.extend(a,b.Base,{_handles:null,initializer:function(c){this._handles=[];},destructor:function(){if(this._handles){for(var d=0,c=this._handles.length;d<c;d++){this._handles[d].detach();}}},doBefore:function(g,d,c){var e=this.get("host"),f;if(g in e){f=this.beforeHostMethod(g,d,c);}else{if(e.on){f=this.onHostEvent(g,d,c);}}return f;},doAfter:function(g,d,c){var e=this.get("host"),f;if(g in e){f=this.afterHostMethod(g,d,c);}else{if(e.after){f=this.afterHostEvent(g,d,c);}}return f;},onHostEvent:function(e,d,c){var f=this.get("host").on(e,d,c||this);this._handles.push(f);return f;},afterHostEvent:function(e,d,c){var f=this.get("host").after(e,d,c||this);this._handles.push(f);return f;},beforeHostMethod:function(f,d,c){var e=b.Do.before(d,this.get("host"),f,c||this);this._handles.push(e);return e;},afterHostMethod:function(f,d,c){var e=b.Do.after(d,this.get("host"),f,c||this);this._handles.push(e);return e;},toString:function(){return this.constructor.NAME+"["+this.constructor.NS+"]";}});b.namespace("Plugin").Base=a;},"3.3.0",{requires:["base-base"]});
