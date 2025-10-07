<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Service Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">शिक्षा सहायता</h1>
                <p class="lead mb-4">गरीब और प्रतिभाशाली छात्रों को उच्च शिक्षा प्राप्त करने के लिए आर्थिक सहायता प्रदान करना।</p>
                <a href="/register" class="btn btn-primary btn-lg">
                    <i class="fas fa-file-alt me-2"></i>आवेदन करें
                </a>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                     alt="शिक्षा सहायता" 
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
                                        <h6 class="mb-0">छात्रवृत्ति</h6>
                                        <small class="text-muted">₹30,000 प्रति वर्ष तक</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="service-icon me-3" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                        <i class="fas fa-percentage"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">न्यूनतम अंक</h6>
                                        <small class="text-muted">60% या अधिक</small>
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
                                        <small class="text-muted">₹2,00,000 से कम वार्षिक आय</small>
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
                                        <small class="text-muted">16-25 वर्ष</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Education Levels -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body p-4">
                        <h3 class="section-title">शिक्षा के स्तर</h3>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="text-center">
                                    <div class="service-icon mb-3">
                                        <i class="fas fa-school"></i>
                                    </div>
                                    <h5>हाई स्कूल (11वीं-12वीं)</h5>
                                    <p>₹10,000 प्रति वर्ष</p>
                                    <ul class="list-unstyled text-start">
                                        <li><i class="fas fa-check text-success me-2"></i>ट्यूशन फीस</li>
                                        <li><i class="fas fa-check text-success me-2"></i>किताबें और कॉपी</li>
                                        <li><i class="fas fa-check text-success me-2"></i>यूनिफॉर्म</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="text-center">
                                    <div class="service-icon mb-3">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <h5>स्नातक (बीए/बीएससी/बीकॉम)</h5>
                                    <p>₹20,000 प्रति वर्ष</p>
                                    <ul class="list-unstyled text-start">
                                        <li><i class="fas fa-check text-success me-2"></i>कॉलेज फीस</li>
                                        <li><i class="fas fa-check text-success me-2"></i>परीक्षा फीस</li>
                                        <li><i class="fas fa-check text-success me-2"></i>प्रैक्टिकल फीस</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="text-center">
                                    <div class="service-icon mb-3">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <h5>स्नातकोत्तर/व्यावसायिक</h5>
                                    <p>₹30,000 प्रति वर्ष</p>
                                    <ul class="list-unstyled text-start">
                                        <li><i class="fas fa-check text-success me-2"></i>एमए/एमएससी</li>
                                        <li><i class="fas fa-check text-success me-2"></i>बीएड/डी.एड</li>
                                        <li><i class="fas fa-check text-success me-2"></i>डिप्लोमा कोर्स</li>
                                    </ul>
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
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>अंतिम परीक्षा की मार्कशीट</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>आय प्रमाण पत्र</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>जाति प्रमाण पत्र</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>कॉलेज/स्कूल का एडमिशन लेटर</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>बैंक पासबुक</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>पासपोर्ट साइज फोटो</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>फीस रसीद</li>
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
                                    <h6>योग्यता जांच</h6>
                                    <p class="small">अंक और आय की जांच</p>
                                </div>
                            </div>
                            <div class="step mb-3">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <h6>ऑनलाइन आवेदन</h6>
                                    <p class="small">वेबसाइट पर फॉर्म भरें</p>
                                </div>
                            </div>
                            <div class="step mb-3">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <h6>दस्तावेज अपलोड</h6>
                                    <p class="small">सभी जरूरी कागजात</p>
                                </div>
                            </div>
                            <div class="step mb-3">
                                <div class="step-number">4</div>
                                <div class="step-content">
                                    <h6>चयन प्रक्रिया</h6>
                                    <p class="small">मेरिट के आधार पर</p>
                                </div>
                            </div>
                            <div class="step mb-3">
                                <div class="step-number">5</div>
                                <div class="step-content">
                                    <h6>छात्रवृत्ति मिलना</h6>
                                    <p class="small">सीधे बैंक में पैसा</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>नोट:</strong> हर साल नवीनीकरण जरूरी
                        </div>
                        
                        <?php if ($isLoggedIn ?? false): ?>
                            <a href="/member/applications" class="btn btn-primary w-100">
                                <i class="fas fa-plus me-2"></i>छात्रवृत्ति आवेदन
                            </a>
                        <?php else: ?>
                            <a href="/register" class="btn btn-primary w-100">
                                <i class="fas fa-user-plus me-2"></i>पहले रजिस्टर करें
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Important Dates -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body p-4">
                        <h5 class="card-title">महत्वपूर्ण तारीखें</h5>
                        <div class="timeline">
                            <div class="timeline-item mb-3">
                                <div class="timeline-marker bg-primary"></div>
                                <div class="timeline-content">
                                    <h6>आवेदन शुरू</h6>
                                    <small class="text-muted">1 जून से</small>
                                </div>
                            </div>
                            <div class="timeline-item mb-3">
                                <div class="timeline-marker bg-warning"></div>
                                <div class="timeline-content">
                                    <h6>आवेदन की अंतिम तारीख</h6>
                                    <small class="text-muted">31 जुलाई तक</small>
                                </div>
                            </div>
                            <div class="timeline-item mb-3">
                                <div class="timeline-marker bg-success"></div>
                                <div class="timeline-content">
                                    <h6>परिणाम घोषणा</h6>
                                    <small class="text-muted">15 अगस्त</small>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-marker bg-info"></div>
                                <div class="timeline-content">
                                    <h6>पहली किश्त</h6>
                                    <small class="text-muted">1 सितंबर</small>
                                </div>
                            </div>
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

.timeline-item {
    display: flex;
    align-items: center;
}

.timeline-marker {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin-right: 15px;
    flex-shrink: 0;
}

.timeline-content h6 {
    margin-bottom: 5px;
    color: #333;
}
</style>

<?= $this->endSection() ?>