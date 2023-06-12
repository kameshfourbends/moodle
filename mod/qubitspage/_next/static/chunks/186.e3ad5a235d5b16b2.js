"use strict";(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[186],{7186:function(e,t,n){n.r(t),n.d(t,{default:function(){return Q}});var r,o,s,i,a,c,u,l=n(7568),d=n(603),h=n(7582),f=n(5893),p=n(7294),g=n(7357),m=n(3321),x=n(1536),v=n(8135),j=n(5861),y=n(8456),Z=n(655),b=n(4282),w=n(4613),_=n(4981);n(4007),n(9899);var S=n(2222),k=void 0;sqlite3InitModule({print:console.log,printErr:console.error}).then(function(e){k=e});var C=(r=(0,l.Z)(function(e,t){var n,r,o,s;return(0,h.__generator)(this,function(i){switch(i.label){case 0:return console.log(e),[4,I()];case 1:return n=new(i.sent()).oo1.DB("/data.db","cw"),r=function(){try{e.split("\n").forEach(function(e){if(!e.startsWith("--")){var r=e.split(/\s/).slice(0,1)[0].toLowerCase();if("create"==r){n.exec(e);var o="created Table successfully";console.log(void 0===o?"undefined":(0,S.Z)(o)),t(o)}else if("insert"==r)n.exec(e),t("Inserted Data Successfully");else if("select"==r){var s=[],i=[];n.exec({sql:e,rowMode:"object",resultRows:s,columnNames:i}),i.join("");var a="";s.forEach(function(e){void 0===e.id&&(e.id=""),a+="<span>".concat(e.id," ").concat(e.name," ").concat(e.age,"</span> <br>")}),t(a)}else"delete"==r&&n.exec(e)}})}catch(e){alert(e.message.split(":"))}},-1!=(o=e.split("\n")[0]).search("DATA")&&o.startsWith("--")?(s=o.split(":")[1].trim(),N("./".concat(s),{headers:{"Content-Type":"text/plain"},method:"GET"}).then(function(e){return e.text()}).then(function(e){e.split("\n").forEach(function(e){if(""!==(e=e.trim()))try{n.exec(e)}catch(e){console.log(e.message)}})}).then(function(){r()}).catch(function(e){return alert("Unable to load data file: "+e.message)})):r(),[2]}})}),function(e,t){return r.apply(this,arguments)}),N=function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:6e3;return Promise.race([fetch(e,t),new Promise(function(e,t){return setTimeout(function(){return t(Error("timeout"))},n)})])},I=(o=(0,l.Z)(function(){return(0,h.__generator)(this,function(e){switch(e.label){case 0:if(k)return[2,k];return[4,new Promise(function(e){return setTimeout(e,5e3)}).then(function(){if(!k)throw Error("Sqlite didnt initialize.. reload your browser and try");return k})];case 1:return e.sent(),[2]}})}),function(){return o.apply(this,arguments)}),E="",P=["Python initialization complete",'File "/',"CodeRunner","mod = compile","self.ast"],T=(s=(0,l.Z)(function(e){var t;return(0,h.__generator)(this,function(n){switch(n.label){case 0:return""!=E&&(E=""),t=function(t){return z(t,e)},[4,loadPyodide({stdout:t})];case 1:return[2,n.sent()]}})}),function(e){return s.apply(this,arguments)}),B=(i=(0,l.Z)(function(e,t,n){var r,o,s;return(0,h.__generator)(this,function(i){switch(i.label){case 0:return[4,T(t)];case 1:r=i.sent(),i.label=2;case 2:return i.trys.push([2,5,,6]),[4,r.loadPackagesFromImports(e)];case 3:return o=i.sent(),[4,r.runPythonAsync(e)];case 4:return(o=i.sent())?D(o,t):""!==E?D(o,t):t(""),n(!1),[3,6];case 5:return s=i.sent(),n(!0),z(s.message,t),[3,6];case 6:return[2]}})}),function(e,t,n){return i.apply(this,arguments)});function z(e,t){e.split("\n").forEach(function(e){P.some(function(t){return e.includes(t)})||D(e,t)})}function D(e,t){e&&t(E+=e+"\n")}var L=(a=(0,l.Z)(function(e,t,n){return(0,h.__generator)(this,function(r){return B(e,t,n),[2]})}),function(e,t,n){return a.apply(this,arguments)}),A=(c=(0,l.Z)(function(e,t,n){var r,o;return(0,h.__generator)(this,function(s){switch(s.label){case 0:return s.trys.push([0,5,,6]),[4,loadPyodide({indexURL:"https://cdn.jsdelivr.net/pyodide/v0.21.3/full/"})];case 1:return[4,(r=s.sent()).loadPackage("micropip")];case 2:return s.sent(),[4,r.pyimport("micropip").install("https://cdn.jsdelivr.net/gh/qubits-platform/pytutor@master/dist/pytutor-1.0.0-py3-none-any.whl")];case 3:return s.sent(),[4,r.runPythonAsync('import json\nfrom pytutor import generate_trace\ncode = """\n'.concat(e,'\n"""\ntrace = generate_trace.run_logger(code, "")\ntrace_dict = json.loads(trace)\njson.dumps(trace_dict, indent=2)\n'))];case 4:return(o=s.sent())&&(n(""),t(JSON.parse(o))),[3,6];case 5:return console.log(s.sent()),[3,6];case 6:return[2]}})}),function(e,t,n){return c.apply(this,arguments)}),F=(u=(0,l.Z)(function(e,t,n){return(0,h.__generator)(this,function(r){return A(e,t,n),[2]})}),function(e,t,n){return u.apply(this,arguments)}),O=n(637);function R(e){var t=e.content,n=e.language,r=n?O.Z.highlight(n,t):O.Z.highlightAuto(t);return(0,f.jsx)("pre",{className:"hljs",children:(0,f.jsx)("code",{className:"language-".concat(n," hljs"),dangerouslySetInnerHTML:{__html:r.value}})})}var J=n(3894),q=n(7922),H=n(4674),M=n(1799),Y=n(7085),G=p.forwardRef(function(e,t){return(0,f.jsx)(Y.Z,(0,M.Z)({elevation:6,ref:t,variant:"filled"},e))}),K=n(6422),U=n(6485),V=U.Configuration,W=U.OpenAIApi,$=function(e){var t,n=e.output,r=e.code,o=e.getHints,s=e.getDebuggerStatus,i=e.getLog,a=e.IsErrorCatch,c=new V({apiKey:"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"}),u=new W(c),d=(t=(0,l.Z)(function(e,t){var n,r,c,l;return(0,h.__generator)(this,function(d){switch(d.label){case 0:a(!0),s("loading"),n="".concat(t),r="".concat(e),c=[{role:"system",content:"You are helping a student who is in 8th grade who is trying to learn programming"},{role:"user",content:'\n        "The below given python program was executed and the output was observed. \n        First, workout your own solution to the problem based on the comments.\n        Then, analyze the output of the program and try to understand the error.\n        Your task is to:\n        * Provide hints on how to fix the error observed in the output and the fixed python code\n        * IF the program has logical errors, provide hints on how to fix the logical errors and the fixed python code\n        \n        Your response should be in JSON.\n        Provide the output as JSON format with the following keys: "hints", "fixedCode".\n    \n        Program:\n        <start>\n        '.concat(n,"\n        <end>\n\n        Output:\n        <start>\n        ").concat(r,'\n        <end>\n        "')}],d.label=1;case 1:return d.trys.push([1,3,,4]),[4,u.createChatCompletion({model:"gpt-3.5-turbo",messages:c,temperature:0})];case 2:return o(JSON.parse(d.sent().data.choices[0].message.content)),s("done"),[3,4];case 3:return l=d.sent(),a(!1),i(l.response.data.error.message),[3,4];case 4:return[2]}})}),function(e,n){return t.apply(this,arguments)});return(0,f.jsx)(f.Fragment,{children:(0,f.jsx)(v.Z,{title:(0,f.jsx)(j.Z,{fontSize:12,children:"Help to Debug"}),placement:"top",children:(0,f.jsx)(m.Z,{variant:"outlined",endIcon:(0,f.jsx)(K.Z,{}),className:"ai-help-button",onClick:function(){return d(n,r)}})})})};function Q(e){var t,n=e.dataChage,r=e.value,o=e.language,s=e.editable,i=e.uniqID,a=e.input,c=e.handleReset,u=e.visualization,S=e.reset,k=(0,d.Z)((0,p.useState)(""),2),N=k[0],I=k[1],E=(0,d.Z)((0,p.useState)(""),2),P=E[0],T=E[1],B=(0,d.Z)((0,p.useState)(!1),2),z=B[0],D=B[1],A=(0,d.Z)((0,p.useState)(!1),2),O=A[0],M=A[1],Y=(0,d.Z)((0,p.useState)(!1),2),K=Y[0],U=Y[1],V=(0,d.Z)((0,p.useState)(""),2),W=V[0],Q=V[1],X=(0,d.Z)((0,p.useState)(!1),2),ee=X[0],et=X[1],en=(0,d.Z)((0,p.useState)(!1),2),er=en[0],eo=en[1],es=(0,d.Z)((0,p.useState)(""),2),ei=es[0],ea=es[1],ec=(0,d.Z)((0,p.useState)(),2),eu=ec[0],el=ec[1],ed=(0,d.Z)((0,p.useState)(!1),2),eh=ed[0],ef=ed[1],ep=(0,d.Z)((0,p.useState)(!0),2),eg=ep[0],em=ep[1],ex=(t=(0,l.Z)(function(e,t){return(0,h.__generator)(this,function(n){return D(!0),U(!1),Q(""),I("Running..."),ea(""),eo(!1),"python"===t&&(a&&""==document.getElementById("txt_ID").value?(document.getElementById("txt_ID").focus(),I("")):L(e,I,ef)),"sql"===t&&C(e,I),D(!1),[2]})}),function(e,n){return t.apply(this,arguments)}),ev=function(e){D(!0),ea(""),U(!1),F(e,T,I)};(0,p.useEffect)(function(){var e,t,n,r;!P||(null===(e=P.trace)||void 0===e?void 0:e[0].exception_msg)?P&&(null===(t=P.trace)||void 0===t?void 0:t[0].exception_msg)&&(D(!1),ea(null===(r=P.trace)||void 0===r?void 0:r[0].exception_msg),eo(!0)):(n=new ExecutionVisualizer("TraceBlock"+i,P,{debugMode:!1,showAllFrameLabels:!0,lang:"py3",highlightLines:!0,arrowLines:!1}),D(!1),n.redrawConnectors())},[P]),(0,p.useEffect)(function(){N&&N.search("Traceback")&&M(!0)},[N]),(0,p.useEffect)(function(){},[W]);var ej=function(){return(0,f.jsx)(g.Z,{sx:{display:"flex",flexDirection:"column",alignItems:"center",mt:2},children:(0,f.jsx)(y.Z,{})})},ey=function(){eo(!1)},eZ=function(){et(!0)};return(0,f.jsxs)("div",{className:"editor-container",children:[!s&&(0,f.jsx)(f.Fragment,{children:(0,f.jsx)(_.ZP,{mode:o,highlightActiveLine:!1,id:1,value:r,maxLines:50,showGutter:!1,fontSize:14,editorProps:{$blockScrolling:!1},onChange:n,width:"100%",readOnly:s,height:"100%"})}),s&&(0,f.jsx)(R,{language:o,content:r}),N&&(0,f.jsxs)("div",{className:"console-wrapper",children:[O&&eh&&(0,f.jsx)($,{output:N,code:r,getHints:function(e){e&&(U(!0),eo(!1),ea(""),el(e.hints.slice(0,e.hints.lastIndexOf(".")).split(".")),Q(e))},getDebuggerStatus:function(e){"loading"===e?(Q(""),U(!0)):"done"===e&&D(!1)},getLog:function(e){ea(e),eo(!0)},setShowAIDebugBtn:ef,IsErrorCatch:em}),(0,f.jsx)("code",{className:"resultTextareaStyle w-100",readOnly:!0,children:"python"===o?(0,f.jsx)("pre",{children:N}):(0,J.ZP)(N)})]}),K&&(0,f.jsx)(f.Fragment,{children:W.hints?(0,f.jsx)("div",{className:"console-wrapper",children:(0,f.jsxs)("div",{className:"resultTextareaStyleerror",children:[" ",(0,f.jsx)(m.Z,{variant:"outlined",className:"chatgptbtn",onClick:function(){return eZ()},children:"Fix Code"})," ",(0,f.jsx)("div",{className:"hintstyle",children:(0,f.jsx)("ul",{children:null==eu?void 0:eu.map(function(e,t){return(0,f.jsx)("li",{children:e},t)})})}),(0,f.jsx)("br",{}),ee&&(0,f.jsx)("div",{children:(0,f.jsx)(_.ZP,{mode:o,highlightActiveLine:!1,value:W.fixedCode,maxLines:50,showGutter:!1,fontSize:14,editorProps:{$blockScrolling:!1},width:"100%",readOnly:!0,height:"100%"})})," "]})}):eg&&(0,f.jsx)(ej,{})}),P&&!K&&!ei&&(0,f.jsx)("div",{id:"TraceBlock"+i,className:"traceBlockStyle w-100"}),(0,f.jsx)(g.Z,{spacing:3,className:"button-toolbar",children:(0,f.jsxs)(x.Z,{direction:"row",gap:2,sx:{justifyContent:"flex-end"},children:[(0,f.jsx)(v.Z,{title:(0,f.jsx)(j.Z,{fontSize:12,children:"Run"}),placement:"top",children:(0,f.jsx)(m.Z,{variant:"outlined",endIcon:(0,f.jsx)(Z.Z,{}),onClick:function(){return ex(r,o)},className:"tool-button"})}),S&&(0,f.jsx)(v.Z,{title:(0,f.jsx)(j.Z,{fontSize:12,children:"Reset"}),placement:"top",children:(0,f.jsx)(m.Z,{variant:"outlined",endIcon:(0,f.jsx)(b.Z,{}),onClick:function(){return c(i)},className:"tool-button"})}),u&&(0,f.jsx)(v.Z,{title:(0,f.jsx)(j.Z,{fontSize:12,children:"Debug"}),placement:"top",children:(0,f.jsx)(m.Z,{variant:"outlined",endIcon:(0,f.jsx)(w.Z,{}),onClick:function(){return ev(r)},className:"tool-button"})})]})}),z&&(0,f.jsx)(ej,{}),P&&(0,f.jsx)("div",{id:"TraceBlock"+i}),(0,f.jsx)(q.Z,{in:er,sx:{mt:2},children:(0,f.jsx)(G,{severity:"error",action:(0,f.jsx)(H.Z,{"aria-label":"close",color:"inherit",size:"small",onClick:function(){return ey()}}),sx:{mb:2},children:ei})})]})}}}]);