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
$tb_pengabdian_view = new tb_pengabdian_view();

// Run the page
$tb_pengabdian_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_pengabdian_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_pengabdian->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ftb_pengabdianview = currentForm = new ew.Form("ftb_pengabdianview", "view");

// Form_CustomValidate event
ftb_pengabdianview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_pengabdianview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_pengabdianview.lists["x_NIDN"] = <?php echo $tb_pengabdian_view->NIDN->Lookup->toClientList() ?>;
ftb_pengabdianview.lists["x_NIDN"].options = <?php echo JsonEncode($tb_pengabdian_view->NIDN->lookupOptions()) ?>;
ftb_pengabdianview.autoSuggests["x_NIDN"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_pengabdianview.lists["x_anggota1"] = <?php echo $tb_pengabdian_view->anggota1->Lookup->toClientList() ?>;
ftb_pengabdianview.lists["x_anggota1"].options = <?php echo JsonEncode($tb_pengabdian_view->anggota1->lookupOptions()) ?>;
ftb_pengabdianview.autoSuggests["x_anggota1"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_pengabdianview.lists["x_anggota2"] = <?php echo $tb_pengabdian_view->anggota2->Lookup->toClientList() ?>;
ftb_pengabdianview.lists["x_anggota2"].options = <?php echo JsonEncode($tb_pengabdian_view->anggota2->lookupOptions()) ?>;
ftb_pengabdianview.autoSuggests["x_anggota2"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_pengabdianview.lists["x_anggota3"] = <?php echo $tb_pengabdian_view->anggota3->Lookup->toClientList() ?>;
ftb_pengabdianview.lists["x_anggota3"].options = <?php echo JsonEncode($tb_pengabdian_view->anggota3->lookupOptions()) ?>;
ftb_pengabdianview.autoSuggests["x_anggota3"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_pengabdianview.lists["x_anggota4"] = <?php echo $tb_pengabdian_view->anggota4->Lookup->toClientList() ?>;
ftb_pengabdianview.lists["x_anggota4"].options = <?php echo JsonEncode($tb_pengabdian_view->anggota4->lookupOptions()) ?>;
ftb_pengabdianview.autoSuggests["x_anggota4"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_pengabdian->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tb_pengabdian_view->ExportOptions->render("body") ?>
<?php $tb_pengabdian_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tb_pengabdian_view->showPageHeader(); ?>
<?php
$tb_pengabdian_view->showMessage();
?>
<form name="ftb_pengabdianview" id="ftb_pengabdianview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_pengabdian_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_pengabdian_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_pengabdian">
<input type="hidden" name="modal" value="<?php echo (int)$tb_pengabdian_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tb_pengabdian->NIDN->Visible) { // NIDN ?>
	<tr id="r_NIDN">
		<td class="<?php echo $tb_pengabdian_view->TableLeftColumnClass ?>"><span id="elh_tb_pengabdian_NIDN"><?php echo $tb_pengabdian->NIDN->caption() ?></span></td>
		<td data-name="NIDN"<?php echo $tb_pengabdian->NIDN->cellAttributes() ?>>
<span id="el_tb_pengabdian_NIDN">
<span<?php echo $tb_pengabdian->NIDN->viewAttributes() ?>>
<?php echo $tb_pengabdian->NIDN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_pengabdian->anggota1->Visible) { // anggota1 ?>
	<tr id="r_anggota1">
		<td class="<?php echo $tb_pengabdian_view->TableLeftColumnClass ?>"><span id="elh_tb_pengabdian_anggota1"><?php echo $tb_pengabdian->anggota1->caption() ?></span></td>
		<td data-name="anggota1"<?php echo $tb_pengabdian->anggota1->cellAttributes() ?>>
<span id="el_tb_pengabdian_anggota1">
<span<?php echo $tb_pengabdian->anggota1->viewAttributes() ?>>
<?php echo $tb_pengabdian->anggota1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_pengabdian->anggota2->Visible) { // anggota2 ?>
	<tr id="r_anggota2">
		<td class="<?php echo $tb_pengabdian_view->TableLeftColumnClass ?>"><span id="elh_tb_pengabdian_anggota2"><?php echo $tb_pengabdian->anggota2->caption() ?></span></td>
		<td data-name="anggota2"<?php echo $tb_pengabdian->anggota2->cellAttributes() ?>>
<span id="el_tb_pengabdian_anggota2">
<span<?php echo $tb_pengabdian->anggota2->viewAttributes() ?>>
<?php echo $tb_pengabdian->anggota2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_pengabdian->anggota3->Visible) { // anggota3 ?>
	<tr id="r_anggota3">
		<td class="<?php echo $tb_pengabdian_view->TableLeftColumnClass ?>"><span id="elh_tb_pengabdian_anggota3"><?php echo $tb_pengabdian->anggota3->caption() ?></span></td>
		<td data-name="anggota3"<?php echo $tb_pengabdian->anggota3->cellAttributes() ?>>
<span id="el_tb_pengabdian_anggota3">
<span<?php echo $tb_pengabdian->anggota3->viewAttributes() ?>>
<?php echo $tb_pengabdian->anggota3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_pengabdian->anggota4->Visible) { // anggota4 ?>
	<tr id="r_anggota4">
		<td class="<?php echo $tb_pengabdian_view->TableLeftColumnClass ?>"><span id="elh_tb_pengabdian_anggota4"><?php echo $tb_pengabdian->anggota4->caption() ?></span></td>
		<td data-name="anggota4"<?php echo $tb_pengabdian->anggota4->cellAttributes() ?>>
<span id="el_tb_pengabdian_anggota4">
<span<?php echo $tb_pengabdian->anggota4->viewAttributes() ?>>
<?php echo $tb_pengabdian->anggota4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_pengabdian->judul->Visible) { // judul ?>
	<tr id="r_judul">
		<td class="<?php echo $tb_pengabdian_view->TableLeftColumnClass ?>"><span id="elh_tb_pengabdian_judul"><?php echo $tb_pengabdian->judul->caption() ?></span></td>
		<td data-name="judul"<?php echo $tb_pengabdian->judul->cellAttributes() ?>>
<span id="el_tb_pengabdian_judul">
<span<?php echo $tb_pengabdian->judul->viewAttributes() ?>>
<?php echo $tb_pengabdian->judul->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_pengabdian->biaya->Visible) { // biaya ?>
	<tr id="r_biaya">
		<td class="<?php echo $tb_pengabdian_view->TableLeftColumnClass ?>"><span id="elh_tb_pengabdian_biaya"><?php echo $tb_pengabdian->biaya->caption() ?></span></td>
		<td data-name="biaya"<?php echo $tb_pengabdian->biaya->cellAttributes() ?>>
<span id="el_tb_pengabdian_biaya">
<span<?php echo $tb_pengabdian->biaya->viewAttributes() ?>>
<?php echo $tb_pengabdian->biaya->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_pengabdian->tahun->Visible) { // tahun ?>
	<tr id="r_tahun">
		<td class="<?php echo $tb_pengabdian_view->TableLeftColumnClass ?>"><span id="elh_tb_pengabdian_tahun"><?php echo $tb_pengabdian->tahun->caption() ?></span></td>
		<td data-name="tahun"<?php echo $tb_pengabdian->tahun->cellAttributes() ?>>
<span id="el_tb_pengabdian_tahun">
<span<?php echo $tb_pengabdian->tahun->viewAttributes() ?>>
<?php echo $tb_pengabdian->tahun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_pengabdian->LP2->Visible) { // LP2 ?>
	<tr id="r_LP2">
		<td class="<?php echo $tb_pengabdian_view->TableLeftColumnClass ?>"><span id="elh_tb_pengabdian_LP2"><?php echo $tb_pengabdian->LP2->caption() ?></span></td>
		<td data-name="LP2"<?php echo $tb_pengabdian->LP2->cellAttributes() ?>>
<span id="el_tb_pengabdian_LP2">
<span<?php echo $tb_pengabdian->LP2->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_pengabdian->LP2, $tb_pengabdian->LP2->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_pengabdian->LK->Visible) { // LK ?>
	<tr id="r_LK">
		<td class="<?php echo $tb_pengabdian_view->TableLeftColumnClass ?>"><span id="elh_tb_pengabdian_LK"><?php echo $tb_pengabdian->LK->caption() ?></span></td>
		<td data-name="LK"<?php echo $tb_pengabdian->LK->cellAttributes() ?>>
<span id="el_tb_pengabdian_LK">
<span<?php echo $tb_pengabdian->LK->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_pengabdian->LK, $tb_pengabdian->LK->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_pengabdian->output->Visible) { // output ?>
	<tr id="r_output">
		<td class="<?php echo $tb_pengabdian_view->TableLeftColumnClass ?>"><span id="elh_tb_pengabdian_output"><?php echo $tb_pengabdian->output->caption() ?></span></td>
		<td data-name="output"<?php echo $tb_pengabdian->output->cellAttributes() ?>>
<span id="el_tb_pengabdian_output">
<span<?php echo $tb_pengabdian->output->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_pengabdian->output, $tb_pengabdian->output->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_pengabdian->chr->Visible) { // chr ?>
	<tr id="r_chr">
		<td class="<?php echo $tb_pengabdian_view->TableLeftColumnClass ?>"><span id="elh_tb_pengabdian_chr"><?php echo $tb_pengabdian->chr->caption() ?></span></td>
		<td data-name="chr"<?php echo $tb_pengabdian->chr->cellAttributes() ?>>
<span id="el_tb_pengabdian_chr">
<span<?php echo $tb_pengabdian->chr->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_pengabdian->chr, $tb_pengabdian->chr->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_pengabdian->surat_tugas->Visible) { // surat_tugas ?>
	<tr id="r_surat_tugas">
		<td class="<?php echo $tb_pengabdian_view->TableLeftColumnClass ?>"><span id="elh_tb_pengabdian_surat_tugas"><?php echo $tb_pengabdian->surat_tugas->caption() ?></span></td>
		<td data-name="surat_tugas"<?php echo $tb_pengabdian->surat_tugas->cellAttributes() ?>>
<span id="el_tb_pengabdian_surat_tugas">
<span<?php echo $tb_pengabdian->surat_tugas->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_pengabdian->surat_tugas, $tb_pengabdian->surat_tugas->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_pengabdian->sk->Visible) { // sk ?>
	<tr id="r_sk">
		<td class="<?php echo $tb_pengabdian_view->TableLeftColumnClass ?>"><span id="elh_tb_pengabdian_sk"><?php echo $tb_pengabdian->sk->caption() ?></span></td>
		<td data-name="sk"<?php echo $tb_pengabdian->sk->cellAttributes() ?>>
<span id="el_tb_pengabdian_sk">
<span<?php echo $tb_pengabdian->sk->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_pengabdian->sk, $tb_pengabdian->sk->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$tb_pengabdian_view->IsModal) { ?>
<?php if (!$tb_pengabdian->isExport()) { ?>
<?php if (!isset($tb_pengabdian_view->Pager)) $tb_pengabdian_view->Pager = new PrevNextPager($tb_pengabdian_view->StartRec, $tb_pengabdian_view->DisplayRecs, $tb_pengabdian_view->TotalRecs, $tb_pengabdian_view->AutoHidePager) ?>
<?php if ($tb_pengabdian_view->Pager->RecordCount > 0 && $tb_pengabdian_view->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($tb_pengabdian_view->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $tb_pengabdian_view->pageUrl() ?>start=<?php echo $tb_pengabdian_view->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($tb_pengabdian_view->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $tb_pengabdian_view->pageUrl() ?>start=<?php echo $tb_pengabdian_view->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $tb_pengabdian_view->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($tb_pengabdian_view->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $tb_pengabdian_view->pageUrl() ?>start=<?php echo $tb_pengabdian_view->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($tb_pengabdian_view->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $tb_pengabdian_view->pageUrl() ?>start=<?php echo $tb_pengabdian_view->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tb_pengabdian_view->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$tb_pengabdian_view->showPageFooter();
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
$tb_pengabdian_view->terminate();
?>