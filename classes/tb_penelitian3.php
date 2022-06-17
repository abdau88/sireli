<?php
namespace PHPMaker2019\project2;

/**
 * Table class for tb_penelitian3
 */
class tb_penelitian3 extends DbTable
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
	public $id_penelitian;
	public $anggota1;
	public $anggota2;
	public $id_jurusan;
	public $judul;
	public $biaya;
	public $tahun;
	public $status;
	public $LP;
	public $chr;
	public $surat_tugas;
	public $LK;
	public $output;
	public $sk;
	public $NIDN;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'tb_penelitian3';
		$this->TableName = 'tb_penelitian3';
		$this->TableType = 'LINKTABLE';

		// Update Table
		$this->UpdateTable = "`tb_penelitian`";
		$this->Dbid = 'sireli2';
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

		// id_penelitian
		$this->id_penelitian = new DbField('tb_penelitian3', 'tb_penelitian3', 'x_id_penelitian', 'id_penelitian', '`id_penelitian`', '`id_penelitian`', 3, -1, FALSE, '`id_penelitian`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id_penelitian->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id_penelitian->IsPrimaryKey = TRUE; // Primary key field
		$this->id_penelitian->Sortable = TRUE; // Allow sort
		$this->id_penelitian->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_penelitian'] = &$this->id_penelitian;

		// anggota1
		$this->anggota1 = new DbField('tb_penelitian3', 'tb_penelitian3', 'x_anggota1', 'anggota1', '`anggota1`', '`anggota1`', 200, -1, FALSE, '`anggota1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->anggota1->Sortable = TRUE; // Allow sort
		$this->anggota1->Lookup = new Lookup('anggota1', 'tb_dosen', FALSE, 'NIDN', ["Nama_Dosen","","",""], [], [], [], [], [], [], '', '');
		$this->fields['anggota1'] = &$this->anggota1;

		// anggota2
		$this->anggota2 = new DbField('tb_penelitian3', 'tb_penelitian3', 'x_anggota2', 'anggota2', '`anggota2`', '`anggota2`', 200, -1, FALSE, '`anggota2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->anggota2->Sortable = TRUE; // Allow sort
		$this->anggota2->Lookup = new Lookup('anggota2', 'tb_dosen', FALSE, 'NIDN', ["Nama_Dosen","","",""], [], [], [], [], [], [], '', '');
		$this->fields['anggota2'] = &$this->anggota2;

		// id_jurusan
		$this->id_jurusan = new DbField('tb_penelitian3', 'tb_penelitian3', 'x_id_jurusan', 'id_jurusan', '`id_jurusan`', '`id_jurusan`', 3, -1, FALSE, '`id_jurusan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->id_jurusan->Sortable = TRUE; // Allow sort
		$this->id_jurusan->Lookup = new Lookup('id_jurusan', 'tb_jurusan', FALSE, 'id_jurusan', ["jurusan","","",""], [], [], [], [], [], [], '', '');
		$this->id_jurusan->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_jurusan'] = &$this->id_jurusan;

		// judul
		$this->judul = new DbField('tb_penelitian3', 'tb_penelitian3', 'x_judul', 'judul', '`judul`', '`judul`', 200, -1, FALSE, '`judul`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->judul->Sortable = TRUE; // Allow sort
		$this->fields['judul'] = &$this->judul;

		// biaya
		$this->biaya = new DbField('tb_penelitian3', 'tb_penelitian3', 'x_biaya', 'biaya', '`biaya`', '`biaya`', 3, -1, FALSE, '`biaya`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->biaya->Sortable = TRUE; // Allow sort
		$this->biaya->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['biaya'] = &$this->biaya;

		// tahun
		$this->tahun = new DbField('tb_penelitian3', 'tb_penelitian3', 'x_tahun', 'tahun', '`tahun`', '`tahun`', 200, -1, FALSE, '`tahun`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tahun->Sortable = TRUE; // Allow sort
		$this->fields['tahun'] = &$this->tahun;

		// status
		$this->status = new DbField('tb_penelitian3', 'tb_penelitian3', 'x_status', 'status', '`status`', '`status`', 200, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->fields['status'] = &$this->status;

		// LP
		$this->LP = new DbField('tb_penelitian3', 'tb_penelitian3', 'x_LP', 'LP', '`LP`', '`LP`', 200, -1, FALSE, '`LP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LP->Sortable = TRUE; // Allow sort
		$this->fields['LP'] = &$this->LP;

		// chr
		$this->chr = new DbField('tb_penelitian3', 'tb_penelitian3', 'x_chr', 'chr', '`chr`', '`chr`', 200, -1, TRUE, '`chr`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'FILE');
		$this->chr->Nullable = FALSE; // NOT NULL field
		$this->chr->Required = TRUE; // Required field
		$this->chr->Sortable = TRUE; // Allow sort
		$this->fields['chr'] = &$this->chr;

		// surat_tugas
		$this->surat_tugas = new DbField('tb_penelitian3', 'tb_penelitian3', 'x_surat_tugas', 'surat_tugas', '`surat_tugas`', '`surat_tugas`', 200, -1, TRUE, '`surat_tugas`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'FILE');
		$this->surat_tugas->Nullable = FALSE; // NOT NULL field
		$this->surat_tugas->Required = TRUE; // Required field
		$this->surat_tugas->Sortable = TRUE; // Allow sort
		$this->fields['surat_tugas'] = &$this->surat_tugas;

		// LK
		$this->LK = new DbField('tb_penelitian3', 'tb_penelitian3', 'x_LK', 'LK', '`LK`', '`LK`', 200, -1, FALSE, '`LK`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LK->Sortable = TRUE; // Allow sort
		$this->fields['LK'] = &$this->LK;

		// output
		$this->output = new DbField('tb_penelitian3', 'tb_penelitian3', 'x_output', 'output', '`output`', '`output`', 200, -1, FALSE, '`output`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->output->Sortable = TRUE; // Allow sort
		$this->fields['output'] = &$this->output;

		// sk
		$this->sk = new DbField('tb_penelitian3', 'tb_penelitian3', 'x_sk', 'sk', '`sk`', '`sk`', 200, -1, FALSE, '`sk`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sk->Sortable = TRUE; // Allow sort
		$this->fields['sk'] = &$this->sk;

		// NIDN
		$this->NIDN = new DbField('tb_penelitian3', 'tb_penelitian3', 'x_NIDN', 'NIDN', '`NIDN`', '`NIDN`', 200, -1, FALSE, '`NIDN`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NIDN->Sortable = TRUE; // Allow sort
		$this->fields['NIDN'] = &$this->NIDN;
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

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`tb_penelitian`";
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
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = USER_ID_ALLOW;
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

			// Get insert id if necessary
			$this->id_penelitian->setDbValue($conn->insert_ID());
			$rs['id_penelitian'] = $this->id_penelitian->DbValue;
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
			if (array_key_exists('id_penelitian', $rs))
				AddFilter($where, QuotedName('id_penelitian', $this->Dbid) . '=' . QuotedValue($rs['id_penelitian'], $this->id_penelitian->DataType, $this->Dbid));
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
		$this->id_penelitian->DbValue = $row['id_penelitian'];
		$this->anggota1->DbValue = $row['anggota1'];
		$this->anggota2->DbValue = $row['anggota2'];
		$this->id_jurusan->DbValue = $row['id_jurusan'];
		$this->judul->DbValue = $row['judul'];
		$this->biaya->DbValue = $row['biaya'];
		$this->tahun->DbValue = $row['tahun'];
		$this->status->DbValue = $row['status'];
		$this->LP->DbValue = $row['LP'];
		$this->chr->Upload->DbValue = $row['chr'];
		$this->surat_tugas->Upload->DbValue = $row['surat_tugas'];
		$this->LK->DbValue = $row['LK'];
		$this->output->DbValue = $row['output'];
		$this->sk->DbValue = $row['sk'];
		$this->NIDN->DbValue = $row['NIDN'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
		$oldFiles = EmptyValue($row['chr']) ? [] : [$row['chr']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->chr->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->chr->oldPhysicalUploadPath() . $oldFile);
		}
		$oldFiles = EmptyValue($row['surat_tugas']) ? [] : [$row['surat_tugas']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->surat_tugas->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->surat_tugas->oldPhysicalUploadPath() . $oldFile);
		}
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id_penelitian` = @id_penelitian@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('id_penelitian', $row) ? $row['id_penelitian'] : NULL) : $this->id_penelitian->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id_penelitian@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "tb_penelitian3list.php";
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
		if ($pageName == "tb_penelitian3view.php")
			return $Language->phrase("View");
		elseif ($pageName == "tb_penelitian3edit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "tb_penelitian3add.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "tb_penelitian3list.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("tb_penelitian3view.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("tb_penelitian3view.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "tb_penelitian3add.php?" . $this->getUrlParm($parm);
		else
			$url = "tb_penelitian3add.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("tb_penelitian3edit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("tb_penelitian3add.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("tb_penelitian3delete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id_penelitian:" . JsonEncode($this->id_penelitian->CurrentValue, "number");
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
		if ($this->id_penelitian->CurrentValue != NULL) {
			$url .= "id_penelitian=" . urlencode($this->id_penelitian->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		return "";
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
		} else {
			if (Param("id_penelitian") !== NULL)
				$arKeys[] = Param("id_penelitian");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
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
			$this->id_penelitian->CurrentValue = $key;
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
		$this->id_penelitian->setDbValue($rs->fields('id_penelitian'));
		$this->anggota1->setDbValue($rs->fields('anggota1'));
		$this->anggota2->setDbValue($rs->fields('anggota2'));
		$this->id_jurusan->setDbValue($rs->fields('id_jurusan'));
		$this->judul->setDbValue($rs->fields('judul'));
		$this->biaya->setDbValue($rs->fields('biaya'));
		$this->tahun->setDbValue($rs->fields('tahun'));
		$this->status->setDbValue($rs->fields('status'));
		$this->LP->setDbValue($rs->fields('LP'));
		$this->chr->Upload->DbValue = $rs->fields('chr');
		$this->surat_tugas->Upload->DbValue = $rs->fields('surat_tugas');
		$this->LK->setDbValue($rs->fields('LK'));
		$this->output->setDbValue($rs->fields('output'));
		$this->sk->setDbValue($rs->fields('sk'));
		$this->NIDN->setDbValue($rs->fields('NIDN'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id_penelitian
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
		// NIDN
		// id_penelitian

		$this->id_penelitian->ViewValue = $this->id_penelitian->CurrentValue;
		$this->id_penelitian->ViewCustomAttributes = "";

		// anggota1
		$this->anggota1->ViewValue = $this->anggota1->CurrentValue;
		$curVal = strval($this->anggota1->CurrentValue);
		if ($curVal <> "") {
			$this->anggota1->ViewValue = $this->anggota1->lookupCacheOption($curVal);
			if ($this->anggota1->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NIDN`" . SearchString("=", $curVal, DATATYPE_STRING, "");
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
				$filterWrk = "`NIDN`" . SearchString("=", $curVal, DATATYPE_STRING, "");
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
		$this->id_jurusan->ViewValue = $this->id_jurusan->CurrentValue;
		$curVal = strval($this->id_jurusan->CurrentValue);
		if ($curVal <> "") {
			$this->id_jurusan->ViewValue = $this->id_jurusan->lookupCacheOption($curVal);
			if ($this->id_jurusan->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id_jurusan`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->id_jurusan->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->id_jurusan->ViewValue = $this->id_jurusan->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->id_jurusan->ViewValue = $this->id_jurusan->CurrentValue;
				}
			}
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
		$this->status->ViewValue = $this->status->CurrentValue;
		$this->status->ViewCustomAttributes = "";

		// LP
		$this->LP->ViewValue = $this->LP->CurrentValue;
		$this->LP->ViewCustomAttributes = "";

		// chr
		if (!EmptyValue($this->chr->Upload->DbValue)) {
			$this->chr->ViewValue = $this->chr->Upload->DbValue;
		} else {
			$this->chr->ViewValue = "";
		}
		$this->chr->ViewCustomAttributes = "";

		// surat_tugas
		if (!EmptyValue($this->surat_tugas->Upload->DbValue)) {
			$this->surat_tugas->ViewValue = $this->surat_tugas->Upload->DbValue;
		} else {
			$this->surat_tugas->ViewValue = "";
		}
		$this->surat_tugas->ViewCustomAttributes = "";

		// LK
		$this->LK->ViewValue = $this->LK->CurrentValue;
		$this->LK->ViewCustomAttributes = "";

		// output
		$this->output->ViewValue = $this->output->CurrentValue;
		$this->output->ViewCustomAttributes = "";

		// sk
		$this->sk->ViewValue = $this->sk->CurrentValue;
		$this->sk->ViewCustomAttributes = "";

		// NIDN
		$this->NIDN->ViewValue = $this->NIDN->CurrentValue;
		$this->NIDN->ViewCustomAttributes = "";

		// id_penelitian
		$this->id_penelitian->LinkCustomAttributes = "";
		$this->id_penelitian->HrefValue = "";
		$this->id_penelitian->TooltipValue = "";

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

		// status
		$this->status->LinkCustomAttributes = "";
		$this->status->HrefValue = "";
		$this->status->TooltipValue = "";

		// LP
		$this->LP->LinkCustomAttributes = "";
		$this->LP->HrefValue = "";
		$this->LP->TooltipValue = "";

		// chr
		$this->chr->LinkCustomAttributes = "";
		if (!EmptyValue($this->chr->Upload->DbValue)) {
			$this->chr->HrefValue = GetFileUploadUrl($this->chr, $this->chr->Upload->DbValue); // Add prefix/suffix
			$this->chr->LinkAttrs["target"] = ""; // Add target
			if ($this->isExport()) $this->chr->HrefValue = FullUrl($this->chr->HrefValue, "href");
		} else {
			$this->chr->HrefValue = "";
		}
		$this->chr->ExportHrefValue = $this->chr->UploadPath . $this->chr->Upload->DbValue;
		$this->chr->TooltipValue = "";

		// surat_tugas
		$this->surat_tugas->LinkCustomAttributes = "";
		if (!EmptyValue($this->surat_tugas->Upload->DbValue)) {
			$this->surat_tugas->HrefValue = GetFileUploadUrl($this->surat_tugas, $this->surat_tugas->Upload->DbValue); // Add prefix/suffix
			$this->surat_tugas->LinkAttrs["target"] = ""; // Add target
			if ($this->isExport()) $this->surat_tugas->HrefValue = FullUrl($this->surat_tugas->HrefValue, "href");
		} else {
			$this->surat_tugas->HrefValue = "";
		}
		$this->surat_tugas->ExportHrefValue = $this->surat_tugas->UploadPath . $this->surat_tugas->Upload->DbValue;
		$this->surat_tugas->TooltipValue = "";

		// LK
		$this->LK->LinkCustomAttributes = "";
		$this->LK->HrefValue = "";
		$this->LK->TooltipValue = "";

		// output
		$this->output->LinkCustomAttributes = "";
		$this->output->HrefValue = "";
		$this->output->TooltipValue = "";

		// sk
		$this->sk->LinkCustomAttributes = "";
		$this->sk->HrefValue = "";
		$this->sk->TooltipValue = "";

		// NIDN
		$this->NIDN->LinkCustomAttributes = "";
		$this->NIDN->HrefValue = "";
		$this->NIDN->TooltipValue = "";

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

		// id_penelitian
		$this->id_penelitian->EditAttrs["class"] = "form-control";
		$this->id_penelitian->EditCustomAttributes = "";
		$this->id_penelitian->EditValue = $this->id_penelitian->CurrentValue;
		$this->id_penelitian->ViewCustomAttributes = "";

		// anggota1
		$this->anggota1->EditAttrs["class"] = "form-control";
		$this->anggota1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->anggota1->CurrentValue = HtmlDecode($this->anggota1->CurrentValue);
		$this->anggota1->EditValue = $this->anggota1->CurrentValue;
		$this->anggota1->PlaceHolder = RemoveHtml($this->anggota1->caption());

		// anggota2
		$this->anggota2->EditAttrs["class"] = "form-control";
		$this->anggota2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->anggota2->CurrentValue = HtmlDecode($this->anggota2->CurrentValue);
		$this->anggota2->EditValue = $this->anggota2->CurrentValue;
		$this->anggota2->PlaceHolder = RemoveHtml($this->anggota2->caption());

		// id_jurusan
		$this->id_jurusan->EditAttrs["class"] = "form-control";
		$this->id_jurusan->EditCustomAttributes = "";
		$this->id_jurusan->EditValue = $this->id_jurusan->CurrentValue;
		$this->id_jurusan->PlaceHolder = RemoveHtml($this->id_jurusan->caption());

		// judul
		$this->judul->EditAttrs["class"] = "form-control";
		$this->judul->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->judul->CurrentValue = HtmlDecode($this->judul->CurrentValue);
		$this->judul->EditValue = $this->judul->CurrentValue;
		$this->judul->PlaceHolder = RemoveHtml($this->judul->caption());

		// biaya
		$this->biaya->EditAttrs["class"] = "form-control";
		$this->biaya->EditCustomAttributes = "";
		$this->biaya->EditValue = $this->biaya->CurrentValue;
		$this->biaya->PlaceHolder = RemoveHtml($this->biaya->caption());

		// tahun
		$this->tahun->EditAttrs["class"] = "form-control";
		$this->tahun->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->tahun->CurrentValue = HtmlDecode($this->tahun->CurrentValue);
		$this->tahun->EditValue = $this->tahun->CurrentValue;
		$this->tahun->PlaceHolder = RemoveHtml($this->tahun->caption());

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->status->CurrentValue = HtmlDecode($this->status->CurrentValue);
		$this->status->EditValue = $this->status->CurrentValue;
		$this->status->PlaceHolder = RemoveHtml($this->status->caption());

		// LP
		$this->LP->EditAttrs["class"] = "form-control";
		$this->LP->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->LP->CurrentValue = HtmlDecode($this->LP->CurrentValue);
		$this->LP->EditValue = $this->LP->CurrentValue;
		$this->LP->PlaceHolder = RemoveHtml($this->LP->caption());

		// chr
		$this->chr->EditAttrs["class"] = "form-control";
		$this->chr->EditCustomAttributes = "";
		if (!EmptyValue($this->chr->Upload->DbValue)) {
			$this->chr->EditValue = $this->chr->Upload->DbValue;
		} else {
			$this->chr->EditValue = "";
		}
		if (!EmptyValue($this->chr->CurrentValue))
				$this->chr->Upload->FileName = $this->chr->CurrentValue;

		// surat_tugas
		$this->surat_tugas->EditAttrs["class"] = "form-control";
		$this->surat_tugas->EditCustomAttributes = "";
		if (!EmptyValue($this->surat_tugas->Upload->DbValue)) {
			$this->surat_tugas->EditValue = $this->surat_tugas->Upload->DbValue;
		} else {
			$this->surat_tugas->EditValue = "";
		}
		if (!EmptyValue($this->surat_tugas->CurrentValue))
				$this->surat_tugas->Upload->FileName = $this->surat_tugas->CurrentValue;

		// LK
		$this->LK->EditAttrs["class"] = "form-control";
		$this->LK->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->LK->CurrentValue = HtmlDecode($this->LK->CurrentValue);
		$this->LK->EditValue = $this->LK->CurrentValue;
		$this->LK->PlaceHolder = RemoveHtml($this->LK->caption());

		// output
		$this->output->EditAttrs["class"] = "form-control";
		$this->output->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->output->CurrentValue = HtmlDecode($this->output->CurrentValue);
		$this->output->EditValue = $this->output->CurrentValue;
		$this->output->PlaceHolder = RemoveHtml($this->output->caption());

		// sk
		$this->sk->EditAttrs["class"] = "form-control";
		$this->sk->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->sk->CurrentValue = HtmlDecode($this->sk->CurrentValue);
		$this->sk->EditValue = $this->sk->CurrentValue;
		$this->sk->PlaceHolder = RemoveHtml($this->sk->caption());

		// NIDN
		$this->NIDN->EditAttrs["class"] = "form-control";
		$this->NIDN->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NIDN->CurrentValue = HtmlDecode($this->NIDN->CurrentValue);
		$this->NIDN->EditValue = $this->NIDN->CurrentValue;
		$this->NIDN->PlaceHolder = RemoveHtml($this->NIDN->caption());

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
					$doc->exportCaption($this->anggota1);
					$doc->exportCaption($this->anggota2);
					$doc->exportCaption($this->id_jurusan);
					$doc->exportCaption($this->judul);
					$doc->exportCaption($this->biaya);
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->chr);
					$doc->exportCaption($this->LK);
					$doc->exportCaption($this->output);
					$doc->exportCaption($this->sk);
					$doc->exportCaption($this->NIDN);
				} else {
					$doc->exportCaption($this->id_penelitian);
					$doc->exportCaption($this->anggota1);
					$doc->exportCaption($this->anggota2);
					$doc->exportCaption($this->id_jurusan);
					$doc->exportCaption($this->judul);
					$doc->exportCaption($this->biaya);
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->LP);
					$doc->exportCaption($this->chr);
					$doc->exportCaption($this->surat_tugas);
					$doc->exportCaption($this->LK);
					$doc->exportCaption($this->output);
					$doc->exportCaption($this->sk);
					$doc->exportCaption($this->NIDN);
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
						$doc->exportField($this->anggota1);
						$doc->exportField($this->anggota2);
						$doc->exportField($this->id_jurusan);
						$doc->exportField($this->judul);
						$doc->exportField($this->biaya);
						$doc->exportField($this->tahun);
						$doc->exportField($this->status);
						$doc->exportField($this->chr);
						$doc->exportField($this->LK);
						$doc->exportField($this->output);
						$doc->exportField($this->sk);
						$doc->exportField($this->NIDN);
					} else {
						$doc->exportField($this->id_penelitian);
						$doc->exportField($this->anggota1);
						$doc->exportField($this->anggota2);
						$doc->exportField($this->id_jurusan);
						$doc->exportField($this->judul);
						$doc->exportField($this->biaya);
						$doc->exportField($this->tahun);
						$doc->exportField($this->status);
						$doc->exportField($this->LP);
						$doc->exportField($this->chr);
						$doc->exportField($this->surat_tugas);
						$doc->exportField($this->LK);
						$doc->exportField($this->output);
						$doc->exportField($this->sk);
						$doc->exportField($this->NIDN);
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

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
	{
		global $COMPOSITE_KEY_SEPARATOR;

		// Set up field name / file name field / file type field
		$fldName = "";
		$fileNameFld = "";
		$fileTypeFld = "";
		if ($fldparm == 'chr') {
			$fldName = "chr";
			$fileNameFld = "chr";
		} elseif ($fldparm == 'surat_tugas') {
			$fldName = "surat_tugas";
			$fileNameFld = "surat_tugas";
		} else {
			return FALSE; // Incorrect field
		}

		// Set up key values
		$ar = explode($COMPOSITE_KEY_SEPARATOR, $key);
		if (count($ar) == 1) {
			$this->id_penelitian->CurrentValue = $ar[0];
		} else {
			return FALSE; // Incorrect key
		}

		// Set up filter (WHERE Clause)
		$filter = $this->getRecordFilter();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$dbtype = GetConnectionType($this->Dbid);
		if (($rs = $conn->execute($sql)) && !$rs->EOF) {
			$val = $rs->fields($fldName);
			if (!EmptyValue($val)) {
				$fld = $this->fields[$fldName];

				// Binary data
				if ($fld->DataType == DATATYPE_BLOB) {
					if ($dbtype <> "MYSQL") {
						if (is_array($val) || is_object($val)) // Byte array
							$val = BytesToString($val);
					}
					if ($resize)
						ResizeBinary($val, $width, $height);

					// Write file type
					if ($fileTypeFld <> "" && !EmptyValue($rs->fields($fileTypeFld))) {
						AddHeader("Content-type", $rs->fields($fileTypeFld));
					} else {
						AddHeader("Content-type", ContentType($val));
					}

					// Write file name
					if ($fileNameFld <> "" && !EmptyValue($rs->fields($fileNameFld)))
						AddHeader("Content-Disposition", "attachment; filename=\"" . $rs->fields($fileNameFld) . "\"");

					// Write file data
					if (StartsString("PK", $val) && ContainsString($val, "[Content_Types].xml") &&
						ContainsString($val, "_rels") && ContainsString($val, "docProps")) { // Fix Office 2007 documents
						if (!EndsString("\0\0\0", $val)) // Not ends with 3 or 4 \0
							$val .= "\0\0\0\0";
					}

					// Clear output buffer
					if (ob_get_length())
						ob_end_clean();

					// Write binary data
					Write($val);

				// Upload to folder
				} else {
					if ($fld->UploadMultiple)
						$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
					else
						$files = [$val];
					$data = [];
					$ar = [];
					foreach ($files as $file) {
						if (!EmptyValue($file))
							$ar[$file] = FullUrl($fld->hrefPath() . $file);
					}
					$data[$fld->Param] = $ar;
					WriteJson($data);
				}
			}
			$rs->close();
			return TRUE;
		}
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