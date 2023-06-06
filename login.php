<!DOCTYPE html>
<html lang="en" class=" -webkit-"><head>

  <meta charset="UTF-8">
  
<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
<meta name="apple-mobile-web-app-title" content="CodePen">

<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">

<link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111">


  <title>Help Dex - Inicio de sesion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style media="" data-href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">button,hr,input{overflow:visible}audio,canvas,progress,video{display:inline-block}progress,sub,sup{vertical-align:baseline}html{font-family:sans-serif;line-height:1.15;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0} menu,article,aside,details,footer,header,nav,section{display:block}h1{font-size:2em;margin:.67em 0}figcaption,figure,main{display:block}figure{margin:1em 40px}hr{box-sizing:content-box;height:0}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}a{background-color:transparent;-webkit-text-decoration-skip:objects}a:active,a:hover{outline-width:0}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}b,strong{font-weight:bolder}dfn{font-style:italic}mark{background-color:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}audio:not([controls]){display:none;height:0}img{border-style:none}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{font-family:sans-serif;font-size:100%;line-height:1.15;margin:0}button,input{}button,select{text-transform:none}[type=submit], [type=reset],button,html [type=button]{-webkit-appearance:button}[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0}[type=button]:-moz-focusring,[type=reset]:-moz-focusring,[type=submit]:-moz-focusring,button:-moz-focusring{outline:ButtonText dotted 1px}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}legend{box-sizing:border-box;color:inherit;display:table;max-width:100%;padding:0;white-space:normal}progress{}textarea{overflow:auto}[type=checkbox],[type=radio]{box-sizing:border-box;padding:0}[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}[type=search]::-webkit-search-cancel-button,[type=search]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}[hidden],template{display:none}/*# sourceMappingURL=normalize.min.css.map */</style>

  
  
<style>
*, *:before, *:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  color: #999;
  padding: 20px;
  display: flex;
  min-height: 100vh;
  align-items: center;
  font-family: "Raleway";
  justify-content: center;
  background-color: #fbfbfb;
}

#mainButton {
  color: white;
  border: none;
  outline: none;
  font-size: 24px;
  font-weight: 200;
  overflow: hidden;
  position: relative;
  border-radius: 5px;
  letter-spacing: 2px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  text-transform: uppercase;
  background-color: #00a7ee;
  -webkit-transition: all 0.2s ease-in;
  -moz-transition: all 0.2s ease-in;
  -ms-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
}
#mainButton .btn-text {
  z-index: 2;
  display: block;
  padding: 10px 20px;
  position: relative;
}
#mainButton .btn-text:hover {
  cursor: pointer;
}
#mainButton:after {
  top: -50%;
  z-index: 1;
  content: "";
  width: 150%;
  height: 200%;
  position: absolute;
  left: calc(-150% - 40px);
  background-color: rgba(255, 255, 255, 0.2);
  -webkit-transform: skewX(-40deg);
  -moz-transform: skewX(-40deg);
  -ms-transform: skewX(-40deg);
  -o-transform: skewX(-40deg);
  transform: skewX(-40deg);
  -webkit-transition: all 0.2s ease-out;
  -moz-transition: all 0.2s ease-out;
  -ms-transition: all 0.2s ease-out;
  -o-transition: all 0.2s ease-out;
  transition: all 0.2s ease-out;
}
#mainButton:hover {
  cursor: default;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
}
#mainButton:hover:after {
  -webkit-transform: translateX(100%) skewX(-30deg);
  -moz-transform: translateX(100%) skewX(-30deg);
  -ms-transform: translateX(100%) skewX(-30deg);
  -o-transform: translateX(100%) skewX(-30deg);
  transform: translateX(100%) skewX(-30deg);
}
#mainButton.active {
  box-shadow: 0 19px 38px rgba(0, 0, 0, 0.3), 0 15px 12px rgba(0, 0, 0, 0.22);
}
#mainButton.active .modal {
  -webkit-transform: scale(1, 1);
  -moz-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
  transform: scale(1, 1);
}
#mainButton .modal {
  top: 0;
  left: 0;
  z-index: 3;
  width: 100%;
  height: 100%;
  padding: 20px;
  display: flex;
  position: fixed;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: inherit;
  transform-origin: center center;
  background-image: linear-gradient(to top left, #00a7ee 10%, #55ccff 65%, white 200%);
  -webkit-transform: scale(0.000001, 0.00001);
  -moz-transform: scale(0.000001, 0.00001);
  -ms-transform: scale(0.000001, 0.00001);
  -o-transform: scale(0.000001, 0.00001);
  transform: scale(0.000001, 0.00001);
  -webkit-transition: all 0.2s ease-in;
  -moz-transition: all 0.2s ease-in;
  -ms-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
}

.close-button {
  top: 20px;
  right: 20px;
  position: absolute;
  -webkit-transition: opacity 0.2s ease-in;
  -moz-transition: opacity 0.2s ease-in;
  -ms-transition: opacity 0.2s ease-in;
  -o-transition: opacity 0.2s ease-in;
  transition: opacity 0.2s ease-in;
}
.close-button:hover {
  opacity: 0.5;
  cursor: pointer;
}

