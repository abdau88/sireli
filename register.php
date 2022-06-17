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
$register = new register();

// Run the page
$register->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$register->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "register";
var fregister = currentForm = new ew.Form("fregister", "register");

// Validate form
fregister.validate = function() {
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
		<?php if ($register->NIDN->Required) { ?>
			elm = this.getElements("x" + infix + "_NIDN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, ew.language.phrase("EnterUserName"));
		<?php } ?>
		<?php if ($register->NPAK_NIP->Required) { ?>
			elm = this.getElements("x" + infix + "_NPAK_NIP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_dosen->NPAK_NIP->caption(), $tb_dosen->NPAK_NIP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($register->Nama_Dosen->Required) { ?>
			elm = this.getElements("x" + infix + "_Nama_Dosen");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_dosen->Nama_Dosen->caption(), $tb_dosen->Nama_Dosen->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($register->id_jurusan->Required) { ?>
			elm = this.getElements("x" + infix + "_id_jurusan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_dosen->id_jurusan->caption(), $tb_dosen->id_jurusan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($register->password->Required) { ?>
			elm = this.getElements("x" + infix + "_password");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, ew.language.phrase("EnterPassword"));
		<?php } ?>
			if (fobj.c_password.value != fobj.x_password.value)
				return this.onError(fobj.c_password, ew.language.phrase("MismatchPassword"));
		<?php if ($register->_email->Required) { ?>
			elm = this.getElements("x" + infix + "__email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_dosen->_email->caption(), $tb_dosen->_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($register->no_hp->Required) { ?>
			elm = this.getElements("x" + infix + "_no_hp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_dosen->no_hp->caption(), $tb_dosen->no_hp->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fregister.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fregister.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fregister.lists["x_id_jurusan"] = <?php echo $register->id_jurusan->Lookup->toClientList() ?>;
fregister.lists["x_id_jurusan"].options = <?php echo JsonEncode($register->id_jurusan->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $register->showPageHeader(); ?>
<?php
$register->showMessage();
?>
<form name="fregister" id="fregister" class="<?php echo $register->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($register->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $register->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_dosen">
<input type="hidden" name="action" id="action" value="insert">
<!-- Fields to prevent google autofill -->
<input type="hidden" type="text" name="<?php echo Encrypt(Random()) ?>">
<input type="hidden" type="password" name="<?php echo Encrypt(Random()) ?>">
<?php if ($tb_dosen->isConfirm()) { // Confirm page ?>
<input type="hidden" name="confirm" id="confirm" value="confirm">
<?php } ?>
<div class="ew-register-div"><!-- page* -->
<?php if ($tb_dosen->NIDN->Visible) { // NIDN ?>
	<div id="r_NIDN" class="form-group row">
		<label id="elh_tb_dosen_NIDN" for="x_NIDN" class="<?php echo $register->LeftColumnClass ?>"><?php echo $tb_dosen->NIDN->caption() ?><?php echo ($tb_dosen->NIDN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $register->RightColumnClass ?>"><div<?php echo $tb_dosen->NIDN->cellAttributes() ?>>
<?php if (!$tb_dosen->isConfirm()) { ?>
<span id="el_tb_dosen_NIDN">
<input type="text" data-table="tb_dosen" data-field="x_NIDN" name="x_NIDN" id="x_NIDN" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($tb_dosen->NIDN->getPlaceHolder()) ?>" value="<?php echo $tb_dosen->NIDN->EditValue ?>"<?php echo $tb_dosen->NIDN->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el_tb_dosen_NIDN">
<span<?php echo $tb_dosen->NIDN->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_dosen->NIDN->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_dosen" data-field="x_NIDN" name="x_NIDN" id="x_NIDN" value="<?php echo HtmlEncode($tb_dosen->NIDN->FormValue) ?>">
<?php } ?>
<?php echo $tb_dosen->NIDN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_dosen->NPAK_NIP->Visible) { // NPAK_NIP ?>
	<div id="r_NPAK_NIP" class="form-group row">
		<label id="elh_tb_dosen_NPAK_NIP" for="x_NPAK_NIP" class="<?php echo $register->LeftColumnClass ?>"><?php echo $tb_dosen->NPAK_NIP->caption() ?><?php echo ($tb_dosen->NPAK_NIP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $register->RightColumnClass ?>"><div<?php echo $tb_dosen->NPAK_NIP->cellAttributes() ?>>
<?php if (!$tb_dosen->isConfirm()) { ?>
<span id="el_tb_dosen_NPAK_NIP">
<input type="text" data-table="tb_dosen" data-field="x_NPAK_NIP" name="x_NPAK_NIP" id="x_NPAK_NIP" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($tb_dosen->NPAK_NIP->getPlaceHolder()) ?>" value="<?php echo $tb_dosen->NPAK_NIP->EditValue ?>"<?php echo $tb_dosen->NPAK_NIP->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el_tb_dosen_NPAK_NIP">
<span<?php echo $tb_dosen->NPAK_NIP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_dosen->NPAK_NIP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_dosen" data-field="x_NPAK_NIP" name="x_NPAK_NIP" id="x_NPAK_NIP" value="<?php echo HtmlEncode($tb_dosen->NPAK_NIP->FormValue) ?>">
<?php } ?>
<?php echo $tb_dosen->NPAK_NIP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_dosen->Nama_Dosen->Visible) { // Nama_Dosen ?>
	<div id="r_Nama_Dosen" class="form-group row">
		<label id="elh_tb_dosen_Nama_Dosen" for="x_Nama_Dosen" class="<?php echo $register->LeftColumnClass ?>"><?php echo $tb_dosen->Nama_Dosen->caption() ?><?php echo ($tb_dosen->Nama_Dosen->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $register->RightColumnClass ?>"><div<?php echo $tb_dosen->Nama_Dosen->cellAttributes() ?>>
<?php if (!$tb_dosen->isConfirm()) { ?>
<span id="el_tb_dosen_Nama_Dosen">
<input type="text" data-table="tb_dosen" data-field="x_Nama_Dosen" name="x_Nama_Dosen" id="x_Nama_Dosen" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($tb_dosen->Nama_Dosen->getPlaceHolder()) ?>" value="<?php echo $tb_dosen->Nama_Dosen->EditValue ?>"<?php echo $tb_dosen->Nama_Dosen->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el_tb_dosen_Nama_Dosen">
<span<?php echo $tb_dosen->Nama_Dosen->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_dosen->Nama_Dosen->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_dosen" data-field="x_Nama_Dosen" name="x_Nama_Dosen" id="x_Nama_Dosen" value="<?php echo HtmlEncode($tb_dosen->Nama_Dosen->FormValue) ?>">
<?php } ?>
<?php echo $tb_dosen->Nama_Dosen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_dosen->id_jurusan->Visible) { // id_jurusan ?>
	<div id="r_id_jurusan" class="form-group row">
		<label id="elh_tb_dosen_id_jurusan" for="x_id_jurusan" class="<?php echo $register->LeftColumnClass ?>"><?php echo $tb_dosen->id_jurusan->caption() ?><?php echo ($tb_dosen->id_jurusan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $register->RightColumnClass ?>"><div<?php echo $tb_dosen->id_jurusan->cellAttributes() ?>>
<?php if (!$tb_dosen->isConfirm()) { ?>
<span id="el_tb_dosen_id_jurusan">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tb_dosen" data-field="x_id_jurusan" data-value-separator="<?php echo $tb_dosen->id_jurusan->displayValueSeparatorAttribute() ?>" id="x_id_jurusan" name="x_id_jurusan"<?php echo $tb_dosen->id_jurusan->editAttributes() ?>>
		<?php echo $tb_dosen->id_jurusan->selectOptionListHtml("x_id_jurusan") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el_tb_dosen_id_jurusan">
<span<?php echo $tb_dosen->id_jurusan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_dosen->id_jurusan->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_dosen" data-field="x_id_jurusan" name="x_id_jurusan" id="x_id_jurusan" value="<?php echo HtmlEncode($tb_dosen->id_jurusan->FormValue) ?>">
<?php } ?>
<?php echo $tb_dosen->id_jurusan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_dosen->password->Visible) { // password ?>
	<div id="r_password" class="form-group row">
		<label id="elh_tb_dosen_password" for="x_password" class="<?php echo $register->LeftColumnClass ?>"><?php echo $tb_dosen->password->caption() ?><?php echo ($tb_dosen->password->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $register->RightColumnClass ?>"><div<?php echo $tb_dosen->password->cellAttributes() ?>>
<?php if (!$tb_dosen->isConfirm()) { ?>
<span id="el_tb_dosen_password">
<input type="text" data-table="tb_dosen" data-field="x_password" name="x_password" id="x_password" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($tb_dosen->password->getPlaceHolder()) ?>" value="<?php echo $tb_dosen->password->EditValue ?>"<?php echo $tb_dosen->password->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el_tb_dosen_password">
<span<?php echo $tb_dosen->password->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_dosen->password->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_dosen" data-field="x_password" name="x_password" id="x_password" value="<?php echo HtmlEncode($tb_dosen->password->FormValue) ?>">
<?php } ?>
<?php echo $tb_dosen->password->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_dosen->password->Visible) { // password ?>
	<div id="r_c_password" class="form-group row">
		<label id="elh_c_tb_dosen_password" for="c_password" class="<?php echo $register->LeftColumnClass ?>"><?php echo $Language->phrase("Confirm") ?> <?php echo $tb_dosen->password->caption() ?><?php echo ($tb_dosen->password->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $register->RightColumnClass ?>"><div<?php echo $tb_dosen->password->cellAttributes() ?>>
<?php if (!$tb_dosen->isConfirm()) { ?>
<span id="el_c_tb_dosen_password">
<input type="text" data-table="tb_dosen" data-field="c_password" name="c_password" id="c_password" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($tb_dosen->password->getPlaceHolder()) ?>" value="<?php echo $tb_dosen->password->EditValue ?>"<?php echo $tb_dosen->password->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el_c_tb_dosen_password">
<span<?php echo $tb_dosen->password->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_dosen->password->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_dosen" data-field="c_password" name="c_password" id="c_password" value="<?php echo HtmlEncode($tb_dosen->password->FormValue) ?>">
<?php } ?>
</div></div>
	</div>
<?php } ?>
<?php if ($tb_dosen->_email->Visible) { // email ?>
	<div id="r__email" class="form-group row">
		<label id="elh_tb_dosen__email" for="x__email" class="<?php echo $register->LeftColumnClass ?>"><?php echo $tb_dosen->_email->caption() ?><?php echo ($tb_dosen->_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $register->RightColumnClass ?>"><div<?php echo $tb_dosen->_email->cellAttributes() ?>>
<?php if (!$tb_dosen->isConfirm()) { ?>
<span id="el_tb_dosen__email">
<input type="text" data-table="tb_dosen" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($tb_dosen->_email->getPlaceHolder()) ?>" value="<?php echo $tb_dosen->_email->EditValue ?>"<?php echo $tb_dosen->_email->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el_tb_dosen__email">
<span<?php echo $tb_dosen->_email->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_dosen->_email->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_dosen" data-field="x__email" name="x__email" id="x__email" value="<?php echo HtmlEncode($tb_dosen->_email->FormValue) ?>">
<?php } ?>
<?php echo $tb_dosen->_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_dosen->no_hp->Visible) { // no_hp ?>
	<div id="r_no_hp" class="form-group row">
		<label id="elh_tb_dosen_no_hp" for="x_no_hp" class="<?php echo $register->LeftColumnClass ?>"><?php echo $tb_dosen->no_hp->caption() ?><?php echo ($tb_dosen->no_hp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $register->RightColumnClass ?>"><div<?php echo $tb_dosen->no_hp->cellAttributes() ?>>
<?php if (!$tb_dosen->isConfirm()) { ?>
<span id="el_tb_dosen_no_hp">
<input type="text" data-table="tb_dosen" data-field="x_no_hp" name="x_no_hp" id="x_no_hp" size="30" maxlength="13" placeholder="<?php echo HtmlEncode($tb_dosen->no_hp->getPlaceHolder()) ?>" value="<?php echo $tb_dosen->no_hp->EditValue ?>"<?php echo $tb_dosen->no_hp->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el_tb_dosen_no_hp">
<span<?php echo $tb_dosen->no_hp->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_dosen->no_hp->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_dosen" data-field="x_no_hp" name="x_no_hp" id="x_no_hp" value="<?php echo HtmlEncode($tb_dosen->no_hp->FormValue) ?>">
<?php } ?>
<?php echo $tb_dosen->no_hp->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $register->OffsetColumnClass ?>"><!-- buttons offset -->
<?php if (!$tb_dosen->isConfirm()) { // Confirm page ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" onclick="this.form.action.value='confirm';"><?php echo $Language->phrase("RegisterBtn") ?></button>
<?php } else { ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("ConfirmBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="submit" onclick="this.form.action.value='cancel';"><?php echo $Language->phrase("CancelBtn") ?></button>
<?php } ?>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
</form>
<?php
$register->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$register->terminate();
?>