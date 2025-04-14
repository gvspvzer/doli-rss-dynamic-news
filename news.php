<?php
require '../../main.inc.php';
require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
require_once DOL_DOCUMENT_ROOT . '/core/lib/company.lib.php';
require_once DOL_DOCUMENT_ROOT . '/core/lib/admin.lib.php';

$langs->load("companies");
$langs->load("mynews@mynews");

$id = GETPOST('id', 'int'); // ID du tiers

if (empty($id)) {
    accessforbidden();
}

$object = new Societe($db);
$object->fetch($id);

$result = restrictedArea($user, 'societe', $object->id, '&societe', '', 'fk_soc', 'rowid', 0);

$title = $langs->trans("NewsFor", $object->name);
llxHeader('', $title, '');

$form = new Form($db);
$head = societe_prepare_head($object);
dol_fiche_head($head, 'news', $langs->trans("ThirdParty"), 0, 'company');

// Affiche l'en-tête du tiers (logo, nom, type, adresse, proprio, etc.)
print dol_banner_tab($object, 'id', '', 0, 'rowid', 'nom');

// Titre de la section des actualités avec bouton retour
$linkback = '<a href="'.DOL_URL_ROOT.'/societe/card.php?id='.$object->id.'">'.$langs->trans("BackToCompany").'</a>';
print load_fiche_titre($title, $linkback, 'title_news');

print '<div class="fichecenter">';

// Récupération et affichage du flux RSS
$query = urlencode($object->name);
$rss_url = "https://news.google.com/rss/search?q=$query&hl=fr&gl=FR&ceid=FR:fr";

$feed = @simplexml_load_file($rss_url);

if ($feed === false) {
    print '<div class="error">Impossible de charger les actualités.</div>';
} else {
    include dol_buildpath('/mynews/tpl/news.tpl.php', 0);
}

print '</div>';

dol_fiche_end();
llxFooter();
$db->close();
