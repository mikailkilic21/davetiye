/* ==========================================================================
   Aşk Pasaportu — Client Logic & Interactive Features
   ========================================================================== */

// Dil Sözlüğü (Dictionary)
const translations = {
    tr: {
        welcome_title: "Aşk Yolculuğuna Hoş Geldiniz",
        welcome_sub: "Pasaportunuzu açın ve bizimle bu özel yolculuğa çıkın.",
        passport_cover_title: "AŞK PASAPORTU",
        passport_couple: "BÜŞRA & EMİR",
        passport_date: "27.08.2026",
        passport_open_hint: "Pasaportu Açmak İçin Tıklayın ✈",
        story_title: "BİZİM HİKÂYEMİZ",
        story_body: "Almanya'nın Augsburg şehrinden memleketimiz Diyarbakır'a uzanan bu özel yolculuğumuzda, sizi de aramızda görmekten mutluluk duyacağız.",
        story_footer: "Sonsuza dek...",
        family_title: "AİLELERİMİZ",
        bride_family_label: "GELİN AİLESİ",
        groom_family_label: "DAMAT AİLESİ",
        detail_date_title: "TARİH",
        detail_date_val: "26 & 27 Ağustos 2026<br><small>Çarşamba & Perşembe</small>",
        detail_time_title: "SAAT",
        detail_time_val: "Kına: 20:00<br>Düğün: 19:00",
        detail_venue_title: "MEKÂN",
        detail_venue_val: "Çırağan Salonu<br>Kına & Düğün",
        detail_location_title: "KONUM",
        detail_location_val: "Bağcılar, Bağlar<br>Diyarbakır",
        detail_rsvp_title: "KATILIM FORMU",
        detail_rsvp_val: "Katılım Formu<br><small>Katılımınızı bekliyoruz</small>",
        rsvp_title: "LÜTFEN KATILIM DURUMUNUZU BİLDİRİN",
        rsvp_name_label: "Adınız ve Soyadınız",
        rsvp_attendance_label: "Katılım Durumunuz",
        rsvp_yes: "Seve seve geleceğim ♥",
        rsvp_no: "Ne yazık ki katılamayacağım",
        rsvp_guests_label: "Kişi Sayısı",
        rsvp_event_label: "Hangi Etkinliğe Katılacaksınız?",
        rsvp_both: "Hem Kına Gecesi Hem Düğün",
        rsvp_kina: "Sadece Kına Gecesi (26 Ağustos)",
        rsvp_dugun: "Sadece Düğün Töreni (27 Ağustos)",
        rsvp_note_label: "Çifte İletmek İstediğiniz Not",
        rsvp_submit: "BİLETİMİ AL 😊",
        bottom_rsvp: "KATILIM FORMU",
        bottom_rsvp_sub: "Katılacağım",
        bottom_location: "KONUM",
        bottom_location_sub: "Yol Tarifi Al",
        bottom_calendar: "TAKVİME EKLE",
        bottom_calendar_sub: "Hatırlatıcı Kur",
        countdown_subtitle: "B Ü Y Ü K   G Ü N E",
        countdown_title: "Geri Sayım Başladı",
        countdown_days: "GÜN",
        countdown_hours: "SAAT",
        countdown_minutes: "DAKİKA",
        countdown_seconds: "SANİYE",
        countdown_completed: "Büyük Gün Geldi! ♥"
    },
    ku: {
        welcome_title: "Bi xêr hatin bo rêwîtiya evînê",
        welcome_sub: "Pasaporta xwe vekin û bi me re derkevin vê rêwîtiya taybet.",
        passport_cover_title: "PASAPORTA EVÎNÊ",
        passport_couple: "BÜŞRA & EMİR",
        passport_date: "27.08.2026",
        passport_open_hint: "Ji bo vekirina pasaportê bitikînin ✈",
        story_title: "ÇÎROKA ME",
        story_body: "Em ji riyên cüda derbas bûn. Di heman demê de, li heman cihî hatin cem hev. Niha em bi hev re derdikevin rêwîtiya herî bedew.",
        story_footer: "Heta hetayê...",
        family_title: "MALBATÊN ME",
        bride_family_label: "MALBATA BÛKÊ",
        groom_family_label: "MALBATA ZAVA",
        detail_date_title: "DÎROK",
        detail_date_val: "26 & 27 Tebax 2026<br><small>Çarşem & Pêncşem</small>",
        detail_time_title: "SEAT",
        detail_time_val: "Xena: 20:00<br>Sersal: 19:00",
        detail_venue_title: "CIH",
        detail_venue_val: "Salon Çırağan<br>Xena & Dawat",
        detail_location_title: "NAVNÎŞAN",
        detail_location_val: "Bağcılar, Bağlar<br>Diyarbakır",
        detail_rsvp_title: "RSVP",
        detail_rsvp_val: "Forma Tevlîbûnê<br><small>Em li bendê ne</small>",
        rsvp_title: "JI KEREMA XWE DIYAR BIKIN (RSVP)",
        rsvp_name_label: "Nav û Paşnavê We",
        rsvp_attendance_label: "Rewşa Tevlîbûnê",
        rsvp_yes: "Ez ê bi kêfxweşî werim ♥",
        rsvp_no: "Mixabin ez nikarim werim",
        rsvp_guests_label: "Hejmara Kesan",
        rsvp_event_label: "Hûn ê Tevlî Kîjan Çalakiyê Bibin?",
        rsvp_both: "Hem Şeva Xenayê Hem Dawat",
        rsvp_kina: "Yekane Şeva Xenayê (26 Tebax)",
        rsvp_dugun: "Yekane Daweta Sersalê (27 Tebax)",
        rsvp_note_label: "Nîşeya ku Hûn Dixwazin Ji Çiftê re Bişînin",
        rsvp_submit: "BİLETİMİ AL 😊",
        bottom_rsvp: "RSVP",
        bottom_rsvp_sub: "Ez ê tevlî bibim",
        bottom_location: "NAVNÎŞAN",
        bottom_location_sub: "Nîşan bide",
        bottom_calendar: "ZÊDE BIKE",
        bottom_calendar_sub: "Bîranîn Çêbike",
        countdown_subtitle: "B E R   R O J A   M E Z I N",
        countdown_title: "Pêşjimartin Dest Pê Kir",
        countdown_days: "ROJ",
        countdown_hours: "SEAT",
        countdown_minutes: "DEQÎQE",
        countdown_seconds: "ÇRKE",
        countdown_completed: "Roja Mezin Hat! ♥"
    },
    de: {
        welcome_title: "Willkommen zu unserer Liebesreise",
        welcome_sub: "Öffnen Sie Ihren Reisepass und begleiten Sie uns auf dieser besonderen Reise.",
        passport_cover_title: "LIEBESREISEPASS",
        passport_couple: "BÜŞRA & EMİR",
        passport_date: "27.08.2026",
        passport_open_hint: "Klicken Sie zum Öffnen des Reisepasses ✈",
        story_title: "UNSERE GESCHICHTE",
        story_body: "Wir kamen aus verschiedenen Wegen. Wir haben uns am selben Ort getroffen. Nun beginnen wir gemeinsam die schönste Reise.",
        story_footer: "Für immer...",
        family_title: "UNSERE FAMILIEN",
        bride_family_label: "BRAUTFAMILIE",
        groom_family_label: "BRÄUTIGAMFAMILIE",
        detail_date_title: "DATUM",
        detail_date_val: "26. & 27. August 2026<br><small>Mittwoch & Donnerstag</small>",
        detail_time_title: "UHRZEIT",
        detail_time_val: "Henna-Abend: 20:00<br>Hochzeit: 19:00",
        detail_venue_title: "ORT",
        detail_venue_val: "Çırağan Saal<br>Diyarbakır",
        detail_location_title: "STANDORT",
        detail_location_val: "Bağcılar, Bağlar<br>Diyarbakır, Türkei",
        detail_rsvp_title: "RSVP",
        detail_rsvp_val: "Rückmeldung<br><small>Wir freuen uns auf Sie</small>",
        rsvp_title: "BITTE GEBEN SIE IHRE ANWESENHEIT AN (RSVP)",
        rsvp_name_label: "Ihr Vor- und Nachname",
        rsvp_attendance_label: "Teilnahme",
        rsvp_yes: "Ich komme sehr gerne ♥",
        rsvp_no: "Leider kann ich nicht teilnehmen",
        rsvp_guests_label: "Anzahl der Personen",
        rsvp_event_label: "An welchen Veranstaltungen nehmen Sie teil?",
        rsvp_both: "Sowohl Henna-Abend als auch Hochzeit",
        rsvp_kina: "Nur Henna-Abend (26. August)",
        rsvp_dugun: "Nur Hochzeit (27. August)",
        rsvp_note_label: "Nachricht an das Brautpaar",
        rsvp_submit: "BİLETİMİ AL 😊",
        bottom_rsvp: "RSVP",
        bottom_rsvp_sub: "Zusagen",
        bottom_location: "KARTE",
        bottom_location_sub: "Route anzeigen",
        bottom_calendar: "KALENDER",
        bottom_calendar_sub: "Erinnerung erstellen",
        countdown_subtitle: "Z U M   G R O S S E N   T A G",
        countdown_title: "Der Countdown Läuft",
        countdown_days: "TAGE",
        countdown_hours: "STUNDEN",
        countdown_minutes: "MINUTEN",
        countdown_seconds: "SEKUNDEN",
        countdown_completed: "Der große Tag ist da! ♥"
    }
};

