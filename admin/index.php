<?php
session_start();
require_once __DIR__ . '/../config.php';

$message = '';
$error = '';

// Logout işlemi
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['admin_logged_in']);
    header('Location: index.php');
    exit;
}

// Login işlemi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $password = $_POST['password'] ?? '';
    if ($password === ADMIN_PASSWORD) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Hatalı şifre!';
    }
}

// Ayarları Güncelleme işlemi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_settings') {
    if (!isset($_SESSION['admin_logged_in'])) {
        die('Yetkisiz erişim');
    }
    
    $settings = getSettings();
    $settings['couple_names'] = trim($_POST['couple_names'] ?? '');
    $settings['bride_family'] = trim($_POST['bride_family'] ?? '');
    $settings['groom_family'] = trim($_POST['groom_family'] ?? '');
    $settings['venue_name'] = trim($_POST['venue_name'] ?? '');
    $settings['address'] = trim($_POST['address'] ?? '');
    $settings['maps_url'] = trim($_POST['maps_url'] ?? '');
    
    $settings['custom_texts']['tr']['welcome'] = trim($_POST['welcome_tr'] ?? '');
    $settings['custom_texts']['ku']['welcome'] = trim($_POST['welcome_ku'] ?? '');
    $settings['custom_texts']['de']['welcome'] = trim($_POST['welcome_de'] ?? '');
    
    $settings['custom_texts']['tr']['story'] = trim($_POST['story_tr'] ?? '');
    $settings['custom_texts']['ku']['story'] = trim($_POST['story_ku'] ?? '');
    $settings['custom_texts']['de']['story'] = trim($_POST['story_de'] ?? '');
    
    saveSettings($settings);
    $message = 'Ayarlar başarıyla kaydedildi!';
}

// RSVP Silme İşlemi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_rsvp') {
    if (!isset($_SESSION['admin_logged_in'])) die('Yetkisiz erişim');
    $rsvpId = $_POST['rsvp_id'] ?? '';
    if ($rsvpId) {
        deleteRSVP($rsvpId);
        $message = 'Kayıt başarıyla silindi.';
    }
}

// RSVP Düzenleme İşlemi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit_rsvp') {
    if (!isset($_SESSION['admin_logged_in'])) die('Yetkisiz erişim');
    $rsvpId = $_POST['rsvp_id'] ?? '';
    if ($rsvpId) {
        $newData = [
            'name' => trim($_POST['name'] ?? ''),
            'attendance' => $_POST['attendance'] ?? 'yes',
            'guests' => intval($_POST['guests'] ?? 1),
            'event' => $_POST['event'] ?? 'both',
            'note' => trim($_POST['note'] ?? '')
        ];
        updateRSVP($rsvpId, $newData);
        $message = 'Kayıt başarıyla güncellendi.';
    }
}

$isLoggedIn = !empty($_SESSION['admin_logged_in']);
$rsvps = getRSVPs();
$settings = getSettings();

// İstatistikler
$totalRsvps = count($rsvps);
$totalAttending = 0;
$totalGuests = 0;
$kinaCount = 0;
$dugunCount = 0;

