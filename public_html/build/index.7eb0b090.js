"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[826],{4497:()=>{var t=0;function l(l){var n=$(".type-element");if("inc"==l){if(t+1>n.length-1)return;t++}else if("dec"==l){if(t-1<0)return;t--}}hljs.highlightAll(),function(){for(var t=$(".contact"),l=$(".contact > a > div"),n=function(n){$(t[n]).on("mouseover",(function(){$(l[n]).css("width","125px")})),$(t[n]).on("mouseleave",(function(){$(l[n]).css("width","0px")}))},o=0;o<t.length;o++)n(o)}(),function(){var t=document.querySelector(".scroll-content"),n=$(".home-scroll-container > img");$(n[0]).on("click",(function(){t.scrollBy({left:-190,behavior:"smooth"})})),$(n[1]).on("click",(function(){t.scrollBy({left:190,behavior:"smooth"})})),$(n[0]).on("click",(function(){l("dec")})),$(n[1]).on("click",(function(){l("inc")}))}(),function(){for(var t=$(".skill-button"),l=$(".skill-container > .skill"),n=$(".skill-container"),o=function(o){$(l[o]).attr("class","skill-no-active"),$(t[o]).on("click",(function(){$(".skill-button-active").attr("class","skill-button"),$(t[o]).attr("class","skill-button-active"),window.scrollTo({top:n.offset().top,behavior:"smooth"}),$(".skill-container > .skill").attr("class","skill-no-active"),$(l[o]).attr("class","skill")}))},c=0;c<t.length;c++)o(c);$(t[0]).attr("class","skill-button-active"),$(l[0]).attr("class","skill")}()}},t=>{var l;l=4497,t(t.s=l)}]);