<?php
$host = "DB_HOST";
$user = "DB_USER";
$pass = "DB_PASSWORD";
$db   = "DB_NAME";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die();
}

$sql = "SELECT section_type, title, content FROM profile_data ORDER BY sort_order ASC";
$result = $conn->query($sql);
$data = [];

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = [
            'type' => $row['section_type'],
            'text' => $row['title'],
            'title' => $row['title'],
            'body' => $row['content']
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TALAL // PORTFOLIO</title>
    <script src="https://unpkg.com/@studio-freight/lenis@1.0.33/dist/lenis.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script>
        const PROFILE_DATA = <?php echo json_encode($data); ?>;
    </script>
</head>
<body>
    <div class="hud">
        <div class="hud-top">
            <span>ID: <strong>202204099</strong></span>
            <div class="hud-line"></div>
            <span>PORTFOLIO // 2026</span>
        </div>
        <div class="hud-bottom">
            <span>LOC: <strong>HAIL_SA</strong></span>
            <div class="hud-line"></div>
            <span>TALAL MOHAMMED AL-SHAMMARI</span>
        </div>
    </div>

    <div class="viewport" id="viewport">
        <div class="world" id="world"></div>
    </div>

    <div class="contact-section">
        <div class="card contact-card">
            <h2>CONTACT ME</h2>
            <form action="#" method="POST">
                <input type="text" name="name" placeholder="YOUR NAME" required>
                <input type="email" name="email" placeholder="YOUR EMAIL" required>
                <textarea name="message" placeholder="YOUR MESSAGE" required></textarea>
                <button type="submit">SEND_SIGNAL</button>
            </form>
        </div>
    </div>

    <div class="scroll-proxy"></div>
    <script src="script.js"></script>
</body>
</html>
