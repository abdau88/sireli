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
$tb_jurusan_list = new tb_jurusan_list();

// Run the page
$tb_jurusan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_jurusan_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_jurusan->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ftb_jurusanlist = currentForm = new ew.Form("ftb_jurusanlist", "list");
ftb_jurusanlist.formKeyCountName = '<?php echo $tb_jurusan_list->FormKeyCountName ?>';

// Form_CustomValidate event
ftb_jurusanlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_jurusanlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ftb_jurusanlistsrch = currentSearchForm = new ew.Form("ftb_jurusanlistsrch");

// Filters
ftb_jurusanlistsrch.filterList = <?php echo $tb_jurusan_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_jurusan->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tb_jurusan_list->TotalRecs > 0 && $tb_jurusan_list->ExportOptions->visible()) { ?>
<?php $tb_jurusan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_jurusan_list->ImportOptions->visible()) { ?>
<?php $tb_jurusan_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_jurusan_list->SearchOptions->visible()) { ?>
<?php $tb_jurusan_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tb_jurusan_list->FilterOptions->visible()) { ?>
<?php $tb_jurusan_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tb_jurusan_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tb_jurusan->isExport() && !$tb_jurusan->CurrentAction) { ?>
<form name="ftb_jurusanlistsrch" id="ftb_jurusanlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($tb_jurusan_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ftb_jurusanlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tb_jurusan">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($tb_jurusan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($tb_jurusan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tb_jurusan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tb_jurusan_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tb_jurusan_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tb_jurusan_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tb_jurusan_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $tb_jurusan_list->showPageHeader(); ?>
<?php
$tb_jurusan_list->showMessage();
?>
<?php if ($tb_jurusan_list->TotalRecs > 0 || $tb_jurusan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tb_jurusan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tb_jurusan">
<form name="ftb_jurusanlist" id="ftb_jurusanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_jurusan_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_jurusan_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_jurusan">
<div id="gmp_tb_jurusan" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($tb_jurusan_list->TotalRecs > 0 || $tb_jurusan->isGridEdit()) { ?>
<table id="tbl_tb_jurusanlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tb_jurusan_list->RowType = ROWTYPE_HEADER;

// Render list options
$tb_jurusan_list->renderListOptions();

// Render list options (header, left)
$tb_jurusan_list->ListOptions->render("header", "left");
?>
<?php if ($tb_jurusan->id_jurusan->Visible) { // id_jurusan ?>
	<?php if ($tb_jurusan->sortUrl($tb_jurusan->id_jurusan) == "") { ?>
		<th data-name="id_jurusan" class="<?php echo $tb_jurusan->id_jurusan->headerCellClass() ?>"><div id="elh_tb_jurusan_id_jurusan" class="tb_jurusan_id_jurusan"><div class="ew-table-header-caption"><?php echo $tb_jurusan->id_jurusan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_jurusan" class="<?php echo $tb_jurusan->id_jurusan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_jurusan->SortUrl($tb_jurusan->id_jurusan) ?>',1);"><div id="elh_tb_jurusan_id_jurusan" class="tb_jurusan_id_jurusan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_jurusan->id_jurusan->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_jurusan->id_jurusan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_jurusan->id_jurusan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_jurusan->jurusan->Visible) { // jurusan ?>
	<?php if ($tb_jurusan->sortUrl($tb_jurusan->jurusan) == "") { ?>
		<th data-name="jurusan" class="<?php echo $tb_jurusan->jurusan->headerCellClass() ?>"><div id="elh_tb_jurusan_jurusan" class="tb_jurusan_jurusan"><div class="ew-table-header-caption"><?php echo $tb_jurusan->jurusan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jurusan" class="<?php echo $tb_jurusan->jurusan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_jurusan->SortUrl($tb_jurusan->jurusan) ?>',1);"><div id="elh_tb_jurusan_jurusan" class="tb_jurusan_jurusan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_jurusan->jurusan->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_jurusan->jurusan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_jurusan->jurusan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tb_jurusan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tb_jurusan->ExportAll && $tb_jurusan->isExport()) {
	$tb_jurusan_list->StopRec = $tb_jurusan_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tb_jurusan_list->TotalRecs > $tb_jurusan_list->StartRec + $tb_jurusan_list->DisplayRecs - 1)
		$tb_jurusan_list->StopRec = $tb_jurusan_list->StartRec + $tb_jurusan_list->DisplayRecs - 1;
	else
		$tb_jurusan_list->StopRec = $tb_jurusan_list->TotalRecs;
}
$tb_jurusan_list->RecCnt = $tb_jurusan_list->StartRec - 1;
if ($tb_jurusan_list->Recordset && !$tb_jurusan_list->Recordset->EOF) {
	$tb_jurusan_list->Recordset->moveFirst();
	$selectLimit = $tb_jurusan_list->UseSelectLimit;
	if (!$selectLimit && $tb_jurusan_list->StartRec > 1)
		$tb_jurusan_list->Recordset->move($tb_jurusan_list->StartRec - 1);
} elseif (!$tb_jurusan->AllowAddDeleteRow && $tb_jurusan_list->StopRec == 0) {
	$tb_jurusan_list->StopRec = $tb_jurusan->GridAddRowCount;
}

// Initialize aggregate
$tb_jurusan->RowType = ROWTYPE_AGGREGATEINIT;
$tb_jurusan->resetAttributes();
$tb_jurusan_list->renderRow();
while ($tb_jurusan_list->RecCnt < $tb_jurusan_list->StopRec) {
	$tb_jurusan_list->RecCnt++;
	if ($tb_jurusan_list->RecCnt >= $tb_jurusan_list->StartRec) {
		$tb_jurusan_list->RowCnt++;

		// Set up key count
		$tb_jurusan_list->KeyCount = $tb_jurusan_list->RowIndex;

		// Init row class and style
		$tb_jurusan->resetAttributes();
		$tb_jurusan->CssClass = "";
		if ($tb_jurusan->isGridAdd()) {
		} else {
			$tb_jurusan_list->loadRowValues($tb_jurusan_list->Recordset); // Load row values
		}
		$tb_jurusan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tb_jurusan->RowAttrs = array_merge($tb_jurusan->RowAttrs, array('data-rowindex'=>$tb_jurusan_list->RowCnt, 'id'=>'r' . $tb_jurusan_list->RowCnt . '_tb_jurusan', 'data-rowtype'=>$tb_jurusan->RowType));

		// Render row
		$tb_jurusan_list->renderRow();

		// Render list options
		$tb_jurusan_list->renderListOptions();
?>
	<tr<?php echo $tb_jurusan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tb_jurusan_list->ListOptions->render("body", "left", $tb_jurusan_list->RowCnt);
?>
	<?php if ($tb_jurusan->id_jurusan->Visible) { // id_jurusan ?>
		<td data-name="id_jurusan"<?php echo $tb_jurusan->id_jurusan->cellAttributes() ?>>
<span id="el<?php echo $tb_jurusan_list->RowCnt ?>_tb_jurusan_id_jurusan" class="tb_jurusan_id_jurusan">
<span<?php echo $tb_jurusan->id_jurusan->viewAttributes() ?>>
<?php echo $tb_jurusan->id_jurusan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_jurusan->jurusan->Visible) { // jurusan ?>
		<td data-name="jurusan"<?php echo $tb_jurusan->jurusan->cellAttributes() ?>>
<span id="el<?php echo $tb_jurusan_list->RowCnt ?>_tb_jurusan_jurusan" class="tb_jurusan_jurusan">
<span<?php echo $tb_jurusan->jurusan->viewAttributes() ?>>
<?php echo $tb_jurusan->jurusan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tb_jurusan_list->ListOptions->render("body", "right", $tb_jurusan_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$tb_jurusan->isGridAdd())
		$tb_jurusan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$tb_jurusan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tb_jurusan_list->Recordset)
	$tb_jurusan_list->Recordset->Close();
?>
<?php if (!$tb_jurusan->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tb_jurusan->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($tb_jurusan_list->Pager)) $tb_jurusan_list->Pager = new PrevNextPager($tb_jurusan_list->StartRec, $tb_jurusan_list->DisplayRecs, $tb_jurusan_list->TotalRecs, $tb_jurusan_list->AutoHidePager) ?>
<?php if ($tb_jurusan_list->Pager->RecordCount > 0 && $tb_jurusan_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($tb_jurusan_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $tb_jurusan_list->pageUrl() ?>start=<?php echo $tb_jurusan_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($tb_jurusan_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $tb_jurusan_list->pageUrl() ?>start=<?php echo $tb_jurusan_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $tb_jurusan_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($tb_jurusan_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $tb_jurusan_list->pageUrl() ?>start=<?php echo $tb_jurusan_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($tb_jurusan_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $tb_jurusan_list->pageUrl() ?>start=<?php echo $tb_jurusan_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tb_jurusan_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($tb_jurusan_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tb_jurusan_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tb_jurusan_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tb_jurusan_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tb_jurusan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tb_jurusan_list->TotalRecs == 0 && !$tb_jurusan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tb_jurusan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tb_jurusan_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_jurusan->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_jurusan_list->terminate();
?>