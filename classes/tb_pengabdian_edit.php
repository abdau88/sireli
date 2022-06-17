<?php
namespace PHPMaker2019\project2;

/**
 * Page class
 */
class tb_pengabdian_edit extends tb_pengabdian
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{6F3C73F1-7D22-4D79-93D1-87C709939CCD}";

	// Table name
	public $TableName = 'tb_pengabdian';

	// Page object name
	public $PageObjName = "tb_pengabdian_edit";

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

		// Table object (tb_pengabdian)
		if (!isset($GLOBALS["tb_pengabdian"]) || get_class($GLOBALS["tb_pengabdian"]) == PROJECT_NAMESPACE . "tb_pengabdian") {
			$GLOBALS["tb_pengabdian"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["tb_pengabdian"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (tb_dosen)
		if (!isset($GLOBALS['tb_dosen']))
			$GLOBALS['tb_dosen'] = new tb_dosen();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'tb_pengabdian');

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
		global $EXPORT, $tb_pengabdian;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($tb_pengabdian);
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
					if ($pageName == "tb_pengabdianview.php")
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
			$key .= @$ar['id_pengabdian'];
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
			$this->id_pengabdian->Visible = FALSE;
	}
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

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
			if (!$Security->canEdit()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("tb_pengabdianlist.php"));
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
					$this->terminate(GetUrl("tb_pengabdianlist.php"));
					return;
				}
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id_pengabdian->setVisibility();
		$this->NIDN->setVisibility();
		$this->anggota1->setVisibility();
		$this->anggota2->setVisibility();
		$this->anggota3->setVisibility();
		$this->anggota4->setVisibility();
		$this->judul->setVisibility();
		$this->biaya->setVisibility();
		$this->tahun->setVisibility();
		$this->status->Visible = FALSE;
		$this->LP2->setVisibility();
		$this->LK->setVisibility();
		$this->output->setVisibility();
		$this->chr->Visible = FALSE;
		$this->surat_tugas->Visible = FALSE;
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
		$this->setupLookupOptions($this->anggota3);
		$this->setupLookupOptions($this->anggota4);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get action code
			if (!$this->isShow()) // Not reload record, handle as postback
				$postBack = TRUE;

			// Load key from Form
			if ($CurrentForm->hasValue("x_id_pengabdian")) {
				$this->id_pengabdian->setFormValue($CurrentForm->getValue("x_id_pengabdian"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("id_pengabdian") !== NULL) {
				$this->id_pengabdian->setQueryStringValue(Get("id_pengabdian"));
				$loadByQuery = TRUE;
			} else {
				$this->id_pengabdian->CurrentValue = NULL;
			}
		}

		// Load current record
		$loaded = $this->loadRow();

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = ""; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("tb_pengabdianlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "tb_pengabdianlist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
					if (IsApi()) {
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl); // Return to caller
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Set up starting record parameters
	public function setupStartRec()
	{
		if ($this->DisplayRecs == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			if (Get(TABLE_START_REC) !== NULL) { // Check for "start" parameter
				$this->StartRec = Get(TABLE_START_REC);
				$this->setStartRecordNumber($this->StartRec);
			} elseif (Get(TABLE_PAGE_NO) !== NULL) {
				$pageNo = Get(TABLE_PAGE_NO);
				if (is_numeric($pageNo)) {
					$this->StartRec = ($pageNo - 1) * $this->DisplayRecs + 1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1) {
						$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->StartRec > $this->TotalRecs) { // Avoid starting record > total records
			$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec - 1) % $this->DisplayRecs <> 0) {
			$this->StartRec = (int)(($this->StartRec - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
		$this->LP2->Upload->Index = $CurrentForm->Index;
		$this->LP2->Upload->uploadFile();
		$this->LP2->CurrentValue = $this->LP2->Upload->FileName;
		$this->LK->Upload->Index = $CurrentForm->Index;
		$this->LK->Upload->uploadFile();
		$this->LK->CurrentValue = $this->LK->Upload->FileName;
		$this->output->Upload->Index = $CurrentForm->Index;
		$this->output->Upload->uploadFile();
		$this->output->CurrentValue = $this->output->Upload->FileName;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$this->getUploadFiles(); // Get upload files

		// Check field name 'id_pengabdian' first before field var 'x_id_pengabdian'
		$val = $CurrentForm->hasValue("id_pengabdian") ? $CurrentForm->getValue("id_pengabdian") : $CurrentForm->getValue("x_id_pengabdian");
		if (!$this->id_pengabdian->IsDetailKey)
			$this->id_pengabdian->setFormValue($val);

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

		// Check field name 'anggota3' first before field var 'x_anggota3'
		$val = $CurrentForm->hasValue("anggota3") ? $CurrentForm->getValue("anggota3") : $CurrentForm->getValue("x_anggota3");
		if (!$this->anggota3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->anggota3->Visible = FALSE; // Disable update for API request
			else
				$this->anggota3->setFormValue($val);
		}

		// Check field name 'anggota4' first before field var 'x_anggota4'
		$val = $CurrentForm->hasValue("anggota4") ? $CurrentForm->getValue("anggota4") : $CurrentForm->getValue("x_anggota4");
		if (!$this->anggota4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->anggota4->Visible = FALSE; // Disable update for API request
			else
				$this->anggota4->setFormValue($val);
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
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id_pengabdian->CurrentValue = $this->id_pengabdian->FormValue;
		$this->NIDN->CurrentValue = $this->NIDN->FormValue;
		$this->anggota1->CurrentValue = $this->anggota1->FormValue;
		$this->anggota2->CurrentValue = $this->anggota2->FormValue;
		$this->anggota3->CurrentValue = $this->anggota3->FormValue;
		$this->anggota4->CurrentValue = $this->anggota4->FormValue;
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
			$res = $this->showOptionLink('edit');
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
		$this->id_pengabdian->setDbValue($row['id_pengabdian']);
		$this->NIDN->setDbValue($row['NIDN']);
		$this->anggota1->setDbValue($row['anggota1']);
		$this->anggota2->setDbValue($row['anggota2']);
		$this->anggota3->setDbValue($row['anggota3']);
		$this->anggota4->setDbValue($row['anggota4']);
		$this->judul->setDbValue($row['judul']);
		$this->biaya->setDbValue($row['biaya']);
		$this->tahun->setDbValue($row['tahun']);
		$this->status->setDbValue($row['status']);
		$this->LP2->Upload->DbValue = $row['LP2'];
		$this->LP2->setDbValue($this->LP2->Upload->DbValue);
		$this->LK->Upload->DbValue = $row['LK'];
		$this->LK->setDbValue($this->LK->Upload->DbValue);
		$this->output->Upload->DbValue = $row['output'];
		$this->output->setDbValue($this->output->Upload->DbValue);
		$this->chr->Upload->DbValue = $row['chr'];
		$this->chr->setDbValue($this->chr->Upload->DbValue);
		$this->surat_tugas->Upload->DbValue = $row['surat_tugas'];
		$this->surat_tugas->setDbValue($this->surat_tugas->Upload->DbValue);
		$this->sk->Upload->DbValue = $row['sk'];
		$this->sk->setDbValue($this->sk->Upload->DbValue);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id_pengabdian'] = NULL;
		$row['NIDN'] = NULL;
		$row['anggota1'] = NULL;
		$row['anggota2'] = NULL;
		$row['anggota3'] = NULL;
		$row['anggota4'] = NULL;
		$row['judul'] = NULL;
		$row['biaya'] = NULL;
		$row['tahun'] = NULL;
		$row['status'] = NULL;
		$row['LP2'] = NULL;
		$row['LK'] = NULL;
		$row['output'] = NULL;
		$row['chr'] = NULL;
		$row['surat_tugas'] = NULL;
		$row['sk'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id_pengabdian")) <> "")
			$this->id_pengabdian->CurrentValue = $this->getKey("id_pengabdian"); // id_pengabdian
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
		// id_pengabdian
		// NIDN
		// anggota1
		// anggota2
		// anggota3
		// anggota4
		// judul
		// biaya
		// tahun
		// status
		// LP2
		// LK
		// output
		// chr
		// surat_tugas
		// sk

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id_pengabdian
			$this->id_pengabdian->ViewValue = $this->id_pengabdian->CurrentValue;
			$this->id_pengabdian->ViewCustomAttributes = "";

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

			// anggota3
			$this->anggota3->ViewValue = $this->anggota3->CurrentValue;
			$curVal = strval($this->anggota3->CurrentValue);
			if ($curVal <> "") {
				$this->anggota3->ViewValue = $this->anggota3->lookupCacheOption($curVal);
				if ($this->anggota3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Nama_Dosen`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->anggota3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->anggota3->ViewValue = $this->anggota3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->anggota3->ViewValue = $this->anggota3->CurrentValue;
					}
				}
			} else {
				$this->anggota3->ViewValue = NULL;
			}
			$this->anggota3->ViewCustomAttributes = "";

			// anggota4
			$this->anggota4->ViewValue = $this->anggota4->CurrentValue;
			$curVal = strval($this->anggota4->CurrentValue);
			if ($curVal <> "") {
				$this->anggota4->ViewValue = $this->anggota4->lookupCacheOption($curVal);
				if ($this->anggota4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Nama_Dosen`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->anggota4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->anggota4->ViewValue = $this->anggota4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->anggota4->ViewValue = $this->anggota4->CurrentValue;
					}
				}
			} else {
				$this->anggota4->ViewValue = NULL;
			}
			$this->anggota4->ViewCustomAttributes = "";

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

			// LP2
			if (!EmptyValue($this->LP2->Upload->DbValue)) {
				$this->LP2->ViewValue = $this->LP2->Upload->DbValue;
			} else {
				$this->LP2->ViewValue = "";
			}
			$this->LP2->ViewCustomAttributes = "";

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

			// id_pengabdian
			$this->id_pengabdian->LinkCustomAttributes = "";
			$this->id_pengabdian->HrefValue = "";
			$this->id_pengabdian->TooltipValue = "";

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

			// anggota3
			$this->anggota3->LinkCustomAttributes = "";
			$this->anggota3->HrefValue = "";
			$this->anggota3->TooltipValue = "";

			// anggota4
			$this->anggota4->LinkCustomAttributes = "";
			$this->anggota4->HrefValue = "";
			$this->anggota4->TooltipValue = "";

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

			// LP2
			$this->LP2->LinkCustomAttributes = "";
			$this->LP2->HrefValue = "";
			$this->LP2->ExportHrefValue = $this->LP2->UploadPath . $this->LP2->Upload->DbValue;
			$this->LP2->TooltipValue = "";

			// LK
			$this->LK->LinkCustomAttributes = "";
			$this->LK->HrefValue = "";
			$this->LK->ExportHrefValue = $this->LK->UploadPath . $this->LK->Upload->DbValue;
			$this->LK->TooltipValue = "";

			// output
			$this->output->LinkCustomAttributes = "";
			$this->output->HrefValue = "";
			$this->output->ExportHrefValue = $this->output->UploadPath . $this->output->Upload->DbValue;
			$this->output->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id_pengabdian
			$this->id_pengabdian->EditAttrs["class"] = "form-control";
			$this->id_pengabdian->EditCustomAttributes = "";
			$this->id_pengabdian->EditValue = $this->id_pengabdian->CurrentValue;
			$this->id_pengabdian->ViewCustomAttributes = "";

			// NIDN
			$this->NIDN->EditAttrs["class"] = "form-control";
			$this->NIDN->EditCustomAttributes = "";
			if (!$Security->isAdmin() && $Security->isLoggedIn() && !$this->userIDAllow("edit")) { // Non system admin
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

			// anggota3
			$this->anggota3->EditAttrs["class"] = "form-control";
			$this->anggota3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->anggota3->CurrentValue = HtmlDecode($this->anggota3->CurrentValue);
			$this->anggota3->EditValue = HtmlEncode($this->anggota3->CurrentValue);
			$curVal = strval($this->anggota3->CurrentValue);
			if ($curVal <> "") {
				$this->anggota3->EditValue = $this->anggota3->lookupCacheOption($curVal);
				if ($this->anggota3->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Nama_Dosen`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->anggota3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->anggota3->EditValue = $this->anggota3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->anggota3->EditValue = HtmlEncode($this->anggota3->CurrentValue);
					}
				}
			} else {
				$this->anggota3->EditValue = NULL;
			}
			$this->anggota3->PlaceHolder = RemoveHtml($this->anggota3->caption());

			// anggota4
			$this->anggota4->EditAttrs["class"] = "form-control";
			$this->anggota4->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->anggota4->CurrentValue = HtmlDecode($this->anggota4->CurrentValue);
			$this->anggota4->EditValue = HtmlEncode($this->anggota4->CurrentValue);
			$curVal = strval($this->anggota4->CurrentValue);
			if ($curVal <> "") {
				$this->anggota4->EditValue = $this->anggota4->lookupCacheOption($curVal);
				if ($this->anggota4->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Nama_Dosen`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->anggota4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->anggota4->EditValue = $this->anggota4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->anggota4->EditValue = HtmlEncode($this->anggota4->CurrentValue);
					}
				}
			} else {
				$this->anggota4->EditValue = NULL;
			}
			$this->anggota4->PlaceHolder = RemoveHtml($this->anggota4->caption());

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

			// LP2
			$this->LP2->EditAttrs["class"] = "form-control";
			$this->LP2->EditCustomAttributes = "";
			if (!EmptyValue($this->LP2->Upload->DbValue)) {
				$this->LP2->EditValue = $this->LP2->Upload->DbValue;
			} else {
				$this->LP2->EditValue = "";
			}
			if (!EmptyValue($this->LP2->CurrentValue))
					$this->LP2->Upload->FileName = $this->LP2->CurrentValue;
			if ($this->isShow() && !$this->EventCancelled)
				RenderUploadField($this->LP2);

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
			if ($this->isShow() && !$this->EventCancelled)
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
			if ($this->isShow() && !$this->EventCancelled)
				RenderUploadField($this->output);

			// Edit refer script
			// id_pengabdian

			$this->id_pengabdian->LinkCustomAttributes = "";
			$this->id_pengabdian->HrefValue = "";

			// NIDN
			$this->NIDN->LinkCustomAttributes = "";
			$this->NIDN->HrefValue = "";

			// anggota1
			$this->anggota1->LinkCustomAttributes = "";
			$this->anggota1->HrefValue = "";

			// anggota2
			$this->anggota2->LinkCustomAttributes = "";
			$this->anggota2->HrefValue = "";

			// anggota3
			$this->anggota3->LinkCustomAttributes = "";
			$this->anggota3->HrefValue = "";

			// anggota4
			$this->anggota4->LinkCustomAttributes = "";
			$this->anggota4->HrefValue = "";

			// judul
			$this->judul->LinkCustomAttributes = "";
			$this->judul->HrefValue = "";

			// biaya
			$this->biaya->LinkCustomAttributes = "";
			$this->biaya->HrefValue = "";

			// tahun
			$this->tahun->LinkCustomAttributes = "";
			$this->tahun->HrefValue = "";

			// LP2
			$this->LP2->LinkCustomAttributes = "";
			$this->LP2->HrefValue = "";
			$this->LP2->ExportHrefValue = $this->LP2->UploadPath . $this->LP2->Upload->DbValue;

			// LK
			$this->LK->LinkCustomAttributes = "";
			$this->LK->HrefValue = "";
			$this->LK->ExportHrefValue = $this->LK->UploadPath . $this->LK->Upload->DbValue;

			// output
			$this->output->LinkCustomAttributes = "";
			$this->output->HrefValue = "";
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
		if ($this->id_pengabdian->Required) {
			if (!$this->id_pengabdian->IsDetailKey && $this->id_pengabdian->FormValue != NULL && $this->id_pengabdian->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id_pengabdian->caption(), $this->id_pengabdian->RequiredErrorMessage));
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
		if ($this->anggota3->Required) {
			if (!$this->anggota3->IsDetailKey && $this->anggota3->FormValue != NULL && $this->anggota3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->anggota3->caption(), $this->anggota3->RequiredErrorMessage));
			}
		}
		if ($this->anggota4->Required) {
			if (!$this->anggota4->IsDetailKey && $this->anggota4->FormValue != NULL && $this->anggota4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->anggota4->caption(), $this->anggota4->RequiredErrorMessage));
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
		if ($this->LP2->Required) {
			if ($this->LP2->Upload->FileName == "" && !$this->LP2->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->LP2->caption(), $this->LP2->RequiredErrorMessage));
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
		if ($this->chr->Required) {
			if ($this->chr->Upload->FileName == "" && !$this->chr->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->chr->caption(), $this->chr->RequiredErrorMessage));
			}
		}
		if ($this->surat_tugas->Required) {
			if ($this->surat_tugas->Upload->FileName == "" && !$this->surat_tugas->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->surat_tugas->caption(), $this->surat_tugas->RequiredErrorMessage));
			}
		}
		if ($this->sk->Required) {
			if ($this->sk->Upload->FileName == "" && !$this->sk->Upload->KeepFile) {
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

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($filter);
		$conn = &$this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// NIDN
			$this->NIDN->setDbValueDef($rsnew, $this->NIDN->CurrentValue, NULL, $this->NIDN->ReadOnly);

			// anggota1
			$this->anggota1->setDbValueDef($rsnew, $this->anggota1->CurrentValue, NULL, $this->anggota1->ReadOnly);

			// anggota2
			$this->anggota2->setDbValueDef($rsnew, $this->anggota2->CurrentValue, NULL, $this->anggota2->ReadOnly);

			// anggota3
			$this->anggota3->setDbValueDef($rsnew, $this->anggota3->CurrentValue, NULL, $this->anggota3->ReadOnly);

			// anggota4
			$this->anggota4->setDbValueDef($rsnew, $this->anggota4->CurrentValue, NULL, $this->anggota4->ReadOnly);

			// judul
			$this->judul->setDbValueDef($rsnew, $this->judul->CurrentValue, NULL, $this->judul->ReadOnly);

			// biaya
			$this->biaya->setDbValueDef($rsnew, $this->biaya->CurrentValue, NULL, $this->biaya->ReadOnly);

			// tahun
			$this->tahun->setDbValueDef($rsnew, $this->tahun->CurrentValue, NULL, $this->tahun->ReadOnly);

			// LP2
			if ($this->LP2->Visible && !$this->LP2->ReadOnly && !$this->LP2->Upload->KeepFile) {
				$this->LP2->Upload->DbValue = $rsold['LP2']; // Get original value
				if ($this->LP2->Upload->FileName == "") {
					$rsnew['LP2'] = NULL;
				} else {
					$rsnew['LP2'] = $this->LP2->Upload->FileName;
				}
			}

			// LK
			if ($this->LK->Visible && !$this->LK->ReadOnly && !$this->LK->Upload->KeepFile) {
				$this->LK->Upload->DbValue = $rsold['LK']; // Get original value
				if ($this->LK->Upload->FileName == "") {
					$rsnew['LK'] = NULL;
				} else {
					$rsnew['LK'] = $this->LK->Upload->FileName;
				}
			}

			// output
			if ($this->output->Visible && !$this->output->ReadOnly && !$this->output->Upload->KeepFile) {
				$this->output->Upload->DbValue = $rsold['output']; // Get original value
				if ($this->output->Upload->FileName == "") {
					$rsnew['output'] = NULL;
				} else {
					$rsnew['output'] = $this->output->Upload->FileName;
				}
			}
			if ($this->LP2->Visible && !$this->LP2->Upload->KeepFile) {
				$oldFiles = EmptyValue($this->LP2->Upload->DbValue) ? array() : array($this->LP2->Upload->DbValue);
				if (!EmptyValue($this->LP2->Upload->FileName)) {
					$newFiles = array($this->LP2->Upload->FileName);
					$NewFileCount = count($newFiles);
					for ($i = 0; $i < $NewFileCount; $i++) {
						if ($newFiles[$i] <> "") {
							$file = $newFiles[$i];
							if (file_exists(UploadTempPath($this->LP2, $this->LP2->Upload->Index) . $file)) {
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
								$file1 = UniqueFilename($this->LP2->physicalUploadPath(), $file); // Get new file name
								if ($file1 <> $file) { // Rename temp file
									while (file_exists(UploadTempPath($this->LP2, $this->LP2->Upload->Index) . $file1) || file_exists($this->LP2->physicalUploadPath() . $file1)) // Make sure no file name clash
										$file1 = UniqueFilename($this->LP2->physicalUploadPath(), $file1, TRUE); // Use indexed name
									rename(UploadTempPath($this->LP2, $this->LP2->Upload->Index) . $file, UploadTempPath($this->LP2, $this->LP2->Upload->Index) . $file1);
									$newFiles[$i] = $file1;
								}
							}
						}
					}
					$this->LP2->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
					$this->LP2->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
					$this->LP2->setDbValueDef($rsnew, $this->LP2->Upload->FileName, NULL, $this->LP2->ReadOnly);
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
					$this->LK->setDbValueDef($rsnew, $this->LK->Upload->FileName, NULL, $this->LK->ReadOnly);
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
					$this->output->setDbValueDef($rsnew, $this->output->Upload->FileName, NULL, $this->output->ReadOnly);
				}
			}

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);
			if ($updateRow) {
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($editRow) {
					if ($this->LP2->Visible && !$this->LP2->Upload->KeepFile) {
						$oldFiles = EmptyValue($this->LP2->Upload->DbValue) ? array() : array($this->LP2->Upload->DbValue);
						if (!EmptyValue($this->LP2->Upload->FileName)) {
							$newFiles = array($this->LP2->Upload->FileName);
							$newFiles2 = array($rsnew['LP2']);
							$newFileCount = count($newFiles);
							for ($i = 0; $i < $newFileCount; $i++) {
								if ($newFiles[$i] <> "") {
									$file = UploadTempPath($this->LP2, $this->LP2->Upload->Index) . $newFiles[$i];
									if (file_exists($file)) {
										if (@$newFiles2[$i] <> "") // Use correct file name
											$newFiles[$i] = $newFiles2[$i];
										if (!$this->LP2->Upload->saveToFile($newFiles[$i], TRUE, $i)) { // Just replace
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
									@unlink($this->LP2->oldPhysicalUploadPath() . $oldFile);
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
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// LP2
		if ($this->LP2->Upload->FileToken <> "")
			CleanUploadTempPath($this->LP2->Upload->FileToken, $this->LP2->Upload->Index);
		else
			CleanUploadTempPath($this->LP2, $this->LP2->Upload->Index);

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
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("tb_pengabdianlist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
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
						case "x_anggota3":
							break;
						case "x_anggota4":
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