<?php
    $container = array();
    $category = array();
    $item = array();

    foreach($params['container'] as $cont => $value_1)
    {
        $container[$value_1->number_of_container] = $value_1;
    }

    foreach($params['category'] as $cat => $value_2)
    {
        $category[$value_2->number_of_container][$value_2->item_category_id] = $value_2;
    }

    foreach($params['item'] as $dtl => $value_3)
    {
        $item[$value_3->number_of_container][$value_3->pi_item_category_id][$value_3->id] = $value_3;
    }
?>

<ol type="1" style="padding-left: 1.3%;">
    <?php foreach($container as $nomor => $rows_1) : ?>
        <b>
            <li>Container: <?=$rows_1->number_of_container?>
                <?php foreach($category[$nomor] as $cats => $rows_2) : ?>
                    <ul style="margin: 0; padding: 0;"><?=$rows_2->category_name?></ul>
                    <table class="table table-sm table-bordered table-striped mb-3">
                        <thead>
                            <tr class="text-center">
                                <th>Product name</th>
                                <th>Configuration</th>
                                <th>Qty (Case)</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $tQty = 0;
                                $tPrice = 0;
                                $tTotal = 0;
                            ?>
                            <?php foreach($item[$nomor][$cats] as $detail => $rows_3) : ?>
                                <?php $total = ($rows_3->qty * $rows_3->price); ?>
                                <tr>
                                    <td><?=$rows_3->item_name?></td>
                                    <td><?=$rows_3->pack_desc?></td>
                                    <td class="text-right"><?=number_format($rows_3->qty)?></td>
                                    <td class="text-right"><?=number_format($rows_3->price, 2)?></td>
                                    <td class="text-right"><?=number_format($total, 2)?></td>
                                </tr>
                                <?php
                                    $tQty += $rows_3->qty;
                                    $tPrice += $rows_3->price;
                                    $tTotal += $total;
                                ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">Total</td>
                                <td class="text-right"><?=number_format($tQty)?></td>
                                <td class="text-right"><?=number_format($tPrice, 2)?></td>
                                <td class="text-right"><?=number_format($tTotal, 2)?></td>
                            </tr>
                        </tfoot>
                    </table>
                <?php endforeach; ?>
            </li>
        </b>
    <?php endforeach; ?>
</ol>