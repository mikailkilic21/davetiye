# Aşk Pasaportu — Düğün Davetiye Sitesi Tasarım Spesifikasyonu
**Site:** busra-emir.com.tr
**Tema adı:** "Aşk Pasaportu" (Love Passport / Journey Theme)
**Not:** İstanbul görselleri (Kız Kulesi vb.) tamamen estetik/tema amaçlıdır — "aşk yolculuğu" motifini desteklemek için kullanılır. Gerçek düğün mekânı **Diyarbakır'dır**, bu bilgi tüm içerik alanlarında doğru şekilde gösterilecektir.

---

## 1. Genel Bilgiler (Gerçek Veri)

| Alan | Değer |
|---|---|
| Çift | Büşra & Emir |
| Gelin ailesi | Pınar & Şeyhmus AVA |
| Damat ailesi | Sibel & Mikail KILIÇ |
| Kına Gecesi | 26 Ağustos 2026, Çarşamba — 20:00 |
| Düğün | 27 Ağustos 2026, Perşembe — 19:00 |
| Mekân (her ikisi de) | Çırağan Kına/Düğün Salonu |
| Adres | Bağcılar, Evrim Alataş Caddesi No:4, 21090 Bağlar/Diyarbakır |
| Diller | Türkçe (TR) · Kurdî (KU) · Deutsch (DE) |
| Altyapı | Framework-free PHP, cPanel/Plesk shared hosting |

> Tasarımdaki "MEKÂN: İstanbul (Belirlenecek)" ve "KONUM (Detaylar Yakında)" ifadeleri mockup görselinden kalma placeholder'lardır — canlı sitede bunların yerine yukarıdaki gerçek Diyarbakır bilgileri sabit olarak gösterilecek (yönetim panelinden değiştirilebilir).

---

## 2. Sayfa Yapısı (Görseldeki Sıra)

### 2.1 Üst Bar (Sticky Header)
- Sol: "B • E" monogram logo
- Sağ: Dil değiştirici (TR / KURDÎ / DE — pill/toggle buton grubu, aktif dil dolgulu)
- En sağ: Hamburger menü ikonu (mobilde/gerekirse açılır menü: Ana Sayfa, Hikayemiz, Detaylar, RSVP)

### 2.2 Hero — "Pasaport" Bölümü
- Sol: Kapalı pasaport görünümü (bordo/koyu kırmızı deri doku, altın kenar/köşe detayları)
  - "AŞK PASAPORTU" üst yazı + kalp ikonu
  — Dairesel damga: "LOVE HAS NO BORDERS" + uçak ikonu
  - Orta: "B • E" büyük altın harfler
  - Alt: "BÜŞRA & EMİR" + "27.08.2026"
  - Alt-orta: küçük çip/pasaport ikonu
- Sağ: Video kartı (sepia/vintage filtreli tanıtım videosu, ortada play butonu)
  - Video kontrol çubuğu: zaman göstergesi, ses, tam ekran
  - Video içeriği yönetim panelinden yüklenebilir/değiştirilebilir (mp4, kapak görseli seçimi)
- Alt yazı: "♥ Aşk Yolculuğuna Hoş Geldiniz ♥" + "Pasaportunuzu açın ve bizimle bu özel yolculuğa çıkın."
- Aşağı kaydırma ipucu (küçük kalp/ok ikonu)

**Etkileşim:** Sayfa ilk açıldığında pasaport kapağı "açılma" animasyonu ile videoya geçiş yapabilir (opsiyonel, önceki tasarımdaki zarf-açılma animasyonunun pasaport versiyonu).

### 2.3 Trilingual Karşılama Şeridi (Damga Kartı)
- Sol: Dairesel "LOVE ✦ DEPARTURE — 27.08.2026" damga grafiği + uçak izi çizgisi
- 3 sütun (TR / KURDÎ / DE), her biri:
  - Küçük dil etiketi (pill)
  - O dildeki karşılama cümlesi ("Aşk Yolculuğuna Hoş Geldiniz" / Kurdî karşılığı / Almanca karşılığı)
  - Kalp ikonu
- Bu metinler yönetim panelinden 3 dilde ayrı ayrı düzenlenebilir olacak.

### 2.4 Boarding Pass (Biniş Kartı) — Ana Bilgi Kartı
Uçak bileti tasarımında, ortada perforasyon/biletle ayrılmış barkod şeridi:
- Üst: uçak ikonu + "BOARDING PASS" + alt başlık "AŞK YOLCULUĞU"
- PASSENGER: **Büşra & Emir**
- DATE: **27.08.2026**
- FROM: **Love** → TO: **Forever** (ortada dünya haritası + uçuş rotası noktalı çizgi, kalp ikonu)
- Alt satır: GATE (örn. sembolik "LOV27"), SEAT (sembolik "2A"), BOARDING (**19:00** — gerçek düğün saati), CLASS ("FIRST CLASS")
- Sağ şerit (bilet kuşağı): dikey "LOVE • FOREVER" yazısı + barkod deseni

> Not: GATE/SEAT gibi alanlar tamamen dekoratiftir; BOARDING saati gerçek tören saatiyle (19:00) eşleştirilmeli, karışıklık olmaması için.

