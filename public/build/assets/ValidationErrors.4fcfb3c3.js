import{r as p,o as _,a as t,c as s,x as i,m as f,z as u,i as g,u as l,d as c,F as h,t as v,f as y}from"./app.dfece0eb.js";const k=["value"],E={props:["modelValue"],emits:["update:modelValue"],setup(o){const e=p(null);return _(()=>{e.value.hasAttribute("autofocus")&&e.value.focus()}),(a,r)=>(t(),s("input",{class:"border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",value:o.modelValue,onInput:r[0]||(r[0]=n=>a.$emit("update:modelValue",n.target.value)),ref_key:"input",ref:e},null,40,k))}},x={class:"block font-medium text-sm text-gray-700"},$={key:0},b={key:1},F={props:["value"],setup(o){return(e,a)=>(t(),s("label",x,[o.value?(t(),s("span",$,i(o.value),1)):(t(),s("span",b,[f(e.$slots,"default")]))]))}},V={key:0},w=c("div",{class:"font-medium text-red-600"},"Whoops! Something went wrong.",-1),B={class:"mt-3 list-disc list-inside text-sm text-red-600"},N={setup(o){const e=u(()=>g().props.value.errors),a=u(()=>Object.keys(e.value).length>0);return(r,n)=>l(a)?(t(),s("div",V,[w,c("ul",B,[(t(!0),s(h,null,v(l(e),(d,m)=>(t(),s("li",{key:m},i(d),1))),128))])])):y("",!0)}};export{N as _,F as a,E as b};