<?php
//获取QQ头像
function male()
{
    $qq = '10001';//男QQ
    $geturl = 'http://ptlogin2.qq.com/getface?&imgtype=1&uin=' . $qq;
    $qquser = file_get_contents($geturl);
    preg_match('/&k=.*&s=/', $qquser, $matches);
    $k = $matches[0];
    $qqimg = 'https://q1.qlogo.cn/g?b=qq&k=' . $k . '&s=100';
    echo $qqimg;
}
function female()
{
    $qq = '10002';//女QQ
    $geturl = 'http://ptlogin2.qq.com/getface?&imgtype=1&uin=' . $qq;
    $qquser = file_get_contents($geturl);
    preg_match('/&k=.*&s=/', $qquser, $matches);
    $k = $matches[0];
    $qqimg = 'https://q1.qlogo.cn/g?b=qq&k=' . $k . '&s=100';
    echo $qqimg;
}
//随机感谢语
function txt()
{
    $filename = 'love.txt';        
    $data = file_get_contents($filename);
    $data = explode(PHP_EOL, $data);
    $result = $data[array_rand($data)];
    $result = str_replace(array("\r","\n","\r\n"), '', $result);
    echo $result; 
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>LOVE</title>
    <link
      type="image/vnd.microsoft.icon"
      href="favicon.ico"
      rel="shortcut icon"
    />
    <meta name="Description" content="爱情小屋" />
    <link rel="stylesheet" href="app.css" type="text/css" />
    <script src='//unpkg.com/valine/dist/Valine.min.js'></script>
  </head>
  <body>
    <div class="male Fade_In">
      <img alt="avatar" src="<?php male(); ?>" class="male_img" />
    </div>

    <div class="content">
      <div class="clock Fade_In">
        <p>我们相恋了</p>
        <p id="love_clock"></p>
      </div>
      <div class="blessing Fade_In" id="blessing">祝福:D</div>
      <div class="message Fade_In" id="message">留言</div>
    </div>

    <div class="female Fade_In">
      <img alt="avatar" src="<?php female(); ?>" class="female_img" />
    </div>

    <audio
      id="audio"
      src="music.m4a"
      controls="controls"
      autoplay
      loop="true"
      hidden="true"
    ></audio>

    <div id="loading">
      <div id="loading-center">
        <div class="chest">
          <div class="heart left sided top"></div>
          <div class="heart center"></div>
          <div class="heart right sided"></div>
        </div>
      </div>
    </div>
  
    <div id="message_content">
      <div id="vcomments"></div>
        </div> 
        <div id="message_black"></div>

    <script src="jquery.min.js"></script>
    <script src="app.js"></script>
  
    <script>
    //祝福按钮
     $('body').on('click', '.blessing', function() {
	    $.message("<?php txt(); ?>");
     });
    </script>

  </body>
</html>
