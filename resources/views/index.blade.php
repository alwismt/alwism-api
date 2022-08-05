<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>AlwisM - API Dcoumentation</title>
    <link rel="stylesheet" type="text/css" href="{{asset('api/swagger-ui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('api/index.css')}}" />
    <link rel="icon" type="image/x-icon" href="https://cdn.alwism.com/sv3/images/logo/favicon.ico">
    <style>
        .float-right {
            display: none !important;
        }
        .topbar-wrapper .link {
            /* display: none !important; */
            content:url(https://cdn.alwism.com/sv3/images/logo/uBx5uO8AOOp1rNNndClDkoGLdYc06SesrIwG4RNq.png);
            width: 120px !important;
            max-width: 120px !important;
        }
    </style>
  </head>

  <body>
    <div id="swagger-ui"></div>
    <script src="{{asset('api/swagger-ui-bundle.js')}}" charset="UTF-8"> </script>
    <script src="{{asset('api/swagger-ui-standalone-preset.js')}}" charset="UTF-8"> </script>
    <script src="{{asset('api/swagger-initializer.js')}}" charset="UTF-8"> </script>
  </body>
</html>
