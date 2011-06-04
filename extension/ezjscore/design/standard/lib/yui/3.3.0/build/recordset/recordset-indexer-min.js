/*
Copyright (c) 2010, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.com/yui/license.html
version: 3.3.0
build: 3167
*/
YUI.add("recordset-indexer",function(B){function A(C){A.superclass.constructor.apply(this,arguments);}B.mix(A,{NS:"indexer",NAME:"recordsetIndexer",ATTRS:{hashTables:{value:{}},keys:{value:{}}}});B.extend(A,B.Plugin.Base,{initializer:function(C){var D=this.get("host");this.onHostEvent("add",B.bind("_defAddHash",this),D);this.onHostEvent("remove",B.bind("_defRemoveHash",this),D);this.onHostEvent("update",B.bind("_defUpdateHash",this),D);},destructor:function(C){},_setHashTable:function(E){var F=this.get("host"),G={},D=0,C=F.getLength();for(;D<C;D++){G[F._items[D].getValue(E)]=F._items[D];}return G;},_defAddHash:function(D){var C=this.get("hashTables");B.each(C,function(E,F){B.each(D.added||D.updated,function(G){if(G.getValue(F)){E[G.getValue(F)]=G;}});});},_defRemoveHash:function(E){var D=this.get("hashTables"),C;B.each(D,function(F,G){B.each(E.removed||E.overwritten,function(H){C=H.getValue(G);if(C&&F[C]===H){delete F[C];}});});},_defUpdateHash:function(C){C.added=C.updated;C.removed=C.overwritten;this._defAddHash(C);this._defRemoveHash(C);},createTable:function(C){var D=this.get("hashTables");D[C]=this._setHashTable(C);this.set("hashTables",D);return D[C];},getTable:function(C){return this.get("hashTables")[C];}});B.namespace("Plugin").RecordsetIndexer=A;},"3.3.0",{requires:["recordset-base","plugin"]});
