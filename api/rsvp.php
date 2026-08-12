<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    $input = $_POST;
}

$name = trim($input['name'] ?? '');
$attendance = trim($input['attendance'] ?? 'yes'); // 'yes' or 'no'
$guests = intval($input['guests'] ?? 1);
$event = trim($input['event'] ?? 'both'); // 'both', 'kina', 'dugun'
$note = trim($input['note'] ?? '');

if (empty($name)) {
    echo json_encode(['success' => false, 'message' => 'Lütfen adınızı ve soyadınızı giriniz.']);
    exit;
}

$rsvpData = [
    'name' => htmlspecialchars($name, ENT_QUOTES, 'UTF-8'),
    'attendance' => $attendance === 'yes' ? 'yes' : 'no',
    'guests' => max(1, min(10, $guests)),
    'event' => htmlspecialchars($event, ENT_QUOTES, 'UTF-8'),
    'note' => htmlspecialchars($note, ENT_QUOTES, 'UTF-8')
];

$saved = saveRSVP($rsvpData);

echo json_encode([
    'success' => true,
    'message' => 'Katılım kaydınız başarıyla alındı!',
    'data' => $saved
]);
