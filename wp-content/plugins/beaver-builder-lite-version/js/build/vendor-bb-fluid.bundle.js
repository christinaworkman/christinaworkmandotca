/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@beaverbuilder/fluid/dist/index.es.js":
/*!************************************************************!*\
  !*** ./node_modules/@beaverbuilder/fluid/dist/index.es.js ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "Button": () => (/* binding */ G),
/* harmony export */   "Collection": () => (/* binding */ ae),
/* harmony export */   "Layout": () => (/* binding */ F),
/* harmony export */   "Menu": () => (/* binding */ M),
/* harmony export */   "Page": () => (/* binding */ J),
/* harmony export */   "Text": () => (/* binding */ w)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var framer_motion__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! framer-motion */ "framer-motion");
/* harmony import */ var framer_motion__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(framer_motion__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_router_dom__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-router-dom */ "react-router-dom");
/* harmony import */ var react_router_dom__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react_router_dom__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _beaverbuilder_icons__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @beaverbuilder/icons */ "@beaverbuilder/icons");
/* harmony import */ var _beaverbuilder_icons__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_beaverbuilder_icons__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var react_laag__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react-laag */ "react-laag");
/* harmony import */ var react_laag__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(react_laag__WEBPACK_IMPORTED_MODULE_4__);
function y(){return(y=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var l=arguments[t];for(var a in l)Object.prototype.hasOwnProperty.call(l,a)&&(e[a]=l[a])}return e}).apply(this,arguments)}var b,x=(function(e){
/*!
  Copyright (c) 2017 Jed Watson.
  Licensed under the MIT License (MIT), see
  http://jedwatson.github.io/classnames
*/
!function(){var t={}.hasOwnProperty;function l(){for(var e=[],a=0;a<arguments.length;a++){var n=arguments[a];if(n){var r=typeof n;if("string"===r||"number"===r)e.push(n);else if(Array.isArray(n)&&n.length){var i=l.apply(null,n);i&&e.push(i)}else if("object"===r)for(var s in n)t.call(n,s)&&n[s]&&e.push(s)}}return e.join(" ")}e.exports?(l.default=l,e.exports=l):window.classNames=l}()}(b={exports:{}},b.exports),b.exports);var w=Object.freeze({__proto__:null,Title:({tag:t="div",eyebrow:l,eyebrowTag:a="div",subtitle:n,subtitleTag:r="div",children:i,className:s,role:c,level:o=2,...d})=>{const m=x("fluid-text-title",s);return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(t,y({className:m,role:c||"heading","aria-level":o},d),l&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement(a,{className:"fluid-text-eyebrow"},l),react__WEBPACK_IMPORTED_MODULE_0___default().createElement("span",{style:{display:"inline-flex"}},i),n&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement(r,{className:"fluid-text-subtitle"},n))}});const T=({className:t,style:l,padX:a=!0,padY:n=!0,outset:r=!1,tag:i="div",...s})=>{const c=x({"fluid-box":!0,"fluid-pad-x":a&&!r,"fluid-pad-y":n,"fluid-box-outset":r},t);return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(i,y({className:c,style:l},s))},O=e=>Number.isInteger(e)&&0!==e?e+"px":"lg"===e||"large"===e?"var(--fluid-lg-space)":"med"===e||"medium"===e||"sm"===e||"small"===e?"var(--fluid-med-space)":e,k=(e,t,l)=>{if(t&&l)return l/t*100+"%";switch(e){case"square":case"1:1":return"100%";case"video":case"16:9":return"56.25%";case"poster":case"3:4":return"133.3%";default:const t=e.split(":");return 100/t[0]*t[1]+"%"}},S=({children:t,className:l,ratio:a="square",style:n,width:r,height:i,...s})=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement(T,y({padY:!1,padX:!1,className:x("fluid-aspect-box",l),style:{...n,paddingTop:k(a,r,i)}},s),react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",null,t)),P=({className:t,align:l="center",style:a,padX:n=!1,padY:r=!1,gap:i=0,direction:s,...c})=>{const o={justifyContent:(d=l,"left"===d?"flex-start":"right"===d?"flex-end":d),"--fluid-gap":O(i),flexDirection:(e=>"reverse"===e?"row-reverse":e)(s),...a};var d;const m=x("fluid-row",t);return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(T,y({padX:n,padY:r,className:m,style:o},c))},C=({tag:t="div",className:l,children:a,size:n,style:r,...i})=>{const s=Number.isInteger(n)?n+"px":n,c={...r,flex:void 0!==s&&"0 0 "+s};return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(t,y({className:x("fluid-split-pane",l),style:c},i),a)},D=["lg","med","sm"],B=({className:t,size:l="lg",isSticky:a=!0,tag:n="div",...r})=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement(n,y({className:x("fluid-toolbar",{["fluid-size-"+l]:D.includes(l),"fluid-is-sticky":a},t)},r)),I=e=>{e.preventDefault(),e.stopPropagation()},z=({children:t})=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement(framer_motion__WEBPACK_IMPORTED_MODULE_1__.motion.div,{initial:{scale:.8},animate:{scale:1},style:{background:"var(--fluid-box-background)",border:"2px solid var(--fluid-line-color)",flex:"1 1 auto",pointerEvents:"none",display:"flex",justifyContent:"center",alignItems:"center"}},t),H=(0,react__WEBPACK_IMPORTED_MODULE_0__.createContext)(),_=({tag:l="div",children:a,className:n,onDrop:r=(()=>{}),hoverMessage:i=react__WEBPACK_IMPORTED_MODULE_0___default().createElement("h1",null,"You're Hovering..."),...s})=>{const[c,o]=(0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(!1),[d,m]=(0,react__WEBPACK_IMPORTED_MODULE_0__.useState)([]),u=e=>m(d.filter((t=>t.name!==e))),p={files:d,setFiles:m,removeFile:u},f=x("fluid-drop-area",{"is-hovering":c},n),g=e=>{o(!0),e.preventDefault(),e.stopPropagation()},E=e=>{o(!1),e.preventDefault(),e.stopPropagation()};return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(H.Provider,{value:p},react__WEBPACK_IMPORTED_MODULE_0___default().createElement(l,y({className:f},s,{onDrag:I,onDragStart:I,onDragOver:g,onDragLeave:E,onDragEnter:g,onDragEnd:E,onDrop:e=>{const t=Array.from(e.nativeEvent.dataTransfer.files);m(t),o(!1),0<t.length&&r(t,u),e.preventDefault(),e.stopPropagation()}}),c?react__WEBPACK_IMPORTED_MODULE_0___default().createElement(z,null,i):a))};_.use=()=>(0,react__WEBPACK_IMPORTED_MODULE_0__.useContext)(H);var F=Object.freeze({__proto__:null,Box:T,Row:P,Loading:({className:t,...l})=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",y({className:x("fluid-loading-bar",t)},l),react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",{className:"fluid-dot"}),react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",{className:"fluid-dot"}),react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",{className:"fluid-dot"})),Headline:({className:t,...l})=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",y({className:x("fluid-headline",t),role:"heading","aria-level":"2"},l)),Message:({status:t,icon:l,className:a,children:n,tag:r="div",...i})=>{const s=x("fluid-message",{"fluid-status-alert":"alert"==t,"fluid-status-destructive":"destructive"==t,"fluid-status-primary":"primary"==t},a);return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(r,y({className:s},i),l&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",{className:"fluid-message-icon"},react__WEBPACK_IMPORTED_MODULE_0___default().createElement(l,null)),n)},AspectBox:S,Split:({tag:a="div",panes:n=[],sizes:r=[240],className:i,isShowingFirstPane:s=!0,onToggleFirstPane:c=(()=>{}),...o})=>{const[d,m]=(0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(s);(0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)((()=>m(s)),[s]);const u={...o,toggleFirstPane:()=>{const e=!d;m(e),c(e)},isFirstPaneHidden:!d};return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(a,y({className:x("fluid-split",i)},o),0<n.length&&n.map(((t,l)=>0!==l||d?react__WEBPACK_IMPORTED_MODULE_0___default().createElement(C,{className:"fluid-split-pane",key:l,size:r[l]},react__WEBPACK_IMPORTED_MODULE_0___default().createElement(t,u)):null)))},Toolbar:B,ContentBoundary:({tag:t="div",className:l,...a})=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement(t,y({className:x("fluid-content-boundary",l)},a)),DropArea:_});class Y extends react__WEBPACK_IMPORTED_MODULE_0__.Component{constructor(e){super(e),this.state={hasError:!1,error:null}}static getDerivedStateFromError(e){return{hasError:!0,error:e}}render(){const{alternate:e=L,children:t}=this.props,{hasError:l,error:a}=this.state;return l?(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(e,{error:a}):t}}const L=({error:t})=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",{className:"fluid-default-error-message",style:{display:"flex",flexDirection:"column",flex:"1 0 auto",justifyContent:"center",alignItems:"center",padding:20}},react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",null,"There seems to be an error."),react__WEBPACK_IMPORTED_MODULE_0___default().createElement("code",null,t.message)),j=["normal","transparent","elevator"],W=["sm","med","lg"],X=["round"],A=(0,react__WEBPACK_IMPORTED_MODULE_0__.forwardRef)(((t,l)=>{const{tag:a,className:n,to:r,type:i="button",href:s,onClick:c,isSelected:o=!1,appearance:d="normal",status:m,icon:u,size:p,shape:g,isLoading:h=!1,disabled:v,children:N,...y}=t;let b={ref:l,className:x("fluid-button",{"is-selected":o,["fluid-status-"+m]:m,["fluid-size-"+p]:W.includes(p),["fluid-appearance-"+d]:j.includes(d),["fluid-shape-"+g]:g&&X.includes(g)},n),role:"button",disabled:v||h,...y},w="button";return a?w=a:r||s?(w="a",s?b.href=s:(w=react_router_dom__WEBPACK_IMPORTED_MODULE_2__.Link,b.to=r)):(b.onClick=c,b.type=i),react__WEBPACK_IMPORTED_MODULE_0___default().createElement(w,b,(u||h)&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement("span",{className:"fluid-button-icon"},!0===h?react__WEBPACK_IMPORTED_MODULE_0___default().createElement(_beaverbuilder_icons__WEBPACK_IMPORTED_MODULE_3__.Loading,null):u),N&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement("span",null,N))})),M=({children:t,content:l,isShowing:a,onOutsideClick:n=(()=>{}),className:r,style:i,...s})=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_laag__WEBPACK_IMPORTED_MODULE_4__.ToggleLayer,{isOpen:a,closeOnOutsideClick:!0,onOutsideClick:n,placement:{anchor:"BOTTOM_RIGHT",possibleAnchors:["BOTTOM_LEFT","BOTTOM_CENTER","BOTTOM_RIGHT"]},renderLayer:({layerProps:t,isOpen:a})=>a&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",y({},s,t,{style:{...i,...t.style},className:x("fluid-menu",t.className,r)}),l)},(({triggerRef:e})=>(0,react__WEBPACK_IMPORTED_MODULE_0__.cloneElement)(t,{ref:e})));M.Item=({className:t,...l})=>{const a=x("fluid-menu-item",t);return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(G,y({className:a,appearance:"transparent"},l))};const R=({className:t,direction:l="horizontal",isHidden:a=!1})=>{const n=x("fluid-divider",{"fluid-vertical-divider":"vertical"===l,"fluid-horizontal-divider":"horizontal"===l,"fluid-is-hidden":a},t);return react__WEBPACK_IMPORTED_MODULE_0___default().createElement("hr",{className:n})},G=A;G.Group=({tag:l="div",children:a,className:n,direction:r="row",appearance:i="normal",shouldHandleOverflow:s=!1,label:c,moreMenu:u,...p})=>{const[f,g]=(0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(null),[E,v]=(0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(!0),N=(0,react__WEBPACK_IMPORTED_MODULE_0__.useRef)(),b="normal"===i,w="row"===r?"vertical":"horizontal";let T=react__WEBPACK_IMPORTED_MODULE_0__.Children.map(a,(e=>e||null));(0,react__WEBPACK_IMPORTED_MODULE_0__.useLayoutEffect)((()=>{if(s){if(N.current){const e=N.current,t=window.getComputedStyle(e),l=parseInt(t.paddingLeft)+parseInt(t.paddingRight),a=e.querySelector(".fluid-more-button"),n=e.clientWidth-l;if((a?e.scrollWidth-(l+a.offsetWidth):e.scrollWidth-l)>n){v(!0);const t=n-a.offsetWidth;let l=0,r=0;for(let a of e.childNodes)l+=a.offsetWidth,l>t||r++;g(r)}else v(!1),g(null)}}else v(!1)}),[a]);const O=x({"fluid-button-group":!0,["fluid-button-group-"+r]:r,["fluid-button-group-appearance-"+i]:i},n),k={...p,className:O,role:p.role?p.role:"group",ref:N},S=()=>u||react__WEBPACK_IMPORTED_MODULE_0__.Children.map(a,((t,l)=>!t||t.props.excludeFromMenu?null:react__WEBPACK_IMPORTED_MODULE_0___default().createElement(M.Item,y({key:l},t.props)))),P=()=>{const[l,a]=(0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(!1);return react__WEBPACK_IMPORTED_MODULE_0___default().createElement((react__WEBPACK_IMPORTED_MODULE_0___default().Fragment),null,b&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement(R,{className:"fluid-more-button-divider",direction:w}),react__WEBPACK_IMPORTED_MODULE_0___default().createElement(M,{content:react__WEBPACK_IMPORTED_MODULE_0___default().createElement(S,null),isShowing:l,onOutsideClick:()=>a(!1)},react__WEBPACK_IMPORTED_MODULE_0___default().createElement(A,{className:"fluid-more-button",isSelected:l,onClick:()=>a(!l)},react__WEBPACK_IMPORTED_MODULE_0___default().createElement(_beaverbuilder_icons__WEBPACK_IMPORTED_MODULE_3__.More,null))))};return react__WEBPACK_IMPORTED_MODULE_0___default().createElement((react__WEBPACK_IMPORTED_MODULE_0___default().Fragment),null,c&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement("label",null,c),react__WEBPACK_IMPORTED_MODULE_0___default().createElement(l,k,((e,t=null)=>Number.isInteger(t)?react__WEBPACK_IMPORTED_MODULE_0__.Children.map(e,((e,l)=>l+1>t?null:e)):e)(T,f),E&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement(P,null)))};const q=t=>{const l=(0,react_router_dom__WEBPACK_IMPORTED_MODULE_2__.useHistory)();return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(G,y({className:"fluid-back-button",appearance:"transparent",onClick:l.goBack},t),react__WEBPACK_IMPORTED_MODULE_0___default().createElement(_beaverbuilder_icons__WEBPACK_IMPORTED_MODULE_3__.BackArrow,null))},J=({children:t,className:a,hero:n,title:r,icon:i,toolbar:s,topContentStyle:c,actions:o,header:d,footer:m,onLoad:u=(()=>{}),shouldScroll:p=!0,shouldShowBackButton:f=(e=>e),style:g={},padX:E=!0,padY:h=!0,contentWrapStyle:v=null,tag:N="div",contentBoxTag:b="div",contentBoxProps:w={},contentBoxStyle:O=null,overlay:k,...S})=>{const P=x("fluid-page",a);(0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(u,[]);const C="function"==typeof f?f():f,D=({children:t})=>{if(!t)return null;const l="string"==typeof t;return react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",{style:{transformOrigin:"0 0",flex:"0 0 auto",borderBottom:"2px solid var(--fluid-line-color)"}},l&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement("img",{src:t,style:{width:"100%"}}),!l&&t)},I={...g,overflowX:"hidden",overflowY:p?"scroll":"hidden",perspective:1,perspectiveOrigin:"0 0"},z={maxHeight:p?"":"100%",minHeight:0,flexShrink:p?0:1,...O},H={flexGrow:1,flexShrink:1,minHeight:0,maxHeight:"100%",...v};return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(N,{className:"fluid-page-wrap",style:{flex:"1 1 auto",position:"relative",minHeight:0,maxHeight:"100%",minWidth:0,maxWidth:"100%",display:"flex",flexDirection:"column"}},react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",y({className:P},S,{style:I}),n&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement(D,null,n),react__WEBPACK_IMPORTED_MODULE_0___default().createElement(b,y({className:"fluid-page-content"},w,{style:z}),react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",{className:"fluid-sticky-element fluid-page-top-content",style:c},s,!1!==s&&!s&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement(B,{className:"fluid-page-top-toolbar"},C&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement(q,null),i&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement("span",{className:"fluid-page-title-icon"},i),r&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",{className:"fluid-page-toolbar-content"},react__WEBPACK_IMPORTED_MODULE_0___default().createElement("span",{className:"fluid-page-title",role:"heading","aria-level":"1",style:{flex:"1 1 auto"}},r)),o&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement("span",{className:"fluid-page-actions"},o)),d&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement(B,{size:"sm",className:"fluid-page-header"},d)),react__WEBPACK_IMPORTED_MODULE_0___default().createElement(T,{padX:E,padY:h,style:H},react__WEBPACK_IMPORTED_MODULE_0___default().createElement(Y,null,t)))),m&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",{className:"fluid-page-footer"},m),k&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",{className:"fluid-page-overlay"},k))};J.Section=({children:t,className:l,label:a,handle:n,contentStyle:r={},padX:i=!0,padY:s=!0,footer:c,description:o,...d})=>{const m=x("fluid-section",{[n+"-section"]:n},l);return react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",y({className:m},d),a&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",{className:"fluid-section-title"},react__WEBPACK_IMPORTED_MODULE_0___default().createElement("span",{className:"fluid-section-title-text"},a)),o&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement(P,{className:"fluid-section-description"},o),react__WEBPACK_IMPORTED_MODULE_0___default().createElement(T,{className:"fluid-section-content",padX:i,padY:s,style:r},t),c&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement(T,{padY:!1,className:"fluid-section-footer"},c))};const K=(0,react__WEBPACK_IMPORTED_MODULE_0__.createContext)({appearance:"grid"}),Q=({tag:t="li",title:l,description:n,thumbnail:r,thumbnailProps:i,truncateTitle:s=!0,icon:c,onClick:o,href:d,to:m,className:u,children:p,...f})=>{const{appearance:g}=(0,react__WEBPACK_IMPORTED_MODULE_0__.useContext)(K),E="list"===g?$:Z,h={title:l,truncateTitle:s,thumbnail:r,thumbnailProps:i,description:n,icon:c},v={onClick:o,href:d,to:m,className:"fluid-collection-item-primary-action",appearance:"transparent"};return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(t,y({className:x("fluid-collection-item",u)},f),react__WEBPACK_IMPORTED_MODULE_0___default().createElement(G,v,(l||r)&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement(E,h),p))},U=({children:t,ratio:l="4:3",...a})=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",{className:"fluid-collection-item-thumbnail"},react__WEBPACK_IMPORTED_MODULE_0___default().createElement(S,y({ratio:l},a),t)),V=({title:t,description:l,truncate:a,icon:n,...r})=>{if(!t&&!l)return null;const i=x("fluid-item-title",{"fluid-truncate":a});return react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",y({className:"fluid-collection-item-text"},r),(t||n)&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",{className:i},n&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement("span",null,n),t),l&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",null,l))},Z=({title:t,description:l,truncateTitle:a,thumbnail:n,thumbnailProps:r,icon:i,tag:s="div",...c})=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement(s,y({className:"fluid-collection-item-grid-content"},c),n&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement(U,r,n),react__WEBPACK_IMPORTED_MODULE_0___default().createElement(V,{title:t,truncate:a,description:l,icon:i})),$=({title:t,description:l,truncateTitle:a,thumbnail:n,thumbnailProps:r,icon:i,...s})=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",y({className:"fluid-collection-item-list-content"},s),n&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement(U,r,n),react__WEBPACK_IMPORTED_MODULE_0___default().createElement(V,{title:t,truncate:a,description:l,icon:i})),ee=({...t})=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement(Q,y({thumbnail:!0,title:"loading..."},t)),te=["grid","list"],le=({total:t=4})=>Array(t).fill(0).map(((t,l)=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement(ee,{key:l}))),ae=({tag:t="ul",appearance:l="grid",maxItems:a,className:n,children:r,isLoading:i=!1,loadingItems:s,...c})=>{const o=x("fluid-collection",{["fluid-collection-appearance-"+l]:te.includes(l)},n),m={appearance:l};return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(K.Provider,{value:m},react__WEBPACK_IMPORTED_MODULE_0___default().createElement(framer_motion__WEBPACK_IMPORTED_MODULE_1__.AnimatePresence,null,react__WEBPACK_IMPORTED_MODULE_0___default().createElement(t,y({className:o},c),i&&react__WEBPACK_IMPORTED_MODULE_0___default().createElement(le,{total:s}),!i&&((e,t=null)=>Number.isInteger(t)?react__WEBPACK_IMPORTED_MODULE_0__.Children.map(e,((e,l)=>l+1>t?null:e)):react__WEBPACK_IMPORTED_MODULE_0__.Children.toArray(e))(r,a))))};ae.Item=Q,ae.use=()=>(0,react__WEBPACK_IMPORTED_MODULE_0__.useContext)(K);


/***/ }),

