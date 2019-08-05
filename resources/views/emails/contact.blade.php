<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>Email Template</title>
          <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
          <style type="text/css">
               *{margin:0;padding:0;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}
               body{font-family: 'Open Sans', sans-serif;background: #ECF0F1;}
               table{width: 100%;}
               .heading{background-color: rgb(255, 255, 255);border-top: 3px solid #1169b4;color: #fff;padding: 20px 0;text-align: center;margin-bottom: 5px;}
               .heading h1{font-size: 22px;}
               .container {display:block!important;margin:0 auto!important;clear:both!important;}
               .body-wrap .container{background-color: #ccc;box-shadow: 0 0 0 1px rgba(0,0,0,0.06);padding: 15px;}
               .body-wrap h3{font-size: 15px;font-weight: 600;margin-bottom: 10px;}
               .body-wrap p{font-size: 13px;margin-bottom: 8px;line-height: 22px;}
               .body-wrap ul{list-style: none;text-align: center;}
               .body-wrap ul li{display: inline-block;margin: 15px 5px 0 5px;}
               .body-wrap ul li a{font-size: 13px;color: #777;text-decoration: none;}
               .body-wrap ul li a:hover{color: #333;}
               .effect6{position:relative;-webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;-moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;}
               .effect6:before, .effect6:after{content:"";position:absolute; z-index:-1;-webkit-box-shadow:0 0 20px rgba(0,0,0,0.8);-moz-box-shadow:0 0 20px rgba(0,0,0,0.8);box-shadow:0 0 20px rgba(0,0,0,0.8);top:50%;bottom:0;left:10px;right:10px;-moz-border-radius:100px / 10px;border-radius:100px / 10px;} 
               .effect6:after{right:10px; left:auto;-webkit-transform:skew(8deg) rotate(3deg);-moz-transform:skew(8deg) rotate(3deg);-ms-transform:skew(8deg) rotate(3deg);-o-transform:skew(8deg) rotate(3deg); transform:skew(8deg) rotate(3deg);}
               @media only screen and (max-width: 600px) {
                    .container{width:auto;}
               }
          </style>
     </head>
     <body>
          <table class="heading effect6">
               <tr>
                    <td class="container">
                         <table>
                              <tr>
                                   <td>
                                        <h1><img src="{{Url('/')}}/front/img/logo.png"><br></h1>
                                   </td>
                              </tr>
                         </table>
                    </td>
               </tr>
          </table>
          <table class="body-wrap">
               <tr>
                    <td class="container">
                         <table>
                              <tr>
                                   <td>
                                    <p> New Message </p>
                                    <p> Name Site  : {!! $namesite !!}   </p>
                                    <p> Title      : {!! $subject  !!} </p>
                                    <p> Message    : {!! $desc_message  !!} </p>
                                        <ul> 
                                             <li><a href="{{Url('/')}}"><h3>الذهاب الي  الموقع</h3></a></li>
                                        </ul>     
                                   </td>
                              </tr>
                         </table>                                
                    </td>
               </tr>
          </table>
     </body>

</html>