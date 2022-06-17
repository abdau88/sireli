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
$tb_dosen_delete = new tb_dosen_delete();

// Run the page
$tb_dosen_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_dosen_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftb_dosendelete = currentForm = new ew.Form("ftb_dosendelete", "delete");

// Form_CustomValidate event
ftb_dosendelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_dosendelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_dosendelete.lists["x_id_jurusan"] = <?php echo $tb_dosen_delete->id_jurusan->Lookup->toClientList() ?>;
ftb_dosendelete.lists["x_id_jurusan"].options = <?php echo JsonEncode($tb_dosen_delete->id_jurusan->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_dosen_delete->showPageHeader(); ?>
<?php
$tb_dosen_delete->showMessage();
?>
<form name="ftb_dosendelete" id="ftb_dosendelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_dosen_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_dosen_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_dosen">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tb_dosen_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tb_dosen->NIDN->Visible) { // NIDN ?>
		<th class="<?php echo $tb_dosen->NIDN->headerCellClass() ?>"><span id="elh_tb_dosen_NIDN" class="tb_dosen_NIDN"><?php echo $tb_dosen->NIDN->caption() ?></span></th>
<?php } ?>
<?php if ($tb_dosen->NPAK_NIP->Visible) { // NPAK_NIP ?>
		<th class="<?php echo $tb_dosen->NPAK_NIP->headerCellClass() ?>"><span id="elh_tb_dosen_NPAK_NIP" class="tb_dosen_NPAK_NIP"><?php echo $tb_dosen->NPAK_NIP->caption() ?></span></th>
<?php } ?>
<?php if ($tb_dosen->Nama_Dosen->Visible) { // Nama_Dosen ?>
		<th class="<?php echo $tb_dosen->Nama_Dosen->headerCellClass() ?>"><span id="elh_tb_dosen_Nama_Dosen" class="tb_dosen_Nama_Dosen"><?php echo $tb_dosen->Nama_Dosen->caption() ?></span></th>
<?php } ?>
<?php if ($tb_dosen->id_jurusan->Visible) { // id_jurusan ?>
		<th class="<?php echo $tb_dosen->id_jurusan->headerCellClass() ?>"><span id="elh_tb_dosen_id_jurusan" class="tb_dosen_id_jurusan"><?php echo $tb_dosen->id_jurusan->caption() ?></span></th>
<?php } ?>
<?php if ($tb_dosen->_email->Visible) { // email ?>
		<th class="<?php echo $tb_dosen->_email->headerCellClass() ?>"><span id="elh_tb_dosen__email" class="tb_dosen__email"><?php echo $tb_dosen->_email->caption() ?></span></th>
<?php } ?>
<?php if ($tb_dosen->no_hp->Visible) { // no_hp ?>
		<th class="<?php echo $tb_dosen->no_hp->headerCellClass() ?>"><span id="elh_tb_dosen_no_hp" class="tb_dosen_no_hp"><?php echo $tb_dosen->no_hp->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tb_dosen_delete->RecCnt = 0;
$i = 0;
while (!$tb_dosen_delete->Recordset->EOF) {
	$tb_dosen_delete->RecCnt++;
	$tb_dosen_delete->RowCnt++;

	// Set row properties
	$tb_dosen->resetAttributes();
	$tb_dosen->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tb_dosen_delete->loadRowValues($tb_dosen_delete->Recordset);

	// Render row
	$tb_dosen_delete->renderRow();
?>
	<tr<?php echo $tb_dosen->rowAttributes() ?>>
<?php if ($tb_dosen->NIDN->Visible) { // NIDN ?>
		<td<?php echo $tb_dosen->NIDN->cellAttributes() ?>>
<span id="el<?php echo $tb_dosen_delete->RowCnt ?>_tb_dosen_NIDN" class="tb_dosen_NIDN">
<span<?php echo $tb_dosen->NIDN->viewAttributes() ?>>
<?php echo $tb_dosen->NIDN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_dosen->NPAK_NIP->Visible) { // NPAK_NIP ?>
		<td<?php echo $tb_dosen->NPAK_NIP->cellAttributes() ?>>
<span id="el<?php echo $tb_dosen_delete->RowCnt ?>_tb_dosen_NPAK_NIP" class="tb_dosen_NPAK_NIP">
<span<?php echo $tb_dosen->NPAK_NIP->viewAttributes() ?>>
<?php echo $tb_dosen->NPAK_NIP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_dosen->Nama_Dosen->Visible) { // Nama_Dosen ?>
		<td<?php echo $tb_dosen->Nama_Dosen->cellAttributes() ?>>
<span id="el<?php echo $tb_dosen_delete->RowCnt ?>_tb_dosen_Nama_Dosen" class="tb_dosen_Nama_Dosen">
<span<?php echo $tb_dosen->Nama_Dosen->viewAttributes() ?>>
<?php echo $tb_dosen->Nama_Dosen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_dosen->id_jurusan->Visible) { // id_jurusan ?>
		<td<?php echo $tb_dosen->id_jurusan->cellAttributes() ?>>
<span id="el<?php echo $tb_dosen_delete->RowCnt ?>_tb_dosen_id_jurusan" class="tb_dosen_id_jurusan">
<span<?php echo $tb_dosen->id_jurusan->viewAttributes() ?>>
<?php echo $tb_dosen->id_jurusan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_dosen->_email->Visible) { // email ?>
		<td<?php echo $tb_dosen->_email->cellAttributes() ?>>
<span id="el<?php echo $tb_dosen_delete->RowCnt ?>_tb_dosen__email" class="tb_dosen__email">
<span<?php echo $tb_dosen->_email->viewAttributes() ?>>
<?php echo $tb_dosen->_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_dosen->no_hp->Visible) { // no_hp ?>
		<td<?php echo $tb_dosen->no_hp->cellAttributes() ?>>
<span id="el<?php echo $tb_dosen_delete->RowCnt ?>_tb_dosen_no_hp" class="tb_dosen_no_hp">
<span<?php echo $tb_dosen->no_hp->viewAttributes() ?>>
<?php echo $tb_dosen->no_hp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tb_dosen_delete->Recordset->moveNext();
}
$tb_dosen_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_dosen_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tb_dosen_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_dosen_delete->terminate();
?>