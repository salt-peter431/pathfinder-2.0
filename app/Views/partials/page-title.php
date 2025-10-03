<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18"><?= $title ? lang($title) : '' ?></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <?php if (isset($breadcrumbs) && is_array($breadcrumbs) && !empty($breadcrumbs)): ?>
                        <?php foreach ($breadcrumbs as $index => $crumb): ?>
                            <li class="breadcrumb-item <?= ($index === array_key_last($breadcrumbs)) ? 'active' : '' ?>">
                                <?php if ($index < array_key_last($breadcrumbs)): ?>
                                    <a href="<?= esc($crumb['url'], 'url') ?>"><?= lang(esc($crumb['name'])) ?></a>
                                <?php else: ?>
                                    <?= lang(esc($crumb['name'])) ?>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Fallback for legacy/empty cases -->
                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?= $pagetitle ? lang($pagetitle) : '' ?></a></li>
                        <li class="breadcrumb-item active"><?= $title ? lang($title) : '' ?></li>
                    <?php endif; ?>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->