let currentLang = 'tr';
let audioContext = null;
let soundEnabled = true;

// Web Audio API Synth Sound Effects
function initAudioContext() {
    if (!audioContext) {
        const AudioCtx = window.AudioContext || window.webkitAudioContext;
        audioContext = new AudioCtx();
    }
}

// Page Turn Sound Effect
function playPageTurnSound() {
    if (!soundEnabled) return;
    try {
        initAudioContext();
        const bufferSize = audioContext.sampleRate * 0.25;
        const buffer = audioContext.createBuffer(1, bufferSize, audioContext.sampleRate);
        const data = buffer.getChannelData(0);
        for (let i = 0; i < bufferSize; i++) {
            data[i] = Math.random() * 2 - 1;
        }
        const noise = audioContext.createBufferSource();
        noise.buffer = buffer;
        const filter = audioContext.createBiquadFilter();
        filter.type = 'lowpass';
        filter.frequency.setValueAtTime(800, audioContext.currentTime);
        filter.frequency.exponentialRampToValueAtTime(100, audioContext.currentTime + 0.2);
        
        const gain = audioContext.createGain();
        gain.gain.setValueAtTime(0.3, audioContext.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.2);
        
        noise.connect(filter);
        filter.connect(gain);
        gain.connect(audioContext.destination);
        noise.start();
    } catch(e) {}
}

