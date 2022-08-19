<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            <div style="margin-bottom: 10px;">Berikut disampaikan bahwa terdapat update progress report PI dengan nomor : <?=$pi_no?> Update di aktifitas Signed PI, yaitu :</div>
            <div style="margin-bottom: 10px;">- [<?=$pi_type?>] pada <?=$pi_create_at?> oleh user <?=$pi_execute_by?><br>Progress PI <?=$pi_progress?>%</div>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>