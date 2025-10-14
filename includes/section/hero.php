<section class="hero-section" id="home">
  <div class="container" data-aos="fade-up">
    <div class="text-content" data-aos="fade-right" data-aos-delay="100">
      <h1 class="hero-title" data-aos="fade-down" data-aos-delay="200">
        <?= htmlspecialchars($personal['tagline']) ?>
      </h1>
      <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="300">
        Hi, I'm <?= htmlspecialchars($personal['full_name']) ?>. I'm a Software Developer specialising in Web Development.
      </p>
      <p class="hero-text" data-aos="fade-up" data-aos-delay="400">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio possimus quod maxime nobis perspiciatis? Totam ea debitis vero laudantium. Suscipit, voluptatum exercitationem laborum rem perferendis illo architecto consequatur debitis.
      </p>

      <div class="info-section" data-aos="fade-up" data-aos-delay="500">
        <div class="info-item">
          <h4>Age</h4>
          <p class="hero-text">21</p>
        </div>
        <div class="info-item">
          <h4>Location</h4>
          <p class="hero-text">Zone 5 Agos Bato Camarines Sur</p>
        </div>
      </div>

      <a href="path/to/your-cv.pdf" download="Your-Name-CV.pdf" 
         class="btn btn-success"
         data-aos="zoom-in"
         data-aos-delay="600">
        <i class="bi bi-download me-2"></i>
        Download CV
      </a>
    </div>

    <div data-aos="fade-left" data-aos-delay="700">
      <img src="<?= htmlspecialchars($personal['profile_picture_url']) ?>" class="heart-card-img" alt="Tamara Sredojevic - UX Designer">
    </div>
  </div>
</section>
