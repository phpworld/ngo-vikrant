<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Service Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">बेटी विवाह सहायता</h1>
                <p class="lead mb-4">आर्थिक रूप से कमजोर परिवारों की बेटियों के विवाह में सहायता प्रदान करना हमारा मुख्य उद्देश्य है।</p>
                <a href="/register" class="btn btn-primary btn-lg">
                    <i class="fas fa-file-alt me-2"></i>आवेदन करें
                </a>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                     alt="बेटी विवाह सहायता" 
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
                                        <h6 class="mb-0">वित्तीय सहायता</h6>
                                        <small class="text-muted">₹51,000 तक की सहायता</small>
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
                                        <small class="text-muted">₹1,00,000 से कम वार्षिक आय</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="service-icon me-3" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">शिक्षा</h6>
                                        <small class="text-muted">न्यूनतम 8वीं पास</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="service-icon me-3" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">आयु सीमा</h6>
                                        <small class="text-muted">18-25 वर्ष</small>
                                    </div>
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
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>आधार कार्ड</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>जन्म प्रमाण पत्र</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>आय प्रमाण पत्र</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>जाति प्रमाण पत्र</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>शिक्षा प्रमाण पत्र</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>बैंक पासबुक</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>पासपोर्ट साइज फोटो</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>निवास प्रमाण पत्र</li>
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
                                    <h6>रजिस्ट्रेशन</h6>
                                    <p class="small">पहले अपना खाता बनाएं</p>
                                </div>
                            </div>
                            <div class="step mb-3">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <h6>दस्तावेज अपलोड</h6>
                                    <p class="small">आवश्यक दस्तावेज अपलोड करें</p>
                                </div>
                            </div>
                            <div class="step mb-3">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <h6>आवेदन जमा करें</h6>
                                    <p class="small">फॉर्म भरकर जमा करें</p>
                                </div>
                            </div>
                            <div class="step mb-3">
                                <div class="step-number">4</div>
                                <div class="step-content">
                                    <h6>स्वीकृति</h6>
                                    <p class="small">15-20 दिनों में परिणाम</p>
                                </div>
                            </div>
                        </div>
                        
                        <?php if ($isLoggedIn ?? false): ?>
                            <a href="/member/applications" class="btn btn-primary w-100">
                                <i class="fas fa-plus me-2"></i>नया आवेदन
                            </a>
                        <?php else: ?>
                            <a href="/register" class="btn btn-primary w-100">
                                <i class="fas fa-user-plus me-2"></i>पहले रजिस्टर करें
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body p-4">
                        <h5 class="card-title">सहायता के लिए संपर्क करें</h5>
                        <div class="contact-info">
                            <p class="mb-2"><i class="fas fa-phone text-primary me-2"></i>+91 98765 43210</p>
                            <p class="mb-2"><i class="fas fa-envelope text-primary me-2"></i>help@ngovikrant.org</p>
                            <p class="mb-0"><i class="fas fa-clock text-primary me-2"></i>सोम-शुक्र: 9:00-17:00</p>
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