// Ticket Tear Sound Effect
function playTearSound() {
    if (!soundEnabled) return;
    try {
        initAudioContext();
        const duration = 0.4;
        const bufferSize = audioContext.sampleRate * duration;
        const buffer = audioContext.createBuffer(1, bufferSize, audioContext.sampleRate);
        const data = buffer.getChannelData(0);
        for (let i = 0; i < bufferSize; i++) {
            data[i] = (Math.random() * 2 - 1) * Math.sin(i / 100);
        }
        const noise = audioContext.createBufferSource();
        noise.buffer = buffer;
        
        const filter = audioContext.createBiquadFilter();
        filter.type = 'bandpass';
        filter.frequency.setValueAtTime(1200, audioContext.currentTime);
        filter.Q.setValueAtTime(3, audioContext.currentTime);
        
        const gain = audioContext.createGain();
        gain.gain.setValueAtTime(0.4, audioContext.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + duration);
        
        noise.connect(filter);
        filter.connect(gain);
        gain.connect(audioContext.destination);
        noise.start();
    } catch(e) {}
}

// Dil Değiştirme Fonksiyonu
function setLanguage(lang) {
    if (!translations[lang]) return;
    currentLang = lang;
    
    // Switch active button class
    document.querySelectorAll('.lang-btn').forEach(btn => {
        if (btn.dataset.lang === lang) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    });
    
    // Update text elements with data-i18n attribute
    document.querySelectorAll('[data-i18n]').forEach(el => {
        const key = el.dataset.i18n;
        if (translations[lang][key]) {
            if (el.dataset.i18nTarget === 'html') {
                el.innerHTML = translations[lang][key];
            } else {
                el.textContent = translations[lang][key];
            }
        }
    });
}

