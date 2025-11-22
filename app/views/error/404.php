<?php 
	http_response_code(404);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404</title>
    <link rel="stylesheet" href="/mazer/css/main/app.css" />
    <link rel="stylesheet" href="/mazer/css/pages/error.css" />
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <link
      rel="shortcut icon"
      href="/mazer/images/logo/favicon.svg"
      type="image/x-icon"
    />
    <link
      rel="shortcut icon"
      href="/mazer/images/logo/favicon.png"
      type="image/png"
    />
  </head>

  <body style="font-family: 'Nunito', sans-serif; " data-theme="light">
    <div id="error">
      <div class="error-page container">
        <div class="col-md-8 col-12 offset-md-2">
          <div class="text-center">
            <img
              class="img-error"
              src="/mazer/images/samples/error-404.svg"
              alt="Not Found"
            />
            <h1 class="error-title">NOT FOUND</h1>
            <p class="fs-5 text-gray-600">
			404 Halaman tidak ditemukan, silahkan kembali ke.
            </p>
            <a href="/login" class="btn btn-lg btn-outline-primary mt-3"
              >Dashboard</a
            >
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
