<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 hero-content">
                <h1 class="display-4 fw-bold mb-4">एनजीओ विक्रांत में आपका स्वागत है</h1>
                <p class="lead mb-4">सामाजिक सेवा के लिए समर्पित संगठन। हम समाज के कल्याण के लिए विवाह सहायता, मृत्यु सहायता, और शिक्षा सहायता प्रदान करते हैं।</p>
                <div class="d-flex gap-3 flex-wrap">
                    <?php if ($isLoggedIn): ?>
                        <?php if ($user_role === 'admin'): ?>
                            <a href="/admin/dashboard" class="btn btn-primary btn-lg">
                                <i class="fas fa-tachometer-alt me-2"></i>एडमिन पैनल
                            </a>
                        <?php else: ?>
                            <a href="/member/dashboard" class="btn btn-primary btn-lg">
                                <i class="fas fa-tachometer-alt me-2"></i>डैशबोर्ड
                            </a>
                        <?php endif; ?>
                        <a href="/logout" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-sign-out-alt me-2"></i>लॉगआउट
                        </a>
                    <?php else: ?>
                        <a href="/register" class="btn btn-primary btn-lg">
                            <i class="fas fa-user-plus me-2"></i>आज ही जुड़ें
                        </a>
                        <a href="/login" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-sign-in-alt me-2"></i>लॉगिन करें
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                     alt="सामाजिक सेवा" 
                     class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">हमारी सेवाएं</h2>
            <p class="section-subtitle">समाज सेवा के लिए हमारी विभिन्न योजनाएं</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card service-card">
                    <div class="card-body text-center p-5">
                        <div class="service-icon vivah">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h5 class="card-title fw-bold mb-3">बेटी विवाह सहायता</h5>
                        <p class="card-text text-muted mb-4">गरीब परिवारों की बेटियों के विवाह के लिए आर्थिक सहायता प्रदान करते हैं।</p>
                        <a href="/beti-vivah" class="btn btn-outline-primary">
                            <i class="fas fa-info-circle me-2"></i>और पढ़ें
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card service-card">
                    <div class="card-body text-center p-5">
                        <div class="service-icon death">
                            <i class="fas fa-praying-hands"></i>
                        </div>
                        <h5 class="card-title fw-bold mb-3">मृत्यु सहायता</h5>
                        <p class="card-text text-muted mb-4">परिवार के मुखिया की मृत्यु पर आर्थिक सहायता प्रदान करते हैं।</p>
                        <a href="/death-help" class="btn btn-outline-primary">
                            <i class="fas fa-info-circle me-2"></i>और पढ़ें
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card service-card">
                    <div class="card-body text-center p-5">
                        <div class="service-icon education">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h5 class="card-title fw-bold mb-3">शिक्षा सहायता</h5>
                        <p class="card-text text-muted mb-4">मेधावी छात्रों को शिक्षा के लिए आर्थिक सहायता प्रदान करते हैं।</p>
                        <a href="/education-help" class="btn btn-outline-primary">
                            <i class="fas fa-info-circle me-2"></i>और पढ़ें
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <div class="stat-label">सफल विवाह सहायता</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <span class="stat-number">200+</span>
                    <div class="stat-label">मृत्यु सहायता प्रदान</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <span class="stat-number">1000+</span>
                    <div class="stat-label">छात्रवृत्ति प्राप्तकर्ता</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <span class="stat-number">5000+</span>
                    <div class="stat-label">खुश परिवार</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">हमारी उपलब्धियां</h2>
            <p class="lead text-muted">संख्याओं में हमारा योगदान</p>
        </div>
        
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <div class="card border-0 bg-transparent">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-primary mb-3"></i>
                        <h3 class="fw-bold text-primary">500+</h3>
                        <p class="text-muted">लाभार्थी परिवार</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card border-0 bg-transparent">
                    <div class="card-body">
                        <i class="fas fa-ring fa-3x text-primary mb-3"></i>
                        <h3 class="fw-bold text-primary">200+</h3>
                        <p class="text-muted">विवाह सहायता</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card border-0 bg-transparent">
                    <div class="card-body">
                        <i class="fas fa-graduation-cap fa-3x text-primary mb-3"></i>
                        <h3 class="fw-bold text-primary">150+</h3>
                        <p class="text-muted">शिक्षा छात्रवृत्ति</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card border-0 bg-transparent">
                    <div class="card-body">
                        <i class="fas fa-heart fa-3x text-primary mb-3"></i>
                        <h3 class="fw-bold text-primary">100+</h3>
                        <p class="text-muted">मृत्यु सहायता</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">कैसे करें आवेदन</h2>
            <p class="lead text-muted">सरल चरणों में सहायता प्राप्त करें</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-3 text-center">
                <div class="mb-3">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <span class="fw-bold">1</span>
                    </div>
                </div>
                <h5>पंजीकरण करें</h5>
                <p class="text-muted">वेबसाइट पर अपना खाता बनाएं</p>
            </div>
            
            <div class="col-md-3 text-center">
                <div class="mb-3">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <span class="fw-bold">2</span>
                    </div>
                </div>
                <h5>आवेदन भरें</h5>
                <p class="text-muted">आवश्यक जानकारी के साथ फॉर्म भरें</p>
            </div>
            
            <div class="col-md-3 text-center">
                <div class="mb-3">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <span class="fw-bold">3</span>
                    </div>
                </div>
                <h5>दस्तावेज अपलोड करें</h5>
                <p class="text-muted">आवश्यक दस्तावेजों की प्रति अपलोड करें</p>
            </div>
            
            <div class="col-md-3 text-center">
                <div class="mb-3">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <span class="fw-bold">4</span>
                    </div>
                </div>
                <h5>अनुमोदन प्राप्त करें</h5>
                <p class="text-muted">समीक्षा के बाद सहायता प्राप्त करें</p>
            </div>
        </div>
        
        <?php if (!$isLoggedIn): ?>
            <div class="text-center mt-5">
                <a href="/register" class="btn btn-primary btn-lg">
                    <i class="fas fa-rocket me-2"></i>अभी शुरू करें
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">लाभार्थियों के अनुभव</h2>
            <p class="lead text-muted">हमारे सदस्यों के विचार</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="card-text">"एनजीओ विक्रांत की मदद से मेरी बेटी का विवाह संपन्न हुआ। बहुत आभारी हूं।"</p>
                        <div class="mt-3">
                            <h6 class="mb-0">श्रीमती राधा देवी</h6>
                            <small class="text-muted">विवाह सहायता लाभार्थी</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="card-text">"शिक्षा सहायता से मैं अपनी पढ़ाई पूरी कर सका। धन्यवाद एनजीओ विक्रांत।"</p>
                        <div class="mt-3">
                            <h6 class="mb-0">राहुल कुमार</h6>
                            <small class="text-muted">शिक्षा सहायता लाभार्थी</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="card-text">"मुश्किल समय में एनजीओ विक्रांत का साथ मिला। सच में मददगार संगठन है।"</p>
                        <div class="mt-3">
                            <h6 class="mb-0">मोहन लाल</h6>
                            <small class="text-muted">मृत्यु सहायता लाभार्थी</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
</script>
<?= $this->endSection() ?>