foreach ($rsvps as $r) {
    if ($r['attendance'] === 'yes') {
        $totalAttending++;
        $g = intval($r['guests']);
        $totalGuests += $g;
        if ($r['event'] === 'both' || $r['event'] === 'kina') {
            $kinaCount += $g;
        }
        if ($r['event'] === 'both' || $r['event'] === 'dugun') {
            $dugunCount += $g;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aşk Pasaportu — Yönetim Paneli</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-burgundy: #2b060c;
            --accent-gold: #d4af37;
            --gold-gradient: linear-gradient(135deg, #bf953f, #fcf6ba, #b38728, #fbf5b7, #aa771c);
            --card-bg: rgba(255, 255, 255, 0.05);
            --border-color: rgba(212, 175, 55, 0.3);
            --text-light: #f4ebe1;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-burgundy);
            color: var(--text-light);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 30px;
        }
        h1, h2, h3 {
            font-family: 'Cinzel', serif;
            color: var(--accent-gold);
        }
        .btn {
            background: var(--gold-gradient);
            color: #1a0307;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.2s, opacity 0.2s;
        }
        .btn:hover { opacity: 0.9; transform: translateY(-2px); }
        .btn-outline {
            background: transparent;
            color: var(--accent-gold);
            border: 1px solid var(--accent-gold);
        }
        .login-box {
            max-width: 400px;
            margin: 80px auto;
            background: rgba(0,0,0,0.4);
            border: 1px solid var(--border-color);
            padding: 40px;
            border-radius: 12px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            color: var(--accent-gold);
        }
        input, select, textarea {
            width: 100%;
            padding: 12px;
            background: rgba(255,255,255,0.08);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            color: #fff;
            font-family: inherit;
        }
        input:focus, textarea:focus { outline: none; border-color: var(--accent-gold); }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: rgba(0,0,0,0.3);
            border: 1px solid var(--border-color);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        .stat-num {
            font-size: 2.2rem;
            font-family: 'Cinzel', serif;
            color: var(--accent-gold);
            margin-top: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: rgba(0,0,0,0.3);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 14px 18px;
            text-align: left;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        th {
            background: rgba(212, 175, 55, 0.15);
            color: var(--accent-gold);
            font-family: 'Cinzel', serif;
        }
        tr:hover { background: rgba(255,255,255,0.02); }
        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .badge-yes { background: rgba(46, 204, 113, 0.2); color: #2ecc71; border: 1px solid #2ecc71; }
        .badge-no { background: rgba(231, 76, 60, 0.2); color: #e74c3c; border: 1px solid #e74c3c; }
        .alert {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .alert-success { background: rgba(46, 204, 113, 0.2); color: #2ecc71; border: 1px solid #2ecc71; }
        .alert-error { background: rgba(231, 76, 60, 0.2); color: #e74c3c; border: 1px solid #e74c3c; }
        .tabs {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }
        .tab-btn {
            padding: 10px 20px;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--border-color);
            color: var(--text-light);
            border-radius: 6px;
            cursor: pointer;
        }
        .tab-btn.active {
            background: var(--gold-gradient);
            color: #1a0307;
            font-weight: 700;
        }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
    </style>
</head>
<body>
    <div class="container">
        <?php if (!$isLoggedIn): ?>
            <div class="login-box">
                <h2>Yönetici Girişi</h2>
                <p style="margin-bottom:20px; font-size:0.9rem; color:#ccc;">Aşk Pasaportu Admin Paneli</p>
                <?php if ($error): ?>
                    <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                <form method="POST">
                    <input type="hidden" name="action" value="login">
                    <div class="form-group">
                        <label>Şifre</label>
                        <input type="password" name="password" required placeholder="Şifrenizi girin...">
                    </div>
                    <button type="submit" class="btn" style="width:100%;">Giriş Yap</button>
                </form>
            </div>
        <?php else: ?>
            <header>
                <div>
                    <h1>BÜŞRA & EMİR</h1>
                    <p style="font-size:0.85rem; opacity:0.8;">Davetiye Yönetim Paneli</p>
                </div>
                <div>
                    <a href="../" target="_blank" class="btn btn-outline" style="margin-right:10px;">Sitiyi Gör ↗</a>
                    <a href="index.php?action=logout" class="btn">Çıkış Yap</a>
                </div>
            </header>

            <?php if ($message): ?>
                <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <div class="stats-grid">
                <div class="stat-card">
                    <div style="font-size:0.9rem; opacity:0.8;">Toplam RSVP Kaydı</div>
                    <div class="stat-num"><?= $totalRsvps ?></div>
                </div>
                <div class="stat-card">
                    <div style="font-size:0.9rem; opacity:0.8;">Katılan Kişi Sayısı</div>
                    <div class="stat-num" style="color:#2ecc71;"><?= $totalGuests ?></div>
                </div>
                <div class="stat-card">
                    <div style="font-size:0.9rem; opacity:0.8;">Kına Katılımı</div>
                    <div class="stat-num"><?= $kinaCount ?></div>
                </div>
                <div class="stat-card">
                    <div style="font-size:0.9rem; opacity:0.8;">Düğün Katılımı</div>
                    <div class="stat-num"><?= $dugunCount ?></div>
                </div>
            </div>

            <div class="tabs">
                <button class="tab-btn active" onclick="switchTab('rsvps')">RSVP Yanıtları (<?= count($rsvps) ?>)</button>
                <button class="tab-btn" onclick="switchTab('settings')">Site & İçerik Ayarları</button>
            </div>

            <div id="tab-rsvps" class="tab-content active">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
                    <h3>Katılım Listesi</h3>
                    <a href="export_csv.php" class="btn btn-outline">CSV Olarak İndir (Excel) 📥</a>
                </div>
                <?php if (empty($rsvps)): ?>
                    <p style="padding:40px; text-align:center; opacity:0.6;">Henüz bir RSVP kaydı yapılmadı.</p>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Koltuk / Gate</th>
                                <th>Ad Soyad</th>
                                <th>Durum</th>
                                <th>Kişi</th>
                                <th>Etkinlik</th>
                                <th>Not</th>
                                <th>Tarih</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rsvps as $r): ?>
                                <tr>
                                    <td><strong><?= htmlspecialchars($r['seat'] ?? '-') ?></strong> / <?= htmlspecialchars($r['gate'] ?? 'LOV27') ?></td>
                                    <td><strong><?= htmlspecialchars($r['name']) ?></strong></td>
                                    <td>
                                        <?php if ($r['attendance'] === 'yes'): ?>
                                            <span class="badge badge-yes">GELİYOR</span>
                                        <?php else: ?>
                                            <span class="badge badge-no">GELEMİYOR</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($r['guests']) ?> Kişi</td>
                                    <td>
                                        <?php 
                                            if (($r['event'] ?? 'both') === 'both') echo 'Kına & Düğün';
                                            elseif ($r['event'] === 'kina') echo 'Sadece Kına';
                                            else echo 'Sadece Düğün';
                                        ?>
                                    </td>
                                    <td style="max-width:250px; font-size:0.85rem; opacity:0.9;"><?= nl2br(htmlspecialchars($r['note'] ?? '')) ?></td>
                                    <td style="font-size:0.8rem; opacity:0.7;"><?= htmlspecialchars($r['created_at'] ?? '-') ?></td>
                                    <td>
                                        <button onclick="openTicketViewModal('<?= htmlspecialchars($r['id'] ?? '') ?>')" class="btn" style="padding: 4px 8px; font-size: 0.75rem; margin-right: 4px; min-width: auto; background: var(--accent-gold); color: #000;">🎫 Bilet</button>
                                        <button onclick="openEditModal('<?= htmlspecialchars($r['id'] ?? '') ?>', '<?= htmlspecialchars(addslashes($r['name'] ?? '')) ?>', '<?= htmlspecialchars($r['attendance'] ?? '') ?>', '<?= htmlspecialchars($r['guests'] ?? '1') ?>', '<?= htmlspecialchars($r['event'] ?? '') ?>', '<?= htmlspecialchars(addslashes(str_replace(array("\r", "\n"), array('', '\n'), $r['note'] ?? ''))) ?>')" class="btn" style="padding: 4px 8px; font-size: 0.75rem; margin-right: 4px; min-width: auto;">Düzenle</button>
                                        <form method="POST" style="display:inline;" onsubmit="return confirm('Bu kaydı silmek istediğinize emin misiniz?');">
                                            <input type="hidden" name="action" value="delete_rsvp">
                                            <input type="hidden" name="rsvp_id" value="<?= htmlspecialchars($r['id'] ?? '') ?>">
                                            <button type="submit" class="btn" style="padding: 4px 8px; font-size: 0.75rem; background: #8a1c1c; min-width: auto;">Sil</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>

            <div id="tab-settings" class="tab-content">
                <h3>Site Bilgilerini Düzenle</h3>
                <form method="POST" style="margin-top:20px;">
                    <input type="hidden" name="action" value="save_settings">
                    
                    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
                        <div class="form-group">
                            <label>Çift İsimleri</label>
                            <input type="text" name="couple_names" value="<?= htmlspecialchars($settings['couple_names']) ?>">
                        </div>
                        <div class="form-group">
                            <label>Mekân Adı</label>
                            <input type="text" name="venue_name" value="<?= htmlspecialchars($settings['venue_name']) ?>">
                        </div>
                    </div>

                    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
                        <div class="form-group">
                            <label>Gelin Ailesi</label>
                            <input type="text" name="bride_family" value="<?= htmlspecialchars($settings['bride_family']) ?>">
                        </div>
                        <div class="form-group">
                            <label>Damat Ailesi</label>
                            <input type="text" name="groom_family" value="<?= htmlspecialchars($settings['groom_family']) ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Adres</label>
                        <input type="text" name="address" value="<?= htmlspecialchars($settings['address']) ?>">
                    </div>

                    <div class="form-group">
                        <label>Google Maps Linki</label>
                        <input type="text" name="maps_url" value="<?= htmlspecialchars($settings['maps_url']) ?>">
                    </div>

                    <h4 style="margin:25px 0 15px; color:var(--accent-gold); border-bottom:1px solid var(--border-color); padding-bottom:8px;">Metinler (3 Dil)</h4>
                    
                    <div class="form-group">
                        <label>Karşılama Cümlesi (Türkçe)</label>
                        <input type="text" name="welcome_tr" value="<?= htmlspecialchars($settings['custom_texts']['tr']['welcome'] ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label>Karşılama Cümlesi (Kurdî)</label>
                        <input type="text" name="welcome_ku" value="<?= htmlspecialchars($settings['custom_texts']['ku']['welcome'] ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label>Karşılama Cümlesi (Deutsch)</label>
                        <input type="text" name="welcome_de" value="<?= htmlspecialchars($settings['custom_texts']['de']['welcome'] ?? '') ?>">
                    </div>

                    <div class="form-group">
                        <label>Hikâyemiz Metni (Türkçe)</label>
                        <textarea name="story_tr" rows="3"><?= htmlspecialchars($settings['custom_texts']['tr']['story'] ?? '') ?></textarea>
                    </div>

                    <button type="submit" class="btn" style="margin-top:20px; padding:12px 30px;">Ayarları Kaydet</button>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:9999; justify-content:center; align-items:center;">
        <div style="background:var(--bg-burgundy); padding:30px; border-radius:12px; border:2px solid var(--accent-gold); width:100%; max-width:500px;">
            <h3 style="margin-bottom:20px; color:var(--accent-gold);">Kayıt Düzenle</h3>
            <form method="POST">
                <input type="hidden" name="action" value="edit_rsvp">
                <input type="hidden" name="rsvp_id" id="edit_rsvp_id">
                
                <div class="form-group">
                    <label>Ad Soyad</label>
                    <input type="text" name="name" id="edit_name" required>
                </div>
                
                <div class="form-group">
                    <label>Durum</label>
                    <select name="attendance" id="edit_attendance" style="width:100%; padding:12px; border-radius:6px; background:rgba(255,255,255,0.1); border:1px solid var(--border-color); color:var(--text-light);">
                        <option value="yes">Gelecek</option>
                        <option value="no">Gelemeyecek</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Kişi Sayısı</label>
                    <input type="number" name="guests" id="edit_guests" min="1" max="10" required>
                </div>
                
                <div class="form-group">
                    <label>Etkinlik</label>
                    <select name="event" id="edit_event" style="width:100%; padding:12px; border-radius:6px; background:rgba(255,255,255,0.1); border:1px solid var(--border-color); color:var(--text-light);">
                        <option value="both">Kına & Düğün</option>
                        <option value="kina">Sadece Kına</option>
                        <option value="dugun">Sadece Düğün</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Not</label>
                    <textarea name="note" id="edit_note" rows="3"></textarea>
                </div>
                
                <div style="display:flex; justify-content:flex-end; gap:10px; margin-top:20px;">
                    <button type="button" class="btn" style="background:#555;" onclick="closeEditModal()">İptal</button>
                    <button type="submit" class="btn">Kaydet</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Ticket View Modal -->
    <div id="ticketViewModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.85); z-index:9999; justify-content:center; align-items:center;">
        <div style="position:relative; width:90%; max-width:800px; height:80%; max-height:500px; background:transparent;">
            <button onclick="closeTicketViewModal()" style="position:absolute; top:-40px; right:-20px; background:none; border:none; color:white; font-size:2rem; cursor:pointer;">&times;</button>
            <iframe id="ticketIframe" src="" style="width:100%; height:100%; border:none; background:transparent;"></iframe>
        </div>
    </div>

    <script>
        function openTicketViewModal(id) {
            document.getElementById('ticketIframe').src = 'view_ticket.php?id=' + id;
            document.getElementById('ticketViewModal').style.display = 'flex';
        }
        
        function closeTicketViewModal() {
            document.getElementById('ticketViewModal').style.display = 'none';
            document.getElementById('ticketIframe').src = '';
        }

        function openEditModal(id, name, attendance, guests, event, note) {
            document.getElementById('edit_rsvp_id').value = id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_attendance').value = attendance;
            document.getElementById('edit_guests').value = guests;
            document.getElementById('edit_event').value = event;
            document.getElementById('edit_note').value = note.replace(/\\n/g, '\n');
            document.getElementById('editModal').style.display = 'flex';
        }
        
        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        function switchTab(tabId) {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
            
            event.target.classList.add('active');
            document.getElementById('tab-' + tabId).classList.add('active');
        }
    </script>
</body>
</html>
