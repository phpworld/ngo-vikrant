<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= esc($title) ?> - एनजीओ विक्रांत</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        :root { --brand-start:#667eea; --brand-end:#764ba2; --radius-lg:28px; --radius-md:16px; --radius-sm:10px; }
        body { font-family:'Noto Sans Devanagari',sans-serif; margin:0; min-height:100vh; display:flex; align-items:center; justify-content:center; background: radial-gradient(circle at 20% 20%, #eef2ff, #d9e4ff 40%, #cbd5ff 60%, #bfc9ff 75%, #b5bfff 90%); padding:clamp(1rem,2vw,2rem); }
        .auth-wrapper { width:100%; max-width:1050px; background:#fff; border-radius:var(--radius-lg); overflow:hidden; display:grid; grid-template-columns:repeat(auto-fit,minmax(460px,1fr)); box-shadow:0 18px 45px -12px rgba(60,72,100,.25),0 8px 25px -8px rgba(60,72,100,.18); position:relative; }
        .media-pane { background:linear-gradient(135deg,var(--brand-start),var(--brand-end)); color:#fff; padding:clamp(2rem,4vw,3.5rem) clamp(1.8rem,3.3vw,3.2rem); display:flex; flex-direction:column; justify-content:space-between; position:relative; isolation:isolate; }
        .media-pane::before { content:""; position:absolute; inset:0; background:radial-gradient(circle at 30% 30%,rgba(255,255,255,.3),transparent 70%); mix-blend-mode:overlay; opacity:.6; }
        .media-pane::after { content:""; position:absolute; inset:0; background:radial-gradient(circle at 70% 70%,rgba(255,255,255,.25),transparent 65%); mix-blend-mode:overlay; opacity:.5; }
        .media-content { position:relative; z-index:2; }
        .media-content h1 { font-weight:700; font-size:clamp(2rem,2.8vw,2.6rem); margin:0 0 .6rem; }
        .tag-badge { background:rgba(255,255,255,.15); backdrop-filter:blur(4px); padding:.4rem .85rem; border-radius:30px; display:inline-flex; align-items:center; gap:.45rem; font-size:.75rem; letter-spacing:.5px; }
        .login-illustration { margin:2rem 0 1.4rem; }
        .login-illustration img { width:100%; max-width:380px; border-radius:var(--radius-md); box-shadow:0 10px 30px -8px rgba(0,0,0,.45); object-fit:cover; }
        .popover-note { font-size:.65rem; opacity:.75; }
        .quick-benefits { list-style:none; margin:0 0 1.5rem; padding:0; display:grid; gap:.7rem; }
        .quick-benefits li { display:flex; align-items:center; gap:.55rem; font-size:.8rem; }
        .quick-benefits li i { background:rgba(255,255,255,.18); width:30px; height:30px; display:inline-flex; align-items:center; justify-content:center; border-radius:10px; }
        .form-pane { padding:clamp(1.9rem,3vw,3rem) clamp(1.5rem,3vw,3rem) 2.2rem; position:relative; }
        .form-header h2 { margin:0 0 .4rem; font-size:clamp(1.45rem,2vw,1.9rem); font-weight:600; }
        .form-header p { margin:0 0 1.2rem; font-size:.85rem; color:#5f6374; }
        form .mb-3:last-of-type { margin-bottom:.9rem !important; }
        .form-control { border:1.8px solid #dbe0ea; border-radius:var(--radius-sm); padding:.85rem .95rem; font-size:.9rem; transition:.25s; background:#f9fafc; }
        .form-control:focus { border-color:var(--brand-start); background:#fff; box-shadow:0 0 0 .14rem rgba(102,126,234,.25); }
        .is-invalid { border-color:#dc3545 !important; }
        .invalid-feedback { font-size:.7rem; margin-top:4px; }
        .input-group .btn { border-radius:var(--radius-sm); }
        .flash-alert { border:1px solid #e0e4ef; background:#ffffff; border-left:5px solid var(--brand-start); padding:.75rem 1rem; border-radius:var(--radius-sm); font-size:.78rem; display:flex; gap:.6rem; align-items:flex-start; box-shadow:0 4px 15px -6px rgba(0,0,0,.08); }
        .flash-alert.success { border-left-color:#28a745; }
        .flash-alert.error { border-left-color:#dc3545; }
        .password-wrapper { position:relative; }
        .toggle-pass { position:absolute; top:50%; right:10px; transform:translateY(-50%); background:transparent; border:none; color:#666; cursor:pointer; padding:.25rem .4rem; }
        .actions-row { display:flex; justify-content:space-between; align-items:center; font-size:.7rem; margin-bottom:1rem; }
        .actions-row a { text-decoration:none; font-weight:600; background:linear-gradient(90deg,var(--brand-start),var(--brand-end)); -webkit-background-clip:text; color:transparent; }
        .actions-row a:hover { text-decoration:underline; }
        .btn-primary-gradient { background:linear-gradient(135deg,var(--brand-start),var(--brand-end)); border:none; padding:.85rem 1rem; font-weight:600; font-size:.95rem; letter-spacing:.4px; border-radius:14px; width:100%; box-shadow:0 6px 18px -6px rgba(102,126,234,.55); transition:.35s; }
        .btn-primary-gradient:hover { filter:brightness(1.07); transform:translateY(-2px); box-shadow:0 10px 26px -8px rgba(102,126,234,.65); }
        .alt-route { font-size:.78rem; margin-top:1.2rem; text-align:center; }
        .alt-route a { font-weight:600; text-decoration:none; background:linear-gradient(90deg,var(--brand-start),var(--brand-end)); -webkit-background-clip:text; color:transparent; }
        .alt-route a:hover { text-decoration:underline; }
        .footer-link { margin-top:1.4rem; font-size:.7rem; text-align:center; }
        .footer-link a { color:#6b7280; text-decoration:none; }
        .footer-link a:hover { color:var(--brand-start); }
        @media (max-width:1050px){ .auth-wrapper { max-width:920px; } }
        @media (max-width:980px){ .auth-wrapper { grid-template-columns:1fr; } .media-pane { min-height:360px; } }
        @media (max-width:560px){ .form-pane { padding:1.4rem 1.1rem 2rem; } .media-pane { padding:2rem 1.4rem 2.4rem; } }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="media-pane">
            <div class="media-content">
                <span class="tag-badge"><i class="fas fa-lock"></i> सुरक्षित प्रवेश</span>
                <h1>पुनः स्वागत</h1>
                <p style="max-width:430px;font-size:.95rem;line-height:1.55;">अपने खाते में लॉगिन करें और <strong>आवेदन की स्थिति</strong> देखें, नई सहायता के लिए आवेदन करें या अपनी प्रोफ़ाइल प्रबंधित करें।</p>
                <div class="login-illustration">
                    <img src="https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?auto=format&fit=crop&w=900&q=60" alt="Login Illustration" />
                </div>
                <ul class="quick-benefits">
                    <li><i class="fas fa-bolt"></i><span>तेज़ प्रक्रिया</span></li>
                    <li><i class="fas fa-shield"></i><span>भूमिका आधारित सुरक्षा</span></li>
                    <li><i class="fas fa-headset"></i><span>स्वयंसेवक सहायता</span></li>
                </ul>
                <div class="popover-note">समस्या होने पर एडमिन से संपर्क करें: admin@ngovikrant.com</div>
            </div>
            <div class="mt-4 small text-white-50">
                <div class="d-flex gap-3"><span><i class="fas fa-circle me-1" style="font-size:.45rem;"></i> एन्क्रिप्टेड</span><span><i class="fas fa-circle me-1" style="font-size:.45rem;"></i> सुरक्षित सत्यापन</span></div>
                <div style="font-size:.65rem;margin-top:.6rem;opacity:.65;">© 2025 एनजीओ विक्रांत</div>
            </div>
        </div>
        <div class="form-pane">
            <div class="form-header">
                <h2>लॉगिन करें</h2>
                <p>अपना ईमेल/उपयोगकर्ता नाम और पासवर्ड दर्ज करें।</p>
            </div>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="flash-alert success mb-3"><i class="fas fa-check-circle mt-1"></i><div><?= session()->getFlashdata('success') ?></div></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="flash-alert error mb-3"><i class="fas fa-triangle-exclamation mt-1"></i><div><?= session()->getFlashdata('error') ?></div></div>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <div class="flash-alert error mb-3"><i class="fas fa-triangle-exclamation mt-1"></i><div><?= esc($error) ?></div></div>
            <?php endif; ?>
            <?php if (isset($success)): ?>
                <div class="flash-alert success mb-3"><i class="fas fa-check-circle mt-1"></i><div><?= esc($success) ?></div></div>
            <?php endif; ?>
            <form method="post" action="/login" novalidate>
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="login" class="form-label mb-1">ईमेल या उपयोगकर्ता नाम</label>
                    <input type="text" id="login" name="login" value="<?= old('login') ?>" class="form-control <?= ($validation && $validation->hasError('login')) ? 'is-invalid' : '' ?>" placeholder="example@email.com या username" />
                    <?php if ($validation && $validation->hasError('login')): ?><div class="invalid-feedback"><?= $validation->getError('login') ?></div><?php endif; ?>
                </div>
                <div class="mb-2 password-wrapper">
                    <label for="password" class="form-label mb-1">पासवर्ड</label>
                    <input type="password" id="password" name="password" class="form-control <?= ($validation && $validation->hasError('password')) ? 'is-invalid' : '' ?>" placeholder="********" />
                    <button type="button" class="toggle-pass" data-target="password"><i class="fas fa-eye"></i></button>
                    <?php if ($validation && $validation->hasError('password')): ?><div class="invalid-feedback"><?= $validation->getError('password') ?></div><?php endif; ?>
                </div>
                <div class="actions-row">
                    <div class="form-check m-0">
                        <input class="form-check-input" type="checkbox" value="1" id="remember" />
                        <label class="form-check-label" for="remember" style="font-size:.7rem;">मुझे याद रखें</label>
                    </div>
                    <a href="/forgot-password">पासवर्ड भूल गए?</a>
                </div>
                <button type="submit" class="btn-primary-gradient"><i class="fas fa-right-to-bracket me-2"></i> लॉगिन</button>
            </form>
            <div class="alt-route">खाता नहीं है? <a href="/register">पंजीकरण करें</a></div>
            <div class="footer-link"><a href="/"><i class="fas fa-home me-1"></i> वेबसाइट पर वापस जाएँ</a></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.toggle-pass').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.getAttribute('data-target');
                const input = document.getElementById(id);
                const icon = btn.querySelector('i');
                if (input.type === 'password') { input.type='text'; icon.classList.replace('fa-eye','fa-eye-slash'); }
                else { input.type='password'; icon.classList.replace('fa-eye-slash','fa-eye'); }
            });
        });
        setTimeout(()=>{ document.querySelectorAll('.flash-alert').forEach(a=>a.style.display='none'); }, 6000);
    </script>
</body>
</html>