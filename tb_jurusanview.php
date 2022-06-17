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
$tb_jurusan_view = new tb_jurusan_view();

// Run the page
$tb_jurusan_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_jurusan_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_jurusan->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ftb_jurusanview = currentForm = new ew.Form("ftb_jurusanview", "view");

// Form_CustomValidate event
ftb_jurusanview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_jurusanview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_jurusan->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tb_jurusan_view->ExportOptions->render("body") ?>
<?php $tb_jurusan_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tb_jurusan_view->showPageHeader(); ?>
<?php
$tb_jurusan_view->showMessage();
?>
<form name="ftb_jurusanview" id="ftb_jurusanview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_jurusan_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_jurusan_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_jurusan">
<input type="hidden" name="modal" value="<?php echo (int)$tb_jurusan_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tb_jurusan->id_jurusan->Visible) { // id_jurusan ?>
	<tr id="r_id_jurusan">
		<td class="<?php echo $tb_jurusan_view->TableLeftColumnClass ?>"><span id="elh_tb_jurusan_id_jurusan"><?php echo $tb_jurusan->id_jurusan->caption() ?></span></td>
		<td data-name="id_jurusan"<?php echo $tb_jurusan->id_jurusan->cellAttributes() ?>>
<span id="el_tb_jurusan_id_jurusan">
<span<?php echo $tb_jurusan->id_jurusan->viewAttributes() ?>>
<?php echo $tb_jurusan->id_jurusan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_jurusan->jurusan->Visible) { // jurusan ?>
	<tr id="r_jurusan">
		<td class="<?php echo $tb_jurusan_view->TableLeftColumnClass ?>"><span id="elh_tb_jurusan_jurusan"><?php echo $tb_jurusan->jurusan->caption() ?></span></td>
		<td data-name="jurusan"<?php echo $tb_jurusan->jurusan->cellAttributes() ?>>
<span id="el_tb_jurusan_jurusan">
<span<?php echo $tb_jurusan->jurusan->viewAttributes() ?>>
<?php echo $tb_jurusan->jurusan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$tb_jurusan_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_jurusan->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_jurusan_view->terminate();
?>