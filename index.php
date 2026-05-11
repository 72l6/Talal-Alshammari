<?php
$conn = new mysqli("localhost", "root", "", "portfolio_db", 3307);

if ($conn->connect_error) {
    die();
}

$result = $conn->query("SELECT * FROM profile_data");
$profile_data = [];

while($row = $result->fetch_assoc()) {
    if($row['item_type'] == 'big') {
        $profile_data[] = ['type' => 'big', 'text' => $row['text_val']];
    } else {
        $profile_data[] = ['type' => 'card', 'title' => $row['title'], 'body' => $row['body']];
    }
}
$json_data = json_encode($profile_data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TALAL // PORTFOLIO</title>
    <script src="https://unpkg.com/@studio-freight/lenis@1.0.33/dist/lenis.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;800&family=Syncopate:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="scanlines"></div>
    <div class="vignette"></div>
    <div class="noise"></div>

    <nav class="hud">
        <div class="hud-top">
            <a href="#" style="color:inherit;text-decoration:none;">ID: <strong>202204099</strong></a>
            <div class="hud-line"></div>
            <a href="#" style="color:inherit;text-decoration:none;">PORTFOLIO // 2026</a>
        </div>
        <div class="center-nav">SW_ENGINEER // DATA_STREAM</div>
        <div class="hud-bottom">
            <a href="#" style="color:inherit;text-decoration:none;">LOC: <strong>HAIL_SA</strong></a>
            <div class="hud-line"></div>
            <a href="#" style="color:inherit;text-decoration:none;">TALAL MOHAMMED AL-SHAMMARI</a>
        </div>
    </nav>

    <div class="viewport" id="viewport">
        <div class="world" id="world"></div>
    </div>

    <div class="scroll-proxy"></div>

    <script>
        const PROFILE_DATA = <?php echo $json_data; ?>;
    </script>
    <script src="script.js"></script>
</body>
</html>