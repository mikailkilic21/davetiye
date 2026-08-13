<?php
session_start();
if (empty($_SESSION['admin_logged_in'])) {
    die('Yetkisiz erişim');
}

require_once __DIR__ . '/../config.php';

$id = $_GET['id'] ?? '';
$rsvps = getRSVPs();
$participant = null;
foreach ($rsvps as $r) {
    if ($r['id'] === $id) {
        $participant = $r;
        break;
    }
}

if (!$participant) {
    die('Kayıt bulunamadı.');
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilet Görünümü</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700;800;900&family=Great+Vibes&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css?v=7">
    <style>
        body {
            background: transparent;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        /* Override modal behavior to just show the ticket static */
        .tear-container {
            position: relative;
            z-index: 1;
            transform: none !important;
            animation: none !important;
        }
        .tear-pass {
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
    </style>
</head>
<body>
    <div class="tear-container" style="display:block;">
        <div class="tear-pass">
            <div class="pass-main tear-pass-main">
                <div class="tear-pass-header">
                    <span class="tear-pass-title">BOARDING PASS</span>
                    <span class="tear-pass-class">FIRST CLASS</span>
                </div>
                
                <div class="tear-passenger-name">
                    <?= htmlspecialchars($participant['name']) ?>
                </div>
                
                <div class="tear-route">
                    FROM: <strong>LOVE</strong> → TO: <strong>FOREVER</strong>
                </div>

                <div class="tear-info-row">
                    <div>GATE: <strong><?= htmlspecialchars($participant['gate'] ?? 'LOV27') ?></strong></div>
                    <div>SEAT: <strong><?= htmlspecialchars($participant['seat'] ?? '-') ?></strong></div>
                    <div>PAX: <strong><?= htmlspecialchars($participant['guests']) ?> PAX</strong></div>
                </div>
            </div>

            <div class="perforated-divider"></div>

            <div class="pass-stub tear-stub-interactive" title="Hatıra Bileti">
                <div class="stub-vertical-text">LOVE • FOREVER</div>
                <div style="font-size:0.65rem; color:var(--gold-primary);">✈ BİLET</div>
            </div>
        </div>
    </div>
</body>
</html>
