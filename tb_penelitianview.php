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
$tb_penelitian_view = new tb_penelitian_view();

// Run the page
$tb_penelitian_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_penelitian_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_penelitian->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ftb_penelitianview = currentForm = new ew.Form("ftb_penelitianview", "view");

// Form_CustomValidate event
ftb_penelitianview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_penelitianview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_penelitianview.lists["x_NIDN"] = <?php echo $tb_penelitian_view->NIDN->Lookup->toClientList() ?>;
ftb_penelitianview.lists["x_NIDN"].options = <?php echo JsonEncode($tb_penelitian_view->NIDN->lookupOptions()) ?>;
ftb_penelitianview.autoSuggests["x_NIDN"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_penelitianview.lists["x_anggota1"] = <?php echo $tb_penelitian_view->anggota1->Lookup->toClientList() ?>;
ftb_penelitianview.lists["x_anggota1"].options = <?php echo JsonEncode($tb_penelitian_view->anggota1->lookupOptions()) ?>;
ftb_penelitianview.autoSuggests["x_anggota1"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_penelitianview.lists["x_anggota2"] = <?php echo $tb_penelitian_view->anggota2->Lookup->toClientList() ?>;
ftb_penelitianview.lists["x_anggota2"].options = <?php echo JsonEncode($tb_penelitian_view->anggota2->lookupOptions()) ?>;
ftb_penelitianview.autoSuggests["x_anggota2"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_penelitianview.lists["x_id_jurusan"] = <?php echo $tb_penelitian_view->id_jurusan->Lookup->toClientList() ?>;
ftb_penelitianview.lists["x_id_jurusan"].options = <?php echo JsonEncode($tb_penelitian_view->id_jurusan->options(FALSE, TRUE)) ?>;
ftb_penelitianview.lists["x_status"] = <?php echo $tb_penelitian_view->status->Lookup->toClientList() ?>;
ftb_penelitianview.lists["x_status"].options = <?php echo JsonEncode($tb_penelitian_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_penelitian->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tb_penelitian_view->ExportOptions->render("body") ?>
<?php $tb_penelitian_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tb_penelitian_view->showPageHeader(); ?>
<?php
$tb_penelitian_view->showMessage();
?>
<form name="ftb_penelitianview" id="ftb_penelitianview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_penelitian_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_penelitian_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_penelitian">
<input type="hidden" name="modal" value="<?php echo (int)$tb_penelitian_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tb_penelitian->NIDN->Visible) { // NIDN ?>
	<tr id="r_NIDN">
		<td class="<?php echo $tb_penelitian_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian_NIDN"><?php echo $tb_penelitian->NIDN->caption() ?></span></td>
		<td data-name="NIDN"<?php echo $tb_penelitian->NIDN->cellAttributes() ?>>
<span id="el_tb_penelitian_NIDN">
<span<?php echo $tb_penelitian->NIDN->viewAttributes() ?>>
<?php echo $tb_penelitian->NIDN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian->anggota1->Visible) { // anggota1 ?>
	<tr id="r_anggota1">
		<td class="<?php echo $tb_penelitian_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian_anggota1"><?php echo $tb_penelitian->anggota1->caption() ?></span></td>
		<td data-name="anggota1"<?php echo $tb_penelitian->anggota1->cellAttributes() ?>>
<span id="el_tb_penelitian_anggota1">
<span<?php echo $tb_penelitian->anggota1->viewAttributes() ?>>
<?php echo $tb_penelitian->anggota1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian->anggota2->Visible) { // anggota2 ?>
	<tr id="r_anggota2">
		<td class="<?php echo $tb_penelitian_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian_anggota2"><?php echo $tb_penelitian->anggota2->caption() ?></span></td>
		<td data-name="anggota2"<?php echo $tb_penelitian->anggota2->cellAttributes() ?>>
<span id="el_tb_penelitian_anggota2">
<span<?php echo $tb_penelitian->anggota2->viewAttributes() ?>>
<?php echo $tb_penelitian->anggota2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian->id_jurusan->Visible) { // id_jurusan ?>
	<tr id="r_id_jurusan">
		<td class="<?php echo $tb_penelitian_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian_id_jurusan"><?php echo $tb_penelitian->id_jurusan->caption() ?></span></td>
		<td data-name="id_jurusan"<?php echo $tb_penelitian->id_jurusan->cellAttributes() ?>>
<span id="el_tb_penelitian_id_jurusan">
<span<?php echo $tb_penelitian->id_jurusan->viewAttributes() ?>>
<?php echo $tb_penelitian->id_jurusan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian->judul->Visible) { // judul ?>
	<tr id="r_judul">
		<td class="<?php echo $tb_penelitian_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian_judul"><?php echo $tb_penelitian->judul->caption() ?></span></td>
		<td data-name="judul"<?php echo $tb_penelitian->judul->cellAttributes() ?>>
<span id="el_tb_penelitian_judul">
<span<?php echo $tb_penelitian->judul->viewAttributes() ?>>
<?php echo $tb_penelitian->judul->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian->biaya->Visible) { // biaya ?>
	<tr id="r_biaya">
		<td class="<?php echo $tb_penelitian_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian_biaya"><?php echo $tb_penelitian->biaya->caption() ?></span></td>
		<td data-name="biaya"<?php echo $tb_penelitian->biaya->cellAttributes() ?>>
<span id="el_tb_penelitian_biaya">
<span<?php echo $tb_penelitian->biaya->viewAttributes() ?>>
<?php echo $tb_penelitian->biaya->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian->tahun->Visible) { // tahun ?>
	<tr id="r_tahun">
		<td class="<?php echo $tb_penelitian_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian_tahun"><?php echo $tb_penelitian->tahun->caption() ?></span></td>
		<td data-name="tahun"<?php echo $tb_penelitian->tahun->cellAttributes() ?>>
<span id="el_tb_penelitian_tahun">
<span<?php echo $tb_penelitian->tahun->viewAttributes() ?>>
<?php echo $tb_penelitian->tahun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $tb_penelitian_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian_status"><?php echo $tb_penelitian->status->caption() ?></span></td>
		<td data-name="status"<?php echo $tb_penelitian->status->cellAttributes() ?>>
<span id="el_tb_penelitian_status">
<span<?php echo $tb_penelitian->status->viewAttributes() ?>>
<?php echo $tb_penelitian->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian->LP->Visible) { // LP ?>
	<tr id="r_LP">
		<td class="<?php echo $tb_penelitian_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian_LP"><?php echo $tb_penelitian->LP->caption() ?></span></td>
		<td data-name="LP"<?php echo $tb_penelitian->LP->cellAttributes() ?>>
<span id="el_tb_penelitian_LP">
<span<?php echo $tb_penelitian->LP->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_penelitian->LP, $tb_penelitian->LP->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian->LK->Visible) { // LK ?>
	<tr id="r_LK">
		<td class="<?php echo $tb_penelitian_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian_LK"><?php echo $tb_penelitian->LK->caption() ?></span></td>
		<td data-name="LK"<?php echo $tb_penelitian->LK->cellAttributes() ?>>
<span id="el_tb_penelitian_LK">
<span<?php echo $tb_penelitian->LK->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_penelitian->LK, $tb_penelitian->LK->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian->output->Visible) { // output ?>
	<tr id="r_output">
		<td class="<?php echo $tb_penelitian_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian_output"><?php echo $tb_penelitian->output->caption() ?></span></td>
		<td data-name="output"<?php echo $tb_penelitian->output->cellAttributes() ?>>
<span id="el_tb_penelitian_output">
<span<?php echo $tb_penelitian->output->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_penelitian->output, $tb_penelitian->output->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian->sk->Visible) { // sk ?>
	<tr id="r_sk">
		<td class="<?php echo $tb_penelitian_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian_sk"><?php echo $tb_penelitian->sk->caption() ?></span></td>
		<td data-name="sk"<?php echo $tb_penelitian->sk->cellAttributes() ?>>
<span id="el_tb_penelitian_sk">
<span<?php echo $tb_penelitian->sk->viewAttributes() ?>>
<?php echo $tb_penelitian->sk->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$tb_penelitian_view->IsModal) { ?>
<?php if (!$tb_penelitian->isExport()) { ?>
<?php if (!isset($tb_penelitian_view->Pager)) $tb_penelitian_view->Pager = new PrevNextPager($tb_penelitian_view->StartRec, $tb_penelitian_view->DisplayRecs, $tb_penelitian_view->TotalRecs, $tb_penelitian_view->AutoHidePager) ?>
<?php if ($tb_penelitian_view->Pager->RecordCount > 0 && $tb_penelitian_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($tb_penelitian_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $tb_penelitian_view->pageUrl() ?>start=<?php echo $tb_penelitian_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($tb_penelitian_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $tb_penelitian_view->pageUrl() ?>start=<?php echo $tb_penelitian_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $tb_penelitian_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($tb_penelitian_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $tb_penelitian_view->pageUrl() ?>start=<?php echo $tb_penelitian_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($tb_penelitian_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $tb_penelitian_view->pageUrl() ?>start=<?php echo $tb_penelitian_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tb_penelitian_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$tb_penelitian_view->showPageFooter();
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
$tb_penelitian_view->terminate();
?>