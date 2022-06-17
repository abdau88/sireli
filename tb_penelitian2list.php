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
$tb_penelitian2_list = new tb_penelitian2_list();

// Run the page
$tb_penelitian2_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_penelitian2_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_penelitian2->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ftb_penelitian2list = currentForm = new ew.Form("ftb_penelitian2list", "list");
ftb_penelitian2list.formKeyCountName = '<?php echo $tb_penelitian2_list->FormKeyCountName ?>';

// Form_CustomValidate event
ftb_penelitian2list.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_penelitian2list.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_penelitian2list.lists["x_NIDN"] = <?php echo $tb_penelitian2_list->NIDN->Lookup->toClientList() ?>;
ftb_penelitian2list.lists["x_NIDN"].options = <?php echo JsonEncode($tb_penelitian2_list->NIDN->lookupOptions()) ?>;
ftb_penelitian2list.autoSuggests["x_NIDN"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_penelitian2list.lists["x_id_jurusan"] = <?php echo $tb_penelitian2_list->id_jurusan->Lookup->toClientList() ?>;
ftb_penelitian2list.lists["x_id_jurusan"].options = <?php echo JsonEncode($tb_penelitian2_list->id_jurusan->lookupOptions()) ?>;
ftb_penelitian2list.autoSuggests["x_id_jurusan"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_penelitian2list.lists["x_status"] = <?php echo $tb_penelitian2_list->status->Lookup->toClientList() ?>;
ftb_penelitian2list.lists["x_status"].options = <?php echo JsonEncode($tb_penelitian2_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var ftb_penelitian2listsrch = currentSearchForm = new ew.Form("ftb_penelitian2listsrch");

// Filters
ftb_penelitian2listsrch.filterList = <?php echo $tb_penelitian2_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_penelitian2->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tb_penelitian2_list->TotalRecs > 0 && $tb_penelitian2_list->ExportOptions->visible()) { ?>
<?php $tb_penelitian2_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_penelitian2_list->ImportOptions->visible()) { ?>
<?php $tb_penelitian2_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_penelitian2_list->SearchOptions->visible()) { ?>
<?php $tb_penelitian2_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tb_penelitian2_list->FilterOptions->visible()) { ?>
<?php $tb_penelitian2_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tb_penelitian2_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tb_penelitian2->isExport() && !$tb_penelitian2->CurrentAction) { ?>
<form name="ftb_penelitian2listsrch" id="ftb_penelitian2listsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($tb_penelitian2_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ftb_penelitian2listsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tb_penelitian2">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($tb_penelitian2_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($tb_penelitian2_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tb_penelitian2_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tb_penelitian2_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tb_penelitian2_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tb_penelitian2_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tb_penelitian2_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $tb_penelitian2_list->showPageHeader(); ?>
<?php
$tb_penelitian2_list->showMessage();
?>
<?php if ($tb_penelitian2_list->TotalRecs > 0 || $tb_penelitian2->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tb_penelitian2_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tb_penelitian2">
<form name="ftb_penelitian2list" id="ftb_penelitian2list" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_penelitian2_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_penelitian2_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_penelitian2">
<div id="gmp_tb_penelitian2" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($tb_penelitian2_list->TotalRecs > 0 || $tb_penelitian2->isGridEdit()) { ?>
<table id="tbl_tb_penelitian2list" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tb_penelitian2_list->RowType = ROWTYPE_HEADER;

// Render list options
$tb_penelitian2_list->renderListOptions();

// Render list options (header, left)
$tb_penelitian2_list->ListOptions->render("header", "left");
?>
<?php if ($tb_penelitian2->NIDN->Visible) { // NIDN ?>
	<?php if ($tb_penelitian2->sortUrl($tb_penelitian2->NIDN) == "") { ?>
		<th data-name="NIDN" class="<?php echo $tb_penelitian2->NIDN->headerCellClass() ?>"><div id="elh_tb_penelitian2_NIDN" class="tb_penelitian2_NIDN"><div class="ew-table-header-caption"><?php echo $tb_penelitian2->NIDN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NIDN" class="<?php echo $tb_penelitian2->NIDN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_penelitian2->SortUrl($tb_penelitian2->NIDN) ?>',1);"><div id="elh_tb_penelitian2_NIDN" class="tb_penelitian2_NIDN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_penelitian2->NIDN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_penelitian2->NIDN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_penelitian2->NIDN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_penelitian2->id_jurusan->Visible) { // id_jurusan ?>
	<?php if ($tb_penelitian2->sortUrl($tb_penelitian2->id_jurusan) == "") { ?>
		<th data-name="id_jurusan" class="<?php echo $tb_penelitian2->id_jurusan->headerCellClass() ?>"><div id="elh_tb_penelitian2_id_jurusan" class="tb_penelitian2_id_jurusan"><div class="ew-table-header-caption"><?php echo $tb_penelitian2->id_jurusan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_jurusan" class="<?php echo $tb_penelitian2->id_jurusan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_penelitian2->SortUrl($tb_penelitian2->id_jurusan) ?>',1);"><div id="elh_tb_penelitian2_id_jurusan" class="tb_penelitian2_id_jurusan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_penelitian2->id_jurusan->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_penelitian2->id_jurusan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_penelitian2->id_jurusan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_penelitian2->judul->Visible) { // judul ?>
	<?php if ($tb_penelitian2->sortUrl($tb_penelitian2->judul) == "") { ?>
		<th data-name="judul" class="<?php echo $tb_penelitian2->judul->headerCellClass() ?>"><div id="elh_tb_penelitian2_judul" class="tb_penelitian2_judul"><div class="ew-table-header-caption"><?php echo $tb_penelitian2->judul->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="judul" class="<?php echo $tb_penelitian2->judul->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_penelitian2->SortUrl($tb_penelitian2->judul) ?>',1);"><div id="elh_tb_penelitian2_judul" class="tb_penelitian2_judul">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_penelitian2->judul->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_penelitian2->judul->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_penelitian2->judul->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_penelitian2->biaya->Visible) { // biaya ?>
	<?php if ($tb_penelitian2->sortUrl($tb_penelitian2->biaya) == "") { ?>
		<th data-name="biaya" class="<?php echo $tb_penelitian2->biaya->headerCellClass() ?>"><div id="elh_tb_penelitian2_biaya" class="tb_penelitian2_biaya"><div class="ew-table-header-caption"><?php echo $tb_penelitian2->biaya->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="biaya" class="<?php echo $tb_penelitian2->biaya->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_penelitian2->SortUrl($tb_penelitian2->biaya) ?>',1);"><div id="elh_tb_penelitian2_biaya" class="tb_penelitian2_biaya">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_penelitian2->biaya->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_penelitian2->biaya->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_penelitian2->biaya->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_penelitian2->tahun->Visible) { // tahun ?>
	<?php if ($tb_penelitian2->sortUrl($tb_penelitian2->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $tb_penelitian2->tahun->headerCellClass() ?>"><div id="elh_tb_penelitian2_tahun" class="tb_penelitian2_tahun"><div class="ew-table-header-caption"><?php echo $tb_penelitian2->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $tb_penelitian2->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_penelitian2->SortUrl($tb_penelitian2->tahun) ?>',1);"><div id="elh_tb_penelitian2_tahun" class="tb_penelitian2_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_penelitian2->tahun->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_penelitian2->tahun->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_penelitian2->tahun->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_penelitian2->status->Visible) { // status ?>
	<?php if ($tb_penelitian2->sortUrl($tb_penelitian2->status) == "") { ?>
		<th data-name="status" class="<?php echo $tb_penelitian2->status->headerCellClass() ?>"><div id="elh_tb_penelitian2_status" class="tb_penelitian2_status"><div class="ew-table-header-caption"><?php echo $tb_penelitian2->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $tb_penelitian2->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_penelitian2->SortUrl($tb_penelitian2->status) ?>',1);"><div id="elh_tb_penelitian2_status" class="tb_penelitian2_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_penelitian2->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_penelitian2->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_penelitian2->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tb_penelitian2_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tb_penelitian2->ExportAll && $tb_penelitian2->isExport()) {
	$tb_penelitian2_list->StopRec = $tb_penelitian2_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tb_penelitian2_list->TotalRecs > $tb_penelitian2_list->StartRec + $tb_penelitian2_list->DisplayRecs - 1)
		$tb_penelitian2_list->StopRec = $tb_penelitian2_list->StartRec + $tb_penelitian2_list->DisplayRecs - 1;
	else
		$tb_penelitian2_list->StopRec = $tb_penelitian2_list->TotalRecs;
}
$tb_penelitian2_list->RecCnt = $tb_penelitian2_list->StartRec - 1;
if ($tb_penelitian2_list->Recordset && !$tb_penelitian2_list->Recordset->EOF) {
	$tb_penelitian2_list->Recordset->moveFirst();
	$selectLimit = $tb_penelitian2_list->UseSelectLimit;
	if (!$selectLimit && $tb_penelitian2_list->StartRec > 1)
		$tb_penelitian2_list->Recordset->move($tb_penelitian2_list->StartRec - 1);
} elseif (!$tb_penelitian2->AllowAddDeleteRow && $tb_penelitian2_list->StopRec == 0) {
	$tb_penelitian2_list->StopRec = $tb_penelitian2->GridAddRowCount;
}

// Initialize aggregate
$tb_penelitian2->RowType = ROWTYPE_AGGREGATEINIT;
$tb_penelitian2->resetAttributes();
$tb_penelitian2_list->renderRow();
while ($tb_penelitian2_list->RecCnt < $tb_penelitian2_list->StopRec) {
	$tb_penelitian2_list->RecCnt++;
	if ($tb_penelitian2_list->RecCnt >= $tb_penelitian2_list->StartRec) {
		$tb_penelitian2_list->RowCnt++;

		// Set up key count
		$tb_penelitian2_list->KeyCount = $tb_penelitian2_list->RowIndex;

		// Init row class and style
		$tb_penelitian2->resetAttributes();
		$tb_penelitian2->CssClass = "";
		if ($tb_penelitian2->isGridAdd()) {
		} else {
			$tb_penelitian2_list->loadRowValues($tb_penelitian2_list->Recordset); // Load row values
		}
		$tb_penelitian2->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tb_penelitian2->RowAttrs = array_merge($tb_penelitian2->RowAttrs, array('data-rowindex'=>$tb_penelitian2_list->RowCnt, 'id'=>'r' . $tb_penelitian2_list->RowCnt . '_tb_penelitian2', 'data-rowtype'=>$tb_penelitian2->RowType));

		// Render row
		$tb_penelitian2_list->renderRow();

		// Render list options
		$tb_penelitian2_list->renderListOptions();
?>
	<tr<?php echo $tb_penelitian2->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tb_penelitian2_list->ListOptions->render("body", "left", $tb_penelitian2_list->RowCnt);
?>
	<?php if ($tb_penelitian2->NIDN->Visible) { // NIDN ?>
		<td data-name="NIDN"<?php echo $tb_penelitian2->NIDN->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian2_list->RowCnt ?>_tb_penelitian2_NIDN" class="tb_penelitian2_NIDN">
<span<?php echo $tb_penelitian2->NIDN->viewAttributes() ?>>
<?php echo $tb_penelitian2->NIDN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_penelitian2->id_jurusan->Visible) { // id_jurusan ?>
		<td data-name="id_jurusan"<?php echo $tb_penelitian2->id_jurusan->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian2_list->RowCnt ?>_tb_penelitian2_id_jurusan" class="tb_penelitian2_id_jurusan">
<span<?php echo $tb_penelitian2->id_jurusan->viewAttributes() ?>>
<?php echo $tb_penelitian2->id_jurusan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_penelitian2->judul->Visible) { // judul ?>
		<td data-name="judul"<?php echo $tb_penelitian2->judul->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian2_list->RowCnt ?>_tb_penelitian2_judul" class="tb_penelitian2_judul">
<span<?php echo $tb_penelitian2->judul->viewAttributes() ?>>
<?php echo $tb_penelitian2->judul->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_penelitian2->biaya->Visible) { // biaya ?>
		<td data-name="biaya"<?php echo $tb_penelitian2->biaya->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian2_list->RowCnt ?>_tb_penelitian2_biaya" class="tb_penelitian2_biaya">
<span<?php echo $tb_penelitian2->biaya->viewAttributes() ?>>
<?php echo $tb_penelitian2->biaya->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_penelitian2->tahun->Visible) { // tahun ?>
		<td data-name="tahun"<?php echo $tb_penelitian2->tahun->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian2_list->RowCnt ?>_tb_penelitian2_tahun" class="tb_penelitian2_tahun">
<span<?php echo $tb_penelitian2->tahun->viewAttributes() ?>>
<?php echo $tb_penelitian2->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_penelitian2->status->Visible) { // status ?>
		<td data-name="status"<?php echo $tb_penelitian2->status->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian2_list->RowCnt ?>_tb_penelitian2_status" class="tb_penelitian2_status">
<span<?php echo $tb_penelitian2->status->viewAttributes() ?>>
<?php echo $tb_penelitian2->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tb_penelitian2_list->ListOptions->render("body", "right", $tb_penelitian2_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$tb_penelitian2->isGridAdd())
		$tb_penelitian2_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$tb_penelitian2->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tb_penelitian2_list->Recordset)
	$tb_penelitian2_list->Recordset->Close();
?>
<?php if (!$tb_penelitian2->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tb_penelitian2->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($tb_penelitian2_list->Pager)) $tb_penelitian2_list->Pager = new PrevNextPager($tb_penelitian2_list->StartRec, $tb_penelitian2_list->DisplayRecs, $tb_penelitian2_list->TotalRecs, $tb_penelitian2_list->AutoHidePager) ?>
<?php if ($tb_penelitian2_list->Pager->RecordCount > 0 && $tb_penelitian2_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($tb_penelitian2_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $tb_penelitian2_list->pageUrl() ?>start=<?php echo $tb_penelitian2_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($tb_penelitian2_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $tb_penelitian2_list->pageUrl() ?>start=<?php echo $tb_penelitian2_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $tb_penelitian2_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($tb_penelitian2_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $tb_penelitian2_list->pageUrl() ?>start=<?php echo $tb_penelitian2_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($tb_penelitian2_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $tb_penelitian2_list->pageUrl() ?>start=<?php echo $tb_penelitian2_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tb_penelitian2_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($tb_penelitian2_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tb_penelitian2_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tb_penelitian2_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tb_penelitian2_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tb_penelitian2_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tb_penelitian2_list->TotalRecs == 0 && !$tb_penelitian2->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tb_penelitian2_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tb_penelitian2_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_penelitian2->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_penelitian2_list->terminate();
?>