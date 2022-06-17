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
$tb_dosen_list = new tb_dosen_list();

// Run the page
$tb_dosen_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_dosen_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_dosen->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ftb_dosenlist = currentForm = new ew.Form("ftb_dosenlist", "list");
ftb_dosenlist.formKeyCountName = '<?php echo $tb_dosen_list->FormKeyCountName ?>';

// Form_CustomValidate event
ftb_dosenlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_dosenlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_dosenlist.lists["x_id_jurusan"] = <?php echo $tb_dosen_list->id_jurusan->Lookup->toClientList() ?>;
ftb_dosenlist.lists["x_id_jurusan"].options = <?php echo JsonEncode($tb_dosen_list->id_jurusan->options(FALSE, TRUE)) ?>;

// Form object for search
var ftb_dosenlistsrch = currentSearchForm = new ew.Form("ftb_dosenlistsrch");

// Filters
ftb_dosenlistsrch.filterList = <?php echo $tb_dosen_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_dosen->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tb_dosen_list->TotalRecs > 0 && $tb_dosen_list->ExportOptions->visible()) { ?>
<?php $tb_dosen_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_dosen_list->ImportOptions->visible()) { ?>
<?php $tb_dosen_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_dosen_list->SearchOptions->visible()) { ?>
<?php $tb_dosen_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tb_dosen_list->FilterOptions->visible()) { ?>
<?php $tb_dosen_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tb_dosen_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$tb_dosen->isExport() && !$tb_dosen->CurrentAction) { ?>
<form name="ftb_dosenlistsrch" id="ftb_dosenlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($tb_dosen_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ftb_dosenlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tb_dosen">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($tb_dosen_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($tb_dosen_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tb_dosen_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tb_dosen_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tb_dosen_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tb_dosen_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tb_dosen_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $tb_dosen_list->showPageHeader(); ?>
<?php
$tb_dosen_list->showMessage();
?>
<?php if ($tb_dosen_list->TotalRecs > 0 || $tb_dosen->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tb_dosen_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tb_dosen">
<form name="ftb_dosenlist" id="ftb_dosenlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_dosen_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_dosen_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_dosen">
<div id="gmp_tb_dosen" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($tb_dosen_list->TotalRecs > 0 || $tb_dosen->isGridEdit()) { ?>
<table id="tbl_tb_dosenlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tb_dosen_list->RowType = ROWTYPE_HEADER;

// Render list options
$tb_dosen_list->renderListOptions();

// Render list options (header, left)
$tb_dosen_list->ListOptions->render("header", "left");
?>
<?php if ($tb_dosen->NIDN->Visible) { // NIDN ?>
	<?php if ($tb_dosen->sortUrl($tb_dosen->NIDN) == "") { ?>
		<th data-name="NIDN" class="<?php echo $tb_dosen->NIDN->headerCellClass() ?>"><div id="elh_tb_dosen_NIDN" class="tb_dosen_NIDN"><div class="ew-table-header-caption"><?php echo $tb_dosen->NIDN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NIDN" class="<?php echo $tb_dosen->NIDN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_dosen->SortUrl($tb_dosen->NIDN) ?>',1);"><div id="elh_tb_dosen_NIDN" class="tb_dosen_NIDN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_dosen->NIDN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_dosen->NIDN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_dosen->NIDN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_dosen->NPAK_NIP->Visible) { // NPAK_NIP ?>
	<?php if ($tb_dosen->sortUrl($tb_dosen->NPAK_NIP) == "") { ?>
		<th data-name="NPAK_NIP" class="<?php echo $tb_dosen->NPAK_NIP->headerCellClass() ?>"><div id="elh_tb_dosen_NPAK_NIP" class="tb_dosen_NPAK_NIP"><div class="ew-table-header-caption"><?php echo $tb_dosen->NPAK_NIP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NPAK_NIP" class="<?php echo $tb_dosen->NPAK_NIP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_dosen->SortUrl($tb_dosen->NPAK_NIP) ?>',1);"><div id="elh_tb_dosen_NPAK_NIP" class="tb_dosen_NPAK_NIP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_dosen->NPAK_NIP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_dosen->NPAK_NIP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_dosen->NPAK_NIP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_dosen->Nama_Dosen->Visible) { // Nama_Dosen ?>
	<?php if ($tb_dosen->sortUrl($tb_dosen->Nama_Dosen) == "") { ?>
		<th data-name="Nama_Dosen" class="<?php echo $tb_dosen->Nama_Dosen->headerCellClass() ?>"><div id="elh_tb_dosen_Nama_Dosen" class="tb_dosen_Nama_Dosen"><div class="ew-table-header-caption"><?php echo $tb_dosen->Nama_Dosen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama_Dosen" class="<?php echo $tb_dosen->Nama_Dosen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_dosen->SortUrl($tb_dosen->Nama_Dosen) ?>',1);"><div id="elh_tb_dosen_Nama_Dosen" class="tb_dosen_Nama_Dosen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_dosen->Nama_Dosen->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_dosen->Nama_Dosen->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_dosen->Nama_Dosen->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_dosen->id_jurusan->Visible) { // id_jurusan ?>
	<?php if ($tb_dosen->sortUrl($tb_dosen->id_jurusan) == "") { ?>
		<th data-name="id_jurusan" class="<?php echo $tb_dosen->id_jurusan->headerCellClass() ?>"><div id="elh_tb_dosen_id_jurusan" class="tb_dosen_id_jurusan"><div class="ew-table-header-caption"><?php echo $tb_dosen->id_jurusan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_jurusan" class="<?php echo $tb_dosen->id_jurusan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_dosen->SortUrl($tb_dosen->id_jurusan) ?>',1);"><div id="elh_tb_dosen_id_jurusan" class="tb_dosen_id_jurusan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_dosen->id_jurusan->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_dosen->id_jurusan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_dosen->id_jurusan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_dosen->_email->Visible) { // email ?>
	<?php if ($tb_dosen->sortUrl($tb_dosen->_email) == "") { ?>
		<th data-name="_email" class="<?php echo $tb_dosen->_email->headerCellClass() ?>"><div id="elh_tb_dosen__email" class="tb_dosen__email"><div class="ew-table-header-caption"><?php echo $tb_dosen->_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_email" class="<?php echo $tb_dosen->_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_dosen->SortUrl($tb_dosen->_email) ?>',1);"><div id="elh_tb_dosen__email" class="tb_dosen__email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_dosen->_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_dosen->_email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_dosen->_email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_dosen->no_hp->Visible) { // no_hp ?>
	<?php if ($tb_dosen->sortUrl($tb_dosen->no_hp) == "") { ?>
		<th data-name="no_hp" class="<?php echo $tb_dosen->no_hp->headerCellClass() ?>"><div id="elh_tb_dosen_no_hp" class="tb_dosen_no_hp"><div class="ew-table-header-caption"><?php echo $tb_dosen->no_hp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="no_hp" class="<?php echo $tb_dosen->no_hp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_dosen->SortUrl($tb_dosen->no_hp) ?>',1);"><div id="elh_tb_dosen_no_hp" class="tb_dosen_no_hp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_dosen->no_hp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_dosen->no_hp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_dosen->no_hp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tb_dosen_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tb_dosen->ExportAll && $tb_dosen->isExport()) {
	$tb_dosen_list->StopRec = $tb_dosen_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tb_dosen_list->TotalRecs > $tb_dosen_list->StartRec + $tb_dosen_list->DisplayRecs - 1)
		$tb_dosen_list->StopRec = $tb_dosen_list->StartRec + $tb_dosen_list->DisplayRecs - 1;
	else
		$tb_dosen_list->StopRec = $tb_dosen_list->TotalRecs;
}
$tb_dosen_list->RecCnt = $tb_dosen_list->StartRec - 1;
if ($tb_dosen_list->Recordset && !$tb_dosen_list->Recordset->EOF) {
	$tb_dosen_list->Recordset->moveFirst();
	$selectLimit = $tb_dosen_list->UseSelectLimit;
	if (!$selectLimit && $tb_dosen_list->StartRec > 1)
		$tb_dosen_list->Recordset->move($tb_dosen_list->StartRec - 1);
} elseif (!$tb_dosen->AllowAddDeleteRow && $tb_dosen_list->StopRec == 0) {
	$tb_dosen_list->StopRec = $tb_dosen->GridAddRowCount;
}

// Initialize aggregate
$tb_dosen->RowType = ROWTYPE_AGGREGATEINIT;
$tb_dosen->resetAttributes();
$tb_dosen_list->renderRow();
while ($tb_dosen_list->RecCnt < $tb_dosen_list->StopRec) {
	$tb_dosen_list->RecCnt++;
	if ($tb_dosen_list->RecCnt >= $tb_dosen_list->StartRec) {
		$tb_dosen_list->RowCnt++;

		// Set up key count
		$tb_dosen_list->KeyCount = $tb_dosen_list->RowIndex;

		// Init row class and style
		$tb_dosen->resetAttributes();
		$tb_dosen->CssClass = "";
		if ($tb_dosen->isGridAdd()) {
		} else {
			$tb_dosen_list->loadRowValues($tb_dosen_list->Recordset); // Load row values
		}
		$tb_dosen->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tb_dosen->RowAttrs = array_merge($tb_dosen->RowAttrs, array('data-rowindex'=>$tb_dosen_list->RowCnt, 'id'=>'r' . $tb_dosen_list->RowCnt . '_tb_dosen', 'data-rowtype'=>$tb_dosen->RowType));

		// Render row
		$tb_dosen_list->renderRow();

		// Render list options
		$tb_dosen_list->renderListOptions();
?>
	<tr<?php echo $tb_dosen->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tb_dosen_list->ListOptions->render("body", "left", $tb_dosen_list->RowCnt);
?>
	<?php if ($tb_dosen->NIDN->Visible) { // NIDN ?>
		<td data-name="NIDN"<?php echo $tb_dosen->NIDN->cellAttributes() ?>>
<span id="el<?php echo $tb_dosen_list->RowCnt ?>_tb_dosen_NIDN" class="tb_dosen_NIDN">
<span<?php echo $tb_dosen->NIDN->viewAttributes() ?>>
<?php echo $tb_dosen->NIDN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_dosen->NPAK_NIP->Visible) { // NPAK_NIP ?>
		<td data-name="NPAK_NIP"<?php echo $tb_dosen->NPAK_NIP->cellAttributes() ?>>
<span id="el<?php echo $tb_dosen_list->RowCnt ?>_tb_dosen_NPAK_NIP" class="tb_dosen_NPAK_NIP">
<span<?php echo $tb_dosen->NPAK_NIP->viewAttributes() ?>>
<?php echo $tb_dosen->NPAK_NIP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_dosen->Nama_Dosen->Visible) { // Nama_Dosen ?>
		<td data-name="Nama_Dosen"<?php echo $tb_dosen->Nama_Dosen->cellAttributes() ?>>
<span id="el<?php echo $tb_dosen_list->RowCnt ?>_tb_dosen_Nama_Dosen" class="tb_dosen_Nama_Dosen">
<span<?php echo $tb_dosen->Nama_Dosen->viewAttributes() ?>>
<?php echo $tb_dosen->Nama_Dosen->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_dosen->id_jurusan->Visible) { // id_jurusan ?>
		<td data-name="id_jurusan"<?php echo $tb_dosen->id_jurusan->cellAttributes() ?>>
<span id="el<?php echo $tb_dosen_list->RowCnt ?>_tb_dosen_id_jurusan" class="tb_dosen_id_jurusan">
<span<?php echo $tb_dosen->id_jurusan->viewAttributes() ?>>
<?php echo $tb_dosen->id_jurusan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_dosen->_email->Visible) { // email ?>
		<td data-name="_email"<?php echo $tb_dosen->_email->cellAttributes() ?>>
<span id="el<?php echo $tb_dosen_list->RowCnt ?>_tb_dosen__email" class="tb_dosen__email">
<span<?php echo $tb_dosen->_email->viewAttributes() ?>>
<?php echo $tb_dosen->_email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_dosen->no_hp->Visible) { // no_hp ?>
		<td data-name="no_hp"<?php echo $tb_dosen->no_hp->cellAttributes() ?>>
<span id="el<?php echo $tb_dosen_list->RowCnt ?>_tb_dosen_no_hp" class="tb_dosen_no_hp">
<span<?php echo $tb_dosen->no_hp->viewAttributes() ?>>
<?php echo $tb_dosen->no_hp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tb_dosen_list->ListOptions->render("body", "right", $tb_dosen_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$tb_dosen->isGridAdd())
		$tb_dosen_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$tb_dosen->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tb_dosen_list->Recordset)
	$tb_dosen_list->Recordset->Close();
?>
<?php if (!$tb_dosen->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tb_dosen->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($tb_dosen_list->Pager)) $tb_dosen_list->Pager = new PrevNextPager($tb_dosen_list->StartRec, $tb_dosen_list->DisplayRecs, $tb_dosen_list->TotalRecs, $tb_dosen_list->AutoHidePager) ?>
<?php if ($tb_dosen_list->Pager->RecordCount > 0 && $tb_dosen_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($tb_dosen_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $tb_dosen_list->pageUrl() ?>start=<?php echo $tb_dosen_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($tb_dosen_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $tb_dosen_list->pageUrl() ?>start=<?php echo $tb_dosen_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $tb_dosen_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($tb_dosen_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $tb_dosen_list->pageUrl() ?>start=<?php echo $tb_dosen_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($tb_dosen_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $tb_dosen_list->pageUrl() ?>start=<?php echo $tb_dosen_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tb_dosen_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($tb_dosen_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tb_dosen_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tb_dosen_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tb_dosen_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tb_dosen_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tb_dosen_list->TotalRecs == 0 && !$tb_dosen->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tb_dosen_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tb_dosen_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_dosen->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_dosen_list->terminate();
?>