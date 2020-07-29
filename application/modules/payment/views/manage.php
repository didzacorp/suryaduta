<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Surya Duta Member</title>
  </head>

  <body class="sidebar-fixed">
<div class="container" style="
    text-align: center;
    font-family: monospace;
    font-size: 16px;
">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card header_card">
                <div class="card-body">
                    <h4 class="heading text-center">Dapatkan Diskon Sebesar 50% Untuk Menjadi Anggota Surya Duta dari Investasi Normal : Rp <del >1.000.000</del> Menjadi Hanya : </h4>
                    <h3 class="heading text-center">Rp <?= number_format($transaksi['sub_total']); ?></h3>
                    <h4 class="heading text-center">(Tanpa Ada Biaya Bulanan + Bonus Produk Rp 585.000).</h4></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card_rounded">
                <div class="card-body text-center">
                    <h4 >Silahkan Transfer Dengan Nominal</h4>
                    <h3 >Rp. <?= number_format($transaksi['sub_total']+$transaksi['kode_unik']); ?></h3>
                    <h5 ><strong >Masukkan nominal sesuai sampai dengan 3 digit terakhir, bila berbeda akan menghambat proses konfirmasi.</strong></h5>
                    <p class="card-text">note : kami menambahkan nominal sebesar <strong ><?= $transaksi['kode_unik']; ?></strong> untuk memudahkan proses konfirmasi transaksi.</p>
                    <h5 >Ke Salah Satu Rekening Dibawah ini :</h5>
                    <div class="bank-box">
                        <div class="p-2 icon-bank"><img src="https://upload.wikimedia.org/wikipedia/id/thumb/e/e0/BCA_logo.svg/472px-BCA_logo.svg.png" style="    width: 150px;"></div>
                        <h4 ><strong >6041678787</strong></h4>
                        <h5 >Cabang Alam Sutera</h5>
                        <h5 >Atas Nama PT. Sinergi Rezeki Ananta</h5></div>
                    <div class="option-divider-bordered">
                        <div class="row justify-content-center overlap-row">
                            <div class="pills-heading"><strong >ATAU</strong></div>
                        </div>
                    </div>
                    <div class="bank-box">
                        <div class="p-2 icon-bank"><img src="https://upload.wikimedia.org/wikipedia/id/thumb/f/fa/Bank_Mandiri_logo.svg/1280px-Bank_Mandiri_logo.svg.png" style="    width: 150px;"></div>
                        <h4 ><strong >1640016787873</strong></h4>
                        <h5 >Cabang Tangerang BFI Tower</h5>
                        <h5 >Atas Nama PT. Sinergi Rezeki Ananta</h5></div>
                    <div class="option-divider-bordered">
                        <div class="row justify-content-center overlap-row">
                            <div class="pills-heading"><strong >ATAU</strong></div>
                        </div>
                    </div>
                    <div class="bank-box">
                        <div class="p-2 icon-bank"><img src="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_BRI.png" style="    width: 150px;"></div>
                        <h4 ><strong >050901001197307</strong></h4>
                        <h5 >Cabang BSD Menara BRI</h5>
                        <h5 >Atas Nama PT. Sinergi Rezeki Ananta</h5></div>
                    <h5 style="color:blue">*MOHON DIPERHATIKAN : Jika Anda melakukan transfer dari rekening bank selain 3 bank di atas, kami sarankan Anda transfernya ke akun Bank BCA kami, untuk proses verifikasi yang lebih cepat. Terima kasih.</h5>
                    <br >
                    <p class="card-text">Transaksi ini bersifat <strong >non refundable / tidak bisa dikembalikan</strong> dan Setelah Anda melakukan transaksi ini maka Anda telah setuju dengan semua ketentuan yang berlaku.</p>
                </div>
            </div>
    </div>
</div>
</div>
</body>
</html>