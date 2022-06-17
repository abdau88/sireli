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
$tb_pengabdian_edit = new tb_pengabdian_edit();

// Run the page
$tb_pengabdian_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_pengabdian_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ftb_pengabdianedit = currentForm = new ew.Form("ftb_pengabdianedit", "edit");

// Validate form
ftb_pengabdianedit.validate = function() {
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
		<?php if ($tb_pengabdian_edit->id_pengabdian->Required) { ?>
			elm = this.getElements("x" + infix + "_id_pengabdian");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_pengabdian->id_pengabdian->caption(), $tb_pengabdian->id_pengabdian->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_pengabdian_edit->NIDN->Required) { ?>
			elm = this.getElements("x" + infix + "_NIDN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_pengabdian->NIDN->caption(), $tb_pengabdian->NIDN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_pengabdian_edit->anggota1->Required) { ?>
			elm = this.getElements("x" + infix + "_anggota1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_pengabdian->anggota1->caption(), $tb_pengabdian->anggota1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_pengabdian_edit->anggota2->Required) { ?>
			elm = this.getElements("x" + infix + "_anggota2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_pengabdian->anggota2->caption(), $tb_pengabdian->anggota2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_pengabdian_edit->anggota3->Required) { ?>
			elm = this.getElements("x" + infix + "_anggota3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_pengabdian->anggota3->caption(), $tb_pengabdian->anggota3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_pengabdian_edit->anggota4->Required) { ?>
			elm = this.getElements("x" + infix + "_anggota4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_pengabdian->anggota4->caption(), $tb_pengabdian->anggota4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_pengabdian_edit->judul->Required) { ?>
			elm = this.getElements("x" + infix + "_judul");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_pengabdian->judul->caption(), $tb_pengabdian->judul->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_pengabdian_edit->biaya->Required) { ?>
			elm = this.getElements("x" + infix + "_biaya");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_pengabdian->biaya->caption(), $tb_pengabdian->biaya->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_biaya");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($tb_pengabdian->biaya->errorMessage()) ?>");
		<?php if ($tb_pengabdian_edit->tahun->Required) { ?>
			elm = this.getElements("x" + infix + "_tahun");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_pengabdian->tahun->caption(), $tb_pengabdian->tahun->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_pengabdian_edit->LP2->Required) { ?>
			felm = this.getElements("x" + infix + "_LP2");
			elm = this.getElements("fn_x" + infix + "_LP2");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $tb_pengabdian->LP2->caption(), $tb_pengabdian->LP2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_pengabdian_edit->LK->Required) { ?>
			felm = this.getElements("x" + infix + "_LK");
			elm = this.getElements("fn_x" + infix + "_LK");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $tb_pengabdian->LK->caption(), $tb_pengabdian->LK->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_pengabdian_edit->output->Required) { ?>
			felm = this.getElements("x" + infix + "_output");
			elm = this.getElements("fn_x" + infix + "_output");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $tb_pengabdian->output->caption(), $tb_pengabdian->output->RequiredErrorMessage)) ?>");
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
ftb_pengabdianedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_pengabdianedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_pengabdianedit.lists["x_NIDN"] = <?php echo $tb_pengabdian_edit->NIDN->Lookup->toClientList() ?>;
ftb_pengabdianedit.lists["x_NIDN"].options = <?php echo JsonEncode($tb_pengabdian_edit->NIDN->lookupOptions()) ?>;
ftb_pengabdianedit.autoSuggests["x_NIDN"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_pengabdianedit.lists["x_anggota1"] = <?php echo $tb_pengabdian_edit->anggota1->Lookup->toClientList() ?>;
ftb_pengabdianedit.lists["x_anggota1"].options = <?php echo JsonEncode($tb_pengabdian_edit->anggota1->lookupOptions()) ?>;
ftb_pengabdianedit.autoSuggests["x_anggota1"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_pengabdianedit.lists["x_anggota2"] = <?php echo $tb_pengabdian_edit->anggota2->Lookup->toClientList() ?>;
ftb_pengabdianedit.lists["x_anggota2"].options = <?php echo JsonEncode($tb_pengabdian_edit->anggota2->lookupOptions()) ?>;
ftb_pengabdianedit.autoSuggests["x_anggota2"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_pengabdianedit.lists["x_anggota3"] = <?php echo $tb_pengabdian_edit->anggota3->Lookup->toClientList() ?>;
ftb_pengabdianedit.lists["x_anggota3"].options = <?php echo JsonEncode($tb_pengabdian_edit->anggota3->lookupOptions()) ?>;
ftb_pengabdianedit.autoSuggests["x_anggota3"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_pengabdianedit.lists["x_anggota4"] = <?php echo $tb_pengabdian_edit->anggota4->Lookup->toClientList() ?>;
ftb_pengabdianedit.lists["x_anggota4"].options = <?php echo JsonEncode($tb_pengabdian_edit->anggota4->lookupOptions()) ?>;
ftb_pengabdianedit.autoSuggests["x_anggota4"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_pengabdian_edit->showPageHeader(); ?>
<?php
$tb_pengabdian_edit->showMessage();
?>
<form name="ftb_pengabdianedit" id="ftb_pengabdianedit" class="<?php echo $tb_pengabdian_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_pengabdian_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_pengabdian_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_pengabdian">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tb_pengabdian_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($tb_pengabdian->id_pengabdian->Visible) { // id_pengabdian ?>
	<div id="r_id_pengabdian" class="form-group row">
		<label id="elh_tb_pengabdian_id_pengabdian" class="<?php echo $tb_pengabdian_edit->LeftColumnClass ?>"><?php echo $tb_pengabdian->id_pengabdian->caption() ?><?php echo ($tb_pengabdian->id_pengabdian->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_pengabdian_edit->RightColumnClass ?>"><div<?php echo $tb_pengabdian->id_pengabdian->cellAttributes() ?>>
<span id="el_tb_pengabdian_id_pengabdian">
<span<?php echo $tb_pengabdian->id_pengabdian->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_pengabdian->id_pengabdian->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_pengabdian" data-field="x_id_pengabdian" name="x_id_pengabdian" id="x_id_pengabdian" value="<?php echo HtmlEncode($tb_pengabdian->id_pengabdian->CurrentValue) ?>">
<?php echo $tb_pengabdian->id_pengabdian->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_pengabdian->NIDN->Visible) { // NIDN ?>
	<div id="r_NIDN" class="form-group row">
		<label id="elh_tb_pengabdian_NIDN" class="<?php echo $tb_pengabdian_edit->LeftColumnClass ?>"><?php echo $tb_pengabdian->NIDN->caption() ?><?php echo ($tb_pengabdian->NIDN->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_pengabdian_edit->RightColumnClass ?>"><div<?php echo $tb_pengabdian->NIDN->cellAttributes() ?>>
<?php if (!$Security->isAdmin() && $Security->isLoggedIn() && !$tb_pengabdian->userIDAllow("edit")) { // Non system admin ?>
<span id="el_tb_pengabdian_NIDN">
<span<?php echo $tb_pengabdian->NIDN->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_pengabdian->NIDN->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_pengabdian" data-field="x_NIDN" name="x_NIDN" id="x_NIDN" value="<?php echo HtmlEncode($tb_pengabdian->NIDN->CurrentValue) ?>">
<?php } else { ?>
<span id="el_tb_pengabdian_NIDN">
<?php
$wrkonchange = "" . trim(@$tb_pengabdian->NIDN->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_pengabdian->NIDN->EditAttrs["onchange"] = "";
?>
<span id="as_x_NIDN" class="text-nowrap" style="z-index: 8980">
	<input type="text" class="form-control" name="sv_x_NIDN" id="sv_x_NIDN" value="<?php echo RemoveHtml($tb_pengabdian->NIDN->EditValue) ?>" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($tb_pengabdian->NIDN->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_pengabdian->NIDN->getPlaceHolder()) ?>"<?php echo $tb_pengabdian->NIDN->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_pengabdian" data-field="x_NIDN" data-value-separator="<?php echo $tb_pengabdian->NIDN->displayValueSeparatorAttribute() ?>" name="x_NIDN" id="x_NIDN" value="<?php echo HtmlEncode($tb_pengabdian->NIDN->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_pengabdianedit.createAutoSuggest({"id":"x_NIDN","forceSelect":false});
</script>
<?php echo $tb_pengabdian->NIDN->Lookup->getParamTag("p_x_NIDN") ?>
</span>
<?php } ?>
<?php echo $tb_pengabdian->NIDN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_pengabdian->anggota1->Visible) { // anggota1 ?>
	<div id="r_anggota1" class="form-group row">
		<label id="elh_tb_pengabdian_anggota1" class="<?php echo $tb_pengabdian_edit->LeftColumnClass ?>"><?php echo $tb_pengabdian->anggota1->caption() ?><?php echo ($tb_pengabdian->anggota1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_pengabdian_edit->RightColumnClass ?>"><div<?php echo $tb_pengabdian->anggota1->cellAttributes() ?>>
<span id="el_tb_pengabdian_anggota1">
<?php
$wrkonchange = "" . trim(@$tb_pengabdian->anggota1->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_pengabdian->anggota1->EditAttrs["onchange"] = "";
?>
<span id="as_x_anggota1" class="text-nowrap" style="z-index: 8970">
	<input type="text" class="form-control" name="sv_x_anggota1" id="sv_x_anggota1" value="<?php echo RemoveHtml($tb_pengabdian->anggota1->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($tb_pengabdian->anggota1->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_pengabdian->anggota1->getPlaceHolder()) ?>"<?php echo $tb_pengabdian->anggota1->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_pengabdian" data-field="x_anggota1" data-value-separator="<?php echo $tb_pengabdian->anggota1->displayValueSeparatorAttribute() ?>" name="x_anggota1" id="x_anggota1" value="<?php echo HtmlEncode($tb_pengabdian->anggota1->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_pengabdianedit.createAutoSuggest({"id":"x_anggota1","forceSelect":false});
</script>
<?php echo $tb_pengabdian->anggota1->Lookup->getParamTag("p_x_anggota1") ?>
</span>
<?php echo $tb_pengabdian->anggota1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_pengabdian->anggota2->Visible) { // anggota2 ?>
	<div id="r_anggota2" class="form-group row">
		<label id="elh_tb_pengabdian_anggota2" class="<?php echo $tb_pengabdian_edit->LeftColumnClass ?>"><?php echo $tb_pengabdian->anggota2->caption() ?><?php echo ($tb_pengabdian->anggota2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_pengabdian_edit->RightColumnClass ?>"><div<?php echo $tb_pengabdian->anggota2->cellAttributes() ?>>
<span id="el_tb_pengabdian_anggota2">
<?php
$wrkonchange = "" . trim(@$tb_pengabdian->anggota2->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_pengabdian->anggota2->EditAttrs["onchange"] = "";
?>
<span id="as_x_anggota2" class="text-nowrap" style="z-index: 8960">
	<input type="text" class="form-control" name="sv_x_anggota2" id="sv_x_anggota2" value="<?php echo RemoveHtml($tb_pengabdian->anggota2->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($tb_pengabdian->anggota2->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_pengabdian->anggota2->getPlaceHolder()) ?>"<?php echo $tb_pengabdian->anggota2->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_pengabdian" data-field="x_anggota2" data-value-separator="<?php echo $tb_pengabdian->anggota2->displayValueSeparatorAttribute() ?>" name="x_anggota2" id="x_anggota2" value="<?php echo HtmlEncode($tb_pengabdian->anggota2->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_pengabdianedit.createAutoSuggest({"id":"x_anggota2","forceSelect":false});
</script>
<?php echo $tb_pengabdian->anggota2->Lookup->getParamTag("p_x_anggota2") ?>
</span>
<?php echo $tb_pengabdian->anggota2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_pengabdian->anggota3->Visible) { // anggota3 ?>
	<div id="r_anggota3" class="form-group row">
		<label id="elh_tb_pengabdian_anggota3" class="<?php echo $tb_pengabdian_edit->LeftColumnClass ?>"><?php echo $tb_pengabdian->anggota3->caption() ?><?php echo ($tb_pengabdian->anggota3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_pengabdian_edit->RightColumnClass ?>"><div<?php echo $tb_pengabdian->anggota3->cellAttributes() ?>>
<span id="el_tb_pengabdian_anggota3">
<?php
$wrkonchange = "" . trim(@$tb_pengabdian->anggota3->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_pengabdian->anggota3->EditAttrs["onchange"] = "";
?>
<span id="as_x_anggota3" class="text-nowrap" style="z-index: 8950">
	<input type="text" class="form-control" name="sv_x_anggota3" id="sv_x_anggota3" value="<?php echo RemoveHtml($tb_pengabdian->anggota3->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($tb_pengabdian->anggota3->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_pengabdian->anggota3->getPlaceHolder()) ?>"<?php echo $tb_pengabdian->anggota3->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_pengabdian" data-field="x_anggota3" data-value-separator="<?php echo $tb_pengabdian->anggota3->displayValueSeparatorAttribute() ?>" name="x_anggota3" id="x_anggota3" value="<?php echo HtmlEncode($tb_pengabdian->anggota3->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_pengabdianedit.createAutoSuggest({"id":"x_anggota3","forceSelect":false});
</script>
<?php echo $tb_pengabdian->anggota3->Lookup->getParamTag("p_x_anggota3") ?>
</span>
<?php echo $tb_pengabdian->anggota3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_pengabdian->anggota4->Visible) { // anggota4 ?>
	<div id="r_anggota4" class="form-group row">
		<label id="elh_tb_pengabdian_anggota4" class="<?php echo $tb_pengabdian_edit->LeftColumnClass ?>"><?php echo $tb_pengabdian->anggota4->caption() ?><?php echo ($tb_pengabdian->anggota4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_pengabdian_edit->RightColumnClass ?>"><div<?php echo $tb_pengabdian->anggota4->cellAttributes() ?>>
<span id="el_tb_pengabdian_anggota4">
<?php
$wrkonchange = "" . trim(@$tb_pengabdian->anggota4->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_pengabdian->anggota4->EditAttrs["onchange"] = "";
?>
<span id="as_x_anggota4" class="text-nowrap" style="z-index: 8940">
	<input type="text" class="form-control" name="sv_x_anggota4" id="sv_x_anggota4" value="<?php echo RemoveHtml($tb_pengabdian->anggota4->EditValue) ?>" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($tb_pengabdian->anggota4->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_pengabdian->anggota4->getPlaceHolder()) ?>"<?php echo $tb_pengabdian->anggota4->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_pengabdian" data-field="x_anggota4" data-value-separator="<?php echo $tb_pengabdian->anggota4->displayValueSeparatorAttribute() ?>" name="x_anggota4" id="x_anggota4" value="<?php echo HtmlEncode($tb_pengabdian->anggota4->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_pengabdianedit.createAutoSuggest({"id":"x_anggota4","forceSelect":false});
</script>
<?php echo $tb_pengabdian->anggota4->Lookup->getParamTag("p_x_anggota4") ?>
</span>
<?php echo $tb_pengabdian->anggota4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_pengabdian->judul->Visible) { // judul ?>
	<div id="r_judul" class="form-group row">
		<label id="elh_tb_pengabdian_judul" for="x_judul" class="<?php echo $tb_pengabdian_edit->LeftColumnClass ?>"><?php echo $tb_pengabdian->judul->caption() ?><?php echo ($tb_pengabdian->judul->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_pengabdian_edit->RightColumnClass ?>"><div<?php echo $tb_pengabdian->judul->cellAttributes() ?>>
<span id="el_tb_pengabdian_judul">
<textarea data-table="tb_pengabdian" data-field="x_judul" name="x_judul" id="x_judul" cols="35" rows="4" placeholder="<?php echo HtmlEncode($tb_pengabdian->judul->getPlaceHolder()) ?>"<?php echo $tb_pengabdian->judul->editAttributes() ?>><?php echo $tb_pengabdian->judul->EditValue ?></textarea>
</span>
<?php echo $tb_pengabdian->judul->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_pengabdian->biaya->Visible) { // biaya ?>
	<div id="r_biaya" class="form-group row">
		<label id="elh_tb_pengabdian_biaya" for="x_biaya" class="<?php echo $tb_pengabdian_edit->LeftColumnClass ?>"><?php echo $tb_pengabdian->biaya->caption() ?><?php echo ($tb_pengabdian->biaya->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_pengabdian_edit->RightColumnClass ?>"><div<?php echo $tb_pengabdian->biaya->cellAttributes() ?>>
<span id="el_tb_pengabdian_biaya">
<input type="text" data-table="tb_pengabdian" data-field="x_biaya" name="x_biaya" id="x_biaya" size="30" placeholder="<?php echo HtmlEncode($tb_pengabdian->biaya->getPlaceHolder()) ?>" value="<?php echo $tb_pengabdian->biaya->EditValue ?>"<?php echo $tb_pengabdian->biaya->editAttributes() ?>>
</span>
<?php echo $tb_pengabdian->biaya->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_pengabdian->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_tb_pengabdian_tahun" for="x_tahun" class="<?php echo $tb_pengabdian_edit->LeftColumnClass ?>"><?php echo $tb_pengabdian->tahun->caption() ?><?php echo ($tb_pengabdian->tahun->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_pengabdian_edit->RightColumnClass ?>"><div<?php echo $tb_pengabdian->tahun->cellAttributes() ?>>
<span id="el_tb_pengabdian_tahun">
<input type="text" data-table="tb_pengabdian" data-field="x_tahun" name="x_tahun" id="x_tahun" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($tb_pengabdian->tahun->getPlaceHolder()) ?>" value="<?php echo $tb_pengabdian->tahun->EditValue ?>"<?php echo $tb_pengabdian->tahun->editAttributes() ?>>
</span>
<?php echo $tb_pengabdian->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_pengabdian->LP2->Visible) { // LP2 ?>
	<div id="r_LP2" class="form-group row">
		<label id="elh_tb_pengabdian_LP2" class="<?php echo $tb_pengabdian_edit->LeftColumnClass ?>"><?php echo $tb_pengabdian->LP2->caption() ?><?php echo ($tb_pengabdian->LP2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_pengabdian_edit->RightColumnClass ?>"><div<?php echo $tb_pengabdian->LP2->cellAttributes() ?>>
<span id="el_tb_pengabdian_LP2">
<div id="fd_x_LP2">
<span title="<?php echo $tb_pengabdian->LP2->title() ? $tb_pengabdian->LP2->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($tb_pengabdian->LP2->ReadOnly || $tb_pengabdian->LP2->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="tb_pengabdian" data-field="x_LP2" name="x_LP2" id="x_LP2"<?php echo $tb_pengabdian->LP2->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_LP2" id= "fn_x_LP2" value="<?php echo $tb_pengabdian->LP2->Upload->FileName ?>">
<?php if (Post("fa_x_LP2") == "0") { ?>
<input type="hidden" name="fa_x_LP2" id= "fa_x_LP2" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_LP2" id= "fa_x_LP2" value="1">
<?php } ?>
<input type="hidden" name="fs_x_LP2" id= "fs_x_LP2" value="100">
<input type="hidden" name="fx_x_LP2" id= "fx_x_LP2" value="<?php echo $tb_pengabdian->LP2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_LP2" id= "fm_x_LP2" value="<?php echo $tb_pengabdian->LP2->UploadMaxFileSize ?>">
</div>
<table id="ft_x_LP2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $tb_pengabdian->LP2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_pengabdian->LK->Visible) { // LK ?>
	<div id="r_LK" class="form-group row">
		<label id="elh_tb_pengabdian_LK" class="<?php echo $tb_pengabdian_edit->LeftColumnClass ?>"><?php echo $tb_pengabdian->LK->caption() ?><?php echo ($tb_pengabdian->LK->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_pengabdian_edit->RightColumnClass ?>"><div<?php echo $tb_pengabdian->LK->cellAttributes() ?>>
<span id="el_tb_pengabdian_LK">
<div id="fd_x_LK">
<span title="<?php echo $tb_pengabdian->LK->title() ? $tb_pengabdian->LK->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($tb_pengabdian->LK->ReadOnly || $tb_pengabdian->LK->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="tb_pengabdian" data-field="x_LK" name="x_LK" id="x_LK"<?php echo $tb_pengabdian->LK->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_LK" id= "fn_x_LK" value="<?php echo $tb_pengabdian->LK->Upload->FileName ?>">
<?php if (Post("fa_x_LK") == "0") { ?>
<input type="hidden" name="fa_x_LK" id= "fa_x_LK" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_LK" id= "fa_x_LK" value="1">
<?php } ?>
<input type="hidden" name="fs_x_LK" id= "fs_x_LK" value="100">
<input type="hidden" name="fx_x_LK" id= "fx_x_LK" value="<?php echo $tb_pengabdian->LK->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_LK" id= "fm_x_LK" value="<?php echo $tb_pengabdian->LK->UploadMaxFileSize ?>">
</div>
<table id="ft_x_LK" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $tb_pengabdian->LK->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_pengabdian->output->Visible) { // output ?>
	<div id="r_output" class="form-group row">
		<label id="elh_tb_pengabdian_output" class="<?php echo $tb_pengabdian_edit->LeftColumnClass ?>"><?php echo $tb_pengabdian->output->caption() ?><?php echo ($tb_pengabdian->output->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_pengabdian_edit->RightColumnClass ?>"><div<?php echo $tb_pengabdian->output->cellAttributes() ?>>
<span id="el_tb_pengabdian_output">
<div id="fd_x_output">
<span title="<?php echo $tb_pengabdian->output->title() ? $tb_pengabdian->output->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($tb_pengabdian->output->ReadOnly || $tb_pengabdian->output->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="tb_pengabdian" data-field="x_output" name="x_output" id="x_output"<?php echo $tb_pengabdian->output->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_output" id= "fn_x_output" value="<?php echo $tb_pengabdian->output->Upload->FileName ?>">
<?php if (Post("fa_x_output") == "0") { ?>
<input type="hidden" name="fa_x_output" id= "fa_x_output" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x_output" id= "fa_x_output" value="1">
<?php } ?>
<input type="hidden" name="fs_x_output" id= "fs_x_output" value="100">
<input type="hidden" name="fx_x_output" id= "fx_x_output" value="<?php echo $tb_pengabdian->output->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_output" id= "fm_x_output" value="<?php echo $tb_pengabdian->output->UploadMaxFileSize ?>">
</div>
<table id="ft_x_output" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php echo $tb_pengabdian->output->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tb_pengabdian_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tb_pengabdian_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_pengabdian_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tb_pengabdian_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_pengabdian_edit->terminate();
?>