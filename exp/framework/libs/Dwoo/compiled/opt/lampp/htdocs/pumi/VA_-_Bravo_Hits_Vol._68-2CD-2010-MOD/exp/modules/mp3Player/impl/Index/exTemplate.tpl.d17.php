<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  </head>
  <body>
    <object type="application/x-shockwave-flash" width="800" height="600" data="<?php echo $this->scope["modPubUrl"];?>/xspf_player.swf?playlist_url=<?php echo $this->scope["playListUrl"];?>">
      <param name="movie" value="<?php echo $this->scope["modPubUrl"];?>/xspf_player.swf?playlist_url=<?php echo $this->scope["playListUrl"];?>" />
    </object>
  </body>
</html>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>