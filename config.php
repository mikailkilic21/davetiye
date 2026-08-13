<?php
// Config for Aşk Pasaportu Web Application

define('SITE_TITLE', 'Büşra & Emir — Aşk Pasaportu Düğün Davetiyesi');
define('ADMIN_PASSWORD', 'busraemir2026'); // Admin paneli şifresi

// SQLite veya JSON Veri Depolama Yapılandırması
define('DATA_DIR', __DIR__ . '/data');
define('RSVP_FILE', DATA_DIR . '/rsvps.json');
define('SETTINGS_FILE', DATA_DIR . '/settings.json');

// Klasörleri Kontrol Et ve Oluştur
if (!file_exists(DATA_DIR)) {
    @mkdir(DATA_DIR, 0777, true);
}

// Varsayılan Ayarlar
function getDefaultSettings() {
    return [
        'couple_names' => 'Büşra & Emir',
        'bride_family' => 'Pınar & Şeyhmus AVA',
        'groom_family' => 'Sibel & Mikail KILIÇ',
        'kina_date' => '2026-08-26',
        'kina_time' => '20:00',
        'dugun_date' => '2026-08-27',
        'dugun_time' => '19:00',
        'venue_name' => 'Çırağan Kına/Düğün Salonu',
        'address' => 'Bağcılar, Evrim Alataş Caddesi No:4, 21090 Bağlar/Diyarbakır',
        'maps_url' => 'https://maps.google.com/?q=Ba%C4%9Fc%C4%B1lar,+Evrim+Alata%C5%9F+Caddesi+No:4,+21090+Ba%C4%9Flar/Diyarbak%C4%B1r',
        'hero_video' => 'intro.mp4',
        'custom_texts' => [
            'tr' => [
                'welcome' => 'Aşk Yolculuğuna Hoş Geldiniz',
                'welcome_sub' => 'Pasaportunuzu açın ve bizimle bu özel yolculuğa çıkın.',
                'story' => 'Almanya\'nın Augsburg şehrinden memleketimiz Diyarbakır\'a uzanan bu özel yolculuğumuzda, sizi de aramızda görmekten mutluluk duyacağız.',
                'footer' => 'Aşkımızın Yolculuğuna Sizi de Bekliyoruz.'
            ],
            'ku' => [
                'welcome' => 'Bi xêr hatin bo rêwîtiya evînê',
                'welcome_sub' => 'Pasaporta xwe vekin û bi me re derkevin vê rêwîtiya taybet.',
                'story' => 'Em ji riyên cüda derbas bûn. Di heman demê de, li heman cihî hatin cem hev. Niha em bi hev re derdikevin rêwîtiya herî bedew.',
                'footer' => 'Em li bendê ne ku hûn tevlî rêwîtiya evîna me bibin.'
            ],
            'de' => [
                'welcome' => 'Willkommen zu unserer Liebesreise',
                'welcome_sub' => 'Öffnen Sie Ihren Reisepass und begleiten Sie uns auf dieser besonderen Reise.',
                'story' => 'Wir kamen aus verschiedenen Wegen. Wir haben uns am selben Ort getroffen. Nun beginnen wir gemeinsam die schönste Reise.',
                'footer' => 'Wir freuen uns darauf, Sie auf unserer Liebesreise zu begrüßen.'
            ]
        ]
    ];
}

function getSettings() {
    if (file_exists(SETTINGS_FILE)) {
        $content = file_get_contents(SETTINGS_FILE);
        $data = json_decode($content, true);
        if ($data) {
            return array_merge(getDefaultSettings(), $data);
        }
    }
    return getDefaultSettings();
}

function saveSettings($settings) {
    return file_put_contents(SETTINGS_FILE, json_encode($settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function getRSVPs() {
    if (file_exists(RSVP_FILE)) {
        $content = file_get_contents(RSVP_FILE);
        $data = json_decode($content, true);
        return is_array($data) ? $data : [];
    }
    return [];
}

function saveRSVP($rsvpData) {
    $rsvps = getRSVPs();
    $rsvpData['id'] = uniqid('rsvp_');
    $rsvpData['created_at'] = date('Y-m-d H:i:s');
    // Koltuk No Atama (Örn: 01A, 02B, 03C vs.)
    $seatIndex = count($rsvps) + 1;
    $seatRow = ceil($seatIndex / 6);
    $seatLetter = chr(65 + ($seatIndex % 6));
    $rsvpData['seat'] = sprintf('%02d%s', $seatRow, $seatLetter);
    $rsvpData['gate'] = 'LOV27';
    
    array_unshift($rsvps, $rsvpData);
    file_put_contents(RSVP_FILE, json_encode($rsvps, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    return $rsvpData;
}

function deleteRSVP($id) {
    $rsvps = getRSVPs();
    $rsvps = array_filter($rsvps, function($r) use ($id) { return isset($r['id']) && $r['id'] !== $id; });
    file_put_contents(RSVP_FILE, json_encode(array_values($rsvps), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function updateRSVP($id, $newData) {
    $rsvps = getRSVPs();
    foreach ($rsvps as &$r) {
        if (isset($r['id']) && $r['id'] === $id) {
            $r['name'] = $newData['name'] ?? $r['name'];
            $r['attendance'] = $newData['attendance'] ?? $r['attendance'];
            $r['guests'] = $newData['guests'] ?? $r['guests'];
            $r['event'] = $newData['event'] ?? $r['event'];
            $r['note'] = $newData['note'] ?? $r['note'];
            break;
        }
    }
    file_put_contents(RSVP_FILE, json_encode($rsvps, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
