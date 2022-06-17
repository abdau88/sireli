<?php
namespace PHPMaker2019\project2;

/**
 * Page class
 */
class tb_penelitian_add extends tb_penelitian
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{6F3C73F1-7D22-4D79-93D1-87C709939CCD}";

	// Table name
	public $TableName = 'tb_penelitian';

	// Page object name
	public $PageObjName = "tb_penelitian_add";

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
		if ($this->TableName)
			return $Language->phrase($this->PageID);
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
			if ($this->UseTokenInUrl)
				$this->_pageUrl .= "t=" . $this->TableVar . "&"; // Add page token
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
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
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

		// Table object (tb_penelitian)
		if (!isset($GLOBALS["tb_penelitian"]) || get_class($GLOBALS["tb_penelitian"]) == PROJECT_NAMESPACE . "tb_penelitian") {
			$GLOBALS["tb_penelitian"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["tb_penelitian"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (tb_dosen)
		if (!isset($GLOBALS['tb_dosen']))
			$GLOBALS['tb_dosen'] = new tb_dosen();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'tb_penelitian');

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
		global $EXPORT, $tb_penelitian;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($tb_penelitian);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
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

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "tb_penelitianview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = array();
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = array();
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {

								//$url = FullUrl($fld->TableVar . "/" . API_FILE_ACTION . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))); // URL rewrite format
								$url = FullUrl(GetPageName(API_URL) . "?" . API_OBJECT_NAME . "=" . $fld->TableVar . "&" . API_ACTION_NAME . "=" . API_FILE_ACTION . "&" . API_FIELD_NAME . "=" . $fld->Param . "&" . API_KEY_NAME . "=" . rawurlencode($this->getRecordKeyValue($ar))); // Query string format
								$row[$fldname] = ["mimeType" => ContentType($val), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, MULTIPLE_UPLOAD_SEPARATOR)) { // Single file
								$row[$fldname] = ["mimeType" => MimeContentType($val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => FullUrl($fld->hrefPath() . $file)];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['id_penelitian'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id_penelitian->Visible = FALSE;
	}
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRec;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// Is modal
		$this->IsModal = (Param("modal") == "1");

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
			if (!$Security->isLoggedIn())
				$Security->autoLogin();
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName);
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loaded();
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("tb_penelitianlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
			if ($Security->isLoggedIn()) {
				$Security->UserID_Loading();
				$Security->loadUserID();
				$Security->UserID_Loaded();
				if (strval($Security->currentUserID()) == "") {
					$this->setFailureMessage(DeniedMessage()); // Set no permission
					$this->terminate(GetUrl("tb_penelitianlist.php"));
					return;
				}
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id_penelitian->Visible = FALSE;
		$this->NIDN->setVisibility();
		$this->anggota1->setVisibility();
		$this->anggota2->setVisibility();
		$this->id_jurusan->setVisibility();
		$this->judul->setVisibility();
		$this->biaya->setVisibility();
		$this->tahun->setVisibility();
		$this->status->Visible = FALSE;
		$this->LP->setVisibility();
		$this->chr->Visible = FALSE;
		$this->surat_tugas->Visible = FALSE;
		$this->LK->setVisibility();
		$this->output->setVisibility();
		$this->sk->Visible = FALSE;
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

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

		// Set up lookup cache
		$this->setupLookupOptions($this->NIDN);
		$this->setupLookupOptions($this->anggota1);
		$this->setupLookupOptions($this->anggota2);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("id_penelitian") !== NULL) {
				$this->id_penelitian->setQueryStringValue(Get("id_penelitian"));
				$this->setKey("id_penelitian", $this->id_penelitian->CurrentValue); // Set up key
			} else {
				$this->setKey("id_penelitian", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("tb_penelitianlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "tb_penelitianlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "tb_penelitianview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
		$this->LP->Upload->Index = $CurrentForm->Index;
		$this->LP->Upload->uploadFile();
		$this->LP->CurrentValue = $this->LP->Upload->FileName;
		$this->LK->Upload->Index = $CurrentForm->Index;
		$this->LK->Upload->uploadFile();
		$this->LK->CurrentValue = $this->LK->Upload->FileName;
		$this->output->Upload->Index = $CurrentForm->Index;
		$this->output->Upload->uploadFile();
		$this->output->CurrentValue = $this->output->Upload->FileName;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id_penelitian->CurrentValue = NULL;
		$this->id_penelitian->OldValue = $this->id_penelitian->CurrentValue;
		$this->NIDN->CurrentValue = CurrentUserID();
		$this->anggota1->CurrentValue = NULL;
		$this->anggota1->OldValue = $this->anggota1->CurrentValue;
		$this->anggota2->CurrentValue = NULL;
		$this->anggota2->OldValue = $this->anggota2->CurrentValue;
		$this->id_jurusan->CurrentValue = NULL;
		$this->id_jurusan->OldValue = $this->id_jurusan->CurrentValue;
		$this->judul->CurrentValue = NULL;
		$this->judul->OldValue = $this->judul->CurrentValue;
		$this->biaya->CurrentValue = NULL;
		$this->biaya->OldValue = $this->biaya->CurrentValue;
		$this->tahun->CurrentValue = NULL;
		$this->tahun->OldValue = $this->tahun->CurrentValue;
		$this->status->CurrentValue = NULL;
		$this->status->OldValue = $this->status->CurrentValue;
		$this->LP->Upload->DbValue = NULL;
		$this->LP->OldValue = $this->LP->Upload->DbValue;
		$this->LP->CurrentValue = NULL; // Clear file related field
		$this->chr->CurrentValue = NULL;
		$this->chr->OldValue = $this->chr->CurrentValue;
		$this->surat_tugas->CurrentValue = NULL;
		$this->surat_tugas->OldValue = $this->surat_tugas->CurrentValue;
		$this->LK->Upload->DbValue = NULL;
		$this->LK->OldValue = $this->LK->Upload->DbValue;
		$this->LK->CurrentValue = NULL; // Clear file related field
		$this->output->Upload->DbValue = NULL;
		$this->output->OldValue = $this->output->Upload->DbValue;
		$this->output->CurrentValue = NULL; // Clear file related field
		$this->sk->CurrentValue = NULL;
		$this->sk->OldValue = $this->sk->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$this->getUploadFiles(); // Get upload files

		// Check field name 'NIDN' first before field var 'x_NIDN'
		$val = $CurrentForm->hasValue("NIDN") ? $CurrentForm->getValue("NIDN") : $CurrentForm->getValue("x_NIDN");
		if (!$this->NIDN->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NIDN->Visible = FALSE; // Disable update for API request
			else
				$this->NIDN->setFormValue($val);
		}

		// Check field name 'anggota1' first before field var 'x_anggota1'
		$val = $CurrentForm->hasValue("anggota1") ? $CurrentForm->getValue("anggota1") : $CurrentForm->getValue("x_anggota1");
		if (!$this->anggota1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->anggota1->Visible = FALSE; // Disable update for API request
			else
				$this->anggota1->setFormValue($val);
		}

		// Check field name 'anggota2' first before field var 'x_anggota2'
		$val = $CurrentForm->hasValue("anggota2") ? $CurrentForm->getValue("anggota2") : $CurrentForm->getValue("x_anggota2");
		if (!$this->anggota2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->anggota2->Visible = FALSE; // Disable update for API request
			else
				$this->anggota2->setFormValue($val);
		}

		// Check field name 'id_jurusan' first before field var 'x_id_jurusan'
		$val = $CurrentForm->hasValue("id_jurusan") ? $CurrentForm->getValue("id_jurusan") : $CurrentForm->getValue("x_id_jurusan");
		if (!$this->id_jurusan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->id_jurusan->Visible = FALSE; // Disable update for API request
			else
				$this->id_jurusan->setFormValue($val);
		}

		// Check field name 'judul' first before field var 'x_judul'
		$val = $CurrentForm->hasValue("judul") ? $CurrentForm->getValue("judul") : $CurrentForm->getValue("x_judul");
		if (!$this->judul->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->judul->Visible = FALSE; // Disable update for API request
			else
				$this->judul->setFormValue($val);
		}

		// Check field name 'biaya' first before field var 'x_biaya'
		$val = $CurrentForm->hasValue("biaya") ? $CurrentForm->getValue("biaya") : $CurrentForm->getValue("x_biaya");
		if (!$this->biaya->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->biaya->Visible = FALSE; // Disable update for API request
			else
				$this->biaya->setFormValue($val);
		}

		// Check field name 'tahun' first before field var 'x_tahun'
		$val = $CurrentForm->hasValue("tahun") ? $CurrentForm->getValue("tahun") : $CurrentForm->getValue("x_tahun");
		if (!$this->tahun->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tahun->Visible = FALSE; // Disable update for API request
			else
				$this->tahun->setFormValue($val);
		}

		// Check field name 'id_penelitian' first before field var 'x_id_penelitian'
		$val = $CurrentForm->hasValue("id_penelitian") ? $CurrentForm->getValue("id_penelitian") : $CurrentForm->getValue("x_id_penelitian");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->NIDN->CurrentValue = $this->NIDN->FormValue;
		$this->anggota1->CurrentValue = $this->anggota1->FormValue;
		$this->anggota2->CurrentValue = $this->anggota2->FormValue;
		$this->id_jurusan->CurrentValue = $this->id_jurusan->FormValue;
		$this->judul->CurrentValue = $this->judul->FormValue;
		$this->biaya->CurrentValue = $this->biaya->FormValue;
		$this->tahun->CurrentValue = $this->tahun->FormValue;
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

		// Check if valid User ID
		if ($res) {
			$res = $this->showOptionLink('add');
			if (!$res) {
				$userIdMsg = DeniedMessage();
				$this->setFailureMessage($userIdMsg);
			}
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
		$this->id_penelitian->setDbValue($row['id_penelitian']);
		$this->NIDN->setDbValue($row['NIDN']);
		$this->anggota1->setDbValue($row['anggota1']);
		$this->anggota2->setDbValue($row['anggota2']);
		$this->id_jurusan->setDbValue($row['id_jurusan']);
		$this->judul->setDbValue($row['judul']);
		$this->biaya->setDbValue($row['biaya']);
		$this->tahun->setDbValue($row['tahun']);
		$this->status->setDbValue($row['status']);
		$this->LP->Upload->DbValue = $row['LP'];
		$this->LP->setDbValue($this->LP->Upload->DbValue);
		$this->chr->setDbValue($row['chr']);
		$this->surat_tugas->setDbValue($row['surat_tugas']);
		$this->LK->Upload->DbValue = $row['LK'];
		$this->LK->setDbValue($this->LK->Upload->DbValue);
		$this->output->Upload->DbValue = $row['output'];
		$this->output->setDbValue($this->output->Upload->DbValue);
		$this->sk->setDbValue($row['sk']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id_penelitian'] = $this->id_penelitian->CurrentValue;
		$row['NIDN'] = $this->NIDN->CurrentValue;
		$row['anggota1'] = $this->anggota1->CurrentValue;
		$row['anggota2'] = $this->anggota2->CurrentValue;
		$row['id_jurusan'] = $this->id_jurusan->CurrentValue;
		$row['judul'] = $this->judul->CurrentValue;
		$row['biaya'] = $this->biaya->CurrentValue;
		$row['tahun'] = $this->tahun->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['LP'] = $this->LP->Upload->DbValue;
		$row['chr'] = $this->chr->CurrentValue;
		$row['surat_tugas'] = $this->surat_tugas->CurrentValue;
		$row['LK'] = $this->LK->Upload->DbValue;
		$row['output'] = $this->output->Upload->DbValue;
		$row['sk'] = $this->sk->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id_penelitian")) <> "")
			$this->id_penelitian->CurrentValue = $this->getKey("id_penelitian"); // id_penelitian
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// id_penelitian
		// NIDN
		// anggota1
		// anggota2
		// id_jurusan
		// judul
		// biaya
		// tahun
		// status
		// LP
		// chr
		// surat_tugas
		// LK
		// output
		// sk

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_penelitian
			$this->id_penelitian->ViewValue = $this->id_penelitian->CurrentValue;
			$this->id_penelitian->ViewCustomAttributes = "";

			// NIDN
			$this->NIDN->ViewValue = $this->NIDN->CurrentValue;
			$curVal = strval($this->NIDN->CurrentValue);
			if ($curVal <> "") {
				$this->NIDN->ViewValue = $this->NIDN->lookupCacheOption($curVal);
				if ($this->NIDN->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NIDN`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->NIDN->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->NIDN->ViewValue = $this->NIDN->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->NIDN->ViewValue = $this->NIDN->CurrentValue;
					}
				}
			} else {
				$this->NIDN->ViewValue = NULL;
			}
			$this->NIDN->ViewCustomAttributes = "";

			// anggota1
			$this->anggota1->ViewValue = $this->anggota1->CurrentValue;
			$curVal = strval($this->anggota1->CurrentValue);
			if ($curVal <> "") {
				$this->anggota1->ViewValue = $this->anggota1->lookupCacheOption($curVal);
				if ($this->anggota1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Nama_Dosen`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->anggota1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->anggota1->ViewValue = $this->anggota1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->anggota1->ViewValue = $this->anggota1->CurrentValue;
					}
				}
			} else {
				$this->anggota1->ViewValue = NULL;
			}
			$this->anggota1->ViewCustomAttributes = "";

			// anggota2
			$this->anggota2->ViewValue = $this->anggota2->CurrentValue;
			$curVal = strval($this->anggota2->CurrentValue);
			if ($curVal <> "") {
				$this->anggota2->ViewValue = $this->anggota2->lookupCacheOption($curVal);
				if ($this->anggota2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Nama_Dosen`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->anggota2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->anggota2->ViewValue = $this->anggota2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->anggota2->ViewValue = $this->anggota2->CurrentValue;
					}
				}
			} else {
				$this->anggota2->ViewValue = NULL;
			}
			$this->anggota2->ViewCustomAttributes = "";

			// id_jurusan
			if (strval($this->id_jurusan->CurrentValue) <> "") {
				$this->id_jurusan->ViewValue = $this->id_jurusan->optionCaption($this->id_jurusan->CurrentValue);
			} else {
				$this->id_jurusan->ViewValue = NULL;
			}
			$this->id_jurusan->ViewCustomAttributes = "";

			// judul
			$this->judul->ViewValue = $this->judul->CurrentValue;
			$this->judul->ViewCustomAttributes = "";

			// biaya
			$this->biaya->ViewValue = $this->biaya->CurrentValue;
			$this->biaya->ViewValue = FormatNumber($this->biaya->ViewValue, 0, -2, -2, -2);
			$this->biaya->ViewCustomAttributes = "";

			// tahun
			$this->tahun->ViewValue = $this->tahun->CurrentValue;
			$this->tahun->ViewCustomAttributes = "";

			// status
			if (strval($this->status->CurrentValue) <> "") {
				$this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

			// LP
			if (!EmptyValue($this->LP->Upload->DbValue)) {
				$this->LP->ViewValue = $this->LP->Upload->DbValue;
			} else {
				$this->LP->ViewValue = "";
			}
			$this->LP->ViewCustomAttributes = "";

			// chr
			$this->chr->ViewValue = $this->chr->CurrentValue;
			$this->chr->ViewCustomAttributes = "";

			// surat_tugas
			$this->surat_tugas->ViewValue = $this->surat_tugas->CurrentValue;
			$this->surat_tugas->ViewCustomAttributes = "";

			// LK
			if (!EmptyValue($this->LK->Upload->DbValue)) {
				$this->LK->ViewValue = $this->LK->Upload->DbValue;
			} else {
				$this->LK->ViewValue = "";
			}
			$this->LK->ViewCustomAttributes = "";

			// output
			if (!EmptyValue($this->output->Upload->DbValue)) {
				$this->output->ViewValue = $this->output->Upload->DbValue;
			} else {
				$this->output->ViewValue = "";
			}
			$this->output->ViewCustomAttributes = "";

			// sk
			$this->sk->ViewValue = $this->sk->CurrentValue;
			$this->sk->ViewCustomAttributes = "";

			// NIDN
			$this->NIDN->LinkCustomAttributes = "";
			$this->NIDN->HrefValue = "";
			$this->NIDN->TooltipValue = "";

			// anggota1
			$this->anggota1->LinkCustomAttributes = "";
			$this->anggota1->HrefValue = "";
			$this->anggota1->TooltipValue = "";

			// anggota2
			$this->anggota2->LinkCustomAttributes = "";
			$this->anggota2->HrefValue = "";
			$this->anggota2->TooltipValue = "";

			// id_jurusan
			$this->id_jurusan->LinkCustomAttributes = "";
			$this->id_jurusan->HrefValue = "";
			$this->id_jurusan->TooltipValue = "";

			// judul
			$this->judul->LinkCustomAttributes = "";
			$this->judul->HrefValue = "";
			$this->judul->TooltipValue = "";

			// biaya
			$this->biaya->LinkCustomAttributes = "";
			$this->biaya->HrefValue = "";
			$this->biaya->TooltipValue = "";

			// tahun
			$this->tahun->LinkCustomAttributes = "";
			$this->tahun->HrefValue = "";
			$this->tahun->TooltipValue = "";

			// LP
			$this->LP->LinkCustomAttributes = "";
			if (!EmptyValue($this->LP->Upload->DbValue)) {
				$this->LP->HrefValue = GetFileUploadUrl($this->LP, $this->LP->Upload->DbValue); // Add prefix/suffix
				$this->LP->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->LP->HrefValue = FullUrl($this->LP->HrefValue, "href");
			} else {
				$this->LP->HrefValue = "";
			}
			$this->LP->ExportHrefValue = $this->LP->UploadPath . $this->LP->Upload->DbValue;
			$this->LP->TooltipValue = "";

			// LK
			$this->LK->LinkCustomAttributes = "";
			if (!EmptyValue($this->LK->Upload->DbValue)) {
				$this->LK->HrefValue = GetFileUploadUrl($this->LK, $this->LK->Upload->DbValue); // Add prefix/suffix
				$this->LK->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->LK->HrefValue = FullUrl($this->LK->HrefValue, "href");
			} else {
				$this->LK->HrefValue = "";
			}
			$this->LK->ExportHrefValue = $this->LK->UploadPath . $this->LK->Upload->DbValue;
			$this->LK->TooltipValue = "";

			// output
			$this->output->LinkCustomAttributes = "";
			if (!EmptyValue($this->output->Upload->DbValue)) {
				$this->output->HrefValue = GetFileUploadUrl($this->output, $this->output->Upload->DbValue); // Add prefix/suffix
				$this->output->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->output->HrefValue = FullUrl($this->output->HrefValue, "href");
			} else {
				$this->output->HrefValue = "";
			}
			$this->output->ExportHrefValue = $this->output->UploadPath . $this->output->Upload->DbValue;
			$this->output->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// NIDN
			$this->NIDN->EditAttrs["class"] = "form-control";
			$this->NIDN->EditCustomAttributes = "";
			if (!$Security->isAdmin() && $Security->isLoggedIn() && !$this->userIDAllow("add")) { // Non system admin
				$this->NIDN->CurrentValue = CurrentUserID();
			$this->NIDN->EditValue = $this->NIDN->CurrentValue;
			$curVal = strval($this->NIDN->CurrentValue);
			if ($curVal <> "") {
				$this->NIDN->EditValue = $this->NIDN->lookupCacheOption($curVal);
				if ($this->NIDN->EditValue === NULL) { // Lookup from database
					$filterWrk = "`NIDN`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->NIDN->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->NIDN->EditValue = $this->NIDN->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->NIDN->EditValue = $this->NIDN->CurrentValue;
					}
				}
			} else {
				$this->NIDN->EditValue = NULL;
			}
			$this->NIDN->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->NIDN->CurrentValue = HtmlDecode($this->NIDN->CurrentValue);
			$this->NIDN->EditValue = HtmlEncode($this->NIDN->CurrentValue);
			$curVal = strval($this->NIDN->CurrentValue);
			if ($curVal <> "") {
				$this->NIDN->EditValue = $this->NIDN->lookupCacheOption($curVal);
				if ($this->NIDN->EditValue === NULL) { // Lookup from database
					$filterWrk = "`NIDN`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->NIDN->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->NIDN->EditValue = $this->NIDN->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->NIDN->EditValue = HtmlEncode($this->NIDN->CurrentValue);
					}
				}
			} else {
				$this->NIDN->EditValue = NULL;
			}
			$this->NIDN->PlaceHolder = RemoveHtml($this->NIDN->caption());
			}

			// anggota1
			$this->anggota1->EditAttrs["class"] = "form-control";
			$this->anggota1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->anggota1->CurrentValue = HtmlDecode($this->anggota1->CurrentValue);
			$this->anggota1->EditValue = HtmlEncode($this->anggota1->CurrentValue);
			$curVal = strval($this->anggota1->CurrentValue);
			if ($curVal <> "") {
				$this->anggota1->EditValue = $this->anggota1->lookupCacheOption($curVal);
				if ($this->anggota1->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Nama_Dosen`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->anggota1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->anggota1->EditValue = $this->anggota1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->anggota1->EditValue = HtmlEncode($this->anggota1->CurrentValue);
					}
				}
			} else {
				$this->anggota1->EditValue = NULL;
			}
			$this->anggota1->PlaceHolder = RemoveHtml($this->anggota1->caption());

			// anggota2
			$this->anggota2->EditAttrs["class"] = "form-control";
			$this->anggota2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->anggota2->CurrentValue = HtmlDecode($this->anggota2->CurrentValue);
			$this->anggota2->EditValue = HtmlEncode($this->anggota2->CurrentValue);
			$curVal = strval($this->anggota2->CurrentValue);
			if ($curVal <> "") {
				$this->anggota2->EditValue = $this->anggota2->lookupCacheOption($curVal);
				if ($this->anggota2->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Nama_Dosen`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->anggota2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->anggota2->EditValue = $this->anggota2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->anggota2->EditValue = HtmlEncode($this->anggota2->CurrentValue);
					}
				}
			} else {
				$this->anggota2->EditValue = NULL;
			}
			$this->anggota2->PlaceHolder = RemoveHtml($this->anggota2->caption());

			// id_jurusan
			$this->id_jurusan->EditAttrs["class"] = "form-control";
			$this->id_jurusan->EditCustomAttributes = "";
			$this->id_jurusan->EditValue = $this->id_jurusan->options(TRUE);

			// judul
			$this->judul->EditAttrs["class"] = "form-control";
			$this->judul->EditCustomAttributes = "";
			$this->judul->EditValue = HtmlEncode($this->judul->CurrentValue);
			$this->judul->PlaceHolder = RemoveHtml($this->judul->caption());

			// biaya
			$this->biaya->EditAttrs["class"] = "form-control";
			$this->biaya->EditCustomAttributes = "";
			$this->biaya->EditValue = HtmlEncode($this->biaya->CurrentValue);
			$this->biaya->PlaceHolder = RemoveHtml($this->biaya->caption());

			// tahun
			$this->tahun->EditAttrs["class"] = "form-control";
			$this->tahun->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->tahun->CurrentValue = HtmlDecode($this->tahun->CurrentValue);
			$this->tahun->EditValue = HtmlEncode($this->tahun->CurrentValue);
			$this->tahun->PlaceHolder = RemoveHtml($this->tahun->caption());

			// LP
			$this->LP->EditAttrs["class"] = "form-control";
			$this->LP->EditCustomAttributes = "";
			if (!EmptyValue($this->LP->Upload->DbValue)) {
				$this->LP->EditValue = $this->LP->Upload->DbValue;
			} else {
				$this->LP->EditValue = "";
			}
			if (!EmptyValue($this->LP->CurrentValue))
					$this->LP->Upload->FileName = $this->LP->CurrentValue;
			if (($this->isShow() || $this->isCopy()) && !$this->EventCancelled)
				RenderUploadField($this->LP);

			// LK
			$this->LK->EditAttrs["class"] = "form-control";
			$this->LK->EditCustomAttributes = "";
			if (!EmptyValue($this->LK->Upload->DbValue)) {
				$this->LK->EditValue = $this->LK->Upload->DbValue;
			} else {
				$this->LK->EditValue = "";
			}
			if (!EmptyValue($this->LK->CurrentValue))
					$this->LK->Upload->FileName = $this->LK->CurrentValue;
			if (($this->isShow() || $this->isCopy()) && !$this->EventCancelled)
				RenderUploadField($this->LK);

			// output
			$this->output->EditAttrs["class"] = "form-control";
			$this->output->EditCustomAttributes = "";
			if (!EmptyValue($this->output->Upload->DbValue)) {
				$this->output->EditValue = $this->output->Upload->DbValue;
			} else {
				$this->output->EditValue = "";
			}
			if (!EmptyValue($this->output->CurrentValue))
					$this->output->Upload->FileName = $this->output->CurrentValue;
			if (($this->isShow() || $this->isCopy()) && !$this->EventCancelled)
				RenderUploadField($this->output);

			// Add refer script
			// NIDN

			$this->NIDN->LinkCustomAttributes = "";
			$this->NIDN->HrefValue = "";

			// anggota1
			$this->anggota1->LinkCustomAttributes = "";
			$this->anggota1->HrefValue = "";

			// anggota2
			$this->anggota2->LinkCustomAttributes = "";
			$this->anggota2->HrefValue = "";

			// id_jurusan
			$this->id_jurusan->LinkCustomAttributes = "";
			$this->id_jurusan->HrefValue = "";

			// judul
			$this->judul->LinkCustomAttributes = "";
			$this->judul->HrefValue = "";

			// biaya
			$this->biaya->LinkCustomAttributes = "";
			$this->biaya->HrefValue = "";

			// tahun
			$this->tahun->LinkCustomAttributes = "";
			$this->tahun->HrefValue = "";

			// LP
			$this->LP->LinkCustomAttributes = "";
			if (!EmptyValue($this->LP->Upload->DbValue)) {
				$this->LP->HrefValue = GetFileUploadUrl($this->LP, $this->LP->Upload->DbValue); // Add prefix/suffix
				$this->LP->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->LP->HrefValue = FullUrl($this->LP->HrefValue, "href");
			} else {
				$this->LP->HrefValue = "";
			}
			$this->LP->ExportHrefValue = $this->LP->UploadPath . $this->LP->Upload->DbValue;

			// LK
			$this->LK->LinkCustomAttributes = "";
			if (!EmptyValue($this->LK->Upload->DbValue)) {
				$this->LK->HrefValue = GetFileUploadUrl($this->LK, $this->LK->Upload->DbValue); // Add prefix/suffix
				$this->LK->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->LK->HrefValue = FullUrl($this->LK->HrefValue, "href");
			} else {
				$this->LK->HrefValue = "";
			}
			$this->LK->ExportHrefValue = $this->LK->UploadPath . $this->LK->Upload->DbValue;

			// output
			$this->output->LinkCustomAttributes = "";
			if (!EmptyValue($this->output->Upload->DbValue)) {
				$this->output->HrefValue = GetFileUploadUrl($this->output, $this->output->Upload->DbValue); // Add prefix/suffix
				$this->output->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->output->HrefValue = FullUrl($this->output->HrefValue, "href");
			} else {
				$this->output->HrefValue = "";
			}
			$this->output->ExportHrefValue = $this->output->UploadPath . $this->output->Upload->DbValue;
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
		if ($this->id_penelitian->Required) {
			if (!$this->id_penelitian->IsDetailKey && $this->id_penelitian->FormValue != NULL && $this->id_penelitian->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_penelitian->caption(), $this->id_penelitian->RequiredErrorMessage));
			}
		}
		if ($this->NIDN->Required) {
			if (!$this->NIDN->IsDetailKey && $this->NIDN->FormValue != NULL && $this->NIDN->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NIDN->caption(), $this->NIDN->RequiredErrorMessage));
			}
		}
		if ($this->anggota1->Required) {
			if (!$this->anggota1->IsDetailKey && $this->anggota1->FormValue != NULL && $this->anggota1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->anggota1->caption(), $this->anggota1->RequiredErrorMessage));
			}
		}
		if ($this->anggota2->Required) {
			if (!$this->anggota2->IsDetailKey && $this->anggota2->FormValue != NULL && $this->anggota2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->anggota2->caption(), $this->anggota2->RequiredErrorMessage));
			}
		}
		if ($this->id_jurusan->Required) {
			if (!$this->id_jurusan->IsDetailKey && $this->id_jurusan->FormValue != NULL && $this->id_jurusan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_jurusan->caption(), $this->id_jurusan->RequiredErrorMessage));
			}
		}
		if ($this->judul->Required) {
			if (!$this->judul->IsDetailKey && $this->judul->FormValue != NULL && $this->judul->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->judul->caption(), $this->judul->RequiredErrorMessage));
			}
		}
		if ($this->biaya->Required) {
			if (!$this->biaya->IsDetailKey && $this->biaya->FormValue != NULL && $this->biaya->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->biaya->caption(), $this->biaya->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->biaya->FormValue)) {
			AddMessage($FormError, $this->biaya->errorMessage());
		}
		if ($this->tahun->Required) {
			if (!$this->tahun->IsDetailKey && $this->tahun->FormValue != NULL && $this->tahun->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tahun->caption(), $this->tahun->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->LP->Required) {
			if ($this->LP->Upload->FileName == "" && !$this->LP->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->LP->caption(), $this->LP->RequiredErrorMessage));
			}
		}
		if ($this->chr->Required) {
			if (!$this->chr->IsDetailKey && $this->chr->FormValue != NULL && $this->chr->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->chr->caption(), $this->chr->RequiredErrorMessage));
			}
		}
		if ($this->surat_tugas->Required) {
			if (!$this->surat_tugas->IsDetailKey && $this->surat_tugas->FormValue != NULL && $this->surat_tugas->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->surat_tugas->caption(), $this->surat_tugas->RequiredErrorMessage));
			}
		}
		if ($this->LK->Required) {
			if ($this->LK->Upload->FileName == "" && !$this->LK->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->LK->caption(), $this->LK->RequiredErrorMessage));
			}
		}
		if ($this->output->Required) {
			if ($this->output->Upload->FileName == "" && !$this->output->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->output->caption(), $this->output->RequiredErrorMessage));
			}
		}
		if ($this->sk->Required) {
			if (!$this->sk->IsDetailKey && $this->sk->FormValue != NULL && $this->sk->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sk->caption(), $this->sk->RequiredErrorMessage));
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
		$this->NIDN->setDbValueDef($rsnew, $this->NIDN->CurrentValue, NULL, FALSE);

		// anggota1
		$this->anggota1->setDbValueDef($rsnew, $this->anggota1->CurrentValue, NULL, FALSE);

		// anggota2
		$this->anggota2->setDbValueDef($rsnew, $this->anggota2->CurrentValue, NULL, FALSE);

		// id_jurusan
		$this->id_jurusan->setDbValueDef($rsnew, $this->id_jurusan->CurrentValue, NULL, FALSE);

		// judul
		$this->judul->setDbValueDef($rsnew, $this->judul->CurrentValue, NULL, FALSE);

		// biaya
		$this->biaya->setDbValueDef($rsnew, $this->biaya->CurrentValue, NULL, FALSE);

		// tahun
		$this->tahun->setDbValueDef($rsnew, $this->tahun->CurrentValue, NULL, FALSE);

		// LP
		if ($this->LP->Visible && !$this->LP->Upload->KeepFile) {
			$this->LP->Upload->DbValue = ""; // No need to delete old file
			if ($this->LP->Upload->FileName == "") {
				$rsnew['LP'] = NULL;
			} else {
				$rsnew['LP'] = $this->LP->Upload->FileName;
			}
		}

		// LK
		if ($this->LK->Visible && !$this->LK->Upload->KeepFile) {
			$this->LK->Upload->DbValue = ""; // No need to delete old file
			if ($this->LK->Upload->FileName == "") {
				$rsnew['LK'] = NULL;
			} else {
				$rsnew['LK'] = $this->LK->Upload->FileName;
			}
		}

		// output
		if ($this->output->Visible && !$this->output->Upload->KeepFile) {
			$this->output->Upload->DbValue = ""; // No need to delete old file
			if ($this->output->Upload->FileName == "") {
				$rsnew['output'] = NULL;
			} else {
				$rsnew['output'] = $this->output->Upload->FileName;
			}
		}
		if ($this->LP->Visible && !$this->LP->Upload->KeepFile) {
			$oldFiles = EmptyValue($this->LP->Upload->DbValue) ? array() : array($this->LP->Upload->DbValue);
			if (!EmptyValue($this->LP->Upload->FileName)) {
				$newFiles = array($this->LP->Upload->FileName);
				$NewFileCount = count($newFiles);
				for ($i = 0; $i < $NewFileCount; $i++) {
					if ($newFiles[$i] <> "") {
						$file = $newFiles[$i];
						if (file_exists(UploadTempPath($this->LP, $this->LP->Upload->Index) . $file)) {
							if (DELETE_UPLOADED_FILES) {
								$oldFileFound = FALSE;
								$oldFileCount = count($oldFiles);
								for ($j = 0; $j < $oldFileCount; $j++) {
									$oldFile = $oldFiles[$j];
									if ($oldFile == $file) { // Old file found, no need to delete anymore
										unset($oldFiles[$j]);
										$oldFileFound = TRUE;
										break;
									}
								}
								if ($oldFileFound) // No need to check if file exists further
									continue;
							}
							$file1 = UniqueFilename($this->LP->physicalUploadPath(), $file); // Get new file name
							if ($file1 <> $file) { // Rename temp file
								while (file_exists(UploadTempPath($this->LP, $this->LP->Upload->Index) . $file1) || file_exists($this->LP->physicalUploadPath() . $file1)) // Make sure no file name clash
									$file1 = UniqueFilename($this->LP->physicalUploadPath(), $file1, TRUE); // Use indexed name
								rename(UploadTempPath($this->LP, $this->LP->Upload->Index) . $file, UploadTempPath($this->LP, $this->LP->Upload->Index) . $file1);
								$newFiles[$i] = $file1;
							}
						}
					}
				}
				$this->LP->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
				$this->LP->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
				$this->LP->setDbValueDef($rsnew, $this->LP->Upload->FileName, NULL, FALSE);
			}
		}
		if ($this->LK->Visible && !$this->LK->Upload->KeepFile) {
			$oldFiles = EmptyValue($this->LK->Upload->DbValue) ? array() : array($this->LK->Upload->DbValue);
			if (!EmptyValue($this->LK->Upload->FileName)) {
				$newFiles = array($this->LK->Upload->FileName);
				$NewFileCount = count($newFiles);
				for ($i = 0; $i < $NewFileCount; $i++) {
					if ($newFiles[$i] <> "") {
						$file = $newFiles[$i];
						if (file_exists(UploadTempPath($this->LK, $this->LK->Upload->Index) . $file)) {
							if (DELETE_UPLOADED_FILES) {
								$oldFileFound = FALSE;
								$oldFileCount = count($oldFiles);
								for ($j = 0; $j < $oldFileCount; $j++) {
									$oldFile = $oldFiles[$j];
									if ($oldFile == $file) { // Old file found, no need to delete anymore
										unset($oldFiles[$j]);
										$oldFileFound = TRUE;
										break;
									}
								}
								if ($oldFileFound) // No need to check if file exists further
									continue;
							}
							$file1 = UniqueFilename($this->LK->physicalUploadPath(), $file); // Get new file name
							if ($file1 <> $file) { // Rename temp file
								while (file_exists(UploadTempPath($this->LK, $this->LK->Upload->Index) . $file1) || file_exists($this->LK->physicalUploadPath() . $file1)) // Make sure no file name clash
									$file1 = UniqueFilename($this->LK->physicalUploadPath(), $file1, TRUE); // Use indexed name
								rename(UploadTempPath($this->LK, $this->LK->Upload->Index) . $file, UploadTempPath($this->LK, $this->LK->Upload->Index) . $file1);
								$newFiles[$i] = $file1;
							}
						}
					}
				}
				$this->LK->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
				$this->LK->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
				$this->LK->setDbValueDef($rsnew, $this->LK->Upload->FileName, NULL, FALSE);
			}
		}
		if ($this->output->Visible && !$this->output->Upload->KeepFile) {
			$oldFiles = EmptyValue($this->output->Upload->DbValue) ? array() : array($this->output->Upload->DbValue);
			if (!EmptyValue($this->output->Upload->FileName)) {
				$newFiles = array($this->output->Upload->FileName);
				$NewFileCount = count($newFiles);
				for ($i = 0; $i < $NewFileCount; $i++) {
					if ($newFiles[$i] <> "") {
						$file = $newFiles[$i];
						if (file_exists(UploadTempPath($this->output, $this->output->Upload->Index) . $file)) {
							if (DELETE_UPLOADED_FILES) {
								$oldFileFound = FALSE;
								$oldFileCount = count($oldFiles);
								for ($j = 0; $j < $oldFileCount; $j++) {
									$oldFile = $oldFiles[$j];
									if ($oldFile == $file) { // Old file found, no need to delete anymore
										unset($oldFiles[$j]);
										$oldFileFound = TRUE;
										break;
									}
								}
								if ($oldFileFound) // No need to check if file exists further
									continue;
							}
							$file1 = UniqueFilename($this->output->physicalUploadPath(), $file); // Get new file name
							if ($file1 <> $file) { // Rename temp file
								while (file_exists(UploadTempPath($this->output, $this->output->Upload->Index) . $file1) || file_exists($this->output->physicalUploadPath() . $file1)) // Make sure no file name clash
									$file1 = UniqueFilename($this->output->physicalUploadPath(), $file1, TRUE); // Use indexed name
								rename(UploadTempPath($this->output, $this->output->Upload->Index) . $file, UploadTempPath($this->output, $this->output->Upload->Index) . $file1);
								$newFiles[$i] = $file1;
							}
						}
					}
				}
				$this->output->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
				$this->output->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
				$this->output->setDbValueDef($rsnew, $this->output->Upload->FileName, NULL, FALSE);
			}
		}

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
				if ($this->LP->Visible && !$this->LP->Upload->KeepFile) {
					$oldFiles = EmptyValue($this->LP->Upload->DbValue) ? array() : array($this->LP->Upload->DbValue);
					if (!EmptyValue($this->LP->Upload->FileName)) {
						$newFiles = array($this->LP->Upload->FileName);
						$newFiles2 = array($rsnew['LP']);
						$newFileCount = count($newFiles);
						for ($i = 0; $i < $newFileCount; $i++) {
							if ($newFiles[$i] <> "") {
								$file = UploadTempPath($this->LP, $this->LP->Upload->Index) . $newFiles[$i];
								if (file_exists($file)) {
									if (@$newFiles2[$i] <> "") // Use correct file name
										$newFiles[$i] = $newFiles2[$i];
									if (!$this->LP->Upload->saveToFile($newFiles[$i], TRUE, $i)) { // Just replace
										$this->setFailureMessage($Language->phrase("UploadErrMsg7"));
										return FALSE;
									}
								}
							}
						}
					} else {
						$newFiles = array();
					}
					if (DELETE_UPLOADED_FILES) {
						foreach ($oldFiles as $oldFile) {
							if ($oldFile <> "" && !in_array($oldFile, $newFiles))
								@unlink($this->LP->oldPhysicalUploadPath() . $oldFile);
						}
					}
				}
				if ($this->LK->Visible && !$this->LK->Upload->KeepFile) {
					$oldFiles = EmptyValue($this->LK->Upload->DbValue) ? array() : array($this->LK->Upload->DbValue);
					if (!EmptyValue($this->LK->Upload->FileName)) {
						$newFiles = array($this->LK->Upload->FileName);
						$newFiles2 = array($rsnew['LK']);
						$newFileCount = count($newFiles);
						for ($i = 0; $i < $newFileCount; $i++) {
							if ($newFiles[$i] <> "") {
								$file = UploadTempPath($this->LK, $this->LK->Upload->Index) . $newFiles[$i];
								if (file_exists($file)) {
									if (@$newFiles2[$i] <> "") // Use correct file name
										$newFiles[$i] = $newFiles2[$i];
									if (!$this->LK->Upload->saveToFile($newFiles[$i], TRUE, $i)) { // Just replace
										$this->setFailureMessage($Language->phrase("UploadErrMsg7"));
										return FALSE;
									}
								}
							}
						}
					} else {
						$newFiles = array();
					}
					if (DELETE_UPLOADED_FILES) {
						foreach ($oldFiles as $oldFile) {
							if ($oldFile <> "" && !in_array($oldFile, $newFiles))
								@unlink($this->LK->oldPhysicalUploadPath() . $oldFile);
						}
					}
				}
				if ($this->output->Visible && !$this->output->Upload->KeepFile) {
					$oldFiles = EmptyValue($this->output->Upload->DbValue) ? array() : array($this->output->Upload->DbValue);
					if (!EmptyValue($this->output->Upload->FileName)) {
						$newFiles = array($this->output->Upload->FileName);
						$newFiles2 = array($rsnew['output']);
						$newFileCount = count($newFiles);
						for ($i = 0; $i < $newFileCount; $i++) {
							if ($newFiles[$i] <> "") {
								$file = UploadTempPath($this->output, $this->output->Upload->Index) . $newFiles[$i];
								if (file_exists($file)) {
									if (@$newFiles2[$i] <> "") // Use correct file name
										$newFiles[$i] = $newFiles2[$i];
									if (!$this->output->Upload->saveToFile($newFiles[$i], TRUE, $i)) { // Just replace
										$this->setFailureMessage($Language->phrase("UploadErrMsg7"));
										return FALSE;
									}
								}
							}
						}
					} else {
						$newFiles = array();
					}
					if (DELETE_UPLOADED_FILES) {
						foreach ($oldFiles as $oldFile) {
							if ($oldFile <> "" && !in_array($oldFile, $newFiles))
								@unlink($this->output->oldPhysicalUploadPath() . $oldFile);
						}
					}
				}
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
		}

		// LP
		if ($this->LP->Upload->FileToken <> "")
			CleanUploadTempPath($this->LP->Upload->FileToken, $this->LP->Upload->Index);
		else
			CleanUploadTempPath($this->LP, $this->LP->Upload->Index);

		// LK
		if ($this->LK->Upload->FileToken <> "")
			CleanUploadTempPath($this->LK->Upload->FileToken, $this->LK->Upload->Index);
		else
			CleanUploadTempPath($this->LK, $this->LK->Upload->Index);

		// output
		if ($this->output->Upload->FileToken <> "")
			CleanUploadTempPath($this->output->Upload->FileToken, $this->output->Upload->Index);
		else
			CleanUploadTempPath($this->output, $this->output->Upload->Index);

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Show link optionally based on User ID
	protected function showOptionLink($id = "")
	{
		global $Security;
		if ($Security->isLoggedIn() && !$Security->isAdmin() && !$this->userIDAllow($id))
			return $Security->isValidUserID($this->NIDN->CurrentValue);
		return TRUE;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("tb_penelitianlist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
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
						case "x_NIDN":
							break;
						case "x_anggota1":
							break;
						case "x_anggota2":
							break;
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
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
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

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>