/***/ "./src/vendors/bb-fluid.js":
/*!*********************************!*\
  !*** ./src/vendors/bb-fluid.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vendor_fluid__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vendor-fluid */ "./node_modules/@beaverbuilder/fluid/dist/index.es.js");
/* harmony import */ var vendor_fluid_dist_index_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vendor-fluid/dist/index.css */ "./node_modules/@beaverbuilder/fluid/dist/index.css");


window.FL = window.FL || {};
FL.vendors = FL.vendors || {};
FL.vendors.BBFluid = vendor_fluid__WEBPACK_IMPORTED_MODULE_0__;

/***/ }),

/***/ "./node_modules/@beaverbuilder/fluid/dist/index.css":
/*!**********************************************************!*\
  !*** ./node_modules/@beaverbuilder/fluid/dist/index.css ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "@beaverbuilder/icons":
/*!*************************************!*\
  !*** external "FL.vendors.BBIcons" ***!
  \*************************************/
/***/ ((module) => {

module.exports = FL.vendors.BBIcons;

/***/ }),

/***/ "framer-motion":
/*!*******************************!*\
  !*** external "FramerMotion" ***!
  \*******************************/
/***/ ((module) => {

module.exports = FramerMotion;

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

module.exports = React;

/***/ }),

/***/ "react-laag":
/*!****************************!*\
  !*** external "ReactLaag" ***!
  \****************************/
/***/ ((module) => {

module.exports = ReactLaag;

/***/ }),

/***/ "react-router-dom":
/*!*********************************!*\
  !*** external "ReactRouterDOM" ***!
  \*********************************/
/***/ ((module) => {

module.exports = ReactRouterDOM;

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		if(__webpack_module_cache__[moduleId]) {
/******/ 			return __webpack_module_cache__[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	// startup
/******/ 	// Load entry module
/******/ 	__webpack_require__("./src/vendors/bb-fluid.js");
/******/ 	// This entry module used 'exports' so it can't be inlined
/******/ })()
;
//# sourceMappingURL=vendor-bb-fluid.bundle.js.map