.form-title {
  margin-bottom: 15px;
}

.form-button {
  width: 100%;
  padding: 10px;
  color: #00a7ee;
  margin-top: 10px;
  max-width: 400px;
  text-align: center;
  border: solid 1px white;
  background-color: white;
  -webkit-transition: color 0.2s ease-in, background-color 0.2s ease-in;
  -moz-transition: color 0.2s ease-in, background-color 0.2s ease-in;
  -ms-transition: color 0.2s ease-in, background-color 0.2s ease-in;
  -o-transition: color 0.2s ease-in, background-color 0.2s ease-in;
  transition: color 0.2s ease-in, background-color 0.2s ease-in;
}
.form-button:hover {
  color: white;
  cursor: pointer;
  background-color: transparent;
}

.input-group {
  width: 100%;
  font-size: 16px;
  max-width: 400px;
  padding-top: 20px;
  position: relative;
  margin-bottom: 15px;
}
.input-group input {
  width: 100%;
  color: white;
  border: none;
  outline: none;
  padding: 5px 0;
  line-height: 1;
  font-size: 16px;
  font-family: "Raleway";
  border-bottom: solid 1px white;
  background-color: transparent;
  -webkit-transition: box-shadow 0.2s ease-in;
  -moz-transition: box-shadow 0.2s ease-in;
  -ms-transition: box-shadow 0.2s ease-in;
  -o-transition: box-shadow 0.2s ease-in;
  transition: box-shadow 0.2s ease-in;
}
.input-group input + label {
  left: 0;
  top: 20px;
  position: absolute;
  pointer-events: none;
  -webkit-transition: all 0.2s ease-in;
  -moz-transition: all 0.2s ease-in;
  -ms-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
}
.input-group input:focus {
  box-shadow: 0 1px 0 0 white;
}
.input-group input:focus + label, .input-group input.active + label {
  font-size: 12px;
  -webkit-transform: translateY(-20px);
  -moz-transform: translateY(-20px);
  -ms-transform: translateY(-20px);
  -o-transform: translateY(-20px);
  transform: translateY(-20px);
}

.codepen-by {
  left: 0;
  bottom: 0;
  width: 100%;
  padding: 10px;
  font-size: 16px;
  position: absolute;
  text-align: center;
  text-transform: none;
  letter-spacing: initial;
}
</style>

  <script>
  window.console = window.console || function(t) {};
</script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>

<body translate="no">



  <style media="" data-href="https://fonts.googleapis.com/css?family=Raleway:400,500,300">/* cyrillic-ext */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCAIT5lu.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}

/* cyrillic */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCkIT5lu.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCIIT5lu.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCMIT5lu.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyC0ITw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCAIT5lu.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCkIT5lu.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCIIT5lu.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCMIT5lu.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyC0ITw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 500;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCAIT5lu.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 500;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCkIT5lu.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 500;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCIIT5lu.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 500;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyCMIT5lu.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 500;
  src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptug8zYS_SKggPNyC0ITw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
</style>
<div id="mainButton" class="">
    <div class="btn-text" onclick="openForm()">Iniciar sesion</div>
    <div class="modal">
        <div class="close-button" onclick="closeForm()">x</div>
        <div class="form-title">Inicia sesion</div>
        <div class="input-group">
            <input type="text" id="usuario" onblur="checkInput(this)">
            <label for="name">Usuario</label>
        </div>
        <div class="input-group">
            <input type="password" id="contrasena" onblur="checkInput(this)">
            <label for="password">Contraseña</label>
        </div>
        <div class="form-button" onclick="login()">Iniciar</div>
        <div class="codepen-by">By Fernando Diaz</div>
    </div>
</div>
<div class="codepen-by">By Fernando Diaz</div>

<script type="text/javascript">
    function login(){
      
            var usuario = document.getElementById("usuario").value;
            var contrasena = document.getElementById("contrasena").value;
            jQuery.ajax({ //
                type: "POST",
                url: "data/login.php",
                data: {contrasena:contrasena,usuario:usuario},
                success: function(response)
                {
                        if (response == 0) // usuario no existe
                        {
                        alert('El usuario no existe.');
                        }
                        else if (response == 1) // acceso consedido
                        {
                            window.location.replace("index.php");
                        }
                        else if (response == 2) // contrasena incorrecta
                        {
                        alert('contraseña incorrecta.');
                        }
                }
            });
        };
</script>
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>

<script id="rendered-js">
var button = document.getElementById('mainButton');

var openForm = function () {
  button.className = 'active';
};

var checkInput = function (input) {
  if (input.value.length > 0) {
    input.className = 'active';
  } else {
    input.className = '';
  }
};

var closeForm = function () {
  button.className = '';
};

$('#contrasena').keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    login();
                }
            });
//# sourceURL=pen.js
</script>

 



</body></html>