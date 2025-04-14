<?php
if (empty($feed)) {
    print '<div class="warning">Aucune actualité trouvée.</div>';
} else {
    $items = [];

    // Lire les items dans un tableau temporaire
    foreach ($feed->channel->item as $item) {
        $timestamp = strtotime((string)$item->pubDate);
        if (!$timestamp) continue;

        $items[] = [
            'title' => (string)$item->title,
            'link' => (string)$item->link,
            'timestamp' => $timestamp
        ];
    }

    // Trier du plus récent au plus ancien
    usort($items, function ($a, $b) {
        return $b['timestamp'] <=> $a['timestamp'];
    });

    // Affichage style Dolibarr
    print '<div class="div-table-responsive">';
    print '<table class="noborder centpercent">';
    print '<tr class="liste_titre">';
    print '<td>Titre</td>';
    print '<td>Date</td>';
    print '</tr>';

    $odd = true;
    foreach ($items as $item) {
        $rowclass = $odd ? 'oddeven' : 'oddeven2';
        $odd = !$odd;

        $title = htmlspecialchars($item['title']);
        $link = htmlspecialchars($item['link']);
        $date = date('d/m/Y H:i', $item['timestamp']);

        print '<tr class="'.$rowclass.'">';
        print '<td><a href="'.$link.'" target="_blank">'.$title.'</a></td>';
        print '<td>'.$date.'</td>';
        print '</tr>';
    }

    print '</table>';
    print '</div>';
}
