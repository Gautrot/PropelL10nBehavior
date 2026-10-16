<?= $comment; ?>
<?= $functionStatement; ?>

    if ($<?= $localeVariableName; ?> === null) {
        $<?= $localeVariableName; ?> = $this->resolveLocale($<?= $localeVariableName; ?>);
    }

    $translationsLocales = PropelL10n::getLocaleChain($<?= $localeVariableName; ?>);

    foreach ($translationsLocales as $translationLocale) {
        $value = $this->getCurrentTranslation($translationLocale)->get<?= $columnPhpName; ?>(<?= $params; ?>);

        if ($value !== null) {
            return $value;
        }
    }

    return null;
}

