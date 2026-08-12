<?php
require_once __DIR__ . '/../config.php';

$type = $_GET['type'] ?? 'dugun'; // 'kina' or 'dugun'

if ($type === 'kina') {
    $summary = "Büşra & Emir — Kına Gecesi";
    $dtStart = "20260826T200000";
    $dtEnd   = "20260826T233000";
    $description = "Büşra & Emir Çiftinin Kına Gecesi Töreni";
} else {
    $summary = "Büşra & Emir — Düğün Töreni";
    $dtStart = "20260827T190000";
    $dtEnd   = "20260827T235900";
    $description = "Büşra & Emir Çiftinin Düğün Töreni";
}

$location = "Çırağan Kına/Düğün Salonu, Bağcılar Evrim Alataş Cd. No:4 Bağlar/Diyarbakır";

header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename="busra-emir-' . $type . '.ics"');

echo "BEGIN:VCALENDAR\r\n";
echo "VERSION:2.0\r\n";
echo "PRODID:-//Busra Emir Wedding//NONSGML Event//EN\r\n";
echo "CALSCALE:GREGORIAN\r\n";
echo "BEGIN:VEVENT\r\n";
echo "UID:" . uniqid() . "@busra-emir.com.tr\r\n";
echo "DTSTAMP:" . gmdate('Ymd\THis\Z') . "\r\n";
echo "DTSTART;TZID=Europe/Istanbul:" . $dtStart . "\r\n";
echo "DTEND;TZID=Europe/Istanbul:" . $dtEnd . "\r\n";
echo "SUMMARY:" . $summary . "\r\n";
echo "DESCRIPTION:" . $description . "\r\n";
echo "LOCATION:" . $location . "\r\n";
echo "STATUS:CONFIRMED\r\n";
echo "END:VEVENT\r\n";
echo "END:VCALENDAR\r\n";
