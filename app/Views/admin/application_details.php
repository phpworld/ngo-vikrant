<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-file-alt me-2"></i>आवेदन विवरण
            </h1>
            <p class="text-muted mb-0">आवेदन ID: #<?= $application['id'] ?></p>
        </div>
        <div>
            <a href="/admin/applications" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>वापस जाएं
            </a>
        </div>
    </div>
</div>

<!-- Flash Messages -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle me-2"></i>
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="fas fa-exclamation-circle me-2"></i>
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row">
    <!-- Application Details -->
    <div class="col-lg-8">
        <!-- Basic Information -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>आवेदन की जानकारी
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">आवेदन प्रकार:</label>
                        <div>
                            <span class="badge bg-primary fs-6">
                                <?php
                                switch($application['application_type']) {
                                    case 'vivah_help':
                                        echo '💒 विवाह सहायता';
                                        break;
                                    case 'death_help':
                                        echo '🔲 मृत्यु सहायता';
                                        break;
                                    case 'education_help':
                                        echo '📚 शिक्षा सहायता';
                                        break;
                                    default:
                                        echo $application['application_type'];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">आवेदन की स्थिति:</label>
                        <div>
                            <span class="badge fs-6 <?php 
                                switch($application['status']) {
                                    case 'pending': echo 'bg-warning'; break;
                                    case 'approved': echo 'bg-success'; break;
                                    case 'rejected': echo 'bg-danger'; break;
                                    case 'processing': echo 'bg-info'; break;
                                    default: echo 'bg-secondary';
                                } ?>">
                                <?php
                                switch($application['status']) {
                                    case 'pending':
                                        echo '⏰ लंबित';
                                        break;
                                    case 'approved':
                                        echo '✅ स्वीकृत';
                                        break;
                                    case 'rejected':
                                        echo '❌ अस्वीकृत';
                                        break;
                                    case 'processing':
                                        echo '⏳ प्रक्रियाधीन';
                                        break;
                                    default:
                                        echo $application['status'];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">आवेदन दिनांक:</label>
                        <div><?= date('d/m/Y H:i', strtotime($application['created_at'])) ?></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">अंतिम अपडेट:</label>
                        <div><?= date('d/m/Y H:i', strtotime($application['updated_at'])) ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">आवेदित राशि:</label>
                        <div class="fs-5 text-primary fw-bold">₹<?= number_format($application['application_amount']) ?></div>
                    </div>
                    <?php if ($application['status'] === 'approved' && $application['approved_amount']): ?>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">स्वीकृत राशि:</label>
                        <div class="fs-5 text-success fw-bold">₹<?= number_format($application['approved_amount']) ?></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Applicant Information -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">
                    <i class="fas fa-user me-2"></i>आवेदक की जानकारी
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">आवेदक का नाम:</label>
                        <div><?= esc($application['applicant_name']) ?></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">फोन नंबर:</label>
                        <div><?= esc($application['phone']) ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">पिता का नाम:</label>
                        <div><?= esc($application['father_name']) ?></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">माता का नाम:</label>
                        <div><?= esc($application['mother_name']) ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">आधार नंबर:</label>
                        <div><?= esc($application['aadhar_number']) ?></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">आय प्रमाण पत्र:</label>
                        <div><?= esc($application['income_certificate']) ?: 'उपलब्ध नहीं' ?></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">पूरा पता:</label>
                    <div><?= esc($application['address']) ?></div>
                </div>
            </div>
        </div>

        <!-- Bank Information -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">
                    <i class="fas fa-university me-2"></i>बैंक की जानकारी
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">बैंक खाता संख्या:</label>
                        <div class="font-monospace"><?= esc($application['bank_account']) ?></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">IFSC कोड:</label>
                        <div class="font-monospace"><?= esc($application['ifsc_code']) ?></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Application Reason -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">
                    <i class="fas fa-comment-alt me-2"></i>आवेदन का कारण
                </h5>
            </div>
            <div class="card-body">
                <p class="mb-0"><?= nl2br(esc($application['application_reason'])) ?></p>
            </div>
        </div>

        <!-- Documents -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">
                    <i class="fas fa-paperclip me-2"></i>संलग्न दस्तावेज
                </h5>
            </div>
            <div class="card-body">
                <?php 
                $documents = null;
                if ($application['documents']) {
                    $documents = json_decode($application['documents'], true);
                }
                
                if ($documents && is_array($documents) && !empty($documents)):
                ?>
                    <div class="row">
                        <?php foreach ($documents as $docType => $docName): ?>
                        <div class="col-md-6 mb-3">
                            <div class="document-item border rounded p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <?php
                                            // Get file extension to show appropriate icon
                                            $ext = strtolower(pathinfo($docName, PATHINFO_EXTENSION));
                                            if ($ext === 'pdf') {
                                                echo '<i class="fas fa-file-pdf text-danger fa-2x"></i>';
                                            } elseif (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
                                                echo '<i class="fas fa-file-image text-info fa-2x"></i>';
                                            } else {
                                                echo '<i class="fas fa-file text-muted fa-2x"></i>';
                                            }
                                            ?>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">
                                                <?php
                                                // Display document type in Hindi
                                                switch($docType) {
                                                    case 'aadhar_card':
                                                        echo 'आधार कार्ड';
                                                        break;
                                                    case 'income_cert':
                                                        echo 'आय प्रमाण पत्र';
                                                        break;
                                                    case 'bank_pass':
                                                        echo 'बैंक पासबुक';
                                                        break;
                                                    case 'death_cert':
                                                        echo 'मृत्यु प्रमाण पत्र';
                                                        break;
                                                    case 'admission_letter':
                                                        echo 'प्रवेश पत्र';
                                                        break;
                                                    case 'fee_receipt':
                                                        echo 'फीस रसीद';
                                                        break;
                                                    case 'fee_structure':
                                                        echo 'फीस संरचना';
                                                        break;
                                                    case 'college_id':
                                                        echo 'कॉलेज आईडी';
                                                        break;
                                                    case 'invitation':
                                                        echo 'निमंत्रण कार्ड';
                                                        break;
                                                    case 'other_documents':
                                                        echo 'अन्य दस्तावेज';
                                                        break;
                                                    default:
                                                        echo ucfirst(str_replace('_', ' ', $docType));
                                                }
                                                ?>
                                            </h6>
                                            <p class="mb-0 text-muted small"><?= esc($docName) ?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-outline-primary me-2" 
                                                onclick="viewDocument('<?= esc($docName) ?>')" 
                                                title="दस्तावेज देखें">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" 
                                                onclick="downloadDocument('<?= esc($docName) ?>')" 
                                                title="डाउनलोड करें">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Document Verification Status -->
                    <div class="mt-3">
                        <div class="alert alert-info d-flex align-items-center">
                            <i class="fas fa-info-circle me-2"></i>
                            <span>सभी दस्तावेज <?= $application['status'] === 'approved' ? 'सत्यापित और स्वीकृत' : 'समीक्षाधीन' ?> हैं।</span>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="text-center py-4">
                        <i class="fas fa-file-circle-exclamation fa-3x text-muted mb-3"></i>
                        <h6 class="text-muted">कोई दस्तावेज संलग्न नहीं किए गए</h6>
                        <p class="text-muted small">आवेदक द्वारा कोई दस्तावेज अपलोड नहीं किए गए हैं।</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Admin Remarks -->
        <?php if ($application['admin_remarks']): ?>
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">
                    <i class="fas fa-user-tie me-2"></i>एडमिन की टिप्पणी
                </h5>
            </div>
            <div class="card-body">
                <p class="mb-2"><?= nl2br(esc($application['admin_remarks'])) ?></p>
                <?php if ($application['approved_date']): ?>
                <small class="text-muted">
                    दिनांक: <?= date('d/m/Y H:i', strtotime($application['approved_date'])) ?>
                </small>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- Action Panel -->
    <div class="col-lg-4">
        <!-- User Information -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-info text-white">
                <h6 class="mb-0">
                    <i class="fas fa-user me-2"></i>सदस्य की जानकारी
                </h6>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <div class="avatar mx-auto mb-2" style="width: 60px; height: 60px;">
                        <div class="avatar-initial rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                            <?= strtoupper(substr($application['user_name'], 0, 1)) ?>
                        </div>
                    </div>
                    <h6 class="mb-1"><?= esc($application['user_name']) ?></h6>
                    <p class="text-muted mb-0 small">@<?= esc($application['username']) ?></p>
                </div>
                <div class="mb-2">
                    <i class="fas fa-envelope text-muted me-2"></i>
                    <small><?= esc($application['email']) ?></small>
                </div>
                <div class="mb-2">
                    <i class="fas fa-phone text-muted me-2"></i>
                    <small><?= esc($application['user_phone']) ?></small>
                </div>
                <div class="mb-2">
                    <i class="fas fa-id-card text-muted me-2"></i>
                    <small><?= esc($application['user_aadhar']) ?></small>
                </div>
            </div>
        </div>

        <!-- Action Panel -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h6 class="mb-0">
                    <i class="fas fa-gavel me-2"></i>प्रशासनिक कार्रवाई
                </h6>
            </div>
            <div class="card-body">
                <?php if ($application['status'] === 'approved'): ?>
                    <!-- Special Warning for Approved Applications -->
                    <div class="alert alert-danger">
                        <i class="fas fa-shield-alt me-2"></i>
                        <strong>महत्वपूर्ण चेतावनी:</strong> यह आवेदन पहले से <strong>स्वीकृत</strong> है। 
                        स्वीकृत आवेदनों को रद्द या अस्वीकृत करना अनुशंसित नहीं है। 
                        यदि आवश्यक हो तो सावधानी से कार्रवाई करें।
                    </div>
                <?php elseif ($application['status'] === 'rejected'): ?>
                    <!-- Warning for Rejected Applications -->
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>चेतावनी:</strong> यह आवेदन पहले से अस्वीकृत है। 
                        स्थिति बदलने से पुराना निर्णय रद्द हो जाएगा।
                    </div>
                <?php endif; ?>
                
                <form action="/admin/process-application-action" method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" name="application_id" value="<?= $application['id'] ?>">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">कार्रवाई का चयन करें <span class="text-danger">*</span></label>
                        <select class="form-select" name="action" required onchange="handleActionChange(this.value)">
                            <option value="">-- कार्रवाई चुनें --</option>
                            <option value="approved" class="text-success">✅ आवेदन स्वीकृत करें</option>
                            <option value="rejected" class="text-danger">❌ आवेदन अस्वीकृत करें</option>
                            <option value="processing" class="text-info">⏳ प्रक्रियाधीन में डालें</option>
                            <option value="pending" class="text-warning">⏰ पुनः समीक्षा के लिए लंबित करें</option>
                        </select>
                        <div class="form-text">कृपया सोच समझकर निर्णय लें। यह कार्रवाई आवेदक को ईमेल द्वारा सूचित की जाएगी।</div>
                    </div>

                    <!-- Amount Field for Approved Applications -->
                    <div class="mb-3" id="amountField" style="display: none;">
                        <label class="form-label fw-bold">स्वीकृत राशि (रुपये में) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">₹</span>
                            <input type="number" class="form-control" name="approved_amount" 
                                   value="<?= $application['application_amount'] ?>" 
                                   min="1" max="<?= $application['application_amount'] ?>"
                                   placeholder="स्वीकृत राशि दर्ज करें">
                        </div>
                        <div class="form-text">
                            <i class="fas fa-info-circle me-1"></i>
                            आवेदित राशि: <strong>₹<?= number_format($application['application_amount']) ?></strong> | 
                            अधिकतम स्वीकृत: <strong>₹<?= number_format($application['application_amount']) ?></strong>
                        </div>
                    </div>

                    <!-- Admin Remarks -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">प्रशासनिक टिप्पणी/कारण <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="admin_remarks" rows="4" required 
                                  placeholder="कृपया अपना निर्णय विस्तार से लिखें...&#10;&#10;उदाहरण:&#10;- स्वीकृत: सभी दस्तावेज सत्यापित हैं। आवेदन की पात्रता पूर्ण है।&#10;- अस्वीकृत: अपूर्ण दस्तावेज। आय प्रमाण पत्र गुम है।&#10;- प्रक्रियाधीन: दस्तावेज सत्यापन प्रक्रिया चल रही है।"></textarea>
                        <div class="form-text">
                            <i class="fas fa-lightbulb me-1"></i>
                            स्पष्ट और विस्तृत टिप्पणी लिखें जो आवेदक को समझ आ सके। न्यूनतम 20 अक्षर आवश्यक।
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                            <i class="fas fa-check me-2"></i>कार्रवाई पूर्ण करें
                        </button>
                        <button type="button" class="btn btn-outline-secondary" onclick="resetForm()">
                            <i class="fas fa-undo me-2"></i>फॉर्म रीसेट करें
                        </button>
                    </div>
                </form>

                <!-- Quick Action Tips -->
                <div class="mt-4 p-3 bg-light rounded">
                    <h6 class="text-primary">
                        <i class="fas fa-tips me-2"></i>त्वरित सुझाव:
                    </h6>
                    <ul class="list-unstyled small mb-0">
                        <li><i class="fas fa-check text-success me-2"></i><strong>स्वीकृत:</strong> सभी दस्तावेज ठीक हैं और पात्रता पूर्ण है</li>
                        <li><i class="fas fa-times text-danger me-2"></i><strong>अस्वीकृत:</strong> दस्तावेज अपूर्ण या पात्रता की कमी</li>
                        <li><i class="fas fa-clock text-info me-2"></i><strong>प्रक्रियाधीन:</strong> और जांच की आवश्यकता है</li>
                        <li><i class="fas fa-pause text-warning me-2"></i><strong>लंबित:</strong> अतिरिक्त जानकारी चाहिए</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Handle action selection changes
function handleActionChange(action) {
    const amountField = document.getElementById('amountField');
    const submitBtn = document.getElementById('submitBtn');
    const remarksField = document.querySelector('textarea[name="admin_remarks"]');
    
    // Show/hide amount field
    if (action === 'approved') {
        amountField.style.display = 'block';
        document.querySelector('input[name="approved_amount"]').required = true;
    } else {
        amountField.style.display = 'none';
        document.querySelector('input[name="approved_amount"]').required = false;
    }
    
    // Update submit button text and color based on action
    if (action === 'approved') {
        submitBtn.innerHTML = '<i class="fas fa-check me-2"></i>आवेदन स्वीकृत करें';
        submitBtn.className = 'btn btn-success btn-lg';
    } else if (action === 'rejected') {
        submitBtn.innerHTML = '<i class="fas fa-times me-2"></i>आवेदन अस्वीकृत करें';
        submitBtn.className = 'btn btn-danger btn-lg';
    } else if (action === 'processing') {
        submitBtn.innerHTML = '<i class="fas fa-clock me-2"></i>प्रक्रियाधीन में डालें';
        submitBtn.className = 'btn btn-info btn-lg';
    } else if (action === 'pending') {
        submitBtn.innerHTML = '<i class="fas fa-pause me-2"></i>लंबित करें';
        submitBtn.className = 'btn btn-warning btn-lg';
    } else {
        submitBtn.innerHTML = '<i class="fas fa-check me-2"></i>कार्रवाई पूर्ण करें';
        submitBtn.className = 'btn btn-primary btn-lg';
    }
    
    // Pre-fill remarks based on action for better UX
    if (action && !remarksField.value.trim()) {
        let placeholder = '';
        switch (action) {
            case 'approved':
                placeholder = 'सभी दस्तावेज सत्यापित हैं। आवेदन की पात्रता पूर्ण है। आवेदन स्वीकृत किया जा रहा है।';
                break;
            case 'rejected':
                placeholder = 'कृपया अस्वीकृति का स्पष्ट कारण लिखें (जैसे: अपूर्ण दस्तावेज, पात्रता की कमी आदि)।';
                break;
            case 'processing':
                placeholder = 'आवेदन प्रक्रियाधीन है। दस्तावेज सत्यापन या अतिरिक्त जांच चल रही है।';
                break;
            case 'pending':
                placeholder = 'अतिरिक्त जानकारी या दस्तावेज की आवश्यकता है। कृपया विवरण दें।';
                break;
        }
        remarksField.placeholder = placeholder;
    }
}

// Reset form function
function resetForm() {
    if (confirm('क्या आप वाकई फॉर्म रीसेट करना चाहते हैं?')) {
        document.querySelector('form').reset();
        document.getElementById('amountField').style.display = 'none';
        document.getElementById('submitBtn').innerHTML = '<i class="fas fa-check me-2"></i>कार्रवाई पूर्ण करें';
        document.getElementById('submitBtn').className = 'btn btn-primary btn-lg';
    }
}

// Document viewing functions
function viewDocument(filename) {
    // Open document in new tab for viewing
    window.open('/admin/view-document/' + encodeURIComponent(filename), '_blank');
}

function downloadDocument(filename) {
    // Trigger download
    window.location.href = '/admin/download-document/' + encodeURIComponent(filename);
}

// Enhanced form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const action = document.querySelector('select[name="action"]').value;
    const remarks = document.querySelector('textarea[name="admin_remarks"]').value.trim();
    const amount = document.querySelector('input[name="approved_amount"]').value;
    
    // Validate action selection
    if (!action) {
        e.preventDefault();
        alert('कृपया कार्रवाई का चयन करें।');
        document.querySelector('select[name="action"]').focus();
        return;
    }
    
    // Validate remarks length and content
    if (remarks.length < 20) {
        e.preventDefault();
        alert('कृपया कम से कम 20 अक्षर की विस्तृत टिप्पणी लिखें।');
        document.querySelector('textarea[name="admin_remarks"]').focus();
        return;
    }
    
    // Validate amount for approved applications
    if (action === 'approved') {
        if (!amount || amount <= 0) {
            e.preventDefault();
            alert('कृपया स्वीकृत राशि दर्ज करें।');
            document.querySelector('input[name="approved_amount"]').focus();
            return;
        }
        
        const maxAmount = <?= $application['application_amount'] ?>;
        if (parseFloat(amount) > maxAmount) {
            e.preventDefault();
            alert('स्वीकृत राशि आवेदित राशि से अधिक नहीं हो सकती।');
            document.querySelector('input[name="approved_amount"]').focus();
            return;
        }
    }
    
    // Final confirmation
    const actionText = {
        'approved': 'स्वीकृत',
        'rejected': 'अस्वीकृत', 
        'processing': 'प्रक्रियाधीन',
        'pending': 'लंबित'
    }[action] || action;
    
    const confirmMessage = `क्या आप वाकई इस आवेदन को ${actionText} करना चाहते हैं?\n\n` +
                          `यह कार्रवाई आवेदक को ईमेल द्वारा सूचित की जाएगी।\n\n` +
                          `टिप्पणी: ${remarks.substring(0, 100)}${remarks.length > 100 ? '...' : ''}`;
    
    if (!confirm(confirmMessage)) {
        e.preventDefault();
        return;
    }
    
    // Show loading state
    const submitBtn = document.getElementById('submitBtn');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>प्रक्रिया जारी...';
    submitBtn.disabled = true;
    
    // Re-enable button after 5 seconds in case of error
    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }, 5000);
});

