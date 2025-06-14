<!DOCTYPE html>
<html lang="bg">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Вино и СПА хотел Чукара</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&family=Lora&display=swap"
      rel="stylesheet"
    />

    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />

    <script src="assets/js/restrict_dates.js"></script>

    <style>
      .hero {
        background-image: url("assets/images/hotel109.jpg");
        background-size: cover;
        background-position: center;
        height: 90vh;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <nav
      class="navbar navbar-expand-lg navbar-dark fixed-top"
      style="
        background: linear-gradient(to right, #3c423c, #2e342e);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      "
    >
      <div class="container">
        <h1 id="H1NAV">Вино и СПА хотел Чукара</h1>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto fs-5">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Начало</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="hotel.html">Хотел</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="rooms.php">Стаи</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Reservations.html">Резервации</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link position-relative"
                href="#"
                data-bs-toggle="modal"
                data-bs-target="#cartModal"
              >
                <i class="fa fa-shopping-cart"></i>
                <span
                  class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                  id="cart-count"
                  >0</span
                >
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="hero" data-aos="fade-in">
      <h1>Добре дошли в Чукара</h1>
    </section>

    <section
      class="section text-center"
      style="background-color: #faf6f0; padding: 30px 20px"
      data-aos="fade-up"
    >
      <div
        class="container"
        style="
          max-width: 800px;
          margin: auto;
          font-family: 'Lora', serif;
          color: #4a3c31;
        "
      >
        <h2
          style="
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 25px;
            margin-top: 50px;
          "
          data-aos="zoom-in"
        >
          Комплекс Чукара
        </h2>
        <p
          style="font-size: 25px; line-height: 1.6; margin-bottom: 20px"
          data-aos="fade-up"
          data-aos-delay="200"
        >
          Комплекс Чукара вдъхновява за почивка и релакс далече от големия град,
          стреса и динамиката на ежедневието. Инспириран от живота в провинция
          предлага на всички гости възможността да прекарат време сред
          природата, на чист въздух, с най-близките си хора. Условия и за
          най-изискания вкус – висококачествени вино, био плодове и зеленчуци,
          лукс за вас и вашите семейства.
        </p>
      </div>
    </section>

    <section class="section bg-light">
      <style>
        .card-img {
          height: 300px;
          object-fit: cover;
        }

        .overlay {
          background: rgba(0, 0, 0, 0.6);
          opacity: 0;
          transition: 0.4s ease-in-out;
          text-align: center;
        }

        .card:hover .overlay {
          opacity: 1;
        }
.star-rating {
  font-size: 60px;
  color: #ccc;
  cursor: pointer;
  text-align: center;
}

.star-rating .star.selected,
.star-rating .star:hover,
.star-rating .star.hovered {
  color: gold;
  transition: color 0.2s;
}


        
      </style>

      <div class="container">
        <div class="row g-4">
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div
              class="card position-relative overflow-hidden border-0 shadow-lg"
            >
              <img
                src="assets/images/wine.jpg"
                class="card-img"
                alt="Винарна"
              />
              <div
                class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white"
              >
                <h5 class="mb-2">Винарна Чукара</h5>
                <p class="small px-3">
                  Открийте изкуството на винопроизводството и се насладете на
                  винени дегустации с гледка.
                </p>
                <a href="winery.html" class="btn btn-outline-light mt-2"
                  >Виж повече</a
                >
              </div>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div
              class="card position-relative overflow-hidden border-0 shadow-lg"
            >
              <img src="assets/images/spa2.jpeg" class="card-img" alt="СПА" />
              <div
                class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white"
              >
                <h5 class="mb-2">СПА & Релакс</h5>
                <p class="small px-3">
                  Зона за пълен релакс – басейни, масажи, финландска сауна,
                  билкови терапии и още.
                </p>
                <a href="SPA.html" class="btn btn-outline-light mt-2"
                  >Виж повече</a
                >
              </div>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div
              class="card position-relative overflow-hidden border-0 shadow-lg"
            >
              <img
                src="assets/images/restaurant.jpg"
                class="card-img"
                alt="Ресторант"
              />
              <div
                class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white"
              >
                <h5 class="mb-2">Ресторант</h5>
                <p class="small px-3">
                  Насладете се на вкусна храна с местни продукти и гледка към
                  планината.
                </p>
                <a href="Restaurant.html" class="btn btn-outline-light mt-2"
                  >Виж повече</a
                >
              </div>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div
              class="card position-relative overflow-hidden border-0 shadow-lg"
            >
              <img
                src="assets/images/zoo3.jpg"
                class="card-img"
                alt="Зоопарк"
              />
              <div
                class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white"
              >
                <h5 class="mb-2">Зоопарк</h5>
                <p class="small px-3">
                  Разгледайте животните и зеленчуковите градини – перфектно за
                  цялото семейство.
                </p>
                <a href="zoo.html" class="btn btn-outline-light mt-2"
                  >Виж повече</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" style="padding: 30px 0" data-aos="fade-up">
      <div class="container text-center" style="max-width: 500px; margin: auto">
        <h2 class="text-center mb-5" data-aos="zoom-in">
          Намерете ни на картата
        </h2>
        <div style="border-radius: 12px; overflow: hidden; box-shadow: none">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2923.6116814547618!2d25.501402925683493!3d42.881039671149225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40a91d1732bf9453%3A0x6a5462de1b7e0753!2z0JLQuNC90L4g0Lgg0KHQn9CQINGF0L7RgtC10Lsg0KfRg9C60LDRgNCw!5e0!3m2!1sbg!2sbg!4v1747780145827!5m2!1sbg!2sbg"
            width="100%"
            height="320"
            style="border: 0; border-radius: 12px"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          >
          </iframe>
        </div>
      </div>
    </section>

    <section class="section bg-light py-5" data-aos="fade-up">
  <div class="container" style="max-width: 700px;">
    <h2 class="text-center mb-4">Споделете вашето мнение</h2>



<?php
$conn = new mysqli("localhost", "root", "", "hotel_db");
$conn->set_charset("utf8");

$result = $conn->query("SELECT * FROM reviews ORDER BY created_at DESC");

if ($result && $result->num_rows > 0):
?>
<section class="section bg-white py-5" data-aos="fade-up">
  <div class="container" style="max-width: 700px;">
    <h2 class="text-center mb-4">Мнения от гости</h2>

    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="border rounded p-3 mb-3 shadow-sm">
        <strong><?= htmlspecialchars($row['name']) ?></strong><br>

        <!-- Звезди -->
        <?php for ($i = 1; $i <= 5; $i++): ?>
          <span style="color:<?= $i <= $row['rating'] ? 'gold' : '#ccc' ?>; font-size: 20px;">&#9733;</span>
        <?php endfor; ?>

        <!-- Текст -->
        <p class="mt-2 mb-1"><?= nl2br(htmlspecialchars($row['review_text'])) ?></p>

        <!-- Снимка (ако има) -->
        <?php if (!empty($row['image_path'])): ?>
          <img src="<?= htmlspecialchars($row['image_path']) ?>" style="max-width: 100px; border-radius: 6px;" alt="Приложена снимка">
        <?php endif; ?>

        <small class="text-muted d-block mt-2"><?= $row['created_at'] ?></small>
      </div>
    <?php endwhile; ?>
  </div>
</section>
<?php endif; ?>







    <form action="submit_review.php" method="POST" enctype="multipart/form-data" class="p-4 shadow rounded bg-white">
      <div class="mb-3">
        <label for="name" class="form-label">Име</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>

  <div class="mb-3">
  <label class="form-label d-block">Оценка</label>
  <div class="star-rating">
    <input type="hidden" name="rating" id="rating" required>
    <span class="star" data-value="1">&#9733;</span>
    <span class="star" data-value="2">&#9733;</span>
    <span class="star" data-value="3">&#9733;</span>
    <span class="star" data-value="4">&#9733;</span>
    <span class="star" data-value="5">&#9733;</span>
  </div>
</div>


      <div class="mb-3">
        <label for="review_text" class="form-label">Вашето мнение</label>
        <textarea class="form-control" id="review_text" name="review_text" rows="4" required></textarea>
      </div>

      <div class="mb-4">
        <label for="review_image" class="form-label">Снимка (по избор)</label>
        <input class="form-control" type="file" id="review_image" name="review_image" accept="image/*">
      </div>

      <button type="submit" class="btn btn-dark w-100">Изпрати мнение</button>
    </form>
  </div>
</section>

    <footer
      class="footer text-center"
      style="
        background-color: #2f2e2c;
        color: #d3d3d3;
        padding: 20px 15px;
        font-family: 'Lora', serif;
      "
    >
      <div class="container">
        <p style="margin: 0 0 8px; font-size: 16px">
          Вино и СПА хотел Чукара &nbsp;&bull;&nbsp;
          <a
            href="mailto:reservations@chukara.bg"
            style="color: #d3d3d3; text-decoration: none"
            >reservations@chukara.bg</a
          >
          &nbsp;&bull;&nbsp; +359 897 404 404
        </p>
        <p style="margin: 0 0 12px; font-size: 14px; opacity: 0.7">
          ул. „Хан Кубрат“ 12, гр. Трявна, България
        </p>
        <div>
          <a
            href="https://facebook.com/chukara.tryavna"
            class="fa fa-facebook social-icon"
            aria-label="Facebook"
          ></a>
          <a
            href="https://instagram.com/chukara.tryavna"
            class="fa fa-instagram social-icon"
            aria-label="Instagram"
          ></a>
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
  const stars = document.querySelectorAll('.star-rating .star');
  const ratingInput = document.getElementById('rating');

  stars.forEach((star, index) => {
    star.addEventListener('click', () => {
      ratingInput.value = star.dataset.value;
      stars.forEach((s, i) => {
        s.classList.toggle('selected', i <= index);
      });
    });

    star.addEventListener('mouseover', () => {
      stars.forEach((s, i) => {
        s.classList.toggle('hovered', i <= index);
      });
    });

    star.addEventListener('mouseout', () => {
      stars.forEach((s) => s.classList.remove('hovered'));
    });
  });
</script>

  </body>
</html>
