<?php
session_start();
require_once __DIR__ . '/../config.php';

if (empty($_SESSION['admin_logged_in'])) {
    die('Yetkisiz erişim');
}

$rsvps = getRSVPs();

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="busra_emir_rsvp_listesi_' . date('Y_m_d') . '.csv"');

$output = fopen('php://output', 'w');

// Excel UTF-8 BOM yazma
fputs($output, "\xEF\xBB\xBF");

// Başlıklar
fputcsv($output, ['Koltuk No', 'Gate', 'Ad Soyad', 'Katılım Durumu', 'Kişi Sayısı', 'Etkinlik', 'Not', 'Kayıt Tarihi'], ';');

foreach ($rsvps as $r) {
    $attendanceStr = ($r['attendance'] === 'yes') ? 'GELİYOR' : 'GELEMİYOR';
    $eventStr = 'Kına ve Düğün';
    if (($r['event'] ?? 'both') === 'kina') $eventStr = 'Sadece Kına Gecesi';
    elseif (($r['event'] ?? 'both') === 'dugun') $eventStr = 'Sadece Düğün Töreni';

    fputcsv($output, [
        $r['seat'] ?? '-',
        $r['gate'] ?? 'LOV27',
        $r['name'] ?? '',
        $attendanceStr,
        $r['guests'] ?? 1,
        $eventStr,
        $r['note'] ?? '',
        $r['created_at'] ?? ''
    ], ';');
}

fclose($output);
exit;