### 2.5 Davet Detayları (Grid — 5 kart)
Yatay kart grubu, her biri ikon + başlık + değer:
1. **TARİH** (takvim ikonu) — 27.08.2026, Perşembe
2. **SAAT** (saat ikonu) — 19:00
3. **MEKÂN** (bina ikonu) — Çırağan Kına/Düğün Salonu
4. **KONUM** (pin ikonu) — Bağcılar, Evrim Alataş Cd. No:4, Bağlar/Diyarbakır (tıklanınca harita/yol tarifi açılır)
5. **RSVP** (zarf ikonu) — "Katılımınızı bekliyoruz" → RSVP formuna link/scroll

Alt yazı: "Sizleri aramızda görmekten mutluluk duyarız."

> Kına Gecesi (26.08.2026, 20:00) için ayrı bir mini kart veya bu grid'in üstünde ikinci bir "İKİNCİ DURAK" / "Kına Gecesi" boarding-pass mini kartı eklenebilir — aynı seyahat temasıyla ("Hazırlık Durağı" gibi).

### 2.6 Hikayemiz Bölümü
- Sol: Başlık "BİZİM HİKÂYEMİZ" + kısa metin (düzenlenebilir, çift tarafından girilecek serbest metin) + italik kapanış cümlesi ("Sonsuza dek…")
- Sağ: Vintage/sepia şehir/manzara görseli (İstanbul görseli burada tema devamlılığı için kalabilir, dekoratif) + iki damga grafiği:
  - "VİSA APPROVED ♥" (dairesel damga)
  - "IMMIGRATION FOREVER — 27 AUG 2026 — [Şehir]" (dikdörtgen damga; buradaki şehir alanı gerçek düğün şehri **Diyarbakır** olarak ayarlanabilir ya da tamamen sembolik "FOREVER" bırakılabilir)

### 2.7 Alt Aksiyon Çubuğu (Sticky/Footer Butonlar)
3 buton, ikon + iki satır etiket:
1. **RSVP** — "Katılacağım" (RSVP formunu açar)
2. **KONUM** — "Yol Tarifi Al" (Google Maps'e Diyarbakır adresiyle yönlendirir)
3. **TAKVİME EKLE** — "Hatırlatıcı Kur" (.ics dosyası indirir / Google Calendar linki — Kına ve Düğün için ayrı ayrı seçenek sunulabilir)

Kapanış cümlesi: "Aşkımızın Yolculuğuna Sizi de Bekliyoruz."

---

## 3. Trilingual İçerik Yönetimi

Tüm metin alanları (başlıklar, karşılama cümleleri, hikaye metni, buton etiketleri) 3 dilde ayrı sütunlar/alanlar olarak veritabanında tutulacak:
- `tr`, `ku`, `de` alanları her içerik satırı için
- Dil değiştirici üstteki state'i günceller, sayfa yeniden yüklenmeden (JS ile) veya `?lang=` query param ile içerik değişir
- Varsayılan dil: TR

---

## 4. Yönetilebilir Arka Plan / İçerik (Admin Panel Kapsamı)

Basit, framework-free PHP admin paneli (şifre korumalı `/admin`) üzerinden düzenlenebilecek alanlar:

- **Genel ayarlar:** Çift isimleri, tarih(ler), saat(ler), mekân adı, adres, harita linki
- **Renk/tema:** Ana renk (bordo/koyu kırmızı varsayılan), altın vurgu rengi, arka plan dokusu/rengi seçimi (deri dokusu, kraft kağıt dokusu vb. hazır seçeneklerden veya custom hex)
- **Medya:** Hero video (mp4 upload + kapak görseli), hikaye bölümü arka plan görseli, favicon/monogram
- **Metinler:** Karşılama cümlesi (3 dil), hikaye metni (3 dil), kapanış cümlesi (3 dil) — WYSIWYG olmayan basit textarea yeterli
- **Damga/etiket metinleri:** "LOVE HAS NO BORDERS", "VİSA APPROVED", "IMMIGRATION FOREVER" gibi dekoratif damga yazıları da düzenlenebilir olacak
- **RSVP yanıtları:** Basit tablo görünümü (isim, katılım durumu, kişi sayısı, not) — DB'ye kaydedilen RSVP'leri admin panelden listeleme/CSV dışa aktarma

---

## 5. Teknik Notlar

- **Backend:** Framework-free PHP 8.x, cPanel/Plesk paylaşımlı hosting uyumlu
- **Veritabanı:** MySQL — `settings` (key-value çift ayarları), `content_translations` (id, key, tr, ku, de), `rsvp` tabloları
- **Frontend:** Vanilla CSS/JS, vintage/deri doku arka planlar için CSS `background-image` + `filter: sepia()` kombinasyonu; damga grafikleri SVG olarak (yönetim panelinden metin override edilebilir)
- **Animasyonlar:** Sayfa açılışında pasaport kapağı açılma efekti (CSS transform/transition), scroll-reveal efektleri kartlarda
- **Responsive:** Mobile-first — görseldeki dikey mobil layout referans alınacak
- **Video:** Native HTML5 `<video>` + custom kontrol çubuğu (play/pause, süre, ses, tam ekran)
- **Takvime ekle:** `.ics` dosyası PHP ile dinamik üretilecek (Kına ve Düğün için ayrı event)

---

## 6. Açık Kalan Kararlar

- Kına Gecesi için ayrı bir "ikinci biniş kartı" eklenecek mi, yoksa tek boarding pass içinde iki tarih mi gösterilecek?
- Hikaye bölümündeki metin (Türkçe/Kurdî/Almanca) çiftten alınacak — henüz teslim edilmedi
- Tanıtım videosu içeriği/dosyası henüz belirtilmedi
