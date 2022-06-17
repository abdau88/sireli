<?php
namespace PHPMaker2019\project2;

/**
 * Table class for tb_pengabdian2
 */
class tb_pengabdian2 extends DbTable
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
	public $id_pengabdian;
	public $NIDN;
	public $anggota1;
	public $anggota2;
	public $anggota3;
	public $anggota4;
	public $judul;
	public $biaya;
	public $tahun;
	public $status;
	public $LP2;
	public $LK;
	public $output;
	public $chr;
	public $surat_tugas;
	public $sk;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'tb_pengabdian2';
		$this->TableName = 'tb_pengabdian2';
		$this->TableType = 'LINKTABLE';

		// Update Table
		$this->UpdateTable = "`tb_pengabdian`";
		$this->Dbid = 'sireli1';
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

		// id_pengabdian
		$this->id_pengabdian = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_id_pengabdian', 'id_pengabdian', '`id_pengabdian`', '`id_pengabdian`', 3, -1, FALSE, '`id_pengabdian`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id_pengabdian->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id_pengabdian->IsPrimaryKey = TRUE; // Primary key field
		$this->id_pengabdian->Sortable = TRUE; // Allow sort
		$this->id_pengabdian->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id_pengabdian'] = &$this->id_pengabdian;

		// NIDN
		$this->NIDN = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_NIDN', 'NIDN', '`NIDN`', '`NIDN`', 200, -1, FALSE, '`NIDN`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NIDN->Sortable = TRUE; // Allow sort
		$this->NIDN->Lookup = new Lookup('NIDN', 'tb_dosen', FALSE, 'NIDN', ["Nama_Dosen","","",""], [], [], [], [], [], [], '', '');
		$this->fields['NIDN'] = &$this->NIDN;

		// anggota1
		$this->anggota1 = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_anggota1', 'anggota1', '`anggota1`', '`anggota1`', 200, -1, FALSE, '`anggota1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->anggota1->Sortable = TRUE; // Allow sort
		$this->fields['anggota1'] = &$this->anggota1;

		// anggota2
		$this->anggota2 = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_anggota2', 'anggota2', '`anggota2`', '`anggota2`', 200, -1, FALSE, '`anggota2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->anggota2->Sortable = TRUE; // Allow sort
		$this->fields['anggota2'] = &$this->anggota2;

		// anggota3
		$this->anggota3 = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_anggota3', 'anggota3', '`anggota3`', '`anggota3`', 200, -1, FALSE, '`anggota3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->anggota3->Sortable = TRUE; // Allow sort
		$this->fields['anggota3'] = &$this->anggota3;

		// anggota4
		$this->anggota4 = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_anggota4', 'anggota4', '`anggota4`', '`anggota4`', 200, -1, FALSE, '`anggota4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->anggota4->Sortable = TRUE; // Allow sort
		$this->fields['anggota4'] = &$this->anggota4;

		// judul
		$this->judul = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_judul', 'judul', '`judul`', '`judul`', 200, -1, FALSE, '`judul`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->judul->Sortable = TRUE; // Allow sort
		$this->fields['judul'] = &$this->judul;

		// biaya
		$this->biaya = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_biaya', 'biaya', '`biaya`', '`biaya`', 3, -1, FALSE, '`biaya`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->biaya->Sortable = TRUE; // Allow sort
		$this->biaya->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['biaya'] = &$this->biaya;

		// tahun
		$this->tahun = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_tahun', 'tahun', '`tahun`', '`tahun`', 200, -1, FALSE, '`tahun`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tahun->Sortable = TRUE; // Allow sort
		$this->fields['tahun'] = &$this->tahun;

		// status
		$this->status = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_status', 'status', '`status`', '`status`', 200, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->status->Lookup = new Lookup('status', 'tb_pengabdian2', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->status->OptionCount = 2;
		$this->fields['status'] = &$this->status;

		// LP2
		$this->LP2 = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_LP2', 'LP2', '`LP2`', '`LP2`', 200, -1, TRUE, '`LP2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'FILE');
		$this->LP2->Sortable = TRUE; // Allow sort
		$this->fields['LP2'] = &$this->LP2;

		// LK
		$this->LK = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_LK', 'LK', '`LK`', '`LK`', 200, -1, TRUE, '`LK`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'FILE');
		$this->LK->Sortable = TRUE; // Allow sort
		$this->fields['LK'] = &$this->LK;

		// output
		$this->output = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_output', 'output', '`output`', '`output`', 200, -1, TRUE, '`output`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'FILE');
		$this->output->Sortable = TRUE; // Allow sort
		$this->fields['output'] = &$this->output;

		// chr
		$this->chr = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_chr', 'chr', '`chr`', '`chr`', 200, -1, TRUE, '`chr`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'FILE');
		$this->chr->Sortable = TRUE; // Allow sort
		$this->fields['chr'] = &$this->chr;

		// surat_tugas
		$this->surat_tugas = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_surat_tugas', 'surat_tugas', '`surat_tugas`', '`surat_tugas`', 200, -1, TRUE, '`surat_tugas`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'FILE');
		$this->surat_tugas->Sortable = TRUE; // Allow sort
		$this->fields['surat_tugas'] = &$this->surat_tugas;

		// sk
		$this->sk = new DbField('tb_pengabdian2', 'tb_pengabdian2', 'x_sk', 'sk', '`sk`', '`sk`', 200, -1, TRUE, '`sk`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'FILE');
		$this->sk->Sortable = TRUE; // Allow sort
		$this->fields['sk'] = &$this->sk;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`tb_pengabdian`";
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
			$this->id_pengabdian->setDbValue($conn->insert_ID());
			$rs['id_pengabdian'] = $this->id_pengabdian->DbValue;
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
			if (array_key_exists('id_pengabdian', $rs))
				AddFilter($where, QuotedName('id_pengabdian', $this->Dbid) . '=' . QuotedValue($rs['id_pengabdian'], $this->id_pengabdian->DataType, $this->Dbid));
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
		$this->id_pengabdian->DbValue = $row['id_pengabdian'];
		$this->NIDN->DbValue = $row['NIDN'];
		$this->anggota1->DbValue = $row['anggota1'];
		$this->anggota2->DbValue = $row['anggota2'];
		$this->anggota3->DbValue = $row['anggota3'];
		$this->anggota4->DbValue = $row['anggota4'];
		$this->judul->DbValue = $row['judul'];
		$this->biaya->DbValue = $row['biaya'];
		$this->tahun->DbValue = $row['tahun'];
		$this->status->DbValue = $row['status'];
		$this->LP2->Upload->DbValue = $row['LP2'];
		$this->LK->Upload->DbValue = $row['LK'];
		$this->output->Upload->DbValue = $row['output'];
		$this->chr->Upload->DbValue = $row['chr'];
		$this->surat_tugas->Upload->DbValue = $row['surat_tugas'];
		$this->sk->Upload->DbValue = $row['sk'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
		$oldFiles = EmptyValue($row['LP2']) ? [] : [$row['LP2']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->LP2->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->LP2->oldPhysicalUploadPath() . $oldFile);
		}
		$oldFiles = EmptyValue($row['LK']) ? [] : [$row['LK']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->LK->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->LK->oldPhysicalUploadPath() . $oldFile);
		}
		$oldFiles = EmptyValue($row['output']) ? [] : [$row['output']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->output->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->output->oldPhysicalUploadPath() . $oldFile);
		}
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
		$oldFiles = EmptyValue($row['sk']) ? [] : [$row['sk']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->sk->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->sk->oldPhysicalUploadPath() . $oldFile);
		}
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id_pengabdian` = @id_pengabdian@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('id_pengabdian', $row) ? $row['id_pengabdian'] : NULL) : $this->id_pengabdian->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id_pengabdian@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "tb_pengabdian2list.php";
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
		if ($pageName == "tb_pengabdian2view.php")
			return $Language->phrase("View");
		elseif ($pageName == "tb_pengabdian2edit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "tb_pengabdian2add.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "tb_pengabdian2list.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("tb_pengabdian2view.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("tb_pengabdian2view.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "tb_pengabdian2add.php?" . $this->getUrlParm($parm);
		else
			$url = "tb_pengabdian2add.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("tb_pengabdian2edit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("tb_pengabdian2add.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("tb_pengabdian2delete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id_pengabdian:" . JsonEncode($this->id_pengabdian->CurrentValue, "number");
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
		if ($this->id_pengabdian->CurrentValue != NULL) {
			$url .= "id_pengabdian=" . urlencode($this->id_pengabdian->CurrentValue);
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
		} else {
			if (Param("id_pengabdian") !== NULL)
				$arKeys[] = Param("id_pengabdian");
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
			$this->id_pengabdian->CurrentValue = $key;
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
		$this->id_pengabdian->setDbValue($rs->fields('id_pengabdian'));
		$this->NIDN->setDbValue($rs->fields('NIDN'));
		$this->anggota1->setDbValue($rs->fields('anggota1'));
		$this->anggota2->setDbValue($rs->fields('anggota2'));
		$this->anggota3->setDbValue($rs->fields('anggota3'));
		$this->anggota4->setDbValue($rs->fields('anggota4'));
		$this->judul->setDbValue($rs->fields('judul'));
		$this->biaya->setDbValue($rs->fields('biaya'));
		$this->tahun->setDbValue($rs->fields('tahun'));
		$this->status->setDbValue($rs->fields('status'));
		$this->LP2->Upload->DbValue = $rs->fields('LP2');
		$this->LK->Upload->DbValue = $rs->fields('LK');
		$this->output->Upload->DbValue = $rs->fields('output');
		$this->chr->Upload->DbValue = $rs->fields('chr');
		$this->surat_tugas->Upload->DbValue = $rs->fields('surat_tugas');
		$this->sk->Upload->DbValue = $rs->fields('sk');
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
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
		$this->anggota1->ViewCustomAttributes = "";

		// anggota2
		$this->anggota2->ViewValue = $this->anggota2->CurrentValue;
		$this->anggota2->ViewCustomAttributes = "";

		// anggota3
		$this->anggota3->ViewValue = $this->anggota3->CurrentValue;
		$this->anggota3->ViewCustomAttributes = "";

		// anggota4
		$this->anggota4->ViewValue = $this->anggota4->CurrentValue;
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

		// sk
		if (!EmptyValue($this->sk->Upload->DbValue)) {
			$this->sk->ViewValue = $this->sk->Upload->DbValue;
		} else {
			$this->sk->ViewValue = "";
		}
		$this->sk->ViewCustomAttributes = "";

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

		// status
		$this->status->LinkCustomAttributes = "";
		$this->status->HrefValue = "";
		$this->status->TooltipValue = "";

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

		// chr
		$this->chr->LinkCustomAttributes = "";
		$this->chr->HrefValue = "";
		$this->chr->ExportHrefValue = $this->chr->UploadPath . $this->chr->Upload->DbValue;
		$this->chr->TooltipValue = "";

		// surat_tugas
		$this->surat_tugas->LinkCustomAttributes = "";
		$this->surat_tugas->HrefValue = "";
		$this->surat_tugas->ExportHrefValue = $this->surat_tugas->UploadPath . $this->surat_tugas->Upload->DbValue;
		$this->surat_tugas->TooltipValue = "";

		// sk
		$this->sk->LinkCustomAttributes = "";
		$this->sk->HrefValue = "";
		$this->sk->ExportHrefValue = $this->sk->UploadPath . $this->sk->Upload->DbValue;
		$this->sk->TooltipValue = "";

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

		// id_pengabdian
		$this->id_pengabdian->EditAttrs["class"] = "form-control";
		$this->id_pengabdian->EditCustomAttributes = "";
		$this->id_pengabdian->EditValue = $this->id_pengabdian->CurrentValue;
		$this->id_pengabdian->ViewCustomAttributes = "";

		// NIDN
		$this->NIDN->EditAttrs["class"] = "form-control";
		$this->NIDN->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NIDN->CurrentValue = HtmlDecode($this->NIDN->CurrentValue);
		$this->NIDN->EditValue = $this->NIDN->CurrentValue;
		$this->NIDN->PlaceHolder = RemoveHtml($this->NIDN->caption());

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

		// anggota3
		$this->anggota3->EditAttrs["class"] = "form-control";
		$this->anggota3->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->anggota3->CurrentValue = HtmlDecode($this->anggota3->CurrentValue);
		$this->anggota3->EditValue = $this->anggota3->CurrentValue;
		$this->anggota3->PlaceHolder = RemoveHtml($this->anggota3->caption());

		// anggota4
		$this->anggota4->EditAttrs["class"] = "form-control";
		$this->anggota4->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->anggota4->CurrentValue = HtmlDecode($this->anggota4->CurrentValue);
		$this->anggota4->EditValue = $this->anggota4->CurrentValue;
		$this->anggota4->PlaceHolder = RemoveHtml($this->anggota4->caption());

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
		$this->status->EditValue = $this->status->options(TRUE);

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

		// sk
		$this->sk->EditAttrs["class"] = "form-control";
		$this->sk->EditCustomAttributes = "";
		if (!EmptyValue($this->sk->Upload->DbValue)) {
			$this->sk->EditValue = $this->sk->Upload->DbValue;
		} else {
			$this->sk->EditValue = "";
		}
		if (!EmptyValue($this->sk->CurrentValue))
				$this->sk->Upload->FileName = $this->sk->CurrentValue;

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
					$doc->exportCaption($this->anggota1);
					$doc->exportCaption($this->anggota2);
					$doc->exportCaption($this->anggota3);
					$doc->exportCaption($this->anggota4);
					$doc->exportCaption($this->judul);
					$doc->exportCaption($this->biaya);
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->LP2);
					$doc->exportCaption($this->LK);
					$doc->exportCaption($this->output);
					$doc->exportCaption($this->chr);
					$doc->exportCaption($this->surat_tugas);
					$doc->exportCaption($this->sk);
				} else {
					$doc->exportCaption($this->id_pengabdian);
					$doc->exportCaption($this->NIDN);
					$doc->exportCaption($this->anggota1);
					$doc->exportCaption($this->anggota2);
					$doc->exportCaption($this->anggota3);
					$doc->exportCaption($this->anggota4);
					$doc->exportCaption($this->judul);
					$doc->exportCaption($this->biaya);
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->LP2);
					$doc->exportCaption($this->LK);
					$doc->exportCaption($this->output);
					$doc->exportCaption($this->chr);
					$doc->exportCaption($this->surat_tugas);
					$doc->exportCaption($this->sk);
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
						$doc->exportField($this->anggota1);
						$doc->exportField($this->anggota2);
						$doc->exportField($this->anggota3);
						$doc->exportField($this->anggota4);
						$doc->exportField($this->judul);
						$doc->exportField($this->biaya);
						$doc->exportField($this->tahun);
						$doc->exportField($this->status);
						$doc->exportField($this->LP2);
						$doc->exportField($this->LK);
						$doc->exportField($this->output);
						$doc->exportField($this->chr);
						$doc->exportField($this->surat_tugas);
						$doc->exportField($this->sk);
					} else {
						$doc->exportField($this->id_pengabdian);
						$doc->exportField($this->NIDN);
						$doc->exportField($this->anggota1);
						$doc->exportField($this->anggota2);
						$doc->exportField($this->anggota3);
						$doc->exportField($this->anggota4);
						$doc->exportField($this->judul);
						$doc->exportField($this->biaya);
						$doc->exportField($this->tahun);
						$doc->exportField($this->status);
						$doc->exportField($this->LP2);
						$doc->exportField($this->LK);
						$doc->exportField($this->output);
						$doc->exportField($this->chr);
						$doc->exportField($this->surat_tugas);
						$doc->exportField($this->sk);
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

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
	{
		global $COMPOSITE_KEY_SEPARATOR;

		// Set up field name / file name field / file type field
		$fldName = "";
		$fileNameFld = "";
		$fileTypeFld = "";
		if ($fldparm == 'LP2') {
			$fldName = "LP2";
			$fileNameFld = "LP2";
		} elseif ($fldparm == 'LK') {
			$fldName = "LK";
			$fileNameFld = "LK";
		} elseif ($fldparm == 'output') {
			$fldName = "output";
			$fileNameFld = "output";
		} elseif ($fldparm == 'chr') {
			$fldName = "chr";
			$fileNameFld = "chr";
		} elseif ($fldparm == 'surat_tugas') {
			$fldName = "surat_tugas";
			$fileNameFld = "surat_tugas";
		} elseif ($fldparm == 'sk') {
			$fldName = "sk";
			$fileNameFld = "sk";
		} else {
			return FALSE; // Incorrect field
		}

		// Set up key values
		$ar = explode($COMPOSITE_KEY_SEPARATOR, $key);
		if (count($ar) == 1) {
			$this->id_pengabdian->CurrentValue = $ar[0];
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