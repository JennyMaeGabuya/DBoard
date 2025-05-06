<?php
$uploadDir = __DIR__ . '/uploads/footers/';
$logFile = __DIR__ . '/footer_log.json';

// Create directories/files if they don't exist
if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
if (!file_exists($logFile)) file_put_contents($logFile, json_encode([]));

// Load log
$logData = json_decode(file_get_contents($logFile), true);

// ===== HANDLE UPLOAD =====
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['footer_image'])) {
    $file = $_FILES['footer_image'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png'];

    if (in_array($ext, $allowed)) {
        $timestamp = time();
        $newFileName = "footer_$timestamp.$ext";
        $destination = $uploadDir . $newFileName;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            // Move old current-footer to archive
            foreach (glob($uploadDir . 'current-footer.*') as $oldCurrent) {
                $oldExt = pathinfo($oldCurrent, PATHINFO_EXTENSION);
                $archivedName = "footer_" . time() . "_old.$oldExt";
                rename($oldCurrent, $uploadDir . $archivedName);
                $logData[] = ['file' => $archivedName, 'date' => date('Y-m-d H:i:s')];
            }

            // Copy new file as current
            copy($destination, $uploadDir . 'current-footer.' . $ext);

            // Log new upload
            $logData[] = ['file' => $newFileName, 'date' => date('Y-m-d H:i:s')];
            file_put_contents($logFile, json_encode($logData));
        }
    }
    header("Location: footer-manager.php");
    exit;
}

// ===== HANDLE RESTORE =====
if (isset($_GET['restore']) && isset($_GET['file'])) {
    $fileToRestore = basename($_GET['file']);
    $ext = pathinfo($fileToRestore, PATHINFO_EXTENSION);

    if (file_exists($uploadDir . $fileToRestore)) {
        // Archive current
        foreach (glob($uploadDir . 'current-footer.*') as $oldCurrent) {
            $oldExt = pathinfo($oldCurrent, PATHINFO_EXTENSION);
            $archivedName = "footer_" . time() . "_old.$oldExt";
            rename($oldCurrent, $uploadDir . $archivedName);
            $logData[] = ['file' => $archivedName, 'date' => date('Y-m-d H:i:s')];
        }

        copy($uploadDir . $fileToRestore, $uploadDir . 'current-footer.' . $ext);

        // Log restore
        $logData[] = ['file' => $fileToRestore, 'date' => date('Y-m-d H:i:s') . ' (restored)'];
        file_put_contents($logFile, json_encode($logData));
    }

    header("Location: footer-manager.php");
    exit;
}

// ===== DISPLAY DATA =====
$currentFooter = glob($uploadDir . 'current-footer.*');
$currentFooterPath = $currentFooter ? basename($currentFooter[0]) : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Footer Manager</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="p-4">
    <div class="row">
        <!-- Latest Footer -->
        <div class="col-md-6">
            <h4>Latest Footer</h4>
            <?php if ($currentFooterPath): ?>
                <img src="uploads/footers/<?php echo $currentFooterPath; ?>" class="img-fluid mb-3">
            <?php else: ?>
                <p>No footer uploaded yet.</p>
            <?php endif; ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input class="form-control" type="file" name="footer_image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Upload New Footer</button>
            </form>
        </div>

        <!-- Previous Footers -->
        <div class="col-md-6">
            <h4>Previous Footers</h4>
            <ul class="list-group">
                <?php
                $shown = [];
                foreach (array_reverse($logData) as $log):
                    if (!in_array($log['file'], $shown) && $log['file'] !== $currentFooterPath):
                        $shown[] = $log['file'];
                        ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <small><?php echo $log['date']; ?></small>
                            <div>
                                <a href="uploads/footers/<?php echo urlencode($log['file']); ?>" target="_blank" class="btn btn-sm btn-outline-info">View</a>
                                <a href="?restore=true&file=<?php echo urlencode($log['file']); ?>" class="btn btn-sm btn-outline-warning">Restore</a>
                            </div>
                        </li>
                <?php endif; endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>
