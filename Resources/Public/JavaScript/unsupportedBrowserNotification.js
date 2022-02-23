/*!
 * Unsupported Browser Notification v1.0.0-alpha.2
 */

!function(){"use strict";function t(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}function e(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}function n(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(t);e&&(i=i.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,i)}return n}function i(t){for(var i=1;i<arguments.length;i++){var o=null!=arguments[i]?arguments[i]:{};i%2?n(Object(o),!0).forEach((function(n){e(t,n,o[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(o)):n(Object(o)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(o,e))}))}return t}var o=function(){function e(t){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,e),this.defaultTranslations={de:{title:"Leider ist Ihr Browser veraltet.",description:"Wir empfehlen Ihnen eine neuere Version oder einen alternativen Browser zu verwenden, um die volle Funktionalität unserer Seite zu erhalten."},en:{title:"Unfortunately, your browser is out of date.",description:"We recommend that you use a newer version or an alternative browser to get the full functionality of our site."}},this.defaultOptions={title:"",description:"",injectCss:!0,injectHtml:!0,cssPrefix:"ubn",lang:"auto",translations:{},backdropOpacity:"0.5",backdropColor:"#000000",closeColor:"#ffffff",cookie:"ubn-hidden",showNotification:["ie","edge"]},this.options=i(i({},this.defaultOptions),t),this.cssPrefix=this.options.cssPrefix}var n,o,s;return n=e,(o=[{key:"init",value:function(){this.defaultOptions.injectCss&&this.injectCSS(),this.defaultOptions.injectHtml&&this.injectHTML(),this.listeners(),this.show()}},{key:"detectLanguage",value:function(){var t=document.getElementsByTagName("html")[0],e=t.getAttribute("lang")||t.getAttribute("xml:lang"),n=this.options.lang;return"auto"===this.options.lang&&e?n=e.substring(0,2):"auto"===this.options.lang&&(console.warn("The language could not be automatically detected. Please use the option 'lang' to set it manually. The fallback goes automatically to 'en' for english."),n="en"),n}},{key:"detectBrowser",value:function(){var t=window.navigator.userAgent.toLowerCase();switch(!0){case t.indexOf("edge")>-1:return"edge";case t.indexOf("edg/")>-1:return"edge-chromium";case t.indexOf("opr")>-1&&!!window.opr:return"opera";case t.indexOf("chrome")>-1&&!!window.chrome:return"chrome";case t.indexOf("trident")>-1:return"ie";case t.indexOf("firefox")>-1:return"firefox";case t.indexOf("safari")>-1:return"safari";default:return"other"}}},{key:"isUnsupported",value:function(){return t=this.detectBrowser(),this.options.showNotification.indexOf(t)>-1;var t}},{key:"text",value:function(){var t=this.detectLanguage(),e="",n="",o=i(i({},this.defaultTranslations),this.options.translations)[t];return this.options.title&&this.options.title.length>0&&(e=this.options.title),this.options.description&&this.options.title.description>0&&(n=this.options.description),!e&&!e.length>0&&o.title&&(e=o.title),!n&&!n.length>0&&o.description&&(n=o.description),{title:e,description:n}}},{key:"injectCSS",value:function(){this.options.cssPrefix;var t="\n            .".concat(this.cssPrefix," {\n                position: fixed;\n                z-index: 100000;\n                top: 0px;\n                left: 0px;\n                right: 0px;\n                bottom: 0px;\n            }\n            \n            .").concat(this.cssPrefix,"--is-hidden {\n                display: none !important;\n            }\n            \n            .").concat(this.cssPrefix,"__backdrop {\n                position: fixed;\n                top: 0px;\n                left: 0px;\n                right: 0px;\n                bottom: 0px;\n                background-color: ").concat(this.options.backdropColor,";\n                opacity: ").concat(this.options.backdropOpacity,";\n            }\n            \n            .").concat(this.cssPrefix,"__modal {\n                position: absolute;\n                z-index: 5;\n                -webkit-transform: translateX(-50%) translateY(-50%);\n                    -ms-transform: translateX(-50%) translateY(-50%);\n                        transform: translateX(-50%) translateY(-50%);\n                top: 50%;\n                left: 50%;\n                max-width: 700px;\n                width: 100%;\n                padding: 0 45px;\n            }\n            \n            .").concat(this.cssPrefix,"__dialog {\n                background-color: #ffffff;\n                padding: 30px;\n            }\n            \n            .").concat(this.cssPrefix,"__header {\n                margin-bottom: 15px;\n            }\n            \n            .").concat(this.cssPrefix,"__title {\n                font-size: 24px;\n                font-weight: bold;\n                margin: 0;\n            }\n            \n            .").concat(this.cssPrefix,"__description {\n                margin: 0;\n            }\n            \n            .").concat(this.cssPrefix,"__close-button {\n                position: absolute;\n                top: 30px;\n                right: 30px;\n                width: 24px;\n                height: 24px;\n                background-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 48 48'%3E%3Cpath fill='%23").concat(this.options.closeColor.replace("#",""),"' d='M27.6,24L46.3,5.3c1-1,1-2.6,0-3.6c-1-1-2.6-1-3.6,0L24,20.4L5.3,1.7c-1-1-2.6-1-3.6,0s-1,2.6,0,3.6L20.4,24 L1.7,42.7c-1,1-1,2.6,0,3.6C2.3,46.8,2.9,47,3.5,47s1.3-0.3,1.8-0.7L24,27.6l18.7,18.7c0.5,0.5,1.1,0.7,1.8,0.7s1.3-0.3,1.8-0.7 c1-1,1-2.6,0-3.6L27.6,24z'/%3E%3C/svg%3E%0A\");\n                cursor: pointer;\n            }        \n        "),e=document.createElement("style");e.textContent=t,document.body.appendChild(e)}},{key:"injectHTML",value:function(){var t=this.options.cssPrefix,e='\n            <div class="'.concat(t," ").concat(t,'--is-hidden">\n                <div class="').concat(t,'__modal">\n                    <div class="').concat(t,'__dialog">\n                        <div class="').concat(t,'__header">\n                            <h5 class="').concat(t,'__title">').concat(this.text().title,'</h5>\n                        </div>\n                        <div class="').concat(t,'__body">\n                            <p class="').concat(t,'__description">').concat(this.text().description,'</p>\n                        </div>\n                    </div>\n                </div>\n            \n                <div class="').concat(t,'__backdrop"></div>\n                <div class="').concat(t,'__close-button" type="button"></div>\n            </div>\n        ');document.body.insertAdjacentHTML("beforeend",e)}},{key:"listeners",value:function(){var t=this;document.querySelector(".".concat(this.cssPrefix,"__close-button")).addEventListener("click",(function(){t.hide()}))}},{key:"hide",value:function(){var t,e,n,i;document.querySelector(".".concat(this.cssPrefix)).classList.add("".concat(this.cssPrefix,"--is-hidden")),t=this.options.cookie,e="1",n=1,(i=new Date).setTime(i.getTime()+864e5*n),document.cookie="".concat(t,"=").concat(e,";path=/;expires=").concat(i.toGMTString())}},{key:"show",value:function(){var t,e,n=(t=this.options.cookie,(e=document.cookie.match("(^|;) ?"+t+"=([^;]*)(;|$)"))?e[2]:null),i=document.querySelector(".".concat(this.cssPrefix));this.isUnsupported()&&"1"!==n&&i.classList.remove("".concat(this.cssPrefix,"--is-hidden"))}}])&&t(n.prototype,o),s&&t(n,s),e}();document.addEventListener("DOMContentLoaded",(function(t){var e={};window.ubnOptions&&(e=window.ubnOptions),new o(e).init()}))}();
