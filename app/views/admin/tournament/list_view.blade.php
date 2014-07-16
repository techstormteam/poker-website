@extends('layout.administrator')

@section('content')
<div class="page-head">
    <h2>Tournament List</h2>
    <ol class="breadcrumb">
        <li class="active">List of tournament.</li>
    </ol>
</div>
<div class="cl-mcont">
    <h3 class="text-center">Tournament List</h3>
</div>

<?php
//var_dump($result);
    if (!empty($info_message)) {
        HtmlGenerator::divNotification("Tournament", $info_message);
    }
?>

<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h3>Tournament List</h3>
            </div>
            <div class="content">
                <div class="table-responsive">
                    <div id="datatable-icons_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-12"><div class="pull-right"><div class="dataTables_filter" id="datatable-icons_filter"><label><input type="text" aria-controls="datatable-icons"></label></div></div><div class="pull-left"><div id="datatable-icons_length" class="dataTables_length"><label>Show <select size="1" name="datatable-icons_length" aria-controls="datatable-icons"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> Rows</label></div></div><div class="clearfix"></div></div></div>
                        <table class="table table-bordered dataTable" id="datatable-icons" aria-describedby="datatable-icons_info">
                            <thead>
                                <tr role="row">
                                <div class="header">							
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="datatable-icons" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 240px;">Name</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="datatable-icons" rowspan="1" colspan="1" aria-label="Game: activate to sort column ascending" style="width: 222px;">Game</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="datatable-icons" rowspan="1" colspan="1" aria-label="Buy in: activate to sort column ascending" style="width: 143px;">Buy In</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="datatable-icons" rowspan="1" colspan="1" aria-label="Entry fee: activate to sort column ascending" style="width: 143px;">Entry Fee</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="datatable-icons" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 143px;">Status</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="datatable-icons" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 159px;">Actions</th></tr>
                            </thead>

                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                <?php
                                $list = $result;
                                $current_page = 1;
                                if (!empty($_GET['p'])) {
                                        $current_page = $_GET['p'];
                                }

                                $list_total = $list;
                                $page_size = 10;
                                $lib_pager = new Paging();
                                $total_page = $lib_pager->get_total_page($list_total->Name, $page_size);
                                $current_page_list_name = $lib_pager->get_current_page_list($page_size, $current_page, $list_total->Name);
                                $current_page_list_game = $lib_pager->get_current_page_list($page_size, $current_page, $list_total->Game);
                                $current_page_list_buy_in = $lib_pager->get_current_page_list($page_size, $current_page, $list_total->BuyIn);
                                $current_page_list_entry_fee = $lib_pager->get_current_page_list($page_size, $current_page, $list_total->EntryFee);
                                $current_page_list_status = $lib_pager->get_current_page_list($page_size, $current_page, $list_total->Status);

                                if (empty($list_total->Result) || $list_total->Result !== 'Ok' || count($list_total->Tournaments) == 0) {
                                    echo "<tr class='gradeA odd'>No item found.</tr>";
                                } else { 
                                    for ($index = 0; $index < $list_total->Tournaments; $index++) {
                                    ?>
                                <tr class="gradeA odd">
                                    <td class=" sorting_1"><?= $current_page_list_name[$index]; ?></td>
                                    <td class=" "><?= $current_page_list_game[$index]; ?></td>
                                    <td class=" "><?= $current_page_list_buy_in[$index]; ?></td>
                                    <td class="center "><?= $current_page_list_entry_fee[$index]; ?></td>
                                    <td class="center "><?= $current_page_list_status[$index]; ?></td>
                                    <td class="center ">
<!--                                        <a class="btn btn-default btn-xs" href="#" data-original-title="Open" data-toggle="tooltip">
                                            <i class="fa fa-file"></i></a> 
                                        <a class="btn btn-primary btn-xs" href="#" data-original-title="Edit" data-toggle="tooltip">
                                            <i class="fa fa-pencil"></i></a> -->
                                        <?php
                                        if ($current_page_list_status[$index] === 'Offline') {
                                        ?>
                                        <a class="btn btn-primary btn-xs" href="{{ URL::to('admin/tournament/online/'.$current_page_list_name[$index]); }}" data-original-title="Publish Online" data-toggle="tooltip">
                                            <i class="fa fa-thumbs-up"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                        <a class="btn btn-default btn-xs" href="{{ URL::to('admin/tournament/offline/'.$current_page_list_name[$index]); }}" data-original-title="Cancel Online" data-toggle="tooltip">
                                            <i class="fa fa-thumbs-down"></i></a>
                                        <?php
                                        }
                                        ?>
                                        <a class="btn btn-danger btn-xs" href="{{ URL::to('admin/tournament/delete/'.$current_page_list_name[$index]); }}" data-original-title="Remove" data-toggle="tooltip">
                                            <i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                    <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="pull-left">
                                    <?php
                                    $from = ($current_page - 1) * $page_size;
                                    $to = $from + $page_size;
                                    if ($to > $list_total->Tournaments) {
                                        $to = $list_total->Tournaments;
                                    }
                                    ?>
                                    <div class="dataTables_info" id="datatable-icons_info">Showing <?= $from + 1; ?> to <?= $to ?> of <?= $list_total->Tournaments ?> entries</div>
                                </div>
                                <div class="pull-right">
                                    <div class="dataTables_paginate paging_bs_normal">
                                        <ul class="pagination">
                                            
                                            <?php
                                            if (!empty($total_page) && count($total_page) > 0) {?>
                                                
                                            <li class="prev <?php if($current_page<=1){echo "disabled";}?>">
                                                <a href="?p=<?php echo $current_page - 1;?>" <?php if($current_page<=1){echo "onclick='return false'";}?>>
                                                    <span class="fa fa-angle-left"></span>&nbsp;Previous</a>
                                            </li>
                                                <?php
                                                for ($page = 1; $page <= $total_page; $page++) { ?>
                                                    <li <?php if($current_page>=$page){echo "class='active'";} ?>><a href="#"><?= $page; ?></a></li>
                                                <?php
                                                }?>
                                            <li class="next <?php if($current_page>=$total_page){echo "disabled";}?>">
                                                <a href="?p=<?php echo $current_page + 1;?>" <?php if($current_page>=$total_page){echo "onclick='return false'";}?>>Next&nbsp;
                                                    <span class="fa fa-angle-right"></span></a></li>
                                            <?php
                                            } ?>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>							
                </div>
            </div>
        </div>				
    </div>
</div>
@stop