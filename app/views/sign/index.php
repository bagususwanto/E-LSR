<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sign - Line Supply Request</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo BASEURL ?>/img/favicon.png" rel="icon">
  <link href="<?php echo BASEURL ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo BASEURL ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo BASEURL ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo BASEURL ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo BASEURL ?>/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo BASEURL ?>/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo BASEURL ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo BASEURL ?>/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo BASEURL ?>/css/style.css" rel="stylesheet">


  <!-- =======================================================
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container signature-upload-container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4>Upload Tanda Tangan</h4>
            </div>
            <div class="card-body">
              <form action="<?php echo BASEURL ?>/sign/signUpload" method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                  <label for="signatureUpload" class="form-label">Pilih Tanda Tangan</label>
                  <input type="file" name="signFile" class="form-control" id="signatureUpload" accept="image/*">
                  <input type="hidden" name="signUser"
                    value="<?php echo isset($data['user']['username']) ? $data['user']['username'] : 'Guest'; ?>">
                </div>
                <div class="mb-3">
                  <label class="form-label">Pratinjau Tanda Tangan</label>
                  <div class="signature-preview" id="signaturePreview">
                    <span class="text-muted">Tidak ada pratinjau tersedia</span>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo BASEURL ?>/vendor/jquery/jquery-3.7.1.min.js"></script>
  <script src="<?php echo BASEURL ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo BASEURL ?>/vendor/toast/toast-plugin.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo BASEURL ?>/js/main.js"></script>

  <script>
    document.getElementById('signatureUpload').addEventListener('change', function (event) {
      const previewContainer = document.getElementById('signaturePreview');
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          const img = document.createElement('img');
          img.src = e.target.result;
          previewContainer.innerHTML = '';
          previewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
      } else {
        previewContainer.innerHTML = '<span class="text-muted">Tidak ada pratinjau tersedia</span>';
      }
    });

    $(document).ready(function () {
      <?php if (isset($_SESSION['message'])): ?>
        $.toast({
          title: "Pesan",
          message: "<?php echo $_SESSION['message']['content']; ?>",
          type: "<?php echo $_SESSION['message']['type']; ?>",
          duration: 8000,
        });
        <?php unset($_SESSION['message']); ?> // Hapus pesan setelah ditampilkan
      <?php endif; ?>
    });
  </script>
</body>

</html>