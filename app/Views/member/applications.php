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

<!-- Filter and Search Section -->
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card-modern">
            <div class="card-body">
                <h6 class="mb-3"><i class="fas fa-filter me-2"></i>फ़िल्टर</h6>
                <form method="get" action="/member/applications">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <select name="status" class="form-select form-select-sm">
                                <option value="">सभी स्थिति</option>
                                <option value="pending" <?= ($filters['status'] ?? '') === 'pending' ? 'selected' : '' ?>>लंबित</option>
                                <option value="approved" <?= ($filters['status'] ?? '') === 'approved' ? 'selected' : '' ?>>स्वीकृत</option>
                                <option value="rejected" <?= ($filters['status'] ?? '') === 'rejected' ? 'selected' : '' ?>>अस्वीकृत</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="type" class="form-select form-select-sm">
                                <option value="">सभी प्रकार</option>
                                <option value="vivah" <?= ($filters['type'] ?? '') === 'vivah' ? 'selected' : '' ?>>विवाह सहायता</option>
                                <option value="death" <?= ($filters['type'] ?? '') === 'death' ? 'selected' : '' ?>>मृत्यु सहायता</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-gradient btn-sm me-2">
                                <i class="fas fa-search me-1"></i>खोजें
                            </button>
                            <a href="/member/applications" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-times me-1"></i>रीसेट
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-modern">
            <div class="card-body">
                <h6 class="mb-3"><i class="fas fa-plus me-2"></i>नया आवेदन</h6>
                <div class="d-grid gap-2">
                    <a href="/member/apply-vivah-help" class="btn btn-gradient btn-sm">
                        <i class="fas fa-heart me-1"></i>विवाह सहायता आवेदन
                    </a>
                    <a href="/member/apply-death-help" class="btn btn-outline-gradient btn-sm">
                        <i class="fas fa-praying-hands me-1"></i>मृत्यु सहायता आवेदन
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Applications Table -->
<div class="card-modern">
    <div class="card-header-modern">
        <h5><i class="fas fa-file-alt me-2"></i>मेरे आवेदन (<?= count($applications ?? []) ?>)</h5>
    </div>
    <div class="card-body p-0">
        <?php if (!empty($applications)): ?>
            <div class="table-responsive">
                <table class="table table-modern mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>आवेदन प्रकार</th>
                            <th>लाभार्थी</th>
                            <th>आवेदन दिनांक</th>
                            <th>स्थिति</th>
                            <th>राशि</th>
                            <th>कार्य</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($applications as $index => $application): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td>
                                    <i class="fas fa-<?= strpos($application['application_type'], 'vivah') !== false ? 'heart' : 'praying-hands' ?> me-2 text-primary"></i>
                                    <?= strpos($application['application_type'], 'vivah') !== false ? 'विवाह सहायता' : 'मृत्यु सहायता' ?>
                                </td>
                                <td><?= esc($application['applicant_name']) ?></td>
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
                                    <button class="btn btn-outline-gradient btn-sm" data-bs-toggle="modal" data-bs-target="#applicationModal<?= $application['id'] ?>">
                                        <i class="fas fa-eye me-1"></i>विवरण
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="p-5 text-center text-muted">
                <i class="fas fa-inbox fa-4x mb-3 opacity-25"></i>
                <h5>कोई आवेदन नहीं मिला</h5>
                <p class="mb-3">आपने अभी तक कोई आवेदन नहीं किया है।</p>
                <a href="/member/apply-vivah-help" class="btn btn-gradient me-2">
                    <i class="fas fa-heart me-1"></i>विवाह सहायता
                </a>
                <a href="/member/apply-death-help" class="btn btn-outline-gradient">
                    <i class="fas fa-praying-hands me-1"></i>मृत्यु सहायता
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Application Detail Modals -->
<?php if (!empty($applications)): ?>
    <?php foreach ($applications as $application): ?>
        <div class="modal fade" id="applicationModal<?= $application['id'] ?>" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-<?= strpos($application['application_type'], 'vivah') !== false ? 'heart' : 'praying-hands' ?> me-2"></i>
                            <?= strpos($application['application_type'], 'vivah') !== false ? 'विवाह सहायता' : 'मृत्यु सहायता' ?> आवेदन विवरण
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>लाभार्थी नाम:</strong> <?= esc($application['applicant_name']) ?><br>
                                <strong>आवेदन दिनांक:</strong> <?= date('d/m/Y', strtotime($application['created_at'])) ?><br>
                                <strong>स्थिति:</strong> 
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
                            </div>
                            <div class="col-md-6">
                                <strong>अनुरोधित राशि:</strong> ₹<?= number_format($application['application_amount']) ?><br>
                                <?php if (isset($application['approved_amount']) && $application['approved_amount']): ?>
                                    <strong>स्वीकृत राशि:</strong> ₹<?= number_format($application['approved_amount']) ?><br>
                                <?php endif; ?>
                                <?php if (isset($application['admin_remarks']) && $application['admin_remarks']): ?>
                                    <strong>एडमिन टिप्पणी:</strong> <?= esc($application['admin_remarks']) ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (isset($application['application_reason']) && $application['application_reason']): ?>
                            <hr>
                            <strong>विवरण:</strong><br>
                            <p><?= nl2br(esc($application['application_reason'])) ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">बंद करें</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<?php $this->endSection() ?>