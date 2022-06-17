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
$tb_penelitian_list = new tb_penelitian_list();

// Run the page
$tb_penelitian_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_penelitian_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_penelitian->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ftb_penelitianlist = currentForm = new ew.Form("ftb_penelitianlist", "list");
ftb_penelitianlist.formKeyCountName = '<?php echo $tb_penelitian_list->FormKeyCountName ?>';

// Form_CustomValidate event
ftb_penelitianlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_penelitianlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_penelitianlist.lists["x_NIDN"] = <?php echo $tb_penelitian_list->NIDN->Lookup->toClientList() ?>;
ftb_penelitianlist.lists["x_NIDN"].options = <?php echo JsonEncode($tb_penelitian_list->NIDN->lookupOptions()) ?>;
ftb_penelitianlist.autoSuggests["x_NIDN"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_penelitianlist.lists["x_id_jurusan"] = <?php echo $tb_penelitian_list->id_jurusan->Lookup->toClientList() ?>;
ftb_penelitianlist.lists["x_id_jurusan"].options = <?php echo JsonEncode($tb_penelitian_list->id_jurusan->options(FALSE, TRUE)) ?>;
ftb_penelitianlist.lists["x_status"] = <?php echo $tb_penelitian_list->status->Lookup->toClientList() ?>;
ftb_penelitianlist.lists["x_status"].options = <?php echo JsonEncode($tb_penelitian_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var ftb_penelitianlistsrch = currentSearchForm = new ew.Form("ftb_penelitianlistsrch");

// Filters
ftb_penelitianlistsrch.filterList = <?php echo $tb_penelitian_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_penelitian->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tb_penelitian_list->TotalRecs > 0 && $tb_penelitian_list->ExportOptions->visible()) { ?>
<?php $tb_penelitian_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_penelitian_list->ImportOptions->visible()) { ?>
<?php $tb_penelitian_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_penelitian_list->SearchOptions->visible()) { ?>
<?php $tb_penelitian_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tb_penelitian_list->FilterOptions->visible()) { ?>
<?php $tb_penelitian_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tb_penelitian_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tb_penelitian->isExport() && !$tb_penelitian->CurrentAction) { ?>
<form name="ftb_penelitianlistsrch" id="ftb_penelitianlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($tb_penelitian_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ftb_penelitianlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tb_penelitian">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($tb_penelitian_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($tb_penelitian_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tb_penelitian_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tb_penelitian_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tb_penelitian_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tb_penelitian_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tb_penelitian_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $tb_penelitian_list->showPageHeader(); ?>
<?php
$tb_penelitian_list->showMessage();
?>
<?php if ($tb_penelitian_list->TotalRecs > 0 || $tb_penelitian->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tb_penelitian_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tb_penelitian">
<form name="ftb_penelitianlist" id="ftb_penelitianlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_penelitian_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_penelitian_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_penelitian">
<div id="gmp_tb_penelitian" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($tb_penelitian_list->TotalRecs > 0 || $tb_penelitian->isGridEdit()) { ?>
<table id="tbl_tb_penelitianlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tb_penelitian_list->RowType = ROWTYPE_HEADER;

// Render list options
$tb_penelitian_list->renderListOptions();

// Render list options (header, left)
$tb_penelitian_list->ListOptions->render("header", "left");
?>
<?php if ($tb_penelitian->NIDN->Visible) { // NIDN ?>
	<?php if ($tb_penelitian->sortUrl($tb_penelitian->NIDN) == "") { ?>
		<th data-name="NIDN" class="<?php echo $tb_penelitian->NIDN->headerCellClass() ?>"><div id="elh_tb_penelitian_NIDN" class="tb_penelitian_NIDN"><div class="ew-table-header-caption"><?php echo $tb_penelitian->NIDN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NIDN" class="<?php echo $tb_penelitian->NIDN->headerCellClass() ?>"><div><div id="elh_tb_penelitian_NIDN" class="tb_penelitian_NIDN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_penelitian->NIDN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_penelitian->NIDN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_penelitian->NIDN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_penelitian->id_jurusan->Visible) { // id_jurusan ?>
	<?php if ($tb_penelitian->sortUrl($tb_penelitian->id_jurusan) == "") { ?>
		<th data-name="id_jurusan" class="<?php echo $tb_penelitian->id_jurusan->headerCellClass() ?>"><div id="elh_tb_penelitian_id_jurusan" class="tb_penelitian_id_jurusan"><div class="ew-table-header-caption"><?php echo $tb_penelitian->id_jurusan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_jurusan" class="<?php echo $tb_penelitian->id_jurusan->headerCellClass() ?>"><div><div id="elh_tb_penelitian_id_jurusan" class="tb_penelitian_id_jurusan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_penelitian->id_jurusan->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_penelitian->id_jurusan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_penelitian->id_jurusan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_penelitian->judul->Visible) { // judul ?>
	<?php if ($tb_penelitian->sortUrl($tb_penelitian->judul) == "") { ?>
		<th data-name="judul" class="<?php echo $tb_penelitian->judul->headerCellClass() ?>"><div id="elh_tb_penelitian_judul" class="tb_penelitian_judul"><div class="ew-table-header-caption"><?php echo $tb_penelitian->judul->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="judul" class="<?php echo $tb_penelitian->judul->headerCellClass() ?>"><div><div id="elh_tb_penelitian_judul" class="tb_penelitian_judul">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_penelitian->judul->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_penelitian->judul->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_penelitian->judul->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_penelitian->tahun->Visible) { // tahun ?>
	<?php if ($tb_penelitian->sortUrl($tb_penelitian->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $tb_penelitian->tahun->headerCellClass() ?>"><div id="elh_tb_penelitian_tahun" class="tb_penelitian_tahun"><div class="ew-table-header-caption"><?php echo $tb_penelitian->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $tb_penelitian->tahun->headerCellClass() ?>"><div><div id="elh_tb_penelitian_tahun" class="tb_penelitian_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_penelitian->tahun->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_penelitian->tahun->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_penelitian->tahun->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_penelitian->status->Visible) { // status ?>
	<?php if ($tb_penelitian->sortUrl($tb_penelitian->status) == "") { ?>
		<th data-name="status" class="<?php echo $tb_penelitian->status->headerCellClass() ?>"><div id="elh_tb_penelitian_status" class="tb_penelitian_status"><div class="ew-table-header-caption"><?php echo $tb_penelitian->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $tb_penelitian->status->headerCellClass() ?>"><div><div id="elh_tb_penelitian_status" class="tb_penelitian_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_penelitian->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_penelitian->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_penelitian->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_penelitian->LP->Visible) { // LP ?>
	<?php if ($tb_penelitian->sortUrl($tb_penelitian->LP) == "") { ?>
		<th data-name="LP" class="<?php echo $tb_penelitian->LP->headerCellClass() ?>"><div id="elh_tb_penelitian_LP" class="tb_penelitian_LP"><div class="ew-table-header-caption"><?php echo $tb_penelitian->LP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LP" class="<?php echo $tb_penelitian->LP->headerCellClass() ?>"><div><div id="elh_tb_penelitian_LP" class="tb_penelitian_LP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_penelitian->LP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_penelitian->LP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_penelitian->LP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tb_penelitian_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tb_penelitian->ExportAll && $tb_penelitian->isExport()) {
	$tb_penelitian_list->StopRec = $tb_penelitian_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tb_penelitian_list->TotalRecs > $tb_penelitian_list->StartRec + $tb_penelitian_list->DisplayRecs - 1)
		$tb_penelitian_list->StopRec = $tb_penelitian_list->StartRec + $tb_penelitian_list->DisplayRecs - 1;
	else
		$tb_penelitian_list->StopRec = $tb_penelitian_list->TotalRecs;
}
$tb_penelitian_list->RecCnt = $tb_penelitian_list->StartRec - 1;
if ($tb_penelitian_list->Recordset && !$tb_penelitian_list->Recordset->EOF) {
	$tb_penelitian_list->Recordset->moveFirst();
	$selectLimit = $tb_penelitian_list->UseSelectLimit;
	if (!$selectLimit && $tb_penelitian_list->StartRec > 1)
		$tb_penelitian_list->Recordset->move($tb_penelitian_list->StartRec - 1);
} elseif (!$tb_penelitian->AllowAddDeleteRow && $tb_penelitian_list->StopRec == 0) {
	$tb_penelitian_list->StopRec = $tb_penelitian->GridAddRowCount;
}

// Initialize aggregate
$tb_penelitian->RowType = ROWTYPE_AGGREGATEINIT;
$tb_penelitian->resetAttributes();
$tb_penelitian_list->renderRow();
while ($tb_penelitian_list->RecCnt < $tb_penelitian_list->StopRec) {
	$tb_penelitian_list->RecCnt++;
	if ($tb_penelitian_list->RecCnt >= $tb_penelitian_list->StartRec) {
		$tb_penelitian_list->RowCnt++;

		// Set up key count
		$tb_penelitian_list->KeyCount = $tb_penelitian_list->RowIndex;

		// Init row class and style
		$tb_penelitian->resetAttributes();
		$tb_penelitian->CssClass = "";
		if ($tb_penelitian->isGridAdd()) {
		} else {
			$tb_penelitian_list->loadRowValues($tb_penelitian_list->Recordset); // Load row values
		}
		$tb_penelitian->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tb_penelitian->RowAttrs = array_merge($tb_penelitian->RowAttrs, array('data-rowindex'=>$tb_penelitian_list->RowCnt, 'id'=>'r' . $tb_penelitian_list->RowCnt . '_tb_penelitian', 'data-rowtype'=>$tb_penelitian->RowType));

		// Render row
		$tb_penelitian_list->renderRow();

		// Render list options
		$tb_penelitian_list->renderListOptions();
?>
	<tr<?php echo $tb_penelitian->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tb_penelitian_list->ListOptions->render("body", "left", $tb_penelitian_list->RowCnt);
?>
	<?php if ($tb_penelitian->NIDN->Visible) { // NIDN ?>
		<td data-name="NIDN"<?php echo $tb_penelitian->NIDN->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian_list->RowCnt ?>_tb_penelitian_NIDN" class="tb_penelitian_NIDN">
<span<?php echo $tb_penelitian->NIDN->viewAttributes() ?>>
<?php echo $tb_penelitian->NIDN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_penelitian->id_jurusan->Visible) { // id_jurusan ?>
		<td data-name="id_jurusan"<?php echo $tb_penelitian->id_jurusan->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian_list->RowCnt ?>_tb_penelitian_id_jurusan" class="tb_penelitian_id_jurusan">
<span<?php echo $tb_penelitian->id_jurusan->viewAttributes() ?>>
<?php echo $tb_penelitian->id_jurusan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_penelitian->judul->Visible) { // judul ?>
		<td data-name="judul"<?php echo $tb_penelitian->judul->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian_list->RowCnt ?>_tb_penelitian_judul" class="tb_penelitian_judul">
<span<?php echo $tb_penelitian->judul->viewAttributes() ?>>
<?php echo $tb_penelitian->judul->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_penelitian->tahun->Visible) { // tahun ?>
		<td data-name="tahun"<?php echo $tb_penelitian->tahun->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian_list->RowCnt ?>_tb_penelitian_tahun" class="tb_penelitian_tahun">
<span<?php echo $tb_penelitian->tahun->viewAttributes() ?>>
<?php echo $tb_penelitian->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_penelitian->status->Visible) { // status ?>
		<td data-name="status"<?php echo $tb_penelitian->status->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian_list->RowCnt ?>_tb_penelitian_status" class="tb_penelitian_status">
<span<?php echo $tb_penelitian->status->viewAttributes() ?>>
<?php echo $tb_penelitian->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_penelitian->LP->Visible) { // LP ?>
		<td data-name="LP"<?php echo $tb_penelitian->LP->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian_list->RowCnt ?>_tb_penelitian_LP" class="tb_penelitian_LP">
<span<?php echo $tb_penelitian->LP->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_penelitian->LP, $tb_penelitian->LP->getViewValue()) ?>
</span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tb_penelitian_list->ListOptions->render("body", "right", $tb_penelitian_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$tb_penelitian->isGridAdd())
		$tb_penelitian_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$tb_penelitian->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tb_penelitian_list->Recordset)
	$tb_penelitian_list->Recordset->Close();
?>
<?php if (!$tb_penelitian->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tb_penelitian->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($tb_penelitian_list->Pager)) $tb_penelitian_list->Pager = new PrevNextPager($tb_penelitian_list->StartRec, $tb_penelitian_list->DisplayRecs, $tb_penelitian_list->TotalRecs, $tb_penelitian_list->AutoHidePager) ?>
<?php if ($tb_penelitian_list->Pager->RecordCount > 0 && $tb_penelitian_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($tb_penelitian_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $tb_penelitian_list->pageUrl() ?>start=<?php echo $tb_penelitian_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($tb_penelitian_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $tb_penelitian_list->pageUrl() ?>start=<?php echo $tb_penelitian_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $tb_penelitian_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($tb_penelitian_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $tb_penelitian_list->pageUrl() ?>start=<?php echo $tb_penelitian_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($tb_penelitian_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $tb_penelitian_list->pageUrl() ?>start=<?php echo $tb_penelitian_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tb_penelitian_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($tb_penelitian_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tb_penelitian_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tb_penelitian_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tb_penelitian_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tb_penelitian_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tb_penelitian_list->TotalRecs == 0 && !$tb_penelitian->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tb_penelitian_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tb_penelitian_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_penelitian->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_penelitian_list->terminate();
?>