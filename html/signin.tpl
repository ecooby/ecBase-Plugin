<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EnCoo - Control Panel</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
  <link rel="stylesheet" href="/ec-plugins/ec-base/html/assets/styles/bootstrap.css">
  <link rel="stylesheet" href="/ec-plugins/ec-base/html/assets/styles/font-awesome.css">
  <link rel="stylesheet" href="/ec-plugins/ec-base/html/assets/styles/main.css">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>

  <div id="result">
  </div>
  <div class="signin">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="widget">
            <div class="row">
              <h4 class="widget-title-plus">Authorization</h4>
              <div class="widget-separator"></div>
              <div class="col-md-6 col-md-offset-3">

                <div class="widget-body">
                  <div class="signin-image"></div>
                  <form method="post" id="auth_form" enctype="multipart/form-data">
                    <div class="form-alt"><input type="text" name="login" placeholder="Name"></div>
                    <div class="form-alt"><input type="password" name="password" placeholder="Password"></div>
                    <button type="submit" id="subm" class="btn btn-inverse btn-block">Sing In</button>
                  </form>
                  <div class="footer-text">&copy; 2016 - enCoo Corp. All Rights Reserved.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="/ec-plugins/ec-base/html/assets/scripts/jquery-3.1.1.js"></script>
  <script src="/ec-plugins/ec-base/html/assets/scripts/bootstrap.js"></script>
  <script src="/ec-plugins/ec-base/html/assets/scripts/hash.js"></script>
  <script src="/ec-plugins/ec-base/html/assets/scripts/main.js"></script>
</body>
</html>
