<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?=$title?></title>
        <?php
            if ( isset($css) ){
                foreach($css as $rows){
                    $exp = explode(",", $rows);
                    echo "<link type=\"{$exp[0]}\" rel=\"{$exp[1]}\" href=\"{$exp[2]}\" />\n";
                }
            }
        ?>
    </head>
    <body>
        <div id="container">
            <h4 class="title">SURAT PERNYATAAN PRODUK</h4>

            <div id="content" class="content">
                <div id="detail" class="content">
                    <div style="margin-bottom: 1%;">Yang bertanda tangan dibawah ini :</div>
                    <div id="header" class="clearfix-content">
                        <div id="row">
                            <div class="box-name">Nama</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['header']->name?></div>
                        </div>

                        <div id="row">
                            <div class="box-name">Jabatan</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['header']->position?></div>
                        </div>
                    </div>
                    <div style="margin-top: 1%; margin-bottom: 1%;">Menyatakan bahwa produk sebagai berikut :</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="3">PRODUK LOKAL</th>
                                <th colspan="2">PRODUK ESKPOR</th>
                            </tr>
                            <tr>
                                <th>Nama Dagang</th>
                                <th>Nama Jenis</th>
                                <th>No. MD</th>
                                <th>Nama Dagang</th>
                                <th>Nama Jenis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($params['detail'] as $rows) : ?>
                                <tr>
                                    <td class="data-border"><?=$rows->name_local?></td>
                                    <td class="data-border"><?=$rows->type_local?></td>
                                    <td class="data-border"><?=$rows->md_no_local?></td>
                                    <td class="data-border"><?=$rows->name_export?></td>
                                    <td class="data-border"><?=$rows->type_export?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div style="margin-top: 1%;">
                        <p>Deskripsi</p>
                    </div>
                </div>

                <div id="signature" style="margin-top: 8%; box-sizing: border-box; content: ''; clear: both; display: table;">
                    <div style="float: left; width: 30%; text-align: center;">
                        Kudus, <?=IndoDate?>
                        <div style="margin-top: 30%; font-weight: bold;"><u>Slamet Supriyadi</u></div>
                        <div>QA Manager</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>