// Interactive 3D Passport Opening
function togglePassport() {
    const booklet = document.getElementById('passportBooklet');
    if (booklet) {
        booklet.classList.toggle('is-open');
        playPageTurnSound();
    }
}

// Sound toggle
function toggleAudio() {
    soundEnabled = !soundEnabled;
    const btn = document.getElementById('audioToggleBtn');
    if (btn) {
        btn.innerHTML = soundEnabled ? '🔊' : '🔇';
    }
}

// Open & Close Intro Video Modal
function openIntroVideoModal() {
    const modal = document.getElementById('introVideoModal');
    const video = document.getElementById('cinemaVideo');
    if (modal) {
        modal.classList.add('is-active');
        if (video) {
            video.currentTime = 0;
            video.play().catch(e => {});
        }
    }
}

function closeIntroVideoModal() {
    const modal = document.getElementById('introVideoModal');
    const video = document.getElementById('cinemaVideo');
    if (modal) {
        modal.classList.remove('is-active');
        if (video) video.pause();
    }
}

function playPassportVideo() {
    const video = document.getElementById('passportVideo');
    const overlay = document.getElementById('passportVideoOverlay');
    if (video) {
        if (video.paused) {
            const playPromise = video.play();
            if (playPromise !== undefined) {
                playPromise.then(() => {
                    if (overlay) overlay.style.display = 'none';
                }).catch(error => {
                    console.warn('Auto-play blocked or source loading, showing controls:', error);
                    video.controls = true;
                    if (overlay) overlay.style.display = 'none';
                });
            }
        } else {
            video.pause();
            if (overlay) overlay.style.display = 'flex';
        }
    }
}

// Auto-hide play overlay when video plays
document.addEventListener('DOMContentLoaded', function() {
    const videos = document.querySelectorAll('video');
    videos.forEach(v => {
        v.addEventListener('play', function() {
            const overlay = document.getElementById('passportVideoOverlay');
            if (overlay) overlay.style.display = 'none';
        });
        v.addEventListener('pause', function() {
            const overlay = document.getElementById('passportVideoOverlay');
            if (overlay && v.id === 'passportVideo') overlay.style.display = 'flex';
        });
    });
});

function openMapModal() {
    const modal = document.getElementById('mapModal');
    if (modal) modal.classList.add('is-active');
}
window.openMapModal = openMapModal;

function closeMapModal() {
    const modal = document.getElementById('mapModal');
    if (modal) modal.classList.remove('is-active');
}
window.closeMapModal = closeMapModal;

// Open Calendar Selector
function openCalendarModal() {
    const modal = document.getElementById('calendarModal');
    if (modal) modal.classList.add('is-active');
}
window.openCalendarModal = openCalendarModal;

