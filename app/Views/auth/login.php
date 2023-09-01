<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Login to App.</title>
    <!-- CSS files -->
    <link href="<?= base_url('assets/css/tabler.min.css?1684106062') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/tabler-flags.min.css?1684106062') ?>" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column">
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark">
            CRUD App using Codeigniter 4</a>
        </div>
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">Login using your account</h2>
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger">
                    <?= session('error') ?>
                </div>
            <?php endif; ?>
            <form action="<?= site_url('login') ?>" method="post">
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="demo" name="username">
              </div>
              <div class="mb-2">
                <label class="form-label">
                  Password
                </label>
                <div class="input-group input-group-flat">
                  <input type="password" class="form-control"  placeholder="qweasdzxc" name="password">
                  <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                    </a>
                  </span>
                </div>
              </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Login</button>
              </div>
            </form>
          </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('assets/js/tabler.min.js?1684106062') ?>" defer></script>
  </body>
</html>