// Auto-save draft functionality (optional enhancement)
let draftTimer;
function saveDraft() {
    const remarks = document.querySelector('textarea[name="admin_remarks"]').value;
    const action = document.querySelector('select[name="action"]').value;
    
    if (remarks.length > 10 || action) {
        // Save to localStorage
        localStorage.setItem('admin_draft_<?= $application['id'] ?>', JSON.stringify({
            action: action,
            remarks: remarks,
            timestamp: Date.now()
        }));
    }
}

// Restore draft on page load
document.addEventListener('DOMContentLoaded', function() {
    const draft = localStorage.getItem('admin_draft_<?= $application['id'] ?>');
    if (draft) {
        try {
            const draftData = JSON.parse(draft);
            // Only restore if draft is less than 1 hour old
            if (Date.now() - draftData.timestamp < 3600000) {
                if (draftData.action) {
                    document.querySelector('select[name="action"]').value = draftData.action;
                    handleActionChange(draftData.action);
                }
                if (draftData.remarks) {
                    document.querySelector('textarea[name="admin_remarks"]').value = draftData.remarks;
                }
            } else {
                localStorage.removeItem('admin_draft_<?= $application['id'] ?>');
            }
        } catch (e) {
            console.error('Error restoring draft:', e);
        }
    }
});

