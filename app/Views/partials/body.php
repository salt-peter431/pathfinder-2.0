<body data-sidebar="dark" class="<?= $theme_mode === 'dark' ? 'dark-mode' : 'light-mode' ?>">
    <!-- NEW: Sync localStorage on load to match DB (overrides stale client prefs) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            localStorage.setItem('theme-mode', '<?= $theme_mode ?>');
            // Re-apply class in case Skote's app.js runs before this
            document.body.classList.remove('light-mode', 'dark-mode');
            document.body.classList.add('<?= $theme_mode ?>-mode');
        });
    </script>
</body>