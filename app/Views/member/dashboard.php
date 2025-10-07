<?php $this->extend('member/layout') ?>

<?php $this->section('content') ?>
<!-- Flash Messages -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-modern alert-success">
        <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-modern alert-danger">
        <i class="fas fa-exclamation-triangle me-2"></i><?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<!-- Statistics Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-file-alt"></i>
        </div>
        <div class="stat-number"><?= $total_applications ?></div>
        <div class="stat-label">कुल आवेदन</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-number"><?= $pending_applications ?></div>
        <div class="stat-label">लंबित आवेदन</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-number"><?= $approved_applications ?></div>
        <div class="stat-label">स्वीकृत आवेदन</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-times-circle"></i>
        </div>
        <div class="stat-number"><?= $rejected_applications ?></div>
        <div class="stat-label">अस्वीकृत आवेदन</div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <h5 class="mb-3"><i class="fas fa-bolt me-2"></i>त्वरित कार्य</h5>
        <div class="quick-actions">
            <a href="/member/apply-vivah-help" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h6>विवाह सहायता</h6>
                <p class="mb-0 small text-muted">नई विवाह सहायता के लिए आवेदन करें</p>
            </a>
            <a href="/member/apply-death-help" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-praying-hands"></i>
                </div>
                <h6>मृत्यु सहायता</h6>
                <p class="mb-0 small text-muted">मृत्यु सहायता के लिए आवेदन करें</p>
            </a>
            <a href="/member/applications" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-list-alt"></i>
                </div>
                <h6>आवेदन स्थिति</h6>
                <p class="mb-0 small text-muted">अपने आवेदनों की स्थिति देखें</p>
            </a>
            <a href="/member/profile" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-user-edit"></i>
                </div>
                <h6>प्रोफ़ाइल अपडेट</h6>
                <p class="mb-0 small text-muted">अपनी जानकारी अपडेट करें</p>
            </a>
        </div>
    </div>
</div>

