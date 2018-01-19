<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Tumblr OAuth in PHP</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <style type="text/css">
      img {border-width: 0}
      * {font-family:'Lucida Grande', sans-serif;}
    </style>
  </head>
  <body>
    <div>
      <h2>Welcome to a Tumblr OAuth PHP example.</h2>

      <p>This site is a basic showcase of Tumblrs OAuth authentication method. If you are having issues try <a href='./clearsessions.php'>clearing your session</a>.</p>

      <p>
        Links:
        <a href='http://github.com/nquinlan/Tumblr-OAuth'>Source Code</a> &amp;
        <a href='http://github.com/nquinlan/Tumblr-OAuth/blob/master/DOCUMENTATION'>Documentation</a> |
        Contact <a href='http://twitter.com/n_quinlan'>@n_quinlan</a>
      </p>
      <hr />
      <?php if (isset($menu)) { ?>
        <?php echo $menu; ?>
      <?php } ?>
    </div>
    <?php if (isset($status_text)) { ?>
      <?php echo '<h3>'.$status_text.'</h3>'; ?>
    <?php } ?>
    <p>
      <pre>
        <?php print_r($content); ?>
      </pre>
    </p>

  </body>
</html>
