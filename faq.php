<?php
include('header.php');
?>
  <div class="page-shell">
    <section class="page-hero">
      <div class="container">
        <span class="page-badge"><i class="fas fa-question-circle"></i> Support Center</span>
        <h1>Answers to common questions.</h1>
        <p>Everything you need to know before joining or continuing your learning journey.</p>
      </div>
    </section>
    <section class="section-block">
      <div class="container">
        <div class="accordion" id="faqAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne">Do I get a certificate?</button></h2>
            <div id="faqOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion"><div class="accordion-body">Yes, every completed program includes a certificate and progress report.</div></div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo">Can I access courses on mobile?</button></h2>
            <div id="faqTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion"><div class="accordion-body">Absolutely. All content is mobile-friendly and fully responsive.</div></div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php
include('footer.php');
?>






