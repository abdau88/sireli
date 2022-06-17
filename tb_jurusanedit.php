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
$tb_jurusan_edit = new tb_jurusan_edit();

// Run the page
$tb_jurusan_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_jurusan_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ftb_jurusanedit = currentForm = new ew.Form("ftb_jurusanedit", "edit");

// Validate form
ftb_jurusanedit.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($tb_jurusan_edit->id_jurusan->Required) { ?>
			elm = this.getElements("x" + infix + "_id_jurusan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_jurusan->id_jurusan->caption(), $tb_jurusan->id_jurusan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_jurusan_edit->jurusan->Required) { ?>
			elm = this.getElements("x" + infix + "_jurusan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_jurusan->jurusan->caption(), $tb_jurusan->jurusan->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
ftb_jurusanedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_jurusanedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_jurusan_edit->showPageHeader(); ?>
<?php
$tb_jurusan_edit->showMessage();
?>
<form name="ftb_jurusanedit" id="ftb_jurusanedit" class="<?php echo $tb_jurusan_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_jurusan_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_jurusan_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_jurusan">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tb_jurusan_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($tb_jurusan->id_jurusan->Visible) { // id_jurusan ?>
	<div id="r_id_jurusan" class="form-group row">
		<label id="elh_tb_jurusan_id_jurusan" class="<?php echo $tb_jurusan_edit->LeftColumnClass ?>"><?php echo $tb_jurusan->id_jurusan->caption() ?><?php echo ($tb_jurusan->id_jurusan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_jurusan_edit->RightColumnClass ?>"><div<?php echo $tb_jurusan->id_jurusan->cellAttributes() ?>>
<span id="el_tb_jurusan_id_jurusan">
<span<?php echo $tb_jurusan->id_jurusan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_jurusan->id_jurusan->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_jurusan" data-field="x_id_jurusan" name="x_id_jurusan" id="x_id_jurusan" value="<?php echo HtmlEncode($tb_jurusan->id_jurusan->CurrentValue) ?>">
<?php echo $tb_jurusan->id_jurusan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_jurusan->jurusan->Visible) { // jurusan ?>
	<div id="r_jurusan" class="form-group row">
		<label id="elh_tb_jurusan_jurusan" for="x_jurusan" class="<?php echo $tb_jurusan_edit->LeftColumnClass ?>"><?php echo $tb_jurusan->jurusan->caption() ?><?php echo ($tb_jurusan->jurusan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_jurusan_edit->RightColumnClass ?>"><div<?php echo $tb_jurusan->jurusan->cellAttributes() ?>>
<span id="el_tb_jurusan_jurusan">
<input type="text" data-table="tb_jurusan" data-field="x_jurusan" name="x_jurusan" id="x_jurusan" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($tb_jurusan->jurusan->getPlaceHolder()) ?>" value="<?php echo $tb_jurusan->jurusan->EditValue ?>"<?php echo $tb_jurusan->jurusan->editAttributes() ?>>
</span>
<?php echo $tb_jurusan->jurusan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tb_jurusan_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tb_jurusan_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_jurusan_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tb_jurusan_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_jurusan_edit->terminate();
?>