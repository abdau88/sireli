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
$tb_penelitian_add = new tb_penelitian_add();

// Run the page
$tb_penelitian_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_penelitian_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ftb_penelitianadd = currentForm = new ew.Form("ftb_penelitianadd", "add");

// Validate form
ftb_penelitianadd.validate = function() {
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
		<?php if ($tb_penelitian_add->NIDN->Required) { ?>
			elm = this.getElements("x" + infix + "_NIDN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian->NIDN->caption(), $tb_penelitian->NIDN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_penelitian_add->anggota1->Required) { ?>
			elm = this.getElements("x" + infix + "_anggota1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian->anggota1->caption(), $tb_penelitian->anggota1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_penelitian_add->anggota2->Required) { ?>
			elm = this.getElements("x" + infix + "_anggota2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian->anggota2->caption(), $tb_penelitian->anggota2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_penelitian_add->id_jurusan->Required) { ?>
			elm = this.getElements("x" + infix + "_id_jurusan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian->id_jurusan->caption(), $tb_penelitian->id_jurusan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_penelitian_add->judul->Required) { ?>
			elm = this.getElements("x" + infix + "_judul");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian->judul->caption(), $tb_penelitian->judul->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_penelitian_add->biaya->Required) { ?>
			elm = this.getElements("x" + infix + "_biaya");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian->biaya->caption(), $tb_penelitian->biaya->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_biaya");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($tb_penelitian->biaya->errorMessage()) ?>");
		<?php if ($tb_penelitian_add->tahun->Required) { ?>
			elm = this.getElements("x" + infix + "_tahun");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian->tahun->caption(), $tb_penelitian->tahun->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_penelitian_add->LP->Required) { ?>
			felm = this.getElements("x" + infix + "_LP");
			elm = this.getElements("fn_x" + infix + "_LP");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian->LP->caption(), $tb_penelitian->LP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_penelitian_add->LK->Required) { ?>
			felm = this.getElements("x" + infix + "_LK");
			elm = this.getElements("fn_x" + infix + "_LK");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian->LK->caption(), $tb_penelitian->LK->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_penelitian_add->output->Required) { ?>
			felm = this.getElements("x" + infix + "_output");
			elm = this.getElements("fn_x" + infix + "_output");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $tb_penelitian->output->caption(), $tb_penelitian->output->RequiredErrorMessage)) ?>");
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
ftb_penelitianadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_penelitianadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_penelitianadd.lists["x_NIDN"] = <?php echo $tb_penelitian_add->NIDN->Lookup->toClientList() ?>;
ftb_penelitianadd.lists["x_NIDN"].options = <?php echo JsonEncode($tb_penelitian_add->NIDN->lookupOptions()) ?>;
ftb_penelitianadd.autoSuggests["x_NIDN"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_penelitianadd.lists["x_anggota1"] = <?php echo $tb_penelitian_add->anggota1->Lookup->toClientList() ?>;
ftb_penelitianadd.lists["x_anggota1"].options = <?php echo JsonEncode($tb_penelitian_add->anggota1->lookupOptions()) ?>;
ftb_penelitianadd.autoSuggests["x_anggota1"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_penelitianadd.lists["x_anggota2"] = <?php echo $tb_penelitian_add->anggota2->Lookup->toClientList() ?>;
ftb_penelitianadd.lists["x_anggota2"].options = <?php echo JsonEncode($tb_penelitian_add->anggota2->lookupOptions()) ?>;
ftb_penelitianadd.autoSuggests["x_anggota2"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_penelitianadd.lists["x_id_jurusan"] = <?php echo $tb_penelitian_add->id_jurusan->Lookup->toClientList() ?>;
ftb_penelitianadd.lists["x_id_jurusan"].options = <?php echo JsonEncode($tb_penelitian_add->id_jurusan->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_penelitian_add->showPageHeader(); ?>
<?php
$tb_penelitian_add->showMessage();
?>
<form name="ftb_penelitianadd" id="ftb_penelitianadd" class="<?php echo $tb_penelitian_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_penelitian_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_penelitian_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_penelitian">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$tb_penelitian_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($tb_penelitian->NIDN->Visible) { // NIDN ?>
	<div id="r_NIDN" class="form-group row">
		<label id="elh_tb_penelitian_NIDN" class="<?php echo $tb_penelitian_add->LeftColumnClass ?>"><?php echo $tb_penelitian->NIDN->caption() ?><?php echo ($tb_penelitian->NIDN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian_add->RightColumnClass ?>"><div<?php echo $tb_penelitian->NIDN->cellAttributes() ?>>
<?php if (!$Security->isAdmin() && $Security->isLoggedIn() && !$tb_penelitian->userIDAllow("add")) { // Non system admin ?>
<span id="el_tb_penelitian_NIDN">
<span<?php echo $tb_penelitian->NIDN->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_penelitian->NIDN->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_penelitian" data-field="x_NIDN" name="x_NIDN" id="x_NIDN" value="<?php echo HtmlEncode($tb_penelitian->NIDN->CurrentValue) ?>">
<?php } else { ?>
<span id="el_tb_penelitian_NIDN">
<?php
$wrkonchange = "" . trim(@$tb_penelitian->NIDN->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_penelitian->NIDN->EditAttrs["onchange"] = "";
?>
<span id="as_x_NIDN" class="text-nowrap" style="z-index: 8980">
	<input type="text" class="form-control" name="sv_x_NIDN" id="sv_x_NIDN" value="<?php echo RemoveHtml($tb_penelitian->NIDN->EditValue) ?>" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($tb_penelitian->NIDN->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_penelitian->NIDN->getPlaceHolder()) ?>"<?php echo $tb_penelitian->NIDN->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_penelitian" data-field="x_NIDN" data-value-separator="<?php echo $tb_penelitian->NIDN->displayValueSeparatorAttribute() ?>" name="x_NIDN" id="x_NIDN" value="<?php echo HtmlEncode($tb_penelitian->NIDN->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_penelitianadd.createAutoSuggest({"id":"x_NIDN","forceSelect":false});
</script>
<?php echo $tb_penelitian->NIDN->Lookup->getParamTag("p_x_NIDN") ?>
</span>
<?php } ?>
<?php echo $tb_penelitian->NIDN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_penelitian->anggota1->Visible) { // anggota1 ?>
	<div id="r_anggota1" class="form-group row">
		<label id="elh_tb_penelitian_anggota1" class="<?php echo $tb_penelitian_add->LeftColumnClass ?>"><?php echo $tb_penelitian->anggota1->caption() ?><?php echo ($tb_penelitian->anggota1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian_add->RightColumnClass ?>"><div<?php echo $tb_penelitian->anggota1->cellAttributes() ?>>
<span id="el_tb_penelitian_anggota1">
<?php
$wrkonchange = "" . trim(@$tb_penelitian->anggota1->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_penelitian->anggota1->EditAttrs["onchange"] = "";
?>
<span id="as_x_anggota1" class="text-nowrap" style="z-index: 8970">
	<input type="text" class="form-control" name="sv_x_anggota1" id="sv_x_anggota1" value="<?php echo RemoveHtml($tb_penelitian->anggota1->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($tb_penelitian->anggota1->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_penelitian->anggota1->getPlaceHolder()) ?>"<?php echo $tb_penelitian->anggota1->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_penelitian" data-field="x_anggota1" data-value-separator="<?php echo $tb_penelitian->anggota1->displayValueSeparatorAttribute() ?>" name="x_anggota1" id="x_anggota1" value="<?php echo HtmlEncode($tb_penelitian->anggota1->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_penelitianadd.createAutoSuggest({"id":"x_anggota1","forceSelect":false});
</script>
<?php echo $tb_penelitian->anggota1->Lookup->getParamTag("p_x_anggota1") ?>
</span>
<?php echo $tb_penelitian->anggota1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_penelitian->anggota2->Visible) { // anggota2 ?>
	<div id="r_anggota2" class="form-group row">
		<label id="elh_tb_penelitian_anggota2" class="<?php echo $tb_penelitian_add->LeftColumnClass ?>"><?php echo $tb_penelitian->anggota2->caption() ?><?php echo ($tb_penelitian->anggota2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian_add->RightColumnClass ?>"><div<?php echo $tb_penelitian->anggota2->cellAttributes() ?>>
<span id="el_tb_penelitian_anggota2">
<?php
$wrkonchange = "" . trim(@$tb_penelitian->anggota2->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_penelitian->anggota2->EditAttrs["onchange"] = "";
?>
<span id="as_x_anggota2" class="text-nowrap" style="z-index: 8960">
	<input type="text" class="form-control" name="sv_x_anggota2" id="sv_x_anggota2" value="<?php echo RemoveHtml($tb_penelitian->anggota2->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($tb_penelitian->anggota2->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_penelitian->anggota2->getPlaceHolder()) ?>"<?php echo $tb_penelitian->anggota2->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_penelitian" data-field="x_anggota2" data-value-separator="<?php echo $tb_penelitian->anggota2->displayValueSeparatorAttribute() ?>" name="x_anggota2" id="x_anggota2" value="<?php echo HtmlEncode($tb_penelitian->anggota2->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_penelitianadd.createAutoSuggest({"id":"x_anggota2","forceSelect":false});
</script>
<?php echo $tb_penelitian->anggota2->Lookup->getParamTag("p_x_anggota2") ?>
</span>
<?php echo $tb_penelitian->anggota2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_penelitian->id_jurusan->Visible) { // id_jurusan ?>
	<div id="r_id_jurusan" class="form-group row">
		<label id="elh_tb_penelitian_id_jurusan" for="x_id_jurusan" class="<?php echo $tb_penelitian_add->LeftColumnClass ?>"><?php echo $tb_penelitian->id_jurusan->caption() ?><?php echo ($tb_penelitian->id_jurusan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian_add->RightColumnClass ?>"><div<?php echo $tb_penelitian->id_jurusan->cellAttributes() ?>>
<span id="el_tb_penelitian_id_jurusan">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tb_penelitian" data-field="x_id_jurusan" data-value-separator="<?php echo $tb_penelitian->id_jurusan->displayValueSeparatorAttribute() ?>" id="x_id_jurusan" name="x_id_jurusan"<?php echo $tb_penelitian->id_jurusan->editAttributes() ?>>
		<?php echo $tb_penelitian->id_jurusan->selectOptionListHtml("x_id_jurusan") ?>
	</select>
</div>
</span>
<?php echo $tb_penelitian->id_jurusan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_penelitian->judul->Visible) { // judul ?>
	<div id="r_judul" class="form-group row">
		<label id="elh_tb_penelitian_judul" for="x_judul" class="<?php echo $tb_penelitian_add->LeftColumnClass ?>"><?php echo $tb_penelitian->judul->caption() ?><?php echo ($tb_penelitian->judul->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian_add->RightColumnClass ?>"><div<?php echo $tb_penelitian->judul->cellAttributes() ?>>
<span id="el_tb_penelitian_judul">
<textarea data-table="tb_penelitian" data-field="x_judul" name="x_judul" id="x_judul" cols="35" rows="4" placeholder="<?php echo HtmlEncode($tb_penelitian->judul->getPlaceHolder()) ?>"<?php echo $tb_penelitian->judul->editAttributes() ?>><?php echo $tb_penelitian->judul->EditValue ?></textarea>
</span>
<?php echo $tb_penelitian->judul->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_penelitian->biaya->Visible) { // biaya ?>
	<div id="r_biaya" class="form-group row">
		<label id="elh_tb_penelitian_biaya" for="x_biaya" class="<?php echo $tb_penelitian_add->LeftColumnClass ?>"><?php echo $tb_penelitian->biaya->caption() ?><?php echo ($tb_penelitian->biaya->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian_add->RightColumnClass ?>"><div<?php echo $tb_penelitian->biaya->cellAttributes() ?>>
<span id="el_tb_penelitian_biaya">
<input type="text" data-table="tb_penelitian" data-field="x_biaya" name="x_biaya" id="x_biaya" size="30" placeholder="<?php echo HtmlEncode($tb_penelitian->biaya->getPlaceHolder()) ?>" value="<?php echo $tb_penelitian->biaya->EditValue ?>"<?php echo $tb_penelitian->biaya->editAttributes() ?>>
</span>
<?php echo $tb_penelitian->biaya->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_penelitian->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_tb_penelitian_tahun" for="x_tahun" class="<?php echo $tb_penelitian_add->LeftColumnClass ?>"><?php echo $tb_penelitian->tahun->caption() ?><?php echo ($tb_penelitian->tahun->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian_add->RightColumnClass ?>"><div<?php echo $tb_penelitian->tahun->cellAttributes() ?>>
<span id="el_tb_penelitian_tahun">
<input type="text" data-table="tb_penelitian" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($tb_penelitian->tahun->getPlaceHolder()) ?>" value="<?php echo $tb_penelitian->tahun->EditValue ?>"<?php echo $tb_penelitian->tahun->editAttributes() ?>>
</span>
<?php echo $tb_penelitian->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_penelitian->LP->Visible) { // LP ?>
	<div id="r_LP" class="form-group row">
		<label id="elh_tb_penelitian_LP" class="<?php echo $tb_penelitian_add->LeftColumnClass ?>"><?php echo $tb_penelitian->LP->caption() ?><?php echo ($tb_penelitian->LP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian_add->RightColumnClass ?>"><div<?php echo $tb_penelitian->LP->cellAttributes() ?>>
<span id="el_tb_penelitian_LP">
<div id="fd_x_LP">
<span title="<?php echo $tb_penelitian->LP->title() ? $tb_penelitian->LP->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($tb_penelitian->LP->ReadOnly || $tb_penelitian->LP->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="tb_penelitian" data-field="x_LP" name="x_LP" id="x_LP"<?php echo $tb_penelitian->LP->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_LP" id= "fn_x_LP" value="<?php echo $tb_penelitian->LP->Upload->FileName ?>">
<input type="hidden" name="fa_x_LP" id= "fa_x_LP" value="0">
<input type="hidden" name="fs_x_LP" id= "fs_x_LP" value="100">
<input type="hidden" name="fx_x_LP" id= "fx_x_LP" value="<?php echo $tb_penelitian->LP->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_LP" id= "fm_x_LP" value="<?php echo $tb_penelitian->LP->UploadMaxFileSize ?>">
</div>
<table id="ft_x_LP" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $tb_penelitian->LP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_penelitian->LK->Visible) { // LK ?>
	<div id="r_LK" class="form-group row">
		<label id="elh_tb_penelitian_LK" class="<?php echo $tb_penelitian_add->LeftColumnClass ?>"><?php echo $tb_penelitian->LK->caption() ?><?php echo ($tb_penelitian->LK->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian_add->RightColumnClass ?>"><div<?php echo $tb_penelitian->LK->cellAttributes() ?>>
<span id="el_tb_penelitian_LK">
<div id="fd_x_LK">
<span title="<?php echo $tb_penelitian->LK->title() ? $tb_penelitian->LK->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($tb_penelitian->LK->ReadOnly || $tb_penelitian->LK->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="tb_penelitian" data-field="x_LK" name="x_LK" id="x_LK"<?php echo $tb_penelitian->LK->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_LK" id= "fn_x_LK" value="<?php echo $tb_penelitian->LK->Upload->FileName ?>">
<input type="hidden" name="fa_x_LK" id= "fa_x_LK" value="0">
<input type="hidden" name="fs_x_LK" id= "fs_x_LK" value="100">
<input type="hidden" name="fx_x_LK" id= "fx_x_LK" value="<?php echo $tb_penelitian->LK->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_LK" id= "fm_x_LK" value="<?php echo $tb_penelitian->LK->UploadMaxFileSize ?>">
</div>
<table id="ft_x_LK" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $tb_penelitian->LK->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_penelitian->output->Visible) { // output ?>
	<div id="r_output" class="form-group row">
		<label id="elh_tb_penelitian_output" class="<?php echo $tb_penelitian_add->LeftColumnClass ?>"><?php echo $tb_penelitian->output->caption() ?><?php echo ($tb_penelitian->output->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_penelitian_add->RightColumnClass ?>"><div<?php echo $tb_penelitian->output->cellAttributes() ?>>
<span id="el_tb_penelitian_output">
<div id="fd_x_output">
<span title="<?php echo $tb_penelitian->output->title() ? $tb_penelitian->output->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($tb_penelitian->output->ReadOnly || $tb_penelitian->output->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="tb_penelitian" data-field="x_output" name="x_output" id="x_output"<?php echo $tb_penelitian->output->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_output" id= "fn_x_output" value="<?php echo $tb_penelitian->output->Upload->FileName ?>">
<input type="hidden" name="fa_x_output" id= "fa_x_output" value="0">
<input type="hidden" name="fs_x_output" id= "fs_x_output" value="100">
<input type="hidden" name="fx_x_output" id= "fx_x_output" value="<?php echo $tb_penelitian->output->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_output" id= "fm_x_output" value="<?php echo $tb_penelitian->output->UploadMaxFileSize ?>">
</div>
<table id="ft_x_output" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $tb_penelitian->output->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tb_penelitian_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tb_penelitian_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_penelitian_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tb_penelitian_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_penelitian_add->terminate();
?>