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
$tb_jurusan_add = new tb_jurusan_add();

// Run the page
$tb_jurusan_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_jurusan_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ftb_jurusanadd = currentForm = new ew.Form("ftb_jurusanadd", "add");

// Validate form
ftb_jurusanadd.validate = function() {
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
		<?php if ($tb_jurusan_add->jurusan->Required) { ?>
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
ftb_jurusanadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_jurusanadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_jurusan_add->showPageHeader(); ?>
<?php
$tb_jurusan_add->showMessage();
?>
<form name="ftb_jurusanadd" id="ftb_jurusanadd" class="<?php echo $tb_jurusan_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_jurusan_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_jurusan_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_jurusan">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$tb_jurusan_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($tb_jurusan->jurusan->Visible) { // jurusan ?>
	<div id="r_jurusan" class="form-group row">
		<label id="elh_tb_jurusan_jurusan" for="x_jurusan" class="<?php echo $tb_jurusan_add->LeftColumnClass ?>"><?php echo $tb_jurusan->jurusan->caption() ?><?php echo ($tb_jurusan->jurusan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_jurusan_add->RightColumnClass ?>"><div<?php echo $tb_jurusan->jurusan->cellAttributes() ?>>
<span id="el_tb_jurusan_jurusan">
<input type="text" data-table="tb_jurusan" data-field="x_jurusan" name="x_jurusan" id="x_jurusan" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($tb_jurusan->jurusan->getPlaceHolder()) ?>" value="<?php echo $tb_jurusan->jurusan->EditValue ?>"<?php echo $tb_jurusan->jurusan->editAttributes() ?>>
</span>
<?php echo $tb_jurusan->jurusan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tb_jurusan_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tb_jurusan_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_jurusan_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tb_jurusan_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_jurusan_add->terminate();
?>