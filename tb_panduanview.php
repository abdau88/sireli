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
$tb_panduan_view = new tb_panduan_view();

// Run the page
$tb_panduan_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_panduan_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_panduan->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ftb_panduanview = currentForm = new ew.Form("ftb_panduanview", "view");

// Form_CustomValidate event
ftb_panduanview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_panduanview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_panduan->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tb_panduan_view->ExportOptions->render("body") ?>
<?php $tb_panduan_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tb_panduan_view->showPageHeader(); ?>
<?php
$tb_panduan_view->showMessage();
?>
<form name="ftb_panduanview" id="ftb_panduanview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_panduan_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_panduan_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_panduan">
<input type="hidden" name="modal" value="<?php echo (int)$tb_panduan_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tb_panduan->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $tb_panduan_view->TableLeftColumnClass ?>"><span id="elh_tb_panduan_id"><?php echo $tb_panduan->id->caption() ?></span></td>
		<td data-name="id"<?php echo $tb_panduan->id->cellAttributes() ?>>
<span id="el_tb_panduan_id">
<span<?php echo $tb_panduan->id->viewAttributes() ?>>
<?php echo $tb_panduan->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_panduan->spi->Visible) { // spi ?>
	<tr id="r_spi">
		<td class="<?php echo $tb_panduan_view->TableLeftColumnClass ?>"><span id="elh_tb_panduan_spi"><?php echo $tb_panduan->spi->caption() ?></span></td>
		<td data-name="spi"<?php echo $tb_panduan->spi->cellAttributes() ?>>
<span id="el_tb_panduan_spi">
<span<?php echo $tb_panduan->spi->viewAttributes() ?>>
<?php echo $tb_panduan->spi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_panduan->dosen->Visible) { // dosen ?>
	<tr id="r_dosen">
		<td class="<?php echo $tb_panduan_view->TableLeftColumnClass ?>"><span id="elh_tb_panduan_dosen"><?php echo $tb_panduan->dosen->caption() ?></span></td>
		<td data-name="dosen"<?php echo $tb_panduan->dosen->cellAttributes() ?>>
<span id="el_tb_panduan_dosen">
<span<?php echo $tb_panduan->dosen->viewAttributes() ?>>
<?php echo $tb_panduan->dosen->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$tb_panduan_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_panduan->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_panduan_view->terminate();
?>