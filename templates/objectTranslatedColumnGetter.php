<?= $comment; ?>
<?= $functionStatement; ?>

    if ($locale === null) {
        $locale = $this->getLocale();
    }
    if ($locale === null) {
        $locale = PropelL10n::getLocale();
    }
    return $this->getCurrentTranslation($locale)->get<?= $columnPhpName; ?>(<?= $params; ?>);
}

