/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@beaverbuilder/app-core/dist/index.es.js":
/*!***************************************************************!*\
  !*** ./node_modules/@beaverbuilder/app-core/dist/index.es.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "App": () => (/* binding */ Q),
/* harmony export */   "Error": () => (/* binding */ D),
/* harmony export */   "Root": () => (/* binding */ G),
/* harmony export */   "createAppState": () => (/* binding */ O),
/* harmony export */   "createStoreRegistry": () => (/* binding */ N)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var redux__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! redux */ "redux");
/* harmony import */ var redux__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(redux__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_router_dom__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-router-dom */ "react-router-dom");
/* harmony import */ var react_router_dom__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react_router_dom__WEBPACK_IMPORTED_MODULE_2__);
const w={handle:"",label:"",render:()=>null,icon:()=>null,isEnabled:!0},O=(e=w)=>({reducers:{apps:(t={},r)=>{switch(r.type){case"REGISTER_APP":return{[r.handle]:{...e,handle:r.handle,...r.config},...t};case"UNREGISTER_APP":return delete t[r.handle],{...t};default:return t}}},actions:{registerApp:(e="",t={})=>({type:"REGISTER_APP",handle:e,config:t}),unregisterApp:(e="")=>({type:"UNREGISTER_APP",handle:e})}}),_=(e,t)=>typeof e==typeof t&&("string"==typeof e||"number"==typeof e?e===t:JSON.stringify(e)===JSON.stringify(t)),x=(e,t,r)=>"boolean"==typeof e?e:"function"==typeof e?e(t,r):"string"==typeof e?!_(t[e],r[e]):!!Array.isArray(e)&&e.some((e=>!_(t[e],r[e]))),P=(e,t)=>{if("string"!=typeof e&&!Array.isArray(e))throw new TypeError("Expected the input to be `string | string[]`");t=Object.assign({pascalCase:!1},t);if(0===(e=Array.isArray(e)?e.map((e=>e.trim())).filter((e=>e.length)).join("-"):e.trim()).length)return"";if(1===e.length)return t.pascalCase?e.toUpperCase():e.toLowerCase();return e!==e.toLowerCase()&&(e=(e=>{let t=!1,r=!1,n=!1;for(let a=0;a<e.length;a++){const o=e[a];t&&/[a-zA-Z]/.test(o)&&o.toUpperCase()===o?(e=e.slice(0,a)+"-"+e.slice(a),t=!1,n=r,r=!0,a++):r&&n&&/[a-zA-Z]/.test(o)&&o.toLowerCase()===o?(e=e.slice(0,a-1)+"-"+e.slice(a-1),n=r,r=!1,t=!0):(t=o.toLowerCase()===o&&o.toUpperCase()!==o,n=r,r=o.toUpperCase()===o&&o.toLowerCase()!==o)}return e})(e)),e=e.replace(/^[_.\- ]+/,"").toLowerCase().replace(/[_.\- ]+(\w|$)/g,((e,t)=>t.toUpperCase())).replace(/\d+(\w|$)/g,(e=>e.toUpperCase())),r=e,t.pascalCase?r.charAt(0).toUpperCase()+r.slice(1):r;var r};var v=P,U=P;v.default=U;const j=(e,t,r)=>(Object.entries(r).map((([r])=>{if(!t[r]){const t="SET_".concat(r.toUpperCase()),n=v("set_".concat(r));e[n]=e=>({type:t,value:e})}})),e),R=(e,t)=>Object.keys(e).length||Object.keys(t).length?(Object.entries(t).map((([t,r])=>{e[t]||(e[t]=(e=r,n)=>{switch(n.type){case"SET_".concat(t.toUpperCase()):return n.value;default:return e}})})),(0,redux__WEBPACK_IMPORTED_MODULE_1__.combineReducers)(e)):e=>e,T=(e,t)=>{const r=window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__;return(r?r({name:e}):redux__WEBPACK_IMPORTED_MODULE_1__.compose)((0,redux__WEBPACK_IMPORTED_MODULE_1__.applyMiddleware)(L(t)))},L=e=>{const{before:t,after:r}=e;return e=>n=>a=>{t&&t[a.type]&&t[a.type](a,e);const o=n(a);return r&&r[a.type]&&r[a.type](a,e),o}},I=e=>e.charAt(0).toUpperCase()+e.slice(1);const N=()=>{const e={};return{registerStore:(t,{state:r={},cache:n=[],actions:a={},reducers:o={},selectors:s={},effects:c={}})=>{if(!t)throw new Error("Missing key required for registerStore.");if(e[t])throw new Error("A store with the key '".concat(t,"' already exists."));const l=((e,t)=>{const r=localStorage.getItem(e);if(r){const e=JSON.parse(r);return{...t,...e}}return t})(t,r);var i,p,u;e[t]={actions:j(a,o,l),store:(0,redux__WEBPACK_IMPORTED_MODULE_1__.createStore)(R(o,l),l,T(t,c))},e[t].selectors=((e,t)=>{const r={},n=t.getState();return Object.entries(n).map((([t])=>{const r=v("get_".concat(t));e[r]||(e[r]=e=>e[t])})),Object.entries(e).map((([e,n])=>{r[e]=(...e)=>n(t.getState(),...e)})),r})(s,e[t].store),i=t,p=e[t].store,(u=n).length&&p.subscribe((()=>{const e=p.getState(),t={};u.map((r=>{t[r]=e[r]})),localStorage.setItem(i,JSON.stringify(t))}))},useStore:(n,o=!0)=>{const{store:s}=e[n],c=s.getState(),l=(0,react__WEBPACK_IMPORTED_MODULE_0__.useRef)(c),[i,p]=(0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(c);return (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)((()=>(p(s.getState()),s.subscribe((()=>{const e=s.getState();x(o,l.current,e)&&p({...e}),l.current=e})))),[]),i},getStore:t=>e[t].store,getDispatch:t=>{const{actions:r,store:n}=e[t];return (0,redux__WEBPACK_IMPORTED_MODULE_1__.bindActionCreators)(r,n.dispatch)},getSelectors:t=>e[t].selectors,getHooks:a=>{const{actions:o,store:s}=e[a];return((e,a)=>{const o=e.getState(),s={};return Object.keys(o).map((o=>{const c="use".concat(I(o));s[c]=(s=!0)=>{const[c,l]=(0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(e.getState()[o]),i=(0,react__WEBPACK_IMPORTED_MODULE_0__.useRef)(e.getState()[o]);(0,react__WEBPACK_IMPORTED_MODULE_0__.useLayoutEffect)((()=>(l(e.getState()[o]),i.current=e.getState()[o],e.subscribe((()=>{const t=e.getState();x(s,c,i.current)&&l(t[o]),i.current=t[o]})))),[]);const p="set".concat(I(o));let u=a[p];return[c,u]}})),s})(s,(0,redux__WEBPACK_IMPORTED_MODULE_1__.bindActionCreators)(o,s.dispatch))}}};function k(){return(k=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var n in r)Object.prototype.hasOwnProperty.call(r,n)&&(e[n]=r[n])}return e}).apply(this,arguments)}const D={};const B=({error:t,title:r="There seems to be an error",children:n,style:a={},...o})=>{const s={...a,display:"flex",flexDirection:"column",flex:"1 1 auto",justifyContent:"center",alignItems:"center",padding:40,textAlign:"center",minHeight:0,maxHeight:"100%"};return react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",k({style:s},o),react__WEBPACK_IMPORTED_MODULE_0___default().createElement("h1",{style:{marginBottom:20}},r),react__WEBPACK_IMPORTED_MODULE_0___default().createElement("code",{style:{padding:10}},t.message),n)};D.Boundary=class extends react__WEBPACK_IMPORTED_MODULE_0__.Component{constructor(e){super(e),this.state={hasError:!1,error:null}}static getDerivedStateFromError(e){return{hasError:!0,error:e}}render(){const{alternate:e=B,children:t}=this.props,{hasError:r,error:n}=this.state;return r?(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(e,{error:n}):t}},D.Page=B;const H=()=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",null,"Loading..."),G=({children:t,error:r,loading:n=H,router:a=react_router_dom__WEBPACK_IMPORTED_MODULE_2__.MemoryRouter,routerProps:o={}})=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement(D.Boundary,{alternate:r},react__WEBPACK_IMPORTED_MODULE_0___default().createElement(a,o,react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react__WEBPACK_IMPORTED_MODULE_0__.Suspense,{fallback:react__WEBPACK_IMPORTED_MODULE_0___default().createElement(n,null)},t))),J={handle:null,label:null,isAppRoot:!1},M=(0,react__WEBPACK_IMPORTED_MODULE_0__.createContext)(J),z=()=>(0,react__WEBPACK_IMPORTED_MODULE_0__.useContext)(M),F=t=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement(D.Page,k({title:"App Core: There seems to be an issue rendering current app."},t)),X=()=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement("h1",{style:{margin:"auto"}},"Loading..."),Z=({loading:t,error:r=V,apps:n})=>{const o=(0,react_router_dom__WEBPACK_IMPORTED_MODULE_2__.useHistory)(),s=(0,react_router_dom__WEBPACK_IMPORTED_MODULE_2__.useLocation)(),{app:l}=(0,react_router_dom__WEBPACK_IMPORTED_MODULE_2__.useParams)();if((0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)((()=>{if(n[l]&&"function"==typeof n[l].onMount)return n[l].onMount()}),[l]),!n[l])return o.go(-o.length),o.replace("/",{}),null;const{label:i="",root:p}=n[l],u=2>=s.pathname.split("/").length,g={...J,handle:l,baseURL:"/".concat(l),label:i,isAppRoot:u};return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(M.Provider,{value:g},react__WEBPACK_IMPORTED_MODULE_0___default().createElement(D.Boundary,{alternate:r},react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react__WEBPACK_IMPORTED_MODULE_0__.Suspense,{fallback:react__WEBPACK_IMPORTED_MODULE_0___default().createElement(t,null)},react__WEBPACK_IMPORTED_MODULE_0___default().createElement(q,k({root:p},g)))))},$=()=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement(K,null,react__WEBPACK_IMPORTED_MODULE_0___default().createElement("h1",null,"App Not Found")),q=(0,react__WEBPACK_IMPORTED_MODULE_0__.memo)((({root:t,...r})=>t?react__WEBPACK_IMPORTED_MODULE_0___default().createElement(t,r):react__WEBPACK_IMPORTED_MODULE_0___default().createElement($,null))),V=t=>{const{label:r}=z();return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(D.Page,k({title:"There seems to be an issue with the ".concat(r," app.")},t))},K=({children:t})=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement("div",{style:{flex:"1 1 auto",minHeight:0,maxHeight:"100%",display:"flex",flexDirection:"column",justifyContent:"center",alignItems:"center"}},t),Q={};Q.use=z,Q.Content=({apps:t={},defaultApp:r="home",loading:n=X})=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement(D.Boundary,{alternate:F},react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_router_dom__WEBPACK_IMPORTED_MODULE_2__.Switch,null,react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_router_dom__WEBPACK_IMPORTED_MODULE_2__.Route,{exact:!0,path:"/"},react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_router_dom__WEBPACK_IMPORTED_MODULE_2__.Redirect,{to:"/".concat(r)})),react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_router_dom__WEBPACK_IMPORTED_MODULE_2__.Route,{path:"/:app",render:()=>react__WEBPACK_IMPORTED_MODULE_0___default().createElement(Z,{loading:n,apps:t})})));


/***/ }),

/***/ "./src/vendors/bb-app-core.js":
/*!************************************!*\
  !*** ./src/vendors/bb-app-core.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vendor_app_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vendor-app-core */ "./node_modules/@beaverbuilder/app-core/dist/index.es.js");

window.FL = window.FL || {};
FL.vendors = FL.vendors || {};
FL.vendors.BBAppCore = vendor_app_core__WEBPACK_IMPORTED_MODULE_0__;

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

module.exports = React;

/***/ }),

/***/ "react-router-dom":
/*!*********************************!*\
  !*** external "ReactRouterDOM" ***!
  \*********************************/
/***/ ((module) => {

module.exports = ReactRouterDOM;

/***/ }),

/***/ "redux":
/*!************************!*\
  !*** external "Redux" ***!
  \************************/
/***/ ((module) => {

module.exports = Redux;

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
/******/ 	__webpack_require__("./src/vendors/bb-app-core.js");
/******/ 	// This entry module used 'exports' so it can't be inlined
/******/ })()
;
//# sourceMappingURL=vendor-bb-app-core.bundle.js.map