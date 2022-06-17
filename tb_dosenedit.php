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
$tb_dosen_edit = new tb_dosen_edit();

// Run the page
$tb_dosen_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_dosen_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ftb_dosenedit = currentForm = new ew.Form("ftb_dosenedit", "edit");

// Validate form
ftb_dosenedit.validate = function() {
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
		<?php if ($tb_dosen_edit->NIDN->Required) { ?>
			elm = this.getElements("x" + infix + "_NIDN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_dosen->NIDN->caption(), $tb_dosen->NIDN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_dosen_edit->NPAK_NIP->Required) { ?>
			elm = this.getElements("x" + infix + "_NPAK_NIP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_dosen->NPAK_NIP->caption(), $tb_dosen->NPAK_NIP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_dosen_edit->Nama_Dosen->Required) { ?>
			elm = this.getElements("x" + infix + "_Nama_Dosen");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_dosen->Nama_Dosen->caption(), $tb_dosen->Nama_Dosen->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_dosen_edit->id_jurusan->Required) { ?>
			elm = this.getElements("x" + infix + "_id_jurusan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_dosen->id_jurusan->caption(), $tb_dosen->id_jurusan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_dosen_edit->_email->Required) { ?>
			elm = this.getElements("x" + infix + "__email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_dosen->_email->caption(), $tb_dosen->_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_dosen_edit->no_hp->Required) { ?>
			elm = this.getElements("x" + infix + "_no_hp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_dosen->no_hp->caption(), $tb_dosen->no_hp->RequiredErrorMessage)) ?>");
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
ftb_dosenedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_dosenedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_dosenedit.lists["x_id_jurusan"] = <?php echo $tb_dosen_edit->id_jurusan->Lookup->toClientList() ?>;
ftb_dosenedit.lists["x_id_jurusan"].options = <?php echo JsonEncode($tb_dosen_edit->id_jurusan->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_dosen_edit->showPageHeader(); ?>
<?php
$tb_dosen_edit->showMessage();
?>
<form name="ftb_dosenedit" id="ftb_dosenedit" class="<?php echo $tb_dosen_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_dosen_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_dosen_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_dosen">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tb_dosen_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($tb_dosen->NIDN->Visible) { // NIDN ?>
	<div id="r_NIDN" class="form-group row">
		<label id="elh_tb_dosen_NIDN" for="x_NIDN" class="<?php echo $tb_dosen_edit->LeftColumnClass ?>"><?php echo $tb_dosen->NIDN->caption() ?><?php echo ($tb_dosen->NIDN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_dosen_edit->RightColumnClass ?>"><div<?php echo $tb_dosen->NIDN->cellAttributes() ?>>
<span id="el_tb_dosen_NIDN">
<span<?php echo $tb_dosen->NIDN->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_dosen->NIDN->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_dosen" data-field="x_NIDN" name="x_NIDN" id="x_NIDN" value="<?php echo HtmlEncode($tb_dosen->NIDN->CurrentValue) ?>">
<?php echo $tb_dosen->NIDN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_dosen->NPAK_NIP->Visible) { // NPAK_NIP ?>
	<div id="r_NPAK_NIP" class="form-group row">
		<label id="elh_tb_dosen_NPAK_NIP" for="x_NPAK_NIP" class="<?php echo $tb_dosen_edit->LeftColumnClass ?>"><?php echo $tb_dosen->NPAK_NIP->caption() ?><?php echo ($tb_dosen->NPAK_NIP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_dosen_edit->RightColumnClass ?>"><div<?php echo $tb_dosen->NPAK_NIP->cellAttributes() ?>>
<span id="el_tb_dosen_NPAK_NIP">
<span<?php echo $tb_dosen->NPAK_NIP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_dosen->NPAK_NIP->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_dosen" data-field="x_NPAK_NIP" name="x_NPAK_NIP" id="x_NPAK_NIP" value="<?php echo HtmlEncode($tb_dosen->NPAK_NIP->CurrentValue) ?>">
<?php echo $tb_dosen->NPAK_NIP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_dosen->Nama_Dosen->Visible) { // Nama_Dosen ?>
	<div id="r_Nama_Dosen" class="form-group row">
		<label id="elh_tb_dosen_Nama_Dosen" for="x_Nama_Dosen" class="<?php echo $tb_dosen_edit->LeftColumnClass ?>"><?php echo $tb_dosen->Nama_Dosen->caption() ?><?php echo ($tb_dosen->Nama_Dosen->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_dosen_edit->RightColumnClass ?>"><div<?php echo $tb_dosen->Nama_Dosen->cellAttributes() ?>>
<span id="el_tb_dosen_Nama_Dosen">
<input type="text" data-table="tb_dosen" data-field="x_Nama_Dosen" name="x_Nama_Dosen" id="x_Nama_Dosen" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($tb_dosen->Nama_Dosen->getPlaceHolder()) ?>" value="<?php echo $tb_dosen->Nama_Dosen->EditValue ?>"<?php echo $tb_dosen->Nama_Dosen->editAttributes() ?>>
</span>
<?php echo $tb_dosen->Nama_Dosen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_dosen->id_jurusan->Visible) { // id_jurusan ?>
	<div id="r_id_jurusan" class="form-group row">
		<label id="elh_tb_dosen_id_jurusan" for="x_id_jurusan" class="<?php echo $tb_dosen_edit->LeftColumnClass ?>"><?php echo $tb_dosen->id_jurusan->caption() ?><?php echo ($tb_dosen->id_jurusan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_dosen_edit->RightColumnClass ?>"><div<?php echo $tb_dosen->id_jurusan->cellAttributes() ?>>
<span id="el_tb_dosen_id_jurusan">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tb_dosen" data-field="x_id_jurusan" data-value-separator="<?php echo $tb_dosen->id_jurusan->displayValueSeparatorAttribute() ?>" id="x_id_jurusan" name="x_id_jurusan"<?php echo $tb_dosen->id_jurusan->editAttributes() ?>>
		<?php echo $tb_dosen->id_jurusan->selectOptionListHtml("x_id_jurusan") ?>
	</select>
</div>
</span>
<?php echo $tb_dosen->id_jurusan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_dosen->_email->Visible) { // email ?>
	<div id="r__email" class="form-group row">
		<label id="elh_tb_dosen__email" for="x__email" class="<?php echo $tb_dosen_edit->LeftColumnClass ?>"><?php echo $tb_dosen->_email->caption() ?><?php echo ($tb_dosen->_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_dosen_edit->RightColumnClass ?>"><div<?php echo $tb_dosen->_email->cellAttributes() ?>>
<span id="el_tb_dosen__email">
<input type="text" data-table="tb_dosen" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($tb_dosen->_email->getPlaceHolder()) ?>" value="<?php echo $tb_dosen->_email->EditValue ?>"<?php echo $tb_dosen->_email->editAttributes() ?>>
</span>
<?php echo $tb_dosen->_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_dosen->no_hp->Visible) { // no_hp ?>
	<div id="r_no_hp" class="form-group row">
		<label id="elh_tb_dosen_no_hp" for="x_no_hp" class="<?php echo $tb_dosen_edit->LeftColumnClass ?>"><?php echo $tb_dosen->no_hp->caption() ?><?php echo ($tb_dosen->no_hp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_dosen_edit->RightColumnClass ?>"><div<?php echo $tb_dosen->no_hp->cellAttributes() ?>>
<span id="el_tb_dosen_no_hp">
<input type="text" data-table="tb_dosen" data-field="x_no_hp" name="x_no_hp" id="x_no_hp" size="30" maxlength="13" placeholder="<?php echo HtmlEncode($tb_dosen->no_hp->getPlaceHolder()) ?>" value="<?php echo $tb_dosen->no_hp->EditValue ?>"<?php echo $tb_dosen->no_hp->editAttributes() ?>>
</span>
<?php echo $tb_dosen->no_hp->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tb_dosen_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tb_dosen_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_dosen_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tb_dosen_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_dosen_edit->terminate();
?>