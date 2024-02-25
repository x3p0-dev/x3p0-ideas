(()=>{"use strict";var e={n:t=>{var a=t&&t.__esModule?()=>t.default:()=>t;return e.d(a,{a}),a},d:(t,a)=>{for(var n in a)e.o(a,n)&&!e.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:a[n]})},o:(e,t)=>Object.prototype.hasOwnProperty.call(e,t)};const t=window.React,a=window.wp.tokenList;var n=e.n(a);const l=(e,t="",a="",l="",i="")=>{const r=new(n())(e);return a&&r.remove(l+a+i),t&&r.add(l+t+i),r.value},i=window.wp.i18n,r=["core/code"],s="language-",o=[{value:"css",label:(0,i.__)("CSS","x3p0-ideas")},{value:"html",label:(0,i.__)("HTML","x3p0-ideas")},{value:"js",label:(0,i.__)("JavaScript","x3p0-ideas")},{value:"php",label:(0,i.__)("PHP","x3p0-ideas")},{value:"scss",label:(0,i.__)("SCSS","x3p0-ideas")}],c=window.wp.hooks,m=()=>(0,c.applyFilters)("x3p0.ideas.blockEdit.codeLanguages",o),d=(e,t,a)=>l(e,t,a,s),p=window.wp.components,v=window.wp.element,u={key:"default",name:(0,i.__)("Default","x3p0-ideas"),value:""},g=({attributes:{className:e},setAttributes:a})=>{const l=(0,v.useMemo)((()=>(e=>{const t=new(n())(e),a=m().find((e=>t.contains(s+e.value)));return void 0!==a?a.value:""})(e)),[e]),r=[u,...m().map((e=>({key:e.value,name:e.label,value:e.value})))];return(0,t.createElement)("div",{className:"x3p0-code-language"},(0,t.createElement)(p.CustomSelectControl,{label:(0,i.__)("Code Language","x3p0-ideas"),options:r,value:r.find((e=>e.value===l)),onChange:({selectedItem:t})=>a({className:d(e,t.value,l)}),size:"__unstable-large",__nextHasNoMarginBottom:!0,__nextUnconstrainedWidth:!0}))},h=window.wp.blockEditor,_=["core/avatar","core/image","core/post-featured-image"],x="has-",b="-gradient-background",w=(e,t,a)=>l(e,t,a,x,b),E=({attributes:{className:e},setAttributes:a,clientId:l})=>{const{gradients:r,gradientOptions:s}=(()=>{const e=(0,h.__experimentalUseMultipleOriginColorsAndGradients)(),t=(0,v.useMemo)((()=>e.gradients.map((e=>[...e.gradients||[]])).flat()));return{gradientOptions:e.gradients,gradients:t}})(),o=((e,t)=>{const a=new(n())(e),l=t.find((e=>a.contains(x+e.slug+b)));return void 0!==l?l.slug:""})(e,r),c=e=>{return t=((e,t)=>{const a=(0,h.getGradientSlugByValue)(t,e);return a?`var:preset|gradient|${a}`:e})(e,r),t&&t.startsWith("var:preset|gradient|")?t.replace("var:preset|gradient|",""):null;var t},m={label:(0,i.__)("Gradient Outline","x3p0-ideas"),gradientValue:o?(0,h.getGradientValueBySlug)(r,o):null,onGradientChange:t=>a({className:w(e,c(t),o)}),isShownByDefault:!0,disableCustomColors:!0,disableCustomGradients:!0,hasColorsOrGradients:!1,gradients:s};return(0,t.createElement)(h.__experimentalColorGradientSettingsDropdown,{settings:[m],panelId:l,__experimentalIsRenderedInSidebar:!0,__experimentalHasMultipleOrigins:!0})},q=(0,t.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",height:"24",viewBox:"0 -960 960 960",width:"24"},(0,t.createElement)("path",{d:"M324.758-294.578q13.934 0 23.684-9.68 9.75-9.681 9.75-23.615 0-13.935-9.777-23.685-9.777-9.75-23.711-9.75-13.935 0-23.588 9.777-9.654 9.777-9.654 23.712 0 13.934 9.681 23.588 9.68 9.653 23.615 9.653Zm0-152.153q13.934 0 23.684-9.681 9.75-9.681 9.75-23.615t-9.777-23.684q-9.777-9.75-23.711-9.75-13.935 0-23.588 9.777-9.654 9.777-9.654 23.711t9.681 23.588q9.68 9.654 23.615 9.654Zm0-152.961q13.934 0 23.684-9.681 9.75-9.681 9.75-23.615 0-13.935-9.777-23.685-9.777-9.749-23.711-9.749-13.935 0-23.588 9.776-9.654 9.777-9.654 23.712 0 13.934 9.681 23.588 9.68 9.654 23.615 9.654Zm119.896 300.229h222.845v-55.96H444.654v55.96Zm0-152.961h222.845v-55.96H444.654v55.96Zm0-152.153h222.845v-55.96H444.654v55.96ZM215.448-147.271q-28.346 0-48.262-19.915-19.915-19.916-19.915-48.262v-529.104q0-28.346 19.915-48.262 19.916-19.915 48.262-19.915h529.104q28.346 0 48.262 19.915 19.915 19.916 19.915 48.262v529.104q0 28.346-19.915 48.262-19.916 19.915-48.262 19.915H215.448Zm.091-55.96h528.922q4.615 0 8.462-3.846 3.846-3.847 3.846-8.462v-528.922q0-4.615-3.846-8.462-3.847-3.846-8.462-3.846H215.539q-4.615 0-8.462 3.846-3.846 3.847-3.846 8.462v528.922q0 4.615 3.846 8.462 3.847 3.846 8.462 3.846Zm-12.308-553.538v553.538-553.538Z"})),k=(0,t.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",height:"24",viewBox:"0 -960 960 960",width:"24"},(0,t.createElement)("path",{d:"M184.192-384.923v-36.923h353.847v36.923H184.192Zm0-153.846v-36.923h592v36.923h-592Z"})),y=(0,t.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",height:"24",viewBox:"0 -960 960 960",width:"24"},(0,t.createElement)("path",{d:"M554.769-577.538v-33.539q32.231-17.038 69.415-25.442 37.183-8.404 75.816-8.404 21.417 0 41.805 2.457 20.387 2.458 41.58 7.856v33.841q-20.423-6.192-40.209-8.404-19.786-2.212-43.099-2.212-38.661 0-75.984 8.424-37.324 8.423-69.324 25.423Zm0 218.461v-35.077q30.693-17.038 69.03-25.75 38.338-8.711 76.201-8.711 21.417 0 41.805 2.73 20.387 2.731 41.58 8.193v33.846q-20.443-6.192-40.223-8.712-19.779-2.519-43.1-2.519-38.682 0-76.024 9.385-37.342 9.384-69.269 26.615Zm0-108.461v-35.077q32.231-17.039 69.415-25.443 37.183-8.404 75.816-8.404 21.417 0 41.805 2.423 20.387 2.424 41.58 7.885v33.846q-20.443-6.192-40.223-8.711-19.779-2.519-43.1-2.519-38.682 0-76.024 9.5t-69.269 26.5ZM262.001-319.692q52.23 0 101.73 12.038 49.5 12.039 98.115 39.192v-388.769q-42.692-30.923-95.245-46.692-52.553-15.769-104.834-15.769-35.407 0-62.323 4.307-26.916 4.308-59.444 16.079-9.231 3.077-13.077 8.846-3.846 5.77-3.846 12.693v356.844q0 10.769 7.692 15.769T147.692-304q21.193-7.385 49.81-11.538 28.617-4.154 64.499-4.154Zm236.768 51.23q48.694-27.153 97.885-39.192 49.191-12.038 101.25-12.038 35.75 0 64.481 4.154 28.73 4.153 49.923 11.538 9.231 3.846 16.923-1.154 7.692-5 7.692-15.769v-356.923q0-6.923-3.846-12.308-3.846-5.384-13.077-9.231-32.5-11.076-59.425-15.692-26.926-4.615-62.421-4.615-52.385 0-104.539 15.769-52.153 15.769-94.846 46.825v388.636ZM480-214.769q-48.654-32.654-104.038-50.327-55.385-17.673-114.116-17.673-29.97 0-58.87 4.865-28.899 4.866-56.683 15.401-21.909 8.465-41.024-5.429-19.115-13.893-19.115-38.375v-376.77q0-14.962 8.115-27.404t22.192-17.827q34.579-14.423 71.44-21.365 36.861-6.943 73.945-6.943 58.387 0 113.905 16.981T480-690.462q48.731-32.192 104.249-49.173 55.518-16.981 113.905-16.981 37.084 0 73.945 6.943 36.861 6.942 71.44 21.365 14.077 5.385 22.192 17.827 8.115 12.442 8.115 27.404v376.77q0 24.482-20.653 37.606-20.654 13.124-44.101 4.659-27.015-9.765-54.578-14.246-27.563-4.481-56.36-4.481-58.731 0-114.116 17.673Q528.654-247.423 480-214.769ZM292.461-499.385Z"})),C=(0,t.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",height:"24",viewBox:"0 -960 960 960",width:"24"},(0,t.createElement)("path",{d:"M400-320h160q17 0 28.5-11.5T600-360v-80h-80v40h-80v-160h80v40h80v-80q0-17-11.5-28.5T560-640H400q-17 0-28.5 11.5T360-600v240q0 17 11.5 28.5T400-320Zm80 240q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"})),Z=(0,t.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",height:"24",viewBox:"0 -960 960 960",width:"24"},(0,t.createElement)("path",{d:"m499.269-560.154-33.308-33.308 34.731-84.653H379.654l-44.423-44.039h426.923v44.308H549.077l-49.808 117.692Zm272.923 424.77L454.5-453.846l-92.923 219.077h-48.539l107.885-252.654L127.077-780.5l26.461-25.962 644.616 644.616-25.962 26.462Z"})),f=(0,t.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",height:"24",viewBox:"0 -960 960 960",width:"24"},(0,t.createElement)("path",{d:"M215.539-148.078q-28.257 0-48.263-20.006-20.005-20.006-20.005-48.263v-528.114q0-28.257 20.005-48.263 20.006-20.005 48.263-20.005h528.922q28.257 0 48.263 20.005 20.005 20.006 20.005 48.263v251.692q-13.641-5.694-27.647-9.732-14.005-4.037-28.313-6.653v-235.307q0-4.615-3.846-8.462-3.847-3.846-8.462-3.846H215.539q-4.615 0-8.462 3.846-3.846 3.847-3.846 8.462v528.114q0 4.616 3.846 8.462 3.847 3.847 8.462 3.847h239.094q2.29 15.307 6.527 29.196 4.237 13.889 10.532 26.764H215.539Zm-12.308-98.383v42.423-552.731 247.547-2.932 265.693Zm90.808-53.002h163.626q2.605-14.307 7.105-28.249 4.499-13.942 10.576-27.711H294.039v55.96Zm0-152.961h257.347q23.423-19.192 49.653-32.383 26.23-13.192 56.46-19.423v-4.154h-363.46v55.96Zm0-152.961h371.922v-55.96H294.039v55.96ZM717.631-69.809q-72.553 0-123.476-50.868-50.923-50.869-50.923-123.422 0-72.554 50.869-123.477 50.868-50.922 123.422-50.922 72.553 0 123.476 50.868 50.923 50.869 50.923 123.422 0 72.554-50.869 123.477-50.868 50.922-123.422 50.922Zm-16.938-58.268h34.576v-99.192h99.192v-33.769h-99.192v-99.192h-34.576v99.192H601.5v33.769h99.193v99.192Z"})),T=(0,t.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",height:"24",viewBox:"0 -960 960 960",width:"24"},(0,t.createElement)("path",{d:"m120-200 180-280-180-280h522l198 280-198 280H120Z"})),N=(0,t.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",height:"24",viewBox:"0 -960 960 960",width:"24"},(0,t.createElement)("path",{d:"M84.846-6.961v-111.921h790.308v111.92H84.846Zm467.038-450L449.499-559.346 301.192-410.038q-3.654 3.461-3.654 8.462 0 5 3.654 8.462l85.152 84.653q3.462 3.461 8.463 3.461 5 0 8.462-3.461l148.615-148.5Zm-62.347-142.115 102.077 102.269 187.731-187.615q3.462-3.462 3.462-8.751t-3.462-8.943l-84.999-84.999q-3.654-3.462-8.943-3.462-5.288 0-8.75 3.462L489.537-599.076Zm-59.691-20.076 181.537 181.536-168.077 168.192q-20.577 20.577-49.153 20.577-28.577 0-49.154-20.577l-4.962-4.962-37.423 36.578h-145.69l109.961-110.653-4.192-4.385q-20.577-20.384-20.789-49.173-.211-28.788 20.366-49.365l167.576-167.768Zm0 0 209.077-208.885q19.884-20.077 48-19.673 28.115.404 47.692 20.481l84.652 85.152q20.077 20.577 20.077 48.596 0 28.019-20.077 48.096L611.383-437.616 429.846-619.152Z"})),A=(0,t.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",height:"24",viewBox:"0 -960 960 960",width:"24"},(0,t.createElement)("path",{d:"M216.27-772.116v-55.96h527.46v55.96H216.27ZM480.023-136.27q-110.192 0-186.972-76.758-76.781-76.757-76.781-186.949 0-110.192 76.758-186.972 76.757-76.781 186.949-76.781 110.192 0 186.972 76.758 76.781 76.757 76.781 186.949 0 110.192-76.758 186.972-76.757 76.781-186.949 76.781ZM480-203.73q81.635 0 138.953-57.317Q676.27-318.365 676.27-400t-57.317-138.953Q561.635-596.27 480-596.27t-138.953 57.317Q283.73-481.635 283.73-400t57.317 138.953Q398.365-203.73 480-203.73Z"})),B=["core/archives","core/categories","core/list","core/page-list"],M="has-marker-",S=[{value:"disc",label:(0,i.__)("Disc","x3p0-ideas")},{value:"circle",label:(0,i.__)("Circle","x3p0-ideas")},{value:"square",label:(0,i.__)("Square","x3p0-ideas")},{value:"none",label:(0,i.__)("None","x3p0-ideas")}],F=[{value:"decimal",label:(0,i.__)("Decimal","x3p0-ideas")},{value:"leading-zero",label:(0,i.__)("Leading Zero","x3p0-ideas")},{value:"upper-alpha",label:(0,i.__)("Alphabetical: Uppercase","x3p0-ideas")},{value:"lower-alpha",label:(0,i.__)("Alphabetical: Lowercase","x3p0-ideas")},{value:"upper-roman",label:(0,i.__)("Roman: Uppercase","x3p0-ideas")},{value:"lower-roman",label:(0,i.__)("Roman: Lowercase","x3p0-ideas")},{value:"none",label:(0,i.__)("None","x3p0-ideas")}],H=[...S,...F],L=(e,t,a)=>l(e,t,a,M),R={value:"",label:(0,i.__)("Default","x3p0-ideas")},I=({attributes:{className:e,ordered:a},setAttributes:l})=>{const r=(0,v.useMemo)((()=>(e=>{const t=new(n())(e),a=H.find((e=>t.contains(M+e.value)));return void 0!==a?a.value:""})(e)),[e]),s=(0,v.useMemo)((()=>a?[R,...F]:[R,...S]),[a]);(0,v.useEffect)((()=>{var t;(r&&a&&(t=r,!F.find((e=>e.value===t)))||!a&&!(e=>S.find((t=>t.value===e)))(r))&&l({className:L(e,"",r)})}),[a]);const o=(0,t.createElement)(p.MenuGroup,{className:"x3p0-list-marker-selector",label:(0,i.__)("Select a list marker","x3p0-ideas")},s.map(((a,n)=>((a,n)=>(0,t.createElement)(p.MenuItem,{key:n,role:"menuitemradio",className:"x3p0-list-marker-selector__button",isSelected:r===a.value,isPressed:r===a.value,onClick:()=>l({className:L(e,a.value,r)})},((e,a)=>{const n=e.value?e.value:"default";return(0,t.createElement)(p.FlexItem,{key:`x3p0-marker-name-${a}`,className:"x3p0-list-marker-selector__content"},(0,t.createElement)("ul",{className:`x3p0-list-marker-selector__list has-marker-${n}`},(0,t.createElement)("li",null,e.label)))})(a,n)))(a,n))));return(0,t.createElement)(p.Dropdown,{className:"x3p0-list-marker-dropdown",contentClassName:"x3p0-list-marker-popover",popoverProps:{placement:"bottom-start"},renderToggle:({isOpen:e,onToggle:a})=>(0,t.createElement)(p.ToolbarButton,{className:"x3p0-list-marker__button",icon:q,label:(0,i.__)("List Marker","x3p0-ideas"),onClick:a,"aria-expanded":e,isPressed:!!r}),renderContent:()=>o})},D=["core/heading","core/paragraph"],O="has-text-shadow-",P=[{value:"none",label:(0,i.__)("None","x3p0-ideas")},{value:"sm",label:(0,i.__)("Small","x3p0-ideas")},{value:"md",label:(0,i.__)("Medium","x3p0-ideas")},{value:"lg",label:(0,i.__)("Large","x3p0-ideas")}],G=()=>(0,c.applyFilters)("x3p0.ideas.blockEdit.textShadows",P),z=(e,t,a)=>l(e,t,a,O),V={key:"default",name:(0,i.__)("Default","x3p0-ideas"),value:""},Q=({attributes:{className:e},setAttributes:a})=>{const l=(0,v.useMemo)((()=>(e=>{const t=new(n())(e),a=G().find((e=>t.contains(O+e.value)));return void 0!==a?a.value:""})(e)),[e]),r=[V,...G().map((e=>({key:e.value,name:e.label,value:e.value})))];return(0,t.createElement)("div",{className:"x3p0-text-shadow"},(0,t.createElement)(p.CustomSelectControl,{label:(0,i.__)("Text Shadow","x3p0-ideas"),options:r,value:r.find((e=>e.value===l)),onChange:({selectedItem:t})=>a({className:z(e,t.value,l)}),size:"__unstable-large",__nextHasNoMarginBottom:!0,__nextUnconstrainedWidth:!0}))};(0,c.addFilter)("editor.BlockEdit","x3p0-ideas-code-language",(e=>a=>r.includes(a.name)?(0,t.createElement)(t.Fragment,null,(0,t.createElement)(e,{...a}),(0,t.createElement)(h.InspectorControls,{group:"settings"},(0,t.createElement)(p.PanelBody,{title:(0,i.__)("Code Settings","x3p0-ideas")},(0,t.createElement)(g,{attributes:a.attributes,setAttributes:a.setAttributes})))):(0,t.createElement)(e,{...a}))),(0,c.addFilter)("editor.BlockEdit","x3p0-ideas-gradient-background",(e=>a=>_.includes(a.name)?(0,t.createElement)(t.Fragment,null,(0,t.createElement)(e,{...a}),(0,t.createElement)(h.InspectorControls,{group:"color"},(0,t.createElement)(E,{attributes:a.attributes,setAttributes:a.setAttributes,clientId:a.clientId}))):(0,t.createElement)(e,{...a}))),(0,c.addFilter)("editor.BlockEdit","x3p0-ideas-list-marker",(e=>a=>B.includes(a.name)?(0,t.createElement)(t.Fragment,null,(0,t.createElement)(e,{...a}),(0,t.createElement)(h.BlockControls,{group:"other"},(0,t.createElement)(I,{attributes:a.attributes,setAttributes:a.setAttributes}))):(0,t.createElement)(e,{...a}))),(0,c.addFilter)("editor.BlockEdit","x3p0-ideas-text-shadow",(e=>a=>D.includes(a.name)?(0,t.createElement)(t.Fragment,null,(0,t.createElement)(e,{...a}),(0,t.createElement)(h.InspectorControls,{group:"typography"},(0,t.createElement)(Q,{attributes:a.attributes,setAttributes:a.setAttributes}))):(0,t.createElement)(e,{...a})));const U=window.wp.blocks,$=window.wp.domReady;var j=e.n($);j()((()=>{(0,U.unregisterBlockStyle)("core/separator","dots"),(0,U.unregisterBlockStyle)("core/social-links","pill-shape")}));const W=window.wp.primitives,J=(0,t.createElement)(W.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},(0,t.createElement)(W.Path,{d:"m3 5c0-1.10457.89543-2 2-2h13.5c1.1046 0 2 .89543 2 2v13.5c0 1.1046-.8954 2-2 2h-13.5c-1.10457 0-2-.8954-2-2zm2-.5h6v6.5h-6.5v-6c0-.27614.22386-.5.5-.5zm-.5 8v6c0 .2761.22386.5.5.5h6v-6.5zm8 0v6.5h6c.2761 0 .5-.2239.5-.5v-6zm0-8v6.5h6.5v-6c0-.27614-.2239-.5-.5-.5z",fillRule:"evenodd",clipRule:"evenodd"})),Y={block:"core/group",variation:{name:"group-grid",title:(0,i.__)("Grid","x3p0-ideas"),icon:J,description:(0,i.__)("Arrange blocks in a grid.","x3p0-ideas"),scope:["block","inserter","transform"],attributes:{layout:{type:"grid"}},isActive:e=>"grid"===e.layout?.type}},K={block:"core/paragraph",variation:{name:"x3p0/pagination-label",title:(0,i.__)("Pagination Label","x3p0-ideas"),description:(0,i.__)("Displays the pagination current and total pages.","x3p0-ideas"),category:"theme",icon:T,scope:["inserter"],attributes:{metadata:{bindings:{content:{source:"x3p0/theme",args:{key:"paginationLabel"}}}},content:(0,i.sprintf)((0,i.__)("Page %1$s / %2$s:","x3p0-ideas"),3,7),className:"pagination-label"},isActive:e=>"x3p0/theme"===e?.metadata?.bindings?.content?.source&&"paginationLabel"===e?.metadata?.bindings?.content?.args?.key}},X={block:"core/paragraph",variation:{name:"x3p0/site-copyright",title:(0,i.__)("Site Copyright","x3p0-ideas"),description:(0,i.__)("Displays the site copyright date.","x3p0-ideas"),category:"widgets",keywords:["copyright"],icon:C,scope:["inserter"],attributes:{metadata:{bindings:{content:{source:"x3p0/site",args:{key:"copyright"}}}},content:(0,i.sprintf)(
// Translators: %s is the copyright year.
// Translators: %s is the copyright year.
(0,i.__)("Copyright © %s","x3p0-ideas"),(new Date).getFullYear())},isActive:e=>"x3p0/site"===e?.metadata?.bindings?.content?.source&&"copyright"===e?.metadata?.bindings?.content?.args?.key}};(0,U.registerBlockVariation)(K.block,K.variation),(0,U.registerBlockVariation)(X.block,X.variation),j()((()=>{(0,U.getBlockVariations)("core/group").some((e=>"group-grid"===e.name))||(0,U.registerBlockVariation)(Y.block,Y.variation)}));const ee=window.wp.richText,te="x3p0/abbr",ae={name:te,title:(0,i.__)("Abbreviation","x3p0-ideas"),tagName:"abbr",className:null,edit:function({isActive:e,onChange:a,value:n,contentRef:l}){const[r,s]=(0,v.useState)(!1),o=()=>s((e=>!e));return(0,t.createElement)(t.Fragment,null,(0,t.createElement)(h.RichTextToolbarButton,{icon:k,title:(0,i.__)("Abbreviation","x3p0-ideas"),isActive:e,onClick:()=>e?a((0,ee.removeFormat)(n,te)):o()}),r&&(0,t.createElement)(le,{value:n,onChange:a,onClose:o,contentRef:l}))}},ne=ae;function le({value:e,contentRef:a,onChange:n,onClose:l}){const r=(0,ee.useAnchor)({editableContentElement:a.current,settings:ae}),[s,o]=(0,v.useState)(""),c=(0,t.createElement)(p.TextControl,{label:(0,i.__)("Add title for abbreviation","x3p0-ideas"),value:s,onChange:e=>o(e),help:(0,i.__)("Expand on the definition for the abbreviation when a full description is not present in the content.","x3p0-ideas")}),m=(0,t.createElement)("form",{className:"x3p0-format-abbr-popover__form",onSubmit:t=>{t.preventDefault(),n((0,ee.applyFormat)(e,{type:te,attributes:{title:s}})),l()}},c);return(0,t.createElement)(p.Popover,{className:"x3p0-format-abbr-popover",anchor:r,placement:"top",onClose:l,variant:"toolbar"},m)}const ie="x3p0/cite",re={name:ie,title:(0,i.__)("Cite","x3p0-ideas"),tagName:"cite",className:null,edit:({isActive:e,onChange:a,value:n})=>(0,t.createElement)(h.RichTextToolbarButton,{icon:y,title:(0,i.__)("Cite","x3p0-ideas"),isActive:e,onClick:()=>a((0,ee.toggleFormat)(n,{type:ie}))})},se="x3p0/del",oe={name:se,title:(0,i.__)("Delete","x3p0-ideas"),tagName:"del",className:null,edit:({isActive:e,onChange:a,value:n})=>(0,t.createElement)(h.RichTextToolbarButton,{icon:Z,title:(0,i.__)("Delete","x3p0-ideas"),isActive:e,onClick:()=>a((0,ee.toggleFormat)(n,{type:se}))})},ce="x3p0/ins",me={name:ce,title:(0,i.__)("Insert","x3p0-ideas"),tagName:"ins",className:null,edit:({isActive:e,onChange:a,value:n})=>(0,t.createElement)(h.RichTextToolbarButton,{icon:f,title:(0,i.__)("Insert","x3p0-ideas"),isActive:e,onClick:()=>a((0,ee.toggleFormat)(n,{type:ce}))})},de="x3p0/mark",pe={name:de,title:(0,i.__)("Mark","x3p0-ideas"),tagName:"mark",className:null,edit:({isActive:e,onChange:a,value:n})=>(0,t.createElement)(h.RichTextToolbarButton,{icon:N,title:(0,i.__)("Mark","x3p0-ideas"),isActive:e,onClick:()=>a((0,ee.toggleFormat)(n,{type:de}))})},ve="x3p0/overline",ue={name:ve,title:(0,i.__)("Overline","x3p0-ideas"),tagName:"span",className:"has-overline",edit:({isActive:e,onChange:a,value:n})=>(0,t.createElement)(h.RichTextToolbarButton,{icon:A,title:(0,i.__)("Overline","x3p0-ideas"),isActive:e,onClick:()=>a((0,ee.toggleFormat)(n,{type:ve}))})};(0,ee.registerFormatType)(ne.name,ne),(0,ee.registerFormatType)(re.name,re),(0,ee.registerFormatType)(oe.name,oe),(0,ee.registerFormatType)(me.name,me),(0,ee.registerFormatType)(pe.name,pe),(0,ee.registerFormatType)(ue.name,ue)})();