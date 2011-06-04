/*
Copyright (c) 2010, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.com/yui/license.html
version: 3.3.0
build: 3167
*/
YUI.add("highlight-base",function(H){var G=H.Array,E=H.Escape,D=H.Text.WordBreak,A=H.Lang.isArray,F={},C="(&[^;\\s]*)?",B={_REGEX:C+"(%needles)",_REPLACER:function(I,K,J){return K&&!(/\s/).test(J)?I:B._TEMPLATE.replace(/\{s\}/g,J);},_START_REGEX:"^"+C+"(%needles)",_TEMPLATE:'<b class="yui3-highlight">{s}</b>',all:function(O,N,J){var L,I,M,K;if(!J){J=F;}M=J.startsWith?B._START_REGEX:B._REGEX;K=J.replacer||B._REPLACER;N=A(N)?N.concat():[N];for(L=0,I=N.length;L<I;++L){N[L]=E.regex(E.html(N[L]));}O=E.html(O);return O.replace(new RegExp(M.replace("%needles",N.join("|")),J.caseSensitive?"g":"gi"),K);},allCase:function(K,J,I){return B.all(K,J,H.merge(I||F,{caseSensitive:true}));},start:function(K,J,I){return B.all(K,J,H.merge(I||F,{startsWith:true}));},startCase:function(J,I){return B.start(J,I,{caseSensitive:true});},words:function(M,L,J){var I,O,K=B._TEMPLATE,N;if(!J){J=F;}I=!!J.caseSensitive;L=G.hash(A(L)?L:D.getUniqueWords(L,{ignoreCase:!I}));O=J.mapper||function(Q,P){if(P.hasOwnProperty(I?Q:Q.toLowerCase())){return K.replace(/\{s\}/g,E.html(Q));}return E.html(Q);};N=D.getWords(M,{includePunctuation:true,includeWhitespace:true});return G.map(N,function(P){return O(P,L);}).join("");},wordsCase:function(J,I){return B.words(J,I,{caseSensitive:true});}};H.Highlight=B;},"3.3.0",{requires:["array-extras","escape","text-wordbreak"]});YUI.add("highlight-accentfold",function(E){var D=E.Text.AccentFold,B=E.Escape,C={},A=E.mix(E.Highlight,{allFold:function(K,J,H){var I=A._TEMPLATE,F=[],G=0;H=E.merge({replacer:function(M,O,N,P){var L;if(O&&!(/\s/).test(N)){return M;}L=N.length;F.push(K.substring(G,P)+I.replace(/\{s\}/g,K.substr(P,L)));G=P+L;}},H||C);A.all(D.fold(K),D.fold(J),H);if(G<K.length-1){F.push(K.substr(G));}return F.join("");},startFold:function(G,F){return A.allFold(G,F,{startsWith:true});},wordsFold:function(H,G){var F=A._TEMPLATE;return A.words(H,D.fold(G),{mapper:function(J,I){if(I.hasOwnProperty(D.fold(J))){return F.replace(/\{s\}/g,B.html(J));}return B.html(J);}});}});},"3.3.0",{requires:["highlight-base","text-accentfold"]});YUI.add("highlight",function(A){},"3.3.0",{use:["highlight-base","highlight-accentfold"]});
