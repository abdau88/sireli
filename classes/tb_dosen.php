<?php
namespace PHPMaker2019\project2;

/**
 * Table class for tb_dosen
 */
class tb_dosen extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
	public $NIDN;
	public $NPAK_NIP;
	public $Nama_Dosen;
	public $userlevel;
	public $id_jurusan;
	public $password;
	public $_email;
	public $no_hp;
	public $activated;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'tb_dosen';
		$this->TableName = 'tb_dosen';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`tb_dosen`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// NIDN
		$this->NIDN = new DbField('tb_dosen', 'tb_dosen', 'x_NIDN', 'NIDN', '`NIDN`', '`NIDN`', 200, -1, FALSE, '`NIDN`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NIDN->IsPrimaryKey = TRUE; // Primary key field
		$this->NIDN->Nullable = FALSE; // NOT NULL field
		$this->NIDN->Required = TRUE; // Required field
		$this->NIDN->Sortable = TRUE; // Allow sort
		$this->fields['NIDN'] = &$this->NIDN;

		// NPAK_NIP
		$this->NPAK_NIP = new DbField('tb_dosen', 'tb_dosen', 'x_NPAK_NIP', 'NPAK_NIP', '`NPAK_NIP`', '`NPAK_NIP`', 200, -1, FALSE, '`NPAK_NIP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NPAK_NIP->IsPrimaryKey = TRUE; // Primary key field
		$this->NPAK_NIP->Nullable = FALSE; // NOT NULL field
		$this->NPAK_NIP->Required = TRUE; // Required field
		$this->NPAK_NIP->Sortable = TRUE; // Allow sort
		$this->fields['NPAK_NIP'] = &$this->NPAK_NIP;

		// Nama_Dosen
		$this->Nama_Dosen = new DbField('tb_dosen', 'tb_dosen', 'x_Nama_Dosen', 'Nama_Dosen', '`Nama_Dosen`', '`Nama_Dosen`', 200, -1, FALSE, '`Nama_Dosen`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nama_Dosen->Nullable = FALSE; // NOT NULL field
		$this->Nama_Dosen->Required = TRUE; // Required field
		$this->Nama_Dosen->Sortable = TRUE; // Allow sort
		$this->fields['Nama_Dosen'] = &$this->Nama_Dosen;

		// userlevel
		$this->userlevel = new DbField('tb_dosen', 'tb_dosen', 'x_userlevel', 'userlevel', '`userlevel`', '`userlevel`', 16, -1, FALSE, '`userlevel`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->userlevel->Sortable = TRUE; // Allow sort
		$this->userlevel->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->userlevel->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->userlevel->Lookup = new Lookup('userlevel', 'tb_dosen', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->userlevel->OptionCount = 4;
		$this->userlevel->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['userlevel'] = &$this->userlevel;

		// id_jurusan
		$this->id_jurusan = new DbField('tb_dosen', 'tb_dosen', 'x_id_jurusan', 'id_jurusan', '`id_jurusan`', '`id_jurusan`', 3, -1, FALSE, '`id_jurusan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->id_jurusan->Sortable = TRUE; // Allow sort
		$this->id_jurusan->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->id_jurusan->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->id_jurusan->Lookup = new Lookup('id_jurusan', 'tb_jurusan', FALSE, 'id_jurusan', ["jurusan","","",""], [], [], [], [], [], [], '', '');
		$this->id_jurusan->OptionCount = 5;
		$this->id_jurusan->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_jurusan'] = &$this->id_jurusan;

		// password
		$this->password = new DbField('tb_dosen', 'tb_dosen', 'x_password', 'password', '`password`', '`password`', 200, -1, FALSE, '`password`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->password->Nullable = FALSE; // NOT NULL field
		$this->password->Required = TRUE; // Required field
		$this->password->Sortable = TRUE; // Allow sort
		$this->fields['password'] = &$this->password;

		// email
		$this->_email = new DbField('tb_dosen', 'tb_dosen', 'x__email', 'email', '`email`', '`email`', 200, -1, FALSE, '`email`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_email->Required = TRUE; // Required field
		$this->_email->Sortable = TRUE; // Allow sort
		$this->fields['email'] = &$this->_email;

		// no_hp
		$this->no_hp = new DbField('tb_dosen', 'tb_dosen', 'x_no_hp', 'no_hp', '`no_hp`', '`no_hp`', 200, -1, FALSE, '`no_hp`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->no_hp->Sortable = TRUE; // Allow sort
		$this->fields['no_hp'] = &$this->no_hp;

		// activated
		$this->activated = new DbField('tb_dosen', 'tb_dosen', 'x_activated', 'activated', '`activated`', '`activated`', 16, -1, FALSE, '`activated`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->activated->Sortable = TRUE; // Allow sort
		$this->activated->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['activated'] = &$this->activated;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Single column sort
	public function updateSort(&$fld)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`tb_dosen`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere <> "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy <> "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving <> "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter)
	{
		global $Security;

		// Add User ID filter
		if ($Security->currentUserID() <> "" && !$Security->isAdmin()) { // Non system admin
			$filter = $this->addUserIDFilter($filter);
		}
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = $this->UserIDAllowSecurity;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count
	public function getRecordCount($sql)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery and SELECT DISTINCT
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) && !preg_match('/^\s*select\s+distinct\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			if (ENCRYPTED_PASSWORD && $name == 'password')
				$value = (CASE_SENSITIVE_PASSWORD) ? EncryptPassword($value) : EncryptPassword(strtolower($value));
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsPrimaryKey)
				continue;
			if (ENCRYPTED_PASSWORD && $name == 'password') {
				if ($value == $this->fields[$name]->OldValue) // No need to update hashed password if not changed
					continue;
				$value = (CASE_SENSITIVE_PASSWORD) ? EncryptPassword($value) : EncryptPassword(strtolower($value));
			}
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('NIDN', $rs))
				AddFilter($where, QuotedName('NIDN', $this->Dbid) . '=' . QuotedValue($rs['NIDN'], $this->NIDN->DataType, $this->Dbid));
			if (array_key_exists('NPAK_NIP', $rs))
				AddFilter($where, QuotedName('NPAK_NIP', $this->Dbid) . '=' . QuotedValue($rs['NPAK_NIP'], $this->NPAK_NIP->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = &$this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->NIDN->DbValue = $row['NIDN'];
		$this->NPAK_NIP->DbValue = $row['NPAK_NIP'];
		$this->Nama_Dosen->DbValue = $row['Nama_Dosen'];
		$this->userlevel->DbValue = $row['userlevel'];
		$this->id_jurusan->DbValue = $row['id_jurusan'];
		$this->password->DbValue = $row['password'];
		$this->_email->DbValue = $row['email'];
		$this->no_hp->DbValue = $row['no_hp'];
		$this->activated->DbValue = $row['activated'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`NIDN` = '@NIDN@' AND `NPAK_NIP` = '@NPAK_NIP@'";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('NIDN', $row) ? $row['NIDN'] : NULL) : $this->NIDN->CurrentValue;
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@NIDN@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		$val = is_array($row) ? (array_key_exists('NPAK_NIP', $row) ? $row['NPAK_NIP'] : NULL) : $this->NPAK_NIP->CurrentValue;
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@NPAK_NIP@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "tb_dosenlist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "tb_dosenview.php")
			return $Language->phrase("View");
		elseif ($pageName == "tb_dosenedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "tb_dosenadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "tb_dosenlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("tb_dosenview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("tb_dosenview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "tb_dosenadd.php?" . $this->getUrlParm($parm);
		else
			$url = "tb_dosenadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("tb_dosenedit.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		$url = $this->keyUrl("tb_dosenadd.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("tb_dosendelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "NIDN:" . JsonEncode($this->NIDN->CurrentValue, "string");
		$json .= ",NPAK_NIP:" . JsonEncode($this->NPAK_NIP->CurrentValue, "string");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm <> "")
			$url .= $parm . "&";
		if ($this->NIDN->CurrentValue != NULL) {
			$url .= "NIDN=" . urlencode($this->NIDN->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		if ($this->NPAK_NIP->CurrentValue != NULL) {
			$url .= "&NPAK_NIP=" . urlencode($this->NPAK_NIP->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
			for ($i = 0; $i < $cnt; $i++)
				$arKeys[$i] = explode($COMPOSITE_KEY_SEPARATOR, $arKeys[$i]);
		} else {
			if (Param("NIDN") !== NULL)
				$arKey[] = Param("NIDN");
			elseif (IsApi() && Key(0) !== NULL)
				$arKey[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKey[] = Route(2);
			else
				$arKeys = NULL; // Do not setup
			if (Param("NPAK_NIP") !== NULL)
				$arKey[] = Param("NPAK_NIP");
			elseif (IsApi() && Key(1) !== NULL)
				$arKey[] = Key(1);
			elseif (IsApi() && Route(3) !== NULL)
				$arKey[] = Route(3);
			else
				$arKeys = NULL; // Do not setup
			if (is_array($arKeys)) $arKeys[] = $arKey;

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_array($key) || count($key) <> 2)
					continue; // Just skip so other keys will still work
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys()
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter <> "") $keyFilter .= " OR ";
			$this->NIDN->CurrentValue = $key[0];
			$this->NPAK_NIP->CurrentValue = $key[1];
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = &$this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->NIDN->setDbValue($rs->fields('NIDN'));
		$this->NPAK_NIP->setDbValue($rs->fields('NPAK_NIP'));
		$this->Nama_Dosen->setDbValue($rs->fields('Nama_Dosen'));
		$this->userlevel->setDbValue($rs->fields('userlevel'));
		$this->id_jurusan->setDbValue($rs->fields('id_jurusan'));
		$this->password->setDbValue($rs->fields('password'));
		$this->_email->setDbValue($rs->fields('email'));
		$this->no_hp->setDbValue($rs->fields('no_hp'));
		$this->activated->setDbValue($rs->fields('activated'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// NIDN
		// NPAK_NIP
		// Nama_Dosen
		// userlevel
		// id_jurusan
		// password
		// email
		// no_hp
		// activated
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

		// userlevel
		$this->userlevel->LinkCustomAttributes = "";
		$this->userlevel->HrefValue = "";
		$this->userlevel->TooltipValue = "";

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

		// activated
		$this->activated->LinkCustomAttributes = "";
		$this->activated->HrefValue = "";
		$this->activated->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// NIDN
		$this->NIDN->EditAttrs["class"] = "form-control";
		$this->NIDN->EditCustomAttributes = "";
		$this->NIDN->EditValue = $this->NIDN->CurrentValue;
		$this->NIDN->ViewCustomAttributes = "";

		// NPAK_NIP
		$this->NPAK_NIP->EditAttrs["class"] = "form-control";
		$this->NPAK_NIP->EditCustomAttributes = "";
		$this->NPAK_NIP->EditValue = $this->NPAK_NIP->CurrentValue;
		$this->NPAK_NIP->ViewCustomAttributes = "";

		// Nama_Dosen
		$this->Nama_Dosen->EditAttrs["class"] = "form-control";
		$this->Nama_Dosen->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Nama_Dosen->CurrentValue = HtmlDecode($this->Nama_Dosen->CurrentValue);
		$this->Nama_Dosen->EditValue = $this->Nama_Dosen->CurrentValue;
		$this->Nama_Dosen->PlaceHolder = RemoveHtml($this->Nama_Dosen->caption());

		// userlevel
		$this->userlevel->EditAttrs["class"] = "form-control";
		$this->userlevel->EditCustomAttributes = "";
		if (!$Security->canAdmin()) { // System admin
			$this->userlevel->EditValue = $Language->phrase("PasswordMask");
		} else {
		$this->userlevel->EditValue = $this->userlevel->options(TRUE);
		}

		// id_jurusan
		$this->id_jurusan->EditAttrs["class"] = "form-control";
		$this->id_jurusan->EditCustomAttributes = "";
		$this->id_jurusan->EditValue = $this->id_jurusan->options(TRUE);

		// password
		$this->password->EditAttrs["class"] = "form-control";
		$this->password->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->password->CurrentValue = HtmlDecode($this->password->CurrentValue);
		$this->password->EditValue = $this->password->CurrentValue;
		$this->password->PlaceHolder = RemoveHtml($this->password->caption());

		// email
		$this->_email->EditAttrs["class"] = "form-control";
		$this->_email->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->_email->CurrentValue = HtmlDecode($this->_email->CurrentValue);
		$this->_email->EditValue = $this->_email->CurrentValue;
		$this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

		// no_hp
		$this->no_hp->EditAttrs["class"] = "form-control";
		$this->no_hp->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->no_hp->CurrentValue = HtmlDecode($this->no_hp->CurrentValue);
		$this->no_hp->EditValue = $this->no_hp->CurrentValue;
		$this->no_hp->PlaceHolder = RemoveHtml($this->no_hp->caption());

		// activated
		$this->activated->EditAttrs["class"] = "form-control";
		$this->activated->EditCustomAttributes = "";
		$this->activated->EditValue = $this->activated->CurrentValue;
		$this->activated->PlaceHolder = RemoveHtml($this->activated->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					$doc->exportCaption($this->NIDN);
					$doc->exportCaption($this->NPAK_NIP);
					$doc->exportCaption($this->Nama_Dosen);
					$doc->exportCaption($this->id_jurusan);
					$doc->exportCaption($this->_email);
					$doc->exportCaption($this->no_hp);
				} else {
					$doc->exportCaption($this->NIDN);
					$doc->exportCaption($this->NPAK_NIP);
					$doc->exportCaption($this->Nama_Dosen);
					$doc->exportCaption($this->userlevel);
					$doc->exportCaption($this->id_jurusan);
					$doc->exportCaption($this->password);
					$doc->exportCaption($this->_email);
					$doc->exportCaption($this->no_hp);
					$doc->exportCaption($this->activated);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->NIDN);
						$doc->exportField($this->NPAK_NIP);
						$doc->exportField($this->Nama_Dosen);
						$doc->exportField($this->id_jurusan);
						$doc->exportField($this->_email);
						$doc->exportField($this->no_hp);
					} else {
						$doc->exportField($this->NIDN);
						$doc->exportField($this->NPAK_NIP);
						$doc->exportField($this->Nama_Dosen);
						$doc->exportField($this->userlevel);
						$doc->exportField($this->id_jurusan);
						$doc->exportField($this->password);
						$doc->exportField($this->_email);
						$doc->exportField($this->no_hp);
						$doc->exportField($this->activated);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// User ID filter
	public function getUserIDFilter($userId)
	{
		$userIdFilter = '`NIDN` = ' . QuotedValue($userId, DATATYPE_STRING, USER_TABLE_DBID);
		return $userIdFilter;
	}

	// Add User ID filter
	public function addUserIDFilter($filter = "")
	{
		global $Security;
		$filterWrk = "";
		$id = (CurrentPageID() == "list") ? $this->CurrentAction : CurrentPageID();
		if (!$this->userIdAllow($id) && !$Security->isAdmin()) {
			$filterWrk = $Security->userIdList();
			if ($filterWrk <> "")
				$filterWrk = '`NIDN` IN (' . $filterWrk . ')';
		}

		// Call User ID Filtering event
		$this->UserID_Filtering($filterWrk);
		AddFilter($filter, $filterWrk);
		return $filter;
	}

	// User ID subquery
	public function getUserIDSubquery(&$fld, &$masterfld)
	{
		global $UserTableConn;
		$wrk = "";
		$sql = "SELECT " . $masterfld->Expression . " FROM `tb_dosen`";
		$filter = $this->addUserIDFilter("");
		if ($filter <> "")
			$sql .= " WHERE " . $filter;

		// Use subquery
		if (USE_SUBQUERY_FOR_MASTER_USER_ID) {
			$wrk = $sql;
		} else {

			// List all values
			if ($rs = $UserTableConn->execute($sql)) {
				while (!$rs->EOF) {
					if ($wrk <> "")
						$wrk .= ",";
					$wrk .= QuotedValue($rs->fields[0], $masterfld->DataType, USER_TABLE_DBID);
					$rs->moveNext();
				}
				$rs->close();
			}
		}
		if ($wrk <> "")
			$wrk = $fld->Expression . " IN (" . $wrk . ")";
		return $wrk;
	}

	// Lookup data from table
	public function lookup()
	{
		global $Language, $LANGUAGE_FOLDER, $PROJECT_ID;
		if (!isset($Language))
			$Language = new Language($LANGUAGE_FOLDER, Post("language", ""));
		global $Security, $RequestSecurity;

		// Check token first
		$func = PROJECT_NAMESPACE . "CheckToken";
		$validRequest = FALSE;
		if (is_callable($func) && Post(TOKEN_NAME) !== NULL) {
			$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			if ($validRequest) {
				if (!isset($Security)) {
					if (session_status() !== PHP_SESSION_ACTIVE)
						session_start(); // Init session data
					$Security = new AdvancedSecurity();
					if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
					$Security->loadCurrentUserLevel($PROJECT_ID . $this->TableName);
					if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
					$validRequest = $Security->canList(); // List permission
					if ($validRequest) {
						$Security->UserID_Loading();
						$Security->loadUserID();
						$Security->UserID_Loaded();
					}
				}
			}
		} else {

			// User profile
			$UserProfile = new UserProfile();

			// Security
			$Security = new AdvancedSecurity();
			if (is_array($RequestSecurity)) // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
			$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel(CurrentProjectID() . $this->TableName);
			$Security->TablePermission_Loaded();
			$validRequest = $Security->canList(); // List permission
		}

		// Reject invalid request
		if (!$validRequest)
			return FALSE;

		// Load lookup parameters
		$distinct = ConvertToBool(Post("distinct"));
		$linkField = Post("linkField");
		$displayFields = Post("displayFields");
		$parentFields = Post("parentFields");
		if (!is_array($parentFields))
			$parentFields = [];
		$childFields = Post("childFields");
		if (!is_array($childFields))
			$childFields = [];
		$filterFields = Post("filterFields");
		if (!is_array($filterFields))
			$filterFields = [];
		$filterFieldVars = Post("filterFieldVars");
		if (!is_array($filterFieldVars))
			$filterFieldVars = [];
		$filterOperators = Post("filterOperators");
		if (!is_array($filterOperators))
			$filterOperators = [];
		$autoFillSourceFields = Post("autoFillSourceFields");
		if (!is_array($autoFillSourceFields))
			$autoFillSourceFields = [];
		$formatAutoFill = FALSE;
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Get("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = AUTO_SUGGEST_MAX_ENTRIES;
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");

		// Selected records from modal, skip parent/filter fields and show all records
		if ($keys !== NULL) {
			$parentFields = [];
			$filterFields = [];
			$filterFieldVars = [];
			$offset = 0;
			$pageSize = 0;
		}

		// Create lookup object and output JSON
		$lookup = new Lookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(LOOKUP_FILTER_VALUE_SEPARATOR, $keys);
			$lookup->FilterValues[] = $keys; // Lookup values
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($filterFields) ? count($filterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect <> "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter <> "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy <> "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson();
	}

	// Send register email
	public function sendRegisterEmail($row)
	{
		$email = $this->prepareRegisterEmail($row);
		$args = array();
		$args["rs"] = $row;
		$emailSent = FALSE;
		if ($this->Email_Sending($email, $args)) // NOTE: use Email_Sending server event of user table
			$emailSent = $email->send();
		return $emailSent;
	}

	// Prepare register email
	public function prepareRegisterEmail($row = NULL, $langId = "")
	{
		$email = new Email();
		$email->load(EMAIL_REGISTER_TEMPLATE, $langId);
		$receiverEmail = $row == NULL ? $this->_email->CurrentValue : $row['email'];
		if ($receiverEmail == "") { // Send to recipient directly
			$receiverEmail = RECIPIENT_EMAIL;
			$bccEmail = "";
		} else { // Bcc recipient
			$bccEmail = RECIPIENT_EMAIL;
		}
		$email->replaceSender(SENDER_EMAIL); // Replace Sender
		$email->replaceRecipient($receiverEmail); // Replace Recipient
		if ($bccEmail <> "") // Add Bcc
			$email->addBcc($bccEmail);
		$email->replaceContent('<!--FieldCaption_NIDN-->', $this->NIDN->caption());
		$email->replaceContent('<!--NIDN-->', $row == NULL ? strval($this->NIDN->FormValue) : $row['NIDN']);
		$email->replaceContent('<!--FieldCaption_NPAK_NIP-->', $this->NPAK_NIP->caption());
		$email->replaceContent('<!--NPAK_NIP-->', $row == NULL ? strval($this->NPAK_NIP->FormValue) : $row['NPAK_NIP']);
		$email->replaceContent('<!--FieldCaption_Nama_Dosen-->', $this->Nama_Dosen->caption());
		$email->replaceContent('<!--Nama_Dosen-->', $row == NULL ? strval($this->Nama_Dosen->FormValue) : $row['Nama_Dosen']);
		$email->replaceContent('<!--FieldCaption_id_jurusan-->', $this->id_jurusan->caption());
		$email->replaceContent('<!--id_jurusan-->', $row == NULL ? strval($this->id_jurusan->FormValue) : $row['id_jurusan']);
		$email->replaceContent('<!--FieldCaption_password-->', $this->password->caption());
		$email->replaceContent('<!--password-->', $row == NULL ? strval($this->password->FormValue) : $row['password']);
		$email->replaceContent('<!--FieldCaption_email-->', $this->_email->caption());
		$email->replaceContent('<!--email-->', $row == NULL ? strval($this->_email->FormValue) : $row['email']);
		$email->replaceContent('<!--FieldCaption_no_hp-->', $this->no_hp->caption());
		$email->replaceContent('<!--no_hp-->', $row == NULL ? strval($this->no_hp->FormValue) : $row['no_hp']);
		$loginID = $row == NULL ? $this->NIDN->CurrentValue : $row['NIDN'];
		$password = $row == NULL ? $this->password->CurrentValue : $row['password'];
		$activateLink = FullUrl("register.php", "activate") . "?action=confirm";
		$activateLink .= "&email=" . $receiverEmail;
		$token = Encrypt($receiverEmail) . "," . Encrypt($loginID) . "," . Encrypt($password);
		$activateLink .= "&token=" . $token;
		$email->replaceContent("<!--ActivateLink-->", $activateLink);
		$email->Content = preg_replace('/<!--\s*register_activate_link[\s\S]*?-->/i', '', $email->Content); // Remove comments
		return $email;
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>