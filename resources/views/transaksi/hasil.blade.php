<style>
body {
  background: #007bff;
  background: linear-gradient(to right, #0062E6, #33AEFF);
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
<div class="container px-5 my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card border-0 rounded-3 shadow-lg">
        <div class="card-body p-4">
          <div class="text-center">
            <div class="h1 fw-light">HASIL DIAGNOSA</div>
            <p class="mb-4 text-muted">Sistem Pakar Diagnosa Apotek Sukalarang Sukabumi</p>
          </div>
          <form id="contactForm" data-sb-form-api-token="API_TOKEN">

            <div class="form-floating mb-3">
              <textarea class="form-control" readonly><?php echo "$penyakit"; ?></textarea>
              <label for="name">Penyakit</label>
            </div>

            <div class="form-floating mb-3">
            <textarea class="form-control" style="height: 10rem" readonly><?php echo "$info"; ?></textarea>
              <label for="emailAddress">Info Penyakit</label>
            </div>

            <div class="form-floating mb-3">
            <textarea class="form-control" style="height: 10rem" readonly><?php echo "$solusi"; ?> </textarea>
              <label for="message">Solusi</label>
            </div>

            <div class="d-grid">
              <a class="btn btn-primary btn-lg" href="{{ url('transaksi/diagnosa') }}">Kembali</a>
            </div>

          </form>
          <!-- End of contact form -->
        </div>
      </div>
    </div>
  </div>
</div>

<!-- CDN Link to SB Forms Scripts -->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
