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
$tb_dosen_view = new tb_dosen_view();

// Run the page
$tb_dosen_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_dosen_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_dosen->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ftb_dosenview = currentForm = new ew.Form("ftb_dosenview", "view");

// Form_CustomValidate event
ftb_dosenview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_dosenview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_dosenview.lists["x_id_jurusan"] = <?php echo $tb_dosen_view->id_jurusan->Lookup->toClientList() ?>;
ftb_dosenview.lists["x_id_jurusan"].options = <?php echo JsonEncode($tb_dosen_view->id_jurusan->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_dosen->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tb_dosen_view->ExportOptions->render("body") ?>
<?php $tb_dosen_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tb_dosen_view->showPageHeader(); ?>
<?php
$tb_dosen_view->showMessage();
?>
<form name="ftb_dosenview" id="ftb_dosenview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_dosen_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_dosen_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_dosen">
<input type="hidden" name="modal" value="<?php echo (int)$tb_dosen_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tb_dosen->NIDN->Visible) { // NIDN ?>
	<tr id="r_NIDN">
		<td class="<?php echo $tb_dosen_view->TableLeftColumnClass ?>"><span id="elh_tb_dosen_NIDN"><?php echo $tb_dosen->NIDN->caption() ?></span></td>
		<td data-name="NIDN"<?php echo $tb_dosen->NIDN->cellAttributes() ?>>
<span id="el_tb_dosen_NIDN">
<span<?php echo $tb_dosen->NIDN->viewAttributes() ?>>
<?php echo $tb_dosen->NIDN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_dosen->NPAK_NIP->Visible) { // NPAK_NIP ?>
	<tr id="r_NPAK_NIP">
		<td class="<?php echo $tb_dosen_view->TableLeftColumnClass ?>"><span id="elh_tb_dosen_NPAK_NIP"><?php echo $tb_dosen->NPAK_NIP->caption() ?></span></td>
		<td data-name="NPAK_NIP"<?php echo $tb_dosen->NPAK_NIP->cellAttributes() ?>>
<span id="el_tb_dosen_NPAK_NIP">
<span<?php echo $tb_dosen->NPAK_NIP->viewAttributes() ?>>
<?php echo $tb_dosen->NPAK_NIP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_dosen->Nama_Dosen->Visible) { // Nama_Dosen ?>
	<tr id="r_Nama_Dosen">
		<td class="<?php echo $tb_dosen_view->TableLeftColumnClass ?>"><span id="elh_tb_dosen_Nama_Dosen"><?php echo $tb_dosen->Nama_Dosen->caption() ?></span></td>
		<td data-name="Nama_Dosen"<?php echo $tb_dosen->Nama_Dosen->cellAttributes() ?>>
<span id="el_tb_dosen_Nama_Dosen">
<span<?php echo $tb_dosen->Nama_Dosen->viewAttributes() ?>>
<?php echo $tb_dosen->Nama_Dosen->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_dosen->id_jurusan->Visible) { // id_jurusan ?>
	<tr id="r_id_jurusan">
		<td class="<?php echo $tb_dosen_view->TableLeftColumnClass ?>"><span id="elh_tb_dosen_id_jurusan"><?php echo $tb_dosen->id_jurusan->caption() ?></span></td>
		<td data-name="id_jurusan"<?php echo $tb_dosen->id_jurusan->cellAttributes() ?>>
<span id="el_tb_dosen_id_jurusan">
<span<?php echo $tb_dosen->id_jurusan->viewAttributes() ?>>
<?php echo $tb_dosen->id_jurusan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_dosen->_email->Visible) { // email ?>
	<tr id="r__email">
		<td class="<?php echo $tb_dosen_view->TableLeftColumnClass ?>"><span id="elh_tb_dosen__email"><?php echo $tb_dosen->_email->caption() ?></span></td>
		<td data-name="_email"<?php echo $tb_dosen->_email->cellAttributes() ?>>
<span id="el_tb_dosen__email">
<span<?php echo $tb_dosen->_email->viewAttributes() ?>>
<?php echo $tb_dosen->_email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_dosen->no_hp->Visible) { // no_hp ?>
	<tr id="r_no_hp">
		<td class="<?php echo $tb_dosen_view->TableLeftColumnClass ?>"><span id="elh_tb_dosen_no_hp"><?php echo $tb_dosen->no_hp->caption() ?></span></td>
		<td data-name="no_hp"<?php echo $tb_dosen->no_hp->cellAttributes() ?>>
<span id="el_tb_dosen_no_hp">
<span<?php echo $tb_dosen->no_hp->viewAttributes() ?>>
<?php echo $tb_dosen->no_hp->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$tb_dosen_view->showPageFooter();
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
$tb_dosen_view->terminate();
?>