// Auto-save draft on input change
document.querySelector('textarea[name="admin_remarks"]').addEventListener('input', function() {
    clearTimeout(draftTimer);
    draftTimer = setTimeout(saveDraft, 2000);
});

document.querySelector('select[name="action"]').addEventListener('change', saveDraft);

// Clear draft on successful submission
window.addEventListener('beforeunload', function() {
    // This will be cleared if the form was successfully submitted
    if (document.querySelector('form').dataset.submitted !== 'true') {
        saveDraft();
    }
});
</script>

<?= $this->endSection() ?>

<style>
.document-item {
    transition: all 0.3s ease;
    border: 1px solid #e3e6f0 !important;
}

.document-item:hover {
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    transform: translateY(-2px);
}

.badge.fs-6 {
    font-size: 0.875rem !important;
    padding: 0.5rem 0.75rem;
}

.btn-group .btn {
    border-radius: 0.35rem !important;
}

.alert {
    border: none;
    border-radius: 0.5rem;
}

.card {
    border-radius: 0.75rem !important;
}

.form-control:focus,
.form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
    transform: translateY(-1px);
}

.avatar-initial {
    font-size: 1.5rem;
    font-weight: 600;
}

.text-primary {
    color: #667eea !important;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
}

/* Custom scrollbar for textareas */
textarea::-webkit-scrollbar {
    width: 8px;
}

textarea::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

textarea::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 4px;
}

textarea::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

/* Loading animation */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.fa-spin {
    animation: spin 1s linear infinite;
}

/* Print styles */
@media print {
    .btn, .alert, form, script {
        display: none !important;
    }
    
    .card {
        border: 1px solid #ccc !important;
        box-shadow: none !important;
    }
}
</style>