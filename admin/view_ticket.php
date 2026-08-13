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
                <div class="boarding-header">BOARDING PASS</div>
                <div class="boarding-body">
                    <div class="boarding-barcode-vertical"></div>
                    <div class="boarding-content">
                        <div class="boarding-row-top">
                            <div class="boarding-field">
                                <div class="boarding-label">PASSENGER</div>
                                <div class="boarding-value"><?= htmlspecialchars($participant['name']) ?></div>
                            </div>
                            <div class="boarding-field" style="margin-left:auto; margin-right:40px;">
                                <div class="boarding-label">DATE</div>
                                <div class="boarding-value">AUG 27, 2026</div>
                            </div>
                            <div class="boarding-field">
                                <div class="boarding-label">TIME</div>
                                <div class="boarding-value">19:00</div>
                            </div>
                        </div>
                        
                        <div class="boarding-route-large">
                            <div class="route-city">
                                <div class="route-label">FROM</div>
                                <div class="route-code">LOVE</div>
                            </div>
                            <div class="route-icon">✈</div>
                            <div class="route-city">
                                <div class="route-label">TO</div>
                                <div class="route-code">FOREVER</div>
                            </div>
                        </div>
                        
                        <div class="boarding-row-bottom">
                            <div class="boarding-field">
                                <div class="boarding-label">FLIGHT</div>
                                <div class="boarding-value">BE 2026</div>
                            </div>
                            <div class="boarding-field">
                                <div class="boarding-label">GATE</div>
                                <div class="boarding-value"><?= htmlspecialchars($participant['gate'] ?? 'LOV27') ?></div>
                            </div>
                            <div class="boarding-field">
                                <div class="boarding-label">TERMINAL</div>
                                <div class="boarding-value">01</div>
                            </div>
                            <div class="boarding-field">
                                <div class="boarding-label">SEAT</div>
                                <div class="boarding-value"><?= htmlspecialchars($participant['seat'] ?? '-') ?></div>
                            </div>
                        </div>
                        <div class="boarding-footer">GATE CLOSES 30 MINUTES BEFORE DEPARTURE</div>
                    </div>
                </div>
            </div>

            <div class="pass-stub tear-stub-interactive" title="Hatıra Bileti">
                <div class="boarding-header">FIRST CLASS</div>
                <div class="boarding-stub-body">
                    <div class="boarding-field">
                        <div class="boarding-label">PASSENGER</div>
                        <div class="boarding-value"><?= htmlspecialchars($participant['name']) ?></div>
                    </div>
                    <div class="boarding-field" style="margin-top:15px; display:flex; justify-content:space-between; gap:10px;">
                        <div>
                            <div class="boarding-label" style="font-size:0.55rem; color:#777; margin-bottom:2px;">FROM <strong style="color:#000; font-size:0.75rem;">LOVE</strong></div>
                            <div class="boarding-label" style="font-size:0.55rem; color:#777;">TO <strong style="color:#000; font-size:0.75rem;">FOREVER</strong></div>
                        </div>
                        <div style="text-align:right;">
                            <div class="boarding-label" style="font-size:0.55rem; color:#777; margin-bottom:2px;">DATE <strong style="color:#000; font-size:0.75rem;">AUG 27, 2026</strong></div>
                            <div class="boarding-label" style="font-size:0.55rem; color:#777;">TIME <strong style="color:#000; font-size:0.75rem;">19:00</strong></div>
                        </div>
                    </div>
                    
                    <div class="stub-row-bottom">
                        <div class="boarding-field">
                            <div class="boarding-label">FLIGHT</div>
                            <div class="boarding-value" style="font-size:0.7rem;">BE 2026</div>
                        </div>
                        <div class="boarding-field">
                            <div class="boarding-label">TERM</div>
                            <div class="boarding-value" style="font-size:0.7rem;">01</div>
                        </div>
                        <div class="boarding-field">
                            <div class="boarding-label">GATE</div>
                            <div class="boarding-value" style="font-size:0.7rem;"><?= htmlspecialchars($participant['gate'] ?? 'LOV27') ?></div>
                        </div>
                        <div class="boarding-field">
                            <div class="boarding-label">SEAT</div>
                            <div class="boarding-value" style="font-size:0.7rem;"><?= htmlspecialchars($participant['seat'] ?? '-') ?></div>
                        </div>
                    </div>
                    <div class="boarding-barcode-horizontal"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