function closeCalendarModal() {
    const modal = document.getElementById('calendarModal');
    if (modal) modal.classList.remove('is-active');
}
window.closeCalendarModal = closeCalendarModal;

// Countdown Logic
function initCountdown() {
    const countdownEl = document.getElementById('weddingCountdown');
    if (!countdownEl) return;
    
    const targetDateStr = countdownEl.getAttribute('data-target') || '2026-08-27T19:00:00';
    const targetDate = new Date(targetDateStr).getTime();

    const daysEl = document.getElementById('cd-days');
    const hoursEl = document.getElementById('cd-hours');
    const minutesEl = document.getElementById('cd-minutes');
    const secondsEl = document.getElementById('cd-seconds');
    const noteEl = document.getElementById('cd-note');

    function updateTimer() {
        const now = new Date().getTime();
        const distance = targetDate - now;

        if (distance < 0) {
            if (daysEl) daysEl.innerText = "00";
            if (hoursEl) hoursEl.innerText = "00";
            if (minutesEl) minutesEl.innerText = "00";
            if (secondsEl) secondsEl.innerText = "00";
            if (noteEl) noteEl.innerText = translations[currentLang]?.countdown_completed || "Büyük Gün Geldi! ♥";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        if (daysEl) daysEl.innerText = String(days).padStart(2, '0');
        if (hoursEl) hoursEl.innerText = String(hours).padStart(2, '0');
        if (minutesEl) minutesEl.innerText = String(minutes).padStart(2, '0');
        if (secondsEl) secondsEl.innerText = String(seconds).padStart(2, '0');
    }

    updateTimer();
    setInterval(updateTimer, 1000);
}

// RSVP Form Handlers & Ticket Generation
document.addEventListener('DOMContentLoaded', function() {
    initCountdown();
    const rsvpForm = document.getElementById('rsvpForm');
    
    if (rsvpForm) {
        rsvpForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('guestName').value.trim();
            const attendance = document.getElementById('guestAttendance').value;
            const guests = document.getElementById('guestCount').value;
            const eventType = document.getElementById('guestEvent').value;
            const note = document.getElementById('guestNote').value;
            
            if (!name) {
                alert('Lütfen adınızı ve soyadınızı giriniz.');
                return;
            }
            
            // Send API Request
            fetch('api/rsvp.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    name: name,
                    attendance: attendance,
                    guests: guests,
                    event: eventType,
                    note: note
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showSouvenirTicketModal(data.data);
                } else {
                    alert(data.message || 'Bir hata oluştu.');
                }
            })
            .catch(err => {
                // Fallback local display if API offline
                const fallbackData = {
                    name: name,
                    seat: '01A',
                    gate: 'LOV27',
                    attendance: attendance,
                    guests: guests,
                    event: eventType
                };
                showSouvenirTicketModal(fallbackData);
            });
        });
    }
});

// Show Ticket Modal with Tear-Off Animation
function showSouvenirTicketModal(data) {
    if (data && data.attendance === 'no') {
        alert('Nazik bildiriminiz için teşekkür ederiz! Mesajınız Büşra & Emir çiftine iletildi. ♥');
        return;
    }

    const modal = document.getElementById('ticketModal');
    if (!modal) return;
    
    // Fill Ticket Fields
    document.getElementById('ticketPassengerName').textContent = data.name || 'Sayın Misafirimiz';
    document.getElementById('ticketGate').textContent = data.gate || 'LOV27';
    document.getElementById('ticketSeat').textContent = data.seat || '01A';
    if(document.getElementById('ticketGuests')) document.getElementById('ticketGuests').textContent = data.guests || '1';
    
    // Update stub fields
    const stubPass = document.querySelector('.stub-passenger');
    if (stubPass) stubPass.textContent = data.name || 'Sayın Misafirimiz';
    const stubGate = document.querySelector('.stub-gate');
    if (stubGate) stubGate.textContent = data.gate || 'LOV27';
    const stubSeat = document.querySelector('.stub-seat');
    if (stubSeat) stubSeat.textContent = data.seat || '01A';
    
    let eventName = 'KINA & DÜĞÜN';
    if (data.event === 'kina') eventName = 'KINA GECESİ';
    else if (data.event === 'dugun') eventName = 'DÜĞÜN TÖRENİ';
    document.getElementById('ticketClass').textContent = eventName;
    
    // Reset Stub State
    const stub = document.getElementById('ticketStubInteractive');
    if (stub) stub.classList.remove('is-torn');
    
    modal.classList.add('is-active');
}

