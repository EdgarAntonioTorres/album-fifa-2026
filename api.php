<?php
// ============================================
// api.php - API REST para el álbum 2026
// ============================================
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

// --- Configuración de base de datos ---
$host = 'localhost';
$db = 'album2026';
$user = 'root';
$pass = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'DB Error: ' . $e->getMessage()]);
    exit;
}

$action = $_GET['action'] ?? '';

switch ($action) {

    case 'resumen':
        $sql = "
            SELECT s.id, s.tipo, s.nombre, s.simbolo, s.total_estampas,
                   COALESCE(SUM(CASE WHEN e.tengo > 0 THEN 1 ELSE 0 END), 0) AS tengo,
                   COALESCE(SUM(CASE WHEN e.tengo > 1 THEN e.tengo - 1 ELSE 0 END), 0) AS repetidas
            FROM secciones s
            LEFT JOIN estampas e ON e.seccion_id = s.id
            GROUP BY s.id ORDER BY s.orden";
        $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $totales = ['total' => 0, 'tengo' => 0, 'repetidas' => 0];
        foreach ($rows as &$r) {
            $r['total_estampas'] = (int) $r['total_estampas'];
            $r['tengo'] = (int) $r['tengo'];
            $r['repetidas'] = (int) $r['repetidas'];
            $r['faltan'] = $r['total_estampas'] - $r['tengo'];
            $r['pct'] = $r['total_estampas'] > 0 ? round($r['tengo'] / $r['total_estampas'] * 100, 1) : 0;
            $totales['total'] += $r['total_estampas'];
            $totales['tengo'] += $r['tengo'];
            $totales['repetidas'] += $r['repetidas'];
        }
        $totales['faltan'] = $totales['total'] - $totales['tengo'];
        $totales['pct'] = $totales['total'] > 0 ? round($totales['tengo'] / $totales['total'] * 100, 1) : 0;
        echo json_encode(['secciones' => $rows, 'totales' => $totales]);
        break;

    case 'estampas_by_nombre':
        $nombre = trim($_GET['nombre'] ?? '');
        if (!$nombre) {
            echo json_encode(['error' => 'nombre requerido']);
            break;
        }
        $sec = $pdo->prepare("SELECT * FROM secciones WHERE nombre = ? LIMIT 1");
        $sec->execute([$nombre]);
        $seccion = $sec->fetch(PDO::FETCH_ASSOC);
        if (!$seccion) {
            echo json_encode(['error' => 'Seccion no encontrada']);
            break;
        }
        $est = $pdo->prepare("SELECT numero, tengo FROM estampas WHERE seccion_id = ? ORDER BY numero");
        $est->execute([$seccion['id']]);
        $estampas = $est->fetchAll(PDO::FETCH_ASSOC);
        foreach ($estampas as &$e) {
            $e['numero'] = (int) $e['numero'];
            $e['tengo'] = (int) $e['tengo'];
        }
        echo json_encode(['seccion' => $seccion, 'estampas' => $estampas]);
        break;

    case 'actualizar':
        $sid = (int) ($_POST['seccion_id'] ?? 0);
        $num = (int) ($_POST['numero'] ?? 0);
        $tengo = max(0, (int) ($_POST['tengo'] ?? 0));
        $stmt = $pdo->prepare("UPDATE estampas SET tengo = ? WHERE seccion_id = ? AND numero = ?");
        $ok = $stmt->execute([$tengo, $sid, $num]);
        echo json_encode(['ok' => $ok, 'tengo' => $tengo]);
        break;

    case 'repetidas':
        $sql = "SELECT s.nombre, s.simbolo, e.numero, e.tengo, (e.tengo - 1) AS repetidas
                FROM estampas e JOIN secciones s ON s.id = e.seccion_id
                WHERE e.tengo > 1 ORDER BY s.orden, e.numero";
        $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as &$r) {
            $r['numero'] = (int) $r['numero'];
            $r['tengo'] = (int) $r['tengo'];
            $r['repetidas'] = (int) $r['repetidas'];
        }
        echo json_encode(['repetidas' => $rows]);
        break;

    default:
        http_response_code(400);
        echo json_encode(['error' => "Accion no valida: $action"]);
}