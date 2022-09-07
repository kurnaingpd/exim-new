<?php foreach($params['category'] as $category => $value) : ?>
    <b><?=$value['category_name']?></b>
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
            foreach($params['item'][$category] as $detail => $rows) : 
                $total = ($rows['qty'] * $rows['price']);
        ?>
            <tr>
                <td><?=$rows['item_name']?></td>
                <td><?=$rows['pack_desc']?></td>
                <td class="text-right"><?=number_format($rows['qty'])?></td>
                <td class="text-right"><?=number_format($rows['price'], 2)?></td>
                <td class="text-right"><?=number_format($total, 2)?></td>
            </tr>
        <?php 
                $tQty += $rows['qty'];
                $tPrice += $rows['price'];
                $tTotal += $total;
            endforeach; 
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">Total <?=$params['detail']->incoterm_code?></td>
                <td class="text-right"><?=number_format($tQty)?></td>
                <td class="text-right"><?=number_format($tPrice, 2)?></td>
                <td class="text-right"><?=number_format($tTotal, 2)?></td>
            </tr>
        </tfoot>
    </table>
<?php endforeach; ?>