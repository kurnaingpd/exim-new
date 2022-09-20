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
        <style>
            /* * {
                box-sizing: border-box;
            }

            .box {
                float: left;
                width: 28%;
                font-size: 7px;
                font-style: normal;
                font-weight: normal;
            }

            .clearfix::after {
                content: "";
                clear: both;
                display: table;
            }

            .content {
                font-size: 8px;
            }

            .box-name {
                float: left;
                width: 25%;
            }

            .box-colon {
                float: left;
                width: 4%
            }

            .box-value {
                float: left;
                width: 35%;
            }

            .clearfix-content::after {
                content: "";
                clear: both;
                display: table;
            }

            .table {
                width: 100%;
                font-size: 8px;
                border-style: solid;
                border-width: 1px;
                border-collapse: collapse;
            }

            th {
                border-style: solid;
                border-width: 1px;
                padding: 1%;
            }

            .data {
                border-style: solid;
                border-width: 1px;
                border-top-style: none;
                border-bottom-style: none;
                padding: 1%;
            }

            .data-border {
                border-style: solid;
                border-width: 1px;
                padding: 1%;
            }

            .foot {
                border-style: solid;
                border-width: 1px;
                border-left-style: none;
                border-right-style: none;
                padding: 1%;
                font-weight: bold;
            }

            .title {
                text-align: center;
            } */
        </style>
    </head>
    <body>
        <?=$content?>
    </body>
</html>