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
$tb_pengabdian3_list = new tb_pengabdian3_list();

// Run the page
$tb_pengabdian3_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_pengabdian3_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_pengabdian3->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ftb_pengabdian3list = currentForm = new ew.Form("ftb_pengabdian3list", "list");
ftb_pengabdian3list.formKeyCountName = '<?php echo $tb_pengabdian3_list->FormKeyCountName ?>';

// Form_CustomValidate event
ftb_pengabdian3list.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_pengabdian3list.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_pengabdian3list.lists["x_NPAK_NIP"] = <?php echo $tb_pengabdian3_list->NPAK_NIP->Lookup->toClientList() ?>;
ftb_pengabdian3list.lists["x_NPAK_NIP"].options = <?php echo JsonEncode($tb_pengabdian3_list->NPAK_NIP->lookupOptions()) ?>;
ftb_pengabdian3list.autoSuggests["x_NPAK_NIP"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_pengabdian3list.lists["x_status"] = <?php echo $tb_pengabdian3_list->status->Lookup->toClientList() ?>;
ftb_pengabdian3list.lists["x_status"].options = <?php echo JsonEncode($tb_pengabdian3_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var ftb_pengabdian3listsrch = currentSearchForm = new ew.Form("ftb_pengabdian3listsrch");

// Filters
ftb_pengabdian3listsrch.filterList = <?php echo $tb_pengabdian3_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_pengabdian3->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tb_pengabdian3_list->TotalRecs > 0 && $tb_pengabdian3_list->ExportOptions->visible()) { ?>
<?php $tb_pengabdian3_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_pengabdian3_list->ImportOptions->visible()) { ?>
<?php $tb_pengabdian3_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_pengabdian3_list->SearchOptions->visible()) { ?>
<?php $tb_pengabdian3_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tb_pengabdian3_list->FilterOptions->visible()) { ?>
<?php $tb_pengabdian3_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tb_pengabdian3_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tb_pengabdian3->isExport() && !$tb_pengabdian3->CurrentAction) { ?>
<form name="ftb_pengabdian3listsrch" id="ftb_pengabdian3listsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($tb_pengabdian3_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ftb_pengabdian3listsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tb_pengabdian3">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($tb_pengabdian3_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($tb_pengabdian3_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tb_pengabdian3_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tb_pengabdian3_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tb_pengabdian3_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tb_pengabdian3_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tb_pengabdian3_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $tb_pengabdian3_list->showPageHeader(); ?>
<?php
$tb_pengabdian3_list->showMessage();
?>
<?php if ($tb_pengabdian3_list->TotalRecs > 0 || $tb_pengabdian3->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tb_pengabdian3_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tb_pengabdian3">
<form name="ftb_pengabdian3list" id="ftb_pengabdian3list" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_pengabdian3_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_pengabdian3_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_pengabdian3">
<div id="gmp_tb_pengabdian3" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($tb_pengabdian3_list->TotalRecs > 0 || $tb_pengabdian3->isGridEdit()) { ?>
<table id="tbl_tb_pengabdian3list" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tb_pengabdian3_list->RowType = ROWTYPE_HEADER;

// Render list options
$tb_pengabdian3_list->renderListOptions();

// Render list options (header, left)
$tb_pengabdian3_list->ListOptions->render("header", "left");
?>
<?php if ($tb_pengabdian3->NPAK_NIP->Visible) { // NPAK_NIP ?>
	<?php if ($tb_pengabdian3->sortUrl($tb_pengabdian3->NPAK_NIP) == "") { ?>
		<th data-name="NPAK_NIP" class="<?php echo $tb_pengabdian3->NPAK_NIP->headerCellClass() ?>"><div id="elh_tb_pengabdian3_NPAK_NIP" class="tb_pengabdian3_NPAK_NIP"><div class="ew-table-header-caption"><?php echo $tb_pengabdian3->NPAK_NIP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NPAK_NIP" class="<?php echo $tb_pengabdian3->NPAK_NIP->headerCellClass() ?>"><div><div id="elh_tb_pengabdian3_NPAK_NIP" class="tb_pengabdian3_NPAK_NIP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_pengabdian3->NPAK_NIP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_pengabdian3->NPAK_NIP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_pengabdian3->NPAK_NIP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_pengabdian3->judul->Visible) { // judul ?>
	<?php if ($tb_pengabdian3->sortUrl($tb_pengabdian3->judul) == "") { ?>
		<th data-name="judul" class="<?php echo $tb_pengabdian3->judul->headerCellClass() ?>"><div id="elh_tb_pengabdian3_judul" class="tb_pengabdian3_judul"><div class="ew-table-header-caption"><?php echo $tb_pengabdian3->judul->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="judul" class="<?php echo $tb_pengabdian3->judul->headerCellClass() ?>"><div><div id="elh_tb_pengabdian3_judul" class="tb_pengabdian3_judul">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_pengabdian3->judul->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_pengabdian3->judul->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_pengabdian3->judul->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_pengabdian3->biaya->Visible) { // biaya ?>
	<?php if ($tb_pengabdian3->sortUrl($tb_pengabdian3->biaya) == "") { ?>
		<th data-name="biaya" class="<?php echo $tb_pengabdian3->biaya->headerCellClass() ?>"><div id="elh_tb_pengabdian3_biaya" class="tb_pengabdian3_biaya"><div class="ew-table-header-caption"><?php echo $tb_pengabdian3->biaya->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="biaya" class="<?php echo $tb_pengabdian3->biaya->headerCellClass() ?>"><div><div id="elh_tb_pengabdian3_biaya" class="tb_pengabdian3_biaya">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_pengabdian3->biaya->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_pengabdian3->biaya->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_pengabdian3->biaya->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_pengabdian3->tahun->Visible) { // tahun ?>
	<?php if ($tb_pengabdian3->sortUrl($tb_pengabdian3->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $tb_pengabdian3->tahun->headerCellClass() ?>"><div id="elh_tb_pengabdian3_tahun" class="tb_pengabdian3_tahun"><div class="ew-table-header-caption"><?php echo $tb_pengabdian3->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $tb_pengabdian3->tahun->headerCellClass() ?>"><div><div id="elh_tb_pengabdian3_tahun" class="tb_pengabdian3_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_pengabdian3->tahun->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_pengabdian3->tahun->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_pengabdian3->tahun->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_pengabdian3->status->Visible) { // status ?>
	<?php if ($tb_pengabdian3->sortUrl($tb_pengabdian3->status) == "") { ?>
		<th data-name="status" class="<?php echo $tb_pengabdian3->status->headerCellClass() ?>"><div id="elh_tb_pengabdian3_status" class="tb_pengabdian3_status"><div class="ew-table-header-caption"><?php echo $tb_pengabdian3->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $tb_pengabdian3->status->headerCellClass() ?>"><div><div id="elh_tb_pengabdian3_status" class="tb_pengabdian3_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_pengabdian3->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_pengabdian3->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_pengabdian3->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_pengabdian3->chr->Visible) { // chr ?>
	<?php if ($tb_pengabdian3->sortUrl($tb_pengabdian3->chr) == "") { ?>
		<th data-name="chr" class="<?php echo $tb_pengabdian3->chr->headerCellClass() ?>"><div id="elh_tb_pengabdian3_chr" class="tb_pengabdian3_chr"><div class="ew-table-header-caption"><?php echo $tb_pengabdian3->chr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="chr" class="<?php echo $tb_pengabdian3->chr->headerCellClass() ?>"><div><div id="elh_tb_pengabdian3_chr" class="tb_pengabdian3_chr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_pengabdian3->chr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_pengabdian3->chr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_pengabdian3->chr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tb_pengabdian3_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tb_pengabdian3->ExportAll && $tb_pengabdian3->isExport()) {
	$tb_pengabdian3_list->StopRec = $tb_pengabdian3_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tb_pengabdian3_list->TotalRecs > $tb_pengabdian3_list->StartRec + $tb_pengabdian3_list->DisplayRecs - 1)
		$tb_pengabdian3_list->StopRec = $tb_pengabdian3_list->StartRec + $tb_pengabdian3_list->DisplayRecs - 1;
	else
		$tb_pengabdian3_list->StopRec = $tb_pengabdian3_list->TotalRecs;
}
$tb_pengabdian3_list->RecCnt = $tb_pengabdian3_list->StartRec - 1;
if ($tb_pengabdian3_list->Recordset && !$tb_pengabdian3_list->Recordset->EOF) {
	$tb_pengabdian3_list->Recordset->moveFirst();
	$selectLimit = $tb_pengabdian3_list->UseSelectLimit;
	if (!$selectLimit && $tb_pengabdian3_list->StartRec > 1)
		$tb_pengabdian3_list->Recordset->move($tb_pengabdian3_list->StartRec - 1);
} elseif (!$tb_pengabdian3->AllowAddDeleteRow && $tb_pengabdian3_list->StopRec == 0) {
	$tb_pengabdian3_list->StopRec = $tb_pengabdian3->GridAddRowCount;
}

// Initialize aggregate
$tb_pengabdian3->RowType = ROWTYPE_AGGREGATEINIT;
$tb_pengabdian3->resetAttributes();
$tb_pengabdian3_list->renderRow();
while ($tb_pengabdian3_list->RecCnt < $tb_pengabdian3_list->StopRec) {
	$tb_pengabdian3_list->RecCnt++;
	if ($tb_pengabdian3_list->RecCnt >= $tb_pengabdian3_list->StartRec) {
		$tb_pengabdian3_list->RowCnt++;

		// Set up key count
		$tb_pengabdian3_list->KeyCount = $tb_pengabdian3_list->RowIndex;

		// Init row class and style
		$tb_pengabdian3->resetAttributes();
		$tb_pengabdian3->CssClass = "";
		if ($tb_pengabdian3->isGridAdd()) {
		} else {
			$tb_pengabdian3_list->loadRowValues($tb_pengabdian3_list->Recordset); // Load row values
		}
		$tb_pengabdian3->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tb_pengabdian3->RowAttrs = array_merge($tb_pengabdian3->RowAttrs, array('data-rowindex'=>$tb_pengabdian3_list->RowCnt, 'id'=>'r' . $tb_pengabdian3_list->RowCnt . '_tb_pengabdian3', 'data-rowtype'=>$tb_pengabdian3->RowType));

		// Render row
		$tb_pengabdian3_list->renderRow();

		// Render list options
		$tb_pengabdian3_list->renderListOptions();
?>
	<tr<?php echo $tb_pengabdian3->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tb_pengabdian3_list->ListOptions->render("body", "left", $tb_pengabdian3_list->RowCnt);
?>
	<?php if ($tb_pengabdian3->NPAK_NIP->Visible) { // NPAK_NIP ?>
		<td data-name="NPAK_NIP"<?php echo $tb_pengabdian3->NPAK_NIP->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian3_list->RowCnt ?>_tb_pengabdian3_NPAK_NIP" class="tb_pengabdian3_NPAK_NIP">
<span<?php echo $tb_pengabdian3->NPAK_NIP->viewAttributes() ?>>
<?php echo $tb_pengabdian3->NPAK_NIP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_pengabdian3->judul->Visible) { // judul ?>
		<td data-name="judul"<?php echo $tb_pengabdian3->judul->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian3_list->RowCnt ?>_tb_pengabdian3_judul" class="tb_pengabdian3_judul">
<span<?php echo $tb_pengabdian3->judul->viewAttributes() ?>>
<?php echo $tb_pengabdian3->judul->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_pengabdian3->biaya->Visible) { // biaya ?>
		<td data-name="biaya"<?php echo $tb_pengabdian3->biaya->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian3_list->RowCnt ?>_tb_pengabdian3_biaya" class="tb_pengabdian3_biaya">
<span<?php echo $tb_pengabdian3->biaya->viewAttributes() ?>>
<?php echo $tb_pengabdian3->biaya->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_pengabdian3->tahun->Visible) { // tahun ?>
		<td data-name="tahun"<?php echo $tb_pengabdian3->tahun->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian3_list->RowCnt ?>_tb_pengabdian3_tahun" class="tb_pengabdian3_tahun">
<span<?php echo $tb_pengabdian3->tahun->viewAttributes() ?>>
<?php echo $tb_pengabdian3->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_pengabdian3->status->Visible) { // status ?>
		<td data-name="status"<?php echo $tb_pengabdian3->status->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian3_list->RowCnt ?>_tb_pengabdian3_status" class="tb_pengabdian3_status">
<span<?php echo $tb_pengabdian3->status->viewAttributes() ?>>
<?php echo $tb_pengabdian3->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_pengabdian3->chr->Visible) { // chr ?>
		<td data-name="chr"<?php echo $tb_pengabdian3->chr->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian3_list->RowCnt ?>_tb_pengabdian3_chr" class="tb_pengabdian3_chr">
<span<?php echo $tb_pengabdian3->chr->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_pengabdian3->chr, $tb_pengabdian3->chr->getViewValue()) ?>
</span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tb_pengabdian3_list->ListOptions->render("body", "right", $tb_pengabdian3_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$tb_pengabdian3->isGridAdd())
		$tb_pengabdian3_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$tb_pengabdian3->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tb_pengabdian3_list->Recordset)
	$tb_pengabdian3_list->Recordset->Close();
?>
<?php if (!$tb_pengabdian3->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tb_pengabdian3->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($tb_pengabdian3_list->Pager)) $tb_pengabdian3_list->Pager = new PrevNextPager($tb_pengabdian3_list->StartRec, $tb_pengabdian3_list->DisplayRecs, $tb_pengabdian3_list->TotalRecs, $tb_pengabdian3_list->AutoHidePager) ?>
<?php if ($tb_pengabdian3_list->Pager->RecordCount > 0 && $tb_pengabdian3_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($tb_pengabdian3_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $tb_pengabdian3_list->pageUrl() ?>start=<?php echo $tb_pengabdian3_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($tb_pengabdian3_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $tb_pengabdian3_list->pageUrl() ?>start=<?php echo $tb_pengabdian3_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $tb_pengabdian3_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($tb_pengabdian3_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $tb_pengabdian3_list->pageUrl() ?>start=<?php echo $tb_pengabdian3_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($tb_pengabdian3_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $tb_pengabdian3_list->pageUrl() ?>start=<?php echo $tb_pengabdian3_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tb_pengabdian3_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($tb_pengabdian3_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tb_pengabdian3_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tb_pengabdian3_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tb_pengabdian3_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tb_pengabdian3_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tb_pengabdian3_list->TotalRecs == 0 && !$tb_pengabdian3->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tb_pengabdian3_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tb_pengabdian3_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_pengabdian3->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_pengabdian3_list->terminate();
?>