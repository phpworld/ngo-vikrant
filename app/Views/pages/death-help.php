<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Service Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">मृत्यु सहायता</h1>
                <p class="lead mb-4">परिवार के मुखिया की मृत्यु के बाद आर्थिक कठिनाई में पड़े परिवारों को तत्काल सहायता प्रदान करना।</p>
                <a href="/register" class="btn btn-primary btn-lg">
                    <i class="fas fa-file-alt me-2"></i>आवेदन करें
                </a>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                     alt="मृत्यु सहायता" 
                     class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Service Details -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="section-title">योजना की विशेषताएं</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="service-icon me-3" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                        <i class="fas fa-rupee-sign"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">तत्काल सहायता</h6>
                                        <small class="text-muted">₹25,000 तक की सहायता</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="service-icon me-3" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">समय सीमा</h6>
                                        <small class="text-muted">मृत्यु के 30 दिन तक</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="service-icon me-3" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">पारिवारिक आय</h6>
                                        <small class="text-muted">₹1,50,000 से कम वार्षिक आय</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="service-icon me-3" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">पहचान</h6>
                                        <small class="text-muted">आधार कार्ड आवश्यक</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Support Types -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body p-4">
                        <h3 class="section-title">सहायता के प्रकार</h3>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="text-center">
                                    <div class="service-icon mb-3">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </div>
                                    <h5>तत्काल वित्तीय सहायता</h5>
                                    <p>अंतिम संस्कार के लिए तुरंत पैसा</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="text-center">
                                    <div class="service-icon mb-3">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <h5>आवास सहायता</h5>
                                    <p>बच्चों और विधवा के लिए आवास व्यवस्था</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="text-center">
                                    <div class="service-icon mb-3">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <h5>शिक्षा सहायता</h5>
                                    <p>बच्चों की शिक्षा जारी रखने के लिए</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Required Documents -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body p-4">
                        <h3 class="section-title">आवश्यक दस्तावेज</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>मृत्यु प्रमाण पत्र</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>आधार कार्ड (मृतक का)</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>परिवार के सदस्य का आधार</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>आय प्रमाण पत्र</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>बैंक पासबुक</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>पारिवारिक संबंध प्रमाण</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>निवास प्रमाण पत्र</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>पासपोर्ट साइज फोटो</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Application Process -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="card-title">आवेदन प्रक्रिया</h5>
                        <div class="steps">
                            <div class="step mb-3">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <h6>तत्काल संपर्क</h6>
                                    <p class="small">फोन से तुरंत संपर्क करें</p>
                                </div>
                            </div>
                            <div class="step mb-3">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <h6>प्रारंभिक सहायता</h6>
                                    <p class="small">तत्काल ₹5,000 की सहायता</p>
                                </div>
                            </div>
                            <div class="step mb-3">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <h6>दस्तावेज जमा</h6>
                                    <p class="small">बाकी दस्तावेज 7 दिन में</p>
                                </div>
                            </div>
                            <div class="step mb-3">
                                <div class="step-number">4</div>
                                <div class="step-content">
                                    <h6>पूर्ण सहायता</h6>
                                    <p class="small">बाकी राशि का भुगतान</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>आपातकाल में:</strong> तुरंत फोन करें
                        </div>
                        
                        <a href="tel:+919876543210" class="btn btn-danger w-100 mb-2">
                            <i class="fas fa-phone me-2"></i>आपातकालीन नंबर
                        </a>
                        
                        <?php if ($isLoggedIn ?? false): ?>
                            <a href="/member/applications" class="btn btn-primary w-100">
                                <i class="fas fa-plus me-2"></i>आवेदन करें
                            </a>
                        <?php else: ?>
                            <a href="/register" class="btn btn-primary w-100">
                                <i class="fas fa-user-plus me-2"></i>रजिस्टर करें
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Emergency Contact -->
                <div class="card border-0 shadow-sm mt-4 bg-danger text-white">
                    <div class="card-body p-4">
                        <h5 class="card-title">आपातकालीन सहायता</h5>
                        <div class="contact-info">
                            <p class="mb-2"><i class="fas fa-phone me-2"></i>+91 98765 43210</p>
                            <p class="mb-2"><i class="fas fa-phone me-2"></i>+91 87654 32109</p>
                            <p class="mb-0"><i class="fas fa-clock me-2"></i>24 घंटे उपलब्ध</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.steps .step {
    display: flex;
    align-items: center;
}

.step-number {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-right: 15px;
    flex-shrink: 0;
}

.step-content h6 {
    margin-bottom: 5px;
    color: #333;
}

.step-content p {
    margin-bottom: 0;
    color: #666;
}
</style>

<?= $this->endSection() ?>