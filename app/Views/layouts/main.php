<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'एनजीओ विक्रांत' ?></title>
    <meta name="description" content="एनजीओ विक्रांत - सामाजिक सेवा संगठन। विवाह सहायता, मृत्यु सहायता, शिक्षा सहायता प्रदान करने वाला संगठन।">
    <meta name="keywords" content="NGO, विक्रांत, सामाजिक सेवा, विवाह सहायता, मृत्यु सहायता, शिक्षा सहायता">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts for Hindi -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --accent-color: #f8f9fa;
            --text-primary: #2c3e50;
            --text-secondary: #6c757d;
            --border-color: #e3e6f0;
        }
        
        body {
            font-family: 'Noto Sans Devanagari', sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
        }
        
        /* Navigation Styles */
        .navbar {
            background: white !important;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.75rem;
            color: var(--primary-color) !important;
        }
        
        .navbar-nav .nav-link {
            font-weight: 500;
            color: var(--text-primary) !important;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover {
            background-color: var(--accent-color);
            color: var(--primary-color) !important;
        }
        
        .navbar-nav .nav-link.active {
            background-color: var(--primary-color);
            color: white !important;
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 400px;
            height: 400px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        /* Card Styles */
        .service-card, .feature-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
            background: white;
        }
        
        .service-card:hover, .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        /* Section Styles */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
        }
        
        .section-subtitle {
            font-size: 1.2rem;
            color: var(--text-secondary);
            margin-bottom: 3rem;
        }
        
        /* Button Styles */
        .btn {
            border-radius: 12px;
            font-weight: 600;
            padding: 12px 24px;
            border: none;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }
        
        .btn-outline-primary {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }
        
        .btn-outline-light {
            border: 2px solid rgba(255,255,255,0.3);
            color: white;
            background: transparent;
        }
        
        .btn-outline-light:hover {
            background: rgba(255,255,255,0.2);
            border-color: white;
            color: white;
        }
        
        /* Stats Section */
        .stats-section {
            background: var(--accent-color);
            padding: 80px 0;
        }
        
        .stat-item {
            text-align: center;
            padding: 2rem;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-color);
            display: block;
        }
        
        .stat-label {
            font-size: 1.1rem;
            color: var(--text-secondary);
            margin-top: 0.5rem;
        }
        
        /* Footer */
        .footer {
            background: var(--text-primary);
            color: white;
            padding: 60px 0 30px;
        }
        
        .footer h5 {
            color: white;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        
        .footer a {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer a:hover {
            color: white;
        }
        
        .footer-bottom {
            border-top: 1px solid #495057;
            padding-top: 30px;
            margin-top: 40px;
            text-align: center;
            color: #adb5bd;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section {
                padding: 60px 0;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .stat-number {
                font-size: 2.5rem;
            }
        }
        
        /* Utility Classes */
        .text-gray-800 {
            color: var(--text-primary) !important;
        }
        
        .shadow-sm {
            box-shadow: 0 2px 10px rgba(0,0,0,0.08) !important;
        }
        
        .border-0 {
            border: none !important;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-hands-helping me-2"></i>एनजीओ विक्रांत
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= (current_url() == base_url() || current_url() == base_url('/')) ? 'active' : '' ?>" href="/">
                            <i class="fas fa-home me-1"></i>होम
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (current_url() == base_url('/about')) ? 'active' : '' ?>" href="/about">
                            <i class="fas fa-info-circle me-1"></i>हमारे बारे में
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-hand-holding-heart me-1"></i>सेवाएं
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm">
                            <li><a class="dropdown-item py-2" href="/beti-vivah">
                                <i class="fas fa-heart me-2 text-danger"></i>बेटी विवाह सहायता
                            </a></li>
                            <li><a class="dropdown-item py-2" href="/death-help">
                                <i class="fas fa-praying-hands me-2 text-secondary"></i>मृत्यु सहायता
                            </a></li>
                            <li><a class="dropdown-item py-2" href="/education-help">
                                <i class="fas fa-graduation-cap me-2 text-primary"></i>शिक्षा सहायता
                            </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (current_url() == base_url('/rulebook')) ? 'active' : '' ?>" href="/rulebook">
                            <i class="fas fa-book me-1"></i>नियम पुस्तिका
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (current_url() == base_url('/contact')) ? 'active' : '' ?>" href="/contact">
                            <i class="fas fa-phone me-1"></i>संपर्क
                        </a>
                    </li>
                </ul>
                
                <ul class="navbar-nav">
                    <?php if ($isLoggedIn ?? false): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-1"></i><?= $user_name ?>
                            </a>
                            <ul class="dropdown-menu border-0 shadow-sm">
                                <?php if (($user_role ?? '') === 'admin'): ?>
                                    <li><a class="dropdown-item py-2" href="/admin/dashboard">
                                        <i class="fas fa-tachometer-alt me-2 text-primary"></i>एडमिन पैनल
                                    </a></li>
                                <?php else: ?>
                                    <li><a class="dropdown-item py-2" href="/member/dashboard">
                                        <i class="fas fa-tachometer-alt me-2 text-primary"></i>डैशबोर्ड
                                    </a></li>
                                    <li><a class="dropdown-item py-2" href="/member/profile">
                                        <i class="fas fa-user me-2 text-info"></i>प्रोफ़ाइल
                                    </a></li>
                                    <li><a class="dropdown-item py-2" href="/member/applications">
                                        <i class="fas fa-file-alt me-2 text-success"></i>मेरे आवेदन
                                    </a></li>
                                <?php endif; ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger py-2" href="/logout">
                                    <i class="fas fa-sign-out-alt me-2"></i>लॉगआउट
                                </a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">
                                <i class="fas fa-sign-in-alt me-1"></i>लॉगिन
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">
                                <i class="fas fa-user-plus me-1"></i>पंजीकरण
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main style="margin-top: 76px;">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="container mt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i><?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="text-primary mb-3">
                        <i class="fas fa-hands-helping me-2"></i>एनजीओ विक्रांत
                    </h5>
                    <p>सामाजिक सेवा के लिए समर्पित संगठन। हम समाज के कल्याण के लिए विभिन्न सेवाएं प्रदान करते हैं।</p>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 mb-4">
                    <h6 class="text-primary mb-3">त्वरित लिंक</h6>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-white-50 text-decoration-none">होम</a></li>
                        <li><a href="/about" class="text-white-50 text-decoration-none">हमारे बारे में</a></li>
                        <li><a href="/rulebook" class="text-white-50 text-decoration-none">नियम पुस्तिका</a></li>
                        <li><a href="/contact" class="text-white-50 text-decoration-none">संपर्क</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 mb-4">
                    <h6 class="text-primary mb-3">सेवाएं</h6>
                    <ul class="list-unstyled">
                        <li><a href="/beti-vivah" class="text-white-50 text-decoration-none">बेटी विवाह सहायता</a></li>
                        <li><a href="/death-help" class="text-white-50 text-decoration-none">मृत्यु सहायता</a></li>
                        <li><a href="/education-help" class="text-white-50 text-decoration-none">शिक्षा सहायता</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 mb-4">
                    <h6 class="text-primary mb-3">संपर्क जानकारी</h6>
                    <ul class="list-unstyled">
                        <li class="text-white-50"><i class="fas fa-map-marker-alt me-2"></i>123 मुख्य मार्ग, शहर</li>
                        <li class="text-white-50"><i class="fas fa-phone me-2"></i>+91 98765 43210</li>
                        <li class="text-white-50"><i class="fas fa-envelope me-2"></i>info@ngovikrant.org</li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-white-50">&copy; 2025 एनजीओ विक्रांत। सभी अधिकार सुरक्षित।</p>
                </div>
                <div class="col-md-6 text-end">
                    <small class="text-white-50">प्रेम और सेवा के साथ निर्मित ❤️</small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <?= $this->renderSection('scripts') ?>
</body>
</html>