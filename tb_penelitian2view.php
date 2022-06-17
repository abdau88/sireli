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
$tb_penelitian2_view = new tb_penelitian2_view();

// Run the page
$tb_penelitian2_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_penelitian2_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_penelitian2->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ftb_penelitian2view = currentForm = new ew.Form("ftb_penelitian2view", "view");

// Form_CustomValidate event
ftb_penelitian2view.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_penelitian2view.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_penelitian2view.lists["x_NIDN"] = <?php echo $tb_penelitian2_view->NIDN->Lookup->toClientList() ?>;
ftb_penelitian2view.lists["x_NIDN"].options = <?php echo JsonEncode($tb_penelitian2_view->NIDN->lookupOptions()) ?>;
ftb_penelitian2view.autoSuggests["x_NIDN"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_penelitian2view.lists["x_id_jurusan"] = <?php echo $tb_penelitian2_view->id_jurusan->Lookup->toClientList() ?>;
ftb_penelitian2view.lists["x_id_jurusan"].options = <?php echo JsonEncode($tb_penelitian2_view->id_jurusan->lookupOptions()) ?>;
ftb_penelitian2view.autoSuggests["x_id_jurusan"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_penelitian2view.lists["x_status"] = <?php echo $tb_penelitian2_view->status->Lookup->toClientList() ?>;
ftb_penelitian2view.lists["x_status"].options = <?php echo JsonEncode($tb_penelitian2_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_penelitian2->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tb_penelitian2_view->ExportOptions->render("body") ?>
<?php $tb_penelitian2_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tb_penelitian2_view->showPageHeader(); ?>
<?php
$tb_penelitian2_view->showMessage();
?>
<form name="ftb_penelitian2view" id="ftb_penelitian2view" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_penelitian2_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_penelitian2_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_penelitian2">
<input type="hidden" name="modal" value="<?php echo (int)$tb_penelitian2_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tb_penelitian2->id_penelitian->Visible) { // id_penelitian ?>
	<tr id="r_id_penelitian">
		<td class="<?php echo $tb_penelitian2_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian2_id_penelitian"><?php echo $tb_penelitian2->id_penelitian->caption() ?></span></td>
		<td data-name="id_penelitian"<?php echo $tb_penelitian2->id_penelitian->cellAttributes() ?>>
<span id="el_tb_penelitian2_id_penelitian">
<span<?php echo $tb_penelitian2->id_penelitian->viewAttributes() ?>>
<?php echo $tb_penelitian2->id_penelitian->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian2->NIDN->Visible) { // NIDN ?>
	<tr id="r_NIDN">
		<td class="<?php echo $tb_penelitian2_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian2_NIDN"><?php echo $tb_penelitian2->NIDN->caption() ?></span></td>
		<td data-name="NIDN"<?php echo $tb_penelitian2->NIDN->cellAttributes() ?>>
<span id="el_tb_penelitian2_NIDN">
<span<?php echo $tb_penelitian2->NIDN->viewAttributes() ?>>
<?php echo $tb_penelitian2->NIDN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian2->anggota1->Visible) { // anggota1 ?>
	<tr id="r_anggota1">
		<td class="<?php echo $tb_penelitian2_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian2_anggota1"><?php echo $tb_penelitian2->anggota1->caption() ?></span></td>
		<td data-name="anggota1"<?php echo $tb_penelitian2->anggota1->cellAttributes() ?>>
<span id="el_tb_penelitian2_anggota1">
<span<?php echo $tb_penelitian2->anggota1->viewAttributes() ?>>
<?php echo $tb_penelitian2->anggota1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian2->anggota2->Visible) { // anggota2 ?>
	<tr id="r_anggota2">
		<td class="<?php echo $tb_penelitian2_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian2_anggota2"><?php echo $tb_penelitian2->anggota2->caption() ?></span></td>
		<td data-name="anggota2"<?php echo $tb_penelitian2->anggota2->cellAttributes() ?>>
<span id="el_tb_penelitian2_anggota2">
<span<?php echo $tb_penelitian2->anggota2->viewAttributes() ?>>
<?php echo $tb_penelitian2->anggota2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian2->id_jurusan->Visible) { // id_jurusan ?>
	<tr id="r_id_jurusan">
		<td class="<?php echo $tb_penelitian2_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian2_id_jurusan"><?php echo $tb_penelitian2->id_jurusan->caption() ?></span></td>
		<td data-name="id_jurusan"<?php echo $tb_penelitian2->id_jurusan->cellAttributes() ?>>
<span id="el_tb_penelitian2_id_jurusan">
<span<?php echo $tb_penelitian2->id_jurusan->viewAttributes() ?>>
<?php echo $tb_penelitian2->id_jurusan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian2->judul->Visible) { // judul ?>
	<tr id="r_judul">
		<td class="<?php echo $tb_penelitian2_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian2_judul"><?php echo $tb_penelitian2->judul->caption() ?></span></td>
		<td data-name="judul"<?php echo $tb_penelitian2->judul->cellAttributes() ?>>
<span id="el_tb_penelitian2_judul">
<span<?php echo $tb_penelitian2->judul->viewAttributes() ?>>
<?php echo $tb_penelitian2->judul->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian2->biaya->Visible) { // biaya ?>
	<tr id="r_biaya">
		<td class="<?php echo $tb_penelitian2_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian2_biaya"><?php echo $tb_penelitian2->biaya->caption() ?></span></td>
		<td data-name="biaya"<?php echo $tb_penelitian2->biaya->cellAttributes() ?>>
<span id="el_tb_penelitian2_biaya">
<span<?php echo $tb_penelitian2->biaya->viewAttributes() ?>>
<?php echo $tb_penelitian2->biaya->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian2->tahun->Visible) { // tahun ?>
	<tr id="r_tahun">
		<td class="<?php echo $tb_penelitian2_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian2_tahun"><?php echo $tb_penelitian2->tahun->caption() ?></span></td>
		<td data-name="tahun"<?php echo $tb_penelitian2->tahun->cellAttributes() ?>>
<span id="el_tb_penelitian2_tahun">
<span<?php echo $tb_penelitian2->tahun->viewAttributes() ?>>
<?php echo $tb_penelitian2->tahun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian2->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $tb_penelitian2_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian2_status"><?php echo $tb_penelitian2->status->caption() ?></span></td>
		<td data-name="status"<?php echo $tb_penelitian2->status->cellAttributes() ?>>
<span id="el_tb_penelitian2_status">
<span<?php echo $tb_penelitian2->status->viewAttributes() ?>>
<?php echo $tb_penelitian2->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian2->LP->Visible) { // LP ?>
	<tr id="r_LP">
		<td class="<?php echo $tb_penelitian2_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian2_LP"><?php echo $tb_penelitian2->LP->caption() ?></span></td>
		<td data-name="LP"<?php echo $tb_penelitian2->LP->cellAttributes() ?>>
<span id="el_tb_penelitian2_LP">
<span<?php echo $tb_penelitian2->LP->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_penelitian2->LP, $tb_penelitian2->LP->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian2->LK->Visible) { // LK ?>
	<tr id="r_LK">
		<td class="<?php echo $tb_penelitian2_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian2_LK"><?php echo $tb_penelitian2->LK->caption() ?></span></td>
		<td data-name="LK"<?php echo $tb_penelitian2->LK->cellAttributes() ?>>
<span id="el_tb_penelitian2_LK">
<span<?php echo $tb_penelitian2->LK->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_penelitian2->LK, $tb_penelitian2->LK->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian2->output->Visible) { // output ?>
	<tr id="r_output">
		<td class="<?php echo $tb_penelitian2_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian2_output"><?php echo $tb_penelitian2->output->caption() ?></span></td>
		<td data-name="output"<?php echo $tb_penelitian2->output->cellAttributes() ?>>
<span id="el_tb_penelitian2_output">
<span<?php echo $tb_penelitian2->output->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_penelitian2->output, $tb_penelitian2->output->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian2->chr->Visible) { // chr ?>
	<tr id="r_chr">
		<td class="<?php echo $tb_penelitian2_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian2_chr"><?php echo $tb_penelitian2->chr->caption() ?></span></td>
		<td data-name="chr"<?php echo $tb_penelitian2->chr->cellAttributes() ?>>
<span id="el_tb_penelitian2_chr">
<span<?php echo $tb_penelitian2->chr->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_penelitian2->chr, $tb_penelitian2->chr->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian2->surat_tugas->Visible) { // surat_tugas ?>
	<tr id="r_surat_tugas">
		<td class="<?php echo $tb_penelitian2_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian2_surat_tugas"><?php echo $tb_penelitian2->surat_tugas->caption() ?></span></td>
		<td data-name="surat_tugas"<?php echo $tb_penelitian2->surat_tugas->cellAttributes() ?>>
<span id="el_tb_penelitian2_surat_tugas">
<span<?php echo $tb_penelitian2->surat_tugas->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_penelitian2->surat_tugas, $tb_penelitian2->surat_tugas->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_penelitian2->sk->Visible) { // sk ?>
	<tr id="r_sk">
		<td class="<?php echo $tb_penelitian2_view->TableLeftColumnClass ?>"><span id="elh_tb_penelitian2_sk"><?php echo $tb_penelitian2->sk->caption() ?></span></td>
		<td data-name="sk"<?php echo $tb_penelitian2->sk->cellAttributes() ?>>
<span id="el_tb_penelitian2_sk">
<span<?php echo $tb_penelitian2->sk->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_penelitian2->sk, $tb_penelitian2->sk->getViewValue()) ?>
</span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$tb_penelitian2_view->showPageFooter();
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
$tb_penelitian2_view->terminate();
?>