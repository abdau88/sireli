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
$tb_pengabdian2_delete = new tb_pengabdian2_delete();

// Run the page
$tb_pengabdian2_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_pengabdian2_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftb_pengabdian2delete = currentForm = new ew.Form("ftb_pengabdian2delete", "delete");

// Form_CustomValidate event
ftb_pengabdian2delete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_pengabdian2delete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_pengabdian2delete.lists["x_NIDN"] = <?php echo $tb_pengabdian2_delete->NIDN->Lookup->toClientList() ?>;
ftb_pengabdian2delete.lists["x_NIDN"].options = <?php echo JsonEncode($tb_pengabdian2_delete->NIDN->lookupOptions()) ?>;
ftb_pengabdian2delete.autoSuggests["x_NIDN"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_pengabdian2delete.lists["x_status"] = <?php echo $tb_pengabdian2_delete->status->Lookup->toClientList() ?>;
ftb_pengabdian2delete.lists["x_status"].options = <?php echo JsonEncode($tb_pengabdian2_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_pengabdian2_delete->showPageHeader(); ?>
<?php
$tb_pengabdian2_delete->showMessage();
?>
<form name="ftb_pengabdian2delete" id="ftb_pengabdian2delete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_pengabdian2_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_pengabdian2_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_pengabdian2">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tb_pengabdian2_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tb_pengabdian2->NIDN->Visible) { // NIDN ?>
		<th class="<?php echo $tb_pengabdian2->NIDN->headerCellClass() ?>"><span id="elh_tb_pengabdian2_NIDN" class="tb_pengabdian2_NIDN"><?php echo $tb_pengabdian2->NIDN->caption() ?></span></th>
<?php } ?>
<?php if ($tb_pengabdian2->judul->Visible) { // judul ?>
		<th class="<?php echo $tb_pengabdian2->judul->headerCellClass() ?>"><span id="elh_tb_pengabdian2_judul" class="tb_pengabdian2_judul"><?php echo $tb_pengabdian2->judul->caption() ?></span></th>
<?php } ?>
<?php if ($tb_pengabdian2->biaya->Visible) { // biaya ?>
		<th class="<?php echo $tb_pengabdian2->biaya->headerCellClass() ?>"><span id="elh_tb_pengabdian2_biaya" class="tb_pengabdian2_biaya"><?php echo $tb_pengabdian2->biaya->caption() ?></span></th>
<?php } ?>
<?php if ($tb_pengabdian2->tahun->Visible) { // tahun ?>
		<th class="<?php echo $tb_pengabdian2->tahun->headerCellClass() ?>"><span id="elh_tb_pengabdian2_tahun" class="tb_pengabdian2_tahun"><?php echo $tb_pengabdian2->tahun->caption() ?></span></th>
<?php } ?>
<?php if ($tb_pengabdian2->status->Visible) { // status ?>
		<th class="<?php echo $tb_pengabdian2->status->headerCellClass() ?>"><span id="elh_tb_pengabdian2_status" class="tb_pengabdian2_status"><?php echo $tb_pengabdian2->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tb_pengabdian2_delete->RecCnt = 0;
$i = 0;
while (!$tb_pengabdian2_delete->Recordset->EOF) {
	$tb_pengabdian2_delete->RecCnt++;
	$tb_pengabdian2_delete->RowCnt++;

	// Set row properties
	$tb_pengabdian2->resetAttributes();
	$tb_pengabdian2->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tb_pengabdian2_delete->loadRowValues($tb_pengabdian2_delete->Recordset);

	// Render row
	$tb_pengabdian2_delete->renderRow();
?>
	<tr<?php echo $tb_pengabdian2->rowAttributes() ?>>
<?php if ($tb_pengabdian2->NIDN->Visible) { // NIDN ?>
		<td<?php echo $tb_pengabdian2->NIDN->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian2_delete->RowCnt ?>_tb_pengabdian2_NIDN" class="tb_pengabdian2_NIDN">
<span<?php echo $tb_pengabdian2->NIDN->viewAttributes() ?>>
<?php echo $tb_pengabdian2->NIDN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_pengabdian2->judul->Visible) { // judul ?>
		<td<?php echo $tb_pengabdian2->judul->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian2_delete->RowCnt ?>_tb_pengabdian2_judul" class="tb_pengabdian2_judul">
<span<?php echo $tb_pengabdian2->judul->viewAttributes() ?>>
<?php echo $tb_pengabdian2->judul->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_pengabdian2->biaya->Visible) { // biaya ?>
		<td<?php echo $tb_pengabdian2->biaya->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian2_delete->RowCnt ?>_tb_pengabdian2_biaya" class="tb_pengabdian2_biaya">
<span<?php echo $tb_pengabdian2->biaya->viewAttributes() ?>>
<?php echo $tb_pengabdian2->biaya->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_pengabdian2->tahun->Visible) { // tahun ?>
		<td<?php echo $tb_pengabdian2->tahun->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian2_delete->RowCnt ?>_tb_pengabdian2_tahun" class="tb_pengabdian2_tahun">
<span<?php echo $tb_pengabdian2->tahun->viewAttributes() ?>>
<?php echo $tb_pengabdian2->tahun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_pengabdian2->status->Visible) { // status ?>
		<td<?php echo $tb_pengabdian2->status->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian2_delete->RowCnt ?>_tb_pengabdian2_status" class="tb_pengabdian2_status">
<span<?php echo $tb_pengabdian2->status->viewAttributes() ?>>
<?php echo $tb_pengabdian2->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tb_pengabdian2_delete->Recordset->moveNext();
}
$tb_pengabdian2_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_pengabdian2_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tb_pengabdian2_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_pengabdian2_delete->terminate();
?>