function closeTicketModal() {
    const modal = document.getElementById('ticketModal');
    if (modal) modal.classList.remove('is-active');
}
window.closeTicketModal = closeTicketModal;

// Tear Stub Action
function tearTicketStub() {
    const stub = document.getElementById('ticketStubInteractive');
    if (stub) {
        stub.classList.toggle('is-torn');
        playTearSound();
    }
}
window.tearTicketStub = tearTicketStub;
window.togglePassport = togglePassport;
window.setLanguage = setLanguage;
window.downloadTicketImage = downloadTicketImage;

// Download Ticket Canvas as High-Res Image
function downloadTicketImage() {
    const passenger = document.getElementById('ticketPassengerName').textContent || 'Sayın Misafirimiz';
    const seat = document.getElementById('ticketSeat').textContent || '01A';
    const gate = document.getElementById('ticketGate').textContent || 'LOV27';
    let ticketClassEl = document.getElementById('ticketClass');
    const ticketClass = ticketClassEl ? ticketClassEl.textContent : 'FIRST CLASS';

    const canvas = document.createElement('canvas');
    canvas.width = 900;
    canvas.height = 400;
    const ctx = canvas.getContext('2d');

    // 1. Ticket Background
    ctx.fillStyle = '#f4f5f5';
    ctx.fillRect(0, 0, 900, 400);

    // 2. Header Bar (Light Blue)
    ctx.fillStyle = '#1ab0cf';
    ctx.fillRect(0, 0, 900, 60);

    // Header Text
    ctx.fillStyle = '#ffffff';
    ctx.font = 'bold 24px sans-serif';
    ctx.fillText('BOARDING PASS', 30, 40);
    ctx.fillText(ticketClass, 670, 40);

    // 3. Vertical Barcode (Left Edge)
    ctx.fillStyle = '#333333';
    const vBarWidths = [4, 8, 3, 10, 5, 2, 8, 4, 7, 3, 9, 4, 6, 2, 8, 5, 3, 6, 2, 8, 4];
    let curY = 80;
    for (let i = 0; i < vBarWidths.length; i++) {
        ctx.fillRect(30, curY, 35, vBarWidths[i] * 1.5);
        curY += (vBarWidths[i] * 1.5) + 6;
    }

    // 4. Passenger Details (Main Pass)
    ctx.fillStyle = '#777777';
    ctx.font = '14px sans-serif';
    ctx.fillText('PASSENGER', 100, 110);
    ctx.fillText('DATE', 350, 110);
    ctx.fillText('TIME', 500, 110);

    ctx.fillStyle = '#111111';
    ctx.font = 'bold 22px sans-serif';
    ctx.fillText(passenger.toUpperCase(), 100, 140);
    ctx.fillText('AUG 27, 2026', 350, 140);
    ctx.fillText('19:00', 500, 140);

    // Flight Route (Large)
    ctx.fillStyle = '#777777';
    ctx.font = '14px sans-serif';
    ctx.fillText('FROM', 100, 200);
    ctx.fillText('TO', 400, 200);

    ctx.fillStyle = '#111111';
    ctx.font = 'bold 50px sans-serif';
    ctx.fillText('LOVE', 100, 255);
    ctx.fillText('FOREVER', 400, 255);
    
    // Plane Icon (Simple triangle/shape simulation or text)
    ctx.fillStyle = '#1ab0cf';
    ctx.font = 'bold 50px sans-serif';
    ctx.fillText('✈', 300, 255);

    // Divider Line (Bottom row)
    ctx.strokeStyle = '#dddddd';
    ctx.lineWidth = 1;
    ctx.beginPath();
    ctx.moveTo(100, 290);
    ctx.lineTo(600, 290);
    ctx.stroke();

    // Flight Stats
    ctx.fillStyle = '#777777';
    ctx.font = '14px sans-serif';
    ctx.fillText('FLIGHT', 100, 320);
    ctx.fillText('GATE', 250, 320);
    ctx.fillText('TERMINAL', 400, 320);
    ctx.fillText('SEAT', 550, 320);

    ctx.fillStyle = '#111111';
    ctx.font = 'bold 22px sans-serif';
    ctx.fillText('BE 2026', 100, 350);
    ctx.fillText(gate, 250, 350);
    ctx.fillText('01', 400, 350);
    ctx.fillText(seat, 550, 350);

    ctx.fillStyle = '#999999';
    ctx.font = '11px sans-serif';
    ctx.fillText('GATE CLOSES 30 MINUTES BEFORE DEPARTURE', 100, 385);

    // Vertical Perforated Tear Line
    ctx.strokeStyle = '#cccccc';
    ctx.lineWidth = 2;
    ctx.setLineDash([8, 8]);
    ctx.beginPath();
    ctx.moveTo(650, 0);
    ctx.lineTo(650, 400);
    ctx.stroke();
    ctx.setLineDash([]);
    
    // White border trick
    ctx.fillStyle = '#ffffff';
    ctx.fillRect(652, 0, 2, 400);

    // 5. Stub Area (Right side)
    ctx.fillStyle = '#777777';
    ctx.font = '12px sans-serif';
    ctx.fillText('PASSENGER', 670, 100);
    ctx.fillText('FROM', 670, 160);
    ctx.fillText('TO', 670, 190);
    ctx.fillText('DATE', 780, 160);
    ctx.fillText('TIME', 780, 190);

    ctx.fillStyle = '#111111';
    ctx.font = 'bold 16px sans-serif';
    ctx.fillText(passenger.toUpperCase(), 670, 125);
    ctx.fillText('LOVE', 715, 160);
    ctx.fillText('FOREVER', 695, 190);
    ctx.fillText('AUG 27', 820, 160);
    ctx.fillText('19:00', 820, 190);

    ctx.fillStyle = '#777777';
    ctx.font = '12px sans-serif';
    ctx.fillText('FLIGHT', 670, 240);
    ctx.fillText('GATE', 760, 240);
    ctx.fillText('SEAT', 830, 240);

    ctx.fillStyle = '#111111';
    ctx.font = 'bold 16px sans-serif';
    ctx.fillText('BE 2026', 670, 265);
    ctx.fillText(gate, 760, 265);
    ctx.fillText(seat, 830, 265);

    // Horizontal Barcode (Stub)
    ctx.fillStyle = '#333333';
    const hBarWidths = [4, 8, 3, 10, 5, 2, 8, 4, 7, 3, 9, 4, 6, 2, 8, 5, 4, 9, 3, 2];
    let curX = 670;
    for (let i = 0; i < hBarWidths.length; i++) {
        ctx.fillRect(curX, 320, hBarWidths[i] * 1.5, 40);
        curX += (hBarWidths[i] * 1.5) + 4;
    }
    
    ctx.fillStyle = '#777777';
    ctx.font = '10px sans-serif';
    ctx.fillText('✂ KOPAR', 750, 380);

    // Trigger Download
    const link = document.createElement('a');
    link.download = 'Busra_Emir_Ucak_Bileti_' + passenger.replace(/\s+/g, '_') + '.png';
    link.href = canvas.toDataURL('image/png');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}


