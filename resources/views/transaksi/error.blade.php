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
              <textarea class="form-control" readonly>Belum Diketahui</textarea>
              <label for="name">Penyakit</label>
            </div>

            <div class="form-floating mb-3">
            <textarea class="form-control" style="height: 10rem" readonly>Tidak ditemukan info terkait gejala-gejala yang anda masukkan, Karena keterbatasan data kami.</textarea>
              <label for="emailAddress">Info Penyakit</label>
            </div>

            <div class="form-floating mb-3">
            <textarea class="form-control" style="height: 10rem" readonly>Harap lakukan pemerikasaan lebih lanjut melalui dokter..!!</textarea>
              <label for="message">Solusi</label>
            </div>

            <div class="d-grid">
              <a class="btn btn-primary btn-lg" href="{{ url('transaksi/diagnosa') }}">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- CDN Link to SB Forms Scripts -->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
function myFunction() {
    window.print();
}
</script>
<div style="text-align: center;">
<h1>HASIL DIAGNOSA</h1><br>
<div class="container">
  <button style="float:right;" class="btn btn-success" onclick="myFunction()">CETAK</button>
</div>
</div>
<div class="container col-6">
  <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text"><h5>PENYAKIT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5></span>
    </div>
    <textarea class="form-control" style="color:red;" rows="1"  readonly>Belum Diketahui</textarea>
  </div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text"><h5>INFO PENYAKIT&nbsp;&nbsp;&nbsp;</h5></span>
  </div>
  <textarea class="form-control" style="color:red;" rows="6" readonly>
    Tidak ditemukan info terkait gejala-gejala yang anda masukkan, Karena keterbatasan data kami.
  </textarea>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
      <span class="input-group-text"><h5>SOLUSI PENYAKIT</h5></span>
  </div>
  <textarea class="form-control" style="color:red;" rows="6"  readonly>
    Harap lakukan pemerikasaan lebih lanjut melalui dokter..!!
  </textarea>
</div>
</div><br>