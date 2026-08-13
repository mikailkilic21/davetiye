<?php
require_once __DIR__ . '/config.php';
$settings = getSettings();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($settings['couple_names']) ?> — Aşk Pasaportu Düğün Davetiyesi</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Büşra & Emir Çiftinin Aşk Pasaportu Temalı Düğün Davetiyesi — 26 & 27 Ağustos 2026 Diyarbakır Çırağan Salonu.">
    <meta name="author" content="Büşra & Emir">
    
    <!-- Open Graph for Social Sharing -->
    <meta property="og:title" content="Büşra & Emir — Aşk Pasaportu Düğün Davetiyesi">
    <meta property="og:description" content="Aşk Pasaportunuzu açın ve bizimle bu özel yolculuğa çıkın.">
    <meta property="og:image" content="5.png">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700;800;900&family=Great+Vibes&family=Inter:wght@400;500;600;700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css?v=6">
</head>
<body>

    <!-- Yan Sayfa Çiçek Şeritleri (Full Height Floral Side Borders) -->
    <div class="side-floral-border side-floral-left" aria-hidden="true"></div>
    <div class="side-floral-border side-floral-right" aria-hidden="true"></div>

    <!-- 2.1 Sticky Top Header -->
    <header class="top-header">
        <div class="header-content">
            <a href="#" class="logo-monogram" id="brandLogo" title="Büşra & Emir">
                <img src="assets/images/logo_be.png" alt="Büşra & Emir Logo" class="brand-logo-img">
            </a>
            
            <div class="header-right">
                <!-- Dil Değiştirici -->
                <div class="lang-switcher">
                    <button class="lang-btn active" data-lang="tr" onclick="setLanguage('tr')">TR</button>
                    <button class="lang-btn" data-lang="ku" onclick="setLanguage('ku')">KURDÎ</button>
                    <button class="lang-btn" data-lang="de" onclick="setLanguage('de')">DE</button>
                </div>
                
                <!-- Ses Efekti Butonu -->
                <button class="audio-btn" id="audioToggleBtn" onclick="toggleAudio()" title="Ses Efektlerini Aç/Kapat">🔊</button>
            </div>
        </div>
    </header>

    <main class="container">
        <!-- 2.2 Hero — Pasaport Bölümü -->
        <section class="hero-section">
            <div class="passport-wrapper">
                <div class="passport-booklet" id="passportBooklet">
                    
                    <!-- Kapalı Pasaport Kapağı (Gerçek 5.png Görseli ile İnteraktif) -->
                    <div class="passport-cover-img-wrap" onclick="togglePassport()" id="passportCover">
                        <img src="5.png" alt="Aşk Pasaportu Kapağı" class="passport-cover-img">
                        <div class="passport-shine-overlay"></div>
                        <div class="passport-open-badge" data-i18n="passport_open_hint">
                            Pasaportu Açmak İçin Tıklayın ✈
                        </div>
                    </div>

                    <!-- Açık Pasaport Sayfaları (Tek Görsel ve Altında Video) -->
                    <div class="passport-opened" id="passportOpened" onclick="event.stopPropagation();">
                        <img src="pasaport-open.png" alt="Açık Pasaport" style="width: 100%; height: auto; display: block; border-radius: 6px; margin-bottom: 15px;" onclick="togglePassport()">
                        
                        <div class="video-container">
                            <video id="passportVideo" class="passport-video-element" poster="1.png" controls preload="auto">
                                <source src="intro.mp4" type="video/mp4">
                                <source src="assets/videos/intro.mp4" type="video/mp4">
                                <source src="<?= htmlspecialchars($settings['hero_video']) ?>" type="video/mp4">
                            </video>
                            <div class="play-overlay" id="passportVideoOverlay" onclick="playPassportVideo()">
                                <div class="play-btn-circle">▶</div>
                            </div>
                        </div>
                        <p style="font-size:0.75rem; text-align:center; margin-top:8px; color:var(--parchment-sub);">
                            🎬 Aşk Yolculuğumuz Tanıtım Filmi
                        </p>
                    </div>

                </div>
            </div>

            <div style="margin-top:20px;">
                <button class="intro-video-banner" onclick="openIntroVideoModal()">
                    <span>🎬</span> AŞK YOLCULUĞUMUZ TANITIM FİLMİNİ İZLE ▶
                </button>
            </div>

            <h2 class="hero-subtitle" data-i18n="welcome_title">♥ Aşk Yolculuğuna Hoş Geldiniz ♥</h2>
            <p class="hero-desc" data-i18n="welcome_sub">Pasaportunuzu açın ve bizimle bu özel yolculuğa çıkın.</p>
        </section>

        <!-- 2.3 Trilingual Karşılama Şeridi -->
        <section class="stamp-card-section">
            <div class="stamp-card">
                <div class="stamp-badge-left">
                    <div class="circular-stamp">
                        <span style="font-size:0.6rem;">LOVE</span>
                        <span style="font-size:0.9rem;">✈</span>
                        <span>DEPARTURE</span>
                        <span style="font-size:0.6rem;">27.08.2026</span>
                    </div>
                </div>
                
                <div class="stamp-card-grid">
                    <div class="lang-column">
                        <span class="lang-pill">TR</span>
                        <div class="lang-greeting">Aşk Yolculuğuna Hoş Geldiniz</div>
                        <div style="color:var(--burgundy-light); margin-top:6px;">♥</div>
                    </div>
                    <div class="lang-column">
                        <span class="lang-pill">KURDÎ</span>
                        <div class="lang-greeting">Bi xêr hatin bo rêwîtiya evînê</div>
                        <div style="color:var(--burgundy-light); margin-top:6px;">♥</div>
                    </div>
                    <div class="lang-column">
                        <span class="lang-pill">DE</span>
                        <div class="lang-greeting">Willkommen zu unserer Liebesreise</div>
                        <div style="color:var(--burgundy-light); margin-top:6px;">♥</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2.3.1 Ailelerimiz Bölümü -->
        <section class="family-card-section">
            <div class="family-card">
                <h3 class="section-title family-section-title" data-i18n="family_title">AİLELERİMİZ</h3>
                <div class="family-grid">
                    <div class="family-column">
                        <div class="family-label" data-i18n="bride_family_label">GELİN AİLESİ</div>
                        <div class="family-name">
                            <?= htmlspecialchars($settings['bride_family']) ?>
                        </div>
                    </div>
                    <div class="family-heart">♥</div>
                    <div class="family-column">
                        <div class="family-label" data-i18n="groom_family_label">DAMAT AİLESİ</div>
                        <div class="family-name">
                            <?= htmlspecialchars($settings['groom_family']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2.3.2 Geri Sayım Aracı (Countdown Widget) -->
        <section class="countdown-section">
            <div class="countdown-card">
                <div class="card-floral-corner card-floral-tl" aria-hidden="true"><img src="assets/images/floral_corner.png" alt=""></div>
                <div class="card-floral-corner card-floral-tr" aria-hidden="true"><img src="assets/images/floral_corner.png" alt=""></div>
                <div class="countdown-subtitle" data-i18n="countdown_subtitle">B Ü Y Ü K   G Ü N E</div>
                <h2 class="countdown-title" data-i18n="countdown_title">Geri Sayım Başladı</h2>
                
                <div class="countdown-grid" id="weddingCountdown" data-target="<?= htmlspecialchars($settings['dugun_date'] . 'T' . $settings['dugun_time'] . ':00') ?>">
                    <div class="countdown-item">
                        <div class="countdown-number" id="cd-days">--</div>
                        <div class="countdown-label" data-i18n="countdown_days">GÜN</div>
                    </div>
                    <div class="countdown-item">
                        <div class="countdown-number" id="cd-hours">--</div>
                        <div class="countdown-label" data-i18n="countdown_hours">SAAT</div>
                    </div>
                    <div class="countdown-item">
                        <div class="countdown-number" id="cd-minutes">--</div>
                        <div class="countdown-label" data-i18n="countdown_minutes">DAKİKA</div>
                    </div>
                    <div class="countdown-item">
                        <div class="countdown-number" id="cd-seconds">--</div>
                        <div class="countdown-label" data-i18n="countdown_seconds">SANİYE</div>
                    </div>
                </div>
                <div class="countdown-note" id="cd-note"></div>
            </div>
        </section>

        <!-- 2.4 Boarding Pass (Biniş Kartı - Düğün) -->
        <section class="boarding-pass-container">
            <h2 class="section-title">AŞK YOLCULUĞU BİNİŞ KARTI</h2>

            <div class="ticket-cards-flex" style="justify-content: center;">
                <!-- Ticket: Düğün Töreni -->
                <div class="paper-ticket-wrap">
                    <img src="assets/images/dugun_ticket.png" alt="Düğün Töreni Biniş Kartı" class="paper-ticket-img">
                </div>
            </div>
        </section>

        <!-- 2.5 Davet Detayları (Grid 5 Kart) -->
        <section>
            <h2 class="section-title">DAVET DETAYLARI</h2>
            <div class="details-grid">
                <!-- 1. TARİH -->
                <div class="detail-card">
                    <div class="detail-icon">📅</div>
                    <div class="detail-title" data-i18n="detail_date_title">TARİH</div>
                    <div class="detail-val" data-i18n="detail_date_val" data-i18n-target="html">
                        26 & 27 Ağustos 2026<br><small>Çarşamba & Perşembe</small>
                    </div>
                </div>

                <!-- 2. SAAT -->
                <div class="detail-card">
                    <div class="detail-icon">⏰</div>
                    <div class="detail-title" data-i18n="detail_time_title">SAAT</div>
                    <div class="detail-val" data-i18n="detail_time_val" data-i18n-target="html">
                        Kına: 20:00<br>Düğün: 19:00
                    </div>
                </div>

                <!-- 3. MEKÂN -->
                <div class="detail-card">
                    <div class="detail-icon">🏛️</div>
                    <div class="detail-title" data-i18n="detail_venue_title">MEKÂN</div>
                    <div class="detail-val" data-i18n="detail_venue_val" data-i18n-target="html">
                        <?= htmlspecialchars($settings['venue_name']) ?><br>Kına & Düğün
                    </div>
                </div>

                <!-- 4. KONUM -->
                <div class="detail-card" onclick="openMapModal()">
                    <div class="detail-icon">📍</div>
                    <div class="detail-title" data-i18n="detail_location_title">KONUM</div>
                    <div class="detail-val" data-i18n="detail_location_val" data-i18n-target="html">
                        Bağcılar, Bağlar<br>Diyarbakır (Harita)
                    </div>
                </div>

                <!-- 5. RSVP -->
                <div class="detail-card" onclick="document.getElementById('rsvpSection').scrollIntoView({behavior:'smooth'})">
                    <div class="detail-icon">✉️</div>
                    <div class="detail-title" data-i18n="detail_rsvp_title">RSVP</div>
                    <div class="detail-val" data-i18n="detail_rsvp_val" data-i18n-target="html">
                        Katılım Formu<br><small>Katılımınızı bekliyoruz</small>
                    </div>
                </div>
            </div>
            
            <p style="text-align:center; font-style:italic; opacity:0.8; font-size:0.9rem; margin-top:10px;">
                Sizleri aramızda görmekten mutluluk duyarız. ♥
            </p>
        </section>

        <!-- 2.6 Bizim Hikâyemiz Bölümü -->
        <section class="story-section">
            <div class="story-card">
                <div class="story-content">
                    <h2 class="story-title" data-i18n="story_title">BİZİM HİKÂYEMİZ</h2>
                    <p class="story-body" data-i18n="story_body">
                        <?= htmlspecialchars($settings['custom_texts']['tr']['story']) ?>
                    </p>
                    <div class="story-footer-script" data-i18n="story_footer">Sonsuza dek...</div>
                </div>
                
                <div class="story-image-wrap">
                    <img src="1.png" alt="Diyarbakır On Gözlü Köprü Vintage" class="story-img">
                    
                    <div class="stamp-story-immigration">
                        ★ IMMIGRATION ★<br>
                        <strong>FOREVER</strong><br>
                        27 AUG 2026<br>
                        DIYARBAKIR
                    </div>
                </div>
            </div>
        </section>

        <!-- RSVP Form Section & Interactive Ticket Generator -->
        <section class="rsvp-section" id="rsvpSection">
            <div class="rsvp-card">
                <h2 class="section-title" data-i18n="rsvp_title">LÜTFEN KATILIM DURUMUNUZU BİLDİRİN (RSVP)</h2>
                
                <form id="rsvpForm">
                    <div class="form-row">
                        <div class="form-group-custom">
                            <label data-i18n="rsvp_name_label">Adınız ve Soyadınız</label>
                            <input type="text" id="guestName" class="form-control-custom" placeholder="Örn: Ahmet Yılmaz" required>
                        </div>
                        
                        <div class="form-group-custom">
                            <label data-i18n="rsvp_attendance_label">Katılım Durumunuz</label>
                            <select id="guestAttendance" class="form-control-custom">
                                <option value="yes" data-i18n="rsvp_yes">Seve seve geleceğim ♥</option>
                                <option value="no" data-i18n="rsvp_no">Ne yazık ki katılamayacağım</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group-custom">
                            <label data-i18n="rsvp_guests_label">Kişi Sayısı</label>
                            <select id="guestCount" class="form-control-custom">
                                <option value="1">1 Kişi</option>
                                <option value="2">2 Kişi</option>
                                <option value="3">3 Kişi</option>
                                <option value="4">4+ Kişi</option>
                            </select>
                        </div>

                        <div class="form-group-custom">
                            <label data-i18n="rsvp_event_label">Hangi Etkinliğe Katılacaksınız?</label>
                            <select id="guestEvent" class="form-control-custom">
                                <option value="both" data-i18n="rsvp_both">Hem Kına Gecesi Hem Düğün</option>
                                <option value="kina" data-i18n="rsvp_kina">Sadece Kına Gecesi (26 Ağustos)</option>
                                <option value="dugun" data-i18n="rsvp_dugun">Sadece Düğün Töreni (27 Ağustos)</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group-custom" style="margin-bottom:25px;">
                        <label data-i18n="rsvp_note_label">Çifte İletmek İstediğiniz Not</label>
                        <textarea id="guestNote" class="form-control-custom" rows="3" placeholder="Tebrik ve dilekleriniz..."></textarea>
                    </div>

                    <button type="submit" class="btn-submit-ticket" data-i18n="rsvp_submit">
                        BİLETİMİ AL 😊
                    </button>
                </form>
            </div>
        </section>
    </main>

    <!-- 2.7 Sticky Bottom Action Bar -->
    <div class="bottom-bar">
        <div class="bottom-bar-content">
            <button class="action-btn" onclick="document.getElementById('rsvpSection').scrollIntoView({behavior:'smooth'})">
                <span style="font-size:1.2rem;">✉️</span>
                <div class="action-btn-text">
                    <span class="action-title-lbl" data-i18n="bottom_rsvp">RSVP</span>
                    <span class="action-sub-lbl" data-i18n="bottom_rsvp_sub">Katılacağım</span>
                </div>
            </button>

            <button class="action-btn" onclick="openMapModal()">
                <span style="font-size:1.2rem;">📍</span>
                <div class="action-btn-text">
                    <span class="action-title-lbl" data-i18n="bottom_location">KONUM</span>
                    <span class="action-sub-lbl" data-i18n="bottom_location_sub">Yol Tarifi Al</span>
                </div>
            </button>

            <button class="action-btn" onclick="openCalendarModal()">
                <span style="font-size:1.2rem;">📅</span>
                <div class="action-btn-text">
                    <span class="action-title-lbl" data-i18n="bottom_calendar">TAKVİME EKLE</span>
                    <span class="action-sub-lbl" data-i18n="bottom_calendar_sub">Hatırlatıcı Kur</span>
                </div>
            </button>
        </div>
    </div>

    <!-- Modal 1: Interactive Souvenir Tear-Off Boarding Pass Modal -->
    <div class="modal-overlay" id="ticketModal">
        <div class="modal-box">
            <button class="close-modal-btn" onclick="closeTicketModal()">×</button>
            
            <h3 class="modal-title">
                🎉 KATILIM KAYDINIZ ALINDI!
            </h3>
            <p class="modal-desc">
                Aşağıdaki kişisel biniş kartınız oluşturuldu. Bileti delikli çizgisinden çekerek koparabilirsiniz!
            </p>

            <div class="tear-container" id="souvenirTicketCard">
                <div class="tear-pass">
                    <div class="pass-main tear-pass-main">
                        <div class="tear-pass-header">
                            <span class="tear-pass-title">BOARDING PASS</span>
                            <span class="tear-pass-class" id="ticketClass">FIRST CLASS</span>
                        </div>
                        
                        <div class="tear-passenger-name" id="ticketPassengerName">
                            Katılımcı Adı
                        </div>
                        
                        <div class="tear-route">
                            FROM: <strong>LOVE</strong> → TO: <strong>FOREVER</strong>
                        </div>

                        <div class="tear-info-row">
                            <div>GATE: <strong id="ticketGate">LOV27</strong></div>
                            <div>SEAT: <strong id="ticketSeat">01A</strong></div>
                            <div>PAX: <strong id="ticketGuests">1 PAX</strong></div>
                        </div>
                    </div>

                    <div class="perforated-divider"></div>

                    <div class="pass-stub tear-stub-interactive" id="ticketStubInteractive" onclick="tearTicketStub()" title="Tıklayın veya Çekin: Bileti Kopar!">
                        <div class="stub-vertical-text">LOVE • FOREVER</div>
                        <div style="font-size:0.65rem; color:var(--gold-primary);">✂️ KOPAR</div>
                    </div>
                </div>
            </div>

            <div class="modal-actions">
                <button class="action-btn action-btn-gold" onclick="tearTicketStub()">
                    ✂️ Bileti Kopar!
                </button>
                <button class="action-btn" onclick="downloadTicketImage()">
                    📥 Görsel İndir
                </button>
                <button class="action-btn" onclick="openCalendarModal()">
                    📅 Takvime Ekle
                </button>
            </div>
        </div>
    </div>

    <!-- Modal 2: Location / Map Modal -->
    <div class="modal-overlay" id="mapModal">
        <div class="modal-box">
            <button class="close-modal-btn" onclick="closeMapModal()">×</button>
            
            <h3 class="modal-title">
                📍 DÜĞÜN MEKÂNI VE YOL TARİFİ
            </h3>
            <p class="modal-desc">
                <?= htmlspecialchars($settings['venue_name']) ?><br>
                <?= htmlspecialchars($settings['address']) ?>
            </p>

            <div class="map-iframe-wrap">
                <iframe 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    loading="lazy" 
                    allowfullscreen
                    src="https://maps.google.com/maps?q=Ba%C4%9Fc%C4%B1lar,+Evrim+Alata%C5%9F+Caddesi+No:4,+21090+Ba%C4%9Flar/Diyarbak%C4%B1r&t=&z=15&ie=UTF8&iwloc=&output=embed">
                </iframe>
            </div>

            <div class="modal-actions">
                <a href="<?= htmlspecialchars($settings['maps_url']) ?>" target="_blank" class="action-btn action-btn-gold">
                    Google Maps'te Aç ↗
                </a>
                <button class="action-btn" onclick="closeMapModal()">Kapat</button>
            </div>
        </div>
    </div>

    <!-- Modal 3: Calendar Selector Modal -->
    <div class="modal-overlay" id="calendarModal">
        <div class="modal-box" style="max-width:450px;">
            <button class="close-modal-btn" onclick="closeCalendarModal()">×</button>
            
            <h3 class="modal-title">
                📅 TAKVİME HATIRLATICI EKLENİYOR
            </h3>
            <p class="modal-desc" style="margin-bottom:20px;">
                Hangi etkinlik için hatırlatıcı oluşturmak istersiniz?
            </p>

            <div style="display:flex; flex-direction:column; gap:12px;">
                <a href="api/calendar.php?type=kina" class="action-btn" style="justify-content:center;">
                    💃 Kına Gecesi (26 Ağustos 20:00)
                </a>
                <a href="api/calendar.php?type=dugun" class="action-btn" style="justify-content:center; background:var(--gold-metallic); color:#1a0307;">
                    👰 Düğün Töreni (27 Ağustos 19:00)
                </a>
            </div>
        </div>
    </div>

    <!-- Modal 0: Intro Cinema Video Modal -->
    <div class="modal-overlay" id="introVideoModal">
        <div class="modal-box" style="max-width:850px; padding:25px;">
            <button class="close-modal-btn" onclick="closeIntroVideoModal()">×</button>
            
            <h3 class="modal-title modal-title-lg">
                🎬 AŞK YOLCULUĞUMUZ — TANITIM FİLMİ
            </h3>

            <div style="margin:15px 0;">
                <video id="cinemaVideo" class="cinema-video-player" controls poster="1.png" preload="auto">
                    <source src="intro.mp4" type="video/mp4">
                    <source src="assets/videos/intro.mp4" type="video/mp4">
                    <source src="<?= htmlspecialchars($settings['hero_video']) ?>" type="video/mp4">
                </video>
            </div>

            <div class="modal-actions">
                <button class="action-btn action-btn-gold" onclick="closeIntroVideoModal(); togglePassport();" style="font-weight:bold;">
                    ✈ Pasaportu Aç & Davetiyeye Geç
                </button>
                <button class="action-btn" onclick="closeIntroVideoModal()">
                    ✕ Kapat
                </button>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="assets/js/main.js?v=2"></script>
</body>
</html>
