<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>HRIS CRUD using Codeignite 4</title>
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
  <body >
    <div class="page">
      <!-- Navbar -->
      <?= $this->include('layouts/components/navbar') ?>
      
      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  <?= $this->renderSection('title_page') ?>
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                 <?= $this->renderSection('add_action') ?>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <!-- content -->
              <?= $this->renderSection('content') ?>
            </div>
          </div>
        </div>
        <!-- Footer -->
        <?= $this->include('layouts/components/footer') ?>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('assets/js/tabler.min.js?1684106062') ?>" defer></script>
  </body>
</html>