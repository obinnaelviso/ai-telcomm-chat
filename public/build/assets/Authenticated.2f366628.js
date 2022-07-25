import{B as L}from"./ApplicationLogo.5c35384b.js";import{o as M,y as z,z as m,r as B,a as u,c as _,d as e,m as f,h as w,A as k,b as a,w as o,B as d,u as l,T as D,e as y,L as v,l as h,x as b}from"./app.dfece0eb.js";const E={class:"relative"},j={props:{align:{default:"right"},width:{default:"48"},contentClasses:{default:()=>["py-1","bg-white"]}},setup(n){const s=n,t=p=>{i.value&&p.key==="Escape"&&(i.value=!1)};M(()=>document.addEventListener("keydown",t)),z(()=>document.removeEventListener("keydown",t));const r=m(()=>({48:"w-48"})[s.width.toString()]),g=m(()=>s.align==="left"?"origin-top-left left-0":s.align==="right"?"origin-top-right right-0":"origin-top"),i=B(!1);return(p,c)=>(u(),_("div",E,[e("div",{onClick:c[0]||(c[0]=x=>i.value=!i.value)},[f(p.$slots,"trigger")]),w(e("div",{class:"fixed inset-0 z-40",onClick:c[1]||(c[1]=x=>i.value=!1)},null,512),[[k,i.value]]),a(D,{"enter-active-class":"transition ease-out duration-200","enter-from-class":"transform opacity-0 scale-95","enter-to-class":"transform opacity-100 scale-100","leave-active-class":"transition ease-in duration-75","leave-from-class":"transform opacity-100 scale-100","leave-to-class":"transform opacity-0 scale-95"},{default:o(()=>[w(e("div",{class:d(["absolute z-50 mt-2 rounded-md shadow-lg",[l(r),l(g)]]),style:{display:"none"},onClick:c[2]||(c[2]=x=>i.value=!1)},[e("div",{class:d(["rounded-md ring-1 ring-black ring-opacity-5",n.contentClasses])},[f(p.$slots,"content")],2)],2),[[k,i.value]])]),_:3})]))}},N={setup(n){return(s,t)=>(u(),y(l(v),{class:"block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"},{default:o(()=>[f(s.$slots,"default")]),_:3}))}},$={props:["href","active"],setup(n){const s=n,t=m(()=>s.active?"inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition  duration-150 ease-in-out":"inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out");return(r,g)=>(u(),y(l(v),{href:n.href,class:d(l(t))},{default:o(()=>[f(r.$slots,"default")]),_:3},8,["href","class"]))}},C={props:["href","active"],setup(n){const s=n,t=m(()=>s.active?"block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out":"block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out");return(r,g)=>(u(),y(l(v),{href:n.href,class:d(l(t))},{default:o(()=>[f(r.$slots,"default")]),_:3},8,["href","class"]))}},S={class:"min-h-screen bg-gray-100"},O={class:"bg-white border-b border-gray-100"},T={class:"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"},V={class:"flex justify-between h-16"},A={class:"flex"},U={class:"shrink-0 flex items-center"},q={class:"hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"},F=h(" Dashboard "),G=h(" Manage Bot "),H={class:"hidden sm:flex sm:items-center sm:ml-6"},I={class:"ml-3 relative"},J={class:"inline-flex rounded-md"},K={type:"button",class:"inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"},P=e("svg",{class:"ml-2 -mr-0.5 h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor"},[e("path",{"fill-rule":"evenodd",d:"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z","clip-rule":"evenodd"})],-1),Q=h(" Log Out "),R={class:"-mr-2 flex items-center sm:hidden"},W={class:"h-6 w-6",stroke:"currentColor",fill:"none",viewBox:"0 0 24 24"},X={class:"pt-2 pb-3 space-y-1"},Y=h(" Dashboard "),Z={class:"pt-4 pb-1 border-t border-gray-200"},ee={class:"px-4"},te={class:"font-medium text-base text-gray-800"},se={class:"font-medium text-sm text-gray-500"},oe={class:"mt-3 space-y-1"},ne=h(" Log Out "),ie={setup(n){const s=B(!1);return(t,r)=>(u(),_("div",null,[e("div",S,[e("nav",O,[e("div",T,[e("div",V,[e("div",A,[e("div",U,[a(l(v),{href:t.route("dashboard")},{default:o(()=>[a(L,{class:"block h-9 w-auto"})]),_:1},8,["href"])]),e("div",q,[a($,{href:t.route("dashboard"),active:t.route().current("dashboard")},{default:o(()=>[F]),_:1},8,["href","active"]),a($,{href:t.route("manage-bot"),active:t.route().current("manage-bot")},{default:o(()=>[G]),_:1},8,["href","active"])])]),e("div",H,[e("div",I,[a(j,{align:"right",width:"48"},{trigger:o(()=>[e("span",J,[e("button",K,[h(b(t.$page.props.auth.user.name)+" ",1),P])])]),content:o(()=>[a(N,{href:t.route("logout"),method:"post",as:"button"},{default:o(()=>[Q]),_:1},8,["href"])]),_:1})])]),e("div",R,[e("button",{onClick:r[0]||(r[0]=g=>s.value=!s.value),class:"inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"},[(u(),_("svg",W,[e("path",{class:d({hidden:s.value,"inline-flex":!s.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M4 6h16M4 12h16M4 18h16"},null,2),e("path",{class:d({hidden:!s.value,"inline-flex":s.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M6 18L18 6M6 6l12 12"},null,2)]))])])])]),e("div",{class:d([{block:s.value,hidden:!s.value},"sm:hidden"])},[e("div",X,[a(C,{href:t.route("dashboard"),active:t.route().current("dashboard")},{default:o(()=>[Y]),_:1},8,["href","active"])]),e("div",Z,[e("div",ee,[e("div",te,b(t.$page.props.auth.user.name),1),e("div",se,b(t.$page.props.auth.user.email),1)]),e("div",oe,[a(C,{href:t.route("logout"),method:"post",as:"button"},{default:o(()=>[ne]),_:1},8,["href"])])])],2)]),e("main",null,[f(t.$slots,"default")])])]))}};export{ie as _};
