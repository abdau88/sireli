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
$tb_jurusan_delete = new tb_jurusan_delete();

// Run the page
$tb_jurusan_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_jurusan_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftb_jurusandelete = currentForm = new ew.Form("ftb_jurusandelete", "delete");

// Form_CustomValidate event
ftb_jurusandelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_jurusandelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_jurusan_delete->showPageHeader(); ?>
<?php
$tb_jurusan_delete->showMessage();
?>
<form name="ftb_jurusandelete" id="ftb_jurusandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_jurusan_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_jurusan_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_jurusan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tb_jurusan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tb_jurusan->id_jurusan->Visible) { // id_jurusan ?>
		<th class="<?php echo $tb_jurusan->id_jurusan->headerCellClass() ?>"><span id="elh_tb_jurusan_id_jurusan" class="tb_jurusan_id_jurusan"><?php echo $tb_jurusan->id_jurusan->caption() ?></span></th>
<?php } ?>
<?php if ($tb_jurusan->jurusan->Visible) { // jurusan ?>
		<th class="<?php echo $tb_jurusan->jurusan->headerCellClass() ?>"><span id="elh_tb_jurusan_jurusan" class="tb_jurusan_jurusan"><?php echo $tb_jurusan->jurusan->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tb_jurusan_delete->RecCnt = 0;
$i = 0;
while (!$tb_jurusan_delete->Recordset->EOF) {
	$tb_jurusan_delete->RecCnt++;
	$tb_jurusan_delete->RowCnt++;

	// Set row properties
	$tb_jurusan->resetAttributes();
	$tb_jurusan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tb_jurusan_delete->loadRowValues($tb_jurusan_delete->Recordset);

	// Render row
	$tb_jurusan_delete->renderRow();
?>
	<tr<?php echo $tb_jurusan->rowAttributes() ?>>
<?php if ($tb_jurusan->id_jurusan->Visible) { // id_jurusan ?>
		<td<?php echo $tb_jurusan->id_jurusan->cellAttributes() ?>>
<span id="el<?php echo $tb_jurusan_delete->RowCnt ?>_tb_jurusan_id_jurusan" class="tb_jurusan_id_jurusan">
<span<?php echo $tb_jurusan->id_jurusan->viewAttributes() ?>>
<?php echo $tb_jurusan->id_jurusan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_jurusan->jurusan->Visible) { // jurusan ?>
		<td<?php echo $tb_jurusan->jurusan->cellAttributes() ?>>
<span id="el<?php echo $tb_jurusan_delete->RowCnt ?>_tb_jurusan_jurusan" class="tb_jurusan_jurusan">
<span<?php echo $tb_jurusan->jurusan->viewAttributes() ?>>
<?php echo $tb_jurusan->jurusan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tb_jurusan_delete->Recordset->moveNext();
}
$tb_jurusan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_jurusan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tb_jurusan_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_jurusan_delete->terminate();
?>