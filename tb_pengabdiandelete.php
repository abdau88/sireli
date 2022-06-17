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
$tb_pengabdian_delete = new tb_pengabdian_delete();

// Run the page
$tb_pengabdian_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_pengabdian_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftb_pengabdiandelete = currentForm = new ew.Form("ftb_pengabdiandelete", "delete");

// Form_CustomValidate event
ftb_pengabdiandelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_pengabdiandelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_pengabdiandelete.lists["x_NIDN"] = <?php echo $tb_pengabdian_delete->NIDN->Lookup->toClientList() ?>;
ftb_pengabdiandelete.lists["x_NIDN"].options = <?php echo JsonEncode($tb_pengabdian_delete->NIDN->lookupOptions()) ?>;
ftb_pengabdiandelete.autoSuggests["x_NIDN"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_pengabdiandelete.lists["x_status"] = <?php echo $tb_pengabdian_delete->status->Lookup->toClientList() ?>;
ftb_pengabdiandelete.lists["x_status"].options = <?php echo JsonEncode($tb_pengabdian_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_pengabdian_delete->showPageHeader(); ?>
<?php
$tb_pengabdian_delete->showMessage();
?>
<form name="ftb_pengabdiandelete" id="ftb_pengabdiandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_pengabdian_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_pengabdian_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_pengabdian">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tb_pengabdian_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tb_pengabdian->NIDN->Visible) { // NIDN ?>
		<th class="<?php echo $tb_pengabdian->NIDN->headerCellClass() ?>"><span id="elh_tb_pengabdian_NIDN" class="tb_pengabdian_NIDN"><?php echo $tb_pengabdian->NIDN->caption() ?></span></th>
<?php } ?>
<?php if ($tb_pengabdian->judul->Visible) { // judul ?>
		<th class="<?php echo $tb_pengabdian->judul->headerCellClass() ?>"><span id="elh_tb_pengabdian_judul" class="tb_pengabdian_judul"><?php echo $tb_pengabdian->judul->caption() ?></span></th>
<?php } ?>
<?php if ($tb_pengabdian->biaya->Visible) { // biaya ?>
		<th class="<?php echo $tb_pengabdian->biaya->headerCellClass() ?>"><span id="elh_tb_pengabdian_biaya" class="tb_pengabdian_biaya"><?php echo $tb_pengabdian->biaya->caption() ?></span></th>
<?php } ?>
<?php if ($tb_pengabdian->tahun->Visible) { // tahun ?>
		<th class="<?php echo $tb_pengabdian->tahun->headerCellClass() ?>"><span id="elh_tb_pengabdian_tahun" class="tb_pengabdian_tahun"><?php echo $tb_pengabdian->tahun->caption() ?></span></th>
<?php } ?>
<?php if ($tb_pengabdian->status->Visible) { // status ?>
		<th class="<?php echo $tb_pengabdian->status->headerCellClass() ?>"><span id="elh_tb_pengabdian_status" class="tb_pengabdian_status"><?php echo $tb_pengabdian->status->caption() ?></span></th>
<?php } ?>
<?php if ($tb_pengabdian->LP2->Visible) { // LP2 ?>
		<th class="<?php echo $tb_pengabdian->LP2->headerCellClass() ?>"><span id="elh_tb_pengabdian_LP2" class="tb_pengabdian_LP2"><?php echo $tb_pengabdian->LP2->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tb_pengabdian_delete->RecCnt = 0;
$i = 0;
while (!$tb_pengabdian_delete->Recordset->EOF) {
	$tb_pengabdian_delete->RecCnt++;
	$tb_pengabdian_delete->RowCnt++;

	// Set row properties
	$tb_pengabdian->resetAttributes();
	$tb_pengabdian->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tb_pengabdian_delete->loadRowValues($tb_pengabdian_delete->Recordset);

	// Render row
	$tb_pengabdian_delete->renderRow();
?>
	<tr<?php echo $tb_pengabdian->rowAttributes() ?>>
<?php if ($tb_pengabdian->NIDN->Visible) { // NIDN ?>
		<td<?php echo $tb_pengabdian->NIDN->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian_delete->RowCnt ?>_tb_pengabdian_NIDN" class="tb_pengabdian_NIDN">
<span<?php echo $tb_pengabdian->NIDN->viewAttributes() ?>>
<?php echo $tb_pengabdian->NIDN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_pengabdian->judul->Visible) { // judul ?>
		<td<?php echo $tb_pengabdian->judul->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian_delete->RowCnt ?>_tb_pengabdian_judul" class="tb_pengabdian_judul">
<span<?php echo $tb_pengabdian->judul->viewAttributes() ?>>
<?php echo $tb_pengabdian->judul->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_pengabdian->biaya->Visible) { // biaya ?>
		<td<?php echo $tb_pengabdian->biaya->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian_delete->RowCnt ?>_tb_pengabdian_biaya" class="tb_pengabdian_biaya">
<span<?php echo $tb_pengabdian->biaya->viewAttributes() ?>>
<?php echo $tb_pengabdian->biaya->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_pengabdian->tahun->Visible) { // tahun ?>
		<td<?php echo $tb_pengabdian->tahun->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian_delete->RowCnt ?>_tb_pengabdian_tahun" class="tb_pengabdian_tahun">
<span<?php echo $tb_pengabdian->tahun->viewAttributes() ?>>
<?php echo $tb_pengabdian->tahun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_pengabdian->status->Visible) { // status ?>
		<td<?php echo $tb_pengabdian->status->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian_delete->RowCnt ?>_tb_pengabdian_status" class="tb_pengabdian_status">
<span<?php echo $tb_pengabdian->status->viewAttributes() ?>>
<?php echo $tb_pengabdian->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_pengabdian->LP2->Visible) { // LP2 ?>
		<td<?php echo $tb_pengabdian->LP2->cellAttributes() ?>>
<span id="el<?php echo $tb_pengabdian_delete->RowCnt ?>_tb_pengabdian_LP2" class="tb_pengabdian_LP2">
<span<?php echo $tb_pengabdian->LP2->viewAttributes() ?>>
<?php echo GetFileViewTag($tb_pengabdian->LP2, $tb_pengabdian->LP2->getViewValue()) ?>
</span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tb_pengabdian_delete->Recordset->moveNext();
}
$tb_pengabdian_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_pengabdian_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tb_pengabdian_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_pengabdian_delete->terminate();
?>