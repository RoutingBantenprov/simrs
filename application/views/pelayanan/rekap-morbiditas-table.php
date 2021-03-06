<?php if (!isset($_GET['do'])) { ?>
<script type="text/javascript" src="<?= base_url('assets/js/colResizable-1.3.min.js') ?>"></script>
<script type="text/javascript">
$(function() {
    $("table").tablesorter();
    var onSampleResized = function(e){
            var columns = $(e.currentTarget).find("th");
            var msg = "columns widths: ";
            columns.each(function(){ msg += $(this).width() + "px; "; });
    };
    $(".tabel").colResizable({
        liveDrag:true,
        gripInnerHtml:"<div class='grip'></div>", 
        draggingClass:"dragging", 
        onResize:onSampleResized
    });
});
</script>
<?php 
}
$border = "";
if (isset($_GET['do'])) { 
    $border = "border=1";
    header_excel('mobiditas.xls');
    echo "<center>Rekap Morbiditas<br/>Tanggal ".indo_tgl(date2mysql($_GET['awal']))." s.d ".indo_tgl(date2mysql($_GET['akhir']))."</center>";
}
?>
<div class="data-list">
    <table width="100%" class="list-data" <?= $border ?>>
        <thead>
            <tr>
                <th width="5%">No.</th>
                <th width="10%">No. DTD</th>
                <th width="25%">Kode&nbsp;ICD&nbsp;X</th>
                <th width="60%">Nama</th>
                <th width="5%">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_data as $key => $data) { ?>
            <tr class="<?= ($key%2==1)?'even':'odd' ?>">
                <td align="center"><?= ++$key ?></td>
                <td><?= $data->no_dtd ?></td>
                <td><?= $data->no_daftar_terperinci?></td>
                <td><?= $data->nama_gol ?></td>
                <td align="center"><?= $data->jumlah ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>