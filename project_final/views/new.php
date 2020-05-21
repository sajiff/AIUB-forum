<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <style>
      body{
        background-color: black;
      }
      .navStyle{
        position: fixed;
        top:0;
        width:100%;
        height: 60px;
        background-color: #FFF;
        display: flex;
        flex-wrap: wrap;
        z-index: 1000;
      }
      .navStyle ul{
        display: flex;
        flex-wrap: wrap;
        padding-left: 15px;

      }
      .navStyle ul li{
        list-style: none;
        line-height: 35px;
      }
      .navStyle ul li a{
        display: block;
        height: 100%;
        padding: 0 15px;
        text-transform: uppercase;
        text-decoration: none;
        color: #111;
        font-family: tahoma;
        font-size: 16px;
      }
    </style>
  </head>
  <body>
    <nav class="navStyle">
      <div class="">

      </div>
      <ul>
        <li><a href="">Home</a></li>
        <li><a href="">Profile</a></li>
        <li><a href="">Setting</a></li>
      </ul>
    </nav>
    <div></div>
  </body>
</html>
