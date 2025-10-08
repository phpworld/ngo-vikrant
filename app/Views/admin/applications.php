<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-file-alt me-2"></i>आवेदन प्रबंधन
            </h1>
            <p class="text-muted mb-0">सभी आवेदनों की स्थिति और प्रबंधन</p>
        </div>
        <div>
            <button class="btn btn-success" onclick="exportApplications()">
                <i class="fas fa-download me-2"></i>एक्सपोर्ट करें
            </button>
        </div>
    </div>
</div>

<!-- Workflow Information -->
<div class="alert alert-info d-flex align-items-center mb-4">
    <i class="fas fa-info-circle me-3 fa-lg"></i>
    <div>
        <strong>कार्यप्रणाली:</strong> 
        आवेदनों को स्वीकृत/अस्वीकृत करने के लिए पहले "विवरण देखें" बटन पर क्लिक करें। 
        विस्तृत जानकारी देखने के बाद ही आप उचित निर्णय ले सकेंगे।
    </div>
</div>

<!-- Statistics Cards -->
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            कुल आवेदन
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $totalApplications ?>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-info">
                            <i class="fas fa-clipboard-list text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            स्वीकृत आवेदन
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $approvedApplications ?>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-success">
                            <i class="fas fa-check-circle text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            अस्वीकृत आवेदन
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $rejectedApplications ?>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-danger">
                            <i class="fas fa-times-circle text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Search and Filter Section -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-search me-2"></i>खोज और फ़िल्टर
            </h6>
        </div>
        <div class="card-body">
            <form method="GET" action="/admin/applications" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">खोजें</label>
                    <input type="text" class="form-control" name="search" 
                           value="<?= esc($filters['search']) ?>" 
                           placeholder="नाम, ईमेल, फोन या कारण खोजें...">
                </div>
                <div class="col-md-3">
                    <label class="form-label">स्थिति के अनुसार</label>
                    <select class="form-select" name="filter">
                        <option value="all" <?= $filters['filter'] === 'all' ? 'selected' : '' ?>>सभी आवेदन</option>
                        <option value="pending" <?= $filters['filter'] === 'pending' ? 'selected' : '' ?>>लंबित</option>
                        <option value="processing" <?= $filters['filter'] === 'processing' ? 'selected' : '' ?>>प्रक्रियाधीन</option>
                        <option value="approved" <?= $filters['filter'] === 'approved' ? 'selected' : '' ?>>स्वीकृत</option>
                        <option value="rejected" <?= $filters['filter'] === 'rejected' ? 'selected' : '' ?>>अस्वीकृत</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">प्रकार के अनुसार</label>
                    <select class="form-select" name="type_filter">
                        <option value="all" <?= ($filters['filter'] ?? '') === 'all' ? 'selected' : '' ?>>सभी प्रकार</option>
                        <option value="vivah" <?= ($filters['filter'] ?? '') === 'vivah' ? 'selected' : '' ?>>विवाह सहायता</option>
                        <option value="death" <?= ($filters['filter'] ?? '') === 'death' ? 'selected' : '' ?>>मृत्यु सहायता</option>
                        <option value="education" <?= ($filters['filter'] ?? '') === 'education' ? 'selected' : '' ?>>शिक्षा सहायता</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">&nbsp;</label>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search me-1"></i>खोजें
                        </button>
                        <a href="/admin/applications" class="btn btn-outline-secondary">
                            <i class="fas fa-undo me-1"></i>रीसेट
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Applications Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                आवेदनों की सूची 
                <?php if (!empty($applications)): ?>
                    <span class="badge bg-info ms-2"><?= count($applications) ?> प्रविष्टियां</span>
                <?php endif; ?>
            </h6>
            <div class="d-flex gap-2">
                <button class="btn btn-success" onclick="exportApplications()">
                    <i class="fas fa-download me-2"></i>एक्सपोर्ट करें
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="applicationsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>आवेदक का नाम</th>
                            <th>आवेदन प्रकार</th>
                            <th>राशि</th>
                            <th>स्थिति</th>
                            <th>आवेदन दिनांक</th>
                            <th>विवरण देखें</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($applications)): ?>
                            <?php foreach ($applications as $application): ?>
                                <tr data-app-id="<?= $application['id'] ?>">
                                    <td><?= esc($application['id']) ?></td>
                                    <td>
                                        <div>
                                            <h6 class="mb-0"><?= esc($application['applicant_name']) ?></h6>
                                            <small class="text-muted"><?= esc($application['email']) ?></small>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">
                                            <?= $application['application_type'] == 'vivah_help' ? 'विवाह सहायता' : 'मृत्यु सहायता' ?>
                                        </span>
                                    </td>
                                    <td>₹<?= number_format($application['application_amount']) ?></td>
                                    <td>
                                        <span class="badge 
                                            <?= $application['status'] == 'pending' ? 'bg-warning' : 
                                                ($application['status'] == 'approved' ? 'bg-success' : 'bg-danger') ?>">
                                            <?= $application['status'] == 'pending' ? 'लंबित' : 
                                                ($application['status'] == 'approved' ? 'स्वीकृत' : 'अस्वीकृत') ?>
                                        </span>
                                    </td>
                                    <td><?= date('d/m/Y', strtotime($application['created_at'])) ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewApplication(<?= $application['id'] ?>)" 
                                                    title="विवरण देखें">
                                                <i class="fas fa-eye me-1"></i>विवरण देखें
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-clipboard-list fa-3x mb-3"></i>
                                        <p>कोई आवेदन नहीं मिला</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Controls -->
            <?php if (!empty($applications)): ?>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <span class="text-muted">
                                    पृष्ठ <?= $currentPage ?> का <?= $pager->getPageCount() ?> | 
                                    कुल <?= $totalApplications ?> आवेदन | 
                                    प्रति पृष्ठ <?= $perPage ?> प्रविष्टियां
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-end">
                                <?= $pager->links('default', 'bootstrap_pagination') ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Application Details Modal -->
<div class="modal fade" id="applicationDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">आवेदन विवरण</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="applicationDetailsContent">
                <!-- Application details will be loaded here -->
            </div>
        </div>
    </div>
</div>

<style>
.border-left-primary { border-left: 0.25rem solid #667eea !important; }
.border-left-success { border-left: 0.25rem solid #28a745 !important; }
.border-left-warning { border-left: 0.25rem solid #ffc107 !important; }
.border-left-info { border-left: 0.25rem solid #17a2b8 !important; }
.border-left-danger { border-left: 0.25rem solid #dc3545 !important; }

.stat-icon {
    width: 3rem;
    height: 3rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>

<script>
function viewApplication(applicationId) {
    // Redirect to application details page
    window.location.href = '/admin/application-details/' + applicationId;
}

function exportApplications() {
    // Implementation for exporting applications
    window.location.href = '/admin/export-applications';
}

// Auto-submit form on filter change for better UX
document.addEventListener('DOMContentLoaded', function() {
    const filterSelects = document.querySelectorAll('select[name="filter"], select[name="type_filter"]');
    filterSelects.forEach(select => {
        select.addEventListener('change', function() {
            // Auto-submit the form when filter changes
            this.form.submit();
        });
    });
});
</script>

<?= $this->endSection() ?>