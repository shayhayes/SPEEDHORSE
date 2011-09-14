/*
Copyright (c) 2010, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.com/yui/license.html
version: 3.3.0
build: 3167
*/
YUI.add("history-html5",function(A){var C=A.HistoryBase,J=A.config.doc,G=A.config.win,I,L=A.config.useHistoryHTML5,K=A.JSON||G.JSON,E="enableSessionFallback",B="YUI_HistoryHTML5_state",D="popstate",F=C.SRC_REPLACE;function H(){H.superclass.constructor.apply(this,arguments);}A.extend(H,C,{_init:function(M){A.on("popstate",this._onPopState,G,this);H.superclass._init.apply(this,arguments);if(M&&M[E]&&YUI.Env.windowLoaded){try{I=G.sessionStorage;}catch(N){}this._loadSessionState();}},_getSessionKey:function(){return B+"_"+G.location.pathname;},_loadSessionState:function(){var M=K&&I&&I[this._getSessionKey()];if(M){try{this._resolveChanges(D,K.parse(M)||null);}catch(N){}}},_storeSessionState:function(M){if(this._config[E]&&K&&I){I[this._getSessionKey()]=K.stringify(M||null);}},_storeState:function(O,N,M){if(O!==D){G.history[O===F?"replaceState":"pushState"](N,M.title||J.title||"",M.url||null);}this._storeSessionState(N);H.superclass._storeState.apply(this,arguments);},_onPopState:function(N){var M=N._event.state;this._storeSessionState(M);this._resolveChanges(D,M||null);}},{NAME:"historyhtml5",SRC_POPSTATE:D});if(!A.Node.DOM_EVENTS.popstate){A.Node.DOM_EVENTS.popstate=1;}A.HistoryHTML5=H;if(L===true||(L!==false&&C.html5)){A.History=H;}},"3.3.0",{optional:["json"],requires:["event-base","history-base","node-base"]});
