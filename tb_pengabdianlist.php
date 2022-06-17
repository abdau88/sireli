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
$tb_pengabdian_list = new tb_pengabdian_list();

// Run the page
$tb_pengabdian_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_pengabdian_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_pengabdian->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ftb_pengabdianlist = currentForm = new ew.Form("ftb_pengabdianlist", "list");
ftb_pengabdianlist.formKeyCountName = '<?php echo $tb_pengabdian_list->FormKeyCountName ?>';

// Form_CustomValidate event
ftb_pengabdianlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_pengabdianlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_pengabdianlist.lists["x_NIDN"] = <?php echo $tb_pengabdian_list->NIDN->Lookup->toClientList() ?>;
ftb_pengabdianlist.lists["x_NIDN"].options = <?php echo JsonEncode($tb_pengabdian_list->NIDN->lookupOptions()) ?>;
ftb_pengabdianlist.autoSuggests["x_NIDN"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_pengabdianlist.lists["x_status"] = <?php echo $tb_pengabdian_list->status->Lookup->toClientList() ?>;
ftb_pengabdianlist.lists["x_status"].options = <?php echo JsonEncode($tb_pengabdian_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var ftb_pengabdianlistsrch = currentSearchForm = new ew.Form("ftb_pengabdianlistsrch");

// Filters
ftb_pengabdianlistsrch.filterList = <?php echo $tb_pengabdian_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_pengabdian->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tb_pengabdian_list->TotalRecs > 0 && $tb_pengabdian_list->ExportOptions->visible()) { ?>
<?php $tb_pengabdian_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_pengabdian_list->ImportOptions->visible()) { ?>
<?php $tb_pengabdian_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_pengabdian_list->SearchOptions->visible()) { ?>
<?php $tb_pengabdian_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tb_pengabdian_list->FilterOptions->visible()) { ?>
<?php $tb_pengabdian_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tb_pengabdian_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tb_pengabdian->isExport() && !$tb_pengabdian->CurrentAction) { ?>
<form name="ftb_pengabdianlistsrch" id="ftb_pengabdianlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($tb_pengabdian_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ftb_pengabdianlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tb_pengabdian">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($tb_pengabdian_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($tb_pengabdian_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tb_pengabdian_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tb_pengabdian_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tb_pengabdian_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tb_pengabdian_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tb_pengabdian_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $tb_pengabdian_list->showPageHeader(); ?>
<?php
$tb_pengabdian_list->showMessage();
?>
<?php if ($tb_pengabdian_list->TotalRecs > 0 || $tb_pengabdian->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tb_pengabdian_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tb_pengabdian">
<form name="ftb_pengabdianlist" id="ftb_pengabdianlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_pengabdian_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_pengabdian_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_pengabdian">
<div id="gmp_tb_pengabdian" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($tb_pengabdian_list->TotalRecs > 0 || $tb_pengabdian->isGridEdit()) { ?>
<table id="tbl_tb_pengabdianlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tb_pengabdian_list->RowType = ROWTYPE_HEADER;

// Render list options
$tb_pengabdian_list->renderListOptions();

// Render list options (header, left)
$tb_pengabdian_list->ListOptions->render("header", "left");
?>
<?php if ($tb_pengabdian->NIDN->Visible) { // NIDN ?>
	<?php if ($tb_pengabdian->sortUrl($tb_pengabdian->NIDN) == "") { ?>
		<th data-name="NIDN" class="<?php echo $tb_pengabdian->NIDN->headerCellClass() ?>"><div id="elh_tb_pengabdian_NIDN" class="tb_pengabdian_NIDN"><div class="ew-table-header-caption"><?php echo $tb_pengabdian->NIDN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NIDN" class="<?php echo $tb_pengabdian->NIDN->headerCellClass() ?>"><div><div id="elh_tb_pengabdian_NIDN" class="tb_pengabdian_NIDN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_pengabdian->NIDN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_pengabdian->NIDN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_pengabdian->NIDN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_pengabdian->judul->Visible) { // judul ?>
	<?php if ($tb_pengabdian->sortUrl($tb_pengabdian->judul) == "") { ?>
		<th data-name="judul" class="<?php echo $tb_pengabdian->judul->headerCellClass() ?>"><div id="elh_tb_pengabdian_judul" class="tb_pengabdian_judul"><div class="ew-table-header-caption"><?php echo $tb_pengabdian->judul->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="judul" class="<?php echo $tb_pengabdian->judul->headerCellClass() ?>"><div><div id="elh_tb_pengabdian_judul" class="tb_pengabdian_judul">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_pengabdian->judul->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_pengabdian->judul->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_pengabdian->judul->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_pengabdian->biaya->Visible) { // biaya ?>
	<?php if ($tb_pengabdian->sortUrl($tb_pengabdian->biaya) == "") { ?>
		<th data-name="biaya" class="<?php echo $tb_pengabdian->biaya->headerCellClass() ?>"><div id="elh_tb_pengabdian_biaya" class="tb_pengabdian_biaya"><div class="ew-table-header-caption"><?php echo $tb_pengabdian->biaya->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="biaya" class="<?php echo $tb_pengabdian->biaya->headerCellClass() ?>"><div><div id="elh_tb_pengabdian_biaya" class="tb_pengabdian_biaya">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_pengabdian->biaya->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_pengabdian->biaya->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_pengabdian->biaya->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_pengabdian->tahun->Visible) { // tahun ?>
	<?php if ($tb_pengabdian->sortUrl($tb_pengabdian->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $tb_pengabdian->tahun->headerCellClass() ?>"><div id="elh_tb_pengabdian_tahun" class="tb_pengabdian_tahun"><div class="ew-table-header-caption"><?php echo $tb_pengabdian->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $tb_pengabdian->tahun->headerCellClass() ?>"><div><div id="elh_tb_pengabdian_tahun" class="tb_pengabdian_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_pengabdian->tahun->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_pengabdian->tahun->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_pengabdian->tahun->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_pengabdian->status->Visible) { // status ?>
	<?php if ($tb_pengabdian->sortUrl($tb_pengabdian->status) == "") { ?>
		<th data-name="status" class="<?php echo $tb_pengabdian->status->headerCellClass() ?>"><div id="elh_tb_pengabdian_status" class="tb_pengabdian_status"><div class="ew-table-header-caption"><?php echo $tb_pengabdian->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $tb_pengabdian->status->headerCellClass() ?>"><div><div id="elh_tb_pengabdian_status" class="tb_pengabdian_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_pengabdian->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_pengabdian->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_pengabdian->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_pengabdian->LP2->Visible) { // LP2 ?>
	<?php if ($tb_pengabdian->sortUrl($tb_pengabdian->LP2) == "") { ?>
		<th data-name="LP2" class="<?php echo $tb_pengabdian->LP2->headerCellClass() ?>"><div id="elh_tb_pengabdian_LP2" class="tb_pengabdian_LP2"><div class="ew-table-header-caption"><?php echo $tb_pengabdian->LP2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LP2" class="<?php echo $tb_pengabdian->LP2->headerCellClass() ?>"><div><div id="elh_tb_pengabdian_LP2" class="tb_pengabdian_LP2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_pengabdian->LP2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_pengabdian->LP2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_pengabdian->LP2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tb_pengabdian_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tb_pengabdian->ExportAll && $tb_pengabdian->isExport()) {
	$tb_pengabdian_list->StopRec = $tb_pengabdian_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tb_pengabdian_list->TotalRecs > $tb_pengabdian_list->StartRec + $tb_pengabdian_list->DisplayRecs - 1)
		$tb_pengabdian_list->StopRec = $tb_pengabdian_list->StartRec + $tb_pengabdian_list->DisplayRecs - 1;
	else
		$tb_pengabdian_list->StopRec = $tb_pengabdian_list->TotalRecs;
}
$tb_pengabdian_list->RecCnt = $tb_pengabdian_list->StartRec - 1;
if ($tb_pengabdian_list->Recordset && !$tb_pengabdian_list->Recordset->EOF) {
	$tb_pengabdian_list->Recordset->moveFirst();
	$selectLimit = $tb_pengabdian_list->UseSelectLimit;
	if (!$selectLimit && $tb_pengabdian_list->StartRec > 1)
		$tb_pengabdian_list->Recordset->move($tb_pengabdian_list->StartRec - 1);
} elseif (!$tb_pengabdian->AllowAddDeleteRow && $tb_pengabdian_list->StopRec == 0) {
	$tb_pengabdian_list->StopRec = $tb_pengabdian->GridAddRowCount;
}

// Initialize aggregate
$tb_pengabdian->RowType = ROWTYPE_AGGREGATEINIT;
$tb_pengabdian->resetAttributes();
$tb_pengabdian_list->renderRow();
while ($tb_pengabdian_list->RecCnt < $tb_pengabdian_list->StopRec) {
	$tb_pengabdian_list->RecCnt++;
	if ($tb_pengabdian_list->RecCnt >= $tb_pengabdian_list->StartRec) {
		$tb_pengabdian_list->RowCnt++;

		// Set up key count
		$tb_pengabdian_list->KeyCount = $tb_pengabdian_list->RowIndex;

		// Init row class and style
		$tb_pengabdian->resetAttributes();
		$tb_pengabdian->CssClass = "";
		if ($tb_pengabdian->isGridAdd()) {
		} else {
			$tb_pengabdian_list->loadRowValues($tb_pengabdian_list->Recordset); // Load row values
		}
		$tb_pengabdian->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tb_pengabdian->RowAttrs = array_merge($tb_pengabdian->RowAttrs, array('data-rowindex'=>$tb_pengabdian_list->RowCnt, 'id'=>'r' . $tb_pengabdian_list->RowCnt . '_tb_pengabdian', 'data-rowtype'=>$tb_pengabdian->RowType));

		// Render row
		$tb_pengabdian_list->renderRow();

		// Render list options
		$tb_pengabdian_list->renderListOptions();
?>
	<tr<?php echo $tb_pengabdian->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tb_pengabdian_list->ListOptions->render("body", "left", $tb_pengabdian_list->RowCnt);
?>
	<?php if ($tb_pengabdian->NIDN->Visible) { // NIDN ?>
		<td data-name="NIDN"<?php echo $tb_pengabdian->NIDN->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian_list->RowCnt ?>_tb_pengabdian_NIDN" class="tb_pengabdian_NIDN">
<span<?php echo $tb_pengabdian->NIDN->viewAttributes() ?>>
<?php echo $tb_pengabdian->NIDN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_pengabdian->judul->Visible) { // judul ?>
		<td data-name="judul"<?php echo $tb_pengabdian->judul->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian_list->RowCnt ?>_tb_pengabdian_judul" class="tb_pengabdian_judul">
<span<?php echo $tb_pengabdian->judul->viewAttributes() ?>>
<?php echo $tb_pengabdian->judul->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_pengabdian->biaya->Visible) { // biaya ?>
		<td data-name="biaya"<?php echo $tb_pengabdian->biaya->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian_list->RowCnt ?>_tb_pengabdian_biaya" class="tb_pengabdian_biaya">
<span<?php echo $tb_pengabdian->biaya->viewAttributes() ?>>
<?php echo $tb_pengabdian->biaya->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_pengabdian->tahun->Visible) { // tahun ?>
		<td data-name="tahun"<?php echo $tb_pengabdian->tahun->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian_list->RowCnt ?>_tb_pengabdian_tahun" class="tb_pengabdian_tahun">
<span<?php echo $tb_pengabdian->tahun->viewAttributes() ?>>
<?php echo $tb_pengabdian->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_pengabdian->status->Visible) { // status ?>
		<td data-name="status"<?php echo $tb_pengabdian->status->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian_list->RowCnt ?>_tb_pengabdian_status" class="tb_pengabdian_status">
<span<?php echo $tb_pengabdian->status->viewAttributes() ?>>
<?php echo $tb_pengabdian->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_pengabdian->LP2->Visible) { // LP2 ?>
		<td data-name="LP2"<?php echo $tb_pengabdian->LP2->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian_list->RowCnt ?>_tb_pengabdian_LP2" class="tb_pengabdian_LP2">
<span<?php echo $tb_pengabdian->LP2->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_pengabdian->LP2, $tb_pengabdian->LP2->getViewValue()) ?>
</span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tb_pengabdian_list->ListOptions->render("body", "right", $tb_pengabdian_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$tb_pengabdian->isGridAdd())
		$tb_pengabdian_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$tb_pengabdian->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tb_pengabdian_list->Recordset)
	$tb_pengabdian_list->Recordset->Close();
?>
<?php if (!$tb_pengabdian->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tb_pengabdian->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($tb_pengabdian_list->Pager)) $tb_pengabdian_list->Pager = new PrevNextPager($tb_pengabdian_list->StartRec, $tb_pengabdian_list->DisplayRecs, $tb_pengabdian_list->TotalRecs, $tb_pengabdian_list->AutoHidePager) ?>
<?php if ($tb_pengabdian_list->Pager->RecordCount > 0 && $tb_pengabdian_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($tb_pengabdian_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $tb_pengabdian_list->pageUrl() ?>start=<?php echo $tb_pengabdian_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($tb_pengabdian_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $tb_pengabdian_list->pageUrl() ?>start=<?php echo $tb_pengabdian_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $tb_pengabdian_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($tb_pengabdian_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $tb_pengabdian_list->pageUrl() ?>start=<?php echo $tb_pengabdian_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($tb_pengabdian_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $tb_pengabdian_list->pageUrl() ?>start=<?php echo $tb_pengabdian_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tb_pengabdian_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($tb_pengabdian_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tb_pengabdian_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tb_pengabdian_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tb_pengabdian_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tb_pengabdian_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tb_pengabdian_list->TotalRecs == 0 && !$tb_pengabdian->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tb_pengabdian_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tb_pengabdian_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_pengabdian->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_pengabdian_list->terminate();
?>