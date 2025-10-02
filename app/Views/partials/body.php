<body data-bs-theme="<?= $theme_mode ?>" data-sidebar="dark">
    <!-- Sync localStorage on load to match DB (overrides stale client prefs) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            localStorage.setItem('theme-mode', '<?= $theme_mode ?>');
            // Re-apply attr in case Skote's app.js runs before this (Bootstrap 5 uses data-bs-theme)
            document.body.setAttribute('data-bs-theme', '<?= $theme_mode ?>');
            // Optional: Trigger Skote's theme update event if app.js listens (common pattern)
            window.dispatchEvent(new Event('themeChanged'));
        });
    </script>
