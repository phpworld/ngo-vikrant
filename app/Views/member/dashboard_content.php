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
                                            <i class="fas fa-<?= $application['type'] === 'vivah' ? 'heart' : 'praying-hands' ?> me-2 text-primary"></i>
                                            <?= $application['type'] === 'vivah' ? 'विवाह सहायता' : 'मृत्यु सहायता' ?>
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
                                        <td>₹<?= number_format($application['amount']) ?></td>
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