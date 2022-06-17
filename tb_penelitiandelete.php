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
$tb_penelitian_delete = new tb_penelitian_delete();

// Run the page
$tb_penelitian_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_penelitian_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftb_penelitiandelete = currentForm = new ew.Form("ftb_penelitiandelete", "delete");

// Form_CustomValidate event
ftb_penelitiandelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_penelitiandelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_penelitiandelete.lists["x_NIDN"] = <?php echo $tb_penelitian_delete->NIDN->Lookup->toClientList() ?>;
ftb_penelitiandelete.lists["x_NIDN"].options = <?php echo JsonEncode($tb_penelitian_delete->NIDN->lookupOptions()) ?>;
ftb_penelitiandelete.autoSuggests["x_NIDN"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_penelitiandelete.lists["x_id_jurusan"] = <?php echo $tb_penelitian_delete->id_jurusan->Lookup->toClientList() ?>;
ftb_penelitiandelete.lists["x_id_jurusan"].options = <?php echo JsonEncode($tb_penelitian_delete->id_jurusan->options(FALSE, TRUE)) ?>;
ftb_penelitiandelete.lists["x_status"] = <?php echo $tb_penelitian_delete->status->Lookup->toClientList() ?>;
ftb_penelitiandelete.lists["x_status"].options = <?php echo JsonEncode($tb_penelitian_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_penelitian_delete->showPageHeader(); ?>
<?php
$tb_penelitian_delete->showMessage();
?>
<form name="ftb_penelitiandelete" id="ftb_penelitiandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_penelitian_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_penelitian_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_penelitian">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tb_penelitian_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tb_penelitian->NIDN->Visible) { // NIDN ?>
		<th class="<?php echo $tb_penelitian->NIDN->headerCellClass() ?>"><span id="elh_tb_penelitian_NIDN" class="tb_penelitian_NIDN"><?php echo $tb_penelitian->NIDN->caption() ?></span></th>
<?php } ?>
<?php if ($tb_penelitian->id_jurusan->Visible) { // id_jurusan ?>
		<th class="<?php echo $tb_penelitian->id_jurusan->headerCellClass() ?>"><span id="elh_tb_penelitian_id_jurusan" class="tb_penelitian_id_jurusan"><?php echo $tb_penelitian->id_jurusan->caption() ?></span></th>
<?php } ?>
<?php if ($tb_penelitian->judul->Visible) { // judul ?>
		<th class="<?php echo $tb_penelitian->judul->headerCellClass() ?>"><span id="elh_tb_penelitian_judul" class="tb_penelitian_judul"><?php echo $tb_penelitian->judul->caption() ?></span></th>
<?php } ?>
<?php if ($tb_penelitian->tahun->Visible) { // tahun ?>
		<th class="<?php echo $tb_penelitian->tahun->headerCellClass() ?>"><span id="elh_tb_penelitian_tahun" class="tb_penelitian_tahun"><?php echo $tb_penelitian->tahun->caption() ?></span></th>
<?php } ?>
<?php if ($tb_penelitian->status->Visible) { // status ?>
		<th class="<?php echo $tb_penelitian->status->headerCellClass() ?>"><span id="elh_tb_penelitian_status" class="tb_penelitian_status"><?php echo $tb_penelitian->status->caption() ?></span></th>
<?php } ?>
<?php if ($tb_penelitian->LP->Visible) { // LP ?>
		<th class="<?php echo $tb_penelitian->LP->headerCellClass() ?>"><span id="elh_tb_penelitian_LP" class="tb_penelitian_LP"><?php echo $tb_penelitian->LP->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tb_penelitian_delete->RecCnt = 0;
$i = 0;
while (!$tb_penelitian_delete->Recordset->EOF) {
	$tb_penelitian_delete->RecCnt++;
	$tb_penelitian_delete->RowCnt++;

	// Set row properties
	$tb_penelitian->resetAttributes();
	$tb_penelitian->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tb_penelitian_delete->loadRowValues($tb_penelitian_delete->Recordset);

	// Render row
	$tb_penelitian_delete->renderRow();
?>
	<tr<?php echo $tb_penelitian->rowAttributes() ?>>
<?php if ($tb_penelitian->NIDN->Visible) { // NIDN ?>
		<td<?php echo $tb_penelitian->NIDN->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian_delete->RowCnt ?>_tb_penelitian_NIDN" class="tb_penelitian_NIDN">
<span<?php echo $tb_penelitian->NIDN->viewAttributes() ?>>
<?php echo $tb_penelitian->NIDN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_penelitian->id_jurusan->Visible) { // id_jurusan ?>
		<td<?php echo $tb_penelitian->id_jurusan->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian_delete->RowCnt ?>_tb_penelitian_id_jurusan" class="tb_penelitian_id_jurusan">
<span<?php echo $tb_penelitian->id_jurusan->viewAttributes() ?>>
<?php echo $tb_penelitian->id_jurusan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_penelitian->judul->Visible) { // judul ?>
		<td<?php echo $tb_penelitian->judul->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian_delete->RowCnt ?>_tb_penelitian_judul" class="tb_penelitian_judul">
<span<?php echo $tb_penelitian->judul->viewAttributes() ?>>
<?php echo $tb_penelitian->judul->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_penelitian->tahun->Visible) { // tahun ?>
		<td<?php echo $tb_penelitian->tahun->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian_delete->RowCnt ?>_tb_penelitian_tahun" class="tb_penelitian_tahun">
<span<?php echo $tb_penelitian->tahun->viewAttributes() ?>>
<?php echo $tb_penelitian->tahun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_penelitian->status->Visible) { // status ?>
		<td<?php echo $tb_penelitian->status->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian_delete->RowCnt ?>_tb_penelitian_status" class="tb_penelitian_status">
<span<?php echo $tb_penelitian->status->viewAttributes() ?>>
<?php echo $tb_penelitian->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_penelitian->LP->Visible) { // LP ?>
		<td<?php echo $tb_penelitian->LP->cellAttributes() ?>>
<span id="el<?php echo $tb_penelitian_delete->RowCnt ?>_tb_penelitian_LP" class="tb_penelitian_LP">
<span<?php echo $tb_penelitian->LP->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_penelitian->LP, $tb_penelitian->LP->getViewValue()) ?>
</span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tb_penelitian_delete->Recordset->moveNext();
}
$tb_penelitian_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_penelitian_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tb_penelitian_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_penelitian_delete->terminate();
?>