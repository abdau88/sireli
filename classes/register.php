<?php
namespace PHPMaker2019\project2;

/**
 * Page class
 */
class register extends tb_dosen
{

	// Page ID
	public $PageID = "register";

	// Project ID
	public $ProjectID = "{6F3C73F1-7D22-4D79-93D1-87C709939CCD}";

	// Page object name
	public $PageObjName = "register";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Page URL
	private $_pageUrl = "";

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading <> "")
			return $this->Subheading;
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		if ($this->_pageUrl == "") {
			$this->_pageUrl = CurrentPageName() . "?";
		}
		return $this->_pageUrl;
	}

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = FALSE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = array();

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message <> "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage <> "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage <> "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage <> "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = PROJECT_NAMESPACE . CREATE_TOKEN_FUNC; // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $COMPOSITE_KEY_SEPARATOR;
		global $UserTable, $UserTableConn;

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (tb_dosen)
		if (!isset($GLOBALS["tb_dosen"]) || get_class($GLOBALS["tb_dosen"]) == PROJECT_NAMESPACE . "tb_dosen") {
			$GLOBALS["tb_dosen"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["tb_dosen"];
		}
		if (!isset($GLOBALS["tb_dosen"]))
			$GLOBALS["tb_dosen"] = new tb_dosen();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'register');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &$this->getConnection();

		// User table object (tb_dosen)
		if (!isset($UserTable)) {
			$UserTable = new tb_dosen();
			$UserTableConn = Conn($UserTable->Dbid);
		}
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			SaveDebugMessage();
			AddHeader("Location", $url);
		}
		exit();
	}
	public $FormClassName = "ew-horizontal ew-form ew-register-form";

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$UserTableConn, $CurrentLanguage, $FormError, $Breadcrumb;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// User profile
		$UserProfile = new UserProfile();

		// Security
		$Security = new AdvancedSecurity();
		$validRequest = FALSE;

		// Check security for API request
		If (IsApi()) {

			// Check token first
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Post(TOKEN_NAME) !== NULL)
				$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			elseif (is_array($RequestSecurity) && @$RequestSecurity["username"] <> "") // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
		}
		if (!$validRequest) {
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();
		$this->FormClassName = "ew-form ew-register-form ew-horizontal";

		// Set up Breadcrumb
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb = new Breadcrumb();
		$Breadcrumb->add("register", "RegisterPage", $url, "", "", TRUE);
		$this->Heading = $Language->phrase("RegisterPage");
		$userExists = FALSE;
		$this->loadRowValues(); // Load default values
		if (Post("action") <> "") {

			// Get action
			$this->CurrentAction = Post("action");
			$this->loadFormValues(); // Get form values

			// Validate form
			if (!$this->validateForm()) {
				$this->CurrentAction = "show"; // Form error, reset action
				$this->setFailureMessage($FormError);
			}
		} else {
			$this->CurrentAction = "show"; // Display blank record
		}

		// Handle email activation
		if (Get("action") <> "") {
			$action = Get("action");
			$emailAddress = Get("email");
			$code = Get("token");
			@list($approvalCode, $usr, $pwd) = explode(",", $code, 3);
			$approvalCode = Decrypt($approvalCode);
			$usr = Decrypt($usr);
			$pwd = Decrypt($pwd);
			if ($emailAddress == $approvalCode) {
				if (SameText($action, "confirm")) { // Email activation
					if ($this->activateEmail($emailAddress)) { // Activate this email
						if ($this->getSuccessMessage() == "")
							$this->setSuccessMessage($Language->phrase("ActivateAccount")); // Set up message acount activated

						// Auto login user from cookie values
						//$usr = Decrypt(ReadCookie("Username"));
						//$pwd = Decrypt(ReadCookie("Password"));

						if ($Security->validateUser($usr, $pwd, TRUE)) {
							$this->terminate("index.php"); // Go to return page
						} else {
							$this->setFailureMessage($Language->phrase("AutoLoginFailed")); // Set auto login failed message
							$this->terminate("login.php"); // Go to login page
						}
					}
				}
			}
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("ActivateFailed")); // Set activate failed message
			$this->terminate("login.php"); // Go to login page
		}

		// Insert record
		if ($this->isInsert()) {

			// Check for duplicate User ID
			$filter = str_replace("%u", AdjustSql($this->NIDN->CurrentValue, USER_TABLE_DBID), USER_NAME_FILTER);

			// Set up filter (WHERE Clause)
			$this->CurrentFilter = $filter;
			$userSql = $this->getCurrentSql();
			if ($rs = $UserTableConn->execute($userSql)) {
				if (!$rs->EOF) {
					$userExists = TRUE;
					$this->restoreFormValues(); // Restore form values
					$this->setFailureMessage($Language->phrase("UserExists")); // Set user exist message
				}
				$rs->Close();
			}
			if (!$userExists) {
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow()) { // Add record
					$email = $this->prepareRegisterEmail();

					// Get new recordset
					$this->CurrentFilter = $this->getRecordFilter();
					$sql = $this->getCurrentSql();
					$rsnew = $UserTableConn->execute($sql);
					$row = $rsnew->fields;
					$args = array();
					$args["rs"] = $row;
					$emailSent = FALSE;
					if ($this->Email_Sending($email, $args))
						$emailSent = $email->send();

					// Send email failed
					if (!$emailSent)
						$this->setFailureMessage($email->SendErrDescription);
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("RegisterSuccessActivate")); // Activate success
					$this->terminate("index.php"); // Return
				} else {
					$this->restoreFormValues(); // Restore form values
				}
			}
		}

		// Render row
		if ($this->isConfirm()) { // Confirm page
			$this->RowType = ROWTYPE_VIEW; // Render view
		} else {
			$this->RowType = ROWTYPE_ADD; // Render add
		}
		$this->resetAttributes();
		$this->renderRow();
	}

	// Activate account based on email
	protected function activateEmail($email)
	{
		global $UserTableConn, $Language;
		$filter = str_replace("%e", AdjustSql($email, USER_TABLE_DBID), USER_EMAIL_FILTER);
		$sql = $this->getSql($filter);
		$UserTableConn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $UserTableConn->execute($sql);
		$UserTableConn->raiseErrorFn = '';
		if (!$rs)
			return FALSE;
		if (!$rs->EOF) {
			$rsnew = $rs->fields;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
			$rsact = array('activated' => 1); // Auto register
			$this->CurrentFilter = $filter;
			$res = $this->update($rsact);
			if ($res) { // Call User Activated event
				$rsnew['activated'] = 1;
				$this->User_Activated($rsnew);
			}
			return $res;
		} else {
			$this->setFailureMessage($Language->phrase("NoRecord"));
			$rs->close();
			return FALSE;
		}
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->NIDN->CurrentValue = NULL;
		$this->NIDN->OldValue = $this->NIDN->CurrentValue;
		$this->NPAK_NIP->CurrentValue = NULL;
		$this->NPAK_NIP->OldValue = $this->NPAK_NIP->CurrentValue;
		$this->Nama_Dosen->CurrentValue = NULL;
		$this->Nama_Dosen->OldValue = $this->Nama_Dosen->CurrentValue;
		$this->userlevel->CurrentValue = NULL;
		$this->userlevel->OldValue = $this->userlevel->CurrentValue;
		$this->id_jurusan->CurrentValue = NULL;
		$this->id_jurusan->OldValue = $this->id_jurusan->CurrentValue;
		$this->password->CurrentValue = NULL;
		$this->password->OldValue = $this->password->CurrentValue;
		$this->_email->CurrentValue = NULL;
		$this->_email->OldValue = $this->_email->CurrentValue;
		$this->no_hp->CurrentValue = NULL;
		$this->no_hp->OldValue = $this->no_hp->CurrentValue;
		$this->activated->CurrentValue = NULL;
		$this->activated->OldValue = $this->activated->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'NIDN' first before field var 'x_NIDN'
		$val = $CurrentForm->hasValue("NIDN") ? $CurrentForm->getValue("NIDN") : $CurrentForm->getValue("x_NIDN");
		if (!$this->NIDN->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NIDN->Visible = FALSE; // Disable update for API request
			else
				$this->NIDN->setFormValue($val);
		}

		// Check field name 'NPAK_NIP' first before field var 'x_NPAK_NIP'
		$val = $CurrentForm->hasValue("NPAK_NIP") ? $CurrentForm->getValue("NPAK_NIP") : $CurrentForm->getValue("x_NPAK_NIP");
		if (!$this->NPAK_NIP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NPAK_NIP->Visible = FALSE; // Disable update for API request
			else
				$this->NPAK_NIP->setFormValue($val);
		}

		// Check field name 'Nama_Dosen' first before field var 'x_Nama_Dosen'
		$val = $CurrentForm->hasValue("Nama_Dosen") ? $CurrentForm->getValue("Nama_Dosen") : $CurrentForm->getValue("x_Nama_Dosen");
		if (!$this->Nama_Dosen->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Nama_Dosen->Visible = FALSE; // Disable update for API request
			else
				$this->Nama_Dosen->setFormValue($val);
		}

		// Check field name 'id_jurusan' first before field var 'x_id_jurusan'
		$val = $CurrentForm->hasValue("id_jurusan") ? $CurrentForm->getValue("id_jurusan") : $CurrentForm->getValue("x_id_jurusan");
		if (!$this->id_jurusan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->id_jurusan->Visible = FALSE; // Disable update for API request
			else
				$this->id_jurusan->setFormValue($val);
		}

		// Check field name 'password' first before field var 'x_password'
		$val = $CurrentForm->hasValue("password") ? $CurrentForm->getValue("password") : $CurrentForm->getValue("x_password");
		if (!$this->password->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->password->Visible = FALSE; // Disable update for API request
			else
				$this->password->setFormValue($val);
		}
		$this->password->ConfirmValue = $CurrentForm->getValue("c_password");

		// Check field name 'email' first before field var 'x__email'
		$val = $CurrentForm->hasValue("email") ? $CurrentForm->getValue("email") : $CurrentForm->getValue("x__email");
		if (!$this->_email->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_email->Visible = FALSE; // Disable update for API request
			else
				$this->_email->setFormValue($val);
		}

		// Check field name 'no_hp' first before field var 'x_no_hp'
		$val = $CurrentForm->hasValue("no_hp") ? $CurrentForm->getValue("no_hp") : $CurrentForm->getValue("x_no_hp");
		if (!$this->no_hp->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->no_hp->Visible = FALSE; // Disable update for API request
			else
				$this->no_hp->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->NIDN->CurrentValue = $this->NIDN->FormValue;
		$this->NPAK_NIP->CurrentValue = $this->NPAK_NIP->FormValue;
		$this->Nama_Dosen->CurrentValue = $this->Nama_Dosen->FormValue;
		$this->id_jurusan->CurrentValue = $this->id_jurusan->FormValue;
		$this->password->CurrentValue = $this->password->FormValue;
		$this->_email->CurrentValue = $this->_email->FormValue;
		$this->no_hp->CurrentValue = $this->no_hp->FormValue;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->NIDN->setDbValue($row['NIDN']);
		$this->NPAK_NIP->setDbValue($row['NPAK_NIP']);
		$this->Nama_Dosen->setDbValue($row['Nama_Dosen']);
		$this->userlevel->setDbValue($row['userlevel']);
		$this->id_jurusan->setDbValue($row['id_jurusan']);
		$this->password->setDbValue($row['password']);
		$this->_email->setDbValue($row['email']);
		$this->no_hp->setDbValue($row['no_hp']);
		$this->activated->setDbValue($row['activated']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['NIDN'] = $this->NIDN->CurrentValue;
		$row['NPAK_NIP'] = $this->NPAK_NIP->CurrentValue;
		$row['Nama_Dosen'] = $this->Nama_Dosen->CurrentValue;
		$row['userlevel'] = $this->userlevel->CurrentValue;
		$row['id_jurusan'] = $this->id_jurusan->CurrentValue;
		$row['password'] = $this->password->CurrentValue;
		$row['email'] = $this->_email->CurrentValue;
		$row['no_hp'] = $this->no_hp->CurrentValue;
		$row['activated'] = $this->activated->CurrentValue;
		return $row;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// NIDN
		// NPAK_NIP
		// Nama_Dosen
		// userlevel
		// id_jurusan
		// password
		// email
		// no_hp
		// activated

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// NIDN
			$this->NIDN->ViewValue = $this->NIDN->CurrentValue;
			$this->NIDN->ViewCustomAttributes = "";

			// NPAK_NIP
			$this->NPAK_NIP->ViewValue = $this->NPAK_NIP->CurrentValue;
			$this->NPAK_NIP->ViewCustomAttributes = "";

			// Nama_Dosen
			$this->Nama_Dosen->ViewValue = $this->Nama_Dosen->CurrentValue;
			$this->Nama_Dosen->ViewCustomAttributes = "";

			// userlevel
			if ($Security->canAdmin()) { // System admin
			if (strval($this->userlevel->CurrentValue) <> "") {
				$this->userlevel->ViewValue = $this->userlevel->optionCaption($this->userlevel->CurrentValue);
			} else {
				$this->userlevel->ViewValue = NULL;
			}
			} else {
				$this->userlevel->ViewValue = $Language->phrase("PasswordMask");
			}
			$this->userlevel->ViewCustomAttributes = "";

			// id_jurusan
			if (strval($this->id_jurusan->CurrentValue) <> "") {
				$this->id_jurusan->ViewValue = $this->id_jurusan->optionCaption($this->id_jurusan->CurrentValue);
			} else {
				$this->id_jurusan->ViewValue = NULL;
			}
			$this->id_jurusan->ViewCustomAttributes = "";

			// password
			$this->password->ViewValue = $this->password->CurrentValue;
			$this->password->ViewCustomAttributes = "";

			// email
			$this->_email->ViewValue = $this->_email->CurrentValue;
			$this->_email->ViewCustomAttributes = "";

			// no_hp
			$this->no_hp->ViewValue = $this->no_hp->CurrentValue;
			$this->no_hp->ViewCustomAttributes = "";

			// activated
			$this->activated->ViewValue = $this->activated->CurrentValue;
			$this->activated->ViewValue = FormatNumber($this->activated->ViewValue, 0, -2, -2, -2);
			$this->activated->ViewCustomAttributes = "";

			// NIDN
			$this->NIDN->LinkCustomAttributes = "";
			$this->NIDN->HrefValue = "";
			$this->NIDN->TooltipValue = "";

			// NPAK_NIP
			$this->NPAK_NIP->LinkCustomAttributes = "";
			$this->NPAK_NIP->HrefValue = "";
			$this->NPAK_NIP->TooltipValue = "";

			// Nama_Dosen
			$this->Nama_Dosen->LinkCustomAttributes = "";
			$this->Nama_Dosen->HrefValue = "";
			$this->Nama_Dosen->TooltipValue = "";

			// id_jurusan
			$this->id_jurusan->LinkCustomAttributes = "";
			$this->id_jurusan->HrefValue = "";
			$this->id_jurusan->TooltipValue = "";

			// password
			$this->password->LinkCustomAttributes = "";
			$this->password->HrefValue = "";
			$this->password->TooltipValue = "";

			// email
			$this->_email->LinkCustomAttributes = "";
			$this->_email->HrefValue = "";
			$this->_email->TooltipValue = "";

			// no_hp
			$this->no_hp->LinkCustomAttributes = "";
			$this->no_hp->HrefValue = "";
			$this->no_hp->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// NIDN
			$this->NIDN->EditAttrs["class"] = "form-control";
			$this->NIDN->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NIDN->CurrentValue = HtmlDecode($this->NIDN->CurrentValue);
			$this->NIDN->EditValue = HtmlEncode($this->NIDN->CurrentValue);
			$this->NIDN->PlaceHolder = RemoveHtml($this->NIDN->caption());

			// NPAK_NIP
			$this->NPAK_NIP->EditAttrs["class"] = "form-control";
			$this->NPAK_NIP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NPAK_NIP->CurrentValue = HtmlDecode($this->NPAK_NIP->CurrentValue);
			$this->NPAK_NIP->EditValue = HtmlEncode($this->NPAK_NIP->CurrentValue);
			$this->NPAK_NIP->PlaceHolder = RemoveHtml($this->NPAK_NIP->caption());

			// Nama_Dosen
			$this->Nama_Dosen->EditAttrs["class"] = "form-control";
			$this->Nama_Dosen->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Nama_Dosen->CurrentValue = HtmlDecode($this->Nama_Dosen->CurrentValue);
			$this->Nama_Dosen->EditValue = HtmlEncode($this->Nama_Dosen->CurrentValue);
			$this->Nama_Dosen->PlaceHolder = RemoveHtml($this->Nama_Dosen->caption());

			// id_jurusan
			$this->id_jurusan->EditAttrs["class"] = "form-control";
			$this->id_jurusan->EditCustomAttributes = "";
			$this->id_jurusan->EditValue = $this->id_jurusan->options(TRUE);

			// password
			$this->password->EditAttrs["class"] = "form-control";
			$this->password->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->password->CurrentValue = HtmlDecode($this->password->CurrentValue);
			$this->password->EditValue = HtmlEncode($this->password->CurrentValue);
			$this->password->PlaceHolder = RemoveHtml($this->password->caption());

			// email
			$this->_email->EditAttrs["class"] = "form-control";
			$this->_email->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->_email->CurrentValue = HtmlDecode($this->_email->CurrentValue);
			$this->_email->EditValue = HtmlEncode($this->_email->CurrentValue);
			$this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

			// no_hp
			$this->no_hp->EditAttrs["class"] = "form-control";
			$this->no_hp->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->no_hp->CurrentValue = HtmlDecode($this->no_hp->CurrentValue);
			$this->no_hp->EditValue = HtmlEncode($this->no_hp->CurrentValue);
			$this->no_hp->PlaceHolder = RemoveHtml($this->no_hp->caption());

			// Add refer script
			// NIDN

			$this->NIDN->LinkCustomAttributes = "";
			$this->NIDN->HrefValue = "";

			// NPAK_NIP
			$this->NPAK_NIP->LinkCustomAttributes = "";
			$this->NPAK_NIP->HrefValue = "";

			// Nama_Dosen
			$this->Nama_Dosen->LinkCustomAttributes = "";
			$this->Nama_Dosen->HrefValue = "";

			// id_jurusan
			$this->id_jurusan->LinkCustomAttributes = "";
			$this->id_jurusan->HrefValue = "";

			// password
			$this->password->LinkCustomAttributes = "";
			$this->password->HrefValue = "";

			// email
			$this->_email->LinkCustomAttributes = "";
			$this->_email->HrefValue = "";

			// no_hp
			$this->no_hp->LinkCustomAttributes = "";
			$this->no_hp->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->NIDN->Required) {
			if (!$this->NIDN->IsDetailKey && $this->NIDN->FormValue != NULL && $this->NIDN->FormValue == "") {
				AddMessage($FormError, $Language->phrase("EnterUserName"));
			}
		}
		if ($this->NPAK_NIP->Required) {
			if (!$this->NPAK_NIP->IsDetailKey && $this->NPAK_NIP->FormValue != NULL && $this->NPAK_NIP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NPAK_NIP->caption(), $this->NPAK_NIP->RequiredErrorMessage));
			}
		}
		if ($this->Nama_Dosen->Required) {
			if (!$this->Nama_Dosen->IsDetailKey && $this->Nama_Dosen->FormValue != NULL && $this->Nama_Dosen->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Nama_Dosen->caption(), $this->Nama_Dosen->RequiredErrorMessage));
			}
		}
		if ($this->userlevel->Required) {
			if (!$this->userlevel->IsDetailKey && $this->userlevel->FormValue != NULL && $this->userlevel->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->userlevel->caption(), $this->userlevel->RequiredErrorMessage));
			}
		}
		if ($this->id_jurusan->Required) {
			if (!$this->id_jurusan->IsDetailKey && $this->id_jurusan->FormValue != NULL && $this->id_jurusan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_jurusan->caption(), $this->id_jurusan->RequiredErrorMessage));
			}
		}
		if ($this->password->Required) {
			if (!$this->password->IsDetailKey && $this->password->FormValue != NULL && $this->password->FormValue == "") {
				AddMessage($FormError, $Language->phrase("EnterPassword"));
			}
		}
		if ($this->_email->Required) {
			if (!$this->_email->IsDetailKey && $this->_email->FormValue != NULL && $this->_email->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_email->caption(), $this->_email->RequiredErrorMessage));
			}
		}
		if ($this->no_hp->Required) {
			if (!$this->no_hp->IsDetailKey && $this->no_hp->FormValue != NULL && $this->no_hp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->no_hp->caption(), $this->no_hp->RequiredErrorMessage));
			}
		}
		if ($this->activated->Required) {
			if (!$this->activated->IsDetailKey && $this->activated->FormValue != NULL && $this->activated->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->activated->caption(), $this->activated->RequiredErrorMessage));
			}
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;

		// Check if valid User ID
		$validUser = FALSE;
		if ($Security->currentUserID() <> "" && !EmptyValue($this->NIDN->CurrentValue) && !$Security->isAdmin()) { // Non system admin
			$validUser = $Security->isValidUserID($this->NIDN->CurrentValue);
			if (!$validUser) {
				$userIdMsg = str_replace("%c", CurrentUserID(), $Language->phrase("UnAuthorizedUserID"));
				$userIdMsg = str_replace("%u", $this->NIDN->CurrentValue, $userIdMsg);
				$this->setFailureMessage($userIdMsg);
				return FALSE;
			}
		}
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// NIDN
		$this->NIDN->setDbValueDef($rsnew, $this->NIDN->CurrentValue, "", FALSE);

		// NPAK_NIP
		$this->NPAK_NIP->setDbValueDef($rsnew, $this->NPAK_NIP->CurrentValue, "", FALSE);

		// Nama_Dosen
		$this->Nama_Dosen->setDbValueDef($rsnew, $this->Nama_Dosen->CurrentValue, "", FALSE);

		// id_jurusan
		$this->id_jurusan->setDbValueDef($rsnew, $this->id_jurusan->CurrentValue, NULL, FALSE);

		// password
		$this->password->setDbValueDef($rsnew, $this->password->CurrentValue, "", FALSE);

		// email
		$this->_email->setDbValueDef($rsnew, $this->_email->CurrentValue, NULL, FALSE);

		// no_hp
		$this->no_hp->setDbValueDef($rsnew, $this->no_hp->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['NIDN']) == "") {
			$this->setFailureMessage($Language->phrase("InvalidKeyValue"));
			$insertRow = FALSE;
		}

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['NPAK_NIP']) == "") {
			$this->setFailureMessage($Language->phrase("InvalidKeyValue"));
			$insertRow = FALSE;
		}

		// Check for duplicate key
		if ($insertRow && $this->ValidateKey) {
			$filter = $this->getRecordFilter();
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$keyErrMsg = str_replace("%f", $filter, $Language->phrase("DupKey"));
				$this->setFailureMessage($keyErrMsg);
				$rsChk->close();
				$insertRow = FALSE;
			}
		}
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);

			// Call User Registered event
			$this->User_Registered($rsnew);
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->ParentFields) == 0 && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'
	function Message_Showing(&$msg, $type) {

		// Example:
		//if ($type == 'success') $msg = "your success message";

	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}

	// User Registered event
	function User_Registered(&$rs) {

		//echo "User_Registered";
	}

	// User Activated event
	function User_Activated(&$rs) {

		//echo "User_Activated";
	}
}
?>