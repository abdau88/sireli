<?php
namespace PHPMaker2019\project2;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$tb_panduan_list = new tb_panduan_list();

// Run the page
$tb_panduan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_panduan_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_panduan->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ftb_panduanlist = currentForm = new ew.Form("ftb_panduanlist", "list");
ftb_panduanlist.formKeyCountName = '<?php echo $tb_panduan_list->FormKeyCountName ?>';

// Form_CustomValidate event
ftb_panduanlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_panduanlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_panduan->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tb_panduan_list->TotalRecs > 0 && $tb_panduan_list->ExportOptions->visible()) { ?>
<?php $tb_panduan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_panduan_list->ImportOptions->visible()) { ?>
<?php $tb_panduan_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tb_panduan_list->renderOtherOptions();
?>
<?php $tb_panduan_list->showPageHeader(); ?>
<?php
$tb_panduan_list->showMessage();
?>
<?php if ($tb_panduan_list->TotalRecs > 0 || $tb_panduan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tb_panduan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tb_panduan">
<form name="ftb_panduanlist" id="ftb_panduanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_panduan_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_panduan_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_panduan">
<div id="gmp_tb_panduan" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($tb_panduan_list->TotalRecs > 0 || $tb_panduan->isGridEdit()) { ?>
<table id="tbl_tb_panduanlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tb_panduan_list->RowType = ROWTYPE_HEADER;

// Render list options
$tb_panduan_list->renderListOptions();

// Render list options (header, left)
$tb_panduan_list->ListOptions->render("header", "left");
?>
<?php if ($tb_panduan->spi->Visible) { // spi ?>
	<?php if ($tb_panduan->sortUrl($tb_panduan->spi) == "") { ?>
		<th data-name="spi" class="<?php echo $tb_panduan->spi->headerCellClass() ?>"><div id="elh_tb_panduan_spi" class="tb_panduan_spi"><div class="ew-table-header-caption"><?php echo $tb_panduan->spi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spi" class="<?php echo $tb_panduan->spi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_panduan->SortUrl($tb_panduan->spi) ?>',1);"><div id="elh_tb_panduan_spi" class="tb_panduan_spi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_panduan->spi->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_panduan->spi->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_panduan->spi->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_panduan->dosen->Visible) { // dosen ?>
	<?php if ($tb_panduan->sortUrl($tb_panduan->dosen) == "") { ?>
		<th data-name="dosen" class="<?php echo $tb_panduan->dosen->headerCellClass() ?>"><div id="elh_tb_panduan_dosen" class="tb_panduan_dosen"><div class="ew-table-header-caption"><?php echo $tb_panduan->dosen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dosen" class="<?php echo $tb_panduan->dosen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_panduan->SortUrl($tb_panduan->dosen) ?>',1);"><div id="elh_tb_panduan_dosen" class="tb_panduan_dosen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_panduan->dosen->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_panduan->dosen->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_panduan->dosen->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tb_panduan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tb_panduan->ExportAll && $tb_panduan->isExport()) {
	$tb_panduan_list->StopRec = $tb_panduan_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tb_panduan_list->TotalRecs > $tb_panduan_list->StartRec + $tb_panduan_list->DisplayRecs - 1)
		$tb_panduan_list->StopRec = $tb_panduan_list->StartRec + $tb_panduan_list->DisplayRecs - 1;
	else
		$tb_panduan_list->StopRec = $tb_panduan_list->TotalRecs;
}
$tb_panduan_list->RecCnt = $tb_panduan_list->StartRec - 1;
if ($tb_panduan_list->Recordset && !$tb_panduan_list->Recordset->EOF) {
	$tb_panduan_list->Recordset->moveFirst();
	$selectLimit = $tb_panduan_list->UseSelectLimit;
	if (!$selectLimit && $tb_panduan_list->StartRec > 1)
		$tb_panduan_list->Recordset->move($tb_panduan_list->StartRec - 1);
} elseif (!$tb_panduan->AllowAddDeleteRow && $tb_panduan_list->StopRec == 0) {
	$tb_panduan_list->StopRec = $tb_panduan->GridAddRowCount;
}

// Initialize aggregate
$tb_panduan->RowType = ROWTYPE_AGGREGATEINIT;
$tb_panduan->resetAttributes();
$tb_panduan_list->renderRow();
while ($tb_panduan_list->RecCnt < $tb_panduan_list->StopRec) {
	$tb_panduan_list->RecCnt++;
	if ($tb_panduan_list->RecCnt >= $tb_panduan_list->StartRec) {
		$tb_panduan_list->RowCnt++;

		// Set up key count
		$tb_panduan_list->KeyCount = $tb_panduan_list->RowIndex;

		// Init row class and style
		$tb_panduan->resetAttributes();
		$tb_panduan->CssClass = "";
		if ($tb_panduan->isGridAdd()) {
		} else {
			$tb_panduan_list->loadRowValues($tb_panduan_list->Recordset); // Load row values
		}
		$tb_panduan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tb_panduan->RowAttrs = array_merge($tb_panduan->RowAttrs, array('data-rowindex'=>$tb_panduan_list->RowCnt, 'id'=>'r' . $tb_panduan_list->RowCnt . '_tb_panduan', 'data-rowtype'=>$tb_panduan->RowType));

		// Render row
		$tb_panduan_list->renderRow();

		// Render list options
		$tb_panduan_list->renderListOptions();
?>
	<tr<?php echo $tb_panduan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tb_panduan_list->ListOptions->render("body", "left", $tb_panduan_list->RowCnt);
?>
	<?php if ($tb_panduan->spi->Visible) { // spi ?>
		<td data-name="spi"<?php echo $tb_panduan->spi->cellAttributes() ?>>
<span id="el<?php echo $tb_panduan_list->RowCnt ?>_tb_panduan_spi" class="tb_panduan_spi">
<span<?php echo $tb_panduan->spi->viewAttributes() ?>>
<?php echo $tb_panduan->spi->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_panduan->dosen->Visible) { // dosen ?>
		<td data-name="dosen"<?php echo $tb_panduan->dosen->cellAttributes() ?>>
<span id="el<?php echo $tb_panduan_list->RowCnt ?>_tb_panduan_dosen" class="tb_panduan_dosen">
<span<?php echo $tb_panduan->dosen->viewAttributes() ?>>
<?php echo $tb_panduan->dosen->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tb_panduan_list->ListOptions->render("body", "right", $tb_panduan_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$tb_panduan->isGridAdd())
		$tb_panduan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$tb_panduan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tb_panduan_list->Recordset)
	$tb_panduan_list->Recordset->Close();
?>
<?php if (!$tb_panduan->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tb_panduan->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($tb_panduan_list->Pager)) $tb_panduan_list->Pager = new PrevNextPager($tb_panduan_list->StartRec, $tb_panduan_list->DisplayRecs, $tb_panduan_list->TotalRecs, $tb_panduan_list->AutoHidePager) ?>
<?php if ($tb_panduan_list->Pager->RecordCount > 0 && $tb_panduan_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($tb_panduan_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $tb_panduan_list->pageUrl() ?>start=<?php echo $tb_panduan_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($tb_panduan_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $tb_panduan_list->pageUrl() ?>start=<?php echo $tb_panduan_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $tb_panduan_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($tb_panduan_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $tb_panduan_list->pageUrl() ?>start=<?php echo $tb_panduan_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($tb_panduan_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $tb_panduan_list->pageUrl() ?>start=<?php echo $tb_panduan_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tb_panduan_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($tb_panduan_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tb_panduan_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tb_panduan_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tb_panduan_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tb_panduan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tb_panduan_list->TotalRecs == 0 && !$tb_panduan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tb_panduan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tb_panduan_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_panduan->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_panduan_list->terminate();
?>