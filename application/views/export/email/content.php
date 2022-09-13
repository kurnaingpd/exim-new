<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>
    <main role="main" class="container">
        <p>
            Kepada Yth,<br>
            Bapak dan Ibu<br>
            Di tempat
        </p>

        <p class="mt-5 d-inline-flex">
            Dengan Hormat,<br>
            <div style="margin-bottom: 10px;">Berikut disampaikan bahwa terdapat update progress report PI dengan nomor : <?=$header->pi_no?> update di aktifitas Signed PI dengan progress PI <?=$header->progress?>%., yaitu :</div>
            <?php foreach($detail as $rows) : ?>
                <div style="margin-bottom: 10px;">- [<?=$rows->item?>] pada <?=$rows->updated_at?> oleh user <?=$rows->fullname?></div>
            <?php endforeach; ?>
            <div style="margin-bottom: 10px;">Demikian disampaikan, untuk informasi lebih lanjut bisa dicheck di menu Signed PI aplikasi G-EXIM.</div>
        </p>
    </main>

    <footer class="footer">
        <div class="container">
            <span class="text-muted">
                Salam,<br>G-EXIM
            </span>
            <div class="border-bottom border-dark mt-3"></div>
        </div>
    </footer>
  </body>
</html>