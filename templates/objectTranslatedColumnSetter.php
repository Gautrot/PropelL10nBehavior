<?= $comment; ?>
<?= $functionStatement; ?>

    if ($locale === null) {
        $locale = $this->getLocale();
    }
    if ($locale === null) {
        $locale = PropelL10n::getLocale();
    }
    $this->getCurrentTranslation($locale)->set<?= $columnPhpName; ?>(<?= $params; ?>);

    return $this;
}

