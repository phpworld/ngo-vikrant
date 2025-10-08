<?php $this->extend('member/layout') ?>

<?php $this->section('content') ?>

<!-- Enhanced Styles for UI Improvements -->
<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #007bff, #0056b3) !important;
}

.bg-gradient-success {
    background: linear-gradient(135deg, #28a745, #1e7e34) !important;
}

.form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.btn-gradient-vivah {
    background: linear-gradient(135deg, #ff6b6b, #ee5a6f);
    border: none;
    color: white;
    transition: all 0.3s ease;
}

.btn-gradient-vivah:hover {
    background: linear-gradient(135deg, #ee5a6f, #cc4b5c);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(238, 90, 111, 0.3);
}

.btn-gradient-death {
    background: linear-gradient(135deg, #6c5ce7, #5f3dc4);
    border: none;
    color: white;
    transition: all 0.3s ease;
}

.btn-gradient-death:hover {
    background: linear-gradient(135deg, #5f3dc4, #4c63d2);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(108, 92, 231, 0.3);
}

.card {
    border-radius: 15px;
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
}

.card-header {
    border-radius: 15px 15px 0 0 !important;
    padding: 1rem 1.5rem;
}

.btn-lg {
    border-radius: 12px;
}

.form-select {
    border-radius: 10px;
}

.shadow-sm {
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
}

.bg-light {
    background-color: #f8f9fa !important;
}

@media (max-width: 768px) {
    .col-lg-8, .col-lg-4 {
        margin-bottom: 1rem;
    }
    
    .btn-lg {
        padding: 0.75rem 1rem;
        font-size: 1rem;
    }
    
    .card-body {
        padding: 1.5rem !important;
    }
}
</style>
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

<!-- Application Deletion Policy Notice -->
<div class="alert alert-info d-flex align-items-center mb-4">
    <i class="fas fa-info-circle me-3 fa-lg"></i>
    <div>
        <strong>आवेदन नीति:</strong> 
        केवल <span class="badge bg-warning text-dark">लंबित</span> आवेदन ही रद्द किए जा सकते हैं। 
        एक बार <span class="badge bg-success">स्वीकृत</span> होने के बाद आवेदन को रद्द नहीं किया जा सकता।
    </div>
</div>

<!-- Filter and Search Section -->
<div class="row mb-4 g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-gradient-primary text-white border-0">
                <h6 class="mb-0 fw-bold">
                    <i class="fas fa-filter me-2"></i>फ़िल्टर और खोज
                </h6>
            </div>
            <div class="card-body p-4">
                <form method="get" action="/member/applications" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label text-muted fw-semibold mb-2">
                            <i class="fas fa-list-ul me-1 text-primary"></i>आवेदन स्थिति
                        </label>
                        <select name="status" class="form-select form-select-lg border-2">
                            <option value="">🔍 सभी स्थिति देखें</option>
                            <option value="pending" <?= ($filters['status'] ?? '') === 'pending' ? 'selected' : '' ?>>
                                ⏰ लंबित आवेदन
                            </option>
                            <option value="approved" <?= ($filters['status'] ?? '') === 'approved' ? 'selected' : '' ?>>
                                ✅ स्वीकृत आवेदन
                            </option>
                            <option value="rejected" <?= ($filters['status'] ?? '') === 'rejected' ? 'selected' : '' ?>>
                                ❌ अस्वीकृत आवेदन
                            </option>
                            <option value="processing" <?= ($filters['status'] ?? '') === 'processing' ? 'selected' : '' ?>>
                                ⏳ प्रक्रियाधीन आवेदन
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted fw-semibold mb-2">
                            <i class="fas fa-tags me-1 text-primary"></i>आवेदन प्रकार
                        </label>
                        <select name="type" class="form-select form-select-lg border-2">
                            <option value="">🏷️ सभी प्रकार देखें</option>
                            <option value="vivah" <?= ($filters['type'] ?? '') === 'vivah' ? 'selected' : '' ?>>
                                💒 विवाह सहायता
                            </option>
                            <option value="death" <?= ($filters['type'] ?? '') === 'death' ? 'selected' : '' ?>>
                                🕊️ मृत्यु सहायता
                            </option>
                            <option value="education" <?= ($filters['type'] ?? '') === 'education' ? 'selected' : '' ?>>
                                📚 शिक्षा सहायता
                            </option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="d-flex gap-3 justify-content-center pt-2">
                            <button type="submit" class="btn btn-primary btn-lg px-4 py-2 shadow-sm">
                                <i class="fas fa-search me-2"></i>खोजें
                            </button>
                            <a href="/member/applications" class="btn btn-outline-secondary btn-lg px-4 py-2">
                                <i class="fas fa-undo me-2"></i>रीसेट करें
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-gradient-success text-white border-0">
                <h6 class="mb-0 fw-bold">
                    <i class="fas fa-plus-circle me-2"></i>नया आवेदन जमा करें
                </h6>
            </div>
            <div class="card-body p-4 d-flex flex-column">
                <p class="text-muted mb-4 small">
                    <i class="fas fa-info-circle me-1 text-info"></i>
                    अपनी आवश्यकता के अनुसार सहायता के लिए आवेदन करें
                </p>
                
                <div class="d-grid gap-3 flex-grow-1">
                    <a href="/member/apply-vivah-help" class="btn btn-gradient-vivah btn-lg py-3 shadow-sm">
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fas fa-heart me-3 fa-lg"></i>
                            <div class="text-start">
                                <div class="fw-bold">विवाह सहायता</div>
                                <small class="opacity-75">शादी-विवाह के लिए</small>
                            </div>
                        </div>
                    </a>
                    
                    <a href="/member/apply-death-help" class="btn btn-gradient-death btn-lg py-3 shadow-sm">
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fas fa-praying-hands me-3 fa-lg"></i>
                            <div class="text-start">
                                <div class="fw-bold">मृत्यु सहायता</div>
                                <small class="opacity-75">अंतिम संस्कार के लिए</small>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="mt-3 p-3 bg-light rounded-3">
                    <small class="text-muted d-block text-center">
                        <i class="fas fa-clock me-1"></i>
                        आवेदन 24 घंटे में प्रोसेस किया जाएगा
                    </small>
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
                                                case 'pending': 
                                                    echo '<i class="fas fa-clock me-1"></i>लंबित'; 
                                                    break;
                                                case 'approved': 
                                                    echo '<i class="fas fa-check-circle me-1"></i>स्वीकृत'; 
                                                    break;
                                                case 'rejected': 
                                                    echo '<i class="fas fa-times-circle me-1"></i>अस्वीकृत'; 
                                                    break;
                                                case 'processing':
                                                    echo '<i class="fas fa-spinner fa-spin me-1"></i>प्रक्रियाधीन';
                                                    break;
                                                default: 
                                                    echo $application['status']; 
                                                    break;
                                            }
                                        ?>
                                    </span>
                                    <?php if ($application['status'] === 'approved'): ?>
                                        <br><small class="text-muted"><i class="fas fa-lock me-1"></i>सुरक्षित</small>
                                    <?php elseif ($application['status'] === 'pending'): ?>
                                        <br><small class="text-warning"><i class="fas fa-edit me-1"></i>संपादन योग्य</small>
                                    <?php endif; ?>
                                </td>
                                <td>₹<?= number_format($application['application_amount']) ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-outline-gradient btn-sm" data-bs-toggle="modal" data-bs-target="#applicationModal<?= $application['id'] ?>">
                                            <i class="fas fa-eye me-1"></i>विवरण
                                        </button>
                                        <?php if ($application['status'] === 'pending'): ?>
                                            <button class="btn btn-outline-danger btn-sm" 
                                                    onclick="confirmDeleteApplication(<?= $application['id'] ?>, '<?= esc($application['applicant_name']) ?>')"
                                                    title="आवेदन रद्द करें">
                                                <i class="fas fa-trash me-1"></i>रद्द करें
                                            </button>
                                        <?php endif; ?>
                                    </div>
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

<script>
function confirmDeleteApplication(applicationId, applicantName) {
    if (confirm(`क्या आप वाकई "${applicantName}" का आवेदन रद्द करना चाहते हैं?\n\nचेतावनी: यह कार्रवाई को पूर्ववत नहीं किया जा सकता।`)) {
        // Create a form to submit the delete request
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/member/delete-application';
        
        // Add CSRF token
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '<?= csrf_token() ?>';
        csrfToken.value = '<?= csrf_hash() ?>';
        form.appendChild(csrfToken);
        
        // Add application ID
        const appIdInput = document.createElement('input');
        appIdInput.type = 'hidden';
        appIdInput.name = 'application_id';
        appIdInput.value = applicationId;
        form.appendChild(appIdInput);
        
        // Submit the form
        document.body.appendChild(form);
        form.submit();
    }
}
</script>

<style>
/* Enhanced status badges */
.badge-pending {
    background-color: #ffc107;
    color: #212529;
}

.badge-approved {
    background-color: #28a745;
    color: white;
}

.badge-rejected {
    background-color: #dc3545;
    color: white;
}

.badge-processing {
    background-color: #17a2b8;
    color: white;
}

/* Action button styling */
.btn-outline-danger:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(220, 53, 69, 0.3);
}

/* Disabled state for non-deletable applications */
.application-protected {
    opacity: 0.8;
}

.application-protected .btn-outline-danger {
    display: none;
}

/* Status indicators */
.text-warning small {
    font-size: 0.75rem;
}

.text-muted small {
    font-size: 0.75rem;
}
</style>

<?php $this->endSection() ?>