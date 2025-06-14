<?php
$conn = new mysqli("localhost", "root", "", "hotel_db");
if ($conn->connect_error) die("Грешка при свързване: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM reviews ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="bg">
<head>
  <meta charset="UTF-8" />
  <title>Мнения на клиенти</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container py-5">
  <h2 class="text-center mb-4">Мнения на клиенти</h2>

  <?php if ($result && $result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="card mb-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($row['name']) ?> <small class="text-muted">– <?= intval($row['rating']) ?>/5</small></h5>
          <p class="card-text"><?= nl2br(htmlspecialchars($row['review_text'])) ?></p>
          <?php if (!empty($row['image_path'])): ?>
            <img src="<?= htmlspecialchars($row['image_path']) ?>" alt="Снимка" class="img-fluid rounded" style="max-width: 300px;">
          <?php endif; ?>
          <p class="text-end text-muted mb-0 mt-3"><small>Публикувано на <?= $row['created_at'] ?></small></p>
        </div>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p class="text-center">Все още няма отзиви.</p>
  <?php endif; ?>

  <div class="text-center mt-4">
    <a href="index.html" class="btn btn-secondary">⬅ Обратно към началото</a>
  </div>
</div>
</body>
</html>
