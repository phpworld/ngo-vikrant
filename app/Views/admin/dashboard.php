<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Dashboard Header -->
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <i class="fas fa-tachometer-alt me-2"></i>एडमिन डैशबोर्ड
    </h1>
    <p class="text-muted mb-0">एनजीओ विक्रांत प्रबंधन पैनल</p>
</div>

<!-- Stats Cards Row -->
<div class="row g-3 mb-4">
    <!-- Total Users Card -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            कुल उपयोगकर्ता
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $totalUsers ?>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-primary">
                            <i class="fas fa-users text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Applications Card -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            कुल आवेदन
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $totalApplications ?>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-success">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Applications Card -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            लंबित आवेदन
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $pendingApplications ?>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-warning">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Approved Applications Card -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            स्वीकृत आवेदन
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $approvedApplications ?>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-info">
                            <i class="fas fa-check-circle text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row g-4">
    <!-- Application Types Chart -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-chart-pie me-2"></i>आवेदन के प्रकार
                </h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-4 mb-3">
                        <div class="p-3">
                            <div class="app-type-icon mx-auto mb-2 bg-danger">
                                <i class="fas fa-heart text-white"></i>
                            </div>
                            <h5 class="font-weight-bold"><?= $vivahApplications ?? 0 ?></h5>
                            <p class="text-muted mb-0">विवाह सहायता</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="p-3">
                            <div class="app-type-icon mx-auto mb-2 bg-secondary">
                                <i class="fas fa-praying-hands text-white"></i>
                            </div>
                            <h5 class="font-weight-bold"><?= $deathApplications ?? 0 ?></h5>
                            <p class="text-muted mb-0">मृत्यु सहायता</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="p-3">
                            <div class="app-type-icon mx-auto mb-2 bg-primary">
                                <i class="fas fa-graduation-cap text-white"></i>
                            </div>
                            <h5 class="font-weight-bold"><?= $educationApplications ?? 0 ?></h5>
                            <p class="text-muted mb-0">शिक्षा सहायता</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Applications -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-list me-2"></i>हाल के आवेदन
                </h6>
                <a href="/admin/applications" class="btn btn-sm btn-outline-primary">सभी देखें</a>
            </div>
            <div class="card-body p-0">
                <?php if (!empty($recentApplications) && count($recentApplications) > 0): ?>
                    <div class="list-group list-group-flush">
                        <?php foreach (array_slice($recentApplications, 0, 5) as $application): ?>
                            <div class="list-group-item border-0 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <?php if ($application['status'] === 'approved'): ?>
                                            <span class="badge bg-success rounded-pill">
                                                <i class="fas fa-check"></i>
                                            </span>
                                        <?php elseif ($application['status'] === 'pending'): ?>
                                            <span class="badge bg-warning rounded-pill">
                                                <i class="fas fa-clock"></i>
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-danger rounded-pill">
                                                <i class="fas fa-times"></i>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 font-weight-bold text-gray-800">
                                            <?= esc($application['applicant_name'] ?? 'आवेदक') ?>
                                        </h6>
                                        <p class="text-muted mb-1 small">
                                            <?= $application['application_type'] === 'vivah_help' ? 'विवाह सहायता' : 
                                                ($application['application_type'] === 'death_help' ? 'मृत्यु सहायता' : 'शिक्षा सहायता') ?>
                                        </p>
                                        <small class="text-muted">
                                            <?= date('d M, Y', strtotime($application['created_at'])) ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-4">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <p class="text-muted">कोई हाल के आवेदन नहीं मिले</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Row -->
<div class="row g-3 mt-4">
    <div class="col-xl-3 col-md-6">
        <a href="/admin/users" class="text-decoration-none">
            <div class="card border-0 shadow-sm quick-action-card">
                <div class="card-body text-center py-4">
                    <div class="quick-action-icon mx-auto mb-3 bg-primary">
                        <i class="fas fa-users text-white"></i>
                    </div>
                    <h6 class="font-weight-bold text-gray-800">उपयोगकर्ता प्रबंधन</h6>
                    <p class="text-muted mb-0 small">सभी उपयोगकर्ताओं को देखें</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a href="/admin/applications" class="text-decoration-none">
            <div class="card border-0 shadow-sm quick-action-card">
                <div class="card-body text-center py-4">
                    <div class="quick-action-icon mx-auto mb-3 bg-success">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                    <h6 class="font-weight-bold text-gray-800">आवेदन समीक्षा</h6>
                    <p class="text-muted mb-0 small">लंबित आवेदनों की समीक्षा करें</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a href="/admin/reports" class="text-decoration-none">
            <div class="card border-0 shadow-sm quick-action-card">
                <div class="card-body text-center py-4">
                    <div class="quick-action-icon mx-auto mb-3 bg-info">
                        <i class="fas fa-chart-bar text-white"></i>
                    </div>
                    <h6 class="font-weight-bold text-gray-800">रिपोर्ट्स</h6>
                    <p class="text-muted mb-0 small">विस्तृत रिपोर्ट्स देखें</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6">
        <a href="/admin/settings" class="text-decoration-none">
            <div class="card border-0 shadow-sm quick-action-card">
                <div class="card-body text-center py-4">
                    <div class="quick-action-icon mx-auto mb-3 bg-warning">
                        <i class="fas fa-cog text-white"></i>
                    </div>
                    <h6 class="font-weight-bold text-gray-800">सेटिंग्स</h6>
                    <p class="text-muted mb-0 small">सिस्टम सेटिंग्स कॉन्फ़िगर करें</p>
                </div>
            </div>
        </a>
    </div>
</div>

<?= $this->endSection() ?>