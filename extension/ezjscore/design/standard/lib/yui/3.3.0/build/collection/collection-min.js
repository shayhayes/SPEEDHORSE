/*
Copyright (c) 2010, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.com/yui/license.html
version: 3.3.0
build: 3167
*/
YUI.add("array-extras",function(d){var b=d.Lang,c=Array.prototype,a=d.Array;a.lastIndexOf=c.lastIndexOf?function(e,g,f){return f||f===0?e.lastIndexOf(g,f):e.lastIndexOf(g);}:function(f,j,h){var e=f.length,g=e-1;if(h||h===0){g=Math.min(h<0?e+h:h,e);}if(g>-1&&e>0){for(;g>-1;--g){if(f[g]===j){return g;}}}return -1;};a.unique=function(f,l){var k=0,e=f.length,h=[],m,g;for(;k<e;++k){m=f[k];for(g=h.length;g>-1;--g){if(m===h[g]){break;}}if(g===-1){h.push(m);}}if(l){if(b.isNumber(h[0])){h.sort(a.numericSort);}else{h.sort();}}return h;};a.filter=c.filter?function(e,g,h){return e.filter(g,h);}:function(g,l,m){var j=0,e=g.length,h=[],k;for(;j<e;++j){k=g[j];if(l.call(m,k,j,g)){h.push(k);}}return h;};a.reject=function(e,g,h){return a.filter(e,function(k,j,f){return !g.call(h,k,j,f);});};a.every=c.every?function(e,g,h){return e.every(g,h);}:function(g,j,k){for(var h=0,e=g.length;h<e;++h){if(!j.call(k,g[h],h,g)){return false;}}return true;};a.map=c.map?function(e,g,h){return e.map(g,h);}:function(g,k,l){var j=0,e=g.length,h=g.concat();for(;j<e;++j){h[j]=k.call(l,g[j],j,g);}return h;};a.reduce=c.reduce?function(e,i,g,h){return e.reduce(function(l,k,j,f){return g.call(h,l,k,j,f);},i);}:function(h,m,k,l){var j=0,g=h.length,e=m;for(;j<g;++j){e=k.call(l,e,h[j],j,h);}return e;};a.find=function(g,j,k){for(var h=0,e=g.length;h<e;h++){if(j.call(k,g[h],h,g)){return g[h];}}return null;};a.grep=function(e,f){return a.filter(e,function(h,g){return f.test(h);});};a.partition=function(e,h,i){var g={matches:[],rejects:[]};a.each(e,function(j,f){var k=h.call(i,j,f,e)?g.matches:g.rejects;k.push(j);});return g;};a.zip=function(f,e){var g=[];a.each(f,function(i,h){g.push([i,e[h]]);});return g;};a.forEach=a.each;},"3.3.0");YUI.add("arraylist",function(e){var d=e.Array,c=d.each,a;function b(f){if(f!==undefined){this._items=e.Lang.isArray(f)?f:d(f);}else{this._items=this._items||[];}}a={item:function(f){return this._items[f];},each:function(g,f){c(this._items,function(j,h){j=this.item(h);g.call(f||j,j,h,this);},this);return this;},some:function(g,f){return d.some(this._items,function(j,h){j=this.item(h);return g.call(f||j,j,h,this);},this);},indexOf:function(f){return d.indexOf(this._items,f);},size:function(){return this._items.length;},isEmpty:function(){return !this.size();},toJSON:function(){return this._items;}};a._item=a.item;b.prototype=a;e.mix(b,{addMethod:function(f,g){g=d(g);c(g,function(h){f[h]=function(){var j=d(arguments,0,true),i=[];c(this._items,function(m,l){m=this._item(l);var k=m[h].apply(m,j);if(k!==undefined&&k!==m){i.push(k);}},this);return i.length?i:this;};});}});e.ArrayList=b;},"3.3.0");YUI.add("arraylist-add",function(a){a.mix(a.ArrayList.prototype,{add:function(d,c){var b=this._items;if(a.Lang.isNumber(c)){b.splice(c,0,d);}else{b.push(d);}return this;},remove:function(e,d,b){b=b||this.itemsAreEqual;for(var c=this._items.length-1;c>=0;--c){if(b.call(this,e,this.item(c))){this._items.splice(c,1);if(!d){break;}}}return this;},itemsAreEqual:function(d,c){return d===c;}});},"3.3.0",{requires:["arraylist"]});YUI.add("arraylist-filter",function(a){a.mix(a.ArrayList.prototype,{filter:function(c){var b=[];a.Array.each(this._items,function(e,d){e=this.item(d);if(c(e)){b.push(e);}},this);return new this.constructor(b);}});},"3.3.0",{requires:["arraylist"]});YUI.add("array-invoke",function(a){a.Array.invoke=function(b,e){var d=a.Array(arguments,2,true),f=a.Lang.isFunction,c=[];a.Array.each(a.Array(b),function(h,g){if(f(h[e])){c[g]=h[e].apply(h,d);}});return c;};},"3.3.0");YUI.add("collection",function(a){},"3.3.0",{use:["array-extras","arraylist","arraylist-add","arraylist-filter","array-invoke"]});