<!-- Recent Applications -->
<div class="row">
    <div class="col-12">
        <div class="card-modern">
            <div class="card-header-modern">
                <h5><i class="fas fa-history me-2"></i>हाल की आवेदन</h5>
            </div>
            <div class="card-body p-0">
                <?php if (!empty($recent_applications)): ?>
                    <div class="table-responsive">
                        <table class="table table-modern mb-0">
                            <thead>
                                <tr>
                                    <th>आवेदन प्रकार</th>
                                    <th>आवेदन दिनांक</th>
                                    <th>स्थिति</th>
                                    <th>राशि</th>
                                    <th>कार्य</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_applications as $application): ?>
                                    <tr>
                                        <td>
                                            <i class="fas fa-<?= strpos($application['application_type'], 'vivah') !== false ? 'heart' : 'praying-hands' ?> me-2 text-primary"></i>
                                            <?= strpos($application['application_type'], 'vivah') !== false ? 'विवाह सहायता' : 'मृत्यु सहायता' ?>
                                        </td>
                                        <td><?= date('d/m/Y', strtotime($application['created_at'])) ?></td>
                                        <td>
                                            <span class="badge badge-<?= $application['status'] === 'pending' ? 'pending' : ($application['status'] === 'approved' ? 'approved' : 'rejected') ?>">
                                                <?php 
                                                    switch($application['status']) {
                                                        case 'pending': echo 'लंबित'; break;
                                                        case 'approved': echo 'स्वीकृत'; break;
                                                        case 'rejected': echo 'अस्वीकृत'; break;
                                                        default: echo $application['status']; break;
                                                    }
                                                ?>
                                            </span>
                                        </td>
                                        <td>₹<?= number_format($application['application_amount']) ?></td>
                                        <td>
                                            <button class="btn btn-outline-gradient btn-sm">
                                                <i class="fas fa-eye me-1"></i>विवरण
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="p-4 text-center text-muted">
                        <i class="fas fa-inbox fa-3x mb-3 opacity-50"></i>
                        <p class="mb-0">अभी तक कोई आवेदन नहीं है</p>
                        <small>ऊपर दिए गए त्वरित कार्यों से नया आवेदन करें</small>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
        .alert-modern { border:none; border-radius:var(--radius-sm); padding:1rem 1.2rem; }
        .alert-success { background:#f0fdf4; border-left:4px solid #22c55e; color:#166534; }
        .alert-danger { background:#fef2f2; border-left:4px solid #ef4444; color:#991b1b; }
        @media (max-width:768px) {
            .stats-grid { grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:1rem; }
            .quick-actions { grid-template-columns:1fr; }
            .page-header { padding:1.5rem 0; margin-bottom:1.5rem; }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><i class="fas fa-hands-helping me-2"></i>एनजीओ विक्रांत</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="/member/dashboard"><i class="fas fa-tachometer-alt me-1"></i>डैशबोर्ड</a></li>
                    <li class="nav-item"><a class="nav-link" href="/member/applications"><i class="fas fa-file-alt me-1"></i>मेरे आवेदन</a></li>
                    <li class="nav-item"><a class="nav-link" href="/member/profile"><i class="fas fa-user me-1"></i>प्रोफ़ाइल</a></li>
                    <li class="nav-item"><a class="nav-link" href="/"><i class="fas fa-home me-1"></i>मुख्य साइट</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i><?= esc($user_name) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/member/profile"><i class="fas fa-user me-2"></i>प्रोफ़ाइल</a></li>
                            <li><a class="dropdown-item" href="/member/applications"><i class="fas fa-file-alt me-2"></i>आवेदन</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="/logout"><i class="fas fa-sign-out-alt me-2"></i>लॉगआउट</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="margin-top:76px;">
        <div class="page-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1><i class="fas fa-tachometer-alt me-3"></i><?= esc($title) ?></h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="/">होम</a></li>
                                <li class="breadcrumb-item active" aria-current="page">डैशबोर्ड</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="text-end">
                        <div class="text-white-50 small">स्वागत है,</div>
                        <div class="h5 mb-0"><?= esc($user_name) ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-modern alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-modern alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i><?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Statistics Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-file-alt"></i></div>
                    <div class="stat-number"><?= $total_applications ?></div>
                    <div class="stat-label">कुल आवेदन</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-clock"></i></div>
                    <div class="stat-number"><?= $pending_applications ?></div>
                    <div class="stat-label">लंबित आवेदन</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                    <div class="stat-number"><?= $approved_applications ?></div>
                    <div class="stat-label">स्वीकृत आवेदन</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-times-circle"></i></div>
                    <div class="stat-number"><?= $rejected_applications ?></div>
                    <div class="stat-label">अस्वीकृत आवेदन</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <a href="/member/apply-vivah-help" class="action-card">
                    <div class="action-icon"><i class="fas fa-ring"></i></div>
                    <h6 class="mb-1">विवाह सहायता</h6>
                    <small class="text-muted">नया आवेदन करें</small>
                </a>
                <a href="/member/apply-death-help" class="action-card">
                    <div class="action-icon"><i class="fas fa-hands-praying"></i></div>
                    <h6 class="mb-1">मृत्यु सहायता</h6>
                    <small class="text-muted">नया आवेदन करें</small>
                </a>
                <a href="/education-help" class="action-card">
                    <div class="action-icon"><i class="fas fa-graduation-cap"></i></div>
                    <h6 class="mb-1">शिक्षा सहायता</h6>
                    <small class="text-muted">जानकारी देखें</small>
                </a>
                <a href="/member/profile" class="action-card">
                    <div class="action-icon"><i class="fas fa-user-edit"></i></div>
                    <h6 class="mb-1">प्रोफ़ाइल अपडेट</h6>
                    <small class="text-muted">विवरण संपादित करें</small>
                </a>
            </div>

            <!-- Recent Applications -->
            <div class="row">
                <div class="col-12">
                    <div class="card-modern">
                        <div class="card-header-modern">
                            <h5><i class="fas fa-file-alt me-2"></i>हाल के आवेदन</h5>
                        </div>
                        <div class="card-body p-0">
                            <?php if (!empty($applications)): ?>
                                <div class="table-responsive">
                                    <table class="table table-modern">
                                        <thead>
                                            <tr>
                                                <th>आवेदन संख्या</th>
                                                <th>प्रकार</th>
                                                <th>राशि</th>
                                                <th>स्थिति</th>
                                                <th>दिनांक</th>
                                                <th>कार्य</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach (array_slice($applications, 0, 5) as $application): ?>
                                                <tr>
                                                    <td><span class="fw-bold">#<?= $application['id'] ?></span></td>
                                                    <td>
                                                        <?php
                                                        $types = [
                                                            'vivah_help' => '<i class="fas fa-ring me-1"></i>विवाह सहायता',
                                                            'death_help' => '<i class="fas fa-hands-praying me-1"></i>मृत्यु सहायता',
                                                            'education_help' => '<i class="fas fa-graduation-cap me-1"></i>शिक्षा सहायता'
                                                        ];
                                                        echo $types[$application['application_type']] ?? $application['application_type'];
                                                        ?>
                                                    </td>
                                                    <td><span class="fw-bold">₹<?= number_format($application['application_amount']) ?></span></td>
                                                    <td>
                                                        <?php
                                                        $statusClasses = [
                                                            'pending' => 'badge-pending',
                                                            'approved' => 'badge-approved',
                                                            'rejected' => 'badge-rejected'
                                                        ];
                                                        $statusText = [
                                                            'pending' => 'लंबित',
                                                            'approved' => 'स्वीकृत',
                                                            'rejected' => 'अस्वीकृत'
                                                        ];
                                                        ?>
                                                        <span class="badge-status <?= $statusClasses[$application['status']] ?? 'badge-pending' ?>">
                                                            <?= $statusText[$application['status']] ?? $application['status'] ?>
                                                        </span>
                                                    </td>
                                                    <td><?= date('d/m/Y', strtotime($application['created_at'])) ?></td>
                                                    <td>
                                                        <a href="/member/applications" class="btn btn-outline-gradient btn-sm">
                                                            <i class="fas fa-eye me-1"></i>विवरण
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="p-3 text-center border-top">
                                    <a href="/member/applications" class="btn btn-gradient">
                                        <i class="fas fa-list me-2"></i>सभी आवेदन देखें
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="text-center py-5">
                                    <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                                    <h6 class="text-muted mb-3">अभी तक कोई आवेदन नहीं है</h6>
                                    <a href="/member/apply-vivah-help" class="btn btn-gradient">
                                        <i class="fas fa-plus me-2"></i>पहला आवेदन करें
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                if (bsAlert) bsAlert.close();
            });
        }, 5000);
        
        // Smooth animations for cards
        document.querySelectorAll('.stat-card, .action-card, .card-modern').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-5px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>