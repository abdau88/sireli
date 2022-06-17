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
$tb_penelitian2_edit = new tb_penelitian2_edit();

// Run the page
$tb_penelitian2_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_penelitian2_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ftb_penelitian2edit = currentForm = new ew.Form("ftb_penelitian2edit", "edit");

// Validate form
ftb_penelitian2edit.validate = function() {
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
		<?php if ($tb_penelitian2_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian2->status->caption(), $tb_penelitian2->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_penelitian2_edit->LP->Required) { ?>
			felm = this.getElements("x" + infix + "_LP");
			elm = this.getElements("fn_x" + infix + "_LP");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian2->LP->caption(), $tb_penelitian2->LP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_penelitian2_edit->LK->Required) { ?>
			felm = this.getElements("x" + infix + "_LK");
			elm = this.getElements("fn_x" + infix + "_LK");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian2->LK->caption(), $tb_penelitian2->LK->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_penelitian2_edit->output->Required) { ?>
			felm = this.getElements("x" + infix + "_output");
			elm = this.getElements("fn_x" + infix + "_output");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian2->output->caption(), $tb_penelitian2->output->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_penelitian2_edit->chr->Required) { ?>
			felm = this.getElements("x" + infix + "_chr");
			elm = this.getElements("fn_x" + infix + "_chr");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian2->chr->caption(), $tb_penelitian2->chr->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_penelitian2_edit->surat_tugas->Required) { ?>
			felm = this.getElements("x" + infix + "_surat_tugas");
			elm = this.getElements("fn_x" + infix + "_surat_tugas");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian2->surat_tugas->caption(), $tb_penelitian2->surat_tugas->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_penelitian2_edit->sk->Required) { ?>
			felm = this.getElements("x" + infix + "_sk");
			elm = this.getElements("fn_x" + infix + "_sk");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian2->sk->caption(), $tb_penelitian2->sk->RequiredErrorMessage)) ?>");
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
ftb_penelitian2edit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_penelitian2edit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_penelitian2edit.lists["x_status"] = <?php echo $tb_penelitian2_edit->status->Lookup->toClientList() ?>;
ftb_penelitian2edit.lists["x_status"].options = <?php echo JsonEncode($tb_penelitian2_edit->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_penelitian2_edit->showPageHeader(); ?>
<?php
$tb_penelitian2_edit->showMessage();
?>
<form name="ftb_penelitian2edit" id="ftb_penelitian2edit" class="<?php echo $tb_penelitian2_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_penelitian2_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_penelitian2_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_penelitian2">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tb_penelitian2_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($tb_penelitian2->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_tb_penelitian2_status" for="x_status" class="<?php echo $tb_penelitian2_edit->LeftColumnClass ?>"><?php echo $tb_penelitian2->status->caption() ?><?php echo ($tb_penelitian2->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian2_edit->RightColumnClass ?>"><div<?php echo $tb_penelitian2->status->cellAttributes() ?>>
<span id="el_tb_penelitian2_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tb_penelitian2" data-field="x_status" data-value-separator="<?php echo $tb_penelitian2->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $tb_penelitian2->status->editAttributes() ?>>
		<?php echo $tb_penelitian2->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
</span>
<?php echo $tb_penelitian2->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_penelitian2->LP->Visible) { // LP ?>
	<div id="r_LP" class="form-group row">
		<label id="elh_tb_penelitian2_LP" class="<?php echo $tb_penelitian2_edit->LeftColumnClass ?>"><?php echo $tb_penelitian2->LP->caption() ?><?php echo ($tb_penelitian2->LP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian2_edit->RightColumnClass ?>"><div<?php echo $tb_penelitian2->LP->cellAttributes() ?>>
<span id="el_tb_penelitian2_LP">
<div id="fd_x_LP">
<span title="<?php echo $tb_penelitian2->LP->title() ? $tb_penelitian2->LP->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($tb_penelitian2->LP->ReadOnly || $tb_penelitian2->LP->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="tb_penelitian2" data-field="x_LP" name="x_LP" id="x_LP"<?php echo $tb_penelitian2->LP->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_LP" id= "fn_x_LP" value="<?php echo $tb_penelitian2->LP->Upload->FileName ?>">
<?php if (Post("fa_x_LP") == "0") { ?>
<input type="hidden" name="fa_x_LP" id= "fa_x_LP" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_LP" id= "fa_x_LP" value="1">
<?php } ?>
<input type="hidden" name="fs_x_LP" id= "fs_x_LP" value="100">
<input type="hidden" name="fx_x_LP" id= "fx_x_LP" value="<?php echo $tb_penelitian2->LP->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_LP" id= "fm_x_LP" value="<?php echo $tb_penelitian2->LP->UploadMaxFileSize ?>">
</div>
<table id="ft_x_LP" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $tb_penelitian2->LP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_penelitian2->LK->Visible) { // LK ?>
	<div id="r_LK" class="form-group row">
		<label id="elh_tb_penelitian2_LK" class="<?php echo $tb_penelitian2_edit->LeftColumnClass ?>"><?php echo $tb_penelitian2->LK->caption() ?><?php echo ($tb_penelitian2->LK->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian2_edit->RightColumnClass ?>"><div<?php echo $tb_penelitian2->LK->cellAttributes() ?>>
<span id="el_tb_penelitian2_LK">
<div id="fd_x_LK">
<span title="<?php echo $tb_penelitian2->LK->title() ? $tb_penelitian2->LK->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($tb_penelitian2->LK->ReadOnly || $tb_penelitian2->LK->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="tb_penelitian2" data-field="x_LK" name="x_LK" id="x_LK"<?php echo $tb_penelitian2->LK->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_LK" id= "fn_x_LK" value="<?php echo $tb_penelitian2->LK->Upload->FileName ?>">
<?php if (Post("fa_x_LK") == "0") { ?>
<input type="hidden" name="fa_x_LK" id= "fa_x_LK" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_LK" id= "fa_x_LK" value="1">
<?php } ?>
<input type="hidden" name="fs_x_LK" id= "fs_x_LK" value="100">
<input type="hidden" name="fx_x_LK" id= "fx_x_LK" value="<?php echo $tb_penelitian2->LK->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_LK" id= "fm_x_LK" value="<?php echo $tb_penelitian2->LK->UploadMaxFileSize ?>">
</div>
<table id="ft_x_LK" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $tb_penelitian2->LK->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_penelitian2->output->Visible) { // output ?>
	<div id="r_output" class="form-group row">
		<label id="elh_tb_penelitian2_output" class="<?php echo $tb_penelitian2_edit->LeftColumnClass ?>"><?php echo $tb_penelitian2->output->caption() ?><?php echo ($tb_penelitian2->output->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian2_edit->RightColumnClass ?>"><div<?php echo $tb_penelitian2->output->cellAttributes() ?>>
<span id="el_tb_penelitian2_output">
<div id="fd_x_output">
<span title="<?php echo $tb_penelitian2->output->title() ? $tb_penelitian2->output->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($tb_penelitian2->output->ReadOnly || $tb_penelitian2->output->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="tb_penelitian2" data-field="x_output" name="x_output" id="x_output"<?php echo $tb_penelitian2->output->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_output" id= "fn_x_output" value="<?php echo $tb_penelitian2->output->Upload->FileName ?>">
<?php if (Post("fa_x_output") == "0") { ?>
<input type="hidden" name="fa_x_output" id= "fa_x_output" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_output" id= "fa_x_output" value="1">
<?php } ?>
<input type="hidden" name="fs_x_output" id= "fs_x_output" value="100">
<input type="hidden" name="fx_x_output" id= "fx_x_output" value="<?php echo $tb_penelitian2->output->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_output" id= "fm_x_output" value="<?php echo $tb_penelitian2->output->UploadMaxFileSize ?>">
</div>
<table id="ft_x_output" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $tb_penelitian2->output->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_penelitian2->chr->Visible) { // chr ?>
	<div id="r_chr" class="form-group row">
		<label id="elh_tb_penelitian2_chr" class="<?php echo $tb_penelitian2_edit->LeftColumnClass ?>"><?php echo $tb_penelitian2->chr->caption() ?><?php echo ($tb_penelitian2->chr->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian2_edit->RightColumnClass ?>"><div<?php echo $tb_penelitian2->chr->cellAttributes() ?>>
<span id="el_tb_penelitian2_chr">
<div id="fd_x_chr">
<span title="<?php echo $tb_penelitian2->chr->title() ? $tb_penelitian2->chr->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($tb_penelitian2->chr->ReadOnly || $tb_penelitian2->chr->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="tb_penelitian2" data-field="x_chr" name="x_chr" id="x_chr"<?php echo $tb_penelitian2->chr->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_chr" id= "fn_x_chr" value="<?php echo $tb_penelitian2->chr->Upload->FileName ?>">
<?php if (Post("fa_x_chr") == "0") { ?>
<input type="hidden" name="fa_x_chr" id= "fa_x_chr" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_chr" id= "fa_x_chr" value="1">
<?php } ?>
<input type="hidden" name="fs_x_chr" id= "fs_x_chr" value="100">
<input type="hidden" name="fx_x_chr" id= "fx_x_chr" value="<?php echo $tb_penelitian2->chr->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_chr" id= "fm_x_chr" value="<?php echo $tb_penelitian2->chr->UploadMaxFileSize ?>">
</div>
<table id="ft_x_chr" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $tb_penelitian2->chr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_penelitian2->surat_tugas->Visible) { // surat_tugas ?>
	<div id="r_surat_tugas" class="form-group row">
		<label id="elh_tb_penelitian2_surat_tugas" class="<?php echo $tb_penelitian2_edit->LeftColumnClass ?>"><?php echo $tb_penelitian2->surat_tugas->caption() ?><?php echo ($tb_penelitian2->surat_tugas->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian2_edit->RightColumnClass ?>"><div<?php echo $tb_penelitian2->surat_tugas->cellAttributes() ?>>
<span id="el_tb_penelitian2_surat_tugas">
<div id="fd_x_surat_tugas">
<span title="<?php echo $tb_penelitian2->surat_tugas->title() ? $tb_penelitian2->surat_tugas->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($tb_penelitian2->surat_tugas->ReadOnly || $tb_penelitian2->surat_tugas->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="tb_penelitian2" data-field="x_surat_tugas" name="x_surat_tugas" id="x_surat_tugas"<?php echo $tb_penelitian2->surat_tugas->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_surat_tugas" id= "fn_x_surat_tugas" value="<?php echo $tb_penelitian2->surat_tugas->Upload->FileName ?>">
<?php if (Post("fa_x_surat_tugas") == "0") { ?>
<input type="hidden" name="fa_x_surat_tugas" id= "fa_x_surat_tugas" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_surat_tugas" id= "fa_x_surat_tugas" value="1">
<?php } ?>
<input type="hidden" name="fs_x_surat_tugas" id= "fs_x_surat_tugas" value="100">
<input type="hidden" name="fx_x_surat_tugas" id= "fx_x_surat_tugas" value="<?php echo $tb_penelitian2->surat_tugas->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_surat_tugas" id= "fm_x_surat_tugas" value="<?php echo $tb_penelitian2->surat_tugas->UploadMaxFileSize ?>">
</div>
<table id="ft_x_surat_tugas" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $tb_penelitian2->surat_tugas->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_penelitian2->sk->Visible) { // sk ?>
	<div id="r_sk" class="form-group row">
		<label id="elh_tb_penelitian2_sk" class="<?php echo $tb_penelitian2_edit->LeftColumnClass ?>"><?php echo $tb_penelitian2->sk->caption() ?><?php echo ($tb_penelitian2->sk->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian2_edit->RightColumnClass ?>"><div<?php echo $tb_penelitian2->sk->cellAttributes() ?>>
<span id="el_tb_penelitian2_sk">
<div id="fd_x_sk">
<span title="<?php echo $tb_penelitian2->sk->title() ? $tb_penelitian2->sk->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($tb_penelitian2->sk->ReadOnly || $tb_penelitian2->sk->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="tb_penelitian2" data-field="x_sk" name="x_sk" id="x_sk"<?php echo $tb_penelitian2->sk->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_sk" id= "fn_x_sk" value="<?php echo $tb_penelitian2->sk->Upload->FileName ?>">
<?php if (Post("fa_x_sk") == "0") { ?>
<input type="hidden" name="fa_x_sk" id= "fa_x_sk" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_sk" id= "fa_x_sk" value="1">
<?php } ?>
<input type="hidden" name="fs_x_sk" id= "fs_x_sk" value="100">
<input type="hidden" name="fx_x_sk" id= "fx_x_sk" value="<?php echo $tb_penelitian2->sk->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_sk" id= "fm_x_sk" value="<?php echo $tb_penelitian2->sk->UploadMaxFileSize ?>">
</div>
<table id="ft_x_sk" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $tb_penelitian2->sk->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="tb_penelitian2" data-field="x_id_penelitian" name="x_id_penelitian" id="x_id_penelitian" value="<?php echo HtmlEncode($tb_penelitian2->id_penelitian->CurrentValue) ?>">
<?php if (!$tb_penelitian2_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tb_penelitian2_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_penelitian2_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tb_penelitian2_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_penelitian2_edit->terminate();
?>