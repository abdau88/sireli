<?php
namespace PHPMaker2019\project2;

// Menu Language
if ($Language && $Language->LanguageFolder == $LANGUAGE_FOLDER)
	$MenuLanguage = &$Language;
else
	$MenuLanguage = new Language();

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(1, "mi_tb_dosen", $MenuLanguage->MenuPhrase("1", "MenuText"), "tb_dosenlist.php", -1, "", AllowListMenu('{6F3C73F1-7D22-4D79-93D1-87C709939CCD}tb_dosen'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(2, "mi_tb_jurusan", $MenuLanguage->MenuPhrase("2", "MenuText"), "tb_jurusanlist.php", -1, "", AllowListMenu('{6F3C73F1-7D22-4D79-93D1-87C709939CCD}tb_jurusan'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(8, "mci_Penelitian", $MenuLanguage->MenuPhrase("8", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", FALSE);
$sideMenu->addMenuItem(3, "mi_tb_penelitian", $MenuLanguage->MenuPhrase("3", "MenuText"), "tb_penelitianlist.php", 8, "", AllowListMenu('{6F3C73F1-7D22-4D79-93D1-87C709939CCD}tb_penelitian'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(15, "mi_tb_penelitian2", $MenuLanguage->MenuPhrase("15", "MenuText"), "tb_penelitian2list.php", 8, "", AllowListMenu('{6F3C73F1-7D22-4D79-93D1-87C709939CCD}tb_penelitian2'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(14, "mci_Pengabdian", $MenuLanguage->MenuPhrase("14", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", FALSE);
$sideMenu->addMenuItem(7, "mi_tb_pengabdian", $MenuLanguage->MenuPhrase("7", "MenuText"), "tb_pengabdianlist.php", 14, "", AllowListMenu('{6F3C73F1-7D22-4D79-93D1-87C709939CCD}tb_pengabdian'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(16, "mi_tb_pengabdian2", $MenuLanguage->MenuPhrase("16", "MenuText"), "tb_pengabdian2list.php", 14, "", AllowListMenu('{6F3C73F1-7D22-4D79-93D1-87C709939CCD}tb_pengabdian2'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(21, "mi_tb_panduan", $MenuLanguage->MenuPhrase("21", "MenuText"), "tb_panduanlist.php", -1, "", AllowListMenu('{6F3C73F1-7D22-4D79-93D1-87C709939CCD}tb_panduan'), FALSE, FALSE, "", "", FALSE);
echo $sideMenu->toScript();
?>