import{u as d,o as i,c as u,w as r,a,b as s,H as c,g as _,t as f,k as p,d as t,e as w,n as g,f as b}from"./app.7b637b04.js";import{_ as y}from"./GuestLayout.ac868dcf.js";import{_ as k,a as x,b as h}from"./TextInput.50d6fa99.js";import{_ as V}from"./PrimaryButton.f3cb684d.js";import"./ApplicationLogo.11c0777c.js";const v=t("div",{class:"mb-4 text-sm text-gray-600"}," Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one. ",-1),N={key:0,class:"mb-4 font-medium text-sm text-green-600"},$=["onSubmit"],B={class:"flex items-center justify-end mt-4"},j={__name:"ForgotPassword",props:{status:String},setup(o){const e=d({email:""}),m=()=>{e.post(route("password.email"))};return(F,l)=>(i(),u(y,null,{default:r(()=>[a(s(c),{title:"Forgot Password"}),v,o.status?(i(),_("div",N,f(o.status),1)):p("",!0),t("form",{onSubmit:b(m,["prevent"])},[t("div",null,[a(k,{for:"email",value:"Email"}),a(x,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":l[0]||(l[0]=n=>s(e).email=n),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),a(h,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),t("div",B,[a(V,{class:g({"opacity-25":s(e).processing}),disabled:s(e).processing},{default:r(()=>[w(" Email Password Reset Link ")]),_:1},8,["class","disabled"])])],40,$)]),_:1}))}};export{j as default};
